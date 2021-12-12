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
                        filename: "REPORT SALE SUMMARY",
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
                        <input type="text" class="form-control" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER">
                        <input type="hidden" name="txtcustomer_id" id="txtcustomer_id" value="0">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_invoice_no" id="txt_invoice_no" placeholder="INVOICE NO">
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
            <h4 class="text-center"><?php echo $lbl_title;?></h4>
        <?php
            foreach($record_permission as $p){
        ?>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo "ID"?></th>
                    <th><?php echo $lbl_no;?></th>
                    <th><?php echo $lbl_invoice_no; ?></th>
                    <th><?php echo $lbl_customer; ?></th>
                    <th><?php echo $lbl_card; ?></th>
                    <th><?php echo $lbl_cashier;?></th>
                    <th><?php echo $lbl_total; ?></th>
                    <th><?php echo $lbl_discount; ?></th>
                    <th><?php echo $lbl_tax; ?></th>
                    <th><?php echo $lbl_service_charge ?></th>
                    <th><?php echo $lbl_member;?></th>
                    <th><?php echo $lbl_grand_total; ?></th>
                    <th><?php echo $lbl_account_type; ?></th>
                    <th><?php echo $lbl_date;?></th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
                <td></td>
                <td><?php echo $lbl_grand_total; ?>:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tfoot>
    </table>
</div>
</body>
<script type="text/javascript">
    $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $(document).ready(function (){
        var data_table=$('#table-table').DataTable({
            "bProcessing": false,
            "sAjaxSource": "<?php echo site_url("sale_summary/response/"); ?>",
            "aoColumns": [
                {mData: 'master_id'},
                {mData: 'master_id',render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                {mData: 'invoice_no'},
                {mData: 'customer_name'},
                {mData: 'customer_card'},
                {mData: 'cashier'},
                {mData: 'sub_total'},
                {mData: 'total_discount'},
                {mData: 'tax_amount'},
                {mData: 'service_charge_amount'},
                {mData: 'member_pay'},
                {mData: 'grand_total'},
                {mData: 'card_payment'},
                {mData: 'end_date'}
            ],
            "iDisplayLength": 50,
            "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
            "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0]}],
            "order": [[2, 'asc']],
            "footerCallback": function (nRow) {
                var api = this.api(),data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                //TOTAL BY ROW
                total = api.column(6, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_dis = api.column(7, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_vat = api.column(8, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_charge = api.column(9, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                member_pay = api.column(10, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                grand_total = api.column(11, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
//                total_card_pay = api.column(15, {
//                    page: 'all'
//                })
//                .data()
//                .reduce(function (total, b) {
//                    var bb = b.replace(',', '');
//
//                    return total + parseFloat(bb);
//                }, 0);
                // END TOTAL BY ROW                                   

                /* Modify the footer row to match what we want */
                var nCells_4 = nRow.getElementsByTagName('td');
                var nCells_5 = nRow.getElementsByTagName('td');
                var nCells_6 = nRow.getElementsByTagName('td');
                var nCells_7 = nRow.getElementsByTagName('td');
                var nCells_8 = nRow.getElementsByTagName('td');
                var nCells_9 = nRow.getElementsByTagName('td');
               // var nCells_10 = nRow.getElementsByTagName('td');
                
                nCells_4[6].innerHTML = total.toFixed(2);
                nCells_5[7].innerHTML = total_dis.toFixed(2);
                nCells_6[8].innerHTML = total_vat.toFixed(2);
                nCells_7[9].innerHTML = total_charge.toFixed(2);
                nCells_8[10].innerHTML = member_pay.toFixed(2);
                nCells_9[11].innerHTML = grand_total.toFixed(2);
                //nCells_10[15].innerHTML = total_card_pay.toFixed(2);
            }
        });
        // data_table.on('order.dt search.dt', function (){
        //     data_table.api().column(1, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // }).api().draw();
        //AJAX FORM SUBMIT
        $("#form").on('submit',function(e){
                e.preventDefault();

                var url = "<?php echo site_url('sale_summary/responses?');?>";

               var data = $(this).serialize();
                 data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="14" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, data, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
            });
        //END AJAX FORM SUBMIT
        $("#txt_customer_name").on('blur',function(){
            if($(this).val()=='')
                $('#txtcustomer_id').val("");
        });
    });
</script>
<script type="text/javascript">
    $('#txt_customer_name').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                dataType: "json",
                data: {
                    name_startsWith: request.term,
                    type: 'customer_table',
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
            $('#txtcustomer_id').val(names[1]);
        }
    });
</script>
<?php
    }
?>
</html>
