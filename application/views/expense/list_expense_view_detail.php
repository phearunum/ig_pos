<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
        <table width="100%" cellspacing="0" class="table table-bordered table-hover" id="table-table" cellpadding="0" border="1">
            <thead>
                <tr class="tb_header" style="background-color: #13234b; color: white;">
                    <th><?php echo $lbl_edit?></th>
                    <th><?php echo $lbl_no?></th>
                    <th><?php echo $lbl_expense_type?></th>
                    <th><?php echo $lbl_chart_no?></th>
                    <th><?php echo $lbl_expense_detail?></th>
                    <th><?php echo $lbl_amount?>($)</th>
                    <th><?php echo $lbl_date_entry?></th>
                    <th class="delete-center"><?php echo $lbl_delete?></th>
                </tr>
            </thead>
           <?php
                $no=1;
                $grandtotal=0;
                foreach($expense_detail_record as $edr){
                    $grandtotal+=$edr->expense_amount;
            ?>
            <tr>
                <td><a href="<?php echo site_url("expense/edit_load/".$edr->expense_id) ?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a></td>
                <td><?php echo $no ?></td>
                <td style="text-align: left"><?php echo $edr->expense_type_name ?></td>
                <td style="text-align: left"><?php echo str_pad($edr->expense_chart_number, 6, '0', STR_PAD_LEFT); ?></td>
                <td style="text-align: left"><?php echo $edr->expense_detail_name ?></td>
                <td><?php echo $edr->expense_amount ?></td>
                <td><?php echo $edr->expense_date ?></td>
                <td class="delete-center"><a href="<?php echo site_url("expense/delete_by_view_detail/".$edr->expense_id) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a></td>
            </tr>
            <?php
                $no++;
                }
            ?>
            <tr style="font-weight: bold">
                <td colspan="5" style="text-align: right"><?php echo $lbl_grand_total?>($)</td>
                <td style="font-weight: bold"><?php echo number_format($grandtotal,2) ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    </body>
</html>
