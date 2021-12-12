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
                                    Customer alert topup
                                </td>
                            </tr>
                            <tr class="persist-header">
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Card Chip</th>
                                <th>Balance</th>
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
                    "sAjaxSource": '<?php echo site_url("customer/card_topup_response"); ?>',
                    "aoColumns": [
                        {mData: 'customer_name'},
                        {mData: 'customer_phone'},
                        {mData: 'customer_chip'},
                        {mData: 'customer_balance'}
                    ],
                    "searching": false,
                    "iDisplayLength": 100,
                });
            });
        </script>
    </body>
</html>
