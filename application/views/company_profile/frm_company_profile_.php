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
    
    <div class="container">
            <div class="container">
            <form class="form-horizontal" action="<?php echo site_url('company_profile/update'); ?>" method="post" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lbl_com_title; ?></div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo $lbl_com_name; ?>:<span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text" name="txt_company_name" id="txt_company_name" value="<?php echo $company_profile_name ?>" required>
                                    <div class="border"></div>
                                    <input type="hidden" name="txt_id" id="txt_id" required value="<?php echo $company_profile_branch_id ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 hidden">
                                <div class="form-group">
                                    <label><?php echo $lbl_com_phone; ?>:</label>
                                    <input class="form-control form-custom" type="text" name="txt_phone" id="txt_phone" value="<?php echo $company_profile_phone ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group hidden">
                                    <label><?php echo $lbl_com_email; ?>:</label>
                                    <input class="form-control form-custom" type="text" name="txt_email" id="txt_email"  value="<?php echo $company_profile_email ?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group hidden">
                                    <label><?php echo $lbl_com_address; ?>:</label>
                                    <input class="form-control form-custom" type="text"  name="txt_address" id="txt_address" value="<?php echo $company_profile_address?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden">
                                <div class="form-group">
                                    <label><?php echo $lbl_wifi; ?>:</label>
                                    <input class="form-control form-custom" type="text"  name="txt_wifi" id="txt_wifi" value="<?php echo $company_profile_wifi?>">
                                    <div class="border"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-4">
                            <input type="file" name="userfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" accept="image/*" onchange="readURL(this)"/>
                            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                            <input type="hidden" id="txt_getfile" name="txt_getfile" value="<?php echo $company_profile_image ?>"/>
                            <input type="hidden" id="txt_id" name="txt_id" value="<?php echo $company_profile_id ?>"/>
                            <?php
                            if($company_profile_image!=""){
                            ?>
                            <img id="blah" name="blah" src="<?php echo base_url('img/company/'.$company_profile_image) ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>
                            <?php
                            }else{
                            ?>
                            <img id="blah" name="blah" src="<?php echo base_url('img/no_image.jpg') ?>" alt="your image"  style="height: 155px;width: 100%;object-fit: contain;"/>
                            <?php
                            }                                
                            ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-footer">
                        <?php                                                                       
                            echo "<button type='submit' class='btn btn-sad pull-right' $permission_edit>$btn_update</button>";      
                        ?>
                        <div class="clearfix"></div>
                    </div>

            </div>
        </form>
    </div>
           <!---Datatable branch--->        
        <?php                                                                                  
                echo "<a class='btn btn-primary pull-right' href='' id='new_branch' data-toggle='modal' data-target='#myModal' $permission_add><i class='fa fa-plus'></i>New</a>";       
        ?>
        <br>
           <h3 class="text-center text-primary"><?php echo $lbl_branch_title?></h3>
           <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">     
            <thead>
                 <tr>
                 
                    <th><?php echo "No"?></th>
                    <th>Branch Name<!-- <?php echo $lbl_branch_name ?> --></th>  
                    <th>Location<!-- <?php echo $lbl_branch_location ?> --></th>
                    <th>Wifi</th>
                   <th>Phone<!-- <?php echo $lbl_branch_phone ?> --></th>
                    <th>Create By<!-- <?php echo $lbl_branch_createby ?> --></th>
                     <th>Modify By</th>
                    <th>Create Date<!-- <?php echo $lbl_branch_createdate ?> --></th> 
                     <th><?php echo "Action" ?></th>            
                </tr>
            </thead>
            <tbody></tbody>
        </table>
           <!------>
    </div>
    <script type="text/javascript">
          $( document ).ready(function() {                            

                $("#new_branch").click(function(){
                     $("#txt_branch_name").val("");
                     $("#txt_branch_phone").val("");
                     $("#txt_branch_address").val("");
                     $("#txt_branch_wifi").val("");
                     $("#txt_company_branch_id").val("");
                     
                     $("#submit").html("Save");
                });

                var table =$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url('branch/responses');?>",
                    "aoColumns": [
                        
                        { mData: 'branch_id'},
                        { mData: 'branch_name'},
                        { mData: 'branch_location'},
                        { mData: 'branch_wifi_password'},
                        { mData: 'branch_phone'},
                        { mData: 'createby'},
                        { mData: 'modifyby'},
                        { mData: 'branch_created_date'},
                         {"sDefaultContent": '<a data-toggle="modal" class="edit <?php echo $permission_edit; ?>" <?php echo $edit_link;?> ><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete <?php echo $permission_delete; ?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'},
                      
                    ],

                    "iDisplayLength": 50 ,
                    "order": [[ 1, "asc" ]],
                });
                ////////////// Delete /////////////
                $('#table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("branch/delete") ?>' +"/"+ id;
                                
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
                        var href='<?php echo site_url("company_profile/edit_load") ?>';
                        $.ajax({
                            type: 'POST',
                            url: href,
                            data: {'branch_id':id},
                            success: function (data) {
                                var json = $.parseJSON(data);

                                $("#txt_branch_name").val(json[0].branch_name);
                                $("#txt_branch_phone").val(json[0].branch_phone);
                                $("#txt_branch_address").val(json[0].branch_location);
                                $("#txt_branch_wifi").val(json[0].branch_wifi_password);
                                $("#submit").html("Update"); 
                                $("#txt_company_branch_id").val(json[0].branch_id);
                                $("#myModal").modal();
                            }
                        });
                    });
                });
    </script>
      <!------Modal------>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-body">
           
          <form class="form-horizontal" action="<?php echo site_url('company_profile/save_branch'); ?>" method="post" enctype="multipart/form-data">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #13224b; color: white;">Branch<!-- <?php echo $lbl_branch_title?> --></div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Branch Name<!-- <?php echo $lbl_branch_name ?> -->:<span class="star"> *</span></label>
                                    <input class="form-control form-custom" type="text" name="txt_branch_name" id="txt_branch_name" value="" required>
                                    <div class="border"></div>
                                    <input hidden="" name="txt_company_branch_id" id="txt_company_branch_id" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone<!-- <?php echo $lbl_branch_phone ?> -->:</label>
                                    <input class="form-control form-custom" type="text" name="txt_branch_phone" id="txt_branch_phone" value="" required>
                                    <div class="border"></div>
                                </div>
                            </div>
                          
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Location<!-- <?php echo $lbl_branch_location ?> -->:</label>
                                    <input class="form-control form-custom" type="text"  name="txt_branch_address" id="txt_branch_address" value="">
                                    <div class="border"></div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Wifi<!-- <?php echo $lbl_branch_location ?> -->:</label>
                                    <input class="form-control form-custom" type="text"  name="txt_branch_wifi" id="txt_branch_wifi" value="">
                                    <div class="border"></div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" id="submit" class="btn btn-primary pull-right">Save</button>
                        <button type="button" class="btn btn-sad pull-right" data-dismiss="modal" >Close</button>
                        <div class="clearfix"></div>

                    </div>

            </div>
        </form>
        </div>
       
      </div>
      
    </div>
  </div>
   
</div>
      <!----------------->
</body>
</html>
