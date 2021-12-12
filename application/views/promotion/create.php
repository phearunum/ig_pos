<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Promotion</title>
        <link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>" />
        <script src="<?php echo base_url('js/jquery_autocomplete/jquery-1.10.2.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js'); ?>"></script>
        <style type="text/css">
            .table-table th {
                    color: #FFFFFF;
                    background-color: #137b80;
                }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center text-primary">Promotion
                </div></h3>
                <?php if($status=='0') { ?>
                    <div class="panel-heading" style="text-align: left; background-color:#9999;" >
                    
                    <form class="table-form" id="form_promotion_master">
                        <input type="hidden" name="promo_id" id="promo_id" value="<?php echo $promotion_data[0]->promotion_id; ?>">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>From Date<span class="star"></span></label>
                                    <input class="form-control form-custom text_input" type="date" value="<?php echo $promotion_data[0]->from_date; ?>" name="from_date" id="from_date">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>From Time<span class="star"> *</span></label>
                                    <input  class="form-control form-custom txt_date" type="time" id="from_time" value="<?php echo $promotion_data[0]->from_time; ?>" name="from_time" style="width: 100%;"/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>To Date<span class="star"></span></label>
                                    <input class="form-control form-custom text_input" type="date" value="<?php echo $promotion_data[0]->until_date; ?>" name="to_date" id="to_date">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>To Time<span class="star"> *</span></label>
                                    <input  class="form-control form-custom txt_date" type="time" value="<?php echo $promotion_data[0]->until_time; ?>" id="to_time" name="to_time" style="width: 100%;"/>
                                    
                                </div>
                            </div>

                        </div>
                    
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <label>Promotion<span class="star"> *</span></label>
                                    <input type="text" class="form-control form-custom text_input" value="<?php echo $promotion_data[0]->promotion_name; ?>" name="promo_name" id="promo_name">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <label>Description<span class="star"></span></label>
                                    <textarea rows="1" class="form-control form-custom" name="txtDesc" style="width:100%" id="txtDesc"><?php echo $promotion_data[0]->description; ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <input style="min-width: 60px;margin-top: 38px;" class="btn btn-primary pull-right" name="btnSave" id="btnSave" type="submit" value="Save" />
                                </div>
                            </div>
                            
                                 
                        </div>
                    </form>
                    
                    <div class="clearfix"></div>

                </div>
                <div class="panel-body">
                    <form id="form_add">
                        <div class="col-md-12">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_part_num" id="txt_part_num" autocomplete="off" placeholder="Part Number..." readonly>
                                    <input type="hidden" name="pro_id" id="pro_id">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="Choose Product..." required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_discount_percen" id="txt_discount_percen" autocomplete="off" placeholder="Discount %...">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_discount_dollar" id="txt_discount_dollar" autocomplete="off" placeholder="Discount $...">
                                    <div class="border"></div>
                                    <button style="min-width: 60px;margin-bottom: 10px;margin-top:10px;" class="btn btn-primary pull-right" name="btnAdd" value="+Add" id="btnAdd" type="submit">Add</button>
                                </div>
                            </div> 
                        </div>
                    </form>

                    <div class="row">
                        <table width="100%" class="table-table" id="tablePromotion">
                            <thead>
                               <th style="width: 20px;">#</th>
                               <th style="width: 150px;">Part#</th>
                               <th width="40%">Item</th>
                               <th style="text-align: center">Discount %</th>
                               <th style="text-align: center">Discount $</th>
                               <th style="text-align: center;width: 80px;">Action</th>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                        
                        
                </div>
                <?php } else {?>
                <div class="panel-heading" style="text-align: left; background-color:#9999;" >
                    
                    <form class="table-form" id="form_promotion_master">
                        <input type="hidden" name="promo_id" id="promo_id">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>From Date<span class="star"></span></label>
                                    <input class="form-control form-custom text_input" type="date" name="from_date" id="from_date">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>From Time<span class="star"> *</span></label>
                                    <input  class="form-control form-custom txt_date" type="time" id="from_time" name="from_time" style="width: 100%;"/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>To Date<span class="star"></span></label>
                                    <input class="form-control form-custom text_input" type="date" name="to_date" id="to_date">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <label>To Time<span class="star"> *</span></label>
                                    <input  class="form-control form-custom txt_date" type="time" id="to_time" name="to_time" style="width: 100%;"/>
                                    
                                </div>
                            </div>

                        </div>
                    
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <label>Promotion<span class="star"> *</span></label>
                                    <input type="text" class="form-control form-custom text_input" name="promo_name" id="promo_name">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <label>Description<span class="star"></span></label>
                                    <textarea rows="1" class="form-control form-custom" name="txtDesc" style="width:100%" id="txtDesc"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <input style="min-width: 60px;margin-top: 38px;" class="btn btn-primary pull-right" name="btnSubmit" id="btnSubmit" type="submit" value="Create" />
                                </div>
                            </div>
                            
                                 
                        </div>
                    </form>
                    
                    <div class="clearfix"></div>

                </div>
                <div class="panel-body">
                    <form id="form_add">
                        <div class="col-md-12">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_part_num" id="txt_part_num" autocomplete="off" placeholder="Part Number..." readonly>
                                    <input type="hidden" name="pro_id" id="pro_id">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="Choose Product..." required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_discount_percen" id="txt_discount_percen" autocomplete="off" placeholder="Discount %...">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input class="form-control form-custom" type="text" name="txt_discount_dollar" id="txt_discount_dollar" autocomplete="off" placeholder="Discount $...">
                                    <div class="border"></div>
                                    <button style="min-width: 60px;margin-bottom: 10px;margin-top:10px;" class="btn btn-primary pull-right" name="btnAdd" value="+Add" id="btnAdd" type="submit">Add</button>
                                </div>
                            </div> 
                        </div>
                    </form>

                    <div class="row">
                        <table width="100%" class="table-table display" id="tablePromotion">
                            <thead>
                               <th style="width: 20px;">#</th>
                               <th style="width: 150px;">Part#</th>
                               <th width="40%">Item</th>
                               <th style="text-align: center">Discount %</th>
                               <th style="text-align: center">Discount $</th>
                               <th style="text-align: center;width: 80px;">Action</th>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                        
                        
                </div>
                <?php } ?>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        function deleteDicount(id) {
            $.ajax({
                type: "post",
                url: '<?php echo site_url() ?>/Promotion/delete_discount_item',
                data: {"pro_id":id},
                success: function (res) {
                    list_promotion_item();
                }
            });
        }
        function list_promotion_item() {
            var promotion_id=$('#promo_id').val();
            if(promotion_id!=''){
                $.ajax({
                type: "get",
                url:"<?php echo site_url() ?>/Promotion/response_list/?promo_id="+promotion_id,
                dataType:"json",
                success: function(res){
                    $('#tablePromotion tbody').html("");
                        $.each(res,function(key,val){
                            var key=key+1;
                            $('#tablePromotion tbody').append('<tr><td style="width: 20px;">'+key+'</td><td style="width: 150px;">'+val.item_detail_part_number+'</td><td width="40%">'+val.item_detail_name+'</td><td style="text-align: center">'+val.p_discount+'</td><td style="text-align: center">'+val.d_discount+'</td><td style="text-align: center;width: 80px;"><a href="javascript:void(0)" onclick="deleteDicount('+val.item_detail_id+');" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a></td></tr>');
                        });
                    }
            });
            }
            
        }
       
        $(document).ready(function() {

            list_promotion_item();
             $('#txt_product_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("supplier/search_supplier"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'products',
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
                    if(!ui.item){
                        $('#txt_part_num').val('');
                        $('#txt_product_name').val('');
                    }
                    else{
                        var names = ui.item.data.split("|");
                        $('#txt_part_num').val(names[5]);
                        $('#pro_id').val(names[1]);
                    }


                }
            });
             $('#txt_part_num').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("supplier/search_supplier"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'part_number',
                            row_num: 1
                        },
                        success: function (data) {
                            response($.map(data, function (item) {
                                var code = item.split("|");
                                return {
                                    label: code[5],
                                    value: code[5],
                                    data: item
                                }
                            }));
                        }
                    });
                },
                autoFocus: true,
                minLength: 0,
                select: function (event, ui) {
                    if(!ui.item){
                        $('#txt_part_num').val('');
                        $('#txt_product_name').val('');
                    }
                    else{
                        var names = ui.item.data.split("|");
                        $('#txt_product_name').val(names[0]);
                        $('#pro_id').val(names[1]);
                    }

                }
            });
            $('#form_promotion_master').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url() ?>/Promotion/save_promotion_master",
                    data: $(this).serialize(),
                    success: function(res){
                        $('#promo_id').val(res);
                        alert("Promotion has saved!");

                    }
                });
            });
            $('#txt_discount_percen').on("keypress",function(){
                parseFloat($('#txt_discount_dollar').val(0));
            });
            $('#txt_discount_dollar').on("keypress",function(){
                parseFloat($('#txt_discount_percen').val(0));
            });

            $('#form_add').on('submit',function(e){
                e.preventDefault();   
                if($('#txt_discount_percen').val()=='') {
                    parseFloat($('#txt_discount_percen').val(0));
                }
                if($('#txt_discount_dollar').val()==''){
                    parseFloat($('#txt_discount_dollar').val(0));
                }            
                var formData = new FormData($("#form_add")[0]);
                formData.append('promo_id',$('#promo_id').val());
                if($('#promo_id').val()!='' && $('#pro_id').val()!=''){
                    $.ajax({
                    type: "post",
                    url: "<?php echo site_url() ?>/Promotion/save_list_promotion",
                    data: formData,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    cache:false,
                    success: function(res){
                       list_promotion_item();
                       $('#form_add')[0].reset();
                        $('#txt_product_name').focus();
                    }
                });
                }
                
            });
        } );
    </script>
</html>
