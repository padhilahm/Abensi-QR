<footer class="footer">
	<div class="container-fluid">
		<nav class="pull-left">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="https://padhil.my.id">
						padhil.my.id
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						Help
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						Licenses
					</a>
				</li>
			</ul>
		</nav>
		<div class="copyright ml-auto">
			<?= date('Y'); ?>, made with by <a href="https://padhil.my.id">padhil.my.id</a>
		</div>				
	</div>
</footer>

<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="<?= base_url(); ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?= base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url(); ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?= base_url(); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url(); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="<?= base_url(); ?>assets/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url(); ?>assets/js/setting-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/demo.js"></script>
<script>
	Circles.create({
		id:'circles-1',
		radius:45,
		value:60,
		maxValue:100,
		width:7,
		text: 5,
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
		value:70,
		maxValue:100,
		width:7,
		text: 36,
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
		value:40,
		maxValue:100,
		width:7,
		text: 12,
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



<script >
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});

		$('#multi-filter-select').DataTable( {
			"pageLength": 5,
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 10,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>

	<script>
		function confirmation(ev) {
			ev.preventDefault();
			var urlToRedirect = ev.currentTarget.getAttribute('href');
			console.log(urlToRedirect);
			swal({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				buttons:{
					confirm: {
						text : 'Yes, delete it!',
						className : 'btn btn-success'
					},
					cancel: {
						visible: true,
						className: 'btn btn-danger'
					}
				}
			})
			.then((willDelete) => {
				if (willDelete) {
					// swal({
					// 	title: 'Deleted!',
					// 	text: 'Your file has been deleted.',
					// 	type: 'success',
					// 	buttons : {
					// 		confirm: {
					// 			className : 'btn btn-success'
					// 		}
					// 	}
					// });
					window.location.href = urlToRedirect;
				} else {
					swal.close();
				}
			});
		}
	</script>

	<script>
		$('#role').on('change',
			function(){
				if ($(this).val() == 'siswa') {
					$('#siswa_hidden_nama').html(`
						<label>Nama</label>
						<input id="nama_siswa" name="nama_siswa" type="text" class="form-control" placeholder="Masukkan nama siswa">`);
					var siswa_hidden_nama_div = document.getElementById('siswa_hidden_nama_div');
					siswa_hidden_nama_div.classList.add('form-group', 'form-group-default');

					$('#siswa_hidden_nis').html(`<label>NIS</label>
						<input id="nis_siswa" name="nis_siswa" type="text" class="form-control" placeholder="Masukkan NIS">`);
					var siswa_hidden_nis_div = document.getElementById('siswa_hidden_nis_div');
					siswa_hidden_nis_div.classList.add('form-group', 'form-group-default');

					$('#siswa_hidden_kelas').html(`<label>Kelas</label>
						<select name="id_kelas" id="id_kelas" class="form-control" required="">
							<option value="">- Pilih Role -</option>
							<option value="3">Kelas 1</option>
							<option value="4">Kelas 2</option>
						</select>`);
					var siswa_hidden_kelas_div = document.getElementById('siswa_hidden_kelas_div');
					siswa_hidden_kelas_div.classList.add('form-group', 'form-group-default');

					$('#siswa_hidden_tanggal_lahir').html(`<label>Tanggal Lahir</label>
						<input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control" placeholder="Masukkan tanggal lahir">`);
					var siswa_hidden_tanggal_lahir_div = document.getElementById('siswa_hidden_tanggal_lahir_div');
					siswa_hidden_tanggal_lahir_div.classList.add('form-group', 'form-group-default');

				}else{
					// $('#siswa_hidden').html('');
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

		<?php if (isset($_GET['status']) && isset($_GET['data'])) { ?>

			<?php if ($_GET['status'] == 'sukses') { ?>
				<script>
					$(document).ready(function(){
						swal("Sukses", "Data berhasil di<?= $_GET['data']; ?>", {
							icon : "success",
							buttons: {        			
								confirm: {
									className : 'btn btn-success'
								}
							},
						});
					});
				</script>

			<?php }elseif ($_GET['status'] == 'gagal') { ?>
				<script>
					$(document).ready(function(){
						swal("Gagal", "Data gagal di<?= $_GET['data']; ?>", {
							icon : "error",
							buttons: {        			
								confirm: {
									className : 'btn btn-danger'
								}
							},
						});
					});
				</script>
			<?php } ?>

		<?php } ?>

	</body>
	</html>