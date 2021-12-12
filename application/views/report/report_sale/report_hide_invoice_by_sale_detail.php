<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <style>
            .ellipsis {
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
            .text-left{
                text-align: left !important;
            }
        </style>
        <script type="text/javascript">
                function myFunction() {
                    $("#table-table").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "REPORT SALE DETAIL",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true
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
                        <input type="text" class="form-control" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER">
                        <input type="hidden" name="txtcustomer_id" id="txtcustomer_id">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" name="txt_invoice_no" id="txt_invoice_no" placeholder="INVOICE NO">
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="myFunction()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h4 class="text-center"><?php echo $lbl_title;?></h4>
        <table width="100%" align="center" cellspacing="0" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th>Master ID</th>
                    <th>Invoice No</th>
                    <th><?php echo $lbl_customer;?></th>
                    <th><?php echo $lbl_customer_card;?></th>
                    <th>Date</th>
                    <th><?php echo $lbl_item_name;?></th>
                    <th><?php echo $lbl_qty;?></th>
                    <th><?php echo $lbl_price;?></th>
                    <th><?php echo $lbl_current_cost;?></th>
                    <th><?php echo $lbl_total;?></th>
                    <th><?php echo $lbl_discount;?></th>
                    <th><?php echo $lbl_vat;?></th>
                    <th><?php echo $lbl_service_charge;?></th>
                    <th><?php echo $lbl_grand_total;?></th>
                    <th><?php echo "Action";?></th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
                <tr>
                    <td></td>
                    <td colspan="3"><?php echo $lbl_grand_total;?>:</td>
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
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
        <script type="text/javascript">
        $(document).ready(function(){
            var data_table=$('#table-table').DataTable({
                "bProcessing": false,
                "sAjaxSource": "<?php echo site_url('sale_detail/response/'); ?>",
                "aoColumns": [
                    {mData: 'master_id'},
                    {mData: 'invoice_no'},
                    {mData: 'customer'},
                    {mData: 'customer_card'},
                    {mData: 'end_date'},
                    {mData: 'item_name'},
                    {mData: 'qty'},
                    {mData: 'unit_price'},
                    {mData: 'unit_cost'},
                    {mData: 'sub_total'},
                    {mData: 'total_discount_dollar'},
                    {mData: 'tax_amount'},
                    {mData: 'service_charge_amount'},
                    {mData: 'grand_total'},
                    {mData: 'master_status'}
                ],
                "iDisplayLength": 50,
                "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
                "order" : [[1,"desc"]],
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "orderable":false
                    },
                    {
                        "targets": [ 1 ],
                        "visible": false,
                        "orderable":false
                    },
                    {
                        "targets": [ 2 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 3 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 4 ],
                        "visible": false,
                        "orderable":false
                    },
                    {
                        "targets": [ 5 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 6 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 7 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 8 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 9 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 10 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 11 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 12 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 13 ],
                        "orderable":false
                    },
                    {
                        "targets": [ 14 ],
                        "orderable":false,
                        "visible":false
                    }
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

                    api.column(0, {page:'current'} ).data().each( function ( group, i ) {
                        group_assoc=group.replace(/[^a-zA-Z0-9 ]/g, "").replace(/ /g, '_');
                        //console.log(group_assoc);
                        data_group[i]=group_assoc;
                        if(typeof total[group_assoc] != 'undefined'){
                            total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(6,{page:'current'}).data()[i]);
                            total[group_assoc][1]=total[group_assoc][1]+intVal(api.column(9,{page:'current'}).data()[i]);
                            total[group_assoc][2]=total[group_assoc][2]+intVal(api.column(10,{page:'current'}).data()[i]);
                            total[group_assoc][3]=total[group_assoc][3]+intVal(api.column(11,{page:'current'}).data()[i]);
                            total[group_assoc][4]=total[group_assoc][4]+intVal(api.column(12,{page:'current'}).data()[i]);
                            total[group_assoc][5]=total[group_assoc][5]+intVal(api.column(13,{page:'current'}).data()[i]);
                        }else{
                            total[group_assoc] =  new Array(5);
                            total[group_assoc][0]=intVal(api.column(6,{page:'current'}).data()[i]);
                            total[group_assoc][1]=intVal(api.column(9,{page:'current'}).data()[i]);
                            total[group_assoc][2]=intVal(api.column(10,{page:'current'}).data()[i]);
                            total[group_assoc][3]=intVal(api.column(11,{page:'current'}).data()[i]);
                            total[group_assoc][4]=intVal(api.column(12,{page:'current'}).data()[i]);
                            total[group_assoc][5]=intVal(api.column(13,{page:'current'}).data()[i]);
                        }
                        var j = i;
                        if ( last !== group ) {
                            var rowData = api.column(1,{page:'current'}).data()[i]+' (Date: '+api.column(4,{page:'current'}).data()[i]+')';
                            var master_status = api.column(14,{page:'current'}).data()[i];
                            //var rowData_1 = api.column(11,{page:'current'}).data()[i];
                            var dataGroup='<tr class="group"><td colspan="2">'+rowData+'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                            ///
                            j=j+1;
                            if(j!=1){
                                var dataGroupTotal='<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td></td><td class="'+data_group[i-1]+'_qty"></td><td></td><td></td><td class="'+data_group[i-1]+'_Total"></td><td class="'+data_group[i-1]+'_Discount"></td><td class="'+data_group[i-1]+'_Tax"></td><td class="'+data_group[i-1]+'_Charge"></td><td class="'+data_group[i-1]+'_Grand"></td></tr>';
                               $(rows).eq( i ).before(dataGroupTotal);
                            }
                            $(rows).eq( i ).before(dataGroup);
                            last = group;                     
                        }
                    });
                    var CategoryLeng = data_group.length;
                    $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td></td><td class="'+data_group[CategoryLeng-1]+'_qty"></td><td></td><td></td><td class="'+data_group[CategoryLeng-1]+'_Total"></td><td class="'+data_group[CategoryLeng-1]+'_Discount"></td><td class="'+data_group[CategoryLeng-1]+'_Tax"></td><td class="'+data_group[CategoryLeng-1]+'_Charge"></td><td class="'+data_group[CategoryLeng-1]+'_Grand"></td></tr>');
                    for(var key in total) {
                        $("."+key+'_qty').html(total[key][0]);
                        $("."+key+'_Total').html(total[key][1].toFixed(2));
                        $("."+key+'_Discount').html(total[key][2].toFixed(2));
                        $("."+key+'_Tax').html(total[key][3].toFixed(2));
                        $("."+key+'_Charge').html(total[key][4].toFixed(2));
                        $("."+key+'_Grand').html(total[key][5].toFixed(2));
                    }
                },
                "footerCallback": function (nRow) {
                    var api = this.api(), data;
                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };
                    //TOTAL BY ROW
                   qty = api.column(6, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    total = api.column(9, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    discount = api.column(10, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    vat = api.column(11, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    charge = api.column(12, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    grand_total = api.column(13, {
                        page: 'current'
                    })
                            .data()
                            .reduce(function (total, b) {
                                var bb = b.replace(',', '');

                                return total + parseFloat(bb);
                            }, 0);
                    // END TOTAL BY ROW                                   

                    /* Modify the footer row to match what we want */
                    var nCells_2 = nRow.getElementsByTagName('td');
                    /*var nCells_4 = nRow.getElementsByTagName('td');
                    var nCells_5 = nRow.getElementsByTagName('td');
                    var nCells_6 = nRow.getElementsByTagName('td');*/

                    nCells_2[2].innerHTML = qty;
                    nCells_2[5].innerHTML = total.toFixed(2);
                    nCells_2[6].innerHTML = discount.toFixed(2);
                    nCells_2[7].innerHTML = vat.toFixed(2);
                    nCells_2[8].innerHTML = charge.toFixed(2);
                    nCells_2[9].innerHTML = grand_total.toFixed(2);
                }
            });
            //AJAX FORM SUBMIT
            $("#form").on('submit', function (e) {
                e.preventDefault();
                var url  = '<?php echo site_url("sale_detail/responses/"); ?>';
                var data = $(this).serialize();

                 data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="11" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, data, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
            });
            //END AJAX FORM SUBMIT
            $("#txt_customer_name").on('blur',function(){
                if($(this).val()=='')
                    $('#txtcustomer_id').val("");
            });
            //hide / show
        });
        </script>
        <script type="text/javascript">
   
        $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
        </script>
        <script type="text/javascript">
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
