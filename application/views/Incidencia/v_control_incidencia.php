<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title> SARH | Control Incidencias</title>

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

	<!-- daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">

	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

	<!-- Google Font -->
	<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<style>
		.example-modal .modal {
			position: relative;
			top: auto;
			bottom: auto;
			right: auto;
			left: auto;
			display: block;
			z-index: 1;
		}

		.example-modal .modal {
			background: transparent !important;
		}
	</style>
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

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Control de Incidencias</h1>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-sign-out"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Pase de Salida <span class="mes"></span></span>
								<span class="info-box-number"><span id="TotalHrsSalida"></span><small> hr(s)</small></span>
								<span class="info-box-number"><span id="TotalPaseSalida"></span><small> Pase(s)</small></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-calendar-check-o"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Dias Económicos <?php echo date("Y"); ?></span>
								<span class="info-box-number"><span id="TotalEconomico"></span><small> en el año</small></span>
								<span class="info-box-number"><span id="TotalEconomicoMes"></span><small> en <span class="mes"></span></small></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="fa  fa-folder-open-o"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Reposición de Dias <?php echo date("Y"); ?></span>
								<span class="info-box-number"><span id="TotalRepocision"></span><small> en el año</small></span>
								<span class="info-box-number"><span id="TotalRepocisionMes"></span><small> en <span class="mes"></span></small></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-purple"><i class="fa fa-wheelchair"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Dias de Licencia Médica <?php echo date("Y"); ?></span>
								<span class="info-box-number"><span id="IncapacidadAnual"></span><small> en el año</small></span>
								<span class="info-box-number"><span id="IncapacidadMen"></span><small> en <span class="mes"></span></small></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="box box-danger box-solid">
							<div class="box-header">
								<h3 class="box-title"><?php echo $Persona[0]->SUFIJO.' '.$Persona[0]->NOMBRES.' '.$Persona[0]->APELLIDOS ?></h3>
								<div class="btn-group pull-right">
									<a href="<?php echo base_url(); ?>Plantilla" class="btn btn-warning"><i class="fa fa-step-backward"></i> Regresar</a>
									<a href="<?php echo base_url(); ?>Incidencia/RegistroPase/<?php echo $Persona[0]->IdPersonal ?>" class="btn btn-success"><i class="fa fa-plus"></i> Captura de Pase</a>
									<a href="<?php echo base_url(); ?>Incidencia/Registrar/<?php echo $Persona[0]->IdPersonal ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Capturar Incidencia</a>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-cardex"><i class="fa fa-file-text-o"></i> Cardex</button>
								
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table id="example" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Folio</th>
											<th>Incidencia</th>
											<th>Sigla</th>
											<th>Inicio</th>
											<th>Fin</th>
											<th>Usuario</th>
											<th>Captura</th>
											<th>Semana</th>											
											<th>Comentarios</th>
											<th>Acción</th>
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

				<?php echo form_open('Incidencia/Validar', 'id="autorizar-form" autocomplete="off"');?> 
				<div class="modal modal-primary fade" id="autorizar">
					<div class="modal-dialog modal-sm">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Se necesita autorización</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="Administrador">Usuario</label>
									<input type="text" class="form-control" placeholder="Ingrese Usuario administrador" id="Administrador" name="Administrador" value="" required>
								</div>
								<div class="form-group">
									<label for="Llave">Contraseña</label>
									<input type="password" class="form-control" id="Llave" name="Llave" placeholder="Ingrese contraseña de Administrador" required>
								</div> 
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-success">Autorizar</button>
								<!-- <input type="submit" class="btn btn-success" value="Autorizar"> -->
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<?php echo form_open('Incidencia/EditarEvento/'.$Persona[0]->IdPersonal); ?>
				<div class="modal modal-warning fade" id="modal-Editar">
					<div class="modal-dialog">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="Titulo">Editar Incidencia</h4>
							</div>
							<div class="modal-body">							
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label>Lista de Incidencias</label>
											<select class="form-control select2" style="width: 100%;" required id="Id_Inc" name="Id_Inc">
												<option></option>
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="start">Periodo de Inicio</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" required class="form-control" name="start" id="start" onchange="ValidarFecha(this);">
											</div>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="end">Periodo Final</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" class="form-control" name="end" id="end" onchange="ValidarFecha(this);">
											</div>
											<span class="help-block"></span>
										</div>
										<input type="hidden" class="form-control" name="Id" id="Id">
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="nota">Comentario</label>
											<input type="text" class="form-control" name="nota" id="nota" maxlength="200">
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

				<?php echo form_open('Incidencia/Eliminar/'.$Persona[0]->IdPersonal);?>
				<div class="modal modal-danger fade" id="modal-danger">
					<div class="modal-dialog modal-sm">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="title-danger"></h4>
							</div>
							<div class="modal-body">
								<p id="msg"></p>
								<input type="hidden" class="form-control" name="Id2" id="Id2">
							</div>
							<div class="modal-footer" id="BotonesEliminar">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-outline" id="BtnDelete">Eliminar</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<?php echo form_open('Incidencia/ImprimirCardex');?>
				<div class="modal modal-info fade" id="modal-cardex">
					<div class="modal-dialog modal-sm">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Generar Cardex</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Año</label>
											<select class="form-control select2" required id="YearCardex" name="YearCardex" style="width: 100%;">
											</select>
										</div>
										<input type="hidden" name="IdPersonal" value="<?php echo $Persona[0]->IdPersonal;?>">
										
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" data-toggle="tooltip" data-original-title="Excel" class="btn btn-success" formaction="<?php echo base_url(); ?>Incidencia/ExcelCardex">
            						<i class="fa fa-file-excel-o"></i> 
          						</button>
								<button type="submit" data-toggle="tooltip" data-original-title="Pdf" class="btn btn-danger" formaction="<?php echo base_url(); ?>Incidencia/PdfCardex">
            						<i class="fa fa-file-pdf-o"></i>
          						</button>
								<button type="submit" data-toggle="tooltip" data-original-title="Imprimir" class="btn btn-outline" formtarget="_blank">
            						<i class="fa fa-print"></i>
          						</button>
								
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

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
	<script src="<?php echo base_url(); ?>assets/bower_components/moment/moment.js"></script>

	<!-- Select2 -->
	<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

	<!-- InputMask -->
	<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

	<!-- date-range-picker -->
	<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!-- bootstrap datepicker -->
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

	<!-- bootstrap color picker -->
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

	<!-- bootstrap time picker -->
	<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

	<script>
		var hacer = null;

		$(function () {
    		//Initialize Select2 Elements
    		$('#YearCardex').select2({
				placeholder: "Seleccione Año",
    			ajax: {
    				url: '<?php echo base_url();?>Incidencia/YearCardex/<?php echo $Persona[0]->IdPersonal ?>',
    				dataType: 'json'
    			}
    		});

    		ListaDesplegableIncidencias();

    		$("#autorizar-form").on("submit", function(e){
    			$('#autorizar').modal('hide');
    			e.preventDefault();
    			$('#autorizar').on('hidden.bs.modal',function(event) {
    				event.preventDefault();
    				/* Act on the event */
    				$.post("<?php echo base_url(); ?>Incidencia/Validar", {
    					usuario : $('#Administrador').val(),
    					pass : $('#Llave').val(),
    					IdPersonal : <?php echo $Persona[0]->IdPersonal ?>
    				}, function(data) {
    					if (data == 1) {
    						if (hacer == 'editando') {
    							$('#modal-Editar').modal('show');
    						} else if(hacer== 'eliminando') {
    							$('#BotonesEliminar').show();
    							$('#modal-danger').modal('show');
    						}
    					} else {
    						$('#BotonesEliminar').hide();
							// $('#BtnElminar').hide();
							$('#title-danger').html('Error');
							$('#msg').html(data);
							$('#modal-danger').modal('show');
						}
						$('#autorizar-form').trigger('reset');
					});
    			});				
			}); //fin de Autorizar usuario y contraseña

    	});
    </script>

    <script>
    	$(document).ready(function() {
		//------------- codigo para mostrar el mes actual-----------------
			var d = new Date();
			var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
			$(".mes").html(months[d.getMonth()]+' '+d.getFullYear());
			var year = d.getFullYear();
			var NumMes = d.getMonth();
			NumMes++
			listar();
			Incapacidad(NumMes, year);
    	});

    	var listar=function(){
    		var table = $('#example').DataTable({
    			ajax: {
    				url: '<?php  echo base_url();?>Incidencia/CargarIncidenciasPersonal/<?php echo $Persona[0]->IdPersonal ?>',
    				type: 'POST'
    			},

				// "scrollX": true,
				"columnDefs": [
				{ "searchable": false, "targets": 8 },
				{ "orderable": false, "targets": 8 }
				],

				"order":  [ 0, 'asc' ],

				"columns": [
					{ "data":"Folio",
					"render": function ( data, type, row, meta ) {
						return 'F-'+data;
					}},

					{"data":"Incidencia"},
					{"data":"Sigla"},

					{ "data":"start",
					"render": function ( data, type, row, meta ) {
						var tiempo = moment(data);
						if (row.Id==16) {
							return tiempo.format('YYYY/MM/DD hh:mm a');
						} else {
							return tiempo.format('YYYY/MM/DD');
						}
					}},

					{"data":"end",
					"render": function ( data, type, row, meta ) {
						var tiempo = moment(data);
						if (row.Id==16) {
							return tiempo.format('YYYY/MM/DD hh:mm a');
						} else {
							if (data!=null) {
								var fin = tiempo.subtract(1, 'days');
								var inicio = moment(row.start).isSame(fin, 'day');
								if (inicio == false) {
									return tiempo.format('YYYY/MM/DD');
								} else {
									return null;
								}
							} else {
								return null;
							}						
						}
					}},

					{"data":"Usuario"},

					{"data":"Captura"},		

					{"data":"Semana"},

					{"data":"nota"},

					{"data": null,
					"render": function(data, type, row){
						if (row.Id_Inc!=19) {
							return '<button type="button" class="eliminar btn btn-danger btn-xs">'+
							'<i class="fa fa-trash"></i>'+
							'</button>'+
							'<button type="button" class="editar btn btn-warning btn-xs">'+
							'<i class="fa fa-edit"></i>'+
							'</button>';
						} else {
							return '<button type="button" class="eliminar btn btn-danger btn-xs" data-toggle="modal"><i class="fa fa-trash"></i></button>';
						}
					}}	
				],

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

				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				}
			});

    		editar_incidencia("#example tbody", table);
    		eliminar_incidencia("#example tbody", table);
    	}

    	var editar_incidencia = function(tbody, table){		
    		$(tbody).on('click', 'button.editar', function() {
    			hacer = 'editando';
    			<?php if ($this->session->userdata('IdPerfil')<=2) {?>
    				$('#modal-Editar').modal('show');
    			<?php } else {  ?>
    				$('#autorizar').modal('show');
    			<?php } ?>

    			var Registro =table.row($(this).parents("tr")).data();
    			var comienzo = moment(Registro.start).format('YYYY-MM-DD');
    			$('#start').val(comienzo);
    			$('#end').attr('min',comienzo);
    			var final = moment(Registro.end);
    			var end = final.subtract(1, 'days');
    			var igual = moment(comienzo).isSame(end, 'day');
    			if (!igual) {
    				final = final.format('YYYY-MM-DD');
    				$('#end').val(final);
    			} else {
    				$('#end').val(null);
    			}
    			if (Registro.nota) {
    				$('#nota').val(Registro.nota);
    			} else {
    				$('#nota').val(null);
				}

				$('#Id_Inc').val(Registro.Id_Inc); // Select the option with a value of '1'
				$('#Id_Inc').trigger('change'); // Notify any JS components that the value changed
				$('#Id').val(Registro.IdEvento);

				var abuelo = $("#start").parents('div.form-group');
				$(abuelo).removeClass('has-success').removeClass('has-error');
				$(abuelo).find('span').html('');

				var abuelo2 = $("#end").parents('div.form-group');
				$(abuelo2).removeClass('has-success').removeClass('has-error');
				$(abuelo2).find('span').html('');




			});
    	}

    	var eliminar_incidencia = function(tbody, table){
    		$(tbody).on('click', 'button.eliminar', function() {
    			hacer = 'eliminando';
    			<?php if ($this->session->userdata('IdPerfil')<=2) {?>
    				$('#modal-danger').modal('show');
    			<?php } else {  ?>
    				$('#autorizar').modal('show');
    			<?php } ?>

    			var Registro =table.row($(this).parents("tr")).data();
    			// console.log(Registro);
    			$('#title-danger').html('Eliminar Incidencia del Folio: F-'+Registro.Folio);
    			$('#msg').html('¿Esta Seguro de Eliminar <strong>'+Registro.Incidencia+'</strong>?');
    			$('#Id2').val(Registro.IdEvento);
    		});
    	}

    	function ListaDesplegableIncidencias(){
    		$.post('<?php echo base_url(); ?>Incidencia/CargarListaIncidencias', 
    			function(data, textStatus, xhr) {
    				var datos = $.parseJSON(data);
    				$('#Id_Inc').select2({
    					dropdownParent: $('#modal-Editar'),
    					placeholder: "Seleccione una Opción",
    					// allowClear: true,
    					data: datos
    				});
    			});
    	}

    	function ValidarFecha(th){
    		var id = th.id;
    		var valorInicial = th.value;
    		$.post('<?php echo base_url(); ?>Incidencia/VerificarFecha', {
    			Fecha: valorInicial,
    			IdPersonal: <?php echo $Persona[0]->IdPersonal; ?>
    		}, function(data, textStatus, xhr) {
				// alert(data);
				var abuelo = $("#"+id).parents('div.form-group');				
				if(data > 0){
					$(abuelo).removeClass('has-success').addClass('has-error');
					$(abuelo).find('span').html('La fecha ya esta en uso, verifique por favor');
					$(th).val('');
					if (id=='start') {
						$('#end').val('');
					}
				} else {
					$(abuelo).removeClass('has-error').addClass('has-success');
					$(abuelo).find('span').html('Fecha Valida');
					if (id=='start') {
						var minimo = moment(valorInicial).add(1, 'days');
						$('#end').attr('min', minimo.format('YYYY-MM-DD'));
					}
				}
			});
    	}
		
		function Incapacidad(mes, year) {
			$.post("<?php echo base_url();?>Incidencia/LicenciaMedica", {
				IdPersonal : <?php echo $Persona[0]->IdPersonal ?>,
				Mes: mes,
				Year: year
			},
				function (data, textStatus, jqXHR) {
					var datos = $.parseJSON(data);
					// console.log(data);
					
					if (datos.year[0].dias==null) {
						datos.year[0].dias = 0;
					}
					if (datos.mes[0].dias==null) {
						datos.mes[0].dias = 0;
					}		
					$('#IncapacidadAnual').html(datos.year[0].dias);
					$('#IncapacidadMen').html(datos.mes[0].dias);
				}
			);
		}

		// function ImprimirCardex(){
		// 	var IdPersonal = <?php //echo $Persona[0]->IdPersonal; ?>
		// 	var Year = $('#YearCardex').val()
		// 	// var Year = 2019;
		// 	var url = "<?php //echo base_url(); ?>Incidencia/ImprimirCardex/"+IdPersonal+"/"+Year;
		// 	window.open(url, '_blank');
		// }

    </script>

    <script>
	

		//--------- Carga de los datos de Pases de Salida del mes actual
		$.post('<?php echo base_url(); ?>Incidencia/ContarHrs/<?php echo $Persona[0]->IdPersonal ?>', { }, 
			function(data, textStatus, xhr) {
				var datos = $.parseJSON(data); 
				if (datos[0].Total == 0) {
					datos[0].Horas = '0';
				} else {
					//covertimos de 1.5000 a 1.5
					datos[0].Horas=Number.parseFloat(datos[0].Horas).toFixed(1)
				}				
				$("#TotalPaseSalida").html(datos[0].Total);
				$('#TotalHrsSalida').html(datos[0].Horas);
		}); //Fin post Cargar Pase de Salida

		//-------- Carga Economicos
		$.post('<?php echo base_url(); ?>Incidencia/Reposicion', 
			{
				IdPersonal: '<?php echo $Persona[0]->IdPersonal ?>',
				tipo: 3
			}, 
			function(data, textStatus, xhr) {
				var datos = $.parseJSON(data);
				if(datos.mes[0].dias==null){
					datos.mes[0].dias = 0;
				}
				if(datos.total[0].dias==null){
					datos.total[0].dias = 0;
				}
				$("#TotalEconomico").html(datos.total[0].dias);
				$("#TotalEconomicoMes").html(datos.mes[0].dias);

		});//Fin post Cargar Economicos


		//-------- Carga Reposiciones
		$.post('<?php echo base_url(); ?>Incidencia/Reposicion', 
		{
			IdPersonal: '<?php echo $Persona[0]->IdPersonal ?>',
			tipo: 22
		}, 
		function(data, textStatus, xhr) {
			var datos = $.parseJSON(data);
			if(!datos.mes[0].dias){
				datos.mes[0].dias = 0;
			}

			if(!datos.total[0].dias){
				datos.total[0].dias = 0;
			}

			$("#TotalRepocision").html(datos.total[0].dias);
			$("#TotalRepocisionMes").html(datos.mes[0].dias);
		});
	</script>
</body>
</html>