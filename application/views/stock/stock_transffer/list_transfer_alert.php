<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
            $alert=$this->Base_model->get_value_byQuery("SELECT count(*) as alert from stock_transfer st 
            where stock_transffer_branch_id_to=".$this->session->userdata('branch_id')." and stock_transffer_status='TRANSFER'","alert"); 
        ?>
    <li>
        <p class="blue">You have <?php echo $alert ?> new notifications</p>
    </li>
    <?php
    if ($alert > 0) {
        $transfer_product = $this->Base_model->loadToListJoin("select * from v_stock_transfer_active where stock_transffer_branch_id_to=" . $this->session->userdata('branch_id') . " limit 5");
        foreach ($transfer_product as $tp) {
            ?>
            <li class="stock_trans">
                <a href="<?php echo site_url("stock_transffer/display_alert") . "/" . $tp->stock_transffer_id; ?>" class="alert_text">
                    <span class="label"><i style="font-size: 15px" class="fa fa-arrow-circle-right"></i></span> 
                    <span style="color:black; font-size:14px;"><?php echo $tp->item_detail_name . " | " . $tp->stock_transffer_qty . " " . $tp->measure_name ?></span>
                    <br>
                    <span class="label alert_text"><?php echo "Transfer on : " . $tp->stock_transffer_created_date . ":" . $tp->stock_transffer_time; ?></span>
                    <br>
                    <span class="label alert_text"><?php echo "From Branch : " . $tp->from_branch; ?></span>
                    <br>
                    <span class="label alert_text"><?php echo "To Stock : " . $tp->stock_location_to; ?></span>
                    <br>
                </a>
            </li>
            <?php
        }
    }
    else
        echo "<li><div style='color:black;text-align:center'>you don't have notifications</div></li>";
    ?>
    <li>
        <a href="<?php echo site_url("stock_transffer/display_all_alert"); ?>">See all notifications</a>
    </li>
    </body>
</html>
