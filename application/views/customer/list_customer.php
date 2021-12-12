<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function myFunction(){
               $(function() {
                   if(confirm("Do you want to export Data?")){
                        $("#table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "Report Customer",
                            fileext: ".xls"
                        });
                    }
                });
           }
            function clearId(){
                if($("#txt_customer_name").val()===""){
                    $('#txtcustomer_id').val("");
                }
            } 
        </script>
    </head>
    <body>
        <?php echo $this->session->flashdata('message');?>
        <!-- <?php
            foreach($record_permission as $p){
        ?> -->

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

        <div class="container-fluid container-fluid-custom">
            <form class="formSale" id="form">
            <div class="col-md-12">
                <div class="form-group cs-group">
                  <div class="col-sm-2 col-xs-6 col-cs">
                    <input type="text" class="form-control text_input" placeholder="<?php echo $lb_customer; ?>" name="txt_customer_name" id="txt_customer_name" onchange="clearId()" autocomplete="off" autofocus>
                    <input type="hidden" name="txtcustomer_id" id="txtcustomer_id">
                  </div>
                  <div class="col-sm-2 col-xs-6 col-cs">
                    <input type="text" class="form-control text_input" placeholder="<?php echo $lb_chip; ?>" name="txt_card_chip" id="txt_card_chip">
                  </div>
                  <div class="col-sm-2 col-xs-6 col-cs">
                    <input type="text" class="form-control text_input" placeholder="<?php echo $lb_cardnum; ?>" name="txt_card_no" id="txt_card_no">
                  </div>
                  <div class="col-sm-2 col-xs-6 col-cs"> 
                    <input type="text" class="form-control text_input" placeholder="<?php echo $lb_cardser; ?>" name="txt_card_serial" id="txt_card_serial">
                  </div>
                  <div class="col-sm-2 col-xs-6 col-cs">
                    <select name="branch_id" id="branch_id" class="form-control">
                       <option value="0"><?php echo $lb_branch; ?></option>
                        <?php
                            foreach($branch as $b){
                        ?>
                            <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                  </div>
                  <div class="col-sm-1 col-xs-6 col-cs">
                    <input type="submit" class="btn btn-primary btn-block" name="btn_search" id="btn_search" value=" <?php echo $btn_search; ?>">
                  </div>
                <div class="clearfix"></div>
                </div>
            </div>
            </form>
            <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn btn-danger btn-margin pull-right" value="<?php echo $btn_export?>"/>
            <!-- <?php if($p->permission_add!=0){ ?> --><a class="btn btn-primary pull-right <?php echo $permission_add;?>" href='<?php echo site_url("customer/addnew"); ?>'><i class="fa fa-plus"></i> <?php echo $lbl_new?></a><!-- <?php } ?> -->
            <h3 class="text-center"><?php echo $lbl_title; ?></h3>
            <table width="100%" cellspacing="0" class="table-table"  id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th><?php echo $lbl_no?></th>
                        <th><?php echo $lbl_cus_name?></th>
                        <th><?php echo $lbl_cus_chip?></th>
                        <th><?php echo $lbl_gender;?></th>
                        <th><?php echo $lbl_cus_type?></th>
                        <th><?php echo $lbl_address?></th>
                        <th><?php echo $lbl_email;?></th>
                        <th><?php echo $lbl_dob;?></th>
                        <th><?php echo $lbl_phone?></th>
                        <th><?php echo $lbl_branch?></th>
                        <th ><?php echo $lbl_create_date?></th>
                        <th><?php echo $lbl_create_by?></th>
                        <th><?php echo $lbl_enable?></th>
                        <th class="text-center"><?php echo $lbl_action;?></th>
                    </tr>
                </thead>
            </table>
            <script type="text/javascript">
            $( document ).ready(function() {
                var table;
                table=$('#table-table').DataTable({
                                 "bProcessing": true,
                                 "sAjaxSource": "<?php echo site_url("customer/response");?>",
                                 "aoColumns": [
                                        { mData: 'customer_id'},
                                        { mData: 'customer_name'},
                                        { mData: 'customer_chip'},
                                        { mData: 'customer_gender'},
                                        { mData: 'customer_type'},
                                        { mData: 'customer_address'}, 
                                        { mData: 'customer_email'},
                                        { mData: 'customer_dob'},
                                        { mData: 'customer_phone'},
                                        { mData: 'branch_name'},
                                        { mData: 'customer_created_date'},
                                        { mData: 'customer_created_by'},
                                        { mData: 'customer_enable_status'},
                                        {"sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>&nbsp;&nbsp;<?php if($p->permission_delete!=0){ ?><a href="" class="view hidden"><i class="fa fa-eye" aria-hidden="true"></i></a><?php } ?>' }
                                        
                               ], 
                                "iDisplayLength": 50 ,
                                "order": [[ 0, "desc" ]],
                                "columnDefs":[
                                    {"width":"100px","targets" :[10],"className":"text-center"}
                                ]
                        });

                        $('#table-table').on('click', 'td .delete', function(e) {
                            var id = $(this).closest('tr').find('td:first').html();
                                e.preventDefault();
                               
                                var href='<?php echo site_url("customer/delete") ?>' +"/"+ id;
                            //  $('a.delete', $(this)).attr('href', href);
                                if (confirm('Do you want to delete this record?')) {
                                    window.location.href = href;
                                } else {
                                    // Do nothing!
                                }   
                        });
                        
                        
                         $('#table-table').on('click', 'td .edit', function(e) {
                                e.preventDefault()
                                var id = $(this).closest('tr').find('td:first').html();
                                //var acc_id=$(this).closest('tr').find('td:nth-child(9)').html();
                                var href='<?php echo site_url("customer/edit_customer_load") ?>' +"/"+ id;
                                window.location.href = href;
                        });
                        $("#form").on('submit', function (e) {
                            var table=$('#table-table').DataTable();
                            e.preventDefault();
                            var url  = '<?php echo site_url("customer/responses"); ?>';
                            var data = $(this).serialize();
                            table.clear().draw();
                            $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="11" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                            $.getJSON(url, data, function( json )
                            {        
                                table.rows.add(json.aaData).draw();
                            });
                        });
                $('#txt_customer_name').autocomplete({
                    source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                        dataType: "json",
                        data: {
                        name_startsWith: request.term,
                        type: 'customer_table',
                        row_num: 1
                        },
                        success: function (data) {
                            response($.map(data, function (item) {
                                var code = item.split("|");
                                return {
                                    label: code[0],
                                    value: code[0],
                                    data: item
                                }
                            }));
                        }
                    });
                },
                autoFocus: true,
                minLength: 0,
                select: function (event, ui) {
                    var names = ui.item.data.split("|");
                    $('#txtcustomer_id').val(names[1]);
                }
            });
 
                        
                    });
        </script>
        <?php
            }
        ?>
    </div>
    </body>
</html>
