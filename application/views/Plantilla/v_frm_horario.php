<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SARH | <?php echo $title; ?> Horario</title>
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
    <h4><i class="icon fa fa-ban"></i> !</h4>
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
        <h1><?php echo $persona[0]->NOMBRES.' '.$persona[0]->APELLIDOS ?>          
        <small>
          Registro de Horario
        </small>
      </h1>
    </section>
    <section class="content">
      <?php echo form_open(); ?>
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de Horario <?php if ($this->uri->segment(2)=='EditarHorario' ){ echo 'N° '.$datos_reg[0]->IdHorario; } ?></h3>
          <?php if ($this->uri->segment(2)<>'nuevohorario') {?>
            <div class="box-tools pull-right">
              <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Creación"><?php echo $datos_reg[0]->FechaReg ?></span>
              <span data-toggle="tooltip" title="" class="badge bg-blue" data-original-title="Ultima Actualización"><?php echo $datos_reg[0]->Fecha ?></span>
              <span data-toggle="tooltip" title="" class="badge bg-navy" data-original-title="Ultimo Usuario"><?php echo $Usuario[0]->Nombre.' '.$Usuario[0]->Apellido ?></span>
            </div>
          <?php } ?>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                <label for="IdRegistro">Tipo de Registro</label>
                <select class="form-control select2" style="width: 100%;" name="IdRegistro" id="IdRegistro" autofocus="" required="">
                  <option selected="selected" value="">--Seleccione Tipo de Registro--</option>
                  <?php foreach ($reg as $item):
                    if($item->IdTipoRegistro == set_value('IdRegistro',@$datos_reg[0]->IdRegistro)){?>
                      <option value="<?php echo $item->IdTipoRegistro;?>" selected="selected"><?php echo $item->TIPOREGISTRO;?></option>
                    <?php } else { ?>
                      <option value="<?php echo $item->IdTipoRegistro;?>"><?php echo $item->TIPOREGISTRO;?></option>
                    <?php } endforeach;?>
                  </select>
                </div>
                <?php if($this->session->flashdata("tarjeta")){?>
                  <div class="form-group has-error">
                    <label class="control-label" for="NTarjeta"><i class="fa fa-times-circle-o"></i> Error Numero de Tarjeta</label>
                    <input type="number" min="1" name="NTarjeta" class="form-control" id="NTarjeta" placeholder="Numero de Tarjeta" value="<?php echo set_value('NTarjeta',@$datos_reg[0]->NTarjeta); ?>">
                    <span class="help-block"><?php echo $this->session->flashdata("tarjeta")?></span>
                  </div>
                <?php } else { ?>
                  <div class="form-group">
                    <label for="NTarjeta">Numero de Tarjeta</label>
                    <input required="" type="number" class="form-control" min="1" name="NTarjeta" id="NTarjeta" placeholder="Numero de Tarjeta" value="<?php echo set_value('NTarjeta',@$datos_reg[0]->NTarjeta); ?>" <?php if ($this->uri->segment(2)=='EditarHorario' and $this->session->userdata("IdPerfil")>2){ echo 'disabled';} ?>>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <label for="fi">Fecha de Inicio</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" required=”required” class="form-control" name="fi" id="fi" value="<?php echo set_value('fi',@$datos_reg[0]->fi); ?>">
                  </div>
                </div>                
              </div> <!-- FIN col 3   -->
              <div class="col-xs-3">
                <div class="form-group">
                  <label for="IdTurno">Turno</label>
                  <select class="form-control select2" style="width: 100%;" name="IdTurno" id="IdTurno" required="" <?php if ($this->uri->segment(2)=='EditarHorario' and $this->session->userdata("IdPerfil")>2){ echo 'disabled';} ?>>
                    <option value="">--Seleccione Turno--</option>
                    <?php foreach ($turno as $item):
                      if($item->IdTurno == set_value('IdTurno',@$datos_reg[0]->IdTurno)){?>
                        <option value="<?php echo $item->IdTurno;?>" selected="selected"><?php echo $item->Turno;?></option>
                      <?php } else { ?>
                        <option value="<?php echo $item->IdTurno;?>"><?php echo $item->Turno;?></option>
                      <?php } endforeach;?>
                    </select>
                  </div> 
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label for="HE">Hora de Entrada:</label>
                      <div class="input-group">
                        <input type="text" class="form-control timepicker" name="HE" id="HE" value="<?php echo set_value('HE',@$datos_reg[0]->HE);?>">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label for="HS">Hora de Salida:</label>
                      <div class="input-group">
                        <input type="text" class="form-control timepicker" name="HS" id="HS" value="<?php echo set_value('HS',@$datos_reg[0]->HS);?>">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="DIAS">Dias Laborales</label>
                    <input type="text" class="form-control" placeholder="Ejemplo: 'Lunes - viernes'" name="DIAS" ID="DIAS" required="" value="<?php echo set_value('DIAS',@$datos_reg[0]->DIAS);?>"> 
                  </div>
                </div> <!-- fin col 3 -->
                <div class="col-xs-3">
                  <div class="form-group">
                    <label>Departamento</label>
                    <select class="form-control select2" style="width: 100%;" name="IdDepto" id="IdDepto" required="" <?php if ($this->uri->segment(2)=='EditarHorario' and $this->session->userdata("IdPerfil")>2){ echo 'disabled';} ?>>
                      <option value="" selected="selected">--Seleccione Departamento--</option>
                      <?php foreach ($depto as $item):
                        if($item->IdDepto == set_value('IdDepto',@$datos_reg[0]->IdDepto)){?>
                          <option value="<?php echo $item->IdDepto;?>" selected="selected"><?php echo $item->DEPARTAMENTO;?></option>
                        <?php } else { ?>
                          <option value="<?php echo $item->IdDepto;?>"><?php echo $item->DEPARTAMENTO;?></option>
                        <?php } endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Servicio</label>
                      <select class="form-control select2" style="width: 100%;" name="IdServicio" id="IdServicio" required="" <?php if ($this->uri->segment(2)=='EditarHorario' and $this->session->userdata("IdPerfil")>2){ echo 'disabled';} ?>>
                        <option value="" selected="selected">--Seleccione Opción--</option>
                        <?php 
                        foreach ($Servicio as $i) {
                          if($i->IdServicio==set_value('Tipo_ciclo_formacion',@$datos_reg[0]->IdServicio)){
                            echo "<option value=".$i->IdServicio.' selected="selected">'.$i->Servicio."</option>";
                          } else {
                            echo "<option value=".$i->IdServicio.">".$i->Servicio."</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>                      
                    <div class="form-group">
                      <label for="IdFuncion">Función</label>
                      <select class="form-control select2" style="width: 100%;" name="IdFuncion" id="IdFuncion" required="">
                        <option selected="selected" value="">--Seleccione Funcion--</option>
                        <?php foreach ($funcion as $item):
                          if($item->IdFuncion==set_value('IdFuncion',@$datos_reg[0]->IdFuncion)){?>
                            <option value="<?php echo $item->IdFuncion;?>" selected="selected"><?php echo $item->Funcion;?></option>
                          <?php } else { ?>
                            <option value="<?php echo $item->IdFuncion;?>"><?php echo $item->Funcion;?></option>
                          <?php } endforeach;?>
                        </select>         
                      </div>
                      <div class="form-group">
                        <label for="IdJefe">Jefe Inmediato</label>
                        <select class="form-control select2" style="width: 100%;" name="IdJefe" id="IdJefe" required="">
                          <option selected="selected" value="">--Seleccione Jefe--</option>
                          <?php foreach ($jefe as $item):
                            if($item->IdJefe==set_value('IdJefe',@$datos_reg[0]->IdJefe)){?>
                              <option value="<?php echo $item->IdJefe;?>" selected="selected"><?php echo $item->JEFE;?></option>
                            <?php } else { ?>
                              <option value="<?php echo $item->IdJefe;?>"><?php echo $item->JEFE;?></option>
                            <?php } endforeach;?>
                          </select>
                        </div>
                      </div> <!-- fin col 3 -->
                      <div class="col-xs-3">
                       <div class="form-group">
                        <label for="nota">Observaciones</label>
                        <textarea class="form-control" rows="4" placeholder="Ingrese alguna observación del horario" name="nota" id="nota"><?php echo set_value('nota',@$datos_reg[0]->nota); ?></textarea>
                      </div>
                      <?php if ($this->session->userdata("IdPerfil")<2 ) { ?>
                        <?php if ($this->uri->segment(2)<>'nuevohorario') {?>
                          <div class="form-group">
                            <label for="">Estatus:</label>
                            <div class="row">
                              <div class="col-xs-6">
                                <label>
                                  <input type="radio" name="Estatus" class="minimal"  value="1" <?php if(set_value('Estatus',@$datos_reg[0]->Estatus)=='1'){echo 'checked';}?>>
                                  Activo
                                </label>
                              </div>
                              <div class="col-xs-6">
                                <label>
                                  <input type="radio" name="Estatus" class="minimal" value="0" <?php if(set_value('Estatus',@$datos_reg[0]->Estatus)=='0'){echo 'checked';}?>>
                                  Inactivo
                                </label>
                              </div>
                            </div>
                          </div>
                        <?php } 
                      }?>
                    </div> <!-- fin col 3 -->
                  </div>
                </div>   
                <div class="box-footer">
                  <a href="<?php echo base_url();?>Plantilla/ver/<?php echo $persona[0]->IdPersonal ?>" class="btn btn-danger">Cancelar</a>
                  <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                </div>   
              </div>
              <?php echo form_close(); ?>
            </section>
          </div>

          <?php $this->load->view('layout/footer_v2'); ?>

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
    $('#fechas').daterangepicker()
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