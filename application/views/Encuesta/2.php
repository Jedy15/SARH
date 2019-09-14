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
				<h3 class="box-title">Datos de Domicilio</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<!-- 1ra columana -->
					<div class="col-md-3">
						<div class="form-group">
							<label>16. Entidad</label>
							<select class="form-control select2" style="width: 100%;" name="Entidad_Federativa" id="Entidad_Federativa" required="">
								<option value="">--SELECCIONE ENTIDAD--</option>
								<?php foreach ($estado as $item): ?>
										<option value="<?php echo $item->ID;?>"><?php echo $item->ENTIDAD_FEDERATIVA;?></option>
									<?php  endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label>17. Municipio</label>
								<select class="form-control select2" style="width: 100%;" name="Municipio" id="Municipio" required="">
									<option value="">Seleccione Antes Una Entidad</option>
								</select>
							</div>
							<div class="form-group" id="controlLocalidad">
								
							</div>
							<div class="form-group">
								<label for="CP">20. Codigo Postal</label>
								<input type="text" class="form-control" name="Codigo_Postal" id="Codigo_Postal" data-inputmask='"mask": "99999"' data-mask value="<?php echo set_value('Codigo_Postal',@$datos_reg[0]->Codigo_Postal); ?>" placeholder="29000" >
							</div>
						</div>

						<!-- 2da columna -->
						<div class="col-md-3">
							<div class="form-group">
								<label>21. Tipo de Vialidad</label>
								<select class="form-control select2" style="width: 100%;" name="Tipo_Vialidad" id="Tipo_Vialidad" required>
									<option value="">--SELECCIONE TIPO DE VIALIDAD--</option>
									<?php foreach ($vialidad as $item):
										if($item->ID == set_value('Tipo_Vialidad',@$datos_reg[0]->Tipo_Vialidad)){?>
											<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->VIALIDAD;?></option>
										<?php } else { ?>
											<option value="<?php echo $item->ID;?>"><?php echo $item->VIALIDAD;?></option>
										<?php } endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>22. Nombre de Vialidad</label>
									<input type="text" class="form-control" required name="Nombre_Vialidad" id="Nombre_Vialidad" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('Nombre_Vialidad',@$datos_reg[0]->Nombre_Vialidad); ?>" placeholder="Ejemplo: Insurgentes" >
								</div>
								<div class="form-group">
									<label>23. Numero Exterior</label>
									<input type="number" class="form-control" id="Num_Exterior" min="1" name="Num_Exterior" required placeholder="Introduce el numero Exterior del Domicilio" value="<?php echo set_value('Num_Exterior',@$datos_reg[0]->Num_Exterior); ?>">
								</div>
								<div class="form-group">
									<label>24. Numero Exterior Alfanumérico</label>
									<input type="text" class="form-control" id="Num_Exterior_Alfanumerico" name="Num_Exterior_Alfanumerico" maxlength="5" placeholder="Introduce la letra (bis) 'Si Aplica'"value="<?php echo set_value('Num_Exterior_Alfanumerico',@$datos_reg[0]->Num_Exterior_Alfanumerico); ?>">
								</div>
								<div class="form-group">
									<label>27. Numero Interior</label>
									<input type="number" class="form-control" id="Num_Interior" name="Num_Interior" min="1"  placeholder="Introduce el numero Interior 'Si aplica'" value="<?php echo set_value('Num_Interior',@$datos_reg[0]->Num_Interior); ?>">
								</div>


							</div>

							<!-- 3ra columna -->
							<div class="col-md-3">
								<div class="form-group">
									<label for="">29. Tipo de Asentamiento Humano</label>
									<select class="form-control select2" style="width: 100%;" name="Tipo_Asentamiento_Humano" id="Tipo_Asentamiento_Humano" required>
										<option value="">--SELECCIONE TIPO DE ASENTAMIENTO--</option>
										<?php foreach ($asentamiento as $item):
											if($item->ID == set_value('Tipo_Asentamiento_Humano',@$datos_reg[0]->Tipo_Asentamiento_Humano)){?>
												<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->ASENTAMIENTO;?></option>
											<?php } else { ?>
												<option value="<?php echo $item->ID;?>"><?php echo $item->ASENTAMIENTO;?></option>
											<?php } endforeach;?>
										</select>
									</div>
									<div class="form-group">
										<label>30. Nombre de Asentamiento Humano</label>
										<input type="text" class="form-control" required name="Nombre_Asentamiento_Humano" id="Nombre_Asentamiento_Humano" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('Nombre_Asentamiento_Humano',@$datos_reg[0]->Nombre_Asentamiento_Humano); ?>" placeholder="Introduce Nombre de la Colonia">
									</div>
									<div class="form-group">
										<label>28. Descripción de la ubicación del Domicilio</label>
										<textarea class="form-control" rows="3" name="Descripcion_ubicacion" id="Descripcion_ubicacion" placeholder="Referencia del Domicilio"><?php echo set_value('Descripcion_ubicacion',@$datos_reg[0]->Descripcion_ubicacion); ?></textarea>
									</div>
								</div>

								<!-- 4ta columna -->
								<div class="col-md-3">
									<h5>Entre que vialidades</h5>
									<div class="form-group">
										<label>32. Entre Tipo de Vialidad 1</label>
										<select class="form-control select2" style="width: 100%;" name="Tipo_Vialidad_Entre_1" id="Tipo_Vialidad_Entre_1" required>
											<option value="">--SELECCIONE TIPO DE VIALIDAD--</option>
											<?php foreach ($vialidad as $item):
												if($item->ID == set_value('Tipo_Vialidad_Entre_1',@$datos_reg[0]->Tipo_Vialidad_Entre_1)){?>
													<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->VIALIDAD;?></option>
												<?php } else { ?>
													<option value="<?php echo $item->ID;?>"><?php echo $item->VIALIDAD;?></option>
												<?php } endforeach;?>
											</select>
										</div>
										<div class="form-group">
											<label>33. Nombre de Vialidad</label>
											<input type="text" class="form-control" required name="Nombre_Vialidad_1" id="Nombre_Vialidad_1" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('Nombre_Vialidad_1',@$datos_reg[0]->Nombre_Vialidad_1); ?>" placeholder="Ejemplo: Insurgentes" >
										</div>
										<div class="form-group">
											<label>34. Entre Tipo de Vialidad 2</label>
											<select class="form-control select2" style="width: 100%;" name="Tipo_Vialidad_Entre_2" id="Tipo_Vialidad_Entre_2" required>
												<option value="">--SELECCIONE TIPO DE VIALIDAD--</option>
												<?php foreach ($vialidad as $item):
													if($item->ID == set_value('Tipo_Vialidad_Entre_2',@$datos_reg[0]->Tipo_Vialidad_Entre_2)){?>
														<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->VIALIDAD;?></option>
													<?php } else { ?>
														<option value="<?php echo $item->ID;?>"><?php echo $item->VIALIDAD;?></option>
													<?php } endforeach;?>
												</select>
											</div>
											<div class="form-group">
												<label>35. Nombre de Vialidad</label>
												<input type="text" class="form-control" required name="Nombre_Vialidad_2" id="Nombre_Vialidad_2" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo set_value('Nombre_Vialidad_2',@$datos_reg[0]->Nombre_Vialidad_2); ?>" placeholder="Ejemplo: Insurgentes" >
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
		$("#Entidad_Federativa").change(function() {
			linea = $('#Entidad_Federativa option:selected').text()
			// alert(linea);
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Municipio", {linea : linea}, function(data) {
				$("#Municipio").html(data);
			});
			if (linea == 'CHIAPAS') {
				$.post("<?php echo base_url(); ?>index.php/Encuesta/localselect", { }, function(data) {
					$("#controlLocalidad").html(data);
				});
			} else {
				$.post("<?php echo base_url(); ?>index.php/Encuesta/localtext", {}, function(data) {
					$("#controlLocalidad").html(data);
				});
			}
		});
		
		$("#Municipio").change(function() {
			linea = $('#Municipio option:selected').text()
			$.post("<?php echo base_url(); ?>index.php/Encuesta/Localidad", {linea : linea}, function(data) {
				$("#Localidad").html(data);
			});
			// alert(linea);
			
		});
	});
</script>


</body>
</html>