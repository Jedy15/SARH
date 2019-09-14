<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SARH | Oraculo</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">	

	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Google Font -->
	<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
	<div class="wrapper">
		<?php
		$this->load->view('layout/main_header');

		$this->load->view('layout/aside');
		?>
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-info box-solid">
							<div class="box-header">
								<h3 class="box-title">Monitor de Sistema</h3>
							</div>
							<div class="box-body table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover" style="width:100%"><!--   -->
									<thead>
										<tr>
											<th>#</th>
											<th>Usuario</th>
											<th>Accion</th>
											<th>Tabla</th>													
											<th>Fecha/Hora</th>
											<th>Nota</th> 
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php $this->load->view('layout/footer_v2'); ?>

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->

	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	<!-- <script src="<?php //echo base_url(); ?>assets/bower_components/jquery/dist/jquery-3.3.1.js"></script> -->
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

	<!-- SlimScroll -->
	<!-- <script src="<?php //echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
	<!-- FastClick -->
	<!-- <script src="<?php //echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script> -->
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?php //echo base_url(); ?>assets/dist/js/demo.js"></script> -->
	<!-- page script -->
	<script>
		$(document).ready(function() {
			listar();
		});

		var listar=function(){
			var table = $('#example').DataTable({
				ajax: {
					url: '<?php echo base_url();?>Administrar/CargarMonitor',
					type: 'POST'
				},

				"columnDefs": [
				// { "searchable": false, "targets": 5 },
				{ "orderable": false, "targets": 5 }
				],

				columns: [
				{ "data": "Id" },
				{ "data": "Usuario" },
				{ "data": "accion" },
				{ "data": "Tabla" },
				{ "data": "Fecha" },
				{ "data": "nota" }
				],

				"order": [[ 0, 'desc' ]],

				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				}
			});
		}





	</script>
</body>
</html>