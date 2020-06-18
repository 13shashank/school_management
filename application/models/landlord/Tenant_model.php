<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tenant_model extends CI_Model {
    
    public function CountTenantList($keyword){
        if(!empty($keyword)){
            $this->db->group_start();
             
              // $this->db->or_like('parent_name',$keyword);
               $this->db->like('t_first_name',$keyword);
               
               
            $this->db->group_end();
        }
      
        return $this->db->count_all_results('tenant');
    }
    public function TenantList($limit,$offset,$keyword,$orderKey,$ordervalue){
        
        $this->db->select('*');
        $this->db->from('tenant');
        if(!empty($keyword)){
            $this->db->group_start();
           $this->db->like('t_first_name',$keyword);
            $this->db->or_like('t_last_name',$keyword);
            
            $this->db->group_end();
        } 
        if(!empty($orderKey) && $ordervalue){
            
            $this->db->order_by($orderKey,$ordervalue);
        }
     
        $this->db->limit($limit,$offset);
      
         return $this->db->get()->result();
        
        
    }



}