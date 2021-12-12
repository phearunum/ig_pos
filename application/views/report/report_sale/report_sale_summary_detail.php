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
    <style>
        tfoot{
            font-weight: bold;
        }
    </style>
    <body>
          <?php
            foreach($record_permission as $p){
        ?>
        <div class="container-fluid container-fluid-custom">
            <form class="formSale" id="form-search">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_customer_name" id="txt_customer_name" autocomplete="off"  placeholder="CUSTOMER">
                        <input type="hidden" name="txtcustomer_id" id="txtcustomer_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_invoice_no" id="txt_invoice_no" autocomplete="off"  placeholder="INVOICE#">
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
                      <div class="col-sm-2 col-xs-6 col-cs" hidden>
                        <select name="cbo_acc_type" id="cbo_acc_type" class="form-control">
                            <option value="0">--Account Type--</option>
                            <?php
                                foreach($account_type as $ac){
                            ?>
                                <option value="<?php echo $ac->acc_type_id; ?>"><?php echo $ac->acc_type; ?></option>
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
            <h3 class="text-center text-primary"><?php echo "Report Sale By Member Card"?></h3>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo "ID"?></th>
                    <th><?php echo $lbl_invoice_no ?></th>
                    <th><?php echo $lbl_customer ?></th>
                    <th><?php echo $lbl_cashier?></th>
                    <th><?php echo $lbl_time_in;?></th>
                    <th><?php echo $lbl_time_out;?></th>
                    <th><?php echo $lbl_total ?></th>
                    <th><?php echo $lbl_discount ?></th>
                    <th><?php echo $lbl_tax ?></th>
                    <th><?php echo $lbl_grand_total ?></th>
                    <th><?php echo $lbl_member;?></th>
                    <th><?php echo $lbl_account_type ?></th>
                    <th><?php echo $lbl_account;?></th>
                    <th><?php echo $branch_label ?></th>
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
            "sAjaxSource": '<?php echo site_url("report_sale_summary_detail/response"); ?>',
            "aoColumns": [
                {mData: 'sale_master_id'},
                {mData: 'invoice_no'},
                {mData: 'customer_name'},
                {mData: 'cashier'},
                {mData: 'checkin_date'},
                {mData: 'checkout_date'},
                {mData: 'SubTotal'},
                {mData: 'discount'},
                {mData: 'tax'},
                {mData: 'grandtotal'},
                {mData: 'member_pay'},
                {mData: 'acc_type'},
                {mData: 'other_card_pay'},
                {mData: 'branch_name'},
            ],
           "iDisplayLength": 50,
           "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
           "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0,11,12]}],
           "order": [[1, 'desc']],
            "footerCallback": function (nRow) {
                var api = this.api(),data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                //TOTAL BY ROW
                total_all = api.column(6, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total = api.column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_dis = api.column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_dis_all = api.column(7, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_vat = api.column(8, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_vat_all = api.column(8, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                grand_total = api.column(9, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                grand_total_all = api.column(9, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                member_pay = api.column(10, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                member_pay_all = api.column(10, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_card_pay = api.column(12, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_card_pay_all = api.column(12, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                // END TOTAL BY ROW                                   

                var nCells = nRow.getElementsByTagName('td');
                
                nCells[6].innerHTML = total.toFixed(dot_num)+' of '+total_all.toFixed(dot_num);
                nCells[7].innerHTML = total_dis.toFixed(dot_num)+' of '+total_dis_all.toFixed(dot_num);
                nCells[8].innerHTML = total_vat.toFixed(dot_num)+' of '+total_vat_all.toFixed(dot_num);
                nCells[9].innerHTML = grand_total.toFixed(dot_num)+' of '+grand_total_all.toFixed(dot_num);
                nCells[10].innerHTML = member_pay.toFixed(dot_num)+' of '+member_pay_all.toFixed(dot_num);
                nCells[12].innerHTML = total_card_pay.toFixed(dot_num)+' of '+total_card_pay_all.toFixed(dot_num);
            }
        });
        
        //AJAX FORM SUBMIT
        $("#form-search").on('submit',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var url = '<?php echo site_url("report_sale_summary_detail/responses");?>';
            data_table.clear().draw();
            $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="17" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
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
    function clearId(){
        if($("#txt_customer_name").val()===""){
            $('#txtcustomer_id').val("");
        }
    }
</script>
<?php
    }
?>
</html>
