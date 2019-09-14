<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SRH2018 | <?php echo $titulo ?>  Usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

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
<?php echo form_error('Pass','<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-ban"></i> Error!</h4>','</div>') 
  ?>
  <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>HM</b>18</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SistemaHM</b>2018</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
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
                      <a href="<?php echo base_url(); ?>index.php/usuarios/perfil/<?php echo $this->session->userdata('id'); ?>" class="btn btn-success btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>index.php/clogin/logout" class="btn btn-danger btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
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
            <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i> <span>Plantilla</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/Plantilla"><i class="fa fa-circle-o"></i>Operativa</a></li>
                <li><a href="<?php echo base_url();?>index.php/Plantilla/Nomina"><i class="fa fa-circle-o"></i>Nomina</a></li>
                <li><a href="<?php echo base_url();?>index.php/Plantilla/General"><i class="fa fa-circle-o"></i>General</a></li>
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
              <li class="treeview active">
                <a href="#">
                  <i class="fa fa-briefcase"></i>
                  <span>Administración</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>index.php/Usuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Administrar/Servicio"><i class="fa fa-circle-o"></i>Servicios</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Administrar/Depto"><i class="fa fa-circle-o"></i>Departamentos</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Administrar/Monitor"><i class="fa fa-circle-o"></i>Monitor</a></li>
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
                  <li><a href="<?php echo base_url(); ?>index.php/Configurar"><i class="fa fa-circle-o"></i>Grupo Expediente</a></li>
                </ul>
              </li>
              <!-- ojo menu para administradores solamente -->
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Registro de Usuario
          </h1>
        </section>
        <section class="content">
          <div class="box box-success">
            <?php echo form_open(); ?>
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Usuario</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre(s)" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('Nombre',@$datos_reg[0]->Nombre); ?>" required="">
                  </div>                
                  <div class="form-group">
                    <label for="Apellido">Apellidos</label>
                    <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Apellido(s)" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('Apellido',@$datos_reg[0]->Apellido); ?>" required="" >
                  </div>

                </div>
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="Usuario">Usuario</label>
                    <input type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Nombre de Usuario" value="<?php echo set_value('Usuario',@$datos_reg[0]->Usuario); ?>" required="" <?php if ($this->uri->segment(2)<>'nuevo' ){echo 'disabled';} ?>>
                  </div>
                  <div class="form-group">
                    <label for="Pass">Contraseña</label>
                    <input type="password" class="form-control" name="Pass" id="Pass" placeholder="Nombre de Usuario" value="<?php echo set_value('Pass',@$datos_reg[0]->Pass); ?>" required="">
                  </div>                  
                  <div class="form-group">
                    <label for="Pass2">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="Pass2" id="Pass2" placeholder="Nombre de Usuario" value="<?php echo set_value('Pass2',@$datos_reg[0]->Pass); ?>" required="">
                  </div>
                </div>
                <div class="col-xs-4">
                  <?php if ($this->session->userdata('IdPerfil')<=2){?>
                    <?php if($this->uri->segment(2)<>'perfil'){?>
                      <div class="form-group">
                        <label>Perfil de Usuario</label>
                        <select class="form-control select2" style="width: 100%;" name="IdPerfil" id="IdPerfil" required="">
                          <option selected="selected" value="">--Seleccione Perfil--</option>
                          <?php foreach ($Perfil as $item):
                            if($item->IdPerfilUser==set_value('IdPerfil',@$datos_reg[0]->IdPerfil)){?>
                              <option value="<?php echo $item->IdPerfilUser;?>" selected="selected"><?php echo $item->Perfil;?></option>
                            <?php } else { ?>
                              <option value="<?php echo $item->IdPerfilUser;?>"><?php echo $item->Perfil;?></option>
                            <?php } endforeach;?>
                          </select>
                        </div>
                      <?php } ?>
                    <?php } ?>
                    <?php if ($this->uri->segment(2)== 'editar' ) { ?>
                      <div class="form-group">
                        <label>Estatus:</label>
                        <div class="row">
                          <div class="col-xs-6">
                            <label>
                              <input type="radio" name="activo" class="minimal"  value="1" <?php if(set_value('activo',@$datos_reg[0]->activo)=='1'){echo 'checked';}?>>
                              Activo
                            </label>
                          </div>
                          <div class="col-xs-6">
                            <label>
                              <input type="radio" name="activo" class="minimal" value="0" <?php if(set_value('activo',@$datos_reg[0]->activo)=='0'){echo 'checked';}?>>
                              Inactivo
                            </label>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <?php switch ($this->uri->segment(2)){
                  case 'nuevo':
                  ?><a href="<?php echo base_url();?>index.php/usuarios" class="btn btn-danger">Cancelar</a><?php
                  break;
                  case 'perfil':
                  ?><a href="<?php echo base_url();?>index.php/Plantilla" class="btn btn-danger">Cancelar</a><?php  
                  break;
                  case 'editar':
                  ?><a href="<?php echo base_url();?>index.php/usuarios" class="btn btn-danger">Cancelar</a><?php
                  break;
                }?>
                <button type="submit" class="btn btn-primary pull-right">Guardar</button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </section>
        </div>
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 0.3.2
          </div>
          <strong>Copyright &copy; 2018 <a href="https://www.facebook.com/JedySistemas">J-edy Sistemas Informáticos</a>.</strong> All rights
          reserved.

        </footer>
        <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->

      <!-- jQuery 3 -->
      <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
      <!-- SlimScroll -->
      <script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- iCheck 1.0.1 -->
      <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
      <!-- Page script -->
      <script>
        $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
      // use24hours: true,
      // format: 'HH:mm'

    })
  })
</script>
</body>
</html>