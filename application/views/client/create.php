<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<?php $this->load->view('layout/navbar') ?>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="fa fa-home">&nbsp;</i>Home</a></li>
		<li class="breadcrumb-item"><?= $title ?></li>
	</ol>
</nav>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-edit">&nbsp;</i><?= $title ?>
			<a href="<?= base_url('client') ?>" class="btn btn-sm btn-outline-info float-right"><i
					class="fa fa-arrow-left">&nbsp;</i>Back</a>
		</h6>
	</div>
	<div class="card-body">
		<form name="form_edit" method="post">
			<fieldset class="border p-lg-2 shadow-sm mb-lg-4">
				<legend class="bg-gray-100 shadow-sm text-center py-lg-1" style="font-size: 16px"><i
						class="fa fa-user-tie">&nbsp;</i><strong class="font-small">personal data</strong></legend>
				<div class="row form-group">
					<div class="col-md-4">
						<label for="cliente_nome">Nome</label>
						<input type="text" class="form-control" id="cliente_nome" name="cliente_nome"
							>
						<?php echo form_error('cliente_nome', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
					<div class="col-md-4">
						<label for="cliente_sobrenome">Sobre nome</label>
						<input type="text" class="form-control" id="cliente_sobrenome" name="cliente_sobrenome"
							  >
						<?php echo form_error('cliente_sobrenome', ' <small class="form-text text-danger">', '</small>') ?>
					</div>

					<div class="col-md-4">
						<label for="cliente_data_nascimento">Data de nascimento</label>
						<input type="date" class="form-control" id="cliente_data_nascimento"
							   name="cliente_data_nascimento"
							   >
						<?php echo form_error('cliente_data_nascimento', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<label for="cliente_email">Email</label>
						<input type="text" class="form-control" id="cliente_email" name="cliente_email"
							   >
						<?php echo form_error('cliente_email', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
					<div class="col-md-4">
						<label for="cliente_telefone">Telefone</label>
						<input type="text" class="form-control" id="cliente_telefone" name="cliente_telefone"
							   >
						<?php echo form_error('cliente_telefone', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
					<div class="col-md-4">
						<label for="cliente_celular">Celular</label>
						<input type="text" class="form-control" id="cliente_celular" name="cliente_celular"
							 >
						<?php echo form_error('cliente_celular', ' <small class="form-text text-danger">', '</small>') ?>
					</div>

				</div>

			</fieldset>
			<fieldset class="border p-lg-2 shadow-sm mb-lg-3">
				<legend class="bg-gray-100  shadow-sm text-center py-lg-1" style="font-size: 16px"><i
						class="fa fa-map-marked-alt">&nbsp;</i><strong class="font-small">Address information</strong></legend>

				<div class="row form-group">
					<div class="col-md-4">
						<label for="cliente_endereco">Endereco</label>
						<input type="text" class="form-control" id="cliente_endereco" name="cliente_endereco"
							   value="">
						<?php echo form_error('cliente_endereco', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
					<div class="col-md-4">
						<label for="cliente_numero_endereco">Nº de endereço</label>
						<input type="text" class="form-control" id="cliente_numero_endereco"
							   name="cliente_numero_endereco">
						<?php echo form_error('cliente_numero_endereco', ' <small class="form-text text-danger">', '</small>') ?>
					</div>

					<div class="col-md-4">
						<label for="cliente_complemento">Complemento</label>
						<input type="text" class="form-control" id="cliente_complemento" name="cliente_complemento"
							  >
						<?php echo form_error('cliente_complemento', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<label for="cliente_cidade">Cidade</label>
						<input type="text" class="form-control" id="cliente_cidade" name="cliente_cidade"
							   >
						<?php echo form_error('cliente_cidade', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
					<div class="col-md-4">
						<label for="cliente_estado">Estado</label>
						<input type="text" class="form-control" id="cliente_estado" name="cliente_estado"
							   >
						<?php echo form_error('cliente_estado', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
					<div class="col-md-4">
						<label for="cliente_bairro">Bairro</label>
						<input type="text" class="form-control" id="cliente_bairro" name="cliente_bairro"
							   >
						<?php echo form_error('cliente_bairro', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
			</fieldset>
			<fieldset class="border px-lg-3 shadow-sm mb-lg-3">
				<legend class="bg-gray-100  shadow-sm w-auto px-3 py-2" style="font-size: 16px"><i
						class="fa fa-map-marked-alt">&nbsp;</i><strong class="font-small">Additional info</strong>
				</legend>
				<div class="row form-group">
					<div class="col-md-4">
						<label for="cliente_ativo">Ativo</label>
						<select name="cliente_ativo" id="cliente_ativo" class="form-control">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
						<?php echo form_error('cliente_ativo', ' <small class="form-text text-danger">', '</small>') ?>
					</div>
					<div class="col-md-8">
						<label for="cliente_obs">Obesrvação</label>
						<textarea name="cliente_obs" id="cliente_obs" rows="3" class="form-control"></textarea>
					</div>
				</div>
			</fieldset>
			<button type="submit" class="btn btn-sm btn-success float-right"><i class="fa fa-save">&nbsp;</i>Save
			</button>
		</form>
	</div>
</div>
<?php $this->load->view('layout/footer') ?>
