<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SRH2018 | Registro Incidencia</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">


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
          <li class="treeview active">
            <a href="#">
              <i class="fa fa-group"></i> <span>Plantilla</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li  class="active"><a href="<?php echo base_url();?>Plantilla"><i class="fa fa-circle-o"></i>Operativo</a></li>
              <li><a href="<?php echo base_url();?>Plantilla/Nomina"><i class="fa fa-circle-o"></i>Nomina</a></li>
              <li><a href="<?php echo base_url();?>Plantilla/General"><i class="fa fa-circle-o"></i>General</a></li>
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
            <li class="treeview">
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
          <!-- <li><a href="<?php //echo base_url(); ?>Encuesta"><i class="fa fa-circle-o text-aqua"></i><span>Ir a Encuesta DGIS</span></a></li> -->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="btn-group pull-right">          
          <button type="button" class="btn btn-danger margin" onclick="cancelar()"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-info margin" id="btnFin" onclick="GuardarEventos()"><i class="fa fa-save"></i> Finalizar</button>
        </div>
        <h1>Registro de Incidencias</h1>
        <h1 style="text-align: center;"><?php echo $Persona[0]->SUFIJO.' '.$Persona[0]->NOMBRES.' '.$Persona[0]->APELLIDOS ?></h1>
      </section>
      <section class="content">
        <div class="row">
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
          <div class="col-md-3">
            <div class="box box-solid box-primary">
              <div class="box-header with-border">
                <h4 class="box-title">Lista de Incidencias</h4>
              </div>
              <div class="box-body">
                <!-- the events -->
                <div id="external-events">
                  <?php foreach ($dias as $item) {  ?>
                    <div id="<?php echo $item->Id ?>" class="external-event" style="background-color: <?php echo $item->Color; ?> ; border-color: <?php echo $item->Color; ?>; color: rgb(255, 255, 255); position: relative;"> <?php echo $item->Nombre ?></div>
                  <?php } ?>
                <!-- <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div> -->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

      <div class="modal modal-success fade" id="modal-fin">
        <div class="modal-dialog modal-sm">           
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Incidencia(s) Capturadas</h4>
            </div>
            <div class="modal-body">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-success" id="autorizar">Autorizar</button>
            </div>
          </div>
        </div>
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
</div>

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

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- fullCalendar -->

<script src="<?php echo base_url(); ?>assets/bower_components/moment/moment.js"></script>

<script src="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/locale/es.js"></script>
<!-- Page specific script -->
<script>
  var EventoTemp = [];
  var arrayJS=<?php echo json_encode($evento);?>;
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

    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,listYear,agendaDay'
      },
      buttonText: {
        today: 'Hoy',
        month: 'Mes',
        listYear : 'Agenda',
        day  : 'Dia'
      },
      //Random default events
      events    : [
      <?php foreach ($evento as $li){ ?>
        {
          id: ' <?php echo $li->Id; ?>',
          title: '<?php echo $li->title; ?>',
          start: '<?php echo $li->start; ?>',
          <?php if ($li->end) { ?>
            end: '<?php echo $li->end; ?>',
          <?php } ?>
          color: '<?php echo $li->Color; ?>',
          editable: false,
          allDay : true
          // overlap: false
        },
      <?php } ?>
      ],
      eventOverlap: false,  //Bloquear 2 eventos el mismo dia
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      selectOverlap: function(event) {
        return event.rendering === 'background';
      },

      drop  : function (date, allDay) { 
        // this function is called when something is droppe
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date.format()
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')
        copiedEventObject.IdEvento        = $(this).attr("id")
        copiedEventObject.id              = EventoTemp.length*-1

        if(arrayJS==''){
         $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
         EventoTemp[EventoTemp.length] = copiedEventObject
       } else {
        var idEvento = $(this).attr('id')
        $.post('<?php echo base_url(); ?>Incidencia/Comparar/<?php echo $Persona[0]->IdPersonal?>', {
          Id: idEvento
        }, function(data) {
          if (data>0) {
            if(!confirm("Este Personal ya tiene "+data+" Registro(s) de la Incidencia "+copiedEventObject.title+". ¿Desea Agregarlo nuevamente?")){
              revertFunc();
            } else {
              $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
              EventoTemp[EventoTemp.length] = copiedEventObject
            }
          } else{
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
            EventoTemp[EventoTemp.length] = copiedEventObject
          }
        });
      }
      }, //fin de DROP


      eventDrop: function(event, delta, revertFunc){
        EventoTemp.find(function(item, index) {
          if (item.id==event.id) {
            item.start = event.start.format();
            if (item.end) {
              item.end = event.end.format();
            }            
          }
        });
      },

      eventResize: function(event, delta, revertFunc) { //al cambiar de duracion el evento
        EventoTemp.find(function(elemento) { 
          if (elemento.id==event.id) {
           elemento.end = event.end.format();
         }
       });
      },

      eventRender: function(event, element) {
       if (event.id<=0) {
        var elemento = element.html()
        element.html(elemento+'<div class="box-tools pull-right"><button type="button" id="borrar" class="btn btn-box-tool"><i class="fa   fa-times text-red"></i></button></div>');
        element.find('#borrar').click(function() {
          EventoTemp.find(function(item, index) { //funcion para encontrar un elemento dentro el los eventos temporales
            if (item.id==event.id) {  //Al encontrar el evento igual al que se le dio clic
             var elementoEliminado = EventoTemp.splice(index,1); //elimina el arreglo de la lista
             $('#calendar').fullCalendar('removeEvents', event.id);
           }
         });
        });
      }
    },

  })
})

function GuardarEventos(){
  if(EventoTemp==''){
    alert('No se ha Capturado Ninguna incidencia')
  } else {

    $.post('<?php echo base_url();?>Incidencia/Captura', {}, 
      function(data) {
        EventoTemp.forEach(function(elemento, indice) {
          $.post('<?php echo base_url();?>Incidencia/Agregar/<?php echo $Persona[0]->IdPersonal?>', 
          {
            id:       elemento.IdEvento,
            start:    elemento.start,
            end:      elemento.end,
            Folio:    data
          }, function(data) {
          });

        });//Fin del ForEach
        // location.reload();
        // window.location = "<?php //echo base_url();  ?>Incidencia/movimiento/<?php //echo $Persona[0]->IdPersonal ?>";
        window.location = "<?php echo base_url();  ?>Incidencia/Fin/<?php echo $Persona[0]->IdPersonal ?>/"+data;


      }); //Fin del Primer Post
       // location.reload();
     }
   }

   function cancelar(){
    if(EventoTemp==''){
     window.location = "<?php echo base_url();  ?>Incidencia/movimiento/<?php echo $Persona[0]->IdPersonal ?>";
   } else {
    if(confirm('¿Esta seguro de descartar los cambios?')){
     window.location = "<?php echo base_url();  ?>Incidencia/movimiento/<?php echo $Persona[0]->IdPersonal ?>";
   }
 }
}
</script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
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
    })
  })
</script>

</body>
</html>