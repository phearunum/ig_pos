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
                        
                        
		</script>
		
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
                                    <input style="display: none;" type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>
				</td>
			</tr>
		</table>
		<table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="0">
			<tr>
				<td class="form-title text-center" colspan="13" >Report Supplier Credit</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="13" >
					<p><?php echo $text_display; ?></p>
				</td>
			</tr>
                        <tr ondblclick="hide_show_all(this)" class="tr_hide persist-header">
				<th>NO</th>
                                <th>Purchase No</th>
                                <th>Supplier Name</th>
                                <th>Stock Location</th>
                                <th>Recorder</th>
                                <th>Created Date</th>                              
                                <th>Total</th>                              
			</tr>
			<?php
                                 $no=1;
                                 $no_i = 1;                               
                                 $total_credit_amoutn = 0;
                                 
				foreach($sale_summary as $rsm){
                                    
				?>
                            <tr ondblclick="hide_show_i(this)" id="<?php echo 'm'.$no; ?>">
				<td><?php echo $no; ?></td>                               
                                <td><a class="tooltips" data-original-title="This invoice is credited!!" data-placement="top" href="<?php echo site_url("purchase_pay/pay/".$rsm->purchase_no); ?>" ><u><?php echo $rsm->purchase_no ?></u></a></td>
				<td><?php echo $rsm->supplier_name ?></td>
                                <td><?php echo $rsm->stock_location_name ?></td>
                                <td><?php echo $rsm->recorder ?></td>
                                <td><?php echo $rsm->purchase_created_date ?></td>
                                <td><?php echo number_format($rsm->total,2) ?></td>                               
                            
			</tr> 
                        <tr id="<?php echo 'h_i'.$no; ?>">
                            <td colspan="13">
                                <table width="100%">
                                    <tr>
                                        
                                        <th>No</th>
                                        <th>Total Credit</th>
                                        <th>Total Pay</th>
                                        <th>Total Credit Amount</th>
                                        <th>Date Pay</th>
                                        <th>Recorder</th>
                                      
                                    </tr>
                                    
                                    <?php
                                   $nono = 1;
                                        $suplier_credit_all=$this->Base_model->loadToListJoin("SELECT * FROM `v_purchase_pay` where purchase_no=".$rsm->purchase_no);
                                        foreach ($suplier_credit_all as $sca){
                                    ?>

                                    <tr class="love">
                                        
                                        <td><?php echo $nono; ?></td>
                                        <td><?php echo number_format($sca->purchase_pay_total,2); ?></td>
                                        <td><?php echo number_format($sca->purchase_pay_amount,2); ?></td>
                                        <td><?php echo number_format($sca->purchase_pay_credit_amount,2); ?></td>
                                        <td><?php echo $sca->purchase_pay_date; ?></td>
                                        <td><?php echo $sca->recorder; ?></td>
                                      
                                    </tr>                                    

                                <?php $nono++; } ?>
                                   
                                </table>
                            </td>
                             <?php
                                $total_credit=$this->Base_model->loadToListJoin("SELECT purchase_pay_credit_amount FROM `v_purchase_pay` where purchase_no = ".$rsm->purchase_no." ORDER BY purchase_pay_id DESC LIMIT 1");
                                foreach ($total_credit as $tc){
                            ?>
                                <tr class="total_footer">
                                    <td colspan="5"></td>
                                    <td>Total Credit by Invoice : </td>
                                    <td><?php echo number_format($tc->purchase_pay_credit_amount,2) ?></td>
                                </tr>
                       
                            <?php                             
                                $no=$no+1;  
                                $total_credit_amoutn +=$tc->purchase_pay_credit_amount;
                                } }
                            ?>
                        
                        <tr style="background-color: #D71A21; font-size: 16px;font-weight: bold; ">
                            <td colspan="5"></td>
                            <td>Total Credit Amount </td>
                            <td><?php echo number_format($total_credit_amoutn,2); ?></td>
                        </tr>
                
		</table>
		<!--        MODAL FORM-->
        
                <form action="<?php echo site_url("report_supplier_credit/search") ?>" method="post">
                    <div class="modal fade" id="modal-container-673355"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <table cellspacing="0" class="table-form"  id="table-form" width="100%">
                                        <tr class="field-title-search">
                                            <td colspan="2">Search Supplier Credit</td>
                                            <td colspan="2"><input type="button" value="X"  class="pull-right btn-highpoint" data-dismiss="modal"/></td>
                                        </tr>  
                                        <tr style="display: none;">
                                            <td>Sale Type : </td>
                                            <td colspan="3">
                                                <select name="saletype" id="saletype" class="cbo-srieng" >                        
                                                    <option value="0">--Select Sale Type--</option>
                                                    <option value="R">Retail Sale</option>
                                                    <option value="W">Whole Sale</option>
                                                </select>
                                            </td> 
                                        </tr>
                                        <tr style="display: none;"> 
                                            <td>Name:</td>
                                            <td  colspan="3"><input  type="text" name="customername" id="customername" placeholder="Search Customer Name"  autofocus/></td>
                                        </tr>
                                        <tr> 
                                            <td>No : </td>
                                            <td  colspan="3"><input  type="number" name="invoiceno" id="invoiceno" placeholder="Search Purchase No"  autofocus style="width:82.5%"/></td>
                                        </tr>
                                        <tr>                  
                                            <td>From : </td>
                                            <td><input  type="text" name="datefrom" id="datefrom" class="txt_date" placeholder="yyyy/mm/dd"/></td>                       
                                            <td>To:</td>
                                            <td><input  type="text" name="dateto" id="dateto" class="txt_date" placeholder="yyyy/mm/dd"/></td>
                                        </tr>
                                        <tr style="display: none;">
                                            <td>Recorder : </td>
                                            <td>
                                                <select name="recorder" id="recorder" class="cbo-srieng" >                        
                                                    <option value="0">--Select Recorder--</option>
                                                    <?php
                                                    foreach ($recorder as $rt) {
                                                        ?>
                                                        <option value="<?php echo $rt->recorder; ?>"><?php echo $rt->recorder; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>Supplier : </td>
                                            <td colspan="3">
                                                <select name="Seller" id="seller" class="cbo-srieng" style="width:82.5%">                        
                                                    <option value="0">--Select Supplier--</option>
                                                    <?php
                                                    foreach ($supplier as $sl) {
                                                        ?>
                                                        <option value="<?php echo $sl->supplier_name; ?>"><?php echo $sl->supplier_name; ?></option>

<?php } ?>
                                                </select>
                                            </td>
                                        </tr>                                                            
                                        <tr style="display: none;">
                                            <td>Category : </td>
                                            <td colspan="3">
                                                <select name="category" id="category" class="cbo-srieng" >                        
                                                    <option value="0">--Select Category--</option>
<?php
foreach ($type_name as $sl) {
    ?>
                                                        <option value="<?php echo $sl->item_type_name; ?>"><?php echo $sl->item_type_name; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </td>

                                        </tr>
                                        <tr class="field-title-search">
                                            <td colspan="4">
                                                <input type="submit" value="Search"  class="pull-right btn-highpoint" /> 
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
<!--END MODAL FORM-->
	</body>
        <script type="text/javascript">
    
        $.noConflict();
        jQuery( document ).ready(function( $ ) {
            $("#datefrom").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
            $("#dateto").datepicker({ dateFormat: 'yy/mm/dd', showButtonPanel: true});
        });
    
        </script>
</html>