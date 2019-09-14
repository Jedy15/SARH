<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SRH2018 | Servicios</title>
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

<?php if($this->session->flashdata("Aviso")):?>
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-upload"></i> Información!</h4>
		<?php echo $this->session->flashdata("Aviso")?>
	</div>
<?php endif; ?>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php echo base_url(); ?>" class="logo">
				<span class="logo-mini"><b>HM</b>18</span>
				<span class="logo-lg"><b>SistemaHM</b>2018</span>
			</a>
			<nav class="navbar navbar-static-top">
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
								<li class="user-header">
									<img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
									<p><?php echo $this->session->userdata("nombre")?> - <?php switch ($this->session->userdata("IdPerfil")) {
										case 1:
										echo 'SuperAdministrador';
										break;
										case 2:
										echo 'Administrador';
										break;
										case 3:
										echo 'Colaborador';
										break; } ?>									
										<small>Registrado desde <?php echo $this->session->userdata('reg'); ?></small>
									</p>
								</li>
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

		<?php
		$this->load->view('layout/aside');
		?>

		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Servicios</h3>
								<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-info">
									Nuevo Servicio
								</button>
							</div>
							<div class="box-body table-responsive">
								<table id="example1" class="table table-hove table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Servicio</th>
											<th>Comentario</th>
											<th>Fecha de Alta</th>
											<th>Fecha de Actualizacion</th>
											<th>Usuario</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($reg as $l1){ ?>
											<tr>
												<td><?php echo $l1->IdServicio ?></td>
												<td><?php echo $l1->Servicio ?></td>
												<td><?php echo $l1->Nota ?></td>
											<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); //Arreglo de meses en para mostrar en español			
											$create=strtotime($l1->FReg);
											$l1->FReg = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
											$create=strtotime($l1->Fecha);
											$l1->Fecha = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
											?>
											<td><?php echo $l1->FReg ?></td>
											<td><?php echo $l1->Fecha ?></td>
											<td><span data-toggle="tooltip"  data-original-title="<?php echo $l1->Nombre.' '.$l1->Apellido;?>"><?php echo $l1->Usuario ?></span></td>
											<td><a id="editar" href=" <?php echo base_url();?>administrar/EditarServicio/<?php echo $l1->IdServicio?>" class="btn btn-block btn-success btn-xs">Editar</a>
												<!-- <button type="button" id="prueba" class="btn btn-info btn-xs">prueba</button> -->
											</td>
										</tr>
									<?php } ?>				
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Servicio</th>
										<th>Comentario</th>
										<th>Fecha de Alta</th>
										<th>Fecha de Actualizacion</th>
										<th>Usuario</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>


	<div class="modal modal-info fade" id="modal-info">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php echo form_open('Administrar/AltaServicio'); ?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Alta de Servicio</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="Servicio">Nombre de Servicio</label>
							<input type="text" class="form-control" required name="Servicio" id="Servicio" placeholder="Nombre del Area/Servicio" maxlength="45" size="45">
						</div>
						<div class="form-group">
							<label for="Nota">Descripción</label>
							<textarea class="form-control" rows="3" name="Nota" id="Nota" placeholder="Descripción"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-outline">Guardar</button>
					</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->


		<div class="modal modal-success fade" id="modalEdit">
			<div class="modal-dialog">
				<div class="modal-content">
					<?php echo form_open('Administrar/EditarServicio/'.$Servicio[0]->IdServicio); ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Editar Servicio N° <?php echo $Servicio[0]->IdServicio ?></h4>
						</div>
						<div class="modal-body" id="FrmEditar">
							<div class="form-group">
								<label for="Servicio">Nombre de Servicio</label>
								<input type="text" class="form-control" required name="Servicio" id="Servicio" placeholder="Medicos Especialistas Ginecologos" maxlength="50" size="50" value="<?php echo set_value('Servicio',@$Servicio[0]->Servicio); ?>">
							</div>
							<div class="form-group">
								<label for="Nota">Descripción</label>
								<textarea class="form-control" rows="3" name="Nota" id="Nota" placeholder="Descripción del Grupo"><?php echo set_value('Nota',@$Servicio[0]->Nota); ?></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-outline">Guardar Cambios</button>
						</div>
						<?php echo form_close(); ?>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->


			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 0.3.2
				</div>
				<strong>Copyright &copy; 2018 <a href="https://www.facebook.com/JedySistemas">J-edy Sistemas Informáticos</a>.</strong> All rights
				reserved.
			</footer>
			<div class="control-sidebar-bg"></div>
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
			$(function () {
				$('#example1').DataTable()
			})
			<?php if ($this->uri->segment(2)== 'EditarServicio' ){  ?>
				$('#modalEdit').modal('show')
			<?php } ?>
		</script>

	</body>
	</html>