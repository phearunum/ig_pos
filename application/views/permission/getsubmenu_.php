<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PERMISSION</title>
    <style type="text/css">
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
        background-color: #444;
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
    <form action="<?php echo site_url('permission/save_menu'); ?>" method="POST">
      <table align="center" width="90%">
        <tr>
          <td>
            <input type="text" name="txtidgroup" id="txtidgroup" value="<?php echo $id ?>" class='hidden'/>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: central;">
            <div id="navigation">
              <ul style="list-style-type: none;">
                <?php
                $no=1;
                foreach($records as $g){
                ?>
                <li style="padding-top: 15px;color:#000000;font-family: Calibri">
                  <?php
                  if($g->permission_enable==0){
                  ?>
                  <input type="checkbox" id="<?php $g->permission_page_id_parent ?>" name="chpage<?php echo $g->permission_id; ?>" value="<?php echo $g->permission_id; ?>" >
                  <a href="#" onclick="swap('<?php echo $g->permission_page_id_parent ?>');return false;">
                    <?php echo $lang=='kh'? $g->permission_name_kh : $g->permission_name; ?>
                  </a>
                  <?php
                  }else{
                  ?>
                  <input type="checkbox" id="<?php $g->permission_page_id_parent ?>" name="chpage<?php echo $g->permission_id; ?>" value="<?php echo $g->permission_id; ?>"  checked>
                  <a href="#" onclick="swap('<?php echo $g->permission_page_id_parent ?>');return false;">
                    
                    <?php echo $lang=='kh'? $g->permission_name_kh : $g->permission_name; ?>
                  </a>
                  <?php
                  }
                  ?>
                  <ul style="list-style-type: none;display: none;" id="<?php echo $g->permission_page_id_parent ?>">
                    <?php
                    
                    $submenu=$this->Base_model->loadToListJoin("select * from permission where permission_page_id_parent=".$g->permission_page_id_parent." and position_id=".$id." and permission_control<>'' and permission_active=1");
                    foreach($submenu as $su){
                    ?>
                    <li>
                      <?php
                      if($su->permission_enable==0){
                      ?>
                      <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chpage<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>" >
                      <?php echo $lang=='kh'? $su->permission_name_kh : ucfirst(strtolower($su->permission_name))?>
                      <?php
                      }else{
                      ?>
                      <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chpage<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>"  checked>
                      <?php echo $lang=='kh'? $su->permission_name_kh : ucfirst(strtolower($su->permission_name)) ?>
                      <?php
                      }
                      ?>
                      
                      <?php
                      if($su->permission_control!='0'){
                      ?>
                      <ul style="list-style-type: none;margin-left: 40px;">
                        <li class="sub-check">
                          <?php
                          if($su->permission_add==0){
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chadd<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>" >
                          <?php echo $lbl_add ?>                                                                    <?php
                          }else{
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chadd<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>"  checked>
                          <?php echo $lbl_add ?>
                          <?php
                          }
                          ?>
                          
                          <?php
                          if($su->permission_edit==0){
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chedit<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>" >
                          <?php echo $lbl_edit ?>
                          <?php
                          }else{
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chedit<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>"  checked>
                          <?php echo $lbl_edit ?>
                          <?php
                          }
                          ?>
                          <?php
                          if($su->permission_delete==0){
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chdelete<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>" >
                          <?php echo $lbl_delete ?>
                          <?php
                          }else{
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id_parent ?>" name="chdelete<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>"  checked>
                          <?php echo $lbl_delete ?>
                          <?php
                          }
                          ?>
                          <?php
                          if($su->permission_viewall==0){
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id ?>" name="chview<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>" >
                          <?php echo $lbl_read ?>
                          <?php
                          }else{
                          ?>
                          <input type="checkbox" id="<?php $su->permission_page_id ?>" name="chview<?php echo $su->permission_id; ?>" value="<?php echo $su->permission_id; ?>"  checked>
                          <?php echo $lbl_read ?>
                          <?php
                          }
                          ?>
                        </li>
                      </ul>
                    </li>
                    <?php
                    }
                    }
                    ?>
                  </ul>
                </li>
                <?php
                $no=$no+1;
                }
                ?>
                <li>
                  <input type="submit" permission_name="btnsbumit" class="btn btn-srieng" id="btnsubmit" value="<?php echo $btn_update; ?>" style="border: solid #000000 0px;float:right;"/>
                </li>
              </ul>
            </div>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>