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
            $company_profile_name = $this->Base_model->get_value_byQuery("select company_profile_name from company_profile limit 1", 'company_profile_name');
            ?>
            <tr>               
                <td class="center" colspan="3"><h3><b><?php echo $company_profile_name ?></b></h3><h4><b>Monthly Expense</b></h4></td>
            </tr>
            <tr>
                <td class="text-center">
                    <label style="font-weight: bold;color: #C0392B"><?php echo $year ?></label>
                </td>
            </tr>
            
            <tr>
                <td>
                    <table style="width: 100%;">
                         
                        <tr>
                            <td colspan="4" class='border-bottom border-top left'>Expense</td> 
                        </tr>
                        <?php
                        $total_expense = 0;
                        foreach ($record_expense as $re) {
                            $branch_temp=$re->branch_name;
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
                                    if($red->branch_name==$branch_temp){
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
