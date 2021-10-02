<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2">Absen Siswa</h5>
					</div>
					<!-- <div class="ml-md-auto py-2 py-md-0">
						<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
						<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
					</div> -->
				</div>
			</div>
		</div>


		<div class="page-inner mt--5">
			

			<div class="row">
				
				<div class="col-md-4">
					<div class="card card-profile">
						<div class="card-header" style="background-image: url('<?= base_url(); ?>assets/img/blogpost.jpg')">
							<div class="profile-picture">
								<div class="avatar avatar-xl">
									<img src="<?= base_url(); ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="user-profile text-center">
								<div class="name"><?= $siswa_info->nama_siswa; ?></div>
								<div class="job"><?= $siswa_info->nis_siswa; ?></div>
								<div class="desc"><?= $siswa_info->nama_kelas; ?></div>
								<div class="social-media">
									<a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
										<span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
									</a>
									<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
										<span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
									</a>
									<a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
										<span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
									</a>
									<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
										<span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
									</a>
								</div>
								<!-- <div class="view-profile">
									<a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
								</div> -->
							</div>
						</div>
						<div class="card-footer">
							<div class="row user-stats text-center">
								<div class="col">
									<div class="number"><?= $siswa_info->kehadiran ?></div>
									<div class="title">Kehadiran</div>
								</div>
								<div class="col">
									<div class="number"><?= $siswa_info->tidak_hadir ?></div>
									<div class="title">Tidak hadir</div>
								</div>
								<div class="col">
									<div class="number"><?= $siswa_info->jumlah_absen ?></div>
									<div class="title">Total</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Edit Profile</h4>

							</div>
						</div>
						<div class="card-body">


							<form method="post" action="<?= base_url(); ?>siswa/profile">
								<div class="row">

									<div class="col-md-6 pr-0">
										<div class="form-group form-group-default">
											<label>Username</label>
											<input id="username" name="username" type="text" class="form-control" placeholder="Masukkan Username" readonly="" value="<?= $siswa_info->username; ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group form-group-default">
											<label>Password</label>
											<input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password" value="">
										</div>
									</div>

									<div class="col-sm-6">
										<div id="siswa_hidden_nama_div" class="form-group form-group-default">
											<div id="siswa_hidden_nama">
												<label>Nama</label>
												<input id="nama_siswa" required="" name="nama_siswa" type="text" class="form-control" placeholder="Masukkan nama siswa" value="<?= $siswa_info->nama_siswa ?>">
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div id="siswa_hidden_nis_div" class="form-group form-group-default">
											<div id="siswa_hidden_nis">
												<label>NIS</label>
												<input id="nis_siswa" name="nis_siswa" required="" type="text" class="form-control" placeholder="Masukkan NIS" value="<?= $siswa_info->nis_siswa; ?>">
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div id="siswa_hidden_tanggal_lahir_div" class="form-group form-group-default">
											<div id="siswa_hidden_tanggal_lahir">
												<label>Tanggal Lahir</label>
												<input id="tangal_lahir" name="tanggal_lahir" required="" type="date" class="form-control" placeholder="Masukkan tanggal lahir" value="<?= $siswa_info->tanggal_lahir; ?>">
											</div>
										</div>
									</div>

								</div>
								<div align="right">
									<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">

									<a href="<?= base_url() ?>siswa" class="btn btn-danger">Kembali</a>
								</div>
							</form>
						</div>

					</div>

				</div>
			</div>