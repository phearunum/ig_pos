<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    $("#table-table").table2excel({
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

        <style>
            .hide_me{display: none;}
        </style>

    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
            <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="txt_date_from" id="txt_date_from" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="txt_date_until" id="txt_date_until" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_supplier" id="txt_supplier" autocomplete="off" placeholder="<?php echo $lbl_sup; ?>">
                        <input type="hidden" name="txtsupplier_id" id="txtsupplier_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_invoice_no" id="txt_invoice_no" placeholder="<?php echo $lbl_po; ?>">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_branch" id="cbo_branch" >              
                            <option value="0"><?php echo $lbl_allbranch; ?></option>
                            <?php
                            foreach ($branch as $b) {
                                ?>
                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                            <?php } ?>
                        </select>
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
            <h4 class="text-center"><?php echo $lbl_title;?></h4>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>                
                <tr>
                    <th><?php echo $lbl_no;?></th>
                    <th><?php echo $lbl_po;?></th>                                    
                    <th><?php echo $lbl_sup?></th>                      
                    <th><?php echo $lbl_credit?></th>
                    <th><?php echo $lbl_paid?></th>
                    <th><?php echo $lbl_branch?></th>
                    <th><?php echo $lbl_update?></th>
                    <th><?php echo $lbl_paid_date?></th>                    
                </tr>
            </thead>
            <tfoot class="">
                <td><?php echo $lbl_total?></td>
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
    <script type="text/javascript">
        $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $(document).ready(function () {
            var table = $('#table-table').DataTable({
                "bProcessing": false,
                "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                "sAjaxSource": "<?php echo site_url("report_supplier_debt/response/"); ?>",
                "aoColumns": [                    
                    {mData: 'purchase_pay_id',render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }}, 
                    {mData: 'purchase_no','mRender':function(data){
                         return numeral(data).format('00000');
                    }},
                    {mData: 'supplier_name'},
                    {mData: 'purchase_pay_credit_amount','mRender':function(data){
                        return numeral(data).format('#.'+dot_0+'');
                    }},
                    {mData: 'purchase_pay_amount','mRender':function(data){
                        return numeral(data).format('#.'+dot_0+'');
                    }},   
                    {mData: 'branch_name'},                 
                    {mData: 'recorder'},
                    {mData: 'purchase_pay_created_date'},
                   ],
                   "order": [[ 0, "asc" ]],
                    "bFilter": false,
                "iDisplayLength": 50,
                "footerCallback": function () {
                    var api = this.api(),
                            data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                        total_credit = api
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        credit = api
                        .column( 3, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        total_paid = api
                        .column( 4 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        paid = api
                        .column( 4, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer                                        
                    //$(api.column(3).footer()).html((pageTotal).toFixed(2));
                    //$(api.column(4).footer()).html((pageTotalCredit).toFixed(2));
                    $( api.column( 3 ).footer() ).html(credit.toFixed(dot_num) +' of '+total_credit.toFixed(dot_num) +'');
                    $( api.column( 4 ).footer() ).html(paid.toFixed(dot_num) +' of '+total_paid.toFixed(dot_num) +'');
                    //$( api.column( 4 ).footer() ).html(pageTotal.toFixed(5) +' of '+pageTotalCredit.toFixed(5) +'');

                }
            });
            $("#form").on('submit', function (e) {
                e.preventDefault();
                var df, dt, suppler_name, invoice_no,po_id,branch_id;
                df = $("#txt_date_from").val();
                dt = $("#txt_date_until").val();
                suppler_name = $("#txt_supplier").val();
                invoice_no = $('#txt_invoice_no').val();
                branch_id=$('#cbo_branch').val();
                //po_id=$('#txt_invoice_no').val();
                var url = '<?php echo site_url("report_supplier_debt/responses?"); ?>' + 'df=' + df + '&dt=' + dt + '&supplier_name=' + suppler_name + '&invoice=' + invoice_no+'&branch_id='+branch_id;

                table.clear().draw();
                $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="7" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, null, function( json )
                {        
                    table.rows.add(json.aaData).draw();
                });
            });
            $('#table-table').on('click', 'td .edit', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href = '<?php echo site_url("purchase/edit_load_purchase_order/") ?>' + "/" + id;
                window.open(href);
            });
            $('#table-table').on('click', 'td .preview', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href = '<?php echo site_url("purchase/view_detail") ?>' + "/" + id;
                window.open(href);
            });
            $('#table-table').on('click', 'td .pay', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href='<?php echo site_url("purchase_pay/pay/") ?>' +"/"+ id;
                window.location.href = href;
            });
        });
    </script>        
    <script type="text/javascript">
        $('#txt_supplier').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("supplier/search_supplier"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'supplier_table',
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
                change: function (event, ui) {
                    if(!ui.item){
                       
                        $('#txtsupplier_id').val('');
                        $('#txt_supplier').val('');
                    }else{
                        var names = ui.item.data.split("|");
                        $('#txtsupplier_id').val(names[1]);
                    }
                    

                }
            });
    </script>	
  
</body>
</html>
