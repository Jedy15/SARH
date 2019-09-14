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

  <script type="text/javascript">
  	function showContent() {
  		element = document.getElementById("oculto");
  		check = document.getElementById("Recursos_Humanos_formacion");

  		element.style.display='block';
  		$('#Tipo_ciclo_formacion').attr('required', 'required');
  		$('#Carrera_ciclo').attr('required', 'required');
  		$('#Institucion_Educativa_Formadora').attr('required', 'required');
  		$('#Año_cursa').attr('required', 'required');
  	}
  	function ocultar() {
  		element = document.getElementById("oculto");
  		check = document.getElementById("Recursos_Humanos_formacion");
  		element.style.display='none';
  		$('#Tipo_ciclo_formacion').removeAttr('required');
  		$('#Carrera_ciclo').removeAttr('required');
  		$('#Institucion_Educativa_Formadora').removeAttr('required');
  		$('#Año_cursa').removeAttr('required');
  	}
  </script>

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
				<h3 class="box-title">Complemento de Estudios</h3>
			</div>
			<div class="box-body">
				<!-- <b>grado 1</b> -->
				<div class="row"> 
					<div class="col-xs-2">
						<div class="form-group">
							<label for="">90. Recurso Humano en Formación(Becario)</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input class="" type="radio" onchange="javascript:showContent()" id="Recursos_Humanos_formacion"  name="Recursos_Humanos_formacion" required="" value="1" <?php if(set_value('Recursos_Humanos_formacion',@$datos_reg[0]->Recursos_Humanos_formacion)=='1'){echo 'checked';}?>>
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input class="" type="radio" onchange="javascript:ocultar()" id="Recursos_Humanos_formacion" name="Recursos_Humanos_formacion" value="0" <?php if(set_value('Recursos_Humanos_formacion',@$datos_reg[0]->Recursos_Humanos_formacion)=='0'){echo 'checked';}?>>
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
							<label>126. Tipo de Ciclo en Formación</label>
							<select class="form-control select2" style="width: 100%;" id="Tipo_ciclo_formacion" name="Tipo_ciclo_formacion">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($ciclo as $i) {
									if($i->ID==set_value('Tipo_ciclo_formacion',@$datos_reg[0]->Tipo_ciclo_formacion)){
										echo "<option value=".$i->ID.' selected="selected">'.$i->NOMBRE."</option>";
									} else {
										echo "<option value=".$i->ID.">".$i->NOMBRE."</option>";
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label>127. Carrera del ciclo</label>
							<select class="form-control select2" style="width: 100%;" id="Carrera_ciclo" name="Carrera_ciclo">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>128. Institución Educativa</label>
							<select class="form-control select2" style="width: 100%;" id="Institucion_Educativa_Formadora" name="Institucion_Educativa_Formadora">
								<option selected="selected" value="">--Seleccione Opción--</option>
							</select>
						</div>
					</div>
					<div class="col-xs-2">
						<div class="form-group">
							<label>129. Año que cursa</label>
							<select class="form-control select2" style="width: 100%;" id="Año_cursa" name="Año_cursa">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<option value="2050321" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2050321){ echo 'selected="selected"';} ?>>CICLO UNICO</option>
								<option value="2008482" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008482){ echo 'selected="selected"';} ?>>R1</option>								
								<option value="2008483" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008483){ echo 'selected="selected"';} ?>>R2</option>
								<option value="2008484" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008484){ echo 'selected="selected"';} ?>>R3</option>
								<option value="2008485" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008485){ echo 'selected="selected"';} ?>>R4</option>
								<option value="2008486" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008486){ echo 'selected="selected"';} ?>>R5</option>
								<option value="2008487" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008487){ echo 'selected="selected"';} ?>>R6</option>
								<option value="2008488" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008488){ echo 'selected="selected"';} ?>>R7</option>
								<option value="2008489" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008489){ echo 'selected="selected"';} ?>>R8</option>
								<option value="2008490" <?php if(set_value('Año_cursa',@$datos_reg[0]->Año_cursa)==2008490){ echo 'selected="selected"';} ?>>R9</option>
								<option value="0">NO APLICA</option>
							</select>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-xs-2">
						<div class="form-group">
							<label for="">130. ¿Colegiación?</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" id="colegiacion" required=""  name="colegiacion" value="1" <?php if(set_value('colegiacion',@$datos_reg[0]->colegiacion)=='1'){echo 'checked';}?>>
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" id="colegiacion2" name="colegiacion" value="0" <?php if(set_value('colegiacion',@$datos_reg[0]->colegiacion)=='0'){echo 'checked';}?>>
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group" id="oculto2" style="display: none;">
							<label>131. Colegio</label>
							<select class="form-control select2" style="width: 100%;" id="Colegio" name="Colegio">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($colegio as $i) {
									if($i->ID==set_value('Colegio',@$datos_reg[0]->Colegio)){
										echo "<option value=".$i->ID.' selected="selected">'.$i->NOMBRE."</option>";
									} else {
										echo "<option value=".$i->ID.">".$i->NOMBRE."</option>";
									}
								}
								?>
							</select>
						</div>
					</div>					
				</div>
				<div class="row">
					<div class="col-xs-2">
						<div class="form-group">
							<label for="">132. ¿Certificacion?</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" id="Certificacion" required=""  name="Certificacion" value="1" <?php if(set_value('Certificacion',@$datos_reg[0]->Certificacion)=='1'){echo 'checked';}?>>
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" id="Certificacion2" name="Certificacion" value="0" <?php if(set_value('Certificacion',@$datos_reg[0]->Certificacion)=='0'){echo 'checked';}?>>
										No
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="oculto3" style="display: none;">
					<div class="col-xs-3">
						<div class="form-group">
							<label>133. Nombre de la Certificación</label>
							<select class="form-control select2" style="width: 100%;" id="Nombre_Cer" name="Nombre_Cer">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($certifica as $i) {
									if($i->ID==set_value('Nombre_Cer',@$datos_reg[0]->Nombre_Cer)){
										echo "<option value=".$i->ID.' selected="selected">'.$i->NOMBRE."</option>";
									} else {
										echo "<option value=".$i->ID.">".$i->NOMBRE."</option>";
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="Consejo">134. Consejo</label>
							<input type="text" class="form-control" name="Consejo" id="Consejo" placeholder="Escribir el consejo de certificacion del profesional." maxlength="100" size="100" value="<?php echo set_value('Consejo',@$datos_reg[0]->Consejo); ?>">
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>135. Idioma</label>
							<select class="form-control select2" style="width: 100%;" id="Idioma" name="Idioma">
								<option selected="selected" value="">--Seleccione Opción--</option>
								<?php 
								foreach ($Idioma as $i) {
									if($i->ID==set_value('Idioma',@$datos_reg[0]->Idioma)){
										echo "<option value=".$i->ID.' selected="selected">'.$i->NOMBRE."</option>";
									} else {
										echo "<option value=".$i->ID.">".$i->NOMBRE."</option>";
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>136. Nivel de dominio Idioma</label>
							<select class="form-control select2" style="width: 100%;" id="Nivel_dominio_1" name="Nivel_dominio_1">
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label>137. Lengua indigena</label>
							<select class="form-control select2" style="width: 100%;" id="Lengua_indigena" name="Lengua_indigena">
							</select>
						</div>
						<div class="form-group">
							<label>138. Nivel de dominio Lengua indigena</label>
							<select class="form-control select2" style="width: 100%;" id="Nivel_dominio_2" name="Nivel_dominio_2">
							</select>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="form-group">
							<label for="">139. ¿Lengua señas?</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" id="Lengua_señas" class="minimal"  name="Lengua_señas" value="1" <?php if(set_value('Lengua_señas',@$datos_reg[0]->Lengua_señas)=='1'){echo 'checked';}?>>
										Si
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" id="Certificacion2" class="minimal"  name="Lengua_señas" value="0" <?php if(set_value('Lengua_señas',@$datos_reg[0]->Lengua_señas)=='0'){echo 'checked';}?>>
										No
									</label>
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

<script type="text/javascript">
	$(document).ready(function() {
		$("#Tipo_ciclo_formacion").change(function() {
			$("#Tipo_ciclo_formacion option:selected").each(function() {
				id = $('#Tipo_ciclo_formacion').val();
				$.post("<?php echo base_url(); ?>index.php/Encuesta/carrera", {id : id}, function(data) {
					$("#Carrera_ciclo").html(data);
				});
				$.post("<?php echo base_url(); ?>index.php/Encuesta/escuela2", {id : id}, function(data) {
					$("#Institucion_Educativa_Formadora").html(data);
				});
				// alert(id);
				if (id==2021018) {
					// $("#Año_cursa").val('0');
					$("#Año_cursa option[value=0]").attr("selected",true);
					$("#Año_cursa").change();
					// alert('No Aplica');
				}
			});
		});
		$("#colegiacion").change(function() {
			element = document.getElementById("oculto2");
			element.style.display='block';

		});
		$("#colegiacion2").change(function() {
			element = document.getElementById("oculto2");
			element.style.display='none';
		});

		$("#Certificacion").change(function() {
			element = document.getElementById("oculto3");
			element.style.display='block';
			$.post("<?php echo base_url(); ?>index.php/Encuesta/certifica", { }, function(data) {
				$("#Nivel_dominio_1").html(data);
				$("#Nivel_dominio_2").html(data);
			});
			$.post("<?php echo base_url(); ?>index.php/Encuesta/lenguaindigena", { }, function(data) {
				$("#Lengua_indigena").html(data);
			});
		});
		$("#Certificacion2").change(function() {
			element = document.getElementById("oculto3");
			element.style.display='none';
		});
	});
</script>
</body>
</html>