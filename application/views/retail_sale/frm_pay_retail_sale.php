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
    </head>
    <body>
        <form action="<?php echo site_url("customer_pay/save"); ?>" method="post">
            <?php
                foreach($records as $rec){
            ?>
            <table border='1' width='100%' class="table-form">
                <tr class="field-title">
                    <td colspan="2" class="delete-center">CUSTOMER CREDIT PAY</td>
                </tr>
                <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
                </tr>
                <tr class="field-title">
                    <td>Field</td>
                    <td>Field Value</td>
                </tr>
                <tr>
                    <td width='50%'>
                        <table width='100%'>
                                <tr>
                                    <td>
                                        <input type='text' name='txtno' id='txtno' readonly value="<?php echo $no; ?>" style='width: 60%;display: none;'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Customer Name
                                    </td>
                                    <td>
                                        <input type='text' name='txt_customer' id='txt_customer' readonly value="<?php echo $rec->customer_name ?>">
                                        <input type='text' name='txtcus_id' id='txtcus_id' value="<?php echo $rec->customer_id ?>" style='display: none;'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total Credit Amount
                                    </td>
                                    <td>
                                        <?php 
                                            foreach($credit_amount as $cr){
                                        ?>
                                        <input type='text' name='txtamountcredit' readonly id='txtamountcredit' value="<?php echo $cr->customer_credit_amount_credit ?>"/>  
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Date Pay
                                    </td>
                                    <td><input type='date' name='txtdate' id='txtdate' class="txt_date" value="<?php echo $date_now ?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        Pay
                                    </td>
                                    <td><input type='text' name='txtpay' id='txtpay' value="<?php echo 0.00."$" ?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        Discount
                                    </td>
                                    <td><input type='number' name='txtdiscount' id='txtdiscount' onchange="discount()" value="0.00"></td>
                                </tr>
                        </table>
                    </td>
                    <td style='vertical-align: top;'>
                        <table width='100%'>
                            <tr>
                                <td style='vertical-align: top'>
                                    Description
                                </td>
                                <td style='width: 100%;vertical-align: top;'>
                                    <textarea rows="3" style='width:100%;' name="txtdiscription" id='txtdiscription'></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: left;">
                                    <input type="submit" name="btnSave" value="Save" class="btn-srieng"/>
                                    <input type='reset' name="btncancel" value="Cancel" class="btn-srieng"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <?php
              }
            ?>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class="table-table">
                <tr>
                    <th>No</th>
                    <th>Credit</th>
                    <th>Paid Amount</th>
                    <th>Date</th>
                    <th>User</th>
                    <th style="text-align: center">Delete</th>
                </tr>
                <?php
                    $n=1;
                    foreach($history as $h){
                ?>
                <tr>
                    <td><?php echo $n ?></td>
                    <td><?php echo $h->customer_credit_amount_credit ?></td>
                    <td><?php echo $h->customer_credit_recieve_amount ?></td>
                    <td><?php echo $h->customer_credit_pay_date ?></td>
                    <td><?php echo $h->recorder ?></td>
                    <td style="text-align: center">
                        <a href="<?php echo site_url('customer_pay/delete/' . $h->customer_credit_id."/".$h->customer_credit_invoice_no); ?>" onclick="return confirm('Do you want to delete this record?')">
                            <img src="<?php echo base_url('img/delete.gif') ?>">
                        </a>
                    </td>
                </tr>
                <?php
                $n=$n+1;
                   }
                ?>
            </table>
        </form>
        <script type="text/javascript">
            function discount(){
                $("#txtpay").val($("#txtamountcredit").val()-$("#txtdiscount").val());
            }
        </script>
    </body>
</html>
