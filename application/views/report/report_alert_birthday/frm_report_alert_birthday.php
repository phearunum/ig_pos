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
         .hide_me{
             display: none;
         }
     </style>
    </head>
    <body>
        <table width='100%' class='table-form' >            
           
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table tbl" id="table2excel" cellpadding="0" border="1">
                        <thead>                           
                            <tr>
                                <th>Customer_id</th>
                                <th>Customer Name </th>
                                <th>Phone Number </th>
                                <th>Customer Current Amount($)</th>
                                <th>Topup</th>
                               
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
                                 "sAjaxSource": "<?php echo site_url("report_alert_birthday/response");?>",
                                 "aoColumns": [
                                        { mData: 'customer_id'},                                
                                        { mData: 'customer_name'},
                                        { mData: 'customer_phone'},
                                        { mData: 'balance'},
                                        {"sTitle": "<?php echo 'TOPUP'; ?></a>", "sDefaultContent": '<a href="#" class="edit"><?php echo 'Topup Now!'; ?></a>' },
                                       
                                    ],"aoColumnDefs": [
                                        { "sClass": "hide_me", "aTargets": [ 0 ] }                               
                                      ],
                        });
                        
                        
                         $('#table2excel').on('click', 'td .edit', function(e) {
                                e.preventDefault();
                                var id = $(this).closest('tr').find('td:first').html();
                               // alert(id);
                                var href='<?php echo site_url("customer/edit_load") ?>' +"/"+ id;
                                
                                window.location.href = href;
                        });
                    });
        </script>
    </body>
    
</html>
