<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>  
    </head>
    <body>
        <div class="container">
        <?php 
            foreach($record_category as $ct){
        ?>
        <form action="<?php echo site_url('category/update'); ?>" method="post">    
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lbl_addnew_title; ?></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="txt_id" id="txt__id" value="<?php echo $ct->category_id ?>" required>
                                <label><?php echo $lbl_category_name; ?><span class="star"> *</span></label>
                                <input class="form-control form-custom text_input" type="text" name="txt_name" id="txt_name" value="<?php echo $ct->category_name ?>" required>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><?php echo $lbl_category_desc; ?></label>
                                <textarea class="form-control form-custom text_input" name="txt_description" id="txt_description"><?php echo $ct->category_description ?>
                                </textarea>
                                <div class="border"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel;?></button>
                    <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update;?></button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
        <?php } ?>
        </div>
    </body>
</html>
