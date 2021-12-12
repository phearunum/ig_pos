<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="HPT-SPORT">
        <meta name="author" content="HPT">

        <title>HPT-POS-MANAGMENT</title>
        <link rel="stylesheet" href="<?php echo base_url("css/sweetalert/sweetalert.css") ?>" />
        <script src="<?php echo base_url("js/sweetalert/sweetalert.min.js"); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url("css/datatable/datatables.css") ?>" />
<!--        <link rel="stylesheet" href="<?php //echo base_url("css/datatable/jquery.dataTables.min.css") ?>" />-->
        <!--Date time picker-->
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>

        <link rel="shortcut icon" href="<?php echo base_url('img/hp_logo.ico'); ?>">
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="<?php echo base_url('css/bootstrap-theme.css'); ?>" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="<?php echo base_url('css/elegant-icons-style.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="<?php echo base_url('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/fullcalendar/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="<?php echo base_url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
        <!-- owl carousel -->
        <link rel="stylesheet" href="<?php echo base_url('css/owl.carousel.css'); ?>" type="text/css">
        <link href="<?php echo base_url('css/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo base_url('css/fullcalendar.css'); ?>">
        <link href="<?php echo base_url('css/widgets.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/style-responsive.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/xcharts.min.css'); ?>" rel=" stylesheet">
        <link href="<?php echo base_url('css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/update.min.css'); ?>" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url("js/Draggable.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/numeral/numeral.js');?>"></script>
        <script src="<?php echo base_url('js/jquery-datatable-page-alter.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/keyboard/js/keyboard.js');?>"></script>
        <!--fontawsom-->
        <script type="text/javascript" src="<?php echo base_url('js/');?>"></script>
        <script>
            function back() {
                window.history.back();
            }
        </script>
        <link rel="stylesheet" href="<?php echo base_url('assets/keyboard/css/keyboard.css'); ?>">
        <style>
            .alert_text{
                font-size: 12px;
            }
            #list_transfer li.stock_trans a{
                background-color: #fff;
            }
            #list_transfer li.stock_trans a span{
                color:black;
                font-weight: normal;
            }
            #list_transfer li.stock_trans a:hover,#list_transfer li.stock_trans a:hover >  span{
                color:black;
                background-color: #dddddd !important
            }
            .dropdown-menu.extended li.notification_alert a span,.dropdown-menu.extended li.notification_alert a{
                color:black;
                font-weight: normal;
                background-color: #fff;
            }
            .dropdown-menu.extended li.notification_alert a:hover, .dropdown-menu.extended li.notification_alert a:hover span{
                color:black;
                background-color: #dddddd !important
            }
            .fa-times:before {
                content: "\f00d";
                font-size: 25px;
                position: relative;
                top: 11px;
            }
            .fa-times:hover {
                color:#b7e1fb;
            }
            .fa-keyboard-o:before {
                content: "\f11c";
                font-size: 28px;
                position: relative;
                top: 11px;
                right:5px;
            }
            .fa-keyboard-o:hover {
                color:#b7e1fb;
            }
        </style>

        <script type="text/javascript" charset="utf-8">
            function check_text_val_empty(id){

            if($('#'+id+'').val()==""){
                $('#'+id+'').addClass('has-error');
                $('#'+id+'').after('<span id="span'+id+'" style="float:right;" class="label label-danger">Empty is not allow!!</span>');
                setTimeout(function(){
                    $('#'+id+'').removeClass('has-error');
                    $('#span'+id+'').remove();
                  }, 1000);
                $('#'+id+'').focus();
                  return false;
            }
          }
          function check_text_val_less_0(id){
                if($('#'+id+'').val()<=0){
                    $('#'+id+'').addClass('has-error');
                    $('#'+id+'').after('<span id="span'+id+'" style="float:right;" class="label label-danger">Value is not valid!!</span>');
                    setTimeout(function(){
                        $('#'+id+'').removeClass('has-error');
                        $('#span'+id+'').remove();
                      }, 1000);
                    $('#'+id+'').focus();
                      return false;
                }
          }

            function showStockTransfer(str) {
                if (str == "") {
                    document.getElementById("list_transfer").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("list_transfer").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("POST", "<?php echo site_url("stock_transffer/getlist/"); ?>", true);
                    xmlhttp.send();
                }
            }

            $(document).ready(function () {
                $("#navigatehide").click(function () {
                    $('.table-table').toggleClass("persist-area");
                });
                $('#icon-close').on('click',function(evt){
                   if (confirm("Close Window?")) {
                        window.location.href = '/exitkiosk';
                    }
                });
            });

        </script>
        <?php
        if(!empty($this->input->cookie('language')))
            if($this->input->cookie('language') != 'en')
                echo "<style>.sub-menu span{font-family:Khmer OS}#sidebar > ul > li > ul.sub > li > a{font-family:Khmer OS}.container-fluid-custom h4.text-center,.container-fluid-custom h3.text-center{font-family:Khmer OS}#navigation a,#navigation > ul li{font-family:Khmer OS}</style>";

        ?>
    </head>
    <body>
        <div class="keyboard main-board hidden" style="width: 1000px;position: absolute;z-index: 10000;">
    <table border="1" width="100%" class="main-board" style="display: none;">
        <tr class="pointer">
            <td id="exit_tab">Exit</td>
            <td colspan="12" id="move"></td>
            <td id="clear">Clear</td>
        </tr>
        <tr class="pointer">
            <td class="key_button" id="hu">`</td>
            <td class="key_button" id="one">1</td>
            <td class="key_button" id="two">2</td>
            <td class="key_button" id="tree">3</td>
            <td class="key_button" id="four">4</td>
            <td class="key_button" id="five">5</td>
            <td class="key_button" id="six">6</td>
            <td class="key_button" id="seven">7</td>
            <td class="key_button" id="eight">8</td>
            <td class="key_button" id="nine">9</td>
            <td class="key_button" id="ten">0</td>
            <td class="key_button" id="dok">-</td>
            <td class="key_button" id="equal">=</td>
            <td class="key_button_del" id="del" width="90">backspace</td>

        </tr>
        <tr class="pointer">
            <td class="key_button_tap">Tap</td>
            <td class="key_button" id="q">Q</td>
            <td class="key_button" id="w">W</td>
            <td class="key_button" id="e">E</td>
            <td class="key_button" id="r">R</td>
            <td class="key_button" id="t">T</td>
            <td class="key_button" id="y">Y</td>
            <td class="key_button" id="u">U</td>
            <td class="key_button" id="i">I</td>
            <td class="key_button" id="o">O</td>
            <td class="key_button" id="p">P</td>
            <td class="key_button" id="kl">[</td>
            <td class="key_button" id="lk">]</td>
            <td class="key_button" id="kj">\</td>
        </tr>
        <tr class="pointer">
            <td class="cap" width="95">CapsLock&nbsp;&nbsp;&nbsp;<span class="span_key"><img src="<?php echo base_url('img/img/point.png');?>" width="10"></span></td>
            <td class="key_button" id="a">A</td>
            <td class="key_button" id="s">S</td>
            <td class="key_button" id="d">D</td>
            <td class="key_button" id="f">F</td>
            <td class="key_button" id="g">G</td>
            <td class="key_button" id="h">H</td>
            <td class="key_button" id="j">J</td>
            <td class="key_button" id="k">K</td>
            <td class="key_button" id="l">L</td>
            <td class="key_button" id="oi">;</td>
            <td class="key_button" id="lo">' '</td>
            <td colspan="2" id="Enter">Enter</td>

        </tr>
        <tr class="pointer">
            <td class="exit" colspan="2">Shift</td>
            <td class="key_button" id="z">Z</td>
            <td class="key_button" id="x">X</td>
            <td class="key_button" id="c">C</td>
            <td class="key_button" id="v">V</td>

            <td class="key_button" id="b">B</td>
            <td class="key_button" id="n">N</td>
            <td class="key_button" id="m">M</td>
            <td class="key_button" id="sim"><</td>
            <td class="key_button" id="sin">></td>
            <td class="key_button" id="quat">?</td>
            <td class="" colspan="2">Shift</td>

        </tr>
        <tr class="pointer">
            <td class="">Ctrl</td>
            <td id="khmer"><img src="<?php echo base_url('img/img/windows.jpg');?>" width="25"></td>
            <td id="alt">Alt</td>
            <td class="key_button_space" colspan="7">Spacebar</td>
            <td id="alt1">Alt</td>
            <td class="cap"><img src="<?php echo base_url('img/img/1.jpg');?>" width="25"></td>
            <td  id="m"><img src="<?php echo base_url('img/img/1.jpg');?>" width="20"></td>
            <td id="">Ctrl</td>
        </tr>
    </table>

</div>
        <?php
        $lang = $this->input->cookie('language');
        $this->lang->load('header', $lang == '' ? 'en' : $lang);
        ?>
        <!-- container section start -->
        <section id="container" class="" >
            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu" id="navigatehide"></i></div>
                </div>
                <?php
                $i = 1;
                $seg = $this->uri->segment($i);
                $curr_page = '';
                while ($seg != null) {
                    $curr_page = $curr_page . $seg . "/";
                    $i++;
                    $seg = $this->uri->segment($i);
                }
                $this->session->set_userdata('curr_page', $curr_page);
                $company_profile = $this->Base_model->loadToListJoin("select * from company_profile limit 1");
                foreach ($company_profile as $com) {
                    ?>
                    <!--logo start-->
                    <a href="http://www.softpointcambodia.com" class="logo" target="_blank" style="font-family: Highpoint;">
                        <?php echo $com->company_profile_name . ' ' ?>
                    </a>
                    <!--logo end-->
                    <?php
                      }
                    ?>
                <div class="top-nav notification-row">
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu" style="">
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <?php

                            $branch ="";
                            if($this->Base_model->is_supper_user()==false){
                                $branch=" and branch_id =".$this->Base_model->branch_id();
                            }
                            $alert_remain_amount=$this->Base_model->get_value_byQuery("select count(*) count_qty from (select
                                    s.stock_item_id,
                                    id.item_detail_name,
                                    id.item_detail_remain_alert,
                                    s.branch_id,
                                    b.branch_name,
                                    sum(s.stock_qty) qty
                                    from stock s
                                    inner join item_detail id on id.item_detail_id=s.stock_item_id
                                    inner join branch b on b.branch_id=s.branch_id
                                    group by s.branch_id,s.stock_item_id,s.stock_location_id) tmp where qty<=item_detail_remain_alert $branch","count_qty");
                                //var_dump($alert_remain_amount);
                                ?>


                            <?php if($alert_remain_amount>0){ ?>
                                <span class="badge bg-important"><?php if($alert_remain_amount==0){echo "";}else{echo $alert_remain_amount;} //echo $alert_remain_amount;die();?></span>
                            <?php
                             }
                            ?>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">There are <?php echo $alert_remain_amount ?> stock remain alert</p>
                            </li>
                            <?php
                                if($alert_remain_amount>0){
                                    $customer_birthday=$this->Base_model->loadToListJoin("select *from (select
                                    s.stock_item_id,
                                    id.item_detail_name,
                                    id.item_detail_remain_alert,
                                    s.branch_id,
                                    b.branch_name,
                                    sl.stock_location_name stock_name,
                                    sum(s.stock_qty) qty
                                    from stock s
                                    inner join item_detail id on id.item_detail_id=s.stock_item_id
                                    inner join branch b on b.branch_id=s.branch_id
                                    inner join stock_location sl on sl.stock_location_id=s.stock_location_id
                                    group by s.branch_id,s.stock_item_id,s.stock_location_id) tmp where qty<=item_detail_remain_alert $branch limit 5");
                                    foreach($customer_birthday as $ep){
                            ?>
                            <li>
                                    <span class="label label-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                    <span style="color:black; font-size:14px;"><?php  echo $ep->item_detail_name.' | Qty:'.$ep->qty; ?></span>
                                    <br/>
                                     <span style="color:black; font-size:14px;padding-left: 30px;"><?php  echo "Stock : ".$ep->stock_name.' | Branch:'.$ep->branch_name; ?></span>

                            </li>
                            <?php
                                }
                              }
                            ?>
                            <li>
                                <a href="<?php echo site_url("report_stock/stock_alert");?>" >See all notifications</a>
                            </li>
                        </ul>
                    </li>
                 <!-- Customer need to top -->
                    <li id="alert_notificatoin_bar" class="dropdown" onclick="check_notification()">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="fa fa-dollar" aria-hidden="true"></i>
                            <?php $alert_remain_amount=$this->Base_model->get_value_byQuery("SELECT count(*) count_qty FROM customer WHERE customer_balance<=customer_amount_remain_alert","count_qty"); ?>
                            <?php if($alert_remain_amount>0){ ?>
                                <span class="badge bg-important"><?php if($alert_remain_amount==0){echo "";}else{echo $alert_remain_amount;} ?></span>
                            <?php
                             }
                            ?>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <?php if($alert_remain_amount==0){?>
                                <p class="blue">There are no customer need to topup</p>
                                <?php } else{?>
                                <p class="blue">There are <?php echo $alert_remain_amount ?> customer need to topup</p>
                                <?php }?>
                            </li>
                            <?php
                                if($alert_remain_amount>0){
                                    $alert_topup=$this->Base_model->loadToListJoin("SELECT customer_name,customer_phone,customer_balance FROM customer WHERE customer_balance<=customer_amount_remain_alert LIMIT 5");
                                    foreach($alert_topup as $ep){
                            ?>
                            <li>
                                    <span class="label label-primary"><i class="fa fa-dollar" aria-hidden="true"></i></span>
                                    <span style="color:black; font-size:14px;"><?php  echo $ep->customer_name.' | '.$ep->customer_phone; ?></span>
                                    <br/>
                                     <span style="color:black; font-size:14px;padding-left: 30px;"><?php  echo "Balance : ".$ep->customer_balance; ?></span>
                            </li>
                            <?php
                                }
                              }
                              else
                                echo "<li><div style='color:black;text-align:center'>you don't have notifications</div></li>";
                            ?>
                            <li>
                                <a href="<?php echo site_url("customer/card_topup");?>" >See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Customer need to top  -->
                    <!-- Stock Expire -->
                    <li id="alert_notificatoin_bar" class="dropdown" onclick="check_notification()">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php
                            $alert_remain_amount=$this->Base_model->get_value_byQuery("select count(*) count_qty from v_stock where curdate()-stock_alert_date>=0 and stock_alert_date!='0000-00-00' $branch ","count_qty"); ?>
                            <?php if($alert_remain_amount>0){ ?>
                                <span class="badge bg-important"><?php if($alert_remain_amount==0){echo "";}else{echo $alert_remain_amount;} ?></span>
                            <?php
                             }
                            ?>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <?php if($alert_remain_amount==0){?>
                                <p class="blue">There are no expire products</p>
                                <?php } else{?>
                                <p class="blue">There are <?php echo $alert_remain_amount ?> expire products</p>
                                <?php }?>
                            </li>
                            <?php
                                if($alert_remain_amount>0){
                                    $alert_topup=$this->Base_model->loadToListJoin("select * from v_stock where curdate()-stock_alert_date>=0 and stock_alert_date!='0000-00-00' $branch limit 5");
                                    foreach($alert_topup as $ep){
                            ?>
                            <li>
                                    <span class="label label-primary"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    <span style="color:black; font-size:14px;"><?php  echo $ep->item_detail_name.' | Qty:'.$ep->stock_qty; ?></span>
                                    <br/>
                                     <span style="color:black; font-size:14px;padding-left: 30px;"><?php  echo "Expire Date : ".$ep->stock_expire_date; ?></span>

                            </li>
                            <?php
                                }
                              }
                              else
                                echo "<li><div style='color:black;text-align:center'>you don't have notifications</div></li>";
                            ?>
                            <li>
                                <a href="<?php echo site_url("report_stock/product_expire");?>" >See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Stock Expire  -->
                    <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                    <img alt="" src="<?php ?>">
                                </span>
                                <?php
                                $lang = $this->input->cookie('language');
                                if ($lang == "kh") {
                                    ?>
                                    <span class="username"><img src="<?php echo base_url("img/icons/kh_flage.png"); ?>"></span>
                                        <?php
                                    } else if($lang=="ch") {
                                        ?>
                                    <span class="username"><img src="<?php echo base_url("img/icons/ch_flage.jpg"); ?>" width="18px"></span>
                                <?php }else{ ?>
                                     <span class="username"><img src="<?php echo base_url("img/icons/en_flage.jpg"); ?>" width="18px"></span>
                                <?php } ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu my_lang" >
                                <div class="log-arrow-up"></div>
                                 <li class="eborder-top" id="kh">
                                    <a href="javascript:void(0);"><img src="<?php echo base_url("img/icons/kh_flage.png"); ?>"></i> <?php echo $this->lang->line('lang_kh') ?></a>
                                 </li>
                                 <li id="en">
                                    <a href="javascript:void(0);"><img src="<?php echo base_url("img/icons/en_flage.jpg"); ?>" width="18px"> <?php echo $this->lang->line('lang_en') ?></a>
                                 </li>
                                 <li id="ch">
                                    <a href="javascript:void(0);"><img src="<?php echo base_url("img/icons/ch_flage.jpg"); ?>" width="18px"> <?php echo $this->lang->line('lang_ch') ?></a>
                                </li>
                            </ul>
                        </li>
                    <!-- alert notification start-->
                    <script>
                        $('.my_lang li').click(function(){
                            var langs=(this.id);
                            $.ajax({
                                type: 'post',
                                url: '<?php echo site_url("language/changeLanguage"); ?>'+'/'+langs,
                                data: $('form').serialize(),
                                success: function () {
                                    location.reload();
                                }
                            });
                        });
                    </script>

                        <!-- user login dropdown start-->
                            <?php
                            $profile_records = $this->Base_model->loadToListJoin("SELECT employee_id,employee_name FROM employee WHERE employee_id=" . $this->Base_model->user_id());
                            foreach ($profile_records as $pr) {
                                ?>
                                    <li class="dropdown dropdown_user">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            <span class="profile-ava">
                                                <img alt="" src="<?php ?>">
                                            </span>
                                            <span class="username"><?php echo $pr->employee_name ?></span>
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <div class="log-arrow-up"></div>
                                            <li class="eborder-top">
                                                <a href="<?php echo site_url("employee/edit_password_load/" . $pr->employee_id); ?>"><i class="icon_profile"></i><?php echo $this->lang->line('change_password') ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url("logout"); ?>"><i class="icon_key_alt"></i><?php echo $this->lang->line('log_out') ?></a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php
                            }
                            ?>
                        <!-- user login dropdown end -->

                        <li class="dropdown dropdown_contact">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                    <img alt="" src="<?php ?>">
                                </span>
                                <span class="username"><?php echo $this->lang->line('contact_us') ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="<?php echo site_url("aboutus/contactus"); ?>"><i class="icon_profile"></i><?php echo $this->lang->line('contact_us') ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("aboutus"); ?>"><i class="icon_profile"></i><?php echo $this->lang->line('about_us') ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown_logo">
                            <a  href="http://www.softpointcambodia.com" target="_new">                                <!---Logo image-->
                                <span class="username"><img src="<?php echo base_url("img/3.png"); ?>" width="30"></span>
                            </a>
                        </li>
                        
                        <li>
                           <span class="dropdown dropdown_logo">
                                <i onclick="node_osk();" class="fa fa-keyboard-o" aria-hidden="true"></i>
                           </span>
                        </li>
                        <li class="dropdown dropdown_logo">
                            <span id="icon-close">
                                <i class="fa fa-times"></i>
                            </span></a>
                        </li>

                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->

<?php
$this->load->view("template/menu")
?>

                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
        </section>

        <!-- container section start -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
