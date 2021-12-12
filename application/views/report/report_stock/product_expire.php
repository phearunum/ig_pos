<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    $("#table2excel").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Report Stock",
                        fileext: ".xls"
                    });
                });
            }
        </script>
        <style>
            .dataTables_length{
                display:none;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
        <table width='100%'>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="0">
                        <thead>
                            <tr>
                                <td class="form-title" colspan="8" style="text-align: center;">
                                    Products Expire
                                </td>
                            </tr>
                            <tr class="persist-header">
                                <th><?php echo $lbl_part; ?></th>
                                <th>Item Name</th>
                                <th>Branch</th>
                                <th>Expire Date</th>
                                <th>Alert Date</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                    </table>
                </td>
            </tr>
        </table> 
    </div>
        <script type="text/javascript">
            $(document).ready(function () {
                var data_table=$('#table2excel').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": '<?php echo site_url("report_stock/response_expire"); ?>',
                    "aoColumns": [
                        {mData: 'item_detail_part_number'},
                        {mData: 'item_detail_name'},
                        {mData: 'branch_name'},
                        {mData: 'stock_expire_date'},
                        {mData: 'stock_alert_date'},
                        {mData: 'stock_qty'}
                    ],
                    "searching": false,
                    "iDisplayLength": 100,
                });
            });
        </script>
    </body>
</html>
