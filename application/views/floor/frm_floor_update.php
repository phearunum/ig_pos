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
                $("#btn_preview").val($("#txt_floor_name").val());
            }
        </script>
    </head>
    <body>
        <form action="<?php echo site_url("floor_layout/save_rename_floor"); ?>" method="post">
        <?php
            foreach($floor_record as $fr){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title"><?php echo $lbl_floor_title; ?></td>
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
                <td><input type="text" name="txt_floor_id" id="txt_floor_id" value="<?php echo $fr->floor_id; ?>"></td>
            </tr>
            <tr>
                <td><?php echo $lbl_floor_name; ?>:<label class="star"> *</label></td>
                <td><input type="text" name="txt_floor_name" id="txt_floor_name" value="<?php echo $fr->floor_name; ?>" required onchange="rename_floor()"></td>
            </tr>
            <?php
            foreach($floor_template as $ftr){
            ?>
                <tr>
                    <td><?php echo $lbl_floor_preview; ?>:<label class="star"> *</label></td>
                    <td>
                        <input type="button" name="btn_preview" id='btn_preview' style="width:<?php echo $ftr->floor_template_width ?>px;height: <?php echo $ftr->floor_template_height ?>px;border: solid <?php echo $ftr->floor_template_outline_color ?> <?php echo $ftr->floor_template_outline_width ?>px;background-color: <?php echo $ftr->floor_template_bg_color ?>;color:<?php echo $ftr->floor_template_fore_color ?>;font-family: Khmer OS Battambang;font-size:<?php echo $ftr->floor_template_font_size ?>px;" value="<?php echo $fr->floor_name; ?>">
                        <span class="hidden">
                        Is Car Wash
                        <?php
                            if($fr->layout_is_car_wash==1){
                        ?>
                            <input type="checkbox" name="ch_is_car_wash" id="ch_is_car_wash" value="1" checked>
                        <?php
                            }else{
                        ?>
                            <input type="checkbox" name="ch_is_car_wash" id="ch_is_car_wash" value="1" checked>
                        <?php
                           }
                        ?>
                        </span>
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
