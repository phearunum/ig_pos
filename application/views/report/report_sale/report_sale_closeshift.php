<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function myFunction() {
                $(function () {
                    alert("Export your Data ");
                    $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "Report Sale By Category",
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
                        <input type="text" class="form-control" placeholder="FROM:YYYY-MM-DD" name="datefrom" id="datefrom" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <input type="text" class="form-control" placeholder="TO:YYYY-MM-DD" name="dateto" id="dateto" autocomplete="off">
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="branch" id="branch" class="form-control">
                           <option value="0">--All Branch--</option>
                            <?php
                                foreach($branch as $b){
                            ?>
                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                            <?php
                              }
                            ?>
                        </select>
                      </div>
                       <div class="col-sm-4 col-xs-6 col-cs">
                        <select name="shift_id" id="shift_id" class="form-control">
                           <option value="0">--Shift--</option>
                        </select>
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
        <table width="100%" align="center" cellspacing="0" class="table-table"  id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th>item Type</th>
                    <th><?php echo $lbl_product_name ?></th>
                    <th><?php echo $lbl_part_number; ?></th>
                    <th><?php echo $lbl_qty ?></th>
                    <th><?php echo $lbl_tax; ?></th>
                    <th><?php echo $lbl_discount; ?></th>
                    <th><?php echo $lbl_total ?></th>
                    <th>Branch</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot class="grand_total">
            <td></td>
            <td><?php echo $lbl_grand_total;?>:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tfoot>
    </table>
    </div>
</body>
<script type="text/javascript">
   
    $(document).ready(function () {
        var data_table=$('#table-table').DataTable({
            "bProcessing": false,
            "sAjaxSource": '<?php echo site_url("report_sale_closeshift/response/"); ?>',
            "aoColumns": [
                {mData: 'item_type_name'},
                {mData: 'item_detail_name'},
                {mData: 'part_number'},
                {mData: 'qty'},
                {mData: 'tax'},
                {mData: 'discount'},
                {mData: 'grandtotal'},
                {mData: 'branch_name'}
            ],
            "iDisplayLength": 50,
            "columnDefs": [
                {"visible": false, "targets": 0}
            ],
            "order": [[0, 'asc']],
            "displayLength": 25,
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
                            total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(3,{page:'current'}).data()[i]);
                            total[group_assoc][1]=total[group_assoc][1]+intVal(api.column(4,{page:'current'}).data()[i]);
                            total[group_assoc][2]=total[group_assoc][2]+intVal(api.column(5,{page:'current'}).data()[i]);
                            total[group_assoc][3]=total[group_assoc][3]+intVal(api.column(6,{page:'current'}).data()[i]);
                        }else{
                            total[group_assoc] =  new Array();
                            total[group_assoc][0]=intVal(api.column(3,{page:'current'}).data()[i]);
                            total[group_assoc][1]=intVal(api.column(4,{page:'current'}).data()[i]);
                            total[group_assoc][2]=intVal(api.column(5,{page:'current'}).data()[i]);
                            total[group_assoc][3]=intVal(api.column(6,{page:'current'}).data()[i]);
                        }
                        var j = i;
                        if ( last !== group ) {
                            //var masterid = api.column(0,{page:'current'}).data()[i];
                            ///
                            var dataGroup='<tr class="group"><td colspan="2">'+group+'</td><td></td><td></td><td></td><td></td><td></td></tr>';
                            j=j+1;
                            if(j!=1){
                                var dataGroupTotal='<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td class="'+data_group[i-1]+'_qty"></td><td class="'+data_group[i-1]+'_Vat"></td><td class="'+data_group[i-1]+'_Discount"></td><td class="'+data_group[i-1]+'_Grand"></td><td></td></tr>';
                               $(rows).eq( i ).before(dataGroupTotal);
                            }
                            $(rows).eq( i ).before(dataGroup);
                            last = group;                     
                        }
                    });
                    var CategoryLeng = data_group.length;
                    $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td class="'+data_group[CategoryLeng-1]+'_qty"></td><td class="'+data_group[CategoryLeng-1]+'_Vat"></td><td class="'+data_group[CategoryLeng-1]+'_Discount"></td><td class="'+data_group[CategoryLeng-1]+'_Grand"></td><td></td></tr>');
                for(var key in total) {
                        $("."+key+'_qty').html(total[key][0]);
                        $("."+key+'_Vat').html(total[key][1].toFixed(dot_num));
                        $("."+key+'_Discount').html(total[key][2].toFixed(dot_num));
                        $("."+key+'_Grand').html(total[key][3].toFixed(dot_num));
                }
            },
            "footerCallback": function (nRow) {
                var api = this.api(), data;
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                //TOTAL BY ROW
                qty = api.column(3, {
                    page: 'current'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                qty_all = api.column(3, {
                    page: 'all'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                vat = api.column(4, {
                    page: 'current'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                vat_all = api.column(4, {
                    page: 'all'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                discount = api.column(5, {
                    page: 'current'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                discount_all = api.column(5, {
                    page: 'all'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                grand_total = api.column(6, {
                    page: 'current'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                 grand_total_all = api.column(6, {
                    page: 'all'
                })
                        .data()
                        .reduce(function (total, b) {
                            var bb = b.replace(',', '');

                            return total + parseFloat(bb);
                        }, 0);
                // END TOTAL BY ROW                                   

                var nCells = nRow.getElementsByTagName('td');


                nCells[2].innerHTML = qty.toFixed(0)+' of '+qty_all.toFixed(0);
                nCells[3].innerHTML = vat.toFixed(dot_num)+' of '+vat_all.toFixed(dot_num);
                nCells[4].innerHTML = discount.toFixed(dot_num)+' of '+discount_all.toFixed(dot_num);
                nCells[5].innerHTML = grand_total.toFixed(dot_num)+' of '+grand_total_all.toFixed(dot_num);
            }
        });
        //AJAX FORM SUBMIT
        $("#form").on('submit', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url  = '<?php echo site_url("report_sale_closeshift/responses?"); ?>';
             data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="11" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, data, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
        });
        //END AJAX FORM SUBMIT
        $("#branch").change(function(event) {
            SearchShift();
        });
    });
    function SearchShift(){
        if($('#datefrom').val()!="" && $('#dateto').val()!=""){
           $.ajax({
               url: '<?php echo site_url("report_sale_closeshift/ResponeShiftTimes") ?>',
               type: 'POST',
               dataType: 'json',
               async:false,
               data: {datefrom: $('#datefrom').val(),dateto:$('#dateto').val(),branch:$('#branch').val()},
           })
           .done(function(json) {
               //var json = $.parseJSON(respone);
                $("#shift_id").empty();
                $('#shift_id').append('<option value="0">Select Shift</option>');
                $.each(json,function(i,item) {
                    $('#shift_id').append('<option value="'+item.cash_id+'">'+item.cash_startdate + ' > ' +item.cash_enddate+'</option>')
                });
           })
           .fail(function() {
               console.log("error");
           })           
        }
    }
</script>
</html>
