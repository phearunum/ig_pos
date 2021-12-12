<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach ($record_permission as $p) {
            ?>
            <div class="container-fluid container-fluid-custom">
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <td class="form-title" colspan="12"><?php echo $lbl_list; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo $lbl_no;?></th>
                        <th><?php echo $lbl_item;?></th>
                        <th><?php echo $lbl_stock;?></th>
                        <th><?php echo $lbl_qty;?></th>
                        <th><?php echo $lbl_measure;?></th>
                        <th><?php echo $lbl_price;?></th>
                        <th><?php echo $lbl_retail_qty ?></th>
                        <th><?php echo $lbl_retail_amount ?></th>
                        <th><?php echo $lbl_total;?></th>
                    </tr>
                </thead>
               
            </table>
        </div>
            <script type="text/javascript">
                
                $(document).ready(function () {
                    var t = $('#table-table').dataTable({
                        "bProcessing": true,
                        "sAjaxSource": "<?php echo site_url("purchase/response_detail/$id"); ?>",
                        "aoColumns": [
                                            {mData: 'purchase_no'},
                                            {mData: 'item_detail_name'},
                                            {mData: 'stock_location_name'},
                                            {mData: 'purchase_detail_qty'},
                                            {mData: 'measure_name'},
                                            {mData: 'purchase_detail_unit_cost'},
                                            {mData: 'measure_qty','mRender':function(data, type, row){
                                               
                                                return parseInt(row.purchase_detail_qty*data);
                                            }},
                                            {mData: 'measure_qty','mRender':function(data, type, row){
                                                
                                                return parseInt(row.purchase_detail_total_amount/data);
                                            }},
                                            {mData: 'purchase_detail_total_amount','mRender':function(data){
                                                return numeral(data).format('#.'+dot_0+'');
                                            }},
                                            
                                            
                                            
                                                        ]
                                                      
                                                        
                                                        ,
                                                        "displayLength": 50,
                                                        
                                                       
                                                    });

                                                    var tables = $('#table-table').DataTable();
                                                        tables.on('order.dt search.dt', function () {
                                                            tables.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                                                cell.innerHTML = i + 1;
                                                            });
                                                        }).draw();
                                                    
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
