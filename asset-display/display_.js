// Make connection
var socket = io.connect('http://localhost:4000');
//var SerialPort = require('../serialport');
//listen for events
socket.on('order',function(data){
    reload_order(data.id,data.master,data.post_url);
});
socket.on('payment',function(data){
    $('#p_grand_total').text("$ "+numeral(data.pay_us).format('#.000'));
    $('#p_grand_total_kh').text(numeral(data.pay_kh).format('#,#00')+" ៛");
    $('#p_return').text(data.return_us);
    $('#p_return_kh').text(data.return_kh);
    

});
socket.on('dis_welcome',function(data){
    display_welcome(data.status);
    
});
socket.on('card_pay',function(data){
    close_pay();
    $('#p_grand_total').text("$ "+numeral(data.pay).format('#.000'));
    
});
socket.on('scan_card',function(data){
    close_pay();
    $('#p_grand_total').text("$ "+numeral(data.pay).format('#.000'));
    $('#p_card_balance').text("$ "+numeral(data.balance).format('#.000'));
});
socket.on('close_pay',function(data){
    close_pay();
});
function close_pay(){
    $('#p_grand_total').text("$ 0.000");
    $('#p_grand_total_kh').text('0 ៛');
    $('#p_return').text('$ 0.000');
    $('#p_return_kh').text('0 ៛');
    $('#p_return').text('$ 0.000');
    $('#p_return_kh').text('0 ៛');
    $('#p_card_balance').text('$ 0.000');
}
function display_welcome(data){
    $('#table-display tbody').html('');
    $('#lbl_dis_all').text(0);
    $('#lbl_tax').text(0);
    $('#p_dis').text(0);
    $('#lbl_rate').text(0);
    $('#p_dis_all').text('$ 0.000');
    $('#p_dis_all_kh').text("0 ៛");
    $('#p_total').text('$ 0.000');
    $('#p_total_kh').text("0 ៛");
    $('#p_grand_total').text("$ 0.000");
    $('#p_grand_total_kh').text("0 ៛");
    $('#p_return').text("$ 0.000");
    $('#p_return_kh').text("0 ៛");
    $('body').removeClass('bg-display');
    $('body').addClass('bg-slide');
    $('#table-display').addClass('hidden');
    $('#slide-show').removeClass('hidden');

}
function reload_order(id,master_id,post_url){
    //alert(id);alert(master_id);
    close_pay();
    $('body').removeClass('bg-slide');
    $('body').addClass('bg-display');
    $('#table-display').removeClass('hidden');
    $('#slide-show').addClass('hidden');
    $('#table-display tbody').html('');
    //var post_url = 'http://192.168.0.117/rms_enterprise/index.php/cashier_order/order_list';
   
    $.ajax({
    type: 'POST',
    dataType: "text",
    url: post_url,
    async: false,
    data: {'layout_id': id,'master_id':master_id},
    success: function (response) {  
        var value = JSON.parse(response);
        var item_all="";
        
        var grand_sub_total=0;
       
        
        $.each(value.sale,function(i,e){
         
           $('#lbl_dis_all').text(e.dis_all);
           $('#lbl_tax').text(e.tax);
           $('#lbl_rate').text(e.rate);
         
           
            $.each(e.sale_detail,function(k,j){

                    var item_detail_price=numeral(j.price).format('#.000');

                     var list_item_note="";
                     var notes_all="";
                     var grand_sub_total_note=0;
                     var total_sub=0;
                    //------------------
                    var items='<tr class="item_detail"> <td><b>'+j.detail_name+'</b></td> <td><b>'+j.qty+'</b></td> <td><b>'+numeral(j.price).format('#.000')+'</b></td> <td><b>'+j.dis_percent+'</b></td> <td>'+j.dis_dollar+'</td> <td></td> <td><b>'+numeral(item_detail_price*j.qty).format('#.000')+'</b></td> </tr>';

                    $.each(j.sale_note,function(f,g){
                                var item_note_price=numeral(g.price).format('#.000');
                                list_item_note='<tr> <td><span>'+g.item_note_name+'</span></td> <td>'+g.qty+'</td> <td>'+item_note_price+'</td> <td>0.000</td> <td>0.000</td> <td></td> <td>'+numeral(item_note_price*g.qty).format('#.000')+'</td></tr>';
                                total_sub=parseFloat(item_note_price*g.qty);
                                notes_all=notes_all+list_item_note;
                                grand_sub_total_note=parseFloat(grand_sub_total_note+total_sub);
                                

                                
                    });
                   
                    grand_sub_total=parseFloat(item_detail_price*j.qty)+parseFloat(grand_sub_total_note);
                    
                    //var sub_total='<tr class="sub_total sub_total'+j.sale_detail_id+'"><td style="height: 20px;"></td> <td class="item"></td><td class="item_nest"></td> <td class="item_nest"></td><td class="item_nest">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub</td>  <td class="item_nest"> Total</td> <td class="item_nest">'+numeral(grand_sub_total).format('#.000')+'</td></tr> ';
                    var sub_total='<tr class="sub_total hidden"> <td></td> <td></td> <td></td> <td></td> <td></td> <td>Sub Total</td> <td>'+numeral(grand_sub_total).format('#.000')+'</td></tr>';
                    item_all=item_all+items+notes_all+sub_total;   
            });
           
        });
        $('#table-display tbody').html(item_all).show('slow');
        totals();
       
        
    }
    ,
    error: function (response) {
        console.log('error');
    }
});
}

function totals(){
    var table = $("#table-display tbody");
    var total=0;
    table.find('tr.sub_total').each(function (i, el) {
        var $tds = $(this).find('td');
            sub_total=parseFloat($tds.eq(6).text());
            total+=sub_total;       
    }); 
    var rate=parseFloat($('#lbl_rate').text());
    // $('#p_total').text(numeral(total).format('#.000'));
    // $('#p_total_kh').text(numeral(numeral(total).format('#.000')*rate).format('#,#00'));
    total_dis();
    var dis=parseFloat($('#p_dis').text());
    var txt_dis_all=parseFloat($('#lbl_dis_all').text());

    var grand_after_dis_item=parseFloat(numeral(total).format('#.000'))-parseFloat(numeral(dis).format('#.000'));
    var dis_all=grand_after_dis_item*parseFloat(numeral(txt_dis_all/100).format('#.000'));
    $('#p_dis_all').text("$ "+numeral(dis_all+dis).format('#.000'));
    $('#p_dis_all_kh').text(numeral(numeral(dis_all+dis).format('#.000')*rate).format('#,#00')+" ៛");
    var tax_per=parseFloat($('#lbl_tax').text());
    var tax=(parseFloat(numeral(total).format('#.000'))-parseFloat(numeral(dis).format('#.000'))-parseFloat(numeral(dis_all).format('#.000')))*parseFloat(numeral(tax_per/100).format('#.000'));
    //$('#p_tax').text(numeral(tax).format('#.000'));
    
    var grand_total=((parseFloat(numeral(total).format('#.000'))-parseFloat(numeral(dis).format('#.000')))-parseFloat(numeral(dis_all).format('#.000')))+parseFloat(numeral(tax).format('#.000'));
    
    // $('#p_dis_all').text(numeral(grand_total).format('#.000'));
    // $('#p_dis_all_kh').text(numeral(numeral(grand_total).format('#.000')*rate).format('#,#00'));
    $('#p_total').text("$ "+numeral(grand_total).format('#.000'));
    $('#p_total_kh').text(numeral(numeral(grand_total).format('#.000')*rate).format('#,#00')+" ៛");
}
function total_dis(){
    var table = $("#table-display tbody");
    var grand_total_dis=0;
    table.find('tr.item_detail').each(function (i, el) {
                var $tds = $(this).find('td');
                    u_price=parseFloat($tds.eq(2).text());
                    qty=parseInt($tds.eq(1).text());
        
                    dis_percent=parseFloat($tds.eq(3).text());
                    dis_dollar=parseFloat($tds.eq(4).text());
                   
                    if(dis_percent>0){
                        grand_total_dis+=(u_price*qty)*(dis_percent/100);
                    }else{
                        grand_total_dis+=dis_dollar;
                    }    
            }); 
            console.log(numeral(grand_total_dis).format('#.000'));
    $('#p_dis').text(numeral(grand_total_dis).format('#.000'));
}



