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
        <?php if($p->permission_add){ ?><a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url("item_main/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new ?></a><?php } ?>
        <h4 class="text-center"><?php echo $lbl_title ?></h4>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr  class="persist-header">
                        <td>item_type_id</td>
                        <th><?php echo $txt_No ?></th>
                        <th><?php echo $txt_part_number ?></th>
                        <th><?php echo $txt_item_main_name ?></th>
                        <th><?php echo $txt_type ?></th>
                        <th><?php echo $remain_alert?></th>
                        <th><?php echo $txt_create_date ?></th>
                        <th><?php echo $txt_modifided?></th>
                        <th><?php echo $txt_recorder ?></th>
                        <!-- <?php if($p->permission_delete){ ?> --><th><?php echo $lbl_delete ?></th><?php } ?>
                    </tr>
                </thead> 
            </table>
        </div>
        <?php } ?>
        
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        var t =$('#table-table').DataTable({
            "bProcessing": false,
            "sAjaxSource": "<?php echo site_url("item_main/response"); ?>",
            "aoColumns": [
                {mData: 'item_main_id'},
                {mData: 'item_main_id'},
                {mData: 'part_number'},
                {mData: 'item_main_name'},
                {mData: 'item_type_name'},
                {mData: 'remain_alert'},
                {mData: 'create_date'},
                {mData: 'modified_date'},
                {mData: 'create_by'},
                {"sDefaultContent": '<a <?php echo $add_link;?> class="add <?php echo $permission_add;?>"><img src="<?php echo base_url("img/settings/add.png"); ?>" style="width:18px"></a>&nbsp;&nbsp;<a <?php echo $edit_link;?> class="edit <?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete <?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'}
            ],
            "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
            "aoColumnDefs": [
                {"sClass": "hidden", "aTargets": [0]},
                {"sClass": "text-center", "aTargets": [7]}
            ],
        });
        //Over number
        t.on( 'order.dt search.dt', function () {
            t.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        }).draw();
        //edit and delete
        $('#table-table').on('click', 'td .delete', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').find('td:first').html();
            var href = '<?php echo site_url("item_main/delete") ?>' + "/" + id;
            if (confirm('Do you want to delete this record?')) {
                window.location.href = href;
            }
        });
        $('#table-table').on('click', 'td .edit', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').find('td:first').html();
            var href = '<?php echo site_url("item_main/edit_load") ?>' + "/" + id;
            window.location.href = href;
        });

        $('#table-table').on('click', 'td .add', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').find('td:first').html();
            var href = '<?php echo site_url("item_main/add_sub_item") ?>' + "/" + id;
            window.location.href = href;
        });
    });
</script>
