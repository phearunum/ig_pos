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
                            filename: "Report Customer Count",
                            fileext: ".xls"
                    });
                });
           }
           function search(str) {
                var date_from = $("#datefrom").val();
                var date_to = $("#dateto").val();
                var customer = $("#txtcustomer_id").val();

                if (str == "") {
                    document.getElementById("panel_report").innerHTML = "";

                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("panel_report").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("POST", "report_customer_count/responses/" + date_from + "/" + date_to + "/" + customer, true);
                    xmlhttp.send();
                }
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
                        <input type="text" name="txt_customer_name" id="txt_customer_name" onchange="clearId()" autocomplete="off"  placeholder="CUSTOMER" autofocus>
                        <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="hidden">
                        <input type="text" name="txt_customer_card" id="txt_customer_card" autocomplete="off"  placeholder="CARD NUMBER#">
                        <input type="submit" name="btn_search" id="btn_search" value="<?php echo 'Search'; ?>" class="btn-srieng">
                        <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="<?php echo 'Export' ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo 'Report Customer Count' ?></td>
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
                                <th>Customer Name</th> 
                                <th>Card Number</th> 
                            
                                <th>Total Qty</th>        
                                <th>Invoice Count</th>  
                            </tr>
                        </thead>
<!--                        <tfoot>
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
                        </tfoot>-->
                    </table>
                </td>
            </tr>
        </table>
            <script type="text/javascript">
            $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $( document ).ready(function() {
                    var data_table = $('#table-table').dataTable({
                                 "bProcessing": true,
                                 "sAjaxSource": "<?php echo site_url("report_customer_count/response");?>",
                                 "aoColumns": [
                                        { mData: 'customer_id'},
                                        { mData: 'customer_id'},
                                        { mData: 'customer_name'},
                                        { mData: 'customer_card_number'},
                                   
                                        { mData: 'qty'},
                                        { mData: 'invoice_count'}
                                ],                                
                                "iDisplayLength": 50,
                                "aoColumnDefs": [
                                        { "sClass": "hide_me", "aTargets": [ 0,1 ] },{
                                    "aTargets": [ 4,5 ],
                                    "mRender": function (data) {
                                        return parseFloat(data).toFixed(2);
                                    }
                                }                               
                               ]//"footerCallback": function (nRow) {
//                                    var api = this.api(),data;
//                                    // Remove the formatting to get integer data for summation
//                                    var intVal = function (i) {
//                                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
//                                    };
//                                    //TOTAL BY ROW
//                                    total = api.column(4, {
//                                            page: 'current'
//                                        })
//                                                .data()
//                                                .reduce(function (total, b) {
//                                                var bb = b.replace(/\,/g, '');                                            
//                                            return total + parseFloat(bb);
//                                               
//                                        }, 0);    
//                                     total_current = api.column(5, {
//                                            page: 'current'
//                                        })
//                                                .data()
//                                                .reduce(function (total, b) {
//                                                var bb = b.replace(/\,/g, '');                                            
//                                            return total + parseFloat(bb);
//                                               
//                                        }, 0);
////                                     total_amount = api.column(5, {
////                                            page: 'current'
////                                        })
////                                                .data()
////                                                .reduce(function (total, b) {
////                                                var bb = b.replace(/\,/g, '');                                            
////                                            return total + parseFloat(bb);
////                                               
////                                        }, 0); 
//                                    // END TOTAL BY ROW                                  
//
//                                    $(api.column(4).footer()).html((total).toFixed(2)); 
//                                    $(api.column(5).footer()).html((total_current).toFixed(2)); 
////                                    $(api.column(5).footer()).html((total_amount).toFixed(2)); 
//
//                                    }
                                });
                         
                        
                        $("#form").on('submit',function(e){                          
                        e.preventDefault();
                        var df,dt;
                        df = $("#datefrom").val();
                        dt = $("#dateto").val();                    
                        customer_name = $("#txt_customer_name").val();
                        number= $("#txt_customer_card").val();                
                        var url = '<?php echo site_url("report_customer_count/responses?");?>'+'df='+df+'&dt='+dt+'&customer_name='+customer_name+'&number='+number;                        
//                        alert(url);
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
                                    url: '<?php echo site_url('report_customer_count/responses') ?>',
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
