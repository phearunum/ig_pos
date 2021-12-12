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
        <?php
            $get_table=$this->Base_model->loadToListJoin("SELECT layout_id,layout_name FROM floor_table_layout where floor_id=".$id);
            foreach($get_table as $gt){
                echo '<option value="'.$gt->layout_id.'">'.$gt->layout_name.'</option>';
            }
        ?>
    </body>
</html>
