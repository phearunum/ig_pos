<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title> 
        <style>
            .txt-noborder{
                border:none;
            }
            .text-center{
                text-align: center;
            }
            .table-table th{
                border-top:solid #000 1px;
                border-right:solid #000 1px;
                border-left:solid #000 1px;
            }
            .table-table td{
                border-top:solid #000 1px;
                border-right:solid #000 1px;
                border-left:solid #000 1px;
            }
            .table-table{
                border:solid #000 1px;
            }
        </style>
        <script type="text/javascript">
		window.print();
		setTimeout(function(){
			window.open("<?php echo site_url('report_sale_statement'); ?>","_self");
		}, 1000);
        </script>
    </head>
    <body>
        <table width='100%' cellspacing='0' cellpadding='0' style='font-family: Calibri;font-size: 12px;'>
            <tr>
                <td>
                    <?php
                        foreach($record_company_profile as $rec){
                    ?>
                    <table cellspacing='0' cellpadding='0' width='100%' class='text-center' style='font-weight: bold;'>
                        <tr><td><?php echo $rec->company_profile_name ?></td></tr>
                        <tr><td><?php echo $rec->company_profile_address ?></td></tr>
                        <tr><td><?php echo $rec->company_profile_phone ?></td></tr>
                        <tr><td style='text-align: left'><img src='<?php echo base_url('img/company/'.$rec->company_profile_image); ?>' width='70px'></td></tr>
                    </table>
                    <?php
                      }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                   <table cellpadding='0' cellspacing='0' width='100%'>
                       <tr>
                           <td>
                               <table style='border:solid #000 1px;'>
                                    <tr>
                                        <td>Customer Name : </td>
                                        <td><input type='text' name="txt_invoice_no" id='txt_invoice_no' value="<?php echo $customer_name ?>" class='txt-noborder'></td>
                                    </tr>
                                    <tr>
                                        <td>From Date : </td>
                                        <td><input type='text' name="txt_from_date" id='txt_from_date' class='txt-noborder' value="<?php echo $from_date ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>To Date : </td>
                                        <td><input type='text' name="txt_to_date" id='txt_to_date' class='txt-noborder' value="<?php echo $to_date ?>"></td>
                                    </tr>
                               </table>
                           </td>
                           <td>
                               <table width='100%'>
                                   <tr>
                                        <td style='text-align: right;'>Invoice No:<input type='text' name="txt_to_date" id='txt_to_date' class='txt-noborder' value="<?php echo str_pad($statement_no, 5, '0', STR_PAD_LEFT); ?>"></td>
                                   </tr>
                                   <tr>
                                        <td style='text-align: right;'>Invoice Date:<input type='text' name="txt_to_date" id='txt_to_date' class='txt-noborder' value="<?php echo $invoice_date ?>"></td>
                                   </tr>
                               </table>
                           </td>
                       </tr>
                   </table>
                </td>
            </tr>
            <tr>
                <td class='text-center' style='font-weight: bold;font-size: 14px;text-decoration: underline'>Statement</td>
            </tr>
            <tr>
                <td>
                    <table cellspacing='0' cellpadding='0' width='100%' class='table-table'>
                        <tr style='background-color: #cccccc;height: 30px'>                            
                            <th>Nº</th>
                            <th>Date</th>
                            <th>Plate No</th> 
                            <th>Ref No</th>                   
                            <th>Type Oil</th>
                            <th>Qty(L)</th>
                            <th>Unit Price($)</th>
                            <th>Discount($)</th>
                            <th>Total($)</th>
                        </tr>
                            <?php
                                $no=1;
                                $total=0;
                                $discount=0;
                                $liter=0;
                                foreach($record_sale_statement as $ct){
                            ?>
                            <tr>
                                <td class='text-center'><?php echo $no; ?></td>
                                <td class='text-center'><?php echo $ct->sale_detail_created_date; ?></td>
                                <td><?php echo $ct->sale_detail_plate_no; ?></td>
                                <td><?php echo $ct->sale_detail_invoice_no; ?></td>
                                <td><?php echo $ct->sale_detail_item_type; ?></td>                    
                                <td><?php echo $ct->sale_detail_qty; ?></td>
                                <td><?php echo $ct->sale_detail_unit_price; ?></td>
                                <td class='text-center'><?php echo number_format($ct->sale_detail_total_discount_dollar,2); ?></td>
                                <td><?php echo $ct->sale_detail_qty * $ct->sale_detail_unit_price; ?></td>
                            </tr>
                            <?php
                                    $no=$no+1;
                                    $total +=  $ct->sale_detail_qty * $ct->sale_detail_unit_price;;
                                    $discount += $ct->sale_detail_total_discount_dollar;
                                    $liter +=  $ct->sale_detail_qty;
                                }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style='text-align: right'>Total litter Diesel(L) : </td>
                                <td style='font-weight: bold;'><?php echo number_format($liter,2); ?></td>
                                <td></td>
                                <td class="text-center">-</td>
                                <td><?php echo number_format($total,2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="7" style='border-left: none;border-bottom: none'></td>
                                <td>Discount($)</td>
                                <td style='font-weight: bold;'><?php echo number_format($discount,2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="7" style='border-left: none;border-top: none;border-bottom: none'></td>
                                <td>Total Amount($)</td>
                                <td style='font-weight: bold'><?php echo number_format($total - $discount,2); ?></td>
                            </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table cellspacing='0' cellpadding='0' style='text-align: center' width='40%' align='center'>
                        <tr>
                            <td>Receive by</td><td>Issued by</td>
                        </tr>
                        <tr>
                            <td><hr style='width:100px;margin-top: 30px;border:solid #000 1px'></td><td><hr style='width:100px;margin-top: 30px;border:solid #000 1px'></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
