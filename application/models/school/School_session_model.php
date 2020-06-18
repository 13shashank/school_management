<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class School_session_model extends CI_Model {
    

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
    public function SessionList($limit,$start,$where=[],$like=[],$order_by='',$fields='*')
    {
        $this->db->select($fields);
        $this->db->from('session');
        
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
        $this->db->limit($start ,$limit);
        $query = $this->db->get();
        return $query->result();
       
    }














}