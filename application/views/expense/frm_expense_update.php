<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $("#cbo_expense_name").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id;
                    $.ajax
                            ({
                                type: "POST",
                                url: "<?php echo site_url("expense_detail/display_expense_item_detail"); ?>",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#cbo_expense_detail").html(html);
                                },
                                error: function(response){
                                    
                                }
                            });
                });
            });
        </script>
    </head>
    <body>
        
        <?php
            foreach($expense_detail_record as $e){
        ?>
        <form action="<?php echo site_url("expense/update"); ?>" method="post">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_title; ?></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="txt_expense_id" id="txt_expense_id" value="<?php echo $e->expense_id ?>">
                                    <label><?php echo $lbl_no?></label>
                                    <input class="form-control form-custom" type="text" name="txtno" id="txtno" value="<?php echo $e->expense_no ?>" readonly>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_date_entry?> <span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text" id="txt_date" name="txt_date" value="<?php echo $e->expense_date ?>" autocomplete="off" placeholder="yyyy-mm-dd">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_expense_type?><span class="star"> *</span></label>
                                    <select name="cbo_expense_name" id="cbo_expense_name" class="form-control form-custom">
                                        <option value="0">--expense type--</option>
                                        <?php
                                            foreach($record_expense_name as $ren){
                                            if($e->expense_type_id == $ren->expense_type_id){
                                            echo "<option selected value='$ren->expense_type_id'>$ren->expense_type_name</option>";        
                                        }else{
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_expense_detail?> <span class="star"> *</span></label>
                                    <select name="cbo_expense_detail" id="cbo_expense_detail" class="form-control form-custom">
                                        <option value="0">--expense name--</option>
                                        <?php
                                            foreach($record_expense_item_detail as $re){
                                            if($e->expense_detail_id == $re->expense_detail_id){
                                            echo "<option selected value='$re->expense_detail_id'>$re->expense_detail_name</option>";        
                                        }else{
                                            echo "<option value='$re->expense_detail_id'>$re->expense_detail_name</option>";
                                        } 
                                        ?>
                                        <?php
                                          }
                                        ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_amount?>($) <span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text" id="txt_amount" name="txt_amount" placeholder="Amount" value="<?php echo $e->expense_amount ?>" autocomplete="off">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_description?></label>
                                    <input class="form-control form-custom" type="text" name="txtDesc" value="<?php echo $e->expense_note ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="reset" name="btnCacel" class="btn btn-sad pull-right"  value="<?php echo $btn_cancel?>" onclick="back()"/>
                         <input type="submit" name="btnSave" class="btn btn-sad pull-right"  value="<?php echo $btn_update?>"/>
                         <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        }
        ?>
    </body>
</html>
