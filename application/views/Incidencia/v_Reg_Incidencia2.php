<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SARH | Registro Incidencia</title>
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


  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
          <button type="button" class="btn btn-danger margin" id="Cancelar"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-info margin" id="Finalizar"><i class="fa fa-save"></i> Finalizar</button>
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
                <div id="external-events">
                  <table id="example1" class="table table-bordered">
                    <thead>
                      <tr>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($dias as $item) {  ?>
                        <tr>
                          <td id="<?php echo $item->Id ?>" class="external-event" style="background-color: <?php echo $item->Color; ?> ; border-color: <?php echo $item->Color; ?>; color: rgb(255, 255, 255); position: relative;"> <?php echo $item->Nombre ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  </tfoot>

                </table>
              </div>


              <!-- the events -->

            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

      <div class="modal modal-success fade" id="modal-fin">
        <div class="modal-dialog modal-sm">           
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Comentario a la Incidencia </h4>
            </div>
            <div class="modal-body">
              <div class="small-box bg-green">
                <div class="form-group">
                  <label>Comentario</label>
                  <div id="error">
                    <input type="text" class="form-control" id="txtNota" placeholder="Agregue comentario aqui" autofocus required="">
                    <input type="hidden" id="notaid">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-outline" id="AgregarNota">Agregar</button>
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
<script src="<?php echo base_url(); ?>assets/bower_components/fullcalendar/dist/locale/es.js""></script>
<!-- Page specific script -->


<script>
  $(document).ready(function() {

    var contador = 0;

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

    init_events($('#external-events td.external-event'))
    $.post('<?php echo base_url(); ?>Incidencia/CargarIncidencias', {ID: '<?php echo $Persona[0]->IdPersonal ?>'}, function(data) {
      $('#calendar').fullCalendar({
        header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'month,listYear'
        },

        buttonText: {
          today: 'Hoy',
          month: 'Mes',
          listYear : 'Agenda'
        },

        events: $.parseJSON(data),

          eventOverlap: false,  //Bloquear 2 eventos el mismo dia
          forceEventDuration : true,
          editable  : false,
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
           copiedEventObject.nuevo = true
           copiedEventObject.startEditable = true
           copiedEventObject.durationEditable = true        
           copiedEventObject.id = contador

           var encontro = Existe(copiedEventObject.IdEvento);
           if (encontro>0) {
            if(confirm("Este Personal ya tiene "+encontro+" Registro(s) de la Incidencia "+copiedEventObject.title+". ¿Desea Agregarlo nuevamente?")){                   
              $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
              contador ++;
              CrearNota(copiedEventObject.id);
            }
          } else {
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            contador ++;
            CrearNota(copiedEventObject.id);
          }
        },

        eventRender: function(event, element) {
          if (event.nuevo) {
            var elemento = element.html()
            element.html(elemento+'<div class="box-tools pull-right"><button type="button" id="borrar" class="btn btn-box-tool"><i class="fa   fa-times text-red"></i></button></div>');
            element.find('#borrar').click(function() {
              $('#calendar').fullCalendar('removeEvents', event.id);
            });
          }
        }

      });
    });

    Existe = function(Id_Inc){
      var Contar = 0;
      var allevents = $('#calendar').fullCalendar('clientEvents', function(event){
        if (event.IdEvento == Id_Inc) {
          Contar ++
        }
      });
      return Contar;
    }

    HayNuevo = function(){
      var cuenta = 0;
      var allevents = $('#calendar').fullCalendar('clientEvents', function(event){
        if (event.nuevo==true) {
          cuenta ++;
        }
      });
      return cuenta;
    }

    $('#Cancelar').click(function() {
      if (HayNuevo()>0) {
        if(confirm('¿Esta seguro de descartar los cambios?')){
         window.location = "<?php echo base_url();  ?>Incidencia/Control/<?php echo $Persona[0]->IdPersonal ?>";
       }
     } else {
       window.location = "<?php echo base_url();  ?>Incidencia/Control/<?php echo $Persona[0]->IdPersonal ?>";
     }
   });

    $('#Finalizar').click(function() {
      var allevents = $('#calendar').fullCalendar('clientEvents', function(event){
        if (event.nuevo==true) {
          return true;
        }
        return false;
      });

      if (allevents.length > 0) {
        $.post('<?php echo base_url();?>Incidencia/Captura', {}, 
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
            window.location = "<?php echo base_url();?>Incidencia/Fin/<?php echo $Persona[0]->IdPersonal ?>/"+data;
          });
      } else{
        alert('No se ha Capturado Ninguna incidencia');
      }
    });




    function CrearNota($id){
      $('#modal-fin').modal('toggle');
      $('#notaid').val($id)
      $('#txtNota').val('')
    }

    $('#AgregarNota').click(function() {
      id = $('#notaid').val()
      nota = $('#txtNota').val()
      $('#modal-fin').modal('toggle');
      var allevents = $('#calendar').fullCalendar('clientEvents', function(event){
        if (event.id==id) {
          event.nota = nota;      
          $('#calendar').fullCalendar('updateEvent', event);
            // console.log(event);
          }
        });
    });



  })




</script>

<script>
  $(function () {
   $('#example1').DataTable({
    "dom": '<f<t>p>',
    'paging'      : true,
    'searching'   : true,
    'ordering'    : false,
    'info'        : false,

    "language": {
      // "info": "Mostrando del _START_ al _END_ de _TOTAL_ Registros",
      "search": "Buscar:",
      // "infoFiltered": "(Filtrado de _MAX_ Registros Totales)",
      // "lengthMenu": "_MENU_ Registros Mostrados",
      paginate: {
        previous: 'Anterior',
        next:     'Siguiente'
      }
    }
  })
 })
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