<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>POS SYSTEMß</title>

        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="<?php echo base_url('css/bootstrap-theme.css'); ?>" rel="stylesheet">
        <!--external css-->

        <!-- font icon -->
        <link href="<?php echo base_url('css/elegant-icons-style.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('css/font-awesome.css'); ?>" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/style-responsive.css'); ?>" rel="stylesheet" />
        <script src="<?php echo base_url('js/jquery_autocomplete/jquery-1.10.2.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js'); ?>"></script>

      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>កន្លែងញ៉ាំ</title>
      <link rel="icon" href="<?=base_url('img/sp.png')?>" type='image/png'>
      <link href="<?=base_url('css/bootstrap.css')?>" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="<?=base_url('css/fonts/iconic/css/material-design-iconic-font.min.css')?>">
      <link rel="stylesheet" type="text/css" href="<?=base_url('css/main.css')?>">
      <link href="<?=base_url('css/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
      <link href="<?=base_url('css/fonts/FontKhmer/KhmerFont.css')?>" rel="stylesheet" type="text/css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            .tab{
                position:absolute;
                float: right;
                width: 30%;
            }
            .tab div{
                width:40px;
                background-color: #13224B;
                color:white;
                cursor: pointer;
                transition: all .2s ease .15s;
                -webkit-transition: all .3s ease .15s;
                -o-transition: all .3s ease .15s;
                -moz-transition: all .3s ease .15s;
            }
            .head_{
                width:10px;
                transition: all .3s ease .15s;
                -webkit-transition: all .3s ease .15s;
                -o-transition: all .3s ease .15s;
                -moz-transition: all .3s ease .15s;
            }
            .tab div:hover .head_{
                background-color: #D71A21;
            }
            .active{
                background-color: #D71A21;
            }
            .fa{
                padding:0 10px;
            }
            /*Check box*/
            input[type="checkbox"] + .label-text:before{
                    content: "\f096";
                    font-family: "FontAwesome";
                    speak: none;
                    font-style: normal;
                    font-weight: normal;
                    font-variant: normal;
                    text-transform: none;
                    line-height: 1;
                    -webkit-font-smoothing:antialiased;
                    width: 1em;
                    display: inline-block;
                    margin-right: 5px;
            }

            input[type="checkbox"]:checked + .label-text:before{
                    content: "\f14a";
                    color: #13224B;
                    animation: effect 250ms ease-in;
            }

            input[type="checkbox"]:disabled + .label-text{
                    color: #aaa;
            }

            input[type="checkbox"]:disabled + .label-text:before{
                    content: "\f0c8";
                    color: #ccc;
            }
            @keyframes effect{
                    0%{transform: scale(0);}
                    25%{transform: scale(1.3);}
                    75%{transform: scale(1.4);}
                    100%{transform: scale(1);}
            }

        </style>
    </head>
    <body class="login-bg">
    <div id="overlay">
      <div><img src="<?=base_url('img/loading.gif')?>" width="64px" height="64px"/></div>
   </div>
   <div class="navbar-header">
         <div class="container" style="display:flex">
            <div class="login-header-logo">
               <img src="<?=base_url('img/sop185x85.svg')?>"/>
            </div>
            <div class="border"></div>
            <div class="type-js headline">
               <h1 class="text-js" style="font-family: Khmer OS Moul Light;">សូមស្វាគមន៍មកកាន់កម្មវិធីកន្លែងញ៉ាំ!</h1>
            </div>
         </div>
      </div>
      <!--Element-->
       <div class="element-container">
          <div id="myModal" class="modal-login hidden">
            <div class="modal-login-content">
              <span class="close">&times;</span>
              <p>Some text in the Modal..</p>
        </div>

          </div>
         <div class="login-slide">
            <img class="login-slide-img" src="<?=base_url('img/card.png')?>" alt=""/>
            <img class="login-slide-img" src="<?=base_url('img/ID.png')?>" alt=""/>
            <img class="login-slide-img" src="<?=base_url('img/pay-in-person.png')?>" alt=""/>
         </div>
         <!--End Slide show-->
         <div class="wrap-login100">
            <form id="frm_login" action="<?php echo site_url('welcome/check_user') ?>" class="login100-form validate-form" method="POST"><!-- action="<?=base_url("Admin/welcome")?>">-->
               <span class="login100-form-logo">
               <i class="fa fa-lock"></i>
               </span>
               <span class="login100-form-title p-b-34 p-t-27">
               Log in
               </span>
               <div class="wrap-input100 validate-input" data-validate = "Enter username">
                  <input class="input100" type="text" name="txtusername" id="txtusername" placeholder="Username">
                  <span class="focus-input100" data-placeholder="&#xf207;"></span>
               </div>
               <div class="wrap-input100 validate-input" data-validate="Enter password">
                  <input class="input100" type="password" name="txtpassword" id="txtpassword" placeholder="Password">
                  <span class="focus-input100" data-placeholder="&#xf191;"></span>
               </div>
               <div class="contact100-form-checkbox">
                  <input class="input-checkbox100" id="chk_remember" type="checkbox" name="chk_remember">
                  <label class="label-checkbox100 hidden" for="chk_remember">
                  Remember me
                  </label>
               </div>
               <div class="container-login100-form-btn">
                <?php
                     echo $this->session->flashdata('error');
                    ?>
                  <input type="submit" class="btn btn-primary btn-block" value="Login"/>
                  <input id="icon-close" type="button" class="btn btn-warning btn-block" value="Close"/>

               </div>
               <div class="text-center p-t-90">
                  <a class="txt1" href="#">
                  Forgot Password?
                  </a>
               </div>
            </form>
         </div>
         <div class="clearfix"></div>
      </div>
      <div class="navbar-footer">
         <ul class="title-left">
            <li>Copyright © 2018 SoftPoint Cambodia.</li>
         </ul>
         <ul class="pull-right">
            <li><a href="https://www.facebook.com/Softpoint-Autoid-848337778674199/?ref=br_rs" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCAMhBjnC3cKiux8Pz-2gEww" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
         </ul>
      </div>
    </body>
</html>
<script>
    var site_url;
    $(document).ready(function () {
      $('#txtusername').focus();
        site_url = '<?php echo site_url() ?>';
        var post_url = '<?php echo site_url("welcome/check_remember") ?>';
        $.ajax({
            type: 'POST',
            url: post_url,
            success: function (response) {
                var json = $.parseJSON(response);
                if(json.statusCode != "E0001"){
                    $("#txtusername").val(json.user);
                    $("#txtpassword").val(json.pwd);
                    if(json.remember=="1"){
                        $("#chk_remember").prop("checked",true);
                        $("#chk_remember").val("1");
                    }
                }
            },
            error: function (response) {
            }
        });
    });
    $('#icon-close').on('click',function(evt){
       if (confirm("Close Window?")) {
            window.location.href = '/exitkiosk';
        }
    });
    $("div.tab div").on('click', function (e) {
        $(this).parent().find("span").removeClass("active");
        $(this).find("span").addClass("active");
        if ($("#tab_card").hasClass("active")) {
            $("input[type=password]").parent().slideUp();
            $("input[type=text]").focus();
        } else {
            $("input[type=password]").parent().slideDown();
        }
    });

    $("input[name=txtusername]").keypress(function (e) {
        if (e.which == 13 && $("#tab_card").hasClass("active")) {
            e.preventDefault();
            var card = $(this).val();
            $(this).val('');
            var post_url = '<?php echo site_url('welcome/checkcard?') ?>' + 'card=' + card;
            $.ajax({
                type: 'POST',
                url: post_url,
                success: function (response) {
                    var data = response.split(":");
                    if (data != '') {
                        $("input[type=text]").val(data[0]);
                        $("input[type=password]").val(data[1]);
                        $("button[type=submit]").trigger('click');
                    }
                },
                error: function (response) {
                }
            });
        } else {
            return true;
        }
    });

    $("#chk_remember").change(function(){
        if($(this).prop("checked") == true){
            $(this).val(1);
        }else{
            $(this).val(0);
        }
    });

    $("form").on("submit",function(e){
        e.preventDefault();

        var formData = new FormData(this);

        formData.append('user',$("#txtusername").val());
        formData.append('pwd',$("#txtpassword").val());
        formData.append('remember',$("#chk_remember").val());

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                var json = $.parseJSON(data);
                if(json.statusCode == 'S0001'){
                    if(json.is_seller==1){
                        window.open("<?php echo site_url("table_order")?>","_self");
                    }else{
                        window.open("<?php echo site_url("welcome")?>","_self");
                    }

                }else{
                    alert("Invalid username or password");
                }
            }
        });
    });
</script>
<!--==============================--->
<script src="<?=base_url('js/jquery-3.2.1.min.js')?>"></script>
      <script type="text/javascript" src="<?=base_url('js/libraries/bootstrap.min.js')?>"></script>
      <!--===============================================================================================-->
      <script src="<?=base_url('js/main.js')?>"></script>
      <script src="<?=base_url('js/custom.min.js')?>"></script>
      <script src="<?=base_url('js/sop.js')?>"></script>
      <script>
         $(document).ready(function(){
            $(".login-slide > .login-slide-img:gt(0)").hide();

            setInterval(function() {
            $('.login-slide > .login-slide-img:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('.login-slide');
            }, 8000);
         });
      </script>
      <script>
         function autoType(elementClass, typingSpeed){
         var thhis = $(elementClass);
         thhis.css({
         "position": "relative",
         "display": "inline-block"
         });
         thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
         thhis = thhis.find(".text-js");
         var text = thhis.text().trim().split('');
         var amntOfChars = text.length;
         var newString = "";
         thhis.text("|");
         setTimeout(function(){
         thhis.css("opacity",1);
         thhis.prev().removeAttr("style");
         thhis.text("");
         for(var i = 0; i < amntOfChars; i++){
          (function(i,char){
            setTimeout(function() {
              newString += char;
              thhis.text(newString);
            },i*typingSpeed);
          })(i+1,text[i]);
         }
         },1500);
         }

         $(document).ready(function(){
         // Now to start autoTyping just call the autoType function with the
         // class of outer div
         // The second paramter is the speed between each letter is typed.
         autoType(".type-js",200);
         });
      </script>
