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
        <form class="formSale" id="form">
            <table style="width: 100%">
                <tr class="field-title">
                    <td colspan="10" style="text-align: left;">
                        <?php echo $lbl_from ?> :<input type="text" name="datefrom" id="datefrom" class="txt_date"   placeholder="YYYY-MM-DD"/>                     
                        <?php echo $lbl_to ?> :<input type="text" name="dateto" id="dateto" class="txt_date"   placeholder="YYYY-MM-DD"/>
                        <input type="text" name="txt_customer_name" id="txt_customer_name" onchange="clearId()" autocomplete="off"  placeholder="CUSTOMER" autofocus>
                        <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="hidden">
                        <input type="text" name="txt_invoice_no" id="txt_invoice_no" autocomplete="off"  placeholder="INVOICE#">
                        <input type="submit" name="btn_search" id="btn_search" value="<?php echo $btn_search ?>" class="btn-srieng">
                        <input type="button" name="btn_submit"  id="btnexport" class="btn-highpoint" onclick="exp_excel()" value="<?php echo $btn_export ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo "REPORT SHOW INVOICE" ?></td>
                </tr>
            </table>
        </form>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo "ID"?></th>
                    <th><?php echo $lbl_invoice_no ?></th>
                    <th><?php echo $lbl_customer ?></th>
                    <th><?php echo $lbl_card_no ?></th>
                    <th><?php echo 'Seller'?></th>
                    <th><?php echo 'Cashier'?></th>
                    <th><?php echo $lbl_date ?></th>
                    <th><?php echo 'Time In'?></th>
                    <th><?php echo 'Time Out'?></th>
                    <th><?php echo $lbl_total ?>($)</th>
                    <th><?php echo $lbl_discount ?>($)</th>
                    <th><?php echo $lbl_tax ?>($)</th>
                    <th><?php echo $lbl_service ?>($)</th>
                    <th><?php echo $lbl_grand ?>($)</th>
                </tr>
            </thead>
            <tfoot class="grand_total">
                <td></td>
                <td><?php echo $lbl_grand; ?>:</td>
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
            "sAjaxSource": "<?php echo site_url("report_sale_summary/response/"); ?>",
            "aoColumns": [
                {mData: 'master_id'},
                {mData: 'invoice_no'},
                {mData: 'customer'},
                {mData: 'customer_plate_no'},
                {mData: 'invoice_creator'},
                {mData: 'cashier'},
                {mData: 'end_date'},
                {mData: 'start_hour'},
                {mData: 'end_hour'},
                {mData: 'sub_total'},
                {mData: 'total_discount'},
                {mData: 'tax_amount'},
                {mData: 'service_charge_amount'},
                {mData: 'grand_total'}
            ],
            "iDisplayLength": -1,
            "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
            "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0]}],
            "order": [[0, 'desc']],
            "footerCallback": function (nRow) {
                var api = this.api(),data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                //TOTAL BY ROW
                total = api.column(9, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_dis = api.column(10, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_vat = api.column(11, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_charge = api.column(12, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                grand_total = api.column(13, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                // END TOTAL BY ROW                                   

                /* Modify the footer row to match what we want */
                var nCells_4 = nRow.getElementsByTagName('td');
                var nCells_5 = nRow.getElementsByTagName('td');
                var nCells_6 = nRow.getElementsByTagName('td');
                var nCells_7 = nRow.getElementsByTagName('td');
                var nCells_8 = nRow.getElementsByTagName('td');
                
                nCells_4[9].innerHTML = total.toFixed(2);
                nCells_5[10].innerHTML = total_dis.toFixed(2);
                nCells_6[11].innerHTML = total_vat.toFixed(2);
                nCells_7[12].innerHTML = total_charge.toFixed(2);
                nCells_8[13].innerHTML = grand_total.toFixed(2);
            }
        });
        
        //AJAX FORM SUBMIT
        $("#form").on('submit',function(e){
                e.preventDefault();

                var df,dt,customer_name,inv;
                df = $("#datefrom").val();
                dt = $("#dateto").val();                      
                customer_name = $("#txtcustomer_id").val();
                inv = $("#txt_invoice_no").val();

                var url = '<?php echo site_url("report_sale_show_invoice/responses?");?>'+'df='+df+'&dt='+dt+'&customer_name='+customer_name+'&inv='+inv;

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
        $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
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
    function clearId(){
        if($("#txt_customer_name").val()===""){
            $('#txtcustomer_id').val("");
        }
    }
</script>
</html>
