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
        <table class="table-table" id="EditTable" cellspacing="0" cellpadding="0" border="1" width="100%">
                                       <tr>
                                            <td class="form-title" colspan="22">List Customer Card Expired</td>
                                       </tr>
                                       <tr>
                                           <th>Nº</th>
                                           <th>ID</th>
                                           <th>Name</th>
                                           <th>Family Name</th>
                                           <th>Sex</th>
                                           <th>Phone Number</th>
                                           <th>Address</th>
                                           <th>Memberships</th>
                                           <th>Entry Date</th>
                                           <th>Expiry Date</th>
                                           <th>Recorder</th>
                                           <th>Date Create</th>
                                           <th>Disable</th>
                                       </tr>
                                       <tbody>
                                       <?php
                                        $no=1;
                                            foreach($record_customers as $rc){
                                       ?>
                                       <tr>
                                           
                                           <td><?php echo $no; ?></td>
                                           <td><?php echo $rc->customer_id ?></td>
                                           <td><?php echo $rc->customer_name ?></td>
                                           <td><?php echo $rc->customer_family_name ?></td>
                                           <td><?php echo $rc->customer_sex ?></td>
                                           <td><?php echo $rc->customer_phone ?></td>
                                           <td><?php echo $rc->customer_address ?></td>
                                           <td><?php echo $rc->card_type_name ?></td>
                                           <td><?php echo $rc->card_entry_date ?></td>
                                           <td><?php echo $rc->card_expired_date ?></td>
                                           <td><?php echo $rc->employee_name ?></td>
                                           <td><?php echo $rc->date_created ?></td>
                                           <td class="delete-center"><a href="<?php echo site_url("notification/disable/".$rc->customer_id.'/'.$rc->customer_photo) ?>" onclick="return confirm('Do you want to delete this record?')"><img src="<?php echo base_url("img/disabled.png"); ?>"></a></td>
                                       </tr>
                                       <?php
                                        $no=$no+1;
                                            }
                                       ?>
                                       </tbody>
                                   </table>
    </body>
</html>
