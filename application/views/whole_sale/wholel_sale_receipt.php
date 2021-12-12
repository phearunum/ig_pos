<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
        <head>
            <meta charset="UTF-8">
            <title>RECEIPT</title>
            
        </head>
    <body>
        <table width="320px" cellspacing="0" cellpadding="0" class="invoice_grid" style="font-family: Arial;">
           <?php
                foreach($company as $c){
           ?>
            <tr>
                <td style='text-align: center;'>
                    <img id="blah" src="<?php echo base_url('img/company/'.$c->company_profile_image); ?>" alt="your image" width="200" height="150" />
                </td>
            </tr>
                <tr>
                    <td style="font-size:18px;font-weight: bold;vertical-align: middle;text-align:center;">
                    <?php echo $c->company_profile_name ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;font-size:12px;padding-top: 15px;">Address: <?php echo $c->company_profile_address; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;font-size:12px;padding-top: 5px;">Tel: <?php echo $c->company_profile_phone; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;font-size:12px;padding-top: 5px;">Email: <?php echo $c->company_profile_email; ?></td>
                </tr>
                <?php } ?>

               <?php
                    foreach($record_info as $r){
               ?>
                <tr>
                    <td style="padding-top: 5px; font-size:12px;"><b>
                            Invoice Nº :<?php echo str_pad($r->sale_master_invoice_no, 5, '0', STR_PAD_LEFT); ?>
                    </b></td>
                </tr>
                <tr>
                    <td style="padding-top: 5px; font-size:12px;"><b>
                            Date :<?php echo $r->sale_master_sell_date; ?>
                    </b></td>
                </tr>
                <tr>
                    <td style="padding-top: 5px; font-size:12px;"><b>Cashier : <?php echo $r ->recorder; ?></b></td>
                </tr>
            <?php
                }            
            ?>
            <tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0" style="font-size:12px;padding-top: 5px;">
                        <tr style="height: 30px;background-color:#000000;color:#FFFFFF;border:solid #000000 1px;">
                                                    <th>No</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>QTY</th>
                                                    <th>PRICE($)</th>
                                                    <th>DIS</th>
                                                    <th>TOTAL</th>
                                                </tr>       
                                          <?php
                                        $no=1;
                                        foreach($getlist as $r){    
                                        ?>
                                                <tr>
                                                    <td style='padding-left: 3px;'><?php echo $no ?></td>
                                                    <td style="font-family: Khmer OS Battambang;text-align: left;padding-left: 3px;"><?php echo $r->item_detail_name ?></td>
                                                    <td style='text-align:center;'><?php echo $r->sale_detail_qty ?></td>
                                                    <td style='text-align:center;'><?php echo number_format($r->sale_detail_unit_price,2) ?></td>
                                                    <td>
                                                        <?php
                                                        
                                                            if($r->sale_detail_discount_dollar==0){
                                                                echo $r->sale_detail_discount_percent."%";
                                                            }else{
                                                                echo $r->sale_detail_discount_dollar."$";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td style='text-align:right;padding-right: 3px;'>
                                                        <?php 
                                                            echo number_format($r->total,2);
                                                         ?>
                                                    </td> 
                                                </tr>
                                        <?php 
                                            $no=$no+1;
                                            } 
                                        ?>
                    </table>            
                </td>
            </tr>
            <?php
                    $totalr=$this->Base_model->loadToListJoin('SELECT rate_amount FROM rate');
                    foreach($totalr as $tr){
            ?>
            <?php
                foreach($total as $t){
            ?>
            <tr>
                <td>
                    <table style="text-align:right;border-style: solid;border-width: 1px;border-left:none;border-right:none;border-bottom:none;border-color: #000000;font-weight: bold;font-size:11px;" width="100%">
                        <tr>
                            <td>TOTAL(៛)</td><td><?php echo number_format(($t->subtotal)*$tr->rate_amount,2) ?></td>
                            <td>TOTAL($) :</td><td><?php echo number_format(($t->subtotal),2) ?></td>
                        </tr>
                        <tr>
                            <td>Vat(<?php echo $t->sale_master_tax ?>%) :</td><td><?php echo ($t->grandtotal*$t->sale_master_tax/100)*$tr->rate_amount ?>៛</td>
                            <td>Vat(<?php echo $t->sale_master_tax ?>%) :</td><td><?php echo $t->grandtotal*$t->sale_master_tax/100 ?>$</td>
                        </tr>
                        <tr><td colspan="4" style="border-top:solid #000000 1px;"></td></tr>
                        <tr>
                            <td>G TOTAL(៛) :</td><td> <?php echo number_format(($t->grandtotal+($t->grandtotal*$t->sale_master_tax/100))*$tr->rate_amount) ?></td>
                            <td>G TOTAL($) :</td><td> <?php echo number_format($t->grandtotal+($t->grandtotal*$t->sale_master_tax/100),2) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php
                }  
            }
            ?>
             <tr>
                <td style="border-style: solid;border-width: 1px;border-left:none;border-right:none;border-bottom:none;height: 40px;text-align:center;font-size:12px;">Copyright©2016 HighPoint | Auto-ID <br/> www.highpoint.com.kh</td>
            </tr>
        </table>
    </body>
</html>
