<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK ADJUST</title>
    </head>
    <body> 
        <div class="container">
        <form action="<?php echo site_url("stock/save_adjust"); ?>" method="post"> 
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $lbl_stock_title ?></div>
                <div class="panel-body">
                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <input type="hidden" name="txtpro_id" id="txtpro_id" placeholder="Product Id">
                                  <label><?=$lb_part?></label>
                                  <input class="form-control form-custom text_input" type="text" name="txtpartnumber" id="txtpartnumber" onfocus="this.select()" autocomplete="off" required onkeypress="if (event.keyCode == 13) {
                                //autoselect(this.value);
                                return false;
                            }" placeholder="PART NUMBER">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label><?=$lbl_stock_itemName?></label>
                                  <input class="form-control form-custom text_input" type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="Item Name">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label><?php echo $lbl_stock_QTY ?></label>
                                  <input class="form-control form-custom text_input" type="text" name="txt_qty" id="txt_qty" autocomplete="off" placeholder="QTY">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>

                       <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label><?php echo $lbl_branch ?><span class="star"> *</span></label>
                                  <select  name="cbo_branch" id="cbo_branch" class="form-control form-custom">              
                                      <option value="0">--All Branch--</option>
                                      <?php
                                      foreach ($branch as $b) {
                                          ?>
                                          <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                                      <?php } ?>
                                  </select>
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label><?php echo $lbl_stock_name ?><span class="star"> *</span></label>
                                  <select name="cbo_stock_location" id="cbo_stock_location" class="form-control form-custom">                        
                                    <option value="0" selected>--All Stock--</option>
                                    
                                </select>
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label><?php echo $lbl_stock_description ?></label>
                                  <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description">
                                  <div class="border"></div>
                              </div>
                          </div>
                      </div>
                 </div>
                 <div class="panel-footer">
                    <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
                    <button class="btn btn-sad pull-right" id="btn_create" type="submit"><?php echo $btn_create ?></button>
                    <div class="clearfix"></div>
                 </div>
            </div>   
        </form>
        </div>
        <script type="text/javascript">
          $('form').on('submit',function(e){
            e.preventDefault();
            var branch=$('#cbo_branch').val();
            var stock=$('#cbo_stock_location').val();
            var qty=$('#txt_qty').val();
            var item=$('#txtpro_id').val();
            if(qty=="" || qty<=0){
              alert('Please input Qty bigger than 0!!');
              $('#txt_qty').focus();
              return false;
            }
            if(branch==0){
              alert('Please select Branch!!');
              $('#cbo_branch').focus();
              return false;
            }
            if(stock==0){
              alert('Please select stock location!!');
              $('#cbo_stock_location').focus();
              return false;
            }
            if(confirm('Are you sure to save it?')){
                $.ajax({
                  url:'<?php echo site_url('stock/save_adjust')?>',
                  type:'post',
                  data:$('form').serialize(),
                  async:true,
                  success:function(req){
                    var json=JSON.parse(req);
                    if(json.status=='E001'){
           
                      alert("Item not exist in stock!!");
                      
                      
                    }else{
                      alert(json.message);
                      location.href='<?php echo site_url('stock/adjust_list')?>';
                    }
                  }
              });
            }
            
       
          });
            $('#txt_product_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("purchase/searchproduct"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'purchase_item_name',
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
                change: function (event, ui) {
                    if(ui.item==null){
                         $('#txtpro_id').val('');
                         $(this).val('');
                         $('#txtpartnumber').val('');
                    }else{
                        var names = ui.item.data.split("|");
                        $('#txtpro_id').val(names[1]);
                        $('#txtpartnumber').val(names[5]);
                    }
                    
                }
                // select: function (event, ui) {
                //     var names = ui.item.data.split("|");
                    
                //     $('#txtpro_id').val(names[1]);
                //     $('#txtpartnumber').val(names[5]);

                // }
            });
            $('#txtpartnumber').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("purchase/searchproduct"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'purchase_part_number',
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
            $('#cbo_branch').change(function(){
            var id=$(this).val();

            if(id>0){
                 $('#cbo_stock_location').html('<option value="0">--All Stock--</option>');
                $.ajax({
                    url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                    type:'get',
                    success:function(data){
                        var json=JSON.parse(data);
                        $.each(json,function(i,v){
                            $('#cbo_stock_location').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                        })
                    }
                })
            }else{
                $('#cbo_stock_location').html('<option value="0">--All Stock--</option>');
            }
            
        });
        </script>
    </body>
</html>
