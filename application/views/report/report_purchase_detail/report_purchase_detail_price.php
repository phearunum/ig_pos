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
                        filename: "Report Sale Summary",
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
                    <td>
                        <?php echo $lbl_from ?><label class="star"></label> 
                        <input type="text" name="txt_date_from" id="txt_date_from" value="<?php echo $date_from ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        <?php echo $lbl_to ?><label class="star"></label> 
                        <input type="text" name="txt_date_until" id="txt_date_until" value="<?php echo $date_until ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        <span class=""><?php echo 'Part N#'; ?> 
                            <input type="text" name="txt_part_no" id="txt_part_no" autocomplete="off" placeholder="<?php echo 'Part Number#'; ?>">                            
                        </span>
                        <span class=""><?php echo $lbl_name ?> <label class="star"></label> 
                            <input type="text" name="customer_name" id="customer_name" value="" class="cbo-srieng" placeholder="<?php echo $lbl_name ?>" autofocus>
                            <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;"></span>

                        <span class=""><?php echo $lbl_sup ?> 
                            <input type="text" name="txt_seller_name" id="txt_seller_name" autocomplete="off" placeholder="<?php echo $lbl_sup ?>">
                            <input type="text" name="txt_seller_id" id="txt_seller_id" class="form-control" style="display: none;">
                        </span>
                        
                        <input type="submit" name="btnsubmit" value="<?php echo $btn_search ?>" class="btn-srieng"/>
                        <input type="button" name="export" onclick="myFunction()" value="<?php echo $btn_export ?>" class="btn-srieng"/>                        
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size: 20px; padding-top: 20px; text-decoration: underline;" colspan="12"><?php echo $lbl_title ?></td>
                </tr>
            </table>
        </form>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>                
                <tr>
                    <th><?php echo $lbl_po ?></th>
                    <th><?php echo $lbl_sup_name ?></th>
                    <th><?php echo $lbl_recorder ?></th>
                    <th><?php echo $lbl_create_date ?></th>   
                    <th><?php echo $lbl_name ?></th>
                    <th><?php echo $lbl_part_num ?></th>
                    <th><?php echo $lbl_price ?></th>
                    <th><?php echo $lbl_qty ?></th>
                    <th><?php echo $lbl_total ?></th>
                    <th><?php echo $lbl_stock ?></th>                                   
                    <th>Measure</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot class="">
            <td><?php echo $lbl_grand ?> : </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td> 
            <td></td>
            <td></td> 
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
                "sAjaxSource": "<?php echo site_url("report_purchase_detail_price/response/"); ?>",
                "aoColumns": [
                    {mData: 'purchase_no'},
                    {mData: 'supplier_name'},
                    {mData: 'employee_name'},
                    {mData: 'purchase_detail_date'},
                    {mData: 'item_detail_name'},
                    {mData: 'item_detail_part_number'},
                    {mData: 'purchase_detail_unit_cost'},
                    {mData: 'purchase_detail_qty'},
                    {mData: 'total'},
                    {mData: 'stock_location_name'},
                    {mData: 'measure_name'},
                    {mData: 'status'},
                ],
                "order": [[ 0, "desc" ]],
                "aoColumnDefs": [{
                        "aTargets": [7, 8],
                        "mRender": function (data) {
                            return parseFloat(data).toFixed(2);
                        }}],
                "iDisplayLength": 50,
                "footerCallback": function () {
                    var api = this.api(),
                            data;
                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                    // Total over this page
                    pageTotal = api.column(8, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);

                            }, 0);
                    pageTotalqty = api.column(7, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);

                            }, 0);

                    allpageTotal = api.column(8, {
                        page: 'all'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);

                            }, 0);
                    allpageTotalqty = api.column(7, {
                        page: 'all'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);

                            }, 0);
                    // Update footer                                        
                    $(api.column(8).footer()).html((pageTotal).toFixed(2) + "<span class='red'> of " + allpageTotal.toFixed(2) + "</span>");
                    $(api.column(7).footer()).html((pageTotalqty).toFixed(2) + "<span class='red'> of " + allpageTotalqty.toFixed(2) + "</span>");
                }
            });
            $("#form").on('submit', function (e) {
                e.preventDefault();
                var df, dt, customer_name, seller, invoice_no;
                df = $("#txt_date_from").val();
                dt = $("#txt_date_until").val();
                customer_name = $("#txtcustomer_id").val();
                seller = $('#txt_seller_name').val();
                invoice_no = $('#txt_part_no').val();
                var url = '<?php echo site_url("report_purchase_detail_price/responses?"); ?>' + 'df=' + df + '&dt=' + dt + '&customer_name=' + customer_name + '&seller=' + seller + '&invoice=' + invoice_no;
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
            $('#table-table').on('click', 'td .edit', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href = '<?php echo site_url("retail_sale/addnew") ?>' + "/" + id;
                window.open(href);
            });
            $('#table-table').on('click', 'td .preview', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href = '<?php echo site_url("retail_sale/print_invoice") ?>' + "/" + id;
                window.open(href);
            });
            $('#table-table').on('click', 'td .void', function (e) {
                e.preventDefault()
                var sale_id = $(this).closest('tr').find('td:first').html();
                if (confirm("Are you sure, you want to delete the selected invoice?") == false) {
                    return false;
                }
                var post_url = '<?php echo site_url('retail_sale/void') ?>';
                var datas = {
                    'txt_sale_id': sale_id
                };
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: datas,
                    success: function (response) {
                        $('#form').trigger("submit");

                    },
                    error: function (response) {

                    }
                });
            });
        });
    </script>        
    <script type="text/javascript">

        $('#txt_invoice_no').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer')?>',
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
                    url: '<?php echo site_url('retail_sale/searchseller') ?>',
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
            select: function (event, ui) {
                var names = ui.item.data.split("|");
                $('#txt_seller_id').val(names[1]);
            }
        });


        //CLEAR TEXTBOX WHEN FOCUS ON OTHER TEXTBOX
        $("#customer_name").focus(function () {
            //$("#txt_date_from").val('');
            //$("#txt_date_until").val('');
            $("#txt_seller_name").val('');
            $("#txt_seller_id").val('');
            $('#txt_invoice_no').val('');
        });

        $("#txt_seller_name").focus(function () {
            //$("#txt_date_from").val('');
            //$("#txt_date_until").val('');
            $("#customer_name").val('');
            $("#txtcustomer_id").val('');
            $('#txt_invoice_no').val('');

        });
        $("#txt_date_from").focus(function () {
            $("#customer_name").val('');
            $("#txtcustomer_id").val('');
            $("#txt_seller_name").val('');
            $("#txt_seller_id").val('');
            $('#txt_invoice_no').val('');
        });

        $('#txt_invoice_no').focus(function () {
            $("#customer_name").val('');
            $("#txtcustomer_id").val('');
            $("#txt_seller_name").val('');
            $("#txt_seller_id").val('');

        });

    </script>	
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
</body>
</html>
