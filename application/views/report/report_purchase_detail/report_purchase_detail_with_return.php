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
        <script type="text/javascript">
         function myFunction(){
            $(function() {
                alert("Export your Data ");
				$(".table-table").table2excel({
					filename: "Report Purchase Detail",
					fileext: ".xls"
				});
			});
        }
        
            //fix header top table when scroll 
                        
        function UpdateTableHeaders() {
            $(".persist-area").each(function() {

                var el             = $(this),
                    offset         = el.offset(),
                    scrollTop      = $(window).scrollTop(),
                    floatingHeader = $(".floatingHeader", this)

                if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
                    floatingHeader.css({
                     "visibility": "visible"
                    });
                } else {
                    floatingHeader.css({
                     "visibility": "hidden"
                    });      
                };
            });
         }
         //END fix header top table when scroll 
         //
         // DOM Ready      
         $(function() {

            var clonedHeaderRow;

            $(".persist-area").each(function() {
                clonedHeaderRow = $(".persist-header", this);
                clonedHeaderRow
                  .before(clonedHeaderRow.clone())
                  .css("width", clonedHeaderRow.width('84.6%'))
                  .addClass("floatingHeader");
            });

            $(window)
             .scroll(UpdateTableHeaders)
             .trigger("scroll");

         });
     </script>

    <style>
        .width100px{width:100px; text-align: center;}
        .width1000px{width: 92px;text-align: center;}
    </style>
    </head>
    <body>  
        
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
        <table width="100%" cellspacing="0" class="table-table persist-area" id="table2excel" cellpadding="0" border="0">
            <tr>               
                <td class="form-title" colspan="13">Report Purchase Detail With Purchase Return</td>                
            </tr>  
            <tr>               
                <td style="text-align: center;" colspan="13">
                    <p><?php echo $text_display; ?></p>
                </td>                
            </tr>              
            <tr class="persist-header">                            
                <th>Nº</th>
                <th>Purchase No</th>
                <th>Item Name</th>                   
                <th>Purchase QTY</th>
                <th>Purchase Unit Price(៛)</th> 
                <th>Return QTY</th>
                <th>Return Unit Price(៛)</th>
                <th>QTY In Stock</th>                                                              
                <th>Total Purchase Price(៛)</th>
                <th>Total Return Price(៛)</th>
                <th>Grand Total Price(៛)</th>
                <th>Purchase Date</th>
                <th>Measure</th>
            </tr>  
            <?php
                    $no=1;                   
                    $purchase_qty = 0;
                    $purchase_return_qty = 0;
                    $purchase_return_unit_price = 0;
                    $purchase_unit_price = 0;                    
                    $grand_total_purchase = 0;
                    $grand_total_purchase_001 = 0;
                    foreach($record_customer as $ct){
                         ?>
             
                    <tr>
                        <td> <?php echo $no; ?></td>
                        <td> <?php echo $ct->purchase_no; ?></td>
                        <td> <?php echo $ct->item_detail_name; ?></td>
                        <td> <?php echo $ct->purchase_detail_qty; ?></td>
                        <td> <?php echo number_format($ct->purchase_detail_unit_cost,0); ?></td>
                        <td> <?php echo $ct->purchase_return_qty; ?></td>
                        <td> <?php echo number_format($ct->purchase_return_price,0); ?></td>
                        <td> <?php echo $ct->purchase_detail_qty - $ct->purchase_return_qty ; ?></td>
                        <td> <?php echo number_format($ct->purchase_detail_qty * $ct->purchase_detail_unit_cost,0); ?></td>
                        <td> <?php echo number_format($ct->purchase_return_qty * $ct->purchase_return_price,0) ; ?></td>
                        <td> 
                        <?php 
                            if(($ct->purchase_detail_qty - $ct->purchase_return_qty) * $ct->purchase_return_price == 0){
                               echo $ct->purchase_detail_qty * $ct->purchase_detail_unit_cost; 
                            }else{
                                echo number_format(($ct->purchase_detail_qty - $ct->purchase_return_qty) * $ct->purchase_return_price,0);
                            }
                        ?>
                        </td>
                        <td> <?php echo $ct->purchase_created_date; ?></td>
                        <td> <?php echo $ct->measure_name; ?></td>
                        
                    </tr>
                    
                    <?php
                    
                    $no++;
                    } ?>
                    <tr>
                        <td>Total Amount : </td>
                        <td></td>
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
							
                                                    <form action="<?php echo site_url("report_purchase_detail_with_return/search") ?>" method="post">
                                                        <table  width="100%" cellspacing="0"  id="table-table-search" cellpadding="5"> 
                                                                         
                                                            <tr> 
                                                                <td class="table-width">No : </td>
                                                                <td  class="table-width"><input type="number" name="purchaseno" id="purchaseno" placeholder="Search Purchase No" /></td>
                                                                <td  class="table-width">Name : </td>
                                                                <td  class=""><input type="text" name="itemname" id="itemname" placeholder="search Item Name" autofocus /></td>
                                                                <td style="display: none;" class=""><input type="text" name="itemname_id" id="itemname_id" placeholder="search Item Name" /></td>
                                                            </tr>
                                                            <tr>                  
                                                                <td class="table-width">From : </td>
                                                                <td ><input style="width: 155px;" type="date" name="datefrom" id="datefrom" placeholder="search purchase no" /></td>                       
                                                                <td  class="table-width"> To : </td>
                                                                <td class="table-width"><input style="width: 155px;" type="date" name="dateto" id="dateto" placeholder="Search purchase no" /></td>
                                                            </tr>
                                                            <tr style="display: none;">
                                                                <td>Recorder : </td>
                                                                <td class="table-width" colspan="3">
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
                                                            </tr>
                                                            <tr style="display: none;">
                                                                <td>Stock Location : </td>
                                                                <td class="table-width" colspan="3">
                                                                    <select name="stock_location" id="stock_location" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                                       <option value="0">--Select Stock Location--</option>
                                                                         <?php
                                                                        foreach ($stock_location as $sl)
                                                                              {
                                                                        ?>
                                                                         <option value="<?php echo $sl->stock_location_name; ?>"><?php echo $sl->stock_location_name; ?></option>

                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr style="display: none;">
                                                                <td>Status : </td>
                                                                <td class="table-width" colspan="3">
                                                                    <select name="status" id="status" class="cbo-srieng" style="width: 100%; height: 27px;">                        
                                                                       <option value="0">--Select Status--</option>
                                                                       <option value="PAID">PAID</option>
                                                                       <option value="CREDIT">UNPAID</option>
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
