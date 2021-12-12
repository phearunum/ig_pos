<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php 
            $permission_edit = "disabled";
            $permission_add = "disabled";  
            $permission_delete = "disabled";
            $add_link ="";
            $edit_link="";
            $delete_link="";        
            foreach ($record_permission as $key => $value) {                                
                if($value->permission_edit=="1"){
                    $permission_edit = "";
                    $edit_link='href=""';
                }
                if($value->permission_add=="1"){
                    $permission_add = "";
                    $add_link='href=""';
                }
                if($value->permission_delete=="1"){
                    $permission_delete = "";
                    $delete_link='href=""';
                }                
            }
                            
    ?>
    <?php
    foreach($record_permission as $p){
    foreach($record_tax as $tax){
    ?>
    <div class="container">
      <form class="form-horizontal" action="<?php echo site_url('rate/update'); ?>" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
          <div class="panel-heading"><?php echo $lbl_title ?></div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="com-sm-12">
                <input type="hidden" name="txt_tax_id" id="txt_tax_id" value="<?php echo $tax->rate_id ?>">
                <div class="form-group">
                  <label class="col-sm-4"><?php echo $txt_tax_amount; ?>:<span class="star"> *</span></label>
                  <input class="form-control form-custom text_input" type="text" name="txt_tax_amount" id="txt_tax_amount" value="<?php echo $tax->rate_amount ?>" required>
                  <div class="border"></div>
                </div>
              </div>
              <div class="com-sm-12 hidden">
                <div class="form-group">
                  <label><?php echo $txt_tax_amount_return; ?>: <span class="star"> *</span></label>
                  <input class="form-control form-custom" type="text" name="txt_amount_return" id="txt_amount_return" value="<?php echo $tax->rate_amount_return ?>" required>
                  <div class="border"></div>
                </div>
              </div>
              <div class="com-sm-12">
                <div class="form-group">
                  <label><?php echo $txt_description ?>:</label>
                  <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description" value="<?php echo $tax->rate_des ?>" class="txt-address">
                  <div class="border"></div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-footer">
            <button class="btn btn-sad pull-right" type="submit" <?php echo $permission_edit;?> ><?php echo $btn_update?></button>
            <div class="clearfix"></div>
          </div>
        </div>
      </form>
    </div>
    <?php }} ?>
  </body>
</html>