<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
   public function __construct() {
        parent::__construct();
      $this->load->helper(['form','url','school']);
       $this->load->library(['form_validation','session']);
        $this->load->model('common_model');
      //  if(isschoolLogin()){
      //      redirect_admin('dashboard');
      //  }
       // isschoolLogin();
    }
  
    public function index(){
        
        if($this->input->server('REQUEST_METHOD')=="POST"){
       
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == TRUE){
                $data = $this->common_model->GetRow('schools',['school_email'=>$this->input->post('email')]);
                if($data){
                //  print_r($data->password); 
                //  echo "<br>";
                //  print_r(md5($this->input->post('password'))); die;
                    if(md5($this->input->post('password')) == $data->school_password){
                      
                        $setsession=[];
                        $setsession['school_id']=$data->id;
                        $setsession['email']=$data->email;
                        $setsession['__schooltoken']="$2y$49#^&#^*#^&";
                        $this->session->set_userdata($setsession);
                      
                        redirect_school('dashboard');
                    }else{
                       
                        $this->session->set_flashdata('password_error','Invalid Password');
                    }
                }else{
                 
                    $this->session->set_flashdata('email_error','Invalid Email Address');
                }
            }
        }


        $this->load->view('school/login/index');
    }


    public function logout(){
        
        $this->session->unset_userdata('school_id');
        $this->session->unset_userdata('__schooltoken');
        $this->session->unset_userdata('email');
        redirect_school();
    }
}