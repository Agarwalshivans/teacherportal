<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$total_students = $this->student_m->get_total();

		// $total_incoming_events = $this->event_m->get_total_incoming_events();
		// $total_outgoing_events = $this->event_m->get_total_outgoing_events();
		// $total_record = $this->record_m->get_total();
		// $total_organization = $this->organization_m->get_total();
		// $total_country = $this->country_m->get_total();

		$dashboard_data = $this->get_dashboard_data();

		$this->data['total_students'] = $total_students;
		// $this->data['total_incoming_events'] = $total_incoming_events;
		// $this->data['total_outgoing_events'] = $total_outgoing_events;
		// $this->data['total_record'] = $total_record;
		// $this->data['total_organization'] = $total_organization;
		// $this->data['total_country'] = $total_country;
		$this->data['dashboard_data'] = $dashboard_data;
		//_set_view
		$this->data['_extra_scripts'] = 'dashboard/view/_extra_scripts';
		$this->data['_view'] =  'dashboard/view/index';
		$this->data['page_menu'] = "Home";
		$this->data['page_title'] = "Dashboard";
		$this->load->view('_layout',$this->data);	
	}

	public function get_dashboard_data()
	{
		// $sql = "SELECT  
		// 					DATE_FORMAT(`create_date`, '%Y-%m') AS month, 
		// 					SUM(CASE WHEN `area` = 'rural' THEN 1 ELSE 0 END) AS incoming_count, 
		// 					SUM(CASE WHEN `area` = 'urban' THEN 1 ELSE 0 END) AS outgoing_count 
		// 				FROM  `ic_household` 
		// 				GROUP BY 
    	// 				DATE_FORMAT(`create_date`, '%Y-%m');";

		// return $this->db->query($sql)->result_array();
		
	}


	public function my_profile()
	{
		$where['id'] = $id = $this->get_session_id();
		$details = $this->admin_m->get_by($where,TRUE);
		$rules = $this->admin_m->update_rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE){
			$data = $this->array_from_post(array('name'));
			$this->admin_m->save($id,$data);
			$this->session->set_flashdata('success',"Your profile has been successfully updated.");
			redirect('my-profile');
		}
		//set_data
		$this->data['details'] = $details;
		//set_view
		$this->data['_extra_scripts'] =  'dashboard/my_profile/_extra_scripts';
		$this->data['_view'] =  'dashboard/my_profile/index';
		$this->data['page_menu'] = "Home";
		$this->data['page_title'] = "My Profile";
		$this->load->view('_layout',$this->data);
	}

	public function change_password()
	{
		$where['id'] = $id = $this->get_session_id();
		$details = $this->admin_m->get_by($where,TRUE);
		$rules = $this->admin_m->change_password_rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE){
			//check user is social login or not
			$admin_id = $this->get_session_id();
			$user_details = $this->admin_m->get($admin_id, TRUE);
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$this->admin_m->save($id,$data);
			$this->session->set_flashdata('success',"Your password has been successfully updated.");
			redirect('change-password');
		}
		//set_view
		$this->data['_extra_scripts'] =  'dashboard/change_password/_extra_scripts';
		$this->data['_view'] =  'dashboard/change_password/index';
		$this->data['page_menu'] = "Home";
		$this->data['page_title'] = "Change Password";
		$this->load->view('_layout',$this->data);
	}

}