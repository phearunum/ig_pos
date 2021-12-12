<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function myFunction(){
               $(function() {
                   alert("Export your Data ");
                    $("#table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "Report Customer_card",
                            fileext: ".xls"
                    });
                });
           }
        </script>
    </head>
    <body>
        
        <form action="<?php echo site_url('uploadcsv/import')?>" method="POST" enctype="multipart/form-data">
        
        <div class="modal modal-primary fade user-modal-import " tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><b>ImportCard Number</b></h4>
                          </div>
                          <div class="modal-body primary">
                              <input type="file" id="userfile" name="userfile" style="background-color: #13224B; color:#fff; border:1px solid #fff;" />
                              <!--<input type="file" name="userfile" id="userfile" class="inputfile inputfile-4 hidden" onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple/>-->
                                            <!--<label for="file-5"><figure><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose a file&hellip;</span></label>-->
                          </div>

                          
                          <div class="modal-footer">

                              
                             <input type="hidden" name="id" value="">
                             <button type="Submit" name="import" id="import" class="btn btn-outline">Yes</button>
                            <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
                            
                           
                          </div>

                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                     </form>
                    
        <?php
            foreach($record_permission as $p){
        ?>
        <div class="container-fluid container-fluid-custom">
            <?php if($p->permission_add!=0){ ?><a class="btn btn-primary pull-right" href='<?php echo site_url("customer/addnew_card"); ?>'><i class="fa fa-plus"></i> <?php echo $lbl_new?></a><?php } ?>
            <!--<div class="clearfix"></div>-->
            <h4 class="text-center"><b><?php echo $lbl_title_card; ?></b></h4>
            <table width="100%" cellspacing="0" class="table-table"  id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th><?php echo $lbl_id?></th>
                        <th><?php echo $lbl_cus_name?></th>
                        <th><?php echo $lbl_card_number?></th>
                        <th><?php echo $lbl_card_serial?></th>
                        <th><?php echo "Chip Number"?></th>
                        <th><?php echo $lbl_balance?></th>
                        <th><?php echo "Point"?></th>
                        <th><?php echo $lbl_discount?></th>
                        <th><?php echo "Remaind Alert($)" ?></th>
                        <th><?php echo $lbl_card_expired?></th>
                        <th><?php echo "Card Expire Alert" ?></th>
                        <th ><?php echo $lbl_create_date?></th>
                        <th><?php echo $lbl_create_by?></th>
                        <th class="delete-center" style="width: 100px;"></th>        
                    </tr>
                </thead>
            </table>
        </div>
            <script type="text/javascript">
            $( document ).ready(function() {
                
                $('#table-table').dataTable({
                                 "bProcessing": true,
                                 "sAjaxSource": "<?php echo site_url("customer/response_customer_account/".$cust_id);?>",
                                 "aoColumns": [
                                        { mData: 'customer_acc_id'},
                                        { mData: 'customer_name'},
                                        { mData: 'customer_card_number'},
                                        { mData: 'customer_card_serial'},
                                        { mData: 'customer_chip'}, 
                                        { mData: 'customer_balance'},
                                        { mData: 'customer_point'},
                                        { mData: 'customer_discount'},
                                        { mData: 'customer_amount_remain_alert'},
                                        { mData: 'customer_card_expired'},
                                        { mData: 'customer_card_expired_alert'},
                                        { mData: 'customer_card_created_date'},
                                        { mData: 'customer_created_by'},
                                        {"sTitle": "Action", "sDefaultContent": '<?php if($p->permission_edit!=0){ ?><a href="#" class="edit"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a><?php } ?>&nbsp;&nbsp;<?php if($p->permission_delete!=0){ ?><a href="#" class="delete"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a><?php } ?>' }  
                               ],
                                "iDisplayLength": 50,
                                "order": [[ 0, "desc" ]],
                                "columnDefs":[{"className":"text-center","targets":13}]
                        });
                        
                        $('#table-table').on('click', 'td .delete', function(e) {
                                e.preventDefault()
                              var acc_id = $(this).closest('tr').find('td:first').html();
                                
                              var id=$(this).closest('tr').find('td:nth-child(4)').html();
                     
                                var href='<?php echo site_url("customer/delete_card") ?>' +"/"+ id+"/"+acc_id;
                            //  $('a.delete', $(this)).attr('href', href);
                                if (confirm('Do you want to delete this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }
                                
                        });
                        
                         $('#table-table').on('click', 'td .topup', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                var href='<?php echo site_url("customer/topup") ?>' +"/"+ id;                          
                                window.location.href = href;
                               
                        });
                        
                         $('#table-table').on('click', 'td .edit', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                
                                var href='<?php echo site_url("customer/edit_card_load") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                window.location.href = href;
                        });
                        
                       
                        
                    });

        </script>
        <?php
            }
        ?>
    </body>
</html>
