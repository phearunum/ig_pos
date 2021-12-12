<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript">
            function showMonth(id) {
                if (id == "") {
                    
                    document.getElementById("panelList").innerHTML = "";
                    
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
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;
                            
                        }
                    }
                    
                    xmlhttp.open("GET","permission/getsubmenu/"+id,true);
                    xmlhttp.send();
                    
                }
            }
            
            function myFunction(str){
               
               if (str == "") {
                    document.getElementById("panelList").innerHTML = "";
                    
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
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;
                        }
                    }
                    
                    xmlhttp.open("POST","permission/getsubmenu/"+str,true);
                    xmlhttp.send();
                    
                }
            }
            
            function searchfromto(str){
                
                var from=document.getElementById("txtFromDate").value;
                var to=document.getElementById("txtToDate").value;
                
                if (str == ""){
                    document.getElementById("panelList").innerHTML = "";
                    
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
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;
                            
                        }
                    }
                    
                    xmlhttp.open("GET","purchase_report/getdetail/"+from+"/"+to,true);
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
        
        function checknode(id){
               var group_id=document.getElementById('txtgroup_id').value;
               if (id == "") {
                    document.getElementById("panelList").innerHTML = "";
                    
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
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;
                        }
                    }
                    
                    xmlhttp.open("POST","permission/getsubmenu/"+id+"/"+group_id,true);
                    xmlhttp.send();
                }
            
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
            $("html").getNiceScroll().resize();
            }
        </script>
        <script>
            $(document).ready(function(){
                $('.li-list').click(function(){
                    $('.li-list.active').removeClass('active');
                    $(this).addClass('active');
                    //
                   showMonth($(this).val());
                    //
                    setTimeout(function(){ 
                        $("html").getNiceScroll().resize(); 
                    }, 1000);
                });
            });
        </script>
        
    </head>
    <body>        
        <table width='100%' style="font-family: Calibri;">
            <tr style="height:20px">
                
            </tr>
            <tr>
                <td width='20%' style='text-align: left;border-right:solid #000 0px;vertical-align: top;'>
                    <div style="position: fixed">
                        <ul class="list moreitem-one colorblack" id="list">
                                <?php 
                                       foreach($record_position as $n){    
                                ?>    
                                        <li value="<?php echo $n->position_id ?>" class='li-list context-menu-one'><a href="#" class="" style='color:#0063DC;'><?php echo $n->position_name ?></a></li>
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
            <div class="modal fade" id="frm_position" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Position Name</label>
                                                        <input type="text" id="txt_id" class="form-control hidden" style="text-align: center" placeholder="">
                                                        <input type="text" id="txt_name" class="form-control" style="text-align: center" placeholder="">
                                                    </div>
                                                    <div class="form-line">
                                                        <label class="form-label">Description</label>
                                                        <textarea type="text" id="txt_description" row="4" class="form-control" style="text-align: center" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" id="btn_save_position" data-dismiss="modal">SAVE CHANGES</button>
                                                <button type="button" class="btn bg-green" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
            </div>    
                
        </table>
    </body>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change','ul li input',function() {
                if($(this).is(':checked')==true){
                    $(this).parent().find('li input[type=checkbox]').prop('checked', true);
                    $(this).closest('ul').prev().prop('checked',true);
                    $(this).closest('ul').prev().prev().prop('checked', true);
                    $(this).closest('ul').prev().closest('ul').prev().prev().prop('checked', true);
                }
                else
                {
                    $(this).parent().find('li input[type=checkbox]').prop('checked', false);
                    //$(this).parent().closest('ul').prev().find('input[type=checkbox]').prop('checked',false);
                }
            });
        });
        
    </script>
</html>
