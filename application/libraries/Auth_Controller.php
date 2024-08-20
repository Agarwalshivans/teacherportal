<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$exception_uris = array(
			'login' => 'login',
			'logout' => 'login/logout',
			'register' => 'register'
		);
		if(in_array(uri_string(), $exception_uris) == FALSE){
			if($this->admin_m->loggedin() == FALSE){
				redirect(base_url('login'));
			} else {
        $this->set_user();
      }
		}
	}

  public function set_user()
  {
    $user_id = $this->get_session_id();
    $this->data['user_details'] = $this->admin_m->get($user_id);
  }
  
	public function do_upload($upload_path,$filename)
  {
    $config['upload_path']          = $upload_path;
    $config['allowed_types']        = '*';
    $config['max_size']             = 1024*1024;
    $config['file_name'] = $filename . '_' . date('Y_m_d_h_i_s');
    $this->load->library('upload', $config, $filename);
    $this->$filename->initialize($config);
    if ( ! $this->$filename->do_upload($filename)){
      $error = $this->$filename->display_errors();
      $this->session->set_flashdata($filename . '_error', $error);
      return false;
    } else {
      $data = array('upload_data' => $this->$filename->data());
      $file = strtolower($data['upload_data']['file_name']);
      $file = addslashes($file);
      return $file;
    }
  }

	public function array_from_post($data)
  {
    $result = array();
    foreach ($data as $d) {
      $current_data = $this->input->post($d);
      $current_data = addslashes($current_data);
      $result[$d] = $current_data;
    }
    return $result;
  }

  public function remove_file($image_name, $image_value)
  {
    $remove_path = STORAGE_DIR . $image_name .'/'. $image_value;
    if(file_exists($remove_path)){
      unlink($remove_path);
    }
  }
  
  public function send_email($to = 'test@gmail.com', $subject = 'Test Email', $message = 'Hello World')
	{
    $mail = new PHPMailer;
    $mail->SMTPDebug = true;
    $mail->isSMTP();
    $mail->Host = $this->data['smtp_host'];
    $mail->SMTPAuth = true;
    $mail->Username = $this->data['smtp_user'];
    $mail->Password = $this->data['smtp_pass'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $this->data['smtp_port'];
    $mail->setFrom($this->data['smtp_user'],$this->data['smtp_from_address']);
    $mail->addAddress($to, 'Tnupload User');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'Please enable mail html view options to view this email correctly. Thanks!';
    
    if(!$mail->send()){
      return false;
    } else {
      return true;
    }
	}
}