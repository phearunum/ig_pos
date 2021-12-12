<table style="width:100%;" class="table-table">
                                    <tr class="tr_hide">
                                        <th>Nº</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Plate No</th>
                                        <th style="text-align: left;">Invoice#</th>
                                        <th></th>
                                        <th>Grand Total($)</th>

                                    </tr>
                                    <?php
                                    $no = 1;
                                    $sub_total = 0;
                                    $grand_total = 0;
                                    foreach ($customer_name as $cn) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td> 
                                            <td><?php echo $cn->customer; ?></td>
                                            <td style="color:#990000;"><?php echo $cn->customer_phone; ?></td>
                                            <td style="color: #000080;"><?php echo $cn->customer_plate_no; ?></td>
                                            <td>
                                                <table>   
                                                    <?php
                                                   $invoice_no = $this->Base_model->loadToListJoin("SELECT customer,customer_id,invoice_no,car_care FROM v_customer_history where  customer <> '' and customer_id = " . $cn->customer_id . " GROUP BY invoice_no ORDER BY invoice_no DESC");
                                                    foreach ($invoice_no as $in) {
                                                        ?>
                                                        <tr>
                                                            <td style="color: #000080;">#<?php echo $in->invoice_no; ?></td>
                                                            <td style="text-align: left; padding-left: 10px; width:400px" >
                                                                <?php
                                                                $itno = 1;
                                                                $sub_total = 0;
                                                                $item_name = $this->Base_model->loadToListJoin("SELECT invoice_no,item_name,grand_total,car_care FROM v_customer_history where car_care = 0 and  customer <> '' and invoice_no = " . $in->invoice_no);
                                                                foreach ($item_name as $itn) {
                                                                    ?>
                                                                    <label style="text-align: left;"><?php echo $itn->item_name . ' , '; ?></label>
                                                                    <?php $sub_total += $itn->grand_total;
                                                                } ?>
                                                            </td>
                                                            <td style="color: #000080; font-weight: bold;">
        <?php echo number_format($sub_total, 2); ?>
                                                            </td>
                                                        </tr> 
    <?php } ?>
                                                </table>
                                            </td>
                                            <td></td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $grand_total_name = $this->Base_model->loadToListJoin("SELECT sum(grand_total) as grand_total,car_care FROM v_customer_history where car_care = 0 and  customer <> '' and customer_id = " . $cn->customer_id . " GROUP BY customer_id");
                                                foreach ($grand_total_name as $gtn) {
                                                    ?>

                                                    <label style="text-align: left;color: #000080; font-weight: bold;"><?php echo number_format($gtn->grand_total, 2); ?></label>

        <?php $total+=$gtn->grand_total;
    } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $no = $no + 1;
                                    }
                                    ?>  

                                </table>