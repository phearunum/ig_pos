<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title> 
        <script type="text/javascript">
            function searchFromTo(str) {
                
                var date_f=document.getElementById("datefrom").value;
                var date_t=document.getElementById("dateto").value;
                var branch=$('#cbo_branch').val();
                
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
                    xmlhttp.onreadystatechange = function(){
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("loading").innerHTML = '';
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;                           
                        }
                    }
                    document.getElementById("loading").innerHTML = '<img src="<?php echo base_url("img/icons/loading.gif"); ?>" width="150px"/>'; // Set here the image before sending request
                    xmlhttp.open("GET","<?php echo site_url("report_profitandlost/search_from_to"); ?>"+"/"+date_f+"/"+date_t+"/"+branch,true);
                    xmlhttp.send();
                }
            }
            function search(str){

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
                            document.getElementById("loading").innerHTML = '';
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;
                        }
                    }
                    if(str.length==4){
                        var branch=$('#cbo_branch').val();
                    document.getElementById("loading").innerHTML = '<img src="<?php echo base_url("img/icons/loading.gif"); ?>" width="150px"/>'; // Set here the image before sending request
                    xmlhttp.open("POST","<?php echo site_url("report_profitandlost/search_pnl_all"); ?>"+"/"+str+"/"+branch,true);
                }else{
                    var branch=$('#cbo_branch').val();
                    document.getElementById("loading").innerHTML = '<img src="<?php echo base_url("img/icons/loading.gif"); ?>" width="150px"/>'; // Set here the image before sending request
                    xmlhttp.open("POST","<?php echo site_url("report_profitandlost/search_pnl"); ?>"+"/"+str+"/"+branch,true);
                }   
                    xmlhttp.send();
                }
            }
        </script>
    <script type="text/javascript">
         function myFunction(){
            if (confirm('Do you want to export this data?')) {
                $(function() {
                        $("#table2excel").table2excel({
                                exclude: ".noExl",
                                name: "Excel Document Name",
                                filename: "<?php echo $title ?>",
                                fileext: ".xls",
                                exclude_img: true,
                                exclude_links: true,
                                exclude_inputs: true
                        });
                });
            }      
        }
    </script>
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
                background-color: #13224B;
                color: #fff;
                border: 1px solid #ddd;
            }
            #navigation a:active {
                padding: 2px 13px 4px 7px;
                background-color: #cc0000;
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
            
            #navigation li li a:active{
                padding: auto;
                background-color: transparent;
                border:none;
                color:#cc0000;
            }
            .col-full{
                width:100%;
                text-align:center;
            }
            .col-haft{
                width:40%;
                text-align:center;
                display: inline;
            }
            .parent{
                cursor: pointer;
            }
            .child{
                text-decoration: none;
                display: block;
                padding: 3px;
                margin-left:13px;
                background-color: #fff;
                cursor: pointer;
                width:65px;
                text-align:center;
            }
            .child .col-haft{
                border: 1px solid #13224B;
                color: #13224B;
                text-align:center;
                padding:2px;
                margin:2px;
                margin-bottom: 15px;
            }
            .child .col-full{
                border: 1px solid #13224B;
                color: red;
                text-align:center;
                padding:2px;
            }
            .child .row{
                padding: 2px;
                margin:3px;
            }
            .ulgrid {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                list-style-type: none;
                padding-left: 0;
            }
            .ulgrid li {
                flex-basis: 98%;
                margin: 1%;
                padding: 5px 0;
                text-align: center;
                box-sizing: border-box;
                background-color: #13224B;
            }
            .ulgrid .parent {
                width:68px;
            }
            .ulgrid li.non-bg {
                flex-basis: 98%;
                margin: 0;
                padding: 0;
                text-align: center;
                box-sizing: border-box;
                background-color: #fff;
            }

            .white-label a{
                color:#fff;
                padding:0 5px;
                margin: 5px;
            }
            .child{
                padding-left: 10px;
                padding-top:0px;
                padding-bottom: 0px;
                padding-right: 1px;
                width: 55px;
            }
             .field-title-search {
                background-color: #0a3e40;
                font-size: 17px ;
                color: #FFFFFF;
            }
            input, button, select, textarea {
                font-family: inherit;
                font-size: inherit;
                line-height: inherit;
                border-radius: 4px;
            }
            #navigation a {
                text-decoration: none;
                display: block;
                padding: 3px 12px 3px 8px;
                background-color: #137b80;
                color: #fff;
                border: 1px solid #ddd;
            }
            .btn-highpoint {
                border-style: none;
                background-color: #137b80;
                color: red;
                border: 1px solid #137b80;
            }
           
                    </style>
        <script type="text/javascript">
        function swap(targetId){
          if (document.getElementById){
                target = document.getElementById(targetId);
                    if (target.style.display == "none"){
                        target.style.display = "block";
                    }else{
                        target.style.display = "none";
                    }
                }
            }
        </script>
    </head>
    <body>  
        <table width="100%" border="1" class="table-form">
            <tr>
                <td style="vertical-align: top; text-align: center; width:100px;">
                    <table>
                        <tr style="text-align: center; margin-bottom: 10px;">
                            <td>Year<?php echo $btn_year?></td>
                        </tr>
                        <tr>
                            
                            <td style="vertical-align: top; ">
                                <input class="btn btn-primary" type="button" id="modal-673355" href="#modal-container-673355" role="button" data-toggle="modal" value="<?php echo $btn_search?>" style="margin-top: 1px;background-color: #137b80;color:#f9dd34;border:none">
                            </td>
                            <td>
                                <select  name="cbo_branch" id="cbo_branch" >
                                   
                                    <?php
                                    foreach ($branch as $b) {
                                        ?>
                                        <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                                    <?php } ?>
                                </select>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <div id="navigation">
                                    <ul>
                                       <?php 
                                              foreach($year as $y){    
                                        ?>    
                                              <li value="<?php echo $y->years ?>">
                                                  <a class="btn btn-primary" href="#" style='color:#f9dd34; background-color: #137b80 ; ' onclick="swap('<?php echo $y->years  ?>');return false;"><?php echo $y->years ?></a>
                                              </li>
                                              <li>
                                                  <ul id="<?php echo $y->years ?>" style="display:none">
                                                      <?php
                                                           $record=$this->Base_model->loadToListJoin("select distinct date_format(checkout_date,'%m') as months,date_format(checkout_date,'%Y') as year from v_sale_summary where date_format(checkout_date,'%Y')=".$y->years);
                                                           foreach($record as $r){
                                                      ?>
                                                           <li name="btnSubmit" class="white-label" value="<?php echo $r->months ?>" id="<?php echo $r->months.'/'.$r->year ?>"  onclick="search(this.id)"><a href="#"><?php echo $r->months ?></a></li>
                                                      <?php
                                                        }
                                                      ?>
                                                           <li name="btnSubmit" class="white-label" value="<?php echo $y->years ?>" id="<?php echo $y->years ?>"  onclick="search(this.id)"><a href="#">All<?php echo $btn_all?></a></li>
                                                  </ul>
                                              </li>
                                       <?php   
                                         }     
                                       ?>
                                    </ul>
                                </div>
                                
                            </td>


                        </tr>

                    </table>
                </td>
                <td colspan="2">
                    <span id="loading" style="margin-left: 42%;"></span>
                    <div id='panelList'>
                        
                    </div>
                </td>
            </tr> 
        </table>
        <!--        MODAL FORM-->
                <div class="modal fade" id="modal-container-673355"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table cellspacing="0" class="table-form"  id="table-form" width="100%">
                                    <tr class="field-title-search">
                                        <td colspan="2"></td>
                                        <td colspan="2"><input type="button" value="X"  class="btn btn-danger pull-right btn-highpoint" data-dismiss="modal"/></td>
                                    </tr>
                                    <tr>                  
                                        <td style="font-size: 18px;"><?php echo $lbl_from?>:</td>
                                        <td><input class="form-control"  type="text" name="datefrom" id="datefrom" style="height: 40px;font-size: 18px" placeholder="yyyy-mm-dd" /></td>                       
                                        <td style="font-size: 18px;"><?php echo $lbl_to;?>:</td>
                                        <td><input class="form-control"  type="text" name="dateto" id="dateto" style="height: 40px;font-size: 18px" placeholder="yyyy-mm-dd" /></td>
                                    </tr>
                                    <tr class="field-title-search">
                                        <td colspan="4">
                                            <input type="submit" value="<?php echo $btn_search?>" onclick="searchFromTo()" class="pull-right btn-highpoint" data-dismiss="modal" style="height: 40px; color: white" /> 
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        <!--END MODAL FORM-->
        <script type="text/javascript">
            $.noConflict();
            jQuery( document ).ready(function( $ ) {
                $("#datefrom").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
                $("#dateto").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            });
        </script>
    </body>
</html>
