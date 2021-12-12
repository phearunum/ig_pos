<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>SALE RETAIL</title>
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
        <script type="text/javascript"> 
             function total(){
                  document.getElementById("txtTotal").value=(document.getElementById("txtQty").value * document.getElementById("txtPrice").value);  
             }
        </script>
    </head>
    <body>
<?php
    //foreach($permission as $p){
?>
           
<form class="formSale" action="<?php echo site_url("retail_sale/submit"); ?>" method="POST" id="form">
    <table width="100%" cellspacing="0" cellpadding="0" border="1" class="table-form">
        <tr class="field-title">
            <td colspan="3" style="text-align: center;font-size: 20px;font-weight: bold;">RETAIL SALE</td>
        </tr>
        <tr>
            <td width="30%" style="vertical-align: top;">
                <table class="table-form" width="100%">
                    <tr>
                        <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
                    </tr>
                    <tr class="field-title">
                        <td>Field</td>
                        <td>Field Value</td>
                    </tr>
                    <tr>
                        <td>Invoice R#</td>
                        <td><input type="text" style="color:#ff0000" name="txtinvoice_no" id="txtinvoice_no" value="<?php echo str_pad($invNo, 5, '0', STR_PAD_LEFT); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Part#</td>
                        <td><input type="text" name="txtpartnumber" id="txtpartnumber" autocomplete="off" onkeypress="if (event.keyCode == 13) {autoselect(this.value); return false;}" placeholder="PART NUMBER"></td>
                    </tr>
                    <tr>
                        <td>Item Name</td>
                        <td>
                            <input type="text" name="txt_product_name" id="txt_product_name" autocomplete="off" placeholder="SEARCH PRODUCT">
                            <a href="<?php echo site_url('item_detail/addnew'); ?>">New</a>
                        </td>
                    </tr>
                    <tr class="hidden">
                        <td>Product Id<label class="star"> *</label></td>
                        <td><input type="text" name="txtpro_id" id="txtpro_id" placeholder="Product Id"></td>
                    </tr>
                    <tr>
                        <td>Quantity<label class="star"> *</label></td>
                        <td>
                            <input type="number" min="0" id="txtQty" name="txtQty"  placeholder="Input quantity" onchange="total()" autocomplete="off">
                            <input type="text" name="txtstockqtydisplay" id="txtstockqtydisplay" value="" readonly style="width: 100px;font-size: 15px;font-weight: bold;border:none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Measure <label class="star"> *</label></td>
                        <td>
                            <select name="cbo_measure" id="cbo_measure" class="cbo-srieng">                        
                                <option value="0">--Measure--</option>
                                <?php
                                foreach ($record_measure as $rt){
                                ?>
                                        <option value="<?php echo $rt->measure_id; ?>"><?php echo $rt->measure_name; ?></option>
                                <?php } ?>
                            </select>
                            <a href="<?php echo site_url('measure/addnew'); ?>">New</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Price<label class="star"> *</label></td>
                        <td>
                            <input type="number" min="0" id="txtPrice" name="txtPrice" placeholder="Input price"  onchange="total()" autocomplete="off">
                            <input type="text" name="txtpricedisplay" id="txtpricedisplay" value="" readonly style="width: 100px;font-size: 15px;font-weight: bold;border:none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Discount(%) :</td>
                        <td>
                            <input type="number" min="0" id="txtDiscount" name="txtDiscount" placeholder="Input Discount" onchange="total()" autocomplete="off">
                        </td>
                    </tr>
                    <tr class="field-title">
                        <td colspan="2" style="text-align: right">
                            <input type="submit" name="btnsubmit" value="+Add" class="btn-srieng"/>
                            <input type="reset" name="btnCacel" value="Cancel" class="btn-srieng"/>
                        </td>
                    </tr>
                </table>
            </td>
            <!--            PANEL CENTER-->
            <td width="10%" style="vertical-align: top;border:solid #37773A 1px;">
                <img src="<?php echo base_url("images/no_image.jpg"); ?>" width='100%' id="imgdisplay" style='border: solid #000000 1px;'>
            </td>
            <!--            RIGH PANEL-->
            <td style="vertical-align: top;">
                <table width="100%">
                    <tr>
                        <td style="text-align: left;border: solid #000000 1px;">
                            <input type="text" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER">
                            <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;">
                            <a href="<?php echo site_url('supplier'); ?>" class="btnnew">New</a>
                                Credit <input type="checkbox" id="chPaid" name="chPaid" value="1" checked/> |
                            <?php
                                foreach($exchange as $ex){
                            ?>
                                    ExRate: 1$=<input type="text" id="txtrate" style="color:#900;font-weight: bold;text-align: right;width:70px;text-align: left;background-color:#c7c7c7;" name="txtrate" value="<?php echo $ex->rate_amount; ?>" readonly/>Riel
                            <?php
                                }
                            ?>
                            <select name="txtemployee" style="float: right;" class="cbo-srieng">
                                <option value="0">Select Seller</option> 
                                <?php
                                   foreach($employee as $e){
                                ?>
                                    <option value="<?php echo $e->employee_id; ?>"><?php echo $e->employee_name?></option>
                                <?php
                                  }
                                ?>
                            </select>
                            |Vat
                             <?php
                                foreach($record_vat as $rv){
                            ?>
                            <input type="text" name="txt_vat" id="txt_vat" value="<?php echo $rv->tax_amount ?>" readonly style="width:30px;">%
                            <?php
                              }
                            ?>
                            <?php
                                foreach($record_stock_location as $rsl){
                            ?>
                                    <input type="text" name="txt_stock_location" id="txt_stock_location" value="<?php echo $rsl->employee_stock_location_id ?>" style="width:100px;display: none">
                            <?php
                              }
                            ?>
                        </td>
                    </tr>
                    <tr>  
                        <td style="text-align: right;">
                             Sell Date<label class="star"> *</label> 
                             <input type="date" name="txtselldate" id="txtselldate" value="<?php echo $sell_date ?>" style="width: 172px;height: 30px">
                        </td>
                    </tr>
                    <tr>  
                        <td style="text-align: right;">
                             Pay Date: 
                            <input type="date" name="txtpaydate" id="txtpaydate" value="<?php echo $pay_date ?>" style="width: 172px;height: 30px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%" border="1" class="table-table">          
                                                <tr style="background-color: #37773A;">
                                                    <th>No</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price($)</th>
                                                    <th>Discount(%)</th>
                                                    <th>Total($)</th>
                                                    <?php
                                                        //if($p->edit!=0){
                                                    ?>
                                                        <th>Edit</th>
                                                    <?php
                                                        //}
                                                        //if($p->delete!=0){
                                                    ?>
                                                        <th>Delete</th>
                                                    <?php
                                                        //}
                                                    ?>
                                                </tr>
                                                <?php               
                                                    $no=1;
                                                    $grandtotal=0;
                                                    foreach ($getlist as $g){
                                                    $grandtotal=$grandtotal+$g->total_with_discount;
                                                ?>
                                                    <tr style="color:#000000">
                                                        <td width="50px"><?php echo $no ?></td>
                                                        <td><?php echo $g->item_detail_name; ?></td>
                                                        <td><?php echo $g->sale_detail_qty; ?></td>
                                                        <td><?php echo number_format($g->sale_detail_unit_price,2) ?></td>
                                                        <td><?php echo number_format($g->sale_detail_total-(($g->sale_detail_total*$g->sale_detail_discount_percent)/100),2) ?></td>
                                                        <td><?php echo number_format($g->sale_detail_total,2) ?></td>
                                                        <?php
                                                            //if($p->edit!=0){
                                                        ?>
                                                        <td>
                                                            <a href="<?php echo site_url("retail_sale/edit_load/".$g->sale_detail_id."/".$g->sale_detail_item_id."/".$g->measure_id.'/'.'active') ?>">Edit</a>
                                                        </td>
                                                        <?php
                                                            //}
                                                            //if($p->delete!=0){
                                                        ?>
                                                        <td width="50px">
                                                            <a href="<?php echo site_url('retail_sale/delete/' . $g->sale_detail_id."/".$g->sale_detail_item_id."/".$g->sale_detail_qty."/".$g->measure_id); ?>" onclick="return confirm('Do you want to delete this record?')">
                                                                <img src="<?php echo base_url('img/delete.gif') ?>"/>
                                                            </a>
                                                        </td>
                                                        <?php
                                                            //}
                                                        ?>
                                                    </tr>
                                                <?php
                                                    $no=$no+1;
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
                                                            <legend><label style="color: #37773A;border-left: solid #900 5px;">Discounts</label></legend>
                                                            <input type="radio" name="radiscount" onchange="discountpercent()" id="radiscount" value="dispercent" checked>By(%)
                                                            <input type="number" min="0" max="100" name="txtdispercent" id="txtdispercent" autocomplete="off" placeholder="" onchange="dis_percent()" style="width:100px;">
                                                            <input type="radio"   name="radiscount" onchange="discountdollar()" id="radiscount" value="disdollar">By($)
                                                            <input type="number" min="0"  name="txtdisdollar" id="txtdisdollar" autocomplete="off" placeholder="" readonly  onchange="dis_dollar()" style="width:100px;background-color:#C7C7C7;">
                                                            <b>Need To PAY($):</b> <input type="number" name="txtamountneed" value="<?php echo $grandtotal?>" id="txtamountneed" autocomplete="off" readonly placeholder="" style="width:100px;background-color:#c7c7c7;color:#900;font-weight: bold;">
                                                            <b>Deposit:</b> <input type="text" min="0" name="txtbook" id="txtbook" autocomplete="off"  placeholder="" style="width:100px">
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right" colspan="2">
                                            <input type="checkbox" name="ch_print" id="ch_print" value="1"/>Print
                                            <input type="submit" name="btnsubmit" value="Save" class="btn-srieng"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
        </form>  
    <?php
       //}
    ?>      
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
                            $("#imgdisplay").attr("src","<?php echo base_url("img/products/") ?>/"+names[2]);
 
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
                       <script type='text/javascript'>
                           function autoselect(str){
                                if (str == "") {
                                    document.getElementById("panelhint").innerHTML = "";
                                    return;
                                } else { 
                                    if (window.XMLHttpRequest) {
                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        // code for IE6, IE5
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                            document.getElementById("panelhint").innerHTML = xmlhttp.responseText;
                                        }
                                    }

                                    xmlhttp.open("GET","expense/scanbarcode/"+str,true);
                                    xmlhttp.send();
                                }
                                
                                $("#txtQty").select();
                                
                           }
                                
                           function discountpercent(){
                              
                               $("#txtdispercent").attr("readonly", false);
                               $("#txtdispercent").select();
                               $("#txtdisdollar").attr("readonly", true);
                               $("#txtdisdollar").val("");
                               $("#txtdisdollar").css("background-color","#C7C7C7");
                               $("#txtdispercent").css("background-color","#FFFFFF");
                               
                           }
                                
                           function discountdollar(){
                               
                               $("#txtdispercent").attr("readonly", true);
                               $("#txtdispercent").val("");
                               $("#txtdisdollar").attr("readonly", false);
                               $("#txtdisdollar").select();
                               $("#txtdispercent").css("background-color","#C7C7C7");
                               $("#txtdisdollar").css("background-color","#FFFFFF");
                               
                           }
                           
                           function dis_percent(){
                               var grandtotal=parseFloat($("#txtamountneed").val());
                               var discount_percent=parseFloat($("#txtdispercent").val());
                               
                               
                               grandtotal=grandtotal-((grandtotal*discount_percent)/100);
                               $("#txtamountneed").val(grandtotal);
                           }
                           function dis_dollar(){
                               var grandtotal=parseFloat($("#txtamountneed").val());
                               var discount_dollar=parseFloat($("#txtdisdollar").val());
                               
                               grandtotal=grandtotal-discount_dollar;
                               $("#txtamountneed").val(grandtotal);
                           }
                           function selectproname(){
                               $("#productname").select();
                           }
                       </script>
                       
                       
    </body>
</html>
