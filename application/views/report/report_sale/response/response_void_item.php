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
        <table style="width:100%;" class="table-table" align="center">
                        <tr class="form-title">
                            <td colspan="4"><?php echo $date ?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lbl_void_delete_by;?></th>
                            <th><?php echo $lbl_void_reason;?></th>
                            <th><?php echo $lbl_void_item_name;?></th>
                            <th><?php echo $lbl_void_qty;?></th>
                        </tr>
                        <?php
                            $count_invoice=0;
                            if($record_invoice_no!=""){
                            
                            foreach($record_invoice_no as $rin){
                            $count_invoice++;
                            $detail_item=$this->Base_model->get_data_by("SELECT item_detail_name,sale_detail_qty FROM v_void_item WHERE sale_detail_sale_master_id=".$rin->sale_master_id);
                        ?>
                        <tr>
                            <td colspan="4" style="text-align: left;color:#000080;background-color:#b8ccea">#<?php echo $rin->invoice_no; ?></td>
                        </tr>
                        <tr>
                            <td>                        
                                    <label style="font-weight: bold;"><?php echo $rin->employee_name ?></label><br>
                            </td>
                            <td>                       
                                    <label style="color:#C6080D;font-weight: bold;"><?php echo $rin->sale_master_void_status ?></label><br>
                            </td>
                            <td>
                                <?php
                                    //$item_name=$this->Base_model->get_data_by("SELECT item_detail_name FROM v_void_item WHERE sale_detail_sale_master_id=".$rin->sale_master_id);
                                    if($detail_item!=""){
                                    foreach($detail_item as $in){
                                ?>                              
                                    <label style="color:#000080;font-weight: bold;"><?php echo $in->item_detail_name ?></label><br>
                                <?php
                                    }
                                  }
                                ?>
                            </td>
                            <td>
                                <?php
                                    //$item_qty=$this->Base_model->get_data_by("SELECT sale_detail_qty FROM v_void_item WHERE sale_detail_sale_master_id=".$rin->sale_master_id);
                                    if($detail_item!=""){
                                    foreach($detail_item as $iq){
                                ?>                              
                                    <label style="color:#FF6400;font-weight: bold;"><?php echo $iq->sale_detail_qty ?></label><br>
                                <?php
                                    }
                                  }
                                ?>
                            </td>
                            
                        </tr>
                        <?php
                            }
                          }
                        ?>
                        <tr>
                            <td colspan="4"><label style="font-weight: bold"><?php echo $count_invoice."".$lbl_void_invoice; ?></label></td>
                        </tr>
                    </table>
    </body>
</html>
