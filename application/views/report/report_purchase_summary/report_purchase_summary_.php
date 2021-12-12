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
         <!--        MODAL FORM-->
        
        <form action="<?php echo site_url("report_purchase_summary/search") ?>" method="post">
            
                    <table cellspacing="0" class="table-form"  id="table-form" width="100%">
                         
                        <tr class="hidden"> 
                            <td><?php echo $btn_no ?>: </td>
                            <td colspan="3"><input type="number" name="purchaseno" id="purchaseno" placeholder="Search Purchase No" style="width:87.8%;"/></td>
                        </tr>
                        <tr>                  
                            <td><?php echo $txt_from ?> : </td>
                            <td><input type="text" name="datefrom" id="datefrom" class="txt_date" placeholder="yyyy/mm/dd" /></td>                       
                            <td><?php echo $txt_to ?>:</td>
                            <td><input type="text" name="dateto" id="dateto" class="txt_date" placeholder="yyyy/mm/dd" /></td>
                        </tr>
                        <tr>
                            <td><?php echo $lbl_recorder ?>: </td>
                            <td >
                                <select name="recorder" id="recorder" class="cbo-srieng">                        
                                    <option value="0">--Select Recorder--</option>
                                    <?php
                                    foreach ($recorder as $rt) {
                                        ?>
                                        <option value="<?php echo $rt->recorder; ?>"><?php echo $rt->recorder; ?></option>

                                    <?php } ?>
                                </select>
                            </td>
                             <td><?php echo $txt_supplier ?>: </td>
                            <td>
                                <select name="Supplier" id="Supplier" class="cbo-srieng">                        
                                    <option value="0">--Select Supplier--</option>
                                    <?php
                                    foreach ($supplier as $sl) {
                                        ?>
                                        <option value="<?php echo $sl->supplier_name; ?>"><?php echo $sl->supplier_name; ?></option>

                            <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><?php echo $lbl_status ?>: </td>
                            <td colspan="3">
                                <select name="status" id="status" class="cbo-srieng" style="width:87.8%;">                        
                                    <option value="0">--Select Status--</option>
                                    <option value="PAID">PAID</option>
                                    <option value="CREDIT">CREDIT</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="field-title-search">
                            <td colspan="4">
                                <input type="submit" value="<?php echo $btn_search ?>"  class="pull-right btn-highpoint" /> 
                            </td>
                            <td>
                                <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-srieng" value="<?php echo $btn_export ?>"/>
                            </td>
                        </tr>
            </table>                       
        </form>
        <!--END MODAL FORM-->
        
        <table width="100%" cellspacing="0" class="table-table persist-area" id="table2excel" cellpadding="0" border="0">
            <tr>               
                <td class="form-title" colspan="7"  style="text-align: center;"><?php echo $lbl_title ?></td>                
            </tr>  
            <tr>               
                <td style="text-align: center;" colspan="7">
                    <p><?php echo $text_display; ?></p>
                </td>                
            </tr> 
            <tr class="persist-header" style="width: 100%">                            
                <th><?php echo $btn_no ?></th>
                <th><?php echo $lbl_purchase_no ?></th>
                <th><?php echo $lbl_total ?>($) </th> 
                <th><?php echo $lbl_created_date ?></th>                   
                <th><?php echo $lbl_recorder ?></th>
                <th><?php echo $lbl_supplier ?></th>
                <th><?php echo $lbl_status ?></th>
            </tr>
            <?php
            $no = 1;
            $total = 0;
            foreach ($record_customer as $ct) {
                ?>               
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                        <?php
                        if ($ct->status == "PAID") {
                            ?>
                            <?php echo $ct->purchase_no ?>
                            <?php
                        } else {
                            ?>
                            <a class="tooltips" data-original-title="This invoice is credited!!" data-placement="top" href="<?php echo site_url("purchase_pay/pay/" . $ct->purchase_no); ?>" ><u><?php echo $ct->purchase_no ?></u></a>
                            <?php
                        }
                        ?>
                    </td>

                    <td>
                        <?php echo number_format($ct->total, 2); ?>
                    </td>
                    <td><?php echo $ct->purchase_created_date; ?></td>
                    <td><?php echo $ct->recorder; ?></td>                    
                    <td><?php echo $ct->supplier_name; ?></td>                    
                    <td>
                        <?php
                         echo $ct->status == "PAID" ? "PAID" : "UNPAID";
                        ?>
                    </td>
                </tr>

                <?php
                $no = $no + 1;
                $total += $ct->total;
            }
            ?>

            <tr class="total_footer">
                <td colspan="2" style="text-align: right;"><?php echo $lbl_total ?>: </td>
                <td><?php echo number_format($total, 2); ?></td>
                <td colspan="4"></td>
            </tr>
        </table>
                    
       
    </body>
    <script type="text/javascript">
    
        $.noConflict();
        jQuery( document ).ready(function( $ ) {
            $("#datefrom").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
            $("#dateto").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
        });
    
    </script>
</html>
