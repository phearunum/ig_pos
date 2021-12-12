
        <table style="width:100%;" class="table-table">
                        <tr class="form-title">
                            <td colspan="6"><?php echo $date ?></td>
                            
                        </tr>
                        <tr class="hidden">
                            <td colspan="6"><?php echo $date_from ?></td>
                            <td colspan="6"><?php echo $date_to ?></td>
                        </tr>
                        <tr>
                            <th><?php echo $lbl_no; ?></th>
                            <th><?php echo $lbl_summary_cashier; ?></th>
                            <th><?php echo $lbl_summary_inv_no; ?></th>
                            <th><?php echo $lbl_summary_subtotal; ?>($)</th>
                            <th><?php echo $lbl_summary_total_dis; ?></th>
                            <th><?php echo $lbl_summary_grand_total; ?></th>
                        </tr>
                    <?php
                        $no=1;
                        $grand_total=0;
                        $grand_count=0;
                        $grand_sub_total=0;
                        $grand_total_discount=0;
                        $query='';
                        if($date_from!='' && $date_to!=''){$query=" AND DATE_FORMAT(end_date,'%Y-%m-%d')>='".$date_from."' AND DATE_FORMAT(end_date,'%Y-%m-%d')<='".$date_to."' ";};
                        if($invoice_table!=""){
                            
                        foreach($invoice_table as $it){   
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $it->cashier; ?></td>
                            <td>
                                <?php
                                    $invoice_no=$this->Base_model->get_data_by("SELECT invoice_no FROM invoice_finished WHERE  master_status IN ('PAID', 'CREDIT','HIDDEN') and detail_status IN ('PAID', 'CREDIT','HIDDEN') and sale_master_cashier=".$it->sale_master_cashier.$query."  group by invoice_no desc");
                                    
                                    foreach($invoice_no as $in){
                                ?>
                                    <label><?php echo $in->invoice_no ?></label><br>
                                <?php
                                   }
                                ?>
                            </td>
                            <td>
                            <?php
                                $grand_total_records=$this->Base_model->get_data_by("SELECT sum(sub_total) as sub_total FROM invoice_finished WHERE master_status IN ('PAID', 'CREDIT','HIDDEN') and detail_status IN ('PAID', 'CREDIT','HIDDEN') and sale_master_cashier=".$it->sale_master_cashier.$query." group by invoice_no desc");
                                $sub_total_by_cashier=0;
                            
                                foreach($grand_total_records as $grs){
                                $sub_total_by_cashier+=$grs->sub_total;
                                
                            ?>
                                
                                <label><?php echo number_format($grs->sub_total,2) ?></label><br>
                            <?php  
                              }
                            ?>
                            </td>
                            <td>
                            <?php
                                $grand_total_recordes=$this->Base_model->get_data_by("SELECT sum(total_discount_dollar) as total_discount_dollar FROM invoice_finished WHERE master_status IN ('PAID', 'CREDIT', 'HIDDEN') and detail_status IN ('PAID', 'CREDIT','HIDDEN') and sale_master_cashier=".$it->sale_master_cashier.$query." group by invoice_no desc");
                                $total_discount=0;
                              
                                foreach($grand_total_recordes as $gres){
                                $total_discount+=$gres->total_discount_dollar;
                               
                            ?>
                                
                                <label><?php echo number_format($gres->total_discount_dollar,2) ?></label><br>
                            <?php  
                              }
                            ?>
                            </td>
                            <td>
                            <?php
                                $grand_total_record=$this->Base_model->get_data_by("SELECT sum(grand_total) as grand_total FROM invoice_finished WHERE master_status IN ('PAID', 'CREDIT','HIDDEN') and detail_status IN ('PAID', 'CREDIT','HIDDEN') and sale_master_cashier=".$it->sale_master_cashier.$query." group by invoice_no desc");
                                $sub_total=0;
                                $count_invoice=0;
                                foreach($grand_total_record as $gr){
                                $sub_total+=$gr->grand_total;
                                $count_invoice++;
                            ?>
                                <label><?php echo number_format($gr->grand_total,2) ?></label><br>
                            <?php  
                              }
                            ?>
                            </td>
                        </tr>
                        <tr class="total">
                            <td colspan="2"></td>
                            <td><?php echo $count_invoice ?></td>
                            <td><?php echo number_format($sub_total_by_cashier,2) ?></td>
                            <td><?php echo number_format($total_discount,2) ?></td>
                            <td><?php echo number_format($sub_total,2) ?></td>
                           
                        </tr>
                    <?php
                                $grand_total+=$sub_total;
                                $grand_count+=$count_invoice;
                                $grand_sub_total += $sub_total_by_cashier;
                                $grand_total_discount += $total_discount;
                                $no++;
                            }
                        }
                    ?>
                    <tr class="grand_total">
                        <td colspan="2" style="text-align: right"><?php echo $lbl_summary_grand_total; ?></td>
                        <td><label label style="color:#cc0000;font-weight: bold"><?php echo $grand_count ?></label></td>
                        <td><label><?php echo number_format($grand_sub_total,2); ?></label></td>
                        <td><label><?php echo number_format($grand_total_discount,2); ?></label></td>
                        <td><label label style="color:#cc0000;font-weight: bold"><?php echo number_format($grand_total,2) ?></label></td>
                    </tr>
        </table>
    
