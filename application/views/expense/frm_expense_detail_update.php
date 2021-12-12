<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php
            foreach($record_expense_detail as $ex){
        ?>
        <form action="<?php echo site_url("expense_detail/update"); ?>" method="post" enctype="multipart/form-data">    
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lbl_title?></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="txt_expense_detail_id" id="txt_expense_detail_id" value="<?php echo $ex->expense_detail_id; ?>">
                                <label><?php echo $txt_expense_type?><span class="star"> *</span></label>
                                <select name="cbo_expense_name" class="form-control form-custom">
                                <option value="0">--expense type--</option>
                                <?php
                                    foreach($record_expense_type as $ren){
                                        if ($ex->expense_type_id == $ren->expense_type_id) {
                                        echo "<option selected value='$ren->expense_type_id'>$ren->expense_type_name</option>";
                                    } else {
                                        echo "<option value='$ren->expense_type_id'>$ren->expense_type_name</option>";
                                    }
                                ?>
                                    
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
                                <input class="form-control form-custom text_input" type="text" name="txt_expense_chart_no" maxlength="6" id="txt_expense_chart_no" value="<?php echo $ex->expense_chart_number; ?>" placeholder="Expense Chart Number">
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><?php echo $txt_expense?><span class="star"> *</span></label>
                                <input class="form-control form-custom text_input" type="text" name="txt_expense_detail_name" value="<?php echo $ex->expense_detail_name; ?>" id="txt_expense_detail_name" placeholder="Expense Detail Name">
                                <div class="border"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel?></button>
                    <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update?></button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
        <?php } ?>
        </div>
    </body>
</html>
