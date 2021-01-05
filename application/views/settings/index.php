<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>
<?php $this->load->view('layout/navbar') ?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="fa fa-home">&nbsp;</i>Home</a></li>
		<li class="breadcrumb-item"><span><i class="fa fa-cogs">&nbsp;</i>System</span></li>
	</ol>
</nav>

<?php if ($message = $this->session->flashdata('error')): ?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong><i class="fa fa-exclamation-triangle">&nbsp;</i><?= $message ?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>

<?php endif; ?>

<?php if ($message = $this->session->flashdata('success')): ?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong><i class="fa fa-smile-wink">&nbsp;</i><?= $message ?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>

<?php endif; ?>

<div class="card shadow mb-4">
	<div class="card-body">
		<form method="post" name="form_index">
			<div class="row form-group">
				<div class="col-md-3">
					<label for="first_name">Razao social</label>
					<input type="text" class="form-control" id="sistema_razao_social" name="sistema_razao_social"
						   value="<?= $system->sistema_razao_social ?>">
					<?php echo form_error('sistema_razao_social', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="col-md-3">
					<label for="first_name">Nome fantasia</label>
					<input type="text" class="form-control" id="sistema_nome_fantasia" name="sistema_nome_fantasia"
						   value="<?= $system->sistema_nome_fantasia ?>">
					<?php echo form_error('sistema_nome_fantasia', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="col-md-3">
					<label for="first_name">cnpj</label>
					<input type="text" class="form-control" id="sistema_cnpj" name="sistema_cnpj"
						   value="<?= $system->sistema_cnpj ?>">
					<?php echo form_error('sistema_cnpj', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="col-md-3">
					<label for="first_name">ie</label>
					<input type="text" class="form-control" id="sistema_ie" name="sistema_ie"
						   value="<?= $system->sistema_ie ?>">
					<?php echo form_error('sistema_ie', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-3">
					<label for="first_name">Telefone fixo</label>
					<input type="text" class="form-control" id="sistema_telefone_fixo" name="sistema_telefone_fixo"
						   value="<?= $system->sistema_telefone_fixo ?>">
					<?php echo form_error('sistema_telefone_fixo', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="col-md-3">
					<label for="first_name">Telefone movel</label>
					<input type="text" class="form-control" id="sistema_telefone_movel" name="sistema_telefone_movel"
						   value="<?= $system->sistema_telefone_movel ?>">
					<?php echo form_error('sistema_telefone_movel', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="col-md-3">
					<label for="first_name">Email</label>
					<input type="text" class="form-control" id="sistema_email" name="sistema_email"
						   value="<?= $system->sistema_email ?>">
					<?php echo form_error('sistema_email', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="col-md-3">
					<label for="first_name">Site</label>
					<input type="text" class="form-control" id="sistema_site_url" name="sistema_site_url"
						   value="<?= $system->sistema_site_url ?>">
					<?php echo form_error('sistema_site_url', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-3">
					<label for="first_name">Endereco</label>
					<input type="text" class="form-control" id="sistema_endereco" name="sistema_endereco"
						   value="<?= $system->sistema_endereco ?>">
					<?php echo form_error('sistema_endereco', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="col-md-9">
					<div class="row">

						<div class="col-md-3">
							<label for="first_name">cep</label>
							<input type="text" class="form-control" id="sistema_cep" name="sistema_cep"
								   value="<?= $system->sistema_cep ?>">
							<?php echo form_error('sistema_cep', ' <small class="form-text text-danger">', '</small>') ?>
						</div>
						<div class="col-md-3">
							<label for="first_name">Numero</label>
							<input type="text" class="form-control" id="sistema_numero" name="sistema_numero"
								   value="<?= $system->sistema_numero ?>">
							<?php echo form_error('sistema_numero', ' <small class="form-text text-danger">', '</small>') ?>
						</div>
						<div class="col-md-3">
							<label for="first_name">Cidade</label>
							<input type="text" class="form-control" id="sistema_cidade" name="sistema_cidade"
								   value="<?= $system->sistema_cidade ?>">
							<?php echo form_error('sistema_cidade', ' <small class="form-text text-danger">', '</small>') ?>
						</div>
						<div class="col-md-3">
							<label for="first_name">Estado</label>
							<input type="text" class="form-control" id="sistema_estado" name="sistema_estado"
								   value="<?= $system->sistema_estado ?>">
							<?php echo form_error('sistema_estado', ' <small class="form-text text-danger">', '</small>') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<label for="sistema_txt_ordem_servico">Ordem de serviço</label>
					<textarea name="sistema_txt_ordem_servico" id="sistema_txt_ordem_servico" class="form-control" cols="30" rows="4"><?=$system->sistema_txt_ordem_servico?></textarea>
					<?php echo form_error('sistema_txt_ordem_servico', ' <small class="form-text text-danger">', '</small>') ?>
				</div>
			</div>
			<hr class="my-4">
			<button type="submit" class="btn btn-sm btn-success float-right"><i class="fa fa-save">&nbsp;</i>Update
			</button>
		</form>
	</div>
</div>
<?php $this->load->view('layout/footer') ?>
