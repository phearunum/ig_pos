<table style="width:100%;" class='table-table' cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td style="text-align: center;" colspan="14" >
            <p><?php echo $date; ?></p>                                        
        </td>
    </tr>
    <tr>
        <th><?php echo $lbl_no ?></th>
        <th><?php echo $lbl_invoice_no ?></th>
        <th><?php echo $lbl_customer ?></th>
        <th><?php echo $lbl_card_no ?></th>
        <th><?php echo $lbl_date ?></th>
        <th><?php echo $lbl_item_name ?></th>
        <th><?php echo $lbl_qty ?></th>
        <th><?php echo $lbl_unit_price ?> ($)</th>
        <th><?php echo "Current Cost" ?>($)</th>
        <th><?php echo $lbl_total ?>($)</th>
        <th><?php echo $lbl_discount ?>($)</th>
        <th><?php echo $lbl_tax ?>($)</th>
        <th><?php echo $lbl_service ?>($)</th>
        <th><?php echo $lbl_grand_total ?>($)</th>
    </tr>
    <?php
    $no = 1;
    $sub_total = 0;
    $grand_total = 0;
    $discount = 0;
    $tax = 0;
    $service = 0;
    foreach ($sale_detail as $rd) {
        $saledata = $this->Base_model->loadToListJoin("SELECT item_name,qty,unit_price,unit_cost,invoice_no FROM v_invoice_finished where invoice_no = " . $rd->invoice_no);
        ?>
        <tr>
            <td><?php echo $no; ?></td> 
            <td><?php echo $rd->invoice_no; ?></td>
            <td><?php echo $rd->customer; ?></td>
            <td><?php echo $rd->customer_plate_no; ?></td>
            <td><?php echo $rd->start_date; ?></td>

            <td>
                <?php
                
                foreach ($saledata as $ds) {
                    ?>
                    <label style="color:#0033cc"><?php echo $ds->item_name ?></label><br>
                    <?php
                }
                ?>
            </td>
            <td>
                <?php
                foreach ($saledata as $sq) {
                    ?>
                    <label style="color:#0033cc;"><?php echo $sq->qty ?></label><br>
                    <?php
                }
                ?>
            </td>
            <td>
                <?php
                foreach ($saledata as $sup) {
                    ?>
                    <label style="color:#0033cc"><?php echo number_format($sup->unit_price, 2) ?></label><br>
                    <?php
                }
                ?>
            </td>
            <td>
                <?php
                foreach ($saledata as $sup) {
                    ?>
                    <label style="color:#0033cc"><?php echo number_format($sup->unit_cost, 2) ?></label><br>
                    <?php
                }
                ?>
            </td>
            <td><?php echo number_format($rd->sub_total, 2); ?></td>
            <td><?php echo number_format($rd->total_discount, 2); ?></td>                                        
            <td><?php echo number_format($rd->tax_amount, 2); ?></td>
            <td><?php echo number_format($rd->service_charge_amount, 2); ?></td>
            <td><?php echo number_format($rd->grand_total, 2); ?></td>
        </tr>
        <?php
        $no = $no + 1;
        $sub_total += $rd->sub_total;
        $grand_total += $rd->grand_total;
        $discount += $rd->total_discount;
        $tax += $rd->tax_amount;
        $service += $rd->service_charge_amount;
    }
    ?>
    <tr class="total_footer">
        <td colspan="9" style="text-align: left;" > <?php echo $lbl_grand_total ?> : </td>
        <td><?php echo number_format($sub_total, 2) ?></td>
        <td><?php echo number_format($discount, 2) ?></td>
        <td><?php echo number_format($tax, 2) ?></td>
        <td><?php echo number_format($service, 2) ?></td>                                   
        <td><?php echo number_format($grand_total, 2) ?></td>
    </tr>
</td>
</table>
