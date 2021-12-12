<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
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
        <div class="container-fluid container-fluid-custom">
        <table width='100%' class='table-form' >            
            <tr>
                <td colspan="6" style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo $list_name;?></td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table tbl" id="table2excel" cellpadding="0" border="0">
                        <thead>                           
                            <tr>
                                <th>Customer_id</th>
                                <th><?php echo $lb_customer_name;?> </th>
                                <th><?php echo $lb_card_number;?></th>
                                <th><?php echo $lb_serial_number;?></th>
                                <th><?php echo $lb_chip_number;?></th>
                                <th><?php echo $lb_current_amount; ?></th>                
                            </tr>
                        </thead>
                    </table>
                </td>
            </tr>
        </table> 
    </div> 
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#table2excel').dataTable({
                                 "bProcessing": true,
                                 "sAjaxSource": "<?php echo site_url("card_need/response_card_need");?>",
                                 "aoColumns": [
                                        { mData: 'customer_id'},
                                        { mData: 'customer_name'},
                                        { mData: 'customer_card_number'},
                                        { mData: 'customer_card_serial'},
                                        { mData: 'customer_chip'},
                                        { mData: 'customer_balance'},
                                    ],
                                    "iDisplayLength": 50,
                                    "aoColumnDefs": [
                                        { "sClass": "hide_me", "aTargets": [ 0] }                               
                                      ],
                        });
                        
                        
                         $('#table2excel').on('click', 'td .edit', function(e) {
                                e.preventDefault();
                                var id = $(this).closest('tr').find('td:first').html();
                                var customer_id = $(this).closest('tr').find('td:nth-child(2)').html();
                                window.location.href = href;
                        });
                    });
        </script>
    </body>
    
</html>
