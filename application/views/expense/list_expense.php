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
        <div class="col-md-12 text-center">
            <h1>Expense (New) </h1>
        </div>
        <div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
                
                    <form role="form" action="<?php echo site_url("expense/add"); ?>" method="post">
                                <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">
                                                        Expense Type
                                                </label>
                                            <select class="form-control" id="txt_expense_type" name="txt_expense_type">
                                                    <option>1</option>                                                   
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">
                                                        Expense Name
                                                </label>
                                            <input type="text" class="form-control" id="txt_expense_name" name="txt_expense_name" required>
                                        </div>                                        
                                </div>
                                   <div class="col-md-6">     
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Expense Amount
					</label>
                                    <input type="number" class="form-control" id="txt_expense_amount" name="txt_expense_amount" required>
				</div>
                                       
                                <div class="form-group">
                                    <label  style="color : #ffffff;">
						Expense Amount
                                    </label>
                                    <button type="submit" class="btn btn-default form-control" >
                                            Add
                                    </button>
                                </div>
                            </div>
			</form>
			
		</div>
            <form role="form" action="<?php echo site_url("expense/save"); ?>" method="post">
		<div class="col-md-6">
			<div class="col-md-6">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1" >
                                                       Invoice NO
                                                </label>
                                                <input type="text" class="form-control" id="txt_expense_invoice" name='txt_expense_invoice' required>
                                        </div>
                                       
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                        Expense Date
                                                </label>
                                                <input type="date" class="form-control" id="txt_expense_date" name='txt_expense_date' required>
                                        </div>
                                </div>
                                  <div class="form-group">
                                    <label  style="color : #ffffff;">
						Expense Amount
                                    </label>
                                    <button type="submit" class="btn btn-default form-control" >
                                            Save
                                    </button>
                                </div>
                        </form>
            
			<table class="table">
				<thead>
					<tr>
						<th>
							No
						</th>
						<th>
							Expense Type
						</th>
						<th>
							Expense Name
						</th>
						<th>
							Amount ($)
						</th>
					</tr>
				</thead>
                                          <?php  $no=1;
                                            foreach($record_customer as $ct){
                                        ?>
				<tbody>
					<tr>
						<td><?php echo $no; ?></td>                                                
                                                <td><?php echo $ct->expense_type_id; ?></td>
                                                <td><?php echo $ct->expense_name; ?></td> 
                                                <td><?php echo $ct->expense_amount; ?></td> 
                                              
					</tr>
				</tbody>
                                 <?php
                                        $no=$no+1;
                                        }
                                    ?>
			</table>
		</div>
	</div>
</div>

        
           
        
        
    </body>
</html>
