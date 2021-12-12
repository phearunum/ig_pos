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
    
    
    </head>
    <body>
        <table width='100%' class='table-form' > 
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table tbl" id="table2excel" cellpadding="0" border="1">
                        <thead>                           
                            <tr>
                             
                                <th>Customer Name </th>
                                <th>Customer Phone</th>
                                <th>Car Plate No</th>
                                <th>Next Checking</th>
                                <th>Next Checking Date</th>
                                <th>Previous Checking</th>
                                <th>Previous Checking Date</th>
                                <th>Date Created</th>
                                <th>Recorder</th>
                                
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
                                 "sAjaxSource": "<?php echo site_url("report_alert_next_repair/response");?>",
                                 "aoColumns": [
                                                                        
                                        { mData: 'customer'},
                                        { mData: 'customer_phone'},
                                        { mData: 'customer_plate_no'},
                                        { mData: 'app_action'},
                                        { mData: 'app_date_action'},
                                        { mData: 'app_customer_last_repair_info'},
                                        { mData: 'app_customer_last_repair_date'},
                                        { mData: 'app_create_date'},
                                        { mData: 'recorder'},
                                        
                                    ]
                        });
                    });
        </script>
    </body>
    
</html>
