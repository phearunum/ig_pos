<!DOCTYPE html>
<html>
<head>
	<title>Paqayyy</title>
</head>
<body>

    

        <?=   "<center style= 'color: blue; font-size: 20px ; '>".  $title ."</center>" ?>

        <a class="pull-right btn btn-primary" href="<?php echo site_url('Pay/add_loads'); ?>"><?= $btn_add ?></a>

                <table class="table">
                	    <thead>
                	    	
        	    	<tr>
        	    		 <th><?=$lbl_id?></th>
        	    		 <th><?=$lbl_no?></th>
        	    		  <th><?=$lbl_name?></th>
        	    		  <th><?=$lbl_description?></th>
        	    		  <th><?=$lbl_createdate?></th>
        	    		  <th><?=$lbl_modifiddate?></th>
                                   <th><?=$lbl_action?></th>


                	    	</tr>
                	    </thead>
                </table>


</body>
</html>