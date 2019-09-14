<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SARH | <?php echo $title;?> Registro</title>
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

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <div class="wrapper">
    <?php
    $this->load->view('layout/main_header');
    $this->load->view('layout/aside');
    ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php echo form_open(); ?>

      <section class="content-header"> <!-- inicio de seccion/encabezado --> 
        <div class="pull-right">
          <a href="<?php echo base_url(); ?>Plantilla<?php if ($this->uri->segment(3)) { ?>/Ver/<?php echo  $datos_reg[0]->IdPersonal; }?>" class="btn btn-danger">Cancelar</a>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <h1><?php echo $title; ?> Registro</h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Datos Personales</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="SUFIJO">Abreviatura de Titulo</label>
                  <input type="text" class="form-control" id="SUFIJO" name="SUFIJO" placeholder="Dr, Mtro, Lic, Ing" value="<?php echo set_value('SUFIJO',@$datos_reg[0]->SUFIJO) ?>">
                </div>

                <div class="form-group">
                  <label for="NOMBRES">Nombre(s)</label>
                  <input type="text" class="form-control" oninvalid="NoValido(this.id)" required id="NOMBRES" name="NOMBRES" placeholder="Nombre(s)" value="<?php echo set_value('SUFIJO',@$datos_reg[0]->NOMBRES) ?>">
                </div>

                <div class="form-group">
                  <label for="APELLIDOS">Apellidos</label>
                  <input type="text" class="form-control" oninvalid="NoValido(this.id)" required id="APELLIDOS" name="APELLIDOS" placeholder="Apellidos" value="<?php echo set_value('SUFIJO',@$datos_reg[0]->APELLIDOS) ?>">
                </div>

                <div class="form-group">
                  <label for="RFC">RFC</label>

                  <input type="text" class="form-control" maxlength="13" oninvalid="NoValido(this.id)" required id="RFC" name="RFC" value="<?php echo set_value('SUFIJO',@$datos_reg[0]->RFC) ?>" data-inputmask="" data-mask="" placeholder="RFC">
                  <span class="help-block">Help block with error</span>
                </div>

                <div class="form-group">
                  <label for="CURP">CURP</label>

                  <input type="text" class="form-control" maxlength="18" id="CURP" name="CURP" placeholder="CURP" value="<?php echo set_value('SUFIJO',@$datos_reg[0]->CURP) ?>">
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group">
                      <label for="FECHANAC">Fecha de Nacimiento</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control" required id="FECHANAC" name="FECHANAC" value="<?php echo set_value('SUFIJO',@$datos_reg[0]->FECHANAC) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Sexo</label>
                        <div class="row">
                          <div class="col-xs-6">
                            <label>
                              <input type="radio" name="SEXO" required class="minimal"  value="H" <?php if(set_value('SEXO',@$datos_reg[0]->SEXO)=='H'){echo 'checked';}?>>
                              <small>Masculino</small>
                            </label>
                          </div>
                          <div class="col-xs-6">
                            <label>
                              <input type="radio" name="SEXO" class="minimal" value="M" <?php if(set_value('SEXO',@$datos_reg[0]->SEXO)=='M'){echo 'checked';} ?>>
                              <small>Femenino</small>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Domicilio</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="Calle">Calle</label>
                  <input type="text" class="form-control" id="Calle" name="Calle" placeholder="EJEMPLO: AV INSURGENTES #24" value="<?php echo set_value('Calle',@$datos_reg[0]->Calle); ?>">
                </div>
                <div class="form-group">
                  <label for="Colonia">Colonia</label>
                  <input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="EJEMPLO: BARRIO SANTA LUCIA" value="<?php echo set_value('Colonia',@$datos_reg[0]->Colonia); ?>">
                </div>
                <div class="form-group">
                  <label for="CP">Codigo Postal</label>
                  <input type="text" class="form-control" id="CP" name="CP" placeholder="Codigo Postal" value="<?php echo set_value('Colonia',@$datos_reg[0]->CP); ?>">
                </div>
                <div class="form-group">
                  <label>Ciudad</label>
                  <select class="form-control select2" oninvalid="NoValido(this.id)" required id="IdMunicipio" name="IdMunicipio" style="width: 100%;">
                    <option></option>
                  </select>
                </div>
              </div>  
            </div>
          </div>

          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Contacto</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="Telefono">Telefono:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="Telefono" id="Telefono" value="<?php echo set_value('Telefono',@$datos_reg[0]->Telefono); ?>" placeholder="(967)-000-0000">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Correo">Email</label>
                  <div class="input-group">                    
                    <div class="input-group-addon"> 
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input type="email" class="form-control" placeholder="Email" oninvalid="NoValido(this.id)" name="Correo" id="Correo" value="<?php echo set_value('Correo',@$datos_reg[0]->Correo); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label>Observaciones Generales</label>
                  <textarea class="form-control" rows="3" id="OBSERVACIONES" name="OBSERVACIONES" placeholder="Observaciones Generales"><?php echo set_value('OBSERVACIONES',@$datos_reg[0]->OBSERVACIONES); ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('layout/footer_v2'); ?>

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
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $.post('<?php echo base_url(); ?>Plantilla/Municipios', {}, 
      function(data, textStatus, xhr) {
        var datos = $.parseJSON(data);

        <?php if (isset($datos_reg[0])) { ?>
          var ID = <?php echo "'".$datos_reg[0]->IdMunicipio."'"; 
          ?>;
          for(var i in datos) {
            if (ID == datos[i].id) {
              datos[i].selected = 'Selected';
            }
          }
          <?php } ?>; 


          $('#IdMunicipio').select2({
            placeholder: "Seleccione una Opción",
            data: datos
          });
        });

    // $('#RFC').InputMask('AAAA999999AAA',{'placeholder': 'ABCD3112990X0'})

    //Datemask dd/mm/yyyy
    $('#RFC').inputmask({ 
      mask:'AAAA999999***',
      onincomplete: function(){ 
        NoValido($(this).attr("id"));
        $(this).focus();
      },
      // 'placeholder': 'LLLL9999990X0',
      definitions: {
        '*': {
          validator: "[0-9A-Z]"
        }
      }
    });
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
  function NoValido(identificador){

    var id = identificador;

    var abuelo = $("#"+id).parents('div.form-group');
    $(abuelo).addClass('has-error');
  }    
  
</script>
</body>
</html>