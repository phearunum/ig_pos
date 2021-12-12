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
			$("#table2excel").table2excel({
			exclude: ".noExl",
			name: "Excel Document Name",
			filename: "Report Sale Summary",
			fileext: ".xls",
			exclude_img: true,
			exclude_links: true,
			exclude_inputs: true
			});
			});
			}
                        
                        function hide_show_i(obj){
                            var tar_class = $(obj).attr('id');
                            tar_class=tar_class.substr(1,tar_class.lenght);
                            $(function(){
                                $("#"+"h_i"+tar_class).fadeToggle(900);
                                 $("#"+"h_ii"+tar_class).fadeToggle(900);
                            });
                        }
                        function hide_show_d(obj){
                            var tar_class = $(obj).attr('id');
                            tar_class=tar_class.substr(1,tar_class.lenght);
                            $(function(){
                                $("#"+"d_i"+tar_class).fadeToggle(200);
                               
                            });
                        }
                        
                        $(document).ready(function () {
                            $('[id^="h_i"]').fadeOut(90);
                            $('[id^="d_i"]').fadeOut(90);
                        });
                        
                        function hide_show_all(obj){
                            var tar_class = $(obj).attr('class');
                            if (tar_class=="tr_hide"){
                                $(obj).attr("class","tr_show");
                                $(function(){
                                $('[id^="h_i"]').fadeIn(90);
                                $('[id^="d_i"]').fadeIn(90);  
                                $('[id^="h_ii"]').fadeIn(90);  
                                });
                            }
                            else
                            {
                                $(obj).attr("class","tr_hide")
                                $(function(){
                                $('[id^="h_i"]').fadeOut(90);
                                $('[id^="d_i"]').fadeOut(90);
                              
                                });
                            }                            
                        }
		</script>
        <scrip>
            
        </scrip>
		<style>
			.td_right
			{
			text-align: right;
			}
		</style>
                <style>
                    tr{
                        border-bottom: 1px solid #b5c3e9;
                    }
                    .td25{
                        width:25%;
                    }
                    .td4{
                        width:4%;
                    }
                    .td24{
                        width:24%;
                    }
                </style>
	</head>
	<body style="margin-bottom: 60px;">
		<table>
			<tr>
				<td>
					<a id="modal-673355" href="#modal-container-673355" role="button" data-toggle="modal">
						<div class="img-responsive">
							<input type="button" value="Search" class="btn-highpoint"/>                
						</div>
					</a>
				</td>
				<td>
					<input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>
				</td>
			</tr>
		</table>
		<table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="0">
			<tr>
				<td class="form-title text-center" colspan="13" >Report Customer Credit</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="13" >
					<p><?php echo $text_display; ?></p>
				</td>
			</tr>
                        <tr class="tr_hide">
				<th>NO</th>
                                <th>Invoice #</th>
                                <th>Customer Name</th>
                                <th>Recorder</th>
                                <th>Seller</th>
                                <th>Date of Buy</th>
                                <th>Hour</th>
                                <th>Total</th>
                                <th>Dis(%)</th>
                                <th>Dis($)</th>
                                <th>Tax(%)</th>
                                <th>Grand Total($)</th>       
                                <th>Paid</th>
			</tr>
			<?php
                                 $no=1;
                                 $grand_total = 0;
                                 $sub_total = 0;
                                 $tax_total =  0;
                                 $dis_dollor = 0;
                                 $discount_percent = 0;
                                 
				foreach($sale_summary as $rsm){
				?>
                            <tr onclick="hide_show_i(this)" id="<?php echo 'm'.$no; ?>">
				<td><?php echo $no; ?></td>                                
                                <td>
                                    <?php
                                        if($rsm->sale_master_status=="PAID"){
                                    ?>
                                    <?php echo $rsm->InvoiceNO; ?>
                                    <?php
                                        }else{
                                    ?>
                                        <a class="tooltips" data-original-title="This invoice is credited!!" data-placement="top" href="<?php echo site_url("customer_pay/pay/".$rsm->sale_master_invoice_no); ?>" ><u><?php echo $rsm->InvoiceNO; ?></u></a>
                                    <?php
                                        }
                                    ?>
                                </td>
				<td><?php echo $rsm->customer_name ?></td>
                                <td><?php echo $rsm->recorder ?></td>
                                <td><?php echo $rsm->sale_by ?></td>
                                <td><?php echo $rsm->sale_master_sell_date ?></td>
                                <td><?php echo $rsm->sale_master_time ?></td>
                                <td><?php echo number_format($rsm->subtotal,2) ?></td>
                                <td><?php echo $rsm->sale_detail_discount_percent ?></td>
                                <td><?php echo $rsm->sale_detail_discount_dollar ?></td>
                                <td><?php echo $rsm->sale_master_tax ?></td>
                                <td><?php echo number_format($rsm->grand_total,2) ?></td>
                                <td>
                                    <?php
                                        if($rsm->sale_master_status=="PAID"){
                                    ?>
                                        <img src="<?php echo base_url("img/icons/check.png") ?>" width="15">
                                    <?php
                                        }else{
                                    ?>
                                        <img src="<?php echo base_url("img/icons/x.png") ?>" width="15">
                                    <?php
                                        }
                                    ?>
                                </td>
			</tr> 
                            <?php                             
                            $no=$no+1;
                            $grand_total += $rsm->grand_total;
                            $sub_total += $rsm->subtotal;
                            $discount_percent +=$rsm->sale_detail_discount_percent;
                            $dis_dollor +=$rsm->sale_detail_discount_dollar;
                            $tax_total +=  $rsm->sale_master_tax ;
                            }
                        ?>
                        <tr class="total_footer">
                            <td colspan="7" class="text-right">Total Amount : </td>
                            <td><?php echo number_format($sub_total,2); ?></td>
                            <td><?php echo number_format($discount_percent,2); ?></td>
                            <td><?php echo number_format($dis_dollor,2); ?></td>
                            <td><?php echo number_format($tax_total,2); ?></td>
                            <td><?php echo number_format($grand_total,2); ?></td>
                            <td></td>
                        </tr>
		</table>
		<div class="modal fade" id="modal-container-673355" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">							 
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    ×
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                    Search Your Data
                                            </h4>
                                    </div>
                                    <div class="modal-body">							
                                        <form action="<?php echo site_url("report_customer_credit/search") ?>" method="post">
                                            <table  width="100%" cellspacing="0"  id="table-table-search" cellpadding="5"> 
                                                 <tr>
                                                    <td>Sale Type : </td>
                                                    <td class="table-width" colspan="3">
                                                        <select name="saletype" id="saletype" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                           <option value="0">--Select Sale Type--</option>
                                                           <option value="R">Retail Sale</option>
                                                           <option value="W">Whole Sale</option>
                                                        </select>
                                                    </td>             
                                                <tr> 
                                                    <td class="table-width" >No : </td>
                                                    <td  class="table-width" colspan="3"><input style="width:100%; height: 27px;" type="number" name="invoiceno" id="invoiceno" placeholder="Search Invoice No"  autofocus/></td>
                                                </tr>
                                                <tr>                  
                                                    <td class="table-width">From : </td>
                                                    <td ><input style="width: 155px;" type="date" name="datefrom" id="datefrom" placeholder="search purchase no" /></td>                       
                                                    <td  class="table-width"> To : </td>
                                                    <td class="table-width"><input style="width: 155px;" type="date" name="dateto" id="dateto" placeholder="Search purchase no" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Recorder : </td>
                                                    <td class="table-width">
                                                        <select name="recorder" id="recorder" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                            <option value="0">--Select Recorder--</option>
                                                            <?php
                                                            foreach ($recorder as $rt)
                                                                  {
                                                            ?>
                                                             <option value="<?php echo $rt->recorder; ?>"><?php echo $rt->recorder; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>Seller : </td>
                                                    <td class="table-width" colspan="3">
                                                        <select name="Seller" id="seller" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                           <option value="0">--Select Seller--</option>
                                                             <?php
                                                            foreach ($seller as $sl)
                                                                  {
                                                            ?>
                                                             <option value="<?php echo $sl->seller; ?>"><?php echo $sl->seller; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>                                                            
                                                <tr style="display: none;">
                                                    <td>Category : </td>
                                                    <td class="table-width" colspan="3">
                                                        <select name="category" id="category" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                           <option value="0">--Select Category--</option>
                                                             <?php
                                                            foreach ($type_name as $sl)
                                                                  {
                                                            ?>
                                                             <option value="<?php echo $sl->item_type_name; ?>"><?php echo $sl->item_type_name; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </td>

                                                </tr>
                                            </table>
                                    </div>
                                    <div class="modal-footer"> 
                                         <button type="button" data-dismiss="modal" class="pull-left btn-highpoint">
                                                    Close
                                        </button> 
                                        <input type="submit" value="Search"  class="pull-right btn-highpoint" />                                                   
                                    </div>
                            </div>
                            </form>
                    </div>				
                </div>
	</body>
</html>