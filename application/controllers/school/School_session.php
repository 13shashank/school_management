<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class School_session extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','school']);
        $this->load->library(['form_validation','session']);
      //  $this->load->model('admin/school_model','common_model');
      isschoolLogin();
    }
  
    public function index(){
        $this->list();
    
    }



    public function list(){
        $this->load->model('school/school_session_model');
  

        $page = 0;
        if (!empty($this->input->get('page'))) {
            $page = $this->input->get('page');
        }
        $querystring = "";
        /* Row per page*/
        $this->data['per_page'] = 10;
        if ($this->input->get('per_page') != "") {
             $this->data['per_page'] = $this->input->get('per_page');
        }
        $querystring .= "per_page=" . $this->data['per_page'];
        $likeSearch = [];
        $order_by = ['key' => 'session_id', 'value' => 'DESC'];
        $this->data['sort'] = 'session_id' ; 
        $this->data['order_by'] = 'DESC';
        if ($this->input->get('sort') != "") {
            $this->data['sort'] = $this->input->get('sort');
            $order_by['key']= $this->input->get('sort');
            
        }
        if ($this->input->get('order_by') != "") {
            $this->data['order_by'] = $order_by['value']=$this->input->get('order_by');
        }
        if ($this->input->get('keyword')) {
            $keyword = trim($this->input->get('keyword'));
            $this->data['keyword'] =  $keyword;
            $querystring .= "&keyword=" .  $keyword;
            $likeSearch['session'] = $keyword;
           
            
        }
        $where = [];
        
        $this->data['stu_status']=  '';
        if ($this->input->get('stu_status') != "") {
            $where['stu_status'] = $this->data['stu_status'] = $this->input->get('stu_status');
            $querystring .= "&stu_status=" . $this->data['stu_status'];
        }
        
        $this->data['querystring']=$querystring;
        if ($page > 1) {
            $page = ($page - 1) * $this->data['per_page'];
        }

        $data['record_count']=$this->school_session_model->CountSessionList($where, $likeSearch);
      
        $data['records']=$this->school_session_model->SessionList($page, $this->data['per_page'], $where, $likeSearch, $order_by);

            $count =  $data['record_count'];

        $config = pagination_config($this->data['per_page']);
        
        $config['base_url'] = site_url('school/session/list?' . $querystring.'&sort='. $this->data['sort'].'&order_by='.$this->data['order_by']);
        $config['total_rows'] = $count;
        // Initialize
        $this->pagination->initialize($config);
     
        $data['pagination'] = $this->pagination->create_links();

        $data['content']="school_session/index";
      $this->load->view('school_template',$data);

    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
     
         
       // $this->form_validation->set_rules('student_name	', 'Student Name', 'required');
        $this->form_validation->set_rules('session', 'session' , 'required');
    
        if($this->form_validation->run() !== FALSE){
          
            $saverow['session'] = $this->input->post('session');

        if($user_id == null){
            $save = $this->common_model->InsertData('session',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('school/school_session');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('session',$saverow,array('session_id'=>$user_id));
         
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('school/school_session');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('session',array('session_id'=>$user_id));
       }
   

      $data['content']="school_session/edit";
      $this->load->view('school_template',$data);
    }
}