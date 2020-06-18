<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fees_model extends CI_Model {

public function CountFeesList($where=[], $like=[]) {
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
        $this->db->from('fees');
       
       return $this->db->count_all_results();
       
    }
    public function FeesList($limit,$start,$where=[],$like=[],$order_by='')
    {
        $fields = array('fees.*', 'c.class', 's.session');
        $this->db->select($fields);
        $this->db->from('fees');
        
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
        $this->db->join('class AS c','c.class_id = fees.fees_class_id');
        $this->db->join('session AS s','s.session_id = fees.fees_session_id');
        $this->db->limit($start ,$limit);
        $query = $this->db->get();
        return $query->result();
       
    }


    public function CountFeesTransaction($where=[], $like=[]) {
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
        $this->db->from('fees_transaction');
       
       return $this->db->count_all_results();
       
    }



    public function FeesTransactionList($limit,$start,$where=[],$like=[],$order_by='')
    {
        $fields = array('fees_transaction.*', 'stu.*' ,'c.class', 's.session');
        $this->db->select($fields);
        $this->db->from('fees_transaction');
        
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
        $this->db->join('class AS c','c.class_id = fees_transaction.tran_class_id');
        $this->db->join('student AS stu','stu.stu_scholar_number = fees_transaction.tran_scholar_number');
        $this->db->join('session AS s','s.session_id = fees_transaction.tran_session_id');
        $this->db->limit($start ,$limit);
        $query = $this->db->get();
        return $query->result();
       
    }

















}