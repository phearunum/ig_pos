<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title> 
        
        <script type="text/javascript">
         function myFunction(){
            alert("费用");
            $(function() {
                $("#table-table").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "费用",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
                });
            });
        }
     </script>
     
    </head>
    <body>  

        <!-- <?php
            foreach ($record_permission as $p) {
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
            <form class="formSale" id="form">
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                         <input type="text" class="form-control text_input" name="txt_expense_type" id="txt_expense_type" value=""  placeholder="Expense Type">
                         <input type="hidden" name="txt_expense_type_id" id="txt_expense_type_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                         <input type="text" class="form-control text_input" name="txt_expense_name" id="txt_expense_name"  placeholder="Expense Name">
                         <input type="hidden" name="txt_expense_detail_id" id="txt_expense_detail_id">
                      </div>
                     <div class="col-sm-2 col-xs-6 col-cs">
                            <select class="form-control" name="cbo_branch" id="cbo_branch" >
                                <option value="0">--All Branch--</option>
                                <?php
                                foreach ($branch as $b) {
                                    ?>
                                    <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                                <?php } ?>
                            </select>
                      </div>



                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <?php if ($p->permission_add != 0) { ?><a class="btn btn-primary" href="<?php echo site_url("expense/addnew"); ?>"><i class="fa fa-plus"></i> <?php echo $btn_new?></a><?php } ?>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h3 class="text-center text-primary"><?php echo $lbl_title_expense;?></h3>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
                
                <thead>
                    <tr> 
                        <th><?php echo "ID" ?></th>
                       
                        <th><?php echo "No" ?></th>
                        <th><?php echo $lbl_chart;?></th>
                        <th><?php echo $lbl_expense_name;?></th>  
                        <th><?php echo $lbl_expense_type;?></th>                   
                                    
                        <th><?php echo $lbl_amount;?></th>
                        
                        <th><?php echo $lbl_expense_date?></th>
                        <th><?php echo $lbl_branch?></th>
                        <th><?php echo $lbl_recorder?></th>
                        <th><?php echo $lbl_create_date?></th>

                        <th><?php echo $lbl_modified_date?></th>
                        <th><?php echo $lbl_modifier?></th>
                        
                        <th><?php echo $lbl_action;?></th>

                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    
                    <tr>
                        
                        <td></td>
                        <td></td>
                        <td ><?php echo $lbl_grand_total; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
           
                    </tr>
                </tfoot>

            </table>  
        </div>
        <?php } ?>                      
    </body>
   
    <script type="text/javascript">
            $(document).ready(function () {
                var data_table=$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url("report_expense/response"); ?>",
                    "aoColumns": [
                        { mData: 'expense_id'},
                        
                        { mData: 'expense_no_prefix'},
                        { mData: 'expense_chart_number'},
                        { mData: 'expense_detail_name'},
                        { mData: 'expense_type_name'},
                        { mData: 'expense_amount'},               
                        { mData: 'expense_date'},
                        { mData: 'branch_name'},
                        { mData: 'recorder'},
                        { mData: 'expense_created_date'},
                        { mData: 'expense_modified_date'},
                        { mData: 'modified_by'},
                        
                        {mData:'expense_no',mRender:function(data,type,row){
                                return '<?php if($p->permission_edit!=0){ ?><a href="javascript:void(0)" onClick="edit('+data+','+row.expense_branch_id+')"  class="edit"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a><?php } ?>&nbsp;&nbsp;<?php if($p->permission_delete!=0){ ?><a href="#" class="delete"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a><?php } ?>';
                        }},

                        
                        
                    ],
                    "order": [[ 1, "desc" ]],
                    "iDisplayLength": 50,
                    "columnDefs": [
                       {"sClass": "hidden", "aTargets": [0,1]}
                    ],
                    "drawCallback": function ( settings ) {
                        var api = this.api(),data;
                        var rows = api.rows( {page:'current'} ).nodes();
                        var last=null;

                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
                        total=new Array();
                        data_group = new Array();
                        api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                            group_assoc=group.replace(/[^a-zA-Z0-9 ]/g, "").replace(/ /g, '_');
                            data_group[i]=group_assoc;
                            if(typeof total[group_assoc] != 'undefined'){
                                total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(5,{page:'current'}).data()[i]);

                            }else{
                                total[group_assoc] =  new Array();
                                total[group_assoc][0]=intVal(api.column(5,{page:'current'}).data()[i]);
                            }
                            var j = i;
                            if ( last !== group ) {
                                var dataGroup='<tr class="group"><td colspan="4">'+group+'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                                j=j+1;
                                if(j!=1){
                                    var dataGroupTotal='<tr class="group_footer"><td colspan="3">SubTotal :</td><td class="'+data_group[i-1]+'_amount"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                                $(rows).eq( i ).before(dataGroupTotal);
                                }
                                $(rows).eq( i ).before(dataGroup);
                                last = group;
                            }
                        });
                        var CategoryLeng = data_group.length;
                        $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="3">SubTotal :</td><td class="'+data_group[CategoryLeng-1]+'_amount"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                        for(var key in total) {
                            $("."+key+'_amount').html(total[key][0].toFixed(dot_num));
                        }
                    },
                    "footerCallback": function (nRow) {
                        var api = this.api(), data;
                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };
                        total_amount = api.column( 5, {page: 'current'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        grand_total_amount = api.column( 5, {page: 'all'})
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        //
                        var nCell = nRow.getElementsByTagName('td');
                        nCell[5].innerHTML = total_amount.toFixed(dot_num)+ ' of ' + grand_total_amount.toFixed(dot_num);
                    }
                });
                //AJAX FORM SUBMIT
            $("#form").on('submit', function (e) {
                e.preventDefault();
                var url  = '<?php echo site_url("report_expense/responses"); ?>';
                var data = $(this).serialize();

                 data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="11" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, data, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
            });
            //END AJAX FORM SUBMIT
                
            });
            
            $('#table-table').on('click', 'td .edit', function (e) {
                e.preventDefault()
             
                var href = '<?php echo site_url("expense/edit_load") ?>' +"/"+ex_no+"/" + b_id;
                window.open(href,'_self');
            });
            $('#table-table').on('click', 'td .delete', function (e) {
                e.preventDefault()
                var id = $(this).closest('tr').find('td:first').html();
                var href = '<?php echo site_url("expense/delete_from_detail_list") ?>' + "/" + id;
               //  $('a.delete', $(this)).attr('href', href);
                if (confirm('Do you want to delete this record?')) {
                    window.location.href = href;
                } else {
                    // Do nothing!
                }
            });
            function edit(id,b_id){
               
                var href = '<?php echo site_url("expense/edit_load") ?>' + "/" + id+"/"+b_id;
                window.open(href,'_self');
            }
            $('#txt_expense_type').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('search/search_filter'); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'expense',
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
                change: function (event, ui) {
                    if(ui.item==null){
                        $('#txt_expense_type_id').val('');
                        $(this).val('');
                    }else{
                        var names = ui.item.data.split("|");
                        $('#txt_expense_type_id').val(names[1]);
                    }

                }
            });

            $('#txt_expense_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '<?php echo site_url('search/search_filter'); ?>',
                        dataType: "json",
                        data: {
                            name_startsWith: request.term,
                            type: 'expense_detail',
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
                change: function (event, ui) {
                    if(ui.item==null){
                        $('#txt_expense_detail_id').val('');
                        $(this).val('');
                    }else{
                        var names = ui.item.data.split("|");
                        $('#txt_expense_detail_id').val(names[1]);
                    }

                }
            });

            

        </script>
     <script type="text/javascript">
        $.noConflict();
        jQuery( document ).ready(function( $ ) {
            $("#datefrom").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
        });
    </script>
</html>
