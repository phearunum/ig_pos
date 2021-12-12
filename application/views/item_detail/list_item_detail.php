<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
                <div class="col-md-12">
                    <div class="form-group cs-group">
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txtpartnumber" id="txtpartnumber" autocomplete="off" placeholder="<?php echo $txt_part_num?>"> 
                      </div>
                     
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="txt_item_type_id" id="txt_item_type_id" class="form-control">
                            <option value="0"><?php echo $allitem?></option>
                            <?php foreach ($item_type as $key ) {?>
                                <option value="<?=$key->item_type_id?>"><?=$key->item_type_name?></option>
                            <?php } ?>
                        </select>
                      </div>                      
                       <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" name="txt_item_name" id="txt_item_name" value=""  placeholder="<?php echo $txt_item_name?>">
                        <input type="hidden" name="txt_item_id" id="txt_item_id">
                      </div>
                       <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="cbo_cut_stock" id="cbo_stock_location" >              
                            <option value="-1"><?php echo $all?></option>
                            <?php
                            foreach ($item_detail_stock as $t) {
                                ?>
                                <option value="<?php echo $t->item_detail_cut_stock; ?>"><?php if($t->item_detail_cut_stock == 1) echo "Cut Stock"; else echo "No Cut Stock"; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block"><i class="fa fa-search"></i> <?php echo $lb_search; ?></button>
                      </div>
                  </div>
              </div>
          </form><br>
            <!-- <?php if ($p->permission_add != 0) { ?> --><a class="btn btn-primary pull-right <?php echo $permission_add;?>" href='<?php echo site_url("item_detail/addnew"); ?>'><i class="fa fa-plus"></i> <?php echo $lbl_new ?></a><!-- <?php } ?> -->
            <h4 class="text-center"><?php echo $lbl_title ?></h4>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo $lbl_no;?></th>
                        <th><?php echo $txt_item_type ?></th>
                        <th><?php echo $txt_part_num ?></th>
                        <th><?php echo $txt_item_name ?></th>
                        <th><?php echo $measure ?></th>
                        <th><?php echo $txt_retail_price ?></th>  
                        <th><?php echo $ingredient ?></th>   
                        <th><?php echo "Hide/Show" ?></th>                
                        <th><?php echo $txt_create_date ?></th>
                        <th><?php echo $txt_recorder ?></th>
                        <th><?php echo $txt_cut_stock ?></th>
                        <th><?php echo $lbl_print_location ?></th>
                        <th><?php echo $lbl_action ?></th>
                    </tr>
                </thead>
            </table>
        </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    var table = $('#table-table').DataTable({
                        "bProcessing": false,
                        "sAjaxSource": "<?php echo site_url("item_detail/response"); ?>",
                        "aoColumns": [
                            {mData: 'item_detail_id'},
                            {mData: 'item_detail_id'},
                            {mData: 'item_type_name'},
                            {mData: 'item_detail_part_number'},
                            {mData: 'item_detail_name'},
                            {mData: 'measure_name','mRender':function(data){
                                if(data==null){
                                    return 'None';
                                }else{
                                    return data;
                                }
                            }},
                            {mData: 'item_detail_retail_price'},

                            {mData: 'item_type_is_ingredient',mRender:function(data){
                                if(data==1){
                                    return 'Yes';
                                }else{
                                    return 'No';
                                }
                            }},
                            {mData: 'item_detail_hide_show',mRender:function(data){
                               if(data==0){
                                    return 'Hide';
                                }else{
                                    return 'Show';
                                }
                            }},
                            {mData: 'item_detail_created_date'},
                            {mData: 'recorder'},
                            {mData: 'item_detail_cut_stock',mRender:function(data){
                                if(data==0){
                                    return 'No';
                                }else{
                                    return 'Yes';
                                }
                            }},
                            {mData: 'printer_location_name'},
                    { "sDefaultContent": '<a <?php echo $edit_link;?> class="edit<?php echo $permission_edit;?>"><img src="<?php echo base_url("img/settings/edit.svg"); ?>"></a>&nbsp;&nbsp;<a <?php echo $delete_link;?> class="delete<?php echo $permission_delete;?>"><img src="<?php echo base_url("img/settings/delete.svg"); ?>"></a>&nbsp;&nbsp;<a  class="print"><img width="20" src="<?php echo base_url("img/print.png"); ?>"></a>'}
                        ],
                        "iDisplayLength": 50,
                        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                        "columnDefs": [
                            {"sClass": "hidden", "aTargets": [0,1,5]}
                        ],
                        "order": [[1, 'asc']],
                        "drawCallback": function ( settings ) {
                            var api = this.api();
                            var rows = api.rows( {page:'current'} ).nodes();
                            var last=null;
                 
                            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                                if ( last !== group ) {
                                    $(rows).eq( i ).before(
                                        '<tr class="group"><td colspan="12">'+group+'</td></tr>'
                                    );
                 
                                    last = group;
                                }
                            } );
                        }                             
                    });
                    $('#table-table').on('click', 'td .delete', function (e) {
                        e.preventDefault()
                        var id = $(this).closest('tr').find('td:first').html();
                        var href = '<?php echo site_url("item_detail/delete") ?>' + "/" + id;
                        if (confirm('Do you want to delete this record?')) {
                            window.location.href = href;
                        }
                    });
                    $('#table-table').on('click', 'td .print', function (e) {
                        e.preventDefault();
                        var id = $(this).closest('tr').find('td:first').html();
                        var href = '<?php echo site_url("print_label/load_label") ?>' + "/" + id;
                        window.open(href, "_blank");
                    });

                    $('#table-table').on('click', 'td .edit', function (e) {
                        e.preventDefault()
                        var id = $(this).closest('tr').find('td:first').html();
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url("item_detail/load/"); ?>' + '/' + id,
                            data: $('form').serialize(),
                            success: function () {
                                window.open("<?php echo site_url("item_detail/addnew"); ?>"+"/"+id, "_self");
                            }
                        });
                    });
                    
                    $("form#form").on('submit',function(e){
                        e.preventDefault();
                        var data  = $(this).serialize();
                        var url = '<?php echo site_url("Item_detail/response_search?");?>';
                        table.clear().draw();
                        $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="13" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                        $.getJSON(url, data, function( json )
                        {        
                            table.rows.add(json.aaData).draw();
                        });
                    });
                    //
                    $('#txt_item_name').autocomplete({
                        source: function (request, response) {
                            $.ajax({
                                url: '<?php echo site_url('search/search_filter'); ?>',
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
                            $('#txt_item_id').val(names[1]);
                        }
                    });
                    //clear item id
                    $("#txt_item_name").on('blur',function(){
                        if($(this).val()=="")
                            $('#txt_item_id').val("");
                    });
                  });
                //
            </script>
        <?php
          }
        ?>
    </body>
</html>
