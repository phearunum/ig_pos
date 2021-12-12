<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "PRICE LIST",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                    });
                });
            }

        </script>
        <style type="text/css">
                        .tb {
                width: 0%;
                height: 33px;
            }
        </style>
    </head>
    <body>
       <div class="container-fluid container-fluid-custom">
             <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
       <!--                 <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="txt_date_from" id="txt_date_from" autocomplete="off">
                      </div>  -->
           <!--            <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="txt_date_to" id="txt_date_to" autocomplete="off">
                      </div> -->
                      
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="Part Number">
                        <input type="hidden" name="txtpartnumber_id" id="txtpartnumber_id" class="form-control">
                      </div>

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name">
                        <input type="hidden" name="txtitem_id" id="txtitem_id" class="form-control">
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
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_stock_location" id="cbo_stock_location" >              
                            <option value="0">--All Stock--</option>
                            
                        </select>
                      </div>

                      
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h4 class="text-center"><?php echo $lbl_title;?></h4>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>                
                <tr class="tb">
                    <th><?php echo $lbl_type;?></th>
                    <th><?php echo $lbl_part;?></th>
                    <th><?php echo $lbl_name;?></th>                    
                    <th><?php echo $lbl_sold;?></th>
                    <th><?php echo $lbl_lost;?></th>
                    <th><?php echo $lbl_increase;?></th>
                    <th><?php echo $lbl_transfer;?></th>
                    <th><?php echo $lbl_branch ?></th>
                    <!-- <th>Current Cost($)</th>
                    <th>Total Current Cost($)</th> -->
                    <th><?php echo $lbl_stock;?></th>
                    <!-- <th><?php echo $lbl_measure;?></th> -->
                </tr>
            </thead>
            <tfoot></tfoot>
    </table>
</div>
    <script type="text/javascript">
        $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#txt_date_to").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        //$('#table-table tr > *:nth-child(1)').hide();
        $(document).ready(function () {
            var data_table = $('#table-table').DataTable({
                "bProcessing": false,
                "sAjaxSource": "<?php echo site_url("report_stock_in_out/response/"); ?>",
                "aoColumns": [
                    {mData: 'item_type_name'},
                    {mData: 'item_detail_part_number'},
                    {mData: 'item_detail_name'},
                    {mData: 'sold_qty'},
                    {mData: 'waste_qty'},
                    {mData: 'increase_qty'},
                    {mData: 'transfer_qty'},
                    {mData: 'branch_name'},
                    /*{mData: 'costing','mRender':function(data){
                        return numeral(data).format('#,##0.00000');
                    }},
                    {mData: 'total_costing','mRender':function(data){
                        return numeral(data).format('#,##0.00000');
                    }},*/
                    {mData: 'stock_location_name'}
                    // {mData: 'measure_name'}
                   ],
                   // "searching": false,
                   // "iDisplayLength": 50,
                   "columnDefs": [
                        {"visible": false, "targets": 0}
                    ],
                     "order": [[0, 'asc']],
                    "displayLength": 100,
            });
            $("#form").on('submit', function (e) {
                e.preventDefault();
                var branch_id,stock_location;
                stock_location = $("#cbo_stock_location").val();
                branch_id  =$('#cbo_branch').val();
                var url = '<?php echo site_url("report_stock_in_out/responses?");?>'+'branch_id='+branch_id+'&stock_location='+stock_location;
                 var data = $(this).serialize();
                 data_table.clear().draw();

                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                
                $.getJSON(url, data, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
            });
            //
            $("#item_name").on('blur',function(){
                if($(this).val()=='')
                    $('#txtitem_id').val("");
            });
        });
    </script>     
    
    
    <script type="text/javascript">
        $('#txtpartnumber').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'product_table',
                        row_num: 1
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            var code = item.split("|");
                            return {
                                label: code[5],
                                value: code[5],
                                data: item
                            }
                        }));
                    }
                });
            },
            autoFocus: true,
            minLength: 0,
            select: function (event, ui) {

                var names = ui.item.data.split("|");
                $('#txtpartnumber_id').val(names[1]);
            }
        });
        $('#item_name').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'product_in_stock',
                        row_num: 1
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            var code = item.split("|");
                            return {
                                label: code[0],
                                value: code[0],
                                data: item
                            }
                        }));
                    }
                });
            },
            autoFocus: true,
            minLength: 0,
            select: function (event, ui) {

                var names = ui.item.data.split("|");
                $('#txtitem_id').val(names[1]);
            }
        });

        $('#cbo_branch').change(function(){
            var id=$(this).val();

            if(id>0){
                 $('#cbo_stock_location').html('<option value="0">--All Stock--</option>');
                $.ajax({
                    url:'<?php echo site_url('report_stock_in_out/get_stock')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_stock_location').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                        })
                    }
                })
            }else{
                $('#cbo_stock_location').html('<option value="0">--All Stock--</option>');
            }
            
        });
    </script>   
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
     
</body>
</html>
