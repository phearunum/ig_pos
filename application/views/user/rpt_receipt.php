<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>RECEIPT</title>
        <script type="text/javascript">
                window.print();
                setTimeout(function(){
                    window.open("<?php echo site_url('customeregistration/loadlist'); ?>","_self");
                }, 1000);
        </script>
    </head>
    <body>
        <table width="320px" cellspacing="0" cellpadding="0" class="invoice_grid" style="font-family: Calibri;text-align: center;font-weight: bold;">
            <?php
                foreach($record_company_profile as $cp){
            ?>
            <tr>
                <td>
                    <img src='<?php echo base_url("img/company/".$cp->company_image); ?>'>
                </td>
            </tr>
            <tr style="font-size: 20px;">
                <td><?php echo $cp->company_name ?></td>
            </tr>
            <tr>
                <td><?php echo $cp->company_phone ?></td>
            </tr>
            <tr>
                <td><?php echo $cp->company_address ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <table width="320px" cellspacing="5" cellpadding="0" class="invoice_grid" style="font-family: Times New Roman;">
            <?php
                foreach($record_customers as $rc){
            ?>
            <tr>
                <td>Invoice No : <?php echo str_pad($rc->customer_id, 5, '0', STR_PAD_LEFT); ?></td>
                <td style="text-align: right;">Date : <?php echo $rc->date_created ?></td>
            </tr>
            <tr><td colspan="2" style="border-top:solid #000000 1px;"></td></tr>
            <tr>
                <td>Customer Name  </td>
                <td> :  <?php echo $rc->customer_name ?></td>
            </tr>
            <tr>
                <td>Family Name  </td>
                <td> :  <?php echo $rc->customer_family_name ?></td>
            </tr>
            <tr>
                <td>Registration Type  </td>
                <td> :  <?php echo $rc->card_type_name ?></td>
            </tr>
            <tr>
                <td>Start Date  </td>
                <td> :  <?php echo $rc->card_entry_date ?></td>
            </tr>
            <tr>
                <td>Expired Date  </td>
                <td> :  <?php echo $rc->card_expired_date ?></td>
            </tr>
            <tr>
                <td>Membership Duration  </td>
                <td> :  <?php echo $rc->customer_count_time ?></td>
            </tr>
            <tr>
                <td>Payment Type  </td>
                <td> :  <?php echo "cash" ?></td>
            </tr>
            <tr>
                <td>Discount(%)  </td>
                <td> :  <?php echo $rc->discount ?></td>
            </tr>
            <tr style="background-color:#000000;color:#ffffff;font-size: 17px;font-weight: bold;">
                <td>Total Fee($)  </td>
                <td> :  <?php echo number_format($rc->customer_payment,2) ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <table width="320px" cellspacing="0" cellpadding="0" class="invoice_grid" style="font-family: Khmer OS;font-size: 12px;text-align: center">
            <tr>
                <td>សូមអរគុណ | Thank You</td>
            </tr>
            <tr>
                <td>Powered by : HIGHPOINT|AUTO-ID</td>
            </tr>
            <tr>
                <td>www.highpoint.com.kh</td>
            </tr>
        </table>
    </body>
</html>
