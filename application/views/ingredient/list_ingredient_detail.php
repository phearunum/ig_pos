<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- <?php
        foreach ($record_permission as $p) {
            ?>
 -->
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
            <!-- <?php if ($p->permission_add != 0) ?> --><a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url("ingredient/addnew"); ?> "><i class="fa fa-plus"></i>Add New</a>
            <h4 class="text-center"><?php echo $lbl_ingredient_title; ?></h4>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th></th>
                        <th><?php echo "Description" ?></th>
                        <th><?php echo $lbl_part; ?></th>
                        <th><?php echo $lbl_ingredient; ?></th>
                        <th><?php echo $lbl_qty; ?></th>
                    
                        <th><?php echo $lbl_recorder; ?></th>
                        <th><?php echo $lbl_create_date ?></th>
                        <th><?php echo $lbl_modifier; ?></th>
                        <th><?php echo $lbl_modified_date; ?></th>
                        <th><?php echo $lbl_desc; ?></th>
                        <th><?php echo $lbl_action; ?></th>
                      
                    </tr>
                </thead>
                
            </table>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    //var id='<?php// echo $id;?>';
                    //alert(id);
                    var t = $('#table-table').dataTable({
                        "bProcessing": true,
                        "sAjaxSource": "<?php echo site_url("ingredient/response_detail"); ?>",
                        "aoColumns": [
                                            {mData: 'ingredient_id'},
                                            {mData: 'ingredient_item_detail_id'},
                                            {mData: 'item_with_price'},
                                            {mData: 'item_detail_part_number'},
                                            {mData: 'ingredient_name'},
                                            //{mData: 'item_detail_retail_price'},
                                            {mData: 'ingredient_qty'},
                                            
                                            {mData: 'recorder'},
                                            {mData: 'ingredient_created_date'},
                                            {mData: 'modified_by'},
                                            {mData: 'ingredient_modified_date'},
                                            {mData: 'ingredient_desc'},   
                                            {mData: 'ingredient_id',mRender:function(data,type,row){
                                                return '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>';
                                            }},
                                            
                                            
                                                        ]
                                                        , "aoColumnDefs": [
                                                            {"sClass": "hidden", "aTargets": [0]}, {"sClass": "hidden", "aTargets": [1,2]}],
                                                          "columnDefs": [{
                                                             "targets": 0
                                                            }
                                                        ],
                                                        "displayLength": 50,
                                                        "order": [[ 2, "asc" ]],
                                                        "drawCallback": function (settings) {
                                                            var api = this.api();
                                                            //console.log( api.rows(1).data() );
                                                            var rows = api.rows({page: 'current'}).nodes();
                                                            //console.log(rows[0]);
                                                            var last = null;
                                                            var total=0;
                                                            api.column(2, {page: 'current'}).data().each(function (group, i) {

                                                                //var column = api.column( i );
                                                                //var data = api.data();
                                                               // console.log(data('ingredient_id'));
                                                                if (last !== group) {
                                                                    $(rows).eq(i).before(

                                                                                '<tr class="group"><td colspan="13" style="background-color:#d1cfd0;color:#FF0000;font-weight: bold;">' + group + '</td></tr>'
                                                                            );

                                                                    last = group;

                                                                }


                                                            });

                                                            // SUM COLUMNS WITHIN GROUPS
                   
                                                        },

                                                        
                                                    });
                                                    
                                                    $('#table-table').on('click', 'td .delete', function (e) {
                                                        e.preventDefault();
                                                        var id = $(this).closest('tr').find('td:first').html();
                                                        var href = '<?php echo site_url("ingredient/delete_inc") ?>' + "/" + id;
                                                         $('a.delete', $(this)).attr('href', href);
                                                        if (confirm('Do you want to delete this record?')) {
                                                            window.location.href = href;
                                                        } else {
                                                            // Do nothing!
                                                        }
                                                    });
                                                    $('#table-table').on('click', 'td .edit', function (e) {
                                                        e.preventDefault()
                                                        var id = $(this).closest('tr').find('td:eq(1)').html();
                                                        var href = '<?php echo site_url("ingredient/update"); ?>'+'/'+id;
                                                        window.location.href = href;
                                                    });
                                                });
                                                
                                                function del(id,item_id){
                                                    var r = confirm("Are you sure to delete this ingredient?");
                                                    if (r == false) {
                                                        return;
                                                    }
                                                    window.open('<?php echo site_url("ingredient/delete_inc"); ?>/'+id+'/'+item_id+' ',"_self");
                                                   
                                                }
            </script>
            <?php
            }
        ?>
    </body>
</html>
