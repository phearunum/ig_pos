<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- <?php
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
        <!-- <?php if($p->permission_add!=0){ ?> --><a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url("supplier/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new?></a><!-- <?php } ?> -->
        <h3 class="text-center"><?php echo $lbl_title?></h3>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
            <thead>
                <tr>
                    <th></th>
                    <th><?php echo $lbl_No?></th>
                    <th><?php echo $txt_supplier_name?></th>
                    <th><?php echo $txt_supplier_phone?></th>
                    <th><?php echo $txt_address ?></th>
                    <th><?php echo $txt_description ?></th>
                    <th><?php echo $lbl_recorder ?></th>
                    <th><?php echo $lbl_date ?></th>
                    <th class="text-center">Action</th>
                </tr>
            </thead> 
            <tbody></tbody>
        </table>
        </div>
        <script type="text/javascript">
            $( document ).ready(function() {
                var table =$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url("Supplier/response");?>",
                    "aoColumns": [
                        { mData: 'supplier_id'},
                        { mData: 'supplier_id',render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { mData: 'supplier_name'},
                        { mData: 'supplier_phone'},
                        { mData: 'supplier_address'},
                        { mData: 'supplier_note'},
                        { mData: 'recorder'},
                        { mData: 'supplier_created_date'},
                        {"sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>' } 
                        
                    ],

                    "iDisplayLength": 50 ,
                    "order": [[ 1, "asc" ]],
                    "aoColumnDefs": [
                        { "sClass": "hidden", "aTargets": [0]},
                        { "sClass": "text-center", "aTargets": [6]}
                    ]
                });
                        
                $('#table-table').on('click', 'td .delete', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("Supplier/delete") ?>' +"/"+ id;
                    if (confirm('Do you want to delete this record?')) {
                        $.ajax({
                            type: 'POST',
                            url: href,
                            success: function () {
                                location.reload();
                            }
                        });
                    }

                });

                $('#table-table').on('click', 'td .edit', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("Supplier/edit_load") ?>' +"/"+ id;
                     window.location.href = href;
                });          
            });
        </script>
    <?php } ?>
    </body>
</html>
