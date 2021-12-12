<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            function myFunction(){
                $(function() {
                    $(".table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "<?php echo $title ?>",
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
        <div class="container-fluid container-fluid-custom">
        <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_invoice_no" id="txt_invoice_no" placeholder="INVOICE NO">
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h4 class="text-center"><?php echo $lbl_inv_title;?></h4>
        <table  width="100%" align="center" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo $lbl_inv_invoice_no; ?></th>
                    <th><?php echo $lbl_pax;?></th>
                    <th><?php echo $lbl_inv_cashier; ?></th>
                    <th><?php echo $lbl_create_date; ?></th>
                    <th><?php echo $lbl_inv_total; ?></th>
                    <th><?php echo $lbl_inv_status; ?></th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
                <tr>
                    <th>Total:</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>ccc</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
        <script>
            $("#datefrom").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $(document).ready(function() {
                var data_table=$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url("report_invoice_list/response/"); ?>",
                    "aoColumns": [
                        {mData: 'invoice_no'},
                        {mData: 'pax'},
                        {mData: 'cashier'},
                        {mData: 'end_date'},
                        {mData: 'grand_total'},
                        {mData: 'sale_master_status'}
                    ],
                   "iDisplayLength": 50,
                   "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
                    //"order" : [[1,"desc"]],
                    "footerCallback": function (nRow) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };
                        //TOTAL BY ROW
                        grand_total = api.column(4, {
                            page: 'current'
                        })
                                .data()
                                .reduce(function (total, b) {
                                    var bb = b.replace(',', '');

                                    return total + parseFloat(bb);
                                }, 0);
                        grand_total_all = api.column(4, {
                            page: 'all'
                        })
                                .data()
                                .reduce(function (total, b) {
                                    var bb = b.replace(',', '');

                                    return total + parseFloat(bb);
                                }, 0);
                        // END TOTAL BY ROW                                   

                        $( api.column( 4 ).footer() ).html(
                            grand_total.toFixed(2) +' of '+ grand_total_all.toFixed(2)
                        );
                    }
                });
                //AJAX FORM SUBMIT
                $("#form").on('submit', function (e) {
                    e.preventDefault();
                    var url  = '<?php echo site_url("report_invoice_list/responses"); ?>';
                    var data = $(this).serialize();

                     data_table.clear().draw();
                    $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                    $.getJSON(url, data, function( json )
                    {        
                        data_table.rows.add(json.aaData).draw();
                    });
                });
                //END AJAX FORM SUBMIT
            });
        </script>        
    </body>
</html>
