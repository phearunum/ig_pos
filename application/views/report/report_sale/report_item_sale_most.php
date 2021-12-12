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
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    alert("Export your Data ");
                    $("#panel_report").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Item Sold The Most",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
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
                    xmlhttp.open("POST", "report_sale_summary/search/" + date_from + "/" + date_to + "/" + customer, true);
                    xmlhttp.send();
                }
            }
        </script>
    </head>
    <body style="margin-bottom: 60px;">
        <form class="formSale" id="form">
            <table style="width: 100%">
                <tr class="field-title">
                    <td colspan="10" style="text-align: left;">
                        <?php echo $lbl_from ?> :<input type="text" name="datefrom" id="datefrom" class="txt_date"   placeholder="yyyy/mm/dd"/>                     
                        <?php echo $lbl_to ?> :<input type="text" name="dateto" id="dateto" class="txt_date"   placeholder="yyyy/mm/dd"/>
                        <input type="text" name="txt_customer_name" id="txt_customer_name" autocomplete="off"  placeholder="CUSTOMER" autofocus>
                        <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="hidden">
                        <input type="submit" name="btn_search" id="btn_search" value="Search" class="btn-srieng">
                        <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;">Item Sold The Most</td>
                </tr>
            </table>
        </form>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th>Item Type Name</th>
                    <th>Part Number#</th>
                    <th>Item Name</th>
                    <th>Unit Price($)</th>
                    <th>Sold Qty</th>      
                    <th>sub Total($)</th>
                    <th>Grand Total($)</th>
                    <th>Sold Date</th>
                </tr>
            </thead>
            <tfoot class="grand_total">
                <td>Grand Total :</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                              
            </tfoot>
    </table>
</body>
<script type="text/javascript">
    $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $(document).ready(function (){
        
        var data_table=$('#table-table').dataTable({
            "bProcessing": true,
            "sAjaxSource": "<?php echo site_url("item_sale_most/response/"); ?>",
            "aoColumns": [
                {mData: 'item_type_name'},
                {mData: 'item_detail_part_number'},
                {mData: 'item_name'},
                {mData: 'unit_price'},
                {mData: 'qty'},                
                {mData: 'sub_total'},
                {mData: 'grand_total'},
                {mData: 'end_date'}, 
            ],
            "iDisplayLength": 50,
            "order": [[4, 'DESC']],
            "filter":false
            
        });
        //AJAX FORM SUBMIT
        $("#form").on('submit',function(e){
                e.preventDefault();

                var df,dt,customer_name;
                df = $("#datefrom").val();
                dt = $("#dateto").val();                      
                customer_name = $("#txtcustomer_id").val();

                var url = '<?php echo site_url("item_sale_most/responses?");?>'+'df='+df+'&dt='+dt+'&customer_name='+customer_name;
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
</script>
<script>
    $.noConflict();
    jQuery(document).ready(function ($) {
        $("#datefrom").datepicker({dateFormat: 'dd-mm-yy', showButtonPanel: true});
        $("#dateto").datepicker({dateFormat: 'dd-mm-yy', showButtonPanel: true});
    });
</script>
<script type="text/javascript">
    $('#txt_customer_name').autocomplete({
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
</html>
