<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>        
        <script type="text/javascript">   
         function myFunction(){
            $(function() {
                    $("#table2excel").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "Report Purchase Summary",
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
            //foreach($record_permission as $p){
        ?>
        <form class="formSale" id="form">
            <table width="100%" class="table-form">
                <tr>
                    <td class="text-center" colspan="12"><h5><b><?php echo $lbl_title ?></b></h5></td>
                </tr>
                <tr class="field-title">
                    <td>
                        <?php echo $lbl_from?> : <label class="star"></label> 
                        <input type="text" name="txt_date_from" id="txt_date_from" value="<?php echo $date_from ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        <?php echo $lbl_to?> : <label class="star"></label> 
                        <input type="text" name="txt_date_until" id="txt_date_until" value="<?php echo $date_until ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        <?php echo $lbl_supplier?> : <label class="star"></label> 
                        <input type="text" name="txt_supplier" id="txt_supplier" class="cbo-srieng" placeholder="Supplier Name">                              
                        <input type="submit" name="btnsubmit" value="<?php echo $btn_search?>" class="btn-srieng"/>
                        <input type="button" name="export" onclick="myFunction()" value="<?php echo $btn_export?>" class="btn-srieng"/>
                    </td>
                </tr>
            </table>
        </form>   
       
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">           
            <thead>
                <tr class="persist-header" style="width: 100%">
                    <th><?php echo $lbl_po?></th>
                    <th><?php echo "Supplier"?></th>
                    <th><?php echo $lbl_debit_amount?></th>
                    <th><?php echo $lbl_recorder?></th>
                    <th><?php echo $lbl_create_date?></th>
                    <th><?php echo $lbl_due_date?></th>
                    <th><?php echo "Status"?></th>
                </tr>
            <thead> 
            <tfoot class="">
                <td><?php echo $lbl_total?> : </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
    </table>
        <script type="text/javascript">
                $("#txt_date_from").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#txt_date_until").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $( document ).ready(function() {
                    var data_sale_summary;
                    data_sale_summary = $('#table-table').dataTable({
                                    "bProcessing": true,
                                    "sAjaxSource": "<?php echo site_url("report_purchase_dept/response/");?>",
                                    "aoColumns": [                                    
                                    { mData: 'purchase_click'},                                    
                                    { mData: 'supplier_name'},
                                    { mData: 'purchase_pay_credit_amount'}, 
                                    { mData: 'recorder'},
                                    { mData: 'purchase_created_date'},
                                    { mData: 'purchase_due_date'},
                                    { mData: 'status'},
                            ],"order": [[ 1, "desc" ]],
                            "aoColumnDefs": [ {
                                "aTargets": [ 2 ],
                                "mRender": function (data) {
                                    return parseFloat(data).toFixed(2);
                            }}],
                                    "iDisplayLength": 50,
                                    "footerCallback": function () {
                                        var api = this.api(),
                                        data;
                                        // Remove the formatting to get integer data for summation
                                        var intVal = function (i) {
                                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                                        };
                                        // Total over this page
                                        pageTotal = api.column(2, {
                                            page: 'current'
                                        })
                                                .data()
                                                .reduce(function (total, b) {
                                                var bb = b.replace(/\,/g, '');                                            
                                            return total + parseFloat(bb);
                                               
                                        }, 0);
                                        $(api.column(2).footer()).html((pageTotal).toFixed(2)); 
                                    }
                                });
                                
                                $("#form").on('submit',function(e){
                                e.preventDefault();
                                var df,dt,supplier;
                                df = $("#txt_date_from").val();
                                dt = $("#txt_date_until").val();                      
                                supplier = $("#txt_supplier").val();
                                var url = '<?php echo site_url("report_purchase_dept/responses?");?>'+'df='+df+'&dt='+dt+'&supplier='+supplier;
                                //alert(url);
                                $.getJSON(url, null, function(json)
                                {                            
                                    oSettings = data_sale_summary.fnSettings() ;
                                    data_sale_summary.fnClearTable(this);
                                    for (var i=0; i<json.aaData.length; i++)
                                    {
                                        data_sale_summary.oApi._fnAddData(oSettings, json.aaData[i]);
                                    }
                                    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
                                    data_sale_summary.fnDraw();
                                });
                            });
                });
                $('#txt_supplier').autocomplete({
                 source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchseller') ?>',
                    dataType: "json",
                    data: {
                        name_startsWith: request.term,
                        type: 'supplier_table',
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
                $('#txt_supplier').val(names[1]);
            }
        });  
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
        </script>        
           
        <?php
            //}
        ?>
    </body>    
</html>
