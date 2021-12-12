
<form action="<?php echo site_url("sale_return/update"); ?>" method="post">    
        <?php
            foreach($stock_record as $sr){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title">Purchase Return(Update)</td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
            </tr>
            <tr class="field-title">
                <td>Field</td>
                <td>Field Value</td>
            </tr>
            <tr class="hidden">
                <td>Sale Return Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_sale_return_id" id="txt_sale_return_id" required readonly class="text-disable" value="<?php echo $id ?>"></td>
            </tr>
            <tr class="hidden"> 
                <td>Stock Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_stock_id" id="txt_stock_id" required readonly class="text-disable" value="<?php echo $sr->stock_id ?>"></td>
            </tr>
            <tr>
                <td>Product Name:<label class="star"> *</label></td>
                <td><input type="text" name="txt_item_detail_name" id="txt_item_detail_name" required readonly class="text-disable" value="<?php echo $proname ?>"></td>
            </tr>
            <tr>
                <td>Qty:</td>
                <td> 
                    <input type="text"  name="txt_qty" id="txt_qty" required>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td> 
                    <input type="text"  name="txt_price" id="txt_price" required value="<?php echo $return_price; ?>">
                </td>
            </tr>
            <tr class="hidden">
                <td>Old Qty:</td>
                <td> 
                   <input type="text"  name="txt_old_qty" id="txt_old_qty" value="<?php echo $qty ?>">
                </td>
            </tr>
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit">Update</button>
                    <button class="btn-srieng" type="reset" onclick="back()">Cancel</button>
                </td>
            </tr>
        </table>
    <?php
       }
    ?>
</form>