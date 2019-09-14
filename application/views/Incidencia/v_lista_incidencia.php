<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SARH | Incidencias</title>
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
  	<!-- Select2 -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

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
								<h3 class="box-title">Incidencia</h3>
								<button type="button" id="add" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-nuevo"><i class="fa fa-plus"></i> Agregar Incidencia</button>
							</div>
							<div class="box-body table-responsive">
								<table id="example1" class="table table-bordered table-striped compact" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th>Sigla</th>
											<th>Descripción</th>
											<th>Inicio</th>
											<th>Fin</th>
											<th>Usuario</th>										
											<th>Acción</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

				<?php echo form_open('Incidencia/Alta', 'onsubmit = Block($(this));'); ?>
				<div class="modal modal-primary fade" id="modal-nuevo">
					<div class="modal-dialog">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Nueva Incidencia</h4>
							</div>
							<div class="modal-body">								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="Nombre">Titulo</label>
											<input type="text" class="form-control" required="" name="Nombre" id="Nombre" placeholder="Ingrese Nombre o Titulo de Incidencia">
										</div>
										<div class="form-group">
											<label for="Sigla">Tipo de Incidencia</label>
											<select class="form-control select2" required="" name="IdSigla" id="IdSigla" style="width: 100%;"><option></option></select>										
										</div>
										<div class="form-group">
											<label for="Nota">Descripción</label>
											<textarea class="form-control" name="Nota" id="Nota" rows="5" placeholder="Agregue Descripción"></textarea>
										</div>
										<div class="form-group">
											<div class="btn-group" style="width: 100%; margin-bottom: 10px;">
												<label>Color</label>
												<ul class="fc-color-picker" id="color-chooser">
													<li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-light-blue" href="#"><i class="fa fa-square" style="border: thin solid black;  border-radius: 5px;"></i></a></li>
													<li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
												</ul>
												<input type="hidden" class="form-control" name="Color" id="Color">
											</div>
										</div>
										<h4>Vigencia</h4>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="Fecha_Nacimiento">Fecha de Inicio</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" class="form-control" name="FI" id="FI">
											</div>
										</div>
										<p>*Dejar en blanco si no tiene vigencia</p>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="Fecha_Nacimiento">Fecha de Inicio</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" class="form-control" name="FF" id="FF">
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-outline" id="add-new-event">Crear</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<?php echo form_open('Incidencia/Baja', 'onsubmit = Block($(this));'); ?>
				<div class="modal modal-danger fade" id="modal-eliminar">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Eliminar Incidencia</h4>
							</div>
							<div class="modal-body">									
								¿Esta seguro que desea eliminar <span id="NombreEvento"></span>?
								<br>Ya no estara Disponible para Capturas de Incidencias del Personal
								<div class="form-group">
									<input type="hidden" class="form-control" name="Id" id="Id">
								</div>	
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="Submit" class="btn btn-outline">Eliminar</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<?php echo form_open('Incidencia/Activar', 'onsubmit = Block($(this));'); ?>
				<div class="modal modal-success fade" id="modal-activar">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Activar Incidencia</h4>
							</div>
							<div class="modal-body">									
								¿Esta seguro que desea ACTIVAR <span id="NombreEvento2"></span>?
								<div class="form-group">
									<input type="hidden" class="form-control" name="Id3" id="Id3">
								</div>	
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="Submit" class="btn btn-outline">Activar</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<?php echo form_open('Incidencia/Editar', 'onsubmit = Block($(this));'); ?>
				<div class="modal modal-warning fade" id="modal-editar">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="titulo-editar"></h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="Nombre2">Titulo</label>
											<input type="text" class="form-control" name="Nombre2" id="Nombre2" placeholder="Ingrese Nombre o Titulo de Incidencia" required="">
											<input type="hidden" class="form-control" name="Id2" id="Id2">
										</div>
										<div class="form-group">
											<label for="Sigla2">Tipo de Incidencia</label>
											<select class="form-control select2" required="" name="IdSigla2" id="IdSigla2" style="width: 100%;"><option></option></select>
										</div>
										<div class="form-group">
											<label for="Nota2">Descripción</label>
											<textarea class="form-control" name="Nota2" id="Nota2" rows="5" placeholder="Agregue Descripción"></textarea>
										</div>
										<div class="form-group">
											<div class="btn-group" style="width: 100%; margin-bottom: 10px;">
												<label>Color</label>
												<ul class="fc-color-picker" id="color-chooser2">
													<li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-yellow" href="#"><i class="fa fa-square" style="border: thin solid black; border-radius: 5px;"></i></a></li>
													<li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
													<li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
												</ul>
												<input type="hidden" class="form-control" name="Color2" id="Color2">
											</div>
										</div>
										<h4>Vigencia</h4>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="Fecha_Nacimiento">Fecha de Inicio</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" class="form-control" name="FI2" id="FI2">
											</div>
										</div>
										<p>*Dejar en blanco si no tiene vigencia</p>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="Fecha_Nacimiento">Fecha de Inicio</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" class="form-control" name="FF2" id="FF2">
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-outline" id="update">Guardar</button>
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
	<!-- Select2 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

	<script>
		$(function () {
			$.post('<?php echo base_url(); ?>Incidencia/ListaTipoIncidencia', function(data, textStatus, xhr) {
				var datos = $.parseJSON(data);
				$('.select2').select2({
					// dropdownParent: $('#modal-editar'),
					// width: 'resolve',
					placeholder: "Seleccione una opción",
					data: datos
				});
			});
			
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			listar();

			$('#color-chooser > li > a').click(function (e) {
				e.preventDefault()
      				//Save color
      				currColor = $(this).css('color')
      				//Add color effect to button
      				$('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor });
      				$('#Color').val(currColor);
      				// alert(currColor);
      			})

			$('#color-chooser2 > li > a').click(function (e) {
				e.preventDefault()

				currColor = $(this).css('color')

				$('#update').css({ 'background-color': currColor, 'border-color': currColor });
				$('#Color2').val(currColor);
			})
		});


		var listar=function(){
			var table = $('#example1').DataTable({
				ajax: {
					url: '<?php echo base_url();?>Incidencia/CargarTodasIncidencias',
					type: 'POST'
				},

				"scrollX": true,

				"columnDefs": [
				{ "width": "10%", "targets": 4 },
				{ "width": "10%", "targets": 5 },
				{ "width": "10%", "targets": 7 },
				{ "searchable": false, "targets": 7 },
				{ "orderable": false, "targets": 7 }
				],

				columns: [
				{ "data": "Id",
				"render": function(data, type, row, meta){
					return '<span class="badge" style="background-color:'+row.Color+';">'+data+'<span>';
				}},
				{ "data": "Nombre" },
				{ "data": "Sigla" },
				{ "data": "Nota" },
				{ "data": "FI" },
				{ "data": "FF" },
				{ "data": "Usuario" },
				{ "data": "Activo",
				"render":function(data){
					var valor;
					if (data==1) {
						valor = '<button type="button" class="editar btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>'+
						'<button type="button" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'
					} else {
						valor = '<button type="button" class="activar btn btn-success btn-sm"><i class="fa fa-check"></i></button>'
					}

					return '<div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">'+
					'<div class="btn-group" data-toggle="btn-toggle">'+
					valor+
					'</div>'+
					'</div>';
					
				}}			
				],

				"order":  [ 0, 'desc' ],

				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				}
			});

			editar("#example1 tbody", table);
			Eliminar("#example1 tbody", table);
			activar("#example1 tbody", table);

		}

		var activar = function(tbody, table){
			$(tbody).on('click', 'button.activar', function() {			
				var data =table.row($(this).parents("tr")).data();
				console.log(data);
				$('#modal-activar').modal('show');
				$('#NombreEvento2').html(data.Nombre);
				$('#Id3').val(data.Id);
			});
		}

		var Eliminar = function(tbody, table){
			$(tbody).on('click', 'button.eliminar', function() {			
				var data =table.row($(this).parents("tr")).data();
				console.log(data);
				$('#modal-eliminar').modal('show');
				$('#NombreEvento').html(data.Nombre);
				$('#Id').val(data.Id);
			});
		}

		var editar = function(tbody, table){
			$(tbody).on('click', 'button.editar', function() {
				var data =table.row($(this).parents("tr")).data();

				$('#modal-editar').modal('show');
				$('#titulo-editar').html('Incidencia #'+data.Id);
				$('#Id2').val(data.Id);
				$('#Nombre2').val(data.Nombre);
				$('#Nombre2').attr('autofocus', 'autofocus');
				$('#Nota2').val(data.Nota);
				$('#Nombre2').val(data.Nombre);
				$('#Color2').val(data.Color);
				$('#FI2').val(data.FI);
				$('#FF2').val(data.FF);

				$('#IdSigla2').val(data.IdSigla);
				$('#IdSigla2').trigger('change'); 

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
