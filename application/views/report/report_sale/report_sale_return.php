<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Sale Return"; ?></title>
    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
            <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_date_from" id="txt_date_from" autocomplete="off" placeholder="FROM:YYYY-MM-DD"> 
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_date_until" id="txt_date_until" autocomplete="off"  placeholder="TO:YYYY-MM-DD">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="item_name" id="item_name" autocomplete="off" placeholder="ITEM NAME">
                        <input type="hidden" name="sale_master_id" id="sale_master_id" class="form-control">
                      </div>
                      <!-- <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="brand" id="brand">
                            <option value="">Brand</option>
                           
                        </select>
                      </div> -->
                      
                     <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cbo_branch" id="cbo_branch" class="form-control">
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

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_recorder" id="cbo_recorder" >              
                            <option value="0">--All Recorder--</option>
                            
                        </select>
                      </div>

                      <!-- <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_modify" id="txt_modify" autocomplete="off"  placeholder="Recorder By">
                      </div>
 -->
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block"><i class="fa fa-search"></i> <?php echo "Search"; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport"><i class="fa fa-arrow-circle-down"></i> <?php echo "Export"; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h3 class="text-center"> <?php echo "Report Sale Return" ?></h3>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
                <thead>                
                    <tr>
                        <th>Invoice</th>
                        <th>Table</th>
                        <th><?php echo "Item Name" ?></th>
                        <th><?php echo "Qty"?></th>
                        <th><?php echo "Price" ?></th>   
                        <th><?php echo "Sub Total" ?></th>
                        <th><?php echo "Recorder" ?></th>
                        <th><?php echo "Return Date" ?></th>    
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <td>Grand Total:</td>
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
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Sale Summary List_'+ new Date(),
                        exportOptions: {
                            columns: [ 1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14 ]
                        }
                    }
                ],
                "bProcessing": false,
                "scrollX": true,
                "sAjaxSource": "<?php echo site_url("report_sale_return/response"); ?>",
                "aoColumns": [
                    {mData: 'invoice_no'},
                    {mData: 'layout_name'},
                    {mData: 'item_detail_name'},
                    {mData: 'sale_return_qty'},
                    {mData: 'sale_detail_unit_price'},
                    {mData: 'sub_total'},
                    {mData: 'employee_name'},
                    {mData: 'sale_return_created_date'}
         
                    
                ], 
                "order": [[0, "desc"]], "aoColumnDefs": [
                // {"sClass": "hidden", "aTargets": [0]},
                 {
                        "render": function ( data, type, row ) {
                            return null;
                        },
                        "targets": [ 0 ]
                    },
                ],
                "iDisplayLength": 50,
                "lengthMenu": [ [10, 25, 50,100, -1], [10, 25, 50,100, "All"] ],
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
                        api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                            group_assoc=group.replace(/[^a-zA-Z0-9 ]/g, "").replace(/ /g, '_');
                            data_group[i]=group_assoc;
                            if(typeof total[group_assoc] != 'undefined'){

                                total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(3,{page:'current'}).data()[i]);
                                total[group_assoc][1]=total[group_assoc][1]+intVal(api.column(4,{page:'current'}).data()[i]);
                                total[group_assoc][2]=total[group_assoc][2]+intVal(api.column(5,{page:'current'}).data()[i]);
                                
                            }else{
                                total[group_assoc] =  new Array();
                                total[group_assoc][0]=intVal(api.column(3,{page:'current'}).data()[i]);
                                total[group_assoc][1]=intVal(api.column(4,{page:'current'}).data()[i]);
                                total[group_assoc][2]=intVal(api.column(5,{page:'current'}).data()[i]);
                              
                            }
                            var j = i;
                            if ( last !== group ) {
                                var invoice_no = api.column(0,{page:'current'}).data()[i];
                                var dataGroup='<tr class="group"><td colspan="3">'+invoice_no+'</td><td ></td><td></td><td></td><td></td><td></td></tr>';
                                j=j+1;
                                if(j!=1){
                                    var dataGroupTota='<tr class="group_footer"><td colspan="3">SubTotal :</td><td class="'+data_group[i-1]+'_Qty"></td><td class="'+data_group[i-1]+'_Price"></td><td class="'+data_group[i-1]+'_Discount"></td><td></td><td></td></tr>';

                                $(rows).eq( i ).before(dataGroupTota);
                                }
                                $(rows).eq( i ).before(dataGroup);
                                last = group;
                            }
                        });
                        var CategoryLeng = data_group.length;
                        $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="3">SubTotal :</td><td class="'+data_group[CategoryLeng-1]+'_Qty"></td><td class="'+data_group[CategoryLeng-1]+'_Price"></td><td class="'+data_group[CategoryLeng-1]+'_Discount"></td><td></td><td></td></tr>');
                        for(var key in total) {
                            $("."+key+'_Qty').html(total[key][0]);
                            $("."+key+'_Price').html(total[key][1].toFixed(2));
                            $("."+key+'_Discount').html(total[key][2].toFixed(2));
                        }
                    },  
                    "footerCallback": function (nRow) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };
                        //TOTAL BY ROW
                        qty = api.column(3, {page: 'current'})
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);
                        }, 0);
                        total_qty = api.column(3, {page: 'all'})
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);
                        }, 0);
                        //Total Discount
                        total_discount = api.column(4, {page: 'current'})
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);
                        }, 0);
                        total_discount_all = api.column(4, {page: 'all'})
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);
                        }, 0);
                        //Total Vat
                        total_vat = api.column(5, {page: 'current'})
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);
                        }, 0);
                        total_vat_all = api.column(5, {page: 'all'})
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');
                                return total + parseFloat(bb);
                        }, 0);
                          
                      
                        var nCells = nRow.getElementsByTagName('td');
                        nCells[3].innerHTML = qty.toFixed(0)+ ' of ' + total_qty.toFixed(0);
                        nCells[4].innerHTML = total_discount.toFixed(2)+ ' of ' + total_discount_all.toFixed(2);
                        nCells[5].innerHTML = total_vat.toFixed(2)+ ' of ' + total_vat_all.toFixed(2);
                       
                    }
               
                //

            });
             $("#btnexport").click(function(event) {
                 table.button('.buttons-excel').trigger();
            });
            $("#form").on('submit', function (e) {
                e.preventDefault();
                 var data = $(this).serialize();
                    var url = '<?php echo site_url("report_sale_return/responses"); ?>';
                    table.clear().draw();
                    $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="13" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                    $.getJSON(url, data, function( json )
                    {        
                        table.rows.add(json.aaData).draw();
                    });
            });
            $('#table-table').on('click', 'td .void', function (e) {
                e.preventDefault()
                var sale_id = $(this).closest('tr').find('td:first').html();
                if (confirm("Are you sure, you want to delete the selected invoice?") == false) {
                    return false;
                }
                var post_url = '<?php echo site_url('retail_sale/void') ?>';
                var datas = {
                    'txt_sale_id': sale_id
                };
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    data: datas,
                    success: function (response) {
                        location.reload();
                    },
                    error: function (response) {

                    }
                });
            });
            //
            $('#item_name').on('blur', function() {
                if($(this).val()=="")
                    $('#sale_master_id').val("");

            });
            $('#txt_seller_name').on('blur', function() {
                if($(this).val()=="")
                    $('#txt_seller_id').val("");

            });
        });
    </script>        
    <script type="text/javascript">
        $('#customer_name').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'customer_table_all',
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
        // laod by branch
        $('#cbo_branch').change(function(){
            var id=$(this).val();

            if(id>0){
                 $('#cbo_recorder').html('<option value="0">--All Recorder--</option>');
                $.ajax({
                    url:'<?php echo site_url('report_sale_return/get_recorder')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_recorder').append('<option value="'+v.employee_id+'">'+v.employee_name+'</option>');
                        })
                    }
                })
            }else{
                $('#cbo_recorder').html('<option value="0">--All Recorder--</option>');
            }
            
        });

    </script>	
</body>
</html>