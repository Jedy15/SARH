<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	SARH | Usuarios</title>
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
		<h4><i class="icon fa  fa-exclamation"></i> Cambios Realizados!</h4>
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
						<div class="box box-info">
							<div class="box-header">
								<h3 class="box-title">Lista de Usuarios</h3>
								<a href="<?php echo base_url();?>Usuarios/nuevo" class="btn btn-sm btn-primary btn-flat pull-right">Nuevo Usuario</a>
							</div>
							<div class="box-body table-responsive">
								<table id="example" class="table table-hove table-bordered table-striped">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Nombre</th>													
											<th>Tipo de Usuario</th>
											<th>Status</th>
											<th>Fecha de Alta</th>
											<?php if($this->session->userdata('IdPerfil')==1) {?>
												<th>Fecha de Actualizacion</th>
												<th>Id Creador</th>
											<?php } ?>
											<th>Accion</th>
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
		})

		var listar=function(){
			var table = $('#example').DataTable({
				ajax: {
					url: '<?php echo base_url();?>Usuarios/CargarUsuarios',
					type: 'POST'
				},

				columns: [
				{ "data": "Usuario" },

				{ "data": null,
				"render": function ( data, type, row, meta ) {
					return row.Nombre+' '+row.Apellido;
				}},

				{ "data": "Perfil" },

				{ "data": "activo",
				"render": function(data){
					if (data==1) {
						return 'Activo';
					} else {
						return 'Inactivo';
					}
				}},

				{ "data": "FechaReg" },

				<?php if($this->session->userdata('IdPerfil')==1) {?>
					{ "data": "fact" },

					{ "data": "IdCreate" },
				<?php } ?>

				{ "data": "IdUsuario",
				"render":function(data){
					return '<a href="<?php echo base_url(); ?>Usuarios/editar/'+data+'" class="editar btn btn-warning btn-xs">Editar</a>';
				}}

				],

				"order": [ 4, 'desc' ],

				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				}
			});
		}

	</script>
</body>
</html>