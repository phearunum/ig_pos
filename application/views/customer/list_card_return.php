
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>  
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        <script type="text/javascript">
            function myFunction(){
                load_data();  
               $(function() {
//                   alert("Export your Data ");
                    if (confirm('Do you want to edit this record?')) {
                    $("#table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "Report Card Return",
                            fileext: ".xls"
                    });
                }
                });
           }
        </script>
        
        <style>
            .hide_me{
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid container-fluid-custom">
            <form class="formSale" id="form">
            <div class="col-md-12">
                <div class="form-group cs-group">
                  <div class="col-sm-2 col-xs-6 col-cs">
                    <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom">
                  </div>
                  <div class="col-sm-2 col-xs-6 col-cs">
                    <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto">
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
                <td colspan="10"  style="font-size: 16px; font-weight: bold;text-align: center;"><?php echo $lbl_title;?></td>
            </tr>  
            <tr>
                <td>
                    <table width="100%" cellspacing="0" class="table-table"  id="table-table" cellpadding="0" border="0">
                        <thead>                            
                            <tr>
                                <th>ID</th>
                                <th><?php echo $lb_customer_name;?></th>
                                <th><?php echo $lb_card_number;?></th>
                                <th><?php echo $lb_serial_number;?></th>
                                <th><?php echo $lb_chip_number;?></th>
                                <th><?php echo $lb_return_amount; ?></th>
                                <th><?php echo $lb_balance; ?></th>
                                <th><?php echo $lb_return_date;?></th>
                                <th><?php echo $lb_recorder; ?></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <td></td>               
                            <td><?php echo $lb_grand_total;?> : </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
    </div>
            <script type="text/javascript">
            $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $( document ).ready(function() {
                        var data_table =    $('#table-table').DataTable({
                                 "bProcessing": false,
                                 "sAjaxSource": "<?php echo site_url("card_return/response_card_return");?>",
                                 "aoColumns": [
                                        { mData: 'transaction_id'},
                                        { mData: 'customer_name'},
                                        { mData: 'customer_card_number'},
                                        { mData: 'customer_card_serial'},
                                        { mData: 'customer_chip'},
                                        { mData: 'transaction_amount'},
                                        { mData: 'transaction_balance'},
                                        { mData: 'transaction_date'},
                                        { mData: 'recorder'},
                                ],  
                                "order": [[ 0, "desc" ]],                                
                                "iDisplayLength": 50,
                                "aoColumnDefs": [
                                        { "sClass": "hide_me", "aTargets": [ 0 ] }                             
                                ],
                                "footerCallback": function (nRow) {
                                    var api = this.api(),data;
                                    // Remove the formatting to get integer data for summation
                                    var intVal = function (i) {
                                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                                    };
                                    //TOTAL BY ROW
                                    total = api.column(5, {
                                            page: 'current'
                                        })
                                            .data()
                                            .reduce(function (total, b) {
                                            var bb = b.replace(/\,/g, '');                                            
                                            return total + parseFloat(bb);   
                                        }, 0);
                                    // END TOTAL BY ROW                                  
                                    total_all = api.column(5, {
                                        page: 'all'
                                    })
                                        .data()
                                        .reduce(function (total, b) {
                                        var bb = b.replace(/\,/g, '');                                            
                                        return total + parseFloat(bb);    
                                        }, 0);
                                    $(api.column(5).footer()).html((total).toFixed(dot_num) + ' Of <span style="color:red">' + (total_all).toFixed(dot_num)+'</span>');

                                    }
                                });
                     $("#form").on('submit',function(e){                        
                        e.preventDefault();
                        var df,dt,card,chip,serial;
                        df = $("#datefrom").val();
                        dt = $("#dateto").val();                    
                        card = $("#txt_card").val();
                        chip = $("#txt_chip").val();
                        serial = $("#txt_serial").val();
                        var url = '<?php echo site_url("card_return/responses_card_return?");?>'+'df='+df+'&dt='+dt+'&card='+card+'&chip='+chip+'&serial='+serial;                        
                        //alert(url);
                        data_table.clear().draw();
                        $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="9" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
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
    <div id="div">

    </div>
    </body>
</html>
