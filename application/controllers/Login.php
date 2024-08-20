<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$dashboard = BASE_URL . 'dashboard';
		$login = BASE_URL . 'login';
		$this->admin_m->loggedin() ==  FALSE || redirect($dashboard);
		$rules = $this->admin_m->login_rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()==TRUE){
			// if($this->input->post('captcha') != $this->session->userdata('captcha')){
			// 	$this->session->set_flashdata('error', 'Invalid Captcha!');
			// 	redirect( $login );
			// }
			if($this->admin_m->login() == TRUE){
				redirect($dashboard);
			}else{
				$this->session->set_flashdata('error', 'The Email Password Combination does not exist!');
				redirect( $login );
			}
		}
		 //captcha code
		 $this->load->helper('captcha');
		 $captch_path = realpath('./captcha/');
		 $vals = array(
					 'img_path'      => './captcha/',
					 'img_url'       => BASE_URL . 'captcha/',
					 'font_path'     => './assets/fonts/Lato-Regular.ttf',
					 'img_width'     => 250,
					 'img_height'    => 80,
					 'expiration'    => 7200,
					 'word_length'   => 6,
					 'font_size'     => 36,
					 'img_id'        => rand(11111,666666),
					 'pool'          => '0123456789',
 
					 // White background and border, black text and red grid
					 'colors'        => array(
						 'background' => array(255, 255, 255),
						 'border' => array(0, 0, 0),
						 'text' => array(255, 0, 0),
						 'grid' => array(200, 200, 200)
					 )
		 );
		 $cap = create_captcha($vals);
		 $this->session->set_userdata(['captcha'=>$cap['word']]);
		 $this->data['captcha'] = $cap['image'];
		 //set_view
		$this->data['page_title'] = 'Login';
		$this->load->view('login/index',$this->data);	
	}

	public function logout(){
		$this->admin_m->logout();
		redirect( BASE_URL . 'login/index' );
	}

}