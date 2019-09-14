<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SARH | Plantilla Operativa</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> -->
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
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Personal Operativo</h3>
								<div class="btn-group pull-right">
									<?php if ($this->session->userdata("IdPerfil")<=2) { ?>
										<a href="<?php echo base_url();?>Plantilla/RegistroNuevo" class="btn btn-primary"><i class="fa fa-user-plus"></i> Nuevo Personal</a>
									<?php } ?>
								</div>								
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table id="example" class="table table-bordered table-striped">
									<thead>
										<tr>
											<?php if ($this->session->userdata('IdPerfil')<=3) { ?>
												<th>Acción</th>
											<?php } ?>												
											<th>N° Tarjeta</th>
											<th>N° Expediente</th>
											<th>RFC</th>
											<th>CURP</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>Turno</th>
											<th>Departamento</th>
											<th>Servicio</th>
											<th>Función</th>
											<th>Desc. Codigo</th>
											<th>Rama</th>
											<th>Registro Asistencia</th>
											<th>Estatus</th>
											<th>Situacion Laboral</th>
										</tr>
									</thead>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		
		<?php $this->load->view('layout/footer_v2'); ?>

	</div>
	<!-- ./wrapper -->
	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery-3.3.1.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
					url: '<?php echo base_url();?>Plantilla/CargarOperativo',
					type: 'POST'
				},

				"scrollX": true,

				"columnDefs": [
				{ "searchable": false, "targets": 0 },
				{ "orderable": false, "targets": 0 }
				],

				columns: [
				<?php if ($this->session->userdata('IdPerfil')<=3) { ?>
					{ 
						"data": null,
						"defaultContent": '<div class="text-center"><button type="button" class="editar btn btn-success btn-xs"><i class="fa fa-calendar-check-o"></i></button><button type="button" class="ver btn btn-primary btn-xs"><i class="fa fa-folder-open-o"></i></button></div>',
					},
				<?php } ?>
				{ "data":"NTarjeta",
				"render": function ( data, type, row, meta ) {
					return 'T'+data;
				}},
				{ "data": "NumExp" },
				{ "data": "RFC" },
				{ "data": "CURP" },
				{ "data": "NOMBRES" },
				{ "data": "APELLIDOS" },
				{ "data": "Turno" },
				{ "data": "DEPARTAMENTO" },
				{ "data": "Servicio" },
				{ "data": "Funcion" },
				{ "data": "PUESTO" },
				{ "data": "RAMA" },
				{ "data": "TIPOREGISTRO" },
				{ "data": "Estatus" },
				{ "data": "TIPOTRABAJADOR" }					
				],

				// "order":  [ 1, 'asc' ],


				<?php if ($this->session->userdata('IdPerfil')<=3) { ?>

					dom: 'lBfrtip',
					buttons: [
					{
						extend: 'colvis',
						text:      '<i class="fa fa-columns"></i>',
						titleAttr: 'Editar Columnas',
						className: 'btn btn-warning',
						columnText: function ( dt, idx, title ) {
							return (idx+1)+': '+title;
						}
					},
					{
						extend:    'excelHtml5',
						text:      '<i class="fa fa-file-excel-o"></i>',
						className: 'btn btn-success',
						titleAttr: 'Exportar a Excel',
						exportOptions: {
							columns: ':visible'
						}
					},
					{
						extend:    'pdfHtml5',
						text:      '<i class="fa fa-file-pdf-o"></i>',
						titleAttr: 'Exportar a PDF',
						className: 'btn btn-danger',
						exportOptions: {
							columns: ':visible'
						}
					},
					{
						extend: 'print',
						text:      '<i class="fa fa-print"></i>',
						titleAttr: 'Imprimir',
						className: 'btn btn-info',
						exportOptions: {
							columns: ':visible'
						}
					}
					],
				<?php } ?>



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