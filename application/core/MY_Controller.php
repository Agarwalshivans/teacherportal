<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MY_Controller extends CI_Controller {

 	var $data = array();

	public function __construct()
	{
		parent::__construct();

    $this->load->model('admin_m');
    $this->load->model('student_m');
    $this->load->model('settings_m');
    
    $this->set_settings();
	}

  public function set_settings()
  {
    $all_settings = $this->settings_m->get();
    foreach($all_settings as $setting){
        $this->data[$setting['key']] = $setting['value'];
    }
    $this->data['panel_name'] = 'Teacher';
  }

  public function get_session_id()
  {
    return $this->session->userdata('dj_admin_id');
  }

}