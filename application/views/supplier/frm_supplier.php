<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url('supplier/save'); ?>" method="post">    
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_title ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $txt_supplier_name; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text" name="txt_supplier_name" id="txt_supplier_name" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $txt_supplier_phone; ?>:</label>
                                    <input class="form-control form-custom text_input" type="tel" name="txt_supplier_phone" id="txt_supplier_phone">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $txt_address; ?>:</label>
                                    <input class="form-control form-custom text_input" type="text"  name="txt_address" id="txt_address">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $txt_description; ?>:</label>
                                    <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description" >
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
    </body>
</html>
