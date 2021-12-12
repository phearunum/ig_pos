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
       <ul type="number">
            <?php
                $no=1;
                foreach($menu as $g){    
            ?>
                <li class='has-sub'>
                    <?php
                        if($g->enable==0){
                    ?>
                            <input type="checkbox" name="chpage<?php echo $no; ?>" value="<?php echo $no; ?>"> 
                            <?php echo $g->name_en ?>
                    <?php
                        
                        }else{        
                    ?>
                            <input type="checkbox" name="chpage<?php echo $no; ?>" value="<?php echo $no; ?>" checked>
                            <?php echo $g->name_en ?>
                            
                        <?php
                             }
                         ?>
                </li>
                <?php
                $no=$no+1;
                }
            ?>
        </ul>
        
    </body>
</html>
