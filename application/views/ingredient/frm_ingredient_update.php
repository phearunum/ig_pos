<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>  
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        <style type="text/css">
            .table tbody > tr > td, .table tfoot > tr > td {
                padding: 8px;
                line-height: 1.428571429;
                vertical-align: top;
                /*border-top: 1px solid #bf1010;*/
            }
            .table-table th {
            color: #FFFFFF;
            background-color: #137b80;
        }
        .form-title {
          
            text-align: center;
            text-transform: uppercase;
            border: none;
            background-color: #FFFFFF;
            color: black;
           
        }
        .field-title {
            background-color: #efefef;
            font-size: 14px;
            color: #FFFFFF;
        }
        #txt_product_name{
          width: 400px;
          padding: 7px ;
          border: 1px solid #ccc;
          border-radius: 4px;
        
        }
       /* td {
         font-weight: bold;
        }*/
        </style>
    </head>
    <body>
        
        
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
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>  
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
    </head>
    <body>
           
<form class="formSale" action="<?php echo site_url("ingredient/save"); ?>" method="POST" id="form">
     <table  class="table table-responsive table-bordered" width="100%" cellspacing="0" cellpadding="0" border="1" style="font-family: Calibri;font-size: 15px;">
        <tr>
            <td colspan="2" class="form-title"><?php echo $lbl_ingredient_title;?></td>
        </tr>
        <tr>
            <td width="30%" class="v-align">
                <table width="100%" class="table-form">
                    <tr>
                        <td colspan="2" class="form-note"><label class="star"> *</label><?php echo $lbl_note_for_form;?></td>
                    </tr>
                    <tr class="field-title">
                  
                    </tr>
                    <tr class="hidden">
                        <td>Ingredient Nº</td>
                        <td><input type="text" name="txtno" id="txtno" value="<?php echo $ingredient_no ?>"></td>
                    </tr>
                    <tr class="hidden">
                        <td>Ingredient</td>
                        <td>
                            <select name="select_ingredient" id="select_ingredient" class="cbo-srieng">                        
                                <option value="0">--Ingredient--</option>
                                <?php
                                foreach ($records_ingredient as $rt) {
                                    ?>
                                    <option value="<?php echo $rt->item_detail_id; ?>"><?php echo $rt->item_detail_name; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $lbl_ingredient;?></td>
                        <td>
                            <input class="form-control" type="text" name="txt_ingredient" id="txt_ingredient" required>
                            <input type="text" name="txt_ingredient_id" id="txt_ingredient_id"  required hidden >
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $lbl_qty;?></td>
                        <td>
                            <input class="form-control" type="text" name="txt_qty" id="txt_qty" autocomplete="off" value="0" class="my_blur allow-decimal" required>
                        </td>
                       

                    </tr>


                    <tr>
                        <td></td>
                        <td><label style="color: #137b80; font-family: bold; " id="lbl_measuer"></label></td>
                       

                    </tr>

                    <tr class="hidden">
                        <td>Measure <label class="star"> *</label></td>
                        <td>
                            <select name="cbo_measure" id="cbo_measure" class="cbo-srieng">                        
                                <option value="0">--Measure--</option>
                                <?php
                                foreach ($record_measure as $rt) {
                                    ?>
                                    <option value="<?php echo $rt->measure_id; ?>"><?php echo $rt->measure_name; ?></option>
                                <?php } ?>
                            </select>
                            <a href="<?php echo site_url('measure/addnew'); ?>">New</a>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $lbl_desc;?></td>
                        <td> 
                            <input class="form-control" type="text"  name="txt_description" id="txt_description" class="txt-address">
                        </td>
                    </tr>

                    <tr class="field-title">
                        <td colspan="2" style="text-align: right">
                            <input type="button" name="btnSave" id="btn_add" class="btn btn-primary"  value="+<?php echo $btn_add;?>"/>
                            <input type="button" name="btn_clear" id="btn_clear" class="btn btn-primary"  value="<?php echo $btn_clear;?>" />
                            <input type="reset" name="btnCacel" class="btn btn-danger"  value="<?php echo $btn_cancel;?>" onclick="back()"/>
                            
                        </td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: top;">
                <table width="100%" class="table-form">
                        <tr>
                            <td colspan="2">
                            <?php echo $lbl_food_name;?>
                            <input type="text" name="txt_product_name" id="txt_product_name" readonly value="<?php echo $item_name?>" autocomplete="off" placeholder="SEARCH PRODUCT">
                            
                        </tr>
                        <tr class="hidden">
                            <td>Product Id<label class="star"> *</label></td>
                            <td><input type="text" name="txtpro_id" id="txtpro_id" value="<?php echo $id?>" placeholder="Product Id"></td>
                        </tr>
                        <tr class="hidden">
                            <td>Edit id<label class="star"> *</label></td>
                            <td><input type="text" name="txt_inc_id" id="txt_inc_id" placeholder="Inc Id"></td>
                        </tr>
                        <tr class="hidden">
                            <td>No<label class="star"> *</label></td>
                            <td><input type="text" name="txt_no" id="txt_no" value="<?php echo $no;?>" placeholder="No"></td>
                        </tr>
                    <tr>
                        <td colspan="2">

                            <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0">
                                <thead>
                                    <tr style="background-color: #37773A;">
                                        <th>No</th>
                                        <th>Ingredient Name</th>
                                        <th>Qty</th>
                                        <th>Description</th>
                                        <th class="hidden">Measure</th>
                                        <th style="text-align:  center;"><?php echo $lbl_action;?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                
                                
                            </table>
                       </td>
                    </tr>
                    <tr>
                        <td style="text-align: right" colspan="2">
                            <input type="button" name="btnSave" id="btnSave" value="Save" class="btn-srieng hidden"/>
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
        </table>
        </form>
        <script type="text/javascript">
            var lbl="";
          $(document).ready(function () {
            var id='<?php echo $id?>';
                load_data(id);
          });

        function load_data(id) {
            $('#table-table tbody').html('');
        var post_url = '<?php echo site_url('ingredient/load_all') ?>'+'/'+id;
       
       
      
        $.ajax({
            type: 'POST',
            dataType: "text",
            url: post_url,
            async: false,
            data: {'item_id': id},
            success: function (response) {
                 
                   
                if (response.trim() !== '[]' || response.trim() !== '') {
                        
                        var html_str="";
                        var list = JSON.parse(response);
                        for (var i = 0; i < list.length; i++) {
                             var edit_del='<td class="text-center"><a onclick="edit('+list[i].item_detail_id+','+"'"+list[i].ingredient_name+"'"+','+list[i].ingredient_qty+','+"'"+list[i].ingredient_desc+"'"+')" class="btn btn-info btn-xs" href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> <a onclick="del('+list[i].ingredient_id+')" href="javascript:void(0)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Del</a></td>';



                            html_str='<tr><td>'+(i+1)+'</td><td>'+list[i].ingredient_name+'</td><td>'+list[i].ingredient_qty+'</td>'+'<td>'+list[i].ingredient_desc+'</td>'+edit_del+'</tr>';


                             $('#table-table tbody').append(html_str);
                        }
                        
                       
                        
                    
                       
                }
            }
            ,
            error: function (response) {
                alert('Unable to load sale data!!');
            }
        });
    }

        $('.my_blur').on('blur',function(){
            var vals=$(this).val();
            if(vals=="" || vals==null){
              $(this).val(0);
            }
        });

        $('.allow-decimal').bind("paste", function (e) {
            var text = e.originalEvent.clipboardData.getData('Text');
            if ($.isNumeric(text)) {
                if ((text.substring(text.indexOf('.')).length > 4) && (text.indexOf('.') > -1)) {
                    e.preventDefault();
                    $(this).val(text.substring(0, text.indexOf('.') + 3));
                }
            } else {
                e.preventDefault();
            }
        });

        $('.allow-decimal').keypress(function (event) {
    var $this = $(this);
    if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
            ((event.which < 48 || event.which > 57) &&
                    (event.which != 0 && event.which != 8))) {
        event.preventDefault();
    }

    var text = $(this).val();
    if ((event.which == 46) && (text.indexOf('.') == -1)) {
        setTimeout(function () {
            if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
            }
        }, 1);
    }

    if ((text.indexOf('.') != -1) &&
            (text.substring(text.indexOf('.')).length > 3) &&
            (event.which != 0 && event.which != 8) &&
            ($(this)[0].selectionStart >= text.length - 2)) {
        event.preventDefault();
    }
});
       /* $('#btnSave').on('click',function(){
            var pro_name=$('#txt_product_name').val();
            if(pro_name=="" || pro_name==null){
                alert('Food Name Not allow Empty!!');
                return false;
            }
            save();

        });*/

        $('#btn_add').on('click',function(){
//            var inc=$('#select_ingredient').val();
//            if(inc==0){
//                alert('Please select Ingredient !!');
//                return false;
//            }
            var inc=$('#txt_ingredient').val();
            if(inc==0){
                alert('Please select Ingredient !!');
                return false;
            }
            
            save();

        });


        $('#btn_clear').on('click',function(){
            clear();
        })

        function save(){
            var r = confirm("Are you sure to save this ingredient?");
            if (r == false) {
                return;
            }
            var item_id=$('#txtpro_id').val();
            // alert(item_id);


            // alert(item_id);
            //var inc=$('#select_ingredient').val();
            var inc=$('#txt_ingredient_id').val();
            //alert(inc);
            var qty=$('#txt_qty').val();
            var no=$('#txtno').val();
            var edit_id=$('#txt_inc_id').val();
            var des=$("#txt_description").val();

            // alert(edit_id);
                //var thead=$("table").find("thead").find("tr").find("th").length;      
               
                //alert(data);
                var post_url = '<?php echo site_url('ingredient/save_update') ?>';
                 $.ajax({
                    type: 'POST',
                    url: post_url,
                    ContentType: 'application/json',              
                    data: {'item_id':item_id,'inc': inc,'no':no,'qty':qty,'edit_inc':edit_id,'des':des},                    
                    success: function (data) { 

                        var json = $.parseJSON(data);
                        console.log(data);

                        if (json.statusCode != 'E0001') {
                            alert(json.message);
                            
                            load_data(item_id);
                            clear();
                            

                        } else {
                            alert(json.message);

                        }
                         //$('#save_po').loadingBtnComplete({html: "<i class='fa fa-fw fa-lg fa-check-circle'></i>Save"});
                    },
                    error: function (data) {
                        alert('error');
                    }
                });

        }
        $('#txt_ingredient').autocomplete({

                    source: function( request, response){
                            $.ajax({
                                    url : '<?php echo site_url("ingredient/searchproduct"); ?>',
                                    dataType: "json",
                                    data: {
                                       name_startsWith: request.term,
                                       type: 'ingredient_table',
                                       row_num : 1
                                    },
                                     success: function( data ) {
                                             response( $.map( data, function( item ) {
                                                    var code = item.split("|");
                                                    return {
                                                            label: code[1],
                                                            value: code[1],
                                                            data : item
                                                    }
                                            }));
                                    }
                            });
                    },
                    autoFocus: true,	      	
                    minLength: 0,
                    /*select: function( event, ui ) {
                            
                            var names = ui.item.data.split("|");						
                            $('#txtpro_id').val(names[1]);
 
                }	*/   
                change:function(event,ui){
                    if(ui.item===null){
                        $(this).val('');
                        $('#txt_ingredient_id').val('');
                    }else{
                        var names = ui.item.data.split("|");                        
                         $('#txt_ingredient_id').val(names[0]);
                         // $('#txt_inc_id').val(names[0]);
                         var lbl=$("#lbl_measuer").text("Ingredient Measure : "+names[3]);
                    }
                }   	
            });
        function del(inc){
            var r = confirm("Are you sure to delete!");
            if (r == false) {
                return;
            }
            var item_id=$('#txtpro_id').val();
            //var inc=$('#select_ingredient').val();
            var post_url = '<?php  echo site_url('ingredient/delete') ?>';
                 $.ajax({
                    type: 'POST',
                    url: post_url,
                    ContentType: 'application/json',              
                    data: {'item_id':item_id,'inc': inc},                    
                    success: function (data) {

                        var json = $.parseJSON(data);
                        console.log(data);

                        if (json.statusCode != 'E0001') {
                            alert('success');
                            
                            load_data(item_id);
                            clear();
                            

                        } else {
                            alert(json.message);

                        }
                         //$('#save_po').loadingBtnComplete({html: "<i class='fa fa-fw fa-lg fa-check-circle'></i>Save"});
                    },
                    error: function (data) {
                        alert('error');
                    }
                });

        }
        function edit(inc,inc_name,qty,des){
            //$('#select_ingredient').val(inc);
            $('#txt_ingredient').val(inc_name);
            $('#txt_ingredient_id').val(inc);
            $("#txt_description").val(des);
             
            $.ajax({
                  method:"GET",
                  url: "<?=site_url('Ingredient/get_measure_name')?>",
                  cache: false,
                  data:{'ingredient_id':inc},

                  success: function(data){
                    // alert(data);

                    var json  = JSON.parse(data);

                    $("#lbl_measuer").text("Ingredient Measure :"+json);
                  }
                });

            $('#txt_qty').val(qty);
            $('#txt_inc_id').val(inc);
        }
        function clear(){
            $('#select_ingredient').val(0);
            $('#txt_ingredient').val("");
            $('#txt_ingredient_id').val(0);
            $('#txt_qty').val(0);
            $('#txt_description').val('');
            $('#txt_inc_id').val('');
            $("#lbl_measuer").text("");
        }
        </script>
        
    </body>
</html>
