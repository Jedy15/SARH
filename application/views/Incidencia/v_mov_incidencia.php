<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SIARH | Incidencias </title>	
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
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

<?php if($this->session->flashdata("Info")):?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h2 class="text-center"><i class="icon fa fa-check"></i> Incidencia(s) Capturada!</h2>
		<h4 class="text-center">
			<?php 
			echo $this->session->flashdata("Info").'<br>';
			echo 'CAPTURA REALIZADA POR: '.$this->session->userdata("nombre").' '.$this->session->userdata("ap");
			?>
		</h4>
	</div>
<?php endif; ?>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php
		$this->load->view('layout/main_header');

		$this->load->view('layout/aside');
		?>

		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">

				<h1>Control de Incidencias</h1>						

			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-12">
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
					<div class="col-md-4 col-sm-6 col-xs-12">
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
					<div class="col-md-4 col-sm-6 col-xs-12">
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
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="box box-success">
							<div class="box-header">
								<h3 class="box-title"><?php echo $Persona[0]->SUFIJO.' '.$Persona[0]->NOMBRES.' '.$Persona[0]->APELLIDOS ?></h3>
								<div class="btn-group pull-right">
									<a href="<?php echo base_url(); ?>Plantilla" class="btn btn-warning"><i class="fa fa-step-backward"></i> Regresar</a>
									<?php if ($this->session->userdata("IdPerfil")<=3) {?>
										<a href="<?php echo base_url(); ?>Incidencia/RegistroPase/<?php echo $Persona[0]->IdPersonal ?>" class="btn btn-success"><i class="fa fa-plus"></i> Captura de Pase</a>
										<a href="<?php echo base_url(); ?>Incidencia/Registro/<?php echo $Persona[0]->IdPersonal ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Capturar Incidencia</a>
									<?php } ?>
								</div>
							</div>
							<div class="box-body table-responsive">
								<table id="example1" class="table table-bordered table-striped" style="width:100%">
									<thead>
										<tr>
											<th>Folio</th>
											<th>Incidencia</th>
											<th>Inicio</th>
											<th>Fin</th>
											<th>Usuario</th>
											<th>Captura</th>
											<th>Semana</th>											
											<th>Comentarios</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody><?php
									foreach ($evento as $item){ ?>
										<tr>
											<td>F-<?php echo $item->Folio ?></td>
											<td><?php echo $item->Incidencia ?></td>
											<td><?php $create=strtotime($item->start);
											if ($item->Id_Inc==19) {
												$FI = date('Y/m/d H:i', $create);
												echo $FI.' Hrs';
											} else { 
												$FI = date('Y/m/d', $create);
												echo $FI;
											}
											$item->start = date('Y-m-d', $create);
											?></td>
											<td><?php if ($item->end) {	
												if ($item->Id_Inc==19) {
													$create=strtotime($item->end);
													$FF = date('Y/m/d H:i', $create);
													echo $FF.' Hrs';
												} else {		
													$item->end  = strtotime('-1 day', strtotime($item->end ));
													$create=$item->end;
													$FF = date('Y/m/d',$create);
													echo $FF;
												}
												$item->end  = date ('Y-m-d' , $create);
											}?></td>
											<td><span data-toggle="tooltip"  data-original-title="<?php echo $item->NUsuario.' '.$item->AUsuario;?>"><?php echo $item->Usuario ?></span></td>
											<td><?php $create=strtotime($item->Captura);
												// $item->Captura = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
											$item->Captura = date('Y/m/d H:i', $create);
											echo $item->Captura ?> HRS</td>
											<td><?php echo date('W-Y', $create); ?></td>
											<td><?php echo $item->nota;  ?></td>
											<td>
												<div class="btn-group">
													<button class="btn btn-warning btn-sm" id="Editar" data-toggle="modal" data-target=
													<?php if ($this->session->userdata('IdPerfil')<=2) {
														echo "'#modal-Editar'";
													} else {
														echo "'#modal-admin'";
													} ?> onclick="Cargar('<?php echo $item->IdEvento ?>', '<?php echo $item->Incidencia ?>', '<?php echo $item->start ?>', '<?php echo $item->end ?>')"><i class="fa fa-edit" data-toggle="tooltip" data-original-title="Editar"></i>
												</button>
											</div>
											<div class="btn-group">
												<button class="btn btn-danger btn-sm" data-toggle="modal" data-target=
												<?php if ($this->session->userdata('IdPerfil')<=2) {
													echo "'#modal-danger'";
												} else {
													echo "'#modal-admin'";
												} ?> onclick="Borrar('<?php echo $item->IdEvento ?>', '<?php echo $item->Incidencia ?>')"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Eliminar"></i></button>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Folio</th>
									<th>Incidencia</th>
									<th>Inicio</th>
									<th>Fin</th>
									<th>Usuario</th>
									<th>Captura</th>
									<th>Semana</th>							
									<th>Comentarios</th>
									<th>Acción</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.row -->
				<?php echo form_open('Incidencia/EditarEvento/'.$Persona[0]->IdPersonal); ?>
				<div class="modal modal-warning fade" id="modal-Editar">
					<div class="modal-dialog">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="Titulo"></h4>
							</div>
							<div class="modal-body">								
								<div class="row">
									<input type="hidden" class="form-control" name="Id" id="Id">
									<div class="col-xs-6">
										<div class="form-group">
											<label for="start">Periodo de Inicio</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" required="" class="form-control" name="start" id="start">
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="end">Periodo Final</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" class="form-control" name="end" id="end">
											</div>
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

				<!-- <?php //echo form_open('Incidencia/Autorizar');?> -->
				<div class="modal modal-primary fade" id="modal-admin">
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
									<label for="usuario">Usuario</label>
									<input type="text" class="form-control" placeholder="Ingrese Usuario administrador" id="usuario" name="usuario">
								</div>
								<div class="form-group">
									<label for="pass">Contraseña</label>
									<input type="password" class="form-control" id="pass" name="pass" placeholder="Ingrese contraseña de Administrador">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-success" id="autorizar">Autorizar</button>
							</div>
						</div>
					</div>
				</div>
				<!-- <?php //echo form_close(); ?> -->

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
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-outline" id="aceptar">Aceptar</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>


			</section>
			<!-- /.content -->
		</div>

		<?php $this->load->view('layout/footer_v2'); ?>


	</div>

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
	<script src="<?php echo base_url(); ?>assets/bower_components/moment/moment.js"></script>


	<script>
		$(document).ready(function() {
			var table = $('#example1').DataTable({
				"scrollX": true,
			stateSave: true, //guarda el estado de las columnas

			"language": {
				"info": "Mostrando del _START_ al _END_ de _TOTAL_ Registros",
				"search": "Buscar:",
				"infoFiltered": "(Filtrado de _MAX_ Registros Totales)",
				"lengthMenu": "_MENU_ Registros Mostrados",
				paginate: {
					previous: 'Anterior',
					next:     'Siguiente'
				}
			}
		});
			<?php if($this->session->userdata('IdPerfil')<=3) {?>
				new $.fn.dataTable.Buttons( table, {
					lengthChange: false,
					buttons: [		
					{
						extend: 'colvis',
						text:      '<i class="fa fa-columns"></i>',
						titleAttr: 'Editar Columnas',
						className: 'btn btn-warning'
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
					language: {
						buttons: {
							colvis: 'Editar Columnas'
						}
					}
				} );

				table.buttons().container()
				.appendTo( '#example1_wrapper .col-md-6:eq(0)' );
			<?php } ?>
		});

	</script>

	<script type="text/javascript">
	//------------- codigo para mostrar el mes actual-----------------
	var d = new Date();
	var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	$(".mes").html(months[d.getMonth()]+' '+d.getFullYear());

	//--------- Carga de los datos de Pases de Salida del mes actual
	$.post('<?php echo base_url(); ?>Incidencia/ContarHrs/<?php echo $Persona[0]->IdPersonal ?>', { }, 
		function(data, textStatus, xhr) {
			var datos = $.parseJSON(data); 
			var total;
			total = 0;
			// console.log(datos);
			for(var i in datos) {
				var horas;
				var tiempo;
				var minutos;

				tiempo = moment(datos[i].Horas,'HH:mm'); //Cargamos las horas calculadas en tiempo
				horas = tiempo.hours();	//Extraemos las hrs
				minutos = tiempo.minutes()/60;	//extraemos los minutos y lo convertimos en horas
				total += horas+minutos;	//Sumamos a la variable total de horas
			}
			$("#TotalPaseSalida").html(datos.length);
			$('#TotalHrsSalida').html(total);
		}); //Fin post Cargar Pase de Salida

	$.post('<?php echo base_url(); ?>Incidencia/Economico', 
	{
		IdPersonal: '<?php echo $Persona[0]->IdPersonal ?>'
	}, 
	function(data, textStatus, xhr) {
		var datos = $.parseJSON(data);
		// console.log(datos);
		var MesActual = new Date().getMonth();
		var Contar = 0;
		for (var i = datos.length - 1; i >= 0; i--) {
			var tiempo = new Date(datos[i].start).getMonth();
			if (tiempo == MesActual) {
				Contar ++;
			}
		}
		$("#TotalEconomico").html(datos.length);
		$("#TotalEconomicoMes").html(Contar);

	});//Fin post Cargar Economicos

	$.post('<?php echo base_url(); ?>Incidencia/Reposicion', 
	{
		IdPersonal: '<?php echo $Persona[0]->IdPersonal ?>'
	}, 
	function(data, textStatus, xhr) {
		var datos = $.parseJSON(data);
		// console.log(datos);
		var MesActual = new Date().getMonth();
		var Contar = 0;
		for (var i = datos.length - 1; i >= 0; i--) {
			var tiempo = new Date(datos[i].start).getMonth();
			if (tiempo == MesActual) {
				Contar ++;
			}
		}
		$("#TotalRepocision").html(datos.length);
		$("#TotalRepocisionMes").html(Contar);

		// console.log(datos);
	});


	Cargar = function($IdEvento, $Incidencia, $FI, $FF){
		$("#Titulo").html("Editar Incidencia "+$Incidencia);
		$("#Id").val($IdEvento);
		$("#start").val($FI);
		$('#end').val($FF);

		$('#autorizar').attr('onclick', 'Autorizar()');

	}

	Autorizar = function(){
		$('#modal-admin').modal('toggle');
		$.post("<?php echo base_url(); ?>Incidencia/Autorizar", {
			usuario : $('#usuario').val(),
			pass : $('#pass').val()
		}, function(data) {
			if (data == 1) {
				$('#modal-Editar').modal('toggle');
			} else {
				$('#title-danger').html('Error');
				$('#msg').html(data);
				$('#aceptar').hide();
				$('#modal-danger').modal('toggle');
			}
		});
	}

	Borrar = function($IdEvento, $Incidencia){
		$('#title-danger').html('Eliminar evento #'+$IdEvento);
		$('#msg').html('¿Esta Seguro de Eliminar el evento '+$Incidencia+'?');
		$('#Id2').val($IdEvento);
		$('#autorizar').attr('onclick', 'Validar()');
	}

	Validar = function(){
		$('#modal-admin').modal('toggle');
		$.post("<?php echo base_url(); ?>Incidencia/Autorizar", {
			usuario : $('#usuario').val(),
			pass : $('#pass').val()
		}, function(data) {
			if (data == 1) {
				$('#modal-danger').modal('toggle');
			} else {
				$('#title-danger').html('Error');
				$('#msg').html(data);
				$('#aceptar').hide();
				$('#modal-danger').modal('toggle');
			}
		});
	}

</script>
</body>
</html>