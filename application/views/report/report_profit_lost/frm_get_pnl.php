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
        <style>
            .inner-data{
                padding-left: 10px;
            }
            .inner-data-2x{
                padding-left: 40px;
            }
            .inner-data-1x{
                padding-left: 20px;
            }
            .left{
                text-align: left !important;
            }
            .center{
                text-align: center !important;
            }
            .red{
                color:#C0392B !important;
            }
            .border-top{
                border-top:1px solid #13224B !important;
            }
            .border-bottom{
                border-bottom:1px solid #13224B !important;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>
                    <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="export"/>
                </td>
            </tr>
        </table>
        <table width="70%" cellspacing="0" id="table2excel" style="color: #000000" cellpadding="0">

            <?php
            $company_profile_name = $this->Base_model->get_value_byQuery("select company_profile_name from company_profile where company_profile_branch_id='" . $this->session->userdata("branch_id") . "'", 'company_profile_name');
            ?>
            <tr>               
                <td class="center" colspan="3"><h3><b><?php echo $company_profile_name ?></b></h3><h4><b>Income Statement</b></h4></td>
            </tr>
            <tr>
                <td class="text-center">
                    <label style="font-weight: bold;color: #C0392B"><?php echo $year ?></label>
                </td>
            </tr>
            <tr clas="border-bottom border-top">
                <td class="left border-bottom border-top">Revenue</td>  
            </tr>
            <tr>
                <td>
                    <table style="width: 100%;">
                        <tr>  
                            <td class="inner-data-1x">40000-Gross Sale (In/Ex VAT)</td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class="text-right"><?php echo '$ ' . number_format($sale_total, 2) ?></td>
                         </tr>   
                         <?php
                            $hidden = 'hidden';
                            if ($vat_total > 0) {
                                $hidden = '';
                            }
                        ?>
                         <tr>  
                            <td class="inner-data-1x <?php echo $hidden ?>">VAT</td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class="text-right"><?php echo '$ ' . number_format($vat_total, 2) ?></td>
                         </tr>  
                        
                        <tr>
                            <td class="inner-data-1x">Less</td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                        </tr>
                       

                        <?php
                        $hidden = 'hidden';
                        if ($total_discount > 0) {
                            $hidden = '';
                        }
                        ?>
                        <tr class="<?php echo $hidden ?>">
                            <td class="inner-data-2x">Discount</td>
                            <td class=""></td>
                            <td class="text-right"><?php echo '$ ' . number_format($total_discount, 2) ?></td>
                            <td class=""></td>
                        </tr>
                        
                        <?php
                        $hidden = 'hidden';
                        if ($charge_total > 0) {
                            $hidden = '';
                        }
                        ?>
                        <tr class="<?php echo $hidden ?>">
                            <td class="inner-data-2x">CHARGE</td>
                            <td class=""></td>
                            <td class="text-right"><?php echo '$ ' . number_format($charge_total, 2) ?></td>
                            <td class=""></td>
                        </tr>
                        <?php
                        $hidden = 'hidden';
                        if ($sale_return > 0) {
                            $hidden = '';
                        }
                        ?>
                        <tr class="<?php echo $hidden ?>">
                            <td class="inner-data-2x">Sale Return</td>
                            <td class=""></td>
                            <td class="text-right"><?php echo '$ ' . number_format($sale_return, 2) ?></td>
                            <td class=""></td>
                        </tr>
                        <tr class="hidden">
                            <td class="inner-data">Grand Total</td>
                            <td class="text-right inner-data"><?php echo '$ ' . number_format($sale_total - $total_discount + $vat_total - $sale_return, 2) ?></td>
                        </tr>
                        <tr class="hidden">
                            <td>Paid</td>
                            <td class="text-right"><?php echo '$ ' . number_format($pay_total, 2) ?></td>
                        </tr>
                        <tr class="hidden">
                            <td>Credit Paid</td>
                            <td class="text-right"><?php echo '$ ' . number_format($credit_paid, 2) ?></td>
                        </tr>
                        <tr class="hidden">
                            <td>Sales Return</td>
                            <td class="text-right"><?php echo '$ ' . number_format($sale_return, 2) ?></td>
                        </tr>
                        <tr class="field_total hidden">
                            <td>Total Sale</td>
                            <td class="text-right"><?php echo '$ ' . number_format($sale_total - $total_discount + $vat_total - $sale_return, 2)//number_format($pay_total+$credit_paid, 2);       ?></td>
                        </tr>
                        <tr class="">
                            <td class="inner-data-1x  border-bottom border-top">Net Sales</td>
                            <td class="border-bottom border-top"></td>
                            <td class="border-bottom border-top"></td>
<!--                            <td class="text-right red border-bottom border-top"><?php // echo '$ ' . number_format($sale_total - $total_discount - $sale_return, 2)//number_format($pay_total+$credit_paid, 2);       ?></td>-->
                            <td class="text-right red border-bottom border-top"><?php echo '$ ' . number_format(($sale_total - $total_discount)+$vat_total+$charge_total, 2)//number_format($pay_total+$credit_paid, 2);       ?></td>
                        </tr>
                        <tr class="">
                            <td colspan="4" class="left border-bottom border-top">Cost Of Goods Sold</td>
                        </tr>
                        <tr class="">
                            <td class="inner-data-1x">50000-Cost Of Goods Sold</td>
                            <td class=""></td>
                            <td class="text-right">
                                <?php echo '$ ' . number_format($cogs, 2); ?>
                            </td>
                            <td class=""></td>
                        </tr>
                        <tr class="">
                            <td class="border-top border-bottom">Total Cost Of Goods Sold</td>
                            <td class="border-bottom border-top"></td>
                            <td class="border-bottom border-top"></td>
                            <td class="text-right border-top border-bottom">
                                <?php echo '$ ' . number_format($cogs, 2); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class='border-bottom border-top left'>Expense</td> 
                        </tr>
                        <?php
                        $total_expense = 0;
                        foreach ($record_expense as $re) {
                            ?>
                            <tr>
                                <td class="inner-data-1x"><?php echo $re->expense_type_name; ?></td>
                                <td class=""></td>
                                <td class=""></td>
                                <td class=""></td>
                            </tr>
                            <?php
                            $total_expense +=$re->total_amount;
                            foreach ($record_expense_detail as $red) {
                                if ($red->expense_type_id == $re->expense_type_id) {
                                    ?>
                                    <tr>
                                        <td class="inner-data-2x"><?php echo $red->expense_chart_number . '-' . $red->expense_detail_name; ?></td>
                                        <td class="text-right"><?php echo '$ ' . number_format($red->expense_amount, 2); ?></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <tr>
                                <td class="inner-data-2x border-bottom border-top"><?php echo 'Total '.$re->expense_type_name; ?></td>
                                <td class="border-bottom border-top"></td>
                                <td class="text-right border-bottom border-top"><?php echo '$ ' . number_format($re->total_amount, 2); ?></td>
                                <td class="border-bottom border-top"></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr class="">
                            <td class="border-bottom border-top">Total Expense</td>
                            <td class="border-bottom border-top"></td>
                            <td class="border-bottom border-top"></td>
                            <td class="text-right border-bottom border-top"><?php echo '$ ' . number_format($total_expense, 2); ?></td>
                        </tr>
                        <tr>
                            <td class="border-top border-bottom">Net Income</td>
                            <td class="border-bottom border-top"></td>
                            <td class="border-bottom border-top"></td>
                            <!--<td class="text-right border-bottom border-top"><?php // echo '$ ' . number_format($sale_total - $total_discount - $sale_return - $cogs - $total_expense, 2); ?></td>--> 
                            <td class="text-right border-bottom border-top"><?php echo '$ ' . number_format((($sale_total - $total_discount)+$vat_total+$charge_total)  - $cogs - $total_expense, 2); ?></td> 
                        </tr>
                    </table>
                </td>  
            </tr>


            <tr>
                <td>
                    <table style="width: 100%;">

                    </table>
                </td>
            </tr>
            <tr class="field_total">
                <td class="border-top">
                    <table style="width: 100%;">  

                    </table>
                </td>
            </tr>
        </table> 
    </body>
</html>
