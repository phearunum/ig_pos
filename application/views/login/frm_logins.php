<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>POS SYSTEM</title>

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

                .fa-keyboard-o{
                    font-size: 40px;
                    color: white;
                    margin-left: 257px;
                    box-shadow:1px 1px 5px black;
                    margin-top:5px;
                    
                }
                .fa-keyboard-o:hover{
                    box-shadow:0px 0px 0px black;
                }
        </style>
    </head>
    <body class="login-bg">
    <div id="overlay">
      <div><img src="<?=base_url('img/loading.gif')?>" width="64px" height="64px"/></div>
   </div>

     
      
      <!--Element-->
       <div class="element-container">
         <!--End Slide show-->
         <div class="wrap-login100">
            <form id="frm_login" action="<?php echo site_url('welcome/check_user') ?>"  method="POST">
              <br/>
               <span class="login100-form-title p-b-34 p-t-27" style="font-family: HighPoint;line-height:0.8">
               សូមស្វាគមន៏មកកាន់កម្មវិធី 
               </span>
               <span class="login100-form-title p-b-34 p-t-27" style="font-family: Popin-Regular;line-height:0.8">
               Point System 
               </span>
               <span class="login100-form-logo">
               <img src="<?php echo base_url("/assets/images/app_img/Logo.png")?>" style="width: 90px;">
               </span>
           
               <div class="wrap-input100 validate-input" data-validate = "Enter username">
                  <input class="input100" type="text" name="txtusername" id="txtusername" placeholder="Username" >
                  <span class="focus-input100" data-placeholder="&#xf207;"></span>
               </div>
               <div class="wrap-input100 validate-input" data-validate="Enter password">
                  <input class="input100" type="password" name="txtpassword" id="txtpassword" placeholder="Password">
                  <span class="focus-input100" data-placeholder="&#xf191;"></span>
               </div>

               <!-- <div class="contact100-form-checkbox " >
                  <input class="input-checkbox100" id="chk_remember" type="checkbox" name="chk_remember">
                  <label class="label-checkbox100 hidden" for="chk_remember">
                  Remember me
                  </label>
               </div> -->
               <div class="container-login100-form-btn">
                <?php
                     echo $this->session->flashdata('error');
                    ?>
                  <input type="submit" class="btn btn-block" style="font-weight: bold; font-family: Popin-Regular; color: #22abb6; " value="LOGIN"/>
                  <input id="icon-close" type="button" class="btn btn-block" style="font-weight: bold; font-family: Popin-Regular; color: #da3519;" value="EXIT"/>
                
                   <i onclick="node_osk();" class="fa fa-keyboard-o" aria-hidden="true"></i>
                
                
               </div>
               <div class="login100-form-title">
              <br/><br/>
               <label style="font-family: Popin-Regular; font-size: 15px; color:#ffffff96" >Copyright &copy; www.softpointcambodia.com</label>
               </div>
            </form>
         </div>
      </div>
      
    </body>
</html>
<script>
  $(window).resize(function(){
      var top = ($(window).height()-600)/2;
      $(".element-container").css("top",top);
  });
    $(document).ready(function () {
      var top = ($(window).height()-600)/2;
      $(".element-container").css("top",top);


      $('#txtusername').focus();
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
      <script type="text/javascript" src="<?=base_url('js/sop.js')?>"></script>
      <!--===============================================================================================-->
      <script src="<?=base_url('js/main.js')?>"></script>
      <script src="<?=base_url('js/custom.min.js')?>"></script>
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
         var site_url = "<?php echo site_url(); ?>";
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
         ////function osk 
         function node_osk() {
             $.ajax({
                url: "http://localhost:85/node_osk",
                type: 'GET',
                success: function(res) {
                    console.log(res);
                    //alert(res);
                    
                }
            });
         }
         
      </script>
