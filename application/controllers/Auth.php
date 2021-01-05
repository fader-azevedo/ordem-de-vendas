<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect(base_url('home'));
		}else{
			$data = array(
				'title'=>'Login'
			);
			$this->load->view('auth/index',$data);
		}
	}

	public function login(){

		$identity = $this->security->xss_clean($this->input->post('email'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$remember = FALSE; // remember the user

		if($this->ion_auth->login($identity, $password, $remember)){
			redirect(base_url('home'));
		}else{
			$this->session->set_flashdata('error','Error: wrong email or password');
			redirect(base_url('auth'));
		}
	}

	public function logout(){
		$this->ion_auth->logout();
		redirect(base_url('auth'));
	}
}
