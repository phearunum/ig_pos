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
    </head>
    <body>
        <form action="<?php echo site_url("card_type/update"); ?>" method="post">    
        <?php 
            foreach($record_card_type as $ct){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title">Card Type(Update)</td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
            </tr>
            <tr class="field-title">
                <td>Field</td>
                <td>Field Value</td>
            </tr>
            <tr>
                <td>Card Type Name:<label class="star"> *</label></td>
                <td><input type="text" name="txt_card_typename" id="txt_card_typename" value="<?php echo $ct->card_type_name ?>" required></td>
            </tr>
            <tr class="hide-id">
                <td>Card Type Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_card_id" id="txt_card_id" value="<?php echo $ct->card_type_id ?>" required></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td> 
                   <input type="text"  name="txt_description" id="txt_description" value="<?php echo $ct->card_type_description ?>" class="txt-address">
                </td>
            </tr>
            <tr>
                <td>Card Count:</td>
                <td>
                    <?php
                        if($ct->is_count==1){
                    ?>
                        <input type="checkbox"  name="ch_iscard_count" id="ch_iscard_count" value="1" checked>
                    <?php
                        }else{
                    ?>
                        <input type="checkbox"  name="ch_iscard_count" id="ch_iscard_count" value="1">
                    <?php
                        }
                    ?>
                </td>
            </tr>
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit">Update</button>
                    <button class="btn-srieng" type="reset">Cancel</button>
                </td>
            </tr>
        </table>
            <?php } ?>
    </form>
    </body>
</html>
