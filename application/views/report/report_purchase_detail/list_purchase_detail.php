<?php foreach ($record_permission as $rp){  ?>
<table width="100%" cellspacing="0" class="table-table" id="table0excel" cellpadding="0" border="0">
    <tr style="background-color: #cdcdcd;">
        <th><?php echo $lbl_no?></th>
        <th><?php echo $lbl_po?></th>
        <th><?php echo $lbl_sup?></th>
        <th><?php echo $lbl_create_date?></th>
        <th width="200px"><?php echo $lbl_name?></th>
        <th><?php echo $lbl_price?></th>        
        <th><?php echo $lbl_qty?></th>
        <th><?php echo $lbl_total?></th>
        <th><?php echo $lbl_stock?></th>
        <th><?php echo $lbl_status?></th> 
        <th>Edit</th>
    </tr>
    <?php
    $no = 1;
    $total_sub = 0;
    $total_gra = 0;
    if ($purchase_summary != null) {
        foreach ($purchase_summary as $rsm) {
            $showdetail = $this->Base_model->loadToListJoin("SELECT * FROM v_purchase_detail WHERE purchase_no ='" . $rsm['purchase_no'] . "'");
            ?>
            <tr class="tbody">
                <td><?php echo $no ?></td>
                <td>
                    <?php
                    if ($rsm['status'] == "PAID") {
                        ?>
                        <?php echo $rsm['purchase_no']; ?>
                        <?php
                    } else {
                        ?>
                            <?php if($rp->permission_edit == 1){ ?><a class="tooltips" data-original-title="This invoice is credited!!" data-placement="top" href="<?php echo site_url("purchase_pay/pay/".$rsm['purchase_no']); ?>" ><u><?php echo $rsm['purchase_no']; ?></u></a><?php }else{ echo $rsm['purchase_no']; }?>
                        <?php
                    }
                    ?>
                    <a  class="tooltips hidden" data-original-title="Sale Return!!"  href="<?php echo site_url("sale_return/addnew/".$rsm['purchase_no']) ?>" data-original-title="Return" data-placement="top"><img src="<?php echo base_url("img/icons/icon-return.png") ?>" width="15"></a>
                </td>
                <td><?php echo $rsm['supplier_name'] ?></td>
                <td><?php echo $rsm['purchase_created_date'] ?></td>
                <td class="text-left">
                    <?php
                    foreach ($showdetail as $sdl) {
                        $out = strlen($sdl->item_detail_name) > 20 ? substr($sdl->item_detail_name,0,20)."..." : $sdl->item_detail_name;
                        ?>
                        <label title="<?php echo str_replace('"','',$sdl->item_detail_name) ?>">• <?php echo $out ?></label><br>
                        <?php
                    }
                    ?>
                <td>
                    <?php
                    foreach ($showdetail as $q) {
                        ?>
                        <label style="color:#0033cc"><?php echo number_format($q->purchase_detail_qty, 2) ?></label><br>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    foreach ($showdetail as $up) {
                        ?>
                        <label><?php echo number_format($up->purchase_detail_unit_cost, 2) ?></label><br>
            <?php
        }
        ?>
                </td>
                <td>
                    <?php
                    $total = 0;
                    foreach ($showdetail as $st) {
                        $total+=$st->total;
                        ?>
                        <label style="color:#0033cc"><?php echo number_format($st->total, 2) ?></label><br>
            <?php
        }
        ?>

                </td>
                <td>
                    <?php
                    foreach ($showdetail as $sg) {
                        ?>
                        <label style="color:#0033cc"><?php echo $sg->stock_location_name ?></label><br>

            <?php
        }
        ?>   
                </td>
                <td>
                    <?php
                    if ($rsm['status'] == "PAID") {
                        ?>
                        <img src="<?php echo base_url("img/icons/check.png") ?>" width="15">
                        <?php
                    } else {
                        ?>
                        <img src="<?php echo base_url("img/icons/x.png") ?>" width="15">
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <a href="<?php echo site_url("purchase/edit_load_purchase_order/".$rsm['purchase_no']) ?>">Edit</a>
                </td>
            </tr>
            <tr style="background-color: #cdcdcd" class="tbody">
                <td colspan="7" style="font-weight: bold"><?php echo "($)Sub Total"//$lbl_sub?>:</td>
                <td><label style="background-color: #cdcdcd;color:#cc0000;font-weight: bold"><?php echo number_format($total, 2) ?></label></td>
                <td></td>                   
                <td></td>
                <td></td>
            </tr>
            <?php
            $total_sub+=$total;
            $no++;
        }
    }
    ?>
    <tr class="tbody"><td colspan="13"></td></tr>
    <tr style="background-color:#cdcdcd" class="tbody">
        <td colspan="7" style="font-weight: bold;color:#000000"><?php echo "($)Grand Total"//$lbl_grand?>:</td>
        <td><label style="color:#cc0000;font-weight: bold;"><?php echo number_format($total_sub, 2)." of ".number_format($total_page,2) ?></label></td>
        <td></td>  
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<?php } ?>