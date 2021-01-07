<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			$this->session->set_flashdata('info','your session has expired');
			redirect(base_url('auth'));
		}
	}

	public function index()	{
		$data = array(
			'title' => 'Users',
			'styles' => array('vendor/datatables/dataTables.bootstrap4.min.css'),

			'scripts' =>
				array(
					'vendor/datatables/jquery.dataTables.min.js',
					'vendor/datatables/dataTables.bootstrap4.min.js',
					'vendor/datatables/app.js'
				),
			'menu_active' => 'menu-user',
			'sub_menu_active' => 'index',

			'users' => $this->ion_auth->users()->result()
		);
		$this->load->view('user/index', $data);
	}

	function create(){

		$this->form_validation->set_rules('first_name', '', 'trim|required');
		$this->form_validation->set_rules('last_name', '', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]');

		if($this->form_validation->run()){

			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$additional_data = array(
				'first_name' =>$this->input->post('email'),
				'last_name' => $this->input->post('email'),
				'active' => $this->input->post('active'),
				'username' => $this->input->post('username'),
			);

			$additional_data = $this->security->xss_clean($additional_data);
			$group = array($this->input->post('profile'));

			if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
				$this->session->set_flashdata('success', 'user created');
				redirect(base_url('user'));
			}else{
				$this->session->set_flashdata('error', 'error when try create user');
			}
		}else{
			$data = array(
				'title' => 'Create user',
				'menu_active' => 'menu-user',
				'sub_menu_active' => 'create',
			);
			$this->load->view('user/create', $data);
		}
	}

	public function show()
	{
		$data = array(
			'title' => 'Users show',
			'styles' => array('vendor/datatables/dataTables.bootstrap4.min.css'),

			'scripts' =>
				array(
					'vendor/datatables/jquery.dataTables.min.js',
					'vendor/datatables/dataTables.bootstrap4.min.js',
					'vendor/datatables/app.js'
				),
			'users' => $this->ion_auth->users()->result()
		);
		$this->load->view('user/index', $data);
	}


	public function edit($id = null)
	{
		if (!$id || !$this->ion_auth->user($id)->row()) {
			$this->session->set_flashdata('error', 'user not found');
			redirect(base_url('user'));
		} else {

			$this->form_validation->set_rules('first_name', '', 'trim|required');
			$this->form_validation->set_rules('last_name', '', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_check');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
			$this->form_validation->set_rules('password', 'password', 'min_length[5]|max_length[255]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]');

			if ($this->form_validation->run()) {
				$data = elements(
					array(
						'first_name',
						'last_name',
						'email',
						'username',
						'active',
						'password'
					),
					$this->input->post()
				);
				$data = $this->security->xss_clean($data);
				$password = $this->input->post('password'); //verifica se foi passado o password
				if(!$password){
					unset($data['password']);
				}

				if($this->ion_auth->update($id, $data)){
					$user_groups = $this->ion_auth->get_users_groups($id)->row();
					$profile_post = $this->input->post('profile');

//					update the group
					if($user_groups->id != $profile_post){
						$this->ion_auth->remove_from_group($user_groups->id, $id); //revoke user in group
						$this->ion_auth->add_to_group($profile_post, $id); //add user in group
					}
					$this->session->set_flashdata('success','user updated success');
				}else{
					$this->session->set_flashdata('error','error when try update user');
				}
				redirect(base_url('user'));
			} else {
				$data = array(
					'title' => 'Edit user',
					'user' => $this->ion_auth->user($id)->row(),
					'user_groups' => $this->ion_auth->get_users_groups($id)->row(),
					'groups' => $this->ion_auth->groups()->result()
				);
				$this->load->view('user/edit', $data);
			}
		}
	}

	public function delete($id = null){
		if (!$id || !$this->ion_auth->user($id)->row()) {
			$this->session->set_flashdata('error','user not found');
			redirect(base_url('user'));
		}
		if ($this->ion_auth->is_admin($id)) {
			$this->session->set_flashdata('error','admin can\'t be deleted');
			redirect(base_url('user'));
		}
		if ($this->ion_auth->delete_user($id)) {
			$this->session->set_flashdata('success','user removed successfully');
			redirect(base_url('user'));
		}else{
			$this->session->set_flashdata('error','any error...');
			redirect(base_url('user'));
		}
	}


	function email_check($email)
	{
		$id = $this->input->post('id');

		if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $id))) {
			$this->form_validation->set_message('email_check', 'This email already exist');
			return false;
		} else {
			return true;
		}
	}

	function username_check($username)
	{
		$id = $this->input->post('id');

		if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $id))) {
			$this->form_validation->set_message('username_check', 'This username already exist');
			return false;
		} else {
			return true;
		}
	}
}

//			echo "<prev>";
//			print_r($this->input->post());
//			exit();

//Array([first_name] => Admin [last_name] => istrator [email] => admin@admin . com [username] => administrator [active] => 1 [password] => [id] => 1 )
