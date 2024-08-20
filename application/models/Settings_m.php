<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_m extends MY_Model {

	protected $_table_name = DB_PREFIX . 'settings';
  public function general_rules()
  {  
    $rules = array();
    $where['type'] = 'general';
    $result = $this->get_by($where);
    foreach($result as $r){
      $rules[$r['key']] = array(
        'field' => $r['key'],
        'label' => $r['label'],
        'rules' => $r['validation']
      );
    }
    return $rules;
  }

  public function smtp_rules()
  {  
    $rules = array();
    $where['type'] = 'smtp';
    $result = $this->get_by($where);
    foreach($result as $r){
      $rules[$r['key']] = array(
        'field' => $r['key'],
        'label' => $r['label'],
        'rules' => $r['validation']
      );
    }
    return $rules;
  }

  public function social_links_rules()
  {  
    $rules = array();
    $where['type'] = 'social-links';
    $result = $this->get_by($where);
    foreach($result as $r){
      $rules[$r['key']] = array(
        'field' => $r['key'],
        'label' => $r['label'],
        'rules' => $r['validation']
      );
    }
    return $rules;
  }

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
}