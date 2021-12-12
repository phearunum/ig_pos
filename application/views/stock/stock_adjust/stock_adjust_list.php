<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            function myFunction() {
                $(function () {
                    $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "List Stock Adjustment",
                        fileext: ".xls",
                        exclude_img: false,
                        exclude_links: false,
                        exclude_inputs: false
                    });
                });
            }
            function save_edit(){
                var qty=$('#txt_qty').val();
                var qty_old =$('#txt_qty_old').val();
                var id=$('#txt_id').val();
                if(confirm('Are you sure to update qty?')){

                }else{
                    return false;
                }
                $.ajax({
                    url:'<?php echo site_url('stock/stock_adjust_update')?>',
                    type:'post',
                    data:{'id':id,'qty':qty,'qty_old':qty_old},
                    success:function(rep){
                        var json=JSON.parse(rep);
                        if(json.status=='S001'){
                            alert(json.message);
                            var table = $('#table-table').DataTable();
                            table.ajax.reload(function(data){
                                $('#myModal').modal('hide');
                            });
                        }else{
                            alert(json.message);
                            return false;
                        }
                    }
                })
            }
        </script>
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
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Update Stock Increase</h4>
                    </div>
                    <div class="modal-body">

                      <div class="col-md-12">
                         
                              <div class="form-group">
                                  <label><?php echo "Qty" ?></label>
                                  <input class="form-control hidden" type="text"  name="txt_id" placeholder="ID" value="" id="txt_id">
                                  <input class="form-control text_input" type="text"  name="txt_qty" placeholder="Qty" value="" id="txt_qty" required>
                                  <input class="form-control hidden" type="text"  name="txt_qty_old" placeholder="Qty Old" value="" id="txt_qty_old" required>
                                  <div class="border"></div>
                              </div>
                       
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" onclick="save_edit()">Save</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
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
                        <input type="text" class="form-control text_input" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="<?php echo $lbl_part; ?>"> 
                      </div>

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_item_name" id="txt_item_name" value=""  placeholder="<?php echo $lbl_item_name; ?>">
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
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <!-- <?php if ($p->permission_add != "disabled") { ?> --><a class="btn btn-primary btn-block <?php echo $permission_add;?>" href='<?php echo site_url("stock/adjust"); ?>'><i class="fa fa-plus"></i> <?php echo $lbl_new ?></a><!-- <?php } ?> -->
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h4 class="text-center"><?php echo $lbl_title;?></h4>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><?php echo $lbl_part; ?></th>
                        <th><?php echo $lbl_item_name ?></th>
                        <th><?php echo $lbl_stock_qty ?></th>
                        <th><?php echo $lbl_branch ?></th>
                        <th><?php echo $lbl_stock_location ?></th>
                        <th><?php echo $lbl_stock_description ?></th>
                        <th><?php echo $lbl_stock_date ?></th>
                        <th><?php echo $lbl_stock_by ?></th>
                        <!-- <th><?php echo $lbl_edit ?></th> -->
                        <th><?php echo "Action" ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
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
                        <td></td>
                        
                    </tr>
                </tfoot>
            </table>
            <?php
        }
        ?>
    </div>
        <script type="text/javascript">
            $(document).ready(function () {
                var data_table = $('#table-table').DataTable({
                    "bProcessing": true,
                    "sAjaxSource": "<?php echo site_url("stock/response_stock_adjust"); ?>",
                    "aoColumns": [
                        {mData: 'stock_adjust_id'},
                        {"sTitle": "", "sDefaultContent": ''},
                        //LOAD ROW
                        {mData: 'item_detail_part_number'},
                        {mData: 'item_detail_name'},
                        {mData: 'stock_adjust_qty'},
                        {mData: 'branch_name'},
                        {mData: 'stock_location_name'},
                        {mData: 'stock_adjust_note'},
                        {mData: 'date_entry'},
                        {mData: 'recorder'},
                        { "sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'}
                                        //END LOAD ROW
                    ],
                    "aaSorting": []
                    ,"aoColumnDefs": [
                            {
                                "sClass": "hidden", "aTargets": [0,3]}
                    ],
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
                                }else{
                                    total[group_assoc] =  new Array();
                                    total[group_assoc][0]=intVal(api.column(4,{page:'current'}).data()[i]);
                                }
                                var j = i;
                                if ( last !== group ) {
                                    var dataGroup='<tr class="group"><td colspan="12">' +'<?php echo $lbl_stock_itemName ?>: '+ group + '</td> </tr>';
                                    j=j+1;
                                    if(j!=1){
                                        var dataGroupTotal='<tr class="group_footer"><td colspan="2"><?php echo "Sub Total";?> :</td><td colspan="10" class="'+data_group[i-1]+'_qty"></td></tr>';
                                    $(rows).eq( i ).before(dataGroupTotal);
                                    }
                                    $(rows).eq( i ).before(dataGroup);
                                    last = group;
                                }
                            });
                            var CategoryLeng = data_group.length;
                            $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="2"><?php echo "Sub Total";?> :</td><td colspan="10" class="'+data_group[CategoryLeng-1]+'_qty"></td></tr>');
                            for(var key in total) {
                                $("."+key+'_qty').html(total[key][0]);
                               
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

                           

                           
                            //var nCells_1 = nRow.getElementsByTagName('td');
               
                            $( api.column( 4 ).footer() ).html(qty.toFixed(0)+ ' of ' + total_qty.toFixed(0));
                            

                        }
                                                        
                });

            //EVENT CLICK LINK
            $('#table-table').on('click', 'td .delete', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href = '<?php echo site_url("stock/delete_stock_adjust") ?>' + "/" + id;
                //  $('a.delete', $(this)).attr('href', href);
                if (confirm('Do you want to delete this record?')) {
                    //window.location.href = href;
                    $.ajax({
                        url:href,
                        type:'get',
                        success:function(req){
                            var json=JSON.parse(req);
                            if(json.status=='S001'){
                                //var table = $('#example').DataTable();
 
                                data_table.ajax.reload( function ( json ) {
                                    $('#myInput').val( json.lastInput );
                                } );
                            }else{
                                alert(json.message);
                                return false;
                            }
                        }
                    });
                } else {
                    // Do nothing!
                }
            });
            $('#table-table').on('click', 'td .edit', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var qty=$(this).closest('tr').find('td').eq(4).html();
                $('#txt_qty').val(qty);
                $('#txt_qty_old').val(qty);
                $('#txt_id').val(id);
                $('#myModal').modal('toggle');
            });
            //END EVENT CLICK LINK
            
            //AJAX FORM SUBMIT
            $("#form").on('submit', function (e) {
                e.preventDefault();

                var df, dt,branch,stock,part,item;
                df = $("#datefrom").val();
                dt = $("#dateto").val();
                branch=$('#cbo_branch').val();
                stock=$('#cbo_stock_location').val();
                part=$('#txtpartnumber').val();
                item=$('#txt_item_name').val();

                var url = '<?php echo site_url("stock/search_stock_adjust?"); ?>' + 'df=' + df + '&dt=' + dt+'&branch='+branch+'&stock='+stock+'&part='+part+'&item='+item;

                data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="12" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, null, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
            });
            //END AJAX FORM SUBMIT
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

        });
        </script>
        <script type="text/javascript">
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            });
        </script>
    </body>
</html>
