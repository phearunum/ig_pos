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
            foreach($record_permission as $p){
        ?>
        <table width="100%" cellspacing="0" class="table-table" id="table-table" cellpadding="0" border="0">
            <tr class="table-title">
                <td colspan="9">List Point Setup</td>
            </tr>
                <tr class="persist-header">
                    <th><?php if($p->permission_add!=0){ ?><a href="<?php echo site_url("point/addnew"); ?>">New</a><?php } ?></th>
                    <th>Nº</th>
                    <th>Point Receive</th>
                    <th>From($)</th>
                    <th>To($)</th>
                    <th>Date Create</th>
                    <th>Created By</th>
                    <th>Note </th>
                    <?php if($p->permission_delete!=0){ ?><th>Delete</th><?php } ?>
                </tr>
                <?php
                    $no=1;
                    foreach($record_measure as $rm){
                ?>
                <tr>
                    <td><?php if($p->permission_edit!=0){ ?><a href="<?php echo site_url("point/edit_load/".$rm->id) ?>">Edit</a><?php } ?></td>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $rm->point; ?></td>
                    <td><?php echo $rm->froms; ?></td>
                    <td><?php echo $rm->tos; ?></td>
                    <td><?php echo $rm->date_created; ?></td>
                    <td><?php echo $rm->employee_name; ?></td>
                    <td><?php echo $rm->desc; ?></td>
                    <?php if($p->permission_delete!=0){ ?><td><a href="<?php echo site_url("point/delete/".$rm->id) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/delete.gif"); ?>"></a></td><?php } ?>
                </tr>
                <?php
                    $no=$no+1;
                    }
                ?>
            <?php
                }
            ?>
            </table>
    </body>
</html>
