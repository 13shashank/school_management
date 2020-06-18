<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reading_rate extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','landlord']);
        $this->load->library(['form_validation','session']);
      //  $this->load->model('admin/landlord_model','common_model');
      isLandlordLogin();
    }
  


    public function edit($user_id = null){
      $this->load->model('common_model');

      $data = [];
     
          $data['row'] = $this->common_model->GetRow('rate_per_reading');
         $user_id =  $data['row'];
         

      if($this->input->server('REQUEST_METHOD')=='POST'){
          
     
         
        $this->form_validation->set_rules('rate', 'Rate', 'required');
  
      
 

        if($this->form_validation->run() !== FALSE){
            $saverow['rate'] = $this->input->post('rate');
           
            
            }
        
        if($user_id == null){
            $save = $this->common_model->InsertData('rate_per_reading',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('landlord/reading_rate/edit');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('rate_per_reading',$saverow,array('id'=>$user_id->id));
         
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('landlord/reading_rate/edit');
             
            }
        }
           
        }

        $data['content']="reading_rate/edit";
        $this->load->view('landlord_template',$data);
    }
      
  
    
     
    }
