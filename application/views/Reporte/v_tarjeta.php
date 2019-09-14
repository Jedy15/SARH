<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SARH | Tarjetas </title>
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
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url(); ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>SARH</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Sistema</b>Humanos</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $this->session->userdata("nombre").' '.$this->session->userdata("ap")?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
									<p>
										<?php echo $this->session->userdata("nombre")?> - <?php echo $this->session->userdata('perfil'); ?>
										<small>Registrado desde <?php echo $this->session->userdata('reg'); ?></small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo base_url(); ?>usuarios/perfil/<?php echo $this->session->userdata('id'); ?>" class="btn btn-success btn-flat">Perfil</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo base_url();?>clogin/logout" class="btn btn-danger btn-flat">Cerrar Sesión</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->

		<?php	
		$this->load->view('layout/aside');
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Tarjetas</h3>
							</div>
							<div class="box-body table-responsive">
								<table id="example" class="table table-bordered table-striped" style="width:100%">
									<thead>
										<tr>
											<th>N° Tarjeta</th>
											<th>Nombre</th>
											<th>Mes</th>
											<th>Jornada</th>
											<th>Horario</th>
											<th>Dias Laborales</th>
											<th>Plaza</th>
											<th>Código</th>
											<th>R.F.C.</th>
											<th>Departamento</th>
											<th>Jefe Inmediato</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 0.3.2
			</div>
			<strong>Copyright &copy; 2018 <a href="https://www.facebook.com/JedySistemas">J-edy Sistemas Informáticos</a>.</strong> All rights
			reserved.
		</footer>
  <!-- Add the sidebar's background. This div must be placed
  	immediately after the control sidebar -->
  	<div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
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
  <!-- page script -->
  <script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>

  <script>
  	$(document).ready(function() {

  		$.post('<?php echo base_url();?>Reporte/DatosTarjeta', {}, function(data, textStatus, xhr) {
  			var datos = $.parseJSON(data);
  			var d = new Date();
  			var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  			for (var i = 0; i < datos.length; i++) {
  				datos[i].Mes = months[d.getMonth()]+' '+d.getFullYear();
  				datos[i].NOMBRES = datos[i].NOMBRES+' '+datos[i].APELLIDOS;
  				datos[i].HE = moment(datos[i].HE, 'HH:mm').format('h:mm A');
  				datos[i].HS = moment(datos[i].HS, 'HH:mm').format('h:mm A');
  				datos[i].HE = datos[i].HE+' A '+datos[i].HS;
  			}

  			var table = $('#example').dataTable( {
  				"scrollX": true,
  				"data": datos,
  				"columns": [
  				{ "data": "NTarjeta" },
  				{ "data": "NOMBRES" },
  				{ "data": "Mes" },
  				{ "data": "Turno" },
  				{ "data": "HE" },
  				{ "data": "DIAS" },
  				{ "data": "TIPOTRABAJADOR" },
  				{ "data": "Codigo" },
  				{ "data": "RFC" },
  				{ "data": "DEPARTAMENTO" },
  				{ "data": "JEFE" },
  				],
  				"language": {
  					"info": "Mostrando del _START_ al _END_ de _TOTAL_ Registros",
  					"search": "Buscar:",
  					"infoFiltered": "(Filtrado de _MAX_ Registros Totales)",
  					"lengthMenu": "_MENU_ Registros Mostrados",
  					paginate: {
  						previous: 'Anterior',
  						next:     'Siguiente'
  					}
  				},
  				// lengthChange: false,
  				dom: 'lBfrtip',
  				buttons: [
  				{
  					extend:    'excelHtml5',
  					text:      '<i class="fa fa-file-excel-o"></i>',
  					className: 'btn btn-success',
  					titleAttr: 'Exportar a Excel',
  					exportOptions: {
  						columns: ':visible'
  					}
  				}
  				]
  			});

  		});
  	});
  </script>
</body>
</html>