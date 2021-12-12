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
        <style type="text/css" media="Screen">
                #navigation ul {
                  list-style-type: none;
                  padding: 0;
                  margin: 0;
                  width: 100%;
                }
                #navigation a {
                    text-decoration: none;
                    display: block;
                    padding: 3px 12px 3px 8px;
                    background-color: #0063DC;
                    color: #fff;
                    border: 1px solid #ddd;
                }
                #navigation a:active {
                  padding: 2px 13px 4px 7px;
                  background-color: #444;
                  color: #eee;
                  border: 1px solid #333;
                }
                #navigation li li {
                  text-decoration: none;
                  padding: 3px 3px 3px 17px;
                  background-color: transparent;
                  border:none;
                  color: #cc0000;
                }
                #navigation li li a{
                  text-decoration: none;
                  background-color: transparent;
                  border:none;
                  float:right;
                  color: #0033cc;
                }
                #navigation li li a:active{
                  padding: auto;
                  background-color: transparent;
                  border:none;
                  color:#cc0000;
                }
        </style>
    </head>
    <body>
        <form action="<?php echo site_url("table_for_order/save_table_order"); ?>" method="POST">
        <table align="center" width="90%">
            <tr>
                <td>
                    <input type="text" name="txt_employee_id" id="txt_employee_id" value="<?php echo $emp_id ?>" class='hidden'/>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;background-color: #0063DC"><label style="color:#fff;font-size: 14px;font-weight: bold;"><?php echo "Emplyee Name:".$emp_name ?></label></td>
            </tr>
            <tr>
                <td style="vertical-align: central;">
                    <div id="navigation">
                    <ul style="list-style-type: none;">
                            <?php
                                $no=1;
                                foreach($record_floor as $r){    
                            ?>
                                <li style="padding-top: 15px;color:#000000;font-family: Calibri">
                                            <a href="#" onclick="swap('<?php echo $r->floor_id ?>');return false;">
                                                <?php echo"+ " . $r->floor_name ?>
                                            </a>
                                            <?php
                                                if($this->Base_model->loadToListJoin("select * from v_floor_table_layout where floor_id=".$r->floor_id." and layout_manage_by=".$emp_id)){
                                                 
                                            ?>
                                            <ul style="list-style-type: none;display: none;" id="<?php echo $r->floor_id ?>" class='list_table'>
                                                    <?php
                                                        $table_record=$this->Base_model->loadToListJoin("select * from v_floor_table_layout where floor_id=".$r->floor_id." and layout_manage_by=".$emp_id);
                                                        foreach($table_record as $tr){
                                                    ?>
                                                    
                                                            <li>
                                                                <input type="checkbox" id="<?php $tr->layout_id ?>" name="chpage<?php echo $tr->layout_id; ?>" value="<?php echo $tr->layout_id; ?>" class='ch_un_check' onclick="checksub(this.value)" checked> 
                                                                <?php echo ucfirst(strtolower($tr->layout_name)) ?>
                                                            </li>
                                                           
                                                    <?php
                                                      }
                                                    ?>
                                            </ul>
                                             <?php 
                                                }
                                                if($this->Base_model->loadToListJoin("select * from v_floor_table_layout where floor_id=".$r->floor_id." and layout_manage_by=0")){
                                             ?>
                                             <ul style="list-style-type: none;display: none;" id="<?php echo $r->floor_id ?>" class='list_table'>
                                                    <?php
                                                        $table_record=$this->Base_model->loadToListJoin("select * from v_floor_table_layout where floor_id=".$r->floor_id." and layout_manage_by=0");
                                                        foreach($table_record as $tr){
                                                    ?>
                                                            <li>
                                                                <input type="checkbox" id="<?php $tr->layout_id ?>" name="chpage<?php echo $tr->layout_id; ?>" value="<?php echo $tr->layout_id; ?>" class='ch_un_check' onclick="checksub(this.value)"> 
                                                                <?php echo ucfirst(strtolower($tr->layout_name)) ?>
                                                            </li>
                                                           
                                                    <?php
                                                      }
                                                    ?>
                                            </ul>
                                            <?php
                                               }
                                            ?>
                                </li>       
                                   
                            <?php
                                  $no=$no+1;
                                }
                            ?>
                            <li>
                                <input type="submit" permission_name="btnsbumit" class="btn-srieng" id="btnsubmit" value="SAVE" style="border: solid #000000 1px;float:right;"/>
                            </li>
                    </ul>
                   </div>
                </td>
            </tr>
        </table>
     </form>
    </body>
</html>
