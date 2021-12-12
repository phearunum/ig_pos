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
        <link rel="stylesheet" href="<?php echo base_url("css/list_view/jquery.mobile-1.4.5.min.css"); ?>">
        <script src="<?php echo base_url("js/list_view/jquery-1.11.3.min.js"); ?>"></script>
        <script src="<?php echo base_url("js/list_view/jquery.mobile-1.4.5.min.js"); ?>"></script>
        <style>
            #lbl_price{
                color:#6E4740;
                font-weight: bold;
            }
            #img_itemdetail{
                border:solid 1px #6E4740;
            }
            .scrollToTop{
                padding:10px; 
                text-align:center; 
                background: whiteSmoke;
                font-weight: bold;
                color: #444;
                text-decoration: none;
                position:fixed;
                top:50%;
                right:40px;
                display:none;
                background: no-repeat 0px 20px;
            }
            .scrollToTop:hover{
                text-decoration:none;
            }
            body {
                font-family: "Lato", sans-serif;
            }
            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                right: 0;
                background:rgba(255,255,255,1);

                overflow-x: hidden;
                transition: 0.30s;
            }
            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #201C6F;
                display: block;
                transition: 0.3s;
            }
            .sidenav a:hover, .offcanvas a:focus{
                color: #660000;
            }
            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }
            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }
            #li_category li{
                list-style-type: none;
                border-bottom:dashed 1px black;
            }
        </style>
    </head>
    <body>
        <div id="mySidenav" class="sidenav" style="margin-top: 4%">
            <ul id='li_category'>

            </ul>
        </div>   
        <div class="row" style="background-color: #FFF;margin-top: 5%">
            <div class="col-lg-12">
                <div class="row" id="nav-right">
                    <div class="col-lg-5">
                        <form>
                            <div class="well bs-component">
                                <div class="form-group">
                                    <div class="row hidden">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="control-label" name="txt_table_id" id="txt_table_id" value="<?php echo $table_id ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="panel_order">
                                                <div class="table-responsive">
                                                    <table width="100%" border="0" id="table-table" class="table">          
                                                        <tr style="color:#6E4740;border: solid 2px #6E4740">
                                                            <th><?php echo "No"; ?></th>
                                                            <th class="text-left"><?php echo "Name"; ?></th>
                                                            <th class="text-left" style="width: 40px"><?php echo "Qty"; ?></th>
                                                            <th class="text-right" style="width: 80px"><?php echo "Price"; ?></th>
                                                            <th class="text-right" style="width: 80px"><?php echo "Total"; ?> </th>
                                                            <th style="width: 70px"><?php echo "Edit"; ?></th>
                                                            <th style="width: 40px"><?php echo "Del"; ?></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="loading" onclick="" class="hidden">
                                                <div class="overlay">
                                                    <div class="m-loader mr-20">
                                                        <svg class="m-circular" viewBox="25 25 50 50">
                                                            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </div>
                                                    <h3 class="l-text">Loading</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: center;">
                                            <label id="lbl_grand_total" style="color:#6E4740;font-weight: bold;font-size: 40px;"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary icon-btn" id="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?php echo "Save"; ?></button>
                                        </div>
                                        <div class="col-md-6">    
                                            <button type="button" class="btn btn-default" id='btn_clear'><i class="fa fa-fw fa-lg fa-times-circle"></i><?php echo "Cancel"; ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7" style="border-left: solid #13224B 2px;padding:0px;">
                        <button name="btn_nav" id="btn_nav" onclick="openNav()"><i class="fa fa-fw fa-lg fa-list"></i>Category</button>
                        <div class="well bs-component">
                            <div class="form-group">
                                <div class="col-md-12" style='height: 100%;overflow-y: scroll;'>
                                    <div data-role="content">
                                        <form class="ui-filterable">
                                            <input id="myFilter" type="text" data-type="search">
                                        </form>
                                        <ul data-role="listview" id='li_itemdetail' data-filter="true" data-input="#myFilter" id="li_table"  data-inset="true">

                                        </ul>
                                    </div><!-- /content -->
                                </div>
                                <div class="col-md-12">
                                    <a href="#" class="scrollToTop"><i class="fa fa-arrow-circle-o-up"></i>Top</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        $(function () {
            // Bind the swipeleftHandler callback function to the swipe event on div.box
            $("#nav-right").on("swipeleft", swipeleftHandler);
            $("#nav-right").on("swiperight", swiperightHandler);
            // Callback function references the event target and adds the 'swipeleft' class to it
            function swipeleftHandler(event) {
                openNav();
            }
            function swiperightHandler(event) {
                closeNav();
            }
        });
        $(document).ready(function (e) {
            //$(".sidebar-toggle").hide();
            //$(".main-header").hide();
            load_category();
            load_itemdetail();
            reload_order();
            scroll_top();
        });
        
        function scroll_top() {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollToTop').fadeIn();
                } else {
                    $('.scrollToTop').fadeOut();
                }
            });

            //Click event to scroll to top
            $('.scrollToTop').click(function () {
                $('html, body').animate({scrollTop: 0}, 800);
                return false;
            });
        }
        function load_category() {
            var post_url = '<?php echo site_url('order/load_category'); ?>';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                success: function (response) {
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        for (var i = 0; i < list.length; i++) {
                            $("#li_category").append($("<li value=" + list[i].item_type_id + ">" + "<a href='#'>" + list[i].item_type_name + "</a></li>"));
                        }
                        $('#li_category').listview('refresh');
                    }
                    hide_loading();
                }
                ,
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        function load_itemdetail(type_id) {
            var post_url = '<?php echo site_url('order/load_item_detail/'); ?>' + '/' + type_id;
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                success: function (response) {
                    $('#li_itemdetail').empty();
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        for (var i = 0; i < list.length; i++) {
                            if (list[i].item_detail_photo == '' || list[i].item_detail_photo == null) {
                                $("#li_itemdetail").append($("<li value=" + list[i].item_detail_id + "><a href='#'><div style='position:absolute'><img src='<?php echo base_url("images/no_images.jpg"); ?>' width='60px' height='60px' id='img_itemdetail'></div>" + "<div style='margin-left:20%;text-align:right'><h1>" + list[i].item_detail_name + "</h1>" + "<p id='lbl_price'>" + list[i].price + "</p></div></a>" + "</li>"));
                            } else {
                                $("#li_itemdetail").append($("<li value=" + list[i].item_detail_id + "><a href='#'><div style='position:absolute'><img src='<?php echo base_url("images/product/"); ?>" + '/' + list[i].item_detail_photo + "' width='60px' height='60px' id='img_itemdetail'></div>" + "<div style='margin-left:20%;text-align:right'><h1>" + list[i].item_detail_name + "</h1>" + "<p id='lbl_price'>" + list[i].price + "</p></div></a>" + "</li>"));
                            }
                        }
                        $('#li_itemdetail').listview('refresh');
                    }
                    hide_loading();
                }
                ,
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        $("#li_itemdetail").on('click', 'li', function () {
            var post_url = '<?php echo site_url('order/save') ?>' + '/' + $(this).val();
            $.ajax({
                type: 'POST',
                url: post_url,
                data: $('form').serialize(),
                success: function () {
                    //$('#msg').html(response);
//                        reload_invoice(true, false);
//                        reset_form();
//                        console.log(response);
//                    $.notify({
//                        title: "Data Complete : ",
//                        message: "Something cool is just saved!",
//                        icon: 'fa fa-check'
//                    }, {
//                        type: "info"
//                    });
                    reload_order();
                },
                error: function (response) {
                    //$('#msg').html(response);
                }
            });
        });
        $("#li_category").on('click', 'li', function () {
            load_itemdetail($(this).val());
            closeNav();

        });
        function hide_loading() {
            $('#loading').slideUp();
        }
        function show_loading() {
            $('#loading').slideDown();
        }
        function reload_order(){
            show_loading();
            var post_url = '<?php echo site_url('order/order_list') ?>';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                success: function (response) {
                    if (response.trim() !== '[]' || response.trim() !== '') {
                        var list = JSON.parse(response);
                        var grand_total = 0;
                        for (var i = 0; i < list.length; i++) {
                            grand_total += parseFloat(list[i].sub_total);
                            var exist = $("#panel_order").find("[data-id=" + list[i].detail_id + "]").length;

                            if (exist > 0) {
                                $("[data-id=" + list[i].detail_id + "]").find('[data=item_name]').html(list[i].item_name);
                                $("[data-id=" + list[i].detail_id + "]").find('[data=qty]').html(list[i].qty);
                                $("[data-id=" + list[i].detail_id + "]").find('[data=unit_price]').html(parseFloat(list[i].unit_price).toFixed(2));
                                $("[data-id=" + list[i].detail_id + "]").find('[data=sub_total]').html(parseFloat(list[i].sub_total).toFixed(2));
                            } else {
                                var html_str = "<tr  data-id='" + list[i].detail_id + "'>" +
                                        "<td class='id' style='display:none'>" + list[i].detail_id + "</td>" +
                                        "<td>" + (i+1) + "</td>" +
                                        "<td data='item_name'>" + list[i].item_name + "</td>" +
                                        "<td data='qty'>" + list[i].qty + "</td>" +
                                        "<td data='unit_price' class='text-right'>" + parseFloat(list[i].unit_price).toFixed(2) + "</td>" +
                                        "<td data='sub_total' class='text-right'>" + parseFloat(list[i].sub_total).toFixed(2) + "</td>" +
                                        "<td><a class='edit_plus' onclick='edit_plus(" + list[i].detail_id + ")'><i class='fa fa-plus-circle' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='edit_minus' onclick='edit_minus(" + list[i].detail_id + ")'><i class='fa fa-minus-circle' aria-hidden='true'></i></a></td>" +
                                        "<td><a class='delete'><i class='fa fa-times-circle' aria-hidden='true'></i></a></td>" +
                                        "</tr>";

                                $("#panel_order").find("table").append(html_str);
                            }
                        }
                        $("#lbl_grand_total").text(parseFloat(grand_total).toFixed(2));
                        if (list.length > 0) {
                            $("#btnsubmit_").show();
                            $("#btn_void").show();
                        } else {
                            $("#btnsubmit_").hide();
                            $("#btn_void").hide();
                        }
                    }
                    hide_loading();
                }
                ,
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        function edit_plus(id, sign)
        {
            var post_url = '<?php echo site_url('order/update_sale_detail_qty') ?>';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                data: {'detail_id': id, 'sign': '+'},
                success: function (response) {
                    reload_order();
                },
                error: function (response) {
                }
            });
        }
        function edit_minus(id)
        {

            var post_url = '<?php echo site_url('order/update_sale_detail_qty') ?>';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                data: {'detail_id': id, 'sign': '-'},
                success: function (response) {
                    reload_order();
                },
                error: function (response) {
                }
            });

        }
        function delete_record(id)
        {
            var post_url = '<?php echo site_url('order/delete') ?>';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                data: {'detail_id': id},
                success: function (response) {
                    reload_order();
                },
                error: function (response) {
                }
            });
        }
        $("#submit").click(function () {
            if (confirm('Do you want to save?')) {
                submit_order();
            }
        });
        $("#btn_clear").click(function () {
            if (confirm('Do you want to cancel?')) {
                cancel();
            }
        });
        function submit_order()
        {
            var post_url = '<?php echo site_url('order/submit_order') ?>';
            var table_no = $("#txt_table_id").val();
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                data: {'txt_table_id': table_no},
                success: function (response) {
                    //reload_order();
                    var json = $.parseJSON(response);
                    print(json.invoice_no);
                },
                error: function (response) {

                }
            });
        }
        function print(order_no) {
            var post_url = '<?php echo site_url("order/print_order/"); ?>';
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                data: {'order_no': order_no},
                success: function (response) {
                    //reload_order();
                    window.open("<?php echo site_url("table_order"); ?>",'_self');
                },
                error: function (response) {

                }
            });
        }
        function cancel() {
            var post_url = '<?php echo site_url('order/cancel_order') ?>';
            var table_no = $("#txt_table_id").val();
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                data: {'txt_table_id': table_no},
                success: function (response) {
                    //reload_order();
                    //var json = $.parseJSON(response);
                    window.open("<?php echo site_url("table_order"); ?>", '_self');
                },
                error: function (response) {

                }
            });
        }
        $("#table-table").on('click', '.delete', function () {
            if (confirm('Do you want to delete this record?')) {
                var id = $(this).closest('tr').children('td.id').text();
                delete_record(id);
                $(this).closest('tr').remove();
            }
        });
    </script>
</html>
