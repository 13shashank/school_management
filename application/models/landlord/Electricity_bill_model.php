<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Electricity_bill_model extends CI_Model {
    
    public function CountEbillList($keyword){
        if(!empty($keyword)){
            $this->db->group_start();
             
              // $this->db->or_like('parent_name',$keyword);
               $this->db->like('ebill_tenant_id',$keyword);
               
               
            $this->db->group_end();
        }
      
        return $this->db->count_all_results('electricity_bill');
    }
    public function EbillList($limit,$offset,$keyword,$orderKey,$ordervalue){
        
        $this->db->select('e.*, t.*, r.*');
        $this->db->from('electricity_bill as e');
        if(!empty($keyword)){
            $this->db->group_start();
           $this->db->like('t_first_name',$keyword);
            $this->db->or_like('ebill_date',$keyword);
            
            $this->db->group_end();
        } 
        if(!empty($orderKey) && $ordervalue){
            
            $this->db->order_by($orderKey,$ordervalue);
        }
     
        $this->db->limit($limit,$offset);
        $this->db->join( 'tenant as t', 't.t_id = ebill_tenant_id','left');
        $this->db->join( 'rate_per_reading as r', 'r.id = 1','left');
         return $this->db->get()->result();
        
        
    }



}


// SELECT * FROM electricity_bill WHERE ebill_date = ( SELECT max(ebill_date) FROM electricity_bill ) && ebill_tenant_id = 1