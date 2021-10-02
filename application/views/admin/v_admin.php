<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
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
			<div class="row mt--2">

				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Statistik Absensi <?= tanggal(date('Y-m-d')); ?></div>
							<div class="card-category">Informasi harian tentang statistik dalam sistem</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-2"></div>
									<h6 class="fw-bold mt-3 mb-0">Hadir</h6>
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-3"></div>
									<h6 class="fw-bold mt-3 mb-0">Tidak Hadir</h6>
								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">
									<div id="circles-1"></div>
									<h6 class="fw-bold mt-3 mb-0">Total Siswa</h6>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-header">
							<div class="card-title">Aktivitas Absensi <?= tanggal(date('Y-m-d')); ?></div>
						</div>
						<div class="card-body">
							<ol class="activity-feed">
								<?php $no = 1; foreach ($aktivitas as $a){ ?>
									
								<li class="feed-item feed-item-<?php if ($no == 1) {
										echo "secondary";
									}elseif ($no == 2) {
										echo "success";
									}elseif ($no == 3) {
										echo "info";
									}elseif ($no == 4) {
										echo "warning";
									}elseif ($no == 5) {
										echo "danger";
									}else{
										echo "primary";
									} ?>">
									<time class="date" datetime="<?= $a->waktu; ?>"><?= $a->waktu; ?></time>
									<span class="text"><?= $a->nama_siswa; ?> kelas <font color="blue">"<?= $a->nama_kelas; ?>"</font></span>
								</li>
								<?php $no++; } ?>
								
							</ol>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

	<?php $this->load->view('partial/v_footer_admin'); ?>

	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:<?= $kehadiran->total; ?>,
			maxValue:<?= $kehadiran->total; ?>,
			width:7,
			text: <?= $kehadiran->total; ?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:<?= $kehadiran->hadir; ?>,
			maxValue:<?= $kehadiran->total; ?>,
			width:7,
			text: <?= $kehadiran->hadir; ?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:<?= $kehadiran->tidak_hadir; ?>,
			maxValue:<?= $kehadiran->total; ?>,
			width:7,
			text: <?= $kehadiran->tidak_hadir; ?>,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>