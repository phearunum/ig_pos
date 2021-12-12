<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type='text/javascript'>
            function buttonClick(subEvent)
            {              
                var x=$("#txt_x").val();
                var y=$("#txt_y").val();

                if (subEvent == "") {
                    document.getElementById("").innerHTML = "";
                    return;
                } else {
                    
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //document.getElementById("").innerHTML = xmlhttp.responseText;
                            
                        }
                    }
                    
                    xmlhttp.open("POST","<?php echo site_url("floor_layout/save_table_layout") ?>/"+x+"/"+y+"/"+subEvent,true);
                    xmlhttp.send();
                }
            }
            function addFloor(str){
                if (str == "") {
                    document.getElementById("floor_panel").innerHTML = "";
                    return;
                } else { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("floor_panel").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("POST","<?php echo site_url("floor_layout/add_floor/"); ?>",true);
                    xmlhttp.send();
                }
                location.reload();
            }
            
            function display_table(floor_id){
                if (floor_id == "") {
                    document.getElementById("table_panel").innerHTML = "";
                    return;
                } else { 
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("table_panel").innerHTML = xmlhttp.responseText;
                            
                        }
                    }
                        xmlhttp.open("POST","floor_layout/display_table/"+floor_id,true);
                        xmlhttp.send();
                }
            }
            
        </script>
        
        <script>
            $(document).ready(function (){
                $(".draggable" ).draggable({
                    drag: function () {
                        var l = $(this).position().left;
                        var t = $(this).position().top;
                        //t.text(l);

                        $("#txt_x").val(l);
                        $("#txt_y").val(t);
                        //if(l < 500){
                        //t.text('Badaboom');
                        //}
                    }
                });
            });
        </script>
        <script>
            function show_edit(){
                $(".btn_edit_floor").show();
                
            }
            
            function show_rename(floor_id){
                $("#txt_floor_rename_id").val(floor_id);
            }
            
            function asign_layout(layout_id){
                $("#txt_table_layout_id").val(layout_id);
            }
            function show_edit_table(){
                $(".ch_check_table").show();
                $(".btn_edit_table").show();
            }
            function deleteItem(floor_id){
                var r = confirm("Do you want to delete this floor?");
                if(r==true){
                    window.open("<?php echo site_url("floor_layout/delete_floor/"); ?>"+"/"+floor_id,'_self',false);
                }
                 
            }
            
            function editItem(floor_id){
                 window.open("<?php echo site_url("floor_layout/floor_edit_load/"); ?>"+"/"+floor_id,'_self',false);
            }
            
            function edit_table(table_id){
                window.open("<?php echo site_url("floor_layout/table_edit_load/"); ?>"+"/"+table_id,'_self',false);
            }
            
            function delete_table(table_id){
                var r = confirm("Do you want to delete this table?");
                if(r==true){
                    window.open("<?php echo site_url("floor_layout/delete_table/"); ?>"+"/"+table_id,'_self',false);
                }
            }
            
        </script>
    </head>
    <body oncontextmenu="return false">
        <form action="<?php echo site_url("floor_layout/submit"); ?>" method="post">
        <table class="table-form" width="100%">
            <tr>
                <td>
<!--                  <a id="modal-673355" href="#modal-container-673355" role="button" data-toggle="modal">-->
                        <input type="button" name="btn_submit" value="<?php echo $btn_add_floor ?>" onclick="addFloor()" class="btn-srieng">
                        <input type="button" name="btn_submit" id="btn_edit_floor" value="<?php echo $btn_edit_floor ?>" class="btn-srieng" onclick="show_edit()">
                        <a id="modal-673356" href="#modal-container-673356" role="button" data-toggle="modal" style="display: none;">
                            <input type="button"  name="btn_submit" value="Edit" class="btn-srieng">
                        </a>
<!--                  </a>-->
                </td>
            </tr>
            <tr>
                <td id="floor_panel" >
                    <div style='overflow: auto; height:76px !important; width: 100%; overflow-x:  hidden;'>
                        <?php
                            if($floor_record!=""){
                            foreach($floor_record as $fr){
                        ?>
                            <?php
                                foreach($floor_template as $ftr){
                            ?>
                                
                                    <div  name="btn_floor" onclick="display_table(this.id)" id="<?php echo $fr->floor_id ?>" style="width:<?php echo $ftr->floor_template_width ?>px; float:left; height: <?php echo $ftr->floor_template_height ?>px;border: solid <?php echo $ftr->floor_template_outline_color ?> <?php echo $ftr->floor_template_outline_width ?>px;background-color: <?php echo $ftr->floor_template_bg_color ?>;font-size:<?php echo $ftr->floor_template_font_size ?>px;color:<?php echo $ftr->floor_template_fore_color; ?>"/>
                                        <a href="<?php echo site_url("floor_layout/display_table/".$fr->floor_id); ?>" style="cursor: default; text-align: center;color:<?php echo $ftr->floor_template_fore_color; ?>;cursor: pointer"><?php echo '<span><p  class="font_khmer">'.$fr->floor_name.'</p></span>' ?></a>
                                            &nbsp;
                                        <img src="<?php echo base_url("img/icons/edit-icon.png"); ?>" id="<?php echo $fr->floor_id ?>" class="btn_edit_floor" style="cursor: pointer;display: none;" onclick="editItem(this.id)"/>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                        <img src="<?php echo base_url("img/delete.gif"); ?>" id="<?php echo $fr->floor_id ?>" class="btn_edit_floor" style="cursor: pointer;display: none;" onclick="deleteItem(this.id)"/>
                                    </div>
                                           
                        <?php
                            }
                         }
                        }
                       ?>
                    </div>
                    <div style="display:none; "   id="contextMenu">
                        <table  border="0" cellpadding="0" cellspacing="0" 
                                style="border: thin solid #808080;cursor: default;" width="100px" 
                                bgcolor="White">
                            <tr>
                                <td>
                                    <div  class="ContextItem"><a href="#" onclick="rename(this.id)">Rename</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div  class="ContextItem"><a href="#">Delete</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div  class="ContextItem" onmouseup="HideMenu('contextMenu');" onmousedown="HideMenu('contextMenu');">Cancel</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="border:solid #000000 1px">
                    <a id="modal-673355" href="#modal-container-673355" role="button" data-toggle="modal">
                        <input type="button" name="btn_submit" value="<?php echo $btn_add_table ?>"  class="btn-srieng">
                    </a>
                    <input type="button" name="btn_submit" id="btn_edit" value="<?php echo $btn_edit_table ?>" class="btn-srieng" onclick="show_edit_table()">
                    <input type="button" name="btn_submit" id="btn_edit" value="Delete" class="btn-srieng" style="display: none;">
                    
                    <table width="100%" height="400px">
                        <tr>
                            <td style='position: absolute; text-align: center; ' class="container">
                                <span style='display: none;'>
                                    X<input type='text' id='txt_x'>
                                    Y<input type='text' id='txt_y'>
                                </span>
                                <?php
                                if ($table_layout != ""){
                                    $n = 1;
                                    foreach ($table_layout as $tl){
                                        ?>
                                        <?php
                                         foreach ($table_template as $tt){
                                        ?>
                                            <div class="draggable" onclick="buttonClick(this.id)" id='<?php echo $tl->layout_id; ?>' style=" width:<?php echo $tt->table_template_width ?>px;cursor: move ;position: absolute;height: <?php echo $tt->table_template_height ?>px;border: solid <?php echo $tt->table_template_outline_color ?> <?php echo $tt->table_template_outline_width ?>px;background-color: <?php echo $tt->table_template_bg_color ?>;color:<?php echo $tt->table_template_fore_color; ?>;font-size: <?php echo $tt->table_template_font_size ?>px;left:<?php echo $tl->layout_location_x ?>px;top:<?php echo $tl->layout_location_y ?>px;">
                                                
                                                <?php echo "<span><p class='font_khmer'>".$tl->layout_name."</p></span>" ?>   
                                                <img src="<?php echo base_url("img/icons/edit-icon.png"); ?>" id="<?php echo $tl->layout_id ?>" class="btn_edit_table" style="cursor: pointer;display: none;" onclick="edit_table(this.id)"/>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <img src="<?php echo base_url("img/delete.gif"); ?>" id="<?php echo $tl->layout_id ?>" class="btn_edit_table" style="cursor: pointer;display: none;" onclick="delete_table(this.id)"/>
                                            </div>
                                            <?php
                                         }
                                      }
                                   $n++;
                                 }
                               ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style='text-align: right'>
                    <button name="btn_submit" value="Floor_Template" class="btn-srieng"><?php echo $btn_floor_template ?></button>
                    <button name="btn_submit" value="Table_Template" class="btn-srieng"><?php echo $btn_table_template ?></button>
                </td>
            </tr>
        </table>
        </form>
        <div class="modal fade" id="modal-container-673355" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style='width: 300px'>
                <form action="<?php echo site_url("floor_layout/save_table") ?>" method="post">
                    <div class="modal-content">
                        <table  width="100%" cellspacing="0" cellpadding='0' class='table-form'>
                            <tr>
                                <td class='field-title'><?php echo $btn_add_table ?></td>
                            </tr>
                            <tr> 
                                <td style='text-align: center'><input type="text" name="txt_floor_id" value="<?php echo $floor_id ?>" id="txt_floor_id" autocomplete="off" style='width: 100%;height: 40px;text-align: center;font-weight: bold;font-size: 15px;display: none;'/></td>
                            </tr>
                            <tr> 
                                <td style='text-align: center'><input type="text" name="txt_table_qty" id="txt_table_qty" autofocus placeholder="Table Qty" autocomplete="off" style='width: 100%;height: 40px;text-align: center;font-weight: bold;font-size: 15px;'/></td>
                            </tr>
                            <tr>
                                <td style='text-align: right'>
                                    <input type="submit" value="<?php echo $btn_save ?>" class='btn-srieng'/> 
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>		
        </div>
    </body>
</html>
