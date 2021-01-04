<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">POS<sup></sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?=base_url()?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Modulos
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-sales"
		   aria-expanded="true" aria-controls="collapse-sales">
			<i class="fas fa-shopping-cart"></i>
			<span>Vendas</span>
		</a>
		<div id="collapse-sales" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?=base_url('user')?>">List</a>
				<a class="collapse-item" href="<?=base_url('user/create')?>">New</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-parameter"
		   aria-expanded="true" aria-controls="collapse-parameter">
			<i class="fas fa-database"></i>
			<span>Cadastros</span>
		</a>
		<div id="collapse-parameter" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?=base_url('user')?>">List</a>
				<a class="collapse-item" href="<?=base_url('user/create')?>">New</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-stock"
		   aria-expanded="true" aria-controls="collapse-stock">
			<i class="fas fa-box"></i>
			<span>Estoque</span>
		</a>
		<div id="collapse-stock" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?=base_url('user')?>">List</a>
				<a class="collapse-item" href="<?=base_url('user/create')?>">New</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-financier"
		   aria-expanded="true" aria-controls="collapse-financier">
			<i class="fas fa-wallet"></i>
			<span>Financeiro</span>
		</a>
		<div id="collapse-financier" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?=base_url('user')?>">List</a>
				<a class="collapse-item" href="<?=base_url('user/create')?>">New</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-report"
		   aria-expanded="true" aria-controls="collapse-report">
			<i class="fas fa-shopping-cart"></i>
			<span>Relatorio</span>
		</a>
		<div id="collapse-report" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?=base_url('user')?>">List</a>
				<a class="collapse-item" href="<?=base_url('user/create')?>">New</a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Confiiguração
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
		   aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-users"></i>
			<span>Users</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?=base_url('user')?>">List</a>
				<a class="collapse-item" href="<?=base_url('user/create')?>">New</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">
			<i class="fas fa-tools"></i>
			<span>Sistema</span>
		</a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
