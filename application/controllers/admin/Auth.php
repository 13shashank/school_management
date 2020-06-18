<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
   public function __construct() {
        parent::__construct();
      $this->load->helper(['form','url','admin']);
       $this->load->library(['form_validation','session']);
        $this->load->model('common_model');
      //  if(isAdminLogin()){
      //      redirect_admin('dashboard');
      //  }
       // isAdminLogin();
    }
  
    public function index(){
        
        if($this->input->server('REQUEST_METHOD')=="POST"){
       
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == TRUE){
                $data = $this->common_model->GetRow('admin',['email'=>$this->input->post('email')]);
                if($data){
                   
                    if(md5($this->input->post('password')) == $data->password){
                        $setsession=[];
                        $setsession['admin_id']=$data->id;
                        $setsession['email']=$data->email;
                        $setsession['__admintoken']="$2y$10dqB6vI0coniNPLuz";
                        $this->session->set_userdata($setsession);
                        redirect_admin('dashboard');
                    }else{
                       
                        $this->session->set_flashdata('password_error','Invalid Password');
                    }
                }else{
                 
                    $this->session->set_flashdata('email_error','Invalid Email Address');
                }
            }
        }


        $this->load->view('admin/login/index');
    }


    public function logout(){
        
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('__admintoken');
        $this->session->unset_userdata('email');
        redirect_admin();
    }
}