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
        <form action="<?php echo site_url("branch/update"); ?>" method="post">    
        <?php 
            foreach($record_branch as $rb){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title">Branch (Update)</td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
            </tr>
            <tr class="field-title">
                <td>Field</td>
                <td>Field Value</td>
            </tr>
            <tr>
                <td>Branch Name:<label class="star"> *</label></td>
                <td><input type="text" name="txt_branch_name" id="txt_branch_name" required value="<?php echo $rb->branch_name ?>"></td>
                <td style="display: none;"><input type="text" name="txt_branch_id" id="txt_branch_id" required value="<?php echo $rb->branch_id ?>"></td>
            </tr>
            <tr>
                <td>Branch Location:<label class="star"> *</label></td>
                <td><input type="text" name="txt_branch_location" id="txt_branch_location" required value="<?php echo $rb->branch_location ?>"></td>
            </tr>             
             <tr>
                <td>Branch Phone:<label class="star"> *</label></td>
                <td><input type="text" name="txt_branch_phone" id="txt_branch_phone" required value="<?php echo $rb->branch_phone ?>"></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td> 
                   <input type="text"  name="txt_description" id="txt_description" class="txt-address" value="<?php echo $rb->branch_des ?>">
                </td>
            </tr>
            
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit">Update</button>
                    <button class="btn-srieng" type="reset" onclick="back()">Cancel</button>
                </td>
            </tr>
        </table>
        <?php } ?>
    </form>
    </body>
</html>
