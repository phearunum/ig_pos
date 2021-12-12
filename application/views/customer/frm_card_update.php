<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
<body>
    <div class="container">
        <form action="<?php echo site_url('customer/update_card/'); ?>" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $lbl_customer_card;?></div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_cus_name ?>:</label>
                             <?php foreach ($customer_info as $ci){?>
                                <input class="form-control form-custom" type="text" name="txt_customer_name" value="<?php echo $ci->customer_name ?>"id="txt_customer_name" readonly>
                            <?php } ?>
                            <div class="border"></div>
                        </div>
                    </div>
                     <?php foreach ($card_number_record as $cr) { ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_chip ?>:</label>
                            <input class="form-control form-custom" type="text" name="txt_card_chip" id="txt_card_chip" value="<?php echo $cr->customer_chip ?>" required placeholder="Scan Chip Number" autofocus autocomplete="off" onkeypress="if (event.keyCode == 13){return false;}">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_card_number ?>: <span class="star"> *</span> <td><?php echo $this->session->flashdata('error');?></td></label>
                            <input class="form-control form-custom" type="text" name="txt_card_number" id="txt_card_number" placeholder="Card Number"  value="<?php echo $cr->customer_card_number ?>">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_card_serial ?>: </label>
                            <input class="form-control form-custom" type="text" name="txt_card_serial" id="txt_card_serial"  placeholder="Card Serial" value="<?php echo $cr->customer_card_serial ?>">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_card_point ?>: </label>
                            <input class="form-control form-custom" type="text" name="txt_card_point" id="txt_card_point" placeholder="Point" class="allow_decimal" value="<?php echo $cr->customer_point ?>">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_balance ?>: <!--<a href="#" id="topup_balance"><span class="label label-primary"><?php echo $lbl_topup; ?></span></a>--></label>
                            <input class="form-control form-custom" type="text" name="txt_card_balance" id="txt_card_balance" placeholder="Balance($)" class="allow_decimal" value="<?php echo $cr->customer_balance ?>">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_discount ?>: </label>
                            <input class="form-control form-custom" type="text" name="txt_card_discount" id="txt_card_discount" placeholder="Discount(%)" class="allow_decimal" value="<?php echo $cr->customer_discount ?>">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_amount_remain_alert ?>: </label>
                            <input class="form-control form-custom" type="text" name="txt_card_alert" id="txt_card_alert" placeholder="Amount($)" class="allow_decimal" value="<?php echo $cr->customer_amount_remain_alert ?>" >
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_card_expired ?>: </label>
                            <input class="form-control form-custom" type="text" name="txt_card_expired" id="txt_card_expired" required placeholder="yyyy/mm/dd" value="<?php echo $cr->customer_card_expired ?>">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_card_expired_alert ?>: </label>
                            <input class="form-control form-custom" type="text" name="txt_card_expired_alert" id="txt_card_expired_alert" placeholder="Expired Date" value="<?php echo $cr->customer_card_expired_alert; ?>">
                            <div class="border"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><?php echo $lbl_avtivate ?>: </label>
                            <div class="form-control form-custom">
                                <?php
                                $enble = $cr->customer_enable;
                                if ($enble == '1') {
                                    echo '<td><input type="checkbox" name="txt_enable" id="txt_enable" checked></td>';
                                } else {

                                    echo '<td><input type="checkbox" name="txt_enable" id="txt_enable"></td>';
                                }
                                ?>
                            </div>
                            <div class="border"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
                 <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update ?></button>
                 <div class="clearfix"></div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>     



<script type="text/javascript">
            $.noConflict();
            jQuery( document ).ready(function( $ ) {
              
                $("#txt_card_expired").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
                $("#txt_card_expired_alert").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
                document.oncontextmenu = document.body.oncontextmenu = function() {return false;} 
                
            });
            
            $(".allow_decimal").on("input", function(evt) {
                var self = $(this);
                self.val(self.val().replace(/[^0-9\.]/g, ''));
                if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
                {
                  evt.preventDefault();
                }
              });
        </script>
        

<script type="text/javascript">

         $('#txt_card_number').autocomplete({
             
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url("customer/search_cardnumber"); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'customer_card_number',
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
                    $('#txt_card_number').val(names[0]);
                    $('#txt_card_serial').val(names[1]);
                },
                
            });
        </script>              