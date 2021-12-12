
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php 
            foreach($record_customer_type as $ct){
        ?>
            <form action="<?php echo site_url("expense_type/update"); ?>" method="post">   
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lbl_title?></div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="txt_expense_id" id="txt_expense_id" value="<?php echo $ct->expense_type_id ?>" required>
                                <label><?php echo $lbl_type_name; ?>:</label>
                                <input class="form-control form-custom text_input" type="text" name="txt_expense_typename" id="txt_expense_typename" placeholder="Ex.10001" value="<?php echo $ct->expense_type_name ?>" required>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><?php echo $lbl_description; ?>:</label>
                                <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description" value="<?php echo $ct->expense_type_des ?>">
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