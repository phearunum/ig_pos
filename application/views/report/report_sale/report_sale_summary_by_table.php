<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script type="text/javascript">
            function exp_excel() {
                $("#table-table").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "REPORT SALE BY TABLE",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true
                    });
            }
           
        </script>
        <script type="text/javascript">
                    $(document).ready(function(){
                $('#branch').change(function(){
                var id=$(this).val();
                var dataString = 'id='+ id;
                if(id>0){
                     $('#cbo_floor').html('<option value="0">--Floor Name--</option>');
                    
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url("report_sale_summary_by_table/getFloor"); ?>"+"/"+id,
                                data: dataString,
                                cache: false,
                                success: function(html){
                            var json=JSON.parse(html);
                            $.each(json,function(i,v){
                                $('#cbo_floor').append('<option value="'+v.floor_id+'">'+v.floor_name+'</option>');
                            })
                        }
                    })
                }else{
                    $('#cbo_floor').html('<option value="0">--Floor Name--</option>');
                    $('#cbo_table_name').html('<option value="0">--Table--</option>');
                }
                
            });


                        $("#cbo_floor").change(function(){
                            var id=$(this).val();
                            var dataString = 'id='+ id;
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url("report_sale_summary_by_table/loadTable"); ?>",
                                data: dataString,
                                cache: false,
                                success: function(html)
                                {
                                    var json = JSON.parse(html);
                                    if(json.length >0){

                                        $("#cbo_table_name").html('<option value="0"><?php echo $lbl_table; ?></option>');
                                        $.each(json, function(index, val) {
                                             $("#cbo_table_name").append('<option value="'+val.layout_id+'">'+val.layout_name+'</option>');
                                        });
                                    }
                                    else{

                                        $("#cbo_table_name").html('<option value="0"><?php echo $lbl_table; ?></option>');
                                    }
                                } 
                            });
                       });

                  });
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
                           <option value="0">--<?php echo $lbl_branch; ?>--</option>
                            <?php
                                foreach($branch as $b){
                            ?>
                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                            <?php
                              }
                            ?>
                        </select>
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cbo_floor" id="cbo_floor" class="form-control">                        
                            <option value="0">--<?php echo "Floor Name"; ?>--</option>
                            <?php
                            foreach ($record_floor as $rf){
                            ?>
                                    <option value="<?php echo $rf->floor_id; ?>"><?php echo $rf->floor_name; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-2 col-xs-6 col-cs">
                        <select name="cbo_table_name" id="cbo_table_name" class="form-control">                        
                            <option value="0"><?php echo $lbl_table; ?></option>        
                        </select>   
                      </div>
                      
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="submit" name="btn_search" class="btn btn-primary btn-block" id="btn_search"><i class="fa fa-search"></i> <?php echo $btn_search; ?></button>
                      </div>
                      <div class="col-sm-1 col-xs-6 col-cs">
                        <button type="button" class="btn btn-danger btn-block" name="btnexport"  id="btnexport" onclick="exp_excel()"><i class="fa fa-arrow-circle-down"></i> <?php echo $btn_export; ?></button>
                      </div>
                     <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <h3 class="text-center text-primary"><?php echo $lbl_title;?></h3>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
            <thead>
                <tr>
                    <th><?php echo $lbl_table; ?></th>
                    <th><?php echo $lbl_table; ?></th>
                    <th><?php echo $lbl_invoice_no; ?></th>
                    <th><?php echo $lbl_total; ?></th>
                    <th><?php echo $lbl_branch; ?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    $("#datefrom").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $("#dateto").datepicker({dateFormat: 'yy-mm-dd', showButtonPanel: true});
    $(document).ready(function (){
        var data_table=$('#table-table').DataTable({
            "bProcessing": false,
            "sAjaxSource": "<?php echo site_url("report_sale_summary_by_table/response/"); ?>",
            "aoColumns": [
                {mData: 'table_name'},
                {mData: 'table_name'},
                {mData: 'invoice_no'},
                {mData: 'grandtotal'},
                {mData: 'branch_name'}
            ],
            "iDisplayLength": 50,
            "lengthMenu": [[10, 25, 50,-1], [ 10, 25, 50, "ALL"]],
            "order": [[ 0, 'asc' ]],
            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        return null;
                    },
                    "targets": [ 1 ]
                },
                {
                    "targets": [ 0 ],
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
                        data_group[i]=group_assoc;
                        if(typeof total[group_assoc] != 'undefined'){
                            total[group_assoc][0]=total[group_assoc][0]+intVal(api.column(3,{page:'current'}).data()[i]);
                        }else{
                            total[group_assoc] =  new Array();
                            total[group_assoc][0]=intVal(api.column(3,{page:'current'}).data()[i]);
                        }
                        var j = i;
                        if ( last !== group ) {
                            var dataGroup='<tr class="group"><td>'+group+'</td><td></td><td></td><td></td></tr>';
                            j=j+1;
                            if(j!=1){
                                var dataGroupTotal='<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td class="total_'+data_group[i-1]+'"></td><td></td></tr>';
                               $(rows).eq( i ).before(dataGroupTotal);
                            }
                            $(rows).eq( i ).before(dataGroup);
                            last = group;                     
                        }
                    });
                    var CategoryLeng = data_group.length;
                    $(rows).eq(CategoryLeng-1).after('<tr class="group_footer"><td colspan="2"><?php echo $lbl_sub_total;?> :</td><td class="total_'+data_group[CategoryLeng-1]+'"></td><td></td></tr>');
                    for(var key in total) {
                        $(".total_"+key).html(total[key][0].toFixed(dot_num));
                    }
                }
        });
        
        $("#form").on('submit',function(e){
                e.preventDefault();
                var data= $(this).serialize();
                var url='<?php echo site_url("report_sale_summary_by_table/responses?");?>';

                data_table.clear().draw();
                $(data_table.table().body()).html('<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></td></tr>');
                $.getJSON(url, data, function( json )
                {        
                    data_table.rows.add(json.aaData).draw();
                });
            });
        //END AJAX FORM SUBMIT
        });
</script>
</html>
