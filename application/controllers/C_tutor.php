<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tutor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_tutor");
        $this->load->model("m_todo_group_ptk");
		$this->load->library("form_validation");
		
		$this->m_tutor->cek_login();
    }
    public function index()
    {
		if($this->session->userdata('jabatan')=='A'){
        $data['tutor'] = $this->m_tutor->getTutor();
		$data['content'] = 'todo_tutor/v_index';
		$this->load->view('template',$data);
	} else {
		show_404();
	}
    }
    public function form_tambah()
	{
		$data['content'] = 'todo_tutor/v_tambah';
		$this->load->view('template',$data);
	}
	public function tambah()
	{
		$user = $this->input->post('user');
		$cek_user = $this->m_tutor->cek_user($user);
		if($cek_user <= 0){
			$data['nama'] = $this->input->post('nama');
			$data['user'] = $this->input->post('user');
			$data['pass'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$pass2 = $this->input->post('password2');
			$data['jabatan'] = $this->input->post('jabatan');
			if($this->input->post('password')==$this->input->post('password2')){
				$this->m_tutor->tambah($data);
				redirect('tutor');
			} else {
				$this->session->set_flashdata('gagal','Password tidak sama!');
				redirect('c_tutor/form_tambah');
			}
			
		} else {
			$this->session->set_flashdata('gagal','Username sudah ada!');
			redirect('c_tutor/form_tambah');
		}
	}
	public function form_ubah($id)
	{
		if($this->session->userdata('id') == $id || $this->session->userdata('jabatan')=='A' ){
		$data['tutor'] = $this->m_tutor->getById($id);
		$data['content'] = 'todo_tutor/v_ubah';
		$this->load->view('template',$data);
		} else {
			show_404();
		}
	}
	public function ubah()
	{
			if($this->input->post('pass')==$this->input->post('password2')){
				$this->m_tutor->ubah();
				$this->session->set_flashdata('sukses','Data berhasil diubah!');
				redirect('c_tutor/form_ubah/'. $this->input->post('id'));
			} else {
				$this->session->set_flashdata('gagal','Password tidak sama!');
				redirect('c_tutor/form_ubah/'. $this->input->post('id'));
			}
	}
	public function hapus($id)
	{
		$this->m_tutor->hapus($id);
		$this->m_todo_group_ptk->hapusByTutor($id);
		redirect('tutor');
	}

}
