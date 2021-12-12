<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PURCHASE</title>
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
         <script type="text/javascript">
              function goBack() {
                    if(confirm('Do you want to go back!')){
                        window.history.back();
                    } 
              }
        </script>
        <style type="text/css">
            .table-table th {
                    color: #FFFFFF;
                    background-color: #137b80;
                }
        </style>
        <script type="text/javascript">

            $(document).ready(function ()
            {
                //$('#btnSave_all').prop('disabled','true');

                $("#cbo_measure").change(function ()
                {

                    var id = $(this).val();
                    var dataString = 'id=' + id;

                    $.ajax
                            ({
                                type: "POST",
                                url: "<?php echo site_url("purchase/display_measure_qty"); ?>",
                                data: dataString,
                                cache: false,
                                success: function (data)
                                {
                                    $("#txt_measure_qty").val(data);
                                    update_total_stock();
                                }
                            });
                });
                 
            });
        </script>

        <script type="text/javascript">
            function autoselect(pro_id) {

                var id = pro_id;
                var dataString = 'id=' + id;

                $.ajax
                        ({
                            type: "POST",
                            url: "<?php echo site_url("purchase/display_product"); ?>",
                            data: dataString,
                            cache: false,
                            success: function (html)
                            {
                                $("#panel_product").html(html);
                            }
                        });

                $("#txtpartnumber").select();
                $("#txtQty").focus();
            }
        </script>
    </head>
    <body>
        <div class="container">
        <form class="table-form" method="POST" id="form_purchase">
            <div class="panel panel-default">

                <div class="panel-heading"><h3 class="text-center text-primary"><?php echo $lbl_title ?>
                </div></h3>

                <div class="panel-heading" style="text-align: left; background-color:#9999;" >
                    <div class="col-md-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_sup ?><span class="star"> *</span> <a href="<?php echo site_url("supplier/addnew")?>" ><?php echo $lbl_new ?></a></label>
                                <select class="form-control form-custom" name="cbo_supplier" id="cbo_supplier" required="">
                                    <?php

                                    foreach ($supplier as $sup) {
                                        ?>
                                        <option value="<?php echo $sup->supplier_id; ?>"><?php echo $sup->supplier_name; ?></option>
                                    <?php } ?>
                                </select>
                                <input class="form-control form-custom hidden" type="text" name="txt_supplier" id="txt_supplier" autocomplete="off" placeholder="<?php echo $lbl_supplier ?>" required >
                                    <input type="text" name="txtsupplier_id" id="txtsupplier_id" class="hidden">
                                    <input type="text" name="txt_no" id="txt_no" class="hidden">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_ref ?><span class="star"></span></label>
                                <input class="form-control form-custom text_input" type="text" name="txtrefno" id="txtrefno" autocomplete="off" placeholder="Ref.Note">
                                <div class="border"></div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_date ?><span class="star"> *</span></label>
                                <input  class="form-control form-custom txt_date" type=text id="txtDate" name="txtDate"  value="<?php echo $date_now ?>"/>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_desc ?><span class="star"></span></label>
                                <textarea rows="1" class="form-control form-custom" name="txtDesc" style="width:100%" id="txtDesc"></textarea>
                                <div class="border"></div>
                            </div>
                        </div>
                         <div class="clearfix"></div>
                     </div>
                     </div>
                      <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_branch ?><span class="star"> *</span></label>
                                <select class="form-control form-custom" name="cbo_branch" id="cbo_branch">
                                    <?php

                                    foreach ($branch as $rsl) {
                                        ?>
                                        <option value="<?php echo $rsl->branch_id; ?>"><?php echo $rsl->branch_name; ?></option>
                                    <?php } ?>
                                </select>
                                <input class="hidden" type="text"  id="txt_due_date" name="txt_due_date" value="<?php echo $date_now ?>"/>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_stock_name ?><span class="star"> *</span> <a class="hidden" href="<?php echo site_url('stock_location/addnew'); ?>"><?php echo $lbl_new ?></a></label>
                                <select class="form-control form-custom" name="cbo_sock_location" id="cbo_sock_location">
                                    <option value="0">--<?php echo $lbl_all_stock;?>--</option>
                                </select>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_part ?><span class="star"> *</span></label>
                                <input class="form-control form-custom" type="text" name="txtpartnumber" id="txtpartnumber" autocomplete="off" onkeypress="if (event.keyCode == 13) {
                                                //autoselect(this.value);
                                                return false;
                                            }" placeholder="<?php echo $lbl_part ?>">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_name ?><span class="star"> *</span></label>
                                <input class="form-control form-custom" type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="<?php echo $lbl_name ?>" required>
                                <input type="text" name="txtpro_id" id="txtpro_id" placeholder="Product Id" class="hidden">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_measure ?><span class="star"> *</span></label>
                                <select class="form-control form-custom" name="cbo_measure" id="cbo_measure">
                                    <option value="">--<?php echo $lbl_measure; ?>--</option>
                                        <?php
                                        foreach ($record_measure as $rm) {
                                            ?>
                                            <option value="<?php echo $rm->measure_id; ?>"><?php echo $rm->measure_name; ?></option>
                                        <?php } ?>
                                    </select>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hidden">
                            <div class="form-group">
                                <label><?php echo $lbl_measure_note ?><span class="star"> *</span></label>
                                <h id="measure_note" style="color: red;font-weight: bold;"></h>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_price ?><span class="star"> *</span></label>
                                <input class="form-control form-custom allow-decimal my_blur" type="text" id="txtPrice" value="0" name="txtPrice" placeholder="<?php  echo $lbl_input_price ?>" onchange="" autocomplete="off" value="0.00">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_qty ?><span class="star"> *</span></label>
                                <input  class="form-control form-custom allow-decimal my_blur" value="0" id="txtQty" name="txtQty" placeholder="<?php echo $lbl_qty ?>" onchange="" autocomplete="off" required>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_current_stock ?><span class="star"> *</span></label>
                                <input  class="form-control form-custom allow-decimal my_blur" value="0" id="txt_current_stock" name="txt_current_stock" placeholder="<?php echo $lbl_current_stock ?>" onchange="" autocomplete="off" readonly>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_total_stock ?><span class="star"> *</span></label>
                                <input  class="form-control form-custom allow-decimal my_blur" value="0" id="txt_total_stock" name="txt_total_stock" placeholder="<?php echo $lbl_total_stock ?>" onchange="" autocomplete="off" readonly>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_date_expired ?><span class="star"> *</span></label>
                                <input type=text id="txtDateExpire" name="txtDateExpire" class="form-control form-custom txt_date" autocomplete="off">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label><?php echo $lbl_date_alert ?><span class="star"> *</span></label>
                                <input  id="txtDateAlert" name="txtDateAlert" class="form-control form-custom txt_date" autocomplete="off">
                                <div class="border"></div>
                            </div>
                        </div>
                        <span id="alert_info" style="color:red;display: none;"><br> Date Alert must less than Date Expired !!!</span>
                    </div>
                    <div class="hidden">
                        <label class="star"> *</label><?php echo $lbl_note ?>
                        <span>No#<input type="text" name="txtno" id="txtno" value="<?php echo $purchase_no ?>"></span>
                        <span><?php echo "Total"//$lbl_total ?> :
                            <input type="text" id="txtTotal" name="txtTotal" placeholder="<?php echo ""; ?>" readonly>
                        </span>
                        <span>
                            Measure Qty <label class="star"> *</label>
                            <input type="text" id="txt_measure_qty" name="txt_measure_qty" placeholder="<?php echo "txt_measure_qty" ?>">
                        </span>
                        <span>Measure <label class="star"> *</label>
                            <select name="cbo_measure_" id="cbo_measure_" class="cbo-srieng">
                                <?php
                                foreach ($record_measure as $rt) {
                                    ?>
                                    <option value="<?php echo $rt->measure_id; ?>"><?php echo $rt->measure_name; ?></option>
                                <?php } ?>
                            </select>
                            <a href="<?php echo site_url('measure/addnew'); ?>"><?php echo $lbl_new ?></a>
                        </span>
                        <input value="0" id="txtaction" name="txtaction" />
                    </div>
                </div>
                <div class="panel-footer">
                    <button style="width: 60px;" class="btn btn-sad pull-left" name="btn_clear" id="btn_clear" type="button" ><?php echo $btn_clear?></button>
                    <button style="min-width: 60px;" class="btn btn-sad pull-left" name="btnSave" value="+Add" id="btnSave" type="button"><?php echo $btn_add ?></button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
        </div>
        <div class="col-md-12">
                        <form id="form_purchase_save" action="<?php echo site_url("purchase/save"); ?>" method="post">
                          <div style="background:#9999;min-height: 140px;">
                                <?php //echo "VAT %" ?><input class="hidden" tabindex="4" type="checkbox" id="chk_vat" name="chk_vat" value="10"/>

                                <div class="col-xs-6 col-sm-3">
                                  <div class="form-group">
                                  <label><?php echo $lbl_total; ?></label>
                                  <input class="form-control form-custom" type="text" id="txt_toal_amount" name="txt_toal_amount" value="<?php echo number_format(0, 2); ?>" readonly/>
                                  </div>
                                </div>

                                <div class="col-xs-6 col-sm-3">
                                  <div class="form-group">
                                  <label><?php echo $lbl_discount ?></label>
                                  <input type="text" class="allow-decimal my_blur form-control form-custom" value="0" id="discount_invoice" name="discount_invoice" autocomplete="off" value="0.00" />
                                  </div>
                                </div>

                                <div class="col-xs-6 col-sm-3">
                                  <div class="form-group">
                                  <label><?php echo $lbl_grand_total; ?></label>
                                  <input class="form-control form-custom" type="text" id="txt_grand_toal" name="txt_grand_toal" value="<?php echo number_format(0, 2); ?>" readonly/>
                                  </div>
                                </div>

                                <div class="col-xs-6 col-sm-3">
                                  <div class="form-group">
                                    <label for="desposit"><span id="textdep" ><?php echo $lbl_deposit ?></span></label>
                                    <input class="form-control form-custom" type="text" id="desposit"  class="allow-decimal my_blur"  name="desposit" value="0.00" />
                                  </div>
                                </div>

                                <hr style="width:100%;margin:10px 0px;">
                                <div class="col-xs-6">
                                  <div class="form-group">
                                    <input class="form-control form-custom" style="height:20px;width:20px;display:inline;margin-top:0; margin-right:10px;" type="checkbox" id="chPaid" name="chPaid" value="1" />
                                    <label><?php echo $lbl_paid ;?></lable>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                     <button onclick="goBack()" type="button" name="btnback" id="btnback" value="Save" class="btn btn-md btn-sad pull-right"><?php echo "Back" ?></button>
                                  <button  type="button" name="btnSave_all" id="btnSave_all" value="Save" class="btn btn-md btn-sad pull-right"><?php echo $btn_save ?></button>
                                </div>
                          </div>

                            <div colspan="2" id='purchase_panel'>
                                <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
                                    <thead>
                                        <tr style="background-color: #37773A;">
                                             <th><?php echo "Nº " ?></th>
                                            <th><?php echo $lbl_part; ?></th>
                                            <th width='150px'><?php echo $lbl_name ?></th>

                                            <th><?php echo $lbl_qty; ?></th>
                                            <th><?php echo $lbl_measure ?></th>
                                            <th><?php echo $lbl_price ?></th>
                                             <th><?php echo $lbl_retail_qty; ?></th>
                                            <th><?php echo $lbl_retail_amount; ?></th>



                                            <th><?php echo $lbl_total ?></th>
                                            <th><?php echo $lbl_stock ?></th>
                                            <th><?php echo $lbl_date_expired ?></th>
                                            <th><?php echo $lbl_date_alert ?></th>
                                            <th><?php echo $lbl_edit ?></th>
                                            <th><?php echo $lbl_delete ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--  <tr>
                                            <td>1</td> <td>P001</td ><td>Coca</td> <td>Unit</td> <td>10</td> <td>1</td> <td>10</td> <td>Main Stock</td> <td><a onclick="edit();" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td> <td><a href="javascript:void(0)" onclick="del()">Del</a></td>
                                        </tr>  -->
                                    </tbody>


                                </table>
                            </div>
                            <div id="loading" onclick="hide_loading()">
                                <br><center><img src="<?php echo base_url('img/loading.gif'); ?>" width="20px" /><br>Loading Purchase Data...</center>
                            </div>
                            <span colspan="2"><?php echo $this->session->flashdata('error'); ?></span>
                        </form>
                    </div>

        <script type="text/javascript">
            ////////
           function load_qty_measure(){
              var id_measure = $('select#cbo_measure').val();
               $.ajax({
                  url: "<?=site_url("purchase/load_measure_qty")?>"+"/"+id_measure,
                  cache: false,
                  success: function(data){
                    /////
                    var json  = JSON.parse(data);
                    console.log(json);
                    $.each(json, function( key, value ) {
                           $('#txt_measure_qty').val(value.measure_qty);
                             update_total_stock();
                        });
                     }
                });
           }
            function update_total_stock(){
                var measure_qty = 1;
                var p_qty =0;
                var current_qty = $("#txt_current_stock").val();
                if($("#txt_measure_qty").val()!=""){
                    measure_qty = $("#txt_measure_qty").val();
                }
                if($("#txtQty").val()!=""){
                    p_qty =$("#txtQty").val();
                }

                var total_stock = numeral(current_qty).value()+(numeral(p_qty).value()*numeral(measure_qty).value());

                $("#txt_total_stock").val(total_stock);
            }

            $.noConflict();
            jQuery(document).ready(function ($){
                var id=$("#cbo_branch").val();
                $('#cbo_sock_location').html('');
                $.ajax({
                    url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_sock_location').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                        })
                    }
                })

                $("#txtQty").change(function(e){
                    update_total_stock();
                });

                $('#txtQty').focus(function(e){
                    if($('#txtQty').val()=='0'){
                        $('#txtQty').val('');
                    }
                });

                $('#txtPrice').focus(function(e){
                    if($('#txtPrice').val()=='0'){
                        $('#txtPrice').val('');
                    }
                });

                $("#txtsupplier_id").val($("#cbo_supplier").val());


                $("#cbo_supplier").change(function(e){
                    $("#txtsupplier_id").val($("#cbo_supplier").val());
                });

                $('#alert_info').hide();
                $("#txtDate").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#txtDateExpire").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#txtDateAlert").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#txt_due_date").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                hide_loading(0);

                $('#chPaid').click(function () {
                    var grand_toal=$('#txt_grand_toal').val();
                    if ($('#chPaid').is(':checked')) {

                        $('#desposit').attr('readonly',true);
                        $('#chPaid').val(0);
                        $('#desposit').val(parseFloat(grand_toal).toFixed(dot_num));
                    } else {
                        $('#desposit').attr('readonly',false);
                        $('#desposit').val('0.00');
                        $('#desposit').focus();
                        $('#chPaid').val(1);
                    }
                });
                //cusor leave form txt_supplier
                $('#txt_supplier').focusout(function () {
                    $('#txtrefno').focus();
                });
                //cusor leave form txt_product_name
                $('#txt_product_name').focusout(function () {
                    $('#txtQty').focus();
                });
                //cusor leave form txtQty
                $('#txtQty').focusout(function () {
                    $('#txtPrice').select();
                });
                //cusor leave form txtQty
                $('#txtDateAlert').change(function () {
                    var alerts = $('#txtDateAlert').val();
                    var expired = $('#txtDateExpire').val();

                    if (alerts > expired) {
                        $('#alert_info').show();
                        $('#btnSave').hide();
                    } else {
                        $('#alert_info').hide();
                        $('#btnSave').show();
                    }
                    //$('#txtDate').focus();
                });
                //cusor leave form txtQty
                $('#btnCacel').click(function () {
                    $('#txtpartnumber').focus();
                    $('#btnSave').show();
                    $('#alert_info').hide();
                });



                //cusor leave form txtQty
                $('#btnSave_all').click(function () {
                    var needpay = $('#txt_grand_toal').val();
                    var desposit=$('#desposit').val();
                    var tb_length=$("#table-table > tbody > tr").length;


                    if($('#cbo_supplier').val()==''){
                         alert('Supplier Cannot be blank!!!');
                        $('#txt_supplier').focus();
                        return false;
                    }

                    if($('#txtDate').val()==''){
                         alert('Purchase Date Cannot be blank!!!');
                        $('#txtDate').focus();
                        return false;
                    }
                    if($('#cbo_branch').val()==0){
                        alert('Please select Branch!!!');
                        $('#cbo_branch').focus();
                        return false;
                    }

                    if(parseFloat(desposit)>parseFloat(needpay)){
                         alert('Deposit Amount Invlid!!!');
                        $('#desposit').focus();
                        return false;
                    }

                    if(tb_length<=0){
                        alert('No Item to purchase!!');
                        return false;
                    }
                    if (window.confirm('Are you sure to save this purchase?')) {
                        save();
                    }

                });



                $('#btnSave').on('click', function () {
                    var price = $("#txtPrice").val();
                    if ($('#txt_product_name').val()=="") {
                        alert('Please Input Product Name');
                        $("#txt_product_name").focus();
                        return false;
                    }
                    if (price < 0 || price == '') {
                        alert('Please Input Price');
                        $("#txtPrice").focus();
                        return false;
                    }
                   /* if ($('#txtpartnumber').val() == '') {
                        alert('Item Name Cannot be blank!!!');
                        $('#txtpartnumber').focus();
                        return false;
                    }*/
                    if ($('#txtQty').val() <=0) {
                        alert("Quantity Cannot be blank!!!");
                        $('#txtQty').focus();
                        return false;
                    }

                    if ($("#txtPrice").val() == '0' || $("#txtPrice").val() == '') {
                        alert("Please Input Product Unit Price!!!");
                        $("#txtPrice").focus();
                        return false;
                    }

                    if ($("#cbo_measure").val() == '' || $("#cbo_measure").val() == null) {
                        alert("Product Don't have Measue!!! Please Choose Measure!!!");
                        //$("#cbo_measure").focus();
                        return false;
                    }
                    if ($("#cbo_sock_location").val() ==0) {
                        alert("Please Input Stock!!!");
                        $("#cbo_sock_location").focus();
                        return false;
                    }

                    if ($("#txtPrice").val() <0) {
                        alert("Please Input Product Unit Price!!!");
                        $("#txtPrice").focus();
                        return false;
                    }
                    add_po();

                });

                function add_po(){

                    var ex_date=$('#txtDateExpire').val();
                    var ex_alert=$('#txtDateAlert').val();
                    var part_number=$('#txtpartnumber').val();
                    var pro_name=$('#txt_product_name').val();
                    var qty=parseFloat( $('#txtQty').val());
                    var amount=numeral($('#txtPrice').val()).format('#.'+dot_0+'');
                    var measure_name=$('#cbo_measure option:selected').text();
                    var measure_id=$('#cbo_measure').val();
                    var stock_id=$('#cbo_sock_location').val();
                    var stock_name=$('#cbo_sock_location option:selected').text();
                    var no=$('.table-table tr').length;
                    var total=numeral(parseFloat(qty)*parseFloat(amount)).format('#.'+dot_0+'');
                    //var totals=parseFloat(qty)*parseFloat(amount);
                    //alert(totals);
                    var pro_id=$('#txtpro_id').val();
                    var no_update=$('#txt_no').val();
                    var measure_qty=$('#txt_measure_qty').val();
                    var qty_detail=qty*measure_qty;
                    var amount_detail=numeral(amount/measure_qty).format('#.'+dot_0+'');
                    if(no_update===""){
                        //  if ($('.table-table td.po:contains("'+pro_id+'")').length ) {
                        //     alert("Item Exist!!");
                        //     return false;
                        // }

                    $('.table-table').append('<tr id="row'+no+'"><td class="hidden po">'+pro_id+'</td> <td class="hidden po">'+measure_id+'</td> <td>'+no+'</td> <td>'+part_number+'</td ><td>'+pro_name+'</td>  <td>'+qty+'</td> <td>'+measure_name+'</td> <td>'+amount+'</td> <td>'+qty_detail+'</td> <td>'+amount_detail+'</td>  <td>'+total+'</td> <td>'+stock_name+'</td> <td class="hidden">'+stock_id+'</td> <td class="hidden">'+measure_qty+'</td><td>'+ex_date+'</td><td>'+ex_alert+'</td> <td><a onclick="edit('+no+',\''+part_number+'\',\''+pro_name+'\','+pro_id+','+qty+','+amount+','+stock_id+','+measure_id+',\''+ex_date+'\',\''+ex_alert+'\');" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td> <td><a onclick="del('+pro_id+',this)" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td></tr>');
                    }else{

                        $('.table-table').find('#row'+no_update+'').replaceWith('<tr id="row'+no_update+'"><td class="hidden po">'+pro_id+'</td> <td class="hidden po">'+measure_id+'</td> <td>'+no_update+'</td> <td>'+part_number+'</td ><td>'+pro_name+'</td> <td>'+qty+'</td> <td>'+measure_name+'</td> <td>'+amount+'</td> <td>'+qty_detail+'</td> <td>'+amount_detail+'</td>  <td>'+total+'</td> <td>'+stock_name+'</td> <td class="hidden">'+stock_id+'</td> <td class="hidden">'+measure_qty+'</td><td>'+ex_date+'</td><td>'+ex_alert+'</td> <td><a onclick="edit('+no_update+',\''+part_number+'\',\''+pro_name+'\','+pro_id+','+qty+','+amount+','+stock_id+','+measure_id+',\''+ex_date+'\',\''+ex_alert+'\');" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td> <td><a onclick="del('+pro_id+',this)" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Del</a></td></tr>');
                    }

                    totals();
                    clear();
                }








                function save(){
                    var ref_no=$('#txtrefno').val();
                    var table = $(".table-table tbody");
                    var po_date=$('#txtDate').val();
                    var dis=$('#discount_invoice').val();
                    var due_date=$('#txt_due_date').val();
                    var desc=$('#txtDesc').val();
                    var supplier=$('#txtsupplier_id').val();
                    var deposit=$('#desposit').val();
                    var grand_total=$('#txt_toal_amount').val();
                    var branch_id=$('#cbo_branch').val();
                    //alert(grand_toal);
                    var pro_id=$('#txtpro_id').val();


                    var values=[];
                     table.find('tr').each(function (i, el) {

                         var $tds = $(this).find('td');
                         values.push({
                            item_id:  $tds.eq(0).text(),
                            measure_id:  $tds.eq(1).text(),
                            qty:$tds.eq(5).text(),
                            amount:$tds.eq(7).text(),
                            t_amount:$tds.eq(10).text(),
                            stock_id:$tds.eq(12).text(),
                            measure_qty:$tds.eq(13).text(),
                            ex_date:  $tds.eq(14).text(),
                            ex_alert:  $tds.eq(15).text()
                        });

                     });
                 var data=JSON.stringify(values);
              /* alert(data);
                return false;*/
                var post_url = '<?php  echo site_url('purchase/save') ?>';
                 $.ajax({
                    type: 'POST',
                    url: post_url,
                    ContentType: 'application/json',
                    data: {'ref_no':ref_no,'branch':branch_id,'data': data,'po_date':po_date,'dis':dis,'due_date':due_date,'desc':desc,'supplier':supplier,'deposit':deposit,'grand_total':grand_total,'pro_id':pro_id},
                    success: function (data) {

                        var json = $.parseJSON(data);
                        console.log(data);

                        if (json.statusCode != 'E0001') {
                            alert(json.message);

                            //load_po_id();
                            window.open("<?php echo site_url("purchase"); ?>","_self");

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




            });
            // purchase
            function hide_loading(timeout) {
                $('#loading').slideUp(timeout);
            }
            function show_loading() {
                $('#loading').slideDown();
            }
            //show panel ajax when add
            function reload_order() {
                show_loading();
                var post_url = '<?php echo site_url('purchase/show_panel') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: true,
                    success: function (response) {
                        $('#purchase_panel').html(response);
                        hide_loading();
                    },
                    error: function (response) {
                        alert('Unable to load sale data!!');
                    }
                });
            }

            // function edit_click(e) {
            //     var id = $(e).attr('value');
            //     var post_url = '<?php echo site_url('purchase/read_purchase_detail') ?>';
            //     $.ajax({
            //         type: 'POST',
            //         url: post_url,
            //         data: {'id': id},
            //         success: function (response) {
            //             var datas = response.split(':');
            //             $('#txtpro_id').val(datas[0]);
            //             $('#txtpartnumber').val(datas[2]);
            //             $('#txt_product_name').val(datas[1]);
            //             $('#txtQty').val(datas[3]);
            //             $('#txtPrice').val(datas[4]);
            //             $('#cbo_sock_location').val(datas[5]);
            //             // $('#txtDate').val(datas[6]);
            //             $('#txtDateExpire').val(datas[8]);
            //             $('#txtDateAlert').val(datas[7]);
            //             $('#txtaction').val('1');
            //             $('#txtTotal').val(datas[3] * datas[4]);
            //             $('#cbo_measure').val(datas[9]);
            //             $('#txtpartnumber').attr('disabled', 'true');
            //             $('#txt_product_name').attr('disabled', 'true');
            //             $('#cbo_sock_location').attr('disabled', 'true');

            //         },
            //         error: function (response) {
            //             $('#msg').html(response);
            //         }
            //     });
            // }

            function edit(no,part,pro_name,pro_id,qty,amount,stock_id,measure_id,ex_date,ex_alert){
                    $('#txtpartnumber').val(part);
                    $('#txt_product_name').val(pro_name);
                    $('#txtpro_id').val(pro_id);
                    $('#txtQty').val(qty);
                    //$('#measure_note').html();
                    $('#txtPrice').val(amount);
                    $('#cbo_measure').val(measure_id);
                    $('#cbo_sock_location').val(stock_id);
                    $('#txt_no').val(no);
                    $('#txtpartnumber').attr('readonly',true);
                    $('#txt_product_name').attr('readonly',true);
                    $('#btnSave').text('<?php echo $btn_save ?>');
                    $('#txtDateExpire').val(ex_date);
                    $('#txtDateAlert').val(ex_alert);
                    load_qty_measure();
                    topFunction();
            }
             function topFunction(){
                  document.body.scrollTop = 0;
                  document.documentElement.scrollTop = 0;
                }
            function del(id,att){

                    //$('#row'+id+' ').remove();
                    $(att).closest("tr").remove();
                    totals();
                    order_index();
                    clear();

                }
            $('#form_purchase_save').submit(function (e) {
                e.preventDefault();
                save();
            });

            //clear textbox
            /*function reset_form() {
                $('#txtpartnumber').val('');
                $('#txt_product_name').val('');
                $('#txtQty').val('');
                $('#txtPrice').val('');
                $('#txtTotal').val('');
                $('#txtDateExpire').val('');
                $('#txtDateAlert').val('');
                $('#txtDesc').val('');
                $('#txtaction').val('0');
                $('#txtpro_id').removeAttr('disabled');
                $('#txtpartnumber').removeAttr('disabled');
                $('#txt_product_name').removeAttr('disabled');
                $('#cbo_sock_location').removeAttr('disabled');
            }*/

            function get_current_stock(item_id){
                var stock_location_id =$("#cbo_sock_location").val();
                var branch_id =$("#cbo_branch").val();
                $.ajax({
                    url:'<?php echo site_url('purchase/get_stock')?>'+'/'+branch_id+'/'+stock_location_id+'/'+item_id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                            if(json==0 || json==null){
                               $("#txt_current_stock").val(0);
                               $("#txt_total_stock").val(0); 
                            }else {
                                $("#txt_current_stock").val(parseInt(json));
                                $("#txt_total_stock").val(parseInt(json));
                            }
                            
                    }
                });
            }




            $('#txt_product_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("purchase/searchproduct"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'purchase_item_name',
                            row_num: 1
                        },
                        success: function (data) {
                            response($.map(data, function (item) {
                                var code = item.split("|");
                                return {
                                    label: code[0],
                                    value: code[0],
                                    data: item
                                }
                            }));
                        }
                    });
                },
                autoFocus: true,
                minLength: 0,
                change: function (event, ui) {
                     event.preventDefault();

                    if(!ui.item){

                        $('#txtpro_id').val('');
                        $('#txtpartnumber').val('');
                        $('#txt_product_name').val('');

                    }else{
                        var names = ui.item.data.split("|");
                        $('#txtpro_id').val(names[1]);
                        $('#txtpartnumber').val(names[5]);
                        $('#txtPrice').val(names[10]);
                        get_current_stock($('#txtpro_id').val());
                        $('#txtQty').focus();
                    }

                }
            });
            $('#txtpartnumber').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("purchase/searchproduct"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'purchase_part_number',
                            row_num: 1
                        },
                        success: function (data) {
                            response($.map(data, function (item) {
                                var code = item.split("|");
                                return {
                                    label: code[2],
                                    value: code[2],
                                    data: item
                                }
                            }));
                        }
                    });
                },
                autoFocus: true,
                minLength: 0,
                select: function (event, ui) {

                    var names = ui.item.data.split("|");
                    $('#txtpro_id').val(names[1]);
                    $('#txt_product_name').val(names[0]);
                    // $('#cbo_measure').val(names[6]);
                    // $('#measure_note').html(names[7]);
                    // $('#txt_measure_qty').val(names[9]);
                    $('#txtPrice').val(names[10]);
                    get_current_stock($('#txtpro_id').val());
                    $('#txtQty').focus();

                }, focus: function (event, ui) {
                    var names = ui.item.data.split("|");
                    $('#txtpro_id').val(names[1]);
                    $('#txt_product_name').val(names[0]);
                    // $('#cbo_measure').val(names[6]);
                    // $('#measure_note').html(names[7]);
                    // $('#txt_measure_qty').val(names[9]);
                    $('#txtPrice').val(names[10]);
                    get_current_stock($('#txtpro_id').val());
                    $('#txtQty').focus();
                }
            });

            $('#txt_supplier').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("supplier/search_supplier"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'supplier_table',
                            row_num: 1
                        },
                        success: function (data) {
                            response($.map(data, function (item) {
                                var code = item.split("|");
                                return {
                                    label: code[0],
                                    value: code[0],
                                    data: item
                                }
                            }));
                        }
                    });
                },
                autoFocus: true,
                minLength: 0,
                change: function (event, ui) {
                    if(!ui.item){
                         $('#txtsupplier_id').val('');
                          $('#txt_supplier').val('');
                    }else{
                        var names = ui.item.data.split("|");
                        $('#txtsupplier_id').val(names[1]);
                    }


                }
            });

            function order_index(){
                    var tbody_length=$(".table-table tbody").find("tr").length;
                    var t_row=tbody_length;

                    var table = $(".table-table tbody");
                     var a=1;
                     table.find('tr').each(function (i, el) {
                                var $tds = $(this).find('td');
                                $tds.eq(2).text(a);

                            a=a+1;
                     });


            }
            function totals(){

                //var number = Number(test.replace(/[^0-9\.-]+/g,""));
                //alert(number);

                    var table = $(".table-table tbody");
                    var total_dis=parseFloat($("#discount_invoice").val());
                    var amount=0;
                    var t_amount="";
                    table.find('tr').each(function (i, el) {

                            var $tds = $(this).find('td');

                                //t_amount =Number($tds.eq(10).text().replace(/[^0-9\.-]+/g,""));
                                t_amount=parseFloat($tds.eq(10).text());
                                //alert(t_amount);
                                amount=parseFloat(amount)+parseFloat(t_amount);


                        });


                    var grand_total=numeral(parseFloat(amount)-parseFloat(total_dis/100 * amount)).format('#.'+dot_0+'');

                    $("#txt_toal_amount").val(numeral(amount).format('#.'+dot_0+''));
                    $("#txt_grand_toal").val(numeral(grand_total).format('#.'+dot_0+''));

                    //alert(grand_total);
                }
                $('#btn_clear').click(function(){
                    clear();
                })

            function clear(){
                $('#txtpartnumber').val('');
                $('#txt_product_name').val('');
                $('#txtpro_id').val('');
                $('#txtQty').val('');
                $('#txt_total_stock').val($('#txt_current_stock').val());
                $('#measure_note').html('');
                $('#txtPrice').val('');
                $('#txt_no').val('');
                $('#txtpartnumber').attr('readonly',false);
                $('#txt_product_name').attr('readonly',false);
                $('#btnSave').text('<?php echo $btn_add ?>');
                $('#txtDateExpire').val('');
                $('#txtDateAlert').val('');
                var tbody_length=$(".table-table tbody").find("tr").length;
                if(tbody_length>0)
                     $('#cbo_branch').attr("disabled", true);
                else
                    $('#cbo_branch').attr("disabled", false);

            }
            $('#discount_invoice').on('change',function(){
                var discount=parseFloat($(this).val());
                var amount=parseFloat($('#txt_toal_amount').val());
                var total_amount=$('#txt_grand_toal').val();
                var grand_total=parseFloat(amount)-parseFloat(discount/100 * amount);
                if(parseFloat(discount)>100){
                    alert('Discount Invalid!!');
                    $('#discount_invoice').focus();
                    $('#discount_invoice').val(0);
                    $('#txt_grand_toal').val(numeral(amount).format('#.'+dot_0+''));
                    return false;
                }


                $('#txt_grand_toal').val(numeral(grand_total).format('#.'+dot_0+''));
            })
            $('#desposit').on('change',function(){
                var deposit=$(this).val();

                var total_amount=$('#txt_grand_toal').val();

                if(parseFloat(deposit)>parseFloat(total_amount)){
                      alert('Deposit Invalid!!');
                    $('#desposit').focus();
                    $('#desposit').val('0.00');
                    return false;
                }

            });

            $('#cbo_branch').change(function(){
            var id=$(this).val();
            if(id>0){
                $('#cbo_sock_location').html('<option value="0">--All Stock--</option>');
                $.ajax({
                    url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_sock_location').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                        })
                    }
                })
            }else{
                $('#cbo_sock_location').html('<option value="0">--All Stock--</option>');
            }

        });
        </script>
        <div id="msg"></div>
    </body>
</html>
