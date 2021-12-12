<table style="width:100%;" cellspacing="0" class="table-table" id="table0excel" cellpadding="0" border="0">
    <tr><td colspan="14" style=font-size:24px;"><center>REPORT HIDE INVOICE</center></td></tr>
    <tr><td colspan="14"><center><?php echo $show_date; ?></center></td></tr>
    <tr style="background-color: #cdcdcd;">
        <th>Nº</th>
        <th class="hidden"><?php echo 'Invoice No' ?></th>
        <th><?php echo 'Customer' ?> </th>
        <th><?php echo 'Card' ?></th>
        <th><?php echo 'Date' ?></th>
        <th><?php echo 'Item' ?></th>
        <th><?php echo 'QTY' ?></th>
        <th><?php echo 'Price ($)' ?></th>
        <th><?php echo 'Current Cost ($)' ?></th>
        <th><?php echo 'Total($)' ?></th>
        <th><?php echo 'Dis' ?>($)</th>
        <th><?php echo 'Vat' ?>($)</th>
        <th><?php echo 'Charge' ?></th>
        <th><?php echo 'Grand Total ($)' ?></th>
    </tr>
    <?php
    $no = 1;
    $total_sub = 0;
    $total_gra = 0;
    if ($sale_summary != "") {
        foreach ($sale_summary as $rsm) {
            $showdetail = $this->Base_model->loadToListJoin("SELECT * FROM invoice_finished WHERE master_status ='HIDDEN' and detail_status = 'HIDDEN' and master_id =" . $rsm['master_id']." order by  detail_id asc");
            ?>
            <tr class="tbody">
                <td class="over20"><?php echo $no ?></td>
                <td class="hidden" style="color:#0033cc;">
                    <?php echo $rsm['invoice_no'] ?>
                </td>
                <td class="over20"><?php echo $rsm['customer'] ?></td>
                <td class="over20"><?php echo $rsm['customer_card'] ?></td>
                <td class="over20"><?php echo $rsm['end_date'] ?></td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        if($dd->item_id<0){
                        ?>
                    <label style="color:maroon;" ><?php echo $dd->item_name ?></label><br>
                        <?php } else { ?>
                    <label class="over20"style="color:#193475;" ><?php echo $dd->item_name ?></label><br>
                        <?php
                    }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label class="over20" ><?php echo $dd->qty ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label class="over20" ><?php echo $dd->unit_price ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label class="over20" ><?php echo number_format($dd->unit_cost,2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>

                <td>
                    <?php
                    $total = 0;
                    foreach ($showdetail as $st) {
                        $total+=$st->sub_total;
                        ?>
                        <label class="over20"  style="color:#0033cc"><?php echo number_format($st->sub_total, 2) ?></label><br>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label class="over20" ><?php echo number_format($dd->total_discount_dollar, 2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $sv) {
                        ?>
                        <label class="over20" ><?php echo number_format($sv->tax_amount, 2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $sv) {
                        ?>
                        <label class="over20" ><?php echo number_format($sv->service_charge_amount, 2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $sub_grand_total = 0;
                    foreach ($showdetail as $sg) {
                        $sub_grand_total+=$sg->grand_total;
                        ?>
                        <label class="over20" style="color:#0033cc"><?php echo number_format($sg->grand_total, 2) ?></label><br>

                        <?php
                    }
                    ?>   
                </td>

            </tr>
            <tr style="background-color: #cdcdcd" class="tbody">
                <td colspan="4" style="font-weight: bold"><?php echo 'Sub Total' ?> ($):</td>               
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"><label style="background-color: #cdcdcd;color:#cc0000;font-weight: bold"><?php echo number_format($total, 2) ?></label></td>              
                <td></td>
                <td></td>
                <td colspan="2"><label style="background-color: #cdcdcd;color:#cc0000;font-weight: bold"><?php echo number_format($sub_grand_total, 2) ?></label></td>
                
                
            </tr>
            <?php
            $total_sub+=$total;
            $total_gra+=$sub_grand_total;
            $no++;
        }
    }
    ?>
    <tr class="tbody"><td colspan="14"></td></tr>
 
    <tr style="background-color:#cdcdcd" class="tbody">
        <td colspan="4" style="font-weight: bold;color:#000000"><?php echo $lbl_grand_total ?> ($):</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2"><label style="color:#cc0000;font-weight: bold;"><?php echo number_format($total_sub, 2) ?></label></td>
        <td></td>
        <td></td>
        <td colspan="2"><label style="color:#cc0000;font-weight: bold;"><?php echo number_format($total_gra, 2) ?></label></td>       
    </tr>
</table>
