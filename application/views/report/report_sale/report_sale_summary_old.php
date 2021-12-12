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
                        <?php echo $lbl_from ?> :<input type="text" name="datefrom" id="datefrom" class="txt_date"   placeholder="YYYY-MM-DD"/>                     
                        <?php echo $lbl_to ?> :<input type="text" name="dateto" id="dateto" class="txt_date"   placeholder="YYYY-MM-DD"/>
                        <input type="text" name="txt_customer_name" id="txt_customer_name" onchange="clearId()" autocomplete="off"  placeholder="CUSTOMER" autofocus>
                        <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="hidden">
                        <input type="text" name="txt_invoice_no" id="txt_invoice_no" autocomplete="off"  placeholder="INVOICE#">
                        <input type="submit" name="btn_search" id="btn_search" value="<?php echo $btn_search ?>" class="btn-srieng">
                         <input type="button" name="btn_submit"  id="btnexport" class="btn-highpoint" value="<?php echo $btn_export ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo $lbl_title ?></td>
                </tr>
				<tr>
                    <td colspan="10"><div id="loader"><center><img src="<?php echo base_url('img/loading.gif'); ?>" width="40px" /></center></div></td>
                </tr>
            </table>
        </form>
        <?php
            foreach($record_permission as $p){
        ?>
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
                    <th><?php echo "Member ($)"?></th>
                    <th><?php echo $lbl_grand ?>($)</th>
                    <!--<th><?php // echo "Cash" ?>($)</th>-->
                    <th><?php echo "Account"?></th>
                    <th><?php echo "Account Type($)" ?></th>
                    <th><?php echo "Status"?></th>
                    <th><?php echo "Hide"?></th>
                    <th><?php echo "Show"?></th>
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
    $('#loader').css("display","none");
    $("#txt_date_from").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#txt_date_until").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $(document).ready(function (){
//    $('#loader').hide();
        var data_table=$('#table-table').dataTable({
            "bProcessing": true,
            "sAjaxSource": "<?php echo site_url("report_sale_summary/response/"); ?>",
			oLanguage: {
                    sProcessing: "<div id='loading'><center><img src='<?php echo base_url('img/loading.gif'); ?>' width='40px' ></center></div>"},
            processing : true,
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
                {mData: 'member_pay'},
                {mData: 'grand_total_with_member_pay'},
                {mData: 'card_pay'},
                {mData: 'card_payment'},
                {mData: 'status_invoice'},
                {"sTitle": "<?php if($p->permission_edit!=0){ echo 'Hide';}?>", "sDefaultContent": '<?php if($p->permission_edit!=0){ ?><a href="#" class="hide_invoice"><img src="<?php echo base_url("img/eye_hide.png"); ?>"></a><?php }?>' },
            {"sTitle": "<?php if($p->permission_edit!=0){  echo 'Show';}?>", "sDefaultContent": '<?php if($p->permission_edit!=0){ ?><a href="#" class="show_invoice"><img src="<?php echo base_url("img/eye_show.png"); ?>"></a><?php }?>' }
            ],
            "iDisplayLength": 50,
            "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
            "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0]},{"sClass": "hidden", "aTargets": [15]}],
            "order": [[1, 'desc']],
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
                member_pay = api.column(13, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                grand_total = api.column(14, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_card_pay = api.column(15, {
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
                var nCells_9 = nRow.getElementsByTagName('td');
                var nCells_10 = nRow.getElementsByTagName('td');
                
                nCells_4[9].innerHTML = total.toFixed(2);
                nCells_5[10].innerHTML = total_dis.toFixed(2);
                nCells_6[11].innerHTML = total_vat.toFixed(2);
                nCells_7[12].innerHTML = total_charge.toFixed(2);
                nCells_8[13].innerHTML = member_pay.toFixed(2);
                nCells_9[14].innerHTML = grand_total.toFixed(2);
                nCells_10[15].innerHTML = total_card_pay.toFixed(2);
            }
        });
        
        $('#table-table').on('click', 'td .hide_invoice', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("report_sale_summary/hide") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                if (confirm('Are you sure you want to hide this record?')) {
                                    window.location.href = href;
                                }                             
                        });
                        
        $('#table-table').on('click', 'td .show_invoice', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("report_sale_summary/show") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                if (confirm('Are you sure you want to show this record?')) {
                                    window.location.href = href;
                                }                             
                        });
        
        //AJAX FORM SUBMIT
        $("#form").on('submit',function(e){
                e.preventDefault();
				$('#loader').show();
                var df,dt,customer_name,inv;
                df = $("#datefrom").val();
                dt = $("#dateto").val();                      
                customer_name = $("#txtcustomer_id").val();
                inv = $("#txt_invoice_no").val();

                var url = '<?php echo site_url("report_sale_summary/responses?");?>'+'df='+df+'&dt='+dt+'&customer_name='+customer_name+'&inv='+inv;

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
					$('#loader').hide();
                });
            });
        //END AJAX FORM SUBMIT
    });
	$("#btnexport").click(function(){
                var df,dt,customer_name;
                df = $("#datefrom").val();
                dt = $("#dateto").val();                      
                customer_name = $("#txtcustomer_id").val();

                var url = '<?php echo site_url("report_sale_summary/export?");?>'+'df='+df+'&dt='+dt+'&customer_name='+customer_name;

     window.open(url);
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
<?php
    }
?>
</html>
