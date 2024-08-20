<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_m extends MY_Model {

	protected $_table_name = DB_PREFIX . 'student';
  public $add_rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|trim'
		),
		'subject_name' => array(
			'field' => 'subject_name',
			'label' => 'subject name',
			'rules' => 'required|trim'
		),
		'marks' => array(
			'field' => 'marks',
			'label' => 'Marks',
			'rules' => 'required|trim'
		)
	);

	public $edit_rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|trim'
		),
		'subject_name' => array(
			'field' => 'subject_name',
			'label' => 'Subject Name',
			'rules' => 'required|trim'
		),
		'marks' => array(
			'field' => 'marks',
			'label' => 'Marks',
			'rules' => 'required|trim|numeric'
		)
	);

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	// public function get_total_incoming_students()
	// {
	// 	$where['delegation_type'] = 'Incoming';
	// 	return count($this->get_by($where));
	// }

	// public function get_total_outgoing_students()
	// {
	// 	$where['delegation_type'] = 'Outgoing';
	// 	return count($this->get_by($where));
	// }
}