<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>STOCK ADJUST</title>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                

                $('#cbo_from_branch').change(function(){
                    var id=$(this).val();

                    if(id>0){
                         $('#cbo_stock_location_from').html('<option value="0">--Stock Name--</option>');
                        $.ajax({
                            url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                            type:'get',
                            success:function(data){
                                var json=JSON.parse(data);
                                $.each(json,function(i,v){
                                    $('#cbo_stock_location_from').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                                })
                            }
                        })
                    }else{
                        $('#cbo_stock_location_from').html('<option value="0">--Stock Name--</option>');
                    }
                    
                });
                $('#cbo_to_branch').change(function(){
                    var id=$(this).val();

                    if(id>0){
                         $('#cbo_stock_location_to').html('<option value="0">--Stock Name--</option>');
                        $.ajax({
                            url:'<?php echo site_url('report_stock_sum/get_stock')?>'+'/'+id,
                            type:'get',
                            success:function(data){
                                var json=JSON.parse(data);
                                $.each(json,function(i,v){
                                    $('#cbo_stock_location_to').append('<option value="'+v.stock_location_id+'">'+v.stock_location_name+'</option>');
                                })
                            }
                        })
                    }else{
                        $('#cbo_stock_location_to').html('<option value="0">--Stock Name--</option>');
                    }
                    
                });

                
            });
        </script>
        <script type="text/javascript">
            function autoselect(pro_id) {

                var id = pro_id;
                var dataString = 'id=' + id;

                $.ajax
                        ({
                            type: "POST",
                            url: "<?php echo site_url("purchase/display_product"); ?>",
                            data: dataString,
                            cache: false,
                            success: function (html)
                            {
                                $("#panel_product").html(html);
                            }
                        });

                $("#txtpartnumber").select();
                $("#txtQty").focus();
            }
        </script>
    </head>
    <body>
        <div class="container">
        <form action="<?php echo site_url("stock_transffer/save"); ?>" method="post"> 
            <div class="panel panel-default">
                   <div class="panel-heading"><?php echo $lbl_title;?></div>
                   <div class="panel-body">
                       <div class="col-md-12">
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_part?></label>
                                   <input class="form-control form-custom text_input" type="text" name="txtpartnumber" id="txtpartnumber" onfocus="this.select()" autocomplete="off" onkeypress="if (event.keyCode == 13) { return false;}" placeholder="PART NUMBER">
                                   <div class="border"></div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                    <input class="hidden" type="text" name="txtpro_id" id="txtpro_id" placeholder="Product Id">
                                   <label><?php echo $lbl_name?></label>
                                   <input class="form-control form-custom text_input" type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="<?php echo $lbl_name?>">
                                   <div class="border"></div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_tran_from_branch?> <span class="star"> *</span></label>
                                   <select class="form-control form-custom"  name="cbo_from_branch" id="cbo_from_branch"> 
                                    <option value="0">--Branch Name--</option>
                                            <?php
                                            foreach ($branch as $rb) {
                                                ?>
                                                <option value="<?php echo $rb->branch_id; ?>"><?php echo $rb->branch_name; ?></option>
                                            <?php } ?>
                                    </select>
                                   <div class="border"></div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_tran_from_stock?><span class="star"> *</span></label>
                                   <select name="cbo_stock_location_from" id="cbo_stock_location_from" class="form-control form-custom" onchange="check_stock()">                        
                                        <option value="0">--Stock Name--</option>
                                
                                    </select>
                                   <div class="border"></div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_tran_to_branch?> <span class="star"> *</span></label>
                                   <select name="cbo_to_branch" id="cbo_to_branch" class="form-control form-custom">                        
                                        <option value="0">--Branch Name--</option>
                                        <?php
                                        foreach ($branch as $rbt) {
                                            ?>
                                            <option value="<?php echo $rbt->branch_id; ?>"><?php echo $rbt->branch_name; ?></option>
                                        <?php } ?>
                                    </select>
                                   <div class="border"></div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_tran_to_stock?><span class="star"> *</span></label>
                                   <select name="cbo_stock_location_to" id="cbo_stock_location_to" class="form-control form-custom"> <option value="0">--Stock Name--</option>
                                       
                                    </select>
                                   <div class="border"></div>
                               </div>
                           </div>

                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_measure?> <span class="star"> *</span></label>
                                   <select name="cbo_measure" id="cbo_measure" class="form-control form-custom">                        
                                        <option value="0">--<?php echo $lbl_measure?>--</option>
                                        <?php
                                        foreach ($measure as $m) {
                                            ?>
                                            <option value="<?php echo $m->measure_id; ?>"><?php echo $m->measure_name; ?></option>
                                        <?php } ?>
                                    </select>
                                   <div class="border"></div>
                               </div>
                           </div>

                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_qty?> <span id="msg_qty" style="color:red;"></span></label>
                                   <input class="form-control form-custom text_input" type="text" name="txt_qty" id="txt_qty" autocomplete="off" onchange="check_stock()" placeholder="QTY">
                                   <div class="border"></div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group">
                                   <label><?php echo $lbl_desc?></label>
                                   <input type="text"  name="txt_description" id="txt_description" class="form-control form-custom text_input">
                                   <div class="border"></div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel?></button>
                       <button class="btn btn-sad pull-right" id="btn_create" type="submit"><?php echo $btn_create?></button>
                        <div class="clearfix"></div>
                   </div>
               </div>   
        </form>
        </div>
        <script type="text/javascript">


            $('form').submit(function (e) {

                e.preventDefault();
                var product_id = $('#txtpro_id').val();
                var qty = $('#txt_qty').val();
                var branch_from=$('#cbo_from_branch').val();
                var stock_from = $('#cbo_stock_location_from').val(); 
                var branch_to=$('#cbo_to_branch').val();
                var stock_to=$('#cbo_stock_location_to').val();
                var measure=$('#cbo_measure').val();
                if(product_id==""){
                  alert('Input is not valid!!');
                  $('#txt_product_name').focus();
                  return false;
                }else if(branch_from==0){
                  alert('Input is not valid!!');
                  $('#cbo_from_branch').focus();
                  return false;
                }else if(stock_from==0){
                  alert('Input is not valid!!');
                  $('#cbo_stock_location_from').focus();
                  return false;
                }else if(branch_to==0){
                   alert('Input is not valid!!');
                  $('#cbo_to_branch').focus();
                  return false;
                }else if(stock_to==0){
                   alert('Input id not valid!!');
                  $('#cbo_stock_location_to').focus();
                  return false;
                }else if(measure==0){
                  alert('Input id not valid!!');
                  $('#cbo_measure').focus();
                  return false;
                }else if(qty=="" || qty<=0){
                   alert('Input id not valid!!');
                  $('#txt_qty').focus();
                  return false;
                }else if(branch_to==branch_from && stock_to==stock_from){
                  alert('You cannot tranfer in the same destination!!');
                  $('#cbo_from_branch').focus();
                  return false;
                }
                
                if(confirm('Are you sure to save this record?')){
                  $.ajax({
                    url:'<?php echo site_url('stock_transffer/save')?>',
                    type:'post',
                    async:false,
                    data:$(this).serialize(),
                    success:function(resp){
                      var json=JSON.parse(resp);
                      if(json.status=='S001'){
                        alert(json.message);
                        window.location.href ='<?php echo site_url('stock_transffer')?>';
                      }else{
                        alert(json.message);
                        return false;
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
        </script>
        
        <div id="msg"></div>
    </body>
</html>
