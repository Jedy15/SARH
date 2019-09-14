<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SRH2018 | Encuesta</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
<?php endif;?>

<body class="hold-transition register-page">
	<section class="content-header">
		<h1><?php echo $persona[0]->NOMBRES.' '.$persona[0]->APELLIDOS ?></h1>
	</section>
	<section class="content">
		<?php echo form_open(); ?>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Datos de Horario</h3>
				<h5>Seleccione los Dias de la semana que labora y su horario de entrada y salida de cada uno</h5>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-1">
						<label>59. Lunes</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Lunes" name="Lunes" value="Lunes" <?php if(set_value('Lunes',@$datos_reg[0]->Lunes)=='Lunes'){echo 'checked';}?>>
						</div>
					</div>

					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HELunes">60. Hora de Entrada Lunes</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HELunes" id="HELunes" value="<?php echo set_value('HELunes',@$datos_reg[0]->HELunes);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSLunes">61. Hora de Salida Lunes</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSLunes" id="HSLunes" value="<?php echo set_value('HSLunes',@$datos_reg[0]->HSLunes);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1">
						<label>62. Martes</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Martes" name="Martes" value="Martes" <?php if(set_value('Martes',@$datos_reg[0]->Martes)=='Martes'){echo 'checked';}?>>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HEMartes">63. Hora de Entrada Martes</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HEMartes" id="HEMartes" value="<?php echo set_value('HEMartes',@$datos_reg[0]->HEMartes);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSMartes">64. Hora de Salida Martes</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSMartes" id="HSMartes" value="<?php echo set_value('HSMartes',@$datos_reg[0]->HSMartes);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-1">
						<label>65. Miercoles</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Miercoles" name="Miercoles" value="Miercoles" <?php if(set_value('Miercoles',@$datos_reg[0]->Miercoles)=='Miercoles'){echo 'checked';}?>>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HEMiercoles">66. Hora de Entrada Miercoles</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HEMiercoles" id="HEMiercoles" value="<?php echo set_value('HEMiercoles',@$datos_reg[0]->HEMiercoles);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSMiercoles">67. Hora de Salida Miercoles</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSMiercoles" id="HSMiercoles" value="<?php echo set_value('HSMiercoles',@$datos_reg[0]->HSMiercoles);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-1">
						<label>68. Jueves</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Jueves" name="Jueves" value="Jueves" <?php if(set_value('Jueves',@$datos_reg[0]->Jueves)=='Jueves'){echo 'checked';}?>>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HEJueves">69. Hora de Entrada Jueves</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HEJueves" id="HEJueves" value="<?php echo set_value('HE',@$datos_reg[0]->HEJueves);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSJueves">70. Hora de Salida Jueves</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSJueves" id="HSJueves" value="<?php echo set_value('HSJueves',@$datos_reg[0]->HSJueves);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-1">
						<label>71. Viernes</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Viernes" name="Viernes" value="Viernes" <?php if(set_value('Viernes',@$datos_reg[0]->Viernes)=='Viernes'){echo 'checked';}?>>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HEViernes">72. Hora de Entrada Viernes</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HEViernes" id="HEViernes" value="<?php echo set_value('HEViernes',@$datos_reg[0]->HEViernes);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSViernes">73. Hora de Salida Viernes</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSViernes" id="HSViernes" value="<?php echo set_value('HSViernes',@$datos_reg[0]->HSViernes);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-1">
						<label>74. Sabado</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Sabado" name="Sabado" value="Sabado" <?php if(set_value('Sabado',@$datos_reg[0]->Sabado)=='Sabado'){echo 'checked';}?>>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HESabado">75. Hora de Entrada Sabado</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HESabado" id="HESabado" value="<?php echo set_value('HESabado',@$datos_reg[0]->HESabado);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSSabado">76. Hora de Salida Sabado</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSSabado" id="HSSabado" value="<?php echo set_value('HSSabado',@$datos_reg[0]->HSSabado);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-1">
						<label>77. Domingo</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Domingo" name="Domingo" value="Domingo" <?php if(set_value('Domingo',@$datos_reg[0]->Domingo)=='Domingo'){echo 'checked';}?>>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HEDomingo">78. Hora de Entrada Domingo</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HEDomingo" id="HEDomingo" value="<?php echo set_value('HEDomingo',@$datos_reg[0]->HEDomingo);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>			
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSDomingo">79. Hora de Salida Domingo</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSDomingo" id="HSDomingo" value="<?php echo set_value('HSDomingo',@$datos_reg[0]->HSDomingo);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-1">
						<label>80. Dias Festivos</label>	
						<div class="form-group">
							<input type="checkbox" class="flat-red" id="Festivo" name="Festivo" value="Festivo" <?php if(set_value('Festivo',@$datos_reg[0]->Festivo)=='Festivo'){echo 'checked';}?>>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HEFestivo">81. Hora de Entrada Festivos</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HEFestivo" id="HEFestivo" value="<?php echo set_value('HEFestivo',@$datos_reg[0]->HEFestivo);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="bootstrap-timepicker">
							<div class="form-group">
								<label for="HSFestivo">82. Hora de Salida Festivos</label>
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="HSFestivo" id="HSFestivo" value="<?php echo set_value('HSFestivo',@$datos_reg[0]->HSFestivo);?>">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right">Continuar</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</section>


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