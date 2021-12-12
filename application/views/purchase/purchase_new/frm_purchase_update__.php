<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PURCHASE</title>
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>  
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
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

        <table width="100%" cellspacing="0" cellpadding="0" border="1" style="font-family: Calibri;font-size: 15px;">
            <tr>
                <td colspan="2" class="form-title"><?php echo $lbl_title ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <form class="table-form" method="POST" id="form_purchase">
                        <table>
                            <tr>
                                <td>
                                    <?php echo $lbl_sup ?><label class="star"> *</label>
                                </td>
                                <td>
                                    <input type="text" name="txt_supplier" id="txt_supplier" autocomplete="off" placeholder="SUPPLIER" required class="text_input">
                                    <input type="text" name="txtsupplier_id" id="txtsupplier_id" class="hidden">
                                     <input type="text" name="txt_no" id="txt_no" class="hidden">
                                    <a href="<?php echo site_url("supplier/addnew")?>" ><?php echo $lbl_new ?></a>
                                </td>
                                <td>
                                    <?php echo $lbl_ref ?>
                                </td>
                                <td>
                                    <input type="text" name="txtrefno" id="txtrefno" autocomplete="off" placeholder="Ref.Note">
                                </td>

                                <td>
                                    <?php echo $lbl_desc ?>
                                </td>
                                <td>
                                    <textarea rows="1" name="txtDesc" style="width:100%" id="txtDesc"></textarea>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $lbl_date ?><label class="star"> *</label>
                                </td>
                                <td>
                                    <input type=text id="txtDate" name="txtDate" class="txt_date" value="<?php echo $date_now ?>"/>
                                </td>
                                <td>
                                    <?php echo $lbl_due_date ?>
                                </td>
                                <td>
                                    <input type="text"  id="txt_due_date" name="txt_due_date" value="<?php echo $date_now ?>"/>
                                </td>
                               
                                
                            </tr>
                            <tr>
                                <td colspan="6" class=''>
                                    <hr style='border-top: 1px solid black;margin:2px;'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $lbl_part ?>
                                </td>
                                <td>
                                    <input type="text" name="txtpartnumber" id="txtpartnumber" autocomplete="off" onkeypress="if (event.keyCode == 13) {
                                                //autoselect(this.value);
                                                return false;
                                            }" placeholder="<?php echo $lbl_part ?>">
                                </td>
                                <td>
                                    <?php echo $lbl_stock_name ?> <label class="star"> *</label>
                                </td>
                                <td>
                                    <select name="cbo_sock_location" id="cbo_sock_location" class="cbo-srieng">                        
                                        <?php
                                        foreach ($record_stock_location as $rsl) {
                                            ?>
                                            <option value="<?php echo $rsl->stock_location_id; ?>"><?php echo $rsl->stock_location_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <a class="hidden" href="<?php echo site_url('stock_location/addnew'); ?>"><?php echo $lbl_new ?></a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $lbl_name ?>
                                </td>
                                <td id="panel_product">
                                    <input type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="<?php echo $lbl_name ?>" required>
                                    <a href="#" onClick="formOpen('<?php echo site_url("item_detail/addnew"); ?>', '')"><?php echo $lbl_new ?></a>
                                    <input type="text" name="txtpro_id" id="txtpro_id" placeholder="Product Id" class="hidden">
                                    <input type="text" name="txt_item_id_update" id="txt_item_id_update" placeholder="Product Id update" value="" class="hidden">
                                     <input type="text" name="txt_po_detail_id" id="txt_po_detail_id" placeholder="Product Id update" value="" class="hidden">
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $lbl_qty ?> <label class="star"> *</label>
                                </td>
                                <td>
                                    <input  class="allow-decimal my_blur" value="0" id="txtQty" name="txtQty" placeholder="<?php echo $lbl_qty ?>" onchange="" autocomplete="off" required>
                                </td>
                                <td>
                                    <?php echo $lbl_price ?> <label class="star"> *</label>
                                </td>
                                <td>
                                    <input type="text" id="txtPrice" class="allow-decimal my_blur" value="0" name="txtPrice" placeholder="Input price" onchange="" autocomplete="off" value="0.00"> 
                                </td>
                                <td>

                                </td>
                                <td rowspan="2">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo "Measure"; ?>
                                </td>
                                <td>
                                    <select name="cbo_measure" id="cbo_measure" class="cbo-srieng">   
                                    <option value="">Select Measure</option>                     
                                        <?php
                                        foreach ($record_measure as $rm) {
                                            ?>
                                            <option value="<?php echo $rm->measure_id; ?>"><?php echo $rm->measure_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <?php echo "Expired Date" ?>
                                </td>
                                <td>
                                    <input type=text id="txtDateExpire" name="txtDateExpire" class="txt_date" autocomplete="off">
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr class="">
                                <td>
                                    <?php echo "Expired Alert" ?>
                                </td>
                                <td>
                                    <input  id="txtDateAlert" name="txtDateAlert" class="txt_date" autocomplete="off">
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr id="alert_info">
                                <td>
                                    <span style="color:red;display: none;"> Date Alert must less than Date Expired !!!</span>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <button name="btnSave" type="button" class="btn-srieng"  value="+Add" id="btnSave"><?php echo $btn_add ?></button>
                                    <input type="button" name="btn_clear" class="btn-srieng" id="btn_clear"  value="<?php echo $btn_clear ?>"/>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                        </table>
                        <div class="hidden">
                            <label class="star"> *</label><?php echo $lbl_note ?>
                            <span>No#<input type="text" name="txtno" id="txtno" value="<?php echo $purchase_no ?>"></span>
                            <span><?php echo "Total"//$lbl_total ?> :
                                <input type="text" id="txtTotal" name="txtTotal" placeholder="<?php echo $lbl_total ?>" readonly>
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
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form id="form_purchase_save" action="<?php echo site_url("purchase/save"); ?>" method="post">
                        <div style="text-align:right;color:black;font-weight: bold">
                          
                           
                                    <?php //echo "VAT %" ?><input class="hidden" tabindex="4" type="checkbox" id="chk_vat" name="chk_vat" value="10"/>
                                
                            <?php echo $lbl_total; ?>
                            <input type="text" id="txt_toal_amount" name="txt_toal_amount" value="<?php echo number_format(0, 2); ?>" readonly/>

                             <?php echo $lbl_discount ?>
                               
                            <input type="text" class="allow-decimal my_blur" value="0" id="discount_invoice" name="discount_invoice" value="0.00" />

                            <?php echo $lbl_grand_total ?>
                            <input type="text" id="txt_grand_toal" name="txt_grand_toal" value="<?php echo number_format(0, 2); ?>" readonly/>
                            
                            <span id="textdep" >
                                <?php echo $lbl_deposit ?>
                            </span>
                            <input type="text" id="desposit"  class="allow-decimal my_blur"  name="desposit" value="0.00" />
                            <?php echo $lbl_paid ?> <input type="checkbox" id="chPaid" name="chPaid" value="1" />
                            <button class="" type="button" name="btnSave" id="btnSave_all" value="Save" class="btn-srieng" ><?php echo $btn_save ?></button>
                        </div>
                        <div colspan="2" id='purchase_panel'>
                            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
                                <thead>
                                    <tr style="background-color: #37773A;">
                                        <th><?php echo $lbl_no ?></th>
                                        <th><?php echo "Part#" ?></th>
                                        <th width='300px'><?php echo $lbl_name ?></th>
                                       
                                     
                                        <th><?php echo $lbl_qty; ?></th>
                                        <th><?php echo $lbl_measure ?></th>
                                        <th><?php echo $lbl_price ?></th>
                                         <th><?php echo $lbl_retail_qty; ?></th>
                                        <th><?php echo $lbl_retail_amount; ?></th>
                                        
                                       
                                      
                                        <th><?php echo $lbl_total ?></th>
                                        <th><?php echo $lbl_stock ?></th>
                                        <th><?php echo "Expired Date" ?></th>
                                        <th><?php echo "Expired Alert" ?></th>
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
                </td>
            </tr>
        </table>
        
        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function ($){
                var id="<?php echo $id ?>";
                load_data(id);
                load_master_data(id);
            
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
                        $('#desposit').val(parseFloat(grand_toal));
                    } else {
                        $('#desposit').attr('readonly',false);
                        $('#desposit').val('0.00');
                        $('#desposit').focus();
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
                  

                    if($('#txt_supplier').val()==''){
                         alert('Supplier Cannot be blank!!!');
                        $('#txt_supplier').focus();
                        return false;
                    }

                    if($('#txtDate').val()==''){
                         alert('Purchase Date Cannot be blank!!!');
                        $('#txtDate').focus();
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

                    update_po();
                    $('#btn_clear').click();
                });

                

                $('#btnSave').on('click', function () {
                    var price = $("#txtPrice").val();
                     var id="<?php echo $id ?>";
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
                    if ($('#txtQty').val() == "") {
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

                    if ($("#txtPrice").val() <0) {
                        alert("Please Input Product Unit Price!!!");
                        $("#txtPrice").focus();
                        return false;
                    }
                    add_po(id);
                    $('#btn_clear').click();

                });
                function add_po(id){
                    //master
                    var ref_no=$('#txtrefno').val();
                    var table = $(".table-table tbody");
                    var po_date=$('#txtDate').val();
                    var dis=$('#discount_invoice').val();
                    var due_date=$('#txt_due_date').val();
                    var desc=$('#txtDesc').val();
                    var supplier=$('#txtsupplier_id').val();
                    var deposit=$('#desposit').val();
                    var grand_total=$('#txt_toal_amount').val();
                    
                    //alert(grand_toal);
                    var pro_id=$('#txtpro_id').val();
                    //detail
                    var part_number=$('#txtpartnumber').val();
                    var pro_name=$('#txt_product_name').val();
                    var qty=$('#txtQty').val();
                    var amount=numeral($('#txtPrice').val()).format('#.'+dot_0+'');
                    var measure_name=$('#cbo_measure option:selected').text();
                    var measure_id=$('#cbo_measure').val();
                    var stock_id=$('#cbo_sock_location').val();
                    var stock_name=$('#cbo_sock_location option:selected').text();
                    var no=$('.table-table tr').length;
                    var total=numeral(parseFloat(qty)*parseFloat(amount)).format('#.'+dot_0+'');
                    var pro_id=$('#txtpro_id').val();
                    var no_update=$('#txt_no').val();
                    var measure_qty=$('#txt_measure_qty').val();
                    var item_id_update=$('#txt_item_id_update').val();
                    var po_detail_id=$('#txt_po_detail_id').val();
                    var ex_dates=$('#txtDateExpire').val();
                    var ex_alerts=$('#txtDateAlert').val();
                    //alert(item_id_update);

                    var values=[];
                  
                         values.push({
                            item_id:  pro_id,
                            measure_id:  measure_id,
                            qty:qty,
                            amount:amount,
                            t_amount:total,
                            stock_id:stock_id,
                            measure_qty:measure_qty,
                            ex_date:  ex_dates,  
                            ex_alert:  ex_alerts

                          
                        });
                       
                   
                 var data=JSON.stringify(values);
                // alert(data);return false;

                    if (window.confirm('Do you to add this purchase?')) {

                        var post_url = '<?php  echo site_url('purchase/save_update_po') ?>';
                         $.ajax({
                            type: 'POST',
                            url: post_url,
                            ContentType: 'application/json',              
                            data: {'po_detail_id':po_detail_id,'item_id_update':item_id_update,'id':id,'ref_no':ref_no,'data': data,'po_date':po_date,'dis':dis,'due_date':due_date,'desc':desc,'supplier':supplier,'deposit':deposit,'grand_total':grand_total,'pro_id':pro_id},                    
                            success: function (data) {

                                var json = $.parseJSON(data);
                                console.log(data);

                                if (json.statusCode != 'E0001') {
                                    alert(json.message);
                                    load_data(id);
                                    load_master_data(id);
                                    clear();
                                    
                                    //load_po_id();
                                    //window.open("<?php echo site_url("purchase/addnew"); ?>","_self");

                                } else {
                                    alert(json.message);

                                }
                                 //$('#save_po').loadingBtnComplete({html: "<i class='fa fa-fw fa-lg fa-check-circle'></i>Save"});
                            },
                            error: function (data) {
                                alert('error');
                            }
                        });
                         //end confirm
                    }
                   
                   
                }
                function update_po(){
                    if (window.confirm('Do you to update purchase?')) {
                        var ref_no=$('#txtrefno').val();
                        var table = $(".table-table tbody");
                        var po_date=$('#txtDate').val();
                        var dis=$('#discount_invoice').val();
                        var due_date=$('#txt_due_date').val();
                        var desc=$('#txtDesc').val();
                        var supplier=$('#txtsupplier_id').val();
                        var deposit=$('#desposit').val();
                        var grand_total=$('#txt_toal_amount').val();
                        var po_id="<?php echo $id; ?>";
                    
                    //alert(grand_toal);
                    var pro_id=$('#txtpro_id').val();
                        var post_url = '<?php  echo site_url('purchase/update_amount_po') ?>';
                         $.ajax({
                            type: 'POST',
                            url: post_url,
                            ContentType: 'application/json',              
                            data: {'po_id':po_id,'ref_no':ref_no,'po_date':po_date,'dis':dis,'due_date':due_date,'desc':desc,'supplier':supplier,'deposit':deposit,'grand_total':grand_total,'pro_id':pro_id},                     
                            success: function (data) {

                                var json = $.parseJSON(data);
                                console.log(data);

                                if (json.statusCode != 'E0001') {
                                    alert(json.message);
                                    load_data(id);
                                    load_master_data(id);
                                    clear();
                                    
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
                         //end confirm
                    }
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
               // alert(data);
                //return false;
                var post_url = '<?php  echo site_url('purchase/save') ?>';
                 $.ajax({
                    type: 'POST',
                    url: post_url,
                    ContentType: 'application/json',              
                    data: {'ref_no':ref_no,'data': data,'po_date':po_date,'dis':dis,'due_date':due_date,'desc':desc,'supplier':supplier,'deposit':deposit,'grand_total':grand_total,'pro_id':pro_id},                    
                    success: function (data) {

                        var json = $.parseJSON(data);
                        console.log(data);

                        if (json.statusCode != 'E0001') {
                            alert(json.message);
                            
                            //load_po_id();
                            window.open("<?php echo site_url("purchase/addnew"); ?>","_self");

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

            function edit_click(e) {
                var id = $(e).attr('value');
                var post_url = '<?php echo site_url('purchase/read_purchase_detail') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: {'id': id},
                    success: function (response) {
                        var datas = response.split(':');
                        $('#txtpro_id').val(datas[0]);
                        $('#txtpartnumber').val(datas[2]);
                        $('#txt_product_name').val(datas[1]);
                        $('#txtQty').val(datas[3]);
                        $('#txtPrice').val(datas[4]);
                        $('#cbo_sock_location').val(datas[5]);
                        $('#txtDate').val(datas[6]);
                        $('#txtDateExpire').val(datas[8]);
                        $('#txtDateAlert').val(datas[7]);
                        $('#txtaction').val('1');
                        $('#txtTotal').val(datas[3] * datas[4]);
                        $('#cbo_measure').val(datas[9]);
                        $('#txtpartnumber').attr('disabled', true);
                        $('#txt_product_name').attr('disabled', true);
                        $('#cbo_sock_location').attr('disabled', true);                        

                    },
                    error: function (response) {
                        $('#msg').html(response);
                    }
                });
            }
            
            function edit(no,part,pro_name,pro_id,qty,amount,stock_id,measure_id,po_detail_id,ex_date,ex_alert){
                    $('#txtpartnumber').val(part);
                    $('#txt_product_name').val(pro_name);
                    $('#txtpro_id').val(pro_id);
                    $('#txtQty').val(qty);
                    $('#txt_item_id_update').val(pro_id);
                    //$('#measure_note').html();
                    $('#txtPrice').val(amount);
                    $('#cbo_measure').val(measure_id);
                    $('#cbo_sock_location').val(stock_id);
                    $('#txt_no').val(no);
                    $('#txtpartnumber').attr('readonly',true);
                    $('#txt_product_name').attr('readonly',true);
                    $('#btnSave').text('Update');
                    $('#txt_po_detail_id').val(po_detail_id);
                    $('#txtDateExpire').val(ex_date);
                    $('#txtDateAlert').val(ex_alert);
                    $('#cbo_measure').attr('disabled', 'true');
                    $('#txtQty').attr('readonly', 'true');
                    $('#cbo_sock_location').attr('disabled', true);       
            }
            function del(id,po_id,stock_id){
                if (window.confirm('Are you sure to delete this purchase?')) {

                    var post_url = '<?php  echo site_url('purchase/delete_item') ?>';
                         $.ajax({
                            type: 'POST',
                            url: post_url,
                            ContentType: 'application/json',              
                            data: {'id':id,'po_id':po_id,'stock_id':stock_id},                    
                            success: function (data) {

                                var json = $.parseJSON(data);
                                console.log(data);

                                if (json.statusCode != 'E0001') {
                                    alert(json.message);
                                    load_data(po_id);
                                    load_master_data(po_id);
                                   
                                    
                                    //load_po_id();
                                    //window.open("<?php// echo site_url("purchase/addnew"); ?>","_self");

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
            $('#form_purchase_save').submit(function (e) {
                e.preventDefault();
                save();
            });
            

            $('#txt_product_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("purchase/searchproduct"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'item_main',
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
                        // $('#measure_note').html('');
                        // $('#cbo_measure').val(0);
                        // $('#txt_measure_qty').val('');
                    }else{
                        var names = ui.item.data.split("|");
                        $('#txtpro_id').val(names[1]);
                        $('#txtpartnumber').val(names[2]);
                        // $('#cbo_measure').val(names[6]);
                        // $('#measure_note').html(names[7]);
                        // $('#txt_measure_qty').val(names[9]);
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
                            type: 'item_main_barcode',
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
                    $('#txtQty').focus();
                }, focus: function (event, ui) {
                    var names = ui.item.data.split("|");
                    $('#txtpro_id').val(names[1]);
                    $('#txt_product_name').val(names[0]);
                    // $('#cbo_measure').val(names[6]);
                    // $('#measure_note').html(names[7]);
                    // $('#txt_measure_qty').val(names[9]);
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
                
                 
                            //alert(1);
                            var tbody_length=$(".table-table tbody").find("tr").length;
                            var t_row=tbody_length;
                            
                    var table = $(".table-table tbody");
                     var a=1;
                     table.find('tr').each(function (i, el) {
                      
                           
                           
                                var $tds = $(this).find('td');
                                $tds.eq(1).text(a);
                                 // alert(a);
                            a=a+1;
                            
                            
                     });
                
            }
            function totals(){

                    var table = $(".table-table tbody");
                    var total_dis=$("#discount_invoice").val();
                    var amount=0;
                    var t_amount="";
                    table.find('tr').each(function (i, el) {
                        
                            var $tds = $(this).find('td');
                           
                                t_amount = $tds.eq(8).text();
                               
                                amount=amount+parseFloat(t_amount);            
                        });
                        
                    
                    var grand_total=amount-parseFloat(total_dis);
                 
                    $("#txt_toal_amount").val(amount);
                    $("#txt_grand_toal").val(grand_total);
                }
                $('#btn_clear').click(function(){
                    clear();
                })

            function clear(){
                $('#txtpartnumber').val('');
                $('#txt_product_name').val('');
                $('#txtpro_id').val('');
                $('#txtQty').val('');
                $('#measure_note').html('');
                $('#txtPrice').val('');
                $('#txt_no').val('');
                $('#txtpartnumber').attr('readonly',false);
                $('#txt_product_name').attr('readonly',false);
                $('#btnSave').text('Add');
                $('#txt_item_id_update').val('');
                $('#txt_po_detail_id').val('');
                $('#txtDateExpire').val('');
                $('#txtDateAlert').val('');
                $('#txtQty').attr('readonly', false);
                $('#cbo_measure').attr('disabled', false);
                $('#cbo_sock_location').attr('disabled', false);  

            }
            $('#discount_invoice').on('change',function(){
                var discount=$(this).val();
                var amount=$('#txt_toal_amount').val();
                var total_amount=$('#txt_grand_toal').val();
                var grand_total=parseFloat(amount)-parseFloat(discount);
                if(parseFloat(discount)>parseFloat(amount)){
                    alert('Discount Invalid!!');
                    $('#discount_invoice').focus();
                    $('#discount_invoice').val(0);
                    $('#txt_grand_toal').val(amount);
                    return false;
                }
                $('#txt_grand_toal').val(grand_total);
            })
            $('#desposit').on('change',function(){
                var deposit=$(this).val();

                var total_amount=$('#txt_grand_toal').val();

                if(parseFloat(deposit)>parseFloat(total_amount)){
                      alert('Deposit Invalid!!');
                    $('#desposit').focus();
                    //$('#desposit').val(0);
                    return false;
                }

            })

            function load_data(id) {
                  
                        $('.table-table tbody').html('');
                        var post_url = '<?php echo site_url('purchase/load_all') ?>'+'/'+id;
                   
                   
                  
                    $.ajax({
                        type: 'POST',
                        dataType: "text",
                        url: post_url,
                        async: false,
                        data: {'item_id': id},
                        success: function (response) {  
                            if (response.trim() !== '[]' || response.trim() !== '') {
                                    
                                    var html_str="";
                                    var list = JSON.parse(response);

                                    for (var i = 0; i < list.length; i++) {
                                         var qty_detail=list[i].purchase_detail_qty*list[i].measure_qty;
                                         var amount_detail=numeral(list[i].purchase_detail_total_amount/list[i].measure_qty).format('#.'+dot_0+'');
                                        //alert(list[i].purchase_detail_item_detail_id);
                                        $('.table-table').append('<tr id="row'+list[i].purchase_detail_item_detail_id+'"><td class="hidden po">'+list[i].purchase_detail_item_detail_id+'</td> <td class="hidden po">'+list[i].measure_id+'</td> <td>'+(i+1)+'</td> <td>'+list[i].item_detail_part_number+'</td ><td>'+list[i].item_detail_name+'</td> <td>'+list[i].purchase_detail_qty+'</td> <td>'+list[i].measure_name+'</td>  <td>'+list[i].purchase_detail_unit_cost+'</td> <td>'+qty_detail+'</td> <td>'+amount_detail+'</td> <td>'+list[i].purchase_detail_total_amount+'</td> <td>'+list[i].stock_location_name+'</td> <td class="hidden">'+list[i].stock_location_id+'</td> <td class="hidden">'+list[i].measure_qty+'</td> <td>'+list[i].expired_date+'</td><td>'+list[i].expired_alert+'</td> <td><a onclick="edit('+(i+1)+',\''+list[i].item_detail_part_number+'\',\''+list[i].item_detail_name+'\','+list[i].purchase_detail_item_detail_id+','+list[i].purchase_detail_qty+','+list[i].purchase_detail_unit_cost+','+list[i].stock_location_id+','+list[i].measure_id+','+list[i].purchase_detail_id+',\''+list[i].expired_date+'\',\''+list[i].expired_alert+'\');" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo $lbl_edit;?></a></td> <td><a onclick="del('+list[i].purchase_detail_id+','+list[i].purchase_no+','+list[i].stock_location_id+')" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo $lbl_delete;?></a></td></tr>');
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
                      
                        var post_url = '<?php echo site_url('purchase/load_master') ?>'+'/'+id;
                   
                   
                  
                    $.ajax({
                        type: 'POST',
                        dataType: "text",
                        url: post_url,
                        async: false,
                        data: {'item_id': id},
                        success: function (response) {
                             
                               
                            if (response.trim() !== '[]' || response.trim() !== '') {
                                    
                                    var html_str="";
                                    var list = $.parseJSON(response);
                                


                                    
                                        
                                        $('#txt_toal_amount').val(list.purchase_amount);
                                        $('#discount_invoice').val(list.purchase_discount);
                                        $('#txt_grand_toal').val(list.purchase_total_amount);
                                        $('#desposit').val(list.purchase_deposit);
                                        $('#txt_supplier').val(list.supplier_name);
                                        $('#txtsupplier_id').val(list.supplier_id);
                                        $('#txtrefno').val(list.ref);
                                        $('#txtDesc').val(list.note);
                                        $('#txtDate').val(list.po_date);
                                        $('#txt_due_date').val(list.due_date);

                                        var paid=parseInt(list.status);
                                        var status_pay=list.status_pay;

                                        
                                        if(paid==0){
                                            //alert(paid)
                                            //$('#chPaid').attr('checked',true);
                                            document.getElementById('chPaid').checked=true;
                                        }else{
                                            //alert(paid)
                                            //$('#chPaid').attr('checked',false);
                                            document.getElementById('chPaid').checked=false;
                                        }

                                        if(status_pay==1){
                                            $('#discount_invoice').attr('readonly',true);
                                            $('#desposit').attr('readonly',true);
                                            $('#chPaid').attr('disabled',true);
                                            $('#btnSave_all').addClass('hidden');
                                        }else{
                                            $('#discount_invoice').attr('readonly',false);
                                            $('#desposit').attr('readonly',false);
                                            $('#chPaid').attr('disabled',false);
                                            $('#btnSave_all').removeClass('hidden');
                                        }
                                         
                            }
                        }
                        ,
                        error: function (response) {
                            alert('Unable to load sale data!!');
                        }
                    });
                }

            
            
            
        </script> 
        <div id="msg"></div>
    </body>
</html>
