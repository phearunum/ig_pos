<?php

if($this->input->get("type") == "purchase_part_number"){
                
        if($this->input->get("name_startsWith")!=""){
                $row_num = $this->input->get("row_num");
                
                $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_detail  where item_detail_cut_stock=1 and item_detail_part_number ='".$this->input->get("name_startsWith")."'");    
                $data = array();
                foreach($result as $r) {
                        $name = $r->item_detail_name.'|'.$r->item_detail_id.'|'.$r->item_detail_photo.'|'.$r->item_detail_whole_price.'|'.$r->item_detail_retail_price.'|'.$r->item_detail_part_number.'|'.$r->measure_id.'|'.$r->measure_name.'|'.$r->measure_note.'|'.$r->measure_qty.'|'.$row_num;
                        array_push($data, $name);   
                }   
                echo json_encode($data);
        }
        
}else if ($this->input->get("type") == "purchase_item_name") {

    if ($this->input->get("name_startsWith") != "") {
        $row_num = $this->input->get("row_num");
        $result = $this->Base_model->loadToListJoin("SELECT * FROM v_item_detail where item_detail_cut_stock=1 and item_detail_name "
                . "LIKE '%" . $this->input->get("name_startsWith") . "%' ");
        $data = array();
        foreach ($result as $r) {
            $name = $r->item_detail_name . '|' . $r->item_detail_id . '|' . $r->item_detail_photo . '|' . $r->item_detail_whole_price . '|' . $r->item_detail_retail_price . '|' . $r->item_detail_part_number . '|'.$r->measure_id.'|'.$r->measure_name.'|'.$r->measure_note.'|'.$r->measure_qty.'|'. $row_num;
            array_push($data, $name);
        }
        echo json_encode($data);
    }
}

?>
