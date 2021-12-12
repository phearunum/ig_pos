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
        <table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="0">
                <tr>
                    <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo $title ?></td>
                </tr>
                <tr>
                    <th>Nº</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Measure</th>
                    <th>Transfer From</th>
                    <th>To Stock Location</th>
                    <th>Status</th>
                    <?php //if($p->permission_delete!=0){ ?><th class="delete-center">Approve</th><?php //} ?>
                </tr>
                <?php
                    $no=1;
                    foreach($record_transfer_alert as $rta){
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $rta->item_detail_name ?></td>
                    <td><?php echo $rta->stock_transffer_qty ?></td>
                    <td><?php echo $rta->measure_name ?></td>
                    <td><?php echo $rta->from_branch ?></td>
                    <td><?php echo $rta->stock_location_to ?></td>
                    <td><?php echo $rta->stock_transffer_status ?></td>
                    <?php //if($p->permission_delete!=0){ ?><td class="delete-center"><a href="<?php echo site_url("stock_transffer/approve_to_stock/".$rta->stock_transffer_id) ?>" onclick="return confirm('Do you want to approve with this record?')">Approve</a></td><?php //} ?>
                </tr>
                <?php
                        $no=$no+1;
                    }
                ?>
            </table>
    </body>
</html>
