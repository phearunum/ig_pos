<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php
            foreach($record_positions as $rg){
        ?>
            <form action="<?php echo site_url("group_position/update"); ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_position_title; ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $lbl_position_name; ?>:<span class="star"> *</span></label>
                                    <input type="hidden" name="txt_position_id" id="txt_position_id" value="<?php echo $rg->position_id ?>" required>
                                    <input class="form-control form-custom text_input" type="text" name="txt_position_name" id="txt_position_name" value="<?php echo $rg->position_name ?>" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <!--<div class="col-sm-6">
                                <div class="form-group">
                                    <label>Is Car Wash:</label>
                                    <div class="form-control form-custom">
                                    <input type="checkbox" name="ch_is_car_wash" id="ch_is_car_wash" value="1"></div>
                                    <div class="border"></div>
                                </div>
                            </div>-->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $lbl_position_desc; ?>:</label>
                                     <textarea class="form-control form-custom text_input" name="txt_description" id="txt_description"><?php echo $rg->position_note ?></textarea>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                     </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel; ?></button>
                        <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update; ?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>    
            </form>
        <?php } ?>
        </div>
    </body>
</html>
