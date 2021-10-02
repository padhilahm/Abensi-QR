<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Data <?= $title; ?></h2>
						<h5 class="text-white op-7 mb-2">Admin Dashboard Absensi</h5>
					</div>
					
				</div>
			</div>
		</div>

		<div class="page-inner mt--5">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Edit <?= $title; ?></h4>

						</div>
					</div>
					<div class="card-body">
						<!-- Modal -->
						<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
											New</span> 
											<span class="fw-light">
												Row
											</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

								</div>
							</div>
						</div>

						<form method="post" action="<?= base_url(); ?>admin/akun_edit/<?= $akun_lihat->id_akun; ?>">
							<div class="row">


								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Username</label>
										<input id="username" name="username" required="" type="text" class="form-control" placeholder="Masukkan Username" value="<?= $akun_lihat->username ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Password</label>
										<input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password">
									</div>
								</div>

								<?php if ($akun_lihat->id_akun == 1) { ?>
									<input type="hidden" name="role" id="role" value="admin">
								<?php }else{ ?>
									<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Role</label>

										<select name="role" id="role" class="form-control" required="">
											<option value="">- Pilih Role -</option>
											<option <?php if ($role_form == 'admin'): ?>
											selected
											<?php endif ?> value="admin">Admin</option>
											<option <?php if ($role_form == 'siswa'): ?>
											selected
											<?php endif ?> value="siswa">Siswa</option>
										</select>
									</div>
								</div>
								<?php } ?>

								<?php if ($role_form == 'siswa') { ?>
									<div class="col-sm-6">
										<div id="siswa_hidden_nama_div" class="form-group form-group-default">
											<div id="siswa_hidden_nama">
												<label>Nama</label>
												<input id="nama_siswa" required="" name="nama_siswa" type="text" class="form-control" placeholder="Masukkan nama siswa" value="<?= $akun_lihat->nama_siswa; ?>">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div id="siswa_hidden_nis_div" class="form-group form-group-default">
											<div id="siswa_hidden_nis">
												<label>NIS</label>
												<input id="nis_siswa" name="nis_siswa" required="" type="text" class="form-control" placeholder="Masukkan NIS" value="<?= $akun_lihat->nis_siswa; ?>">
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div id="siswa_hidden_kelas_div" class="form-group form-group-default">
											<div id="siswa_hidden_kelas">
												<label>Kelas</label>
												<select name="id_kelas" id="id_kelas" class="form-control" required="">
													<option value="">- Pilih Kelas -</option>
													<?php foreach($kelas_lihat as $kelas){ ?>
														<option <?php if ($kelas->id_kelas == $akun_lihat->id_kelas) { echo "selected"; } ?> value="<?= $kelas->id_kelas; ?>"><?= $kelas->nama_kelas; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div id="siswa_hidden_tanggal_lahir_div" class="form-group form-group-default">
											<div id="siswa_hidden_tanggal_lahir">
												<label>Tanggal Lahir</label>
												<input id="tangal_lahir" name="tanggal_lahir" required="" type="date" class="form-control" placeholder="Masukkan tanggal lahir" value="<?= $akun_lihat->tanggal_lahir; ?>">
											</div>
										</div>
									</div>
								<?php }else{ ?>
									<div class="col-sm-6">
										<div id="siswa_hidden_nama_div">
											<div id="siswa_hidden_nama">
											</div>
										</div>
									</div>

									<div class="col-md-6 pr-0">
										<div id="siswa_hidden_nis_div">
											<div id="siswa_hidden_nis">

											</div>
										</div>
									</div>

									<div class="col-md-6 pr-0">
										<div id="siswa_hidden_kelas_div">
											<div id="siswa_hidden_kelas">

											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div id="siswa_hidden_tanggal_lahir_div">
											<div id="siswa_hidden_tanggal_lahir">

											</div>

										</div>
									</div>
								<?php } ?>


							</div>

							<div align="right">
								<input type="submit" name="edit" class="btn btn-primary" value="Simpan">

								<a href="<?= base_url() ?>admin/<?= $title; ?>" class="btn btn-danger">Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php 	$this->load->view('partial/v_footer_admin'); ?>

	<script>
		$('#role').on('change', function(){
			if ($(this).val() == 'siswa') {
				$('#siswa_hidden_nama').html(`
					<label>Nama</label>
					<input id="nama_siswa" name="nama_siswa" required type="text" class="form-control" placeholder="Masukkan nama siswa" value="<?= $akun_lihat->nama_siswa; ?>">`);
				var siswa_hidden_nama_div = document.getElementById('siswa_hidden_nama_div');
				siswa_hidden_nama_div.classList.add('form-group', 'form-group-default');

				$('#siswa_hidden_nis').html(`<label>NIS</label>
					<input id="nis_siswa" name="nis_siswa" required type="text" class="form-control" placeholder="Masukkan NIS" value="<?= $akun_lihat->nis_siswa; ?>">`);
				var siswa_hidden_nis_div = document.getElementById('siswa_hidden_nis_div');
				siswa_hidden_nis_div.classList.add('form-group', 'form-group-default');

				$('#siswa_hidden_kelas').html(`<label>Kelas</label>
					<select name="id_kelas" id="id_kelas" class="form-control" required="">
					<option value="">- Pilih Kelas -</option>
					<?php foreach($kelas_lihat as $kelas){ ?>
						<option <?php if ($kelas->id_kelas == $akun_lihat->id_kelas) { echo "selected"; } ?> value="<?= $kelas->id_kelas; ?>"><?= $kelas->nama_kelas; ?></option>
					<?php } ?>
					</select>`);
				var siswa_hidden_kelas_div = document.getElementById('siswa_hidden_kelas_div');
				siswa_hidden_kelas_div.classList.add('form-group', 'form-group-default');

				$('#siswa_hidden_tanggal_lahir').html(`<label>Tanggal Lahir</label>
					<input id="tanggal_lahir" name="tanggal_lahir" required type="date" class="form-control" placeholder="Masukkan tanggal lahir" value="<?= $akun_lihat->tanggal_lahir; ?>">`);
				var siswa_hidden_tanggal_lahir_div = document.getElementById('siswa_hidden_tanggal_lahir_div');
				siswa_hidden_tanggal_lahir_div.classList.add('form-group', 'form-group-default');

			}else{
				$('#siswa_hidden_nama').html(``);
				var siswa_hidden_nama_div = document.getElementById('siswa_hidden_nama_div');
				siswa_hidden_nama_div.classList.remove('form-group', 'form-group-default');

				$('#siswa_hidden_nis').html(``);
				var siswa_hidden_nis_div = document.getElementById('siswa_hidden_nis_div');
				siswa_hidden_nis_div.classList.remove('form-group', 'form-group-default');

				$('#siswa_hidden_kelas').html(``);
				var siswa_hidden_kelas_div = document.getElementById('siswa_hidden_kelas_div');
				siswa_hidden_kelas_div.classList.remove('form-group', 'form-group-default');

				$('#siswa_hidden_tanggal_lahir').html(``);
				var siswa_hidden_tanggal_lahir_div = document.getElementById('siswa_hidden_tanggal_lahir_div');
				siswa_hidden_tanggal_lahir_div.classList.remove('form-group', 'form-group-default');
			}
		}
		)
	</script>