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
        <script type="text/javascript">
            function search(str){
                
                var date_from=$("#datefrom").val();
                var date_to=$("#dateto").val();
                var cashier=$("#cbo_cashier").val();
                
                
               if (str == "") {
                    document.getElementById("panel_report").innerHTML = "";
                    
                    return;
                } else { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById("panel_report").innerHTML = xmlhttp.responseText;
                        }
                    }
                    
                    xmlhttp.open("POST","report_order_by_table/search/"+date_from+"/"+date_to+"/"+cashier,true);
                    xmlhttp.send();
                }
            }
        </script>
        <script>
            function myfunction(){
                $(function() {
                    $(".table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "<?php echo $title ?>",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true
                    });
                });
            }
        </script>
    </head>
    <body>
        <table class="table-form" style="width: 100%">
            <tr class="field-title">
                <td>
                    <?php echo $btn_from?>:<input type="text" name="datefrom" id="datefrom" class="txt_date" value="<?php echo date('Y-m-d') ?>" placeholder="yyyy/mm/dd"/>                     
                    <?php echo $btn_to?>:<input type="text" name="dateto" id="dateto" class="txt_date" value="<?php echo date('Y-m-d') ?>" placeholder="yyyy/mm/dd"/>
                    <?php echo $lbl_saler?>:
                    <select name="cbo_cashier" id="cbo_cashier" class="cbo-srieng">                        
                        <option value="0"><?php echo $lbl_select_saler?></option>
                        <?php
                        foreach ($record_cashier as $rc)
                             {
                        ?>
                         <option value="<?php echo $rc->employee_id; ?>"><?php echo $rc->employee_name; ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" name="btn_search" id="btn_search" value="<?php echo $btn_search?>" class="btn-srieng" onclick="search()">
                </td>
            </tr>
            <tr class="form-title">
                <td><?php echo $lbl_title?><!--<?php echo $title ?>--></td>
            </tr>
            <tr>
                <td id="panel_report">
                    <table style="width:80%;" align="center" class="table-table">
                        <tr class="form-title">
                            <td colspan="4"><?php echo $date ?></td>
                        </tr>
                        <tr>
                            <th><?php echo $btn_no?></th>
                            <th><?php echo $lbl_emp_name?></th>
                            <th><label><?php echo $lbl_table_name?></label><label style="margin-left: 50px;"><?php echo $lbl_invoice_qty?></label><label style="margin-left: 90px;"><?php echo $lbl_total?>($)</label></th>
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
                                    $record_table=$this->Base_model->get_data_by("select layout_name,layout_id from v_order_by_table where layout_manage_by=".$re->layout_manage_by." AND DATE_FORMAT(end_date,'%Y-%m-%d')=CURDATE() group by layout_name");
                                    if($record_table!=""){
                                    foreach($record_table as $rt){
                                ?>
                                        <label><?php echo $rt->layout_name ?></label>
                                <?php
                                    
                                    $record_invoice=$this->Base_model->get_data_by("select count(invoice_no) as invoice_count,sum(grand_total) as grand_total from v_order_by_table_summary where table_id=".$rt->layout_id." AND DATE_FORMAT(end_date,'%Y-%m-%d')=CURDATE()");
                                    foreach($record_invoice as $ri){
                                        $total+=$ri->grand_total;
                                ?>
                                        <label style="color:#a10000;margin-left: 100px;">(<?php echo $ri->invoice_count ?>)</label>
                                        <label style="color:#000080;margin-left: 100px;font-weight: bold"><?php echo number_format($ri->grand_total,2) ?></label><br>
                               <?php 
                                  }
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
                </td>
            </tr>
        </table>
        <script>
            $.noConflict();
            jQuery( document ).ready(function( $ ) {
                $("#datefrom").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#dateto").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            });
        </script>
    </body>
</html>
