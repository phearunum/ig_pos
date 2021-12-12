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
        <script type="text/javascript">
            function showFloorTable(id) {
                if (id == "") {
                    
                    document.getElementById("panelList").innerHTML = "";
                    
                    return;
                } else { 
                    if (window.XMLHttpRequest){
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;
                            
                        }
                    }
                    
                    xmlhttp.open("GET","table_for_order/get_floor_table/"+id,true);
                    xmlhttp.send();
                    
                }
            }
            
        function myfunction(){
            $(function() {
                    $(".table2excel").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "Report Purchase",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true
                    });
            });
        }
        
        
        </script>
        
        <script type="text/javascript">
        function swap(targetId){
          if (document.getElementById){
                target = document.getElementById(targetId);
                    if (target.style.display == "none"){
                        target.style.display = "";
                    }else{
                        target.style.display = "none";
                    }
                }
            }
        </script>
        
    </head>
    <body>
        <table width='100%' style="font-family: Calibri;">
            <tr style='text-align: center;font-weight: bold;'>
                <td style='position: fixed;'>Employee</td>
                <td>Floor Table</td>
            </tr>
            <tr>
                <td width='20%' style='text-align: left;border-right:solid #000 1px;vertical-align: top;'>
                    <div style="position: fixed">
                        <ul class="list moreitem-one colorblack" id="list">
                                <?php 
                                       foreach($record_employee as $re){    
                                ?>    
                                        <li onclick="showFloorTable(this.value)" value="<?php echo $re->employee_id ?>" class='li-list'><a href="#" style='color:#0063DC;'><?php echo $re->employee_name ?></a></li>
                                <?php   
                                  }     
                                ?>
                        </ul>
                    </div>
                </td>
                <td style='width:70%' style="vertical-align: top;">
                    <div id='panelList'>
                                        
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
