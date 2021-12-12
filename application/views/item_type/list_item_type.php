<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
            foreach($record_permission as $p){
        ?> 

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
       <!-- <?php if($p->permission_add){ ?> --> <a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url("item_type/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new ?></a><!-- <?php } ?> -->
        <h4 class="text-center"><?php echo $lbl_title ?></h4>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr  class="persist-header">
                        <td>item_type_id</td>
                        <th><?php echo $txt_No ?></th>
                        <th><?php echo $txt_main;?></th>
                        <th><?php echo $txt_item_type_name ?></th>
                        <th><?php echo $txt_increadient ?></th>
                        <th><?php echo $txt_create_date ?></th>
                        <th><?php echo $txt_recorder ?></th>
                        <th><?php echo 'Action';?></th>
                         <!-- <?php if($p->permission_delete){ ?><th><?php echo $lbl_delete ?></th><?php } ?>  --> 
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
            "sAjaxSource": "<?php echo site_url("item_type/response"); ?>",
            "aoColumns": [
                {mData: 'item_type_id'},
                {mData: 'item_type_id'},
                {mData: 'category_name'},
                {mData: 'item_type_name'},
                {mData: 'item_type_is_ingredient',render:function(data){
                        if(data==1)
                            return "YES";
                        else
                            return "NO";
                }},
                {mData: 'item_type_modified_date'},
                {mData: 'recorder'},
                {"sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'}
            ],
            "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
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
            var href = '<?php echo site_url("item_type/delete") ?>' + "/" + id;
            if (confirm('Do you want to delete this record?')) {
                window.location.href = href;
            }
        });
        $('#table-table').on('click', 'td .edit', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').find('td:first').html();
            var href = '<?php echo site_url("item_type/edit_load") ?>' + "/" + id;
            window.location.href = href;
        });
    });
</script>
