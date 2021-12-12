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
        <form action="<?php echo site_url("employee/update_password_change"); ?>" method="post">
        <?php
            foreach($employee_record as $re){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title">Employee(Change Password)</td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
            </tr>
            <tr class="field-title">
                <td>Field</td>
                <td>Field Value</td>
            </tr>
            <tr class="hide-id">
                <td>Employee Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_employee_id" id="txt_employee_id" value="<?php echo $re->employee_id ?>" required></td>
            </tr>
            <tr>
                <td>Employee Name:<label class="star"> *</label></td>
                <td><input type="text" name="txt_employee_name" id="txt_employee_name" required value="<?php echo $re->employee_name ?>" readonly class="text-disable"></td>
            </tr>
            <tr>
                <td>User Name:<label class="star"> *</label></td>
                <td><input type="text" name="txt_username" id="txt_username" required value="<?php echo $re->user_name ?>"></td>
            </tr>
            <tr>
                <td>Current Password:<label class="star"> *</label></td>
                <td><input type="password" name="txt_password" id="txt_password" required value="<?php echo $re->$password ?>"></td>
            </tr>
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit">Update</button>
                    <button class="btn-srieng" type="reset">Cancel</button>
                </td>
            </tr>
        </table>
    <?php
      }
    ?>
    </form>
    </body>
</html>
