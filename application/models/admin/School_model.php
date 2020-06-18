<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class School_model extends CI_Model {


    public function CountSchoolList($keyword){

       if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('school_name',$keyword);
                $this->db->or_like('school_email',$keyword);
                $this->db->or_like('school_phone',$keyword);
               $this->db->or_like('school_rc_number',$keyword);
               $this->db->or_like('school_dise_code',$keyword);
          $this->db->group_end();
       }
        
      return $this->db->count_all_results('schools');
      
        
    }
    public function SchoolList($limit,$offset,$keyword,$orderKey,$ordervalue){
        $this->db->select('*');
        $this->db->from('schools');
        if(!empty($keyword)){
            $this->db->group_start();
            $this->db->like('school_name',$keyword);
            $this->db->or_like('school_email',$keyword);
            $this->db->or_like('school_phone',$keyword);
           $this->db->or_like('school_rc_number',$keyword);
           $this->db->or_like('school_dise_code',$keyword);
            $this->db->group_end();
        }
        if(!empty($orderKey) && $ordervalue){
            $this->db->order_by($orderKey,$ordervalue);
        }
     
        $this->db->limit($limit,$offset);
       return $this->db->get()->result();
   
      
    }

}