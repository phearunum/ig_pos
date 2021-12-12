<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url('stock_location/save'); ?>" method="post">
              <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lb_addnew_title;?></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-sm-12">
                          <div class="form-group"> 
                          <label><?php echo $lb_branch_name?>:</label>&nbsp;&nbsp;<a href="<?php echo site_url('branch/addnew'); ?>"></a>         
                            <select name="cbo_branch" id="cbo_position" class="form-control form-custom">
                            <?php
                            foreach ($record_branch as $rb){
                                ?>
                                <option value="<?php echo $rb->branch_id ?>"><?php echo $rb->branch_name ?></option>
                            <?php
                              }
                            ?>
                            </select>
                            <div class="border"></div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group"> 
                          <label><?php echo $lb_stock_location_name?>:<span class="star"> *</span></label>         
                            <input class="form-control form-custom text_input" type="text" name="txt_stock_location_name" id="txt_location_name" required>
                            <div class="border"></div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group"> 
                            <label><?php echo $lb_desc?>:<span class="star"> </span></label>     
                            <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description">
                            <div class="border"></div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel;?></button>
                     <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_create;?></button>
                     <div class="clearfix"></div>
                </div>
              </div>
            </form>
        </div>
    </body>
</html>
