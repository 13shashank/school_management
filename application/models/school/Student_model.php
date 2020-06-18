<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_model extends CI_Model {
    
    // public function CountStudentList($keyword){
    //     if(!empty($keyword)){
    //         $this->db->group_start();
             
    //           // $this->db->or_like('parent_name',$keyword);
    //            $this->db->like('student_name',$keyword);
               
               
    //         $this->db->group_end();
    //     }
      
    //     return $this->db->count_all_results('student');
    // }
    // public function StudentList($limit,$offset,$keyword,$orderKey,$ordervalue){
        
    //     $this->db->select('*');
    //     $this->db->from('student');
    //     if(!empty($keyword)){
    //         $this->db->group_start();
    //        $this->db->like('student_name',$keyword);
    //         $this->db->or_like('stu_scholar_number',$keyword);
    //         $this->db->or_like('stu_class',$keyword);
            
    //         $this->db->group_end();
    //     } 
    //     if(!empty($orderKey) && $ordervalue){
            
    //         $this->db->order_by($orderKey,$ordervalue);
    //     }
     
    //     $this->db->limit($limit,$offset);
      
    //      return $this->db->get()->result();
        
        
    // }



    public function CountStudentList($where=[], $like=[]) {
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
        $this->db->from('student');
       
       return $this->db->count_all_results();
       
    }
    public function StudentList($limit,$start,$where=[],$like=[],$order_by='',$fields='*')
    {
        $this->db->select($fields);
        $this->db->from('student');
        
        if(!empty($where))
        {
            $this->db->where($where); 
        }
        if(!empty($like))
        {
            $i=true;
            foreach($like as $key=>$value)
            {
                if($i) {
                    $this->db->like($key, $value, 'both'); 
                    $i=false;
                 } else {
                    $this->db->or_like($key, $value, 'both'); 
                }

            }            
        }
        $this->db->order_by($order_by['key'],$order_by['value']);
        $this->db->join('class AS c','c.class_id = student.stu_class');
        $this->db->limit($start ,$limit);
        $query = $this->db->get();
        return $query->result();
       
    }


  public function GetForExport(){

        $response = array();
        $this->db->select('*');
        $this->db->from('student');
        
        $this->db->join('class AS c','c.class_id = student.stu_class');
		$q = $this->db->get();
        $response = $q->result_array();
       
	 	return $response;

  }











}