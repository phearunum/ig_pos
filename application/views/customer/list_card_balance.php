<!DOCTYPE html>
<html>
    <head>  
        <meta charset="UTF-8">
        <title></title>            
        <script>
            function myfunction(){
                $(function() {
                    $(".table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "<?php echo $list_name; ?>",
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
                    <select name="slect_branch" id="select_bracnh" class="form-control">
                        <option value="0"><?php echo $lb_branch; ?></option>
                        <?php foreach ($branch as $key) {
                            echo '<option value="'.$key->branch_id.'">'.$key->branch_name.'</option>';
                        } ?>
                    </select>
                    
                  </div>
                  <div class="col-sm-1 col-xs-6 col-cs">
                    <input type="submit" class="btn btn-primary btn-block" name="btn_search" id="btn_search" value=" <?php echo $btn_search; ?>">
                  </div>
                  <div class="col-sm-1 col-xs-6 col-cs">
                    <input type="button" class="btn btn-danger btn-block" name="btn_export" id="btn_export" value=" <?php echo $btn_export; ?>" onclick="myfunction()">
                  </div>
                <div class="clearfix"></div>
                </div>
            </div>
            </form>
            <h3 class="text-center text-primary"><?php echo $list_name;?></h3>
            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">     
                <thead>
                    <tr>
                        <th></th>
                        <th><?php echo $lb_no;?></th>
                        <th><?php echo $lb_customer_name; ?></th>
                        <th><?php echo $lb_customer_type;?></th>
                        <th><?php echo $lb_card_number;?></th>
                        <th><?php echo $lb_chip_number;?></th>
                        <th><?php echo $lb_serial_number;?></th>
                        <th><?php echo $lb_balance;?></th>
                        <th><?php echo $lb_discount;?></th>
                        <th><?php echo $lb_point;?></th>
                        <th><?php echo $lb_card_expired;?></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
    </div>
    <script type="text/javascript">
            $( document ).ready(function() {
                var table =$('#table-table').DataTable({
                    "bProcessing": false,
                    "sAjaxSource": "<?php echo site_url('card_balance/response_card_balance');?>",
                    "aoColumns": [
                        { mData: 'customer_id'},
                        { mData: 'customer_id'},
                        { mData: 'customer_name'},
                        { mData: 'customer_type_name'},
                        { mData: 'customer_card_number'},
                        { mData: 'customer_chip'},
                        { mData: 'customer_card_serial'},
                        { mData: 'customer_balance'},
                        { mData: 'customer_discount',render: function (data) {
                           return  data+'%';
                        }},
                        { mData: 'customer_point'},
                        { mData: 'customer_card_expired'},                        
                    ],

                    "iDisplayLength": 50 ,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "order": [[ 0, "asc" ]],
                    "aoColumnDefs": [
                        { "sClass": "hidden", "aTargets": [0,3]},
                       // { "sClass": "text-center", "aTargets": [6]}
                    ],
                    "drawCallback": function ( settings ) {
                        var api = this.api();
                        var rows = api.rows( {page:'current'} ).nodes();
                        var last=null;
             
                        // api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                        //     if ( last !== group ) {
                        //         var cut_name = api.column(0,{page:'current'}).data()[i];
                        //         $(rows).eq( i ).before(
                        //             '<tr class="group"><td colspan="11">'+cut_name+'</td></tr>'
                        //         );
             
                        //         last = group;
                        //     }
                        // } );
                    }
                });
                //
                table.on( 'order.dt search.dt', function () {
                    table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
                //AJAX FORM SUBMIT
                $("#form").on('submit', function (e) {
                    e.preventDefault();
                    var url  = '<?php echo site_url("card_balance/response_card_balance"); ?>';
                    var data = $(this).serialize();

                     table.clear().draw();
                    $(table.table().body()).html('<tr class="odd"><td valign="top" colspan="11" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                    $.getJSON(url, data, function( json )
                    {        
                        table.rows.add(json.aaData).draw();
                    });
                });
                //END AJAX FORM SUBMIT
                $('#table-table').on('click', 'td .delete', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("stock_location/delete") ?>' +"/"+ id;
                    if (confirm('Do you want to delete this record?')) {
                        $.ajax({
                            type: 'POST',
                            url: href,
                            success: function () {
                                location.reload();
                            }
                        });
                    }

                });

                $('#table-table').on('click', 'td .edit', function(e) {
                    e.preventDefault()
                    var id = $(this).closest('tr').find('td:first').html();
                    var href='<?php echo site_url("stock_location/edit_load") ?>' +"/"+ id;
                     window.location.href = href;
                });          
            });
        </script>
        <script>
            $("#datefrom").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
        </script>
        <script type="text/javascript">
            function format_discount(n) {
                    return  n.toFixed(0).replace(/./g, function(c, i, a) {
                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                    }) + ' %'
                }
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
            function clearId(){
                if($("#txt_customer_name").val()===""){
                    $('#txtcustomer_id').val("");
                }
            }   
        </script>
    </body>
</html>
