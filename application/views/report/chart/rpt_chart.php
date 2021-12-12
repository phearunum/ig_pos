<html>
    <head>
        <meta charset="UTF-8"/>
        <title></title>
        <!-- Load Google chart api -->
        <script type="text/javascript" src="<?php echo base_url("js/jsapi.js"); ?>"></script>
        <script type="text/javascript">
            
            google.load("visualization", "1.1", {packages: ["bar"]});
            google.setOnLoadCallback(drawChart);
            
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['', 'Produt'],
                    <?php
                        foreach ($data_chart as $data) {
                            
                            echo '[' . '"'.$data->item_name.'"' . ',' . $data->most_sale_qty . '],';                            
                     }
                    ?>
                ]);
                
                var options = {
                    chart: {
                       // title: 'The Most Sale Products for Resturant',
                       // subtitle: 'The Most Top 10 products',
                        
                    }
                };
 
                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
 
                chart.draw(data, options);
            }
            
                    
               
        </script>
        	
    </head>
    <body>
        <form action="<?php echo site_url("report_chart/search") ?>" method="post">
            <table  width="100%" cellspacing="0" class="table-table persist-area" id="table2excel" cellpadding="0" border="0">
                <tr class="field-title">
                    <th colspan="13" style="text-align: left;">
                        From :<input type="text" name="datefrom" id="datefrom" class="txt_date" value="<?php echo date('d-m-Y') ?>" placeholder="yyyy/mm/dd"/>                     
                        To :<input type="text" name="dateto" id="dateto" class="txt_date" value="<?php echo date('d-m-Y') ?>" placeholder="yyyy/mm/dd"/>
                        <input type="number" name="qty_show" id="qty_show" autocomplete="off" placeholder="SHOW QTY PRODUCTS" autofocus required>
                        <input type="text" name="txtcustomer_id" id="txtcustomer_id" class="form-control" style="display: none;">
                        <input type="submit" name="btn_search" id="btn_search" value="Search" class="btn-srieng" onclick="search()">
                        <input type="button" name="btnexport"  id="btnexport" onclick="myFunction()" class="btn-highpoint hidden" value="Export"/>
                    </th>
                </tr>
            </table>
        </form>
            <div>
                <p style="font-size: 25px; text-align: center; text-decoration: underline; font-weight: bold">The Most Sale Product In Restaurant</p>
                <p class="text-center"><?php echo $date; ?></p>
            </div>
            <div id="columnchart_material" style="width: 100%; height: 400px;"></div>
    </body>
    <script>
            $.noConflict();
            jQuery( document ).ready(function( $ ) {
                $("#datefrom").datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
                $("#dateto").datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
            });
        </script>
</html>
