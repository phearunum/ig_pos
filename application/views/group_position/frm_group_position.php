<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url("group_position/save"); ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_position_title; ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $lbl_position_name; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_position_name" id="txt_position_name" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $lbl_position_desc; ?>:</label>
                                     <textarea class="form-control form-custom text_input" name="txt_description" id="txt_description"></textarea>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
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
</html>
<script type="text/javascript">
    $('#txt_position_name').focus();
    // $('form').on('submit',function(e){
    //     e.preventDefault();
    //     if(check_text_val_empty('txt_position_name')==false){
    //         return false;
    //     }else{
            
    //     }
    // });
</script>
