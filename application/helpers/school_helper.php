<?php
if(!function_exists('response')){
    function response($response){
        $ci =& get_instance();
        return $ci->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));
    }
}

if ( ! function_exists('get_success_alert_tpl')){
    function get_alert_tpl($str,$tpl_type='success')
    {
        return '<div class="alert alert-'.$tpl_type.' alert-dismissible fade show" role="alert">
        '.$str.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
       
    }
 }





if(!function_exists('redirect_school')){
    function redirect_school($str=""){
        redirect('school/'.$str);
	}
}
if(!function_exists('school_url')){
    function school_url($str=""){
        return site_url('school/'.$str);
	}
}
if(!function_exists('isschoolLogin')){
    function isschoolLogin(){
        $ci =& get_instance();
        
        if(!empty($ci->session->userdata('school_id')) && !empty($ci->session->userdata('__schooltoken')) && $ci->session->userdata('__schooltoken')=="$2y$49#^&#^*#^&"){
            
            return true;
        }else{
            redirect_school('login');
        }
	}
}


if ( ! function_exists('pagination_config')){
	function pagination_config($per_page=10){
		$config=[];
		$config['per_page'] = $per_page;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		return $config;
	}
 }