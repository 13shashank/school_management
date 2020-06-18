<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {
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
        $this->load->model('school/student_model');
  

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
        $order_by = ['key' => 'stu_created_at', 'value' => 'DESC'];
        $this->data['sort'] = 'stu_created_at' ; 
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
            $likeSearch['student_name'] = $keyword;
            $likeSearch['stu_class'] = $keyword;
            $likeSearch['stu_scholar_number'] = $keyword;
            
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

        $data['record_count']=$this->student_model->CountStudentList($where, $likeSearch);
      
        $data['records']=$this->student_model->StudentList($page, $this->data['per_page'], $where, $likeSearch, $order_by);

            $count =  $data['record_count'];

        $config = pagination_config($this->data['per_page']);
        
        $config['base_url'] = site_url('school/Student/list?' . $querystring.'&sort='. $this->data['sort'].'&order_by='.$this->data['order_by']);
        $config['total_rows'] = $count;
        // Initialize
        $this->pagination->initialize($config);
     
        $data['pagination'] = $this->pagination->create_links();

        $data['content']="Student/index";
      $this->load->view('school_template',$data);

    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
     
         
       // $this->form_validation->set_rules('student_name	', 'Student Name', 'required');
        $this->form_validation->set_rules('stu_father_name', 'Father Name', 'required');
    //     $this->form_validation->set_rules('stu_mother_name', 'Mother name', 'required');
    //     $this->form_validation->set_rules('stu_gender', 'Gender', 'required');
    //     $this->form_validation->set_rules('stu_caste', 'Caste', 'required');
    //     $this->form_validation->set_rules('stu_dob', 'Date of birth', 'required');
    //     $this->form_validation->set_rules('stu_address', 'Address', 'required');
    //     $this->form_validation->set_rules('stu_phone', 'Phone', 'required');
    //     $this->form_validation->set_rules('stu_aadhar', 'Aadhar', 'required');
    //     $this->form_validation->set_rules('stu_scholar_number', 'Scholar number', 'required');
    //     $this->form_validation->set_rules('stu_class', 'Class', 'required');
    //     $this->form_validation->set_rules('stu_sssmid', 'SSSM ID', 'required');
    //     $this->form_validation->set_rules('stu_has_bpl_card', 'Has BPL Card', 'required');
      
    //    // $this->form_validation->set_rules('stu_has_labour_card	', 'Has Labour Card', 'required');
      
    //     $this->form_validation->set_rules('stu_is_disabled', 'Is Disabled', 'required');
       
    //     $this->form_validation->set_rules('stu_bank_name', 'Bank Name', 'required');
    //     $this->form_validation->set_rules('stu_account_number', 'Account number', 'required');
    //     $this->form_validation->set_rules('stu_ifsc_code', 'IFSC Code', 'required');
    //     $this->form_validation->set_rules('stu_admission_date', 'Admission date', 'required');
     

    //     if($this->input->post('stu_has_bpl_card') == 'yes'){
    //         $this->form_validation->set_rules('stu_bpl__card_number', 'BPL Card Number', 'required');
    //     }
    //     if($this->input->post('stu_has_labour_card') == 'yes'){
    //         $this->form_validation->set_rules('stu_labour_card_number', 'Labour Card number', 'required');
    //     }
    //     if($this->input->post('stu_is_disabled') == 'yes'){
    //         $this->form_validation->set_rules('stu_type_disabled', 'Disability type', 'required');
    //     }
 

        if($this->form_validation->run() !== FALSE){
            $saverow['stu_session_id'] = $this->input->post('session');
            $saverow['student_name'] = $this->input->post('student_name');
            $saverow['stu_father_name'] = $this->input->post('stu_father_name');
            $saverow['stu_mother_name'] = $this->input->post('stu_mother_name');
            $saverow['stu_gender'] = $this->input->post('stu_gender');
            $saverow['stu_caste'] = $this->input->post('stu_caste');
            $saverow['stu_dob'] = $this->input->post('stu_dob');
            $saverow['stu_address'] = $this->input->post('stu_address');
            $saverow['stu_phone'] = $this->input->post('stu_phone');
            $saverow['stu_aadhar'] = $this->input->post('stu_aadhar');
            $saverow['stu_scholar_number'] = $this->input->post('stu_scholar_number');
            $saverow['stu_class'] = $this->input->post('stu_class');
            $saverow['stu_sssmid'] = $this->input->post('stu_sssmid');
            $saverow['stu_has_bpl_card'] = $this->input->post('stu_has_bpl_card');
            $saverow['stu_bpl__card_number'] = $this->input->post('stu_bpl__card_number');
            $saverow['stu_has_labour_card'] = $this->input->post('stu_has_labour_card');
            $saverow['stu_labour_card_number'] = $this->input->post('stu_labour_card_number');
            $saverow['stu_is_disabled'] = $this->input->post('stu_is_disabled');
            $saverow['stu_type_disabled'] = $this->input->post('stu_type_disabled');
            $saverow['stu_bank_name'] = $this->input->post('stu_bank_name');
            $saverow['stu_account_number'] = $this->input->post('stu_account_number');
            $saverow['stu_ifsc_code'] = $this->input->post('stu_ifsc_code');
            $saverow['stu_admission_date'] = $this->input->post('stu_admission_date');
            $saverow['stu_age'] = $this->input->post('stu_age');

            
    //         if(!empty($_FILES['t_image']['name'])){
    //   $extension=pathinfo($_FILES['t_image']['name'], PATHINFO_EXTENSION);	
    //   $_FILES['t_image']['name']=date('yhissihsymd').".".$extension;
    //   $config['upload_path']          = 'uploads/student/';
    //   $config['allowed_types']        = 'png|jpeg|jpg';
    //   $this->load->library('upload',$config);
    //   $this->upload->initialize($config);
    //   if($this->upload->do_upload('image'))
    //   {
    //     $image = $this->upload->data();
    //     $saverow['t_image']=$image['file_name'];
    //             }
    //             else{
    //                 $error = array('error' => $this->upload->display_errors());
    //                 print_r($error);die;
    //             }
              
    // }
    // else{
    //             if($user_id == null){
    //   $saverow['t_image'] = 'default.png';
    // }
    //         }
       
        if($user_id == null){
            $save = $this->common_model->InsertData('student',$saverow);
            $save_s['sd_stu_session_id'] = $this->input->post('session');
            $save_s['sd_stu_class_id'] = $this->input->post('stu_class');
            $save_s['sd_stu_age'] = $this->input->post('stu_age');
            
            $save_s['sd_stu_student_id'] = $save;
            $save = $this->common_model->InsertData('session_detail',$save_s);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('school/student');
            
           }
        }
        else{
          
            $data = $this->common_model->GetRow('student',array('student_id'=>$user_id));
            
            //$update = $this->common_model->DeleteData('session_detail',$saverow,array('sd_stu_session_id'=>$data->stu_class, 'sd_stu_class_id'=>$data->stu_class,'sd_stu_student_id'=>$user_id));
            $update = $this->common_model->UpdateData('student',$saverow,array('student_id'=>$user_id));
         
            $save_s['sd_stu_session_id'] = $this->input->post('session');
            $save_s['sd_stu_class_id'] = $this->input->post('stu_class');
            $save_s['sd_stu_age'] = $this->input->post('stu_age');
            $save_s['sd_stu_student_id'] = $user_id;
            $save = $this->common_model->UpdateData('session_detail',$save_s,array('sd_stu_session_id'=>$data->stu_session_id, 'sd_stu_class_id'=>$data->stu_class,'sd_stu_student_id'=>$user_id));

            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('school/student');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('student',array('student_id'=>$user_id));
       // $data['session'] = $this->common_model->GetRow('session',array('student_id'=>$user_id));
       }
    $data['class'] = $this->common_model->GetResult('class');
    $data['session'] = $this->common_model->GetResult('session');
      $data['content']="student/edit";
      $this->load->view('school_template',$data);
    }


public function export(){
    $this->load->model('school/student_model');
   
   
  
       $filename = 'student_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
       // get data 
       $usersData = $this->student_model->GetForExport();
       
      
		// file creation 
		$file = fopen('php://output','w');
		$header = array("S.no","Scholar number","Class","Student name","Father name","Mother Name","Gender"); 
      
        fputcsv($file, $header);
        $cnt=1;
		foreach ($usersData as $key){ 
            
             $narray=array($cnt,$key["stu_scholar_number"],$key["class"],$key["student_name"],$key["stu_father_name"],$key["stu_mother_name"],$key["stu_gender"]);
            fputcsv($file,$narray); 
            $cnt++;
		}
		fclose($file); 
		exit; 

}

public function print(){
    $this->load->model('school/student_model');
    $usersData['row']= $this->student_model->GetForExport();

   
   
    $this->load->view('school/student/print',$usersData);

}


}