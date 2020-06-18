<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tenant extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','landlord']);
        $this->load->library(['form_validation','session']);
      //  $this->load->model('admin/landlord_model','common_model');
      isLandlordLogin();
    }
  
    public function index(){
      $data=[];
      $data['script']="Tenant/script"; 
     
      $data['content']="Tenant/index";
      $this->load->view('landlord_template',$data);
    }



    public function list(){
        $this->load->model('landlord/tenant_model');
      if($this->input->server('REQUEST_METHOD')=='POST'){
         $offset = $this->input->post('start');
         $keyword = $this->input->post('search')['value'];
         $order = $this->input->post('order');
         $orderkey="";
         $ordervalue="";
         if($order[0]['column']=='1'){
             $orderkey='t_first_name';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='2'){
             $orderkey='t_last_name';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='3'){
             $orderkey='t_email';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='4'){
             $orderkey='t_phone';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='5'){
          $orderkey='t_address';
          $ordervalue=$order[0]['dir'];
      }

         $data['draw']=$this->input->post('draw');
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
      
       $data['count']=$this->tenant_model->CountTenantList($keyword);
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->tenant_model->TenantList(10,$offset,$keyword,$orderkey,$ordervalue);
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
             
         response($data);
     }


    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
          
     
         
        $this->form_validation->set_rules('t_first_name', 'First Name', 'required');
        $this->form_validation->set_rules('t_last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('t_address', 'Address', 'required');
        $this->form_validation->set_rules('t_rent', 'Rent', 'required');
        if($user_id ==null){
            $this->form_validation->set_rules('t_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('t_phone', 'Phone', 'required|numeric|min_length[10])');
            $this->form_validation->set_rules('t_start_date', 'Start date', 'required');
        }
 

        if($this->form_validation->run() !== FALSE){
            $saverow['t_first_name'] = $this->input->post('t_first_name');
            $saverow['t_last_name'] = $this->input->post('t_last_name');
            $saverow['t_address'] = $this->input->post('t_address');
            $saverow['t_start_date'] = $this->input->post('t_start_date');
            $saverow['t_rent'] = $this->input->post('t_rent');
            if(!empty($this->input->post('t_email'))){
                $saverow['t_email'] = $this->input->post('t_email');
            }
            if(!empty($this->input->post('t_phone'))){
                $saverow['t_phone'] = $this->input->post('t_phone');
            }
           
            if(!empty($_FILES['t_image']['name'])){
      $extension=pathinfo($_FILES['t_image']['name'], PATHINFO_EXTENSION);	
      $_FILES['t_image']['name']=date('yhissihsymd').".".$extension;
      $config['upload_path']          = 'uploads/tenant/';
      $config['allowed_types']        = 'png|jpeg|jpg';
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('image'))
      {
        $image = $this->upload->data();
        $saverow['t_image']=$image['file_name'];
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);die;
                }
              
    }
    else{
                if($user_id == null){
      $saverow['t_image'] = 'default.png';
    }
            }
        
        if($user_id == null){
            $save = $this->common_model->InsertData('tenant',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('landlord/tenant');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('tenant',$saverow,array('t_id'=>$user_id));
         
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('landlord/tenant');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('tenant',array('t_id'=>$user_id));
       }
    
      $data['content']="tenant/edit";
      $this->load->view('landlord_template',$data);
    }
}