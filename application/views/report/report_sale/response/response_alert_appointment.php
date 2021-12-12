 
<thead>
    <tr>
        <td class="form-title" colspan="12" style="font-size: 16px; font-weight: bold;">List Appointment with Customers</td>
    </tr>
    <tr>
        <td class="form-title" colspan="12" ><?php echo $date; ?></td>
    </tr>
    <tr>  
        <th><a href="<?php echo site_url("appointment/addnew"); ?>">New</a></th>
        <th>Customer Name </th>
        <th>Next Checking</th>
        <th>Next Checking Date</th>
        <th>Previous Checking</th>
        <th>Previous Checking Date</th>
        <th>Date Created</th>
        <th>Recorder</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Status</th>
        <th>Note</th>
    </tr>
    <?php
            $no = 1;
            foreach ($record_data as $rd){
    ?>

    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $rd->customer; ?></td>
        <td style="color:red;font-weight: bold;"><?php echo $rd->app_action; ?></td>
        <td style="color:red;font-weight: bold;"><?php echo $rd->app_date_action; ?></td>
        <td><?php echo $rd->app_customer_last_repair_info; ?></td>
        <td><?php echo $rd->app_customer_last_repair_date; ?></td>
        <td><?php echo $rd->app_create_date; ?></td>
        <td><?php echo $rd->recorder; ?></td>
        <td><a href="<?php echo site_url("appointment/edit_load/".$rd->app_id) ?>">Edit</a></td>
        <td><a href="<?php echo site_url("appointment/delete/".$rd->app_id) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/delete.gif"); ?>"></a></td>
        <td><?php if($rd->app_status == "Pendding"){ ?>
                <a class="tooltips" data-original-title="Please call to customer" data-placement="top" href="<?php echo site_url("appointment/update_pendding_stuts/".$rd->app_id) ?>" onclick="return confirm('Does this customer is confirm already?')"><u><?php echo $rd->app_status ?></u></a>
            <?php }else{  ?>
                <a class="tooltips" data-original-title="<?php echo 'updated by : '. $rd->modifier; ?>" data-placement="top" ><?php echo $rd->app_status ?></a>
                <?php 
            }                              
            ?>

        </td>
        <td><?php echo $rd->app_des;?></td>

    </tr>
    <?php $no++;} ?>
</thead>