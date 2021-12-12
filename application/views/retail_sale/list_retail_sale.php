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
        <script type="text/javascript">
         function myFunction(){
            $(function() {
                alert("Export your Data ");
				$("#table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Report Purchase Detail",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
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
                                  .css("width", clonedHeaderRow.width('84.5%'))
                                  .addClass("floatingHeader");
                            });

                            $(window)
                             .scroll(UpdateTableHeaders)
                             .trigger("scroll");

                         });
    
     </script>
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
        <table width="100%" cellspacing='0' cellpadding='0' border='0'>
                <tr>
                    <td  class="form-title">
                       Retail Sale Report
                    </td>    
                </tr>
                <tr>
                    <td style='text-align: center;'>
                       <?php echo $text_display; ?>
                    </td>    
                </tr>
        </table>
        <table width="100%" cellspacing='0' id="table2excel" cellpadding='0' border='0' class="table-table  persist-area">
            <tr style="height: 30px;" class="persist-header">
                    <th width='2%'><a href="<?php echo site_url("retail_sale/addnew"); ?>">New</a></th>
                    <th  width='3%'>NO</th>
                    <th  width='7%'>Invoice R#</th>
                    <th  width='9%'>Customer Name</th>
                    <th  width='6%'>Recorder</th>
                    <th  width='6%'>Seller</th>
                    <th  width='7%'>Date of Buy</th>
                    <th width='5%'>Hour</th>
<!--                <th>Due Date</th>-->
                    <th  width='5%'>Total</th>
                    <th width='5%'>Dis(%)</th>
                    <th width='5%'>Dis($)</th>
                    <th width='5%'>Tax(%)</th>
                    <th width='9%'>Grand Total($)</th>       
                    <th width='5%'>Paid</th>
                </tr>
                <?php
                    $no=1;
                    $grandtotal=0;
                    foreach($record_sale_summary as $rss){
                        $grandtotal+=$rss->grand_total;
                ?>
                <tr>
                    <td><a href="<?php echo site_url("retail_sale/load_sale_detail_list/".$rss->sale_master_invoice_no) ?>"><img src="<?php echo base_url("img/icons/view.png"); ?>"></a></td>
                    <td><?php echo $no?></td>
                    <td>
                        <?php
                            if($rss->sale_master_status=="PAID"){
                        ?>
                        <?php echo str_pad($rss->sale_master_invoice_no, 5, '0', STR_PAD_LEFT); ?>
                        <?php
                            }else{
                        ?>
                            <a class="tooltips" data-original-title="This invoice is credited!!" data-placement="top" href="<?php echo site_url("customer_pay/pay/".$rss->sale_master_invoice_no); ?>" ><u><?php echo str_pad($rss->sale_master_invoice_no, 5, '0', STR_PAD_LEFT); ?></u></a>
                        <?php
                            }
                        ?>
                    </td>
                    <td><?php echo $rss->customer_name ?></td>
                    <td><?php echo $rss->recorder ?></td>
                    <td><?php echo $rss->sale_by ?></td>
                    <td><?php echo $rss->sale_master_sell_date ?></td>
                    <td><?php echo $rss->sale_master_time ?></td>
                    <td><?php echo number_format($rss->subtotal,2) ?></td>
                    <td><?php echo $rss->sale_detail_discount_percent ?></td>
                    <td><?php echo $rss->sale_detail_discount_dollar ?></td>
                    <td><?php echo $rss->sale_master_tax ?></td>
                    <td><?php echo number_format($rss->grand_total,2) ?></td>
                    <td>
                        <?php
                            if($rss->sale_master_status=="PAID"){
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
                    $no++;
                    }
                ?>
                <tr style="font-weight: bold;">
                    <td colspan="12" style="text-align: right">Grand Total($): </td>
                    <td colspan="2"><?php echo $grandtotal ?></td>
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
                                <form action="<?php echo site_url("retail_sale/search") ?>" method="post">
                                    <table  width="100%" cellspacing="0"  id="table-table-search" cellpadding="5">
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
                                                    foreach ($sale_by as $sl)
                                                          {
                                                    ?>
                                                     <option value="<?php echo $sl->sale_by; ?>"><?php echo $sl->sale_by; ?></option>

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
