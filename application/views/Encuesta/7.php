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
				<h3 class="box-title">Capacitación</h3>
			</div>
			<div class="box-body">
				<!-- <b>grado 1</b> -->
				<div class="row"> 
					<div class="col-xs-4">
						<div class="form-group">
							<label for="">140. ¿Tiene capacitación anual o se encuentra estudiando actualmente?</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input class="" type="radio" id="Capacitacion" name="Capacitacion" required="" value="1" <?php if(set_value('Capacitacion',@$datos_reg[0]->Capacitacion)=='1'){echo 'checked';}?>>
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input class="" type="radio" id="Capacitacion2" name="Capacitacion" value="0" <?php if(set_value('Capacitacion',@$datos_reg[0]->Capacitacion)=='0'){echo 'checked';}?>>
										No
									</label>
								</div>
							</div>
						</div>
					</div>					
				</div><!-- fin de la fila 1 -->
				<div class="row" id="oculto" style="display: none;">
					<div class="col-xs-3">
						<div class="form-group">
							<label>141. Entidad Federativa</label>
							<select class="form-control select2" style="width: 100%;" id="Entidad_Federativa_1" name="Entidad_Federativa_1">
							</select>
						</div>
						<div class="form-group">
							<label>142. Nombre del Curso</label>
							<select class="form-control select2" style="width: 100%;" id="Nombre_del_Curso_1" name="Nombre_del_Curso_1">
							</select>
						</div>
						<div class="form-group">
							<a id="nuevo1" href="#" class="btn-xs btn-success pull-right" >agregar otro curso</a>
						</div>
					</div>
					<div class="col-xs-3" id="curso2" style="display: none;">
						<div class="form-group">
							<label>143. Entidad Federativa 2</label>
							<select class="form-control select2" style="width: 100%;" id="Entidad_Federativa_2" name="Entidad_Federativa_2">
							</select>
						</div>
						<div class="form-group">
							<label>144. Nombre del Curso 2</label>
							<select class="form-control select2" style="width: 100%;" id="Nombre_del_Curso_2" name="Nombre_del_Curso_2">
							</select>
						</div>
						<div class="form-group">
							<a id="nuevo2" href="#" class="btn-xs btn-success pull-right" >agregar otro curso</a>
						</div>
					</div>
					<div class="col-xs-3" id="curso3" style="display: none;">
						<div class="form-group">
							<label>145. Entidad Federativa 3</label>
							<select class="form-control select2" style="width: 100%;" id="Entidad_Federativa_3" name="Entidad_Federativa_3">
							</select>
						</div>
						<div class="form-group">
							<label>146. Nombre del Curso 3</label>
							<select class="form-control select2" style="width: 100%;" id="Nombre_del_Curso_3" name="Nombre_del_Curso_3">
							</select>
						</div>
						<div class="form-group">
							<a id="nuevo3" href="#" class="btn-xs btn-success pull-right" >agregar otro curso</a>
						</div>
					</div>
					<div class="col-xs-3" id="curso4" style="display: none;">
						<div class="form-group">
							<label>147. Entidad Federativa 4</label>
							<select class="form-control select2" style="width: 100%;" id="Entidad_Federativa_4" name="Entidad_Federativa_4">
							</select>
						</div>
						<div class="form-group">
							<label>148. Nombre del Curso 4</label>
							<select class="form-control select2" style="width: 100%;" id="Nombre_del_Curso_4" name="Nombre_del_Curso_4">
							</select>
						</div>
					</div>
				</div><!-- fin de la fila 2 -->
				<div class="row" id="oculto2" style="display: none;">
					<div class="col-xs-12">
						<h4>Ingrese formación en curso o diplomado</h4>
					</div>

					<div class="col-xs-3">
						<div class="form-group">
							<label>149. Grado académico</label>
							<select class="form-control select2" style="width: 100%;" id="Grado_Aca" name="Grado_Aca">
							</select>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label>150. Nombre del titulo o diploma</label>
							<select class="form-control select2" style="width: 100%;" id="Diplomado" name="Diplomado">
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>152. Institución Educativa</label>
							<select class="form-control select2" style="width: 100%;" id="Institucion_Edu" name="Institucion_Edu">
							</select>
						</div>
					</div>
					<div class="col-xs-2">
						<div class="form-group">
							<label>154. Ciclo que cursa</label>
							<select class="form-control select2" style="width: 100%;" id="Ciclo_cursa" name="Ciclo_cursa">
							</select>
						</div>
					</div>					
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right">Finalizar</button>
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

<script type="text/javascript">
	$(document).ready(function() {
		$("#Capacitacion").change(function() {
			element = document.getElementById("oculto");
			element.style.display='block';
			element = document.getElementById("oculto2");
			element.style.display='block';
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Entidad", { }, function(data) {
				$("#Entidad_Federativa_1").html(data);
			});
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Curso", { }, function(data) {
				$("#Nombre_del_Curso_1").html(data);
			});
			$.post("<?php echo base_url(); ?>index.php/Encuesta/cargagrado", { }, function(data) {
				$("#Grado_Aca").html(data);
			});
			$.post("<?php echo base_url(); ?>index.php/Encuesta/cargaciclo", { }, function(data) {
				$("#Ciclo_cursa").html(data);
			});
		});
		$("#Capacitacion2").change(function() {
			element = document.getElementById("oculto");
			element.style.display='none';
			element = document.getElementById("oculto2");
			element.style.display='none';
		});

		$( "#nuevo1" ).click(function() {
			element = document.getElementById("curso2");
			element.style.display='block';
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Entidad", { }, function(data) {
				$("#Entidad_Federativa_2").html(data);
			});
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Curso", { }, function(data) {
				$("#Nombre_del_Curso_2").html(data);
			});
		});

		$( "#nuevo2" ).click(function() {
			element = document.getElementById("curso3");
			element.style.display='block';
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Entidad", { }, function(data) {
				$("#Entidad_Federativa_3").html(data);
			});
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Curso", { }, function(data) {
				$("#Nombre_del_Curso_3").html(data);
			});
		});

		$( "#nuevo3" ).click(function() {
			element = document.getElementById("curso4");
			element.style.display='block';
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Entidad", { }, function(data) {
				$("#Entidad_Federativa_4").html(data);
			});
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Curso", { }, function(data) {
				$("#Nombre_del_Curso_4").html(data);
			});
		});

		$("#Grado_Aca").change(function() {
			$("#Grado_Aca option:selected").each(function() {
				Grado_1 = $('#Grado_Aca').val();
				$.post("<?php echo base_url(); ?>index.php/Encuesta/grado", {Grado_1 : Grado_1}, function(data) {
					$("#Diplomado").html(data);
				});
				$.post("<?php echo base_url(); ?>index.php/Encuesta/escuela", {Grado_1 : Grado_1}, function(data) {
					$("#Institucion_Edu").html(data);
				});
			});
		});


	});
</script>
</body>
</html>