<?php
$get_stock_location = $this->Base_model->loadToListJoin("select expense_detail_id,expense_detail_name from expense_detail where expense_type_id=" . $id);
foreach ($get_stock_location as $gsl) {
    echo '<option value="' . $gsl->expense_detail_id . '">' . $gsl->expense_detail_name . '</option>';
}
?>
