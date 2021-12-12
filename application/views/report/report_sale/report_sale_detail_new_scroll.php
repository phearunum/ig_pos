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
        <style>
            .ellipsis {
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
            .text-left{
                text-align: left !important;
            }
        </style>
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        
        <script type="text/javascript">

            function myFunction() {
                $(function () {
                    $(".table-table").table2excel({
                        filename: "Report Sale Detail",
                        fileext: ".xls"
                    });
                });
            }

            $(document).ready(function () {
                $("#btn_search").click(function () {
                    var name = ($("#txt_customer_name").val());
                    var new_name = name.replace("'", "\\'");
                    var new_name_space = name.replace(/[_(\s)]/g, '_');
                    //  alert(new_name_space);
                    $("#txtcustomer_ids").val(new_name);
                    //$("#txtcustomer_ids").val(new_name_space);
                });
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
        <form action="<?php echo site_url("report_sale_detail/search_detail") ?>" method="post">
            <table width="100%" class="table-form">
                <tr>
                    <td>
                        <?php echo $lbl_from?> :<input type="text" name="datefrom" id="datefrom" value="<?php //echo $from;  ?>" placeholder="YYYY-MM-DD"/>                     
                        <?php  echo $lbl_to?> :<input type="text" name="dateto" id="dateto" value="<?php //echo $to;  ?>" placeholder="YYYY-MM-DD"/>
                        <span class=""><?php echo $lbl_customer?>:<input type="text" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER">
                            <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;">
                        </span>
                        <span class="hidden"><?php echo $lbl_seller?>:<input type="text" name="txt_seller_name" id="txt_seller_name" autocomplete="off" placeholder="SEARCH SELLER">
                            <input type="text" name="txt_seller_id" id="txt_seller_id" class="form-control" style="display: none;">
                        </span>
                        <span>Invoice No:<input type="text" name="txt_invoice_no" id="txt_invoice_no" autocomplete="off" placeholder="INVOICE NO" style="color:#cc0000;" value="<?php echo $invoice_no ?>"></span>
                        
                        
                        <!--<input type="submit" name="btn_search" id="btn_search" value="<?php // echo $btn_search?>" class="btn-srieng" onclick="search_report(1, true,true)">-->
                        <input type="submit" name="btn_search" id="btn_search" value="<?php echo $btn_search?>" class="btn-srieng">
                        <input type="button" name="btn_search" id="btn_export" value="<?php echo $btn_export?>" class="btn-srieng" onclick="myFunction()">
                    </td>
                </tr>
                
            </table>
        </form>
        <div id="panel_report">
            
        </div>
        <div id="loading_panel">
            <br><center><img src="<?php echo base_url('img/loading.gif'); ?>" width="40px" /></center>
        </div>

        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            });
        </script>
        <script type="text/javascript">
            $('#txt_customer_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'customer_table',
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
                            type: 'seller_table',
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

            function show_loading() {
                  $('#loading_panel').slideDown();
            }

            function hide_panel() {
                  $('#loading_panel').slideUp(500);
            }

            $(document).ready(function (e) {
                response_data = '';
                page_no=1;
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('report_sale_detail/report_info') ?>',
                    success: function (response) {
                         count_page = Math.ceil(response);   
                    }
                });
                search_report(1);
//                $(window).scroll(function () {          
//                    if ($(window).scrollTop() == ( $(document).height() - $(window).height())) {
//                        page_no = page_no + 1;
//                    if(page_no<=count_page)
//                        search_report(page_no, count_page,false);
//                    }
//                });
            });
           
            $(window).scroll(function () {
                if ($(window).height() + $(window).scrollTop() == $(document).height()) {
                    page_no = page_no + 1;
                    if(page_no<=count_page)
                        search_report(page_no);
                }
            });                 
            var count_page =0;
            var page_no=1;
            var response_data = '';
            $('form').submit(function (e) {
                e.preventDefault();
                response_data = '';
                page_no=1;
                var datas = {
                    'txt_invoice_no': $('#txt_invoice_no').val(),
                    'page_no': page_no,
                    'datefrom': $('#datefrom').val(),
                    'dateto': $('#dateto').val(),
                    'txt_seller_name': $('#txt_seller_name').val(),
                    'txt_customer_name': $('#txt_customer_name').val(),
                    'txtcustomer_id': $('#txtcustomer_id').val(),
                    'txt_product_name': $('#txt_product_name').val(),
                    'txt_product_id': $('#txt_product_id').val(),
                };
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('report_sale_detail/report_info') ?>',
                    data: datas,
                    success: function (response) {
                         count_page = Math.ceil(response);   
                    }
                });
                search_report(1);
            });

            function search_report(page_no) {
                show_loading();
                var post_url = '<?php echo site_url('report_sale_detail/search_detail') ?>';
                var datas = {
                    'txt_invoice_no': $('#txt_invoice_no').val(),
                    'page_no': page_no,
                    'datefrom': $('#datefrom').val(),
                    'dateto': $('#dateto').val(),
                    'txt_seller_name': $('#txt_seller_name').val(),
                    'txt_customer_name': $('#txt_customer_name').val(),
                    'txtcustomer_id': $('#txtcustomer_id').val(),
                    'txt_product_name': $('#txt_product_name').val(),
                    'txt_product_id': $('#txt_product_id').val()
//                    'load_page': load_page
                };
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: datas,
                    success: function (response) {
                    response_data = response_data + response;
                     var response_table ='<table style="width:100%;" cellspacing="0" class="table-table" id="table0excel" cellpadding="0" border="0">' +
                                '<tr><td colspan="14" style=font-size:24px;"><center>REPORT SALE DETAIL</center></td></tr>' +
                                '<tr><td colspan="14"><center>' + $('#datefrom').val() + ' ' + $('#dateto').val() + ' ' + $('#txt_customer_name').val() + ' ' + $('#txt_invoice_no').val()  + '</center></td></tr>' +
                                '<tr style="background-color: #cdcdcd;">' +
                                '<th>Nº</th><th><?php echo 'Invoice No' ?></th><th><?php echo 'Customer' ?> </th>' +
                                '<th><?php echo 'Card' ?></th><th><?php echo 'Date' ?></th><th><?php echo 'Item' ?></th>' +
                                '<th><?php echo 'QTY' ?></th><th><?php echo 'Price ($)' ?></th><th><?php echo 'Current Cost ($)' ?></th>' +
                                '<th><?php echo 'Total($)' ?></th><th><?php echo 'Dis' ?>($)</th><th><?php echo 'Vat' ?>($)</th>' +
                                '<th><?php echo 'Charge' ?></th><th><?php echo 'Grand Total ($)' ?></th></tr>';
                        $('#panel_report').html(response_table + response_data + '</table>');
                            hide_panel();
                    },
                    error: function (response) {
                        $('#panel_report').html(response_table + response + '</table>')
                        hide_panel();
                    }
                });
            }
        </script>
    </body>
</html>
