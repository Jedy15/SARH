  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("nombre")?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVEGACION</li>
        <li <?php if ($this->uri->segment(1)== 'Plantilla' ) { ?> class="treeview active" <?php } else {?> class="treeview" <?php } ?>>
          <a href="#">
            <i class="fa fa-group"></i> <span>Plantilla</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($this->uri->segment(2)== null ) { ?> class="active" <?php } ?>><a href="<?php echo base_url();?>Plantilla"><i class="fa fa-circle-o"></i>Operativa</a></li>
            <li><a href="<?php echo base_url();?>Plantilla/Nomina"><i class="fa fa-circle-o"></i>Nomina</a></li>
            <li <?php if ($this->uri->segment(2)== 'General' ) { ?> class="active" <?php } ?>><a href="<?php echo base_url();?>Plantilla/General"><i class="fa fa-circle-o"></i>General</a></li>
          </ul>
        </li>
        <?php if ($this->session->userdata('IdPerfil')<=3) {?>
          <li class="treeview">
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
          <li <?php if ($this->uri->segment(1)== 'Usuarios' ) { ?> class="treeview active" <?php } else {?> class="treeview" <?php } ?>>
            <a href="#">
              <i class="fa fa-briefcase"></i>
              <span>Administración</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>Usuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>
              <li><a href="<?php echo base_url(); ?>Administrar/Servicio"><i class="fa fa-circle-o"></i>Servicios</a></li>
              <li><a href="<?php echo base_url(); ?>Administrar/Depto"><i class="fa fa-circle-o"></i>Departamentos</a></li>
              <li><a href="<?php echo base_url(); ?>Administrar/Monitor"><i class="fa fa-circle-o"></i>Monitor</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cog"></i>              
              <span>Configuración</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>Configurar"><i class="fa fa-circle-o"></i>Grupo Expediente</a></li>
              <li><a href="<?php echo base_url(); ?>Incidencia"><i class="fa fa-circle-o"></i>Incidencia</a></li>
            </ul>
          </li>
          <!-- ojo menu para administradores solamente -->
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">