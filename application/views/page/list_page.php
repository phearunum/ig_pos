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
    </head>
    <body>
        <table id="menu_group" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><a href="<?php echo site_url("page/addnew"); ?>" target="_blank">New</a></th>
                    <th>Page Name</th>
                    <th>Controller</th>
                    <th>Parent Id</th>
                    <th>Page Ordering</th>
                    <th>Delete</th>
                </tr>
            </thead>
        </table>
    </body>
    <script>
        $(document).ready(function () {
//            var table = $('#menu_group').DataTable({
                $('#menu_group').dataTable({
                    "bProcessing": true,
                "ajax": "<?php echo site_url("page/response"); ?>",
//                "columns": [
//                    {
//                        "className": 'details-control',
//                        "orderable": false,
//                        "data": null,
//                        "defaultContent": ''
//                    },
                    "aoColumns": [
                    {"data": "page_id"},
                    {"sTitle":  "<a href='<?php echo site_url("page/addnew"); ?>'>New</a>", "sDefaultContent": '<?php  ?><a href="#" class="edit">Edit</a><?php  ?>' },
                    {"data": "page_name"},
                    {"data": "page_url"},
                    {"data": "page_id_parent"},
                    {"data": "page_ordering"},
//                    {"sTitle": "Edit", "sDefaultContent": '<?php  ?><a href="#" class="edit">Edit</a><?php  ?>' },
                    {"sTitle": "Delete", "sDefaultContent": '<?php  ?><a href="#" class="delete"><img src="<?php echo base_url("img/delete.gif"); ?>"></a><?php  ?>' }
                ],
                "iDisplayLength": 50,
                //"order": [[1, 'asc']],
            });
            
            $('#menu_group').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("page/delete") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                if (confirm('Do you want to delete this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }
                                
                        });
             $('#menu_group').on('click', 'td .edit', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("page/edit_load") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                window.location.href = href;
                        });
            
        });
    </script>
</html>
