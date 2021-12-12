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
        <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>
		<script src="<?php echo base_url("js/barcodeJS/JsBarcode.all.min.js");?>"></script>
    </head>
    <style>
        .receipt-size{
            width :302.4px;
            height: auto;
        }
        .td-lable{
           font-weight: bold;  
           font-size:10px;
        }
        .logo{
            width: 150px;
            height: 150px;
        }
        .td-header{
            text-align: center;
        }
        .td-bodies{
            text-align: center;
            font-size: 12px;
        }
        .th-invoice{
            background-color: #19274C;
            color: white;
          //  padding: 5px;
          
        }
        .tr-footer{
           
        }
        
        .td-footer{
            font-size: 12px;
            font-weight: bolder;
            text-align: right;
        }
        .hidden{
            display: none;
        }
    </style>
    <body>
        <table class="receipt-size">
            <tr>
                <?php 
                $company = $this->Base_model->select("select * from company_profile limit 1", array());
                $information = $this->Base_model->loadToListJoin("select *,DATE_FORMAT(start_date_time,'%d-%b-%Y') AS start_date,DATE_FORMAT(start_date_time,'%h:%i:%s:%p')AS start_time,DATE_FORMAT(end_date_time,'%h:%i:%s:%p')AS end_time,DATE_FORMAT(end_date_time,'%d-%b-%Y')AS end_date,format(sub_total,2)AS total_amount from v_invoice_note where master_id = '$invoice_no' group by master_id");
                foreach($company as $c){?>
                <td class="td-header">
                    <img class="logo <?php if($c->company_profile_image !=''){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>" src="<?php echo base_url("img/company/$c->company_profile_image") ?>"><br>
                    <label class="td-lable <?php if($c->company_profile_name !=''){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>"><?php echo $c->company_profile_name?></label><br>
                    <label class="td-lable <?php if($c->company_profile_phone !=''){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>">Tel : <?php echo $c->company_profile_phone?></label><br>
                    <label class="td-lable <?php if($c->company_profile_email !=''){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>"><?php echo $c->company_profile_email?></label><br>
                    <label class="td-lable <?php if($c->company_profile_address !=''){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>"><?php echo $c->company_profile_address?></label>
                </td>
                <?php }?>
            </tr>
            <tr>
                <td>
                    <table class="receipt-size" style="width:355px">
                        <tr>
                            <?php foreach($information as $info) {?>
                            <td>
                                <label class="td-lable">#<?php echo $info->invoice_no?></label><br>
                                <label class="td-lable">In :<?php echo $info->start_time?></label><br>
                                <label class="td-lable">Cashier :<?php echo $info->cashier?></label>
                            </td>
                            <td style="text-align: right">
                                <label class="td-lable"><?php echo $info->end_date?></label><br>
                                <label class="td-lable">Out :<?php echo $info->end_time?></label><br>
                                <label class="td-lable">Table :<?php echo $info->table_name?></label>
                            </td>
                            <?php }?>
                        </tr>
                    </table>
                </td>
                
                
            </tr>
            <tr>
                <td style="padding-top:5px;text-align: center;">
                    <label style="font-weight: bold;font-size:13px"><?php echo "INVOICE"?></label>
                </td>
            </tr>
            
            <tr>
                <td>
                    <table class="receipt-size" style="font-size: 12px;">
                        <thead>
                            <tr class="th-invoice">
                                <th><?php echo "DESCRIPTION"?></th>
                                <th><?php echo "QTY"?></th>
                                <th><?php echo "PRICE"?></th>
                                <th><?php echo "DIS%"?></th>
                                <th><?php echo "DIS$"?></th>
                                <th><?php echo "AMOUNT"?></th>
                            </tr>

                        </thead> 
                            <?php
                                $item_detail = $this->Base_model->loadToListJoin("select *,DATE_FORMAT(start_date_time,'%d-%m-%Y') AS start_date,DATE_FORMAT(start_date_time,'%h:%i:%s:%p')AS start_time,DATE_FORMAT(end_date_time,'%h:%i:%s:%p')AS end_time,DATE_FORMAT(end_date_time,'%d-%m-%Y')AS end_date,format(sub_total,2)AS total_amount from v_invoice_note where master_id = $invoice_no");
                                foreach($item_detail as $id){
                                    $dis = $id->invoice_discount_percent;
                                    $tax = $id->invoice_tax;
                                    $ser = $id->service_charge_percent;
                                ?>
                            <tr>
                                
                                <td class="td-bodies"><?php echo $id->item_name?></td>
                                <td class="td-bodies"><?php echo $id->qty?></td>
                                <td class="td-bodies"><?php echo $id->unit_price?>$</td>
                                <td class="" style="text-align: right"><?php echo $id->discount?>%</td>
                                <td class="" style="text-align: right"><?php echo $id->discount_dollar?>$</td>
                                <td class="" style="text-align: right"><?php echo $id->total_amount?>$</td>
                                
                            </tr>
                            <?php }?>
                            
                            <?php 
                                $grand_total = $this->Base_model->loadToListJoin("select 	
                                sum(format(sub_total,2)) AS grand_sub_total,
                                sum(format(invoice_discount,2)) AS total_discount,
                                sum(format(tax_amount,2)) AS total_tax_amount,
                                sum(format(service_charge_amount,2)) AS total_service_charge_amount,
                                sum(format(grand_total,2)) AS grand_total
                                from v_invoice_note where master_id = $invoice_no");
                                
                                foreach($grand_total as $gt){
                                    $return_money = (($id->pay_kh/$id->exchange_rate) + $id->member_pay + $id->card_pay + $id->pay_us) - $gt->grand_total;
                                    
                            ?>
                            
                            <tr class="<?php if($dis!=0 || $tax!=0 || $ser!=0){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>">
                                <td colspan="2" class="td-bodies" style="text-align:right;border-top: 1px solid ;">
                                    <label class="td-lable"><?php echo "Sub Total :"?></label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right;border-top: 1px solid "><?php echo number_format($gt->grand_sub_total * $id->exchange_rate,0)?> ៛</td>
                                <td colspan="2" class="td-lable" style="text-align:right;border-top: 1px solid "><?php echo number_format($gt->grand_sub_total,2)?> $</td>
                            </tr>
                            <tr class="<?php if($dis!=0){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>">
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo "Discount : "?><?php echo number_format($dis,0)?>%</label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo number_format($gt->total_discount * $id->exchange_rate,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right"><?php echo number_format($gt->total_discount,2)?> $</td>
                            </tr>
                            <tr class="<?php if($tax!=0){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>">
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo "VAT : "?><?php echo number_format($tax,0)?>%</label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo number_format($gt->total_tax_amount * $id->exchange_rate,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right"><?php echo number_format($gt->total_tax_amount,2)?> $</td>
                            </tr>
                            <tr class="<?php if($ser!=0){?><?php echo ''?><?php }else{?><?php echo 'hidden'?><?php }?>">
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo "Service Charge : "?><?php echo number_format($ser,0)?>%</label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo number_format($gt->total_service_charge_amount * $id->exchange_rate,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right"><?php echo number_format($gt->total_service_charge_amount,2)?> $</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="td-bodies" style="text-align:right;border-top: 1px solid ">
                                    <label class="td-lable"><?php echo "Total : "?></label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right;border-top: 1px solid ">
                                    <label class="td-lable"><?php echo number_format($gt->grand_total * $id->exchange_rate,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right;border-top: 1px solid "><?php echo number_format($gt->grand_total,2)?> $</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo "Cash : "?></label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo number_format($id->pay_kh,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right"><?php echo number_format($id->pay_us,2)?> $</td>
                            </tr>
                            <tr class="<?php if($id->member_pay == 0){?><?php echo 'hidden'?><?php }else{?><?php echo ''?><?php }?>">
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo "Member Card : "?></label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo number_format($id->member_pay * $id->exchange_rate,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right"><?php echo number_format($id->member_pay,2)?> $</td>
                            </tr>
                            <tr class="<?php if($id->card_pay == 0){?><?php echo 'hidden'?><?php }else{?><?php echo ''?><?php }?>">
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo "Card Payment: "?></label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo number_format($id->card_pay * $id->exchange_rate,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right"><?php echo number_format($id->card_pay,2)?> $</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="td-bodies" style="text-align:right">
                                    <label class="td-lable"><?php echo "Return : "?></label>
                                </td>
                                <td colspan="2" class="td-bodies" style="text-align:right">
									
                                    <label class="td-lable"><?php echo number_format($return_money * $id->exchange_rate,0)?> ៛</label>
                                </td>
                                <td colspan="2" class="td-lable" style="text-align:right"><?php echo number_format($return_money,2)?> $</td>
                            </tr>
                        <?php }?>  
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top:10px"><img id="barcode" style="font-weight: bold; font-size:13px"><td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top:10px"><label style="font-weight: bold; font-size:13px"><?php echo "WIFI"?> : <?php echo $c->company_profile_wifi?></label><td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top:10px"><label style="font-weight: bold; font-size:13px"><?php echo "សូមអរគុណ! សូមអញ្ជើញមកម្តងទៀត"?> </label><td>
            </tr>
            <tr>
                <td style="text-align: center;padding-top:10px"><label style="font-weight: bold; font-size:13px"><?php echo "Copyright &copy www.highpoint.com.kh"?> </label><td>
            </tr>
           
        </table>
    </body>
    <script type="text/javascript">

        function load_data(){
            var post_url = "<?php echo site_url("cashier_order/load_receipt_data")?>";
            var receipt = "<?php echo $receipt?>";
            if (!HTMLCanvasElement.prototype.toBlob) {
                Object.defineProperty(HTMLCanvasElement.prototype, 'toBlob', {
                  value: function (callback, type, quality) {
                    var canvas = this;
                    setTimeout(function() {
                      var binStr = atob( canvas.toDataURL(type, quality).split(',')[1] ),
                      len = binStr.length,
                      arr = new Uint8Array(len);

                      for (var i = 0; i < len; i++ ) {
                         arr[i] = binStr.charCodeAt(i);
                      }
                      callback( new Blob( [arr], {type: type || 'image/png'} ) );
                    });
                  }
               });
            }
              
        }
    </script>
</html>
