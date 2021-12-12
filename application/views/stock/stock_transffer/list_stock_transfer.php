<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
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
                        <input type="text" class="form-control text_input" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="<?php echo $lbl_part?>"> 
                      </div>

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_item_name" id="txt_item_name" value=""  placeholder="<?php echo $lbl_item_name?>">
                        <input type="hidden" name="txt_item_id" id="txt_item_id">
                      </div>
                       <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_branch_from" id="cbo_branch_from" >              
                            <option value="0"><?php echo $lbl_from?></option>
                            <?php
                            foreach ($branch as $b) {
                                ?>
                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                            <?php } ?>
                        </select>
                      </div>

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_stock_location_from" id="cbo_stock_location_from" >              
                            <option value="0"><?php echo $lb_from?></option>
                            
                        </select>
                      </div>

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_branch_to" id="cbo_branch_to" >              
                            <option value="0"><?php echo $lbl_to?></option>
                            <?php
                            foreach ($branch as $b) {
                                ?>
                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                            <?php } ?>
                        </select>
                      </div>

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_stock_location_to" id="cbo_stock_location_to" >              
                            <option value="0"><?php echo $lb_to?></option>
                            
                        </select>
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_status" id="cbo_status" >              
                            <option value=""><?php echo $lb_status?></option>
                            <option value="0">Padding</option>
                            <option value="1">Approved</option>
                            
                        </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                      <!-- <?php if($p->permission_add!=0){ ?> -->
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <a class="btn btn-primary btn-block <?php echo $permission_add;?>" href="<?php echo site_url('stock_transffer/addnew'); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new?></a>
                      </div><!-- <?php } ?> -->
                     <div class="clearfix"></div>
                    </div>
                </div>
        </form>
        <h4 class="text-center"><?php echo $lbl_title;?></h4>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo $lbl_no?></th>
                        <th><?php echo $lbl_item_name?></th>
                        <th><?php echo $lbl_qty?></th>
                        <th><?php echo $lbl_measure?></th>
                        <th><?php echo $lbl_qty?></th>
                        <th><?php echo $lbl_tran_from?></th>
                        <th><?php echo $lbl_stock?></th>
                        <th><?php echo $lbl_tran_to?></th>
                        <th><?php echo $lbl_stock?></th>
                        <th><?php echo $lbl_tran_by?></th>
                        <th><?php echo $lbl_tran_date?></th>
                  
                        <th><?php echo $lb_status;?></th>

                        <?php if($p->permission_delete!=0){ ?><th><?php echo $lb_cancel; ?></th><?php }?>
                        <?php if($p->permission_edit!=0){ ?><th><?php echo $lb_approve ?></th><?php }?>
                        
                    </tr>
                </thead>
                <tbody></tbody>
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
    <script>
        $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $(document).ready(function() {
                 var table = $('#table-table').DataTable({
                        "bProcessing": false,
                        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                        "columnDefs": [
                           {"sClass": "hidden", "aTargets": [0]},
                            //{ "orderable": false, "targets":[0,4,5,6,7,8] }
                        ],
                        "sAjaxSource": "<?php echo site_url('stock_transffer/response'); ?>",
                        "aoColumns": [
                            {mData: 'stock_transffer_id'},
                            {mData: 'stock_transffer_id',render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }},
                            {mData: 'item_detail_name'},
                            {mData: 'stock_transffer_qty'},
                            {mData: 'measure_name'},
                            {mData: 'total_qty'},
                            {mData: 'from_branch'},
                            {mData: 'stock_location_from'},
                            {mData: 'to_branch'},
                            {mData: 'stock_location_to'},
                            {mData: 'transfer_by'},
                            {mData: 'stock_transffer_created_date'},
                         
                            {mData: 'stock_transffer_status',mRender:function(data){
                                    if(data ==1 )
                                        return '<img src="<?php echo base_url("img/icons/check.png"); ?>">';
                                    else 
                                        return '<img src="<?php echo base_url("img/icons/pending.png"); ?>">';
                            }},
                            <?php if($p->permission_delete!=0){ ?>
                            {mData: 'stock_transffer_status',mRender:function(data){
                                    if(data!=1)
                                        return '<a class="cancel" href="#">CANCEL</a>';
                                    else 
                                        return "Tranftered";
                            }},
                            <?php } ?>
                            <?php if($p->permission_edit!=0){ ?>
                            {mData: 'stock_transffer_status',mRender:function(data){
                                    if(data==0)
                                        return '<a class="approve" href="#">Approve</a>';
                                    else 
                                        return "Approved";
                            }}
                            <?php } ?>
                            
                        ],
                        "displayLength": 25,
                        "order": [[0, 'desc']],
                        "footerCallback": function (nRow) {
                            var api = this.api(), data;
                            // Remove the formatting to get integer data for summation
                            var intVal = function (i) {
                                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                            };
                            //TOTAL BY ROW
                            qty = api.column(5, {
                                page: 'current'
                            })
                                    .data()
                                    .reduce(function (total, b) {
                                        var bb = b.replace(',', '');

                                        return total + parseFloat(bb);
                                    }, 0);
                            total_qty = api
                            .column( 5 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            //

                           

                           
                            //var nCells_1 = nRow.getElementsByTagName('td');
               
                            $( api.column( 5 ).footer() ).html(qty.toFixed(0)+ ' of ' + total_qty.toFixed(0));
                            

                        }
                });
                 //
                // table.on('order.dt search.dt', function () {
                //     table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                //         cell.innerHTML = i+1;
                //     });
                // }).draw();
                 //
                    $("form#form").on('submit', function(e) {
                        e.preventDefault();
                        var data = $(this).serialize();
                        var url = '<?php echo site_url("stock_transffer/search"); ?>';
                        table.clear().draw();
                        $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="14" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                        $.getJSON(url, data, function( json )
                        {        
                            table.rows.add(json.aaData).draw();
                        });
                    });
                 //
                  $('#table-table').on('click', 'td .cancel', function (e) {
                       e.preventDefault();
                       var id = $(this).closest('tr').find('td:first').html();
                       var href = '<?php echo site_url("stock_transffer/cancel_transffer") ?>' + "/" + id;
                       
                       if (confirm('Do you want to delete this record?')) {
                           window.location.href = href;
                       }

                   });

                  $('#table-table').on('click', 'td .approve', function (e) {
                       e.preventDefault();
                       var id = $(this).closest('tr').find('td:first').html();
                       var href = '<?php echo site_url("stock_transffer/approve_to_stock") ?>';
                       if (confirm('Do you want to delete this record?')) {
                           $.ajax({
                              url:href,
                              type:'post',
                              data:{'id':id},
                              success:function(res){
                                var json=JSON.parse(res);
                                if(json.status=='S001'){
                                  alert(json.message);
                                  window.location.href ='<?php echo site_url('stock_transffer')?>';
                                }else{
                                  alert(json.message);
                                  return false;
                                }
                              }
                           })
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
                          if(ui.item==null){
                            $(this).val('');
                            $('#txt_item_id').val('');
                          }else{
                            var names = ui.item.data.split("|");
                            $('#txt_item_id').val(names[1]);
                          }
                          
                      }
                  });
                   $('#cbo_branch_from').change(function(){
            var id=$(this).val();

            if(id>0){
                 $('#cbo_stock_location_from').html('<option value="0"><?php echo $lb_from?></option>');
                $.ajax({
                    url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_stock_location_from').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                        })
                    }
                })
            }else{
                $('#cbo_stock_location_from').html('<option value="0"><?php echo $lb_from?></option>');
            }
            
        });
            $('#cbo_branch_to').change(function(){
            var id=$(this).val();

            if(id>0){
                 $('#cbo_stock_location_to').html('<option value="0"><?php echo $lb_to?></option>');
                $.ajax({
                    url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_stock_location_to').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                        })
                    }
                })
            }else{
                $('#cbo_stock_location_to').html('<option value="0"><?php echo $lb_to?></option>');
            }
            
        });
                  
        });
    </script>
    </body>
</html>
