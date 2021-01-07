<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'your session has expired');
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$data = array(
			'title' => 'Clients',
			'styles' => array('vendor/datatables/dataTables.bootstrap4.min.css'),

			'scripts' =>
				array(
					'vendor/datatables/jquery.dataTables.min.js',
					'vendor/datatables/dataTables.bootstrap4.min.js',
					'vendor/datatables/app.js'
				),
			'menu_active' => 'menu-client',
			'clients' => $this->core_model->get_all('clientes')
		);
		$this->load->view('client/index', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('cliente_nome', '', 'trim|required|min_length[4]|max_length[45]');
		$this->form_validation->set_rules('cliente_sobrenome', '', 'trim|required|min_length[4]|max_length[45]');
		$this->form_validation->set_rules('cliente_data_nascimento', 'Data', 'trim|required');
		$this->form_validation->set_rules('cliente_email', '', 'trim|required|valid_email');
		$this->form_validation->set_rules('cliente_telefone', '', 'trim|max_length[45]');
		$this->form_validation->set_rules('cliente_celular', '', 'trim|max_length[45]');
		$this->form_validation->set_rules('cliente_cep', '', 'trim');
		$this->form_validation->set_rules('cliente_endereco', '', 'trim|required');
		$this->form_validation->set_rules('cliente_numero_endereco', '', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('cliente_bairro', '', 'trim|required');
		$this->form_validation->set_rules('cliente_complemento', '', 'trim|required|max_length[145]');
		$this->form_validation->set_rules('cliente_cidade', '', 'trim|required');
		$this->form_validation->set_rules('cliente_estado', '', 'trim|required|exact_length[2]');
//		$this->form_validation->set_rules('cliente_ativo', '', 'trim|required|exact_length[1]');

		if ($this->form_validation->run()) {
//			echo "<prev>";
//			print_r($this->input->post());
//			exit();
//
			$data = elements(
				array(
					'cliente_nome',
					'cliente_tipo',
					'cliente_sobrenome',
					'cliente_data_nascimento',
					'cliente_email',
					'cliente_telefone',
					'cliente_celular',
					'cliente_endereco',
					'cliente_numero_endereco',
					'cliente_bairro',
					'cliente_complemento',
					'cliente_cidade',
					'cliente_estado',
					'cliente_ativo',
					'cliente_obs',
				),
				$this->input->post()
			);
			$data = html_escape($data);
			$this->core_model->insert('clientes', $data);
			redirect(base_url('client'));
		} else {
			$data = array(
				'title' => 'Create client',
				'menu_active' => 'menu-client',
			);
			$this->load->view('client/create', $data);
		}
	}

	public function edit($id = null)
	{
		$client = $this->core_model->get_by_id('clientes', array('cliente_id' => $id));
		if (!$id || !$client) {
			$this->session->set_flashdata('error', 'client not found');
			redirect(base_url('client'));
		} else {
			$this->form_validation->set_rules('cliente_nome', '', 'trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('cliente_sobrenome', '', 'trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('cliente_data_nascimento', 'Data', 'trim|required');
			$this->form_validation->set_rules('cliente_email', '', 'trim|required|valid_email');
			$this->form_validation->set_rules('cliente_telefone', '', 'trim|max_length[45]');
			$this->form_validation->set_rules('cliente_celular', '', 'trim|max_length[45]');
			$this->form_validation->set_rules('cliente_endereco', '', 'trim|required');
			$this->form_validation->set_rules('cliente_numero_endereco', '', 'trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('cliente_bairro', '', 'trim|required');
			$this->form_validation->set_rules('cliente_complemento', '', 'trim|required|max_length[145]');
			$this->form_validation->set_rules('cliente_cidade', '', 'trim|required');
			$this->form_validation->set_rules('cliente_estado', '', 'trim|required|exact_length[2]');
			$this->form_validation->set_rules('cliente_ativo', '', 'trim|required|exact_length[1]');

			if ($this->form_validation->run()) {
				$data = elements(
					array(
						'cliente_nome',
						'cliente_tipo',
						'cliente_sobrenome',
						'cliente_data_nascimento',
						'cliente_email',
						'cliente_telefone',
						'cliente_celular',
						'cliente_endereco',
						'cliente_numero_endereco',
						'cliente_bairro',
						'cliente_complemento',
						'cliente_cidade',
						'cliente_estado',
						'cliente_ativo',
						'cliente_obs',
					),
					$this->input->post()
				);
				$data = html_escape($data);
				$this->core_model->update('clientes', $data, array('cliente_id' => $id));
				redirect(base_url('client'));
			} else {
				$data = array(
					'title' => 'Edit client',
					'client' => $client,
					'menu_active' => 'menu-client',
				);
				$this->load->view('client/edit', $data);
			}
		}
	}
}
