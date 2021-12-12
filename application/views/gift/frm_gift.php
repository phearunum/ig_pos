<!DOCTYPE html>
<html lang="en" class="no-js">
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
            <form id="form_gift">
                <div class="panel panel-default">
                    <div class="panel-heading">Gift</div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name:<span class="star"> *</span></label>
                                    <input type="hidden" name="txt_gift_id" id="txt_gift_id">
                                    <input class="form-control form-custom" type="text" name="txt_gift_name" id="txt_gift_name" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Point:<span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text"  name="txt_point" id="txt_point" class="txt-address" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Photo:</label>
                                   <input type="file" name="userfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" accept="image/*" onchange="readURL(this)"/>
                                    <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <img id="blah" src="<?php echo base_url("img/no_images.jpg") ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>
                            <input type="text" id="txt_getfile_top" name="txt_getfile_top" value="" class="hidden"/>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sad pull-right" type="reset" onclick="back()">Cancel</button>
                        <button class="btn btn-sad pull-right" type="submit">Save</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
         <script src="<?=base_url('js/custom-file-input.js')?>"></script>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url: '<?php echo site_url("gift/load/".$this->session->flashdata('id')); ?>',
                //force to handle it as text
                dataType: "text",
                success: function (data) {
                    var json = $.parseJSON(data);
                    $('#txt_gift_id').val(json.gift_id);
                    $('#txt_gift_name').val(json.gift_name);
                    $('#txt_point').val(json.gift_point);                    
                    
                    if(json.gift_image !=""){
                        $('#blah').attr('src', "<?php echo base_url("img/gift") ?>"+"/"+json.gift_image);
                    }else{
                        $('#blah').attr('src', "<?php echo base_url("img/no_images.jpg") ?>");
                    }
                }
            });
            //submit form
            $('#form_gift').submit(function (e) {
                e.preventDefault();                
                var formData = new FormData($(this)[0]);          
                $.ajax({
                    url: '<?php echo site_url("gift/save"); ?>',
                    method:'POST',
                    enctype: 'multipart/form-data',
                    async:false,
                    cache:false,
                    contentType: false,
                    processData: false,
                    data:formData,
                    success: function () {
                        window.open("<?php echo site_url("gift"); ?>","_self");
                    }
                });
            });
        });
        
    </script>
</html>
