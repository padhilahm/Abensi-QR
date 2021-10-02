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
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Absen <?= tanggal(date('Y-m-d')) ?></div>
							<div class="card-category">
								<?php if ($status_absen == 'sudah') {  ?>
									<div style="color: green;">
										Kamu sudah absen
									</div>
								<?php }else{ ?>
									<div style="color: red;">
										Kamu belum absen, silahkan scan QR yang tersedia
									</div>
								<?php } ?>
								
							</div>
							<hr>
							<button value="show" id="show_camera" class="form-control btn btn-info" onclick="scan_qr()">Show Camera</button>
							<canvas class="form-control" id="kamera" hidden=""></canvas>
							
							<img src="<?= base_url() ?>assets/img/kamera.png" class="form-control" onclick="scan_qr()" id="kamera_gambar">

							<select class="form-control" id="kamera_select" hidden=""></select>
							<hr>
						</div>
					</div>
				</div>


				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Absensi</h4>

							</div>
						</div>
						<div class="card-body">


							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th width="5%">No</th>
											<th>Tanggal</th>
											<th>Keterangan</th>

										</tr>
									</thead>

									<tbody>
										<?php $no = 1; foreach ($absen_lihat as $absen) {  ?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= $absen->tanggal_absen_dibuka; ?></td>
												<td><?= $absen->kehadiran; ?></td>

											</tr>
											<?php $no++; } ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					
				</div>
			</div>