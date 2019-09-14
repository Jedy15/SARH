<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SRH2018 | Perfil Usuario</title>
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
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

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
<?php if ($fail){ ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Error!</h4>
    <?php print_r($fail); ?>
  </div>
<?php }  ?>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <div class="wrapper">
    <?php 
    $this->load->view('layout/header');
    $this->load->view('layout/aside');
    ?>
    
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Foto de Perfil
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-6">
            <div class="box box-success">
              <?php echo form_open_multipart('usuarios/uploadFoto/'.$usuario[0]->IdUsuario); ?>
              <div class="box-header with-border">
                <h3 class="box-title">Perfil de <?php echo $usuario[0]->Nombre.' '.$usuario[0]->Apellido; ?></h3>
              </div>
              <div class="box-body">
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $ruta ?>" alt="User profile picture">
                <div class="form-group">
                  <!-- <label for="exampleInputFile">Imagen de Perfil</label> -->
                  <p class="help-block">Seleccione una imagen para su perfil.</p>
                  <input type="file" id="exampleInputFile" name="foto" accept="image/*" required="" capture="camera">
                  <!-- <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Guardar Imagen</button> -->
                  <!-- <button type="submit" class="btn  pull-right">Continuar</button> -->
                </div>
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>plantilla" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary pull-right" id="btnSave">Guardar</button>
              </div>
              <?php echo form_close(); ?>
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
      $('#Pass3').hide();
      $('#eti3').hide();
      <?php if ($this->uri->segment(2)=='perfil') { ?>
        $('#btnSave').attr('disabled', true);
      <?php } ?> 

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

<script>
  function pass(){
          // alert('mostrar contraseña');
          $("#Pass3").show();
          $("#Pass3").attr('required', 'required');
          $("#eti3").show();
          $('#btnSave').attr('disabled', false);
        }

        function newpass(){
         $("#Pass3").show();
         $("#Pass3").attr('required', 'required');
         $("#eti3").show();
         $("#Pass").attr('required', 'required');
         $("#Pass2").attr('required', 'required');
         $('#btnSave').attr('disabled', false);
       }
     </script>
   </body>
   </html>