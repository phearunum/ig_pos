<html lang="en">
<head>
  <title>Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="<?php echo base_url('js/display/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('js/display/popper.min.js')?>"></script>

  <script type="text/javascript" src="<?php echo base_url('js/numeral/numeral.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
  <link rel="stylesheet" href="<?php echo base_url("css/style_bootsrap.css") ?>">
  <style type="text/css">
    .css_total{
      color: #000;font-size: 20px;margin-top: 3px;
    }
    .css_grand_total{
      color: white;
      font-size: 45px;
      text-align: center;
      margin-top: 10px;
    }
    #tbl{      
        text-align: right;
        /*position: fixed;*/
        left: 0;
        bottom: 54px;
        width: 100%;
        /* background: #b56060; */
        height: 220px;
        padding-right: 25px;
      /*  background: #3a5fb7;
        top: 412px;*/
    }
    @media screen and (max-width: 1024px){
      img{
        max-width: 477px;
        height: 432px;
      }
    }
    span{
      margin-left: 40px;
    }
    .clearfix{
      height: 200px;
    }
    h3,th{
      font-size: 18px;
      /*text-shadow: 0px 1px 1px cadetblue;*/
      font-weight: bold;
      color: #f7f7f7;
    }
    .color_blue{
      color: #f7f7f7;
    }
    .color_red{
      color: #f7f7f7;
      text-shadow: 3px 2px 7px #c000ff;
    }
    #table-display{
      padding-top: 15px;
    }
    .hidden{
      display:none;
    }
    
    .carousel-inner{
        width: 104.5%;
		height: 450px;
		bottom: -470px;
		border-radius: 3px;
		margin-left: -15px;
		position: absolute;
		z-index: 0;
		border: 5px solid #2ea5ad75;
    }
    /*@media screen and (max-width: 2760px){
      #myCarousel{
        max-width: 1344px;
       
      }
      #tbl{
        height: 168px;
      }
      .carousel-inner{
        max-height: 425px;
      }
    }
    @media (min-width: 768px){}
    .col-sm-6 {
        width: 9%;
    }
  }*/
    /* Slide show */
    
    .bg-slide{
      /*background: url('../img/display/bg_red.png');*/
      color: #000;
      width: 100%;
      background: #00c7c71f;
    }
   /* @media screen and (max-width: 1360px) {
     .bg-slide {
    background: url('../img/display/bg_red.png');
    background: #ededed;
  }
  
}*/

    /*.col-md-7{
      width: 100%;
    }*/
 /* @media screen and (max-width: 1024px) {
     .col-md-6 {
    width: 50%;
    height: 541px;
  }*/

/*@media screen and (max-width: 1200px){
  .carousel-inner{
    height: 424px;
  }
}*/
/*@media screen and (max-width: 1199px){
  #myCarousel {
    max-height: 398px;
  }
}*/

/*@media (max-width: 1366px){
  .carousel-inner{
    max-height: 522px;
  }
}*/
/*@media (min-width: 768px) {
.carousel-inner{
    height: 438px;
  }
}*/
/**/
body *{
   font-weight: bold;
}
body { 
  font-family: 'Khmer OS Battambang', 'sans-serif';
  color: #000;
  /*background: url('../img/display/bg_red.png');*/
  overflow: hidden;
  background: #ededed;

}
/*@media screen and (max-width: 2727px){
  img{
    min-width: 1327.5px;
  }
  .carousel-inner{
    width: 102.4%;
  }
}*/
@media screen and (max-width: 1024px){
  .max{
    width: 486px;
  }

  h3,th{
      font-size: 15px;
      margin-top: 27px;
    }
}
@media screen and (max-width: 768px){
  .max{
    width: 362px;
  }
    img{
    max-width: 345px;
  }
  .carousel-inner{
    width: 99.3%
  }
}
@media screen and (max-width: 1000px){
  .max{
    width: 467px;
  }
}
@media screen and (max-width: 990px){
     .max{
      width: 424px;
    }
    img{
          max-width: 457px;
    }
    .carousel-inner{
      width: 115.5%;
    }
  }

.tabl{
  margin-top: 45px;
  margin-left: 12px;
}
.table>thead>tr>th {
  border-bottom: 14px solid #ededed;
  background: #38a06bc7;
  color: #fff;
  font-size: 18px;
  text-transform: uppercase;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td{
  border-bottom: 1px solid #64a72f57;
}
@media screen and (max-width: 850px){
  .max{
    width: 378px;
  }
}
.item_total{
max-height: 124px;
overflow: inherit;
}
/*.item_detail{
  text-align: right;
} */


	/*LABEL FORMAT*/
		#lb1,#lb2{display: inline-block;font-family:"Khmer Os Battambang";max-width: 207px; overflow:hidden;max-height:151px;}
		#lb1{min-width: 207px;margin-left:10px;}
	/*END LABEL FORMAT*/
  </style>




</head>
<body style="" class="bg-slide">


<div id="table-display" class="container-fluid " style="padding-right: 0px; background: #ededed;"><!--Hidden--> 
<div class="col-xs-6 col-md-6 col-lg-6" style="height: 727px; overflow: hidden;width: 48.973333%; background: #ffffff8c;padding-right: 0px; padding-left: 0px; border-radius: 7px;">

<p style="display:none;">dis_all<label id="lbl_dis_all">0</label><br><label id="lbl_tax">0</label> <br>dis<label id="p_dis">0</label> <br><label id="lbl_rate">0</label><br><label id="lbl_order_number">0</label></p>      
  <table class="table" id="tableDisplay">
    <thead>
      <tr>
        <th>Item</th>
        <th>Unit</th>
        <th>Price</th>
        <th>Dis%</th>
        <th>Dis$</th>
        <th></th>
        <th style="text-align:right;padding-right:10px;">Amount</th>
      </tr>      
    </thead>
    <tbody>
    </tbody>
  </table>
<div class="col-xs-12 col-sm-12 col-md-12" style="position: fixed; bottom: 10px;padding-top: 5px;background: #38a049; height: 85px;text-align: right;color: #000;border-top: 5px solid #95cccf; width: 48.5%; border-radius: 25px 25px 5px 5px;">
   <h1 id="grand_display" class="css_grand_total"></h1>
   <div class="col-xs-12 col-md-8 col-lg-6 hidden" style="padding: 0;">
     <div class="col1-xs-6 pull-left" style="text-align: left;">
       <h3 id="t-total" class="css_total">TOTAL</h3>
       <h3 id="v+vat" class="css_total">VAT</h3>
       <h3 id="d-dis" class="css_total">DISCOUNT</h3>
       <h3 id="g-total" class="css_grand_total">GRAND TOTAL</h3>
     </div>
     <div class="col3-xs-2 pull-left" style="text-align: left;padding-left: 20px;">
       <h3 class="css_total">: $</h3>
       <h3 class="css_total">: %</h3>
       <h3 class="css_total">: $</h3>
       <h3 class="css_grand_total">: $</h3>
     </div>
    <div class="col2-xs-4 pull-right">
      <h3 id="c-total" class="css_total"> 00.00</h3>
      <h3 id="c+vat" class="css_total"> 00.00</h3>
      <h3 id="c-disc" class="css_total"> 00.00</h3>
      <h3 id="p_total2"> 00.00</h3>      
     </div>
    </div>
</div>
</div>

<div class="col-xs-6 col-md-6" style="margin-left: 10px;">
<div class="col-xs-12 col-sm-12 col-md-12" style="background: url(../img/background1.jpg); overflow: hidden; height: 275px; border-radius: 4px;background-repeat: no-repeat;background-size: cover;">
    <div class="col-sm-5 col-xs-5 col-md-5" style="color: #f9ff00; text-align: right;text-transform: uppercase;">
      
      <h3 id="total">សរុប/Total:</h3>
      <h3 id="discount">បញ្ចុះតម្លៃ/Discount:</h3>
      <h3 id="grand">ទាំងអស់/G Total:</h3>
      <h3 id="pay">បង់ប្រាក់/Pay In:</h3>
      <h3 id="card_balance">កាត/Card Member:</h3>
      <h3 id="return">ប្រាក់អាប់/Return:</h3>

    </div>
    <div class="col-xs-3 col-sm-3 col-md-3" style="text-align: right;">
      
      <h3 id="p_total" align="right">$ 0.00</h3>
      <h3 id="p_dis_all" align="right">$ 0.00</h3>
      <h3 id="p_grand_total" align="right">$ 0.00</h3>
      <h3 id="pay_us" align="right">$ 0.00</h3>
      <h3 id="p_card_balance" align="right">$ 0.00</h3>
      <h3 id="p_return" align="right">$ 0.00</h3>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" style="text-align: right;">
      <h3 id="p_total_kh" align="right">0 ៛</h3>
      <h3 id="p_dis_all_kh" align="right">0 ៛</h3>
      <h3 id="p_grand_total_kh" align="right">0 ៛</h3>
      <h3 id="pay_kh" align="right">0 ៛</h3>
      <h3 id="p_card_balance_kh" align="right">0 ៛</h3>
      <h3 id="p_return_kh" align="right">0 ៛</h3>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 max">
    <!--Image Frame-->
    <!--<img src="../img/frame3.png" style="margin-left: -15px;
    width: 643.5px; margin-top: 3px; height: 471px; border-radius: 4px; position: absolute;z-index: 5;" />-->

    <!--End frame-->

    <div id="myCarousel" class="carousel slide " data-ride="carousel">
    <!-- Indicators -->
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">

       <?php 
      $i=0;
      foreach($slide as $s){
        
        if($i==0){
          $clazz="active";
        }else{
          $clazz="";
        }
        ?> 

         <div class="item <?php echo $clazz;?>">
        <img src="<?php echo base_url("img/slide/$s->images")?>" alt="Los Angeles" style="width:100%; height: 100%;">
        <div class="carousel-caption">
          <h3 style="color:#fff;font-size: 25px;font-weight: bold;text-shadow: 0px -3px 3px #000; margin-bottom: -13px;"><!-- <?php echo $s->name;?> --></h3> 
         <!--  <p style="color:darkred;"><?php echo $s->desc;?></p> -->
        </div>

       </div>
      <?php $i++; }?>
 
    </div>
    <!-- Left and right controls -->
  </div>
  </div>

    </div>

  </div>
</body>

<script>
    function kh_round(number) {
        var mod = parseInt(number) % 100;
        var big = parseInt(number) - parseInt(mod);

        if(mod>=50){
            mod = 100;
        }else{
            mod = 0;
        }

        return parseInt(big)+parseInt(mod);
    }
  function reload_order(layout_id,master_id){
    $('#tableDisplay tbody').html('');
            var post_url = '<?php echo site_url('cashier_order/order_list') ?>';
            $.ajax({
            type: 'POST',
            dataType: "text",
            url: post_url,
            async: false,
            data: {'layout_id': layout_id,'master_id':master_id},
            success: function (response) {  
                var value = JSON.parse(response);
                var item_all="";                
                var grand_sub_total=0;    
                $.each(value.sale,function(i,e){
                    $.each(e.sale_detail,function(k,j){
                        var item_detail_price=numeral(j.price).format('#.2');
                        var p_price=j.price;
                        var list_item_note="";
                        var notes_all="";
                        var grand_sub_total_note=0;
                        var item_qty=0;
                        var item_price=0;
                        var total_sub=0;
                        var item_note_name="";
                        $.each(j.sale_note,function(f,g){
                          //var item_note_price=numeral(g.price).format('#.2');
                              item_price=g.price;                                                                 
                              total_sub=parseFloat(item_price*g.qty);
                              notes_all=notes_all+list_item_note;
                              grand_sub_total_note=parseFloat(grand_sub_total_note+total_sub);        
                              item_note_name=g.item_note_name; 
                              item_qty=g.qty;
                              
                              if(item_note_name!=''){
                                list_item_note+='<tr style="color:blue;"><td style="padding-left:20px;font-size:12px;line-height:20%;">'+item_note_name+'</td><td style="font-size:12px;line-height:20%;">'+item_qty+'</td><td style="font-size:12px;line-height:20%;">'+item_price+'</td><td></td><td></td><td></td><td style="font-size:12px;line-height:20%;text-align:right;padding-right:10px;">'+parseFloat(total_sub).toFixed(2)+'</td></tr>';
                              }
                        });
                        amount=p_price*j.qty;
                        grand_sub_total+=parseFloat(p_price*j.qty)+parseFloat(grand_sub_total_note);                           
                        $('#tableDisplay tbody').append('<tr><td>'+j.detail_name+'</td><td>'+j.qty+'</td><td>'+p_price+'</td><td>'+j.dis_percent+'</td><td>'+j.dis_dollar+'</td><td></td><td style="text-align:right;padding-right:10px;">'+parseFloat(amount).toFixed(2)+'</td><td style="display:none;">'+grand_sub_total_note+'</td></tr>'+list_item_note+'');            
                          });
                          var table = $("#tableDisplay tbody");
                          var total=0,t_discount_percent=0,t_discount_dollar=0,total_price_note=0;
                          table.find('tr').each(function (i, el) {
                            var $tds = $(this).find('td');
                              sub_total=parseFloat($tds.eq(6).text());
                              price=parseFloat($tds.eq(2).text());
                              discount_percent=parseFloat($tds.eq(3).text());
                              if($tds.eq(3).text()!=''){
                                discount_dollar=parseFloat($tds.eq(4).text());   
                                total_note= parseFloat($tds.eq(7).text()); 
                                total_price_note+=total_note;
                                t_discount_percent+=price*discount_percent*parseFloat($tds.eq(1).text())/100;
                                t_discount_dollar+=discount_dollar*parseFloat($tds.eq(1).text());   
                                total+=sub_total; 
                              }                      
                          });
                          $('#c-total').html(parseFloat(total+total_price_note).toFixed(2));
                          grant_total=(total+total_price_note)-(t_discount_percent+t_discount_dollar);
                          vat=(grant_total*e.tax)/100;
                          $('#c+vat').html(e.tax);
                          var disInvAsPercent=e.dis_all;
                          final_total_dis_inv_percent=(total+total_price_note)*e.dis_all/100;
                          var disInvAsDollar=parseFloat(e.dis_dollar_all); 
                          $('#c-disc').html(parseFloat(t_discount_percent+t_discount_dollar+disInvAsDollar+final_total_dis_inv_percent).toFixed(2));
                          $('#p_total2').html(parseFloat(grant_total+vat-final_total_dis_inv_percent-disInvAsDollar).toFixed(2));
                          $('#p_total').html('$ '+parseFloat(total+total_price_note).toFixed(2));
                          $('#p_total_kh').html(numeral(kh_round((total+total_price_note)*e.sale_master_ex_rate)).format('#,##0')+' ៛');
                          $('#p_dis_all').html('$ '+parseFloat(t_discount_percent+t_discount_dollar+disInvAsDollar+final_total_dis_inv_percent).toFixed(2));
                          $('#p_dis_all_kh').html(numeral(kh_round((t_discount_percent+t_discount_dollar+disInvAsDollar+final_total_dis_inv_percent)*e.sale_master_ex_rate)).format('#,##0')+' ៛');
                          $('#p_grand_total').html('$ '+parseFloat(grant_total+vat-final_total_dis_inv_percent-disInvAsDollar).toFixed(2));
                          $('#p_grand_total_kh').html(numeral(kh_round((grant_total+vat-final_total_dis_inv_percent-disInvAsDollar)*e.sale_master_ex_rate)).format('#,##0')+' ៛');
                          $('#grand_display').html($('#p_grand_total').html()+" = "+$('#p_grand_total_kh').html());
                });
               
            }
            ,
            error: function (response) {
              alert('Unable to load sale data!!');
            }
        });
  }
  $(document).ready(function(){
    setInterval(function(){ 
      $.ajax({
        type: 'GET',
        url: "http://127.0.0.1:85/get_display",
        dataType:'json',
        success: function (response){
          if(response.status==1){
            $('#pay_us').html('$ '+parseFloat(response.pay_in_dollar).toFixed(2));
            $('#pay_kh').html(response.pay_in_riel+' ៛');
            $('#p_return').html('$ '+parseFloat(response.return_us).toFixed(2));
            $('#p_return_kh').html(kh_round(response.return_kh)+' ៛');
            reload_order(response.layout_id,response.master_id);
          }
        },
        error: function (response) {
          console.log("An error occure while saving data!");
        }
      });
    },500);
  });
</script>

</html>
