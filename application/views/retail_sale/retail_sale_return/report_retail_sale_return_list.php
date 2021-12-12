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
        <table width="100%" cellspacing="0" class="table-table" id="table2excel" cellpadding="0" border="1">
            <tr>               
                <td class="form-title" colspan="12">Report Purchase Return</td>                
            </tr>  
            <tr>               
                <td style="text-align: center;" colspan="12">
                    <p><?php echo $text_display; ?></p>
                </td>                
            </tr> 
             
            <tr>                
                <th><a href="<?php echo site_url("sale_return/addnew"); ?>" class="tooltips" data-original-title="Add New Purchase Return" data-placement="top">New</a></th>
                <th>Nº</th>
                <th>Purchase Return No</th>
                <th>Item Name</th>                   
                <th>Unit Price($)</th>
                <th>QTY</th>  
                <th>Total ($)</th>
                <th>Created Date</th>                   
                <th>Recorder</th>
               
                <th>Note</th>
            </tr>                 
                <tr>
                    <?php
                        $no=1;
                        $total =0;
                        foreach($listrecord as $lr){
                    ?>
                   
                    <td colspan="2" style="text-align: right; padding-right: 2%;"><?php echo $no; ?></td>                   
                    <td><?php echo $lr->sale_return_no; ?> </td>                    
                    <td><?php echo $lr->item_detail_name; ?></td>                                      
                    <td><?php echo number_format($lr->sale_return_price,2); ?></td>
                    <td><?php echo $lr->sale_return_qty; ?></td> 
                    <td><?php echo number_format($lr->sale_return_price * $lr->sale_return_qty,2); ?></td>
                   
                    <td><?php echo $lr->sale_return_created_date; ?></td>
                    <td><?php echo $lr->recorder; ?></td>                                    
                    <td><?php echo $lr->sale_return_note; ?></td>                  
                </tr>                
                <?php
                    $no=$no+1;
                    $total += $lr->sale_return_price * $lr->sale_return_qty;
                    }
                ?>                
                <tr class="total_footer"> 
                    <td colspan="6" style="text-align: right;">Total Amount : </td>
                    <td ><?php echo number_format($total,2); ?></td>
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
							
                                                    <form action="<?php echo site_url("sale_return/search") ?>" method="post">
                                                        <table  width="100%" cellspacing="0"  id="table-table-search" cellpadding="5"> 
                                                                         
                                                            <tr> 
                                                                <td class="table-width">No : </td>
                                                                <td  class="table-width"><input type="number" name="saleno" id="saleno" placeholder="Search Purchase No" /></td>
                                                                <td  class="table-width">Name : </td>
                                                                <td  class=""><input type="text" name="itemname" id="itemname" placeholder="search Item Name" autofocus /></td>
                                                                <td style="display: none;" class=""><input type="text" name="itemname_id" id="itemname_id" placeholder="search Item Name" /></td>
                                                            </tr>
                                                            <tr>                  
                                                                <td class="table-width">From : </td>
                                                                <td ><input style="width: 155px;" type="date" name="datefrom" id="datefrom" placeholder="search sale no" /></td>                       
                                                                <td  class="table-width"> To : </td>
                                                                <td class="table-width"><input style="width: 155px;" type="date" name="dateto" id="dateto" placeholder="Search sale no" /></td>
                                                            </tr>
                                                            <tr>
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
