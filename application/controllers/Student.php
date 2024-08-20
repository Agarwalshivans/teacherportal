<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends Auth_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}


  public function index()
	{
		//_set_view
		$this->data['_extra_scripts'] = 'student/list/_extra_scripts';
		$this->data['_view'] =  'student/list/index';
		$this->data['page_menu'] = "Student";
		$this->data['page_title'] = "List";
		$this->load->view('_layout',$this->data);	
	}


  public function add()
	{
		$rules = $this->student_m->add_rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()==TRUE){
			$data = $this->array_from_post(array('name','subject_name','marks'));
			// $password = $this->input->post('password');
			// $hashed_password = password_hash($password, PASSWORD_BCRYPT);
			// $data['password'] = $hashed_password;
			$data['create_date'] = date('Y-m-d');
			$data['create_time'] = date('h:i:s');
			$this->student_m->save(NULL, $data);
			$this->session->set_flashdata('success','Student added.');
			redirect( BASE_URL . 'student');
		}
		//_set_view
		$this->data['_extra_scripts'] = 'student/add/_extra_scripts';
		$this->data['_view'] =  'student/add/index';
		$this->data['page_menu'] = "Student";
		$this->data['page_title'] = "Add";
		$this->load->view('_layout',$this->data);	
	}


  public function edit($id)
	{
		//check valid id
		if(empty($id))
		{
			$this->session->set_flashdata('error','Student not found.');
			redirect( BASE_URL .'student');
		}
		$id = decode_id($id);

		//check exist
		$details = $this->student_m->get($id,TRUE);

		
		// print_r($details);die;
		if(empty($details))
		{
			$this->session->set_flashdata('error','Student not found.');
			redirect( BASE_URL .'student');
		}
		$rules = $this->student_m->edit_rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()==TRUE){
			$data = $this->array_from_post(array('name','subject_name','marks'));
			$data['create_date'] = date('Y-m-d');
			$data['create_time'] = date('h:i:s');

			// Corrected to use the decoded_id for the update operation
			$this->student_m->save($id, $data);
			$this->session->set_flashdata('success','Student updated.');
			redirect( BASE_URL . 'student');
			return; // Exit after successful update
		}
		//set_data
		$this->data['details'] = $details;
		//set_view
		$this->data['_extra_scripts'] = 'student/edit/_extra_scripts';
		$this->data['_view'] =  'student/edit/index';
		$this->data['page_menu'] = "student";
		$this->data['page_title'] = "Edit";
		$this->load->view('_layout',$this->data);	
	}

// 	public function edit($id = NULL)
//   { 
// 		$id = decode_id($id);
// 		(empty($id)) ? redirect('student') : '';
// 		//check exist
// 		$details = $this->student_m->get($id,TRUE);
// 		(empty($details)) ? redirect('student') : '';

// 		$rules = $this->student_m->edit_rules;   
// 		$this->form_validation->set_rules($rules);
// 		if($this->form_validation->run()==TRUE){
// 			$data = $this->array_from_post(array('name','subject_name','marks'));
// 			$this->student_m->save($id, $data);
// 			$this->session->set_flashdata('success','Data updated.');
// 			redirect( BASE_URL .'student');
// 		}
// 		//set_data
// 		$this->data['details'] = $details;
//     //_set_view
// 		$this->data['_extra_scripts'] = 'student/edit/_extra_scripts';
// 		$this->data['_view'] =  'student/edit/index';
// 		$this->data['page_menu'] = "Student";
// 		$this->data['page_title'] = "Edit";    
// 		$this->load->view('_layout',$this->data);	
//   }

public function list()
{
  $serialNo = 1;
  $finalResult = $like = $where = array();
  $search_value = $_POST['search']['value'];
  extract($_REQUEST);
  $limit = $length;

  $like[DB_PREFIX . 'student.name'] = $search_value;
  $like[DB_PREFIX . 'student.subject_name'] = $search_value;
  $results = $this->db->select('*')
	->from(DB_PREFIX . 'student')
	->group_start()
	->or_like($like)
	->group_end()
	->limit($limit, $start)
	->get()->result_array();

	$serial_number = $start + 1;

  //get filterd student
  foreach ($results as $result) {

	$action  = '<a href="' . BASE_URL . 'student-edit/' . encode_id($result['id']) . '" id="btnEdit">';
	$action .= '<span class="badge bg-success">';
	$action .= '<i class="fa fa-edit"></i>&nbsp;Edit';
	$action .= '</span>';
	$action .= '</a> ';

	$delete  = '<a href="' . BASE_URL . 'student-delete/' . encode_id($result['id']) . '" id="btnDelete">';
	$delete .= '<span class="badge bg-danger">';
	$delete .= '<i class="fa fa-trash"></i>&nbsp;Delete';
	$delete .= '</span>';
	$delete .= '</a>';

	if($result['status'] == 'Active')
		  {
			  $status = '<span class="badge bg-success">Active</span>';
		  } else {
			  $status = '<span class="badge bg-danger">In-active</span>';
		  }
	$dummyResult['id'] = $serial_number++;
	$dummyResult['name'] = stripslashes($result['name']);
	$dummyResult['subject_name'] = stripslashes($result['subject_name']);
	$dummyResult['marks'] = stripslashes($result['marks']);
	$dummyResult['action'] = $action . $delete; // Include both edit and delete buttons in action column

	array_push($finalResult, $dummyResult);
  }
  $count_all_filter_results = $this->db->select('*')
	->from(DB_PREFIX . 'student')
	->group_start()
	->or_like($like)
	->group_end()
	->where($where)
	->get()->result_array();
  $studentsFiltered = count($count_all_filter_results);
  $studentsTotal = $this->db->count_all_results(DB_PREFIX . 'student');
  header('content-type:application/json');
  $finaljson = json_encode(array(
	"draw" => $draw,
	"recordsTotal" => $studentsTotal,
	"recordsFiltered" => $studentsFiltered,
	"data" => $finalResult
  ));
  echo $finaljson;
}
public function delete($id)
{
	if(empty($id))
	{
		$this->session->set_flashdata('error','Student not found.');
		redirect( BASE_URL .'student');
	}
	$id = decode_id($id);

	//check exist
	$details = $this->student_m->get($id,TRUE);	
	// print_r($details);die;
	if(empty($details))
	{
		$this->session->set_flashdata('error','Student not found.');
		redirect( BASE_URL .'student');
	}
    $this->student_m->delete($id);
	$this->session->set_flashdata('success','Student deleted.');
    redirect('student');
}

}