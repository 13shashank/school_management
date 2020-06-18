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
if(!function_exists('redirect_admin')){
    function redirect_admin($str=""){
        redirect('admin/'.$str);
	}
}
if(!function_exists('admin_url')){
    function admin_url($str=""){
        return site_url('admin/'.$str);
	}
}
if(!function_exists('isAdminLogin')){
    function isAdminLogin(){
        $ci =& get_instance();
        if(!empty($ci->session->userdata('admin_id')) && !empty($ci->session->userdata('__admintoken')) && $ci->session->userdata('__admintoken')=="$2y$10dqB6vI0coniNPLuz"){
            return true;
        }else{
            redirect_admin('login');
        }
	}
}
