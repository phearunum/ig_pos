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
        <link rel="stylesheet" href="<?php echo base_url("css/jquery-ui-1.10.3.custom.min.css") ?>" />
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-1.10.2.min.js"); ?>"></script>	
        <script src="<?php echo base_url("js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js"); ?>"></script>
    </head>
    <body>
          <form action="<?php echo site_url("report_sale_statement/get_statement"); ?>" method="post">    
            <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
                <tr>
                    <td colspan="2" class="form-title">Search Sale Statement</td>
                </tr>
                <tr>
                    <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
                </tr>
                <tr class="field-title">
                    <td>Field</td>
                    <td>Field Value</td>
                </tr>
                <tr>
                    <td>Customer Name<label class="star"> *</label></td>
                    <td>
                        <input type="text" name="txt_customer_name" id="txt_customer_name" autocomplete="off" placeholder="SEARCH CUSTOMER" required>
                    </td>
                </tr>
                <tr class="hidden">
                    <td>Customer Id<label class="star"> *</label></td>
                    <td><input type="text" name="txtcust_id" id="txtcust_id" placeholder="Customer Id" required></td>
                </tr>
                <tr>
                    <td>From Date: <label class="star"> *</label></td>
                    <td><input type="date" name="txt_from_date" id="txt_from_date" autocomplete="off" required class="txt_date"></td>
                </tr>
                <tr>
                    <td>To Date: <label class="star"> *</label></td>
                    <td><input type="date" name="txt_to_date" id="txt_to_date" autocomplete="off" required class="txt_date"></td>
                </tr>
                <tr class="field-title">
                    <td colspan="2" style="text-align: right">
                        <button class="btn-srieng" type="submit" name="btn_submit" value="Print">Print</button>
                        <button class="btn-srieng" type="submit" name="btn_submit" value="Search">Search</button>
                        <button class="btn-srieng" type="reset" onclick="back()">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
        <script type="text/javascript">
            $('#txt_customer_name').autocomplete({

                    source: function( request, response){
                            $.ajax({
                                    url : '<?php echo site_url('close_shift/searchcustomer') ?>',
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
                            $('#txtcust_id').val(names[1]);
                            $('#txt_plate_no').val(names[2]);
 
                }		      	
            });
        </script>
    </body>
</html>
