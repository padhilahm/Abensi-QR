<div class="main-panel">
	<div class="content">
		<div class="page-inner">


			<!-- Customized Card -->
			<!-- <h4 class="page-title">Customized Card</h4> -->
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
								<h4 class="card-title">Data Absensi</h4>
						<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
							<i class="fa fa-plus"></i>
							Add Row
						</button> -->

						<!-- <a href="<?= base_url() ?>admin/<?= $title; ?>_tambah" class="btn btn-primary btn-round ml-auto" ><i class="fa fa-plus"></i> Tambah <?= $title; ?></a> -->
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
								<?php $no = 1; foreach ($absen_lihat as $absen) { ?>
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


</div>