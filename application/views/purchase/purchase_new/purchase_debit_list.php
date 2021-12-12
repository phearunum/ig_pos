<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
    </head>
    <body>
        <!-- <?php
        foreach ($record_permission as $p) {
            ?> -->

            <?php 
            $permission_edit = "disabled";
            $permission_add = "disabled";  
            $permission_delete = "disabled";
            $add_link ="";
            $edit_link="";
            $delete_link="";        
            foreach ($record_permission as $key => $value) {                                
                if($value->permission_edit=="1"){
                    $permission_edit = "";
                    $edit_link='href=""';
                }
                if($value->permission_add=="1"){
                    $permission_add = "";
                    $add_link='href=""';
                }
                if($value->permission_delete=="1"){
                    $permission_delete = "";
                    $delete_link='href=""';
                }                
            }
                            
        ?>

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
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo $lbl_no; ?><!--<?php //if ($p->permission_add != 0) { ?><a href='<?php //echo site_url("purchase/addnew"); ?>'><?php //echo $lbl_new; ?></a><?php //} ?>--></th>
                        <th><?php echo $lbl_po; ?></th>
                        <th><?php echo $lbl_po_date ?></th>
                        <th><?php echo $lbl_sup; ?></th>
                        <th><?php echo $lbl_sup_phone; ?></th>
                        <th><?php echo $lbl_total; ?></th>
                        <th><?php echo $lbl_credit; ?></th>
                        <th><?php echo $lbl_branch; ?></th>
                        <th><?php echo $lbl_status; ?></th>
                        <th><?php echo $lbl_recorder; ?></th>
                       <!--  <th><?php echo $lbl_edit; ?></th> -->
                        <!-- <th><?php echo $lbl_view; ?></th> -->
                    </tr>
                </thead>
                 <tfoot class="">
                    <td></td>
                    <td><?php echo $lbl_grand_total;?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td> 
                    <td></td>
                    <td></td> 
                    <td></td>
                    <td></td> 
                    <!-- <td></td> -->
                    <!-- <td></td> --> 
                </tfoot>
               
            </table>
        </div>
            <script type="text/javascript">
                 $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $(document).ready(function () {
                    var table = $('#table-table').DataTable({
                        "bProcessing": true,
                        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                        "sAjaxSource": "<?php echo site_url("report_purchase_dept/response"); ?>",
                        "aoColumns": [
                            {mData: 'purchase_no'},
                            {mData: 'purchase_no',render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }},
                            {mData: 'purchase_no','mRender':function(data,type,row){
                                if(row.status==0){
                                    return numeral(data).format('000000');
                                }else{
                                    //return numeral(data).format('000');
                                    return '<a href="report_purchase_dept/addnew_pay/'+data+' " style=" TEXT-decoration: underline;">'+numeral(data).format('000000')+'</a>';
                                }
                                
                            }},
                            {mData: 'purchase_created_date'},
                            {mData: 'supplier_name'},
                            {mData: 'supplier_phone'},
                        
                            {mData: 'purchase_total_amount','mRender':function(data){
                                return numeral(data).format('#.'+dot_0+'');
                            }},
                            {mData: 'purchase_credit','mRender':function(data){
                                return numeral(data).format('#.'+dot_0+'');
                            }},
                            {mData: 'branch_name'},
                            {mData: 'status',mRender:function(data){
                                if(data==1){
                                    return 'Credit';
                                }else{
                                    return 'Paid';
                                }
                               
                            }},
                            {mData: 'created_by'},
                            // {mData: 'purchase_no',mRender:function(data){
                            //         return '<a class="<?php echo $permission_edit;?>" href="<?php echo $edit_link;?><?php echo site_url("purchase/addnew_update")?>/'+data+'"><img src="<?=base_url('img/settings/edit.svg')?>"></a>';
                            // }},
                            // {mData: 'purchase_no',mRender:function(data){
                            //     return '<?php if ($p->permission_viewall != 0) { ?><a href="<?php echo site_url("purchase/view_detail")?>/'+data+'  " style=""><i class="fa fa-eye"></i></a><?php } ?>';
                            // }},
                        ]
                        , "aoColumnDefs": [
                            {"sClass": "hidden", "aTargets": [0]}],
                          "columnDefs": [{
                             "targets": 0
                            }
                        ],
                        "displayLength": 50,
                        "order": [[1, 'asc']],
                        "footerCallback": function () {
                    var api = this.api(),
                            data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                        total_total = api
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        total = api
                        .column( 6, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        total_credit = api
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        credit = api
                        .column( 7, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer                                        
                    //$(api.column(3).footer()).html((pageTotal).toFixed(2));
                    //$(api.column(4).footer()).html((pageTotalCredit).toFixed(2));
                    $( api.column( 6 ).footer() ).html(total.toFixed(dot_num) +' of '+total_total.toFixed(dot_num) +'');
                    $( api.column( 7 ).footer() ).html(credit.toFixed(dot_num) +' of '+total_credit.toFixed(dot_num) +'');
                    //$( api.column( 4 ).footer() ).html(pageTotal.toFixed(5) +' of '+pageTotalCredit.toFixed(5) +'');

                }
                                                        
                                                       
                });

                    $("#form").on('submit', function (e) {
                            e.preventDefault();
                            var df, dt, suppler_name, invoice_no,sup_id,branch_id;
                            df = $("#txt_date_from").val();
                            dt = $("#txt_date_until").val();
                            suppler_name = $("#txt_supplier").val();
                            invoice_no = $('#txt_invoice_no').val();
                            sup_id=$('#txtsupplier_id').val();
                            branch_id=$('#cbo_branch').val();
                            var url = '<?php echo site_url("report_purchase_dept/responses?"); ?>' + 'df=' + df + '&dt=' + dt + '&supplier_name=' + suppler_name + '&invoice=' + invoice_no+'&sup_id='+sup_id+'&branch_id='+branch_id;

                            table.clear().draw();
                            $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="13" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                            $.getJSON(url, null, function( json )
                            {        
                                table.rows.add(json.aaData).draw();
                            });
                        });

            // var tables = $('#table-table').DataTable();
            // tables.on('order.dt search.dt', function () {
            //     tables.column(1, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            //         cell.innerHTML = i + 1;
            //     });
            // }).draw();

                
                $('#table-table').on('click', 'td .delete', function (e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href = '<?php echo site_url("ingredient/delete") ?>' + "/" + id;
                    //  $('a.delete', $(this)).attr('href', href);
                    if (confirm('Do you want to delete this record?')) {
                        window.location.href = href;
                    } else {
                        // Do nothing!
                    }
                });
                $('#table-table').on('click', 'td .edit', function (e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href = '<?php echo site_url("ingredient/edit_load") ?>' + "/" + id;
                    //  $('a.delete', $(this)).attr('href', href);
                    window.location.href = href;
                });
            });

            

            function del(id){
                var r = confirm("Are you sure want to delete this ingredient?");
                if (r == false) {
                    return;
                }
                window.open("<?php echo site_url("ingredient/deletes"); ?>/"+id+" ","_self");
               
            }

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
            <?php
            }
        ?>
    </body>
</html>
