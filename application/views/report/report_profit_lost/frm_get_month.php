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
       <tr>
           <td>
               <input type="button" style="width:60px; border:solid #13224B 2px;background-color: #13224B; margin-left: 5px; margin-top: 5px; height: 40px;font-weight: bold;font-size: 15px;text-align: center;color:wheat" id="<?php echo $year ?>" name="btnSubmit" value="<?php echo  $year ?>" id="<?php echo $year ?>"  onclick="search(this.id)"> 
           </td>
            
            <?php
                 $record=$this->Base_model->loadToListJoin("select distinct a.months,'$year' as year 
                                                        from 
                                                        (
                                                         select distinct extract(month from s.sale_master_start_date) as months 
                                                                        from sale_master s where s.sale_master_status in('CREDIT','PAID') and extract(year from s.sale_master_start_date)='$year'
                                                        union all 
                                                         select distinct extract(month from p.purchase_created_date) as months 
                                                                        from purchase p where p.status in('CREDIT','PAID') and extract(year from p.purchase_created_date)='$year'
                                                        ) as a order by months desc");
                 $no=1;
                 foreach($record as $m){
                     if($no==3){
                     echo'<tr>';
                     $no=1;
                 }
            ?>
                <td>
                    <span class="field-tip">
                        <input type="button" style="width:60px; border:solid #13224B 2px; background-color: #13224B; margin-left: 5px; margin-top: 5px; height: 40px;font-weight: bold;font-size: 15px;text-align: center;color:wheat" name="btnSubmit" value="<?php echo $m->months ?>" id="<?php echo $m->months.'/'.$m->year ?>"  onclick="search(this.id)">          
                    </span>
                </td>
            <?php
                 $no=$no+1;
             }
            ?>  
        </tr>
    </body>
</html>
