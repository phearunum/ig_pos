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
        <form id="form_sale" method="post">
            <table width="100%" class="table-form">
                <tr class="field-title">
                    <td colspan="10" style="text-align: left;">
                        <?php echo $lbl_from?> :<input type="text" name="datefrom" id="datefrom" class="txt_date" value="<?php //echo $from;  ?>" placeholder="YYYY-MM-DD"/>                     
                        <?php  echo $lbl_to?> :<input type="text" name="dateto" id="dateto" class="txt_date" value="<?php //echo $to;  ?>" placeholder="YYYY-MM-DD"/>
                        <input type="text" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER">
                        <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;">
                        
                        <span class="hidden"><?php echo $lbl_seller?>:<input type="text" name="txt_seller_name" id="txt_seller_name" autocomplete="off" placeholder="SEARCH SELLER">
                            <input type="text" name="txt_seller_id" id="txt_seller_id" class="form-control" style="display: none;">
                        </span>
                        <input type="text" name="txt_invoice_no" id="txt_invoice_no" autocomplete="off" placeholder="INVOICE NO" style="color:#cc0000;" value="<?php echo $invoice_no ?>">
                        <select name="select_status" id="select_status">
                            <option value="0">--SELECT STATUS--</option>
                            <option value="HIDDEN">HIDE</option>
							<option value="PAID">SHOW</option>
                        </select>
                        
                        <input type="submit" name="btn_search" id="btn_search" value="<?php echo $btn_search?>" class="btn-srieng">
                        <input type="button" name="btn_submit"  id="btn_export" class="btn-highpoint" value="<?php echo $btn_export ?>"/>
                    </td>
                </tr>
                
            </table>
        </form>
        <div id="panel_report">
            
        </div>
        <div id="loading_panel">
            <br><center><img src="<?php echo base_url('img/loading.gif'); ?>" width="35px" /></center>
        </div>
        <div id="panel_pagination" class="panel_pagination" style="padding-top:10px;">

        </div>

        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
//                search("a");
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

            $('#form_sale').submit(function (e) {
                e.preventDefault();
                search_report(1, true);
            });

            function search_report(page_no, generate_page) {
                show_loading();
                var post_url = '<?php echo site_url('report_sale_detail/search_detail') ?>';
                //window.alert($('#txt_invoice_no').val());
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
					'status':$("#select_status").val()
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

            function void_invoice(e) {
                if (confirm("Are you sure, you want to delete the selected invoice?") == false) {
                    return false;
                }
                var sale_id = $(e).attr('value');
                var post_url = '<?php echo site_url('retail_sale/void') ?>';
                var datas = {
                    'txt_sale_id': sale_id
                };
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: datas,
                    success: function (response) {
                        search_report(1, true);
                    },
                    error: function (response) {

                    }
                });

            }
            
           $("#btn_export").click(function(){
                var df,dt,customer_name, customer_id, invoice,status;
                df = $("#datefrom").val();
                dt = $("#dateto").val();                      
                customer_name = $("#txt_customer_name").val();
                customer_id = $("#txtcustomer_id").val();
                invoice = $("#txt_invoice_no").val();
				status=$("#select_status").val();
                var url = '<?php  echo site_url("report_sale_detail/export?");?>'+'df='+df+'&dt='+dt+'&customer_name='+customer_name+'&customer_id='+customer_id+'&inv='+invoice+'&status='+status;

     window.open(url);
    });
            
        </script>
    </body>

</html>
