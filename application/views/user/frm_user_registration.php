<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
                function checkbox(){
                    if($('#ch_user').is(':checked')){
                       $('#ch_user').val(1);
                    }else {
                        $('#ch_user').val(0);
                    }
                }
        </script>
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url("user/save"); ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_user_title; ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_user_employee_name; ?>:<span class="star"> *</span></label>
                                    <select name="cbo_employee_name" id="cbo_employee_name" class="form-control form-custom" required="">
                                            <option value="">--Employee Name--</option>
                                        <?php
                                            foreach($record_employee as $re){
                                        ?>
                                                <option value="<?php echo $re->employee_id ?>"><?php echo $re->employee_name ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_user_username; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_username" id="txt_username" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_user_password; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="password" name="txt_password" id="txt_password" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_user_printer; ?>:<span class="star"> *</span></label>
                                    <select name="cbo_printer_location_name" id="cbo_printer_location_name" class="form-control form-custom">
                                           <!--  <option value="0">--Printer Location Name--</option> -->
                                        <?php
                                            foreach($record_printer_location as $rpl){
                                        ?>
                                                <option value="<?php echo $rpl->printer_location_id?>"><?php echo $rpl->printer_location_name ?></option>
                                        <?php
                                          }
                                        ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                             <div class="clearfix"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $lbl_user_note; ?>:<span class="star"> </span></label>
                                   <input type="text" name="txt_note" id="txt_note" class="form-control form-custom text_input">
                                   <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 <?php if($is_supper_user!='true') echo ' hidden '; ?>">
                                <div class="form-group">
                                    <label><?php echo "Super User"; ?>: </label>
                                   <input  value="0" type="checkbox" name="ch_user" id="ch_user" >
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel-footer">
                     <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel; ?></button>
                      <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_create; ?></button>
                    <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </body>

    <script type="text/javascript">
           $(document).ready(function() {
            var get_ch_val = $('#ch_user').val();
                if(get_ch_val ==1){
                   document.getElementById("ch_user").checked= true;
                }else {
                    document.getElementById("ch_user").checked=false;
                }

                $('#ch_user').on('change', function(event) {
                    event.preventDefault();
                    checkbox();
                });
           });
    </script>
</html>
