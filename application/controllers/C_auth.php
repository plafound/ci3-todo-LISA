<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller {

    public function index()
    {
		$data['title'] = 'Login ToDo | Sekolah LISA';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');

    }
}
