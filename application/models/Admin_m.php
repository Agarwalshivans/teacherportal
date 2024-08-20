<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends MY_Model {

  protected $_table_name = DB_PREFIX . 'admin';

	public $login_rules = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email ID',
			'rules' => 'required|trim|valid_email'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim|min_length[6]'
		),
	);

	public $change_password_rules = array(
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim'
		),
		'c_password' => array(
			'field' => 'c_password',
			'label' => 'Confirm Password',
			'rules' => 'required|trim|matches[password]'
		)
	);

	public $update_rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|trim'
		)
	);

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
  }

	public function login(){
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'status' => 'Active'
		 ), TRUE);
		if(!empty($user)){
			$user_password = $this->input->post('password');
			$hash_password = $user->password;
			if( password_verify($user_password, $hash_password )){
				$data = array(
					'dj_admin_id' => $user->id,
					'dj_admin_name' => $user->name,
					'dj_admin_email' => $user->email,
					'dj_admin_loggedin' => TRUE,
				);
				$this->session->set_userdata($data);
			}
		}
	}

	public function loggedin(){
		return (bool) $this->session->userdata('dj_admin_loggedin');
	}

	public function logout(){
		$this->session->sess_destroy();
	}

}
