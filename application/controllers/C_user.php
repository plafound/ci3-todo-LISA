<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

    public function index()
    {
        $data['content'] = 'todo_group/v_index';
        $this->load->view('user',$data);
    }
}
