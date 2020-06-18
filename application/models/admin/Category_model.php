<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model {
    
    public function CountCabCategoryList($keyword){
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('cc_name',$keyword);
                $this->db->or_like('cc_seats',$keyword);
                $this->db->or_like('cc_base_km',$keyword);
                $this->db->or_like('cc_base_fare',$keyword);
                $this->db->or_like('cc_per_km_fare',$keyword);
                $this->db->or_like('cc_per_minute_fare',$keyword);
            $this->db->group_end();
        }
        $this->db->where("is_trash","0");
        return $this->db->count_all_results(TBL_CAB_CATEGORY);
    }
    public function CabCategoryList($limit,$offset,$keyword){
        $this->db->select('*');
        $this->db->from(TBL_CAB_CATEGORY);
        if(!empty($keyword)){
            $this->db->group_start();
                $this->db->like('cc_name',$keyword);
                $this->db->or_like('cc_seats',$keyword);
                $this->db->or_like('cc_base_km',$keyword);
                $this->db->or_like('cc_base_fare',$keyword);
                $this->db->or_like('cc_per_km_fare',$keyword);
                $this->db->or_like('cc_per_minute_fare',$keyword);
            $this->db->group_end();
        } 
        $this->db->where("is_trash","0");
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }

    public function CountFoodCategoryList($keyword){
        if(!empty($keyword)){
            $this->db->group_start();
             
                $this->db->or_like('fc_name',$keyword);
               
               
            $this->db->group_end();
        }
        // $this->db->join('food_category as b', 'food_category.id = b.parent_id','inner');
        $this->db->where("is_trash","0");
        return $this->db->count_all_results(TBL_FOOD_CATEGORY);
    }

    public function FoodCategoryList($limit,$offset,$keyword,$orderKey,$ordervalue)
    {
        
        $this->db->select('a.*, b.fc_name as parent_name');
        $this->db->from('food_category as a');
        if(!empty($keyword)){
            $this->db->group_start();
           
            $this->db->or_like('a.fc_name',$keyword);
            
            $this->db->group_end();
        } 
        if(!empty($orderKey) && $ordervalue){
            
            $this->db->order_by($orderKey,$ordervalue);
        }
        $this->db->where("a.is_trash","0");
        $this->db->limit($limit,$offset);
         $this->db->join( 'food_category as b', 'b.id = a.parent_id','left');
        return $this->db->get()->result();
        
    }


}