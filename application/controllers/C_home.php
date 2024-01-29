<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_tutor');
		$this->load->model('m_todo_group_ptk');
		$this->m_tutor->cek_login();
	}
	public function index()
	{
		
		$data['group'] = $this->m_todo_group_ptk->getGroup($this->session->userdata('id'));
		$this->load->view('home', $data);
	}
}
