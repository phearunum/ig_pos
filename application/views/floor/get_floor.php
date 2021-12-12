<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
    foreach($floor_record as $fr){
?>
    <?php
        foreach($floor_template as $ftr){
    ?>
        <button name="btn_floor" id="<?php echo $fr->floor_id ?>" value="<?php echo $fr->floor_name ?>" style="width:<?php echo $ftr->floor_template_width ?>px;height: <?php echo $ftr->floor_template_height ?>px;border: solid <?php echo $ftr->floor_template_outline_color ?> <?php echo $ftr->floor_template_outline_width ?>px;background-color: <?php echo $ftr->floor_template_bg_color ?>;color:<?php echo $ftr->floor_template_fore_color ?>"><?php echo $fr->floor_name; ?></button>
<?php
    }
 }
?>
    