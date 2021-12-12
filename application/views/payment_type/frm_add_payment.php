<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
     
        <div class="container">
            <form action="<?php echo site_url('Payment_type/save'); ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"> <h3 class="text-center text-primary"><?php echo $lbl_payment_name;?></h3></div>
                    <div class="panel-body">
                          <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $lbl_payment_name;?><span class="star"> *</span></label>
                                    <input class="form-control form-custom text_input" type="text"  name="acc_type" id="txt_description" value="" required>
                                    <div class="border"></div>
                                </div>
                            </div>




                                     <div class="col-sm-12">
                                <div class="form-group">
                                    <label><?php echo $lbl_description;?></label>
                                    <input class="form-control form-custom text_input" type="text" name="create_by" id="txt_location_name" value="">
                                    <div class="border"></div>
                                </div>
                            </div>

                            

                              
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?=$btn_cancel?></button>
                        <button class="btn btn-sad pull-right" type="submit"><?= $btn_create ?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
  
    </body>
</html>