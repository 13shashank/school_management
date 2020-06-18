<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fees extends CI_Controller {
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
        $this->load->model('school/fees_model');
  

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
        $order_by = ['key' => 'fees_created_at', 'value' => 'DESC'];
        $this->data['sort'] = 'fees_created_at' ; 
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
          //  $likeSearch['student_name'] = $keyword;
           // $likeSearch['stu_class'] = $keyword;
           // $likeSearch['stu_scholar_number'] = $keyword;
            
        }
        $where = [];
        
        // $this->data['stu_status']=  '';
        // if ($this->input->get('stu_status') != "") {
        //     $where['stu_status'] = $this->data['stu_status'] = $this->input->get('stu_status');
        //     $querystring .= "&stu_status=" . $this->data['stu_status'];
        // }
        
        $this->data['querystring']=$querystring;
        if ($page > 1) {
            $page = ($page - 1) * $this->data['per_page'];
        }

        $data['record_count']=$this->fees_model->CountFeesList($where, $likeSearch);
      
        $data['records']=$this->fees_model->FeesList($page, $this->data['per_page'], $where, $likeSearch, $order_by);

            $count =  $data['record_count'];

        $config = pagination_config($this->data['per_page']);
        
        $config['base_url'] = site_url('school/Fees/list?' . $querystring.'&sort='. $this->data['sort'].'&order_by='.$this->data['order_by']);
        $config['total_rows'] = $count;
        // Initialize
        $this->pagination->initialize($config);
     
        $data['pagination'] = $this->pagination->create_links();

        $data['content']="Fees/fees/index";
      $this->load->view('school_template',$data);

    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
   
        $this->form_validation->set_rules('fees_session_id', 'Session ', 'required');
         $this->form_validation->set_rules('fees_class_id', 'Class', 'required');
        
        if($this->form_validation->run() !== FALSE){
            $saverow['fees_session_id'] = $this->input->post('fees_session_id');
            $saverow['fees_class_id'] = $this->input->post('fees_class_id');
            $title = $this->input->post('fees_type_title');
            $amount= $this->input->post('fees_type_amount');
            $sum = array_sum($amount);
            $combine = array_combine($title, $amount);
            $fee_type =serialize($combine);
            $saverow['fees_type'] =$fee_type;
            $saverow['fees_total_amount'] =$sum;

       
        if($user_id == null){
            $save = $this->common_model->InsertData('fees',$saverow);
           
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('school/fees');
            
           }
        }
        else{
          
           
            $update = $this->common_model->UpdateData('fees',$saverow,array('fees_id'=>$user_id));
        
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('school/fees');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('fees',array('fees_id'=>$user_id));
     
        $data['fees_type'] = unserialize($data['row']->fees_type);
       
       // $data['session'] = $this->common_model->GetRow('session',array('student_id'=>$user_id));
       }
    $data['class'] = $this->common_model->GetResult('class');
    $data['session'] = $this->common_model->GetResult('session');
      $data['content']="fees/fees/edit";
      $this->load->view('school_template',$data);
    }




    public function fees_transaction(){
        $this->load->model('common_model');
       

            $this->load->model('school/fees_model');
        
           
          

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
            $order_by = ['key' => 'tran_created_at', 'value' => 'DESC'];
            $this->data['sort'] = 'tran_created_at' ; 
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
              //  $likeSearch['student_name'] = $keyword;
               // $likeSearch['stu_class'] = $keyword;
               // $likeSearch['stu_scholar_number'] = $keyword;
                
            }
            $where = [];
            

            if($this->input->server('REQUEST_METHOD')=='POST'){

                $scholar_number =   $this->input->post('tran_scholar_number');
                $class =   $this->input->post('tran_class_id');
                $where['tran_scholar_number'] = $this->data['tran_scholar_number'] = $scholar_number;
                $where['tran_class_id'] = $this->data['tran_class_id'] =  $class;
                   //  $querystring .= "&tran_scholar_number=" . $this->data['tran_scholar_number'];
                    // $querystring .= "&tran_class_id=" . $this->data['tran_class_id'];

                     $data['record_count']=$this->fees_model->CountFeesTransaction($where, $likeSearch);
                     if(!$data['record_count']){
                        
                     }
              }
            // $this->data['stu_status']=  '';
            // if ($this->input->get('stu_status') != "") {
            //     $where['stu_status'] = $this->data['stu_status'] = $this->input->get('stu_status');
            //     $querystring .= "&stu_status=" . $this->data['stu_status'];
            // }
            
            $this->data['querystring']=$querystring;
            if ($page > 1) {
                $page = ($page - 1) * $this->data['per_page'];
            }
    
            $data['record_count']=$this->fees_model->CountFeesTransaction($where, $likeSearch);
        
           $data['records']=$this->fees_model->FeesTransactionList($page, $this->data['per_page'], $where, $likeSearch, $order_by);
        //   print_r( $data['records']); die;
                $count =  $data['record_count'];
    
            $config = pagination_config($this->data['per_page']);
            
            $config['base_url'] = site_url('school/Fees/fees_transaction?' . $querystring.'&sort='. $this->data['sort'].'&order_by='.$this->data['order_by']);
            $config['total_rows'] = $count;
            // Initialize
            $this->pagination->initialize($config);
         
            $data['pagination'] = $this->pagination->create_links();


            
        
       
        $data['class'] = $this->common_model->GetResult('class');
        $data['session'] = $this->common_model->GetResult('session');
        $data['content']="Fees/fees_transaction/index";
      $this->load->view('school_template',$data);

    }

}