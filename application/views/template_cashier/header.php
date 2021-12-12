<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="HPT-SPORT">
        <meta name="author" content="HPT">

        <title>POS</title>
        <link rel="stylesheet" href="<?php echo base_url("css/sweetalert.css") ?>" />
        <script src="<?php echo base_url("css/sweetalert.min.js"); ?>"></script>
      
        <!--Date time picker-->
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>

        <link rel="shortcut icon" href="<?php echo base_url('img/hp_logo.ico'); ?>">
        <!-- Bootstrap CSS -->    
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="<?php echo base_url('css/bootstrap-theme.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/style-responsive.css'); ?>" rel="stylesheet" />
        <style>
          .fa-keyboard-o:before {
                content: "\f11c";
                font-size: 30px;
                position: absolute;
                right: 50px;
                top:2px;
            }
            .fa-keyboard-o:hover{
                color:#b7e1fb;
            }

            .fa-times:before {
                content: "\f00d";
                position: relative;
                top: 1px;
                font-size: 28px;
            }
            .fa-times:hover {
                color:#b7e1fb;
            }
        </style>
        <link href="<?php echo base_url('css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url("css/cafe/rms.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("css/cafe/table.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("css/cafe/calculator.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("css/cafe/modal.css"); ?>">
        <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet" />
        <!-- loading style -->
        <link href="<?php echo base_url('css/cafe/loading/modal-loading-animate.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/cafe/loading/modal-loading.css'); ?>" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo base_url('js/loading/modal-loading.js'); ?>"></script>
        <script src="<?php echo base_url('js/realtime/moment.min.js')?>"></script>
    <div class="hidden">
            <img src="<?php echo base_url('img/hptAds.gif')?>" width="100%" height="60px" >
        </div>
		<div id="casheir_head" style="height: 40px; font-size:1.5rem;">
            <div class="col-md-3 col-lg-3 col-sm-3 text-left" id="div_management" style="color:#FFF">
                <a href="<?php echo site_url('welcome')?>" style="color:#FFF">
                    <i class="fa fa-bars fa-lg " aria-hidden="true"></i>
                   
                </a>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-3 text-right" style="color:#FFF">
                
                <i class="fa fa-fw fa-lg fa-user"></i>
                <label id="lbl_user">
                    <?php
                        $name=$this->Base_model->get_value_byQuery("select employee_name from employee where employee_id=".$this->Base_model->user_id()." ","employee_name");
                        echo $name;
                    ?>
                </label>
                <label hidden="" id="lbl_user_id">
                </label>
            </div>
            <div class="col-md-4 col-lg-4 hidden-sm text-right" style="color:#FFF">
                <i class="fa fa-fw fa-lg fa-clock-o"></i>
                <label id="lbl_date">
                    01/01/2019 6:46 PM
                </label>
            </div>
           
            <div class="col-md-2 col-lg-2 col-xs-2 text-right" style="color:#FFF">
           
                <span id="icon-close"></span>
                <i class="fa fa-sign-out" style="font-size: 2rem;"></i> LOGOUT
            </div>
            <!--
            <div class="col-md-1 col-lg-1 col-xs-2 text-right" style="color:#FFF">
                <span>
                    <i onclick="node_osk();" class="fa fa-keyboard-o" aria-hidden="true"></i>
                </span>
                &nbsp;
                <span id="icon-close">
                    <i class="fa fa-times"></i>
                    
                </span>
            </div>
        -->
        </div>

        <script type="text/javascript">
            var loading ;
            function showloading() {
                loading = new Loading({
                    direction: 'hor',
                    discription: 'Loading...',
                    defaultApply:   true,
                    loadingBgColor:     '#13224B',
                    //animationOriginColor:   'red',
                });
            }
            function hideloading() {
                loading.out();
            }
            
          
            $('#icon-display').on('click',function(evt){
               var width = 650;
            var left = 200;

            left += window.screenX;

            window.open('<?php echo site_url('display')?>','windowName','resizable=1,scrollbars=1,fullscreen=0,height=200,width=' + width + '  , left=' + left + ', toolbar=0, menubar=0,status=1');
               // window.open('?php// echo site_url('display')?>', "customWindow", "width=960, height=1040, top=0, left=960");
            });
            

            $(document).ready(function() {
                var interval = setInterval(function() {
                    var momentNow = moment();
                    $('#lbl_date').html(momentNow.format('DD/MM/YYYY') + ' '+momentNow.format('A hh:mm:ss'));

                }, 100);
               
            });
        
        </script>