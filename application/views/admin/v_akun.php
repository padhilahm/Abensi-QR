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
						<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
							<i class="fa fa-plus"></i>
							Add Row
						</button> -->

						<a href="<?= base_url() ?>admin/<?= $title; ?>_tambah" class="btn btn-primary btn-round ml-auto" ><i class="fa fa-plus"></i> Tambah <?= $title; ?></a>
					</div>
				</div>
				<div class="card-body">
					

					<div class="table-responsive">
						<table id="add-row" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th style="width: 5%;">No</th>
									<th>Username</th>
									<th>Role</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($akun_lihat as $akun) { ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $akun->username; ?></td>
										<td><?= $akun->role; ?></td>
										<td>
											<div class="form-button-action">
												<a href="<?= base_url() ?>admin/<?= $title; ?>_edit/<?= $akun->id_akun; ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit" data-original-title="Edit Task"></i></a>

												<?php if ($akun->id_akun != 1){ ?>

													<a onclick="confirmation(event)" class="btn btn-link btn-danger" href="<?= base_url(); ?>admin/<?= $title; ?>_hapus/<?= $akun->id_akun; ?>" data-original-title="Remove">
														<i class="fa fa-times"></i></a>
													<?php } ?>
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