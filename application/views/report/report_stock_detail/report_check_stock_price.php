<!DOCTYPE html>
<!--
        To change this license header, choose License Headers in Project Properties.
        To change this template file, choose Tools | Templates
        and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>

        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "PRICE LIST",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                    });
                });
            }

        </script>
    </head>
    <body style="margin-bottom: 60px;">
       
        <form class="formSale" id="form">
            <table width="100%" class="table-form">
                <tr>
                    <td class="text-center" colspan="12"><h5><b><?php echo "Price List" ?></b></h5></td>
                </tr>
                <tr class="field-title">
                    <td>
                        <span class="hidden">
                        From<label class="star"></label> 
                        <input type="text" name="txt_date_from" id="txt_date_from" value="<?php echo $date_from ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        To<label class="star"></label> 
                        <input type="text" name="txt_date_until" id="txt_date_until" value="<?php echo $date_until ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        </span>
                        <span class="">Part Number
                            <input type="text" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="Part Number">                            
                        </span> 
                        <span> <?php echo $lbl_name?> <label class="star"></label> 
                            <input type="text" name="customer_name" id="customer_name" value=""  placeholder="<?php echo $lbl_name?>" autofocus>
                            <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;"></span>
                        <span class=""><?php echo $lbl_type?> 
                            <input type="text" name="txt_seller_name" id="txt_seller_name" autocomplete="off" placeholder="<?php echo $lbl_type?>">
                            <input type="text" name="txt_seller_id" id="txt_seller_id" class="form-control" style="display: none;">
                        </span> 
                        
                        <select name="txt_invoice_no" id="txt_invoice_no" class="hidden">                        
                            <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--All--</option>
                                <?php
                                foreach ($stock_location as $rt)
                                      {
                                ?>
                                 <option value="<?php echo $rt->stock_location_id; ?>"><?php echo $rt->stock_location_name; ?></option>
                                <?php } ?>
                        </select>
                        <input type="submit" name="btnsubmit" value="<?php echo $btn_search?>" class="btn-srieng"/>
                        <input type="button" name="export" onclick="myFunction()" value="<?php echo $btn_export?>" class="btn-srieng"/>                        
                    </td>
                </tr>
               
            </table>
        </form>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>                
                <tr>
                    <th>Item Type</th>
                    <th>Part Number#</th>
                    <th>Item Name</th>
                    <th>SKU(QTY)</th>
                    <th>Price</th>   
                    <th>Total</th>
                </tr>
            </thead>
            <tfoot class="">
                <td>Total : </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
    </table>
    <script type="text/javascript">
        $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        //$('#table-table tr > *:nth-child(1)').hide();
        $(document).ready(function () {
            var data_sale_summary;
            data_sale_summary = $('#table-table').dataTable({
                "bProcessing": true,
                "sAjaxSource": "<?php echo site_url("report_check_stock_price/response/"); ?>",
                "aoColumns": [
                    {mData: 'item_type_name'},
                    {mData: 'item_detail_part_number'},
                    {mData: 'item_detail_name'},
                    {mData: 'stock_qty'},
                    {mData: 'price'},
                    {mData: 'total_price'}
                   ],"searching": false,
                "iDisplayLength": 50,
                "footerCallback": function () {
                    var api = this.api(),
                            data;
                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };
// Total over this page
                        pageTotal = api.column(3, {
                            page: 'current'
                        })
                                .data()
                                .reduce(function (total, b) {
                                    //alert(b);
                                    var bb = b.replace(',', '');
                                    return total + parseFloat(bb);

                                }, 0);
                        grandTotal = api.column(5, {
                            page: 'current'
                        })
                                .data()
                                .reduce(function (total, b) {
                                    var bb = b.replace(',', '');
                                    return total + parseFloat(bb);

                                }, 0);
                        // Update footer                                        
                        $(api.column(3).footer()).html((pageTotal).toFixed(2));
                        $(api.column(5).footer()).html((grandTotal).toFixed(2));
                }
            });
            $("#form").on('submit', function (e) {
                e.preventDefault();
                var df, dt, customer_name, seller, invoice_no,part_number;
                df = $("#txt_date_from").val();
                dt = $("#txt_date_until").val();
                customer_name = $("#customer_name").val();
                seller = $('#txt_seller_name').val();
                invoice_no = $('#txt_invoice_no').val();
                part_number = $('#txtpartnumber').val();
                var url = '<?php echo site_url("report_check_stock_price/responses?"); ?>' + 'df=' + df + '&dt=' + dt + '&customer_name=' + customer_name + '&seller=' + seller + '&invoice=' + invoice_no + '&partnumber='+part_number;
                //alert(url);
                $.getJSON(url, null, function (json)
                {
                    oSettings = data_sale_summary.fnSettings();
                    data_sale_summary.fnClearTable(this);
                    for (var i = 0; i < json.aaData.length; i++)
                    {
                        data_sale_summary.oApi._fnAddData(oSettings, json.aaData[i]);
                    }
                    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
                    data_sale_summary.fnDraw();
                });
            });
        });
    </script>     
    
    
    <script type="text/javascript">
        $('#txtpartnumber').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'product_table',
                        row_num: 1
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            var code = item.split("|");
                            return {
                                label: code[5],
                                value: code[5],
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
                $('#txtcustomer_id').val(names[1]);
            }
        });
        $('#customer_name').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'product_table',
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
            select: function (event, ui) {

                var names = ui.item.data.split("|");
                $('#txtcustomer_id').val(names[1]);
            }
        });
        $('#txt_seller_name').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'category',
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
            select: function (event, ui) {
                var names = ui.item.data.split("|");
                $('#txt_seller_id').val(names[1]);
            }
        });
        
         $('#txt_invoice_no').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchseller') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'sotck_location',
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
            select: function (event, ui) {
                var names = ui.item.data.split("|");
                $('#txt_invoice_no_id').val(names[1]);
            }
        });
        
        
          $("#txt_seller_name").focus(function(){
            $("#txtcustomer_id").val('');
            $("#customer_name").val('');
            $("#txt_invoice_no_id").val('');
            $("#txt_invoice_no").val('');    
             $('#txtpartnumber').val('');
        });
         $("#customer_name").focus(function(){
            $("#txt_seller_id").val('');
            $("#txt_seller_name").val('');
            $("#txt_invoice_no_id").val('');
            $("#txt_invoice_no").val('');
            $('#txtpartnumber').val('');
        });
        $("#txt_invoice_no").focus(function(){
            $("#txtcustomer_id").val('');
            $("#customer_name").val('');
            $("#txt_seller_id").val('');
            $("#txt_seller_name").val('');
            $('#txtpartnumber').val('');
        });
    </script>	
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
     
</body>
</html>
