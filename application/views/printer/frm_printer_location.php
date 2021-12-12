<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript">
    function checkcounter() {
    if ($("#ch_is_counter").is(':checked')) {
    document.getElementById("ch_is_shift").checked= false;
    }
    }
    function checkshift() {
    if($('#ch_is_shift').is(':checked')){
    document.getElementById("ch_is_counter").checked=false;
    }
    }
    </script>
  </head>
  <body>

    <div class="container">
      <form class="form-horizontal" action="<?php echo site_url("printer_location/save");?>"method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
          <div class="panel-heading"><?php echo $lbl_title ?></div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="col-xs-6">
                <div class="form-group">
                  <label><?php echo "Branch"?>:<span class="star"> *</span></label>
                   <select class="form-control form-custom" name="com_branch" id="com_branch" required>
                             <option value="">---Branch---</option>
                             <?php foreach ($branch as  $val) { ?>
                             <option value="<?= $val->branch_id;?>"><?=$val->branch_name;?></option>
                              <?php } ?> 
                      </select>
                       <div class="border"></div>
                  <div class="border"></div>
                </div>
              </div>


              <div class="col-xs-6">
                <div class="form-group">
                  <label><?php echo $lbl_printer_name ?>:<span class="star"> *</span></label>
                  <input class="form-control form-custom text_input" type="text" name="txt_print_location_name" id="txt_print_location_name" required>
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label><?php echo $lbl_printer ?>:</label>
                      <select class="form-control form-custom" name="com_printer" id="com_printer" required>
                             <option value="">---Printer---</option>
                             <?php foreach ($rd_printer as  $v) { ?>
                             <option value="<?= $v->printer_id;?>"><?=$v->printer_name;?></option>
                              <?php } ?> 
                      </select>
                       <div class="border"></div>
                </div>
              </div>

              <div class="col-xs-6" id="g-ip_printer_kitchen">
                  <div class="form-group">
                      <label><?php echo $lbl_printer_kitchent_ip ?>:</label>
                      <input  type="text"  hidden="true" id="txt_id_ip_kitchen" name="txt_id_ip_kitchen">

                      <input class="form-control form-custom text_input" type="text" name="txt_print_ip_kitchen" id="txt_print_ip_kitchen" required>
                      <div class="border"></div>
                  </div>
              </div>

              <div class="col-xs-6">
                <div class="form-group">
                  <label><?php echo $printer_option ?>:</label>
                  <div class="form-control form-custom text_input">
                    <input  type="checkbox" name="ch_is_counter" id="ch_is_counter" value="1" onchange="checkcounter()"><?php echo $lbl_is_counter ?>&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  </div>
                </div>                
                <div class="col-xs-6">
                  <div class="form-group">
                    <label><?php echo $lbl_description ?>:</label>
                    <input class="form-control form-custom text_input" type="text"  name="txt_description" id="txt_description">
                    <div class="border"></div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="panel-footer">
              <button class="btn btn-sad pull-right" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
              <button class="btn btn-sad pull-right" type="submit"><?php echo 'Create' ?></button>
              <div class="clearfix"></div>
            </div>
          </div>
        </form>
      </div>
    </body>
    <script type="text/javascript">
            $(document).ready(function(e){
              var get_id_printer =0;
                  if(get_id_printer ==0){
                       $('#g-ip_printer_kitchen').addClass('hidden');
                 }
            });
            ////////
          $('#com_printer').change(function(event){
             event.preventDefault();
             get_id_printer  =  $('#com_printer').val();
                 if(get_id_printer ==0 ){
                       $('#g-ip_printer_kitchen').addClass('hidden');
                 }else {
                  var href = '<?= site_url("Printer_location/find_printer_by_id")?>'+'/'+get_id_printer;
                    $.ajax({
                      url: href,
                      // data:$(this).serialize(),
                      cache: false,
                      success: function(data){
                           var get = JSON.parse(data);
                          $.each(get, function (index, value) {
                               $('#g-ip_printer_kitchen').removeClass('hidden');
                               $('#txt_id_ip_kitchen').val(value.printer_id);
                               $('#txt_print_ip_kitchen').val(value.printer_print_kitchen);
                          }); 
                      }
                    }); 
                 }
                
           });
    </script>
  </html>