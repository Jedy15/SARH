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
				<h3 class="box-title">Datos de Laborales</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<!-- 1ra columana -->
					<div class="col-md-3">
						<div class="form-group">
							<label for="Actividad">37. Actividad</label>
							<select class="form-control select2" style="width: 100%;" name="Actividad" id="Actividad" required="">
								<option selected="selected" value="">--Seleccione una Opción--</option>
								<?php foreach ($actividad as $item):
									if($item->ID==set_value('Actividad',@$datos_reg[0]->Actividad)){?>
										<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->TIPO_ACTIVIDAD;?></option>
									<?php } else { ?>
										<option value="<?php echo $item->ID;?>"><?php echo $item->TIPO_ACTIVIDAD;?></option>
									<?php } endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label>39. Area de Trabajo</label>
								<select class="form-control select2" style="width: 100%;" name="Area_Trabajo" id="Area_Trabajo" required="">
									<option selected="selected" value="">--Seleccione una Opción--</option>
									<?php foreach ($AreaTrabajo as $item):
										if($item->ID==set_value('Area_Trabajo',@$datos_reg[0]->Area_Trabajo)){?>
											<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->AREA_TRABAJO;?></option>
										<?php } else { ?>
											<option value="<?php echo $item->ID;?>"><?php echo $item->AREA_TRABAJO;?></option>
										<?php } endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>40. Tipo de Personal</label>
									<select class="form-control select2" style="width: 100%;" name="Tipo_Personal" id="Tipo_Personal" required="">
										<option selected="selected" value="">--Seleccione una Opción--</option>
										<?php foreach ($TipoPersonal as $item):
											if($item->ID==set_value('Tipo_Personal',@$datos_reg[0]->Tipo_Personal)){?>
												<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->TIPO_PERSONAL;?></option>
											<?php } else { ?>
												<option value="<?php echo $item->ID;?>"><?php echo $item->TIPO_PERSONAL;?></option>
											<?php } endforeach;?>
										</select>
									</div>    
								</div>

								<!-- 2da columna -->
								<div class="col-md-3">
									<div class="form-group">
										<label>41. Código de Puesto</label>
										<select class="form-control select2" style="width: 100%;" name="Codigo_puesto" id="Codigo_puesto" required>
											<option selected="selected" value="">--Seleccione una Opción--</option>
											<?php foreach ($codigo as $item):
												if($item->CODIGO==set_value('Codigo_puesto',@$laboral[0]->Codigo)){?>
													<option value="<?php echo $item->CODIGO;?>" selected="selected"><?php echo $item->PUESTO;?></option>
												<?php } else { ?>
													<option value="<?php echo $item->CODIGO;?>"><?php echo $item->PUESTO;?></option>
												<?php } endforeach;?>										
											</select>
										</div>
										<div class="form-group">
											<label for="Fecha_ingreso">44. Fecha de Ingreso (Al Instituto)</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="date" required=”required” class="form-control" name="Fecha_ingreso" id="Fecha_ingreso" value="<?php echo set_value('Fecha_ingreso',@$datos_reg[0]->Fecha_ingreso); ?>">
											</div>
										</div>
										<div class="form-group">
											<label>45. Unidad de Adscripción</label>
											<select class="form-control select2" style="width: 100%;" name="CLUES_adscripcion" id="CLUES_adscripcion" required="">
												<option selected="selected" value="">--Seleccione una Opción--</option>
												<?php foreach ($unidad as $item):
													if($item->ID==set_value('CLUES_adscripcion',@$laboral[0]->IdAds)){?>
														<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->NOMBREUNIDAD;?></option>
													<?php } else { ?>
														<option value="<?php echo $item->ID;?>"><?php echo $item->NOMBREUNIDAD;?></option>
													<?php } endforeach;?>
											</select>
										</div>
										<div class="form-group">
											<label for="Sueldo_mensual">84. Sueldo o Salario mensual(bruto)</label>
											<input type="num" class="form-control" min="0" name="Sueldo_mensual" id="Sueldo_mensual" placeholder="Ejemplo: 10000" value="<?php echo set_value('Sueldo_mensual',@$datos_reg[0]->Sueldo_mensual); ?>">
										</div>
									</div>

										<!-- 3ra columna -->
									<div class="col-md-3">
										<div class="form-group">
											<label>47. Especialidad</label>
											<select class="form-control select2" style="width: 100%;" name="Especialidad" id="Especialidad">
												<option selected="selected" value="">--Seleccione una Opción--</option>
												<?php foreach ($especialidad as $item):
													if($item->ID==set_value('Especialidad',@$datos_reg[0]->Especialidad)){?>
														<option value="<?php echo $item->ID;?>" selected="selected"><?php echo $item->ESPECIALIDAD;?></option>
													<?php } else { ?>
														<option value="<?php echo $item->ID;?>"><?php echo $item->ESPECIALIDAD;?></option>
													<?php } endforeach;?>
												</select>
											</div>
												<div class="form-group">
													<label>49. Tipo de Contrato</label>
													<select class="form-control select2" style="width: 100%;" name="Tipo_Contrato" id="Tipo_Contrato">
														<option selected="selected" value="">--Seleccione una Opción--</option>
														<option value="2032535" <?php if(set_value('Tipo_Contrato',@$datos_reg[0]->Tipo_Contrato)==2032535){ echo 'selected="selected"';} ?> >CONFIANZA</option>
														<option value="2032536"  <?php if(set_value('Tipo_Contrato',@$datos_reg[0]->Tipo_Contrato)==2032536){ echo 'selected="selected"';} ?>>BASE</option>
														<option value="2032537" <?php if(set_value('Tipo_Contrato',@$datos_reg[0]->Tipo_Contrato)==2032537){ echo 'selected="selected"';} ?>>EVENTUAL</option>
														<option value="2032538" <?php if(set_value('Tipo_Contrato',@$datos_reg[0]->Tipo_Contrato)==2032538){ echo 'selected="selected"';} ?>>HONORARIOS</option>
													</select>
												</div>
												<div class="form-group">
													<label>50. Tipo de plaza</label>
													<select class="form-control select2" style="width: 100%;" name="Tipo_plaza" id="Tipo_plaza">
														<option selected="selected" value="">--Seleccione una Opción--</option>
														<option value="2032542" <?php if(set_value('Tipo_plaza',@$datos_reg[0]->Tipo_plaza)==2032542){ echo 'selected="selected"';} ?>>FEDERAL</option>
														<option value="2032543" <?php if(set_value('Tipo_plaza',@$datos_reg[0]->Tipo_plaza)==2032543){ echo 'selected="selected"';} ?>>ESTATAL</option>
														<option value="2032544" <?php if(set_value('Tipo_plaza',@$datos_reg[0]->Tipo_plaza)==2032544){ echo 'selected="selected"';} ?>>OTRO</option>
													</select>
												</div>
											</div>

											<!-- 4ta columna -->
											<div class="col-md-3">
												<div class="form-group">
													<label for="">56. ¿Cuenta con seguro de salud?</label>
													<div class="row">
														<div class="col-xs-6">
															<label>
																<input type="radio" name="Seguro_Salud" class="minimal" required=""  value="1" <?php if(set_value('Seguro_Salud',@$datos_reg[0]->Seguro_Salud)=='1'){echo 'checked';}?>>
																SI
															</label>
														</div>
														<div class="col-xs-6">
															<label>
																<input type="radio" name="Seguro_Salud" class="minimal" value="0" <?php if(set_value('Seguro_Salud',@$datos_reg[0]->Seguro_Salud)=='0'){echo 'checked';}?>>
																NO
															</label>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="">57. ¿Cuenta actualmente con licencia de maternidad?</label>
													<div class="row">
														<div class="col-xs-6">
															<label>
																<input type="radio" name="Licencia_maternidad" class="minimal" required="" value="1" <?php if(set_value('Licencia_maternidad',@$datos_reg[0]->Licencia_maternidad)=='1'){echo 'checked';}?>>
																SI
															</label>
														</div>
														<div class="col-xs-6">
															<label>
																<input type="radio" name="Licencia_maternidad" class="minimal" value="0"  <?php if(set_value('Licencia_maternidad',@$datos_reg[0]->Licencia_maternidad)=='0'){echo 'checked';}?>>
																NO
															</label>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="">58. ¿Cuenta actualmente con seguro para el retiro?</label>
													<div class="row">
														<div class="col-xs-6">
															<label>
																<input type="radio" name="Seguro_Retiro" class="minimal" required="" value="1" <?php if(set_value('Seguro_Retiro',@$datos_reg[0]->Seguro_Retiro)=='1'){echo 'checked';}?>>
																SI
															</label>
														</div>
														<div class="col-xs-6">
															<label>
																<input type="radio" name="Seguro_Retiro" class="minimal"  value="0" <?php if(set_value('Seguro_Retiro',@$datos_reg[0]->Seguro_Retiro)=='0'){echo 'checked';}?>>
																NO
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
</body>
</html>