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
        <form action="<?php echo site_url("page/update"); ?>" method="post">
        <?php
            foreach($record_page as $page){
        ?>
        <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
            <tr>
                <td colspan="2" class="form-title"><?php echo "Page "."(".$lbl_edit.")" ?></td>
            </tr>
            <tr>
                <td colspan="2" class="form-note"><label class="star"> *</label><?php echo $lbl_note_for_form ?></td>
            </tr>
            <tr class="field-title">
                <td><?php echo $lbl_field ?></td>
                <td><?php echo $lbl_field_value ?></td>
            </tr>
            <tr class="hidden">
                <td>Page Id:<label class="star"> *</label></td>
                <td><input type="text" name="txt_page_id" id="txt_page_id" value="<?php echo $page->page_id ?>" required></td>
            </tr>
            <!--            <tr>
                <td>Parent ID:<label class="star"> *</label></td>
                <td><input type="text" name="txt_page_parent_id" id="txt_page_parent_id" required value="<?php echo $page->page_id_parent ?>"></td>
            </tr>-->
            <tr>
                <td>Sub in Menu:<label class="star"> *</label></td>
                <td><select name="txt_page_parent_id", id="txt_page_parent_id">
                        <?php 
                            foreach($permission as $sub){
                            if($page->page_id_parent==$sub->permission_page_id_parent){
                                echo "<option selected value='$sub->permission_page_id_parent'>$sub->permission_name</option>";
                        } else {
                            echo "<option value='$sub->permission_page_id_parent'>$sub->permission_name</option>";
                        }
                    }
                ?>
                    </select></td>
            </tr>
            <tr>
                <td>Page Name:<label class="star"> *</label></td>
                    <td><input type="text" name="txt_page_name" id="txt_page_name" value="<?php echo $page->page_name; ?>"></td>
            </tr>
            <tr>
                <td>Controller:<label class="star"> *</label></td>
                <td><input type="text" name="txt_page_controller" id="txt_page_controller" value="<?php echo $page->page_url; ?>"></td>
            </tr>
            <tr>
                <td>Page Ordering:<label class="star"> *</label></td>
                    <td><input type="text" name="txt_page_ordering" id="txt_page_ordering" required value="<?php echo $page->page_ordering ?>"></td>
            </tr>
             <?php 
                    foreach($record_permission as $per){
                ?>
            <tr>
                <td>Page Enable:<label class="star"> *</label></td>
                    <?php 
                        if($per->permission_enable==1){
                            ?>
                            <td><input type="checkbox" name="txt_per_enable" id="txt_per_enable" value="1" checked></td>
                        <?php
                        } else {?>
                         <td><input type="checkbox" name="txt_per_enable" id="txt_per_enable"  value="0" ></td>
                        <?php 
                        }
                        ?>
            </tr>
            <tr>
                <td>Page Active:</td>
                <?php 
                        if($per->permission_active==1){
                            ?>
                            <td><input type="checkbox" name="txt_per_active" id="txt_per_active" value="1" checked></td>
                        <?php
                        } else {?>
                         <td><input type="checkbox" name="txt_per_active" id="txt_per_active"  value="0" ></td>
                        <?php 
                        }
                        ?>
            </tr>
                    <?php }?>
            <tr class="field-title">
                <td colspan="2" style="text-align: right">
                    <button class="btn-srieng" type="submit"><?php echo $btn_update ?></button>
                    <button class="btn-srieng" type="reset" onclick="back()"><?php echo $btn_cancel ?></button>
                </td>
            </tr>
        </table>
    <?php
      }
    ?>
    </form>        
    </body>
</html>
