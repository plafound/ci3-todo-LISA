<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_todo_task extends CI_Controller {

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

	public function task($id)
	{
		$data['tasks'] = $this->m_todo_task->getByTodo($id);
		$data['todo'] = $this->m_todo_list->getById($id)->row_array();
		$data['content'] = 'todo_list/v_todo_task';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$data['todo'] = $this->input->post('todo');
		if($this->input->post('status')==''){
			$status = 'B';
		} else {
			$status = $this->input->post('status');
		}
		$this->m_todo_task->tambah($status);
		redirect('c_todo_task/task/'. $data['todo']);
	}
	public function edit()
	{
		$this->m_todo_task->ubah();
		redirect('c_todo_task/task/'. $this->input->post('todo'));
	}
	public function hapus($id,$todo)
	{
		if(!isset($id)) show_404();

		$this->m_todo_task->hapus($id);
		$this->session->set_flashdata('hapus','Data berhasil dihapus!');
		redirect('c_todo_task/task/'.$todo);
	}
	public function dikerjakan($id,$todo)
	{
		if(!isset($id)) show_404();
		$date = date('Y-m-d');
		$this->m_todo_task->dikerjakan($id,$date);
		redirect('c_todo_task/task/'.$todo);
	}
	public function selesai($id,$todo)
	{
		if(!isset($id)) show_404();
		$date = date('Y-m-d');
		$this->m_todo_task->selesai($id,$date);
		redirect('c_todo_task/task/'.$todo);
	}
	public function batal($id,$todo)
	{
		if(!isset($id)) show_404();
		$this->m_todo_task->batal($id);
		redirect('c_todo_task/task/'.$todo);
	}

}
?>
