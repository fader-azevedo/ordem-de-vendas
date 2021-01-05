<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<?php $this->load->view('layout/navbar') ?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url('user') ?>"><i class="fa fa-user">&nbsp;</i>Users</a></li>
<!--		<li class="breadcrumb-item active" aria-current="page">--><?//= $title ?><!--</li>-->
	</ol>
</nav>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-plus">&nbsp;</i><?= $title ?>
			<a href="<?= base_url('user') ?>" class="btn btn-sm btn-outline-info float-right"><i
					class="fa fa-arrow-left">&nbsp;</i>Back</a>
		</h6>
	</div>
	<div class="card-body">
		<form name="form_edit" method="post">
			<div class="row form-group">
				<div class="col-md-4">
					<label for="first_name">First name</label>
					<input type="text" class="form-control" id="first_name" name="first_name">
					<?php echo form_error('first_name',' <small class="form-text text-danger">','</small>')?>
				</div>
				<div class="col-md-4">
					<label for="last_name">Last name</label>
					<input type="text" class="form-control" id="last_name" name="last_name">
					<?php echo form_error('last_name',' <small class="form-text text-danger">','</small>')?>
				</div>

				<div class="col-md-4">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email">
					<?php echo form_error('email',' <small class="form-text text-danger">','</small>')?>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-4">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username">
					<?php echo form_error('username',' <small class="form-text text-danger">','</small>')?>
				</div>

				<div class="col-md-4">
					<label for="active">Active</label>
					<select name="active" id="active" class="form-control">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</div>

				<div class="col-md-4">
					<label for="profile">Profile</label>
					<select name="profile" id="profile" class="form-control">
						<option value="1">Administrator</option>
						<option value="2">Seller</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password">
					<?php echo form_error('password',' <small class="form-text text-danger">','</small>')?>
				</div>
				<div class="col-md-6">
					<label for="passconf">Confirm password</label>
					<input type="password" class="form-control" id="passconf" name="passconf">
					<?php echo form_error('passconf',' <small class="form-text text-danger">','</small>')?>
				</div>
			</div>
			<button type="submit" class="btn btn-sm btn-success float-right"><i class="fa fa-save">&nbsp;</i>Save</button>
		</form>
	</div>
</div>

<?php $this->load->view('layout/footer') ?>
