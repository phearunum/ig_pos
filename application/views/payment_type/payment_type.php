<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <!--  <?php  foreach($record_permission as $p) {?> -->
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
        <!-- <?php if($p->permission_add!=0){ ?> -->

        <a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url('payment_type/add_loads'); ?>">
            <i class="fa fa-plus"></i> <?php echo $lb_new;?></a>

       <!--  <?php } ?> -->
        <h3 class="text-center text-primary"><?php echo $lbl_payment_name;?></h3>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">     
            <thead>
                 <tr>
                    <th>id</th>
                    <th><?php echo $lbl_no;?></th>
                    <th><?php echo $lbl_payment_name;?></th>
                    <th><?php echo $lbl_description;?></th>
                    <th><?php echo $lbl_createdate;?></th>
                    <th><?php echo $lbl_modifieddate;?></th>
                    <th><?php echo $lbl_action;?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        </div>
             <script type="text/javascript">
                 $( document ).ready(function() {

                var table =$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url("payment_type/response");?>",
                    "aoColumns": [
                        { mData: 'acc_type_id'},
                        { mData: 'acc_type_id',render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { mData: 'acc_type'},
                        { mData: 'description'},
                        { mData: 'create_date'},
                        { mData: 'modified_date'},
                      //  { mData: 'description'},

                        {"sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit; ?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete; ?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'}, 
                        
                    ],



                    "iDisplayLength": 50 ,
                    "order": [[ 1, "asc" ]],
                    "aoColumnDefs": [
                        { "sClass": "hidden", "aTargets": [0]}
                    ]
                });
                // click on delete : 
                $('#table-table').on('click', 'td .delete', function(e) {
                    e.preventDefault();
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("payment_type/delete") ?>' +"/"+ id;


                    if (confirm('Do you want to delete this record?')) {
                        $.ajax({
                            type: 'post',
                           url: href,
                         success: function () 
                         {
                                location.reload();
                           }
                        });
                    }

                });
                $('#table-table').on('click', 'td .edit', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("payment_type/edit_load") ?>' +"/"+ id;
                     window.location.href = href;
                });         
            });
             </script>
       <!--  <?php
               } ?>  -->
       
    </body>
</html> 
