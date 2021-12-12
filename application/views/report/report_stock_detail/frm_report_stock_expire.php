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
     <style>
         table.tbl tr td:first-child { display: none; }
         table.tbl tr th:first-child { display: none; }
     </style>
    </head>
    <body>
        <table width='100%' class='table-form' >            
            <tr>
                <td>
                    <table>
                    <tr>
                        <td>
                            <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>
                        </td>
                        <td>
                            <a href="<?php echo site_url('report_stock_expire/clear_all_expire'); ?> "><input type="button" name="btnClear"  id="btnClear" class="btn-highpoint" value="Clear"/></a>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table tbl" id="table2excel" cellpadding="0" border="1">
                        <thead>
                            <tr>
                                <td class="form-title" colspan="6" style="text-align: center;">
                                    STOCK EXPIRE
                                </td>
                            </tr>
                            <tr>
                                <th>Stock_id</th>
                                <th>Item Type</th>
                                <th>Item Name</th>
                                <th>QTY</th>               
                                <th>Expire Date</th> 
                                <th>Stock Location</th>
                                <th>Disable</th>
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
                                 "sAjaxSource": "<?php echo site_url("report_stock_expire/response");?>",
                                 "aoColumns": [
                                        { mData: 'stock_id'},
                                        { mData: 'item_type_name'},
                                        { mData: 'item_detail_name'},
                                        { mData: 'stock_qty'},
                                        { mData: 'stock_expire_date'},
                                        { mData: 'stock_location_name'},
                                        {"sTitle": "Disable", "sDefaultContent": '<center><a href="#" class="delete"><img src="<?php echo base_url("img/delete.gif"); ?>" ></a></center>' }
                                ]
                        });
                        
                        $('.table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("report_stock_expire/delete") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                window.location.href = href;
                        });
                    });
        </script>
    </body>
    
</html>
