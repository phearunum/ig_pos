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
        <table style="width:80%;" align="center" class="table-table">
                        <tr class="form-title">
                            <td colspan="4"><?php echo $date ?></td>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Employee Name</th>
                            <th><label>Table Name</label><label style="margin-left: 50px;">Invoice Count</label><label style="margin-left: 90px;">Total($)</label></th>
                        </tr>
                    <?php
                        $no=1;
                        $grand_total=0;
                        $grand_count=0;
                        
                        if($record_employee!=""){
                        foreach($record_employee as $re){   
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $re->employee_name; ?></td>
                            <td>
                                <?php
                                    $total=0;
                                    $record_table=$this->Base_model->get_data_by("select layout_name,layout_id from v_order_by_table where layout_manage_by=".$re->layout_manage_by." AND DATE_FORMAT(end_date,'%Y-%m-%d')>='".$date_from."' AND DATE_FORMAT(end_date,'%Y-%m-%d')<='".$date_to."' group by layout_name");
                                    foreach($record_table as $rt){
                                ?>
                                        <label><?php echo $rt->layout_name ?></label>
                                <?php
                                    
                                    $record_invoice=$this->Base_model->get_data_by("select count(invoice_no) as invoice_count,sum(grand_total) as grand_total from v_order_by_table_summary where table_id=".$rt->layout_id." AND DATE_FORMAT(end_date,'%Y-%m-%d')>='".$date_from."' AND DATE_FORMAT(end_date,'%Y-%m-%d')<='".$date_to."'");
                                    foreach($record_invoice as $ri){
                                        $total+=$ri->grand_total;
                                ?>
                                        <label style="color:#a10000;margin-left: 100px;">(<?php echo $ri->invoice_count ?>)</label>
                                        <label style="color:#000080;margin-left: 100px;font-weight: bold"><?php echo number_format($ri->grand_total,2) ?></label><br>
                                <?php 
                                  }
                                  
                                 }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><label style="margin-left: 505px;color:#a10000;font-weight: bold;border: solid #000080 1px;width:150px;background-color: #ccccff;"><?php echo number_format($total,2);?></label></td>
                        </tr>
                        <?php 
                             $grand_total+=$total;
                            }
                         }
                        ?>
                        <tr>
                            <td colspan="3"><label style="margin-left: 505px;color:#a10000;font-weight: bold;border: solid #000080 1px;width:150px;background-color: #ffccff;"><?php echo number_format($grand_total,2);?></label></td>
                        </tr>
                    </table>
    </body>
</html>
