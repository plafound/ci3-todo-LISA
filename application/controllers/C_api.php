<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_api extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model("m_tutor");
	}
	public function get_tutor()
	{
		if ($this->input->get('search', TRUE)) {
			$data = $this->m_tutor->get_tutor_search($this->input->get('search', TRUE));
		} else {
			$data = $this->m_tutor->getTutor();
		}

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
	}
}
