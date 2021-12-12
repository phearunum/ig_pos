<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function exp_excel() {
                $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "REPORT SALE BY CASHIER",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
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
                        <input type="text" class="form-control text_input" name="txt_cashier" id="txt_cashier" autocomplete="off" placeholder="SEARCH Cashier">
                        <input type="hidden" name="txt_cashier_id" id="txt_cashier_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_invoice_no" id="txt_invoice_no" placeholder="INVOICE NO">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="branch" id="branch" class="form-control">
                           <option value="0">--All Branch--</option>
                            <?php
                                foreach($branch as $b){
                            ?>
                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                            <?php
                              }
                            ?>
                        </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="exp_excel()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h4 class="text-center"><?php echo $lbl_summary_title;?></h4>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo "ID"?></th>
                    <th><?php echo $lbl_no; ?></th>
                    <th><?php echo $lbl_cashier; ?></th>
                    <th><?php echo $lbl_summary_inv_no; ?></th>
                    <th><?php echo $lbl_summary_subtotal; ?></th>
                    <th><?php echo $lbl_summary_total_dis; ?></th>
                    <th>Tax</th>
                    <th><?php echo $lbl_summary_grand_total; ?></th>
                    <th>Branch</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
                <td></td>
                <td><?php echo $lbl_summary_grand_total; ?>:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
    </table>
</body>
</div>
<script type="text/javascript">
    $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $(document).ready(function (){
        var table=$('#table-table').DataTable({
            "bProcessing": false,
            "sAjaxSource": "<?php echo site_url("report_sale_summary_by_cashier/response/"); ?>",
            "aoColumns": [
                {mData: 'sale_master_id'},
                {mData: 'sale_master_id',render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {mData: 'cashier' },
                {mData: 'invoice_no'},
                {mData: 'SubTotal'},
                {mData: 'discount'},
                {mData: 'tax'},
                {mData: 'grandtotal'},
                {mData: 'branch_name'}
            ],
            "iDisplayLength": 50,
            "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
            "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0]},{"sClass": "hidden", "aTargets": [2]}],
            "order": [[ 1, 'asc' ]],
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;

                api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="7">Cashier : '+group+'</td></tr>'
                        );

                        last = group;
                    }
                } );
            },
            "footerCallback": function (nRow) {
                var api = this.api(),data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                //TOTAL BY ROW
                subtotal = api.column(4, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                subtotal_all = api.column(4, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                
                total_dis = api.column(5, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_dis_all = api.column(5, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                tax = api.column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                tax_all = api.column(6, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                
                grand_total = api.column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                grand_total_all = api.column(7, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                
                // END TOTAL BY ROW                                   

                var nCells = nRow.getElementsByTagName('td');
                
                nCells[4].innerHTML = subtotal.toFixed(dot_num)+' of '+subtotal_all.toFixed(dot_num);
                nCells[5].innerHTML = total_dis.toFixed(dot_num)+' of '+total_dis_all.toFixed(dot_num);
                nCells[6].innerHTML = tax.toFixed(dot_num)+' of '+tax_all.toFixed(dot_num);
                nCells[7].innerHTML = grand_total.toFixed(dot_num)+' of '+grand_total_all.toFixed(dot_num);
            }
        });
        
        $("#form").on('submit',function(e){
                e.preventDefault();
                var data = $(this).serialize();
                var url = '<?php echo site_url("report_sale_summary_by_cashier/responses?");?>';
                table.clear().draw();
                $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="9" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, data, function( json )
                {        
                    table.rows.add(json.aaData).draw();
                });
            });
        //END AJAX FORM SUBMIT
        $("#txt_cashier").on('blur',function(){
                if($(this).val()=='')
                    $('#txt_cashier_id').val("");
            });
        });
</script>
<script>
    $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
</script>
<script type="text/javascript">
    $('#txt_cashier').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                dataType: "json",
                data: {
                    name_startsWith: request.term,
                    type: 'employee',
                    row_num: 1
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        var code = item.split("|");
                        return {
                            label: code[0],
                            value: code[0],
                            data: item
                        }
                    }));
                }
            });
        },
        autoFocus: true,
        minLength: 0,
        select: function (event, ui) {
            var names = ui.item.data.split("|");
            $('#txt_cashier').val(names[0]);
            $('#txt_cashier_id').val(names[1]);
        }
    });
</script>
</html>
