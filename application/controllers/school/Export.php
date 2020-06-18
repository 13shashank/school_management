<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Export extends CI_Controller {
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
        $this->load->model('common_model');
       
      $data['session'] = $this->common_model->GetResult('session');
        $data['content']="export/index";
        $this->load->view('school_template',$data);
        

    }


    public function print(){
      $this->load->model('common_model');
      $row=[];
      if($this->input->server('REQUEST_METHOD')=='POST')
      {
        $this->load->model('school/export_model'); 
        if($this->input->post('caste_description'))
        {
         
         $session = $this->input->post('session');

         //$data = $this->export_model->CasteDescription($session);
         // echo "<pre>";
        // print_r($data); die;
         $countclass = $this->export_model->CasteDescriptionCountClass($session);
         

                        foreach($countclass as $key=> $value){
                        //echo "<pre>";
                                // print_r($value['class']); 
                          $row['class'][$value['class']][$value['stu_gender'].''.$value['stu_caste']] = $value['countcaste'] ;
                          $row['class'][$value['class']]['class'] = $value['class'] ;

                        }
                        $session = $this->common_model->GetRow('session',array('session_id'=>$session));
                        
              $data['session'] = $session->session;
           $data['row'] = $row;
          
          $this->load->view('school/export/print_caste_des',$data);
       
         } //caste description

         if($this->input->post('agewise_caste_description')){
          $session = $this->input->post('session');

          $agewise_caste = $this->export_model->CasteCountAgeWise($session);


          foreach($agewise_caste as $key=> $value){
            //echo "<pre>";
                    // print_r($value['class']); 
              $row[$value['sd_stu_age']][$value['class']][$value['stu_gender'].''.$value['stu_caste']] = $value['countcaste'] ;
              $row[$value['sd_stu_age']][$value['class']]['age']= $value['sd_stu_age'] ;
              $row[$value['sd_stu_age']][$value['class']]['class']= $value['class'] ;
              //$row[$value['sd_stu_age']]['class'] = $value['class'] ;

            }



///echo "<pre>";
//print_r($row); die;




          $session = $this->common_model->GetRow('session',array('session_id'=>$session));
          $data['session'] = $session->session;
          $data['row'] = $row;
         
         $this->load->view('school/export/print_agewise_caste',$data);

         } //agewise_caste_description
         

      }

      
     
   }
}