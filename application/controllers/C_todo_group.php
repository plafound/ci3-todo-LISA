<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_todo_group extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_todo_group");
		$this->load->model("m_todo_group_ptk");
		$this->load->model("m_tutor");
		$this->load->library('form_validation');
		$this->m_tutor->cek_login();
	}
	public function index()
	{
		$data['groups'] = $this->m_todo_group->getAll();
		$data['content'] = 'todo_group/v_index';
		$this->load->view('template',$data);
	}
	public function form_tambah()
	{
		$data['content'] = 'todo_group/v_tambah';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		if ($this->form_validation->run()==true)
        {
		$data['nama'] = $this->input->post('nama');
		$this->m_todo_group->tambah($data);
		$this->session->set_flashdata('success','Data berhasil ditambah!');
		redirect('group');
		} else {
			redirect('c_todo_group/form_tambah');
		}
	}
	public function form_ubah($id)
	{
		if (!isset($id)) redirect('group');

		$data['groups'] = $this->m_todo_group->getById($id);
		$data['content'] = 'todo_group/v_ubah';
		$this->load->view('template',$data);
	}
	public function ubah()
	{
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$this->m_todo_group->ubah($data,$id);
		redirect('group');
	}
	public function hapus($id)
	{
		if(!isset($id)) show_404();
		
		$this->m_todo_group->hapus($id);
		$this->m_todo_group_ptk->hapus_group($id);
		redirect('group');
	}

	public function list_tutor($id)
	{
		// $ptk = $this->session->userdata('id');
		// $cek_group = $this->m_todo_group_ptk->cekGroup($id,$ptk);
		// var_dump($cek_group);

		$cek = $this->m_todo_group->cek_data($id);
		if($cek > 0){
		$data['tutors'] = $this->m_todo_group_ptk->getByGroup($id);
		$data['groups'] = $this->m_todo_group->getById($id);
		$data['content'] = 'todo_group/v_list_tutor';
		$this->load->view('template',$data);
	} else {
		show_404();
	}
	}

	public function add_tutor_group()
	{
		$this->form_validation->set_rules('todo_group','todo_group','required');
		$this->form_validation->set_rules('ptk','ptk','required');
		$ptk = $this->input->post('ptk');
		$todo_group = $this->input->post('todo_group');
		$cek = $this->m_todo_group_ptk->cek_data($ptk,$todo_group);
		if($cek<=0){
		if ($this->form_validation->run()==true)
        {
		$data['todo_group'] = $this->input->post('todo_group');
		$data['ptk'] = $this->input->post('ptk');
		$this->m_todo_group_ptk->tambah($data);
		$this->session->set_flashdata('success','Data berhasil ditambah!');
		redirect('c_todo_group/list_tutor/'. $data['todo_group']);
		} else {
			$this->session->set_flashdata('gagal','Data gagal ditambahkan!');
			redirect('c_todo_group');
		}
	}else {
		$this->session->set_flashdata('gagal','Data tutor sudah ada!');
		redirect('c_todo_group/list_tutor/'. $todo_group);
	}
	}
	public function hapus_ptk($id,$todo_group)
	{
		if(!isset($id)) show_404();

		$this->m_todo_group_ptk->hapus($id);
		$this->session->set_flashdata('hapus','Data berhasil dihapus!');
		redirect('c_todo_group/list_tutor/'.$todo_group);
		
	}
}
