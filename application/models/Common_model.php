<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {



    public function GetResult($table,$where=array(),$field="*"){
		$this->db->select($field);
		$this->db->from($table);
		if(!empty($where)){
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function GetRow($table,$where=array(),$field="*"){
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->row();
	}
	public function CountResults($table,$where=array()){
		$this->db->where($where);
		return $this->db->count_all_results($table);
	}
	public function DeleteData($table,$where){
		$this->db->where($where);
		return  $this->db->delete($table);
	}
	public function InsertBatch($table,$data){
		return  $this->db->insert_batch($table,$data);
	}
	public function InsertData($table,$data){
		 $this->db->insert($table,$data);
		 return    $this->db->insert_id();
	}
	public function UpdateData($table,$data,$where){
		$this->db->where($where);
		return  $this->db->update($table,$data);
	}
	public function UpdateWhereIn($table,$data,$where,$in){
		$this->db->where_in($where,$in);
		return  $this->db->update($table,$data);
	}
	public function CountResultsForDashboard($table){
	//	$this->db->where($where);
		return $this->db->count_all_results($table);
	}
}