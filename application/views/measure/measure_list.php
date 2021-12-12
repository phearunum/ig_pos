
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function myFunction(){
               $(function() {
                   if(confirm("Export your Data ")){
                        $("#table-table").table2excel({
                                exclude: ".noExl",
                                exclude_img: true,
                                exclude_links: true,
                                exclude_inputs: true,
                                name: "Excel Document Name",
                                filename: "Report Customer",
                                fileext: ".xls"
                        });
                    }
                });
           }
        </script>
    </head>
    <body>

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
        
        <a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url("measure/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new;?></a>
        <h3 class="text-center text-primary"><?php echo $lbl_measure_title;?></h3>
        <table width="100%" cellspacing="0" class="table-table"  id="table-table" cellpadding="0" border="0">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th><?php echo $lbl_no;?></th>
                    <th><?php echo $lbl_measure_name;?></th>
                    <th><?php echo $lbl_measure_qty;?></th>
                    <th><?php echo $lbl_measure_desc;?></th>
                    <th><?php echo $lbl_measure_date_entry;?></th>
                    <th><?php echo $lbl_measure_recorder;?></th>
                    <th><?php echo $lbl_action; ?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="clearfix"></div>
        </div>
        
    </body>
    <script type="text/javascript">
            $( document ).ready(function() {
                var table =$('#table-table').dataTable({
                    "bProcessing": true,
                    "sAjaxSource": "<?php echo site_url("measure/response");?>",
                    "aoColumns": [
                        { mData: 'measure_id'},
                        { mData: 'measure_id'},
                        { mData: 'measure_name'},
                        { mData: 'measure_qty'},
                        { mData: 'measure_note'},
                        { mData: 'measure_created_date'},
                        { mData: 'recorder'},
                        { 'sDefaultContent':'<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>' }
                    ],

                    "iDisplayLength": 50 ,
                    "order": [[ 0, "desc" ]],
                    "aoColumnDefs": [
                        { "sClass": "hidden", "aTargets": [0]},
                        { "sClass": "text-center", "aTargets": [6],"width":"10%"}
                    ]
                });
                table.on('order.dt search.dt', function (){
                    table.api().column(1, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).api().draw();
                        
                $('#table-table').on('click', 'td .delete', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("measure/delete") ?>' +"/"+ id;
                //  $('a.delete', $(this)).attr('href', href);
                    if (confirm('Do you want to delete this record?')) {
                        $.ajax({
                            type: 'POST',
                            url: href,
                            success: function () {
                                
                                location.reload();
                            }
                        });
                    } else {
                        // Do nothing!
                    }

                });

                $('#table-table').on('click', 'td .edit', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("measure/edit_load") ?>' +"/"+ id;
                    window.location.href=href;
                });       
                        
            });
        </script>
</html>
