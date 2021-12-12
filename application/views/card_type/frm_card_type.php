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
        <form action="<?php echo site_url("card_type/save"); ?>" method="post">    
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title">Card Type(New)</td>
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
                <td><input type="text" name="txt_card_typename" id="txt_card_typename" required></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td> 
                   <input type="text"  name="txt_description" id="txt_description" class="txt-address">
                </td>
            </tr>
            <tr>
                <td>Card Count:</td>
                <td> 
                    <input type="checkbox"  name="ch_iscard_count" id="ch_iscard_count" value="1">
                </td>
            </tr>
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit">Create</button>
                    <button class="btn-srieng" type="reset">Cancel</button>
                </td>
            </tr>
        </table>
    </form>
    </body>
</html>
