<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css"); ?>">
        
        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>
        
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
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
         
        <form action="<?php echo site_url("customer/report_topup_update"); ?>" method="post" enctype="multipart/form-data">    
      
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title"><?php echo 'Customer Topup Update';?></td>
            </tr>            
            <tr>
                <td>
                    <table width="100%">
                            <tr class="field-title">
                                <td><?php echo 'Fields';?></td>
                                <td><?php echo 'Values';?></td>
                            </tr>
                            
                            <tr>
                                <td><?php echo 'Customer Name'; ?>:<label class="star"> *</label></td>
                                <td><input type="text" name="txt_customer_name" id="txt_customer_name" required value="<?php echo $tp->customer_name ?>" readonly></td>
                                <td style="display: none;"><input type="text" name="txt_customer_acc_id" id="txt_customer_acc_id" required value="<?php echo $tp->topup_customer_acc_id ?>"></td>
                                <td style="display: none;"><input type="text" name='txt_topup_id' id="txt_topup_id" required value="<?php echo $tp->topup_id ?>"></td>
                                
                            </tr>
                            <tr>
                                <td><?php echo 'Current Balance($)'; ?>:</td>
                                <td><input type="text" name="txt_current_balance" id="txt_current_balance" readonly value="<?php echo $tp->topup_amount ?>" ></td>
                            </tr>   
                            
                            <tr>
                                <td><?php echo 'Topup Balance($)'; ?>:</td>
                                <td><input type="text" name="txt_balance" id="txt_balance" value="0" placeholder="Topup($)"></td>
                            </tr> 
                            
                            <tr class="field-title">
                                <td colspan="2" style="text-align: right">
                                    <button class="btn-srieng" type="submit"><?php echo 'Update'; ?></button>
                                    <button class="btn-srieng" type="reset" onclick="back()"><?php echo 'Cancel';?></button>
                                </td>
                            </tr>
                    </table>
                    </td>
            </tr>
        </table>
        </form>
                   
            <?php } ?>
    
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        document.oncontextmenu = document.body.oncontextmenu = function() {return false;} 
    });
</script>