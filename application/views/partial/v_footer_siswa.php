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


</div>
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

<script type="text/javascript" src="<?= base_url(); ?>assets/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/webcodecamjquery.js"></script>

<script>
	$('#lineChart').sparkline([102,109,120,99,110,105,115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#177dff',
		fillColor: 'rgba(23, 125, 255, 0.14)'
	});

	$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#f3545d',
		fillColor: 'rgba(243, 84, 93, .14)'
	});

	$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
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

		$('#add-row').DataTable({
			"pageLength": 5,
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


<script type="text/javascript">
	function scan_qr() {
		var button = document.getElementById("show_camera");
		var button_val = document.getElementById("show_camera").value;
		var kamera = document.getElementById("kamera");
		var kamera_select = document.getElementById("kamera_select");
		var kamera_gambar = document.getElementById("kamera_gambar");
		var arg = {
			resultFunction: function(result) {

				window.location.href = result.code;
			}
		};
		if (button_val == "show") {
			document.getElementById("show_camera").value = "hide"; 
			kamera_gambar.remove();
			// button.innerText = "Hide Camera";
			kamera.removeAttribute("hidden");
			kamera_select.removeAttribute("hidden");
			var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
			decoder.buildSelectMenu("select");
			decoder.play();

			$('select').on('change', function(){
				decoder.stop().play();
			});
		}
		// else if(button_val == "hide"){
		// 	document.getElementById("show_camera").value = "show"; 
		// 	button.innerText = "Open Camera";
		// 	kamera.setAttribute("hidden");
		// 	kamera_select.setAttribute("hidden");

		// }
		
	}
	
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