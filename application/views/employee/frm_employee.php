<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url("employee/save"); ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_emp_title ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_branch ?>:<span class="star"> *</span></label>
                                    <select name="cbo_branch" id="cbo_branch" class="form-control 
                                    form-custom">
                                    <option value="0">--All Branch--</option>
                                        <?php
                                        foreach($record_branch as $rb){
                                        ?>
                                        <option value="<?php echo $rb->branch_id ?>"><?php echo $rb->branch_name ?></option>
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
                                        ?>
                                        <option value="<?php echo $rp->position_id ?>"><?php echo $rp->position_name ?></option>
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
                                    <input class="form-control form-custom text_input" type="text" name="txt_employee_card" id="txt_employee_card" placeholder="card number"  >
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_name; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_employee_name" id="txt_employee_name" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_sex; ?><span class="star"> *</span></label>
                                    <div class="form-control form-custom ">
                                        <input type="radio" name="rad_gender" id="rad_gender" value="Male" checked><?php echo $lbl_male ?>
                                        <input type="radio" name="rad_gender" id="rad_gender" value="Female"><?php echo $lbl_female ?>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_dob; ?>:<span class="star"> *</span></label>
                                    <input type="text" name="txt_dob" id="txt_dob" required class="form-control form-custom" placeholder="yy/mm/dd" autocomplete="off">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_shift; ?>:<span class="star"> *</span></label>
                                    <select name="cbo_shift" id="cbo_shift" class="form-control form-custom">
                                        <?php
                                        foreach($record_shift as $rs){
                                        ?>
                                        <option value="<?php echo $rs->shift_id ?>"><?php echo $rs->shift_name ?></option>
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
                                    <select required  name="cbo_stock_location" id="cbo_stock_location" class="form-control form-custom">
                                        <option value="0">--All Stock--</option>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_phone; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="tel" name="txt_phone" id="txt_phone" required placeholder="phone number">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_email; ?>:</label>
                                    <input class="form-control form-custom text_input" type="email" name="txt_email" id="txt_email" placeholder="Email">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_salary; ?>:</label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_employee_salary" id="txt_employee_salary" placeholder="Salary">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_hired_date; ?>:</label>
                                    <input type="text" name="txt_emp_hired_date" id="txt_emp_hired_date" class="form-control form-custom" placeholder="yy/mm/dd" required="">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_address; ?>:</label>
                                    <input type="text"  name="txt_address" id="txt_address" class="form-control form-custom text_input" placeholder="Address">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_note; ?>:</label>
                                    <input type="text"  name="txt_note" id="txt_note" class="form-control form-custom text_input" placeholder="Description">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_emp_is_seller; ?>:</label>
                                    <input type="checkbox"  name="ch_seller" id="ch_seller" value="1" checked>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
                        <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_create ?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
        $("#txt_dob").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
        $("#txt_emp_hired_date").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});

        $('#cbo_branch').change(function(){
            var id=$(this).val();

            if(id>0){
                 $('#cbo_stock_location').html('<option value="">--All Stock--</option>');
                $.ajax({
                    url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_stock_location').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                        })
                    }
                })
            }else{
                $('#cbo_stock_location').html('<option value="0">--All Stock--</option>');
            }
            
        });
        </script>
        
    </body>
</html>