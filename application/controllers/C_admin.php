<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_tutor");
		if($this->session->userdata('jabatan') == 'T'){
            show_404();
        }
    }
    public function index()
    {
        $data['tutor'] = $this->m_tutor->getAdmin();
		$data['content'] = 'todo_admin/v_index';
		$this->load->view('template',$data);
    }
    public function form_tambah()
	{
		$data['content'] = 'todo_admin/v_tambah';
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
		$data['jabatan'] = $this->input->post('jabatan');
		$this->m_tutor->tambah($data);
		redirect('c_admin');
		} else {
			$this->session->set_flashdata('gagal','Username sudah ada!');
			redirect('c_admin/form_tambah');
		}
	}
	public function form_ubah($id)
	{
		$data['tutor'] = $this->m_tutor->getById($id);
		$data['content'] = 'todo_admin/v_ubah';
		$this->load->view('template',$data);
	}
	public function ubah()
	{
		$this->m_tutor->ubah();
		redirect('c_admin');
	}
	public function hapus($id)
	{
		$this->m_tutor->hapus($id);
		redirect('c_admin');
	}
}
