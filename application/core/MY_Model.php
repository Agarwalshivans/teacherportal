<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_order_by = 'id';	
	protected $_timestamps = FALSE;
	public $rules = array();

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function get( $id = NULL, $single = FALSE ){
		if($id!=NULL){
			$this->db->where(array('id' => $id));
			$method = 'row';
		}
		else if($single == TRUE){
			$method = 'row';
		}
		else{
			$method = 'result_array';
		}		
		$this->db->order_by($this->_order_by);
		return $this->db->get($this->_table_name)->$method();
	}

	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);
	}

	public function save($id = NULL,$data=NULL){
		if($id !== NULL){
			$this->db->set($data);
			$this->db->where('id', $id);
			return $this->db->update($this->_table_name);
		}else{
			if(!($this->db->insert($this->_table_name,$data))){
				$error = $this->db->error();
				if($error['code'] == 1062){
					return "Already Exist!";
				}
			}
		}
	}
	
	public function delete($id){
		try {
	       	$this->db->delete($this->_table_name, array('id' => $id));
	        $db_error = $this->db->error();
	        if (!empty($db_error['message'])) {
	            throw new Exception('Already in use.');
	        }
	        $this->session->set_flashdata('delete_success','Deleted Successfully.');
	        return TRUE;
	    } catch (Exception $e) {
	    	$this->session->set_flashdata('delete_error',$e->getMessage());
	        return FALSE;
	    }
	}

	public function get_total($where = []){
		if(!empty($where)){
			$result = $this->db->select('*')
							->where($where)
							->from($this->_table_name)
							->count_all_results();
		} else {
			$result = $this->db->select('*')
							->from($this->_table_name)
							->count_all_results();
		}
		return $result;
	}

}