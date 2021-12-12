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
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
    </head>
    <body>      
    <form class="formSale" action="<?php echo site_url("ingredient/save"); ?>" method="POST" id="form">
        <table width="100%" cellspacing="0" cellpadding="0" border="1" style="font-family: Calibri;font-size: 15px;">
            <tr>
                <td colspan="2" class="form-title"><?php echo $lbl_ingredient_title;?></td>
            </tr>
            <tr>
                <td width="30%" style="vertical-align: top;">
                    <table width="100%" class="table-form">
                        <tr>
                            <td colspan="2" class="form-note "><label class="star"> *</label><?php echo $lbl_note_for_form;?></td>
                        </tr>
                        <tr class="field-title">

                        </tr>
                        <tr class="hidden">
                            <td>Ingredient Nº</td>
                            <td><input type="text" name="txtno" id="txtno" value="<?php echo $ingredient_no ?>"></td>
                        </tr>
                        <tr class="hidden">
                            <td>Ingredient</td>
                            <td>
                                <select name="select_ingredient" id="select_ingredient" class="cbo-srieng">                        
                                    <option value="0">--Ingredient--</option>
                                    <?php
                                    foreach ($records_ingredient as $rt) {
                                        ?>
                                        <option value="<?php echo $rt->item_detail_id; ?>"><?php echo $rt->item_detail_name; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $lbl_ingredient;?></td>
                            <td>
                                <input type="text" name="txt_ingredient" id="txt_ingredient" required>
                                <input type="text" name="txt_ingredient_id" id="txt_ingredient_id"  required hidden>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $lbl_qty;?></td>
                            <td>
                                <input type="text" name="txt_qty" id="txt_qty" autocomplete="off" value="0" class="my_blur allow-decimal" required>
                                
                            </td>

                        </tr>
                        <tr class="hidden">
                            <td> Measure <label class="star"> *</label></td>
                            <td>
                                <select name="cbo_measure" id="cbo_measure" class="cbo-srieng">                        
                                    <option value="0">--Measure--</option>
                                    <?php
                                    foreach ($record_measure as $rt) {
                                        ?>
                                        <option value="<?php echo $rt->measure_id; ?>"><?php echo $rt->measure_name; ?></option>
                                    <?php } ?>
                                </select>
                                <a href="<?php echo site_url('measure/addnew'); ?>">New</a>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $lbl_desc;?></td>
                            <td> 
                                <input type="text"  name="txt_description" id="txt_description" class="txt-address">
                            </td>
                        </tr>

                        <tr class="field-title">
                            <td colspan="2" style="text-align: right">
                                <input type="button" name="btnSave" id="btn_add" class="btn-srieng"  value="+<?php echo $btn_add;?>"/>
                                <input type="reset" name="btnCacel" class="btn-srieng"  value="<?php echo $btn_cancel;?>" onclick="back()"/>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align: top;">
                    <table width="100%" class="table-form">
                            <tr>
                                <td colspan="2">
                                <?php echo $lbl_food_name;?>
                                <input type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="SEARCH PRODUCT">
                                <a href="<?php echo site_url('item_detail/addnew'); ?>"><?php echo $lbl_new;?></a>
                            </tr>
                            <tr class="hidden">
                                <td>Product Id<label class="star"> *</label></td>
                                <td><input type="text" name="txtpro_id" id="txtpro_id" placeholder="Product Id"></td>
                            </tr>
                            <tr class="hidden">
                                <td>Edit id<label class="star"> *</label></td>
                                <td><input type="text" name="txt_inc_id" id="txt_inc_id" placeholder="Inc Id"></td>
                            </tr>
                            <tr class="hidden">
                                <td><?php echo $lbl_no;?><label class="star"> *</label></td>
                                <td><input type="text" name="txt_no" id="txt_no" placeholder="No"></td>
                            </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" cellspacing="0" class="table-table table" id="table-table" cellpadding="0">
                                    <thead>
                                        <tr style="background-color: #37773A;">
                                            <th><?php echo $lbl_no;?></th>
                                            <th><?php echo $lbl_ingredient;?></th>
                                            <th><?php echo $lbl_amount;?></th>
                                            <th class="hidden">Measure</th>
                                            <th style="text-align:  center;"><?php echo $lbl_action;?></th>
                                        </tr>
                                    </thead>
                                </table>
                           </td>
                        </tr>
                        <tr>
                            <td style="text-align: right" colspan="2">
                                <input type="button" name="btnSave" id="btnSave" value="<?php echo $btn_save;?>" class="btn-srieng"/>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
            </table>
          </form>
        <script type="text/javascript">
        $('#txt_product_name').autocomplete({

                    source: function( request, response){
                            $.ajax({
                                    url : '<?php echo site_url("ingredient/searchproduct"); ?>',
                                    dataType: "json",
                                    data: {
                                       name_startsWith: request.term,
                                       type: 'product_with_ingredient',
                                       row_num : 1
                                    },
                                     success: function( data ) {
                                             response( $.map( data, function( item ) {
                                                    var code = item.split("|");
                                                    return {
                                                            label: code[0],
                                                            value: code[0],
                                                            data : item
                                                    }
                                            }));
                                    }
                            });
                    },
                    autoFocus: true,	      	
                    minLength: 0,
                    /*select: function( event, ui ) {
                            
                            var names = ui.item.data.split("|");						
                            $('#txtpro_id').val(names[1]);
 
                }	*/   
                change:function(event,ui){
                    if(ui.item===null){
                        $(this).val('');
                        $('#txtpro_id').val('');
                    }else{
                        var names = ui.item.data.split("|");                        
                        $('#txtpro_id').val(names[1]);
                    }
                }   	
            });
        
        $('#txt_ingredient').autocomplete({

                    source: function( request, response){
                            $.ajax({
                                    url : '<?php echo site_url("ingredient/searchproduct"); ?>',
                                    dataType: "json",
                                    data: {
                                       name_startsWith: request.term,
                                       type: 'ingredient_table',
                                       row_num : 1
                                    },
                                     success: function( data ) {
                                             response( $.map( data, function( item ) {
                                                    var code = item.split("|");
                                                    return {
                                                            label: code[0],
                                                            value: code[0],
                                                            data : item
                                                    }
                                            }));
                                    }
                            });
                    },
                    autoFocus: true,	      	
                    minLength: 0,
                    /*select: function( event, ui ) {
                            
                            var names = ui.item.data.split("|");						
                            $('#txtpro_id').val(names[1]);
 
                }	*/   
                change:function(event,ui){
                    if(ui.item===null){
                        $(this).val('');
                        $('#txt_ingredient_id').val('');
                    }else{
                        var names = ui.item.data.split("|");                        
                        $('#txt_ingredient_id').val(names[1]);
                    }
                }   	
            });
        
        $('.my_blur').on('blur',function(){
            var vals=$(this).val();
            if(vals=="" || vals==null){
              $(this).val(0);
            }
        });

        $('.allow-decimal').bind("paste", function (e) {
            var text = e.originalEvent.clipboardData.getData('Text');
            if ($.isNumeric(text)) {
                if ((text.substring(text.indexOf('.')).length > 4) && (text.indexOf('.') > -1)) {
                    e.preventDefault();
                    $(this).val(text.substring(0, text.indexOf('.') + 3));
                }
            } else {
                e.preventDefault();
            }
        });

        $('.allow-decimal').keypress(function (event) {
    var $this = $(this);
    if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
            ((event.which < 48 || event.which > 57) &&
                    (event.which != 0 && event.which != 8))) {
        event.preventDefault();
    }

    var text = $(this).val();
    if ((event.which == 46) && (text.indexOf('.') == -1)) {
        setTimeout(function () {
            if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
            }
        }, 1);
    }

    if ((text.indexOf('.') != -1) &&
            (text.substring(text.indexOf('.')).length > 3) &&
            (event.which != 0 && event.which != 8) &&
            ($(this)[0].selectionStart >= text.length - 2)) {
        event.preventDefault();
    }
});
        $('#btnSave').on('click',function(){
            var pro_name=$('#txt_product_name').val();
            if(pro_name=="" || pro_name==null){
                alert('Food Name Not allow Empty!!');
                return false;
            }
            save();

        });

        $('#btn_add').on('click',function(){
//          var inc=$('#select_ingredient').val();
//          if(inc==0){
//                alert('Please select Ingredient !!');
//                return false;
//          }
            var inc=$('#txt_ingredient').val();
            if(inc==0){
                alert('Please select Ingredient !!');
                return false;
            }
            add();

        });
        function save(){
            var item_id=$('#txtpro_id').val();
            var table = $(".table tbody");
            var no=$('#txtno').val();
                //var thead=$("table").find("thead").find("tr").find("th").length;      
                var values=[];
                 table.find('tr').each(function (i, el) {
                     
                     var $tds = $(this).find('td');
                     values.push({
                        inc_id:  $tds.eq(0).text(),
                        qty:  $tds.eq(3).text()
                      
                    });
                   
                 });
                 var data=JSON.stringify(values);
                //alert(data);
                var post_url = '<?php  echo site_url('ingredient/save') ?>';
                 $.ajax({
                    type: 'POST',
                    url: post_url,
                    ContentType: 'application/json',              
                    data: {'item_id':item_id,'data': data,'no':no},                    
                    success: function (data) {

                        var json = $.parseJSON(data);
                        console.log(data);

                        if (json.statusCode != 'E0001') {
                            alert(json.message);
                            
                            //load_po_id();
                            window.open("<?php echo site_url("ingredient"); ?>","_self");

                        } else {
                            alert(json.message);

                        }
                         //$('#save_po').loadingBtnComplete({html: "<i class='fa fa-fw fa-lg fa-check-circle'></i>Save"});
                    },
                    error: function (data) {
                        alert('error');
                    }
                });

        }
        function del(inc){
             $('#row'+inc+' ').remove();
             clear();

        }
        function edit(inc,inc_name,qty,n){
            $('#select_ingredient').val(inc);
            $('#txt_ingredient').val(inc_name);
            $('#txt_ingredient_id').val(inc);
            $('#txt_qty').val(qty);
            $('#txt_inc_id').val(inc);
            $('#txt_no').val(n);
        }
        function clear(){
            $('#select_ingredient').val(0);
            $('#txt_ingredient').val("");
            $('#txt_ingredient_id').val(0);
            
            $('#txt_qty').val(0);
            $('#txt_description').val('');
            $('#txt_inc_id').val('');
        }
        function add(){
            //var inc=$('#select_ingredient').val();
            //var inc_name=$('#select_ingredient option:selected').text();
            var inc=$('#txt_ingredient_id').val();
            var inc_name=$('#txt_ingredient').val();
            var qty=$('#txt_qty').val();
            var id_edit=$('#txt_inc_id').val();
            
            
            var rowCount = '';
            if(id_edit==""){
                rowCount = ($('.table tr').length);
            }else{
                rowCount=$('#txt_no').val();
            }
           
            var edit_del='<td class="text-center"><a onclick="edit('+inc+','+"'"+inc_name+"'"+','+qty+','+rowCount+')" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> <a onclick="del('+inc+')" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Del</a></td>';
            if(id_edit==""){
                if ($('.table td.inc:contains("'+inc+'")').length ) {
                    alert("Ingredient Exist!!");
                    return false;
                }
                 
                $('.table').append('<tr id="row'+inc+'"><td class="hidden inc">'+inc+'</td><td>'+rowCount+'</td><td>'+inc_name+'</td><td>'+qty+'</td>'+edit_del+'</tr>');
                clear();

            }else{
                if ($('.table td.inc:contains("'+inc+'")').length ) {
                    if(id_edit!=inc){

                   
                        alert("Ingredient Exist!!");
                        return false;
                    }
                    
                }
                $('.table').find('#row'+id_edit+'').replaceWith('<tr id="row'+inc+'"><td class="hidden inc">'+inc+'</td><td>'+rowCount+'</td><td>'+inc_name+'</td><td>'+qty+'</td>'+edit_del+'</tr>');
                clear();
            }

            
            

        }
        </script>
    </body>
</html>
