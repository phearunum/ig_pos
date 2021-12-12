<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Promotion</title>
        <link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>" />
        <script src="<?php echo base_url('js/jquery_autocomplete/jquery-1.10.2.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/jquery_autocomplete/jquery-ui-1.10.3.custom.min.js'); ?>"></script>
        <style type="text/css">
            .table-table th {
                    color: #FFFFFF;
                    background-color: #137b80;
                }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default">
              <a class="btn btn-primary pull-right" style="margin-top:5px;" href="<?php echo site_url() ?>/Promotion/create"><i class="fa fa-plus"></i> New</a>
                <div class="panel-heading"><h3 class="text-center text-primary">Promotion List
                </div></h3>

                    <div class="panel-body">

                        <div class="row">
                            <table width="100%" class="table-table" id="tablePromotion">
                                <thead>
                                   <th style="width: 20px;">#</th>
                                   <th style="width: 30%;">Promotion Name</th>
                                   <th>Form Date</th>
                                   <th style="text-align: center">Until Date</th>
                                   <th style="text-align: center;width: 30%;">Description</th>
                                   <th style="text-align: center;width: 80px;">Action</th>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($list_promotion_type as $key => $value) { ?>
                                        <tr>
                                           <td style="width: 20px;"><?php echo $value->promotion_id ?></td>
                                           <td style="width: 30%;"><?php echo $value->promotion_name ?></td>
                                           <td><?php echo $value->from_date ?></td>
                                           <td style="text-align: center"><?php echo $value->until_date ?></td>
                                           <td style="text-align: center;width: 30%;"><?php echo $value->description ?></td>
                                           <td style="text-align: center;width: 80px;"><a href="<?php echo site_url() ?>/Promotion/create/?promo_id=<?php echo $value->promotion_id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>&nbsp;<a href="<?php echo site_url() ?>/Promotion/deletePromo/?promo_id=<?php echo $value->promotion_id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    <?php } ?>                
                                    
                                    
                                </tbody>

                            </table>
                        </div>
                        
                        
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">


    </script>
  
</html>
