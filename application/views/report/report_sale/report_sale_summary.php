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
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input class="form-control form-custom" type="time" name="txt_time_start" id="txt_time_start">
                        <div class="border"></div>
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input class="form-control form-custom" type="time" name="txt_time_end" id="txt_time_end">
                        <div class="border"></div>
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_customer_name" id="txt_customer_name" autocomplete="off"  placeholder="CUSTOMER">
                        <input type="hidden" name="txtcustomer_id" id="txtcustomer_id">
                      </div>
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
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cbo_acc_type" id="cbo_acc_type" class="form-control">
                            <option value="0">--Account Type--</option>
                            <?php
                                foreach($account_type as $ac){
                            ?>
                                <option value="<?php echo $ac->acc_type_id; ?>"><?php echo $ac->acc_type; ?></option>
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
                    <th><?php echo $lbl_customer ?></th>
                    <th><?php echo $lbl_cashier?></th>
                    <th><?php echo $lbl_time_in;?></th>
                    <th><?php echo $lbl_time_out;?></th>
                    <th><?php echo $lbl_total ?></th>
                    <th><?php echo $lbl_discount ?></th>
                    <th><?php echo $lbl_tax ?></th>
                    <th><?php echo $lbl_grand_total ?></th>
                    <th><?php echo $lbl_member;?></th>
                    <th><?php echo $lbl_account_type ?></th>
                    <th><?php echo $lbl_account;?></th>
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
                {mData: 'customer_name'},
                {mData: 'cashier'},
                {mData: 'checkin_date'},
                {mData: 'checkout_date'},
                {mData: 'SubTotal'},
                {mData: 'discount'},
                {mData: 'tax'},
                {mData: 'grandtotal'},
                {mData: 'member_pay'},
                {mData: 'acc_type'},
                {mData: 'other_card_pay'},
                {mData: 'branch_name'},
            ],
           "iDisplayLength": 50,
           "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
           "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0]}],
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

                total_dis = api.column(7, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_dis_all = api.column(7, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_vat = api.column(8, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                total_vat_all = api.column(8, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                grand_total = api.column(9, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                grand_total_all = api.column(9, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                member_pay = api.column(10, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);
                member_pay_all = api.column(10, {
                    page: 'all'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_card_pay = api.column(12, {
                    page: 'current'
                })
                .data()
                .reduce(function (total, b) {
                    var bb = b.replace(',', '');

                    return total + parseFloat(bb);
                }, 0);

                total_card_pay_all = api.column(12, {
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
                nCells[7].innerHTML = total_dis.toFixed(dot_num)+' of '+total_dis_all.toFixed(dot_num);
                nCells[8].innerHTML = total_vat.toFixed(dot_num)+' of '+total_vat_all.toFixed(dot_num);
                nCells[9].innerHTML = grand_total.toFixed(dot_num)+' of '+grand_total_all.toFixed(dot_num);
                nCells[10].innerHTML = member_pay.toFixed(dot_num)+' of '+member_pay_all.toFixed(dot_num);
                nCells[12].innerHTML = total_card_pay.toFixed(dot_num)+' of '+total_card_pay_all.toFixed(dot_num);
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
                    var item ="";
                    var final="";
                    //Final
                    var myfinal=0,final_paid=0,final_void=0,final_total_inv=0,final_total_sale=0,final_real_us=0,final_real_kh=0,final_cash_us=0,final_cash_kh=0;
                        $.each(json.Final,function(i,v){
                            myfinal+=1;
                            final_paid+=parseInt(v.paid_invoice);
                            final_void+=parseInt(v.void_invoice);
                            final_total_inv+=parseInt(v.total_invoice);
                            final_total_sale+=parseFloat(v.sale_amount);
                            final_real_us+=parseFloat(v.cash_real_us);
                            final_real_kh+=parseFloat(v.cash_real_kh);
                            final_cash_us+=parseFloat(v.cash_amount_us);
                            final_cash_kh+=parseFloat(v.cash_amount_kh);


                        });

                    //Summary
                    var total_sale=0,sub_total=0,total_discount=0,transaction_sub_total=0,transaction_discount=0,total_vat=0,total_amount=0,total_amount_kh=0,ex_rate=0,member_pay=0,cash_pay=0,check_other_pay=0,total_recieve_amount=0,total_recieve=0,total_account=0,total_service=0,total_sale_final=0;

                    $.each(json.Summary,function(l,m){

                        total_discount+=parseFloat(m.discount);
                        total_vat+=parseFloat(m.tax);
                        sub_total+=parseFloat(m.SubTotal);
                        total_sale+=parseFloat(m.grandtotal);
                        ex_rate=parseFloat(m.ex_rate);
                        
                        $.each(json.Account_type,function(i,v){
                            if(v.acc_type==m.acc_type){
                                v.total=parseFloat(v.total) +parseFloat(m.other_card_pay);
                                check_other_pay=1;
                            }
                        });
                        if(m.acc_type==null && parseFloat(m.member_pay)>0){
                            member_pay+=parseFloat(m.member_pay);
                            check_other_pay=1;
                        }else if(m.acc_type==null && parseFloat(m.member_pay)==0){
                            cash_pay+=parseFloat(m.grandtotal);
                        }
                    });
                    
                    total_sale_final= parseFloat(total_sale);
                    total_recieve=parseFloat(final_real_kh/ex_rate)+parseFloat(final_real_us);
                    
                    total_amount=parseFloat(final_cash_us)+total_sale_final+(parseFloat(final_cash_kh)/ex_rate);
                    total_amount_kh=total_amount*ex_rate;

                    total_account=parseFloat(total_recieve-total_sale_final);
                    
                    header = '<div">';
                    data += '<table style="width: 265px;" id="table_lists" cellpadding="0" cellspacing="0" class="receipt-size">';
                    
                    data+='<tr><td colspan="3" class="mainleft">Cashier</td><td colspan="3" class="mainleft">:'+ json.Final[0].cashier+'</td></tr>';
                   

                    data+='<tr><td colspan="3" class="mainleft">Start</td><td colspan="3" class="mainleft">:'+ $('#datefrom').val()+'</td></tr>';
                    

                    data+='<tr><td colspan="3" class="mainleft">Stop</td><td colspan="3" class="mainleft">:'+ $('#dateto').val()+'</td></tr>';
                    

                    data+='<tr><td colspan="3" class="mainleft">Paid Invoice</td><td colspan="3" class="mainleft">:'+ final_paid+'</td></tr>';
                    

                    data+='<tr><td colspan="3" class="mainleft">Void Invoice</td><td colspan="3" class="mainleft">:'+ final_void+'</td></tr>';
                    

                    data+='<tr><td colspan="3" class="mainleft">Total Invoice</td><td colspan="3" class="mainleft">:'+ final_total_inv+'</td></tr>';
                    


                    data+='<tr><td colspan="3" class="mainleft">Start Amount</td><td colspan="1" class="mainleft">:$ '+ final_cash_us+'</td><td colspan="2" class="mainright">:'+ parseFloat(final_cash_kh).toLocaleString( "en-US" )+' R</td></tr>';
                    

                    data+='<tr><td colspan="3" class="mainleft">Recieve Amount</td><td colspan="1" class="mainleft">:$ '+ final_real_us+'</td><td colspan="2" class="mainright">:'+ parseFloat(final_real_kh).toLocaleString("en-US" )+' R</td></tr>';


                    data+='<tr><td colspan="3" class="mainleft">Total Recieve</td><td colspan="3" class="mainleft">:$ '+ total_recieve.toLocaleString( "en-US" )+'</td></tr>';
                    data+='<tr><td colspan="3" class="mainleft">Sub Total</td><td colspan="3" class="mainleft">:$ '+ sub_total.toFixed(dot_num)+'</td></tr>';
                    data+='<tr><td colspan="3" class="mainleft">Discount</td><td colspan="3" class="mainleft">:$ '+ total_discount.toFixed(dot_num)+'</td></tr>';
                    data+='<tr><td colspan="3" class="mainleft">Grand Total</td><td colspan="3" class="mainleft">:$ '+ total_sale.toFixed(dot_num)+'</td></tr>';
                    
                    data+='<tr><td colspan="3" class="mainleft">Total Cash</td><td colspan="3" class="mainleft">:$ '+total_account.toLocaleString( "en-US" )+'</td></tr>';

                    data+='<tr><td colspan="3" class="mainleft">Total Amount</td><td colspan="1" class="mainleft">:$ '+ total_amount.toFixed(dot_num) +'</td><td colspan="2" class="mainright">: '+ total_amount_kh.toLocaleString( "en-US" ) +' R</td></tr>';

                    
                    data+='<tr style="color: white;background-color:black;"><td colspan="4" class="subleft">Descriptions</td><td colspan="1" class="subcenter">Qty</td><td colspan="1" class="subcenter">Total</td></tr>';


                    //////////// Cash out Type 1///////////////////
                    //Item
                    var mytemp=0,qty=0,mytemp1=0;
                    $.each(json.Item,function(l,m){
                        if(mytemp!=parseInt(m.item_type_id)){
                            mytemp=parseInt(m.item_type_id);
                            qty=0;
                            mytemp1=0;

                            
                            
                        }
                        data+='<tr><td colspan="4" class="subleft"> - '+ m.item_type_name+'</td><td colspan="1" class="subcenter">'+ m.qty+'</td><td colspan="1" class="subright">$'+ m.SubTotal +' </td></tr>';
                        qty+=parseInt(m.sale_detail_qty);
                        mytemp1+=parseFloat(m.subtotal);
                   

                    });
                    

                    data+='<tr><td colspan="3" class="subleft">Sub Total </td><td colspan="3" class="subright">$ '+sub_total.toFixed(dot_num)+'</td></tr>';
                    if(total_discount.toFixed(dot_num)>0){
                        data+='<tr><td colspan="3" class="subleft">Discount </td><td colspan="3" class="subright">$ '+total_discount.toFixed(dot_num)+'</td></tr>';
                    }
                    if(total_vat.toFixed(dot_num)){
                       data+='<tr><td colspan="3" class="subleft"> VAT </td><td colspan="3" class="subright">$ '+total_vat.toFixed(dot_num)+'</td></tr>';
                    }

                    //data+='<tr><td colspan="4" class="footleft">Total QTY </td><td colspan="1" class="footcenter">'+qty+'</td><td colspan="1" class="footright"></td></tr>';
                    data+='<tr><td colspan="4" class="footleft"> Grand Total </td><td colspan="2" class="footright">$ '+total_sale.toFixed(dot_num)+'</td></tr>';
                    


                    if(check_other_pay==1){
                        data+='<tr><td colspan="6" style="text-align: center;font-weight: bold;">Payment Group</td></tr>';
                        data+='<tr style="color: white;background-color:black;"><td colspan="3" class="subleft">Type</td><td colspan="3" class="subcenter">Amount</td</tr>';
                        data+='<tr><td colspan="3" class="subleft"> Member Pay </td><td colspan="3" class="subright">$ '+member_pay.toFixed(dot_num)+'</td></tr>';
                        data+='<tr><td colspan="3" class="subleft"> Cash </td><td colspan="3" class="subright">$ '+cash_pay.toFixed(dot_num)+'</td></tr>';
                        $.each(json.Account_type,function(i,v){
                            if(parseFloat(v.total)>0){
                                data+='<tr><td colspan="3" class="subleft"> '+v.acc_type+' </td><td colspan="3" class="subright">$ '+parseFloat(v.total).toFixed(dot_num)+'</td></tr>';
                            }
                        });

                    }


                        data+='<tr><td colspan="6" style="padding-top:40px;text-align: center;font-weight: bold;">Void Invoice</td></tr>';

                        data+='<tr style="color: white;background-color:black;"><td colspan="4" class="subleft">Descriptions</td><td colspan="1" class="subcenter">Qty</td><td colspan="1" class="subcenter">Total</td></tr>';
                        var mytem2=0;
                        mytemp=0,qty=0;

                        //Item void
                        $.each(json.Item_void,function(l,m){
                            if(mytemp!=m.invoice_no){
                                mytemp=m.invoice_no;
                                data+='<tr><td colspan="6" class="subleft">'+m.invoice_no+'</td></tr>';
                            }
                            data+='<tr><td colspan="4" class="subleft"> - '+ m.item_detail_name+'</td><td colspan="1" class="subcenter">'+ m.real_qty+'</td><td colspan="1" class="subright">$'+ m.grandtotal +' </td></tr>';
                            if(m.item_detail_id>0){
                                qty+=parseInt(m.real_qty);
                            }
                            try {
                                if(mytemp!=parseInt(json.Item_void[l+1].invoice_no)){
                                    //Summary Void
                                     $.each(json.Summary_Void,function(ll,mm){
                                        if(mytemp==mm.invoice_no){
                                            data+='<tr><td colspan="4" style="border-top:1px dotted;" class="mainleft">Total</td><td colspan="2" class="mainright" style="border-top:1px dotted;">$'+ mm.grandtotal +' </td></tr>';
                                        }
                                    });
                                }
                            }
                            catch(err) {
                                    $.each(json.Summary_Void,function(ll,mm){
                                        if(mytemp==mm.invoice_no){
                                            data+='<tr><td colspan="4" style="border-top:1px dotted;" class="mainleft">Total</td><td colspan="2" class="mainright" style="border-top:1px dotted;">$'+ mm.grandtotal +' </td></tr>';
                                        }
                                    });
                            }
                            mytem2+=parseFloat(m.grandtotal);
                        });
                        data+='<tr><td colspan="4" class="footleft"> Total QTY </td><td colspan="1" class="footcenter">'+qty+'</td><td colspan="1" class="footright"></td></tr>';
                        data+='<tr><td colspan="4" class="footleft"> Grand Total </td><td colspan="2" class="footright">$ '+mytem2.toFixed(2)+'</td></tr>';

                    
                        data+='<tr><td colspan="6" style="padding-top:40px;text-align: center;font-weight: bold;">Stock</td></tr>';
                        data+='<tr style="color: white;background-color:black;"><td colspan="2" class="subcenter">Item Name</td><td colspan="2" class="subcenter">Sold</td><td colspan="2" class="subcenter">SKU(QTY)</td></tr>';
                        //Stock
                        $.each(json.Stock,function(i,v){
                            data+='<tr><td colspan="2" class="maincenter">'+ v.item_detail_name +'</td><td colspan="2" class="maincenter">'+ v.cut_qty +'</td><td colspan="2" class="maincenter">'+ v.stock_qty +'</td></tr>';
                        });
                        if(json.Stock==""){
                            data+='<tr><td colspan="6" class="maincenter">No item sale that exists in stock</td></tr>';
                        }
                    //**Table Final Cash Out**

                    
                  
                   //End Final 
                    data+='<tr><td colspan="6" style="padding-bottom:40px;"></td></tr>';
                    data+='<tr><td colspan="6" class="footcenter">'+copy_right+'</td></tr>';
                    
                    data+='</table>';
                    
                    footer += '</div>';
                    $("#div").append(data);
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
