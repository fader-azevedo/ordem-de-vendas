<?php $this->load->view('layout/header') ?>

<div class="container h-100 mt-lg-5 pt-5">

	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg"  style="margin-top: 6em !important;">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<?php if ($message = $this->session->flashdata('error')): ?>
								<div class="pr-lg-3 pt-lg-3">
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong><i class="fa fa-exclamation-triangle">&nbsp;</i><?= $message ?>
										</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
							<?php endif; ?>
							<div class="px-4 py-5">
								<div class="text-center">
									<h2 class="h4 text-gray-900 mb-4">Seja bem vindo!</h2>
								</div>
								<form class="user" name="form_auth" method="post" action="<?=base_url('auth/login')?>">
									<div class="form-group">
										<input type="email" class="form-control form-control-user" id="email" value="admin@admin.com"
											   name="email" placeholder="Email or username">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password"
											   name="password" placeholder="password" value="password">
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block mt-4">
										Login&nbsp;<i class="fa fa-sign-in-alt"></i>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php $this->load->view('layout/footer') ?>
