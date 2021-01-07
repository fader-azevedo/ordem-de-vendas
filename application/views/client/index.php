<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<?php $this->load->view('layout/navbar') ?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-white shadow">
		<li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="fa fa-home">&nbsp;</i>Home</a></li>
		<li class="breadcrumb-item"><span><?=$title?></span></li>
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
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			<a href="<?= base_url('client/create') ?>" class="btn btn-sm btn-outline-info float-right"><i
					class="fa fa-user-plus">&nbsp;</i>New</a>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
				<thead>
				<tr>
					<th>Full name</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Active</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($clients as $client): ?>
					<tr>
						<td><?= $client->cliente_nome.' '.$client->cliente_sobrenome ?></td>
						<td><?= $client->cliente_celular ?></td>
						<td><?= $client->cliente_email ?></td>
						<td class="text-center"><?= ($client->cliente_ativo == 1 ? '<span class="badge badge-info">Active</span>' : '<span class="badge badge-warning">Inactive</span>') ?></td>
						<td>
							<p class="text-center m-0 p-0">
								<a title="Edit" href="<?= base_url('client/edit/' . $client->cliente_id) ?>"
								   class="btn btn-sm btn-outline-primary"><i class="fa fa-edit">&nbsp;</i>Editar</a>
								<button data-toggle="modal" data-target="#modal-delete" title="Delete"
										onclick="delete_client('<?= base_url('client/delete/' . $client->cliente_id) ?>')"
										class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-alt"></i>&nbsp;Remover
								</button>
							</p>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete client?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body text-center">Select "Delete" below if you are want delete user</div>
			<div class="modal-footer d-flex justify-content-between">
				<button class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Cancel
				</button>
				<a class="btn btn-sm btn-outline-danger float-right" href="" id="link-delete"><i class="fa fa-trash-alt">&nbsp;</i>Delete</a>
			</div>
		</div>
	</div>
</div>

<script>
    function delete_client(link) {
        document.getElementById('link-delete').href = link
    }
</script>
<?php $this->load->view('layout/footer') ?>
