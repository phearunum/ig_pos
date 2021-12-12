<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>PURCHASE</title>
        <style type="text/css">
            .table-table th {
                color: #FFFFFF;
                background-color: #137b80;
            }
            </style>


    </head>
    <body>
        <form class="formSale" action="<?php echo site_url("expense/save"); ?>" method="POST" id="form">

            <div class="panel-heading">
            <h3 class="text-center text-primary"><?php echo $lbl_title ?></h3>
        </div>

        <input readonly type="hidden" name="txtno" id="txtno" value="<?php echo $expense_no ?>">
        <div class="col-xs-12">
            <div class="col-xs-6 col-sm-3">
                <div class="form-group">
                    <label><?php echo "Branch" ?><span class="star"> *</span></label>
                    <select name="cbo_branch" id="cbo_branch" class="form-control form-custom">
                        <option value="0">--Branch--</option>
                        <?php
                        foreach ($branch as $b) {
                            ?>
                            <option value="<?php echo $b->branch_id ?>"><?php echo $b->branch_name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="form-group">
                    <label><?php echo "Date Entry" ?><span class="star"> *</span></label>
                    <input class="form-control form-custom" type="text" id="txt_date" name="txt_date" autocomplete="off" value="<?php echo date('Y-m-d') ?>" placeholder="yyyy-mm-dd">

                </div>
            </div>

            <div class="col-xs-6 col-sm-3">
                <div class="form-group">
                    <label><?php echo "Expense Type" ?><span class="star"> *</span></label>
                    <select name="cbo_expense_name" id="cbo_expense_name" class="form-control form-custom">
                                        <option value="0">--expense type--</option>
                                        <?php
                                        foreach ($record_expense_name as $ren) {
                                            ?>
                                            <option value="<?php echo $ren->expense_type_id ?>"><?php echo $ren->expense_type_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3">
                <div class="form-group">
                    <label><?php echo $lbl_expense_detail ?><span class="star"> *</span></label>
                    <select name="cbo_expense_detail" id="cbo_expense_detail" class="form-control form-custom">
                        <option value="0">--expense detail--</option>
                    </select>
                </div>
            </div>


        </div>

        <div class="col-xs-12">
            <div class="col-xs-6 col-sm-3">
                <div class="form-group">
                    <label><?php echo $lbl_amount ?>($)</label> <span class="star"> *</span>
                    <input type="text" id="txt_amount" name="txt_amount" placeholder="Amount" autocomplete="off" class="allow-decimal text_input form-control form-custom">
                    <input class="hidden" type="text" id="txt_edit" name="txt_edit" placeholder="edit" autocomplete="off">
                </div>
            </div>

            <div class="col-xs-6 col-sm-3 col-lg-6">
                <div class="form-group">
                    <label><?php echo $lbl_description ?></label> <span class="star"> </span>
                    <input type="text" class="text_input form-control form-custom" name="txtDesc" id="txtDesc">                        
                    
                </div>
            </div>
        </div>

        <label style="height: 55px;"></label><br><br><br>
                    <button name="btnSave" type="button" id="btn_add" class="btn btn-primary"  value="+Add"/><?php echo $btn_add ?></button>
                    <button name="btn_clear" type="button" id="btn_clear" class="btn btn-sad"  value="+Add"/><?php echo $lbl_clear ?></button>
                    <input type="reset" name="btnCacel" class="btn btn-sad"  value="<?php echo $btn_cancel ?>" onclick="back()"/>

                    <td style="vertical-align: top;">
                        <table width="100%" class="table-form">
                            <tr>
                                <td colspan="2">
                                    <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="3" border="0">
                                        <thead>
                                            <tr style="background-color: #37773A;">
                                                <th class="hidden"><?php echo "ex_id" ?></th>
                                                <th class="hidden"><?php echo "type_id" ?></th>
                                                <th><?php echo $lbl_no ?></th>
                                                <th><?php echo $lbl_expense_type ?></th>
                                                <th><?php echo $lbl_expense_detail ?></th>
                                                <th><?php echo $lbl_amount ?></th>
                                                <th><?php echo $lbl_date_entry ?></th>
                                                <th><?php echo $lbl_create ?></th>
                                                <th><?php echo $lbl_description ?></th>
                                                <th class="text-center"><?php echo $lbl_delete ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                       
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right" colspan="2">
                                    <button  name="btnSave" type="button" id="btnSave" value="Save" class="btn btn-primary"/><?php echo $btn_save ?></button>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>  
        <script type="text/javascript">
            $("#txt_date").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
             $('#btnSave').on('click',function(){
                save();
             })
             function save(){
                var table = $(".table-table tbody");
                var row=table.find('tr').length;
                if(row<=0){
                    alert('No record !!');
                    return false;
                }
                if($('#cbo_branch').val()==0){
                    alert('Please select branch!!');
                    return false;
                }
                var item_id=$('#txtpro_id').val();
                var branch=$('#cbo_branch').val();
                var no=$('#txtno').val();
                    var values=[];
                     table.find('tr').each(function (i, el) {
                         var $tds = $(this).find('td');
                         values.push({
                            id:  $tds.eq(0).text(),
                            type_id:  $tds.eq(1).text(),
                            amount:$tds.eq(5).text(),
                            e_date:$tds.eq(6).text(),
                            create_date:$tds.eq(7).text(),
                            desc:$tds.eq(8).text() 
                        });
                       
                     });
                     var data=JSON.stringify(values);

                    //alert(data);return;
                    var post_url = '<?php  echo site_url('expense/save') ?>';
                     $.ajax({
                        type: 'POST',
                        url: post_url,
                        ContentType: 'application/json',              
                        data: {'data': data,'branch':branch},                    
                        success: function (req) {
                            var json = $.parseJSON(req);
                            if (json.statusCode != 'E0001') {
                                alert(json.message);
                                
                                //load_po_id();
                                window.open("<?php echo site_url("expense"); ?>","_self");

                            } else {
                                alert(json.message);

                            }
                             //$('#save_po').loadingBtnComplete({html: "<i class='fa fa-fw fa-lg fa-check-circle'></i>Save"});
                        },
                        error: function (req) {
                            alert('error');
                        }
                    });

        }
            function clear(){
                //$('#txtno').val('');
                $('#txt_date').val('<?php echo $date_now;?>');
                $('#cbo_expense_name').val(0);
                $('#cbo_expense_detail').val(0);
                $('#txt_amount').val('');
                $('#txtDesc').val('');
                $('#txt_edit').val('');
            }
            $('#btn_clear').on('click',function(){
                clear();
            })

            $('#btn_add').on('click',function(){
                var expense_no=$('#txtno').val();
                var exp_date=$('#txt_date').val();
                var exp_type_id=$('#cbo_expense_name').val();
                var exp_type_name=$('#cbo_expense_name option:selected').text();
                var exp_detail_id=$('#cbo_expense_detail').val();
                var exp_detail_name=$('#cbo_expense_detail option:selected').text();
                var amount=$('#txt_amount').val();
                var desc=$('#txtDesc').val();
                var table=$('#table-table');
                var no=table.find('tbody tr').length+1;
                var create_date='<?php echo $date_now;?>';
                var edit=$('#txt_edit').val();
                if(exp_date==""){
                    alert("Please input Date Entry!!");$('#txt_date').focus();return false;
                }else if(exp_type_id==0){
                    alert("Please input Expense Type!!");return false;
                }else if(exp_detail_id==0){
                    alert("Please input Expense Detail!!");return false;
                }else if(amount=="" || amount<=0){
                    alert("Please input Amount!!");$('#txt_amount').focus();return false;
                }
                if(expense_no==""){
                    //add
                    add(exp_detail_id,exp_type_id,no,exp_type_name,exp_detail_name,amount,exp_date,create_date,desc,edit);
                    clear();
                }else{
                    var branch_id=$('#cbo_branch').val();
                    //alert(branch_id);return false;
                    if(confirm('Are you sure to update this record?')){
                        var post_url = '<?php  echo site_url('expense/save_add') ?>';
                         $.ajax({
                            type: 'POST',
                            url: post_url,
                            ContentType: 'application/json',              
                            data: {'branch_id':branch_id,'edit': edit,'expense_no':expense_no,'e_date':exp_date,'type':exp_type_id,'detail_id':exp_detail_id,'amount':amount,'desc':desc},                    
                            success: function (req) {
                                var json = $.parseJSON(req);
                                if (json.statusCode != 'E0001') {
                                    alert(json.message);
                                     var table = $('#table-table').DataTable();
                                     table.ajax.reload( function ( json ) {} );
                                     clear();
                                } else {
                                    alert(json.message);
                                }
                            },
                            error: function (req) {
                                alert('error');
                            }
                        });
                    }
                    
                }
            });
           
            function add(id,type_id,no,type_name,name,amount,date,create_date,desc,edit){
                var table=$('#table-table');
                if(edit!=""){
                    no=edit;
                }
                var action='<td class="text-center"><a onclick="edit('+"'"+date+"'"+','+type_id+','+id+','+amount+','+"'"+desc+"'"+','+no+')" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> <a onclick="del(this,0)" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Del</a></td>';
                var htm='<tr class="row'+no+'"><td class="hidden">'+id+'</td><td class="hidden">'+type_id+'</td><td>'+no+'</td><td>'+type_name+'</td><td>'+name+'</td><td>'+amount+'</td><td>'+date+'</td><td>'+create_date+'</td><td>'+desc+'</td>'+action+'</tr>';
                if(edit==""){
                    // if($('#table-table tbody td._id:contains("'+id+'")').length){
                    //     alert('Item Exist!!');
                    //     return false;
                    // }
                    table.find('tbody').append(htm);
                }else{
                   
                    table.find('tbody tr.row'+edit+'').replaceWith(htm);
                }
            }
            function edit(date,type_id,id,amount,desc,no){
                
                $('#txt_edit').val(no);
                $('#txt_date').val(date);
                $('#cbo_expense_name').val(type_id);
                load_expense_detail(type_id);
                $('#txt_amount').val(amount);
                $('#txtDesc').val(desc);
                
                setTimeout(function(){
                    $('#cbo_expense_detail').val(id);
                },200);
               
            }
            $("#cbo_expense_name").on('change',function (){
               
                    var id = $(this).val();
                    if(id==0){
                         $("#cbo_expense_detail").html('<option value="0">--expense detail--</option>');
                    }else{
                        load_expense_detail(id);
                    } 
            });
            function del(no,ex_id){
                 var expense_no=$('#txtno').val();
                 if(expense_no==""){
                     $(no).closest('tr').remove();
                    order_index();
                 }else{
                    if(confirm('Are you sure to delete this record?')){
                        var post_url = '<?php  echo site_url('expense/del_detail') ?>';
                         $.ajax({
                            type: 'POST',
                            url: post_url,
                            ContentType: 'application/json',              
                            data: {'id': ex_id},                    
                            success: function (req) {
                                var json = $.parseJSON(req);
                                if (json.statusCode != 'E0001') {
                                    alert(json.message);
                                     var table = $('#table-table').DataTable();
                                     table.ajax.reload( function ( json ) {} );
                                     clear();
                                } else {
                                    alert(json.message);
                                }
                            },
                            error: function (req) {
                                alert('error');
                            }
                        });
                    }

                 }
               
            }
            function order_index(){     
                    var table = $(".table-table tbody");
                     var a=1;
                     table.find('tr').each(function (i, el) {
                                var $tds = $(this).find('td');
                                $tds.eq(2).text(a);
                            a=a+1;  
                     });
            }
            $(document).ready(function () {
                
                 var expense_no=$('#txtno').val();
                 var branch_id="<?php echo $branch_id;?>";
      
                
                if(expense_no==""){
                    $('#cbo_branch').attr('disabled',false);
                    // var data_table = $('#table-table').dataTable({
                    //     "info": false,
                    //     "bFilter" : false,               
                    //     "bLengthChange": false,
                    //     "bPaginate": false
                    // }); 
                }else{
                    $('#cbo_branch').val('<?php echo $branch_id;?>');
                    $('#cbo_branch').attr('disabled',true);
                    $('#btnSave').addClass('hidden');
                    var data_table = $('#table-table').dataTable({
                        "bProcessing": true,
                        "info": false,
                        //"bFilter" : false,               
                        "bLengthChange": false,
                        "bPaginate": false,
                        "sAjaxSource": "<?php echo site_url("expense/response_add_new"); ?>"+'/'+expense_no+'/'+branch_id,
                        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                         "columnDefs": [
                        {"sClass": "hidden", "aTargets": [0,1]},
                        {"sClass": "text-center", "aTargets": [9,8]}
                      
                    ],
                        "order": [[2, 'desc']],
                        "aoColumns": [
                            {mData: 'expense_detail_id'},
                            {mData: 'expense_type_id'},
                            {mData: 'expense_id',mRender:function(data,type,row,meta){
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }},
                            {mData: 'expense_type_name'},
                            {mData: 'expense_detail_name'},
                            {mData: 'expense_amount'},
                            {mData: 'expense_date'},
                            {mData: 'expense_created_date'},
                            {mData: 'expense_note'},
                            {mData: 'expense_no',mRender:function(data,type,row){
                                return '<a onclick="edit('+"'"+row.expense_date+"'"+','+row.expense_type_id+','+row.expense_detail_id+','+row.expense_amount+','+"'"+row.expense_note+"'"+','+row.expense_id+')" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> <a onclick="del(this,'+row.expense_id+')" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Del</a>';
                            }}
                        ],
                        "iDisplayLength": 50
                        
                       
                    });
                        var tables = $('#table-table').DataTable();
                        tables.on('order.dt search.dt', function () {
                            tables.column(2, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                cell.innerHTML = i + 1;
                            });
                        }).draw();
                }
                
                 
            });
        </script>
        <script type="text/javascript">
            $('#txt_product_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: 'purchase/searchproduct',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'product_table',
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
                    $('#txtpro_id').val(names[1]);

                }
            });

        </script> 

        <script type="text/javascript">
            $('#txt_supplier').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: 'supplier/search_supplier',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'supplier_table',
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
                    $('#txtsupplier_id').val(names[2]);

                }
            });
            function load_expense_detail(id){
               
                        $("#cbo_expense_detail").html('<option value="0">--expense detail--</option>');
                        $.ajax
                            ({
                                type: "get",
                                url: "<?php echo site_url("expense/load_expense_detail"); ?>"+'/'+id,
                                cache: false,
                                success: function (response)
                                {
                                    if (response.trim() !== '[]' || response.trim() !== '') {
                                        var html_str="";
                                        var list = JSON.parse(response);
                                        for (var i = 0; i < list.length; i++) {
                                          html_str+='<option value="'+list[i].expense_detail_id+'">'+list[i].expense_detail_name+'</option>';
                                        }
                                        $("#cbo_expense_detail").append(html_str);
                                    }
                                },
                                error: function (response) {

                                }
                            });
            }
           
        </script>
    </body>
</html>
