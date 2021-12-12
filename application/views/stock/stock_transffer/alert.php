<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(!empty($this->session->userdata("user_id")) && !empty($this->session->userdata('branch_id'))){
             $user_id =$this->session->userdata("user_id");
             if(!empty($user_id)){
                $alert=$this->Base_model->get_value_byQuery("SELECT count(*) as alert from stock_transfer st 
                 where stock_transffer_branch_id_to=".$this->session->userdata('branch_id')." and stock_transffer_status='TRANSFER'","alert");
                if($alert!=0){
                    echo "<span class='badge bg-important' id='bg_show'>".$alert."</span>";
                 }
              }
          }
         ?>
    </body>
</html>
