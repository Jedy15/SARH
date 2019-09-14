<?php 
$id = $this->session->userdata('id');
// $nombre_fichero = $_SERVER['DOCUMENT_ROOT'].'/images/user/'.$id.'/foto'.$id.'.JPG';
$nombre_fichero = $_SERVER['DOCUMENT_ROOT'].'/SARH/images/user/'.$id.'/foto'.$id.'.JPG';

$state = 0;
if (file_exists($nombre_fichero)) {
  // $ruta = '//'.$_SERVER["SERVER_NAME"].'/images/user/'.$id.'/foto'.$id.'.JPG';
  $ruta = '//'.$_SERVER["SERVER_NAME"].'/SARH/images/user/'.$id.'/foto'.$id.'.JPG';  
} else {
  // $ruta = "//".$_SERVER["SERVER_NAME"].'/images/user/avatar.png';
  $ruta = "//".$_SERVER["SERVER_NAME"].'/SARH/images/user/avatar.png';

  $state ++;
} 
?>

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

        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning"><?php echo $state ?></span>
          </a>
          <?php if ($state>0) { ?>
           <ul class="dropdown-menu">
            <li class="header">Tienes <?php echo $state ?> Notificaciónes</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="<?php echo base_url(); ?>usuarios/perfil/<?php echo $this->session->userdata('id'); ?>">
                    <i class="fa fa-user text-yellow"></i> Aun No tienes foto de perfil
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        <?php } ?>
      </li>

      <!-- <li>hola mundo</li> -->
      <!-- Tasks: style can be found in dropdown.less -->
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo $ruta; ?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $this->session->userdata("nombre").' '.$this->session->userdata("ap")?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo $ruta; ?>" class="img-circle" alt="User Image">
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
