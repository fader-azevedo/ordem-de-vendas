<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in())		{
			redirect(base_url('auth/login'));
		}
	}

	public function index()	{
		$data = array(
			'title' => 'System',
			'system' => $this->core_model->get_by_id('sistema',array('sistema_id'=>1))
		);
		$this->load->view('settings/index', $data);
	}
}
