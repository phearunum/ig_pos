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
            <form action="<?php echo site_url("menu/save"); ?>" method="post">    
               <table border="1" cellspacing="0" class="table-form" cellpadding="0" width="80%" align="center">
                   <tr>
                       <td colspan="2" class="form-title">Menu</td>
                   </tr>
                   <tr>
                       <td colspan="2" class="form-note"><label class="star"> *</label>Items marked with an asterisk are require</td>
                   </tr>
                   <tr class="field-title">
                       <td>Field</td>
                       <td>Field Value</td>
                   </tr>
                   <tr>
                       <td>Page Parent Name:<label class="star"> </label></td>
                            <td>
                                <select name="cbo_menu_parent" class="cbo-srieng">
                                        <option value="<?php echo $last_id+1 ?>">--Not Yet--</option>
                                   <?php
                                        foreach($menu_records as $mr){  
                                   ?>
                                        <option value="<?php echo $mr->page_id ?>"><?php echo $mr->page_name ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                   </tr>
                   <tr>
                       <td>Page Name:<label class="star"> *</label></td>
                       <td><input type="text" name="txt_menu_name" id="txt_menu_name" required></td>
                   </tr>
                   <tr>
                       <td>Page Name in Khmer:<label class="star"> </label></td>
                       <td><input type="text" name="txt_page_namekh" id="txt_page_namekh"></td>
                   </tr>
                   <tr>
                       <td>Controller Name:<label class="star"> *</label></td>
                       <td><input type="text" name="txt_controller_name" id="txt_controller_name" required></td>
                   </tr>
                   <tr>
                       <td>Page Class:<label class="star"> *</label></td>
                       <td><input type="text" name="txt_page_class" id="txt_page_class"></td>
                   </tr>
                   <tr>
                       <td>Ordering:<label class="star"> *</label></td>
                       <td><input type="text" name="txt_ordering" id="txt_ordering"></td>
                   </tr>
                   <tr class="field-title">
                       <td colspan="2" style="text-align: right">
                           <button class="btn-srieng" type="submit">Create</button>
                           <button class="btn-srieng" type="reset">Cancel</button>
                       </td>
                   </tr>
               </table>
           </form>
    </body>
</html>
