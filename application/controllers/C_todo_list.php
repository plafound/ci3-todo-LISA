<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_todo_list extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_todo_list");
		$this->load->model("m_todo_group_ptk");
		$this->load->model("m_todo_group");
		$this->load->model("m_todo_task");
		$this->load->model("m_tutor");
		$this->m_tutor->cek_login();
	}
	public function index()
	{
		// $data['list'] = $this->m_todo_list->getAllJoin();
		// $data['group'] = $this->m_todo_group->getAll();
		// $data['content'] = 'todo_list/v_index';
		// $this->load->view('template',$data);

		if($this->session->userdata('jabatan')=='A'){
			$data['list2'] = $this->m_todo_list->getAllJoin();
			$data['group'] = $this->m_todo_group->getAll();
			$data['list'] = $this->m_todo_list->getAllTask();
			// var_dump($data['list']);
			$data['content'] = 'todo_list/v_index';
			$this->load->view('template',$data);
			}
	}
	public function group($id = NULL)
	{
		
		if(!isset($id)){
			show_404();
		}
		
		$data['group'] = $this->m_todo_group->getAll();
		$data['list'] = $this->m_todo_list->getByGroupTask($id);
		$data['content'] = 'todo_list/v_index';
		$this->load->view('template',$data);
	}
	public function form_tambah()
	{
		$data['content'] = 'todo_list/v_tambah';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$data['nama'] = $this->input->post('nama');
		$this->m_todo_list->tambah($data);
		redirect('list');
	}
	public function form_ubah($id)
	{
		$data['list'] = $this->m_todo_list->getById($id);
		$data['content'] = 'todo_list/v_ubah';
		$this->load->view('template',$data);
	}
	public function ubah()
	{
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$this->m_todo_group->ubah($data,$id);
		redirect('group');
	}
	
	
	public function hapus()
	{
		$id = $this->input->post('id');
		$group = $this->input->post('group_id');
		var_dump($id);
		var_dump($group);
		// $this->m_todo_group->hapus($id);
		// redirect('group');
	}

	public function hapus_list()
	{
		$id = $this->input->post('id');
		$group = $this->input->post('group_id');
		if($this->session->userdata('jabatan')=='A'){
			$this->m_todo_list->hapus($id);
			redirect('c_todo_list');
		}else {
			$this->m_todo_list->hapus($id);
			redirect('c_todo_list/group/'.$group);
		}
	}

	public function tambah_list()
	{
		if($this->input->post('status')==''){
			$status = 'B';
		} else {
			$status = $this->input->post('status');
		}
		if($this->session->userdata('jabatan')=='A'){
			$this->m_todo_list->tambah($status);
			redirect('c_todo_list');
		}else {
			$group = $this->input->post('todo_group');
			$this->m_todo_list->tambah($status);
			redirect('c_todo_list/group/'.$group);
		}
		
	}

	
	public function edit_list()
	{
		if($this->session->userdata('jabatan')=='A'){
		$this->m_todo_list->ubah();
			redirect('c_todo_list');
		}else {
		$group = $this->input->post('group_id');
		$this->m_todo_list->ubah();
		redirect('c_todo_list/group/'.$group);
	}
	}

	public function dikerjakan($id,$group)
	{

		if(!isset($id)) show_404();
		$date = date('Y-m-d');
		if($this->session->userdata('jabatan')=='A'){
		$this->m_todo_list->dikerjakan($id,$date);
		redirect('c_todo_list');
		}
		else{$this->m_todo_list->dikerjakan($id,$date);
			redirect('c_todo_list/group/'.$group);
		}
	}
	public function selesai($id,$group)
	{
		if(!isset($id)) show_404();
		$date = date('Y-m-d');
		if($this->session->userdata('jabatan')=='A'){
		$this->m_todo_list->selesai($id,$date);
		redirect('c_todo_list');
		}
		else{$this->m_todo_list->selesai($id,$date);
			redirect('c_todo_list/group/'.$group);
		}

	}
	public function batal($id,$group)
	{	
		if(!isset($id)) show_404();
		if($this->session->userdata('jabatan')=='A'){
		$this->m_todo_list->batal($id);
		redirect('c_todo_list'.$group);
		}
		else{$this->m_todo_list->batal($id);
			redirect('c_todo_list/group/'.$group);
		}

	}
	
}
