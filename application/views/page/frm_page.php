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
        <form method="POST" action="<?php echo site_url("page/save"); ?>">
        <table>
            <tr>
                <td><label>Menu Parent</label></td>
                <td>
                    <select name="cbo_menu_parent" id="cbo_page_parent">
                        <option>--PAGE PARENT--</option>
                        <?php
                            foreach($record_page_parent as $rpp){
                        ?>
                        <option value="<?php echo $rpp->page_id_parent; ?>"><?php echo $rpp->page_name; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Sub Menu</label></td>
                <td>
                    <input type="text" name="txt_sub_menu" id="txt_sub_menu" placeholder="SUB MENU">
                </td>
            </tr>
            <tr>
                <td><label>Controller Name</label></td>
                <td>
                    <input type="text" name="txt_controller_name" id="txt_controller_name" placeholder="Controller Name">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type='submit' name="btn_submit" id="btn_submit" value="Save"></td>
            </tr>
        </table>
        </form>
    </body>
</html>
