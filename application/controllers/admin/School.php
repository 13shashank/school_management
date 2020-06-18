<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class School extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
      //  $this->load->model('admin/landlord_model','common_model');
        isAdminLogin();
    }
  
    public function index(){
      $data=[];
      $data['script']="school/script"; 
     
      $data['content']="school/index";
      $this->load->view('admin_template',$data);
    }



    public function list(){
      $this->load->model('admin/school_model');
      if($this->input->server('REQUEST_METHOD')=='POST'){
         $offset = $this->input->post('start');
         $keyword = $this->input->post('search')['value'];
         $order = $this->input->post('order');
         $orderkey="";
         $ordervalue="";
         if($order[0]['column']=='1'){
             $orderkey='school_name';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='2'){
             $orderkey='school_email';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='3'){
             $orderkey='school_phone';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='4'){
             $orderkey='school_rc_number';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='5'){
          $orderkey='school_dise_code';
          $ordervalue=$order[0]['dir'];
      }

         $data['draw']=$this->input->post('draw');
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
      
       $data['count']=$this->school_model->CountSchoolList($keyword);
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->school_model->SchoolList(10,$offset,$keyword,$orderkey,$ordervalue);
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
             
         response($data);
     }


    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
          
           
         
        $this->form_validation->set_rules('school_name', 'School Name', 'required');
        $this->form_validation->set_rules('school_address', 'Address', 'required');
        $this->form_validation->set_rules('school_rc_number', 'Registration number', 'required');
        $this->form_validation->set_rules('school_dise_code', 'Dise code', 'required');
        if($user_id ==null){
            $this->form_validation->set_rules('school_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('school_phone', 'Phone', 'required|numeric|min_length[10])');
            $this->form_validation->set_rules('school_password', 'password', 'required');
        }
 

        if($this->form_validation->run() !== FALSE){
            $saverow['school_name'] = $this->input->post('school_name');
          
            $saverow['school_address'] = $this->input->post('school_address');
            $saverow['school_password'] = md5($this->input->post('school_password'));
            $saverow['school_rc_number'] = $this->input->post('school_rc_number');
            $saverow['school_dise_code'] = $this->input->post('school_dise_code');
            if(!empty($this->input->post('school_email'))){
                $saverow['school_email'] = $this->input->post('school_email');
            }
            if(!empty($this->input->post('school_email'))){
                $saverow['school_phone'] = $this->input->post('school_phone');
            }
          
        
        if($user_id == null){
            $save = $this->common_model->InsertData('schools',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('admin/school');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('schools',$saverow,array('id'=>$user_id));
           
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('admin/school');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('schools',array('id'=>$user_id));
       }
    
      $data['content']="school/edit";
      $this->load->view('admin_template',$data);
    }
}