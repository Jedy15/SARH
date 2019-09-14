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
<?php 
if ($fail){
	?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Error!</h4>
		<?php print_r($fail);	?>
	</div>
<?php }  ?>



<body class="hold-transition register-page">
	<section class="content-header">
		<h1>Bienvenido <?php echo $persona[0]->NOMBRES.' '.$persona[0]->APELLIDOS ?></h1>
	</section>
	<section class="content">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Por favor rellene todos los campos del formulario</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-3">
						<?php
						echo  form_open_multipart('Encuesta/upload/'.$persona[0]->IdPersonal.'/'.$persona[0]->RFC);
						$nombre_fichero = '//192.168.1.60/HM2018/docs/'.$persona[0]->IdPersonal.'/foto'.$persona[0]->IdPersonal.'.JPG';
						if (file_exists($nombre_fichero)) { ?>
							<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>docs/<?php echo $persona[0]->IdPersonal ?>/foto<?php echo $persona[0]->IdPersonal ?>.JPG" alt="User profile picture">
						<?php } ?>
						<div class="form-group">
							<label for="exampleInputFile">1. Fotografia</label>
							<input type="file" id="exampleInputFile" name="foto" accept="image/*" required="" capture="camera">
							<p class="help-block">Seleccione una imagen con su foto.</p>
							<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Guardar Imagen</button>
							<!-- <button type="submit" class="btn  pull-right">Continuar</button> -->
						</div>
						<?php echo form_close();
						echo form_open(); ?>
						<div class="form-group">
							<label for="NOMBRES">2. Nombre(s)</label>
							<input type="text" class="form-control" name="NOMBRES" id="NOMBRES" placeholder="Ingrese su Nombre(s)" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('NOMBRES',@$persona[0]->NOMBRES); ?>" disabled>
						</div>
						<div class="form-group">
							<label for="APELLIDOS">3. Apellidos</label>
							<input type="text" class="form-control" name="APELLIDOS" id="APELLIDOS" placeholder="Ingrese sus apellidos" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('APELLIDOS',@$persona[0]->APELLIDOS);  ?>" disabled>
						</div>

					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Fecha_Nacimiento">8. Fecha de Nacimiento</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" required=”required” class="form-control" name="Fecha_Nacimiento" id="Fecha_Nacimiento" value="<?php echo set_value('Fecha_Nacimiento',@$persona[0]->FECHANAC); ?>">
							</div>
						</div>
						<div class="form-group">
							<label>5. País de Nacimiento</label>
							<select class="form-control select2" style="width: 100%;" name="Pais_Nacimiento" id="Pais_Nacimiento" required="">
								<option value="">--SELECCIONA PAIS NACIMIENTO--</option>
								<?php foreach ($pais as $item):
									// if($item->ID == set_value('Pais_Nacimiento',@$datos_reg[0]->Pais_Nacimiento)){?>
										<!-- <option value="<?php //echo $item->ID;?>" selected="selected"><?php //echo $item->PAIS_NACIMIENTO;?></option> -->
										<?php 
								// } else { ?>
									<option value="<?php echo $item->ID;?>"><?php echo $item->PAIS_NACIMIENTO;?></option>
									<?php
								endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label>6. Entidad de Nacimiento</label>
							<select class="form-control select2" style="width: 100%;" name="Entidad_Nacimiento" id="Entidad_Nacimiento" required="">
								<option value="">--SELECCIONA ENTIDAD--</option>
								<?php foreach ($estado as $item): ?>
									<option value="<?php echo $item->ID;?>"><?php echo $item->ENTIDAD_FEDERATIVA;?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label>7. Municipio de Nacimiento</label>
							<select class="form-control select2" style="width: 100%;" name="Municipio_Nacimiento" id="Municipio_Nacimiento" required="">
								<option value="">Seleccion Antes Una Entidad</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="CURP">0. CURP</label>
							<input type="text" class="form-control" name="CURP" id="CURP" placeholder="Capture CURP" size="18" onKeyUp="this.value = this.value.toUpperCase();" maxlength="18" value="<?php echo set_value('CURP',@$persona[0]->CURP); ?>">
						</div>
						<div class="form-group">
							<label>12. Sexo:</label>
							<div class="row">
								<div class="col-xs-6">
									<label>
										<input type="radio" name="Sexo" required class="minimal"  value="H" <?php if(set_value('Sexo',@$persona[0]->SEXO)=='H'){echo 'checked';}?>>
										Masculino
									</label>
								</div>
								<div class="col-xs-6">
									<label>
										<input type="radio" name="Sexo" class="minimal" value="M" <?php if(set_value('Sexo',@$persona[0]->SEXO)=='M'){echo 'checked';} ?>>
										Femenino
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="Correo_Electronico">15. Correo Electronico</label>
							<input type="email" class="form-control" name="Correo_Electronico" id="Correo_Electronico" placeholder="Introduzca su Correo Electronico" size="99" maxlength="99" value="<?php echo set_value('Correo_Electronico',@$datos_reg[0]->Correo_Electronico); ?>">
						</div>
						<div class="form-group">
							<label for="Telefono">31. Telefono Celular</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="Telefono" id="Telefono" value="<?php echo set_value('Telefono',@$datos_reg[0]->Telefono); ?>" placeholder="(967)-000-0000">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>11. Estado Civil</label>
							<select class="form-control select2" style="width: 100%;" name="Estado_Conyugal" id="Estado_Conyugal" required="">
								<option value="">--SELECCIONA ESTADO CIVIL--</option>
								<?php foreach ($conyugal as $item):
									if($item->ID == set_value('ID',@$datos_reg[0]->Estado_Conyugal)){?>
										<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->ESTADO_CONYUGAL;?></option>
									<?php } else { ?>
										<option value="<?php echo $item->ID;?>"><?php echo $item->ESTADO_CONYUGAL;?></option>
									<?php } endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label>13. ¿Cuenta con Firma Electronica(FIEL)?:</label>
								<div class="row">
									<div class="col-xs-6">
										<label>
											<input type="radio" name="Tiene_Fiel" required  id="si"  value="1" <?php if(set_value('Tiene_Fiel',@$datos_reg[0]->Tiene_Fiel)=='1'){echo 'checked';} ?>>
											SI
										</label>
									</div>
									<div class="col-xs-6">
										<label>
											<input type="radio" name="Tiene_Fiel"  id="no" value="0" <?php if(set_value('Tiene_Fiel',@$datos_reg[0]->Tiene_Fiel)=='0'){echo 'checked';} ?>>
											NO
										</label>
									</div>
								</div>
							</div>
							<div class="form-group" id="oculto" style="display: none;">
								<label for="Fecha_Nacimiento">14. Vigencia FIEL</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="date" class="form-control" name="Vigencia_Fiel" id="Vigencia_Fiel" value="<?php echo set_value('Vigencia_Fiel',@$datos_reg[0]->Vigencia_Fiel); ?>">
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
		<script>
			$.post("<?php echo base_url(); ?>", 
				{parametros}, 
				function(data) {
					/*optional stuff to do after success */
				});
			</script>
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
		$("#Entidad_Nacimiento").change(function() {
			linea = $('#Entidad_Nacimiento option:selected').text()
			// alert(linea);
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Municipio", {linea : linea}, function(data) {
				$("#Municipio_Nacimiento").html(data);
			});
		});
		$("#si").change(function() {
			element = document.getElementById("oculto");
			element.style.display='block';
		});

		$("#no").change(function() {
			element = document.getElementById("oculto");
			element.style.display='none';
		});

		
		$("#Pais_Nacimiento").change(function() {
			$("#Pais_Nacimiento option:selected").each(function() {
				id = $('#Pais_Nacimiento').val();
				if (id!=142) {
					$("#Entidad_Nacimiento option[value=36]").attr("selected",true);
					$("#Entidad_Nacimiento").change();				
				}
			});
		});

	});
</script>
</body>
</html>