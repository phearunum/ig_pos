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
             alert("test");
                $(function() {
                                    $("#table2excel").table2excel({
                                            exclude: ".noExl",
                                            name: "Excel Document Name",
                                            filename: "Report Purchase Summary",
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
        <table>
            <tr>
                <td>
                    <a id="modal-673355" href="#modal-container-673355" role="button" data-toggle="modal">
                        <div class="img-responsive">
                            <input type="button" value="Search" class="btn-highpoint"/>                
                        </div>            
                    </a>
                </td>
                <td>
                    <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>
                </td>
            </tr>
        </table>
        <div class="modal fade" id="modal-container-673355" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">							 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                            Search Your Data
                                    </h4>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo site_url("report_sale/search_sale") ?>" method="post">
                                    <table  width="100%" cellspacing="0"  id="table-table-search" cellpadding="5"> 

                                         <tr>
                                            <td>Customer : </td>
                                            <td class="table-width" colspan="3">
                                                <select name="recorder" id="recorder" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                    <option value="0">--Select Customer--</option>
                                                    <?php
                                                    foreach ($customer as $rt)
                                                          {
                                                    ?>
                                                     <option value="<?php echo $rt->customer_name; ?>"><?php echo $rt->customer_name; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Type : </td>
                                            <td class="table-width" colspan="3">
                                                <select name="Supplier" id="Supplier" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                   <option value="0">--Select Type--</option>
                                                     <?php
                                                    foreach ($type as $sl)
                                                          {
                                                    ?>
                                                     <option value="<?php echo $sl->sale_detail_item_type; ?>"><?php echo $sl->sale_detail_item_type; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>                  
                                            <td class="table-width">From : </td>
                                            <td ><input style="width: 155px;" type="date" name="datefrom" id="datefrom" placeholder="search purchase no" /></td>                       
                                            <td  class="table-width"> To : </td>
                                            <td class="table-width"><input style="width: 155px;" type="date" name="dateto" id="dateto" placeholder="Search purchase no" /></td>
                                        </tr>
                                       
                                    </table>


                            </div>
                            <div class="modal-footer"> 
                                 <button type="button" data-dismiss="modal" class="pull-left btn-highpoint">
                                            Close
                                </button> 
                                <input type="submit" value="Search"  class="pull-right btn-highpoint" />                                                   
                            </div>
                    </div>
                    </form>
            </div>

    </div>
        
        <form method="post" action="<?php echo site_url("report_sale/save"); ?>">
        
        <table width="80%" cellspacing="0" class="table-table font_khmer" id="table2excel" align='center' cellpadding="0" border="0">
            <tr style=" border:1px solid #00a6b2">
                <td colspan="10" style="text-align: center; text-decoration: underline; font-size: 20px; font-weight: bold;">
                    Sale Report
                </td>
            </tr>
            <tr>                            
                <th>Nº</th>
                <th>Customer Name</th>
                <th>Date</th>
                <th>Plate No </th> 
                <th>No</th>                   
                <th>Type Of Oil</th>
                <th>Quantity (L)</th>
                <th>Unit Price ($)</th>
                <th>Discount ($)</th>
                <th>Total ($)</th>
            </tr>
                
                <?php
                    $no=1;
                    $total=0;
                    $discount=0;
                    $liter=0;
                    foreach($record_sale as $ct){
                ?>
                <tr style="border:1px solid #00a6b2;">
                    <td><?php echo $no; ?></td>                    
                    <td><?php echo $ct->customer_name; ?></td>                    
                    <td><?php echo $ct->sale_detail_created_date; ?></td>
                    <td><?php echo $ct->sale_detail_plate_no; ?></td>
                    <td><?php echo $ct->sale_detail_invoice_no; ?></td>
                    <td><?php echo $ct->sale_detail_item_type; ?></td>                    
                    <td><?php echo $ct->sale_detail_qty; ?></td>
                    <td><?php echo $ct->sale_detail_unit_price; ?></td>
                    <td><?php echo number_format($ct->sale_detail_total_discount_dollar,2); ?></td>
                    <td><?php echo $ct->sale_detail_qty * $ct->sale_detail_unit_price; ?></td>
                </tr>
                <?php
                        $no=$no+1;
                        $total +=  $ct->sale_detail_qty * $ct->sale_detail_unit_price;;
                        $discount += $ct->sale_detail_total_discount_dollar;
                        $liter +=  $ct->sale_detail_qty;
                    }
                ?>
                <tr class="total_footer">
                    <td colspan="5"></td>
                    <td  style="text-align: right;  border:1px solid #00a6b2" >Total litter(L) : </td>
                    <td style="border-bottom: 1px solid #00a6b2"><?php echo number_format($liter,2); ?></td>
                    <td>-</td>
                    <td style="text-align: right;">Total : </td>
                    <td style="border:1px solid #00a6b2"><?php echo number_format($total,2); ?></td>
                </tr>
                <tr class="total_footer">
                    <td colspan="7"></td>
                    <td style="text-align:right; border:1px solid #00a6b2">Discount($) : </td>
                    <td colspan="2" style="text-align:left; border:1px solid #00a6b2"><?php echo number_format($discount,2); ?></td>
                </tr>
                <tr class="total_footer">
                    <td colspan="8"></td>
                    <td style="text-align:right; border:1px solid #00a6b2">Total Amount : </td>
                    <td style="text-align:left; border:1px solid #00a6b2"><?php echo number_format($total - $discount,2); ?></td>
                </tr>
            </table>
            </form>
    </body>
    
</html>
