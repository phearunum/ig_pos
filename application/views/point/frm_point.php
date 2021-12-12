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
        <form action="<?php echo site_url("point/save"); ?>" method="post">    
            <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
                <tr>
                    <td colspan="2" class="form-title">Setup Point(New)</td>
                </tr>
                <tr>
                    <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
                </tr>
                <tr class="field-title">
                    <td>Field</td>
                    <td>Field Value</td>
                </tr>
                <tr>
                    <td>Point :<label class="star"> *</label></td>
                    <td><input type="text" name="txtPoint" id="txtPoint" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td>From($) :<label class="star"> *</label></td>
                    <td><input type="text" name="txtFrom" id="txtFrom" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td>To($) :<label class="star"> *</label></td>
                    <td><input type="text" name="txtTo" id="txtTo" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td> 
                        <input type="text"  name="txtDesc" id="txtDesc" autocomplete="off" class="txt-address">
                    </td>
                </tr>
                <tr class="field-title">
                    <td colspan="2" style="text-align: right">
                        <button class="btn-srieng" type="submit">Create</button>
                        <button class="btn-srieng" type="reset" onclick="back()">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>  
    </body>
</html>
