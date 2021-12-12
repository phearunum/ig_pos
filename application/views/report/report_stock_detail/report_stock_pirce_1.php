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
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.dataTables.css"); ?>">

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery-1.8.2.min.js"); ?>"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
    
    <script type="text/javascript">
         function myFunction(){
            $(function() {
                alert("Export your Data ");
				$("#table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Report Stock",
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
                  .css("width", clonedHeaderRow.width('106.5%'))
                  .addClass("floatingHeader");
            });
            $(window)
             .scroll(UpdateTableHeaders)
             .trigger("scroll");

         });
         
         
     </script>
     
    </head>
    <body>
        <table width='100%' class='table-form table-table font_khmer' id="table2excel">            
            <tr>
                <td>
                    <a id="modal-673355" href="#modal-container-673355" role="button" data-toggle="modal">
                            <div>
                                <input type="button" value="Search" class="btn-highpoint" style="margin:5px;"/>
                                
                                <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint" value="Export"/>                
                            </div>
                    </a>
                </td>
            </tr>
             <tr>
                <td class="form-title" colspan="10" style="text-align: center;">
                    CHECK STOCK PRICE
                </td>
            </tr>
            <tr class="persist-header" style="width:100%;">
                <th width="1%">Category</th>
                <th width="2%">Part N#</th>
                <th width="1.5%">Item Name</th>
                <th width="1%">Order Point</th>
                <th width="1%">Location</th>
                <th width="1%">Balance</th> 
                <th width="1%">Unit cost($)</th>
                <th width="1%">Whole price($)</th>
                <th width="1%">Retail price($)</th>
                <th width="1%">Total($)</th>
            </tr>                            
            <?php
                $total_balance = 0 ;
                $total_unit_cout =0;
                $total_whole_sale = 0;
                $total_retail_sale =0;
                $grand_total =0;                
                foreach ($stock_detail as $std){                
            ?>
            <tr>
                <td><?php echo $std->item_type_name; ?></td>
                <td><?php echo $std->item_detail_part_number; ?></td>
                <td><?php echo $std->item_detail_name; ?></td>
                <td><?php echo $std->item_detail_remain_alert; ?></td>
                <td><?php echo $std->stock_location_name; ?></td>
                <td><?php echo $std->stock_qty; ?></td>
                <td><?php echo $std->purchase_detail_unit_cost; ?></td>
                <td><?php echo $std->item_detail_whole_price; ?></td>
                <td><?php echo $std->item_detail_retail_price; ?></td>
                <td><?php echo number_format($std->total,2); ?></td>
            </tr>
                <?php
                   $total_balance       += $std->stock_qty ;                   
                    $grand_total        += $std->total;
                }
                ?>             
            <tr class="total_footer">
                <td>Total Amount : </td>
                <td colspan="4"></td>
                <td><?php echo number_format($total_balance,2) ;?></td>
                <td colspan="3"></td>
                <td><?php echo number_format($grand_total,2) ;?> </td>
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
                                        <form action="<?php echo site_url("report_stock_detial/search") ?>" method="post">
                                            <table  width="100%" cellspacing="0"  id="table-table-search" cellpadding="5"> 
                                             
                                                <tr>
                                                    <td>Item Name :</td>
                                                    <td><input type="text" id="itemname" name="itemname" autofocus style="width:100%" placeholder="Item Name" /> </td>
                                                </tr>
                                                <tr>
                                                    <td>Category : </td>
                                                    <td class="table-width" colspan="3">
                                                        <select name="itemtype" id="itemtype" class="cbo-srieng" style="width: 100%; height: 27px;">                        
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
