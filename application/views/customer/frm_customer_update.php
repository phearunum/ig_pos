<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    </head>
    <body>        
        <div class="container">
            <?php 
                foreach ($record_customer as $ct) {
            ?>
            <form action="<?php echo site_url('customer/update_customer'); ?>" method="post" enctype="multipart/form-data">  
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lbl_customer ; ?></div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_cus_type ?> <span class="star"> *</span></label>
                                    <select required class="form-control form-custom" name="selectcustomertype" id="selectcustomertype">                        
                                        <?php
                                                foreach ($records_type as $st){
                                                    if($ct->customer_type_id == $st->customer_type_id){
                                                        echo "<option selected value='$st->customer_type_id'>$st->customer_type_name</option>";        
                                                    }else{
                                                        echo "<option value='$st->customer_type_id'>$st->customer_type_name</option>";
                                                    } 
                                                }
                                            ?>
                                    </select>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_cus_name ?>:<span class="star"> *</span></label>
                                <input type="hidden" name="txt_customer_id" id="txt_customer_id" required value="<?php echo $ct->customer_id ?>">
                                   <input class="form-control form-custom text_input" type="text" name="txt_name" id="txt_name" value="<?php echo $ct->customer_name ?>" required placeholder="Name">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_gender ?>:</label>
                                  <select name="selectgender" id="selectgender" class="form-control form-custom">
                                       <?php
                                                foreach ($gender as $g){
                                                    if($g->customer_gender == "Male"){
                                                        echo "<option selected value='$g->customer_gender'>$g->customer_gender</option>";   
                                                        echo "<option value='Female'>Female</option>";
                                                    }

                                                    else{
                                                        echo "<option selected value='$g->customer_gender'>$g->customer_gender</option>"; 
                                                        echo "<option value='Female'>Male</option>";
                                                    }
                                                    
                                                }
                                            ?>
                                    </select>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_dob ?>:<span class="star"> *</span></label>
                                   <input class="form-control form-custom " type="text" name="txt_dob" id="txt_dob"  placeholder="yyyy/mm/dd" value="<?php echo $ct->customer_dob ?>" autocomplete="off">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_address ?>:</label>
                                   <input class="form-control form-custom text_input" type="text" name="txt_address" id="txt_address" placeholder="Address" value="<?php echo $ct->customer_address ?>" >
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_phone ?>:<span class="star"> *</span></label>
                                   <input class="form-control form-custom text_input" type="text" name="txt_phone" id="txt_phone" value="<?php echo $ct->customer_phone ?>" required placeholder="Phone Number" onkeypress="return isNumber(event)">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_email ?>:</label>
                                   <input class="form-control form-custom text_input" type="email" name="txt_email" id="txt_email" value="<?php echo $ct->customer_email ?>" placeholder="example@mail.com">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_branch ?> <span class="star"> *</span></label>
                                    <select required class="form-control form-custom" name="selectbranch" id="selectbranch">                        
                                        <?php
                                                foreach ($beanch_list as $st){
                                                    if($ct->customer_branch_id == $st->branch_id){
                                                        echo "<option selected value='$st->branch_id'>$st->branch_name</option>";        
                                                    }else{
                                                        echo "<option value='$st->branch_id'>$st->branch_name</option>";
                                                    } 
                                                }
                                            ?>
                                    </select>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label><?php echo $lbl_enable ?>:</label>
                                    <?php
                                    if($ct->customer_enable == 1){
                                                echo '<input style="width: 5% ;display: inline-block;" class="form-control form-custom" type="checkbox" name="ckenable" id="ckenable" checked>';        
                                            }else{
                                                echo '<input style="width: 5% ;display: inline-block;" class="form-control form-custom" type="checkbox" name="ckenable" id="ckenable" >';
                                            }
                                    ?>
                                <div class="border"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="file" name="userfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" accept="image/*" onchange="readURL(this)"/>
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                            <?php
                            if($ct->customer_picture!="no_images.jpg"){
                            ?>
                            <img id="blah" src="<?php echo base_url("img/customers/".$ct->customer_picture) ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>
                            <input type="hidden" name="update_pic" value="<?php echo $ct->customer_picture ?>">
                            <?php
                            }else{
                            ?>
                            <img id="blah" src="<?php echo base_url("img/no_images.jpg") ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>

                            <?php
                            }
                            ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
                    <button class="btn btn-sad pull-right" id="my-create" type="submit" ><?php echo $btn_update ?></button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    <?php } ?>
        </div>
        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#txt_dob").datepicker({dateFormat: 'yy/mm/dd', showButtonPanel: true});
                $("#txt_name").focus();
                document.oncontextmenu = document.body.oncontextmenu = function() {return false;}  
            });

            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

        </script>

         <script src="<?=base_url('js/custom-file-input.js')?>"></script>
    </body>
</html>
