<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    // put your code here
    foreach($record_permission as $p){
      foreach($branch as $happy){
    ?>

  <div id="TabLayout" class="container"> 
    
      <ul class="nav nav-tabs">
          
      </ul>

      <div class="tab-content">
          
      <div class="tab-pane fade in hidden" id="tamplate-form">
      <form class="form-horizontal" action="<?php echo site_url("happy_hour/update"); ?>" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
          <div class="panel-heading"><?php echo $pro_title;?></div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo $pro_name;?>:<span class="star"> *</span></label>
                  <input type="hidden" name="txt_branch_id" id="txt_branch_id" value="" required>
                  <input type="hidden" name="txt_id" id="txt_id" value="" required>
                  <input class="form-control  form-custom" type="text" name="txt_name" id="txt_name" value="" required>
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo $pro_from_date;?> :<span class="star"> * </span></label>
                  <input class="form-control form-custom" type="text"  name="txt_from_date" id="txt_from_date" required autocomplete="off">
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo $pro_to_date;?> :<span class="star"> * </span></label>
                  <input class="form-control form-custom" type="text"  name="txt_to_date" id="txt_to_date" required autocomplete="off">
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo $pro_start_time;?> :<span class="star"> * </span></label>
                   <input class="form-control form-custom" type="time"  name="txt_start_time" id="txt_start_time" required value="">
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo $pro_end_time;?> :<span class="star"> * </span></label>
                   <input class="form-control form-custom" type="time"  name="txt_end_time" id="txt_end_time" required value="">
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo $pro_discount;?> :<span class="star"> * </span></label>
                   <input class="form-control form-custom text_input" type="number"  name="txt_discount" id="txt_discount" required value="">
                  <div class="border"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?php echo $pro_desc;?> :<span class="star">  </span></label>
                    <textarea class="form-control form-custom text_input" name="txt_description" id="txt_description"></textarea>
                  <div class="border"></div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-footer">
            <?php if($p->permission_add!=0 || $p->permission_delete!=0){ ?>
                        <button class="btn btn-sad pull-right" type="submit"><?php echo $btn_update?></button>
                    <?php } ?>
                    <div class="clearfix"></div>
          </div>
        </div>
      </form>
    </div>

          
    </div>
      
  </div>


    


    <?php
    }
    }
    ?>
  </body>
  <script type="text/javascript">
  $("#txt_from_date").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
  $("#txt_to_date").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
  $( document ).ready(function() {
      load_happy_hour_tab();
  });


function tabs_click(e){
  $(".tab-pane:eq(1)").attr('id','tabs'+e.getAttribute("name"));
  $("form")[0].reset();
  $("#txt_branch_id").val(e.getAttribute("name"));
  $("#txt_id").val("0");

  var branch_id=$("#txt_branch_id").val();
  
  $.ajax({
            url:'<?php echo site_url('happy_hour/happy_hour_by_branch')?>',
            type:'post',
            data:{'branch_id':branch_id},
            success:function(req){
              var json=JSON.parse(req);                                        
            $.each(json,function(ii,vv){                                    
                        $("#txt_id").val(vv.id);
                        $("#txt_name").val(vv.happy_hour_name);
                        $("#txt_from_date").val(vv.happy_hour_from_date);
                        $("#txt_to_date").val(vv.happy_hour_to_date);
                        $("#txt_start_time").val(vv.happy_hour_start_time);
                        $("#txt_end_time").val(vv.happy_hour_end_time);
                        $("#txt_discount").val(vv.happy_hour_discount);
                        $("#txt_description").val(vv.happy_hour_description);                 
              });              
            }
        });

}
  


  function load_happy_hour_tab(){
        $.ajax({
            url:'<?php echo site_url('happy_hour/load_happy_hour')?>',
            type:'get',
            success:function(req){
              var json=JSON.parse(req);              
              $.each(json.branch_happy_hour,function(i,v){
                    var active_class="";
                    if(i==0){
                        active_class="active";
                    }

                    $(".nav-tabs").append('<li class="'+active_class+'"><a  onclick="tabs_click(this)" data-toggle="tab" href="#tabs'+v.branch_id+'" name="'+v.branch_id+'">'+v.branch_name+'</a></li>');
                    $(".tab-content").append('<div class="tab-pane fade in '+active_class+'" id="tabs'+v.branch_id+'"></div>');
                    if(i==0){
                        $("#tamplate-form").children().appendTo("#tabs"+v.branch_id);                     
                                        
                        $.each(v.happy_hour,function(ii,vv){
                            if(v.branch_id==vv.happy_hour_brand_id){
                              $("#txt_branch_id").val(v.branch_id);
                              $("#txt_id").val(vv.id);
                              $("#txt_name").val(vv.happy_hour_name);
                              $("#txt_from_date").val(vv.happy_hour_from_date);
                              $("#txt_to_date").val(vv.happy_hour_to_date);
                              $("#txt_start_time").val(vv.happy_hour_start_time);
                              $("#txt_end_time").val(vv.happy_hour_end_time);
                              $("#txt_discount").val(vv.happy_hour_discount);
                              $("#txt_description").val(vv.happy_hour_description);
                            }
                        });
                    }                   
              }); 

              $("div.container:eq(1)").hide();
              $("div.container:eq(2)").hide();
              $("div.container:eq(3)").hide();
              $("div.container:eq(4)").hide();
              $("div.container:eq(5)").hide();

            }
        });
  }

  </script>
</html>