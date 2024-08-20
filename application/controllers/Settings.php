<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function general()
	{
		$rules = $this->settings_m->general_rules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE){
			foreach($_POST as $key => $value){
				$this->db->set('value', addslashes($value))->where('key',$key)->update(DB_PREFIX . 'settings');
			}
			$this->session->set_flashdata('success',"Successfully Updated!");
			redirect('general-settings');
		}
		$all_settings = $this->settings_m->get_by(['type' => 'general']);
		$this->data['all_settings'] = $all_settings;
		//set_view
		$this->data['_view'] =  'settings/general_settings';
		$this->data['page_menu'] = "Settings";
		$this->data['page_title'] = "General Settings";
		$this->load->view('_layout',$this->data);	
	}

	public function smtp()
	{
		$rules = $this->settings_m->smtp_rules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE){
			foreach($_POST as $key => $value){
				$this->db->set('value', addslashes($value))->where('key',$key)->update(DB_PREFIX . 'settings');
			}
			$this->session->set_flashdata('success',"Successfully Updated!");
			redirect('smtp-settings');
		}
		$all_settings = $this->settings_m->get_by(['type' => 'smtp']);
		$this->data['all_settings'] = $all_settings;
		//set_view
		$this->data['_view'] =  'settings/smtp_settings';
		$this->data['page_menu'] = "Settings";
		$this->data['page_title'] = "SMTP Settings";
		$this->load->view('_layout',$this->data);	
	}
	
	public function social_links()
	{
		$rules = $this->settings_m->social_links_rules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE){
			foreach($_POST as $key => $value){
				$this->db->set('value', addslashes($value))->where('key',$key)->update(DB_PREFIX . 'settings');
			}
			$this->session->set_flashdata('success',"Successfully Updated!");
			redirect('social-links-settings');
		}
		echo validation_errors();
		$all_settings = $this->settings_m->get_by(['type' => 'social-links']);
		$this->data['all_settings'] = $all_settings;
		//set_view
		$this->data['_view'] =  'settings/social_links_settings';
		$this->data['page_menu'] = "Settings";
		$this->data['page_title'] = "Social Links Settings";
		$this->load->view('_layout',$this->data);	
	}

}
