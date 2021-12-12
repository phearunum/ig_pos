<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url("shift/update"); ?>" method="post">
                <?php
                    foreach($record_shift as $rs){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_shift_title; ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="txt_shift_id" id="txt_shift_id" required value="<?php echo $rs->shift_id ?>">
                                    <label><?php echo $lbl_shift_start_time; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom " type="time" name="txt_time_start" id="txt_time_start" value="<?php echo $rs->shift_from ?>" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_shift_end_time; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="time" name="txt_time_stop" id="txt_time_stop" value="<?php echo $rs->shift_until ?>" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_shift_name; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_shift_name" id="txt_shift_name" value="<?php echo $rs->shift_name ?>" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_shift_desc; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description" value="<?php echo $rs->shift_note ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel; ?></button>
                        <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update; ?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </form>
        </div>
    </body>
</html>
