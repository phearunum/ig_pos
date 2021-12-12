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
        <form action="<?php echo site_url("point/update"); ?>" method="post"> 
        <?php
            foreach($record_measure as $rm){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title">Group Position(Update)</td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
            </tr>
            <tr class="field-title">
                <td>Field</td>
                <td>Field Value</td>
            </tr>
            <tr class="hide-id">
                <td>point Id:<label class="star"> *</label></td>
                <td><input type="text" name="txtId" id="txtId" value="<?php echo $rm->id ?>" required></td>
            </tr>           
            <tr>
                    <td>Point Receive:<label class="star"> *</label></td>
                    <td><input type="text" name="txtPoint" id="txtPoint" autocomplete="off" value="<?php echo $rm->point ?>" required></td>
                </tr>
                <tr>
                    <td>From($) :<label class="star"> *</label></td>
                    <td><input type="text" name="txtFrom" id="txtFrom" autocomplete="off" value="<?php echo $rm->froms ?>" required></td>
                </tr>
                <tr>
                    <td>To($) :<label class="star"> *</label></td>
                    <td><input type="text" name="txtTo" id="txtTo" autocomplete="off" value="<?php echo $rm->tos ?>" required></td>
                </tr>
            <tr>
                <td>Description:</td>
                <td> 
                   <input type="text"  name="txtDesc" id="txtDesc" class="txt-address" value="<?php echo $rm->desc ?>">
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
    </body>
</html>
