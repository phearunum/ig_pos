
    <?php
    $no = 1 + $record_no;
    $total_sub = 0;
    $total_gra = 0;
    if ($sale_summary != "") {
        foreach ($sale_summary as $rsm) {
            $showdetail = $this->Base_model->loadToListJoin("SELECT * FROM invoice_finished WHERE master_status IN ('PAID', 'CREDIT', 'HIDDEN') and detail_status IN ('PAID', 'CREDIT', 'HIDDEN') and master_id =" . $rsm['master_id']." order by  detail_id asc");
            ?>
            <tr class="tbody">
                <td ><?php echo $no ?></td>
                <td style="color:#0033cc;">
                    <?php echo $rsm['invoice_no'] ?>
                </td>
                <td><?php echo $rsm['customer'] ?></td>
                <td><?php echo $rsm['customer_card'] ?></td>
                <td><?php echo $rsm['end_date'] ?></td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        if($dd->item_id<0){
                        ?>
                    <label style="color:maroon;" ><?php echo $dd->item_name ?></label><br>
                        <?php } else { ?>
                    <label style="color:#193475;" ><?php echo $dd->item_name ?></label><br>
                        <?php
                    }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label ><?php echo $dd->qty ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label  ><?php echo $dd->unit_price ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label ><?php echo number_format($dd->unit_cost,2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>

                <td>
                    <?php
                    $total = 0;
                    $show_subtotal = $this->Base_model->loadToListJoin("SELECT sum(sub_total) as sub_total FROM invoice_finished WHERE master_status IN ('PAID', 'CREDIT', 'HIDDEN') and detail_status IN ('PAID', 'CREDIT', 'HIDDEN') and master_id =" . $rsm['master_id']." order by  detail_id asc");
                    foreach ($show_subtotal as $st) {
                        $total+=$st->sub_total;
                        ?>
                        <label style="color:#cc0000;"><?php echo number_format($st->sub_total, 2) ?></label><br>
                        <?php
                    }
                    ?>

                </td>
                <td>
                    <?php
                    foreach ($showdetail as $dd) {
                        ?>
                        <label><?php echo number_format($dd->total_discount_dollar, 2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $sv) {
                        ?>
                        <label><?php echo number_format($sv->tax_amount, 2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $sv) {
                        ?>
                        <label><?php echo number_format($sv->service_charge_amount, 2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $sub_grand_total = 0;
                    $show_grandtotal = $this->Base_model->loadToListJoin("SELECT sum(grand_total) as grand_total FROM invoice_finished WHERE master_status IN ('PAID', 'CREDIT', 'HIDDEN') and detail_status IN ('PAID', 'CREDIT', 'HIDDEN') and master_id =" . $rsm['master_id']." order by  detail_id asc");
                    foreach ($show_grandtotal as $sg) {
                        $sub_grand_total+=$sg->grand_total;
                        ?>
                        <label style="color:#cc0000;font-weight: bold"><?php echo number_format($sg->grand_total, 2) ?></label><br>
                    <!--<label style="color:#cc0000;font-weight: bold"><?php // echo "page=".$page_no. " / Total=". $total_record ?></label><br>-->
                        
                        <?php
                    }
                    ?>   
                </td>

            </tr>
            <?php
            $total_sub+=$total;
            $total_gra+=$sub_grand_total;
            $no++;
        }
    }
    ?>
    <tr class="hidden <?php // if($page_no<$total_record){echo "tbody";} else {echo "hidden";} ?>">
        <td colspan="14">
    <center><img src="<?php echo base_url('img/250.gif'); ?>" height="150px" width="200px" /></center>
        </td>
    </tr>
    <?php
    $grand = 0;
    $sub = 0;
    foreach ($total_page as $t) {
        $grand += $t->grand_total;
        $sub += $t->sub_total;
    }
    ?>
    <tr style="background-color:#b5c3e9" class="<?php if($page_no>=$total_record){echo "tbody";} else {echo "hidden";} ?>">
        <td colspan="5" style="font-weight: bold;color:#000000"><?php echo $lbl_grand_total."($):" ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <!--<td><label style="color:#cc0000;font-weight: bold;"><?php //echo number_format($total_sub, 2) ?></label></td>-->
        <td><label style="color:#cc0000;font-weight: bold;"><?php echo  number_format($sub, 2); //echo number_format($total_sub, 2) . " of " . number_format($sub, 2) ?></label></td>
        <td></td>
        <td></td>
        <td></td>
        <!--<td><label style="color:#cc0000;font-weight: bold;"><?php //echo number_format($total_gra, 2) ?></label></td>-->
        <td><label style="color:#cc0000;font-weight: bold;"><?php echo number_format($grand, 2); // echo number_format($total_gra, 2) . " of " . number_format($grand, 2) ?></label></td>
        <td></td>
    </tr>
