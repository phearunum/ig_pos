<!DOCTYPE html>
<!--
	To change this license header, choose License Headers in Project Properties.
	To change this template file, choose Tools | Templates
	and open the template in the editor.
	-->
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
                <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
                <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
                <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
		<script type="text/javascript">
			function myFunction(){
			   $(function() {
			       alert("Export your Data ");
			$("#panel_report").table2excel({
			exclude: ".noExl",
			name: "Excel Document Name",
			filename: "Report Sale Detail",
			fileext: ".xls",
			exclude_img: true,
			exclude_links: true,
			exclude_inputs: true
			});
			});
			}
                        
                    $(document).ready(function(){
                        $("#btn_search").click(function(){
                            
                            var name = $("#txt_customer_name" ).val();
                            //alert(name);
                           $("#name_customers" ).html(name); 
                           
                            $("#txtcustomer_id" ).val('');  
                            $("#txt_customer_name" ).val('');
                          
                        });
                    });
                    
             
                function search(str){   
                var customer = $("#txtcustomer_id").val(); 
                var chosen = $("#chosen").val(); 
               
               if (str == "") {
                    document.getElementById("panel_report").innerHTML = "";
                    
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
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById("panel_report").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("POST","report_customer_history/search/"+customer,true);
                    xmlhttp.send();
                }
            }
                
		</script>
                <style>
                    hr{border-top: 0px solid #2095FE;margin-top: 5px; margin-bottom: 5px;}
                </style>
            
	</head>
	<body>
		
		<table class="table-form" style="width: 100%">
                    
                        <tr class="field-title">
                            <td colspan="13" style="text-align: left;">
                                <input type="text" name="datefrom" id="datefrom" class="txt_date hidden" value="<?php echo date('d-m-Y') ?>" placeholder="yyyy/mm/dd"/>                     
                                <input type="text" name="dateto" id="dateto" class="txt_date hidden" value="<?php echo date('d-m-Y') ?>" placeholder="yyyy/mm/dd"/>
                                Customer Name : <input type="text" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER" autofocus>
                                <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none; ">
                                
                                <input type="submit" name="btn_search" id="btn_search" value="Search" class="btn-srieng" onclick="search()">
                                <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint hidden" value="Export"/>
                            </td>
                        </tr>
			<tr>
                            <td class="form-title text-center" colspan="12" >Report Customer History ( Restaurant )</td>
			</tr>
                        <tr>
                            <td class="text-center" id="name_customers"></td>
                        </tr>
                        <tr>
                            <td id='panel_report'>
                                <table style="width:100%;" class="table-table">
                                    <tr class="tr_hide">
                                        <th>Nº</th>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Plate No</th>
                                        <th style="text-align: left;">Invoice#</th>
                                        <th></th>
                                        <th>Grand Total($)</th>

                                    </tr>
                                    <?php
                                    $no = 1;
                                    $sub_total = 0;
                                    $grand_total = 0;
                                    foreach ($customer_name as $cn) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td> 
                                            <td><?php echo $cn->customer; ?></td>
                                            <td style="color:#990000;"><?php echo $cn->customer_phone; ?></td>
                                            <td style="color: #000080;"><?php echo $cn->customer_plate_no; ?></td>
                                            <td>
                                                <table>   
                                                    <?php
                                                    $invoice_no = $this->Base_model->loadToListJoin("SELECT customer,customer_id,invoice_no,car_care FROM v_customer_history where  customer <> '' and customer_id = " . $cn->customer_id . " GROUP BY invoice_no ORDER BY invoice_no DESC");
                                                    foreach ($invoice_no as $in) {
                                                        ?>
                                                        <tr>
                                                            <td style="color: #000080;">#<?php echo $in->invoice_no; ?></td>
                                                            <td style="text-align: left; padding-left: 10px; width:400px" >
                                                                <?php
                                                                $itno = 1;
                                                                $sub_total = 0;
                                                                $item_name = $this->Base_model->loadToListJoin("SELECT invoice_no,item_name,grand_total,car_care FROM v_customer_history where car_care = 0 and  customer <> '' and invoice_no = " . $in->invoice_no);
                                                                foreach ($item_name as $itn) {
                                                                    ?>
                                                                    <label style="text-align: left;"><?php echo $itn->item_name . ' , '; ?></label>
                                                                    <?php $sub_total += $itn->grand_total;
                                                                } ?>
                                                            </td>
                                                            <td style="color: #000080; font-weight: bold;">
        <?php echo number_format($sub_total, 2); ?>
                                                            </td>
                                                        </tr> 
    <?php } ?>
                                                </table>
                                            </td>
                                            <td></td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $grand_total_name = $this->Base_model->loadToListJoin("SELECT sum(grand_total) as grand_total,car_care FROM v_customer_history where car_care = 0 and  customer <> '' and customer_id = " . $cn->customer_id . " GROUP BY customer_id");
                                                foreach ($grand_total_name as $gtn) {
                                                    ?>

                                                    <label style="text-align: left;color: #000080; font-weight: bold;"><?php echo number_format($gtn->grand_total, 2); ?></label>

        <?php $total+=$gtn->grand_total;
    } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $no = $no + 1;
                                    }
                                    ?>  

                                </table>
                            </td>
                        </tr>
                        
		</table>
                
		
	</body>
        <script>
            $.noConflict();
            jQuery( document ).ready(function( $ ) {
                $("#datefrom").datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
                $("#dateto").datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
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
</html>