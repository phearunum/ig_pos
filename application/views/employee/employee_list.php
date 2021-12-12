<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LIST EMPLOYEE</title>
        <script type="text/javascript">
            function myFunction(){
               $(function() {
                   alert("Export your Data ");
                                   $("#table-table").table2excel({
                                           exclude: ".noExl",
                                           name: "Excel Document Name",
                                           filename: "Report Employee",
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
       <!--  <?php
            foreach($record_permission as $p){
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
            <form class="formSale" id="form_search">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                        <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_emp_card" id="txt_emp_card" autocomplete="off" placeholder="<?php echo $lb_cardnum?>"> 
                   
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_emp_name" id="txt_emp_name" autocomplete="off" placeholder="<?php echo $lb_emp?>"> 
                        <input type="text" name="txt_emp_id" id="txt_emp_id" class="hidden">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cb_shift" id="cb_shift" class="form-control">
                            <option value="0"><?php echo $lb_shift?></option>
                            <?php foreach ($rd_shift as $key ) {?>
                                <option value="<?=$key->shift_id?>"><?=$key->shift_name?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cb_position" id="cb_position" class="form-control">
                            <option value="0"><?php echo $lb_position?></option>
                            <?php foreach ($rd_position as $key ) {?>
                                <option value="<?=$key->position_id?>"><?=$key->position_name?></option>
                            <?php } ?>
                        </select>
                      </div>
          
                       <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cb_branch" id="cb_branch" >              
                            <option value="0"><?php echo $lb_branch?></option>
                            <?php
                            foreach ($rd_branch as $t) {
                                ?>
                                <option value="<?php echo $t->branch_id; ?>"><?php echo $t->branch_name?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                  </div>
              </div>
          </form>
          <div class="clearfix"></div>
            <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn btn-danger pull-right btn-margin " value="<?php echo $btn_export?>"/>
            <!-- <?php if($p->permission_add!=0){ ?> --><a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url("employee/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new ?></a><!-- <?php } ?> -->
            <div class="clearfix"></div>
            <h3 class="text-center"><?php echo $lbl_title ?></h3>
                    <table width="100%" cellspacing="0" class="table-table"  id="table-table" cellpadding="0">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><?php echo $no; ?></th>
                                    <th><?php echo $lbl_card_no; ?></th>
                                    <th><?php echo $lbl_emp_name ?></th>
                                    <th><?php echo $lbl_emp_sex ?></th>
                                    <th><?php echo $lbl_emp_position ?></th>
                                    <th><?php echo $lbl_emp_phone ?></th>                        
                                    <th><?php echo $lbl_emp_address ?></th>
                                    <th><?php echo $lbl_emp_shift ?></th>
                                    <th><?php echo $lbl_emp_branch ?></th>
                                    <th><?php echo $lbl_emp_hired_date ?></th>
                                    <th><?php echo $lbl_emp_stock_name ?></th>
                                    <th class="text-center"><?php echo $lbl_action;?></th>
                                </tr>
                       </thead>
                    </table>
        <script type="text/javascript">
            $( document ).ready(function() {
                var data_table=$('#table-table').DataTable({
                                 "bProcessing": false,
                                 "sAjaxSource": "<?php echo site_url("employee/response");?>",
                                 "aoColumns": [
                                        { mData: 'employee_id'},
                                        {mData: 'employee_id',render: function (data, type, row, meta) {
                                            return meta.row + meta.settings._iDisplayStart + 1;
                                        }},
                                        { mData: 'employee_card'},
                                        { mData: 'employee_name'},
                                        { mData: 'employee_sex'},
                                        { mData: 'position_name'},
                                        { mData: 'employee_phone'},                             
                                        { mData: 'employee_address'},
                                        { mData: 'shift_name'},
                                        { mData: 'branch_name'},
                                        { mData: 'employee_hired_date'},
                                        { mData: 'stock_location_name'},
                                        {"sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit; ?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete; ?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>' }
                                ],
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                "iDisplayLength": 10,
                                "aoColumnDefs": [
                                    {"sClass": "hidden", "aTargets": [0]},
                                    {"sClass": "text-center", "aTargets": [12]}
                                ]
                        });
                    $("#form_search").on('submit',function(e){

                        e.preventDefault();
                        var data = $(this).serialize();
                        var url = '<?php echo site_url("employee/responses");?>';
                       
                        data_table.clear().draw();
                        $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="17" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                        $.getJSON(url, data, function( json )
                        {        
                            data_table.rows.add(json.aaData).draw();
                        });
                    });
                        
                        $('#table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("employee/delete") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                if (confirm('Do you want to delete this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }
                                
                        });
                         $('#table-table').on('click', 'td .edit', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("employee/edit_load") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                window.location.href = href;
                        });
                        
                    });
                  $('#txt_emp_name').autocomplete({
                      source: function (request, response) {
                          $.ajax({
                              url: '<?php echo site_url('search/search_filter'); ?>',
                              dataType: "json",
                              data: {
                                  name_startsWith: request.term,
                                  type: 'employee',
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
                               $('#txt_emp_id').val('');
                               $(this).val('');
                          }else{
                              var names = ui.item.data.split("|");
                              $('#txt_emp_id').val(names[1]);
                          }
                          
                      }
                  });

        </script>
        <?php
            }
        ?>
    </div>
    </body>
</html>
