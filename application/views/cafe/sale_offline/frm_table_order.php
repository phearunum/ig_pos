<?php foreach ($permission as $p) {
    if ($p->Cashier == 1) {
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url("css/cafe/calculator.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/numeral/numeral.js');?>"></script>   
		<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script> 		
    </head>    
    <style>
        html,body{overflow-x: hidden;}
        .nav-tabs > li.active > a{
            color : white !important;
            border: 1px solid #13224B;
            border-bottom-width: 0 !important;
            background: #f13232 !important
        }
        .nav-tabs{
            border-bottom: 2px solid #13224B;
        }
        .modal-header{
            border-bottom: 0px;
            background: #13224B;
            color : white;
        }
        .a{
            color : black !important;
            font-size: 20px;
        }
        .nav{
            margin-bottom: 10px !important;
        }
        .label-sear{
            font-family:Khmer OS Battambang !important;
            font-size:18px;
            color: #13224B;
        }
        .input-sear{
            display: block !important;
            border: 1px solid #13224B !important;
            border-radius: 4px !important;
            padding-top: 6px !important;
            padding-bottom: 6px !important;
            font-size: 16px !important;
            vertical-align: middle !important;
            text-align: center !important;
        }
        .td{
            padding-right: 5px;
        }
        .button-sear{
            background-color: #13224B;
            color : white;
        }
        .input-md-9{
            width:100%
        }
        .input-md-5{
            width: 100%; 
        }
        .input-md-5-right{
            width: 100%;
        }
        .input-sear-box{padding-left: 0}
        .button-sear-cal{
            height: 50px !important;
            width: 50px !important;
            border-radius: 10px;
            background-color: #13224B;
            color : white;
            text-align: center;
        }
        .calculator-sear{
            margin: 0 auto;
            padding: 0 0;
            width: 200px;
            background-color: white;
            border-radius: 25px;
            box-shadow: 0px 0px 0px 0px #0000;
        }
        .modal-dialog-lg{
                    width: 80%;
                }
            @media screen and (max-width: 768px) {
                .modal-dialog-lg{
                    width: 100% !important;
                }
            }
        /**/
            .btn-autosize {
              padding: 8px 4px;
              font-size: 12px;
              line-height: 1.5;
              border-radius: 3px;
              background-color: #13224B;
              color : white;
            }
            .form-control{border:1px solid #13224B;}
            .form-control:focus{border:1px solid #13224B;box-shadow: 2px 2px 4px #646496}
            @media screen and (min-width: 768px){
               .btn-autosize {
                padding: 10px 16px;
                font-size: 15px;
                line-height: 1.33;
                border-radius: 6px;
                background-color: #13224B;
                color : white;
              }
            }
            #txt_cash_in_kh,#txt_cash_in_dollar,#txt_cash_in_kh_real,#txt_cash_in_us_real{color: red;text-align: center;font-weight: bold;}
            .row-btn-pc{margin: 10px 0 !important;}
            .btn-setup-pc{background-color: #002166;border-width: 0;color: #fff}
            .btn-setup-pc:hover{background-color: #02153c;color: #fff}
            .btn-setup-pc:active{background-color: #02153c;color: #fff}
            .btn-setup-pc:focus{background-color: #02153c;color: #fff}
            .center-block{margin: auto;}
            .form-control{
                text-align: center;
            }  
            /*Data Table*/
            div.dataTables_wrapper {
                 width: auto;
                margin: 0 auto;
            }
            .dataTables_scrollHeadInner{width: 100% !important}
            .no-footer{min-width: 100% !important}
            table.dataTable tbody tr.selected {
                background-color: #B0BED9;
            }
            table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
                background-color: #f6f6f6;
            }
            table.dataTable.hover tbody tr:hover.selected, table.dataTable.display tbody tr:hover.selected {
                background-color: #aab7d1;
            } 
            *:fullscreen
            *:-ms-fullscreen,
            *:-webkit-full-screen,
            *:-moz-full-screen {
                overflow: auto !important;
            }
              
    </style>
    <body style="background-color: #bcbdbf">
        <div id="div"></div>
        <div id="tab_floor" style="background-color: rgb(61, 107, 128);padding: 2px">
            <div style="display: inline;background-color: white; ">
                 <div id="cashier" class="col-md-6" style="color:white; font-size: 25px; text-align: center;" >Cashier:</div>
                 <div id="cashier_id" hidden=""></div>
                 <div id="sale_date" class="col-md-6" style="color:white; font-size: 25px; text-align: center;">Sale Date:</div>
            </div>;
            <div class="tab" id="floor_template" style="width: 100%;white-space:nowrap;overflow-x: auto;margin:2px auto;">
            </div>
        </div>
        <div id="table_container">
        </div>
        <div class="row row-bottom"></div>
        <div class="row" style="position: fixed;right: 0;left: 0;bottom: 0;background-color: rgb(61, 107, 128);padding: 10px">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4" id="custom_register">
                 <div class="center-block">
                     <button type="button" class="btn btn-block btn-setup-pc" <?php if($p->Customer == 1){ ?> onclick="openModal('modal-customer-list')" id="btn-customer"<?php }else echo "disabled"; ?> >អតិថិជន <br> Customer</button>
                 </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4" id="cash_in">
                <div class="center-block">
                    <button type="button" class="btn btn-block btn-setup-pc" data-toggle="modal" <?php if($p->{'Cash In/Out'} == 1){ ?> data-target="#frm_cash_in_out" <?php }else echo "disabled"; ?> >ដាក់ដកប្រាក់<br>Cash In/Out</button>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                <div class="center-block">
                    <button id="btn-sale-data" type="button" class="btn btn-block btn-setup-pc" data-toggle="modal" <?php if($p->{'Sale Data'} == 1){ ?> data-target="#modal-sale-data" <?php }else echo "disabled"; ?> >ទិន្នន័យលក់<br>Sale Data</button>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                <div class="center-block">
                    <button type="button" class="btn btn-block btn-setup-pc" data-toggle="modal" <?php if($p->{'Extra Item'} == 1){ ?> data-target="#frm_item_note" <?php }else echo "disabled"; ?> >មុខទំនិញបន្ថែម<br>Extra Items</button>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4" >
                <div class="center-block">
                    <button type="button" class="btn btn-block btn-setup-pc" id="update_data" data-toggle="modal" data-target="#">ធ្វើបច្ចុប្បន្នភាព<br>Update Data</button>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                <div class="center-block">
                    <button type="button" id="btn_close" class="btn btn-block btn-setup-pc">ចាកចេញ<br>Logout</button>
                </div>
            </div>
        </div>
        <div class="row">
          <!--   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->

        <!--Modal Customer List--> 
        <div class="modal_form" id="modal-customer-list">
            <div class="modal-dialog modal-dialog-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close btn-close-customer-list" onclick="closeModal('modal-customer-list')" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">CUSTOMER LIST</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-customer-list">
                            <div class="row" style="margin: 10px 0px">                                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <input  type="hidden" id="search_customer_id" name="search_customer_id">
                                    <input class="form-control" type="text" id="search_customer_name" name="search_customer_name" placeholder="CUSTOMER NAME">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <input class="form-control" type="text" id="search_phone_number" name="search_phone_number" placeholder="PHONE NUMBER">
                                </div>                                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <select name="search_customer_branch" id="search_customer_branch" class="form-control">                                                                               
                                    </select>
                                </div> 
                            </div>                           
                            <div class="row" style="margin: 10px 0px">                                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">                                
                                    <input class="form-control" type="text" id="search_card_number" name="search_card_number" placeholder="CARD NUMBER">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                
                                    <input class="form-control" type="text" id="search_card_serail" name="search_card_serail" placeholder="CARD SERAIL">
                                </div>                                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <button type="submit" class="btn btn-default btn-autosize pull-right btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div class="row" style="margin: auto 0">
                            <table id="table-customer-list" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>CustomerID</th>
                                        <th>Customer Type</th>
                                        <th>Customer Name</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Branch</th>
                                        <th>DOB</th>
                                        <th>Address</th>
                                        <th>Card Number</th>
                                        <th>Card Serail</th>
                                        <th>Balance</th>
                                        <th>Discount(%)</th>
                                        <th>Card Expire</th>
                                        <th>Enable</th>
                                        <th>Action</th>                                                    
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-md btn-autosize btn-close-customer-list2" onclick="closeModal('modal-customer-list')">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function load_combo_search_branch(){                 
                $("#search_customer_branch").html("");                                   
                $("#search_customer_branch").append('<option value="0">--All Branch--</option>');
                $.ajax({
                    method:'POST',
                    async: false,
                    url: '<?php echo site_url('customer/load_branch'); ?>',
                    dataType: "json",                                     
                    success: function (data) {
                        $.each(data,function(i,v){
                            $("#search_customer_branch").append('<option value="'+v.branch_id+'">'+v.branch_name+'</option>');
                        });
                    }
                });
            }

            $(document).ready(function(){     
                load_cash();              
                load_customer_combo();
                load_combo_search_branch();
                ///powered by cheang
                $('#frm_cash_in_out').on('show.bs.modal', function () {
                  load_cashier();
                  load_cash();
                })
                $('#frm_item_note').on('show.bs.modal', function () {
                  load_item_note();
                })
            });

                        var table; 
                        function customer_list_response(){
                            table = $('#table-customer-list').DataTable({
                                     "bProcessing": false,
                                     "sAjaxSource": "<?php echo site_url("customer/customer_list_response");?>",
                                     "aoColumns": [
                                         {mData: 'customer_id'},
                                         {mData: 'customer_type_name'},
                                         {mData: 'customer_name'},
                                         {mData: 'customer_gender'},
                                         {mData: 'customer_phone'},
                                         {mData: 'branch_name'},
                                         {mData: 'customer_dob'},
                                         {mData: 'customer_address'},
                                         {mData: 'customer_card_number'},
                                         {mData: 'customer_card_serial'},
                                         {mData: 'customer_balance'},
                                         {mData: 'customer_discount'},
                                         {mData: 'customer_card_expired'},
                                         {mData: 'customer_enable'},                                         
                                         {"sDefaultContent": '<a href="#" class="edit"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;<a href="#" class="delete"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a><a href="" class="view hidden"><i class="fa fa-eye" aria-hidden="true"></i></a>' }                                     
                                   ], 
                                    "iDisplayLength": 10 ,
                                    "order": [[ 0, "desc" ]],
                                    "scrollY": 200,
                                    "scrollX": true,
                                    "paging":   false,
                                    //"ordering": false,
                                    "info":     false,
                                    "searching": false,
                                    "columnDefs":[
                                       {"width":"100px","targets" :[10],"className":"text-center"},
                                       {"sClass": "hidden", "aTargets": [0,6,7]}   
                                    ],
                                    "scrollX": true                     
                            });
                        }



                        $("#btn-customer").click(function() {
                            customer_list_response();
                        });

                        $('#table-customer-list').on('click', 'td .edit', function(e) {
                            if(check_permission("Customer register","permission_edit")==0) return;
                               e.preventDefault();                               
                               var id = $(this).closest('tr').find('td:first').html();                               
                               $.ajax({
                                        method:'POST',
                                        url: '<?php echo site_url('customer/customer_list_by_id'); ?>',
                                        dataType: "json",
                                        async: false,
                                        data:{'customer_id':id},                                     
                                        success: function (data) {
                                            $.each(data,function(i,v){                                
                                                $("#select_customertype").val(v.customer_type_id);
                                                $("#customer_id").val(v.customer_id);
                                                $("#customer_name").val(v.customer_name);
                                                $("#selectgender").val(v.customer_gender);
                                                $("#customer_dob").val(v.customer_dob);
                                                $("#customer_address").val(v.customer_address);
                                                $("#customer_phone").val(v.customer_phone);
                                                $("#customer_email").val(v.customer_email);
                                                $("#select_branch").val(v.customer_branch_id);
                                                $("#img-upload").attr('src',"<?php echo base_url('img/customers/') ?>"+v.customer_picture);
                                                if(v.customer_enable=='Disabled'){
                                                    $("#ckenable").removeAttr('checked');
                                                }else{
                                                    $("#ckenable").attr('checked','');
                                                }
                                                $("#customer_card_number").val(v.customer_card_number);
                                                $("#customer_card_serail").val(v.customer_card_serial);
                                                $("#customer_chip_card").val(v.customer_chip);
                                                if(v.customer_amount_remain_alert!=""){
                                                    $("#customer_amount_alert").val(v.customer_amount_remain_alert);
                                                }
                                                if(v.customer_card_expired!=""){
                                                    $("#customer_card_expire").val(v.customer_card_expired);
                                                }                                                
                                                $("#customer_card_expire_alert").val(v.customer_card_expired_alert);
                                                $("#customer_discount").val(v.customer_discount);                                  
                                                openModal('modal-customer-register');
                                            });                                            
                                        }
                                });
                        }); 

                        $('#table-customer-list').on('click', 'td .delete', function(e) {
                            if(check_permission("Customer register","permission_delete")==0) return;
                               e.preventDefault()
                               setTimeout(function(){
                                var id = $(this).closest('tr').find('td:first').html();
                               swal({
                                        title: "Are you sure?",
                                        text: "You cannot recovery your data when you delete!!!",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonText: "Yes",
                                        cancelButtonText: "No",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                }, function (isConfirm) {
                                    if (isConfirm) {
                                        $.ajax({
                                            method:'POST',
                                            async: false,
                                            url: '<?php echo site_url('customer/delete_customer'); ?>',
                                            dataType: "json",
                                            data:{'customer_id':id},                                     
                                            success: function (data) { 
                                                swal("Deleted!", "The printer you've delete is competeled.", "success");                              
                                                table.destroy();
                                                customer_list_response();
                                            }
                                        }); 
                                        
                                    } else {
                                        swal("Cancelled", "Error Occur while deleting", "error");
                                    }
                                }); 
                               },200);
                               

                               
                        }); 

                        $(".btn-close-customer-list").click(function(){
                            table.destroy();
                        });
                        $(".btn-close-customer-list2").click(function(){
                            table.destroy();
                        });


            $('#search_customer_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                        dataType: "json",
                        async: false,
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
                    minLength: 0
            });

            $('#search_phone_number').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                        dataType: "json",
                        async: false,
                        data: {
                        name_startsWith: request.term,
                        type: 'customer_phone',
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
                    minLength: 0
            });

            $('#search_card_number').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                        dataType: "json",
                        async: false,
                        data: {
                        name_startsWith: request.term,
                        type: 'customer_card_number',
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
                    minLength: 0
            });

            $('#search_card_serail').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                        dataType: "json",
                        async: false,
                        data: {
                        name_startsWith: request.term,
                        type: 'customer_card_serial',
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
                    minLength: 0
            });


        $("#form-customer-list").submit(function(e){
            e.preventDefault();
            
        });

        //AJAX FORM SUBMIT SEARCH
        $("#form-customer-list").on('submit',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var url = '<?php echo site_url("customer/customer_list_responses");?>';
            table.clear().draw();
            $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="17" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
            $.getJSON(url, data, function( json )
            {        
                table.rows.add(json.aaData).draw();
            });
        });
                                                   
        </script>
        <!--End Modal Customer List-->





        <!-- Modal Topup -->
        <div class="modal_form" id="modal-customer-topup">
            <div class="modal-dialog modal-dialog-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close btn-close-customer-topup" onclick="closeModal('modal-customer-topup')" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">CUSTOMER TOPUP</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-customer-topup">                            
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text-info">CUSTOMER & CARD INFO</div>
                            </div>

                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD CHIP<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <input class="form-control hidden" type="text" id="topup_customer_id" name="topup_customer_id">
                                    <input class="form-control" type="password" id="topup_customer_card_chip" name="topup_customer_card_chip" placeholder="SCAN CARD" required>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CUSTOMER NAME<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="topup_customer_name" name="topup_customer_name" disabled>
                                </div>                                       
                            </div> 
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CUMSTOMER TYPE<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="topup_customer_type" name="topup_customer_type" disabled>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">PHONE NUMBER<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="topup_customer_phone_number" name="topup_customer_phone_number" disabled>
                                </div> 
                                                                             
                            </div>    
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD NUMBER<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="topup_customer_card_number" name="topup_customer_card_number" disabled>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD SERAIL<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="topup_customer_card_serail" name="topup_customer_card_serail" disabled>
                                </div> 
                                                                             
                            </div>
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">BRANCH<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="topup_customer_branch" name="topup_customer_branch" disabled>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CURRENT BALANCE<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="topup_customer_balance" name="topup_customer_balance" readonly>
                                </div>                                          
                            </div>                   
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text-info">TOPUP INFO</div>
                            </div>
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">TOPUP AMOUNT<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control number" type="text" id="topup_amount" name="topup_amount" required>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">DISCOUNT (%)<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control number" type="text" id="topup_customer_discount" name="topup_customer_discount">
                                </div>                                          
                            </div>    
                        
                        <div class="clearfix"></div>                      
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default btn-md btn-autosize pull-left" id="btn_topup_reset">CLEAR</button>
                        <button type="submit" class="btn btn-default btn-md btn-autosize pull-left hidden" id="btn_record_topup">RECORD TOPUP</button>                        
                        </form>                    
                        <button type="button" class="btn btn-default btn-md btn-autosize btn-close-customer-topup" onclick="closeModal('modal-customer-topup')">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal Topup -->
        <div class="modal_form" id="modal-customer-return">
            <div class="modal-dialog modal-dialog-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close btn-close-customer-return" onclick="closeModal('modal-customer-return')" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">CUSTOMER RETURN</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-customer-return">                            
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text-info">CUSTOMER & CARD INFO</div>
                            </div>

                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD CHIP<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <input class="form-control hidden" type="text" id="return_customer_id" name="return_customer_id">
                                    <input class="form-control" type="password" id="return_customer_card_chip" name="return_customer_card_chip" placeholder="SCAN CARD" required>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CUSTOMER NAME<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="return_customer_name" name="return_customer_name" disabled>
                                </div>                                       
                            </div> 
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CUMSTOMER TYPE<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="return_customer_type" name="return_customer_type" disabled>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">PHONE NUMBER<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="return_customer_phone_number" name="return_customer_phone_number" disabled>
                                </div> 
                                                                             
                            </div>    
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD NUMBER<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="return_customer_card_number" name="return_customer_card_number" disabled>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD SERAIL<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="return_customer_card_serail" name="return_customer_card_serail" disabled>
                                </div> 
                                                                             
                            </div>
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">BRANCH<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="return_customer_branch" name="return_customer_branch" disabled>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CURRENT BALANCE<span class="pull-right">:</span></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                    <input class="form-control" type="text" id="return_customer_balance" name="return_customer_balance" readonly>
                                </div>                                          
                            </div>                   
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center text-info">RETURN INFO</div>
                            </div>
                            <div class="row" style="margin: 10px 0px;">                                                  
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">RETURN AMOUNT<span class="pull-right">:</span></div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">                                    
                                    <input class="form-control number_return" type="text" id="return_amount" name="return_amount" required>
                                </div>                                        
                            </div>    
                        
                        <div class="clearfix"></div>                      
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default btn-md btn-autosize pull-left" id="btn_return_reset">CLEAR</button>
                        <button type="submit" class="btn btn-default btn-md btn-autosize pull-left hidden" id="btn_record_return">RECORD RETURN</button>                        
                        </form>                    
                        <button type="button" class="btn btn-default btn-md btn-autosize btn-close-customer-return" onclick="closeModal('modal-customer-return')">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.number').keypress(function(event) {
          if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
          }
        });

        $('.number_return').keypress(function(event) {

            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }else{
                if(parseFloat($('#return_amount').val())>parseFloat($('#return_customer_balance').val())){
                    event.preventDefault();
                    $('#return_amount').val(parseFloat($('#return_customer_balance').val()));

                }
            }

        });
        $('.number_return').keyup(function(event) {

            if(parseFloat($('#return_amount').val())>parseFloat($('#return_customer_balance').val())){
                event.preventDefault();
                $('#return_amount').val(parseFloat($('#return_customer_balance').val()));

            }

        });


        $('#topup_customer_card_chip').keypress(function(e) {    
            if(e.which == 13) {
                e.preventDefault();
                var card_chip=$('#topup_customer_card_chip').val();                          
                $.ajax({
                    method:'POST',
                    async: false,
                    url: '<?php echo site_url('card_topup/scan_card'); ?>',
                    dataType: "json",
                    data:{card_chip:card_chip},                                     
                    success: function (data) {

                        var x=0;
                        $.each(data,function(i,v){
                            x++;
                            $("#topup_customer_id").val(v.customer_id);
                            $("#topup_customer_name").val(v.customer_name);
                            $("#topup_customer_type").val(v.customer_type);
                            $("#topup_customer_phone_number").val(v.customer_phone);
                            $("#topup_customer_card_number").val(v.card_number);
                            $("#topup_customer_card_serail").val(v.card_serail);
                            $("#topup_customer_branch").val(v.branch_name);
                            $("#topup_customer_balance").val(v.balance);
                            $("#topup_customer_discount").val(v.discount);
                            $("#topup_customer_card_chip").attr("readonly","readonly");
                            $("#topup_amount").focus();
                            $("#btn_record_topup").removeClass("hidden");
                        });
                        if(x==0){
                            alert("Not found this card in our system!");
                        }

                    }
                });
            }
        });

        $("#btn_topup_reset").click(function(){
            $("#topup_customer_card_chip").removeAttr("readonly");
            $("#topup_customer_card_chip").focus();
            $("#btn_record_topup").addClass("hidden");
        });


        $("form#form-customer-topup").submit(function (e) {
            e.preventDefault();                                    
            var data_sumbit = new FormData($(this)[0]);
            var discount = data_sumbit.get("topup_customer_discount");                                  
            if(!discount==""){
                if(isNaN(discount)){
                   alert("Discount value accept number only.");
                    return;
                }else{
                    if(discount<0 || discount>100){
                        alert("Discount range is 0% to 100%.");
                        return;
                    }
                }
            }

            $.ajax({
                method:'POST',
                url: '<?php echo site_url('card_topup/record_card_topup'); ?>',
                dataType: "json",
                async: false,
                data: data_sumbit,
                cache: false,
                contentType: false,
                processData: false,                                        
                success: function (data) {                                            
                    $("#btn_topup_reset").click();
                    load_data_top_up(data);
                }
            });

        });

        $('#return_customer_card_chip').keypress(function(e) {    
            if(e.which == 13) {
                e.preventDefault();
                var card_chip=$('#return_customer_card_chip').val();                          
                $.ajax({
                    method:'POST',
                    async: false,
                    url: '<?php echo site_url('card_return/scan_card'); ?>',
                    dataType: "json",
                    data:{card_chip:card_chip},                                     
                    success: function (data) {

                        var x=0;
                        $.each(data,function(i,v){
                            x++;
                            $("#return_customer_id").val(v.customer_id);
                            $("#return_customer_name").val(v.customer_name);
                            $("#return_customer_type").val(v.customer_type);
                            $("#return_customer_phone_number").val(v.customer_phone);
                            $("#return_customer_card_number").val(v.card_number);
                            $("#return_customer_card_serail").val(v.card_serail);
                            $("#return_customer_branch").val(v.branch_name);
                            $("#return_customer_balance").val(v.balance);
                            $("#return_customer_discount").val(v.discount);
                            $("#return_customer_card_chip").attr("readonly","readonly");
                            $("#return_amount").focus();
                            $("#btn_record_return").removeClass("hidden");
                        });
                        if(x==0){
                            alert("Not found this card in our system!");
                        }

                    }
                });
            }
        });

        $("#btn_return_reset").click(function(){
            $("#return_customer_card_chip").removeAttr("readonly");
            $("#return_customer_card_chip").focus();
            $("#btn_record_return").addClass("hidden");
        });

        $("form#form-customer-return").submit(function (e) {
            e.preventDefault();                                    
            var data_sumbit = new FormData($(this)[0]);
            var discount = data_sumbit.get("return_customer_discount");                                  
            if(!discount==""){
                if(isNaN(discount)){
                   alert("Discount value accept number only.");
                    return;
                }else{
                    if(discount<0 || discount>100){
                        alert("Discount range is 0% to 100%.");
                        return;
                    }
                }
            }

            $.ajax({
                method:'POST',
                url: '<?php echo site_url('card_return/record_card_return'); ?>',
                dataType: "json",
                async: false,
                data: data_sumbit,
                cache: false,
                contentType: false,
                processData: false,                                        
                success: function (data) {                                            
                    $("#btn_return_reset").click();
                    load_data_return(data);
                }
            });

        });

        function load_data_top_up(t_id){
                var post_url = "<?php echo site_url("card_topup/order_list_topup")?>";
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async:false,
                    data:{"t_id":t_id,},
                    success: function (response) {
                            var json;
                            try {
                                json = $.parseJSON(response);
                            } catch(err){
                                showTost(err.message);
                                return;
                            }
                        $("#div").html('');
                        var item_note = "";
                        var header = "";
                        var data = "";
                        var footer = '';
                        var item ="";
                        header = '<div>';
                        data += '<table style="width: 265px;" id="table_lists" cellpadding="0" cellspacing="0" class="receipt-size">';
                        data+='<tr><td colspan="6" style="text-align: center;"><img width="150px" src="'+json.topup_detail[0].logo+'"/></td></tr>';
                        data+='<tr><td colspan="6" class="comcenter" >'+json.topup_detail[0].com_name+''+'</td></tr>';
                        data+='<tr><td colspan="6" class="headcenter">Tel: '+json.topup_detail[0].branch_phone+'/'+json.topup_detail[0].branch_email+'</td></tr>';
                        data+='<tr><td colspan="6" class="headcenter">Address: '+json.topup_detail[0].branch_location+'</td></tr>';
                        data += '<tr><td colspan="6" class="headleft">Date : '+json.topup_detail[0].transaction_date +'</td></tr>';
                        data+='<tr><td colspan="6" class="headleft">Cashier : '+ json.topup_detail[0].recorder +'</td>';
                        data+='<tr><td colspan="6" class="headcenter">Topup Customer</td></tr>';
                        data += '<tr><td colspan="1" class="table_headcenter">Description</td>';
                        data+='<td colspan="1" class="table_headcenter">Topup</td>';
                        data += '<td colspan="1" class="table_headcenter">Balance</td>';
                        data += '<tr><td colspan="1" class="maincenter">'+json.topup_detail[0].description+'</td><td colspan="1" class="maincenter"">'+json.topup_detail[0].transaction_amount+'</td><td colspan="1" class="maincenter">'+json.topup_detail[0].customer_balance+'</td></tr>'; 
                        data += item;
                        data+='<tr><td colspan="6" class="footcenter">សូមអរគុណ!សូមអញ្ជើញមកម្តងទៀត</td></tr>';
                        data+='<tr><td colspan="6" class="footcenter">'+copy_right+'</td></tr>';
                        data+='</table>';
                        footer += '</div>';
                        $("#div").append(data);
                        myprint1();
                    },
                    error: function (response) {
                        showTost('No items printed!');
                    }
                });
                
            }


            function load_data_return(t_id){
                var post_url = "<?php echo site_url("card_return/order_list_return")?>";
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async:false,
                    data:{"t_id":t_id,},
                    success: function (response) {
                            var json;
                            try {
                                json = $.parseJSON(response);
                            } catch(err){
                                showTost(err.message);
                                return;
                            }
                        $("#div").html('');
                        var item_note = "";
                        var header = "";
                        var data = "";
                        var footer = '';
                        var item ="";
                        header = '<div>';
                        data += '<table style="width: 265px;" id="table_lists" cellpadding="0" cellspacing="0" class="receipt-size">';
                        data+='<tr><td colspan="6" style="text-align: center;"><img width="150px" src="'+json.return_detail[0].logo+'"/></td></tr>';
                        data+='<tr><td colspan="6" class="comcenter" >'+json.return_detail[0].com_name+''+'</td></tr>';
                        data+='<tr><td colspan="6" class="headcenter">Tel: '+json.return_detail[0].branch_phone+'/'+json.return_detail[0].branch_email+'</td></tr>';
                        data+='<tr><td colspan="6" class="headcenter">Address: '+json.return_detail[0].branch_location+'</td></tr>';
                        data += '<tr><td colspan="6" class="headleft">Date : '+json.return_detail[0].transaction_date +'</td></tr>';
                        data+='<tr><td colspan="6" class="headleft">Cashier : '+ json.return_detail[0].recorder +'</td>';
                        data+='<tr><td colspan="6" class="headcenter">Return Customer</td></tr>';
                        data += '<tr><td colspan="1" class="table_headcenter">Description</td>';
                        data+='<td colspan="1" class="table_headcenter">Return</td>';
                        data += '<td colspan="1" class="table_headcenter">Balance</td>';
                        data += '<tr><td colspan="1" class="maincenter">'+json.return_detail[0].description+'</td><td colspan="1" class="maincenter"">'+json.return_detail[0].transaction_amount+'</td><td colspan="1" class="maincenter">'+json.return_detail[0].customer_balance+'</td></tr>'; 
                        data += item;
                        data+='<tr><td colspan="6" class="footcenter">សូមអរគុណ!សូមអញ្ជើញមកម្តងទៀត</td></tr>';
                        data+='<tr><td colspan="6" class="footcenter">'+copy_right+'</td></tr>';
                        data+='</table>';
                        footer += '</div>';
                        $("#div").append(data);
                        myprint1();
                    },
                    error: function (response) {
                        showTost('No items printed!');
                    }
                });
                
            }
            function myprint1(){
                setTimeout(function(){
                var html =` <style> 
                    .comcenter{
                        text-align:center;font-weight: bold;font-size: 17px;font-family: Khmer OS Battambang;
                    }
                    .headleft{
                        text-align:left;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                    }
                    .headright{
                        text-align:right;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                    }
                    .headcenter{
                        text-align:center;font-weight: bold;font-size: 12px;font-family: Khmer OS Battambang;
                    }

                    .table_headleft{
                        text-align:left;border-top: black solid 1px;border-bottom: black solid 1px;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                    }
                    .table_headcenter{
                       color: white;background-color:black;text-align:center;border-top: black solid 1px;border-bottom: black solid 1px;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                    }


                    .mainleft{
                        border-bottom: 0.5px dotted;text-align:left;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                    }
                    .maincenter{
                        border-bottom: 0.5px dotted;text-align:center;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                    }

                    .subright_ftborder{
                        border-top: black solid 1px;text-align:right;text-align:right;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                    }
                    .subright{
                        text-align:right;text-align:right;font-weight: bold;font-size: 10px;font-family: Khmer OS Battambang;
                    }

                    .footcenter{
                        text-align:center;font-weight: bold;font-size:9px;font-family: Khmer OS Battambang;
                    }

                 </style> `+ $("#div").html();

                $("html").empty();
                $("html").append(html);
                window.print();
                    location.reload();
                }, 100);

            }

    });            
    </script>
        <!-- End Modal Topup -->



        <!--Form customer register-->        
        <style type="text/css">
                .modal-dialog-lg{
                    width: 80%;
                }
            @media screen and (max-width: 768px) {
                .modal-dialog-lg{
                    width: 100% !important;
                }                
            }

                /*Toggle Button*/
                .switch {
                  position: relative;
                  display: inline-block;
                  width: 60px;
                  height: 34px;
                }

                .switch input { 
                  opacity: 0;
                  width: 0;
                  height: 0;
                }

                .slider {
                  position: absolute;
                  cursor: pointer;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-color: #ccc;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                .slider:before {
                  position: absolute;
                  content: "";
                  height: 26px;
                  width: 26px;
                  left: 4px;
                  bottom: 4px;
                  background-color: white;
                  -webkit-transition: .4s;
                  transition: .4s;
                }

                input:checked + .slider {
                  background-color: #2196F3;
                }

                input:focus + .slider {
                  box-shadow: 0 0 1px #2196F3;
                }

                input:checked + .slider:before {
                  -webkit-transform: translateX(26px);
                  -ms-transform: translateX(26px);
                  transform: translateX(26px);
                }

                /* Rounded sliders */
                .slider.round {
                  border-radius: 34px;
                }

                .slider.round:before {
                  border-radius: 50%;
                }
                /*End Toggle Button*/

                /*Panel Image Preview*/
                .btn-file {
                    position: relative;
                    overflow: hidden;
                }
                .btn-file input[type=file] {
                    position: absolute;
                    top: 0;
                    right: 0;
                    min-width: 100%;
                    min-height: 100%;
                    font-size: 100px;
                    text-align: right;
                    filter: alpha(opacity=0);
                    opacity: 0;
                    outline: none;
                    background: white;
                    cursor: inherit;
                    display: block;
                }

                .panel-upload{
                    border-style: solid;
                    border-color: blue;
                    border-width: 1px;
                    margin-left: 30px  ;
                }

                #img-upload{
                    width: 150px;
                    height: 100px;                      
                }
                /*End Panel Image Preview*/
        </style>

        <div class="modal_form" id="modal-customer-register">
            <div class="modal-dialog modal-dialog-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="btn-customer-register-close1" onclick="closeModal('modal-customer-register')" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Customer Register</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-customer-register" action="<?php echo site_url('customer/save_customer_with_card'); ?>" method="post" enctype="multipart/form-data">
                        <!-- Tab Panel -->
                        <ul class="nav nav-tabs">                          
                          <li class="active" id="tab_info"><a data-toggle="tab" href="#customer_info">CUSTOMER INFO</a></li>
                          <li id="tab_card"><a data-toggle="tab" href="#customer_card">CARD INFO</a></li>
                        </ul>
                        <div class="tab-content">
                        <!-- Tab Customer Info -->
                          <div id="customer_info" class="tab-pane fade in active">
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CUSTOMER TYPE<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                        <select name="select_customertype" id="select_customertype" class="form-control" required>                                                                               
                                        </select>
                                    </div>                                
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">NAME<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                        <input class="form-control hidden" type="text" id="customer_id" name="register_customer_id">
                                        <input class="form-control" type="text" id="customer_name" name="customer_name" required>
                                    </div>                                                               
                                </div>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">GENDER<span class="pull-right">:</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                
                                      <select name="selectgender" id="selectgender" class="form-control">
                                            <option >Male</option>
                                            <option >Female</option>
                                      </select>
                                    </div>                                
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">DATE OF BIRTH<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                        <input class="form-control form-custom" type="text" name="customer_dob" id="customer_dob"  placeholder="yyyy/mm/dd" autocomplete="off" required>
                                    </div>                                                                                                                                 
                                </div>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">ADDRESS<span class="pull-right">:</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_address" name="customer_address">
                                    </div> 
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">PHONE<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_phone" name="customer_phone" required>
                                    </div>                                                                
                                </div>  
                                                            
                                <div class="row" style="margin: 10px 0px">       
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">EMAIL<span class="pull-right">:</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_email" name="customer_email">
                                    </div>                                
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">BRANCH<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                          
                                        <select name="select_branch" id="select_branch" class="form-control" required>                                         
                                                <option value=""></option>                             
                                        </select>
                                    </div>                                
                                </div> 
                                <div class="row" style="margin: 10px 0px">  

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">IMAGE<span class="pull-right">:</span></div>                               
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                        
                                        <div class="container" style="padding-left: 0">
                                                
                                                    <div class="form-group ">                                           
                                                        <div class="input-group">
                                                            <span class="input-group-btn btn-file panel-upload">                                                            
                                                                    <input type="file" name="imgInp" id="imgInp">
                                                                    <img id='img-upload' src="<?php echo base_url('img/upload-image.png') ?>"/>
                                                            </span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        
                                                    
                                                </div>
                                        </div>                                    
                                    </div> 

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4" style="padding-top: 8px">ENABLE<span class="pull-right">:</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <label class="switch">  
                                            <input name="ckenable" id="ckenable" type="checkbox" checked="true">  
                                            <span class="slider round"></span>
                                        </label>
                                    </div> 
                                                                                  
                                </div>
                          </div>
                          <!--End Tab Customer Info -->
                          <!-- Tab Card Info -->
                          <div id="customer_card" class="tab-pane fade">
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD NUMBER<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_card_number" name="customer_card_number">
                                    </div> 
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD SERAIL<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_card_serail" name="customer_card_serail">
                                    </div>                                                                
                                </div>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD CHIP<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_chip_card" name="customer_chip_card">
                                    </div> 
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">AMOUNT ALERT<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_amount_alert" name="customer_amount_alert" placeholder="">
                                    </div>                                                                
                                </div>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">CARD EXPIRE<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                   
                                        <input class="form-control form-custom" type="text" name="customer_card_expire" id="customer_card_expire"  placeholder="yyyy/mm/dd" autocomplete="off">
                                    </div> 
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">EXPIRE ALERT<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control form-custom" type="text" name="customer_card_expire_alert" id="customer_card_expire_alert"  placeholder="yyyy/mm/dd" autocomplete="off">
                                    </div>                                                                
                                </div>
                                <div class="row" style="margin: 10px 0px">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8"></div> 
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">DISCOUNT<span class="pull-right">:</span><span class="star">*</span></div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">                                    
                                        <input class="form-control" type="text" id="customer_discount" name="customer_discount" placeholder="% Discount">
                                    </div>                                                                
                                </div> 
                          </div>
                          <!-- End Tab Card Info -->                          
                        </div>
                        <!--End Tab Panel -->
                            
                            <div class="row" style="margin: 10px 0px">      
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" id="btn_customer_register" class="btn btn-default btn-md btn-autosize pull-right">Save</button>
                                </div>                  
                            </div>                           
                        </form>
                        <div class="clearfix"></div>                                    
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn btn-default btn-md btn-autosize" onclick="closeModal('modal-customer-register')" style="background-color: #870413;" id="btn-customer-register-close2">Close</button>
                    </div>
                </div>
            </div>
        </div> 
        <script type="text/javascript">
            $(document).ready( function() {                 
                $("#customer_dob").datepicker({dateFormat: 'yy/mm/dd', showButtonPanel: true});
                $("#customer_card_expire").datepicker({dateFormat: 'yy/mm/dd', showButtonPanel: true});
                $("#customer_card_expire_alert").datepicker({dateFormat: 'yy/mm/dd', showButtonPanel: true});                                   
                                $(document).on('change', '.btn-file :file', function() {
                                    var input = $(this),
                                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                                        input.trigger('fileselect', [label]);
                                });

                                $('.btn-file :file').on('fileselect', function(event, label) {
                                        
                                        var input = $(this).parents('.input-group').find(':text'),
                                            log = label;
                                        
                                        if( input.length ) {
                                            input.val(log);
                                        } else {
                                            if( log ) alert(log);
                                        }
                                    
                                });
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            
                                            reader.onload = function (e) {
                                                $('#img-upload').attr('src', e.target.result);
                                            }
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    $("#imgInp").change(function(){
                                        readURL(this);
                                    });     
                                });
                                
                                $("#btn_customer_register").click(function(e){
                                    var card_num = $("#customer_card_number").val();
                                    if(card_num!=""){
                                        $("#customer_card_serail").attr("required","");
                                        $("#customer_chip_card").attr("required","");
                                        $("#customer_card_expire").attr("required","");
                                        $("#customer_amount_alert").attr("required","");
                                        $("#customer_card_expire_alert").attr("required","");
                                                                               
                                    }else{
                                        $("#customer_card_serail").removeAttr("required");
                                        $("#customer_chip_card").removeAttr("required");
                                        $("#customer_card_expire").removeAttr("required");
                                        $("#customer_amount_alert").removeAttr("required");
                                        $("#customer_card_expire_alert").removeAttr("required");
                                    }
                                });

                                $("form#form-customer-register").submit(function (e) {
                                    e.preventDefault();                                    
                                    var data_sumbit = new FormData($(this)[0]);
                                    var discount = data_sumbit.get("customer_discount");                                  
                                    if(!discount==""){
                                        if(isNaN(discount)){
                                            alert("Discount value accept number only.");
                                            return;
                                        }else{
                                            if(discount<0 || discount>100){
                                                alert("Discount range is 0% to 100%.");
                                                return;
                                            }
                                        }
                                    }

                                    $.ajax({
                                        method:'POST',
                                        url: '<?php echo site_url('customer/save_customer_with_card'); ?>',
                                        dataType: "json",
                                        data: data_sumbit,
                                        async: false,
                                        cache: false,
                                        contentType: false,
                                        processData: false,                                        
                                        success: function (data) {                                            
                                            document.getElementById("btn-customer-register-close2").click();
                                            table.destroy();
                                            customer_list_response();
                                            document.getElementById("form-customer-register").reset();
                                        }
                                    });
                                });

                                $("#btn_new_customer").click(function(e){
                                    load_customer_combo();
                                    $("#ckenable").attr('checked','');
                                });

                                function load_customer_combo(){ 
                                    $("#select_customertype").html("");
                                    $("#select_branch").html("");                                   
                                    $.ajax({
                                        method:'POST',
                                        async: false,
                                        url: '<?php echo site_url('customer/load_customer_type'); ?>',
                                        dataType: "json",                                     
                                        success: function (data) {
                                            $.each(data,function(i,v){
                                                $("#select_customertype").append('<option value="'+v.customer_type_id+'">'+v.customer_type_name+'</option>');
                                            });
                                        }
                                    });
                                    $.ajax({
                                        method:'POST',
                                        async: false,
                                        url: '<?php echo site_url('customer/load_branch'); ?>',
                                        dataType: "json",                                     
                                        success: function (data) {
                                            $.each(data,function(i,v){
                                                $("#select_branch").append('<option value="'+v.branch_id+'">'+v.branch_name+'</option>');
                                            });
                                        }
                                    });
                                }

                                $("#btn-customer-register-close1").click(function(){
                                    document.getElementById("form-customer-register").reset();
                                    document.getElementById("img-upload").setAttribute("src","<?php echo base_url('img/upload-image.png') ?>");
                                    document.getElementById("tab_info").setAttribute("class","disactive");
                                    document.getElementById("tab_card").setAttribute("class","disactive");
                                    document.getElementById("tab_info").setAttribute("class","active"); 
                                    $("#customer_info").removeClass("active"); 
                                    $("#customer_card").removeClass("active"); 
                                    $("#customer_info").addClass("in active");
                                });
                                $("#btn-customer-register-close2").click(function(){
                                    document.getElementById("form-customer-register").reset();
                                    document.getElementById("img-upload").setAttribute("src","<?php echo base_url('img/upload-image.png') ?>");
                                    document.getElementById("tab_info").setAttribute("class","disactive");
                                    document.getElementById("tab_card").setAttribute("class","disactive");
                                    document.getElementById("tab_info").setAttribute("class","active"); 
                                    $("#customer_info").removeClass("active"); 
                                    $("#customer_card").removeClass("active"); 
                                    $("#customer_info").addClass("in active");
                                }); 

                        </script>      
        <!--End Form customer register-->
                
        <!-- CASH IN & OUT FORM-->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="modal fade" id="frm_cash_in_out" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content" style="width: max-content">
                        <div class="modal-header" style="background-color: #13224B;">
                            <h3 class="modal-title" style="text-align: center;color: white;">CASH IN & OUT FORM</h3>
                        </div>
                        <div class="modal-body" >
                            <input type="text" hidden value=0 name="cash_id" id="cash_id">
                            <div class="col-lg-8 col-md-8 col-sm-8"> 
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">Cashier </label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <select class="form-control" id="txt_cashier">
                                        </select>
                                    </div>
                                </div>​
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">Sale Date </label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                         <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="date" id="date" autocomplete="off">
                                    </div>
                                </div>​
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">ប្រាក់រៀល </label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <input class="form-control" id="txt_cash_in_kh" placeholder="បញ្ចូលចំនួនទឹកប្រាក់ជារៀល" trigger="calculate" onclick="click_khmer()" style="width:100%">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">ដុល្លា</label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <input class="form-control" id="txt_cash_in_dollar" placeholder="បញ្ចូលចំនួនទឹកប្រាក់ជាដុល្លា" trigger="calculate" onclick="click_dollar()" style="width:100%">
                                    </div>
                                </div>
                                <div hidden id="txt_cash_in_kh_real_div" class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">លុយពិត(រៀល)</label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <input class="form-control" id="txt_cash_in_kh_real" placeholder="បញ្ចូលចំនួនទឹកប្រាក់ជារៀល" type="number" trigger="calculate" onclick="click_khmer_real()" style="width:100%">
                                    </div>
                                </div>
                                <div hidden id="txt_cash_in_us_real_div" class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">លុយពិត(ដុល្លា) </label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <input class="form-control" id="txt_cash_in_us_real" placeholder="បញ្ចូលចំនួនទឹកប្រាក់ជាដុល្លា" type="number" trigger="calculate" onclick="click_dollar_real()" style="width:100%">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <button class="btn btn-default btn-autosize" type="submit" name="btn_save_cash" id="btn_save_cash">CASH IN</button>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-center">
                                        <button class="btn btn-default btn-autosize" name="btn_cash_out" id="btn_cash_out">CASH OUT</button>
                                    </div>
                                    
                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                                        <button class="btn btn-default btn-autosize pull-right" data-dismiss="modal" id="btn_cancel">CANCEL</button>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4"> 
                                <div class="calculator calculator-sear  col-md-4 col-sm-4">
                                    <div class="calc-row hidden">
                                        <input class="input-sear screen" id="test" name="test" type="text" placeholder="" value="">
                                    </div>
                                    <div class="calc-row" style="margin-top:5px;" >
                                        <input type="button" class="button button-sear-cal trigger-sear" onclick="get_cash_amount(this.value)" style="width:180px !important;" value ="C">
                                    </div>
                                    <div class="calc-row" style="height:58px;">
                                        <input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="7" ><input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="8" ><input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="9">
                                    </div>
                                    <div class="calc-row" style="height:58px;">
                                        <input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="4" ><input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="5" ><input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="6">
                                    </div>
                                    <div class="calc-row" style="height:58px;">
                                        <input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="1" ><input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="2" ><input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="3" >
                                    </div>
                                    <div class="calc-row" style="height:58px;">
                                        <input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;width:116px !important;" onclick="get_cash_amount(this.value)" value ="0" ><input type="button" class="button button-sear-cal trigger-sear" style="margin: 8px;" onclick="get_cash_amount(this.value)" value ="." >
                                    </div>
                                </div> 
                            </div>
                            <div class="clearfix"></div>    
                        </div> 
                  </div>
                </div>
            </div>
        </div> 
        <!--SETUP ITEM NOTE-->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="modal fade" id="frm_item_note" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header" style="background-color: #13224B;">
                            <h3 class="modal-title" style="text-align: center;color: white;">SETUP ITEM NOTE</h3>
                        </div>
                        <div class="modal-body" >
                            <div class="col-lg-12 col-md-12 col-sm-12"> 
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">មុខទំនិញបន្ថែម / Extra Items</label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <input class="hidden" id="txt_item_id" name="txt_item_id">
                                        <input class="form-control" id="txt_item_name" placeholder="ឈ្មោះទំនិញ / Item Name " required style="width:100%">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">តម្លៃ​ / Price</label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <input class="form-control" id="txt_price" placeholder="បញ្ចូលតម្លៃ / Enter the amount in dollar" required style="width:100%">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label class="label-sear">បរិយាយ / Description</label>
                                    </div>
                                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                                        <textarea class="form-control" id="txt_description" rows="4"  placeholder="បរិយាយ / Description" style="width:100%"></textarea>
                                    </div>
                                </div>
                                <div class="row pull-right" style="margin: 10px 0">
                                    <button class="btn btn-default btn-md btn-autosize" id="btn_new">NEW</button>
                                    <button class="btn btn-default btn-md btn-autosize" id="btn_save_item_note">SAVE</button>
                                    <button class="btn btn-default btn-md btn-autosize" id="btn_delete_item_note">DELETE</button>
                                    <button class="btn btn-default btn-md btn-autosize" data-dismiss="modal">CLOSE</button>
                                </div>
                                <table id="table-item-note" class="display nowrap" cellspacing="0" width="100%">
                                <thead style="display: relative">
                                    <tr>
                                        <th class="hidden">ID</th>
                                        <th class="items">Item Name</th>
                                        <th class="items">Price($)</th>
                                        <th class="items">Description</th>
                                    </tr>
                                </thead>
                                <tbody id="item_note">
                                                                  
                                </tbody>
                            </table>
                             <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#table-item-note').DataTable({
                                        "scrollY": 200,
                                        "scrollX": true,
                                        "paging":   false,
                                        "ordering": false,
                                        "info":     false,
                                        "searching": false,
                                        "bAutoWidth": false , 
                                        aoColumns : [
                                              { "sWidth": "0%"},
                                              { "sWidth": "25%"},
                                              { "sWidth": "15%"},
                                              { "sWidth": "60%"}
                                            ]
                                    });
                                    //
                                    var tableitem = $('#table-item-note').DataTable();
                                     $('#table-item-note tbody').on( 'click', 'tr', function () {
                                        if ( $(this).hasClass('selected') ) {
                                            $(this).removeClass('selected');
                                            $('#btn_save_item_note').html('SAVE');
                                        }
                                        else {
                                            $('#table-item-note tbody tr.selected').removeClass('selected');
                                            $(this).addClass('selected');
                                            $('#btn_save_item_note').html('UPDATE');
                                        }
                                    });
                                });
                        </script>
                            </div>
                            
                            <div class="clearfix"></div>    
                        </div> 
                  </div>
                </div>
            </div>
        </div>
        <!--Modal Data Sale--> 
        <style type="text/css">
                .modal-dialog-lg{
                    width: 80%;
                }
            @media screen and (max-width: 768px) {
                .modal-dialog-lg{
                    width: 100% !important;
                }
            }
        </style>
        <div class="modal fade" id="modal-sale-data">
            <div class="modal-dialog modal-dialog-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Sale Data</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form-SaleData">
                            <div class="row" style="margin: 10px 0px">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">From</div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8"><input class="form-control" type="date" id="date_from" name="date_from"></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">To</div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8"><input class="form-control" type="date" id="date_to" name="date_to"></div>
                            </div>
                            <div class="row" style="margin: 10px 0px">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">Customer</div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <input type="hidden" id="txt_master_id" name="">
                                    <input  type="hidden" id="txt_customer_id" name="txt_customer_id">
                                    <input class="form-control" type="text" id="txt_customer_name" name="txt_customer_name">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                    <button type="submit" class="btn btn-default btn-autosize pull-right btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div class="row" style="margin: auto 0">
                            <table id="DataSale" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>MasterId</th>
                                        <th>Invoice</th>
                                        <th>Table</th>
                                        <th>Cashier</th>
                                        <th>Customer</th>
                                        <th>Start</th>
                                        <th>Stop</th>
                                        <th>Sub Total</th>
                                        <th>Total Discount</th>
                                        <th>Tax</th>
                                        <th>Grand Total</th>
                                        <th>Pay USD</th>
                                        <th>Pay KHM</th>
                                        <th>Other Card</th>
                                        <th>Other Card Amount</th>
                                        <th>Member Pay</th>
                                    </tr>
                                </thead>
                                <tbody id="sale_data">
                                                                  
                                </tbody>
                            </table>
                        </div>
                        <script type="text/javascript">
                            var SaleData;
							var socket = io.connect('http://localhost:4000');
                                $(document).ready(function() {
									socket.emit('dis_welcome',{
                                        status:'none'
                                    });
                                    $('#modal-sale-data').on('show.bs.modal', function (e) {
                                        SaleData = $('#DataSale').DataTable({
                                            "bProcessing": false,
                                            "sAjaxSource": '<?php echo site_url("table_order/load_sale_data"); ?>',
                                            "aoColumns": [
                                                {mData: 'sale_master_id'},
                                                {mData: 'invoice_no'},
                                                {mData: 'table_name'},
                                                {mData: 'cashier'},
                                                {mData: 'customer_name'},
                                                {mData: 'checkin_date'},
                                                {mData: 'checkout_date'},
                                                {mData: 'SubTotal'},
                                                {mData: 'discount'},
                                                {mData: 'tax'},
                                                {mData: 'grandtotal'},
                                                {mData: 'sale_master_pay_us'},
                                                {mData: 'sale_master_pay_kh'},
                                                {mData: 'acc_type'},
                                                {mData: 'other_card_pay'},
                                                {mData: 'member_pay'}
                                            ],
                                            "scrollY": 200,
                                            "scrollX": true,
                                            "paging":   false,
                                            "ordering": false,
                                            "info":     false,
                                            "searching": false,
                                            "aoColumnDefs": [{"sClass": "hidden", "aTargets": [0]}]
                                        });
                                        //
                                    })
                                    //
                                    $('#modal-sale-data').on('shown.bs.modal', function (e) {
                                         $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
                                    });
                                    $('#modal-sale-data').on('hidden.bs.modal', function (e) {
                                        SaleData.destroy();
                                    });
                                    //
                                    $("#form-SaleData").on('submit',function(e){
                                     e.preventDefault();
                                     var data = $(this).serialize();
                                        var url = '<?php echo site_url("table_order/load_sale_datas"); ?>';
                                        SaleData.clear().draw();
                                        $(SaleData.table().body()).html('<tr class="odd"><td valign="top" colspan="15" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                                        $.getJSON(url, data, function( json )
                                        {        
                                            SaleData.rows.add(json.aaData).draw();
                                        });
                                    });
                                   // var tableother = $('#DataSale').DataTable();
                                     $('#DataSale tbody').on('click', 'tr', function () {
                                        if ($(this).hasClass('selected') ) {
                                            $(this).removeClass('selected');
                                        }
                                        else{
                                            $('#DataSale tbody tr.selected').removeClass('selected');
                                            $(this).addClass('selected');
                                            var id=$(this).closest('tr').find('td:first').html();
                                            $("#txt_master_id").val(id);
                                        }
                                    });
                                });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-md btn-autosize" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal Data Sale--> 
        <!--Form Split invoice-->
        <div id="frm_split_invoice" class="modal_form">
            <div class="modal-content-form">
                <div class="modal-header-form">
                    <span class="close_form" onclick="closeModal('frm_split_invoice')">X</span>
                </div>
                <div class="vertical_tab" id="frm_split_table_invoice" style="width: 20%;">

                </div>
                <div class="vertical_tabcontent" id="frm_split_invoice_data_order" style="width: 80%;padding: 0px;">
                
                    <div id="frm_merge_table_data_order" class="vertical_tabcontent" style="width: 100%; padding: 0px 5px;">
                    <table id="table_marge_list" class="table-table-form_order" style="width: 100%;">
                        <thead style="width: 100%;">
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Note</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>%</th>
                            <th>$</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

                </div>
                <div class="modal-footer" id="frm_split_invoice_footer" style="font-size:25px;">
                    
                </div>
            </div>
        </div>
        <!--End Form Split Invoice-->
    </body>
    <!-- hak print -->
    <script type="text/javascript">

        function load_data_cash_out(cash_id){
            var post_url = "<?php echo site_url("sale_offline/order_list_cash_out")?>";
            var real_kh=$("#txt_cash_in_kh_real").val();
            var real_us=$("#txt_cash_in_us_real").val();
            $.ajax({
                type: 'POST',
                url: post_url,
                async:false,
                data:{"cash_id":cash_id,'real_kh':real_kh,'real_us':real_us},
                success: function (response) {
                    $('#frm_cash_in_out').modal('hide');
                    load_cash();
                },
                error: function (response) {
                    showTost('No items printed!');
                }
            });
            
        }
    
    </script>

    <script language="javascript">
        var func='';
        var result = 0;
        var prevEntry = 0;
        var operation = null;
        var currentEntry = '0';
        $(document).ready(function (e) {


            $('#btn_close').on('click',function(evt){
                window.open("<?php echo site_url("logout"); ?>",'_self');
            });

            $('#btn_print').on('click',function(evt){
                var master_id_temp=$('#DataSale tbody tr.selected').find('td').eq(0).html();
                if(master_id_temp!=null){
                    load_data(master_id_temp);
                }
            });
            $("#toggle-nav").click();
            load_table_floor_layout();
            $("#txt_cash_in_kh").focus();
            $('#txt_customer_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('retail_sale/searchcustomer') ?>',
                        dataType: "json",
                        async: false,
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
                    $('#txt_customer_id').val(names[1]);
                }
            });
            //
            $("#txt_customer_name").on('blur', function() {
                if($(this).val()=="")
                    $('#txt_customer_id').val("");
            });
            //alert('finish');
        });

        //SEA

        $('.button').on('click', function (evt) {
            var buttonPressed = $(this).val();
            console.log(buttonPressed);

            $('.button').removeClass('selected');
            $(this).addClass('selected');
            //
            if (buttonPressed === "C") {
                result = 0;
                currentEntry = '0';
            } else if (buttonPressed === "CE") {
                currentEntry = '0';
            } else if (buttonPressed === "Note") {
                get_category_name("Item Note");
                load_item_note();

            } else if (buttonPressed === "Qty") {
                func='qty';
                result = 0;
                currentEntry = '0';
            } else if (buttonPressed === '.') {
                currentEntry += '.';
            } else if (isNumber(buttonPressed)) {
                if (currentEntry === '0')
                    currentEntry = buttonPressed;
                else
                    currentEntry = currentEntry + buttonPressed;
                    
            } else if (isOperator(buttonPressed)) {
                prevEntry = parseFloat(currentEntry);
                operation = buttonPressed;
                //currentEntry = '';
            } else if (buttonPressed === 'Dis$') {
                func='Dis$';
                result = 0;
                currentEntry = '0';
            } else if (buttonPressed === 'Del') {
                //currentEntry = Math.sqrt(currentEntry);
                alert("del");
                delete_item_detail();
            } else if (buttonPressed === 'Order') {
                //currentEntry = 1 / currentEntry;
                alert("order");
                print_to_kitchen();
            } else if (buttonPressed === 'Dis%') {
                func='Dis%';
                result = 0;
                currentEntry = '0';
            } else if (buttonPressed === '=') {
                currentEntry = operate(prevEntry, currentEntry, operation);
                operation = null;
            }

        });
        $('#update_data').on('click', function (evt) {
            load_table_floor_layout();
        });

        isNumber = function (value) {
            return !isNaN(value);
        }
        
        isOperator = function (value) {
            return value === '/' || value === '*' || value === '+' || value === '-';
        };
        
        operate = function (a, b, operation) {
            a = parseFloat(a);
            b = parseFloat(b);
            console.log(a, b, operation);
            if (operation === '+')
                return a + b;
            if (operation === '-')
                return a - b;
            if (operation === '*')
                return a * b;
            if (operation === '/')
                return a / b;
        }
        $("[trigger='calculate']").on("change", function (e) {
        
        });
        $("[trigger='calculate']").on("keyup", function (e) {
            
        });
        function calculate_return(){
            checkvalue(); 
        }
        function checkvalue(){
            if($("#txt_cash_in_kh").val()=="")
                $("#txt_cash_in_kh").val('0');
            if($("#txt_cash_in_dollar").val()=="")
                $("#txt_cash_in_dollar").val('0');
        }
        
        var cash = '';
        function click_dollar(){
            cash ='us';

        }
        function click_khmer(){
            cash='kh';
        }
        function click_khmer_real(){
            cash='kh_real';
        }
        function click_dollar_real(){
            cash='us_real';
        }
        function get_cash_amount(value){
            var us = $("#txt_cash_in_dollar").val();
            var kh = $("#txt_cash_in_kh").val();
            var kh_real = $("#txt_cash_in_kh_real").val();
            var us_real = $("#txt_cash_in_us_real").val();
            
            if(cash == 'us'){
                if(us=='')
                    $("#txt_cash_in_dollar").val("");
                if(value != 'C'){
                    us += value;
                    $("#txt_cash_in_dollar").val(us);
                }else{
                    $("#txt_cash_in_dollar").val("");
                   
                }
            }else if(cash == 'kh'){
                
                if(kh=='')
                    $("#txt_cash_in_kh").val("");
                
                if(value != 'C'){
                    kh += value;
                    $("#txt_cash_in_kh").val(kh);
                }else{
                    $("#txt_cash_in_kh").val("");
                  
                }
            }
            else if(cash == 'kh_real'){
                if(kh_real=='')
                    $("#txt_cash_in_kh_real").val("");
                if(value != 'C'){
                    kh_real += value;
                    $("#txt_cash_in_kh_real").val(kh_real);
                }else{
                    $("#txt_cash_in_kh_real").val("");
                  
                }
            }
            else if(cash == 'us_real'){
                
                if(us_real=='')
                    $("#txt_cash_in_us_real").val("");
                
                if(value != 'C'){
                    us_real += value;
                    $("#txt_cash_in_us_real").val(us_real);
                }else{
                    $("#txt_cash_in_us_real").val("");
                  
                }
            }

        }

        function load_cashier(){
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('sale_offline/load_cashier') ?>',
                async: false,
                success: function (response){
                    var json = JSON.parse(response);
                    if(response!='[]'){
                        var cashier="";
                       $.each(json,function(i,v){
                        console.log($("#cashier_id").html()+v.employee_id);
                            if($("#cashier_id").html()==v.employee_id){
                                cashier+="<option selected value='"+v.employee_id+"'>"+v.employee_name+"</option>"
                            }else{
                                cashier+="<option value='"+v.employee_id+"'>"+v.employee_name+"</option>"
                            }
                       });
                       $("#txt_cashier").html(cashier);
                    }

                }
                ,
                error: function (response){
                    alert('Unable to load data!!');
                }
            });
        }
        $("#date").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        function load_cash(){
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('sale_offline/load_cash') ?>',
                async: false,
                success: function (response){
                    var json = JSON.parse(response);
                    if(response=='[]'){
                        $("#sale_date").html("Sale Date:");
                        $("#cashier").html("Cashier:");
                        $("#txt_cashier").removeAttr("disabled");
                        $("#date").val("");
                        $("#cashier_id").html("");
                        $("#txt_cash_in_kh_real_div").val("");
                        $("#txt_cash_in_us_real_div").val("");
                        $("#txt_cash_in_kh_real_div").prop("hidden",true);
                        $("#txt_cash_in_us_real_div").prop("hidden",true);
                        $("#txt_cash_in_kh").val("");
                        $("#txt_cash_in_dollar").val("");
                        $("#btn_save_cash").html("CASH IN");
                        $("#cash_id").val("");
                    }
                    else if(response!='[]'){
                        $("#sale_date").html("Sale Date:"+json.sale_date);
                        $("#cashier").html("Cashier:"+json.sale_name);
                        $("#date").val(json.sale_date);
                        $("#txt_cashier").attr("disabled", "disabled");
                        $("#cashier_id").html(json.emp_id);
                        $("#txt_cash_in_kh_real_div").val("");
                        $("#txt_cash_in_us_real_div").val("");
                        $("#txt_cash_in_kh_real_div").prop("hidden",false);
                        $("#txt_cash_in_us_real_div").prop("hidden",false);
                        $("#txt_cash_in_kh").val(json.cash_amount_kh);
                        $("#txt_cash_in_dollar").val(json.cash_amount);
                        $("#btn_save_cash").html("UPDATE");
                        $("#cash_id").val(json.cash_id);
                    }

                }
                ,
                error: function (response){
                    alert('Unable to load data!!');
                }
            });
        }
        $("#btn_save_cash").click(function(){
            var amount_kh = $("#txt_cash_in_kh").val();
            var amount_us = $("#txt_cash_in_dollar").val();
            var emp_id=$("#txt_cashier").val();
            var date=$("#date").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('sale_offline/save_cash') ?>',
                async: false,
                data: {'cash_us':amount_us,'cash_kh':amount_kh,'emp_id':emp_id,'date':date},
                success: function (response){
                    var json = JSON.parse(response);
                    if(json.statusCode == 'E0001'){
                        swal("Saved!", "Your shift has been saved.", "success");
                        //setTimeout(function(){
                            load_cash();
                            setTimeout(function(){$('#frm_cash_in_out').modal('hide');},1000);
                       // }, 3000);
                    }else if(json.statusCode == 'E0002'){
                        swal("Warning", "Date Invalid!!!!!", "error");
                    }else{

                        swal("Warning", "This user already start shift.", "error");

                    }
                }
                ,
                error: function (response){
                    alert('Unable to load data!!');
                }
            });
            
            
        });
        $("#btn_cash_out").click(function(){
            var amount_kh = $("#txt_cash_in_kh").val();
            var amount_us = $("#txt_cash_in_dollar").val();
            if($("#cash_id").val()==0){
                swal("Warning", "You didn't start your shift yet.", "error");
                return;
            }
            if( $('#txt_cash_in_kh_real').val()=="" || $('#txt_cash_in_us_real').val()=="" ||$('#txt_cash_in_kh_real').val()==0 || $('#txt_cash_in_us_real').val()==0){
                swal("Warning", "Please input real cash", "error");
                return;
            }else{
                load_data_cash_out($("#cash_id").val());
            } 
        });
        function check_cash(){
            var bool = false;
            //var trueOrfalse='';
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('sale_offline/check_cash') ?>',
                async: false,
                success: function (response){
                    var json = JSON.parse(response);
                    if(json.statusCode != 'S0001'){
                       // swal("Saved!", "The permission has been changed.", "error");
                        bool =  true;
                    }else{
                        bool =  false;
                        swal("Warning", "You didn't start your shift yet.", "error");
                        
                    }
                }
                ,
                error: function (response){
                    alert('Unable to load data!!');
                }
            });
            return bool;
        }
        //Printer Cashier
        function clear_cashier_printer(){
            $("#select_cashier_printer").val(0);
            $("#select_bill_printer").val(0);
            $("#select_receipt_printer").val(0);
            $("#txt_bill_number").val("");
            $("#txt_receipt_number").val("");
            $("#txt_id").val("");
        }
        $("#btn_save_printer_cashier").click(function(){
            var printer = $("#select_cashier_printer").val();
            var print_bill = $("#select_bill_printer").val();
            var print_receipt = $("#select_receipt_printer").val();
            var bill_num = $("#txt_bill_number").val();
            var receipt_num = $("#txt_receipt_number").val();
            var id = $("#txt_id").val();
            if(printer !=0 && print_bill !=0 && print_receipt !=0){
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: '<?php echo site_url('table_order/save_printer_cashier'); ?>',
                    data: {'printer':printer,'print_bill':print_bill,'print_receipt':print_receipt,'bill_num':bill_num,'receipt_num':receipt_num,'id':id},
                    success: function (response) {
                        var json = JSON.parse(response);
                        if(json.statusCode != 'S0001'){
                            swal("Saved!", "The printer you've set up is competeled.", "success");
                            load_printer_cashier();
                            clear_cashier_printer();
                            //setTimeout(function(){$('#frm_setup_printer').modal('hide');},1000);
                        }
                    },
                    error: function (response) {
                        alert('Unable to load sale data!!');
                    }
                });
            }else{
                swal("Warning!", "Please select printer", "error");
            }
        });
        $("#btn_delete_printer_cashier").click(function(){
            var id = $("#txt_id").val();
            if (id > 0) {
                    swal({
                        title: "Are you sure?",
                        text: "You cannot recovery your data when you delete!!!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: 'POST',
                                async: false,
                                url: '<?php echo site_url('table_order/delete_printer_cashier'); ?>',
                                data: {'id':id},
                                success: function (response) {
                                    var json = JSON.parse(response);
                                    if(json.statusCode != 'S0001'){
                                        swal("Deleted!", "The printer you've delete is competeled.", "success");
                                        load_printer_cashier();
                                        clear_cashier_printer();
                                        //setTimeout(function(){$('#frm_setup_printer').modal('hide');},1000);
                                    }
                                },
                                error: function (response) {
                                    alert('Unable to load sale data!!');
                                }
                            });
                        } else {
                            swal("Cancelled", "Error Occur while deleting", "error");
                        }
                    });
                } else {
                    swal("Error", "Error occur while deleting!!!", "error");
                }
        });
        function load_printer_cashier(){
            var id = $("txt_id").val();
            var str ='';
            $("#records").html("");
            $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url('table_order/load_printer_cashier'); ?>',
                data:{'id':id},
                success: function (response) {
                    var value = JSON.parse(response);
                    $.each(value, function (i, e){
                        str += '<tr>';
                        str += '<td class="hidden">'+e.printer_id+'</td><td>'+e.printer_location_name+'</td><td>'+e.printer_print_bill+'</td><td>'+e.printer_print_receipt+'</td>';
                        str += '</tr>';
                    });
                    $("#records").append($(str));
                },
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        $('#table-cashier-printer').on('click', 'td', function (e) {
            e.preventDefault();
            var id=$(this).closest('tr').find('td:first').html();
            $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url('table_order/get_printer_cashier'); ?>',
                data:{'id':id},
                success: function (response) {
                    var value = JSON.parse(response);
                    $("#select_cashier_printer").val(value.printer_location_id);
                    $("#select_bill_printer").val(value.printer_print_bill);
                    $("#select_receipt_printer").val(value.printer_print_receipt);
                    $("#txt_bill_number").val(value.printer_print_bill_time);
                    $("#txt_receipt_number").val(value.printer_print_receipt_time);
                    $("#txt_id").val(id);
                },
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
               
        });
        //End Printer Cashier
       
        //Other Printer
        function clear_other_printer(){
            $("#select_other_printer").val(0);
            $("#select_printer").val(0);
            $("#txt_print_number").val("");
            $("#txt_print_id").val("");    
        }
        $("#btn_save_other_printer").click(function(){
            var printer_name = $("#select_other_printer").val();
            var printer = $("#select_printer").val();
            var print_num = $("#txt_print_number").val();
            var id = $("#txt_print_id").val();
            if(printer != '' && print_num !=0 && printer_name !=0){
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: '<?php echo site_url('table_order/save_other_printer'); ?>',
                    data: {'printer':printer,'printer_name':printer_name,'print_num':print_num,'id':id},
                    success: function (response) {
                        var json = JSON.parse(response);
                        if(json.statusCode != 'S0001'){
                            swal("Saved!", "The printer you've set up is competeled.", "success");
                            load_other_printer();
                            clear_other_printer();
                            //setTimeout(function(){$('#frm_setup_printer').modal('hide');},1000);
                        }
                    },
                    error: function (response) {
                        alert('Unable to load sale data!!');
                    }
                });
            }else{
                swal("Warning!", "Please refill all the blank", "error");
            }
        });
        $("#btn_delete_other_printer").click(function(){
            var id = $("#txt_print_id").val();
            if (id > 0) {
                    swal({
                        title: "Are you sure?",
                        text: "You cannot recovery your data when you delete!!!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: 'POST',
                                async: false,
                                url: '<?php echo site_url('table_order/delete_other_printer'); ?>',
                                data: {'id':id},
                                success: function (response) {
                                    var json = JSON.parse(response);
                                    if(json.statusCode != 'S0001'){
                                        swal("Deleted!", "The printer you've delete is competeled.", "success");
                                        load_other_printer();
                                        clear_other_printer();
                                        //setTimeout(function(){$('#frm_setup_printer').modal('hide');},1000);
                                    }
                                },
                                error: function (response) {
                                    alert('Unable to load sale data!!');
                                }
                            });
                        } else {
                            swal("Cancelled", "Error Occur while deleting", "error");
                        }
                    });
                } else {
                    swal("Error", "Error occur while deleting!!!", "error");
                }
        });
        function load_other_printer(){
            var id = $("txt_print_id").val();
            var str ='';
            $("#records-other-printer").html("");
            $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url('table_order/load_other_printer'); ?>',
                data:{'id':id},
                success: function (response) {
                    var value = JSON.parse(response);
                    $.each(value, function (i, e){
                        str += '<tr>';
                        str += '<td class="hidden">'+e.printer_id+'</td><td>'+e.printer_location_name+'</td><td>'+e.printer_print_kitchen+'</td>';
                        str += '</tr>';
                    });
                    $("#records-other-printer").append($(str));
                },
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        $('#table-other-printer').on('click', 'td', function (e) {
            e.preventDefault();
            var id=$(this).closest('tr').find('td:first').html();
            $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url('table_order/get_other_printer'); ?>',
                data:{'id':id},
                success: function (response) {
                    var value = JSON.parse(response);
                    $("#select_printer").val(value.printer_print_kitchen);
                    $("#select_other_printer").val(value.printer_location_id);
                    $("#txt_print_number").val(value.printer_print_kitchen_time);
                    $("#txt_print_id").val(id);
                },
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
               
        });
        //End Other Printer
        //Setup Item note
        function clear_item_note(){
            $("#txt_item_name").val("");
            $("#txt_price").val("");
            $("#txt_description").val("");
            $("#txt_item_id").val("");
            $('#btn_save_item_note').html('SAVE');
        }
        $("#btn_save_item_note").click(function(){
            var name = $("#txt_item_name").val();
            var price = $("#txt_price").val();
            var desc = $("#txt_description").val();
            if($('#btn_save_item_note').html()=='SAVE'){
                var id = '';
            }else{
                var id = $("#txt_item_id").val();
            }
            if(name==''){
                swal("Error", "Invalid Data!!!", "error");
                return;
            }
            $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url('table_order/save_item_note'); ?>',
                data: {'name':name,'price':price,'desc':desc,'id':id},
                success: function (response) {
                    var json = JSON.parse(response);
                    if(json.statusCode != 'S0001'){
                        load_item_note();
                        clear_item_note();
                        //setTimeout(function(){$('#frm_setup_printer').modal('hide');},1000);
                    }
                },
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
            
        });
        $("#btn_new").click(function(){
            $("#txt_item_name").val('');
            $("#txt_price").val('');
            $("#txt_description").val('');
            $('#table-item-note tbody tr.selected').removeClass('selected');
            $('#btn_save_item_note').html('SAVE');

        });
        $("#btn_delete_item_note").click(function(){
            var id = $("#txt_item_id").val();
            if (id > 0) {
                    swal({
                        title: "Are you sure?",
                        text: "You cannot recovery your data when you delete!!!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: 'POST',
                                async: false,
                                url: '<?php echo site_url('table_order/delete_item_note'); ?>',
                                data: {'id':id},
                                success: function (response) {
                                    var json = JSON.parse(response);
                                    if(json.statusCode != 'S0001'){
                                        load_item_note();
                                        clear_item_note();
                                        swal.close();
                                        //setTimeout(function(){$('#frm_setup_printer').modal('hide');},1000);
                                    }
                                },
                                error: function (response) {
                                    alert('Unable to load sale data!!');
                                }
                            });
                        } else {
                            swal("Cancelled", "Error Occur while deleting", "error");
                        }
                    });
                } else {
                    swal("Error", "Error occur while deleting!!!", "error");
                }
        });
        function load_item_note(){
            var id = $("txt_item_id").val();
            var str ='';
            $("#item_note").html("");
            $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url('table_order/load_item_note'); ?>',
                data:{'id':id},
                success: function (response) {
                    var value = JSON.parse(response);
                    $.each(value, function (i, e){
                        str += '<tr>';
                        str += '<td class="hidden">'+e.item_note_id+'</td><td class="items">'+e.item_note_name+'</td><td class="items">'+e.item_note_price+'</td><td class="items">&nbsp;'+e.item_note_des+'</td>';
                        str += '</tr>';
                    });
                    $("#item_note").append($(str));
                },
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
        }
        $('#table-item-note').on('click', 'td', function (e) {
            e.preventDefault();
            /*$('#table-item-note tr').removeClass('info');
            $(this).parent().addClass('info');//.siblings().removeClass('selected');  */  
            var id=$(this).closest('tr').find('td:first').html();
            $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo site_url('table_order/get_item_note'); ?>',
                data:{'id':id},
                success: function (response) {
                    var value = JSON.parse(response);
                    $("#txt_item_name").val(value.item_note_name);
                    $("#txt_price").val(value.item_note_price);
                    $("#txt_description").val(value.item_note_des);
                    $("#txt_item_id").val(id);
                },
                error: function (response) {
                    alert('Unable to load sale data!!');
                }
            });
               
        });
        $("#btn_void").click(function(){
            var master_id = $("#txt_master_id").val();
            
            if (master_id > 0) {
                swal({
                    title: "Are you sure?",
                    text: "You cannot recovery your data when you delete!!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'POST',
                            async: false,
                            url: '<?php echo site_url('table_order/void_invoice'); ?>',
                            data: {'master_id':master_id},
                            success: function (response) {
                                var json = JSON.parse(response);
                                if(json.statusCode != 'S0001'){
                                    swal("Voided", "This invoice has been voided", "success");
                                    SaleData.ajax.reload();
                                }else{
                                    swal("Warning", "Error Occur while voiding", "error");
                                }
                            },
                            error: function (response) {
                                alert('Unable to load sale data!!');
                            }
                        });
                    } else {
                        swal("Cancelled", "Error Occur while voiding", "error");
                    }
                });
            } else {
                swal("Error", "Error occur while voiding!!!", "error");
            }
        });   
        //END SEAR
        function Order(table_id){
            if(check_cash() == false){
                return false;
            }else{
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: '<?php echo site_url('cashier_order_offline/check_invoice_split'); ?>',
                    data: {'table_id':table_id},
                    success: function (response) {
                        if(response>1){
                            openModal('frm_split_invoice');
                            load_invoice(table_id);
                        }else{
                            window.open("<?php echo site_url("cashier_order_offline/new_order"); ?>"+"/"+table_id,'_self');
                        }
                    },
                    error: function (response) {
                        alert('Unable to load sale data!!');
                    }
                });
            }
        }
        function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
        }
        function load_table_floor_layout() {
            var post_url = '<?php echo site_url('table_order/get_floor_table_layout') ?>';
            var layout='';
            var table='';
            var count_floor=0;
            var width=0;
            showloading();
            $.ajax({
                type: 'POST',
                url: post_url,
                async: true,
                contentType: "application/json; charset=utf-8",
                dataType: "text",
                cache: false,
                success: function (response){
                    var value = JSON.parse(response);
                    $.each(value.Floor, function (i, e){
                        count_floor+=1;

			if(e.default=='true')
                layout+='<button onClick="(openTab(event,'+e.floor_id+'))" class="tablinks btn btn-xs"  id="btn_default_tab" type="button" style="border-right: 0px; height:70px;"><i class="fa fa-fw fa-lg fa-cube"></i>'+e.floor_name+'</button>';
			else
                layout+='<button onClick="(openTab(event,'+e.floor_id+'))" class="tablinks btn"  id="btn_tab_not" type="button" style="border-right: 0px; height:70px;/* border-left: solid 3px #3d6b80;*/"><i class="fa fa-fw fa-lg fa-cube"></i>'+e.floor_name+'</button>';

                        table+='<div id="'+e.floor_id+'" class="tabcontent " style="position: relative;overflow-y: auto; height: 100%">';
                        $.each(e.table_list, function (i, obj) {
                            table+='<div class="col-md-1 col-sm-2 col-xs-3 gallery" <?php if($p->{'Table Start'}==1){ ?> onclick="Order('+obj.layout_id+','+e.floor_id+')" <?php } ?>>';
                            table+=obj.layout_name;
                            if(obj.table_status=='FREE')
                                table+='<img class="img-responsive" src="<?php echo base_url("img/table_active.svg"); ?>">';
                            else if(obj.table_status=='PRINTED')
                                table+='<img class="img-responsive" src="<?php echo base_url("img/table_printed.svg"); ?>">';
                            else if(obj.table_status=='BUSY')
                                table+='<img class="img-responsive" src="<?php echo base_url("img/table_busy.svg"); ?>">';
                            else if(obj.table_status=='SPLIT')
                                table+='<img class="img-responsive" src="<?php echo base_url("img/table_split.svg"); ?>">';
                            table+='</div>';
                        });
                        table+='</div>';
                        $("#table_container").html(table);
                    });
                    $("#floor_template").html(layout);
                    document.getElementById("btn_default_tab").click();
                      for(var i=0; i<count_floor; i++)
                        width +=document.getElementsByTagName("button")[i].offsetWidth;

                }
                ,
                error: function (response){
                    alert('Unable to load sale data!!');
                    //closeModal('frm_loading');
                }
                
            });
            hideloading();
            
        }
        function openModal(modal){
            if(modal=="modal-customer-topup" || modal=="modal-customer-return"){
                if($("#cash_id").val()==0){
                    swal("Warning", "You didn't start your shift yet.", "error");
                    return;
                }
            }
            document.getElementById(modal).style.display = "block";                                    
        }

        function closeModal(modal){
            document.getElementById(modal).style.display = "none";                        
        }
        var tbl_id=0;
        var master_id=0;
        function load_invoice(table_id) {
            var table='';
            var default_id=0;
            var checked='';
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('cashier_order_offline/get_invoice_split') ?>',
                async: false,
                data:{'table_id':table_id},
                success: function (response){
                    var json = JSON.parse(response);
                    table += '<table id="table_checkbox" style="width:100%;" class="table-table-form_order"><tbody>';
                    table += '<tr><th></th><th style="padding-left: 20px;">INVOICE</th></tr>';
                    for(var i=0; i<json.length; i++){
                        if(i==0){
                            default_id = json[0].sale_master_id;
                            checked='checked';
                        } else {
                            checked='';
                        }
                        table +='<tr><td>';
                        table +='<label class="container">' +'<input type="checkbox" data='+json[i].sale_master_layout_id+' class="chk" id="'+
                                json[i].sale_master_id + '"' + checked +'>' +
                                '<span class="checkmark"></span>' +
                                '</label></td>';
                        table +='<td><label class="container" style="cursor: default;">'+json[i].invoice_no+'</label></td></tr>';
                    }
                    table +='</tbody></table>';
                    $("#frm_split_table_invoice").html(table);
                    event_checkbox();
                    fill_order(default_id);
                    tbl_id = table_id;
                    master_id = default_id;
                    $("#frm_split_invoice_footer").html('<a href="#"><div onClick="load_from_split_invoice('+tbl_id+','+master_id+')" class="gallery" id="btn_ok" style="float: right;height: 50px;border:none;margin: 7px 0px 5px 0px;" >OK</div></a>');
                }
                ,
                error: function (response){
                    alert('Unable to load table data!!');
                }
            });
        }

        function load_from_split_invoice(table_id,master_id){
            window.open("<?php echo site_url("cashier_order_offline/new_order"); ?>"+"/"+table_id+"/"+master_id,'_self');
        }

        function event_checkbox(){
            $(".chk").bind("click",function(){
                $(".chk").prop("checked",false);
                $(this).prop('checked', true);
                var result;
                var result1;
                    result = $(this).attr('id');
                    result1 = $(this).attr('data');
                if(result=='' || result==null)
                   result ='0';
                fill_order(result.toString());
                master_id = result.toString();
                layout_id =result1;
                $("#frm_split_invoice_footer").html('<a href="#"><div onClick="load_from_split_invoice('+layout_id+','+master_id+')" class="gallery" id="btn_ok" style="float: right;height: 50px;border:none;margin: 7px 0px 5px 0px;" >OK</div></a>');
            });
        }
        function check_permission(permission_name,action){
            var result=0;
             $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('table_order/check_permission')?>',
                    async: false,
                    data:{'permission_name':permission_name,'action':action},
                    success: function (response){
                        if(response==0) swal("Information", "You don't have permission!!!", "warning");
                        else swal.close();
                        result=response;
                    }
                    ,
                    error: function (response){
                        swal("Information", "You don't have permission!!!", "warning");
                    }
                });
             return result;
        }
        function fill_order(id)
        {
                var post_url = '<?php echo site_url('table_order/fill_data') ?>';
                $.ajax({
                    type: 'POST',
                    url: post_url,
                    async: false,
                    data:{'master_id':id},
                    success: function (response){
                        var json = JSON.parse(response);
                        
                            var table='';
                            $.each(json.sale,function(j,k){
                                $.each(k.sale_detail, function (i, e){
                                    var notes='';
                                    var total=e.sale_note.length;
                                    $.each(e.sale_note,function(l,m){
                                        var slas='';
                                        if(l!=total-1){
                                            slas='/';
                                        }
                                        notes+=m.item_note_name+slas;
                                    });
                                    var no=$('#table_marge_list tbody tr').length;

                                    table +='<tr class="master'+e.sale_master_id+'">';
                                   
                                    table +='<td style="padding: 7px 0px;" class="text-center"><lable>'+(i+1)+'</lable></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+e.detail_name+'</label></td>'+
                                            '<td style="padding: 7px 0px;"><label>'+notes+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.price+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.qty+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_percent+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+e.dis_dollar+'</label></td>' +
                                            '<td style="padding: 7px 0px;"><label>'+numeral(e.price*e.qty).format('#.'+dot_0+'')+'</label></td>' +
                                            '</tr>';
                                });
                                
                            });
                            
                        $("#frm_split_invoice_data_order tbody").html(table);  
                    }
                    ,
                    error: function (response){
                        alert('Unable to load data!!');
                    }
                });
        }
        
    </script>
    
</html>
<?php }} ?>
