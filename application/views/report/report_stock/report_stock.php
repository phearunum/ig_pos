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
            <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="<?php echo $lbl_part; ?>"> 
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_item_name" id="txt_item_name" value=""  placeholder="<?php echo $lbl_item_name; ?>">
                        <input type="hidden" name="txt_item_id" id="txt_item_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_item_type" id="txt_item_type" autocomplete="off" placeholder="<?php echo $lbl_item_type; ?>">
                        <input type="hidden" name="txt_item_type_id" id="txt_item_type_id">
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
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        <table width='100%'>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="0">
                        <thead>
                            <tr>
                                <td class="form-title" colspan="12" style="text-align: center;">
                                    <?php echo $lbl_title ?>
                                </td>
                            </tr>
                            <tr class="">
                                <th><?php echo $lbl_part; ?></th>                              
                                <th><?php echo $lbl_item_name; ?></th>
                                <th><?php echo $lbl_item_type; ?></th>     
                                <th><?php echo $lbl_group; ?></th>
                                <th><?php echo $lbl_qty; ?></th>
                                <th><?php echo $lbl_cost; ?></th>
                                <th><?php echo $lbl_total_cost; ?></th>
                                <th><?php echo "Expire Date " ?></th>
                                <th><?php echo $lbl_alert; ?></th>
                                <th><?php echo $lbl_stock_location ?></th>
                                <th><?php echo $lbl_branch ?></th>
                                <th><?php echo $lbl_stockdate; ?></th>
                            </tr>
                        </thead>
               
                        <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Grand Total:</td>
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
                </td>
            </tr>
        </table> 
    </div>
        <script type="text/javascript">
            $(document).ready(function () {
                var data_table=$('#table2excel').DataTable({
                    "bProcessing": true,
                    "sAjaxSource": "<?php echo site_url("report_stock/response"); ?>",
                    "aoColumns": [
                        {mData: 'item_detail_part_number'},
                        {mData: 'item_detail_name',mRender:function(data){
                            return data;
                        }},
                        {mData: 'item_type_name'},
                        
                        
                        {mData: 'stock_qty',mRender:function(dat){
                            return '';
                        }},
                        {mData: 'stock_qty'},
                        {mData: 'stock_costing_by_measure_qty'},
                        {mData: 'total_costing_by_measure_qty'},
                        {mData: 'stock_expire_date'},
                        {mData: 'stock_alert_date'},
                        {mData: 'stock_location_name'},
                        {mData: 'branch_name'},
                        {mData: 'stock_created_date'}
                        
                       
                        
                    ],
                    "searching": false,
                    "iDisplayLength": 100,
                    "columnDefs": [
                        {"visible": false, "targets": [0,1,2]}
                    ],
                    "order": [[1, 'asc']],
                    "displayLength": 100,
                    
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
                                    total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(4,{page:'current'}).data()[i]);
                                    total[group_assoc][1]=total[group_assoc][1]+intVal(api.column(6,{page:'current'}).data()[i]);
                                  

                                }else{
                                    total[group_assoc] =  new Array();
                                    total[group_assoc][0]=intVal(api.column(4,{page:'current'}).data()[i]);
                                    total[group_assoc][1]=intVal(api.column(6,{page:'current'}).data()[i]);
                                   
                                }
                                var j = i;
                                if ( last !== group ) {
                                    var part_num = api.column(0,{page:'current'}).data()[i];
                                    var item_type = api.column(2,{page:'current'}).data()[i];
                                    var dataGroup='<tr class="group"><td class="">' +'#: '+ part_num + '</td><td colspan="2">' +'Item Name: '+ group + '</td> <td colspan="7">' +'Item Type: '+ item_type + '</td></tr>';
                                    j=j+1;
                                    if(j!=1){
                                        var dataGroupTotal='<tr class="group_footer"><td><?php echo "Sub Total";?> :</td><td class="'+data_group[i-1]+'_qty"></td><td></td></td><td colspan="6" class="'+data_group[i-1]+'_Total"></tr>';
                                    $(rows).eq( i ).before(dataGroupTotal);
                                    }
                                    $(rows).eq( i ).before(dataGroup);
                                    last = group;
                                }
                            });
                            var CategoryLeng = data_group.length;
                            $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td><?php echo "Sub Total";?> :</td><td class="'+data_group[CategoryLeng-1]+'_qty"></td><td></td><td colspan="6" class="'+data_group[CategoryLeng-1]+'_Total"></tr>');
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
                            qty = api.column(4, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);
                            total_qty = api
                            .column( 4 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            //

                            cost = api.column(6, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);
                            total_cost = api
                            .column( 6 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            //

                           
                            //var nCells_1 = nRow.getElementsByTagName('td');
               
                            $( api.column( 4 ).footer() ).html(qty.toFixed(0)+ ' of ' + total_qty.toFixed(0));
                            $( api.column( 6 ).footer() ).html(cost.toFixed(dot_num)+ ' of ' + total_cost.toFixed(dot_num));
                            //nCells_1[4].innerHTML = qty.toFixed(3)+ ' of ' + total_qty.toFixed(3);
                            //nCells_1[6].innerHTML = cost.toFixed(3)+ ' of ' + total_cost.toFixed(3);

                        },
                });
                
                $("#form").on('submit', function (e) {
                    e.preventDefault();
                    var item_detail_name, item_type,part_number,stock_location,branch_id;
                    
                    stock_location   = $("#cbo_stock_location").val();
                    item_detail_name = $("#txt_item_id").val();
                    item_type        = $('#txt_item_type_id').val();
                    part_number      = $('#txtpartnumber').val();
                    branch_id        =$('#cbo_branch').val();
                    
                    var url = '<?php echo site_url("report_stock/responses?"); ?>' +'item_name=' + item_detail_name + '&item_type=' + item_type + '&stock_location=' + stock_location + '&partnumber=' + part_number+'&branch_id='+branch_id;
                    data_table.clear().draw();
                    $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                    $.getJSON(url, null, function( json )
                    {        
                        data_table.rows.add(json.aaData).draw();
                    });
                });
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
                if(ui.item==null){
                    $('#txt_item_id').val('');
                    $(this).val('');
                }else{
                    var names = ui.item.data.split("|");
                    $('#txt_item_id').val(names[1]);
                }
                
            }
        });
        
        $('#txt_item_type').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('search/search_filter'); ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'category',
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
                if(ui.item==null){
                    $('#txt_item_type_id').val('');
                    $(this).val('');
                }else{
                    var names = ui.item.data.split("|");
                    $('#txt_item_type_id').val(names[1]);
                }
                
            }
        });
        $('#txt_item_name').change(function(){
            var n=$('#txt_item_name').val();
            if(n==""){
                $('#txt_item_id').val("");
            }
        });
        $('#txt_item_type').change(function(){
            var n=$('#txt_item_type').val();
            if(n==""){
                $('#txt_item_type_id').val("");
            }
        });
        $('#cbo_branch').change(function(){
            var id=$(this).val();

            if(id>0){
                 $('#cbo_stock_location').html('<option value="0"><?php echo $lbl_allstock; ?></option>');
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
                $('#cbo_stock_location').html('<option value="0"><?php echo $lbl_allstock; ?></option>');
            }
            
        });
        </script>
    </body>
</html>
