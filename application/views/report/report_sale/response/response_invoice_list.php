<table style="width:100%;" class="table-table" align="center">
    <tr class="form-title">
        <td colspan="4"><?php echo $date ?></td>
    </tr>
    <tr>
        <th><?php echo $lbl_inv_invoice_no; ?></th>
        <th><?php echo $lbl_inv_cashier; ?></th>
        <th><?php echo $lbl_inv_total; ?>($)</th>
        <th><?php echo $lbl_inv_status; ?></th>
    </tr>
    <?php
    $count_invoice = 0;
    $count_invoice_paid = 0;
    $count_invoice_cancel = 0;
    $grand_total = 0;
    $total_cancel = 0;
    $total_paid = 0;
    if ($invoice_list != "") {
        foreach ($invoice_list as $inl) {
            $count_invoice++;
            $grand_total+=$inl->grand_total;
            ?>

            <tr>
                <td>                        
                    <label style="font-weight: bold;"><?php echo str_pad($inl->master_id, 6, '0', STR_PAD_LEFT) ?></label><br>
                </td>
                <td>                       
                    <label style="color:#C6080D;font-weight: bold;"><?php echo $inl->cashier ?></label><br>
                </td>
                <td>                       
                    <label style="font-weight: bold;"><?php echo number_format($inl->grand_total, 2) ?></label><br>
                </td>
                <td>                       
                    <label style="color:#C0392B;font-weight: bold;"><?php echo $inl->sale_master_status ?></label><br>
                </td>
            </tr>
            <?php
            if ($inl->sale_master_status == "CANCEL") {
                $total_cancel+=$inl->grand_total;
                $count_invoice_cancel++;
            }
            if ($inl->sale_master_status == "PAID") {
                $total_paid+=$inl->grand_total;
                $count_invoice_paid++;
            }
        }
    }
    ?>

    <tr class="grand_total">
        <td colspan="2"><?php echo $lbl_inv_total_invoice ?> </td>
        <td><label style="font-weight: bold;"><?php echo $count_invoice ?></label></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $lbl_inv_total_cancel ?>(<?php echo $count_invoice_cancel ?>): </td>
        <td><label style="font-weight: bold;color:#C6080D"><?php echo number_format($total_cancel, 2) ?></label></td>
        <td></td>
    </tr>
    <tr class="grand_total">
        <td colspan="2"><?php echo $lbl_inv_total_paid?>(<?php echo $count_invoice_paid ?>): </td>
        <td><label style="font-weight: bold;color:#C6080D"><?php echo number_format($total_paid, 2) ?></label></td>
        <td></td>
    </tr>
</table>
