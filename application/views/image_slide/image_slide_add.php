     <!---Datatable branch--->        
        <?php                                                                                  
                echo "<a class='btn btn-primary pull-right' href='' id='new_branch' data-toggle='modal' data-target='#myModal' $permission_add><i class='fa fa-plus'></i>New</a>";       
        ?>
        <br>
           <h3 class="text-center text-primary"></h3>
           <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">     
            <thead>
                 <tr>
                    <th>id</th>
                    <th>No</th>  
                    <th>Image Name</th>
                    <th>Image</th>
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
                    "sAjaxSource": "<?php echo site_url('');?>",
                    "aoColumns": [
                        
                          { mData: 'id'},
                           { mData: 'id',render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { mData: 'name'},
                        { mData: 'images',render: function (data, type, row, meta) {
                            return "<img style='height:30px;margin-top:5px;margin-bottom:5px;' src='<?=base_url()?>img/slide/"+data+"'>";
                        }},


                         {"sDefaultContent": '<a data-toggle="modal" class="edit <?php echo $permission_edit; ?>" <?php echo $edit_link;?> ><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete <?php echo $permission_delete; ?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>'},
                    ],

                    "iDisplayLength": 60 ,
                    "order": [[ 1, "asc" ,]],
                        "aoColumnDefs": [
                        { "sClass": "hidden", "aTargets": [0]}
                    ]
                });
                ////////////// Delete /////////////
                $('#table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("") ?>' +"/"+ id;
                                
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
                        var href='<?php echo site_url("") ?>';
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