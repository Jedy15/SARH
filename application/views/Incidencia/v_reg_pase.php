<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SARH | Registro Pase</title>
  
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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <div class="wrapper">
    <?php
    $this->load->view('layout/main_header');
    $this->load->view('layout/aside');
    ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="btn-group pull-right">          
          <button type="button" class="btn btn-danger margin" id="Cancelar" ><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-info margin" id="Finalizar"><i class="fa fa-save"></i> Finalizar</button>
        </div>
        <h1 id="resul">Registro de Pases de Salida</h1>
        <h1 style="text-align: center;"><?php echo $Persona[0]->SUFIJO.' '.$Persona[0]->NOMBRES.' '.$Persona[0]->APELLIDOS ?></h1>
      </section>

      <section class="content">
        <div class="row">

          <div class="col-md-9">
            <div class="box box-primary">
              <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar">
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /. box -->
          </div>

          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h4 class="box-title">Lista de Incidencia</h4>
              </div>
              <div class="box-body">
                <!-- the events -->
                <div id="external-events">
                  <div class="external-event bg-light-blue">Pase de Salida</div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>

        </div>

        <div class="modal modal-info fade" id="modal-exitoso">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Captura Exitosa!</h4>
              </div>
              <div class="modal-body">
                <p id="exito"></p>
              </div>
              <div class="modal-footer">
                <a class="btn btn-outline" href="<?php echo base_url(); ?>Incidencia/Control/<?php echo $Persona[0]->IdPersonal; ?>">Aceptar</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
    $(document).ready(function() {


      $('#modal-exitoso').on('hidden.bs.modal', function (e) {
        window.location = "<?php echo base_url();  ?>Incidencia/Control/<?php echo $Persona[0]->IdPersonal ?>";
      })



      var contador = 0;
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

    $.post('<?php echo base_url(); ?>Incidencia/CargarIncidencias', {ID: '<?php echo $Persona[0]->IdPersonal ?>'}, function(data) {
      $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
        header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'agendaWeek,listYear'
        },

        // cargamos eventos devueltos en el data de la funcion
        events: $.parseJSON(data),
        defaultTimedEventDuration: '00:30:00',
        selectOverlap : false,  //No deja Arrastrar Objeto al mismo evento
        weekNumbers : true,   //Muestra el numero de la semana

      // allday : true,
        eventOverlap: false,  //Bloquear duracion de eventos se encimen
        // allDayDefault: true,

        allDaySlot  : false,  //quitar la opción todo el día
        editable  : false,  //No editable
        droppable : true, // this allows things to be dropped onto the calendar !!!


     drop      : function (date) { // this function is called when something is dropped
      var TotalMin = 0;          
        // // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')
        // // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)
        // // assign it the date that was reported
        copiedEventObject.start           = date.format()
        var fecha = new Date(copiedEventObject.start)
        fecha.setMinutes(fecha.getMinutes()+30);
        copiedEventObject.end           =  fecha
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')
        copiedEventObject.nuevo = true
        copiedEventObject.IdEvento        = 19
        copiedEventObject.startEditable = false
        copiedEventObject.durationEditable = true        
        copiedEventObject.id = contador
        var Periodo = fecha.getMonth()+' '+fecha.getFullYear();
        TotalMin = Comparacion(Periodo);
        var c = TotalMin+30;              
        if (c<=360) {
          copiedEventObject.nota = '30 min'    
          $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
          contador++
        } else {
          alert('LLego al limite de minutos en este mes');
        }
      }, // al soltar un objeto al calendario

      eventResize: function(event, delta, revertFunc) { //Al cambiar de duracion del evento
        var inicio = moment(event.start);
        var fin = moment(event.end);
        var diff = fin.diff(inicio, 'm');
        if (  diff > 120) { //Comparamos que la nueva duracion no sea mayor a 120 minutos
          alert('La duración no puede ser mayor a 2 hrs');
          revertFunc();
        } else {
         var TotalMin = 0;       
         var fecha = new Date(event.start);
         var Periodo = fecha.getMonth()+' '+fecha.getFullYear();
         TotalMin = Comparacion(Periodo);
         var c = 360-TotalMin;
         event.nota=diff+' Min';
         // alert(event.nota);
         // alert('Minutos encontrados: '+TotalMin+' vs Minutos disponibles: '+c);
         if (c<0) {
          // $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
          // } else {
            alert('LLego al limite de minutos en este mes');
            revertFunc();
          } else {
            $('#calendar').fullCalendar('updateEvent', event);
          }
        }
      }, // fin de eventResise

      eventClick: function(calEvent, jsEvent, view) {
        if (calEvent.nuevo == true) {
          $(this).css('border-color', 'red');
          // confirm('hola');
          var res = confirm('¿Esta seguro de eliminar el '+calEvent.title+'?')
          if (res) {
            $('#calendar').fullCalendar('removeEvents', calEvent._id); 
          }
          // $('#calendar').fullCalendar( ‘removeEvents’, calEvent.id );
        }
      },







      eventRender: function(event, element) {
        if (event.nuevo == true) {
          var i = element.html();
          element.html("<div style='width:90%;float:left;'>"+i+'</div><div class="box-tools pull-right"><i class="fa fa-times text-red"></i></div>');
        }
      } 
      // Fin de eventRender
    })  
    //fin de Calendario
  });

Comparacion = function(Periodo){
  var sumaMinutos = 0;
  var allevents = $('#calendar').fullCalendar('clientEvents', function(event){
    var Inicio = new Date(event.start);
    var tiempo = Inicio.getMonth()+' '+Inicio.getFullYear();
    if (event.IdEvento==19) {          
      if (tiempo == Periodo) {
        var inicio = moment(event.start);
        var fin = moment(event.end);
        var diff = fin.diff(inicio, 'm');
        sumaMinutos = sumaMinutos + diff;
      }
    }
  });
  return sumaMinutos;
} 
// fin de Comparación 


$("#Finalizar").click(function(){
  var allevents = $('#calendar').fullCalendar('clientEvents', function(event){
    if (event.nuevo==true) {
      return true;
    }
    return false;
  });

  if (allevents.length > 0) {
    $(this).addClass('overlay');
    $(this).add().attr('disabled', 'disabled');
    $('.fa-save').removeClass("fa-save").addClass("fa-refresh fa-spin");
    
    var FolioGenerado = $.post('<?php echo base_url();?>Incidencia/Captura', 
      function(data) {
        for (i=0;i<allevents.length;i++) {
          $.post('<?php echo base_url();?>Incidencia/Agregar/<?php echo $Persona[0]->IdPersonal?>', 
          {
            id:       allevents[i].IdEvento,
            start:    allevents[i].start.format(),
            end:      allevents[i].end.format(),
            Folio:    data,
            nota:     allevents[i].nota
          });
        }
      });

    FolioGenerado.done(function(data) {
      $('#modal-exitoso').modal('show');
      $('#exito').html('<h2>Folio generado: <strong>'+data+'</strong></h2>');
    });

  } else{
    alert('No se ha Capturado Ninguna incidencia');
  }
});



$("#Cancelar").click(function() {
  var allevents = $('#calendar').fullCalendar('clientEvents', function(event){
    if (event.nuevo==true) {
      return true;
    }
    return false;
  });

  if (allevents.length > 0) {
    if(confirm('¿Esta seguro de descartar los cambios?')){
     window.location = "<?php echo base_url();  ?>Incidencia/Control/<?php echo $Persona[0]->IdPersonal ?>";
   }
 } else {
   window.location = "<?php echo base_url();  ?>Incidencia/Control/<?php echo $Persona[0]->IdPersonal ?>";
 }
});
})
</script>

</body>
</html>