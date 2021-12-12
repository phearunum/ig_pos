<?php
class Permission extends CI_Controller{
    
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Base_model");
        $this->Base_model->check_loged_in();
    }
    
   public function index(){
        
        $data['title']  = "SETUP PERMISSION";
        $data['header'] = "template/header";
        $data['menu']   = "template/menu";
        $data['footer'] = "template/footer";
        $data['page']   = "permission/frm_searchpermission";
        
        $data['record_position'] =$this->Base_model->loadToListJoin("select position_id,position_name from position where status=1");
        //translate
        $lang = $this->input->cookie('language');
        $this->lang->load('button',$lang=='' ? 'en':$lang);    
        $this->lang->load('permission',$lang=='' ? 'en':$lang);

        $data['lbl_menu_tree']   =$this->lang->line('menu_tree');
        $data['lbl_position']    =$this->lang->line('position');
        //end translate
        $this->load->view("welcome/view",$data);
    }
    
    public function getmenu(){
        $data['menu']=$this->Base_model->loadToListJoint('select id,name_en from tblpage group by id_parent');        
        
        $this->load->view('permission/getmenu',$data);
    }
    
    public function save(){
        
        $count=0;
        $ch=array();
        
        $userid=$this->input->post('cboGroup');
                    
                $ch[]=array();
                
                for($i=1;$i<=5;$i++){
                    
                    $ch[$i]=$this->input->post('chpage'.$i);
                    
                    $count=$count+1;
                    
                    if($ch[$i]==""){
                       $ch[$i]=0;
                    }
                    
                    $data=array(
                        'permission_enable'=>$ch[$i]
                    ); 
                    
                    //$this->Base_model->update('permission','id_group',$userid,$data);
                    //$this->Base_model->update('permission','id_page',$ch[$i],$data);
                    
                    $this->db->where('id_page',$i);
                    $this->db->where('id_group',$userid);
                    $this->db->update('permission', $data);
                    
//                  print_r($i.'<br/>');
//                  print_r($userid.'<br/>');
//                  print_r($ch[$i].'<br/>');
                    
        }           
        redirect('permission');
    }                   
    
    public function getgroup(){
        $data['id']=$this->uri->segment(3);
        
        $data['records']=$this->Base_model->loadToListJoin("select 
                                                                    tpa.name_en,
                                                                    tpe.`enable`,
                                                                    tpa.id_parent
                                                            from permission tpe inner join 
                                                                             tblpage tpa on tpe.id_page=tpa.id_parent where tpe.id_group=".$this->uri->segment(3)." group by tpe.id_page");
        
        $this->load->view('permission/getgroup',$data);
        
    }
    
    public function getsubmenu(){
        $data['id']=$this->uri->segment(3);
        $data['position_id']=$this->uri->segment(4);
        
        $data['records']=$this->Base_model->loadToListJoin("select * from permission where position_id=".$this->uri->segment(3)." group by permission_page_id_parent");
        $data['record_permission']= $this->Base_model->get_permission($this->uri->segment(1));
        
        $data['lang'] = $this->input->cookie('language');
        $lang=$this->input->cookie('language');
        $this->lang->load('lable',$lang==''? 'en':$lang);
        $this->lang->load('button',$lang==''?'en':$lang);
             
        $data['lbl_add']         =$this->lang->line('lb_add');
        $data['lbl_edit']        =$this->lang->line('lb_edit');
        $data['lbl_delete']      =$this->lang->line('lb_delete');
        $data['lbl_read']        =$this->lang->line('lb_read');
        $data['btn_update']      =$this->lang->line('btn_update');
        
        $this->load->view('permission/getsubmenu',$data);
        
    }
    
    public function save_menu(){
                    $idgroup=$this->input->post("txtidgroup");
                    
                    $count_data = $this->Base_model->get_data_by("SELECT count(permission_id) as countitem FROM permission where permission_active=1 and position_id=".$idgroup);
                    $count=0;
                    
                    $ch[]       =array();
                    $check[]    =array();
                    $add[]      =array();
                    $delete[]   =array();
                    $edit[]     =array();
                    $view[]     =array();
                    $follow_by  =$this->session->userdata("group_id");
                    
                    foreach($count_data as $c){
                        $count=$c->countitem;
                    }
                    
                    $id = $this->Base_model->get_data_by("SELECT permission_id FROM permission where position_id=".$idgroup." and permission_active=1");
                    
                    foreach($id as $i){
                        $ch[]=$i->permission_id;
                    }
                    
                    for($i=1;$i<=$count;$i++){
                       
                       $check[$i]   =$this->input->post("chpage".$ch[$i]);
                       $add[$i]     =$this->input->post("chadd".$ch[$i]);
                       $edit[$i]    =$this->input->post("chedit".$ch[$i]);
                       $delete[$i]  =$this->input->post("chdelete".$ch[$i]);
                       $view[$i]    =$this->input->post("chview".$ch[$i]);
                       
                       if($check[$i]!=0){
                            if($add[$i]!=0 && $edit[$i]!=0 && $delete[$i]!=0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>1,
                               'permission_edit'   =>1,
                               'permission_delete' =>1,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                $this->db->where('permission_id',$check[$i]);
                                $this->db->update('permissions', $data1);
                            }else if($add[$i]!=0 && $edit[$i]!=0  && $delete[$i]!=0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>1,
                               'permission_edit'   =>1,
                               'permission_delete' =>1,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]!=0 && $edit[$i]!=0 && $delete[$i]==0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable'=>1,
                               'permission_add'   =>1,
                               'permission_edit'  =>1,
                               'permission_delete'=>0,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]!=0 && $edit[$i]==0 && $delete[$i]!=0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>1,
                               'permission_edit'   =>0,
                               'permission_delete' =>1,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]==0 && $edit[$i]!=0 && $delete[$i]!=0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>1,
                               'permission_delete' =>1,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }
                            else if($add[$i]==0 && $edit[$i]==0 && $delete[$i]==0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>0,
                               'permission_delete' =>0,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]==0 && $edit[$i]==0 && $delete[$i]!=0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>0,
                               'permission_delete' =>1,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]==0 && $edit[$i]!=0 && $delete[$i]==0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>1,
                               'permission_delete' =>0,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]!=0 && $edit[$i]==0 && $delete[$i]==0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>1,
                               'permission_edit'   =>0,
                               'permission_delete' =>0,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]==0 && $edit[$i]==0 && $delete[$i]==0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>0,
                               'permission_delete' =>0,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]==0 && $edit[$i]==0 && $delete[$i]!=0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>0,
                               'permission_delete' =>1,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]==0 && $edit[$i]!=0 && $delete[$i]==0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>1,
                               'permission_delete' =>0,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]!=0 && $edit[$i]==0 && $delete[$i]==0 && $view[$i]!=0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>1,
                               'permission_edit'   =>0,
                               'permission_delete' =>0,
                               'permission_viewall'=>1,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]!=0 && $edit[$i]==0 && $delete[$i]!=0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>1,
                               'permission_edit'   =>0,
                               'permission_delete' =>1,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]!=0 && $edit[$i]!=0 && $delete[$i]==0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>1,
                               'permission_edit'   =>1,
                               'permission_delete' =>0,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }else if($add[$i]==0 && $edit[$i]!=0 && $delete[$i]!=0 && $view[$i]==0){
                                $data1=array(
                               'permission_enable' =>1,
                               'permission_add'    =>0,
                               'permission_edit'   =>1,
                               'permission_delete' =>1,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                               );
                                 $this->db->where('permission_id',$check[$i]);
                                 $this->db->update('permissions', $data1);
                            }
                       }else{
                           $data2=array(
                               'permission_enable' =>0,
                               'permission_add'    =>0,
                               'permission_edit'   =>0,
                               'permission_delete' =>0,
                               'permission_viewall'=>0,
                               'permission_follow_by' =>$follow_by
                           );
                                $this->db->where('permission_id',$ch[$i]);
                                $this->db->update('permissions', $data2);
                       } 
                    }
                    redirect('permission');
                }
                 
}
