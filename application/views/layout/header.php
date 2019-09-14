
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url(); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SARH</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Sistema</b>ARH</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- <li>hola mundo</li> -->
        <!-- Tasks: style can be found in dropdown.less -->
        <!-- User Account: style can be found in dropdown.less -->
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
                <?php echo $this->session->userdata("nombre")?> - <?php switch ($this->session->userdata("IdPerfil")) {
                  case 1:
                  echo 'SuperAdministrador';
                  break;
                  case 2:
                  echo 'Administrador';
                  break;
                  case 3:
                  echo 'Colaborador';
                  break;
                } ?>
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
