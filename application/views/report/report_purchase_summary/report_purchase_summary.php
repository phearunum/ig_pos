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
            foreach($record_permission as $p){
        ?>
        <form class="formSale" id="form">
            <table width="100%" class="table-form">
                <tr class="field-title">
                    <td>
                        <?php echo $lbl_from?><label class="star"></label> 
                        <input type="text" name="txt_date_from" id="txt_date_from" value="<?php echo $date_from ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        <?php echo $lbl_to?><label class="star"></label> 
                        <input type="text" name="txt_date_until" id="txt_date_until" value="<?php echo $date_until ?>" class="cbo-srieng" placeholder="yyyy-mm-dd">
                        <span> <?php echo $lbl_sup?><label class="star"></label> 
                        <input type="text" name="customer_name" id="customer_name" value="" class="cbo-srieng" placeholder="Supplier Name">
                        <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;"></span>
                        <input type="submit" name="btnsubmit" value="<?php echo $btn_search?>" class="btn-srieng"/>
                        <input type="button" name="export" onclick="myFunction()" value="<?php echo $btn_export?>" class="btn-srieng"/>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><h5><b><?php echo $lbl_title ?></b></h5></td>
                </tr>
            </table>
        </form>   
        <?php
            foreach($record_permission as $p){
        ?>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">           
            <thead>
                <tr class="persist-header" style="width: 100%"> 
                    <th>No</th>              
                    <th>Purchase#</th>
                    <th>Purchase#</th>
                    <th>Supplier Name</th>
                    <th>Total</th>
                    <th>Deposit</th>
                    <th>Grand Total</th>
                    <th>Recorder</th>
                    <th>Created Date</th>  
                    <th>Status</th>
                    <th></th>
                    
                </tr>
            <thead> 
            <tfoot class="">
                <td  style="text-align: left; padding-left: 3%;"><?php echo "Grand Total($)"?> : </td>
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
                $("#txt_date_from").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#txt_date_until").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $( document ).ready(function() {
                    var data_sale_summary;
                    data_sale_summary = $('#table-table').dataTable({
                                    "bProcessing": true,
                                    "sAjaxSource": "<?php echo site_url("report_purchase_summary/response/");?>",
                                    "aoColumns": [                                    
                                    { mData: 'purchase_no'},
                                    { mData: 'purchase_no'},
                                    { mData: 'purchase_no_link'},                                    
                                    { mData: 'supplier_name'},
                                    { mData: 'total'}, 
                                    { mData: 'purchase_deposit'},
                                    { mData: 'grand_total'},
                                    { mData: 'recorder'},
                                    { mData: 'purchase_created_date'},
                                    { mData: 'status'}, 
                                    {"sTitle": "<?php if($p->permission_edit!=0){ ?><?php echo $lbl_edit?><?php } ?>", "sDefaultContent": '<?php if($p->permission_edit!=0){ ?><a href="#" class="edit_p"><?php echo $lbl_edit?></a><?php } ?>' },                                   
                            ],"order": [[ 1, "desc" ]],
                            "aoColumnDefs": [
                                { "sClass": "hide_me", "aTargets": [ 1 ] }                               
                              ],
                                    "iDisplayLength": 50,
                                    "footerCallback": function () {
                                        var api = this.api(),
                                        data;
                                        // Remove the formatting to get integer data for summation
                                        var intVal = function (i) {
                                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                                        };
                                        // Total over this page
                                        pageTotal = api.column(1, {
                                            page: 'current'
                                        })
                                                .data()
                                                .reduce(function (total, b) {
                                                var bb = b.replace(/\,/g, '');                                            
                                            return total + parseFloat(bb);
                                               
                                        }, 0); 
                                        
                                         pageGrandtotal = api.column(6, {
                                            page: 'current'
                                        })
                                                .data()
                                                .reduce(function (total, b) {
                                                var bb = b.replace(/\,/g, '');                                            
                                            return total + parseFloat(bb);
                                               
                                        }, 0);
                                        deposit = api.column(1, {
                                            page: 'current'
                                        })
                                                .data()
                                                .reduce(function (total, b) {
                                                var bb = b.replace(/\,/g, '');                                            
                                            return total + parseFloat(bb);
                                               
                                        }, 0);
//                                        
//                                      $(api.column(4).footer()).html((pageTotal).toFixed(2)); 
//                                      $(api.column(5).footer()).html((deposit).toFixed(2)); 
                                        $(api.column(6).footer()).html((pageGrandtotal).toFixed(2)); 
                                    }
                                });
                                var tables = $('#table-table').DataTable();
                                                    tables.on('order.dt search.dt', function () {
                                                        tables.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                                            cell.innerHTML = i + 1;
                                                        });
                                                    }).draw();
                                
                                $('#table-table').on('click', 'td .edit_p', function(e) {
                                    e.preventDefault();
                                    var id = $(this).closest('tr').find('td:nth-child(2)').html();                            
                                    var href='<?php echo site_url("purchase/re_edit") ?>' +"/"+ id;
                                 if (confirm('Do you want to Edit this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }                                
                                });
                                // view purchase detail
                                $('#table-table').on('click', 'td .edit', function(e) {
                                    e.preventDefault();
                                    var id = $(this).closest('tr').find('td:nth-child(2)').html();
                                    var href='<?php echo site_url("purchase/view_detail") ?>' +"/"+ id;
                                if (confirm('Do you want to View Detail of this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }    
                                });
                                // view purchase pay
                                $('#table-table').on('click', 'td .edit', function(e) {
                                    e.preventDefault();
                                    var id = $(this).closest('tr').find('td:nth-child(2)').html();
                                    var href='<?php echo site_url("report_purchase_summary/view_detail") ?>' +"/"+ id;                                
                                    window.location.href = href;                                  
                                });                              
                        
                                $("#form").on('submit',function(e){
                                e.preventDefault();
                                var df,dt,customer_name;
                                df = $("#txt_date_from").val();
                                dt = $("#txt_date_until").val();                      
                                customer_name = $("#customer_name").val();
                                var url = '<?php echo site_url("report_purchase_summary/responses?");?>'+'df='+df+'&dt='+dt+'&customer_name='+customer_name;
                               //alert(url);
                                $.getJSON(url, null, function( json )
                                {                            
                                    oSettings = data_sale_summary.fnSettings();
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
                
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip(); 
                });
        </script>        
            <?php } ?>
        <?php
            }
        ?>
        
        <script>
            $('#customer_name').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
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
                $('#txtcustomer_id').val(names[1]);
            }
         });
        </script>
        <script>
            function pay(id){                       
                <?php
                    if($p_edit==1){
                ?>
                        if(confirm('Do you want to edit this record?')){
                            window.open("<?php echo site_url("purchase_pay/pay/"); ?>"+"/"+id);
                        }
                <?php
                   }else{
                ?>
                        alert("Sorry you don't have permission to edit this record!");
                <?php
                  }
                ?>
            }
        </script>
    </body>    
</html>
