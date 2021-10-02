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
							<h4 class="card-title">Data <?= $title ?> <?= $tanggal_absen; ?></h4>

						<a href="<?= base_url() ?>admin/<?= $title; ?>" class="btn btn-primary btn-round ml-auto" > Kembali</a>
					</div>
				</div>
				<div class="card-body">
					

					<div class="table-responsive">
						<table id="add-row" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th>NIS</th>
									<th>Nama</th>
									<th>Kelas</th>
									
									<!-- <th style="width: 10%">Action</th> -->
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
								<?php foreach ($absen as $a) { ?>
									<tr>
										<td><?= $a->nis_siswa; ?></td>
										<td><?= $a->nama_siswa; ?></td>
										<td><?= $a->nama_kelas; ?></td>

									</tr>
								<?php } ?>
								
							</tbody>
						</table>

					</div>
					<!-- <div align="right">
						<a href="<?= base_url() ?>admin/<?= $title; ?>" class="btn btn-primary btn-round ml-auto" > Kembali</a>
					</div> -->
					
				</div>

			</div>
		</div>
	</div>

</div>