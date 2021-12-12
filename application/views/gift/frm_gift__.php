<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo site_url("gift/save"); ?>" method="post">    
            <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
                <tr>
                    <td colspan="2" class="form-title"><?php echo "GIFT";?></td>
                </tr>
                <tr>
                    <td colspan="2" class="form-note"></td>
                </tr>
                <tr class="field-title">
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td><?php echo "Name";?><label class="star"> *</label></td>
                    <td class="hidden"><input type="text" name="txt_gift_id" id="txt_gift_id"></td>
                    <td><input type="text" name="txt_gift_name" id="txt_gift_name" required></td>
                </tr>
                <tr>
                    <td><?php echo "Point";?><label class="star"> *</label></td>
                    <td> 
                        <input type="text"  name="txt_point" id="txt_point" class="txt-address" required>
                    </td>
                </tr>
                <tr>
                    <td><?php echo "Picture";?></td>
                    <td> 
                        <input type="file" name="picture" value="PHOTO" onchange="readURL(this,2048,2048,2048000,'blah');" accept="image/*">
                        <img id="blah" src="<?php echo base_url("img/no_images.jpg") ?>" alt="your image" width="200px"/>
                        <input type="text" id="txt_getfile_top" name="txt_getfile_top" value="" class="hidden"/>
                    </td>
                </tr>
                <tr class="field-title">
                    <td colspan="2" style="text-align: right">
                        <button class="btn-srieng" type="submit"><?php echo "Create";?></button>
                        <button class="btn-srieng" type="reset" onclick="back()"><?php echo "Cancel";?></button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url: '<?php echo site_url("gift/load/".$this->session->flashdata('id')); ?>',
                //force to handle it as text
                dataType: "text",
                success: function (data) {
                    //data downloaded so we call parseJSON function 
                    //and pass downloaded data
                    var json = $.parseJSON(data);
                    //now json variable contains data in json format
                    //let's display a few items
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
        });
        $(function () {
            $('form').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);

                var id = $('#txt_gift_id').val();
                var name = $('#txt_gift_name').val();
                var point = $('#txt_point').val();
                
                var formData = new FormData(this);
                formData.append('id',id);
                formData.append('name',name);
                formData.append('point',point);
                
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function () {
                        
                        window.open("<?php echo site_url("gift"); ?>","_self");
                    }
                });
            });
        });
        
    </script>
    <script type="text/javascript">
    function readURL(input,a,b,c,blah) {
        var a=input.files[0];
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                var height = this.height;
                var width = this.width;
                if (height > 2048 || width > 2048 || a.size>2048000) {
                    swal("INPUT ERROR", "Please Input Image size less than 2M,width && height less than 2048px !!!", "error");
                }else{

                    $('#'+blah).attr('src', e.target.result);
                }
            };

            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</html>
