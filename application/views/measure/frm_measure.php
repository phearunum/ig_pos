<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <form class="form-horizontal" action="<?php echo site_url("measure/save"); ?>" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
          <div class="panel-heading"><?php echo $lbl_measure_title ?></div>
          <div class="panel-body">
            
            <div class="col-md-12">
              <div class="col-sm-12">
                
                <div class="form-group">
                  <label><?php echo $lbl_measure_name ?>:<span class="star"> *</span></label>
                  <input class="form-control form-custom text_input" type="text" name="txt_measure_name" id="txt_measure_name" autocomplete="off" required>
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-12">
                
                <div class="form-group">
                  <label><?php echo $lbl_measure_qty ?>:<span class="star"> *</span></label>
                  <input class="form-control form-custom text_input" type="text" name="txt_measure_qty" id="txt_measure_qty" required>
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-12">
                
                <div class="form-group">
                  <label ><?php echo $lbl_measure_desc ?>:</label>
                  <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description" autocomplete="off">
                  <div class="border"></div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            
          </div>
          <div class="panel-footer"><button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_create ?></button>
            <div class="clearfix"></div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>