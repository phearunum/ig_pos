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
        <script>
            function rename_floor(){
                $("#btn_preview").val($("#txt_table_name").val());
            }
        </script>
    </head>
    <body>
        <form action="<?php echo site_url("floor_layout/save_rename_table"); ?>" method="post">
        <?php
            foreach($table_record as $fr){
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
            <tr class="hidden">
                <td>Floor Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_table_id" id="txt_table_id" value="<?php echo $fr->layout_id; ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_table_name; ?>:<label class="star"> *</label></td>
                <td><input type="text" name="txt_table_name" id="txt_table_name" value="<?php echo $fr->layout_name; ?>" required onchange="rename_floor()"></td>
            </tr>
            <?php
            foreach($table_template as $ftr){
            ?>
                <tr>
                    <td><?php echo $lbl_table_preview; ?>:<label class="star"> *</label></td>
                    <td>
                        <input type="button" name="btn_preview" id='btn_preview' style="width:<?php echo $ftr->table_template_width ?>px;height: <?php echo $ftr->table_template_height ?>px;border: solid <?php echo $ftr->table_template_outline_color ?> <?php echo $ftr->table_template_outline_width ?>px;background-color: <?php echo $ftr->table_template_bg_color ?>;color:<?php echo $ftr->table_template_fore_color ?>;font-size:<?php echo $ftr->table_template_font_size?>px " value="<?php echo $fr->layout_name ?>"/>
                        <?php echo $this->session->flashdata('error'); ?>
                    </td>
                </tr>
            <?php
             }
            ?>
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit"><?php echo $btn_update; ?></button>
                    <button class="btn-srieng" type="reset" onclick="back()"><?php echo $btn_cancel; ?></button>
                </td>
            </tr>
        </table>
        <?php
           }
        ?>
    </form>
    </body>
</html>
