<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
        $(document).ready(function()
        {
        $("#cbo_branch").change(function()
        {
        
        var id=$(this).val();
        var dataString = 'id='+ id;
        
        $.ajax
        ({
        type: "POST",
        url: "<?php echo site_url("stock_transffer/display_stock"); ?>",
        data: dataString,
        cache: false,
        success: function(html)
        {
        $("#cbo_stock_location").html(html);
        }
        });
        });
        });
        </script>
        
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url('employee/update'); ?>" method="post">
         <?php
            foreach($record_employee as $re){
        ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_emp_title ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="txt_employee_id" id="txt_employee_id" value="<?php echo $re->employee_id ?>" required>
                                    <label><?php echo $lbl_emp_branch;?>:<span class="star"> *</span></label>
                                    <select name="cbo_branch" id="cbo_branch" class="form-control form-custom">
                                        <?php
                                                foreach($record_branch as $rb){
                                                    if($re->employee_brand_id == $rb->branch_id){
                                                        echo "<option selected value='$rb->branch_id'>$rb->branch_name</option>";        
                                                    }else{
                                                        echo "<option value='$rb->branch_id'>$rb->branch_name</option>";
                                                    } 
                                            ?>
                                            <?php
                                              }
                                            ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_position; ?>:<span class="star"> *</span></label>
                                    <select name="cbo_position" id="cbo_position" class="form-control form-custom">
                                         <?php
                                            foreach($record_position as $rp){
                                                if($re->employee_position_id == $rp->position_id){
                                                    echo "<option selected value='$rp->position_id'>$rp->position_name</option>";        
                                                }else{
                                                    echo "<option value='$rp->position_id'>$rp->position_name</option>";
                                                }
                                        ?>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lb_cardnum; ?>:</label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_employee_card" id="txt_employee_card" placeholder="card number" value="<?php echo $re->employee_card; ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_name; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_employee_name" id="txt_employee_name" required value="<?php echo $re->employee_name ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_sex; ?><span class="star"> *</span></label>
                                    <div class="form-control form-custom">
                                        <?php
                                            if($re->employee_sex=="Male"){
                                        ?>
                                            <input type="radio" name="rad_gender" id="rad_gender" value="Male" checked><?php echo $lbl_male ?>
                                            <input type="radio" name="rad_gender" id="rad_gender" value="Female"><?php echo $lbl_female ?>
                                        <?php
                                            }else{
                                        ?>
                                            <input type="radio" name="rad_gender" id="rad_gender" value="Male"><?php echo $lbl_male ?>
                                            <input type="radio" name="rad_gender" id="rad_gender" value="Female" checked><?php echo $lbl_female ?>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_dob; ?>:<span class="star"> *</span></label>
                                    <input type="text" name="txt_dob" id="txt_dob" required class="form-control form-custom" placeholder="yy/mm/dd" value="<?php echo $re->employee_dob ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_shift; ?>:<span class="star"> *</span></label>
                                    <select name="cbo_shift" id="cbo_shift" class="form-control form-custom">
                                        <?php
                                            foreach($record_shift as $rs){
                                                if($re->employee_shift_id == $rs->shift_id){
                                                    echo "<option selected value='$rs->shift_id' >$rs->shift_name</option>";        
                                                }else{
                                                    echo "<option value='$rs->shift_id' >$rs->shift_name</option>";
                                                }
                                        ?>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_stock_name; ?>: <span class="star"> *</span></label>
                                    <select name="cbo_stock_location" id="cbo_stock_location" class="form-control form-custom">
                                        <?php
                                            foreach ($record_stock_location as $rsl){
                                                if($re->employee_stock_location_id == $rsl->stock_location_id){
                                                    echo "<option selected value='$rsl->stock_location_id'>$rsl->stock_location_name</option>";        
                                                }else{
                                                    echo "<option value='$rsl->stock_location_id'>$rsl->stock_location_name</option>";
                                                }
                                            ?>
                                            <?php
                                             }
                                            ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_phone; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="tel" name="txt_phone" id="txt_phone" value="<?php echo $re->employee_phone ?>" required placeholder="phone number">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_email; ?>:</label>
                                    <input class="form-control form-custom text_input" type="email" name="txt_email" id="txt_email" placeholder="Email" value="<?php echo $re->employee_email ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_salary; ?>:</label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_employee_salary" id="txt_employee_salary" value="<?php echo $re->employee_salary ?>" placeholder="Salary">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_hired_date; ?>:</label>
                                    <input type="text" name="txt_emp_hired_date" id="txt_emp_hired_date" class="form-control form-custom" placeholder="yy/mm/dd" value="<?php echo $re->employee_hired_date ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_address; ?>:</label>
                                    <input type="text"  name="txt_address" id="txt_address" class="form-control form-custom text_input" placeholder="Address" value="<?php echo $re->employee_address?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_note; ?>:</label>
                                    <input type="text"  name="txt_note" id="txt_note" class="form-control form-custom text_input" placeholder="Description" value="<?php echo $re->employee_note ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_is_seller; ?>:</label>
                                    <?php if($re->employee_is_seller==1){ ?>
                                            <input type="checkbox"  name="ch_seller" id="ch_seller" value="1" checked>
                                       <?php
                                        }else{
                                       ?>
                                            <input type="checkbox"  name="ch_seller" id="ch_seller" value="1">
                                       <?php
                                        }
                                       ?>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
                        <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update ?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
        <script type="text/javascript">
        $.noConflict();
        jQuery( document ).ready(function( $ ) {
        $("#txt_dob").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
        $("#txt_emp_hired_date").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
        });
        </script>
        
    </body>
</html>