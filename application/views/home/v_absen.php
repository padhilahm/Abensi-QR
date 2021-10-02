<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Halaman Absen</h2>
						<h5 class="text-white op-7 mb-2">Silahkan Absen</h5>
					</div>
					
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">

			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<div class="card">

						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-lg-12">

									<div class="card-body">
										<div class="card-title">Absen <?= tanggal($absen_dikuka->tanggal_absen_dibuka); ?></div>
										<div class="card-category">Silahkan scan QR Code berikut pada aplikasi</div>
										<hr>
										<!-- <canvas class="form-control"></canvas>
											<select class="form-control"></select> -->
										<div class="form-control" id="qrcode" align="center"></div>
										<!-- <hr> -->
									</div>
								</div>


							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<input type="hidden" id="teks" value="<?= base_url() ?>siswa/absen/<?= $this->uri->segment(3); ?>">

		<?php $this->load->view('partial/v_footer_siswa'); ?>

		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-qrcode-0.18.0.js"></script>

		<script>
			$(document).ready(function() {
				var teks = document.getElementById('teks');

				$('#qrcode canvas').remove();
				$('#qrcode').qrcode({
					render: 'canvas',
					text: teks.value
				});

			});
		</script>