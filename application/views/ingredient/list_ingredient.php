<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php //echo base_url("assets/css/jquery.dataTables.css"); ?>">
        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="<?php //echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
    </head>
    <body>
        <?php
        foreach ($record_permission as $p) {
            ?>
            <table width="100%" cellspacing="0" class="table tabler" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <td class="form-title" colspan="12"><?php echo "Ingredient Recipes/Costing" ?></td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th><?php if ($p->permission_add != 0) { ?><a href='<?php echo site_url("ingredient/addnew"); ?>'><?php echo "New" ?></a><?php } ?></th>
                        <th><?php echo "Item Name" ?></th>
                        <th><?php echo "Part#" ?></th>
                        <th><?php echo "Item Type" ?></th>
                        <th><?php echo "Ingredients" ?></th>
                       
                        <th><?php echo "Delete" ?></th>
                        
                      
                    </tr>
                </thead>
               
            </table>
            <script type="text/javascript">
                $(document).ready(function () {
                    var t = $('#table-table').dataTable({
                        "bProcessing": true,
                        "sAjaxSource": "<?php echo site_url("ingredient/response"); ?>",
                        "aoColumns": [
                            {mData: 'item_detail_id'},
                           
                                            {mData: 'item_detail_id',mRender:function(data){
                                                return '<?php if ($p->permission_edit != 0) { ?><a href="<?php echo site_url("ingredient/update")?>/'+data+'  " style=""><?php echo "Edit" ?></a><?php } ?>';
                                            }},
                                            {mData: 'item_detail_name'},
                                            {mData: 'item_detail_part_number'},
                                            {mData: 'item_type_name'},
                                            {mData: 'item_detail_id',mRender:function(data){
                                                return '<?php if ($p->permission_viewall != 0) { ?><a href="<?php echo site_url("ingredient/list_ingredient")?>/'+data+'  " style=""><i class="fa fa-eye"></i></a><?php } ?>';
                                            }},
                                          
                                           
                                            {mData: 'item_detail_id',mRender:function(data){
                                                return '<?php if ($p->permission_delete != 0) { ?><a href="javascript:void(0)" onclick="del('+data+')" style=""><i class="fa fa-trash-o"></i></a><?php } ?>';
                                            }},
                                            
                                            
                                                        ]
                                                        , "aoColumnDefs": [
                                                            {"sClass": "hidden", "aTargets": [0]}],
                                                          "columnDefs": [{
                                                             "targets": 0
                                                            }
                                                        ],
                                                        "displayLength": 50,
                                                        
                                                       
                                                    });
                                                    
                                                    $('#table-table').on('click', 'td .delete', function (e) {
                                                        e.preventDefault()
                                                        var id = $(this).closest('tr').find('td:first').html();
                                                        var href = '<?php echo site_url("ingredient/delete") ?>' + "/" + id;
                                                        //  $('a.delete', $(this)).attr('href', href);
                                                        if (confirm('Do you want to delete this record?')) {
                                                            window.location.href = href;
                                                        } else {
                                                            // Do nothing!
                                                        }
                                                    });
                                                    $('#table-table').on('click', 'td .edit', function (e) {
                                                        e.preventDefault()
                                                        var id = $(this).closest('tr').find('td:first').html();
                                                        var href = '<?php echo site_url("ingredient/edit_load") ?>' + "/" + id;
                                                        //  $('a.delete', $(this)).attr('href', href);
                                                        window.location.href = href;
                                                    });
                                                });

                                                function del(id){
                                                    var r = confirm("Are you sure want to delete this ingredient?");
                                                    if (r == false) {
                                                        return;
                                                    }
                                                    window.open("<?php echo site_url("ingredient/deletes"); ?>/"+id+" ","_self");
                                                   
                                                }
            </script>
            <?php
            }
        ?>
    </body>
</html>
