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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css"); ?>">
        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
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
                        <th><a href="<?php echo site_url("ingredient/addnew"); ?>"><?php if ($p->permission_add != 0) { echo "New";} ?></a></th>
                        <th><?php echo "Description" ?></th>
                        <th><?php echo "Part#" ?></th>
                        <th><?php echo "Ingredients" ?></th>
                        <th><?php echo "Unit Price($)" ?></th>
                        <th><?php echo "Qty" ?></th>
                        <th><?php echo "Costing($)" ?></th>
                        <th><?php echo "Recorder" ?></th>
                        <th><?php echo "Date Entry" ?></th>
                        <th><?php echo "Modifier" ?></th>
                        <th><?php echo "Date Modify" ?></th>
                        <th><?php echo "Description" ?></th>
                      
                    </tr>
                </thead>
                <tfoot class="grand_total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tfoot>
            </table>
            <script type="text/javascript">
                $(document).ready(function () {
                    var t = $('#table-table').dataTable({
                        "bProcessing": true,
                        "sAjaxSource": "<?php echo site_url("ingredient_detail/response"); ?>",
                        "aoColumns": [
                            {mData: 'ingredient_id'},
                           
                                            {mData: 'ingredient_item_detail_id',mRender:function(data){
                                                return '<a href="<?php echo site_url("ingredient/update"); ?>/'+data+' "><?php if ($p->permission_edit != 0) { echo "Edit";} ?></a>';
                                            }},
                                            {mData: 'item_name'},
                                            {mData: 'item_detail_part_number'},
                                            {mData: 'ingredient_name'},
                                            {mData: 'item_detail_retail_price'},
                                            {mData: 'ingredient_qty'},
                                            {mData: 'costing'},
                                            {mData: 'recorder'},
                                            {mData: 'ingredient_created_date'},
                                            {mData: 'modified_by'},
                                            {mData: 'ingredient_modified_date'},
                                            {mData: 'ingredient_desc'},
                                            
                                            
                                                        ]
                                                        , "aoColumnDefs": [
                                                            {"sClass": "hidden", "aTargets": [0]}, {"sClass": "hidden", "aTargets": [2]}],
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
                                                            api.column(7, {page: 'current'}).data().each(function (group, i) {
                                                            total+=parseFloat(group);
                                                                if (last !== group && total!=0) {
                                                                    $(rows).eq(i).before(
                                                                                '<tr><td colspan="12" style="color:#13224B;font-weight: bold;">' +"Total Cost($):"+total.toFixed(3)+ '</td></tr>'
                                                                            );
                                                                    last = group;
                                                                    total=0;
                                                                }
                                                            });
                                                        },
                                                        "footerCallback": function (nRow) {
                                                        var api = this.api(), data;
                                                        // Remove the formatting to get integer data for summation
                                                        var intVal = function (i) {
                                                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                                                        };
                                                        //TOTAL BY ROW
                                                        total_costing = api.column(7, {
                                                            page: 'all'
                                                        })
                                                                .data()
                                                                .reduce(function (total, b) {
                                                                    var bb = b.replace(',', '');

                                                                    return total + parseFloat(bb);
                                                                }, 0);
                                                        // END TOTAL BY ROW                                   

                                                                var nCells_7 = nRow.getElementsByTagName('td');
                                                                //nCells_7[7].innerHTML = total_costing.toFixed(3);
                                                        }
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
            </script>
            <?php
            }
        ?>
    </body>
</html>
