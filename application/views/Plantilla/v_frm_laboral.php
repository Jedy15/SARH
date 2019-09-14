
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SARH | <?php echo $title;?> Registro</title>
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

<?php if($this->session->flashdata("Aviso")):?>
  <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Información sobre Actualizacion de Versión!</h4>
    <?php echo $this->session->flashdata("Aviso")?>
  </div>
<?php endif; ?>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <div class="wrapper">

    <?php
    $this->load->view('layout/main_header');
    $this->load->view('layout/aside');
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          <?php echo $persona[0]->NOMBRES.' '.$persona[0]->APELLIDOS ?>
          <small><?php echo $title;?> Registro Laboral</small>
        </h1>
      </section>
      <section class="content">
        <?php echo form_open(); ?>
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Datos Laborales <?php if ($this->uri->segment(2)=='EditarLaboral' ){ echo 'N° '.$datos_reg[0]->IdLaboral; } ?></h3>
            <?php if ($this->uri->segment(2)=='EditarLaboral') {?>
              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Creación"><?php echo $datos_reg[0]->FechaReg ?></span>
                <span data-toggle="tooltip" title="" class="badge bg-blue" data-original-title="Ultima Actualización"><?php echo $datos_reg[0]->Fecha ?></span>
                <span data-toggle="tooltip" title="" class="badge bg-navy" data-original-title="Ultimo Usuario"><?php echo $Usuario[0]->Nombre.' '.$Usuario[0]->Apellido ?></span>
              </div>
            <?php } ?>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group" id="SelectJuris">
                  <label for="IdJuris">Jurisdicción</label>
                  <select class="form-control select2" name="Jurisdicción" id="IdJuris" style="width: 100%;" <?php if ($this->session->userdata("IdPerfil")>=3 ){echo 'disabled';} ?>>
                    <option value="">--Seleccione Jurisdicción--</option>
                  </select>
                </div>
                <div class="form-group" id="SelectUnidad" style="display:none">
                  <label for="IdAds">Unidad de Adscripción</label>
                  <select class="form-control select2" style="width: 100%;" name="IdAds" id="IdAds" required="" <?php if ($this->session->userdata("IdPerfil")>=3 ){echo 'disabled';} ?>>
                  </select>
                </div>                  
                <div class="form-group">
                  <label for="IdTipoTrabajador">Tipo de Trabajador</label>
                  <select class="form-control select2" style="width: 100%;" name="IdTipoTrabajador" id="IdTipoTrabajador" required="" <?php if ($this->session->userdata("IdPerfil")>=3 ){echo 'disabled';} ?> >
                    <option selected="selected" value="">--Seleccione Tipo--</option>
                    <?php foreach ($tra as $item):
                      if($item->IdTipoTrabajador==set_value('IdTipoTrabajador',@$datos_reg[0]->IdTipoTrabajador)){?>
                        <option value="<?php echo $item->IdTipoTrabajador;?>" selected="selected"><?php echo $item->TIPOTRABAJADOR;?></option>
                      <?php } else { ?>
                        <option value="<?php echo $item->IdTipoTrabajador;?>"><?php echo $item->TIPOTRABAJADOR;?></option>
                      <?php } endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="CODIGO">Codigo</label>
                    <select class="form-control select2" style="width: 100%;" name="Codigo" id="Codigo" required <?php if ($this->session->userdata("IdPerfil")>=3 ){echo 'disabled';} ?> >
                      <option selected="selected" value="">--Seleccione Codigo--</option>
                      <?php foreach ($codigo as $item):
                        if($item->CODIGO==set_value('Codigo',@$datos_reg[0]->Codigo)){?>
                          <option value="<?php echo $item->CODIGO;?>" selected="selected"><?php echo  $item->CODIGO.' '.$item->PUESTO;?></option>
                        <?php } else { ?>
                          <option value="<?php echo $item->CODIGO;?>"><?php echo  $item->CODIGO.' '.$item->PUESTO;?></option>
                        <?php } endforeach;?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Id_Programa">Programa</label>
                      <select class="form-control select2" style="width: 100%;" name="Id_Programa" id="Id_Programa">
                        <option></option>
                      </select>
                    </div> 
                  </div><!-- fin de columna 1 -->

                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="FInicio">Fecha de Ingreso a SSA</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" required=”required” class="form-control" name="FInicio" id="FInicio" value="<?php echo set_value('FInicio',@$datos_reg[0]->FInicio); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="FIGF">Fecha de Ingreso a Gobierno Federal</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control" name="FIGF" id="FIGF" value="<?php echo set_value('FIGF',@$datos_reg[0]->FIGF); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="Clave">Clave Presupuestal</label>
                      <input type="text" class="form-control" required name="Clave" id="Clave" placeholder="Clave" maxlength="28" size="28" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('Clave',@$datos_reg[0]->Clave); ?>">
                    </div>
                    <?php if ($this->session->userdata("IdPerfil")<2 and $this->uri->segment(2)=='EditarLaboral') { ?>
                      <div class="form-group">
                       <label for="IdEstatus">Estatus</label>
                       <select class="form-control select2" style="width: 100%;" name="IdEstatus" id="IdEstatus" required="" <?php if ($this->session->userdata("IdPerfil")>=3 ){echo 'disabled';} ?> >
                        <option selected="selected" value="">--Seleccione Estatus--</option>
                        <?php foreach ($estatus as $item):
                          if($item->IdEstatus==set_value('IdEstatus',@$datos_reg[0]->IdEstatus)){?>
                            <option value="<?php echo $item->IdEstatus;?>" selected="selected"><?php echo $item->Estatus?></option>
                          <?php } else { ?>
                            <option value="<?php echo $item->IdEstatus;?>"><?php echo $item->Estatus?></option>
                          <?php } endforeach;?>
                        </select> 
                      </div>
                    <?php } ?> 


                    <div class="form-group">
                      <label for="IdTipoTrabajador">Sindicato</label>
                      <select class="form-control select2" style="width: 100%;" name="IdSeccion" id="IdSeccion">
                        <option></option>
                      </select>
                    </div>

                    <div class="form-group" id="ListaSubseccion" style="display:none">
                      <label for="IdTipoTrabajador">Subsección</label>
                      <select class="form-control select2" style="width: 100%;" name="Id_Subseccion" id="Id_Subseccion">
                        <option></option>
                      </select>
                    </div> 

                  </div><!-- fin de columna 2 -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="PERCEPCION">Percepción Quincenal</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" class="form-control" name="PERCEPCION" id="PERCEPCION" step="0.01" value="<?php echo set_value('PERCEPCION',@$datos_reg[0]->PERCEPCION); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="DEDUCCION">Deducción Quincenal</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" class="form-control" name="DEDUCCION" id="DEDUCCION" step="0.01" value="<?php echo set_value('DEDUCCION',@$datos_reg[0]->DEDUCCION); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="NETO">Neto Quincenal</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" class="form-control" name="NETO" id="NETO" step="0.01" value="<?php echo set_value('NETO',@$datos_reg[0]->NETO); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nota">Observaciones Generales</label>
                      <textarea class="form-control" rows="3" name="nota" id="nota" placeholder="Observaciones..."><?php echo set_value('nota',@$datos_reg[0]->nota); ?></textarea>
                    </div>
                    <?php if ($this->session->userdata("IdPerfil")<2 ) { ?>
                      <?php if ($this->uri->segment(2)=='EditarLaboral') {?>
                        <div class="form-group">
                          <label for="">Activo:</label>
                          <div class="row">
                            <div class="col-xs-6">
                              <label>
                                <input type="radio" name="status" class="minimal"  value="1" <?php if(set_value('status',@$datos_reg[0]->status)=='1'){echo 'checked';}?>>
                                Si
                              </label>
                            </div>
                            <div class="col-xs-6">
                              <label>
                                <input type="radio" name="status" class="minimal" value="0" <?php if(set_value('status',@$datos_reg[0]->status)=='0'){echo 'checked';}?>>
                                No
                              </label>
                            </div>
                          </div>
                        </div>
                      <?php } 
                    }?>
                  </div><!-- fin de columna 3 -->
                </div>
                <div class="box-footer">
                  <a href="<?php echo base_url();?>plantilla/ver/<?php echo $persona[0]->IdPersonal ?>" class="btn btn-danger" id="btncancelar" >Cancelar</a>
                  <button type="submit" class="btn btn-primary pull-right" id="btnGuardar">Guardar</button>
                </div>
              </div>    
            </div>
            <?php echo form_close(); ?>
          </section>
        </div>

        <?php $this->load->view('layout/footer_v2'); ?>
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

         $.post('<?php echo base_url(); ?>Administrar/ListaSeccion', function(data, textStatus, xhr) {
          var datos = $.parseJSON(data);
          $('#IdSeccion').select2({
            placeholder: "Seleccione una opción",
            data: datos
          });

          <?php if ($datos_reg[0]->IdSeccion) { ?>
            var id = <?php echo $datos_reg[0]->IdSeccion ?>;
            $('#IdSeccion').val(id);
            $('#IdSeccion').trigger('change');
            console.log(id);
          <?php } ?>
        });

         $.post('<?php echo base_url(); ?>Administrar/ListaPrograma', function(data, textStatus, xhr) {
          var datos = $.parseJSON(data);
          $('#Id_Programa').select2({
            placeholder: "Seleccione una opción",
            data: datos
          });

          <?php if ($datos_reg[0]->Id_Programa) { ?>
            var id = <?php echo $datos_reg[0]->Id_Programa ?>;
            $('#Id_Programa').val(id);
            $('#Id_Programa').trigger('change');
            console.log(id);
          <?php } ?>
        });

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


        <script>
          $(document).ready(function(){

            $('#IdSeccion').change(function(event) {
              $('#Id_Subseccion').html(''); //Vaciar la lista desplegable antes de carnuevamente los datos

              var selecionado = $('#IdSeccion option:selected').val();
              SelectSubseccion(selecionado);
              $('#ListaSubseccion').show('slow/400/fast');
            });



              // $('#SelectUnidad').hide();
              lista1(0);

              <?php if ($datos_reg[0]) { ?>
                var reg = <?php echo $datos_reg[0]->CLAVE_JURISDICCION; ?>;
                lista1(reg);
                var Adscripcion = <?php echo $datos_reg[0]->IdAds; ?>;
                lista2(reg, Adscripcion);

                var IdSeccion = <?php echo $datos_reg[0]->IdSeccion; ?>;

                SelectSubseccion(IdSeccion);
                $('#ListaSubseccion').show();
                var Id_Subseccion = <?php echo $datos_reg[0]->Id_Subseccion; ?>;

                $('#ListaSubseccion').val(Id_Subseccion);
                $('#ListaSubseccion').trigger('change'); // Notify any JS components that the value changed

              <?php } ?>

              $("#IdJuris").change(function() {
               $('#SelectUnidad').show('slow/400/fast', function() {              
               });
               var valor = $('#IdJuris option:selected').text()
               lista2(valor, 0);
             });

              function lista1(clavejuris) {
                $.post('<?php echo base_url(); ?>Plantilla/CargarJuris', {}, 
                  function(data, textStatus, xhr) {
                    var datos = $.parseJSON(data);
                    for(var i in datos) {
                      if (clavejuris == datos[i].CLAVE_JURISDICCION) {
                       $("#IdJuris").append('<option selected="selected" value="'+datos[i].CLAVE_JURISDICCION+'">'+datos[i].CLAVE_JURISDICCION+'</option>');
                     } else {
                       $("#IdJuris").append('<option value="'+datos[i].CLAVE_JURISDICCION+'">'+datos[i].CLAVE_JURISDICCION+'</option>');
                     }
                   }
                 });
             } //Fin funcion lista1

             function lista2(clavejuris, IdAds){
               $.post("<?php echo base_url(); ?>Plantilla/CargarUnidad", { id : clavejuris}, function(data) {
                var datos = $.parseJSON(data);
                var opciones
                for(var i in datos) {
                  if (IdAds==datos[i].ID) {
                    opciones += '<option selected="selected" value="'+datos[i].ID+'">'+datos[i].CLUES+' '+datos[i].NOMBREUNIDAD+'</option>';
                  } else {
                    opciones += '<option value="'+datos[i].ID+'">'+datos[i].CLUES+' '+datos[i].NOMBREUNIDAD+'</option>';
                  }
                }
                $('#SelectUnidad').show();

                $("#IdAds").html(opciones);
              });

             }

             function SelectSubseccion(seccion){
              $.post('<?php echo base_url(); ?>Administrar/ListaSubseccion', {IdSeccion: seccion}, function(data, textStatus, xhr) {
                var datos = $.parseJSON(data);
                if (datos) {
                  $('#Id_Subseccion').select2({
                    allowClear: true,
                    placeholder: "Seleccione una opción",
                    data: datos
                  });
                }              
              });
            }



      }); //fin ready Function
    </script>
  </body>
  </html>