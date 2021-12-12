<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
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
    <style>
        tfoot{
            font-weight: bold;
        }
    </style>
    <body>
          <?php
            foreach($record_permission as $p){
        ?>
        <div class="container-fluid container-fluid-custom">
            <form class="formSale" id="form-search">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <!-- <div class="col-sm-2 col-xs-6 col-cs">
                        <input class="form-control form-custom" type="time" name="txt_time_start" id="txt_time_start">
                        <div class="border"></div>
                      </div> -->
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <!-- <div class="col-sm-2 col-xs-6 col-cs">
                        <input class="form-control form-custom" type="time" name="txt_time_end" id="txt_time_end">
                        <div class="border"></div>
                      </div> -->
                      <!-- <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_customer_name" id="txt_customer_name" autocomplete="off"  placeholder="CUSTOMER">
                        <input type="hidden" name="txtcustomer_id" id="txtcustomer_id">
                      </div> -->
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_invoice_no" id="txt_invoice_no" autocomplete="off"  placeholder="INVOICE#">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="branch" id="branch" class="form-control">
                           <option value="0">--All Branch--</option>
                            <?php
                                foreach($branch as $b){
                            ?>
                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                            <?php
                              }
                            ?>
                        </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="exp_excel()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="print_date()"><i class="fa fa-print"></i> <?php echo "Print"; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h3 class="text-center text-primary"><?php echo $lbl_title;?></h3>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo "ID"?></th>
                    <th><?php echo $lbl_invoice_no ?></th>
                    <th><?php echo "Agency" ?></th>
                    <th><?php echo $lbl_cashier?></th>
                    <th><?php echo $lbl_time_in;?></th>
                    <th><?php echo $lbl_time_out;?></th>
                    <th><?php echo $lbl_total ?></th>
                    <th><?php echo $lbl_tax ?></th>
                    <th><?php echo $lbl_discount ?></th>
                    <th><?php echo "Credit"?></th>
                    <th><?php echo "Credit Paid"?></th>
                    <th><?php echo "Cash"?></th>  
                    <th><?php echo $lbl_grand_total ?></th>
                    <th><?php echo $branch_label ?></th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
                <td></td>
                <td><?php echo $lbl_grand_total; ?>:</td>
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
</div>

<div id="div">

</div>
</body>
 
<script type="text/javascript">
    $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $(document).ready(function (){

        var data_table=$('#table-table').DataTable({
            "bProcessing": true,
            "sAjaxSource": '<?php echo site_url("Report_sale_summary/response"); ?>',
            "aoColumns": [
                {mData: 'sale_master_id'},
                {mData: 'invoice_no'},
                {mData: 'table_name'},
                {mData: 'cashier'},
                {mData: 'checkin_date'},
                {mData: 'checkout_date'},
                {mData: 'SubTotal'},
                {mData: 'tax'},
                {mData: 'discount'},
                {mData: 'credit_payment'},
                {mData: 'credit_paid'},
                {mData: 'cash_payment'},
                {mData: 'grandtotal'},
                {mData: 'branch_name'},
            ],
           "iDisplayLength": 50,
           "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
           "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0,]}],
           "order": [[1, 'desc']],
            "footerCallback": function (nRow) {
                var api = this.api(),data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                //TOTAL BY ROW
                total_all = api.column(6, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total = api.column(6, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_vat = api.column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_vat_all = api.column(7, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_dis = api.column(8, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_dis_all = api.column(8, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                credit = api.column(9, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);                    
                }, 0);
                credit_all = api.column(9, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                credit_paid = api.column(10, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                credit_paid_all = api.column(10, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                cash = api.column(11, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                cash_all = api.column(11, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                grand_total = api.column(12, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                grand_total_all = api.column(12, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                // END TOTAL BY ROW                     

                var nCells = nRow.getElementsByTagName('td');
                
                nCells[6].innerHTML = total.toFixed(dot_num)+' of '+total_all.toFixed(dot_num);
                nCells[7].innerHTML = total_vat.toFixed(dot_num)+' of '+total_vat_all.toFixed(dot_num);
                nCells[8].innerHTML = total_dis.toFixed(dot_num)+' of '+total_dis_all.toFixed(dot_num);
                nCells[9].innerHTML = credit.toFixed(dot_num)+' of '+credit_all.toFixed(dot_num);
                nCells[10].innerHTML = credit_paid.toFixed(dot_num)+' of '+credit_paid_all.toFixed(dot_num);
                nCells[11].innerHTML = cash.toFixed(dot_num)+' of '+cash_all.toFixed(dot_num);
                nCells[12].innerHTML = grand_total.toFixed(dot_num)+' of '+grand_total_all.toFixed(dot_num);
                //nCells[15].innerHTML = total_card_pay.toFixed(2);
            }
        });
        
        //AJAX FORM SUBMIT
        $("#form-search").on('submit',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var url = '<?php echo site_url("Report_sale_summary/responses");?>';
            data_table.clear().draw();
            $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="17" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
            $.getJSON(url, data, function( json )
            {        
                data_table.rows.add(json.aaData).draw();
            });
        });
        //END AJAX FORM SUBMIT
        $("#txt_customer_name").on('blur',function(){
                if($(this).val()=='')
                    $('#txtcustomer_id').val("");
            });
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
    function print_date(){
		var post_url = "<?php echo site_url("Report_sale_summary/order_list_cash_out")?>";
            
            var datefrom = $('#datefrom').val();
            var dateto = $('#dateto').val();
            
            $.ajax({
                type: 'POST',
                url: post_url,
                async:false,
                data:{'datefrom':datefrom,'dateto':dateto,'report':1},
                success: function (response) {
                    var json;
                    try {
                        json = $.parseJSON(response);
                    } catch(err){
                        showTost(err.message);
                        return;
                    }
                    $("#div").html('');
                    var index_table=0;
                    var font_big="12px";
                    var item_note = "";
                    var header = "";
                    var data = "";
                    var footer = '';
                    //var item ="";
					var final="";
					
					header = '<div">';
                    final += '<table style="width: 265px;" id="table_lists" cellpadding="0" cellspacing="0" class="receipt-size">';
					final+='<tr style=""><th colspan="6" class="maincenter"></th></tr>';
                    

                    

					final += '<table style="width: 265px;" id="table_lists" cellpadding="0" cellspacing="0" class="receipt-size">';
					final+='<tr><td colspan="3" class="mainleft">Cashier</td><td colspan="3" class="mainleft">:'+ json.final[0].cashier+'</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Start</td><td colspan="3" class="mainleft">:'+ json.final[0].start_date+'</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Stop</td><td colspan="3" class="mainleft">:'+ json.final[0].end_date+'</td></tr>';
                    //Loop Final
                        var myfinal=0,final_paid_inv=0,final_void_inv=0,final_total_inv=0,final_total_sale=0,final_total_amount=0,final_start_amount_us=0,final_start_amount_kh=0,final_receive_amount=0,final_cash_real_us=0,final_cash_real_kh=0,final_total_amount_kh=0,final_customer=0,final_total_reciev=0,t_re=0;
                        $.each(json.final,function(i,v){
                            myfinal+=1;
                            final_paid_inv+=parseInt(v.paid_invoice);
                            final_void_inv+=parseInt(v.void_invoice);
                            final_total_inv+=parseInt(v.total_invoice);
                            final_start_amount_us+=parseFloat(v.cash_amount_us);
                            final_start_amount_kh+=parseFloat(v.cash_amount_kh);
                            final_cash_real_us+=parseFloat(v.cash_real_us);
                            final_cash_real_kh+=parseFloat(v.cash_real_kh);
                            final_total_sale+=parseFloat(v.sale_amount);
                            final_total_amount+=parseFloat(v.total_amount); 
                            final_total_amount_kh+=parseFloat(v.total_amount_kh);
                            final_customer += parseInt(v.pax); 
                            //final_total_reciev=parseFloat(final_cash_real_us)+parseFloat(final_cash_real_kh/ex_rate);
                            
                            //console.log(final_total_reciev); 

                        });
                    final+='<tr><td colspan="3" class="mainleft">Paid Invoice</td><td colspan="3" class="mainleft">:'+final_paid_inv+'</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Void Invoice</td><td colspan="3" class="mainleft">:'+final_void_inv+'</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Total Invoice</td><td colspan="3" class="mainleft">:'+final_total_inv+'</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Start Amount</td><td colspan="1" class="mainleft">:$ '+final_start_amount_us.toFixed(dot_num)+'</td><td colspan="2" class="mainright">:'+final_start_amount_kh.toLocaleString( "en-US" )+' R</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Recieve Amount</td><td colspan="1" class="mainleft">:$ '+final_cash_real_us.toFixed(dot_num)+'</td><td colspan="2" class="mainright">:'+ final_cash_real_kh.toLocaleString( "en-US" )+' R</td></tr>';
                    
                    final+='<tr><td colspan="3" class="mainleft">Total Sale</td><td colspan="3" class="mainleft">:$ '+final_total_sale.toFixed(dot_num)+'</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Total Amount</td><td colspan="1" class="mainleft">:$ '+final_total_amount.toFixed(dot_num) +'</td><td colspan="2" class="mainright">: '+final_total_amount_kh.toLocaleString( "en-US" ) +' R</td></tr>';
                    final+='<tr><td colspan="3" class="mainleft">Customer</td><td colspan="1" class="mainleft">:'+final_customer+'នាក់</td><td colspan="2" class="mainright"></td></tr>';
                    
                   //End Final 
                    final+='<tr><td colspan="6" style="padding-bottom:40px;"></td></tr>';
                    final+='<tr><td colspan="6" class="footcenter">'+copy_right+'</td></tr>';
                    
                    final+='</table>';
                   
                    footer += '</div>';
                    $("#div").append(final);
					myprint(true);
				}
			});	
	}
    function clearId(){
        if($("#txt_customer_name").val()===""){
            $('#txtcustomer_id').val("");
        }
    }
	function myprint(final,print_date){
            var html =` <style>
                .mainleft{
                    border-bottom: 1px dotted;text-align:left;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .mainright{
                    border-bottom: 1px dotted;text-align:right;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .maincenter{
                    border-bottom: 1px dotted;text-align:center;padding: 2px 0px 2px 0px;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .subleft{
                    text-align:left;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .subcenter{
                    text-align:center;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .subright{
                    text-align:right;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .footleft{
                    border-width: 1px 0px 1px 0px;border-style:solid;text-align:left;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .footcenter{
                    border-width: 1px 0px 1px 0px;border-style:solid;text-align:center;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .footright{
                    border-width: 1px 0px 1px 0px;border-style:solid;text-align:right;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
             </style> `;
            var html1=html+$("#div").html();
            var html2=html+final;
            $("html").empty();
            $("html").append(html1);
            setTimeout(function(){
                window.print();
            }, 100);
            setTimeout(function(){
                if(print_date==true){
                    $("html").empty();
                    $("html").append(html2);
                    window.print();
                }            
                   window.open("<?php echo site_url("report_sale_summary"); ?>",'_self');
            }, 300);

			}
		
    
</script>
<?php
    }
?>
</html>
