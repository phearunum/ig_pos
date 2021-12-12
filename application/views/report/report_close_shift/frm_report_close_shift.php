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
			filename: "Close Shift List",
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
                                $("#"+"h_i"+tar_class).fadeToggle(200);
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
                                $(obj).attr("class","tr_show")
                                $(function(){
                                $('[id^="h_i"]').fadeIn(90);
                                $('[id^="d_i"]').fadeIn(90);
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
				<td class="form-title text-center" colspan="13" >CLOSE SHIFT REPORT</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="13" >
					<p><?php echo $text_display; ?></p>
				</td>
			</tr>
                        <tr onclick="hide_show_all(this)" class="tr_hide">
				<th>Nº</th>
				<th>Seller</th>
				<th>Pump</th>
				<th>Sale Date</th>
				<th>Start US</th>
				<th>Start KH</th>
				<th>End US</th>
				<th>End KH</th>
				<th>Total US</th>
				<th>Total KH</th>
				<th>Stock</th>
				<th>Creator</th>
				<th>Create Date</th>
			</tr>
			<?php
				$no=1;
				foreach($record_sale_master as $rsm){
				?>
			<tr onclick="hide_show_i(this)" id="<?php echo 'm'.$no; ?>">
				<td><?php echo $no; ?></td>
				<td><?php echo $rsm->sale_master_seller; ?></td>
				<td><?php echo $rsm->pump_name; ?></td>
				<td><?php echo $rsm->sale_master_sell_date; ?></td>
				<td><?php echo '$ '.number_format($rsm->sale_master_start_us,0,'.',','); ?></td>
				<td><?php echo '៛ '.number_format($rsm->sale_master_start_khmer,0,'.',','); ?></td>
				<td><?php echo '$ '.number_format($rsm->sale_master_end_us,0,'.',','); ?></td>
				<td><?php echo '៛ '.number_format($rsm->sale_master_end_khmer,0,'.',','); ?></td>
				<td><?php echo '$ '.number_format($rsm->total_us,0,'.',','); ?></td>
				<td><?php echo '៛ '.number_format($rsm->total_kh,0,'.',','); ?></td>
				<td><?php echo $rsm->stock_location_name; ?></td>
				<td><?php echo $rsm->sale_master_creator; ?></td>
				<td><?php echo $rsm->sale_master_created_date; ?></td>
			</tr>
                        <?php
                            if($rsm->item_count>0){
                        ?>
			<tr id="<?php echo 'h_i'.$no; ?>">
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
				<td colspan="10" >
					<table width="100%" cellspacing="0" class="table-table" cellpadding="0" border="0">
                                                <tr style="background-color: #37773A;">
							<th class="td4">#</th>
							<th class="td24">Product Name</th>
							<th class="td24">Start Quantity</th>
							<th class="td24">End Quantity</th>
                                                        <th class="td24">Total Quantity</th>
						</tr>
						<?php
							$no_i=1;
							foreach($record_sale_item as $rsi){
							    if($rsi->sale_item_master_id==$rsm->sale_master_id){
							?>
						<tr onclick="hide_show_d(this)" id="<?php echo 'i'.$no.$no_i; ?>">
							<td class="td4"><?php echo $no_i ?></td>
							<td class="td24"><?php echo $rsi->item_detail_name ?></td>
							<td class="td24"><?php echo $rsi->sale_item_start_qty ?></td>
							<td class="td24"><?php echo $rsi->sale_item_end_qty ?></td>
							<td class="td24"><?php echo $rsi->sale_item_total_qty ?></td>
						</tr>
                                                <?php
                                                    if ($rsi->item_detail>0){
                                                ?>
                                                <tr  id="<?php echo 'd_i'.$no.$no_i; ?>">
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="3">
                                                        
                                                        <table width="100%" cellspacing="0" class="table-table" cellpadding="0" border="0">
                                                            <tr style="background-color: #37773A;">
                                                                    <th class="td25">Customer Type</th>
                                                                    <th class="td25">Quantity</th>
                                                                    <th class="td25">Unit Price</th>
                                                                    <th class="td25">Total</th>
                                                            </tr>
                                                            <?php
                                                                    foreach($record_sale_detail as $rsd){
                                                                        if($rsd->sale_detail_master_id==$rsm->sale_master_id && $rsd->sale_detail_item_id==$rsi->sale_item_item_detail_id){
                                                                    ?>
                                                            <tr>
                                                                    <td class="td25"><?php echo $rsd->customer_type_name ?></td>
                                                                    <td class="td25"><?php echo $rsd->sale_detail_qty ?></td>
                                                                    <td class="td25"><?php echo '$ '.number_format($rsd->sale_detail_avg_price,2,'.',','); ?></td>
                                                                    <td class="td25"><?php echo '$ '.number_format($rsd->sale_detail_qty*$rsd->sale_detail_avg_price,2,'.',','); ?></td>
                                                            </tr>
                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </table>
                                                            
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                        <?php $no_i++; } } $no_i=1;  ?>
                                                
					</table>
                                    
				</td>
			</tr>
                        <?php
                            }
                        ?>
			<?php
				$no=$no+1;
				}
				?>
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
						<form action="<?php echo site_url("close_shift_report") ?>" method="post">
							<table  width="100%" cellspacing="0"  id="table-table-search" cellpadding="5">
								<tr>
									<td class="table-width" >Seller : </td>
									<td  class="table-width" colspan="3">
										<select name="cbo_seller" id="recorder" class="cbo-srieng" style="width: 100%; height: 27px;">
											<option value="0">--Select Seller--</option>
											<?php
												foreach ($recorder as $rt)
												      {
												?>
											<option value="<?php echo $rt->employee_id; ?>"><?php echo $rt->recorder; ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="table-width">From : </td>
									<td ><input style="width: 155px;" type="date" name="datefrom" id="datefrom" /></td>
									<td  class="table-width"> To : </td>
									<td class="table-width"><input style="width: 155px;" type="date" name="dateto" id="dateto" /></td>
								</tr>
								<tr>
									<td>Recorder : </td>
									<td class="table-width" colspan="3">
										<select name="cbo_creator" id="creator" class="cbo-srieng" style="width: 100%; height: 27px;">
											<option value="0">--Select Creator--</option>
											<?php
												foreach ($recorder as $rt)
												      {
												?>
											<option value="<?php echo $rt->employee_id; ?>"><?php echo $rt->recorder; ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Stock Location : </td>
									<td class="table-width" colspan="3">
										<select name="cbo_stock" id="stock_location" class="cbo-srieng" style="width: 100%; height: 27px;">
											<option value="0">--Select Stock Location--</option>
											<?php
												foreach ($stock_location as $sl)
												      {
												?>
											<option value="<?php echo $sl->stock_location_id; ?>"><?php echo $sl->stock_location_name; ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
                                                                <tr>
                                                                    <td>Product Name</td>
                                                                    <td class="table-width" colspan="3">
                                                                        <input type="text" name="txt_product" id="txt_product" autocomplete="off" placeholder="Search Product Name" class="cbo-srieng" style="width: 100%; height: 27px;">
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