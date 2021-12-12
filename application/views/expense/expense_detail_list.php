<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            function importData() {
                window.open("uploadcsv/item_detail", "_self");
            }
        </script>

        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    alert("Export your Data ");
                    $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Expense Detail List",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                    });
                });
            }

        </script>
        <style>
            .hide_me{display: none;}
        </style>
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
        <button class="btn btn-danger pull-right" style="margin-left: 10px" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?=$btn_export?></button>
        <a class="btn btn-primary pull-right <?php echo $permission_add;?>" href="<?php echo site_url("expense_detail/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new ?></a>
        <h3 class="text-center text-primary"><?php echo $lbl_title ?></h3>
        <table width="100%" cellspacing="0" class="table-table font_khmer" id="table-table" cellpadding="0" border="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><?php echo $txt_expense_type ?></th>
                    <th><?php echo $txt_expense_cart_no ?></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th><?php echo $txt_expense ?></th>
                    <th><?php echo $txt_date ?></th>
                    <th><?php echo $txt_recorder ?></th>
                    <th><?php echo $txt_modi_date ?></th>
                    <th><?php echo $txt_modi_by ?></th>
                    <th><?php echo $lbl_delete ?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
        <script type="text/javascript">
            $(document).ready(function () {

                $('#table-table').dataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url("expense_detail/response"); ?>",
                    "aoColumns": [
                        {mData: 'expense_detail_id'},
                        {mData: 'expense_type_name'},
                        {mData: 'expense_chart_number'},
                        {"sDefaultContent":""},
                        {mData: 'expense_detail_name'},
                        {mData: 'expense_detail_created_date'},
                        {mData: 'employee_name'},
                        {mData: 'expense_detail_modified_date'},
                        {mData: 'expense_detail_modified_by'},
                        {"sTitle": "<?php echo $lbl_action ?>", "sDefaultContent": '<a <?php echo $edit_link;?> href="#" class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<?php //if($p->permission_add!=0){  ?><a <?php echo $delete_link;?> href="#" class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a><?php //}  ?>'}
                    ], 
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "order": [[1, "desc"]], 
                    "aoColumnDefs": [
                        {"sClass": "hidden", "aTargets": [0,1]},
                        //{"sClass": "hidden", "aTargets": [0]}
                    ],                                      
                    "iDisplayLength": 50,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({page: 'current'}).nodes();
                        var last = null;

                        api.column(1, {page: 'current'}).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                        '<tr class="group"><td colspan="9" style="background-color:#d1cfd0;color:#FF0000;font-weight: bold;">' + group + '</td></tr>'
                                        );
                                last = group;
                            }
                        });
                    },
                });

            $('#table-table').on('click', 'td .delete', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href = '<?php echo site_url("expense_detail/delete") ?>' + "/" + id;
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
                var href = '<?php echo site_url("expense_detail/edit_load") ?>' + "/" + id;
                //  $('a.delete', $(this)).attr('href', href);
                window.location.href = href;
            });
        });
        </script>
    </body>
</html>
