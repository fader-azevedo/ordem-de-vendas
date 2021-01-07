<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info','your session has expired');
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('sistema_razao_social', '', 'required');
		$this->form_validation->set_rules('sistema_nome_fantasia', '', 'required');
		$this->form_validation->set_rules('sistema_cnpj', '', 'required');
		$this->form_validation->set_rules('sistema_ie', '', 'required');
		$this->form_validation->set_rules('sistema_telefone_fixo', '', 'required');
		$this->form_validation->set_rules('sistema_telefone_movel', '', 'required');
		$this->form_validation->set_rules('sistema_email', '', 'required');
		$this->form_validation->set_rules('sistema_site_url', '', 'required');
		$this->form_validation->set_rules('sistema_cep', '', 'required');
		$this->form_validation->set_rules('sistema_endereco', '', 'required');
		$this->form_validation->set_rules('sistema_numero', '', 'required');
		$this->form_validation->set_rules('sistema_cidade', '', 'required');
		$this->form_validation->set_rules('sistema_estado', '', 'required|max_length[2]');
		$this->form_validation->set_rules('sistema_txt_ordem_servico', '', 'required');

		if ($this->form_validation->run()) {
			$data = elements(
				array(
					'sistema_razao_social',
					'sistema_nome_fantasia',
					'sistema_cnpj',
					'sistema_ie',
					'sistema_telefone_fixo',
					'sistema_telefone_movel',
					'sistema_email',
					'sistema_site_url',
					'sistema_cep',
					'sistema_endereco',
					'sistema_numero',
					'sistema_cidade',
					'sistema_estado',
					'sistema_txt_ordem_servico',
				),
				$this->input->post()
			);
//			$data = $this->security->xss_clean($data);
			$data = html_escape($data); //not allow text with tags
			$this->core_model->update('sistema', $data, array('sistema_id' => 1));
			redirect(base_url('settings'));
		} else {
			$data = array(
				'title' => 'System',
				'scripts' => array(
					'vendor/mask/jquery.mask.min.js',
					'vendor/mask/app.js',
				),
				'menu_active' => 'menu-system',

				'system' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1))
			);
			$this->load->view('settings/index', $data);
		}
	}
}
