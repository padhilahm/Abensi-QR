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
							Admin
							<span class="user-level">Administrator</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="#settings">
									<span class="link-collapse">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item <?php if($title == 'beranda'){echo "active";} ?>">
					<a href="<?= base_url() ?>admin" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="dashboard">
						
					</div>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Components</h4>
				</li>

				<li class="nav-item submenu <?php if($title == 'siswa' or $title == 'absen' or $title == 'akun' or $title == 'kelas'){echo "active";} ?>">
					<a data-toggle="collapse" href="#sidebarLayouts">
						<i class="fas fa-th-list"></i>
						<p>Data</p>
						<span class="caret"></span>
					</a>
					<div class="collapse show" id="sidebarLayouts">
						<ul class="nav nav-collapse">
							
							<li <?php if($title == 'absen'){echo "class='active'";} ?>>
								<a href="<?= base_url() ?>admin/absen">
									<span class="sub-item">Absen</span>
								</a>
							</li>
							<li <?php if($title == 'akun'){echo "class='active'";} ?>>
								<a href="<?= base_url() ?>admin/akun">
									<span class="sub-item">Akun</span>
								</a>
							</li>
							<li <?php if($title == 'kelas'){echo "class='active'";} ?>>
								<a href="<?= base_url() ?>admin/kelas">
									<span class="sub-item">Kelas</span>
								</a>
							</li>
							<li <?php if($title == 'siswa'){echo "class='active'";} ?>>
								<a href="<?= base_url() ?>admin/siswa">
									<span class="sub-item">Siswa</span>
								</a>
							</li>
							
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
		<!-- End Sidebar -->