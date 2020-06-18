<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Export_model extends CI_Model {
    

    public function CountSessionList($where=[], $like=[]) {
        $this->db->select('*');
        if(!empty($where))
        {
            $this->db->where($where); 
        }
        if(!empty($like))
        {
            $i=true;
            foreach($like as $key=>$value)
            {
                if($i)
                    $this->db->like($key, $value, 'both'); 
                else
                    $this->db->or_like($key, $value, 'both'); 

            }            
        }
        $this->db->from('session');
       
       return $this->db->count_all_results();
       
    }
    

    public function CasteDescriptionCountClass($where){

        // $field = array('s.stu_class','c.class','c.class_id', 'COUNT(`s`.`stu_class`) as countclass');
        $field = array('stu_caste','s.stu_gender','c.class','COUNT(`s`.`stu_class`) as countclass', 'COUNT(`s`.`stu_caste`) as countcaste');
        $this->db->select($field);
        $this->db->from('session_detail');
        
        if(!empty($where))
        {
            $this->db->where('sd_stu_session_id', $where); 
        }
        
        $this->db->group_by('stu_class'); 
        $this->db->group_by('stu_caste'); 
        $this->db->group_by('stu_gender'); 
        $this->db->order_by('stu_class','ASC');
        $this->db->join('class AS c','c.class_id = session_detail.sd_stu_class_id');
        $this->db->join('student AS s','s.student_id = session_detail.sd_stu_student_id');
        
        //$this->db->limit($start ,$limit);
        $query = $this->db->get();
  return $query->result_array();
        //$response = $q->result_array();
       // print_r($this->db->last_query()); die;

    }


    public function CasteCountAgeWise($where){
  

        $field = array('sd_stu_age','stu_caste','s.stu_gender','c.class','COUNT(`s`.`stu_caste`) as countcaste');
        $this->db->select($field);
        $this->db->from('session_detail');
        
        if(!empty($where))
        {
            $this->db->where('sd_stu_session_id', $where); 
        }
        
        $this->db->group_by('sd_stu_age'); 
        $this->db->group_by('stu_class'); 
        $this->db->group_by('stu_caste'); 
        $this->db->order_by('sd_stu_age','ASC');
        $this->db->join('class AS c','c.class_id = session_detail.sd_stu_class_id');
        $this->db->join('student AS s','s.student_id = session_detail.sd_stu_student_id');
        
        //$this->db->limit($start ,$limit);
        $query = $this->db->get();
    return   $query->result_array();
        //$response = $q->result_array();
       // print_r($this->db->last_query()); die;


    }














}