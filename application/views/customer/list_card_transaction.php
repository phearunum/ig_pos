<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function myFunction(){
               $(function() {
//                   alert("Export your Data ");
                    if (confirm('Do you want to edit this record?')) {
                    $("#table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "Report Stock",
                            fileext: ".xls"
                    });
                }
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
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" placeholder="<?php echo $lb_chip; ?>" name="txt_chip" id="txt_chip">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" placeholder="<?php echo $lb_cardnum; ?>" name="txt_card" id="txt_card">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control text_input" placeholder="<?php echo $lb_cardser; ?>" name="txt_serial" id="txt_serial">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select class="form-control" name="select_status" id="select_status">
                            <option value=""><?php echo $lb_select;?></option>
                            <option value="1"><?php echo $topup;?></option>
                            <option value="0"><?php echo $spend;?></option>
                            <option value="2"><?php echo $return;?></option>
                        </select>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <input type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search" value="<?php echo $btn_search; ?>">
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <input type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()" value="<?php echo $btn_export; ?>">
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        <table width='100%'>
            <tr>
                <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo $list_name;?></td>
            </tr>
            <tr>
                <td>
                   <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0"> 
                        <thead>
                            <tr>
                                <th><?php echo "ID"?></th>
                                <th><?php echo $lb_chip_number;?></th>
                                <th><?php echo $lb_customer_name;?></th>
                                <th><?php echo $return;?></th>
                                <th><?php echo $spend;?></th>
                                <th><?php echo $topup;?></th>
                                <th><?php echo $balance;?></th>
                                <th><?php echo $create_date?></th>
                            </tr>
                        </thead>
                    </table>
                </td>
            </tr>
        </table>
    </div>
        <script type="text/javascript">
            $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $(document).ready(function() {
                        var data_table =    $('#table-table').DataTable({
                                 "bProcessing": false,
                                 "sAjaxSource": "<?php echo site_url("card_transaction/response");?>",
                                 "aoColumns": [
                                        { mData: 'transaction_id'},
                                        { mData: 'customer_chip'},
                                        { mData: 'customer_name'},
                                        { mData: 'transaction_return'},
                                        { mData: 'transaction_expense'},
                                        { mData: 'transaction_topup'},
                                        { mData: 'transaction_balance'},
                                        { mData: 'transaction_date'},
                                ],
                                "order": [[ 0, "desc" ]],                                
                                "iDisplayLength": 50,
                                "columnDefs": [
                                    {"sClass": "hidden", "aTargets": [0]}
                                ],
                        });
                
                        $("#form").on('submit',function(e){
                            e.preventDefault();
                            var df,dt,card,chip,serial,action;
                            df = $("#datefrom").val();
                            dt = $("#dateto").val();                    
                            card = $("#txt_card").val();
                            chip = $("#txt_chip").val();
                            serial = $("#txt_serial").val();
                            action = $("#select_status").val();
                
                            var url = '<?php echo site_url("card_transaction/responses?");?>'+'df='+df+'&dt='+dt+'&card='+card+'&chip='+chip+'&serial='+serial+'&action='+action;                        

                            data_table.clear().draw();
                            $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                            $.getJSON(url, null, function( json )
                            {        
                                data_table.rows.add(json.aaData).draw();
                            });
                        });
                        //END AJAX FORM SUBMIT
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
        </script>
    </body>
</html>
