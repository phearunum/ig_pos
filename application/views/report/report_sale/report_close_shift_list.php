<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <style>
            .ellipsis {
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
            .text-left{
                text-align: left !important;
            }
        </style>
        <script type="text/javascript">
            function myFunction() {
                $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Sale by Close Shift",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                    });
            }
        </script>
    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
        <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>

                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cbo_branch" id="cbo_branch" class="form-control">
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
                        <select name="cashier" id="cashier" class="form-control">
                           <option value="0">--Cashier--</option>
                           
                        </select>
                      </div>

                       <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cbo_time_shift" id="cbo_time_shift" class="form-control">
                           <option value="0">--Shift--</option>
                        </select>
                      </div>

                      
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btn_reprint"  id="btn_reprint" onclick="reprint_shift()"><i class="fa fa-print "></i> <?php echo $btn_reprint; ?></button>
                      </div>

                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h4 class="text-center"><?php echo $lbl_title;?></h4>
        <table width="100%" align="center" cellspacing="0" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th><?php echo $lbl_customer;?></th>
                    <th>Date</th>
                    <th><?php echo $lbl_item_name;?></th>
                    <th><?php echo $lbl_qty;?></th>
                    <th><?php echo $lbl_price;?></th>
                    <th><?php echo $lbl_total;?></th>
                    <th><?php echo $lbl_discount;?></th>
                    <th><?php echo $lbl_discount;?></th>
                    <th><?php echo $lbl_vat;?></th>
                    <th><?php echo $lbl_grand_total;?></th>
                    <th><?php echo "Branch";?></th>
                    <th>Sale_master_Id</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
                <tr>
                    <td><?php echo $lbl_grand_total;?>:</td>
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
                </tr>
            </tfoot>
        </table>
    </div>
    <div id="div">
        
    </div>
        <script type="text/javascript">
        $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        function reprint_shift(){
            if($('#cbo_time_shift').val()==0){
                return false;
            }
            var post_url = "<?php echo site_url("table_order/order_list_cash_out")?>";
            $.ajax({
                type: 'POST',
                url: post_url,
                async:false,
                data:{"cash_id":$('#cbo_time_shift').val(),"report":1},
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
                    header = '<div">';
                 data += '<table style="width: 265px;" id="table_lists" cellpadding="0" cellspacing="0" class="receipt-size">';
                    data+='<tr><td colspan="2" class="mainleft">Cashier</td><td colspan="4" class="mainleft">:'+ json.Cashier[0].user_name+'</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Start</td><td colspan="4" class="mainleft">:'+ json.Cashier[0].cash_startdate+'</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Stop</td><td colspan="4" class="mainleft">:'+ json.Cashier[0].cash_enddate+'</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Paid Invoice</td><td colspan="4" class="mainleft">:'+ json.Cashier[0].paid_invoice+'</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Void Invoice</td><td colspan="4" class="mainleft">:'+ json.Cashier[0].void_invoice+'</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Total Invoice</td><td colspan="4" class="mainleft">:'+ json.Cashier[0].total_invoice+'</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Cash In</td><td colspan="2" class="mainleft">:$ '+ json.Cashier[0].cash_amount+'</td><td colspan="2" class="mainright">:'+ parseFloat(json.Cashier[0].cash_amount_kh).toLocaleString( "en-US" )+' R</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Cash Out</td><td colspan="2" class="mainleft">:$ '+ json.Cashier[0].cash_real_us+'</td><td colspan="2" class="mainright">:'+ parseFloat(json.Cashier[0].cash_real_kh).toLocaleString( "en-US" )+' R</td></tr>';
                    var total_sale=0,sub_total=0,total_discount=0,total_vat=0,total_amount=0,total_amount_kh=0,ex_rate=0,member_pay=0,cash_pay=0,check_other_pay=0;
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
                    total_amount=parseFloat(json.Cashier[0].cash_amount)+total_sale+(parseFloat(json.Cashier[0].cash_amount_kh)/ex_rate);
                    total_amount_kh=total_amount*ex_rate;
                    data+='<tr><td colspan="2" class="mainleft">Total Sale</td><td colspan="4" class="mainleft">:$ '+total_sale.toFixed(dot_num)+'</td></tr>';
                    data+='<tr><td colspan="2" class="mainleft">Total Amount</td><td colspan="2" class="mainleft">:$ '+ total_amount.toFixed(dot_num) +'</td><td colspan="2" class="mainright">: '+ total_amount_kh.toLocaleString( "en-US" ) +' R</td></tr>';
                    data+='<tr style="color: white;background-color:black;"><td colspan="4" class="subleft">Descriptions</td><td colspan="1" class="subcenter">Qty</td><td colspan="1" class="subcenter">Total</td></tr>';



                    //////////// Cash out Type 1///////////////////

                     var mytemp=0,qty=0,mytemp1=0;
                     $.each(json.Item,function(l,m){
                         if(mytemp!=parseInt(m.item_type_id)){
                            mytemp=parseInt(m.item_type_id);
                            qty=0;
                             mytemp1=0;
                             data+='<tr><th colspan="6" class="subleft" >'+m.item_type_name+'</th></tr>';
                        }
                         data+='<tr><td colspan="4" class="subleft"> - '+ m.item_detail_name+'</td><td colspan="1" class="subcenter">'+ m.sale_detail_qty+'</td><td colspan="1" class="subright">$'+ m.subtotal +' </td></tr>';
                         qty+=parseInt(m.sale_detail_qty);
                         mytemp1+=parseFloat(m.subtotal);
                         try {
                           if(mytemp!=parseInt(json.Item[l+1].item_type_id)){
                                 data+='<tr><td colspan="4" class="footleft"> Total </td><td colspan="1" class="footcenter">'+qty+'</td><td colspan="1" class="footright">$'+mytemp1.toFixed(dot_num)+' </td></tr>';
                             }
                         }
                        catch(err) {
                            data+='<tr><td colspan="4" class="footleft"> Total </td><td colspan="1" class="footcenter">'+qty+'</td><td colspan="1" class="footright">$'+mytemp1.toFixed(dot_num)+' </td></tr>';
                         }
                        
                     });
                    ////////////End Cash out Type 1///////////////////




                    //////////// Cash out Type 2///////////////////
                   /* var mytemp=0,qty=0;
                    $.each(json.Item,function(l,m){
                        if(mytemp!=m.invoice_no){
                            mytemp=m.invoice_no;
                            data+='<tr><td colspan="6" class="subleft">'+m.invoice_no+'</td></tr>';
                        }
                        data+='<tr><td colspan="4" class="subleft"> - '+ m.item_detail_name+'</td><td colspan="1" class="subright">'+ m.real_qty +' </td><td colspan="1" class="subright">$'+ m.grandtotal +' </td></tr>';
                        if(m.item_detail_id>0){
                            qty+=parseInt(m.real_qty);
                        }
                        try {
                            if(mytemp!=parseInt(json.Item[l+1].invoice_no)){
                                 $.each(json.Summary,function(ll,mm){
                                    if(mytemp==mm.invoice_no){
                                        data+='<tr><td colspan="4" style="border-top:1px dotted;" class="mainleft">Total</td><td colspan="2" class="mainright" style="border-top:1px dotted;">$'+ mm.grandtotal +' </td></tr>';
                                    }
                                });
                            }
                        }
                        catch(err) {
                                $.each(json.Summary,function(ll,mm){
                                    if(mytemp==mm.invoice_no){
                                        data+='<tr><td colspan="4" style="border-top:1px dotted;" class="mainleft">Total</td><td colspan="2" class="mainright" style="border-top:1px dotted;">$'+ mm.grandtotal +' </td></tr>';
                                    }
                                });
                        }

                    });
                    ////////////End Cash out Type 2///////////////////
*/

                    data+='<tr><td colspan="3" class="subleft">Sub Total </td><td colspan="3" class="subright">$ '+sub_total.toFixed(dot_num)+'</td></tr>';
                    if(total_discount.toFixed(dot_num)>0){
                        data+='<tr><td colspan="3" class="subleft"> Discount </td><td colspan="3" class="subright">$ '+total_discount.toFixed(dot_num)+'</td></tr>';
                    }
                    if(total_vat.toFixed(dot_num)){
                       data+='<tr><td colspan="3" class="subleft"> VAT </td><td colspan="3" class="subright">$ '+total_vat.toFixed(dot_num)+'</td></tr>'; 
                    }

                   /* data+='<tr><td colspan="4" class="footleft"> Total QTY </td><td colspan="1" class="footcenter">'+qty+'</td><td colspan="1" class="footcenter"></td></tr>';*/
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
                        /*data+='<tr><td colspan="4" class="footleft"> Total QTY </td><td colspan="1" class="footcenter">'+qty+'</td><td colspan="1" class="footcenter"></td></tr>';*/
                        data+='<tr><td colspan="4" class="footleft"> Grand Total </td><td colspan="1" class="footcenter">'+qty+'</td><td colspan="1" class="footright">$ '+mytem2.toFixed(dot_num)+'</td></tr>';


                        /*//Card Topup
                        data+='<tr><td colspan="6" style="padding-top:40px;text-align: center;font-weight: bold;">Card Topup</td></tr>';
                        data+='<tr style="color: white;background-color:black;"><td colspan="1" class="subcenter">N<sup>o</sup></td><td colspan="2" class="subcenter">Customer Name</td><td colspan="1" class="subcenter">Card</td><td colspan="1" class="subcenter">Date</td><td colspan="1" class="subcenter">Amount</td></tr>';
                        var myindex=0,topup_total=0;
                        $.each(json.Topup,function(i,v){
                            myindex+=1;
                            topup_total+=parseFloat(v.transaction_amount);
                            data+='<tr><td colspan="1" class="maincenter">'+ myindex +'</td><td colspan="2" class="maincenter">'+ v.customer_name +'</td><td colspan="1" class="maincenter">'+ v.customer_card_number +'</td><td colspan="1" class="maincenter">'+ v.transaction_date +'</td><td colspan="1" class="maincenter">'+ v.transaction_amount +'</td></tr>';
                        });
                        data+='<tr><td colspan="4" class="mainright">Total</td><td colspan="4" class="mainright">$ '+ topup_total.toFixed(dot_num)+'</td></tr>';
                        //End Card Topup

                        //Cashier Receiver
                        data+='<tr  style="padding-bottom:40px;"><td colspan="4" class="subcenter">Cashier</td><td colspan="2" class="subcenter">Receiver</td></tr>';

                         //Card Return
                        data+='<tr><td colspan="6" style="padding-top:40px;text-align: center;font-weight: bold;">Card Return</td></tr>';
                        data+='<tr style="color: white;background-color:black;"><td colspan="1" class="subcenter">N<sup>o</sup></td><td colspan="2" class="subcenter">Customer Name</td><td colspan="1" class="subcenter">Card</td><td colspan="1" class="subcenter">Date</td><td colspan="1" class="subcenter">Amount</td></tr>';
                        var myindex1=0,return_total=0;
                        $.each(json.Return,function(i,v){
                            myindex1+=1;
                            return_total+=parseFloat(v.transaction_amount);
                            data+='<tr><td colspan="1" class="maincenter">'+ myindex1 +'</td><td colspan="2" class="maincenter">'+ v.customer_name +'</td><td colspan="1" class="maincenter">'+ v.customer_card_number +'</td><td colspan="1" class="maincenter">'+ v.transaction_date +'</td><td colspan="1" class="maincenter">'+ v.transaction_amount +'</td></tr>';
                        });
                        data+='<tr><td colspan="4" class="mainright">Total</td><td colspan="4" class="mainright">$ '+ return_total.toFixed(dot_num)+'</td></tr>';
                        //End Card Return*/

                       /* data+='<tr><td colspan="6" style="padding-top:40px;text-align: center;font-weight: bold;">Stock</td></tr>';
                        data+='<tr style="color: white;background-color:black;"><td colspan="4" class="subleft">Item Name</td><td colspan="1" class="subcenter">Sold</td><td colspan="1" class="subcenter">SKU(QTY)</td></tr>';
                        $.each(json.Stock,function(i,v){
                            data+='<tr><td colspan="4" class="mainleft">'+ v.item_detail_name +'</td><td colspan="1" class="maincenter">'+ v.cut_qty +'</td><td colspan="1" class="maincenter">'+ v.stock_qty +'</td></tr>';
                        });*/
                       /* if(json.Stock==""){
                            data+='<tr><td colspan="6" class="maincenter">No item sale that exists in stock</td></tr>';
                        }
*/
                        

                    

                    //}


                    data+='<tr><td colspan="6" style="padding-bottom:40px;"></td></tr>';
                    data+='<tr><td colspan="6" class="footcenter">'+copy_right+'</td></tr>';
                    data+='</table>';
                    footer += '</div>';
                    $("#div").append(data);
                //  $.ajax ({
                //     url:"<?php echo site_url("cashier_order/cash_drawer")?>",
                //     type:'post',
                //     async: false,
                //     data:{"printer":json.Cashier[0].printer_print_receipt},
                //     success:function(){
                //     }
                // });
                    myprint();
                },
                error: function (response) {
                    showTost('No items printed!');
                }
            });
            
        }
        function myprint(){
            setTimeout(function(){
            var html =` <style> 
                .mainleft{
                    border-bottom: 1px dotted;text-align:left;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .mainright{
                    border-bottom: 1px dotted;text-align:right;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                }
                .maincenter{
                    border-bottom: 1px dotted;text-align:center;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
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
             </style> `+ $("#div").html();
            $("html").empty();
            $("html").append(html);
            window.print();
                location.reload();
            }, 100);

        }
        $(document).ready(function(){
            var data_table=$('#table-table').DataTable({
                "bProcessing": false,
                "sAjaxSource": "<?php echo site_url("report_close_shift/response/"); ?>",
                "aoColumns": [
                          {mData: 'invoice_no'},
                    {mData: 'customer_name'},
                    {mData: 'checkout_date'},
                    {mData: 'item_detail_name'},
                    {mData: 'qty'},
                    {mData: 'unit_price'},
                    {mData: 'total'},
                    {mData: 'discount_dollar'},
                    {mData: 'discount'},
                    {mData: 'tax'},
                    {mData: 'grandtotal'},
                    {mData: 'brand_name'},
                    {mData: 'sale_master_id'}
                ],
                "iDisplayLength": 50,
                "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
                "order" : [[12,"desc"]],
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return parseFloat(data).toFixed(dot_num);
                        },
                        "targets": [ 5,6,7,8,9,10 ]
                    },
                    {
                        "targets":[7,12],
                        "className":"hidden"
                    },
                    {
                        "render": function ( data, type, row ) {
                            return null;
                        },
                        "targets": [ 0 ]
                    },
                ],
                "drawCallback": function ( settings ) {
                    var api = this.api(),data;
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
                    
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    total=new Array();
                    data_group = new Array();

                    api.column(12, {page:'current'} ).data().each( function ( group, i ) {
                        group_assoc=group.replace(/[^a-zA-Z0-9 ]/g, "").replace(/ /g, '_');
                        data_group[i]=group_assoc;
                        if(typeof total[group_assoc] != 'undefined'){
                            total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(4,{page:'current'}).data()[i]);
                            total[group_assoc][1]=total[group_assoc][1]+intVal(api.column(6,{page:'current'}).data()[i]);
                            total[group_assoc][2]=total[group_assoc][2]+intVal(api.column(8,{page:'current'}).data()[i]);
                            total[group_assoc][3]=total[group_assoc][3]+intVal(api.column(9,{page:'current'}).data()[i]);
                            total[group_assoc][4]=total[group_assoc][4]+intVal(api.column(10,{page:'current'}).data()[i]);
                        }else{
                            total[group_assoc] =  new Array();
                            total[group_assoc][0]=intVal(api.column(4,{page:'current'}).data()[i]);
                            total[group_assoc][1]=intVal(api.column(6,{page:'current'}).data()[i]);
                            total[group_assoc][2]=intVal(api.column(8,{page:'current'}).data()[i]);
                            total[group_assoc][3]=intVal(api.column(9,{page:'current'}).data()[i]);
                            total[group_assoc][4]=intVal(api.column(10,{page:'current'}).data()[i]);

                        }

                        var j = i;
                        if ( last !== group ) {
                            var rowData = api.column(0,{page:'current'}).data()[i]+' (Date: '+api.column(2,{page:'current'}).data()[i]+')'+'<b style="color:red"> (Discount $: '+api.column(7,{page:'current'}).data()[i]+')</b>';
                
                            var dataGroup='<tr class="group"><td colspan="11">'+rowData+'</td></tr>';
                            j=j+1;
                            if(j!=1){
                                var dataGroupTotal='<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td></td><td></td><td class="'+data_group[i-1]+'_qty"></td><td></td><td class="'+data_group[i-1]+'_Total"></td><td class="'+data_group[i-1]+'_Discount"></td><td class="'+data_group[i-1]+'_Tax"></td><td class="'+data_group[i-1]+'_Grand"></td><td></td></tr>';
                               $(rows).eq( i ).before(dataGroupTotal);
                            }
                            $(rows).eq( i ).before(dataGroup);
                            last = group;                     
                        }
                    });
                    var CategoryLeng = data_group.length;
                    $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td></td><td></td><td class="'+data_group[CategoryLeng-1]+'_qty"></td><td></td><td class="'+data_group[CategoryLeng-1]+'_Total"></td><td class="'+data_group[CategoryLeng-1]+'_Discount"></td><td class="'+data_group[CategoryLeng-1]+'_Tax"></td><td class="'+data_group[CategoryLeng-1]+'_Grand"></td><td></td></tr>');
                    for(var key in total) {
                        $("."+key+'_qty').html(total[key][0]);
                        $("."+key+'_Total').html(total[key][1].toFixed(dot_num));
                        $("."+key+'_Discount').html(total[key][2].toFixed(dot_num));
                        $("."+key+'_Tax').html(total[key][3].toFixed(dot_num));
                        $("."+key+'_Grand').html(total[key][4].toFixed(dot_num));
                    }
                },
                "footerCallback": function (nRow) {
                    var api = this.api(), data;
                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };
                    //TOTAL BY ROW
                   qty = api.column(4, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    qty_all = api.column(4, {
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
                    total_all = api.column(6, {
                        page: 'all'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    discount = api.column(7, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    discount_all = api.column(7, {
                        page: 'all'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    vat = api.column(8, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    vat_all = api.column(8, {
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
                    // END TOTAL BY ROW                                   

                    var nCells_2 = nRow.getElementsByTagName('td');
                    nCells_2[4].innerHTML = qty+' of '+qty_all;
                    nCells_2[6].innerHTML = total.toFixed(dot_num)+' of '+total_all.toFixed(dot_num);
                    nCells_2[7].innerHTML = discount.toFixed(dot_num)+' of '+discount_all.toFixed(dot_num);
                    nCells_2[8].innerHTML = vat.toFixed(dot_num)+' of '+vat_all.toFixed(dot_num);
                    nCells_2[9].innerHTML = grand_total.toFixed(dot_num)+' of '+grand_total_all.toFixed(dot_num);
                }
            });
            //AJAX FORM SUBMIT
            $("#form").on('submit', function (e) {
                e.preventDefault();
                if($('#cbo_time_shift').val()==0){
                    return false;
                }
                var url  = '<?php echo site_url("report_close_shift/responses"); ?>';
                var data = $(this).serialize();

                 data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="11" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
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
            
            $('#cbo_branch').change(function(){
                var id=$(this).val();

                if(id>0){
                     $('#cashier').html('<option value="0">--Cashier--</option>');
                    $.ajax({
                        url:'<?php echo site_url('report_close_shift/get_cashier')?>'+'/'+id,
                        type:'get',
                        success:function(data){
                            var json=JSON.parse(data);
                            $.each(json,function(i,v){
                                $('#cashier').append('<option value="'+v.employee_id+'">'+v.employee_name+'</option>');
                            })
                        }
                    })
                }else{
                    $('#cashier').html('<option value="0">--Cashier--</option>');
                    $('#cbo_time_shift').html('<option value="0">--Shift--</option>');
                }
                
            });

            $('#cashier').change(function(){
              
                var id=$(this).val();
                var from_date=$('#datefrom').val();
                var to_date=$('#dateto').val();
                if(id>0){
                     $('#cbo_time_shift').html('<option value="0">--Shift--</option>');
                    $.ajax({
                        url:'<?php echo site_url('report_close_shift/ResponeShiftTimes')?>'+'/'+id,
                        type:'post',
                        data:{
                            c_id:id,fd:from_date,td:to_date
                        },
                        success:function(data){
                            var json=JSON.parse(data);
                            $.each(json,function(i,v){
                                $('#cbo_time_shift').append('<option value="'+v.cash_id+'">'+v.cash_startdate + ' > ' +v.cash_enddate+'</option>');
                            })
                        }
                    })
                }else{
                    $('#cbo_time_shift').html('<option value="0">--Shift--</option>');
                }
                
            });
        
                     
        </script>
    </body>

</html>
