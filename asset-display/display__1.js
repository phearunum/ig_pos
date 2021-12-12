// Make connection
var socket = io.connect('http://localhost:4000');
var post_url = 'http://192.168.0.119:8080/rms/rms_basic/index.php/cashier_order/order_list';
//var SerialPort = require('../serialport');
//listen for events
var discount_dollar=0;
socket.on('order',function(data){    
    reload_order(data.id,data.master,post_url);
});
socket.on('payment',function(data){
    $('#p_grand_total').text("$ "+numeral(data.pay_us).format('#.00'));
    $('#p_grand_total_kh').text(numeral(data.pay_kh).format('#,#00')+" ៛");
    $('#p_return').text(data.return_us);
    $('#p_return_kh').text(data.return_kh);

    
    if(data.pay_us>0||data.pay_kh>0){
        $('#p_grand_total').addClass("color_red");
        $('#p_grand_total_kh').addClass("color_red");
        $('#pay').addClass("color_red");

        $('#return').addClass("color_red");
        $('#p_return').addClass("color_red");
        $('#p_return_kh').addClass("color_red");
    }else{
        $('#p_grand_total').removeClass("color_red");
        $('#p_grand_total_kh').removeClass("color_red");
        $('#pay').removeClass("color_red");

        $('#return').removeClass("color_red");
        $('#p_return').removeClass("color_red");
        $('#p_return_kh').removeClass("color_red");
    }
    

});
socket.on('dis_welcome',function(data){
    window.location.href = "/exitkiosk";
    
});
socket.on('card_pay',function(data){
    close_pay();
    $('#p_grand_total').text("$ "+numeral(data.pay).format('#.00'));
    if($('#select_card').val()!=0){
        $('#p_grand_total').addClass("color_red");
        $('#p_grand_total_kh').addClass("color_red");
        $('#pay').addClass("color_red");

    }else{
        $('#p_grand_total').removeClass("color_red");
        $('#p_grand_total_kh').removeClass("color_red");
        $('#pay').removeClass("color_red");

    }
    check_color();
});
socket.on('scan_card',function(data){
    close_pay();
    $('#p_grand_total').text("$ "+numeral(data.pay).format('#.00'));
    $('#p_total').text("$ "+numeral(data.pay).format('#.00'));
    $('#p_card_balance').text("$ "+numeral(data.balance).format('#.00'));
     if( $('#p_card_balance').html()!="$ 0.00" || $('#p_card_balance_kh').html()!="0 ៛" ){
        $('#card_balance').addClass("color_red");
        $('#p_card_balance').addClass("color_red");
        $('#p_card_balance_kh').addClass("color_red");

        $('#p_grand_total').addClass("color_red");
        $('#p_grand_total_kh').addClass("color_red");
        $('#pay').addClass("color_red");
    }   
    check_color();
});
socket.on('close_pay',function(data){
    close_pay();
});
function close_pay(){
    $('#p_grand_total').text("$ 0.00");
    $('#p_grand_total_kh').text('0 ៛');
    $('#p_return').text('$ 0.00');
    $('#p_return_kh').text('0 ៛');
    $('#p_return').text('$ 0.00');
    $('#p_return_kh').text('0 ៛');
    $('#p_card_balance').text('$ 0.00');
    $('#p_dis_all').text('$ 0.00');

    $('#total').removeClass("color_blue");
    $('#p_total').removeClass("color_blue");
    $('#p_total_kh').removeClass("color_blue");

    $('#discount').removeClass("color_blue");
    $('#p_dis_all').removeClass("color_blue");
    $('#p_dis_all_kh').removeClass("color_blue");

    $('#pay').removeClass("color_red");
    $('#p_grand_total').removeClass("color_red");
    $('#p_grand_total_kh').removeClass("color_red");

    $('#card_balance').removeClass("color_red");
    $('#p_card_balance').removeClass("color_red");
    $('#p_card_balance_kh').removeClass("color_red");

    $('#return').removeClass("color_red");
    $('#p_return').removeClass("color_red");
    $('#p_return_kh').removeClass("color_red");

}
function display_welcome(data){
    //$('#table-display tbody').html('');
    $('#lbl_dis_all').text(0);
    $('#lbl_tax').text(0);
    $('#p_dis').text(0);
    $('#lbl_rate').text(0);
    $('#p_dis_all').text('$ 0.00');
    $('#p_dis_all_kh').text("0 ៛");
    $('#p_total').text('$ 0.00');
    $('#p_total_kh').text("0 ៛");
    $('#p_grand_total').text("$ 0.00");
    $('#p_grand_total_kh').text("0 ៛");
    $('#p_return').text("$ 0.00");
    $('#p_return_kh').text("0 ៛");
    $('body').removeClass('bg-slide');
    $('body').addClass('bg-display');
    //$('#table-display').addClass('hidden');
    $('#slide-show').removeClass('hidden');

}
function reload_order(id,master_id,post_url){
    //alert(id);alert(master_id);
    discount_dollar=0;
    close_pay();
    // $('body').removeClass('bg-slide');
    $('body').addClass('bg-display');
    //$('#table-display').removeClass('hidden');
    $('#slide-show').addClass('hidden');
    $('#table-display tbody').html('');
    
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
           discount_dollar = e.dis_dollar_all;
           $('#lbl_tax').text(e.tax);
           $('#c-vat').text(e.tax);
           $('#lbl_rate').text(e.rate);
         
           
            $.each(e.sale_detail,function(k,j){

                    var item_detail_price=numeral(j.price).format('#.00');

                     var list_item_note="";
                     var notes_all="";
                     var grand_sub_total_note=0;
                     var total_sub=0;
                    //------------------
                    var items='<tr class="item_detail"> <td><b>'+j.detail_name+'</b></td> <td><b>'+j.qty+'</b></td> <td><b>'+numeral(j.price).format('#.00')+'</b></td> <td><b>'+j.dis_percent+'</b></td> <td>'+j.dis_dollar+'</td> <td></td> <td  style="text-align:center;"><b>'+numeral(item_detail_price*j.qty).format('#.00')+'</b></td> </tr>';

                    $.each(j.sale_note,function(f,g){
                                var item_note_price=numeral(g.price).format('#.00');
                                list_item_note='<tr> <td><span>'+g.item_note_name+'</span></td> <td>'+g.qty+'</td> <td>'+item_note_price+'</td> <td>0.00</td> <td>0.00</td> <td></td> <td>'+numeral(item_note_price*g.qty).format('#.00')+'</td></tr>';
                                total_sub=parseFloat(item_note_price*g.qty);
                                notes_all=notes_all+list_item_note;
                                grand_sub_total_note=parseFloat(grand_sub_total_note+total_sub);
          
                    });
                   
                    grand_sub_total=parseFloat(item_detail_price*j.qty)+parseFloat(grand_sub_total_note);
                    
                    //var sub_total='<tr class="sub_total sub_total'+j.sale_detail_id+'"><td style="height: 20px;"></td> <td class="item"></td><td class="item_nest"></td> <td class="item_nest"></td><td class="item_nest">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub</td>  <td class="item_nest"> Total</td> <td class="item_nest">'+numeral(grand_sub_total).format('#.000')+'</td></tr> ';
                    var sub_total='<tr class="sub_total hidden"> <td></td> <td></td> <td></td> <td></td> <td></td> <td>Sub Total</td> <td>'+numeral(grand_sub_total).format('#.00')+'</td></tr>';
                    item_all=item_all+items+notes_all+sub_total;   
            });
           
        });
        $('#table-display tbody').html(item_all).show('slow');
        totals();
        check_color();        
    },
    error: function (response) {
    console.log('error');
    }
});
}

function check_color(){   
    if( $('#p_total').html()!="$ 0.00" || $('#p_total_kh').html()!="0 ៛" ){
        $('#total').addClass("color_blue");
        $('#p_total').addClass("color_blue");
        $('#p_total_kh').addClass("color_blue");
    }  
    if( $('#p_dis_all').html()!="$ 0.00" || $('#p_dis_all_kh').html()!="0 ៛" ){
        $('#discount').addClass("color_blue");
        $('#p_dis_all').addClass("color_blue");
        $('#p_dis_all_kh').addClass("color_blue");
    }
     
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

    $("#c-total").text(parseFloat(numeral(total).format('#.00')));
    var grand_after_dis_item=parseFloat(numeral(total).format('#.00'))-parseFloat(numeral(dis).format('#.00'));
    var dis_all=grand_after_dis_item*parseFloat(numeral(txt_dis_all/100).format('#.00'));
    $('#p_dis_all').text("$ "+numeral(dis_all+dis).format('#.00'));
    $('#p_dis_all_kh').text(numeral(numeral(dis_all+dis).format('#.00')*rate).format('#,#00')+" ៛");
    var tax_per=parseFloat($('#lbl_tax').text());
    var tax=(parseFloat(numeral(total).format('#.00'))-parseFloat(numeral(dis).format('#.00'))-parseFloat(numeral(dis_all).format('#.00')))*parseFloat(numeral(tax_per/100).format('#.00'));
    //$('#p_tax').text(numeral(tax).format('#.000'));
    
    var grand_total=((parseFloat(numeral(total).format('#.00'))-parseFloat(numeral(dis).format('#.00')))-parseFloat(numeral(dis_all).format('#.00')))+parseFloat(numeral(tax).format('#.00'));
    
    //$('#p_dis_all').text(numeral(grand_total).format('#.000'));
    //$('#p_dis_all_kh').text(numeral(numeral(grand_total).format('#.000')*rate).format('#,#00'));
    $('#p_total').text("$ "+numeral(grand_total).format('#.00'));
    $('#p_total_kh').text(numeral(numeral(grand_total).format('#.00')*rate).format('#,#00')+" ៛");
   
}
function total_dis(){
    close_pay();
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
         grand_total_dis+=parseFloat(discount_dollar); 
            console.log(numeral(grand_total_dis).format('#.00'));
    $('#p_dis').text(numeral(grand_total_dis).format('#.00'));
  
}



