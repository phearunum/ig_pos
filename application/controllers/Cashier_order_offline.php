<?php
//require_once("lib/Escpos.php");
require_once("escpos/autoload.php");
header("content-type: text/html; charset=UTF-8");  
require_once("escpos/autoload.php");
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;
require_once("lib/Escpos.php");
date_default_timezone_set("Asia/Phnom_Penh");
class Cashier_order_offline extends CI_Controller{
    //put your code here
    private $sale_master_id,$sale_master_invoice_no,$sale_master_start_date,$sale_master_end_date,$sale_master_branch_id,$sale_master_customer_id,$sale_master_layout_id,$sale_master_cash_id,$sale_master_seller_id,$sale_master_cashier_id,$sale_master_pax,$sale_master_tax,$sale_master_exchange_rate,$sale_master_service_charge,$sale_detail_discount_percent,$sale_master_pay_kh,$sale_master_pay_us,$sale_master_account_type,$sale_master_pay_card,$sale_master_total,$sale_master_grand_total;
    private $sale_detail_id,$sale_detail_item_id,$sale_detail_qty,$sale_detail_unit_price,$sale_detail_dis_us,$sale_detail_dis_percent,$sale_detail_printed,$sale_detail_note,$sale_detail_status,$sale_detail_create_date,$sale_detail_create_by,$sale_detail_modified_date,$sale_detail_modified_by;
    
    function set_sale_master_id($val){$this->sale_master_id=$val; } 
    private function get_sale_master_id(){return $this->sale_master_id;}
    function set_sale_master_invoice_no($val){$this->sale_master_invoice_no=$val;} 
    private function get_sale_master_invoice_no(){return $this->sale_master_invoice_no;}
    function set_sale_master_start_date($val){$this->sale_master_start_date=$val;} 
    private function get_sale_master_start_date(){return $this->sale_master_start_date;}
    function set_sale_master_end_date($val){$this->sale_master_end_date=$val;} 
    private function get_sale_master_end_date(){return $this->sale_master_end_date;}
    function set_sale_master_customer_id($val){$this->sale_master_customer_id=$val;}
    private function get_sale_master_customer_id(){return $this->sale_master_customer_id;}
    function set_sale_master_branch_id($val){$this->sale_master_branch_id=$val;} 
    private function get_sale_master_branch_id(){return $this->sale_master_branch_id;}
    function set_sale_master_layout_id($val){$this->sale_master_layout_id=$val;}
    private function get_sale_master_layout_id(){return $this->sale_master_layout_id;}
    function set_sale_master_cash_id($val){$this->sale_master_cash_id=$val;} 
    private function get_sale_master_cash_id(){return $this->sale_master_cash_id;}
    function set_sale_master_seller_id($val){$this->sale_master_seller_id=$val;} 
    private function get_sale_master_seller_id(){return $this->sale_master_seller_id;}
    function set_sale_master_cashier_id($val){$this->sale_master_cashier_id=$val;} 
    private function get_sale_master_cashier_id(){return $this->sale_master_cashier_id;}
    function set_sale_master_pax($val){$this->sale_master_pax=$val;} 
    private function get_sale_master_pax(){return $this->sale_master_pax;}
    function set_sale_master_tax($val){$this->sale_master_tax=$val;} 
    private function get_sale_master_tax(){return $this->sale_master_tax;}
    function set_sale_master_exchange_rate($val){$this->sale_master_exchange_rate=$val;} 
    private function get_sale_master_exchange_rate(){return $this->sale_master_exchange_rate;}
    function set_sale_master_service_charge($val){$this->sale_master_service_charge=$val;} 
    private function get_sale_master_service_charge(){return $this->sale_master_service_charge;}
    function set_sale_detail_discount_percent($val){$this->sale_detail_discount_percent=$val;} 
    private function get_sale_detail_discount_percent(){return $this->sale_detail_discount_percent;}
    function set_sale_master_pay_kh($val){$this->sale_master_pay_kh=$val;} 
    private function get_sale_master_pay_kh(){return $this->sale_master_pay_kh;}
    function set_sale_master_pay_us($val){$this->sale_master_pay_us=$val;} 
    private function get_sale_master_pay_us(){return $this->sale_master_pay_us;}
    function set_sale_master_account_type($val){$this->sale_master_account_type=$val;} 
    private function get_sale_master_account_type(){return $this->sale_master_account_type;}
    function set_sale_master_pay_card($val){$this->sale_master_pay_card=$val;} 
    private function get_sale_master_pay_card(){return $this->sale_master_pay_card;}
    function set_sale_master_total($val){$this->sale_master_total=$val;} 
    private function get_sale_master_total(){return $this->sale_master_total;}
    function set_sale_master_grand_total($val){$this->sale_master_grand_total=$val;} 
    private function get_sale_master_grand_total(){return $this->sale_master_grand_total;}
    function set_sale_master_create_date($val){$this->sale_master_create_date=$val;} 
    private function get_sale_master_create_date(){return $this->sale_master_create_date;}
    function set_sale_master_create_by($val){$this->sale_master_create_by=$val;} 
    private function get_sale_master_create_by(){return $this->sale_master_create_by;}
    function set_sale_master_status($val){$this->sale_master_status=$val;} 
    private function get_sale_master_status(){return $this->sale_master_status;}
    function set_sale_master_print($val){$this->sale_master_print=$val;} 
    private function get_sale_master_print(){return $this->sale_master_print;}
    //sale_detail
    function set_sale_detail_id($val){$this->sale_detail_id=$val;} 
    private function get_sale_detail_id(){return $this->sale_detail_id;}
    function set_sale_detail_item_id($val){$this->sale_detail_item_id=$val;} 
    private function get_sale_detail_item_id(){return $this->sale_detail_item_id;}
    function set_sale_detail_qty($val){$this->sale_detail_qty=$val;} 
    private function get_sale_detail_qty(){return $this->sale_detail_qty;}
    function set_sale_detail_unit_price($val){$this->sale_detail_unit_price=$val;} 
    private function get_sale_detail_unit_price(){return $this->sale_detail_unit_price;}
    function set_sale_detail_dis_us($val){$this->sale_detail_dis_us=$val;} 
    private function get_sale_detail_dis_us(){return $this->sale_detail_dis_us;}
    function set_sale_detail_dis_percent($val){$this->sale_detail_dis_percent=$val;} 
    private function get_sale_detail_dis_percent(){return $this->sale_detail_dis_percent;}
    function set_sale_detail_printed($val){$this->sale_detail_printed=$val;} 
    private function get_sale_detail_printed(){return $this->sale_detail_printed;}
    function set_sale_detail_note($val){$this->sale_detail_note=$val;} 
    private function get_sale_detail_note(){return $this->sale_detail_note;}
    function set_sale_detail_status($val){$this->sale_detail_status=$val;} 
    private function get_sale_detail_status(){return $this->sale_detail_status;}
    function set_sale_detail_create_date($val){$this->sale_detail_create_date=$val;} 
    private function get_sale_detail_create_date(){return $this->sale_detail_create_date;}
    function set_sale_detail_create_by($val){$this->sale_detail_create_by=$val;} 
    private function get_sale_detail_create_by(){return $this->sale_detail_create_by;}
    function set_sale_detail_modified_date($val){$this->sale_detail_modified_date=$val;} 
    private function get_sale_detail_modified_date(){return $this->sale_detail_modified_date;}
    function set_sale_detail_modified_by($val){$this->sale_detail_modified_by=$val;} 
    private function get_sale_detail_modified_by(){return $this->sale_detail_modified_by;}
    //sale_note
    private $sale_note_id,$sale_note_detail_id,$sale_note_item_note_id,$sale_note_qty,$sale_note_unit_price,$sale_note_status;

    function set_sale_note_id($val){$this->sale_note_id=$val;} 
    private function get_sale_note_id(){return $this->sale_note_id;}
    function set_sale_note_detail_id($val){$this->sale_note_detail_id=$val;} 
    private function get_sale_note_detail_id(){return $this->sale_note_detail_id;}
    function set_sale_note_item_note_id($val){$this->sale_note_item_note_id=$val;} 
    private function get_sale_note_item_note_id(){return $this->sale_note_item_note_id;}
    function set_sale_note_qty($val){$this->sale_note_qty=$val;} 
    private function get_sale_note_qty(){return $this->sale_note_qty;}
    function set_sale_note_unit_price($val){$this->sale_note_unit_price=$val;} 
    private function get_sale_note_unit_price(){return $this->sale_note_unit_price;}
    function set_sale_note_status($val){$this->sale_note_status=$val;} 
    private function get_sale_note_status(){return $this->sale_note_status;}

    private $sale_master_layout_name;
    function set_sale_master_layout_name($val){$this->sale_master_layout_name=$val;} 
    private function get_sale_master_layout_name(){return $this->sale_master_layout_name;}

    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    public function new_order(){
        $data['title']  = "TABLE ORDER";
        $data['header'] = "template_cashier/header";
        $data['menu']   = "template_cashier/menu";
        $data['footer'] = "template_cashier/footer";
        $data['page']   = "cafe/sale_offline/frm_cashier_order";
        $this->set_sale_master_layout_id($this->uri->segment(3));
        $data['table_id']=$this->get_sale_master_layout_id();
		$this->set_sale_master_id($this->uri->segment(4));
        $data['sale_master_id']=$this->get_sale_master_id();
        $this->load->view("welcome/view",$data);
    }
    public function addnew($w_no){
        $data['title']  = "ORDER";
        $data['header'] = "template_admin/header";
        $data['menu']   = "template_admin/menu_hide";
        $data['footer'] = "template_admin/footer";
        $data['page']   = "cafe/order/frm_order";
        
        $data['table_id']=$w_no;
        $this->session->set_userdata("layout_id",$w_no);
        $this->load->view("template_admin/view",$data);
    }
    public function load_card_type(){
        $result = $this->Base_model->loadToListJoin("select acc_type_id,acc_type from account_type where acc_status=1");
        $data = array();
        foreach ($result as $key) {
            $data[] = $key;
        }
        echo json_encode($data);
    }
    public function kitchen_print($id){
         $result = $this->Base_model->loadToListJoin("select s.sale_master_layout_id,f.layout_name from sale_master s
            inner join floor_table_layout f on f.layout_id=s.sale_master_layout_id
            where s.sale_master_id=$id");
         $data=array();
         foreach ($result as $r) {
            $data['order_by'] = $this->Base_model->get_value("employee","employee_name","employee_id",$this->Base_model->user_id());
            $data['table_id'] = $r->sale_master_layout_id;
            $data['table_name'] = $r->layout_name;
            $data['order_date'] = $this->Base_model->current_date('Y-m-d');
            $data['order_time'] = $this->Base_model->current_date('H:i:s');
         }
         $data['receipt'] = $id;
         $this->load->view("cafe/order/receipt_order_all",$data);
    }
    public function load_receipt_data(){
        $id=$this->input->post('layout_id');
        $master=$this->input->post('order_no');
       

        $data_master=$this->Base_model->loadToListJoin("SELECT 
            DISTINCT(ifnull(printer_id,0)) as printer_id,ifnull(printer_print_kitchen,0) as printer_print_kitchen,sm.sale_master_id
        FROM `sale_detail` `sd`
        JOIN `sale_master` `sm` ON `sm`.`sale_master_id` = `sd`.sale_master_id
        LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
        LEFT JOIN printer_location prl ON idt.item_detail_printer_location_id=prl.printer_location_id
        LEFT JOIN printer pr ON prl.printer_location_id=pr.printer_location_id
        WHERE `sm`.sale_master_status in (1,2) AND `sd`.sale_detail_status in (1) and sm.sale_master_id=$master");
        $total=count($data_master);
         $i=0;
        echo '{"Printer":[';
            foreach ($data_master as $r) {
                $i=$i+1;
                $j=0;

                $data_detail=$this->Base_model->loadToListJoin("
                    SELECT 
                    `sm`.`sale_master_id` AS `sale_master_id`, 
                    `sd`.`sale_detail_id` AS `sale_detail_id`,
                    LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
                    `em`.`employee_name` AS `recorder`,
                    `sm`.sale_master_start_date as checkin_date,
                    `sm`.sale_master_end_date AS checkout_date,
                    `sd`.`sale_detail_item_id` AS `sale_detail_item_id`,
                    `idt`.`item_detail_name` AS `item_detail_name`,
                    (`sd`.`sale_detail_qty`-sd.sale_detail_printed) AS `sale_detail_qty`,
                    `sd`.`sale_detail_unit_price` AS `sale_detail_unit_price`,
                    pr.printer_id,
                    pr.printer_name,
                    pr.printer_print_kitchen,
                    pr.printer_print_kitchen_time,
                    ftl.layout_name,
                    sd.sale_detail_printed
                FROM `sale_detail` `sd`
                JOIN `sale_master` `sm` ON `sm`.`sale_master_id` = `sd`.sale_master_id
                LEFT JOIN `employee` `em` ON `em`.`employee_id` = `sm`.sale_master_cashier_id
                LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
                LEFT JOIN printer_location prl ON idt.item_detail_printer_location_id=prl.printer_location_id
                LEFT JOIN printer pr ON prl.printer_location_id=pr.printer_location_id
                LEFT JOIN floor_table_layout ftl ON sm.sale_master_layout_id=ftl.layout_id
                WHERE `sm`.sale_master_status in (1,2) AND `sd`.sale_detail_status in (1) and sm.sale_master_id=$r->sale_master_id and pr.printer_id=$r->printer_id and sd.sale_detail_printed<sale_detail_qty");
                $total1=count($data_detail);
                echo ' {"sale_master_id":"'.$r->sale_master_id.'","printer_location_id":"'.$r->printer_id.'","is_print":"'.count($data_detail).'","printer_name":"'.$r->printer_print_kitchen.'","Item": ';
                    echo '[';
                        foreach ($data_detail as $dd){
                            $this->Base_model->run_query("update sale_detail set sale_detail_printed=1 where sale_detail_id=$dd->sale_detail_id");
                            $data_note=$this->Base_model->loadToListJoin("SELECT
                            sn.sale_note_id,
                            sn.sale_note_detail_id,
                            sn.sale_note_item_note_id,
                            itn.item_note_name,
                            sn.sale_note_qty,
                            sn.sale_note_unit_price,
                            sn.sale_note_status
                            from
                            sale_note sn
                            LEFT JOIN item_note itn on sn.sale_note_item_note_id=itn.item_note_id
                            where sn.sale_note_detail_id=$dd->sale_detail_id and sn.sale_note_status=1");
                             $total3=count($data_note);
                            $k=0;
                            $j=$j+1;
                            echo '{"detail_id":"'.$dd->sale_detail_id.'","item_id":"'.$dd->sale_detail_item_id.'","table_name":"'.$dd->layout_name.'","item_name":"'.$dd->item_detail_name.'","unit_price":"'.$dd->sale_detail_unit_price.'","qty":"'.$dd->sale_detail_qty.'","sale_detail_printed":"'.$dd->sale_detail_printed.'","printer_location_id":"'.$dd->printer_id.'","sale_master_id":"'.$dd->sale_master_id.'","sale_note": ';
                                echo '[';
                                    //echo '{"a":1}';
                                    foreach ($data_note as $dt){
                                        $k=$k+1;
                                         echo '{"id":"'.$dt->sale_note_id.'","sale_detail_id":"'.$dt->sale_note_detail_id.'","item_note_id":"'.$dt->sale_note_item_note_id.'","item_note_name":"'.$dt->item_note_name.'","qty":"'.$dt->sale_note_qty.'","price":"'.$dt->sale_note_unit_price.'" }';
                                       
                                        if($k<$total3){echo ',';}
                                    }
                                echo ']';

                            echo '}';if($j<$total1 && $j<$total1){echo ',';}
                        }
                        
                    echo ']';    
                
                //cond level 1
                echo '}';if($i!=$total){echo ',';}
            }

        echo ']}';
    }
    public function print_out(){
        try{
             $receipt = $this->input->post("receipt");
             $data = base64_decode($this->input->post("realData"));
             $printer_name =$this->input->post("printer");
             file_put_contents("img/bill.png", $data);
            $tux = EscposImage::load("img/bill.png", false);
            
            //$connector = new NetworkPrintConnector("192.168.1.91",9100);
            $connector = new NetworkPrintConnector($printer_name,9100);
            $printer = new Printer($connector);
            $printer -> bitImage($tux,Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
            //$printer->pulse();
            
            //$printer -> feed();


            $printer -> cut();
            $printer -> close();
        } catch(Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }


    public function cash_drawer(){
        try{
            $printer_name =$this->input->post("printer");
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);
            $printer -> initialize();
            $printer->pulse();
            $printer -> close();
        } catch(Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }





    public function update_sale_detail_printed(){
        $sale_id=$this->input->post("master_id");
        $this->Base_model->run_query("update sale_detail set sale_detail_printed=sale_detail_qty where sale_master_id=".$sale_id);

    }
    public function save(){
        $this->set_sale_master_id($this->input->post('txt_sale_master_id'));
        $this->set_sale_master_start_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_master_branch_id($this->Base_model->branch_id());
        $this->set_sale_master_layout_id($this->input->post('txt_table_id'));
        $this->set_sale_master_cashier_id($this->Base_model->sale_offline("cashier"));
        $this->set_sale_master_pax(1);
        $this->set_sale_master_cash_id($this->Base_model->sale_offline("cash_id"));
        $this->set_sale_master_tax($this->Base_model->get_value("tax","tax_amount","1","1"));
        $this->set_sale_master_exchange_rate($this->Base_model->get_value("rate","rate_amount","1","1"));
        $this->set_sale_master_create_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_master_create_by($this->Base_model->sale_offline("cashier"));
        //detail
        $this->set_sale_detail_item_id($this->input->post('item_id'));
        $this->set_sale_detail_qty(1);
        $this->set_sale_detail_unit_price($this->Base_model->get_value("item_detail","item_detail_retail_price","item_detail_id",$this->get_sale_detail_item_id()));
        $this->set_sale_detail_create_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_detail_modified_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_detail_create_by($this->Base_model->sale_offline("cashier"));
        $this->set_sale_detail_modified_by($this->Base_model->sale_offline("cashier"));
        if($this->get_sale_master_id()==""){
            $branch=$this->Base_model->branch_id();
            $now=date("Y-m-d H:i:s");
            $happy_hour=$this->Base_model->get_value_byQuery("SELECT ifnull(happy_hour_discount,0) as happy_hour_discount FROM `happy_hour` where '$now' between cast(CONCAT(happy_hour_from_date,' ', happy_hour_start_time) as datetime) and cast(concat(happy_hour_to_date,' ',happy_hour_end_time) as datetime) and happy_hour_brand_id=$branch","happy_hour_discount");
            if($happy_hour=="") $happy_hour=0;
            $data_master=array(
                'sale_master_start_date'      =>$this->get_sale_master_start_date(),
                'sale_master_branch_id'    =>$this->get_sale_master_branch_id(),
                'sale_master_layout_id'    =>$this->get_sale_master_layout_id(),
                'sale_master_cash_id'   =>$this->get_sale_master_cash_id(),
                //'sale_master_seller_id'       =>$this->get_sale_master_seller_id(),
                'sale_master_cashier_id'=>$this->get_sale_master_cashier_id(),
                'sale_master_pax'          =>$this->get_sale_master_pax(),
                'sale_master_tax'=>$this->get_sale_master_tax(),
                'sale_master_exchange_rate'=>$this->get_sale_master_exchange_rate(),
                'sale_master_discount_percent'=>$happy_hour,
                //'sale_master_service_charge'=>$this->get_sale_master_service_charge(),
                'sale_master_create_date'=>$this->get_sale_master_create_date(),
                'sale_master_create_by'=>$this->get_sale_master_create_by(),
                'sale_master_print'=>0,
                'sale_master_offline_by'=>$this->Base_model->user_id(),
                'sale_master_offline_date'=>$this->Base_model->current_date("Y-m-d H:i:s")
            );
            $this->Base_model->save("sale_master", $data_master);
            $this->set_sale_master_id($this->Base_model->get_value_sql("select sale_master_id from sale_master where sale_master_create_by=".$this->get_sale_master_cashier_id()." order by sale_master_id desc limit 1 ","sale_master_id"));
            $data_detail=array(
                'sale_master_id'=>$this->get_sale_master_id(),
                'sale_detail_item_id'=>$this->get_sale_detail_item_id(),
                'sale_detail_qty'=>$this->get_sale_detail_qty(),
                'sale_detail_unit_price'=>$this->get_sale_detail_unit_price(),
                'sale_detail_create_date'=>$this->get_sale_detail_create_date(),
                'sale_detail_create_by'=>$this->get_sale_detail_create_by(),
                'sale_detail_modified_date'=>$this->get_sale_detail_modified_date(),
                'sale_detail_modified_by'=>$this->get_sale_detail_modified_by()

            );
            $this->Base_model->save("sale_detail", $data_detail);
            $this->set_sale_detail_id($this->Base_model->get_value_sql("select sale_detail_id from sale_detail where sale_master_id=".$this->get_sale_master_id()." order by sale_detail_id desc limit 1 ","sale_detail_id"));
            $exchange=$this->Base_model->get_value_sql("select sale_master_exchange_rate from sale_master where sale_master_id=".$this->get_sale_master_id()." limit 1 ","sale_master_exchange_rate");
            $response["status"] = "S001";
            $response["ex_rate"]=$exchange;
            $response["sale_master"] = $this->get_sale_master_id();
            $response["sale_detail"] = $this->get_sale_detail_id();
            $response["message"] ="Item has been saved!!";

        }else{
             $data_detail=array(
                'sale_master_id'=>$this->get_sale_master_id(),
                'sale_detail_item_id'=>$this->get_sale_detail_item_id(),
                'sale_detail_qty'=>$this->get_sale_detail_qty(),
                'sale_detail_unit_price'=>$this->get_sale_detail_unit_price(),
                'sale_detail_create_date'=>$this->get_sale_detail_create_date(),
                'sale_detail_create_by'=>$this->get_sale_detail_create_by(),
                'sale_detail_modified_date'=>$this->get_sale_detail_modified_date(),
                'sale_detail_modified_by'=>$this->get_sale_detail_modified_by()

            );
            $this->Base_model->save("sale_detail", $data_detail); 
            $this->set_sale_detail_id($this->Base_model->get_value_sql("select sale_detail_id from sale_detail where sale_master_id=".$this->get_sale_master_id()." order by sale_detail_id desc limit 1 ","sale_detail_id"));
            $exchange=$this->Base_model->get_value_sql("select sale_master_exchange_rate from sale_master where sale_master_id=".$this->get_sale_master_id()." limit 1 ","sale_master_exchange_rate");
            $response["status"] = "S001";
            $response["ex_rate"]=$exchange;
            $response["sale_master"] = $this->get_sale_master_id();
            $response["sale_detail"] = $this->get_sale_detail_id();
            $response["message"] ="Item has been saved!!";
            
        }
        echo json_encode($response);

    }
    public function save_item_note(){
        $this->set_sale_note_id($this->input->post('sale_note_id'));
        $this->set_sale_note_detail_id($this->input->post('sale_detail_id'));
        $this->set_sale_note_item_note_id($this->input->post('item_note_id'));
        $this->set_sale_note_qty($this->input->post('qty'));
        $this->set_sale_note_unit_price($this->input->post('item_note_price'));
        $this->set_sale_note_status(1);
        if($this->get_sale_note_id()==""){
            if($this->Base_model->check_exist_sql("select * from sale_note where sale_note_detail_id=".$this->get_sale_note_detail_id()." and sale_note_item_note_id=".$this->get_sale_note_item_note_id()." and sale_note_status=1 ")){
                $response["status"] = "E001";
                $response["message"] ="Item note existed!!";
            }else{
                $data_save=array(
                    'sale_note_detail_id'=>$this->get_sale_note_detail_id(),
                    'sale_note_item_note_id'=>$this->get_sale_note_item_note_id(),
                    'sale_note_qty'=>$this->get_sale_note_qty(),
                    'sale_note_unit_price'=>$this->get_sale_note_unit_price(),
                    'sale_note_status'=>$this->get_sale_note_status()
                );
                $this->Base_model->save("sale_note", $data_save);
                $response["status"] = "S001";
                $response["message"] ="Item has been saved!!";

            }
        }else{
            //update
        }
        echo json_encode($response);
    }
    
   public function update_qty(){
        $master_id=$this->input->post('master_id');
        $detail_id=$this->input->post('detail_id');
        $qty=$this->input->post('qty');
        $this->Base_model->update_array('sale_detail',array("sale_detail_qty"=>$qty), array("sale_detail_id"=>$detail_id));
        $this->Base_model->update_array('sale_note',array("sale_note_qty"=>$qty), array("sale_note_detail_id"=>$detail_id,"sale_note_status"=>1));
   }
    public function update_discount_percent(){
        $jsondata = $this->input->post('json');
        $json = json_decode($jsondata, true);
        
        //$this->set_sale_detail_id($this->input->post("sale_detail_id"));
        $this->set_discount_qty($this->input->post("discount_percent"));
        
        foreach ($json as $i) {
            
            $detail = array(
                'value' => $i['value']
            );
            
            $this->Base_model->execute_query("update sale_detail set sale_detail_discount_percent=? where sale_detail_id=?", array($this->get_discount_qty(),$i['value']));  
        }
    }
    public function update_discount_dollar(){
        $jsondata = $this->input->post('json');
        $json = json_decode($jsondata, true);
        //$this->set_sale_detail_id($this->input->post("sale_detail_id"));
        $this->set_discount_qty($this->input->post("discount_dollar"));
        
        foreach ($json as $i) {
            
            $detail = array(
                'value' => $i['value']
            );
            
            $this->Base_model->execute_query("update sale_detail set sale_detail_discount_dollar=? where sale_detail_id=?", array($this->get_discount_qty(),$i['value']));  
        }
    }
    public function delete_item_detail(){
        $jsondata = $this->input->post('data');
        $jsondata1 = $this->input->post('data1');
        $json = json_decode($jsondata);
        $json1 = json_decode($jsondata1);
       // var_dump($json);
        $len = count($json);
        $i = -1;
        $str = "(";
        foreach ($json as $key) {
            $i++;
            $str .= $key->items_id;
            if($i<$len-1)
                $str  .= ',';
        }
        $str .=")";
        //
        $len1 = count($json1);
        $i = -1;
        $str1 = "(";
        foreach ($json1 as $key) {
            $i++;
            $str1 .= $key->sale_note_id;
            if($i<$len1-1)
                $str1  .= ',';
        }
        $str1 .=")";
        if($len>0){
            $this->Base_model->run_query("update sale_detail set sale_detail_status=0 where sale_detail_id in $str");
            $this->Base_model->run_query("update sale_note set sale_note_status=0 where sale_note_detail_id in $str");
        }
        if($len1>0)
            $this->Base_model->run_query("update sale_note set sale_note_status=0 where sale_note_id in $str1");
    }
    public function order_list(){
        $id=$this->input->post('layout_id');
        $master=$this->input->post('master_id');
        $layout_id="";
        $master_id="";
        if($id!=""){
            $layout_id=" and sale_master_layout_id=$id";
        }
        if($master!=""){
            $master_id=" and sale_master_id=$master";
        }

        $data_master=$this->Base_model->loadToListJoin("select * from sale_master where sale_master_status=1 $layout_id $master_id");
        $total=count($data_master);
         $i=0;
         $j=0;
         
        echo '{"sale":[';
            foreach ($data_master as $r) {
                $i=$i+1;
                $data_detail=$this->Base_model->loadToListJoin("select * from v_sale_detail where sale_master_id=$r->sale_master_id and sale_detail_status=1");
                $total1=count($data_detail);
                echo ' {"sale_master_id":"'.$r->sale_master_id.'","sale_master_invoice_no":"'.$r->sale_master_invoice_no.'","sale_master_ex_rate":"'.$r->sale_master_exchange_rate.'","sale_master_start_date":"'.$r->sale_master_start_date.'","tax":"'.$r->sale_master_tax.'","print":"'.$r->sale_master_print.'","dis_all":"'.$r->sale_master_discount_percent.'","sale_detail": ';
           
                echo '[';
                    foreach($data_detail as $d){
                        $k=0;
                        $data_note=$this->Base_model->loadToListJoin("select * from v_sale_detail_note where sale_note_detail_id=$d->sale_detail_id and sale_note_status=1");
                        $total3=count($data_note);
                        $j=$j+1;
                        echo '{"sale_master_id":"'.$r->sale_master_id.'","sale_detail_id":"'.$d->sale_detail_id.'","item_id":"'.$d->sale_detail_item_id.'","detail_name":"'.$d->item_detail_name.'","cut_stock":"'.$d->cut_stock.'","qty":"'.$d->sale_detail_qty.'","price":"'.$d->sale_detail_unit_price.'","dis_dollar":"'.$d->sale_detail_dis_us.'","dis_percent":"'.$d->sale_detail_dis_percent.'","sale_note": ';
                        //lavel 3
                            echo '[';
                                //echo '{"total":"'.$total3.'"}';
                                foreach ($data_note as $dt){
                                    $k=$k+1;
                                     echo '{"id":"'.$dt->sale_note_id.'","sale_detail_id":"'.$dt->sale_note_detail_id.'","item_note_id":"'.$dt->sale_note_item_note_id.'","item_note_name":"'.$dt->item_note_name.'","qty":"'.$dt->sale_note_qty.'","price":"'.$dt->sale_note_unit_price.'" }';
                                   
                                    if($k<$total3){echo ',';}
                                }
                            echo ']';
                            //end level 3
                        //cond level 2
                        echo '}';if($j!=$total1 && $j<$total1){echo ',';}
                    }
                echo ']';
                //cond level 1
                    echo '}';if($i!=$total){echo ',';}
            }

        echo ']}';
    }
     public function order_list_bill(){

        $printer=$this->Base_model->get_value_sql("select p.printer_print_receipt from printer p where p.printer_location_id=(select u.user_printer_location_id from user u where u.employee_id =".$this->Base_model->user_id().")","printer_print_receipt");
        $cashier=$this->Base_model->get_value_sql("select employee_name as cashier from employee where employee_id=".$this->Base_model->user_id(),"cashier");
        $id=$this->input->post('layout_id');
        $master=$this->input->post('master_id');
        $this->Base_model->run_query("update sale_master set sale_master_print=sale_master_print+1 where sale_master_id=$master");
        $company=$this->Base_model->loadToListJoin("select
            b.branch_location,
            (select company_profile_image from company_profile limit 1) as logo,
            b.branch_phone,
            b.branch_email,
            b.branch_wifi_password,
            concat((select company_profile_name
            from company_profile
            limit 1),'(',b.branch_name,')') as branch_name
         from  employee e 
         Inner join branch b on b.branch_id=e.employee_brand_id
         where e.employee_id=".$this->Base_model->user_id());
        $com_name=$company[0]->branch_name;
        $com_email=$company[0]->branch_email;
        $com_img=base_url("img/company/").$company[0]->logo;
        $com_phone=$company[0]->branch_phone;
        $com_address=$company[0]->branch_location;
        $com_wifi=$company[0]->branch_wifi_password;
        $layout_id="";
        $master_id="";
        
         if($id!=""){   
            $layout_id=" and sale_master_layout_id=$id";
        }
        if($master!=""){
            $master_id=" and sale_master_id=$master";
        }

        $data_master=$this->Base_model->loadToListJoin("select * from sale_master where 1=1 $layout_id $master_id");
        $total=count($data_master);
         $i=0;
         $j=0;
        echo '{"sale":[';
            foreach ($data_master as $r) {
                $i=$i+1;
                $data_detail=$this->Base_model->loadToListJoin("select * from v_sale_detail where sale_master_id=$r->sale_master_id and sale_detail_status=1");
                $total1=count($data_detail);
                echo ' {"sale_master_id":"'.$r->sale_master_id.'","sale_master_invoice_no":"'.str_pad($r->sale_master_invoice_no,6,"0",STR_PAD_LEFT).'","sale_master_start_date":"'.$r->sale_master_start_date.'","sale_master_end_date":"'.$r->sale_master_end_date.'","sale_master_print_date":"'.date("Y-m-d H:i:s").'","tax":"'.$r->sale_master_tax.'","print":"'.$r->sale_master_print.'","printer":"'.$printer.'","cashier":"'.$cashier.'","dis_inv":"'.$r->sale_master_discount_percent.'","ex_rate":"'.$r->sale_master_exchange_rate.'","vat":"'.$r->sale_master_tax.'","com_name":"'.$com_name.'","com_email":"'.$com_email.'","com_phone":"'.$com_phone.'","com_address":"'.$com_address.'","com_img":"'.$com_img.'","com_wifi":"'.$com_wifi.'","member_discount":"'.$r->sale_master_member_discount.'","sale_detail": ';
           
                echo '[';
                    foreach($data_detail as $d){
                        $k=0;
                        $data_note=$this->Base_model->loadToListJoin("select * from v_sale_detail_note where sale_note_detail_id=$d->sale_detail_id and sale_note_status=1");
                        $total3=count($data_note);
                        $j=$j+1;
                        echo '{"sale_master_id":"'.$r->sale_master_id.'","sale_detail_id":"'.$d->sale_detail_id.'","item_id":"'.$d->sale_detail_item_id.'","detail_name":"'.$d->item_detail_name.'","qty":"'.$d->sale_detail_qty.'","price":"'.$d->sale_detail_unit_price.'","dis_dollar":"'.$d->sale_detail_dis_us.'","dis_percent":"'.$d->sale_detail_dis_percent.'","sale_note": ';
                        //lavel 3
                            echo '[';
                                //echo '{"total":"'.$total3.'"}';
                                foreach ($data_note as $dt){
                                    $k=$k+1;
                                     echo '{"id":"'.$dt->sale_note_id.'","sale_detail_id":"'.$dt->sale_note_detail_id.'","item_note_id":"'.$dt->sale_note_item_note_id.'","item_note_name":"'.$dt->item_note_name.'","qty":"'.$dt->sale_note_qty.'","price":"'.$dt->sale_note_unit_price.'" }';
                                   
                                    if($k<$total3){echo ',';}
                                }
                            echo ']';
                            //end level 3
                        //cond level 2
                        echo '}';if($j!=$total1 && $j<$total1){echo ',';}
                    }
                echo ']';
                //cond level 1
                    echo '}';if($i!=$total){echo ',';}
            }

        echo ']}';
    }
    
    public function load_category(){
        $getlist = $this->Base_model->loadToListJoin("SELECT item_type_id,item_type_name,item_type_photo from item_type where item_type_is_ingredient!=1");
        echo json_encode($getlist);
    }
    
    public function load_item_detail($type_id){
        $str='';
        if($type_id>0){
            $str="and item_type_id=$type_id";
        }
        $getlist = $this->Base_model->loadToListJoin("SELECT item_detail_id,item_detail_name,item_detail_retail_price as price,item_detail_photo,item_detail_cut_stock from item_detail WHERE 1=1 $str order by item_type_id ");
        echo json_encode($getlist);
    }
    public function scan_barcode(){
        $datas=$this->input->post('search');
        $str="";
        if($datas!="" && $datas!=null){
            $str="and (item_detail_name like '%$datas%' or item_detail_part_number like '%$datas%') ";
        }
        $getlist = $this->Base_model->loadToListJoin("SELECT item_detail_id,item_detail_name,item_detail_retail_price as price,item_detail_photo,item_detail_cut_stock from item_detail WHERE 1=1 $str order by item_type_id ");
        echo json_encode($getlist);
    }
    public function load_item_note(){
        $getlist = $this->Base_model->loadToListJoin("SELECT item_note_id,item_note_name,item_note_price from item_note");
        echo json_encode($getlist);
    }
    public function load_tax(){
        $this->set_sale_master_tax($this->Base_model->get_value("tax","tax_amount","1",1));
        $tax_amount=array(
            'tax_amount'=>$this->get_sale_master_tax()
        );
        echo json_encode($tax_amount);
    }
    public function submit_order(){
        $this->set_table_id($this->input->post("txt_table_id"));
        $this->set_branch_id($this->session->userdata("branch_id"));
        $this->set_invoice_no($this->Base_model->get_value_two_cond("v_invoice_active","master_id","sale_master_layout_id",$this->get_table_id(),"sale_master_branch_id",$this->get_branch_id()));
        //$this->print_order($this->get_invoice_no());
        $arr = array(
                //TOTAL SALE
                'invoice_no' => $this->get_invoice_no());
        echo json_encode($arr);
    }
    public function get_last_detail_id(){
        $this->set_table_id($this->input->get("layout_id"));
        if($this->get_table_id()>0){
            $this->set_sale_detail_id($this->Base_model->get_value_byQuery("select detail_id from v_invoice where layout_id=".$this->get_table_id()." order by detail_id desc limit 1",'detail_id'));
            $arr = array(
                        'sale_detail_id' => $this->get_sale_detail_id());
            echo json_encode($arr);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "E0001";
            $response["message"] = "Require parameter!";
            echo json_encode($response);
        }
    }
    
    public function cancel_order(){
        $this->set_table_id($this->input->post("txt_table_id"));
        $this->set_branch_id($this->session->userdata("branch_id"));
        $this->set_invoice_no($this->Base_model->get_value_two_cond("v_invoice_active","master_id","sale_master_layout_id",$this->get_table_id(),"sale_master_branch_id",$this->get_branch_id()));
        $data_master=array(
            'sale_master_status' =>'CANCEL'
        );
        $data_detail=array(
            'sale_detail_status' =>'CANCEL'
        );
        $this->Base_model->update('sale_master', $data_master, array("sale_master_id" => $this->get_invoice_no()));
        $this->Base_model->update('sale_detail', $data_detail, array("sale_detail_sale_master_id" => $this->get_invoice_no()));
    }
    
    public function load_table_name($table_id){
        $this->set_sale_master_layout_id($table_id);
        $this->set_sale_master_layout_name($this->Base_model->get_value("floor_table_layout","layout_name","layout_id",$this->get_sale_master_layout_id()));
        $table_name=array(
            'table_name'=>$this->get_sale_master_layout_name()
        );
        echo json_encode($table_name);
    }
    
    public function searchproduct(){
        $this->load->view("search/search.php");
    }
    //SEAR FUNCTION UPDATED BY CHEANG
    public function load_payment($id){
        $amount=$this->Base_model->get_value_sql("select 
        cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)  as decimal(10,3)) as grand
    from sale_master sm inner join sale_detail sd on sm.sale_master_id=sd.sale_master_id where sm.sale_master_id=$id and sd.sale_detail_status=1
    group by sm.sale_master_id","grand");
        $discount= $this->Base_model->get_value_sql("select sale_master_discount_percent from sale_master where sale_master_id=$id","sale_master_discount_percent");
        $sale_tax=$this->Base_model->get_value_sql("select sale_master_tax from sale_master where sale_master_id=$id","sale_master_tax");

        $sale_note=$this->Base_model->get_value_sql("select sum(sale_note_qty*sale_note_unit_price) as sale_note from sale_note where sale_note_detail_id in(select sale_detail_id from sale_detail where sale_master_id=$id and sale_detail_status=1) and sale_note_status=1","sale_note");
        
        $data_master=$this->Base_model->loadToListJoin("select sale_master_tax as tax,sale_master_exchange_rate as exchange from sale_master where sale_master_id=$id");
        foreach ($data_master as $p) {
            $data = array(
                'grand_total_us' =>number_format((($amount+$sale_note)*(1-$discount/100))*(1+$sale_tax/100),2),
                'grand_total_kh'    =>number_format((($amount+$sale_note)*(1-$discount/100))*(1+$sale_tax/100),2)*$p->exchange,
                'exchange_rate' =>$p->exchange,
                'total_us'  =>number_format(($amount+$sale_note)*(1-$discount/100),2),
                'total_kh'  =>number_format(($amount+$sale_note)*(1-$discount/100),2)*$p->exchange,
                'tax'   =>$sale_tax
            );
        }   
        //number_format($p->total_us,2)   
        echo json_encode($data);
    }
    public function get_customer_scan_card(){
        $card_number = $this->input->post("card_number");
        $get_customer = $this->Base_model->loadToListJoin("select 
                cs.customer_id,
                cs.customer_name,
                cs.customer_chip,
                cs.customer_balance,
                cs.customer_discount,
                cs.customer_card_expired
            from customer cs
            where cs.customer_chip='$card_number'");
        echo json_encode($get_customer);
    }
    public function update_sale_master(){
        $this->set_sale_master_id($this->input->post("master_id"));
        $this->set_card_number($this->Base_model->get_value("customer_account","customer_acc_id","customer_chip",$this->input->post("card_number")));
        $this->set_card_amount($this->input->post("card_amount"));
        $this->set_total_us($this->input->post("total_us"));
        $this->set_total_kh($this->input->post("total_kh"));
        $this->set_pay_us($this->input->post("pay_us"));
        $this->set_pay_kh($this->input->post("pay_kh"));
        $this->set_payment_amount($this->input->post("payment_amount"));
        $this->set_payment_card_type($this->input->post("payment_card_type"));
        $this->set_return_kh($this->input->post("return_us"));
        $this->set_return_us($this->input->post("return_kh"));
        $this->set_membership_discount($this->input->post("discount"));
        $this->set_sale_by($this->session->userdata('user_id'));
        $date=$this->Base_model->current_date("Y-m-d H:i:s");
        $this->set_end_date($date);
        $user_id = $this->Base_model->get_value("user","user_id","employee_id",$this->session->userdata("user_id"));
        $this->set_cash_id($this->Base_model->get_value_two_cond("cash_register","cash_id","cash_status",'ACTIVE',"cash_user_id",$user_id)); 
        $update_master = array();
        
        if($this->get_card_number()==''){
            $update_master['sale_master_customer_acc_id']=0;
        }else{
            $update_master['sale_master_customer_acc_id']=$this->get_card_number();
        }
        if($this->get_payment_card_type()=='0' && $this->get_payment_amount()=='0' && $this->get_card_amount()=='0'){
            $update_master['sale_master_member_pay']=0;
            $update_master['sale_master_card_pay']=0;
            $update_master['sale_master_account_type']=0;
        }else{
            $update_master['sale_master_card_pay']=$this->get_card_amount();
            $update_master['sale_master_member_pay']=$this->get_payment_amount();
            $update_master['sale_master_account_type']=$this->get_payment_card_type();
        }
        $update_master['sale_master_end_date']= $this->get_end_date();
        $update_master['sale_master_pay_us']= $this->get_pay_us();
        $update_master['sale_master_pay_kh']= $this->get_pay_kh();
        $update_master['sale_master_discount']= $this->get_membership_discount();
        $update_master['sale_master_end_date']= $this->get_end_date();
        $update_master['sale_master_cash_id'] =$this->get_cash_id();
        $update_master['sale_master_cashier'] = $this->get_sale_by();
        
        if($this->get_pay_us() == '' && $this->get_pay_kh() == '' && $this->get_card_number() == ''){
            $update_master['sale_master_print'] = 1;
        }else{
            $update_master['sale_master_print'] = 0;
        }
        if($this->get_sale_master_id() != 0){
            $this->Base_model->update_array('sale_master', $update_master, array("sale_master_id" => $this->get_sale_master_id()));
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "Success!";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "S0001";
            $response["message"] = "Error!";
            echo json_encode($response);
        }
    }
    function update_card(){
        $this->set_card_number($this->input->post("card_number"));
        $this->set_card_amount($this->input->post("card_amount"));
        $this->set_payment_card_type($this->input->post("payment_card_type"));
        $this->set_payment_amount($this->input->post("payment_amount"));
        if($this->get_card_number()!=0 && $this->get_payment_amount() !=0){
            $get_balance = $this->Base_model->loadToListJoin("select * from customer_account where customer_chip = '".$this->get_card_number()."'");
            $q_acc_id = '';
            $update_card_amount = array();
            $update_master = array();
            foreach($get_balance as $gb){
                if($get_balance != 0 || $get_balance !=''){

                    $q_acc_id = $gb->customer_acc_id;

                    $update_master['sale_master_member_pay']=$this->get_card_amount();
                    $update_master['sale_master_card_pay']=$this->get_payment_amount();
                    $update_master['sale_master_account_type']=$this->$this->get_payment_card_type();
                    $update_card_amount['customer_balance'] = $gb->customer_balance - $this->get_card_amount();

                }else{

                }
            }
            $this->Base_model->update('sale_master','sale_master_customer_acc_id',$q_acc_id,$update_master);
            $this->Base_model->update('customer_account', 'customer_chip',$this->get_card_number(),$update_card_amount);


            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "Success!";
            echo json_encode($response);
        }else{
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "Success!";
            echo json_encode($response);
        }
        
    }
    function update_sale_status(){
        $this->set_sale_master_id($this->input->post("master_id"));
        $this->set_sale_master_cash_id($this->Base_model->sale_offline("cash_id"));
        $customer_id = $this->input->post("customer_id");
        $member_discount = $this->input->post("member_discount");
        $customer_chip = $this->input->post("customer_chip");
        if($customer_id=='')
            $customer_id = NULL;
        if($this->get_sale_master_id() != 0 && $this->get_sale_master_id() != ''){
            $last_invoice_no = $this->Base_model->get_value_sql("select max(sale_master_invoice_no) as last_invoice_no from sale_master","last_invoice_no");
            $update_master = array(
                'sale_master_invoice_no'  => $last_invoice_no + 1,
                'sale_master_end_date'    => $this->Base_model->sale_offline("dates"),
                'sale_master_customer_id' => $customer_id,
                'sale_master_cash_id'     => $this->get_sale_master_cash_id(),
                'sale_master_cashier_id'   => $this->Base_model->sale_offline("cashier"),
                //'sale_master_discount_percent' => 0,
                'sale_master_status' => 2
            );
            $update_master['sale_master_pay_kh'] = $this->input->post("pay_kh");
            $update_master['sale_master_pay_us'] = $this->input->post("pay_us");
            if($this->input->post("account_type_id")!=0){
                $update_master['sale_master_account_type'] = $this->input->post("account_type_id");
                $update_master['sale_master_other_card'] = $this->input->post("other_card");
            }
            if($this->input->post("member_card")!=0){
                $update_master['sale_master_member_pay'] = $this->input->post("member_card");
                $temp_balance=$this->Base_model->get_value_sql("select customer_balance from customer where customer_id=$customer_id and customer_chip='".$customer_chip."'","customer_balance");
                $temp_cash_id=$this->Base_model->sale_offline("cash_id");
                $mytemp=$temp_balance-$this->input->post("member_card");
                $this->Base_model->run_query("Insert into transaction (transaction_customer_id,transaction_by,transaction_date,transaction_amount,transaction_balance,transaction_remain,transaction_action,cash_id,branch_id) values(".$customer_id.",".$this->Base_model->sale_offline("cashier").",'".$this->Base_model->sale_offline("dates")."',".$this->input->post("member_card").",".$mytemp.",".$temp_balance.",0,".$temp_cash_id.",".$this->Base_model->branch_id().")");

                $this->Base_model->run_query("update customer set customer_balance = customer_balance - ".$this->input->post("member_card")." where customer_id=$customer_id and customer_chip='".$customer_chip."'");

            }
            if($member_discount!=0)
                $update_master['sale_master_member_discount'] = $member_discount;
            //$update_detail  = array(
            //    'sale_detail_status' => 1, 
            //);
            $this->Base_model->update('sale_master','sale_master_id',$this->get_sale_master_id(), $update_master);
            //$this->Base_model->update_array('sale_detail', $update_detail, array("sale_detail_sale_master_id" => $this->get_sale_master_id()));
            
            $this->update_stock();
            
            $response["success"] = 1;
            $response["statusCode"] = "E0001";
            $response["message"] = "Success!";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["statusCode"] = "S0001";
            $response["message"] = "Error!";
            echo json_encode($response); 
        }
    }
    
    public function payment_receipt(){
	$data['invoice_no'] = $this->uri->segment(3);
        $this->load->view("cafe/frm_print_receipt",$data);
    }
    public function update_stock_(){
        $order_item = $this->Base_model->loadToListJoin("select 
            sd.sale_detail_id,
            sd.sale_detail_qty,
            sd.sale_detail_item_id,
            it.item_main_id,
            it.measure_id,
            m.measure_qty,
            it.item_detail_cut_stock as cut_stock
        from sale_detail  sd
        inner join item_detail it on sd.sale_detail_item_id = it.item_detail_id
        left join measure m on it.measure_id=m.measure_id
        where sd.sale_master_id=".$this->get_sale_master_id()." and sd.sale_detail_status=1");
        $stock_location_id = $this->Base_model->get_value("employee","employee_stock_location_id","employee_id",$this->Base_model->sale_offline("cashier"));
        foreach($order_item as $it){
            $item_id = $it->item_main_id;
            if($it->cut_stock==1)
                $qty = $it->sale_detail_qty * $it->measure_qty;
            else
                $qty = $it->sale_detail_qty;
            $item_detail_id=$it->sale_detail_item_id;

           $costing = $this->Base_model->cut_stock($qty,$stock_location_id,$item_id,$it->sale_detail_id,$item_detail_id,$it->cut_stock);       
        }         
    }
    public function update_stock(){
        $order_item = $this->Base_model->loadToListJoin("select 
            sd.sale_detail_id,
            sd.sale_detail_qty,
            sd.sale_detail_item_id,
            it.item_detail_cut_stock as cut_stock
        from sale_detail  sd
        inner join item_detail it on sd.sale_detail_item_id = it.item_detail_id
        where sd.sale_master_id=".$this->get_sale_master_id()." and sd.sale_detail_status=1");
       $stock_location_id = $this->Base_model->get_value("employee","employee_stock_location_id","employee_id",$this->Base_model->sale_offline("cashier"));
        foreach($order_item as $it){
            $item_id = $it->sale_detail_item_id;
            $qty = $it->sale_detail_qty;
            $item_detail_id=$it->sale_detail_item_id;

           $costing = $this->Base_model->cut_stock($qty,$stock_location_id,$item_id,$it->sale_detail_id,$item_detail_id,$it->cut_stock);       
        }         
    }
    public function save_void(){
        $this->set_sale_master_id($this->input->post("sale_master_id"));
        $last_invoice_no = $this->Base_model->get_value_sql("select max(sale_master_invoice_no) as last_invoice_no from sale_master","last_invoice_no");
        $this->Base_model->update_array('sale_master', array('sale_master_invoice_no'=>$last_invoice_no+1,'sale_master_status'=>-1,'sale_master_end_date'=>$this->Base_model->sale_offline("dates")), array("sale_master_id" => $this->get_sale_master_id()));
        $this->Base_model->update_array('sale_detail', array('sale_detail_status'=>-1), array("sale_master_id" => $this->get_sale_master_id()));
    }
    //END SEAR FUNCTION
    public function print_order(){
        //        $data['table_name']=$this->Base_model->get_value("v_invoice_active","table_name","master_id",$sale_id);
        //        $data['order_by']  =$this->Base_model->get_value("v_invoice_active","cashier","master_id",$sale_id);
        //        $data['start_date']=$this->Base_model->get_value("v_invoice_active","table_name","master_id",$sale_id);
        //        
        //        $data['order_record']=$this->Base_model->loadToListJoin("select item_name,qty,item_note from v_kitchen_print_active where sale_master_id=".$sale_id);
        //        
        //        $this->load->view("admin/cafe/order/order_print",$data);

                $sale_id=$this->input->post("order_no");
                $printer_bill    =array();
                $printer_location=array();

                $printer         =$this->Base_model->select("SELECT DISTINCT get_printer_name(printer_location_id) as printer_print_bill,printer_location_id from v_kitchen_print_active where sale_master_id=?",array($sale_id));
                $count           =$this->Base_model->get_value_byQuery("SELECT DISTINCT count(printer_location_id) from v_kitchen_print_active where sale_master_id=".$sale_id,'count(printer_location_id)');
                
        //        $printer         =$this->Base_model->select("select printer_print_bill,printer_location_id from printer where printer_is_counter=?",array(0));
        //        $count           =$this->Base_model->get_count_value("printer","printer_id","printer_is_counter",0);
                //for($k=0;$k<$count;$k++){
                        foreach($printer as $p){
                            $printer_bill[]    =$p->printer_print_bill;
                            $printer_location[]=$p->printer_location_id;
                        }
                //}

                        for($i=0;$i<$count-1;$i++){
                            //print_r($printer_location[$i]);
                            //$this->print_out($sale_id,$printer_bill[$i],$printer_location[$i]);
                            $this->print_out($sale_id,$printer_bill[$i],$printer_location[$i]);
                        }

                       //$this->print_out($sale_id,"192.168.0.200",2);
        //             $this->print_test($sale_id,"TP-3250W",2);
        //             $this->printFromWebPage();
    }

   
    

	public function check_invoice_split(){
            $table_id=$this->input->post("table_id");
            $invoice = $this->Base_model->select_value("select count(*) as split_invocie from sale_master where sale_master_layout_id=? and sale_master_status=1", array($table_id),"split_invocie");
            echo $invoice; 
            exit ();
    }
    public function get_invoice_split(){
        $table_id=$this->input->post("table_id");
        $detail = $this->Base_model->loadToListJoin("select sale_master_layout_id,sale_master_id, LPAD(sale_master_id, 6, '0') AS invoice_no from sale_master where sale_master_layout_id=$table_id and sale_master_status=1");
        echo json_encode($detail);
    }
    public function save_split_table(){
        $master_id=$this->input->post('master_id');
        $data=$this->input->post('data');
        $layout_id=$this->input->post('layout_id');  
        $this->set_sale_master_start_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_master_branch_id($this->Base_model->branch_id());
        $this->set_sale_master_layout_id($layout_id);
        $this->set_sale_master_cashier_id($this->Base_model->sale_offline("cashier"));
        $this->set_sale_master_pax(1);
        $this->set_sale_master_cash_id($this->Base_model->get_value_sql("select cash_id from cash_register where cash_user_id=".$this->get_sale_master_cashier_id()." and cash_status='ACTIVE' order by cash_id desc limit 1 ","cash_id"));
        $this->set_sale_master_tax($this->Base_model->get_value("tax","tax_amount","1","1"));
        $this->set_sale_master_exchange_rate($this->Base_model->get_value("rate","rate_amount","1","1"));
        $this->set_sale_master_create_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_master_create_by($this->Base_model->user_id());
        $data_master=array(
            'sale_master_start_date'      =>$this->get_sale_master_start_date(),
            'sale_master_branch_id'    =>$this->get_sale_master_branch_id(),
            'sale_master_layout_id'    =>$this->get_sale_master_layout_id(),
            'sale_master_cash_id'   =>$this->get_sale_master_cash_id(),
            //'sale_master_seller_id'       =>$this->get_sale_master_seller_id(),
            'sale_master_cashier_id'=>$this->get_sale_master_cashier_id(),
            'sale_master_pax'          =>$this->get_sale_master_pax(),
            'sale_master_tax'=>$this->get_sale_master_tax(),
            'sale_master_exchange_rate'=>$this->get_sale_master_exchange_rate(),
            //'sale_master_service_charge'=>$this->get_sale_master_service_charge(),
            'sale_master_create_date'=>$this->get_sale_master_create_date(),
            'sale_master_create_by'=>$this->get_sale_master_create_by(),
            'sale_master_print'=>0
        );
        $this->Base_model->save("sale_master", $data_master);
        $this->set_sale_master_id($this->Base_model->get_value_sql("select sale_master_id from sale_master where sale_master_create_by=".$this->get_sale_master_cashier_id()." order by sale_master_id desc limit 1 ","sale_master_id"));
        
        foreach($data as $d){
            if($d['qty']==$this->Base_model->get_value("sale_detail","sale_detail_qty","sale_detail_id",$d['id'])){
                $data_detail=array('sale_master_id'=>$this->get_sale_master_id());
                $this->Base_model->update("sale_detail","sale_detail_id",$d['id'],$data_detail);
            }
            else{
                $this->set_sale_detail_item_id($this->Base_model->get_value("sale_detail","sale_detail_item_id","sale_detail_id",$d['id']));
                $this->set_sale_detail_qty($d['qty']);
                $this->set_sale_detail_unit_price($this->Base_model->get_value("sale_detail","sale_detail_unit_price","sale_detail_id",$d['id']));
                $this->set_sale_detail_create_date($this->Base_model->sale_offline("dates"));
                $this->set_sale_detail_modified_date($this->Base_model->sale_offline("dates"));
                $this->set_sale_detail_create_by($this->Base_model->user_id());
                $this->set_sale_detail_modified_by($this->Base_model->user_id());
                $data_detail=array(
                    'sale_master_id'=>$this->get_sale_master_id(),
                    'sale_detail_item_id'=>$this->get_sale_detail_item_id(),
                    'sale_detail_qty'=>$this->get_sale_detail_qty(),
                    'sale_detail_unit_price'=>$this->get_sale_detail_unit_price(),
                    'sale_detail_create_date'=>$this->get_sale_detail_create_date(),
                    'sale_detail_create_by'=>$this->get_sale_detail_create_by(),
                    'sale_detail_modified_date'=>$this->get_sale_detail_modified_date(),
                    'sale_detail_modified_by'=>$this->get_sale_detail_modified_by()

                );
                $this->Base_model->save("sale_detail", $data_detail);
                $data_detail=array('sale_detail_qty'=>(($this->Base_model->get_value_sql("select sale_detail_qty as qty from sale_detail where sale_detail_id=".$d['id'],"qty"))-$d['qty']));
                $this->Base_model->update("sale_detail","sale_detail_id",$d['id'],$data_detail);
                $this->set_sale_detail_id($this->Base_model->get_value_sql("select sale_detail_id from sale_detail where sale_master_id=".$this->get_sale_master_id()." order by sale_detail_id desc limit 1 ","sale_detail_id"));
                $sale_node_id_temp=$this->Base_model->loadToListJoin("select sale_note_id from sale_note where sale_note_detail_id=".$d['id']);
                foreach($sale_node_id_temp as $snit){
                    $this->set_sale_note_detail_id($this->get_sale_detail_id());
                    $this->set_sale_note_item_note_id($this->Base_model->get_value("sale_note","sale_note_item_note_id","sale_note_id",$snit->sale_note_id));
                    $this->set_sale_note_qty($d['qty']);
                    $this->set_sale_note_unit_price($this->Base_model->get_value("sale_note","sale_note_unit_price","sale_note_id",$snit->sale_note_id));
                    $this->set_sale_note_status(1);
                    $data_save=array(
                        'sale_note_detail_id'=>$this->get_sale_note_detail_id(),
                        'sale_note_item_note_id'=>$this->get_sale_note_item_note_id(),
                        'sale_note_qty'=>$this->get_sale_note_qty(),
                        'sale_note_unit_price'=>$this->get_sale_note_unit_price(),
                        'sale_note_status'=>$this->get_sale_note_status()
                    );
                    $this->Base_model->save("sale_note", $data_save);
                    $data_note=array('sale_note_qty'=>($this->Base_model->get_value_sql("SELECT sale_note_qty as qty FROM `sale_note` WHERE sale_note_id=".$snit->sale_note_id,"qty"))-$d['qty']);
                    $this->Base_model->update("sale_note","sale_note_id",$snit->sale_note_id,$data_note);
                }
            }
        }
        if($this->Base_model->get_value_sql("SELECT count(*) as count FROM `sale_detail` WHERE sale_master_id=".$master_id,"count")<1){
            $this->Base_model->delete_by("sale_master","sale_master_id",$master_id);
        }
    }
    public function save_sale_return(){
        $master_id=$this->input->post('master_id');
        $data=$this->input->post('data');
        foreach($data as $d){
            $arr=array(
                'sale_return_master_id'=>$master_id,
                'sale_return_detail_id'=>$d['id'],
                'sale_return_qty'=>$d['qty'],
                'sale_return_created_by'=>$this->Base_model->user_id(),
                'sale_return_created_date'=>$this->Base_model->current_date('Y-m-d H:i:s')
            );
            $this->Base_model->save("sale_order_return", $arr);
            $sale_detail=$this->Base_model->loadToListJoin("select * from sale_detail where sale_detail_id=".$d['id']." ");
            foreach($sale_detail as $sd){
                if($sd->sale_detail_qty==$d['qty']){
                    $this->Base_model->update("sale_detail","sale_detail_id",$d['id'],array('sale_detail_qty'=>0,'sale_detail_status'=>0,'sale_detail_note'=>'Delete By Return'));
                }else{
                    $this->Base_model->update("sale_detail","sale_detail_id",$d['id'],array('sale_detail_qty'=>$sd->sale_detail_qty-$d['qty']));
                }
            }
        }
        
    }

    public function save_split_invoice(){
        $master_id=$this->input->post('master_id');
        $data=$this->input->post('data');
        $layout_id=$this->Base_model->get_value_sql("select sale_master_layout_id from sale_master where sale_master_id=".$master_id,"sale_master_layout_id"); 
        $this->set_sale_master_start_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_master_branch_id($this->Base_model->branch_id());
        $this->set_sale_master_layout_id($layout_id);
        $this->set_sale_master_cashier_id($this->Base_model->sale_offline("cashier"));
        $this->set_sale_master_pax(1);
        $this->set_sale_master_cash_id($this->Base_model->get_value_sql("select cash_id from cash_register where cash_user_id=".$this->get_sale_master_cashier_id()." and cash_status='ACTIVE' order by cash_id desc limit 1 ","cash_id"));
        $this->set_sale_master_tax($this->Base_model->get_value("tax","tax_amount","1","1"));
        $this->set_sale_master_exchange_rate($this->Base_model->get_value("rate","rate_amount","1","1"));
        $this->set_sale_master_create_date($this->Base_model->sale_offline("dates"));
        $this->set_sale_master_create_by($this->Base_model->user_id());
        $data_master=array(
            'sale_master_start_date'      =>$this->get_sale_master_start_date(),
            'sale_master_branch_id'    =>$this->get_sale_master_branch_id(),
            'sale_master_layout_id'    =>$this->get_sale_master_layout_id(),
            'sale_master_cash_id'   =>$this->get_sale_master_cash_id(),
            //'sale_master_seller_id'       =>$this->get_sale_master_seller_id(),
            'sale_master_cashier_id'=>$this->get_sale_master_cashier_id(),
            'sale_master_pax'          =>$this->get_sale_master_pax(),
            'sale_master_tax'=>$this->get_sale_master_tax(),
            'sale_master_exchange_rate'=>$this->get_sale_master_exchange_rate(),
            //'sale_master_service_charge'=>$this->get_sale_master_service_charge(),
            'sale_master_create_date'=>$this->get_sale_master_create_date(),
            'sale_master_create_by'=>$this->get_sale_master_create_by(),
            'sale_master_print'=>0
        );
        $this->Base_model->save("sale_master", $data_master);
        $this->set_sale_master_id($this->Base_model->get_value_sql("select sale_master_id from sale_master where sale_master_create_by=".$this->get_sale_master_cashier_id()." order by sale_master_id desc limit 1 ","sale_master_id"));
        
        foreach($data as $d){
            if($d['qty']==$this->Base_model->get_value("sale_detail","sale_detail_qty","sale_detail_id",$d['id'])){
                $data_detail=array('sale_master_id'=>$this->get_sale_master_id());
                $this->Base_model->update("sale_detail","sale_detail_id",$d['id'],$data_detail);
            }
            else{
                $this->set_sale_detail_item_id($this->Base_model->get_value("sale_detail","sale_detail_item_id","sale_detail_id",$d['id']));
                $this->set_sale_detail_qty($d['qty']);
                $this->set_sale_detail_unit_price($this->Base_model->get_value("sale_detail","sale_detail_unit_price","sale_detail_id",$d['id']));
                $this->set_sale_detail_create_date($this->Base_model->sale_offline("dates"));
                $this->set_sale_detail_modified_date($this->Base_model->sale_offline("dates"));
                $this->set_sale_detail_create_by($this->Base_model->user_id());
                $this->set_sale_detail_modified_by($this->Base_model->user_id());
                $data_detail=array(
                    'sale_master_id'=>$this->get_sale_master_id(),
                    'sale_detail_item_id'=>$this->get_sale_detail_item_id(),
                    'sale_detail_qty'=>$this->get_sale_detail_qty(),
                    'sale_detail_unit_price'=>$this->get_sale_detail_unit_price(),
                    'sale_detail_create_date'=>$this->get_sale_detail_create_date(),
                    'sale_detail_create_by'=>$this->get_sale_detail_create_by(),
                    'sale_detail_modified_date'=>$this->get_sale_detail_modified_date(),
                    'sale_detail_modified_by'=>$this->get_sale_detail_modified_by()

                );
                $this->Base_model->save("sale_detail", $data_detail);
                $data_detail=array('sale_detail_qty'=>(($this->Base_model->get_value_sql("select sale_detail_qty as qty from sale_detail where sale_detail_id=".$d['id'],"qty"))-$d['qty']));
                $this->Base_model->update("sale_detail","sale_detail_id",$d['id'],$data_detail);
                $this->set_sale_detail_id($this->Base_model->get_value_sql("select sale_detail_id from sale_detail where sale_master_id=".$this->get_sale_master_id()." order by sale_detail_id desc limit 1 ","sale_detail_id"));
                $sale_node_id_temp=$this->Base_model->loadToListJoin("select sale_note_id from sale_note where sale_note_detail_id=".$d['id']);
                foreach($sale_node_id_temp as $snit){
                    $this->set_sale_note_detail_id($this->get_sale_detail_id());
                    $this->set_sale_note_item_note_id($this->Base_model->get_value("sale_note","sale_note_item_note_id","sale_note_id",$snit->sale_note_id));
                    $this->set_sale_note_qty($d['qty']);
                    $this->set_sale_note_unit_price($this->Base_model->get_value("sale_note","sale_note_unit_price","sale_note_id",$snit->sale_note_id));
                    $this->set_sale_note_status(1);
                    $data_save=array(
                        'sale_note_detail_id'=>$this->get_sale_note_detail_id(),
                        'sale_note_item_note_id'=>$this->get_sale_note_item_note_id(),
                        'sale_note_qty'=>$this->get_sale_note_qty(),
                        'sale_note_unit_price'=>$this->get_sale_note_unit_price(),
                        'sale_note_status'=>$this->get_sale_note_status()
                    );
                    $this->Base_model->save("sale_note", $data_save);
                    $data_note=array('sale_note_qty'=>($this->Base_model->get_value_sql("SELECT sale_note_qty as qty FROM `sale_note` WHERE sale_note_id=".$snit->sale_note_id,"qty"))-$d['qty']);
                    $this->Base_model->update("sale_note","sale_note_id",$snit->sale_note_id,$data_note);
                }
            }
        }
        if($this->Base_model->get_value_sql("SELECT count(*) as count FROM `sale_detail` WHERE sale_master_id=".$master_id,"count")<1){
            $this->Base_model->delete_by("sale_master","sale_master_id",$master_id);
        }
    }
    public function save_discount(){
        $master_id=$this->input->post('master_id');
        $data=$this->input->post('data');
        $type=$this->input->post('type_dis');
        $discount_dollar=0;
        $discount_percent=0;
        $discount_invoice=0;
        if($type=="percent"){
            $discount_dollar=0;
            $discount_percent=$this->input->post('discount');
            if($discount_percent>100){
                return false;
            }
        }
        else if($type=="invoice"){
            $discount_invoice=0;
            $discount_invoice=$this->input->post('discount');
            if($discount_percent>100){
                return false;
            }
        }
        else if($type=="dollar"){
            $discount_dollar=$this->input->post('discount');
            $discount_percent=0;
            $amount_total=$this->Base_model->get_value_sql("SELECT sale_detail_unit_price*sale_detail_qty as price FROM `sale_detail` WHERE sale_detail_id=".$data[0]['detal_id'],"price");
            echo $amount_total;
            if($discount_dollar>$amount_total){
                return false;
            }
        }
        if($type=="invoice"){
            $temp="update sale_detail set sale_detail_dis_us=".$discount_dollar.",sale_detail_dis_percent=".$discount_percent." where sale_master_id=".$master_id;
            $this->Base_model->run_query($temp);
            $this->Base_model->run_query("update sale_master set sale_master_discount_percent=".$discount_invoice." where sale_master_id=".$master_id);
        }else{
            foreach($data as $d){
                $this->Base_model->run_query("update sale_detail set sale_detail_dis_us=".$discount_dollar.",sale_detail_dis_percent=".$discount_percent." where sale_detail_id=".$d['detal_id']);
            }
            $this->Base_model->run_query("update sale_master set sale_master_discount_percent=".$discount_invoice." where sale_master_id=".$master_id);
        }

    }

    public function check_permission(){
        $permission_name=$this->input->post('permission_name');
        $position=$this->Base_model->position_id();
        $result=$this->Base_model->get_value_byQuery("select pe.permission_enable as permission from page p inner join permission pe on pe.permission_page_id=p.page_id where p.page_name='".$permission_name."' and pe.position_id=".$position,"permission");
        echo $result;

    }

    public function get_printed(){
        $id=$this->input->post('id');
        $result=$this->Base_model->get_value_byQuery("select sale_detail_printed as printed from sale_detail where sale_detail_id=$id","printed");
        echo $result;

    }
    public function get_de_qty(){
        $id=$this->input->post('id');
        $result=$this->Base_model->get_value_byQuery("select sale_detail_qty as qty from sale_detail where sale_detail_id=$id","qty");
        echo $result;
    }
    public function get_printed_bill(){
        $master_id=$this->input->post('master_id');
        $result=$this->Base_model->get_value_byQuery("select sale_master_print as printed from sale_master where sale_master_id=$master_id","printed");
        echo $result;

    }
   
    public function check_stock(){
        $id=$this->input->post('item_id');
        $qty=$this->input->post('qty');
        $stock_location_id = $this->Base_model->get_value("employee","employee_stock_location_id","employee_id",$this->Base_model->sale_offline("cashier"));
        $branch_id=$this->Base_model->branch_id();


       
        $stock_qty=$this->Base_model->get_value_byQuery("select ifnull(sum(stock_qty),0) as qty from stock where stock_item_id=$id and branch_id=$branch_id and stock_location_id=$stock_location_id","qty");
        
        $order_padding_qty=$this->Base_model->get_value_byQuery("select ifnull(sum(sd.sale_detail_qty),0) qty from sale_detail sd 
        inner join sale_master sm on sm.sale_master_id=sd.sale_master_id
        inner join employee em on em.employee_id=sm.sale_master_cashier_id where `sm`.sale_master_status in (1) AND `sd`.sale_detail_status in (1) and sm.sale_master_branch_id=$branch_id and em.employee_stock_location_id=$stock_location_id and sd.sale_detail_item_id=$id","qty");
        $rep=array();
        if($stock_qty-$order_padding_qty-$qty<0){
            $rep["sale"]=$qty;
            $rep["padding"]=$order_padding_qty;
            $rep["qty_in_stock"]=$stock_qty;
            $rep["status"]='E0001';
            //$rep["test"]=$test;
        }else{
            $rep["sale"]=$qty;
            $rep["padding"]=$order_padding_qty;
            $rep["qty_in_stock"]=$stock_qty;
            $rep["status"]='S0001';
            //$rep["test"]=$test;
        }
        echo json_encode($rep);

    }
}



