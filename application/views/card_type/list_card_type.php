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
            foreach($permission as $p){
        ?>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="1">
            <tr>
                <td class="form-title" colspan="8">List Card Type</td>
            </tr>
                <tr>
            <th><?php if($p->add!=0){ ?><a href="<?php echo site_url("card_type/addnew"); ?>">New</a><?php } ?></th>
                    <th>Nº</th>
                    <th>Card Type Name</th>
                    <th>Description</th>
                    <th>Card Count</th>
                    <th>Date Entry</th>
                    <th>Recorder</th>
                    <?php if($p->delete!=0){ ?><th class="delete-center">Delete</th><?php } ?>
                </tr>
                <?php
                    $no=1;
                    foreach($record_card_type as $ct){
                ?>
                <tr>
                    <td><?php if($p->edit!=0){ ?><a href="<?php echo site_url("card_type/edit_load/".$ct->card_type_id) ?>">Edit</a><?php } ?></td>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $ct->card_type_name; ?></td>
                    <td><?php echo $ct->card_type_description; ?></td>
                    <td><?php echo $ct->is_count; ?></td>
                    <td><?php echo $ct->date_entry; ?></td>
                    <td><?php echo $ct->employee_name; ?></td>
                    <?php if($p->delete!=0){ ?><td class="delete-center"><a href="<?php echo site_url("card_type/delete/".$ct->card_type_id) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/delete.gif"); ?>"></a></td><?php } ?>
                </tr>
                <?php
                    $no=$no+1;
                    }
                ?>
            </table>
        <?php
            }
        ?>
    </body>
</html>
