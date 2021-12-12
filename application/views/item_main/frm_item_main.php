<!DOCTYPE html>
<html  lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <title></title>  
        <script type="text/javascript">
             function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
        <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    </head>
    <body>
        <div class="container">
            <form method="POST" action="<?php echo site_url('item_main/save'); ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_title ?></div>
                    <div class="panel-body">
                         <div class="col-md-8">
                             <div class="col-sm-12">
                                 <div class="form-group">
                                     <label><?php echo $item_type; ?></label>
                                     <select name="selectitmetype" id="selectitmetype" class="form-control form-custom">
                                        <?php
                                        foreach ($records_type as $ct) {
                                            ?>
                                            <option value="<?php echo $ct->item_type_id; ?>"><?php echo $ct->item_type_name;?></option>
                                        <?php } ?>
                                    </select>
                                     <div class="border"></div>
                                 </div>
                             </div>
                             <div class="col-sm-12">
                                 <div class="form-group">
                                     <label id="lb_partnumber"><?php echo $txt_part_number?><span class="star"> *</span></label>
                                     <input class="form-control form-custom" type="text" name="txt_part_number" id="txt_part_number" required>
                                     <div class="border"></div>
                                 </div>
                             </div>
                             <div class="col-sm-12">
                                 <div class="form-group">
                                     <label><?php echo $txt_item_main ?><span class="star"> *</span></label>
                                     <input class="form-control form-custom" type="text" name="txt_item_main_name" id="txt_item_main_name" required>
                                     <div class="border"></div>
                                 </div>
                             </div>
                             <div class="col-sm-12">
                                 <div class="form-group">
                                     <label><?php echo $remain_alert ?></label>
                                     <input class="form-control form-custom" type="text" name="remain_alert" id="remain_alert">
                                     <div class="border"></div>
                                 </div>
                             </div>
                         </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel?></button>
                        <button class="btn btn-sad pull-right" id="submit" type="submit"><?php echo $btn_create?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>  
            </form>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '#submit', function(event) {
                    event.preventDefault();
                    if(check_text_val_empty('txt_part_number')==false || check_text_val_empty('txt_item_main_name')){
                        return false;
                    }
                    var part_number=$('#txt_part_number').val();
                    var item_type=$('#selectitmetype').val();
                    var item_main_name=$('#txt_item_main_name').val();
                    var remain_alert=$('#remain_alert').val();
                    var href='<?php echo site_url("item_main/check_part_number") ?>';
                    $.ajax({
                        type: 'POST',
                        url: href,
                        data: {'part_number':part_number,'type':'New'},
                        success: function (Data) {
                           var json=JSON.parse(Data);
                           
                           if(json[0].count==0){
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo site_url("item_main/save") ?>',
                                data: {'txt_part_number':part_number,'selectitmetype':item_type,'txt_item_main_name':item_main_name,'remain_alert':remain_alert},
                                success: function () {
                                    window.location.href = '<?php echo site_url("item_main"); ?>';
                                }
                            });
                           }
                           else{
                            $('#txt_part_number').addClass('has-error');
                            $('#txt_part_number').after('<span id="spantxt_part_number" style="float:right;" class="label label-danger">Part Number Already Exist!!</span>');
                            setTimeout(function(){ 
                                $('#txt_part_number').removeClass('has-error'); 
                                $('#spantxt_part_number').remove();
                              }, 1000);

                           }
                        }
                    }); 
                });
            });
        </script>
        <script src="<?=base_url('js/custom-file-input.js')?>"></script>
    </body>
</html>
