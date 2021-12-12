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

        <div class="container">
        <form action="<?php echo $permission_add;?><?php echo site_url("expense_detail/save"); ?>" method="post" enctype="multipart/form-data">    
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lbl_title?></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><?php echo $txt_expense_type?><span class="star"> *</span></label>
                                <select name="cbo_expense_name" class="form-control form-custom">
                                    <option value="0">--expense type--</option>
                                    <?php
                                        foreach($record_expense_name as $ren){
                                    ?>
                                        <option value="<?php echo $ren->expense_type_id ?>"><?php echo $ren->expense_type_name ?></option>
                                    <?php
                                      }
                                    ?>
                                </select>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><?php echo $txt_expense_cart_no?> <?php echo $this->session->flashdata('error'); ?><span class="star"> *</span></label>
                                <input class="form-control form-custom text_input" type="text" name="txt_expense_chart_no" maxlength="6" id="txt_expense_chart_no" placeholder="Expense Chart Number">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><?php echo $txt_expense?><span class="star"> *</span></label>
                                <input class="form-control form-custom text_input" type="text" name="txt_expense_detail_name" id="txt_expense_detail_name" placeholder="Expense Detail Name">
                                <div class="border"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel?></button>
                    <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_create?></button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
        </div>
    </body>
</html>
