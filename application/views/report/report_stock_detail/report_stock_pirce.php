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
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css"); ?>">

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
    
    <script type="text/javascript">
         function myFunction(){
            $(function() {
                alert("Export your Data ");
				$("#table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Report Stock",
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
        <table width='100%'>            
            <tr>
                <td>
                    <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="0">
                        <thead>
                            <tr>
                                <td class="form-title" colspan="10" style="text-align: center;">
                                    CHECK STOCK PRICE
                                </td>
                            </tr>
                            <tr class="persist-header" style="width:100%;">
                                <th>Category</th>
                                <th>Part N#</th>
                                <th>Item Name</th>
                                <th>Order Point</th>
                                <th>Location</th>
                                <th>Balance</th> 
                                <th>Unit cost($)</th>                               
                                <th>Retail price($)</th>
                                <th>Total($)</th>
                            </tr>                            
                        </thead>
                    </table>
                </td>
            </tr>
        </table>  
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#table2excel').dataTable({
                                 "bProcessing": true,
                                 "sAjaxSource": "<?php echo site_url("report_stock_detial/response");?>",
                                 "aoColumns": [
                                        { mData: 'item_type_name'},
                                        { mData: 'item_detail_part_number'},
                                        { mData: 'item_detail_name'},
                                        { mData: 'item_detail_remain_alert'},
                                        { mData: 'stock_location_name'},
                                        { mData: 'stock_qty'},
                                        { mData: 'purchase_detail_unit_cost'},                                      
                                        { mData: 'item_detail_retail_price'},
                                        { mData: 'total'}                                        
                                    ]
                        });
                    });
        </script>
    </body>
    
</html>
