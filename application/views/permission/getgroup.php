<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <ul style="list-style-type: none;border:solid #000000 1px;">
            <?php
                $no=1;
                foreach($records as $g){    
            ?>
            <li style="border:solid #ABC6DD 1px;padding-top: 15px;" value="<?php echo $g->id_parent; ?>" onclick="checknode(this.value)">
                    <?php
                        if($g->enable==0){
                    ?>
                            <input type="checkbox" id="<?php $g->id_parent ?>" name="chpage<?php echo $no; ?>" value="<?php echo $g->id_parent; ?>" onclick="checknode(this.value)"> 
                            <?php echo $g->name_en ?>
                    <?php 
                       }else{        
                    ?>  
                            <input type="checkbox" id="<?php $g->id_parent ?>" name="chpage<?php echo $no; ?>" value="<?php echo $g->id_parent; ?>" onclick="checknode(this.value)" checked>
                            <?php echo $g->name_en ?>
                            
                    <?php 
                      }
                    ?>  
            </li>
            <?php
                    $no=$no+1;
                }
            ?>
            <li>
                <input type="text" name="txtgroup_id" id="txtgroup_id" value="<?php echo $id ?>"/>
            </li>
        </ul>
    </body>
</html>
