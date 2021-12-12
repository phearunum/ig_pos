<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        foreach ($record_permission as $p) {
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
                        <input type="text" class="form-control text_input" name="txt_supplier" id="txt_supplier" autocomplete="off" placeholder="<?php echo $lbl_supplier; ?>">
                        <input type="hidden" name="txtsupplier_id" id="txtsupplier_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_invoice_no" id="txt_invoice_no" placeholder="<?php echo $lbl_po_number; ?>">
                      </div>
                       <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_branch" id="cbo_branch" >              
                            <option value="0"><?php echo $lb_allbranch; ?></option>
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
                      <div class="col-sm-1 col-xs-6 col-cs">
                       <!-- <?php if ($p->permission_add != 0) { ?> --><a class="btn btn-primary btn-block <?php echo $permission_add;?>" href='<?php echo site_url("purchase/addnew"); ?>'><i class="fa fa-plus"></i> <?php echo $lbl_new; ?></a><!-- <?php } ?> -->
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs hidden">
                        <button type="button" class="btn btn-danger btn-block" name="btn_extend"  id="btn_extend" onclick=""><i class="fa fa-arrow-circle-down"></i> <?php echo "Extend"; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
             <h4 class="text-center"><?php echo $lbl_list;?></h4>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?="Nº"?></th>
                        <th><?php echo "Reference Number"; ?></th>
                        <th><?php echo $lbl_po_number; ?></th>
                        <th><?php echo $lbl_po_date; ?></th>
                        <th><?php echo $lbl_supplier; ?></th>
                        <th><?php echo $lbl_supplier_phone; ?></th>
                        <th><?php echo $lbl_deposit; ?></th>
                        <th><?php echo $lbl_discount; ?></th>
                        <th><?php echo $lbl_total; ?></th>
                        <th><?php echo $lbl_credit; ?></th>
                        
                        <th><?php echo $lbl_status; ?></th>
                        <th><?php echo $lbl_branch; ?></th>
                        <th><?php echo $lbl_recorder; ?></th>
                        <th><?php echo $lbl_edit; ?></th>
                        <th><?php echo $lbl_view; ?></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot class="">
                    <tr>
                        <td></td><td></td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
            <script type="text/javascript">
                $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $(document).ready(function () {
                    
                     //$.noConflict();
                  
                    var table = $('#table-table').DataTable({
                        "bProcessing": false,
                        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                        "order": [[1, 'asc']],
                        "sAjaxSource": "<?php echo site_url("purchase/response"); ?>",
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
                            {mData: 'refference_no'},
                            {mData: 'purchase_created_date'},
                            {mData: 'supplier_name'},
                            {mData: 'supplier_phone'},
                            {mData: 'purchase_deposit'},
                            {mData: 'purchase_discount'},
                            {mData: 'purchase_total_amount','mRender':function(data){
                                return numeral(data).format('#.'+dot_0+'');
                            }},
                            {mData: 'purchase_credit','mRender':function(data){
                                 return numeral(data).format('#.'+dot_0+'');
                            }},
                            
                            {mData: 'status',mRender:function(data){
                                if(data==1){
                                    return 'Credit';
                                }else{
                                    return 'Paid';
                                }
                               
                            }},
                            {mData: 'branch_name'},
                            {mData: 'created_by'},
                            {mData: 'purchase_no',mRender:function(data){
                                    return '<a class="<?php echo $permission_edit;?>" href="<?php echo site_url("purchase/addnew_update")?>/'+data+'  " style=""><img src="<?=base_url('img/settings/edit.svg')?>"></a>';
                            }},
                            {mData: 'purchase_no',mRender:function(data){
                                
                                return '<?php if ($p->permission_delete != 0) { ?><a href="<?php echo site_url("purchase/view_detail")?>/'+data+'  " style=""><i class="fa fa-eye"></i></a><?php } ?>';
                                
                            }},
                        ]
                        , "aoColumnDefs": [
                            {"sClass": "hidden", "aTargets": [0,11]}],
                          "columnDefs": [{
                             "targets": 0
                            }
                        ],
                        "displayLength": 50,
                        "footerCallback": function () {
                        var api = this.api(),
                                data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };
                        total_dep = api
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        dep = api
                        .column( 6, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        total_dis = api
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        dis = api
                        .column( 7, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        total_total = api
                        .column( 8 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        total = api
                        .column( 8, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        total_credit = api
                        .column( 9 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                        credit = api
                        .column( 9, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
 
                        // Update footer                                        
                        //$(api.column(3).footer()).html((pageTotal).toFixed(2));
                        $( api.column( 10 ).footer() ).html(dep.toFixed(dot_num) +' of '+total_dep.toFixed(dot_num) +'');
                        $( api.column( 7 ).footer() ).html(dis.toFixed(dot_num) +' of '+total_dis.toFixed(dot_num) +'');
                        $( api.column( 8 ).footer() ).html(total.toFixed(dot_num) +' of '+total_total.toFixed(dot_num) +'');
                        $( api.column( 9).footer() ).html(credit.toFixed(dot_num) +' of '+total_credit.toFixed(dot_num) +'');
                        //$(api.column(6).footer()).html((pageTotalCredit).toFixed(3));
                    }
                        
                       
                    });
                // table.on('order.dt search.dt', function () {
                //     table.column(1, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                //         cell.innerHTML = i + 1;
                //     });
                // }).draw();

                $("form").on('submit', function (e) {
                    e.preventDefault();
                    var start_date,end_date,sup_id,po_id,branch_id;
                    start_date = $("#txt_date_from").val();
                    end_date = $("#txt_date_until").val();
                    sup_id = $("#txtsupplier_id").val();
                    po_id=$('#txt_invoice_no').val();
                    branch_id=$('#cbo_branch').val();
                    
                    var url = '<?php echo site_url("purchase/response_search?"); ?>' + 'sd=' + start_date + '&ed=' + end_date + '&sup_id=' + sup_id+'&po_id='+po_id+'&branch_id='+branch_id;
                    //alert(url);
                    table.clear().draw();
                    $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="15" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                    $.getJSON(url, null, function( json )
                    {        
                        table.rows.add(json.aaData).draw();
                    });
                });

                    
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
                $('#btn_extend').on('click',function(){
                    window.open('https://www.codexworld.com', '_blank');
                })

                function del(id){
                    var r = confirm("Are you sure want to delete this ingredient?");
                    if (r == false) {
                        return;
                    }
                    window.open("<?php echo site_url("ingredient/deletes"); ?>/"+id+" ","_self");
                   
                }

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
