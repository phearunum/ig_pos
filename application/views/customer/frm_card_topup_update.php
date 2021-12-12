<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function myFunction(){
                $(function() {
                   alert("Export your Data ");
                    $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Report Stock",
                        fileext: ".xls"
                    });
                });
           }
        </script>
        <style>
            .hide_me{
                display: none;
            }
        </style>
    </head>
    <body>
    <?php
        foreach($record_topup as $tp){
    ?>
        <div class="container">
            <form action="<?php echo site_url("customer/report_card_topup_update"); ?>" method="post" enctype="multipart/form-data">  
            <div class="panel panel-default">
                <div class="panel-heading">Card Topup Update</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="txt_topup_id" id="txt_topup_id" required value="<?php echo $tp->transition_id ?>">
                                <input type="hidden" name='txt_customer_id' id="txt_customer_id" required value="<?php echo $tp->transition_customer_id ?>">
                                <input type="hidden" name='txt_customer_acc_id' id="txt_customer_acc_id" required value="<?php echo $tp->transition_customer_acc_id ?>">
                                <label>Customer Name:<span class="star"> *</span></label>
                                <input class="form-control form-custom" type="text" name="txt_customer_name" id="txt_customer_name" required value="<?php echo $tp->customer_name ?>" readonly>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Top Balance:<span class="star"> *</span></label>
                                <input class="form-control form-custom" type="text" name="txt_balance" id="txt_balance" required value="<?php echo $tp->transition_balance ?>" >
                                <div class="border"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo 'Cancel';?></button>
                    <button class="btn btn-sad pull-right" type="submit"><?php echo 'Update'; ?></button>
                    <div class="clearfix"></div>
                </div>
            </div>
            </form>
        </div> 
    <?php } ?>
    </body>
</html>
