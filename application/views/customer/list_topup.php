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
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        <script type="text/javascript">
            function myFunction(){
               $(function() {
                   alert("Export your Data ");
                    $("#table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "Report Topup",
                            fileext: ".xls"
                    });
                });
           }
        </script>
        
        <style>
            .hide_me{
                display: none;
            }
        </style>
    </head>
    <body>
        <?php
            //foreach($record_permission as $p){
        ?>
        <table width='100%'>  
            <tr>
                <td>
            <form class="formSale" id="form">
            <table style="width: 100%">
                <tr class="field-title">
                    <td colspan="10" style="text-align: left;">
                        <?php echo 'FROM'; ?> :<input type="text" name="datefrom" id="datefrom" class="txt_date"   placeholder="yyyy/mm/dd"/>                     
                        <?php echo 'TO' ?> :<input type="text" name="dateto" id="dateto" class="txt_date"   placeholder="yyyy/mm/dd"/>
                        <input type="submit" name="btn_search" id="btn_search" value="<?php echo 'Search'; ?>" class="btn-srieng">
                        <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="<?php echo 'Export' ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo 'Report Customer Topup' ?></td>
                </tr>
            </table>
            </form>
             </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table"  id="table-table" cellpadding="0" border="0">
                        <thead>                            
                            <tr>
                                <th>ID</th>
                                <th>ID</th>
                                <th>Account ID</th> 
                                <th>Customer Name</th>        
                                <th>Topup Point</th>  
                                <th>Topup Amount($)</th>
                                <th>Recorder</th>
                                <th>Topup Date</th>
                                <th>Topup Action</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <td></td>               
                            <td></td>
                            <td><b>Grand Total : </b></td>
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
                </td>
            </tr>
        </table>
            <script type="text/javascript">
            $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $( document ).ready(function() {
                    var data_table =    $('#table-table').dataTable({
                                 "bProcessing": true,
                                 "sAjaxSource": "<?php echo site_url("customer/response_topup");?>",
                                 "aoColumns": [
                                        { mData: 'topup_customer_id'},
                                        { mData: 'topup_id'},
                                        { mData: 'topup_customer_acc_id'},
                                        { mData: 'customer_name'},
                                        { mData: 'topup_point'}, 
                                        { mData: 'topup_amount'},
                                        { mData: 'recorder'},
                                        { mData: 'topup_date'},
                                        { mData: 'topup_action'},
                                        {"sTitle": "<?php echo 'Edit'; ?></a>", "sDefaultContent": '<a href="#" class="edit"><i class="fa fa-edit"></i></a>' },
                                        {"sTitle": "<?php echo 'Delete'; ?></a>", "sDefaultContent": '<a href="#" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>' },
                                ],  "order": [[ 1, "desc" ]],                                
                                "iDisplayLength": 50,
                                "aoColumnDefs": [
                                        { "sClass": "hide_me", "aTargets": [ 0,1 ] },{
                                    "aTargets": [ 4,5 ],
                                    "mRender": function (data) {
                                        return parseFloat(data).toFixed(2);
                                    }
                                }                               
                                ],"footerCallback": function (nRow) {
                                    var api = this.api(),data;
                                    // Remove the formatting to get integer data for summation
                                    var intVal = function (i) {
                                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                                    };
                                    //TOTAL BY ROW
                                    total = api.column(4, {
                                            page: 'current'
                                        })
                                                .data()
                                                .reduce(function (total, b) {
                                                var bb = b.replace(/\,/g, '');                                            
                                            return total + parseFloat(bb);
                                               
                                        }, 0);    
                                     total_current = api.column(5, {
                                            page: 'current'
                                        })
                                                .data()
                                                .reduce(function (total, b) {
                                                var bb = b.replace(/\,/g, '');                                            
                                            return total + parseFloat(bb);
                                               
                                        }, 0);
//                                     total_amount = api.column(5, {
//                                            page: 'current'
//                                        })
//                                                .data()
//                                                .reduce(function (total, b) {
//                                                var bb = b.replace(/\,/g, '');                                            
//                                            return total + parseFloat(bb);
//                                               
//                                        }, 0); 
                                    // END TOTAL BY ROW                                  

                                    $(api.column(4).footer()).html((total).toFixed(2)); 
                                    $(api.column(5).footer()).html((total_current).toFixed(2)); 
//                                    $(api.column(5).footer()).html((total_amount).toFixed(2)); 

                                    }
                                });
                         $('#table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault();
                               // var id = $(this).closest('tr').find('td:first').html();
                                var top_id = $(this).closest('tr').find('td:nth-child(2)').html();
                                var acc_id = $(this).closest('tr').find('td:nth-child(3)').html();
                                var href='<?php echo site_url("customer/delete_topup") ?>' +"/"+ top_id +"/"+ acc_id;
                                if (confirm('Do you want to delete this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }                                
                        });
                         $('#table-table').on('click', 'td .edit', function(e) {
                                e.preventDefault();
                                var top_id = $(this).closest('tr').find('td:nth-child(2)').html();
                                var acc_id = $(this).closest('tr').find('td:nth-child(3)').html();
                                var href='<?php echo site_url("customer/report_topup_load_edit") ?>' +"/"+ acc_id +"/" + top_id;
                                 if (confirm('Do you want to edit this record?')) {
                                    window.location.href = href;
                                }
                        });
                        
                        $("#form").on('submit',function(e){                          
                        e.preventDefault();
                        var df,dt;
                        df = $("#datefrom").val();
                        dt = $("#dateto").val();                    
                                         
                        var url = '<?php echo site_url("customer/responses_topup?");?>'+'df='+df+'&dt='+dt;                        
                       // alert(url);
                        $.getJSON(url, null, function( json )
                        {                        
                           
                            oSettings = data_table.fnSettings();
                            data_table.fnClearTable(this);
                            for (var i=0; i<json.aaData.length; i++)
                            {
                                data_table.oApi._fnAddData(oSettings, json.aaData[i]);
                            }
                            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
                            data_table.fnDraw();
                        });
                    });
                //END AJAX FORM SUBMIT
                        
                    });
                    
                     $('#txt_customer_name').autocomplete({
                            source: function (request, response) {
                                $.ajax({
                                    url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                                    dataType: "json",
                                    data: {
                                        name_startsWith: request.term,
                                        type: 'customer_table',
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
    </body>
</html>
