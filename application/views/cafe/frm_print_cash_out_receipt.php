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
    <style>
        .receipt-size{
            width :302.4px;
            height: auto;
        }
        .td-lable{
           font-weight: bold;  
           font-size:10px;
        }
        .th-invoice{
           background-color: #19274C;
           color: white;
        }
        .td-bodies{
            text-align: center;
            font-size: 12px;
        }
    </style>
    <body>
        <table class="receipt-size">
            <?php 
                $cash_register = $this->Base_model->loadToListJoin("select *,DATE_FORMAT(cash_startdate,'%d-%c-%Y %h:%i:%s %p') AS start_date ,DATE_FORMAT(cash_enddate,'%d-%c-%Y %h:%i:%s %p') AS end_date  from v_cash_register where cash_id = ".$this->session->userdata("cash_id")." ");
                $invoice_by_type = $this->Base_model->loadToListJoin("select exchange_rate,sum(grand_total)as grand_total_sale from v_invoice_by_type where cash_id = ".$this->session->userdata("cash_id")."");
                foreach($cash_register as $i){
            ?>
            <tr>
                <td style="width:50px"> Cashier </td>
                <td style="width:50px"><label class="td-lable">: <?php echo $i->user_name?></label></td>
            </tr>
            <tr>
                <td> Start </td>
                <td><label class="td-lable">: <?php echo $i->start_date?></label></td>
            </tr>
            <tr>
                <td> Stop </td>
                <td><label class="td-lable">: <?php echo $i->end_date?></label></td>
            </tr>
            <tr>
                <td> Paid </td>
                <td><label class="td-lable">: <?php echo $i->paid_invoice?></label></td>
            </tr>
            <tr>
                <td> Void </td>
                <td><label class="td-lable">: <?php echo $i->void_invoice?></label></td>
            </tr>
            <tr>
                <td> Total </td>
                <td><label class="td-lable">: <?php echo $i->total_invoice?></label></td>
            </tr>
            <tr>
                <td> Start Amount </td>
                <td><label class="td-lable">: $ <?php echo $i->cash_amount?> & <?php echo number_format($i->cash_amount_kh,0)?> ៛</label></td>
                
            </tr>
            <tr>
                <?php foreach($invoice_by_type as $t){?>
                <td> Total Sale </td>
                <td><label class="td-lable">: $ <?php echo number_format($t->grand_total_sale,2)?></label></td>
                <?php }?>
            </tr>
            <tr>
                <td> Total Amount </td>
                <td><label class="td-lable">: $ <?php echo number_format($i->cash_amount + $t->grand_total_sale + ($i->cash_amount_kh/$t->exchange_rate),2)?></label></td>
            </tr>
            <?php }?>
        </table>
        <table class="receipt-size" style="font-size: 12px;">
            <thead>
                <tr class="th-invoice">
                    <th><?php echo "DESCRIPTION"?></th>
                    <th><?php echo "QTY"?></th>
                    <th><?php echo "Total"?></th>
                </tr>
            </thead>    
                <?php 
                    $item = $this->Base_model->loadToListJoin("select *,sum(qty)as total_qty from v_invoice_by_type where cash_id = ".$this->session->userdata("cash_id")." GROUP BY sub_item_name");
                    foreach($item as $it){
                ?>
                
                <tr>       
                    <td class="" style="text-align: left;"><?php echo $it->sub_item_name?></td>
                    <td class="td-bodies"><?php echo $it->total_qty?></td>
                    <td class="" style="text-align: right">$ <?php echo number_format($it->grand_total * $it->total_qty,2)?></td>
                </tr>  
                <?php }?>
                <tr>
                    <td colspan="2" class="td-bodies" style="text-align:left;border-top: 1px solid;">
                        <label class="td-lable"><?php echo "Grand Total :"?></label>
                    </td>
                    <td colspan="2" class="td-lable" style="text-align:right;border-top: 1px solid;">$ <?php echo number_format($t->grand_total_sale,2)?></td>
                </tr>
        </table>
    </body>
    <script type="text/javascript">
        window.print();
        setTimeout(function () {
            window.open("<?php echo site_url("table_order")?>","_self");
        }, 1000);
    </script>
</html>
