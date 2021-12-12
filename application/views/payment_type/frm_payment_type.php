<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
     
   
        <div class="container">
            <form action="<?php echo site_url('Payment_type/update'); ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">  

                                 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        
                                        <input class="form-control form-custom hidden" type="text" name="acc_type_id" id="txt_location_name" value="<?= $acc_type_id ;?>" required>
                                        <div class="border"></div>
                                    </div>
                                </div>



                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><?php echo $lbl_payment_name ?><span class="star"> *</span></label>
                                        <input class="form-control form-custom text_input" type="text" name="acc_type_name" id="acc_type_name" value="<?= $acc_type_name ;?>" required>
                                        <div class="border"></div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><?php echo $lbl_description ?></label>
                                        <input class="form-control form-custom text_input" type="text" name="txt_desc" id="txt_desc" value="<?= $description ;?>">
                                        <div class="border"></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?=$btn_cancel?></button>
                        <button class="btn btn-sad pull-right" type="submit"><?=$btn_update?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
  
    </body>
</html>