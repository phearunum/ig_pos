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
            $get_stock_location=$this->Base_model->loadToListJoin("select stock_location_id,stock_location_name from stock_location where stock_location_branch_id=".$id);
            foreach($get_stock_location as $gsl){
                echo '<option value="'.$gsl->stock_location_id.'">'.$gsl->stock_location_name.'</option>';
            }
        ?>
    </body>
</html>
