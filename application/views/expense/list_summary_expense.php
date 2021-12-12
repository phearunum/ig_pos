<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    alert("Export your Data ");
                    $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Expense List",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                    });
                });
            }

        </script>
    </head>
    <body>
        <!-- <?php
            foreach ($record_permission as $p) {
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
            <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                            <input type="text" class="form-control text_input" name="txt_expense_no" id="txt_expense_no" value=""  placeholder="Expense No">
                            <input type="hidden" name="txt_expense_id" id="txt_expense_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                            <select class="form-control" name="cbo_branch" id="cbo_branch" >
                                <option value="0">--All Branch--</option>
                                <?php
                                foreach ($branch as $b) {
                                    ?>
                                    <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                                <?php } ?>
                            </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                            <button type="submit" name="btn_search" class="btn btn-primary btn-block"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                       <!--  <?php if ($p->permission_add != 0) { ?> --><a class="btn btn-primary <?php echo $permission_add;?>" href="<?php echo site_url("expense/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $lbl_new?></a><!-- <?php } ?> -->
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h4 class="text-center"><?php echo $lbl_title;?></h4>
            <table width="100%" cellspacing="0" class="table-table table-form font_khmer" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        
                        <th><?php echo $lbl_no ?></th>
                        <th><?php echo "Expense No" ?></th>
                        <th><?php echo $lbl_date_entry ?></th>
                        <th><?php echo $lbl_total ?></th>
                        <th><?php echo "Branch" ?></th>
                        <th><?php echo $lbl_recorder ?></th>
                       <!--  <th><?php echo "Edit" ?></th>
                        <th><?php echo "Delete" ?></th> -->
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                        <tr>
                            <td>Grand Total :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <!-- <td></td>
                            <td></td> -->
                        </tr>
                    </tfoot>
            </table>
        </div>
            <script type="text/javascript">
            $(document).ready(function () {
                var data_table=$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url("expense/response"); ?>",
                    "aoColumns": [
                        { mData: 'expense_no',render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { mData: 'expense_nos'},
                        { mData: 'expense_created_date'},
                        
                        { mData: 'total'},
                        { mData: 'branch_name'},
                        { mData: 'recorder'},
                           
                    ],
                    "columnDefs": [
                        {"sClass": "hidden", "aTargets": [2]}
                    ],
                    "iDisplayLength": 50,
                    "footerCallback": function (nRow) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };
                        total_amount = api.column( 3, {page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        grand_total_amount = api.column( 3, {page: 'all'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        //
                        var nCell = nRow.getElementsByTagName('td');
                        nCell[3].innerHTML = total_amount.toFixed(dot_num)+ ' of ' + grand_total_amount.toFixed(dot_num);
                    }
                });
                //AJAX FORM SUBMIT
            $("#form").on('submit', function (e) {
                e.preventDefault();
                var url  = '<?php echo site_url("Expense/responses"); ?>';
                var data = $(this).serialize();

                 data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, data, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
            });
            //END AJAX FORM SUBMIT


           
        
            // $('#table-table').on('click', 'td .edit', function (e) {
            //     e.preventDefault()
            //     var id = $(this).closest('tr').find('td:first').html();
            //     var href = '<?php// echo site_url("expense/edit_load/") ?>' + "/" + id;
            //     //  $('a.delete', $(this)).attr('href', href);
            //     window.location.href = href;
            // });
       
        });

             function del(id,b){
                var href = '<?php echo site_url("expense/delete_by_expense_no") ?>' + "/" + id+'/'+b;
                if (confirm('Do you want to delete this record?')) {
                    window.location.href = href;
                } 
            }

        </script>
    <script type="text/javascript">
        $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    </script>
    <?php } ?>
    </body>
</html>