<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report_chart
 *
 * @author hpt-srieng
 */

class Report_chart_car_wash extends CI_Controller{
    
    //put your code here
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
    public function index(){
        
        $data['title'] = "SUPPLIER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/chart/rpt_chart_car_wash";
        
        $qty = $this->input->post('qty_show');
        $data['date'] =  'TODAY';
        $results = $this->Base_model->get_chart_data();
        $data['chart_data'] = $results['chart_data'];
        $data['data_chart'] =$this->Base_model->loadToListJoin("select sum(total_item_qty) as most_sale_qty,item_name,item_id,end_date FROM v_sale_item_qty_analysis where car_wash = 1 and end_date between DATE_FORMAT(CURDATE(),'%d-%m-%Y') and DATE_FORMAT(CURDATE(),'%d-%m-%Y') GROUP BY item_name ORDER BY most_sale_qty DESC limit 5 ");
        $data['qty'] =  $qty;
        $this->load->view('welcome/view', $data);
        
    }
    
    public function api_employee(){
        $data=$this->Base_model->loadToListJoin("select * from employee");
        $rows=array();
        foreach($data as $d){
            $rows[]=$d;
        }
        print json_encode($rows);
    }
    
    public function search(){
        $data['title'] = "SUPPLIER";
        $data['header'] = "template/header";
        $data['menu'] = "template/menu";
        $data['footer'] = "template/footer";
        $data['page'] = "report/chart/rpt_chart_car_wash";
        
        $date_from= $this->input->post("datefrom");
        $date_to=$this->input->post("dateto");        
        $qty = $this->input->post("qty_show");

        $data['date'] = $date_from.'->'.$date_to.' <br/> Show <i style ="color: red;">TOP '.$qty . "</i> Products " ;
     
        $query = "select sum(total_item_qty) as most_sale_qty,item_name,end_date FROM v_sale_item_qty_analysis where car_wash = 1 and end_date BETWEEN '".$date_from."' and '".$date_to."'  GROUP BY item_id ORDER BY most_sale_qty DESC  limit " .$qty;
        
        $data['data_chart']=$this->Base_model->loadToListJoin($query);
 
       $this->load->view('welcome/view', $data);
    }
}
