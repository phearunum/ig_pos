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
        
        <script>
            //fix header top table when scroll 
                        
        function UpdateTableHeaders() {
            $(".persist-area").each(function() {

                var el             = $(this),
                    offset         = el.offset(),
                    scrollTop      = $(window).scrollTop(),
                    floatingHeader = $(".floatingHeader", this)

                if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
                    floatingHeader.css({
                     "visibility": "visible"
                    });
                } else {
                    floatingHeader.css({
                     "visibility": "hidden"
                    });      
                };
            });
         }
         //END fix header top table when scroll 
         //
         // DOM Ready      
         $(function() {

            var clonedHeaderRow;

            $(".persist-area").each(function() {
                clonedHeaderRow = $(".persist-header", this);
                clonedHeaderRow
                  .before(clonedHeaderRow.clone())
                  .css("width", clonedHeaderRow.width('84.5%'))
                  .addClass("floatingHeader");
            });

            $(window)
             .scroll(UpdateTableHeaders)
             .trigger("scroll");

         });
        </script>
    </head>
    <body>
        <?php
            foreach($record_permission as $p){
        ?>
        <table width="100%" cellspacing="0" class="table-table persist-area" id="table-table" cellpadding="0" border="0">
            <tr>
                <td class="form-title" colspan="10">List Branches</td>
            </tr>
            <tr class="persist-header">
                    <th width='3%'>
                        <?php if($p->permission_add!=0){ ?><a href="<?php echo site_url("company_profile"); ?>">New</a><?php } ?>
                    </th>
                    <th width='3%'>Nº</th>
                    <th width='5%'>Logo</th>
                    <th width='7%'>Branch Name</th>
                    <th width='7%'>Branch Location</th>                   
                    <th width='7%'>Branch Phone</th>
                    <th width='7%'>Created Date</th>
                    <th width='5%'>Recorder</th>
                    <th width='4%'>Note</th>
                    <?php if($p->permission_delete!=0){ ?><th width='4%'>Delete</th><?php } ?>
                </tr>
                <?php
                    $no=1;
                    foreach($record_customer as $ct){
                ?>
                <tr>
                    <td><?php if($p->permission_edit!=0){ ?><a href="<?php echo site_url("company_profile/index/".$ct->branch_id) ?>">Edit</a><?php } ?></td>
                    <td><?php echo $no; ?></td>
                    <td width="5%">
                        <?php
                        if($ct->logo!=""){
                        ?>
                            <img src="<?php echo base_url("img/company/".$ct->logo) ?>" alt="your image" width="100%"/>
                        <?php
                            }else{
                        ?>
                            <img src="<?php echo base_url("img/no_image.jpg") ?>" alt="your image"  width="100%"/>
                        <?php
                            }
                        ?>
                    </td>
                    <td><?php echo $ct->branch_name; ?></td>
                    <td><?php echo $ct->branch_location; ?></td>                                      
                    <td><?php echo $ct->branch_phone; ?></td>
                    <td><?php echo $ct->branch_created_date; ?></td>
                    <td><?php echo $ct->recorder; ?></td>
                    <td><?php echo $ct->branch_des; ?></td>                   
                    <?php if($p->permission_delete!=0){ ?><td><a href="<?php echo site_url("branch/delete/".$ct->branch_id) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/delete.gif"); ?>"></a></td><?php } ?>
                </tr>
                <?php
                    $no=$no+1;
                    }
                ?>
            </table>
            <?php } ?>
    </body>
</html>
