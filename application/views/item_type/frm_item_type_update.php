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
        <?php 
            foreach($record_item_type as $ct){
        ?>
            <form method="POST" action="<?php echo site_url('item_type/update'); ?>" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_title ?></div>
                    <div class="panel-body">
                         <div class="col-md-8">
                             <div class="col-sm-12">
                                 <div class="form-group">
                                    <input type="hidden" name="txt_item_id" id="txt_item_id" value="<?php echo $ct->item_type_id ?>" required>
                                     <label><?php echo $main_cat; ?></label>
                                     <select name="selectcustomertype" id="selectcustomertype" class="form-control form-custom">
                                         <?php
                                            foreach ($records_category as $rc) {
                                                if ($rc->category_id == $ct->category_id) {
                                                    echo "<option selected value='$rc->category_id'>$rc->category_name</option>";
                                                } else {
                                                    echo "<option value='$rc->category_id'>$rc->category_name</option>";
                                                }
                                            }
                                            ?>
                                    </select>
                                     <div class="border"></div>
                                 </div>
                             </div>
                             <div class="col-sm-12">
                                 <div class="form-group">
                                     <label><?php echo $txt_item_type_name ?><span class="star"> *</span></label>
                                     <input class="form-control form-custom text_input" type="text" name="txt_item_typename" id="txt_item_typename" value="<?php echo $ct->item_type_name ?>" required>
                                     <div class="border"></div>
                                 </div>
                             </div>
                             <div class="col-sm-12">
                                 <div class="form-group">
                                     <label><?php echo $txt_is_ingredient ?></label>
                                     <div class="form-control form-custom ">
                                         <?php
                                            if($ct->item_type_is_ingredient==1){
                                        ?>
                                            <input type="checkbox" name="ch_ingredient" id="ch_ingredient" value="1" checked><?php echo $txt_is_ingredient ?>
                                        <?php
                                            }else{
                                        ?>
                                            <input type="checkbox" name="ch_ingredient" id="ch_ingredient" value="1"><?php echo $txt_is_ingredient ?>
                                        <?php
                                            }
                                        ?>
                                     </div>
                                     <div class="border"></div>
                                 </div>
                             </div>
                             <div class="col-sm-12">
                                 <div class="form-group">
                                     <label><?php echo $txt_description ?></label>
                                     <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description" value="<?php echo $ct->item_type_des ?>">
                                     <div class="border"></div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <input type="file" name="userfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" accept="image/*" onchange="readURL(this)"/>
                            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                            <input type="hidden" id="txt_getfile" name="txt_getfile" value="<?php echo  $ct->item_type_photo ?>"/>
                            <img id="blah" src="<?php echo base_url('img/item_type/'.$ct->item_type_photo) ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>
                         </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel?></button>
                        <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>  
            </form>
        <?php } ?>
        </div>
        <script src="<?=base_url('js/custom-file-input.js')?>"></script>
    </body>
</html>
