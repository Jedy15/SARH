<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SARH | Tipo Incidencia</title>
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
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
	<!-- https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css -->
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  	<!-- Morris chart -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  	<!-- jvectormap -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  	<!-- Date Picker -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
		<h4><i class="icon fa fa-upload"></i> Exito!</h4>
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
								<i class="ion ion-clipboard"></i>
								<h3 class="box-title">Tipo de Incidencia</h3>
								<button type="button" id="add" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-nuevo"><i class="fa fa-plus"></i> Nuevo</button>
							</div>
							<div class="box-body table-responsive">
								<table id="example" class="table table-bordered table-striped compact" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th>Sigla</th>
											<th>Acción</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

				<?php echo form_open('Incidencia/NuevoTipoIncidencia', 'onsubmit = Block($(this));'); ?>
				<div class="modal modal-primary fade" id="modal-nuevo">
					<div class="modal-dialog modal-sm">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Nuevo Tipo Incidencia</h4>
							</div>
							<div class="modal-body">								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="TipoIncidencia">Nombre de Incidencia</label>
											<input type="text" class="form-control" autofocus="" required="" name="TipoIncidencia" placeholder="Ingrese Nombre">
										</div>
										<div class="form-group">
											<label for="Sigla">Sigla</label>
											<input type="text" class="form-control" required="" name="Sigla" placeholder="Ingrese Siglas">
										</div>
									</div>								
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-outline">Crear</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<?php echo form_open('Incidencia/EditarTipoIncidencia', 'onsubmit = Block($(this));'); ?>
				<div class="modal modal-warning fade" id="modal-editar">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Editar</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="TipoIncidencia2">Titulo</label>
											<input type="text" class="form-control" name="TipoIncidencia2" id="TipoIncidencia2" placeholder="Ingrese Nombre o Titulo de Incidencia" required="">
											<input type="hidden" class="form-control" name="Id" id="Id">
										</div>
										<div class="form-group">
											<label for="Sigla2">Sigla</label>
											<input type="text" class="form-control" required="" name="Sigla2" id="Sigla2" placeholder="Ingrese Siglas">
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-outline">Guardar</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

			</section>
		</div>
		<?php $this->load->view('layout/footer_v2'); ?>

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery-3.3.1.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
	<!-- jQuery 3 -->
	<!-- <script src="<?php //echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->
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

	<script type="text/javascript">
		$(document).ready(function() {
			listar();

		});

		var listar=function(){
			var table = $('#example').DataTable({
				ajax: {
					url: '<?php echo base_url();?>Incidencia/CargarTipoIncidencia',
					type: 'POST'
				},

				"scrollX": true,

				"columnDefs": [
				{ "searchable": false, "targets": 2 },
				{ "orderable": false, "targets": 2 }
				],

				columns: [
				{ "data": "Id"},
				{ "data": "TipoIncidencia"},
				{ "data": "Sigla" },
				{ "data": "Id",
				"render":function(data){
					return '<button type="button" class="editar btn btn-warning btn-xs">Editar</button>';
				}}			
				],

				"order":  [ 0, 'DESC' ],

				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				}
			});

			editar("#example tbody", table);
		}

		var editar = function(tbody, table){
			$(tbody).on('click', 'button.editar', function() {
				var data =table.row($(this).parents("tr")).data();
				$('#modal-editar').modal('show');
				$('#Id').val(data.Id);
				$('#TipoIncidencia2').val(data.TipoIncidencia);
				$('#Sigla2').val(data.Sigla);
			});
		}

		function Block(form){
			var boton = form.find('button[type="submit"]');

			boton.addClass('overlay').attr('disabled', 'disabled');
			boton.html('<i class="fa fa-refresh fa-spin"></i>');
		}

	</script>
</body>
</html>
