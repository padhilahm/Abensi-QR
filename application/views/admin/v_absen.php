<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Data <?= $title; ?></h2>
						<h5 class="text-white op-7 mb-2">Admin Dashboard Absensi</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
						<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
					</div>
				</div>
			</div>
		</div>

		<div class="page-inner mt--5">
			
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Data <?= $title ?></h4>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
								<i class="fa fa-plus"></i>
								Buat Absen
							</button>

							<!-- <a href="<?= base_url() ?>admin/<?= $title; ?>_tambah" class="btn btn-primary btn-round ml-auto" >Tambah <?= $title; ?></a> -->
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
												<?= $title; ?></span> 
												<span class="fw-light">
													Baru
												</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p class="small">tambahkan <?= $title ?> baru</p>
											<form method="post" action="<?= base_url() ?>admin/absen_tambah">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Tanggal absen</label>
															<input id="tanggal_absen" name="tanggal_absen" type="date" class="form-control" placeholder="Masukkan nama kelas">
														</div>
													</div>
													
												</div>

											</div>
											<div class="modal-footer no-bd">
												<input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
												<!-- <button type="button" id="addRowButton" class="btn btn-primary">Tambah</button> -->
												<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							

							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th width="5%">No</th>
											<th>Tanggal Absen</th>
											
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
							<!-- <tfoot>
								<tr>
									<th>Name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Action</th>
								</tr>
							</tfoot> -->
							<tbody>
								<?php $no = 1; 
								foreach ($absen_lihat as $absen) { ?>
									<tr>
										<td><?= $no; ?></td>

										<td><?php echo $absen->tanggal_absen_dibuka; ?></td>
										<td>
											<div class="form-button-action">
												<a href="<?= base_url() ?>home/absen/<?= encrypt_url($absen->id_absen_dibuka); ?>" target="blank" class="btn btn-link btn-primary btn-lg"><i class="fas fa-eye" data-original-title="Info"></i></a>

												<a href="<?= base_url() ?>admin/<?= $title; ?>_info/<?= $absen->id_absen_dibuka ?>" class="btn btn-link btn-primary btn-lg"><i class="fas fa-info-circle" data-original-title="Info"></i></a>

												<a onclick="confirmation(event)" class="btn btn-link btn-danger" href="<?= base_url(); ?>admin/<?= $title; ?>_hapus/<?= $absen->id_absen_dibuka ?>" data-original-title="Remove">
													<i class="fa fa-times"></i></a>

												</div>
											</td>
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