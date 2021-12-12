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
    </head>
    <body>
        <?php
            //foreach($record_sale_statement as $rss){
        ?>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="1">
            <tr>
                <td class="form-title" colspan="12">List Sale Statement</td>
            </tr>
                <tr>
            <th><?php //if($p->permission_add){ ?><a href="<?php echo site_url("measure_convert/addnew"); ?>">New</a><?php //} ?></th>
                    <th>Nº</th>
                    <th>Statement No</th>
                    <th>Customer Name</th>              
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Created Date</th>
                    <th>Recorder</th>
                    <?php //if($p->permission_delete){ ?><th class="delete-center">Delete</th><?php //} ?>
                </tr>
                <?php
                    $no=1;
                    foreach($record_sale_statement as $rss){
                ?>
                <tr>
                    <td><?php //if($p->permission_edit){ ?><a href="<?php echo site_url("measure_convert/edit_load/".$rss->measure_convert_id) ?>">Edit</a><?php //} ?></td>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $rss->measure_name; ?></td>  
                    <td><?php echo $rss->measure_convert_name; ?></td>                                    
                    <td><?php echo $rss->measure_convert_qty; ?></td>
                    <td><?php echo $rss->measure_convert_note; ?></td>
                    <td><?php echo $rss->measure_convert_created_date; ?></td>
                    <td><?php echo $rss->recorder; ?></td>
                    <?php //if($p->permission_delete){ ?><td class="delete-center"><a href="<?php echo site_url("measure_convert/delete/".$rss->measure_convert_id) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/delete.gif"); ?>"></a></td><?php //} ?>
                </tr>
                <?php
                    $no=$no+1;
                    }
                ?>
            </table>
            <?php //} ?>
    </body>
</html>
