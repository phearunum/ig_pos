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
        <table width="300px" cellspacing="0" cellpadding="0" style="font-family: Arial;">
            <tr>
                <td>Order: <?php echo $order_by; ?></td>
                <td style="text-align: right">Table: <?php echo $table_name; ?></td>
            </tr>
            <tr>
                <td colspan="2">Date: <?php echo $start_date; ?></td>
            </tr>
        </table>
        <table width="320px" cellspacing="0" cellpadding="0" style="font-family: Khmer OS Battambang;">
            <tr style="background-color: #000000;color:#FFF">
                <th>Description</th>
                <th>Qty</th>
                <th>Note</th>
            </tr>
            <?php
                foreach ($order_record as $r){
            ?>
                <tr>
                    <td style="border-right: solid 1px #000000;border-bottom: solid 1px #000000;border-left: solid 1px #000000;"><?php echo $r->item_name; ?></td>
                    <td style="text-align: center;border-right: solid 1px #000000;border-bottom: solid 1px #000000;"><?php echo $r->qty; ?></td>
                    <td style="border-right: solid 1px #000000;border-bottom: solid 1px #000000;"><?php echo $r->item_note; ?></td>
                </tr>
            <?php
              }
            ?>
        </table>
        <button name="btn_print" id="btn_print">Print</button>
    </body>
</html>
