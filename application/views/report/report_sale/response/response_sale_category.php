<table style="width: 100%;">
<tr>
    <td style="text-align: center;" colspan="13" >
            <p><?php echo $date; ?></p>
            <p class="hidden"><?php echo $datefrom; ?></p>
            <p class="hidden"><?php echo $dateto; ?></p>
    </td>

</tr>
<?php
    $no=1;                                  
    $total_amount =0;
    $total_amount_grandtotal=0;
    $total_amount_tax = 0;
    $total_amount_service_charge =0;
    $total_amount_qty =0;

    foreach($sale_category as $sc){
?>
<tr ondblclick="hide_show_i(this)" id="<?php echo 'm'.$no; ?>" style="background-color:  #b8ccea; font-weight: bold; text-align: left;">
       
    <td style="text-align: left;"> <?php echo $no. ' - '. $sc->item_type_name ?></td>                             
       
</tr>
<tr id="<?php echo 'h_i'.$no; ?>">

<td colspan="10" >
    <table width="100%" cellspacing="0" class="table-table" id='inside' cellpadding="0" border="0">
        <tr style="background-color: #37773A;">
                <th style="color:#000080;">BSD</th>  
                <th><?php echo $lbl_no ?></th>
                <th><?php echo $lbl_product_name ?></th>
                <th><?php echo $lbl_qty ?></th>
                <th><?php echo $lbl_unit_price ?></th>
                <th><?php echo $lbl_total ?></th>
                <th><?php echo $lbl_tax ?></th>
                <th><?php echo $lbl_service ?></th>
                <th><?php echo $lbl_total ?></th>
        </tr>
        <?php
            $no_i = 1;
            $sub_total = 0;
            $grand_total =0;
            $total_tax=0;
            $total_service_charge =0;
            $total_qty = 0;
            $record_sale_item = $this->Base_model->loadToListJoin("select 
                vd.item_type_id,
                vd.item_type_name,
                vf.item_name,
                sum(vf.qty) as qty,
                vf.unit_price,
                sum(sub_total) as sub_total,
                sum(vf.tax_amount) as tax_amount,
                sum(vf.grand_total) as grand_total,
                vf.end_date,
                sum(vf.service_charge_amount) as service_charge_amount

                from v_invoice_finished vf

                left join v_item_detail vd on vf.item_id=vd.item_detail_id
                where DATE_FORMAT(end_date,'%Y-%m-%d') BETWEEN '".$datefrom."' and '".$dateto."' and  item_type_id ='".$sc->item_type_id."'
                group by vd.item_type_id,vf.item_id ");
        foreach($record_sale_item as $rsi){

        ?>
        <tr ondblclick="hide_show_d(this)" id="<?php echo 'i'.$no.$no_i; ?>">
                <td></td>
                <td><?php echo $no_i ?></td>
                <td style="width:20%;"><?php echo $rsi->item_name ?></td>
                <td style="width:5%;"><?php echo $rsi->qty ?></td>
                <td><?php echo $rsi->unit_price ?></td>
                <td style="color:blue; width: 5%;"><?php echo number_format($rsi->sub_total,2) ?></td>
                <td ><?php echo number_format($rsi->tax_amount,2) ?></td>
                <td><?php echo number_format($rsi->service_charge_amount,2) ?></td>

                <td style="color:blue;"><?php echo number_format($rsi->grand_total,2) ?></td>
        </tr>
        <?php $no_i++; $sub_total += $rsi->sub_total;$grand_total += $rsi->grand_total; $total_tax +=$rsi->tax_amount;  $total_service_charge +=$rsi->service_charge_amount; $total_qty +=$rsi->qty; }  ?>
        <tr class="totalbyinvoice" style="background-color: #738fdc; color:white;">
            <td colspan="3" style="text-align: left;color:white; "><?php echo $lbl_total ?> : </td>
            <td style="color:white; font-weight: bold;"><?php echo number_format($total_qty,2); ?></td>
            <td></td>
            <td style="color:white; font-weight: bold;"><?php echo number_format($sub_total,2); ?></td>
            <td style="color:white; font-weight: bold;"><?php echo number_format($total_tax,2); ?></td>
            <td style="color:white; font-weight: bold;"><?php echo number_format($total_service_charge,2); ?></td>
            <td style="color:white; font-weight: bold;"><?php echo number_format($grand_total,2); ?></td>
        </tr>
    </table>

    </td>
    </tr>                       
    <?php
        $no=$no+1;   
        $total_amount += $sub_total;
        $total_amount_grandtotal += $grand_total;
        $total_amount_tax += $total_tax;
        $total_amount_service_charge +=$total_service_charge;
        $total_amount_qty += $total_qty;
        }
    ?>
    <tr>
        <td>
            <table width='100%'>
                <tr>
                <th style="color:#000080;">BSD</th>  
                <th style="color:#000080;">###</th>
                <th style="color:#000080;">Product Name</th>
                <th style="color:#000080;">QTY</th>
                <th style="color:#000080;">Price un</th>
                <th style="color:#000080;"></th>
                <th style="color:#000080;">Tax Amount</th>
                <th style="color:#000080;">Service Charge Amount</th>
                <th style="color:#000080;"><?php echo $lbl_grand_total?></th>
                </tr>
                <?php
                                                      
                    $total_all_category = $this->Base_model->loadToListJoin("SELECT
                                    sum(vf.tax_amount) AS tax_amount,
                                    sum(vf.sub_total) AS sub_total,
                                    sum(vf.total_discount_dollar) AS total_discount_dollar,
                                    sum(vf.grand_total) AS grand_total,
                                    sum(vf.service_charge_amount) as service_charge_amount
                                    FROM
                                        v_invoice_finished vf
                                    INNER JOIN v_item_detail vd ON vf.item_id = vd.item_detail_id
                                    WHERE
                                        DATE_FORMAT(end_date, '%Y-%m-%d') BETWEEN '".$datefrom."' and '".$dateto."'");


                    foreach ($total_all_category as $tac){

                    ?>

                    <tr style="background-color:red;">
                        <td colspan="3" style="text-align: left;"><?php echo $lbl_grand_total?>: </td>                  
                        <td><?php echo $total_amount_qty; ?></td>                   
                        <td></td>
                        <td><?php echo number_format($tac->sub_total,2); ?></td>
                        <td><?php echo number_format($tac->tax_amount,2); ?></td>
                        <td><?php echo number_format($tac->service_charge_amount,2); ?></td>
                        <td><?php echo number_format($tac->grand_total,2); ?></td>
                    </tr>

                <?php } ?>
            </table>
        </td>
    </tr>
</table>