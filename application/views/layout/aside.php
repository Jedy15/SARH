<?php 
$id = $this->session->userdata('id');
// $nombre_fichero = $_SERVER['DOCUMENT_ROOT'].'/images/user/'.$id.'/foto'.$id.'.JPG';
$nombre_fichero = $_SERVER['DOCUMENT_ROOT'].'/SARH/images/user/'.$id.'/foto'.$id.'.JPG';


if (file_exists($nombre_fichero)) {
	// $ruta = '//'.$_SERVER["SERVER_NAME"].'/images/user/'.$id.'/foto'.$id.'.JPG';
	$ruta = '//'.$_SERVER["SERVER_NAME"].'/SARH/images/user/'.$id.'/foto'.$id.'.JPG';

} else {
	// $ruta = "//".$_SERVER["SERVER_NAME"].'/images/user/avatar.png';
	$ruta = "//".$_SERVER["SERVER_NAME"].'/SARH/images/user/avatar.png';

} 
?>		
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">

				<img src="<?php echo $ruta; ?>" class="img-circle" alt="User Image">
				<!-- <img src="<?php //echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image"> -->
			</div>
			<div class="pull-left info">
				<p><?php echo $this->session->userdata("nombre")?></p>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENU NAVEGACION</li>
			<li class="treeview <?php if($this->uri->segment(1)=='Plantilla' or $this->uri->segment(1)=='Incidencia'){echo 'active';} ?>">
				<a href="#">
					<i class="fa fa-group"></i> <span>Plantilla</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url();?>Plantilla"><i class="fa fa-circle-o"></i>Operativo</a></li>
					<li><a href="<?php echo base_url();?>Plantilla/Nomina"><i class="fa fa-circle-o"></i>Nomina</a></li>
					<li><a href="<?php echo base_url();?>Plantilla/General"><i class="fa fa-circle-o"></i>General</a></li>
				</ul>
			</li>
			<!-- ojo menu para colaboradores solamente -->
			<?php if ($this->session->userdata('IdPerfil')<=3) {?>
				<li class="treeview <?php if($this->uri->segment(1)=='Reporte'){echo 'active';} ?>">
					<a href="#">
						<i class="fa fa-files-o"></i> <span>Reporte</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>Reporte"><i class="fa fa-circle-o"></i>Dashboard</a></li>
						<li><a href="<?php echo base_url();?>Reporte/DetalleIncidencias"><i class="fa fa-circle-o"></i>Detalle de Incidencia</a></li>
						<li><a href="<?php echo base_url();?>Reporte/IncidenciaGral"><i class="fa fa-circle-o"></i>Incidencia General</a></li>
						<li><a href="<?php echo base_url();?>Reporte/Tarjeta"><i class="fa fa-circle-o"></i>Tarjetas</a></li>
					</ul>
				</li>
			<?php } ?>

			<?php if ($this->session->userdata('IdPerfil')<=2) {?>
				<!-- ojo menu para administradores solamente -->
				<li class="treeview <?php if($this->uri->segment(1)=='Administrar' or $this->uri->segment(1)=='Usuarios' ){echo 'active';} ?>">
					<a href="#">
						<i class="fa fa-briefcase"></i>
						<span>Administración</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url(); ?>Usuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>
						<li><a href="<?php echo base_url();?>Administrar/Jefes_Deptos"><i class="fa fa-circle-o"></i>Jefes</a></li>
						<li><a href="<?php echo base_url();?>Administrar/Funcion"><i class="fa fa-circle-o"></i>Funciones</a></li>
						<li><a href="<?php echo base_url(); ?>Administrar/Servicio"><i class="fa fa-circle-o"></i>Servicios</a></li>
						<li><a href="<?php echo base_url(); ?>Administrar/Depto"><i class="fa fa-circle-o"></i>Departamentos</a></li>
						<li class="treeview <?php if($this->uri->segment(2)=='SeccionSindical' or $this->uri->segment(2)=='Subseccion' ){echo 'active';} ?>">
							<a href="#"><i class="fa fa-circle-o"></i> Sindicatos
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Administrar/SeccionSindical"><i class="fa fa-circle-o"></i>Secciones</a></li>
								<li><a href="<?php echo base_url(); ?>Administrar/Subseccion"><i class="fa fa-circle-o"></i>Subsecciones</a></li>
							</ul>
						</li>
						<li><a href="<?php echo base_url(); ?>Administrar/Programa"><i class="fa fa-circle-o"></i>Programas</a></li>

						<li><a href="<?php echo base_url(); ?>Administrar/Monitor"><i class="fa fa-circle-o"></i>Monitor</a></li>
					</ul>
				</li>
				<li class="treeview <?php if($this->uri->segment(1)=='Configurar' or $this->uri->segment(1)=='Incidencia' ){echo 'active';} ?>">
					<a href="#">
						<i class="fa fa-cog"></i>              
						<span>Configuración</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url(); ?>Configurar"><i class="fa fa-circle-o"></i>Grupo Expediente</a></li>
						<li><a href="<?php echo base_url(); ?>Incidencia"><i class="fa fa-circle-o"></i>Incidencias</a></li>
						<li><a href="<?php echo base_url(); ?>Incidencia/TipoIncidencia"><i class="fa fa-circle-o"></i>Tipo Incidencia</a></li>
						
					</ul>
				</li>
				<!-- ojo menu para administradores solamente -->
			<?php } ?>
			<!-- <li><a href="<?php //echo base_url(); ?>Encuesta"><i class="fa fa-circle-o text-aqua"></i><span>Ir a Encuesta DGIS</span></a></li> -->
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>