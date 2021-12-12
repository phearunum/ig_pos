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
                        filename: "Report Purchase Detail",
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
                        <?php echo $lbl_from?> :<input type="text" name="datefrom" id="datefrom" value="<?php echo $from; ?>" placeholder="yyyy/mm/dd"/>&nbsp;&nbsp;                     
                        <?php echo $lbl_to?> :<input type="text" name="dateto" id="dateto" value="<?php echo $to; ?>" placeholder="yyyy/mm/dd"/>
                        <span class="">
                            <?php echo $lbl_sup?>:<input type="text" name="txt_supplier" id="txt_supplier" autocomplete="off" placeholder="SEARCH SUPPLIER">
                            <input type="text" name="txt_supplier_id" id="txt_supplier_id" class="form-control" style="display: none;">
                        </span>
                        <span class="">
                            <?php echo "Item Name"?>:<input type="text" name="txt_item_name" id="txt_item_name" autocomplete="off" placeholder="SEARCH ITEM NAME">
                            <input type="text" name="txt_item_id" id="txt_item_id" class="form-control" style="display: none;">
                        </span>
                        <span class="hidden"  Ref.Note:<input type="text" name="txt_invoice_no" id="txt_invoice_no" autocomplete="off" placeholder="Ref.Note"></span>
                        <input type="submit" name="btn_search" id="btn_search" value="<?php echo $btn_search?>" class="btn-srieng" onclick="search_report(1, true)">
                        <input type="button" name="btn_search" id="btn_search" value="<?php echo $btn_export?>" class="btn-srieng" onclick="myFunction()">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size: 20px; padding-top: 20px; text-decoration: underline;" colspan="12"><?php echo $lbl_title?></td>
                </tr>
            </table>
        </form>
        <div id="panel_report">

        </div>
        <div id="loading_panel">
            <br><center><img src="<?php echo base_url('img/loading.gif'); ?>" width="20px" /><br>Loading Data...</center>
        </div>
        <div id="panel_pagination" class="panel_pagination" style="padding-top:10px;">
            
        </div>
        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            });
        </script>
        <script type="text/javascript">
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
                select: function (event, ui) {

                    var names = ui.item.data.split("|");
                    $('#txtsupplier_id').val(names[1]);

                }
            });
            $('#txt_item_name').autocomplete({
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
                $('#txt_item_id').val(names[1]);
            }
        });
            function show_loading() {
                $('tr.tbody').slideUp();
                $('#loading_panel').slideDown();
            }

            function hide_panel() {
                $('tr.tbody').slideDown(500);
                $('#loading_panel').slideUp();
            }

            $(document).ready(function (e) {
                search_report(1, true);
            });

            $('form').submit(function (e) {
                e.preventDefault();
                search_report(1, true);
            });

            function search_report(page_no, generate_page) {
                show_loading();
                var post_url = '<?php echo site_url('report_purchase_detail/search_detail') ?>';
                var datas = {
                    'txt_invoice_no': $('#txt_invoice_no').val(),
                    'page_no': page_no,
                    'datefrom': $('#datefrom').val(),
                    'dateto': $('#dateto').val(),
                    'txt_supplier': $('#txt_supplier').val(),
                    'txt_item_id': $("#txt_item_id").val(),
                };
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: datas,
                    success: function (response) {
                        
                        $('#panel_report').html(response);
                        if (generate_page) {
                            create_pagination();
                        } else {
                            hide_panel();
                        }
                    },
                    error: function (response) {
                        $('#panel_report').html(response)
                        hide_panel();
                    }
                });
            }

            function click_page(e) {
                var page = $(e).attr('value');
                $('#panel_pagination > button').removeClass('paginate_hpt_active');
                $(e).addClass('paginate_hpt_active');
                search_report(page, false);
            }

            function click_next_prev(e) {
                var btn_id = $(e).attr('id');
                var last_page = $('#btn_next').val();
                var first_page = $('#btn_prev').val();
                for (var i = first_page; i <= last_page; i++) {
                    if (btn_id == 'btn_prev') {
                        if ($('#' + i).hasClass('paginate_hpt_active')) {
                            if (i <= first_page)
                                break;
                            var next_p = parseInt(i) - 1;
                            click_page($('#' + next_p));
                            break;
                        }
                    } else if (btn_id == 'btn_next') {
                        if ($('#' + i).hasClass('paginate_hpt_active')) {
                            if (i >= last_page)
                                break;
                            var next_p = parseInt(i) + 1;
                            click_page($('#' + next_p));
                            break;
                        }
                    }

                }
                if (btn_id == 'btn_prev') {
                    if ($('#' + first_page).hasClass('paginate_hpt_active')) {
                        $(e).addClass('disable');
                    }
                } else if (btn_id == 'btn_next') {
                    if ($('#' + last_page).hasClass('paginate_hpt_active')) {
                        $(e).addClass('disable');
                    }
                }
            }
            function create_pagination() {
                var post_url = '<?php echo site_url('report_sale_detail/report_info') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    success: function (response) {
                        var count_page = Math.ceil(response);
                        if (count_page > 1) {
                            var html_str = '';
                            html_str = "<button class='paginate_hpt' value='1' id='btn_prev'onclick='click_next_prev(this)'>Previous</button>";
                            for (var i = 1; i <= count_page; i++) {
                                if (i == 1) {
                                    html_str = html_str + "<button class='paginate_hpt paginate_hpt_active' value='" + i + "' id='" + i + "' onclick='click_page(this)'>" + i + "</button>";
                                } else {
                                    html_str = html_str + "<button class='paginate_hpt' value='" + i + "' id='" + i + "' onclick='click_page(this)'>" + i + "</button>";
                                }
                            }
                            html_str = html_str + "<button class='paginate_hpt' value='" + count_page + "' id='btn_next' onclick='click_next_prev(this)'>Next</button>";
                            $('#panel_pagination').html(html_str);
                        } else {
                            $('#panel_pagination').html('');
                        }

                        hide_panel();
                    },
                    error: function (response) {
                        $('#msg').html(response);
                        hide_panel();
                    }
                });
            }
        </script>
    </body>

</html>
