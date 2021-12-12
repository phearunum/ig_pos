<table style="width:100%;">
    <tr>               
            <td class="form-title" colspan="14">Report Sale Cash Register</td>                
    </tr>  
        <tr>               
            <td style="text-align: center;" colspan="14">
                <p><?php echo $date; ?></p>
            </td>                
        </tr> 

        <tr>                            
            <th>Nº</th>
            <th>Cashier Name</th>
            <th>Cash Register Amount</th>
            <th>Start Date</th>                   
            <th>Start Time</th>
             <th>End Date</th>
            <th>End Time</th>
            <th>Grand Total</th>
        </tr>                 
            <tr>
                <?php
                    $no=1;
                    $total =0;
                    foreach($cash_register as $cr){
                ?>
                <td><?php echo $no; ?></td> 
                <td><?php echo $cr->cashier; ?></td> 
                <td><?php echo $cr->cash_amount; ?></td> 
                <td><?php echo $cr->start_date; ?></td> 
                <td><?php echo $cr->start_hour; ?></td> 
                <td><?php echo $cr->end_date; ?></td> 
                <td><?php echo $cr->end_hour; ?></td>  

                <td><?php echo number_format($cr->grand_total,2); ?></td>
            </tr>                
            <?php

                $no=$no+1;

              }
            ?>    
 </table>