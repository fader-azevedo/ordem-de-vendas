<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Provider extends CI_Controller
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
			'title' => 'Providers',
			'styles' => array('vendor/datatables/dataTables.bootstrap4.min.css'),

			'scripts' =>
				array(
					'vendor/datatables/jquery.dataTables.min.js',
					'vendor/datatables/dataTables.bootstrap4.min.js',
					'vendor/datatables/app.js'
				),
			'menu_active' => 'menu-provider',
			'providers' => $this->core_model->get_all('fornecedores')
		);
		$this->load->view('provider/index', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('fornecedor_nome', '', 'trim|required|min_length[4]|max_length[45]');
		$this->form_validation->set_rules('fornecedor_sobrenome', '', 'trim|required|min_length[4]|max_length[45]');
		$this->form_validation->set_rules('fornecedor_data_nascimento', 'Data', 'trim|required');
		$this->form_validation->set_rules('fornecedor_email', '', 'trim|required|valid_email');
		$this->form_validation->set_rules('fornecedor_telefone', '', 'trim|max_length[45]');
		$this->form_validation->set_rules('fornecedor_celular', '', 'trim|max_length[45]');
		$this->form_validation->set_rules('fornecedor_cep', '', 'trim');
		$this->form_validation->set_rules('fornecedor_endereco', '', 'trim|required');
		$this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required');
		$this->form_validation->set_rules('fornecedor_complemento', '', 'trim|required|max_length[145]');
		$this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required');
		$this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
//		$this->form_validation->set_rules('fornecedor_ativo', '', 'trim|required|exact_length[1]');

		if ($this->form_validation->run()) {
//			echo "<prev>";
//			print_r($this->input->post());
//			exit();
//
			$data = elements(
				array(
					'fornecedor_nome',
					'fornecedor_tipo',
					'fornecedor_sobrenome',
					'fornecedor_data_nascimento',
					'fornecedor_email',
					'fornecedor_telefone',
					'fornecedor_celular',
					'fornecedor_endereco',
					'fornecedor_numero_endereco',
					'fornecedor_bairro',
					'fornecedor_complemento',
					'fornecedor_cidade',
					'fornecedor_estado',
					'fornecedor_ativo',
					'fornecedor_obs',
				),
				$this->input->post()
			);
			$data = html_escape($data);
			$this->core_model->insert('fornecedores', $data);
			redirect(base_url('provider'));
		} else {
			$data = array(
				'title' => 'Create provider',
				'menu_active' => 'menu-provider',
			);
			$this->load->view('provider/create', $data);
		}
	}

	public function edit($id = null)
	{
		$provider = $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $id));
		if (!$id || !$provider) {
			$this->session->set_flashdata('error', 'provider not found');
			redirect(base_url('provider'));
		} else {
			$this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('fornecedor_razao', '', 'trim|required|min_length[4]|max_length[45]');
			$this->form_validation->set_rules('fornecedor_email', '', 'trim|required|valid_email');
			$this->form_validation->set_rules('fornecedor_telefone', '', 'trim|max_length[45]');
			$this->form_validation->set_rules('fornecedor_celular', '', 'trim|max_length[45]');
			$this->form_validation->set_rules('fornecedor_endereco', '', 'trim|required');
			$this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required');
			$this->form_validation->set_rules('fornecedor_complemento', '', 'trim|required|max_length[145]');
			$this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required');
			$this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
			$this->form_validation->set_rules('fornecedor_ativo', '', 'trim|required|exact_length[1]');

			if ($this->form_validation->run()) {
				$data = elements(
					array(
						'fornecedor_nome_fantasia',
						'fornecedor_razao',
						'fornecedor_email',
						'fornecedor_telefone',
						'fornecedor_celular',
						'fornecedor_endereco',
						'fornecedor_numero_endereco',
						'fornecedor_bairro',
						'fornecedor_complemento',
						'fornecedor_cidade',
						'fornecedor_estado',
						'fornecedor_ativo',
						'fornecedor_obs',
					),
					$this->input->post()
				);
				$data = html_escape($data);
				$this->core_model->update('fornecedores', $data, array('fornecedor_id' => $id));
				redirect(base_url('provider'));
			} else {
				$data = array(
					'title' => 'Edit provider',
					'provider' => $provider,
					'menu_active' => 'menu-provider',
				);
				$this->load->view('provider/edit', $data);
			}
		}
	}

}
