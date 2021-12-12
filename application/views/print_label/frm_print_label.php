<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("js/jsbarcode/JsBarcode.all.min.js");?>"></script>
        <title></title>
    </head>
    <body>
      <div style="margin:0;padding:0;display:inline-block;margin-left:3px;" class="center" id="div1">
        <span style="font-family:'Khmer OS Battambang';font-size:10px;margin-left:8px;"><?php echo $item_name; ?></span><br>
        <span style="font-family:'Khmer OS Battambang';font-weight: bold;font-size:10px;margin-left:8px;"><?php echo $price; ?></span><br>
        <svg id="panel_barcode1"></svg>
      </div>
      <div style="margin:0;padding:0;display:inline-block;margin-left:15px;" id="div2">
        <span style="font-family:'Khmer OS Battambang';font-size:10px;margin-left:8px;"><?php echo $item_name; ?></span><br>
        <span style="font-family:'Khmer OS Battambang';font-weight: bold;font-size:10px;margin-left:8px;"><?php echo $price; ?></span><br>
        <svg id="panel_barcode2"></svg>
      </div>
      <div style="margin:0;padding:0;display:inline-block;" id="div3">
        <span style="font-family:'Khmer OS Battambang';font-size:10px;margin-left:8px;"><?php echo $item_name; ?></span><br>
        <span style="font-family:'Khmer OS Battambang';font-weight: bold;font-size:10px;margin-left:8px;"><?php echo $price; ?></span><br>
        <svg id="panel_barcode3"></svg>
      </div>
      <div style="margin:0;padding:0;display:inline-block;" id="div4">
        <span style="font-family:'Khmer OS Battambang';font-size:10px;margin-left:8px;"><?php echo $item_name; ?></span><br>
        <span style="font-family:'Khmer OS Battambang';font-weight: bold;font-size:10px;margin-left:8px;"><?php echo $price; ?></span><br>
        <svg id="panel_barcode4"></svg>
      </div>


      <script type="text/javascript">
      const width=1.18; //Inch
      const height=32; //Inch
      const column=2; //Number of lebel per row 1X2
      const leftmagin=28;
      var part_number="<?php echo $part_number; ?>";

        $(document).ready(function() {
          JsBarcode("#panel_barcode1",part_number,{
            width: width,
            height: height,
            font:'Khmer OS Battambang',
            fontSize:12
          });


          if(column>=2){
            JsBarcode("#panel_barcode2", part_number,{
              width: width,
              height: height,
              fontSize:12,
              font:'Khmer OS Battambang'
            });
          }else {
             $("#div2").hide();
          }

          if(column>=3){
            JsBarcode("#panel_barcode3", part_number,{
              width: width,
              height: height,
              fontSize:12,
              font:'Khmer OS Battambang'
            });
          }else {
             $("#div3").hide();
          }

          if(column>=4){
            JsBarcode("#panel_barcode4", part_number,{
              width: width,
              height: height,
              fontSize:12,
              font:'Khmer OS Battambang'
            });
          }else{
            $("#div4").hide();
          }

          $("body").css("padding","0");
          $("body").css("margin","0");
          $("body").css("padding-top","8px");
          window.print();
          window.close();
        });
      </script>
    </body>
</html>
