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
            foreach($record_permission as $p){
        ?>
        <div class="container-fluid container-fluid-custom">
        <button class="btn btn-danger pull-right" style="margin-left: 10px" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export;?></button>
        <a class="btn btn-primary pull-right" href="<?php echo site_url("gift/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $btn_new;?></a>
        <h3 class="text-center text-primary"><?php echo $lbl_gift_list_name;?></h3>
        <table width="100%" cellspacing="0" class="table-table"  id="table-table" cellpadding="0" border="0">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th><?php echo $lbl_no;?></th>
                    <th><?php echo $lbl_gift_name;?></th>
                    <th><?php echo $lbl_point;?></th>
                    <th><?php echo $lbl_modifier;?></th>
                    <th><?php echo $lbl_modified_date;?></th>
                    <th><?php echo $lbl_action;?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="clearfix"></div>
        </div>
        <?php
            }
        ?>
    </body>
    <script type="text/javascript">
            $( document ).ready(function() {
                var table =$('#table-table').dataTable({
                    "bProcessing": true,
                    "sAjaxSource": "<?php echo site_url("gift/response");?>",
                    "aoColumns": [
                        { mData: 'gift_id'},
                        { mData: 'gift_id'},
                        { mData: 'gift_name'},
                        { mData: 'gift_point'},
                        { mData: 'modifier'},
                        { mData: 'last_modified_date'},
                        {"sDefaultContent": '<?php if($p->permission_edit!=0){ ?><a href="#" class="edit"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a><?php } ?>&nbsp;&nbsp;<?php if($p->permission_delete!=0){ ?><a href="#" class="delete"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a><?php } ?>'}, 
                        
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

                 // var acc_id=$(this).closest('tr').find('td:nth-child(9)').html();

                    var href='<?php echo site_url("gift/delete") ?>' +"/"+ id;
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
                    var href='<?php echo site_url("gift/load") ?>' +"/"+ id;
                    $.ajax({
                        type: 'POST',
                        url: href,
                        success: function () {
                            window.open("<?php echo site_url("gift/addnew"); ?>", "_self");
                        }
                    });
                });
                        
                         
                        
            });
        </script>
</html>
