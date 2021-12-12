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
        <table width="100%" border="1" class="table-table">          
                                                <tr style="background-color: #37773A;">
                                                    <th>No</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price($)</th>
                                                    <th>Discount(%)</th>
                                                    <th>Total($)</th>
                                                    <?php
                                                        //if($p->edit!=0){
                                                    ?>
                                                        <th>Edit</th>
                                                    <?php
                                                        //}
                                                        //if($p->delete!=0){
                                                    ?>
                                                        <th>Delete</th>
                                                    <?php
                                                        //}
                                                    ?>
                                                </tr>
                                                <?php               
                                                    $no=1;
                                                    $grandtotal=0;
                                                    foreach ($getlist as $g){
                                                    $grandtotal=$grandtotal+$g->sale_detail_total;
                                                ?>
                                                    <tr style="color:#000000">
                                                        <td width="50px"><?php echo $no ?></td>
                                                        <td><?php echo $g->item_detail_name; ?></td>
                                                        <td><?php echo $g->sale_detail_qty; ?></td>
                                                        <td><?php echo number_format($g->sale_detail_unit_price,2) ?></td>
                                                        <td><?php echo number_format($g->sale_detail_discount_dollar,2) ?></td>
                                                        <td><?php echo number_format($g->sale_detail_total,2) ?></td>
                                                        <?php
                                                            //if($p->edit!=0){
                                                        ?>
                                                        <td>
                                                            <a href="<?php echo site_url('retail_sale/edit_load/' . $g->sale_detail_id.'/'.$g->sale_detail_item_id.'/'.$g->measure_id.'/'.'finish'); ?>">
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <?php
                                                            //}
                                                            //if($p->delete!=0){
                                                        ?>
                                                        <td width="50px"><a href="<?php echo site_url('wholesale/delete/' . $g->sale_detail_id."/".$g->sale_detail_item_id."/".$g->sale_detail_qty); ?>" onclick="return confirm('Do you want to delete this record?')">
                                                                <img src="<?php echo base_url('img/delete.gif') ?>"/>
                                                        </a></td>
                                                        <?php
                                                            //}
                                                        ?>
                                                    </tr>
                                                <?php
                                                    $no=$no+1;
                                                 }
                                               ?>
                                        </table>
    </body>
</html>
