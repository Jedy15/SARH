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
		<?php 
		echo form_open(); 
		?>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Formación Academica</h3>
				<p class="lead">Ingrese la Información de los <b>Estudios Terminados. Max 5 registros</b> del mas reciente al mas antiguo</p>				
			</div>
			<div class="box-body">
				<!-- <b>grado 1</b> -->
				<div class="row"> 
					<div class="col-xs-3">
						<div class="form-group">
							<label>91. Grado académico</label>
							<select class="form-control select2" style="width: 100%;" id="Grado_1" name="Grado_1" required="">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($grado as $i) {
									echo "<option value=".$i->ID.">".$i->GRADO_ACADEMICO."</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<button type="button" id="addgrado2" class="btn btn-success btn-sm" disabled>Agregar 2do. Estudio</button>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label>92. Nombre del titulo o diploma</label>
							<select class="form-control select2" style="width: 100%;" id="Titulo_1" name="Titulo_1" required="">
								<option selected="selected" value="">--Seleccione Primero un Grado Académico--</option>
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>94. Institución Educativa</label>
							<select class="form-control select2" style="width: 100%;" id="Institucion_1" name="Institucion_1" required="">
								<option selected="selected" value="">--Seleccione Primero un Grado Académico--</option>
							</select>
						</div>
						<div class="form-group" id="o_1" style="display: none;">
							<label for="otro_instituto_1">95. Otra Institución</label>
							<input type="text" class="form-control" name="otro_instituto_1" id="otro_instituto_1" placeholder="Nombre de la Institución" maxlength="80" size="80" value="<?php echo set_value('otro_instituto_1',@$datos_reg[0]->otro_instituto_1); ?>">
						</div>
					</div>
					<div class="col-xs-2">
						<div class="form-group">
							<label for="">96. ¿Cuenta con Cedula?</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" id="c1_si" name="tiene_cedula_1" required="" value="1" <?php if(set_value('tiene_cedula_1',@$datos_reg[0]->tiene_cedula_1)=='1'){echo 'checked';}?>>
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" id="c1_no" name="tiene_cedula_1" value="0" <?php if(set_value('tiene_cedula_1',@$datos_reg[0]->tiene_cedula_1)=='0'){echo 'checked';}?>>No
									</label>
								</div>
							</div>
						</div>

						<div class="form-group" id="c_oculto1" <?php if ($datos_reg[0]->tiene_cedula_1==0) {?> style="display: none;" <?php } ?>>
							<label for="cedula_1">97. N° Cedula</label>
							<input type="text" class="form-control" name="cedula_1" id="cedula_1" placeholder="Cedula" maxlength="8" size="8" value="<?php echo set_value('cedula_1',@$datos_reg[0]->cedula_1); ?>">
						</div>
					</div>
				</div><!-- fin de la fila 1 -->
				<!-- <b>grado 2</b> -->
				<div class="row" id="oculto2" style="display: none;"> 
					<div class="col-xs-3">
						<div class="form-group">
							<label>98. Grado académico 2</label>
							<select class="form-control select2" style="width: 100%;" id="Grado_2" name="Grado_2" >
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($grado as $i) {
									echo "<option value=".$i->ID.">".$i->GRADO_ACADEMICO."</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<button type="button" id="addgrado3" class="btn btn-success btn-sm" disabled>Agregar 3re Estudio</button>
						</div>						
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label>99. Nombre del titulo o diploma 2</label>
							<select class="form-control select2" style="width: 100%;" id="Titulo_2" name="Titulo_2" >
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>101. Institución Educativa 2</label>
							<select class="form-control select2" style="width: 100%;" id="Institucion_2" name="Institucion_2" >
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
						<div class="form-group" id="o_2" style="display: none;">
							<label for="otro_instituto_2">102. Otra Institución</label>
							<input type="text" class="form-control" name="otro_instituto_2" id="otro_instituto_2" placeholder="Nombre de la Institución" maxlength="80" size="80">
						</div>
					</div>
					<div class="col-xs-2">
						<div class="form-group">
							<label for="">103. ¿Cuenta con Cedula 2?</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" name="tiene_cedula_2" id="c2_si"  value="1">
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" name="tiene_cedula_2" id="c2_no" value="0">
										No
									</label>
								</div>
							</div>
						</div>
						<div class="form-group" id="c_oculto2" style="display: none;">
							<label for="cedula_2">104. N° Cedula 2</label>
							<input type="text" class="form-control" name="cedula_2" id="cedula_2" placeholder="Cedula" maxlength="8" size="8">
						</div>
						<div class="form-group">
							<button type="button" id="deletegrado2" class="btn btn-danger btn-sm pull-right" >Quitar Estudio 2</button>
						</div>
					</div>
				</div>
				<!-- <b>grado 3</b> -->
				<div class="row" id="oculto3" style="display: none;">
					<div class="col-xs-3">
						<div class="form-group">
							<label>105. Grado académico 3</label>
							<select class="form-control select2" style="width: 100%;" id="Grado_3" name="Grado_3">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($grado as $i) {
									if($i->ID==set_value('Grado_3',@$datos_reg[0]->Grado_3)){
										echo "<option value=".$i->ID.' selected="selected">'.$i->GRADO_ACADEMICO."</option>";
									} else {
										echo "<option value=".$i->ID.">".$i->GRADO_ACADEMICO."</option>";
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<button type="button" id="addgrado4" class="btn btn-success btn-sm" disabled>Agregar 4to Estudio</button>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label>106. Nombre del titulo o diploma 3</label>
							<select class="form-control select2" style="width: 100%;" id="Titulo_3" name="Titulo_3">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>108. Institución Educativa 3</label>
							<select class="form-control select2" style="width: 100%;" id="Institucion_3" name="Institucion_3">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
						<div class="form-group" id="o_3" style="display: none;">
							<label for="otro_instituto_3">109. Otra Institución 3</label>
							<input type="text" class="form-control" name="otro_instituto_3" id="otro_instituto_3" placeholder="Nombre de la Institución" maxlength="80" size="80">
						</div>
					</div>
					<div class="col-xs-2">
						<div class="form-group">
							<label for="">110. ¿Cuenta con Cedula? 3</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" id="c3_si"  name="tiene_cedula_3" value="1">
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" id="c3_no"  name="tiene_cedula_3"  value="0">
										No
									</label>
								</div>
							</div>
						</div>
						<div class="form-group" id="c_oculto3" style="display: none;">
							<label for="cedula_3">111. N° Cedula 3</label>
							<input type="text" class="form-control" name="cedula_3" id="cedula_3" placeholder="Cedula" maxlength="8" size="8">
						</div>
						<div class="form-group">
							<button type="button" id="deletegrado3" class="btn btn-danger btn-sm pull-right" >Quitar Estudio 3</button>
						</div>
					</div>
				</div>
				<!-- <b>grado 4</b> -->
				<div class="row" id="oculto4" style="display: none;"> 
					<div class="col-xs-3">
						<div class="form-group">
							<label>112. Grado académico 4</label>
							<select class="form-control select2" style="width: 100%;" id="Grado_4" name="Grado_4">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($grado as $i) {
									echo "<option value=".$i->ID.">".$i->GRADO_ACADEMICO."</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<button type="button" id="addgrado5" class="btn btn-success btn-sm" disabled>Agregar 5to Estudio</button>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label>113. Nombre del titulo o diploma 4</label>
							<select class="form-control select2" style="width: 100%;" id="Titulo_4" name="Titulo_4">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>115. Institución Educativa 4</label>
							<select class="form-control select2" style="width: 100%;" id="Institucion_4" name="Institucion_4">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
						<div class="form-group" id="o_4" style="display: none;">
							<label for="otro_instituto_4">116. Otra Institución 4</label>
							<input type="text" class="form-control" name="otro_instituto_4" id="otro_instituto_4" placeholder="Nombre de la Institución" maxlength="80" size="80">
						</div>
					</div>
					<div class="col-xs-2">
						<div class="form-group">
							<label for="">117. ¿Cuenta con Cedula? 4</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" id="c4_si" name="tiene_cedula_4" value="1">
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" id="c4_no" name="tiene_cedula_4" Value="0">
										No
									</label>
								</div>
							</div>
						</div>
						<div class="form-group" id="c_oculto4" style="display: none;">
							<label for="cedula_4">118. N° Cedula 4</label>
							<input type="text" class="form-control" name="cedula_4" id="cedula_4" placeholder="Cedula" maxlength="8" size="8">
						</div>
						<div class="form-group">
							<button type="button" id="deletegrado4" class="btn btn-danger btn-sm pull-right">Quitar Estudio 4</button>
						</div>
					</div>
				</div>
				<!-- <b>grado 5</b> -->
				<div class="row" id="oculto5" style="display: none;"> 
					<div class="col-xs-3">
						<div class="form-group">
							<label>119. Grado académico 5</label>
							<select class="form-control select2" style="width: 100%;" id="Grado_5" name="Grado_5">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($grado as $i) {
									echo "<option value=".$i->ID.">".$i->GRADO_ACADEMICO."</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label>120. Nombre del titulo o diploma 5</label>
							<select class="form-control select2" style="width: 100%;" id="Titulo_5" name="Titulo_5">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>122. Institución Educativa 5</label>
							<select class="form-control select2" style="width: 100%;" id="Institucion_5" name="Institucion_5">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
						<div class="form-group" id="o_5" style="display: none;">
							<label for="otro_instituto_5">123. Otra Institución</label>
							<input type="text" class="form-control" name="otro_instituto_5" id="otro_instituto_5" placeholder="Nombre de la Institución" maxlength="80" size="80">
						</div>
					</div>
					<div class="col-xs-2">
						<div class="form-group">
							<label>124. ¿Cuenta con Cedula? 5</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" name="tiene_cedula_5" id="c5_si" value="1">
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" name="tiene_cedula_5" id="c5_no" value="0">
										No
									</label>
								</div>
							</div>
						</div>
						<div class="form-group" id="c_oculto5" style="display: none;">
							<label for="cedula_5">125. N° Cedula 5</label>
							<input type="text" class="form-control" name="cedula_5" id="cedula_5" placeholder="Cedula" maxlength="8" size="8">
						</div>
						<div class="form-group">
							<button type="button" id="deletegrado5" class="btn btn-danger btn-sm pull-right">Quitar Estudio 5</button>
						</div>
					</div>
				</div>


			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right">Continuar</button>
			</div>
		</div>
		<?php 
		echo form_close(); 
		?>
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
	function mostrar($id){
		element = document.getElementById($id);
		element.style.display='block';
	}
	function ocultar($id){
		element = document.getElementById($id);
		element.style.display='none';
	}

	function otroInstituto(instituto, bloque, otro){
		Id = $(instituto).val();
		if (Id==2009481) {
			mostrar(bloque);
			$(otro).attr('required', 'required');
		} else {
			ocultar(bloque);
			$(otro).removeAttr('required', 'required');
			$(otro).val(null);
		}
	}

	function req(num){
		$("#addgrado"+num).hide();
		$('#Grado_'+num).attr('required', 'required');
		$('#c'+num+'_si').attr('required', 'required');
	}

	function noreq(num){
		// $("#addgrado5").show();
		$("#addgrado"+num).show();
		$("#Grado_"+num).removeAttr('required', 'required');
		$("#Grado_"+num).val(null);
		$('#c'+num+'_si').removeAttr('required', 'required');
		$('#c'+num+'_si').val(null);
	}

	$(document).ready(function() {
		$("#Grado_1").change(function() {
			$("#Grado_1 option:selected").each(function() {
				Grado_1 = $('#Grado_1').val();
				$.post("<?php echo base_url(); ?>index.php/Encuesta/grado", {Grado_1 : Grado_1}, function(data) {
					$("#Titulo_1").html(data);
				});
				$.post("<?php echo base_url(); ?>index.php/Encuesta/escuela", {Grado_1 : Grado_1}, function(data) {
					$("#Institucion_1").html(data);
				});
			});
			$("#addgrado2").removeAttr("disabled");
		});

		$("#c1_si").change(function() {
			mostrar('c_oculto1');
		});

		$("#c1_no").change(function() {
			ocultar('c_oculto1');
			$("#cedula_1").val(null);
		});

		$("#Institucion_1").change(function() {
			otroInstituto('#Institucion_1', 'o_1', '#otro_instituto_1');
		});

		$( "#addgrado2" ).click(function() {
			mostrar('oculto2');
			req(2);
			// $('#Grado_2').attr('required', 'required');
		});

		$( "#deletegrado2" ).click(function() {
			ocultar('oculto2');
			noreq(2);
		});
	});	
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#Grado_2").change(function() {
			$("#Grado_2 option:selected").each(function() {
				Grado_2 = $('#Grado_2').val();
				$.post("<?php echo base_url(); ?>index.php/Encuesta/grado", {Grado_2 : Grado_2}, function(data) {
					$("#Titulo_2").html(data);
				});
				$.post("<?php echo base_url(); ?>index.php/Encuesta/escuela", {Grado_2 : Grado_2}, function(data) {
					$("#Institucion_2").html(data);
				});
			});
			$("#addgrado3").removeAttr("disabled");
		});

		$("#Institucion_2").change(function() {
			otroInstituto('#Institucion_2', 'o_2', '#otro_instituto_2');
		});

		$("#c2_si").change(function() {
			mostrar('c_oculto2');
		});
		$("#c2_no").change(function() {
			ocultar('c_oculto2');
			$("#cedula_2").val(null);
		});

		$( "#addgrado3" ).click(function() {
			mostrar('oculto3');
			req(3);
			// $("#addgrado3").hide();
			$("#deletegrado2").hide();
			// $('#Grado_3').attr('required', 'required');			
		});

		$( "#deletegrado3" ).click(function() {
			ocultar('oculto3');
			noreq(3);
			$("#deletegrado2").show();
			// $("#addgrado3").show();
			// $('#Grado_3').removeAttr('required', 'required');
			// $("#Grado_3").val(null);			
		});

	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#Grado_3").change(function() {
			$("#Grado_3 option:selected").each(function() {
				Grado_3 = $('#Grado_3').val();
				$.post("<?php echo base_url(); ?>index.php/Encuesta/grado", {Grado_3 : Grado_3}, function(data) {
					$("#Titulo_3").html(data);
				});
				$.post("<?php echo base_url(); ?>index.php/Encuesta/escuela", {Grado_3 : Grado_3}, function(data) {
					$("#Institucion_3").html(data);
				});
			});
			$("#addgrado4").removeAttr("disabled");
		});

		$( "#addgrado4" ).click(function() {
			mostrar('oculto4');
			req(4);
			// $("#addgrado4").hide();
			$("#deletegrado3").hide();
			// $('#Grado_4').attr('required', 'required');			
		});

		$( "#deletegrado4" ).click(function() {
			ocultar('oculto4');
			noreq(4);
			$("#deletegrado3").show();
			// $("#addgrado4").show();
			// $('#Grado_4').removeAttr('required', 'required');
			// $("#Grado_4").val(null);			
		});

		$("#Institucion_3").change(function() {
			otroInstituto('#Institucion_3', 'o_3', '#otro_instituto_3');
		});

		$("#Institucion_4").change(function() {
			otroInstituto('#Institucion_4', 'o_4', '#otro_instituto_4');
		});

		$("#Institucion_5").change(function() {
			otroInstituto('#Institucion_5', 'o_5', '#otro_instituto_5');
		});

		$("#c3_si").change(function() {
			mostrar('c_oculto3');
		});

		$("#c3_no").change(function() {
			ocultar('c_oculto3');
			$("#cedula_3").val(null);
		});

	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#Grado_4").change(function() {
			$("#Grado_4 option:selected").each(function() {
				Grado_4 = $('#Grado_4').val();
				$.post("<?php echo base_url(); ?>index.php/Encuesta/grado", {Grado_4 : Grado_4}, function(data) {
					$("#Titulo_4").html(data);
				});
				$.post("<?php echo base_url(); ?>index.php/Encuesta/escuela", {Grado_4 : Grado_4}, function(data) {
					$("#Institucion_4").html(data);
				});
			});
			$("#addgrado5").removeAttr("disabled");
		});

		$( "#addgrado5" ).click(function() {
			mostrar('oculto5');
			req(5);
			// $("#addgrado5").hide();
			$("#deletegrado4").hide();
			// $('#Grado_5').attr('required', 'required');
		});

		$( "#deletegrado5" ).click(function() {
			ocultar('oculto5');
			noreq(5);
			// $("#addgrado5").show();
			$("#deletegrado4").show();
			// $('#Grado_5').removeAttr('required', 'required');
			// $("#Grado_5").val(null);			
		});

		$("#c4_si").change(function() {
			mostrar('c_oculto4');
		});

		$("#c4_no").change(function() {
			ocultar('c_oculto4');
			$("#cedula_4").val(null);
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#Grado_5").change(function() {
			$("#Grado_5 option:selected").each(function() {
				Grado_5 = $('#Grado_5').val();
				$.post("<?php echo base_url(); ?>index.php/Encuesta/grado", {Grado_5 : Grado_5}, function(data) {
					$("#Titulo_5").html(data);
				});
				$.post("<?php echo base_url(); ?>index.php/Encuesta/escuela", {Grado_5 : Grado_5}, function(data) {
					$("#Institucion_5").html(data);
				});
			});
		});
		$("#c5_si").change(function() {
			mostrar('c_oculto5');
		});

		$("#c5_no").change(function() {
			ocultar('c_oculto5');
			$("#cedula_5").val(null);
		});
	});
</script>
</body>
</html>