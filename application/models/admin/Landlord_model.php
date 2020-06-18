<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Landlord_model extends CI_Model {


    public function CountLandlordList($keyword){

       if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('phone',$keyword);
                $this->db->or_like('email',$keyword);
                $this->db->or_like('first_name',$keyword);
               $this->db->or_like('last_name',$keyword);
          $this->db->group_end();
       }
        
      return $this->db->count_all_results(TBL_LANDLORD);
      
        
    }
    public function LandlordList($limit,$offset,$keyword,$orderKey,$ordervalue){
        $this->db->select('*');
        $this->db->from('landlord');
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('phone',$keyword);
                $this->db->or_like('email',$keyword);
                $this->db->or_like('first_name',$keyword);
                $this->db->or_like('last_name',$keyword);
            $this->db->group_end();
        }
        if(!empty($orderKey) && $ordervalue){
            $this->db->order_by($orderKey,$ordervalue);
        }
     
        $this->db->limit($limit,$offset);
       return $this->db->get()->result();
   
      
    }

}