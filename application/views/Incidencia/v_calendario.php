<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SRH2018 | Incidencia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/bower_components/fullcalendar/dist/locale/es.js"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
          <li <?php if ($this->uri->segment(1)== 'Plantilla' ) { ?> class="treeview active" <?php } else {?> class="treeview" <?php } ?>>
            <a href="#">
              <i class="fa fa-group"></i> <span>Plantilla</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if ($this->uri->segment(2)== null ) { ?> class="active" <?php } ?>><a href="<?php echo base_url();?>index.php/Plantilla"><i class="fa fa-circle-o"></i>Operativa</a></li>
              <li><a href="<?php echo base_url();?>index.php/Plantilla/Nomina"><i class="fa fa-circle-o"></i>Nomina</a></li>
              <li <?php if ($this->uri->segment(2)== 'General' ) { ?> class="active" <?php } ?>><a href="<?php echo base_url();?>index.php/Plantilla/General"><i class="fa fa-circle-o"></i>General</a></li>
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
          <li><a href="<?php echo base_url(); ?>index.php/Encuesta"><i class="fa fa-circle-o text-aqua"></i><span>Ir a Encuesta DGIS</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h4 class="box-title">Draggable Events</h4>
              </div>
              <div class="box-body">
                <!-- the events -->
                <div id="external-events">
                  <?php foreach ($incidencias as $l1){ ?>
                    <div class="external-event" style="background-color: <?php echo $l1->Color; ?>; color: rgb(255, 255, 255);"><?php echo $l1->Nombre; ?></div>
                  <?php } ?>
                  <div class="checkbox">
                    <label for="drop-remove">
                      <input type="checkbox" id="drop-remove">
                      remove after drop
                    </label>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="box box-primary">
              <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
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
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
  <!-- fullCalendar -->
  <script src="<?php echo base_url(); ?>assets/bower_components/moment/moment.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    $('#calendar').fullCalendar({
      locale: 'es', 
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    // /* ADDING EVENTS */
    // var currColor = '#3c8dbc' //Red by default
    // //Color chooser button
    // var colorChooser = $('#color-chooser-btn')
    // $('#color-chooser > li > a').click(function (e) {
    //   e.preventDefault()
    //   //Save color
    //   currColor = $(this).css('color')
    //   //Add color effect to button
    //   $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    // })
    // $('#add-new-event').click(function (e) {
    //   e.preventDefault()
    //   //Get value and make sure it is not null
    //   var val = $('#new-event').val()
    //   if (val.length == 0) {
    //     return
    //   }

    //   //Create events
    //   var event = $('<div />')
    //   event.css({
    //     'background-color': currColor,
    //     'border-color'    : currColor,
    //     'color'           : '#fff'
    //   }).addClass('external-event')
    //   event.html(val)
    //   $('#external-events').prepend(event)

    //   //Add draggable funtionality
    //   init_events(event)

    //   //Remove event from text input
    //   $('#new-event').val('')
    // })
  })
</script>
</body>
</html>
