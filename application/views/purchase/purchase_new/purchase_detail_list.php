<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach ($record_permission as $p) {
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
                        <input type="text" class="form-control text_input" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="<?php echo $lbl_part; ?>"> 
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_item_name" id="txt_item_name" value=""  placeholder="<?php echo $lbl_item; ?>">
                        <input type="hidden" name="txt_item_id" id="txt_item_id">
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
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_stock_location" id="cbo_stock_location" >              
                            <option value="0"><?php echo $lbl_allstock; ?></option>
                            
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
                        <th><?php echo $lbl_no;?></th>
                        <th><?php echo $lbl_po;?></th>
                        <th><?php echo $lbl_sup; ?></th>
                        <th><?php echo $lbl_p_date ?></th>
                        <th><?php echo $lbl_part; ?></th>
                        <th><?php echo $lbl_item; ?></th>
                        <th><?php echo $lbl_measure; ?></th>
                        <th><?php echo $lbl_retail_qty ?></th>
                        <th><?php echo $lbl_retail_amount; ?></th>
                        <th><?php echo $lbl_unit_price; ?></th>
                        <th><?php echo $lbl_qty ?></th>
                        <th><?php echo $lbl_total; ?></th>
                        <th><?php echo $lbl_branch; ?></th>
                        <th><?php echo $lbl_stock; ?></th>
                        <th><?php echo $lbl_status; ?></th>
                        <th><?php echo $lbl_edit; ?></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php echo $lbl_grand_total;?>:</td>
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

                    var table = $('#table-table').DataTable({
                        "bProcessing": false,
                        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                        "columnDefs": [
                            {"sClass": "hidden", "aTargets": [0,1,2,3]},
                            { "orderable": false, "targets":[0,4,5,6,7,8,9,10,11] }
                        ],
                        "sAjaxSource": "<?php echo site_url('report_purchase_detail/response'); ?>",
                        "aoColumns": [
                            {mData: 'purchase_no'},
                            {mData: 'po_supplier'},
                            {mData: 'supplier_name'},
                            {mData: 'purchase_created_date'},
                            {mData: 'item_detail_part_number'},
                            {mData: 'item_detail_name'},
                            {mData: 'measure_name'},
                            {mData: 'measure_qty','mRender':function(data,type,row){
                                return data*row.purchase_detail_qty;
                            }},
                            {mData: 'purchase_detail_unit_cost','mRender':function(data,type,row){
                                return numeral(data/row.measure_qty).format('#.'+dot_0+'');
                            }},
                            {mData: 'purchase_detail_unit_cost'},
                            {mData: 'purchase_detail_qty'},
                            {mData: 'purchase_detail_total_amount'},
                            {mData: 'branch_name'},
                            {mData: 'stock_location_name'},
                            {mData: 'status',mRender:function(data){
                                if(data==1){
                                    return 'Credit';
                                }else{
                                    return 'Paid';
                                }

                            }},
                            {mData: 'purchase_no',mRender:function(data){
                                    return '<?php if ($p->permission_edit != 0) { ?><a href="<?php echo site_url("purchase/addnew_update")?>/'+data+'"><img src="<?=base_url('img/settings/edit.svg')?>"></a><?php } ?>';
                            }},
                        ],
                        "displayLength": 50,
                        "order": [[0, 'desc']],
                        "aoColumnDefs": [
                            {"sClass": "hidden", "aTargets": [15]}],
                        "drawCallback": function ( settings ) {
                            var api = this.api(),data;
                            var rows = api.rows( {page:'current'} ).nodes();
                            var last=null;

                            // Remove the formatting to get integer data for summation
                            var intVal = function ( i ) {
                                return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '')*1 :
                                    typeof i === 'number' ?
                                        i : 0;
                            };
                            total=new Array();
                            data_group = new Array();
                            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                                group_assoc=group.replace(/[^a-zA-Z0-9 ]/g, "").replace(/ /g, '_');
                                data_group[i]=group_assoc;
                                if(typeof total[group_assoc] != 'undefined'){
                                    //total[group_assoc][1]=total[group_assoc][1]+intVal(api.column(9,{page:'current'}).data()[i]);
                                    total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(10,{page:'current'}).data()[i]);
                                    total[group_assoc][1]=total[group_assoc][1]+intVal(api.column(11,{page:'current'}).data()[i]);

                                }else{
                                    total[group_assoc] =  new Array();
                                    //total[group_assoc][0]=intVal(api.column(9,{page:'current'}).data()[i]);
                                    total[group_assoc][0]=intVal(api.column(10,{page:'current'}).data()[i]);
                                    total[group_assoc][1]=intVal(api.column(11,{page:'current'}).data()[i]);
                                }
                                var j = i;
                                if ( last !== group ) {
                                    var dataGroup='<tr class="group"><td colspan="11">'+group+'</td><td></td><td></td><td></td><td></td></tr>';
                                    j=j+1;
                                    if(j!=1){
                                        var dataGroupTotal='<tr class="group_footer"><td colspan="10"><?php echo $lbl_sub_total;?> :</td><td class="'+data_group[i-1]+'_qty"></td><td class="'+data_group[i-1]+'_Total"></td><td></td><td></td><td></td></tr>';
                                    $(rows).eq( i ).before(dataGroupTotal);
                                    }
                                    $(rows).eq( i ).before(dataGroup);
                                    last = group;
                                }
                            });
                            var CategoryLeng = data_group.length;
                            $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="10"><?php echo $lbl_sub_total;?> :</td><td class="'+data_group[CategoryLeng-1]+'_qty"></td><td class="'+data_group[CategoryLeng-1]+'_Total"></td><td></td><td></td><td></td></tr>');
                            for(var key in total) {
                                $("."+key+'_qty').html(total[key][0]);
                                $("."+key+'_Total').html(total[key][1].toFixed(dot_num));
                            }
                        },
                        "footerCallback": function (nRow) {
                            var api = this.api(), data;
                            // Remove the formatting to get integer data for summation
                            var intVal = function (i) {
                                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                            };
                            //TOTAL BY ROW
                            r_qty = api.column(8, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);
                            total_r_qty = api
                            .column( 8 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            //

                            r_price = api.column(9, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);
                            total_r_price = api
                            .column( 9 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            //

                            u_price = api.column(10, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);
                            total_u_price = api
                            .column( 10 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                            qty = api.column(11, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);
                            total_qty = api
                            .column( 11 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                            total = api.column(12, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);

                            total_total = api

                            .column( 12 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            // END TOTAL BY ROW

                            /* Modify the footer row to match what we want */
                            var nCells_1 = nRow.getElementsByTagName('td');
                            var nCells_2 = nRow.getElementsByTagName('td');

                            nCells_2[9].innerHTML = r_qty.toFixed(0)+ ' of ' + total_r_qty.toFixed(0);
                            //nCells_2[8].innerHTML = r_price.toFixed(5)+ ' of ' + total_r_price.toFixed(5);
                            nCells_2[10].innerHTML = u_price.toFixed(dot_num)+ ' of ' + total_u_price.toFixed(dot_num);
                            nCells_1[11].innerHTML = qty.toFixed(dot_num)+' of ' + total_qty.toFixed(dot_num);
                            // nCells_2[12].innerHTML = total.toFixed(dot_num)+ ' of ' + total_total.toFixed(dot_num);
                        },
                   });

                    $("form").on('submit', function(e) {
                        e.preventDefault();
                        var start_date, end_date, sup_id, po_id,branch_id,part,item,stock;
                        start_date = $("#txt_date_from").val();
                        end_date = $("#txt_date_until").val();
                        sup_id = $("#txtsupplier_id").val();
                        po_id = $('#txt_invoice_no').val();
                        branch_id=$('#cbo_branch').val();
                        part=$('#txtpartnumber').val();
                        item=$('#txt_item_id').val();
                        stock=$('#cbo_stock_location').val();
                        var url = '<?php echo site_url("report_purchase_detail/response_search?"); ?>' + 'sd=' + start_date + '&ed=' + end_date + '&sup_id=' + sup_id + '&po_id=' + po_id+'&branch_id='+branch_id+'&part='+part+'&item='+item+'&stock='+stock;
                        table.clear().draw();
                        $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="15" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                        $.getJSON(url, null, function( json )
                        {        
                            table.rows.add(json.aaData).draw();
                        });

                    });

                //  var tables = $('#table-table').DataTable();
                //  var No = 0,init = 0;
                //     tables.on('search.dt', function () {
                //          tables.column(0, {search: 'applied'}).nodes().each(function (cell, i) {
                //          if(cell.innerHTML == init)
                //              No = No+1;
                //          else
                //              No = 1;
                //          init = cell.innerHTML;
                //          cell.innerHTML = No;
                //     });
                //          No = 0,init = 0;
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
                       window.location.href = href;
                   });
               });
                    function myFunction() {
                        $(function() {
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
               function del(id){
                   var r = confirm("Are you sure want to delete this ingredient?");
                   if (r == false) {
                       return;
                   }
                   window.open("<?php echo site_url("ingredient/deletes"); ?>/"+id+" ","_self");
               }
                $('#txt_supplier').autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: '<?php echo site_url("supplier/search_supplier"); ?>',
                            dataType: "json",
                            data: {
                                name_startsWith: request.term,
                                type: 'supplier_table',
                                row_num: 1
                            },
                            success: function(data) {
                                response($.map(data, function(item) {
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
                    change: function(event, ui) {
                        if (!ui.item) {
                            $('#txtsupplier_id').val('');
                            $('#txt_supplier').val('');

                        } else {
                            var names = ui.item.data.split("|");
                            $('#txtsupplier_id').val(names[1]);
                        }
                    }
                });
                $('#txt_item_name').autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: '<?php echo site_url('purchase/searchproduct'); ?>',
                            dataType: "json",
                            data: {
                                name_startsWith: request.term,
                                type: 'purchase_item_name',
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
                        if(ui.item===null){
                            $('#txt_item_id').val('');
                            $(this).val('');
                        }else{
                            var names = ui.item.data.split("|");
                            $('#txt_item_id').val(names[1]);
                        }
                        
                    }
                });
                $('#cbo_branch').change(function(){
                    var id=$(this).val();
                    if(id>0){
                         $('#cbo_stock_location').html('<option value="0">--All Stock--</option>');
                        $.ajax({
                            url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                            type:'get',
                            success:function(data){
                                var json=JSON.parse(data);
                                $.each(json,function(i,v){
                                    $('#cbo_stock_location').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                                })
                            }
                        })
                    }else{
                        $('#cbo_stock_location').html('<option value="0">--All Stock--</option>');
                    }
                    
                });
            </script>
            <?php   }  ?>
    </body>
</html>
