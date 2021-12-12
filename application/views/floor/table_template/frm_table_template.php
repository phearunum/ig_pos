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
        <form action="<?php echo site_url("floor_layout/save_table_template"); ?>" method="post">
        <?php
            foreach($get_table_template_record as $ftr){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title"><?php echo $lbl_table_title; ?></td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label><?php echo $lbl_note_for_form; ?></td>
            </tr>
            <tr class="field-title">
                <td><?php echo $lbl_field; ?></td>
                <td><?php echo $lbl_field_value; ?></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_width; ?>:<label class="star"> *</label></td>
                <td><input type="text" name="txt_table_width" id="txt_table_width" required value="<?php echo $ftr->table_template_width ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_height; ?>:<label class="star"> *</label></td>
                <td><input type="text" name="txt_table_height" id="txt_table_height" required value="<?php echo $ftr->table_template_height ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_outline; ?>:<label class="star"> *</label></td>
                <td><input type="text" name="txt_outline_width" id="txt_outline_width" required value="<?php echo $ftr->table_template_outline_width ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_background; ?>:<label class="star"> *</label></td>
                <td><input type="color" name="txt_background_color" id="txt_background_color" required value="<?php echo $ftr->table_template_bg_color ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_fore_color; ?>:<label class="star"> *</label></td>
                <td><input type="color" name="txt_fore_color" id="txt_fore_color" required value="<?php echo $ftr->table_template_fore_color ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_outline_color; ?>:<label class="star"> *</label></td>
                <td><input type="color" name="txt_outline_color" id="txt_outline_color" required value="<?php echo $ftr->table_template_outline_color ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_busy_color; ?>:<label class="star"> *</label></td>
                <td><input type="color" name="txt_bc_bg_color" id="txt_bc_bg_color" required value="<?php echo $ftr->table_template_busy_color ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_booking_color; ?>:<label class="star"> *</label></td>
                <td><input type="color" name="txt_booking_bg_color" id="txt_booking_bg_color" required value="<?php echo $ftr->table_template_booking_color ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_split_color; ?>:<label class="star"> *</label></td>
                <td><input type="color" name="txt_split_bg_color" id="txt_split_bg_color" required value="<?php echo $ftr->table_template_split_color ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_printed_color; ?>:<label class="star"> *</label></td>
                <td><input type="color" name="txt_printed_bg_color" id="txt_printed_bg_color" required value="<?php echo $ftr->table_template_printed_color ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_font_size; ?>:<label class="star"> *</label></td>
                <td><input type="number" min="1" max="100" style='text-align: center' name="txt_font_size" id="txt_font_size" required value="<?php echo $ftr->table_template_font_size ?>"></td>
            </tr>
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit"><?php echo $btn_update; ?></button>
                    <button class="btn-srieng" type="reset" onclick="back()"><?php echo $btn_cancel; ?></button>
                </td>
            </tr>
            <tr>
                <td style='text-align: center' colspan="2">
                    <button name="btn_preview" id='btn_preview' style="width:<?php echo $ftr->table_template_width ?>px;height: <?php echo $ftr->table_template_height ?>px;border: solid <?php echo $ftr->table_template_outline_color ?> <?php echo $ftr->table_template_outline_width ?>px;background-color: <?php echo $ftr->table_template_bg_color ?>;color:<?php echo $ftr->table_template_fore_color ?>;font-size:<?php echo $ftr->table_template_font_size?>px "><?php echo $lbl_table_table; ?></button>
                    <button name="btn_preview" id='btn_preview' style="width:<?php echo $ftr->table_template_width ?>px;height: <?php echo $ftr->table_template_height ?>px;border: solid <?php echo $ftr->table_template_outline_color ?> <?php echo $ftr->table_template_outline_width ?>px;background-color: <?php echo $ftr->table_template_busy_color ?>;color:<?php echo $ftr->table_template_fore_color ?>;font-size:<?php echo $ftr->table_template_font_size?>px"><?php echo $lbl_table_busy; ?></button>
                    <button name="btn_preview" id='btn_preview' style="width:<?php echo $ftr->table_template_width ?>px;height: <?php echo $ftr->table_template_height ?>px;border: solid <?php echo $ftr->table_template_outline_color ?> <?php echo $ftr->table_template_outline_width ?>px;background-color: <?php echo $ftr->table_template_booking_color ?>;color:<?php echo $ftr->table_template_fore_color ?>;font-size:<?php echo $ftr->table_template_font_size?>px"><?php echo $lbl_table_booking; ?></button>
                    <button name="btn_preview" id='btn_preview' style="width:<?php echo $ftr->table_template_width ?>px;height: <?php echo $ftr->table_template_height ?>px;border: solid <?php echo $ftr->table_template_outline_color ?> <?php echo $ftr->table_template_outline_width ?>px;background-color: <?php echo $ftr->table_template_split_color ?>;color:<?php echo $ftr->table_template_fore_color ?>;font-size:<?php echo $ftr->table_template_font_size?>px"><?php echo $lbl_table_split; ?></button>
                    <button name="btn_preview" id='btn_preview' style="width:<?php echo $ftr->table_template_width ?>px;height: <?php echo $ftr->table_template_height ?>px;border: solid <?php echo $ftr->table_template_outline_color ?> <?php echo $ftr->table_template_outline_width ?>px;background-color: <?php echo $ftr->table_template_printed_color ?>;color:<?php echo $ftr->table_template_fore_color ?>;font-size:<?php echo $ftr->table_template_font_size?>px"><?php echo $lbl_table_printed; ?></button>
                </td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
    </body>
</html>
