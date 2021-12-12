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
        <style>
            .hide_me {display: none;}
            .btn {
            color: #fff; 
            margin-left: 5px;
        }
        .table-table th {
            color: #FFFFFF;
            background-color: #13224B;
            height: 30px;
        }
        .fa-trash-o:before {
            font-size: 23px;
            content: "\f014";
            color: red;
        }
        </style>
    </head>
    <body>
 <script type="text/javascript">
       
 </script>

        <form action="<?php echo site_url("purchase_pay/save");?>" method="post" style="background-color: white;">
            <div class="panel panel-default">
                 <div class="panel-heading"><h3 class="text-center text-primary">Purchase Pay</h3></div>
                 <br>
                <div class="row">
                      <div class="col-md-12" >
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group">
                                     <label for="supplier"><?php echo $lbl_sup?>: <span class="star">*</span></label>
                                     <input  hidden type='text' name='txtno' id='txtno' readonly value="<?php echo "No"//$no; ?>">

                                     <input type='text' hidden name='txtsup_id' id='txtsup_id' value="">
                                     <input readonly type="txtsupplier" class="form-control form-custom" name="txtsupplier" id="txtsupplier">
                                     <div class="border"></div>
                                </div>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group">
                                     <label for="supplier"><?php echo $lbl_total_credit_amount;?>: <span class="star">*</span></label>
                                     <input readonly type="text" class="form-control form-custom" name="txtamountcredit" id="txtamountcredit">
                                     <div class="border"></div>
                                </div>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group">
                                     <label for="supplier"><?php echo $lbl_pay_date?>: <span class="star">*</span></label>
                                     <input  disabled type="text" class="form-control form-custom" name="txtdate" id="txtdate" value="<?php echo $date_now?>">
                                     <div class="border"></div>
                                </div>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group">
                                     <label for="supplier"><?php echo $lbl_amount?>: <span class="star">*</span></label>
                                     <input type="text" autocomplete="off" class="form-control form-custom" name="txtpay" id="txtpay" value="<?php echo 0.00?>">
                                     <div class="border"></div>
                                </div>
                           </div>
                           <div hidden class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group">
                                     <label for="supplier">  <?php echo "discount"//$lbl_discount?>($): <span class="star">*</span></label>
                                     <input type='text' class="allow-decimal my_blur" name='txtdiscount' id='txtdiscount' onchange="discount()" value="0.00">
                                     <div class="border"></div>
                                </div>
                           </div>
                           <div  hidden class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group">
                                     <label for="supplier">Description: <span class="star"></span></label>
                                     <input type="txt_supplire" class="form-control form-custom" name="txt_supplire">
                                     <div class="border"></div>
                                </div>
                           </div>

                      </div>          
                </div>
                <div class="row">
                     <div class="col-md-12">
                          <div class="panel-footer">
                              <input type='button' name="btn_list" id="btn_list" value="<?php echo "To List";?>" class="btn btn-danger pull-right"/>
                              <input type='button' name="btncancel" id="btncancel" value="<?php echo $btn_cancel?>" class="btn btn-danger pull-right"/>
                              <input type="button" name="btnSave" id="btnSave" value="<?php echo $btn_save;?>" class="btn btn-primary pull-right"/>
                          </div>
                     </div>
                </div>
                          
            </div>

            <table width='100%' cellspacing='0' cellpadding='0' class="table-table" id="table-table">
                <thead>
                     <tr>
                        <th><?php echo $lbl_no?></th>
                        <th><?php echo $lbl_amount_paid?></th>                    
                        <th><?php echo $lbl_create_date?></th>
                        <th><?php echo $lbl_recorder?></th>
                        <th style="text-align: center"><?php echo $lbl_delete;?></th>
                    </tr>
                </thead>
               <tbody>
                   
               </tbody>
                
                <tfoot>
                    <tr style="background-color:#9fc0e8;font-weight: bold;" >
                        <td style="color: red;"><?php echo "Total Paid"//$lbl_total_paid?>: </td>
                        <td style="color: red;" id="txt_total_pay"><?php echo number_format(0,2); ?></td>
                        <td colspan="3"></td>

                    </tr>
                </tfoot>
                
            </table>
        </form>
       
        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function($) {


                var id="<?php echo $id?>";

                load_master_data(id);
                load_data(id);

                $('#btncancel').on('click',function(){
                    $('#txtpay').val(0);
                    $('#txtdiscription').val('');
                });


                $("#txtdate").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#bigger").hide();
                $('#txtpay').select();
                $('#txtpay').on('focusout',function(){
                   
                  //  alert($('#txtpay').val());
                  //  alert( $('#txtamountcredit').val());
          
                   if( parseInt($('#txtpay').val()) >  parseInt($('#txtamountcredit').val())){   
                    
                       $("#btnSave").addClass('hide_me');
                       $("#bigger").show();
                   }else{
                       $("#btnSave").removeClass('hide_me');
                       $("#bigger").hide();
                   }
                   
               });

               $("#btnSave").on('click',function(e){

                    var pay  = $('#txtpay').val();
                    if(pay == 0 || pay ==null || pay ==''){
                        alert('Your pay amount is 0!!');
                        return false;
                    }
                    var total_credit=$('#txtamountcredit').val();
                    if(parseFloat(total_credit)==0){
                        alert('Your Credit Amount is 0!!');
                        return false;
                    }
                    if (window.confirm('Are you sure to save this pay?')) {
                        save();
                    }
               });
               $('#btn_list').on('click',function(){
                    window.open('<?php echo site_url('report_purchase_dept')?>','_self');
               })
               


                $('#txtdiscount').on('input',function(){
                    var pay=$('#txtpay').val();
                    var total=$('#txtamountcredit').val();
                    var dis=$('#txtdiscount').val();
                    var dis_pay=(Number(dis)+Number(pay));
                    //alert(dis_pay);
                    if(dis_pay>total){
                        alert('Invalid Discount!!');
                        $(this).val(0);
                        return false;

                    }
                })

                $('#txtpay').on('input',function(){

                    var pay=$('#txtpay').val();
                    var total=$('#txtamountcredit').val();

                    if(parseFloat(pay)>parseFloat(total)){
                        alert('Invalid Pay Amount!!');
                        $(this).val(0);
                        return false;

                    }
                })


            });
            function del(po_pay_id,po){
                if (window.confirm('Are you sure to delete this purchase?')) {

                    var post_url = '<?php  echo site_url('report_purchase_dept/delete') ?>';
                         $.ajax({
                            type: 'POST',
                            url: post_url,
                            ContentType: 'application/json',              
                            data: {'po_pay_id':po_pay_id,'po_id':po},                    
                            success: function (data) {

                                var json = $.parseJSON(data);
                                console.log(data);

                                if (json.statusCode != 'E0001') {
                                    alert(json.message);
                                    load_data(po);
                                    load_master_data(po);
                                    $('#btncancel').click();
                                   
                                    
                                    //load_po_id();
                                   

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
                    

                }

            function load_data(id){
                  
                        $('.table-table tbody').html('');

                        var post_url = '<?php echo site_url('report_purchase_dept/load_all') ?>'+'/'+id;
                  
                    $.ajax({
                        type: 'POST',
                        dataType: "text",
                        url: post_url,
                        async: false,
                        data: {'po_id': id},
                        success: function (response) {
                             
                               
                            if (response.trim() !== '[]' || response.trim() !== '') {
                                    
                                    var html_str="";
                                    var list = JSON.parse(response);
                                   

                                    for (var i = 0; i < list.length; i++) {
                                        var del='<a onclick="del('+list[i].purchase_pay_id+','+list[i].purchase_no+')" href="javascript:void(0)" <i class="fa fa-trash-o"></i></a>';
                                        $('.table-table').append('<tr> <td>'+(i+1)+'</td> <td>'+list[i].purchase_pay_amount+'</td> <td>'+list[i].purchase_pay_date+'</td> <td>'+list[i].recorder+'</td> <td style="text-align: center">'+del+'</td></tr>');

                                        //alert(list[i].purchase_detail_item_detail_id);
                                        //$('.table-table').append('<tr id="row'+list[i].purchase_detail_item_detail_id+'"><td class="hidden po">'+list[i].purchase_detail_item_detail_id+'</td> <td class="hidden po">'+list[i].measure_id+'</td> <td>'+(i+1)+'</td> <td>'+list[i].item_detail_part_number+'</td ><td>'+list[i].item_detail_name+'</td> <td>'+list[i].measure_name+'</td> <td>'+list[i].purchase_detail_qty+'</td> <td>'+list[i].purchase_detail_unit_cost+'</td> <td>'+list[i].purchase_detail_total_amount+'</td> <td>'+list[i].stock_location_name+'</td> <td class="hidden">'+list[i].stock_location_id+'</td> <td class="hidden">'+list[i].measure_qty+'</td> <td><a onclick="edit('+(i+1)+',\''+list[i].item_detail_part_number+'\',\''+list[i].item_detail_name+'\','+list[i].purchase_detail_item_detail_id+','+list[i].purchase_detail_qty+','+list[i].purchase_detail_unit_cost+','+list[i].stock_location_id+','+list[i].measure_id+','+list[i].purchase_detail_id+');" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td> <td><a onclick="del('+list[i].purchase_detail_id+','+list[i].purchase_no+','+list[i].stock_location_id+')" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Del</a></td></tr>');
                                    }
                              
                                    
                                   
                                    
                                
                                   
                            }
                        }
                        ,
                        error: function (response) {
                            alert('Unable to load sale data!!');
                        }
                    });
                }

                
            function load_master_data(id) {
                      
                        var post_url = '<?php echo site_url('report_purchase_dept/load_master') ?>'+'/'+id;
                   
                   
                  
                    $.ajax({
                        type: 'POST',
                        dataType: "text",
                        url: post_url,
                        async: false,
                        data: {'po_id': id},
                        success: function (response) {
                             
                               
                            if (response.trim() !== '[]' || response.trim() !== '') {
                                    
                                    var html_str="";
                                    var list = $.parseJSON(response);       
                                    $('#txtsupplier').val(list.supplier);
                                    var credit=list.credit;
                                    if(credit=="" || credit==null){
                                        credit=0;
                                    }
                                    
                                    $('#txtamountcredit').val(numeral(credit).format('#.00'));
                                    $('#txt_total_pay').html(numeral(list.total_pay).format('#.00'));

                            }
                        }
                        ,
                        error: function (response) {
                            alert('Unable to load sale data!!');
                        }
                    });
                }
                
                function save(){

                    var po="<?php echo $id?>";
                    var dates=$('#txtdate').val();
                    var pay=$('#txtpay').val();
                    var desc=$('#txtdiscription').val();
                    var datastring  = "po="+po+"&dates="+dates+"&pay="+pay+"&desc="+desc;
                    
                    var post_url = '<?php  echo site_url('report_purchase_dept/save')?>';
                 $.ajax({
                    type: 'POST',
                    url: post_url,
                    ContentType: 'application/json',              
                    data:datastring,                    
                    success: function(data){

                        var json = $.parseJSON(data);
                        console.log(data);

                        if (json.statusCode != 'E0001') {
                            alert(json.message);
                            load_data(po);
                            load_master_data(po);
                            $('#btncancel').click();
                            var check=$('#txtamountcredit').val();
                  
                            if(check==0)
                                $('#btn_list').click();
                            
                            //load_po_id();
                            //window.open("<?php echo site_url("report_purchase_dept"); ?>","_self");

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
        
        /*$('#btnSave').on('click',function(){
            alert(1);
                    if (window.confirm('Are you sure to save this pay?')) {
                        save();
                    }
                    

                });*/
            
        </script>

    </body>
</html>
