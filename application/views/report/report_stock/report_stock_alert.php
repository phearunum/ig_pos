<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    $("#table2excel").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Report Stock",
                        fileext: ".xls"
                    });
                });
            }
        </script>
        <style>
            .dataTables_length{
                display:none;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
            <form class="formSale" id="form" hidden>
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="Part Number"> 
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_item_name" id="txt_item_name" value=""  placeholder="Item Main">
                        <input type="text" name="txt_item_id" id="txt_item_id" class="hidden">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_item_type" id="txt_item_type" autocomplete="off" placeholder="Item Type">
                        <input type="hidden" name="txt_item_type_id" id="txt_item_type_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_stock_location" id="cbo_stock_location" >              
                            <option value="0">--All Stock--</option>
                            <?php
                            foreach ($stock_location as $rt) {
                                ?>
                                <option value="<?php echo $rt->stock_location_id; ?>"><?php echo $rt->stock_location_name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        <table width='100%'>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="0">
                        <thead>
                            <tr>
                                <td class="form-title" colspan="8" style="text-align: center;">
                                    <?php echo $lbl_title ?>
                                </td>
                            </tr>
                            <tr class="persist-header">
                                <th><?php echo $lbl_part; ?></th>
                                <th><?php echo "Item Name"; ?></th>
                                <th><?php echo $lbl_qty; ?></th>
                                <th>Branch</th>
                                <th><?php echo $lbl_stock_location ?></th>
                            </tr>
                        </thead>
                    </table>
                </td>
            </tr>
        </table> 
    </div>
        <script type="text/javascript">
            $(document).ready(function () {
                var data_table=$('#table2excel').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url("report_stock/response_alert"); ?>",
                    "aoColumns": [
                        {mData: 'part_number'},
                        {mData: 'item_detail_name'},
                        {mData: 'qty'},
                        {mData: 'branch_name'},
                        
                        {mData: 'stock_name'}
                    ],
                    "searching": false,
                    "iDisplayLength": 100,
                });
            });
        </script>
    </body>
</html>
