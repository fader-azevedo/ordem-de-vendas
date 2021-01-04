<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<?php $this->load->view('layout/navbar') ?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page">Home</li>
		<li class="breadcrumb-item" aria-current="page">Users</li>
	</ol>
</nav>

<?php if($message = $this->session->flashdata('error')): ?>

<div class="row">
	<div class="col-md-12">
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong><i class="fa fa-exclamation-triangle">&nbsp;</i><?=$message?></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>

<?php endif;?>

<?php if($message = $this->session->flashdata('success')): ?>

<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong><i class="fa fa-smile-wink">&nbsp;</i><?=$message?></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>

<?php endif;?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users">&nbsp;</i>Users</h6>
	</div>
	<div class="card-body">
		<div class="row mb-lg-3 d-none">
			<div class="col-lg-6">
				<input type="text" class="form-control" placeholder="Search">
			</div>
			<div class="col-lg-6">
				<button class="btn btn-sm btn-outline-info mb-0 float-right"><i class="fa fa-user-plus">&nbsp;</i>Novo</button>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
				<thead>
				<tr>
					<th>Name</th>
					<th>Usename</th>
					<th>Email</th>
					<th>Office</th>
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
						<td><?= $user->company ?></td>
						<td>
							<p class="text-center m-0 p-0">
								<a title="Edit" href="<?=base_url('user/edit/'.$user->id)?>" class="btn btn-sm btn-primary"><i class="fa fa-edit">&nbsp;</i>Editar</a>
								<a title="Delete" href="" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i>&nbsp;Remover</a>
							</p>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('layout/footer') ?>
