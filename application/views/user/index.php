<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<?php $this->load->view('layout/navbar') ?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page">Home</li>
		<li class="breadcrumb-item" aria-current="page">Users</li>
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
		<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users">&nbsp;</i>Users
			<a href="<?= base_url('user/create') ?>" class="btn btn-sm btn-outline-info float-right"><i
					class="fa fa-user-plus">&nbsp;</i>New</a>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
				<thead>
				<tr>
					<th>Name</th>
					<th>Usename</th>
					<th>Email</th>
					<th>Active</th>
					<th>Profile</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user): ?>
					<p></p>
					<tr>
						<td><?= $user->first_name ?></td>
						<td><?= $user->username ?></td>
						<td><?= $user->email ?></td>
						<td class="text-center"><?= ($user->active == 1 ? '<span class="badge badge-info">Active</span>' : '<span class="badge badge-warning">Inactive</span>') ?></td>
						<td><?= ($this->ion_auth->is_admin($user->id) ? 'Administrator' : 'Seller') ?></td>
						<td>
							<p class="text-center m-0 p-0">
								<a title="Edit" href="<?= base_url('user/edit/' . $user->id) ?>"
								   class="btn btn-sm btn-outline-primary"><i class="fa fa-edit">&nbsp;</i>Editar</a>
								<button data-toggle="modal" data-target="#modal-delete" title="Delete"
										onclick="delete_user('<?= base_url('user/delete/' . $user->id) ?>')"
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
				<h5 class="modal-title" id="exampleModalLabel">Delete user?</h5>
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
    function delete_user(link) {
        document.getElementById('link-delete').href = link
    }
</script>
<?php $this->load->view('layout/footer') ?>
