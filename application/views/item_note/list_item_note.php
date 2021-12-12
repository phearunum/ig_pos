<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LIST ITEM NOTE</title>        
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
        <!-- <?php if($p->permission_add!=0){ ?> --><a class="btn btn-primary pull-right <?php echo $permission_add;?>" href='<?php echo site_url("item_note/addnew"); ?>'><i class="fa fa-plus"></i> <?php echo $lbl_new ?></a><!-- <?php } ?> -->
        <h4 class="text-center"><?php echo $lbl_title ?></h4>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
            <thead>
                    <tr  class="persist-header">
                        <th>ID</th>
                        <th><?php echo $lbl_item_name ?></th>
                        <th><?php echo $lbl_item_price ?></th>
                        <th><?php echo $lbl_note ?></th>
                        <th></th>
                    </tr>
                </thead>
        </table>
    </div>
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#table-table').dataTable({
                                 "bProcessing": true,
                                 "sAjaxSource": "<?php echo site_url("item_note/response");?>",
                                 "aoColumns": [
                                        { mData: 'item_note_id'},
                                        { mData: 'item_note_name'},
                                        { mData: 'item_note_price'},
                                        { mData: 'item_note_des'},
                                        {"sTitle": "Action", "sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>' }
                                ],
                                "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                                "columnDefs":[
                                    {"className":"text-center","targets":[4],"width":"100px"}
                                ]
                        });
                        
                        $('#table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("item_note/delete") ?>' +"/"+ id;
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
                                var href='<?php echo site_url("item_note/edit_load") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                window.location.href = href;
                        });
                        
                    });
        </script>
        
        <?php } ?>
    </body>
</html>
