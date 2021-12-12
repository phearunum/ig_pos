<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <title>COMPANY PROFILE</title>
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
        <style type="text/css">
             .wrapper {
                display: inline-block;
                margin-top: 41px;
                padding: 8px;
                min-width: 100%;
                margin-bottom: 80px;
                width: auto;
            }

            .btn-primary {
                color: #ffffff;
                background-color: #007aff;
                border-color: #007aff;
                top: 35px;
                position: relative;
            }

        </style>
        
    </head>
   
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
                    $edit_link='href=""';
                }
                if($value->permission_add=="1"){
                    $permission_add = "";
                    $add_link='href=""';
                }
                if($value->permission_delete=="1"){
                    $permission_delete = "";
                    $delete_link='href=""';
                }                
            }
                            
        ?>
<body>
   <div class="panel panel-default">
     <div class="container">
         <h3 class="text-center text-primary"></h3>       
        <?php                                                                                  
                echo "<a class='btn btn-primary pull-right' href='' id='add-new' data-toggle='modal'  $permission_add><i class='fa fa-plus'></i>New</a>";       
        ?>
    <br>
           <h3 class="text-center text-primary"><?php echo $title;?></h3>
           <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">     
            <thead>
                 <tr>
                 
                    <th>id</th>
                    <th>No</th>  
                    <th>Image Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th><?php echo "Action" ?></th>            
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
   </div>
   <script type="text/javascript">
          $( document ).ready(function() {    

          $('#add-new').click(function(event) {
                  $("#blah").attr("src","<?php echo base_url('img/no_images.jpg')?>");
                 $("#txt_name").val("");
                  $("").val("");
                $("#title").html("Add Image");
                  $("#txt_name").focus(); 
                   $("#submit").html("Save");
                 $("#cancel").html("Close")
                 $("#myModal").modal();
          });   


          $("#edit").click(function(event) {
                 $("#submit").html("Update");
                 $("#cancel").html("Close")
                 $("#myModal").modal();
          });                     

                var table =$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url('Image_slide/response');?>",
                    "aoColumns": [
                        
                        { mData: 'id'},
                        { mData: 'id',render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { mData: 'name'},
                        { mData: 'desc'},
                        { mData: 'images',render: function (data, type, row, meta) {
                            return "<img style='height:30px;margin-top:5px;margin-bottom:5px;' src='<?=base_url()?>img/slide/"+data+"'>";
                        }},
          
                        {"sDefaultContent": '<a data-toggle="modal" id="edit"  class="edit<?php echo $permission_edit; ?>" <?php echo $edit_link;?> ><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete; ?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'},
                      
                    ],

                    "iDisplayLength": 50 ,
                    "order": [[ 1, "asc" ]],
                    "aoColumnDefs": [
                            {"sClass": "hidden", "aTargets": [0]}
                    ],
                });
                ////////////// Delete /////////////
                $('#table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("image_slide/delete") ?>' +"/"+ id;
                                
                            //  $('a.delete', $(this)).attr('href', href);
                                if (confirm('Do you want to delete this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }
                                
                        });
                  ////////////// Edit /////////////////////
                    $('#table-table').on('click', 'td .edit', function(e) {
                        var id = $(this).closest('tr').find('td:first').html();
                        var href='<?php echo site_url("image_slide/edit_load") ?>';
                        $.ajax({
                            type: 'POST',
                            url: href,
                            data: {'id':id},
                            success: function (data) {
                                var json = $.parseJSON(data);

                                $("#txt_id").val(id);
                                $("#txt_name").val(json[0].name);
                                $('#txt_desc').val(json[0].desc);
                                $("#title").html("Update Image");
                                $("#blah").attr("src","<?php echo base_url('img/slide')?>"+'/'+json[0].images);
                                $("#submit").html("Update"); 
                                $("#cancel").html("Close"); 
                                $("#txt_company_branch_id").val(json[0].branch_id);
                                $("#myModal").modal();

                            }
                        });
                    });
                });
    </script>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-body">
           
             <form class="form-horizontal" action="<?php echo site_url('image_slide/save'); ?>" method="post" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 id="title"></h4></div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name:<span class="star"> *</span></label>
                                    <input placeholder="Name" class="form-control form-custom" type="text" name="txt_name" id="txt_name" value="" required>
                                     <label>Description:</label>
                                    <input placeholder="Description" class="form-control form-custom" type="text" name="txt_desc" id="txt_desc" value="">
                                    <div class="border"></div>
                                    <input  class="form-control form-custom hidden" type="" name="txt_id" id="txt_id" value="" placeholder="id">
                                </div>
                            </div>
  
                            <div class="clearfix"></div>
                        </div>

                           <div class="col-md-4">
                             <input type="file" name="userfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" accept="image/*" onchange="readURL(this)"/>

                            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo &hellip;</span></label>

                        <!--     <input type="text" id="txt_getfile" name="txt_getfile" value="" style="display: none;"/>
                            <input type="text" id="txt_id" name="txt_id" value="" style="display: none;"/> -->
                            <img id="blah" src="<?php echo base_url("img/no_images.jpg") ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>
                         </div>


                        <div class="clearfix"></div>


                    </div>
                   <div class="panel-footer">
                        <button class="btn btn-sad pull-right" id="cancel" data-dismiss="modal" class="close" type="reset"></button>
                        <button class="btn btn-sad pull-right" name="submit" type="submit" id="submit"></button>
                        
                        <div class="clearfix"></div>
                    </div>

            </div>
        </form>
        </div>
       
      </div>

      
    </div>
  </div>

   
</div>

</body>

</html>
