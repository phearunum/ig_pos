<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function exp_excel() {
                $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "REPORT SALE SUMMARY",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                    });
            }
           
        </script>
    </head>
    <body style="margin-bottom: 60px;">
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
                        <select name="cbo_category" id="cbo_category" class="form-control">
                            <option value="0">--ALL CATEGORY--</option>
                           <?php
                            foreach ($record_cagegory as $rc) {
                           ?>
                            <option value="<?php echo $rc->item_type_id; ?>"><?php echo $rc->item_type_name; ?></option>
                        <?php
                        }
                        ?>
                        </select> 
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="exp_excel()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h3 class="text-center text-primary"><?php echo $lbl_rev_title;?></h3>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo "ID"?></th>
                    <th><?php echo $lbl_rev_item_type; ?></th>
                    <th><?php echo $lbl_rev_qty; ?></th>
                    <th><?php echo $lbl_rev_sub_total; ?></th>
                    <th><?php echo $lbl_rev_total_descount; ?></th>
                    <th><?php echo $lbl_rev_grand_total;?></th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
                <td></td>
                <td><?php echo $lbl_rev_grand_total; ?>:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
    </table>
</body>
</div>
<script type="text/javascript">
    $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $(document).ready(function (){
        var data_table=$('#table-table').DataTable({
            "bProcessing": false,
            "sAjaxSource": "<?php echo site_url("report_sale_revenue_by_category/response/"); ?>",
            "aoColumns": [
                {mData: 'item_type_name'},
                {mData: 'item_type_name'},
                {mData: 'item_count' },
                {mData: 'sub_total'},
                {mData: 'total_discount_dollar'},
                {mData: 'grand_total'}
            ],
            "iDisplayLength": 50,
            "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
            "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0]}],
            "order": [[ 1, 'asc' ]],
            "footerCallback": function (nRow) {
                var api = this.api(),data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                //TOTAL BY ROW
                qty = api.column(2, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                subtotal = api.column(3, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                
                total_dis = api.column(4, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                
                grand_total = api.column(5, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                
                // END TOTAL BY ROW                                   

                /* Modify the footer row to match what we want */
                var nCells = nRow.getElementsByTagName('td');
                
                nCells[3].innerHTML = subtotal.toFixed(2);
                nCells[4].innerHTML = total_dis.toFixed(2);
                nCells[5].innerHTML = grand_total.toFixed(2);
                nCells[2].innerHTML = qty.toFixed(2);
            }
        });
        $("#form").on('submit',function(e){
            e.preventDefault();
            var df,dt,category;
            df = $("#datefrom").val();
            dt = $("#dateto").val();                      
            category = $("#cbo_category").val();

            var url = '<?php echo site_url("report_sale_revenue_by_category/responses?");?>'+'df='+df+'&dt='+dt+'&category='+category;
                data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, null, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
        });
        //END AJAX FORM SUBMIT
        });
</script>
<script>

    $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
</script>

</html>
