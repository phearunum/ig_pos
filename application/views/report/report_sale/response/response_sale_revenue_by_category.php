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
        <table style="width:100%;" class="table-table">
                        <tr class="form-title">
                            <td colspan="6"><?php echo $date ?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lbl_no; ?></th>
                            <th><?php echo $lbl_rev_desc; ?></th>
                            <th><?php echo $lbl_rev_qty; ?></th>
                            <th><?php echo $lbl_rev_total; ?>($)</th>
                            <th><?php echo $lbl_rev_total_descount; ?>($)</th>
                            <th><?php echo $lbl_rev_grand_total; ?>($)</th>
                        </tr>
                    <?php
                        $no=1;
                        $grand_total=0;
                        $grand_count=0;
                        $sub_total = 0;
                        $total_discount = 0;
                        $count_qty = 0;
                        
                        if($record_revenue!=""){
                        foreach($record_revenue as $re){   
                            $grand_count++;
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $re->item_type_name; ?></td>
                            <td><?php echo $re->item_count; ?></td>
                            <td><?php echo number_format($re->sub_total,2); ?></td>
                            <td><?php echo number_format($re->total_discount_dollar,2); ?></td>
                            <td><?php echo number_format($re->grand_total,2); ?></td>
                            
                    <?php
                                $sub_total      += $re->sub_total;
                                $total_discount += $re->total_discount_dollar;;
                                $grand_total    += $re->grand_total;
                                $count_qty      += $re->item_count;
                                $no++;
                            }
                        }
                    ?>
                    <tr class="grand_total">
                        <td colspan="2" style="text-align: right"><?php echo $lbl_rev_grand_total."($)"; ?></td>
                        <td><label label style="color:#cc0000;font-weight: bold"><?php echo number_format($count_qty,2) ?></label></td>
                        <td><label label style="color:#cc0000;font-weight: bold"><?php echo number_format($sub_total,2) ?></label></td>
                        <td><label label style="color:#cc0000;font-weight: bold"><?php echo number_format($total_discount,2) ?></label></td>
                        <td><label label style="color:#cc0000;font-weight: bold"><?php echo number_format($grand_total,2) ?></label></td>
                    </tr>
        </table>
    </body>
</html>
