<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SARH | Jefes </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->

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

<?php if($this->session->flashdata("Aviso")):?>
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-upload"></i> Exito!</h4>
		<?php echo $this->session->flashdata("Aviso")?>
	</div>
<?php endif; ?>


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
								<h3 class="box-title">Lista de Jefes</h3>
								<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-nuevo"> <i class="fa fa-plus"></i> Nuevo Jefe</button>
							</div>
							<div class="box-body table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th>Puesto</th>
											<th>Accion</th>										
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				<?php echo form_open('Administrar/NuevoJefe'); ?>
				<div class="modal modal-primary fade" id="modal-nuevo">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Registro Nuevo</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="JEFE">Nombre</label>
											<input type="text" class="form-control" name="JEFE" id="JEFE" placeholder="Ingrese Nombre" required="">
										</div>
										<div class="form-group">
											<label for="Puesto">Puesto</label>
											<input type="text" class="form-control" required="" name="Puesto" id="Puesto" placeholder="Ingrese Puesto">
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

				<?php echo form_open('Administrar/EditarJefe', 'id="FrmEditar"'); ?>
				<div class="modal modal-info fade" id="modal-editar">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="titulo-editar">Editar Datos</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<input type="hidden" class="form-control" name="IdJefe" id="IdJefe">
											<label for="JEFE">Nombre</label>
											<input type="text" class="form-control" name="JEFE" id="JEFE" placeholder="Ingrese Nombre" required="">
										</div>
										<div class="form-group">
											<label for="Puesto">Puesto</label>
											<input type="text" class="form-control" required="" name="Puesto" id="Puesto" placeholder="Ingrese Puesto">
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

				<?php echo form_open('Administrar/EliminarJefe', 'id="FrmEliminar"'); ?>
				<div class="modal modal-danger fade" id="modal-eliminar">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Eliminar Registro</h4>
							</div>
							<div class="modal-body">									
								¿Esta seguro que desea eliminar este registro?
								<div class="form-group">
									<input type="hidden" class="form-control" name="IdJefe" id="IdJefe">
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
  <!-- <script src="<?php //echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <!-- <script src="<?php //echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> -->
  <!-- <script src="<?php //echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script> -->
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="<?php //echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script> -->
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
  <!-- <script src="<?php //echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script> -->


  <script>
  	$(document).ready(function() {
  		listar();
  	});

  	var listar=function(){
  		var table = $('#example').DataTable({
  			ajax: {
  				url: '<?php echo base_url();?>Administrar/CargarJefes',
  				type: 'POST'
  			},
  			columns: [
  			{ "data": "IdJefe" },
  			{ "data": "JEFE" },
  			{ "data": "Puesto" },
  			{ 
  				"data": null,
  				"defaultContent": '<div class="text-center"><button type="button" data-toggle="modal" data-target="#modal-editar" class="editar btn btn-info"><i class="fa fa-edit"></i></button></div>'
  				//"defaultContent": '<div class="text-center"><button type="button" data-toggle="modal" data-target="#modal-editar" class="editar btn btn-info"><i class="fa fa-edit"></i></button> <button type="button" data-toggle="modal" data-target="#modal-eliminar" class="eliminar btn btn-danger"><i class="fa fa-trash-o"></i></button></div>',
  			}
  			],

  			"language": {
  				"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
  			},
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

  		obtener_data_editar("#example tbody", table);
  		obtener_id_eliminar("#example tbody", table);

  	}


  	var obtener_data_editar = function(tbody, table){
  		$(tbody).on('click', 'button.editar', function() {
  			var data =table.row($(this).parents("tr")).data();
  			$('#FrmEditar #JEFE').val(data.JEFE);
  			$('#FrmEditar #Puesto').val(data.Puesto);
  			$('#FrmEditar #IdJefe').val(data.IdJefe);
  		});
  	}

  	var obtener_id_eliminar = function(tbody, table){
  		$(tbody).on('click', 'button.eliminar', function() {
  			var data =table.row($(this).parents("tr")).data();
  			$('#FrmEliminar #IdJefe').val(data.IdJefe);
  		});
  	}

  </script>
</body>
</html>