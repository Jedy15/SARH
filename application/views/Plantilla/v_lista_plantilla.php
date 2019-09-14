<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SARH | General</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 

	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Google Font -->
	<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<?php if($this->session->flashdata("error")):?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Error!</h4>
		<?php echo $this->session->flashdata("error")?>
	</div>
<?php endif; ?>
<?php if($this->session->flashdata("Aviso")):?>
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Información sobre Actualizacion de Versión!</h4>
		<?php echo $this->session->flashdata("Aviso")?>
	</div>
<?php endif; ?>
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
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Plantilla General</h3>
								<div class="btn-group pull-right">
									<?php if ($this->session->userdata("IdPerfil")<=2) { ?>
										<a href="<?php echo base_url();?>Plantilla/RegistroNuevo" class="btn btn-primary"><i class="fa fa-user-plus"></i> Nuevo Personal</a>
									<?php } ?>
								</div>		
							</div>
							<div class="box-body table-responsive">
								<table id="example" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Acción</th>		
											<th>N° Expediente</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>RFC</th>
											<th>Código</th>
											<th>Desc Código</th>
											<th>Rama</th>
											<th>Fecha Ingreso</th>
											<th>Estatus</th>
											<th>Situación Laboral</th>
											<th>Unidad</th>
											<th>Jurisdicción</th>									
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

	</div>
	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
	<!-- page script -->
	<script>
		$(document).ready(function() {
			listar();
		});

		var listar=function(){
			var table = $('#example').DataTable({
				ajax: {
					url: '<?php echo base_url();?>Plantilla/CargarTodo',
					type: 'POST'
				},

				"scrollX": true,


				"columnDefs": [
				{ "searchable": false, "targets": 0 },
				{ "orderable": false, "targets": 0 }
				],


				columns: [
				{ 
					"data": null,
					"defaultContent": '<div class="text-center"><button type="button" class="editar btn btn-success btn-xs"><i class="fa fa-calendar-check-o"></i></button><button type="button" class="ver btn btn-primary btn-xs"><i class="fa fa-folder-open-o"></i></button></div>',
				},
				{ "data": "NumExp" },
				{ "data": "NOMBRES" },
				{ "data": "APELLIDOS" },
				{ "data": "RFC" },
				{ "data": "Codigo" },
				{ "data": "PUESTO" },
				{ "data": "RAMA" },
				{ "data": "FInicio" },
				{ "data": "Estatus" },
				{ "data": "TIPOTRABAJADOR" },
				{ "data": "NOMBREUNIDAD" },
				{ "data": "CLAVE_JURISDICCION" }
				],


				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				}
			});

			abrir_incidencias("#example tbody", table);
			abrir_expediente("#example tbody", table);
		}

		var abrir_incidencias = function(tbody, table){
			$(tbody).on('click', 'button.editar', function() {
				var data =table.row($(this).parents("tr")).data();
				var url = "<?php echo base_url(); ?>Incidencia/Control/"+data.IdPersonal; 
				$(location).attr('href',url);
			});
		}

		var abrir_expediente = function(tbody, table){
			$(tbody).on('click', 'button.ver', function() {
				var data =table.row($(this).parents("tr")).data();
				var url = "<?php echo base_url(); ?>Plantilla/ver/"+data.IdPersonal;
				window.open(url, '_blank');
			});
		}

	</script>
</body>
</html>