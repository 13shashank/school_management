<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
   public function __construct() {
        parent::__construct();
       $this->load->helper(['form','url','landlord']);
        $this->load->library(['form_validation','session']);
       $this->load->model('common_model');
       isLandlordLogin();
    }
  
    public function index(){

        
      $data['content']="dashboard/index";
      $this->load->view('landlord_template',$data);
    }
}