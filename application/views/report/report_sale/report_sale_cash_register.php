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
        <script type="text/javascript">
         function myFunction(){
            $(function() {
                alert("Export your Data ");
				$("#panel_report").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Report Sale Casher Register by Casher",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
        }
        
        
                
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
                    xmlhttp.open("POST","report_sale_cash_register/search/"+date_from+"/"+date_to+"/"+cashier,true);
                    xmlhttp.send();
                }
            }
                
     </script>
     
    </head>
    <body>  
        
        
        <table width="100%" cellspacing="0" class="table-table persist-area" id="table2excel" cellpadding="0" border="0">
            <tr class="field-title">
                <th colspan="10" style="text-align: left;">
                    From :<input type="text" name="datefrom" id="datefrom" class="txt_date" value="<?php echo date('d-m-Y') ?>" placeholder="yyyy/mm/dd"/>                     
                    To :<input type="text" name="dateto" id="dateto" class="txt_date" value="<?php echo date('d-m-Y') ?>" placeholder="yyyy/mm/dd"/>
                     Cashier :
                    <select name="cbo_cashier" id="cbo_cashier" class="cbo-srieng">                        
                        <option value="0">--Cashier Name--</option>
                        <?php
                        foreach ($cashier as $rc)
                             {
                        ?>
                         <option value="<?php echo $rc->cashier; ?>"><?php echo $rc->cashier; ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" name="btn_search" id="btn_search" value="Search" class="btn-srieng" onclick="search()">
                    <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint hidden" value="Export"/>
                    <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>
                </th>
             </tr>
             <tr>
                 <td id="panel_report">
                     <table style="width:100%;">
                        <tr>               
                                <td class="form-title" colspan="8">Report Sale Cash Register</td>                
                        </tr>  
                            <tr>               
                                <td style="text-align: center;" colspan="8">
                                    <p><?php echo $date; ?></p>
                                </td>                
                            </tr> 

                            <tr>                            
                                <th>Nº</th>
                                <th>Cashier Name</th>
                                <th>Cash Register Amount</th>
                                <th>Start Date</th>                   
                                <th>Start Time</th>
                                 <th>End Date</th>
                                <th>End Time</th>
                                <th>Grand Total</th>
                            </tr>                 
                                <tr>
                                    <?php
                                        $no=1;
                                        $total =0;
                                        foreach($cash_register as $cr){
                                    ?>
                                    <td><?php echo $no; ?></td> 
                                    <td><?php echo $cr->cashier; ?></td> 
                                    <td><?php echo $cr->cash_amount; ?></td> 
                                    <td><?php echo $cr->start_date; ?></td> 
                                    <td><?php echo $cr->start_hour; ?></td> 
                                    <td><?php echo $cr->end_date; ?></td> 
                                    <td><?php echo $cr->end_hour; ?></td>  

                                    <td><?php echo number_format($cr->grand_total,2); ?></td>
                                </tr>                
                                <?php

                                    $no=$no+1;

                                  }
                                ?>    
                     </table>
                 </td>
             </tr>
            </table>
       
    </body>
    <script>
            $.noConflict();
            jQuery( document ).ready(function( $ ) {
                $("#datefrom").datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
                $("#dateto").datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
            });
        </script>
</html>
