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
        <script>(function (e, t, n) {
                var r = e.querySelectorAll("html")[0];
                r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
            })(document, window, 0);</script>
        <style type="text/css">
            .form-group > label {
                font-size: medium;  
            }
            .form-control{
                font-size: 11px;
            }
            .form-custom{

            }

        </style>
    </head>
    <body>
        <div class="container">
            <form action="<?php echo site_url("item_detail/save"); ?>" method="post" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $item_main_name; ?></div>
                    <div class="panel-body">
                        <div class="col-md-10">
                            <div class="col-sm-3 hidden">
                                <div class="form-group">
                                    <label><?php echo $txt_item_main ?></label>
                                    <input class="form-control form-custom" type="text" name="item_main_id" id="item_main_id" placeholder="Partnumber" value="<?php echo $item_main_id ; ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><?php echo $txt_part_num ?> <?php echo $this->session->flashdata('error'); ?></label>
                                    <input class="form-control form-custom" type="text" name="txt_part_number" id="txt_part_number" placeholder="Partnumber">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="hidden" name="txt_item_id" id="txt_item_id" value="">
                                    <label><?php echo $txt_item_name ?></label>
                                    <input class="form-control form-custom" type="text" name="txt_item_name" id="txt_item_name" placeholder="Item Name" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3 hidden">
                                <div class="form-group">
                                    <label>Whole Sale Price:<span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text" name="txt_item_wholesale" id="txt_item_wholesale" placeholder="Whole Sale Price" value="0">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><?php echo $txt_retail_price ?><span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text" name="txt_item_retailsale" id="txt_item_retailsale" value="0" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><?php echo $txt_cut_stock ?></span></label>
                                    <div class="form-control form-custom">
                                        <input type="checkbox" name="cutstock" id="cutstock" value="1"  onchange="checkstock()">
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3 hidden">
                                <div class="form-group">
                                    <label>Alert Remain:<span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text" value="0" name="txt_remain_alert" id="txt_remain_alert" placeholder="Remain Alert">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><?php echo $txt_measure; ?> <a href="<?php echo site_url("measure/addnew"); ?>"><span id="lbl_new">New</span></a></label>
                                    <select name="cb_measure" id="cb_measure" class="form-control form-custom">
                                        <option value="">--Choose Measure--</option>
                                        <?php
                                        foreach ($measure as $ms) {
                                            ?>
                                            <option value="<?php echo $ms->measure_id ?>"><?php echo $ms->measure_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><?php echo $txt_Print_location ?> <a href="<?php echo site_url("printer_location/addnew"); ?>">New</a></label>
                                    <select name="cbo_printer_location_name" id="cbo_printer_location_name" class="form-control form-custom">
                                        <option value="0">--Printer Location Name--</option>
                                        <?php
                                        foreach ($record_printer_location as $rpl) {
                                            ?>
                                            <option value="<?php echo $rpl->printer_location_id ?>"><?php echo $rpl->printer_location_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <!-- <div class="clearfix"></div> -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><?php echo $txt_description ?></label>
                                    <textarea class="form-control form-custom" type="text"  name="txt_description" id="txt_description"></textarea>
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Color:<span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="color" name="txt_color" id="txt_color">
                                    <div class="border"></div>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-2">
                            <input type="file" name="userfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" accept="image/*" onchange="readURL(this)"/>
                            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span id="img_label">Choose a photo&hellip;</span></label>
                            <input type="text" id="txt_getfile" name="txt_getfile" value="" style="display: none;"/>
                            <input type="text" id="txt_id" name="txt_id" value="" style="display: none;"/>
                            <img id="blah" src="<?php echo base_url("img/no_images.jpg") ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>
                        </div>
                        <div class="panel-footer">
                        <button class="btn btn-sad pull-left" id="btn_save" type="submit"><?php echo $btn_create ?></button>
                        <button class="btn btn-sad pull-left" id="btn_clear" type="reset"><?php echo $btn_clear ?></button>
                        <button class="btn btn-sad pull-left" type="reset" onclick="back_to_item_main()"><?php echo $btn_back ?></button>
                        <div class="clearfix"></div>
                        </div>
                    </div> 
                    </form>
                    <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo $lbl_no;?></th>
                        <th><?php echo $txt_item_type ?></th>
                        <th><?php echo $txt_item_main ?></th>
                        <th><?php echo $txt_part_num ?></th>
                        <th><?php echo $txt_item_name ?></th>
                        <th><?php echo $txt_measure ?></th>
                        <th><?php echo $txt_retail_price ?></th>  
                        <th><?php echo $ingredient ?></th>                 
                        <th><?php echo $txt_create_date ?></th>
                        <th><?php echo $txt_recorder ?></th>
                        <th><?php echo $txt_cut_stock ?></th>
                        <th><?php echo $txt_Print_location ?></th>
                        <th><?php echo $lbl_action ?></th>
                    </tr>
                </thead>
            </table>
                </div>
        </div>
        <script type="text/javascript">
            function checkstock() {
                if ($("#cutstock").is(':checked')) {
                    $("#txt_remain_alert").prop('disabled', false);
                    $('#cb_measure').prop('disabled', false);
                    $('#lbl_new').show();
                } else {
                    $("#txt_remain_alert").prop('disabled', true);
                    $('#cb_measure').prop('disabled', true);
                    $('#lbl_new').hide();
                }
            }
        </script>
    </body>
    <script src="<?= base_url('js/custom-file-input.js') ?>"></script>
</html>
<script type="text/javascript">
    function back_to_item_main(){
            window.open('<?php echo site_url("item_main"); ?>','_self');
        }
    $(document).ready(function () {
        var id=$("#item_main_id").val();
            var table = $('#table-table').DataTable({
                        "scrollCollapse": true,
                        "bProcessing": false,
                        "sAjaxSource": "<?php echo site_url("item_detail/response_by_item_main?id="); ?>"+id,
                        "aoColumns": [
                            {mData: 'item_detail_id'},
                            {mData: 'item_detail_id',render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }},
                            {mData: 'item_type_name'},
                            {mData: 'item_main_name'},
                            {mData: 'item_detail_part_number'},
                            {mData: 'item_detail_name'},
                            {mData: 'measure_name','mRender':function(data){
                                if(data==null){
                                    return 'None';
                                }else{
                                    return data;
                                }
                            }},
                            {mData: 'item_detail_retail_price'},
                            {mData: 'item_type_is_ingredient',mRender:function(data){
                                if(data==1){
                                    return 'Yes';
                                }else{
                                    return 'No';
                                }
                            }},
                            {mData: 'item_detail_created_date'},
                            {mData: 'recorder'},
                            {mData: 'item_detail_cut_stock',mRender:function(data){
                                if(data==0){
                                    return 'No';
                                }else{
                                    return 'Yes';
                                }
                            }},
                            {mData: 'printer_location_name'},
                            { "sDefaultContent": '<a href="#" class="edit"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a href="#" class="delete"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'}
                        ],
                        "iDisplayLength": 5,
                        // "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                        "columnDefs": [
                            {"sClass": "hidden", "aTargets": [0,1,3,9,10]},
                            { "width": "5%", "targets": 13 },
                            { "width": "20%", "targets": 5 }
                        ],
                        "order": [[1, 'asc']],
                        "bLengthChange": false                             
            });


            $('#table-table').on('click', 'td .delete', function (e) {
                        e.preventDefault();
                        var id = $(this).closest('tr').find('td:first').html();
                        var href = '<?php echo site_url("item_detail/delete_by_item_main") ?>' + "/" + id;
                        if (confirm('Do you want to delete this record?')) {
                            $.ajax({
                                url: href,                                
                                success: function () {
                                    table.ajax.reload();
                                    $("#btn_clear").click();  
                                }
                            });                                    
                        }
            });
                    $('#table-table').on('click', 'td .edit', function (e) {
                        e.preventDefault()
                        var id = $(this).closest('tr').find('td:first').html();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("item_detail/load/"); ?>' + '/' + id,
                            data: $('form').serialize(),
                            success: function (data) {
                                var json = $.parseJSON(data);
                                $('#btn_save').text('<?php echo $btn_update; ?>');
                                $('#txt_item_id').val(json.item_detail_id);
                                $('#item_main_id').val(json.item_main_id);
                                $('#txt_part_number').val(json.item_detail_part_number);
                                $('#txt_item_retailsale').val(json.item_detail_retail_price);
                                $('#txt_remain_alert').val(json.item_detail_remain_alert);
                                $('#txt_item_name').val(json.item_detail_name);
                                $('#txt_color').val(json.color);
                                if (json.item_detail_cut_stock == 1) {
                                    $('#cb_measure').prop('disabled', false);
                                    $('#cutstock').prop('checked', true);
                                    $("#txt_remain_alert").show();
                                    // $('#cb_measure').show();
                                    $('#lbl_new').show();
                                } else {
                                    $('#cb_measure').prop('disabled', true);
                                    $('#cutstock').attr('checked', false);
                                    $("#txt_remain_alert").hide();
                                    // $('#cb_measure').hide();
                                    $('#lbl_new').hide();
                                }
                                $('#cb_measure').val(json.measure_id);
                                $('#cbo_printer_location_name').val(json.item_detail_printer_location_id);
                                $('#txt_description').val(json.item_detail_des);

                                if (json.item_type_is_ingredient == 1) {
                                    $('.price').addClass('hidden');
                                    $('.printer').addClass('hidden');


                                } else {
                                    $('.price').removeClass('hidden');
                                    $('.printer').removeClass('hidden');
                                }

                                try {
                                    if (json.item_detail_photo != "" && json.item_detail_photo != null) {
                                        $('#blah').attr('src', "<?php echo base_url("img/products") ?>" + "/" + json.item_detail_photo);
                                    } else {
                                        $('#blah').attr('src', "<?php echo base_url("img/no_images.jpg") ?>");
                                    }

                                } catch (err) {
                                    $('#blah').attr('src', "<?php echo base_url("img/no_images.jpg") ?>");
                                }
                            }
                        });
                    });


            $('#cb_measure').prop('disabled', true);
            
            $("#btn_clear").click(function(){
                var item_main_id=$("#item_main_id").val();
                $("form")[0].reset();
                $("#item_main_id").val(item_main_id);
                $('#blah').attr('src', "<?php echo base_url("img/no_images.jpg") ?>");
                $("#txt_item_id").val("");
                $('#btn_save').text('<?php echo $btn_create; ?>');    
            });

            $('#btn_save').on('click', function () {
                if ($('#selectcustomertype').val() == 0) {
                    $('#selectcustomertype').focus();
                    alert('Item Type Name is not allow empty!!');
                    return false;
                }
                if ($('#txt_item_retailsale').val() < 0) {
                    $('#txt_item_retailsale').focus();
                    alert('Retail Sale Price is not allow less than 0!!');
                    return false;
                }
                if ($("#cutstock").is(':checked')) {
                    if ($('#cb_measure').val() == "") {
                        $('#cb_measure').focus();
                        alert('Purchase Measure is not allow empty!!');
                        return false;
                    }


                }

            });
            $(function () {
                $('form').on('submit', function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'post',
                        url: '<?php echo site_url("item_detail/save"); ?>',
                        data: formData,
                        async: false,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            var value = $.parseJSON(data);
                            if (value.status == 'S001') {
                                    alert(value.message);
                                    table.ajax.reload();
                                    $("#btn_clear").click();                                    
                            } else {
                                alert(value.message);
                            }
                        }
                    });
                });
            });
            
    });
</script>
<script type="text/javascript">
        function readURL(input) {
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
                            $("#img_label").html('Choose a photo&hellip;');

                        }else{
                            $('#blah').attr('src', e.target.result);
                        }


                    };

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL(input) {
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
                            $("#img_label").html('Choose a photo&hellip;');

                        }else{
                            $('#blah').attr('src', e.target.result);
                        }


                    };

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>