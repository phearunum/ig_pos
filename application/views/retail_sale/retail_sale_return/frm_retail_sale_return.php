<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>PURCHASE RETURN</title>
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
    </head>
<body>
<form class="formSale" action="<?php echo site_url("sale_return/submit"); ?>" method="POST" id="form">
    <table width="100%" cellspacing="0" cellpadding="0" border="1" class="table-form">
        <tr>
            <td colspan="3" style="text-align: center;color: #900;font-size: 20px;background-color:#c7c7c7">SALE RETURN</td>
        </tr>
        <tr>
            <td width="40%" style="vertical-align: top;">
                <table class="table-form" border="1" width="100%">
                    <tr>
                        <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
                    </tr>
                    <tr class="field-title">
                        <td>Field</td>
                        <td>Field Value</td>
                    </tr>
                    <tr>
                        <td>No#</td>
                        <td><input type="text" name="txtno" id="txtno" value="<?php echo $invNo ?>"></td>
                    </tr>
                    <tr>
                        <td>Part Number :</td>
                        <td><input type="text" name="txtpartnumber" id="txtpartnumber" autocomplete="off" onkeypress="if (event.keyCode == 13) {autoselect(this.value); return false;}" placeholder="PART NUMBER"></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td>
                            <input type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="SEARCH PRODUCT">
                        </td>
                    </tr>
                    <tr class="hidden">
                        <td>Product Id<label class="star"> *</label></td>
                        <td><input type="text" name="txtpro_id" id="txtpro_id" placeholder="Product Id"></td>
                    </tr>
                    <tr>
                        <td>Quantity <label class="star"> *</label></td>
                        <td>
                            <input type="number" min="0" id="txtQty" name="txtQty" placeholder="Input quantity" onchange="total()" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Return To Stock<label class="star"> *</label></td>
                        <td>
                            <select name="cbo_stock_location" id="cbo_stock_location" class="cbo-srieng">                        
                                <option value="0">--Stock Name--</option>
                                <?php
                                foreach ($record_stock_location as $rsl){
                                ?>
                                        <option value="<?php echo $rsl->stock_location_id; ?>"><?php echo $rsl->stock_location_name; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Price <label class="star"> *</label></td>
                        <td>
                            <input type="number" min="0" id="txtPrice" name="txtPrice" placeholder="Input price" onchange="total()" autocomplete="off">
                        </td>
                    </tr>
                    <tr class="field-title">
                        <td colspan="2" style="text-align: right">
                            <input type="submit" name="btnSave" class="btn-srieng"  value="+Add"/>
                            <input type="reset" name="btnCacel" class="btn-srieng"  value="Cancel" onclick="back()"/>
                        </td>
                    </tr>
                </table>
            </td>
            <!-- RIGH PANEL-->
            <td style="vertical-align: top;">
                <table width="100%">
                    <tr>
                        <td style="text-align: left;border: solid #000000 1px;">
                            Customer <input type="text" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER">
                            <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;">
                            Date:<input type="date" name="txtreturndate" id="txtreturndate" value="<?php echo $return_date ?>" style="width: 172px;height: 30px" value="now()">
                            Refund Date:<input type="date" name="txtrefunddate" id="txtrefunddate" value="<?php echo $refund_date ?>" style="width: 172px;height: 30px" value="now()">
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: central">
                            Memo:<textarea style="width: 100%;height: 100%" name="txtmemo" id="txtmemo"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%" border="1" class="table-table">          
                                <tr style="background-color: #37773A;">
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total($)</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                $no = 1;
                                $grandtotal = 0;
                                foreach ($s_return_record as $prr) {
                                    $grandtotal = $grandtotal + $prr->total;
                                    ?>
                                    <tr style="color:#000000">
                                        <td width="50px"><?php echo $no ?></td>
                                        <td><?php echo $prr->item_detail_name; ?></td>
                                        <td><?php echo $prr->sale_return_qty; ?></td>
                                        <td><?php echo number_format($prr->sale_return_price, 2) ?></td>
                                        <td><?php echo number_format($prr->total, 2) ?></td>
                                        <td>
                                            <a href="<?php echo site_url('sale_return/sale_return_edit_load/' . $prr->sale_return_id . '/' . $prr->item_detail_id . '/' . $prr->sale_return_qty . '/' . $prr->measure_id.'/'.$prr->sale_return_to_stock); ?>">
                                                Edit
                                            </a>
                                        </td>
                                        <td width="50px">
                                            <a href="<?php echo site_url('sale_return/delete/' . $prr->sale_return_id . "/" . $prr->item_detail_id . "/" . $prr->sale_return_qty.'/'.$prr->sale_return_to_stock."/". $prr->measure_id); ?>" onclick="return confirm('Do you want to delete this record?')">
                                                <img src="<?php echo base_url('img/delete.gif') ?>"/>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $no = $no + 1;
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table cellspacing="0" cellpadding="0" border="1">
                                <tr>
                                    <td>
                                        <fieldset style="margin-top: 10px;">
                                            <b>Grand Total($):</b><input type="number" name="txtgrandtotal" value="<?php echo $grandtotal ?>" id="txtgrandtotal" autocomplete="off" readonly placeholder="" style="width:100px;background-color:#c7c7c7;color:#900;font-weight: bold;">
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right" colspan="2">
                            <input type="submit" name="btnSave" value="Save" class="btn-srieng"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
        </form>      
        <script type="text/javascript">
        $('#txt_product_name').autocomplete({

                    source: function( request, response){
                            $.ajax({
                                    url : '<?php echo site_url("purchase/searchproduct"); ?>',
                                    dataType: "json",
                                    data: {
                                       name_startsWith: request.term,
                                       type: 'product_table',
                                       row_num : 1
                                    },
                                     success: function( data ) {
                                             response( $.map( data, function( item ) {
                                                    var code = item.split("|");
                                                    return {
                                                            label: code[0],
                                                            value: code[0],
                                                            data : item
                                                    }
                                            }));
                                    }
                            });
                    },
                    autoFocus: true,	      	
                    minLength: 0,
                    select: function( event, ui ) {
                            
                            var names = ui.item.data.split("|");						
                            $('#txtpro_id').val(names[1]);
 
                }		      	
            });
            
                       </script> 
                       
        <script type="text/javascript">
            $('#txt_customer_name').autocomplete({
                        source: function( request, response){
                                $.ajax({
                                        url : '<?php echo site_url('retail_sale/searchcustomer') ?>',
                                        dataType: "json",
                                        data: {
                                           name_startsWith: request.term,
                                           type: 'customer_table',
                                           row_num : 1
                                        },
                                         success: function( data ) {
                                                 response( $.map( data, function( item ) {
                                                        var code = item.split("|");
                                                        return {
                                                                label: code[0],
                                                                value: code[0],
                                                                data : item
                                                        }
                                                }));
                                        }
                                });
                        },
                        autoFocus: true,	      	
                        minLength: 0,
                        select: function( event, ui ) {

                                var names = ui.item.data.split("|");						
                                $('#txtcustomer_id').val(names[1]);
                    }		      	
            }); 
           </script>
    </body>
</html>
