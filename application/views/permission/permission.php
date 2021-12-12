<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript">
        function showProduct(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
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
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            
            xmlhttp.open("GET","permission/getgroup/"+str,true);
            xmlhttp.send();
        }
    }
    </script>
</head>
<body>
<form action="<?php echo site_url("permission/save"); ?>" method="POST" id="form" enctype="multipart/form-data">
<div id="example" style="margin-top: 40px">

    <div class="demo-section k-content">
        <div>
            <h4>Check Permission</h4>
            <select name="cboGroup"  class="form-control-static" onchange="showProduct(this.value)">
                <option value="0">
                        --select group--
                </option>
                <?php
                    $records=$this->Base_model->loadToList('tblgroup');
                    foreach($records as $rec){
                ?>
                    <option value="<?php echo $rec->id ?>">
                            <?php echo $rec->name; ?>
                    </option>
               <?php 
                    } 
                ?>
            </select>
        </div>
        <div style="padding-top: 2em;">
            <div id="txtHint">
                <ul type="number">
                    <?php
                        $menu=$this->Base_model->loadToListJoin('select * from tblpage where active=1 group by id_parent');
                        $no=1;
                        foreach($menu as $m){
                    ?>      
                            <li class='has-sub'>
                                    <input type="checkbox" name="chpage<?php echo $no; ?>" value="<?php echo $no ?>">
                                    <?php echo $m->name_en ?>
                            </li>
                    <?php
                           $no=$no+1;
                        }
                    ?>
                </ul>
           </div>
        </div>
        <!--<input type="submit" class="btn btn-default" name="btnSubmit" value="Save">-->
        <input type="submit" class="btn btn-default" name="btnSubmit" value="Save">
    </div>
</div>
</form>
</body>
</html>
