<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>
    </head>
    <style>
        .receipt-size{
            width :280px;
            height: auto;
        }
        .td-lable{ 
           font-size:10px;
           font-weight: bold;
        }
        .logo{
            width: 150px;
            height: 150px;
        }
        .td-header{
            text-align: center;
        }
        .td-bodies{
            text-align: center;
            font-size: 12px;
        }
        
        .hidden{
            display: none;
        }
        #snackbar {
                visibility: hidden;
                min-width: 250px;
                margin-left: -125px;
                background-color: #333;
                color: #fff;
                text-align: center;
                border-radius: 10px;
                padding: 20px;
                position: fixed;
                z-index: 1000;
                left: 50%;
                /*bottom: 30px;*/
                top:50%;
                font-size: 27px;
            }
            #snackbar.show {
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
            }
    </style>
    <body>
        <div class="receipt-size" id="div"></div>
        <div id="base_64" style="width:500px; height:200px; overflow: scroll;"></div>
        <div id="snackbar">Item added</div>
    </body>
    <script>
        $(document).ready(function(){
           load_data(); 
        });
        
        function load_data(){
            var post_url = "<?php echo site_url("cashier_order/load_receipt_data")?>";
            var receipt = "<?php echo $receipt?>";
            if (!HTMLCanvasElement.prototype.toBlob) {
                Object.defineProperty(HTMLCanvasElement.prototype, 'toBlob', {
                  value: function (callback, type, quality) {
                    var canvas = this;
                    setTimeout(function() {
                      var binStr = atob( canvas.toDataURL(type, quality).split(',')[1] ),
                      len = binStr.length,
                      arr = new Uint8Array(len);

                      for (var i = 0; i < len; i++ ) {
                         arr[i] = binStr.charCodeAt(i);
                      }
                      callback( new Blob( [arr], {type: type || 'image/png'} ) );
                    });
                  }
               });
            }
            
            $.ajax({
                type: 'POST',
                url: post_url,
                async:false,
                data:{"order_no":receipt},
                success: function (response) {
                        var json;
                        try {
                            json = $.parseJSON(response);
                        } catch(err){
                            showTost(err.message);
                            //update_item_printed(receipt);
                            return;
                        }
                    $("#div").html('');
                    var index_table=0;
                    try {
                    $.each(json.Printer,function(i,e){
                            index_table+=1;
                            //var canvas = document.getElementById('canvas');
                            var canvas = document.createElement('canvas'); 
                            canvas.id = "canvas"+index_table;
                            var body = document.getElementsByTagName("body")[0];
                            body.appendChild(canvas);
                            var ctx = canvas.getContext('2d');
                            
                            var item_note = "";
                            var header = "";
                            var data = "";
                            var footer = '';
                            var item ="";
                            header = '<svg xmlns="http://www.w3.org/2000/svg"> width="100%" height="100%"' +
                                 '<foreignObject width="100%" height="100%">' +
                                 '<div xmlns="http://www.w3.org/1999/xhtml" style="font-size:12px">';
                            
                            data += '<table id="' + index_table +  '" cellpadding="0" cellspacing="0" class="receipt-size"><tr><td style="width:150px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;">អ្នកកម្មង់ : <?php echo $order_by?></td><td colspan="2" style="text-align:right;width:130px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;">លេខតុ : <?php echo $table_name?></td></tr>';
                            data += '<tr><td style="width:150px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;">ថ្ងៃ : <?php echo $order_date?></td><td colspan="2" style="text-align:right;width:130px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;">ម៉ោង​:<?php echo $order_time?></td></tr>';

                            data+='<tr><td><br/><br/></td></tr>';

                            data += '<tr><td  style="border-top: black solid 1px;border-bottom: black solid 1px;width:150px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;">មុខម្ហូប</td><td style="text-align:center;border-top: black solid 1px;border-bottom: black solid 1px;width:65px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;">បរិមាណ</td>';
                            data += '<td style="text-align:center;border-top: black solid 1px;border-bottom: black solid 1px;width:65px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;">ចំណាំ</td></tr>';
                            
                          
                            $.each(e.Item,function(j,t){
                                 var notes='';
                                    var total=t.sale_note.length;
                                    $.each(t.sale_note,function(l,m){
                                        var slas='';
                                        if(l!=total-1){
                                            slas='/';
                                        }
                                        notes+=m.item_note_name+slas;
                                    });
                                item += '<tr><td style="width:150px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;border-bottom: 1px dashed black;">'+t.item_name+'</td><td style="text-align:center;width:65px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;border-bottom: 1px dashed black;">'+t.qty+'</td><td style="text-align:center;width:65px;font-weight: bold;font-size: 14px;font-family: Khmer OS Battambang;border-bottom: 1px dashed black;">'+notes+'</td></tr>';
                            });
                            
                            data += item + '</table>';
                            footer += '</div>';
                            footer += '</foreignObject>';
                            footer += '</svg>';
                            $("#div").append(data);
                            var width = $("#div").width();
                            var height = $("#"+index_table).height();
                            ctx.canvas.width = width;
                            ctx.canvas.height = height;
                            
                            var data_encode = encodeURIComponent(header+data+footer);
                            var img = document.createElement('img');
                            img.src = "data:image/svg+xml," + data_encode;
                            img.onload = function() {
                                ctx.drawImage(img, 0, 0);
                                if(e.is_print>0){
                                    appendFileAndSubmit(canvas.toDataURL(),e.printer_name,receipt);return;
                                }
                                
                            };
                            
                    });
                    /*setTimeout(function(){
                        window.close();
                    }, 1);*/
                      //window.close();  
                      //showTost("Items were printed");
                      //update_item_printed(receipt);
                    } catch(err){
                        alert('erro');
                        return;
                    }
                },
                error: function (response) {
                    showTost('No items printed!');
                    //update_item_printed(receipt);
                }
            });
            
        }
        
        function appendFileAndSubmit(base64,printer_name,temp){
//            console.log(base64);
            var block = base64.split(";");
            var realData = block[1].split(",")[1];// In this case "iVBORw0KGg...."
            var receipt = "<?php echo $receipt?>";
            var post_url = "<?php echo site_url("cashier_order/print_out")?>";
            post_url = "http://127.0.0.1/rms_web_basic/index.php/cashier_order/print_out";
            $.ajax({
                type: 'POST',
                url: post_url,
		        async:false,
                dataType:'JSON',
                data:{"realData":realData,"receipt":receipt,"printer":printer_name},
                success: function (response) {
                    if(response=="1"){
                        update_item_printed(temp);
                    }else{
                        alert("ព្រីនបរាជ័យ / Printing not successed!!!");
                    }
                    window.close();
                },
                error: function (response) {
                    alert("ព្រីនបរាជ័យ / Printing not successed!!!");
                    window.close();
                }
               
            });
        }
        function update_item_printed(master_id){
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url("cashier_order/update_sale_detail_printed")?>",
		        async:false,
                data:{"master_id":master_id},
                success: function (){
                },
                error: function (){
                }
            });
        }
        function showTost(msg) {
            var x = document.getElementById("snackbar");
            x.className = "show";
            x.innerHTML = msg;
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
        }
    </script>
</html>
