<?php

if ($this->input->get("type") == "product_table") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_detail where item_detail_cut_stock=1 and item_detail_name "
                . "LIKE '%" .$this->input->get("name_startsWith"). "%' #and item_detail_cut_stock=1");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $r->item_detail_photo . '|' . $r->item_detail_whole_price . '|' . $r->item_detail_retail_price . '|' . $r->item_detail_part_number . '|'.$r->measure_id.'|'.$r->measure_name.'|'.$r->measure_note.'|'.$r->measure_qty.'|'. $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "products") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_detail where item_detail_name "
                . "LIKE '%" .$this->input->get("name_startsWith"). "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $r->item_detail_photo . '|' . $r->item_detail_whole_price . '|' . $r->item_detail_retail_price . '|' . $r->item_detail_part_number . '|'.$r->measure_id.'|'.$r->measure_name.'|'.$r->measure_note.'|'.$r->measure_qty.'|'. $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}
else if ($this->input->get("type") == "promotion") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM promotion WHERE promotion_name "
                . "LIKE '%" .$this->input->get("name_startsWith"). "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->promotion_id . '|' . $r->promotion_name . '|' . $r->from_date . '|' . $r->until_date . '|' . $r->from_time . '|' . $r->until_time . '|'.$r->description;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}
else if ($this->input->get("type") == "product_name") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_detail where item_detail_name "
                . "LIKE '%" . $this->input->get("name_startsWith") . "%' ");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $r->item_detail_photo . '|' . $r->item_detail_whole_price . '|' . $r->item_detail_retail_price . '|' . $r->item_detail_part_number . '|'.$r->measure_id.'|'.$r->measure_name.'|'.$r->measure_note.'|'.$r->measure_qty.'|'. $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
} else if ($this->input->get("type") == "part_number") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_detail where item_detail_part_number "
                . "LIKE '%" .$this->input->get("name_startsWith"). "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $r->item_detail_photo . '|' . $r->item_detail_whole_price . '|' . $r->item_detail_retail_price . '|' . $r->item_detail_part_number . '|'.$r->measure_id.'|'.$r->measure_name.'|'.$r->measure_note.'|'.$r->measure_qty.'|'. $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}

else if($this->input->get("type") == "product_part_number"){
                
                if($this->input->get("name_startsWith")!=""){
                        $row_num = $this->input->get("row_num");
                        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_detail  where item_detail_cut_stock=1 and item_detail_part_number "
                                . "LIKE '%".$this->input->get("name_startsWith")."%' #and item_detail_cut_stock=1");    
                        $data = array();
                        foreach($result as $r) {
                                $name = $r->item_detail_name.'|'.$r->item_detail_id.'|'.$r->item_detail_photo.'|'.$r->item_detail_whole_price.'|'.$r->item_detail_retail_price.'|'.$r->item_detail_part_number.'|'.$r->measure_id.'|'.$r->measure_name.'|'.$r->measure_note.'|'.$r->measure_qty.'|'.$row_num;
                                array_push($data, $name);   
                        }   
                        echo json_encode($data);
                }
                
        }

else if($this->input->get("type") == "item_main"){
                
                if($this->input->get("name_startsWith")!=""){
                        $row_num = $this->input->get("row_num");
                        $result = $this->Base_model->loadToListJoin("SELECT * FROM item_main where status=1 AND item_main_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");   
                        $data = array();
                        foreach ($result as $r) {
                            $name = $r->item_main_name . '|' . $r->item_main_id . '|' . $r->part_number . '|' . $row_num;
                            array_push($data, $name);
                        }   
                        echo json_encode($data);
                }
                
}
else if ($this->input->get("type") == "supplier_table") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_supplier where supplier_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->supplier_name . '|' . $r->supplier_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "ingredient_table") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("select item_detail_id,item_detail_name,measure_qty,measure_name from v_item_detail where item_type_is_ingredient=1 and item_detail_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_detail_id.'|'.$r->item_detail_name . '|'.$r->measure_qty.'|'.$r->measure_name.'|'.$r->item_detail_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
} else if ($this->input->get("type") == "customer_table") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM customer where customer_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->customer_name . '|' . $r->customer_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "customer_phone") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM customer where customer_phone "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->customer_phone . '|' . $r->customer_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
} else if ($this->input->get("type") == "customer_card_number") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM customer where customer_card_number "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->customer_card_number . '|' . $r->customer_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
} else if ($this->input->get("type") == "customer_card_serial") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM customer where customer_card_serial "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->customer_card_serial . '|' . $r->customer_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "product_table_unstock") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM item_detail where (item_detail_cut_stock is null or item_detail_cut_stock=0) and item_detail_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
} else if ($this->input->get("type") == "table_table") {
    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT layout_id,layout_name FROM floor_table_layout where layout_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->layout_name . '|' . $r->layout_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
} else if ($this->input->get("type") == "category") {
    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("select item_type_id,item_type_name from item_type where item_type_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_type_name . '|' . $r->item_type_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
} else if ($this->input->get("type") == "product_with_ingredient") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT item_detail_name,item_detail_id FROM v_item_detail where item_detail_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%' and item_detail_cut_stock<>1 and item_type_is_ingredient<>1");
        $data = array();

        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $row_num;
            array_push($data, $name);
        }

        echo json_encode($data);
    }
}else if ($this->input->get("type") == "product_in_stock") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT item_detail_name,item_detail_id,item_detail_part_number FROM item_detail where item_detail_cut_stock=1 and item_detail_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();

        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $r->item_detail_part_number . '|'. $row_num;
            array_push($data, $name);
        }

        echo json_encode($data);
    }
}else if ($this->input->get("type") == "product_barcode") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT item_detail_name,stock_item_id,item_detail_part_number FROM v_stock where item_detail_part_number "
                . "='" . $this->input->get("name_startsWith") . "'");
        $data = array();

        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->stock_item_id . '|' . $r->item_detail_part_number . '|'.  $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "item_main_barcode") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM item_main where status=1 AND part_number "
                . "='" . $this->input->get("name_startsWith") . "'");
        $data = array();

        foreach ($result as $r) {
            $name = $r->item_main_name . '|' . $r->item_main_id . '|' . $r->part_number . '|'.  $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "product_barcode_no_stock") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT item_detail_name,item_detail_id,item_detail_part_number FROM item_detail where item_detail_part_number "
                . "='" . $this->input->get("name_startsWith"). "'");
        $data = array();

        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $r->item_detail_part_number . '|'.  $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "item_type_table") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_type where item_type_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_type_name . '|' . $r->item_type_id . '|'.$r->item_type_is_ingredient.'|'. $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "employee") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM employee where status=1 and employee_name "
                . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->employee_name . '|' . $r->employee_id . '|'. $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "expense") {
    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("select expense_type_id,expense_type_name from expense_type where expense_type_name "
            . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->expense_type_name . '|' . $r->expense_type_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}else if ($this->input->get("type") == "expense_detail") {
    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("select expense_detail_id,expense_detail_name from expense_detail where expense_detail_name "
            . "LIKE '" . $this->input->get("name_startsWith") . "%'");
        $data = array();
        foreach ($result as $r) {
            $name = $r->expense_detail_name . '|' . $r->expense_detail_id . '|' . $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}

?>
