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
      <form class="form-horizontal" action="<?php echo site_url("vat/update"); ?>" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
          <div class="panel-heading"><?php echo $lbl_vat_title ?></div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="col-sm-12">
                <div class="form-group">
                  <label><?php echo $lbl_vat_vat; ?>:<span class="star"> *</label></span>
                  <input type="hidden" name="txt_tax_id" id="txt_tax_id" value="<?php echo $tax->tax_id ?>">
                  <input class="form-control form-custom text_input" type="text" name="txt_tax_amount" id="txt_tax_amount" onfocus="this.select()" value="<?php echo $tax->tax_amount ?>" required>
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label><?php echo $lbl_vat_desc; ?>:</label>
                  <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description" value="<?php echo $tax->tax_des ?>">
                  <div class="border"></div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-footer">
            <?php if($p->permission_add!=0 || $p->permission_delete!=0){ ?>
            <button class="btn btn-sad pull-right" type="submit" <?php echo $permission_edit;?> ><?php echo $btn_update; ?></button>
            <?php } ?>
            <div class="clearfix"></div>
          </div>
        </div>
      </form>
    </div>
    <?php }} ?>
  </body>
</html>