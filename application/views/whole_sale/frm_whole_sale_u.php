<form action="<?php echo site_url("retail_sale/update"); ?>" method="post">    
        <?php
            foreach($stock_record as $sr){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title">Retail Sale(Update)</td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
            </tr>
            <tr class="field-title">
                <td>Field</td>
                <td>Field Value</td>
            </tr>
            <tr class="hidden">
                <td>Sale Detail Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_sale_id" id="txt_sale_id" required readonly class="text-disable" value="<?php echo $id ?>"></td>
            </tr>
            <tr class="hidden">
                <td>stock Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_stock_id" id="txt_stock_id" required  value="<?php echo $sr->stock_id ?>"></td>
            </tr>
            <tr class="hidden">
                <td>Product Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_item_id" id="txt_item_id" required readonly class="text-disable" value="<?php echo $sr->stock_item_id ?>"></td>
            </tr>
            <tr class="hidden">
                <td>Measure Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_measure_id" id="txt_measure_id" required readonly class="text-disable" value="<?php echo $sr->measure_id ?>"></td>
            </tr>
            <tr>
                <td>Product Name:<label class="star"> *</label></td>
                <td><input type="text" name="txt_item_detail_name" id="txt_item_detail_name" required readonly class="text-disable" value="<?php echo $proname ?>"></td>
            </tr>
            <tr>
                <td>Unit Price:<label class="star"> *</label></td>
                <td><input type="text" name="txt_unit_price" id="txt_unit_price" required value="<?php echo $unit_price ?>"></td>
            </tr>
            <tr>
                <td>New Qty:</td>
                <td> 
                    <input type="text"  name="txt_qty" id="txt_qty" autofocus>
                </td>
            </tr>
            <tr>
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