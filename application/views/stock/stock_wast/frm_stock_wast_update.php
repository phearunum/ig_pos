<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK ADJUST</title>
    </head>
    <body>
        <div class="container">
          <?php
           foreach($stock_record as $sr){
        ?>
        <form action="<?php echo site_url('stock/stock_waste_update'); ?>" method="post"> 
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lbl_stock_waste_list_title ?></div>
                <div class="panel-body">
                      <div class="col-md-12 hidden">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label><?=$lb_part?></label>
                               <input type="hidden" name="txt_waste_id" id="txt_waste_id" required value="<?php echo $id ?>">
                               <input type="hidden" name="txt_item_id" id="txt_item_id" required  value="<?php echo $sr->stock_item_id ?>">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label><?=$lbl_stock_itemName?></label>
                                  <input class="form-control form-custom text_input" type="text" name="txt_item_detail_name" id="txt_item_detail_name" required readonly value="<?php echo $proname ?>">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12 hidden">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Measure Id:</label>
                                  <input class="form-control form-custom text_input" type="text" name="txt_measure_id" id="txt_measure_id" required readonly class="text-disable" value="<?php echo $sr->measure_id ?>">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label><?php echo $lbl_stock_qty ?></label>
                                  <input class="form-control form-custom text_input" type="text"  name="txt_qty" value="<?php echo $qty; ?>" id="txt_qty" required>
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <input type="hidden" name="txt_stock_id" id="txt_stock_id" placeholder="Stock Id" value="<?php echo $sr->stock_id ?>">
                                  <label><?php echo $lbl_stock_name ?><span class="star"> *</span></label>
                                  <select name="cbo_stock_location" id="cbo_stock_location" class="form-control form-custom ">                        
                                      <option value="0">--Stock Name--</option>
                                      <?php
                                      foreach ($record_stock_location as $rsl){
                                          if($sr->stock_location_id == $rsl->stock_location_id){
                                              echo "<option selected value='$rsl->stock_location_id'>$rsl->stock_location_name</option>";        
                                          }else{
                                              echo "<option value='$rsl->stock_location_id'>$rsl->stock_location_name</option>";
                                          }
                                      ?>
                                      <?php
                                       }
                                      ?>
                                  </select>
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12 hidden">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>QTY OLD</label>
                                  <input class="form-control form-custom" type="hidden"  name="txt_old_qty" id="txt_old_qty" value="<?php echo $qty ?>">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                 </div>
                 <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
                    <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update ?></button>
                    <div class="clearfix"></div>
                 </div>
            </div>   
        </form>
        <?php } ?>
        </div>
        <script type="text/javascript">
            $('#txt_product_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("purchase/searchproduct"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'product_in_stock',
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
                    
                    $('#txtpro_id').val(names[1]);
                    $('#txtpartnumber').val(names[2]);

                }
            });
            $('#txtpartnumber').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("purchase/searchproduct"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'product_barcode',
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
                    $('#txtpro_id').val(names[1]);
                    $('#txt_product_name').val(names[0]);
                },
                focus: function( event, ui ) { 
                    var names = ui.item.data.split("|");
                    $('#txt_product_name').val(ui.item.value);
                    $('#txtpro_id').val(names[1]);
                    $('#txt_qty').focus();
                }
            });
        </script>
    </body>
</html>
