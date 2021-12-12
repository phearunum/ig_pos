<!DOCTYPE html>
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
                    xmlhttp.open("GET","<?php echo site_url("report_monthly_expense/search_from_to/"); ?>"+"/"+date_f+"/"+date_t+"/"+branch,true);
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
                    var branch=$('#cbo_branch').val();
                    xmlhttp.onreadystatechange = function() {   
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("loading").innerHTML = '';
                            document.getElementById("panelList").innerHTML = xmlhttp.responseText;
                        }
                    }
                    document.getElementById("loading").innerHTML = '<img src="<?php echo base_url("img/icons/loading.gif"); ?>" width="150px"/>'; // Set here the image before sending request
                    xmlhttp.open("POST","<?php echo site_url("report_monthly_expense/search_exp/"); ?>"+"/"+str+"/"+branch,true);
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
                    padding: 1px 4px;
                    background-color: #13224B;
                    color: red;
                    border: 1px solid #ddd;
                }
                #navigation a:active {
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
                #navigation li li a{
                  text-decoration: none;
                  background-color: transparent;
                  border:none;
                  float:right;
                  color: #0033cc;
                }
                #navigation li li a:active{
                  background-color: transparent;
                  border:none;
                  color:#cc0000;
            }
            #navigation ul li ul li.active a{
                background: #13234b;
                color: white;
            }

            .btn-highpoint {
                border-style: none;
                background-color: #137b80;
                color: #FFFFFF;
                border-radius: 3px ;
                }
            .field-title-search {
                background-color: #0a3e40;
                font-size: 17px ;
                color: #FFFFFF;


        </style>
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
        <table width="100%" border="1" class="table-form">
            <tr>
                <td  style="vertical-align: top; text-align: center; width:200px;">
                    <table>
                        <tr style="text-align: center; margin-bottom: 10px;">
                            <td>Year<?php echo $btn_year;?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                 <tr>
                                    <td style="vertical-align: top;">
                                        <input class="btn btn-primary" type="button" id="modal-673355" href="#modal-container-673355" role="button" data-toggle="modal" value="<?php echo $btn_search?>" style="margin-top: 1px;background-color: #137b80;color:#f9dd34;border:none">
                                    </td>
                                    <td>
                                        <select class="form-control" name="cbo_branch" id="cbo_branch" >
                                            <option value="0">--All Branch--</option>
                                            <?php
                                            foreach ($branch as $b) {
                                                ?>
                                                <option value="<?php echo $b->branch_id; ?>"><?php echo $b->branch_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>   
                                </tr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div id="navigation">
                                    <ul style="list-style-type: none;">
                                       <?php 
                                              foreach($year as $y){    
                                        ?>    
                                              <li value="<?php echo $y->years ?>">
                                                  <a class="btn btn-primary" href="#" style='color:#f9dd34; background-color:#137b80 ' onclick="swap('<?php echo $y->years  ?>');return false;"><?php echo $y->years ?></a>
                                                  <ul id="<?php echo $y->years ?>" style="list-style-type: none;display: none;">
                                                      <?php
                                                           $record=$this->Base_model->loadToListJoin("select distinct date_format(expense_date,'%m') as months,date_format(expense_date,'%Y') as year from v_expense where date_format(expense_date,'%Y')=".$y->years);
                                                           foreach($record as $r){
                                                      ?>
                                                           <li name="btnSubmit" value="<?php echo $r->months ?>" id="<?php echo $r->months.'/'.$r->year ?>"  onclick="search(this.id)"><a href="#" style="border-bottom: solid white; 1px; width:30px;background-color:#137b80;color:yellow"><?php echo $r->months ?></a></li>
                                                      <?php
                                                        }
                                                      ?>
                                                           <li name="btnSubmit" value="<?php echo $y->years ?>" id="<?php echo '0'.'/'.$y->years ?>"  onclick="search(this.id)"><a href="#" style="width: 30px;color:yellow;background-color:#137b80;">All<?php echo $btn_all?></a></li>
                                                  </ul>
                                                  <div class="clearfix"></div>
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
                <td colspan="1">
                    <span id="loading" style="margin-left: 42%;"></span>
                    <div id='panelList'>
                        
                    </div>
                </td>
            </tr> 
        </table>
        <!--        MODAL FORM-->
                <div class="modal fade" id="modal-container-673355"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" >
                        <div class="modal-content" >
                            <div class="modal-body">
                                <table cellspacing="0" class="table-form"  id="table-form" width="100%" >
                                    <tr class="field-title-search">
                                        <td colspan="2"></td>
                                        <td colspan="2"><input style="background-color: #137b80; border:none;color:red" class="pull-right" type="button" value="X"  class="pull-right btn-highpoint" data-dismiss="modal"/></td>
                                    </tr>
                                    <tr>                  
                                        <td style="font-size: 18px;"><?php echo $lbl_from?>:</td>
                                        <td><input class="form-control"  type="text" name="datefrom" id="datefrom" style="height: 40px;font-size: 18px" autocomplete="off" placeholder="yyyy-mm-dd" /></td>                       
                                        <td style="font-size: 18px;"><?php echo $lbl_to;?>:</td>
                                        <td><input class="form-control"  type="text" name="dateto" id="dateto" style="height: 40px;font-size: 18px" autocomplete="off" placeholder="yyyy-mm-dd" /></td>
                                    </tr>
                                    <tr class="field-title-search">
                                        <td colspan="4">
                                            <input type="submit" class="btn btn-primary pull-right" style="background-color:#137b80;color:#ffffff; border:none;" class="pull-right" value="<?php echo $btn_search?>" onclick="searchFromTo()" class="pull-right btn-highpoint" data-dismiss="modal" style="height: 40px;  "/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        <!--END MODAL FORM-->
        <script type="text/javascript">
            $("#datefrom").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $("#dateto").datepicker({ dateFormat: 'yy-mm-dd', showButtonPanel: true});
            $(document).ready(function() {
                $(document).on('click', '#navigation ul li ul li', function(event) {
                    event.preventDefault();
                    $("#navigation ul li ul li.active").removeClass('active')
                    $(this).addClass('active');
                });
            });
        </script>
    </body>
</html>
