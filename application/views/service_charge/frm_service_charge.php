<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            foreach($record_permission as $p){
                 foreach($record_service_charge as $rsc){
        ?>
        <div class="container">
          <form class="form-horizontal" action="<?php echo site_url('service_charge/update'); ?>" method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
              <div class="panel-heading"><?php echo $lbl_service_title ?></div>
              <div class="panel-body">
                <div class="col-md-12">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label><?php echo $lbl_service_charge ?>:<span class="star"> *</span></label>
                    <input type="hidden" name="txt_service_charge_id" id="txt_service_charge_id" value="<?php echo $rsc->service_id ?>" required>
                    <input class="form-control form-custom" type="text" name="txt_service_charge_amount" id="txt_service_charge_amount" value="<?php echo $rsc->service_amount ?>" required>
                    <div class="border"></div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group"> 
                  <label><?php echo $lbl_service_desc?>:</label>         
                    <input class="form-control form-custom" type="text"  name="txt_description" id="txt_description" value="<?php echo $rsc->service_des ?>">
                    <div class="border"></div>
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>
              </div>
              <div class="panel-footer">
                <?php if($p->permission_add!=0 || $p->permission_delete!=0){ ?>
                        <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update; ?></button>
                    <?php } ?>
                    <div class="clearfix"></div>
              </div>
            </div>
          </form>
        </div>
    <?php }} ?>
    </body>
</html>