<style type="text/css">
.floor{
    float: left;
    width: 10%;
    height: 62px;
    padding: 0% 0% 0% 0%;
    background-color: red;
    text-align: center;
    margin: 4px 0px 4px 6px;
    overflow-wrap: break-word;
    color: white;
}
.section-box{
    margin: 0px
}
</style>
<?php 
            $permission_edit = "disabled";
            $permission_add = "disabled";  
            $permission_delete = "disabled";
            $add_link ="";
            $edit_link="";
            $delete_link="";        
            foreach ($record_permission as $key => $value) {                                
                if($value->permission_edit=="1"){
                    $permission_edit = "";
                    $edit_link='href="javascript:void(0)"';
                }
                if($value->permission_add=="1"){
                    $permission_add = "";
                    $add_link='href="javascript:void(0)"';
                }
                if($value->permission_delete=="1"){
                    $permission_delete = "";
                    $delete_link='href="javascript:void(0)"';
                }                
            }
                            
?>
<div class="modal fade" id="model_floor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Floor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label><?php echo "Floor Name" ?><span class="star"> *</span></label>
                    <input class="form-control hidden" type="text" name="txt_floor_id" id="txt_floor_id" > 
                    <input class="form-control" type="text" name="txt_floor_name" id="txt_floor_name" placeholder="Floor Name" required>    
                    
                </div>
            </div>
            <div class="clearfix"> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_save_floor">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="model_table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="col-sm-12 col-md-12">

                <div class="form-group">
                    <label><?php echo "Table Name" ?><span class="star"> *</span></label>
                    <input class="form-control hidden" type="text" name="txt_table_id" id="txt_table_id" > 
                    <input class="form-control" type="text" name="txt_table_name" id="txt_table_name" placeholder="Table Name" required>    
                    
                </div>
                <div class="form-group" id="div_qty">
                    <label><?php echo "Table Qty" ?><span class="star"> *</span></label>
                    
                    <input class="form-control" type="number" name="txt_table_qty" id="txt_table_qty" placeholder="Table Qty" required>    
                    
                </div>
            </div>
            <div class="clearfix"> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_save_table">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div>
    <input type="text" class="hidden" name="txt_branch_id" id="txt_branch_id">
    <input type="text" class="hidden" name="txt_floor_idd" id="txt_floor_idd">
</div>
<div id="TabLayout" class="container"> 
 
</div>
<div id="div_act" class="row " style="margin-left: 10px;">
    
</div>
<div style='overflow: auto; height:76px !important; width: 100%; overflow-x:  hidden;'>
    <table width="100%" height="400px">
        <tr>
            <td style='position: absolute; text-align: center; ' class="container" id="table_layout">
                

                
            </td>
        </tr>
    </table>
</div>
  <script type="text/javascript">
      $(document).ready(function(){
            load_data();
            $('.nav-tabs li').on('click',function(){
               $('#table_layout').html('');
               $('#div_act').html('');
            })
            
      });
      
 

      $('#btn_save_floor').on('click',function(){
            var b_id=$('#txt_branch_id').val();
            var name=$('#txt_floor_name').val();
            var id=$('#txt_floor_id').val();
            if(check_text_val_empty('txt_floor_name')==false){
                return false;
            }else{
              $.ajax({
                  url:'<?php echo site_url('floor_layout/save_floor')?>',
                  type:'post',
                  data:{'id':b_id,'name':name,'f_id':id},
                  success:function(resp){
                      
                      load_data();
                      $('#model_floor').modal('hide');
                  }
              })
            }
            
      })
      
      $('#btn_save_table').on('click',function(){
            var b_id=$('#txt_branch_id').val();
            var name=$('#txt_table_name').val();
            var id=$('#txt_table_id').val();
            var qty=$('#txt_table_qty').val();
            var f_id=$('#txt_floor_idd').val();
            if(id==""){
                if(check_text_val_empty('txt_table_name')==false){
                    return false;
                }
                if(check_text_val_empty('txt_table_qty')==false){
                    return false;
                }
            }else{
                if(check_text_val_empty('txt_table_name')==false){
                    return false;
                }
            }
            $.ajax({
                url:'<?php echo site_url('floor_layout/save_table')?>',
                type:'post',
                data:{'id':b_id,'name':name,'t_id':id,'qty':qty,'f_id':f_id},
                success:function(resp){
                    
                    load_table(b_id,f_id);
                    $('#model_table').modal('hide');
                }
            })
      })
      function draw_update(id){
        var x=$("#txt_x").val();
        var y=$("#txt_y").val();
    
        $.ajax({
                url:'<?php echo site_url('floor_layout/save_draw_table')?>',
                type:'post',
                data:{'id':id,'x':x,'y':y},
                success:function(resp){
                  console.log('ok');
                }
            })
      }
      function clear_floor(){
            $('#txt_branch_id').val('');
            $('#txt_floor_name').val('');
            $('#txt_floor_id').val('');
      }
      function clear_table(){
            $('#txt_branch_id').val('');
            $('#txt_table_name').val('');
            $('#txt_table_id').val('');
            $('#txt_table_qty').val('');
      }
      function show_act(id){
        $(".action-floor"+id+"").toggleClass('hidden'); 
      }
      function show_act_table(id){
        $(".action-table"+id+"").toggleClass('hidden'); 
      }
      function add_floor(branch_id){
        clear_floor();
        $('#txt_branch_id').val(branch_id);
        $('#model_floor').modal('show');
      }
      function edit_floor(id,name,branch_id){
        clear_floor();
        $('#model_floor').modal('show');
        $('#txt_floor_name').val(name);
        $('#txt_floor_id').val(id);
        $('#txt_branch_id').val(branch_id);
      }
      function add_table(branch_id){
        clear_table();
        $('#div_qty').removeClass('hidden');
        $('#txt_branch_id').val(branch_id);
        $('#model_table').modal('show');
      }
      function edit_table(id,name,branch_id){
        clear_table();
        $('#div_qty').addClass('hidden');
        $('#model_table').modal('show');
        $('#txt_table_name').val(name);
        $('#txt_table_id').val(id);
        $('#txt_branch_id').val(branch_id);
      }
      function del_floor(id){
        if(confirm('Are you sure to delete floor?')){
            $.ajax({
                url:'<?php echo site_url('floor_layout/delete_floor')?>',
                type:'post',
                data:{'id':id},
                success:function(re){
                    load_data();
                }
            })
        }
      }
      function del_table(b,id,f){
        if(confirm('Are you sure to delete table?')){
            $.ajax({
                url:'<?php echo site_url('floor_layout/delete_table')?>',
                type:'post',
                data:{'id':id},
                success:function(re){
                    load_table(b,f);
                }
            })
        }
      }
      function load_table(b,f){
        $.ajax({
            url:'<?php echo site_url('floor_layout/load_table')?>',
            type:'post',
            data:{'b':b,'f':f},
            success:function(re){
                var json=JSON.parse(re);
                var html="";
                $.each(json.layout, function( i, v ) {
                   $.each(v.layouts, function( ii, vv ) {
                      html+='<div class="draggable" onClick="draw_update('+vv.layout_id+')" id="'+vv.layout_id+'" style=" width:'+v.table_template_width+'px;cursor: move ;position: absolute;height: '+v.table_template_height+'px;border: solid '+v.table_template_outline_color+' '+v.table_template_outline_width+'px;background-color: '+v.table_template_bg_color+';color: '+v.table_template_fore_color+';font-size: '+v.table_template_font_size+'px;left:'+vv.layout_location_x+'px;top:'+vv.layout_location_y+'px;"> <span><p class="font_khmer">'+vv.layout_name+'</p></span><a <?php if(!$permission_edit=="disabled"){ echo "onClick=\"edit_table('+vv.layout_id+','+\"'\"+vv.layout_name+\"'\"+','+b+')\"";} echo $edit_link; ?> ><i style="color: white;" class="fa fa-edit hidden action-table'+b+'" ></i></a>&nbsp;<a onClick="del_table('+b+','+vv.layout_id+','+f+')" href="javascript:void(0)"><i style="color: white;" class="fa fa-trash-o hidden action-table'+b+'" ></i></a></div>';
                   });
                   
                });
                 var aa='<span style="display: none;">X<input type="text" id="txt_x">Y<input type="text" id="txt_y"></span>'; 
                $('#div_act').html('<div class="col-md-1"><button <?php if(!$permission_add=="disabled"){echo "onClick=\"add_table('+b+')\" ";} echo $permission_add; ?> type="button" name="btn_add_table" class="btn btn-primary btn-block" id="btn_add_table"><i class="fa fa-plus"></i> <?php echo "Table"; ?></button></div><div class="col-md-1"><button onClick="show_act_table('+b+')" type="button" name="btn_edit_table" class="btn btn-primary btn-block" id="btn_edit_table"><i class="fa fa-edit"></i> <?php echo "Table"; ?></button></div>');
                $('#table_layout').html(aa+html);
                $('#txt_floor_idd').val(f);
                $(".draggable" ).draggable({
                drag: function () {
                      var l = $(this).position().left;
                      var t = $(this).position().top;

                      $("#txt_x").val(l);
                      $("#txt_y").val(t);
                  }
              });
            }
        })
      }

      function load_data(){
        $.ajax({
            url:'<?php echo site_url('floor_layout/load_all_layout')?>',
            type:'get',
            async:false,
            success:function(req){

                var json=JSON.parse(req);
                //console.log(json);
                var header="";
                var body="";
                $.each(json.layout,function(i,v){
                    var active_class="";
                    if(i==0){
                        active_class="active";
                    }
                    header+='<li class="'+active_class+'"><a  href="#'+v.branch_id+'" data-toggle="tab">'+v.branch_name+'</a></li>';
                        var floor_all="";
                        $.each(v.floor,function(ii,vv){
                            floor_all+='<div class="floor" onClick="load_table('+v.branch_id+','+vv.floor_id+')"><span>'+vv.floor_name+'</span><br><a <?php if(!$permission_edit=="disabled"){echo "onClick=\"edit_floor('+vv.floor_id+','+\"'\"+vv.floor_name+\"'\"+','+v.branch_id+')\" ";} echo $edit_link; ?> ><i style="color: white;" class="fa fa-edit action-floor'+v.branch_id+' hidden" ></i></a>&nbsp;<a <?php if(!$permission_edit=="disabled"){echo "onClick=\"del_floor('+vv.floor_id+')\"";} echo $delete_link; ?> ><i style="color: white;" class="fa fa-trash-o action-floor'+v.branch_id+' hidden" ></i></a></div>';
                        }); 
                           
                        body+='<div class="tab-pane '+active_class+'" id="'+v.branch_id+'">';
                        body+='<div class="row " style="margin-top:5px;">';
                        body+='<div class="col-md-1"><button <?php echo $permission_add;?> type="button" onClick="add_floor('+v.branch_id+')" name="btn_add_floor" class="btn btn-primary btn-block" id="btn_add_floor'+v.branch_id+'"><i class="fa fa-plus"></i> <?php echo "Floor"; ?></button></div>';
                        body+='<div class="col-md-1"><button type="button" onClick="show_act('+v.branch_id+')" name="btn_edit_floor" class="btn btn-primary btn-block" id="btn_edit_floor'+v.branch_id+'"><i class="fa fa-edit"></i> <?php echo "Floor"; ?></button></div>';
                        body+='</div>';
                        body+='<div class="row "><div class="col-md-12">';
                        
                        body+='<div class="row section-box">'+floor_all+'</div>';
                        body+='</div></div></div>';

                        
                });
                var nav_tab='<ul class="nav nav-tabs">'+header+'</ul>';
                var nav_boday='<div class="tab-content ">'+body+'</div>';
                $('#TabLayout').html(nav_tab+nav_boday);

            }
        });
      }
  </script>




