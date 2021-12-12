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
        <div class="container-fluid container-fluid-custom">
            <?php if($p->permission_add){ ?><a class="btn btn-primary pull-right" href="<?php echo site_url("printer_location/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new; ?></a><?php } ?>
            <h3 class="text-center text-primary"><?php echo $lbl_list_title;?></h3>
            <table width="100%" cellspacing="0" class="table-table font_khmer" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo $btn_no; ?></th>
                        <th><?php echo $lbl_printer_name; ?></th>
                        <th><?php echo $lbl_description; ?></th>
                        <th><?php echo $lbl_created_date; ?></th>
                        <th><?php echo "Couter"; ?></th>
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
                    "sAjaxSource": "<?php echo site_url("Printer_location/response");?>",
                    "aoColumns": [
                        { mData: 'printer_location_id'},
                        { mData: 'printer_location_id',render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { mData: 'printer_location_name'},
                        { mData: 'printer_location_desc'},
                        { mData: 'printer_location_created_date'},
                        { mData: 'printer_location_is_counter',render: function (data) {
                            if(data==1)
                                return "Yes";
                            else
                                return "No";
                        }},
                        {"sDefaultContent": '<?php if($p->permission_edit!=0){ ?><a href="#" class="edit"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a><?php } ?>&nbsp;&nbsp;<?php if($p->permission_delete!=0){ ?><a href="#" class="delete"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a><?php } ?>'}, 
                        
                    ],

                    "iDisplayLength": 50 ,
                    "order": [[ 1, "asc" ]],
                    "aoColumnDefs": [
                        { "sClass": "hidden", "aTargets": [0]},
                       // { "sClass": "text-center", "aTargets": [6],"width":"10%"}
                    ]
                });
                        
                $('#table-table').on('click', 'td .delete', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("printer_location/delete") ?>' +"/"+ id;
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
                    var href='<?php echo site_url("printer_location/edit_load") ?>' +"/"+ id;
                     window.location.href = href;
                });          
            });
        </script>
        <?php } ?>
    </body>
</html>