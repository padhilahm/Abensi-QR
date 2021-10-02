<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?= base_url(); ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?= $nama_siswa; ?>
							<span class="user-level"><?= $username; ?></span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="<?= base_url(); ?>siswa/profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>siswa/profile">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url(); ?>home/logout">
									<span class="link-collapse">Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="<?= base_url(); ?>" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="dashboard">
						
					</div>
				</li>
				<!-- <li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Components</h4>
				</li>

				<li class="nav-item submenu">
					<a data-toggle="collapse" href="#sidebarLayouts">
						<i class="fas fa-th-list"></i>
						<p>Sidebar Layouts</p>
						<span class="caret"></span>
					</a>
					<div class="collapse show" id="sidebarLayouts">
						<ul class="nav nav-collapse">
							<li>
								<a href="sidebar-style-1.html">
									<span class="sub-item">Sidebar Style 1</span>
								</a>
							</li>
							<li class="">
								<a href="overlay-sidebar.html">
									<span class="sub-item">Overlay Sidebar</span>
								</a>
							</li>
							<li>
								<a href="compact-sidebar.html">
									<span class="sub-item">Compact Sidebar</span>
								</a>
							</li>
							<li>
								<a href="static-sidebar.html">
									<span class="sub-item">Static Sidebar</span>
								</a>
							</li>
							<li>
								<a href="icon-menu.html">
									<span class="sub-item">Icon Menu</span>
								</a>
							</li>
						</ul>
					</div>
				</li> -->
			</ul>
		</div>
	</div>
</div>
		<!-- End Sidebar -->