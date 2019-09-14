<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SARH | Resgitro Familiar</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">


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
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
		<h4><i class="icon fa fa-upload"></i> Información!</h4>
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
				<h1>
					<?php echo $persona[0]->NOMBRES.' '.$persona[0]->APELLIDOS ?>
					<small><?php echo $title;?> Registro Familiar</small>
				</h1>
			</section>
			<section class="content">
				<div class="box box-success">
					<?php echo form_open(); ?>
					<div class="box-header with-border">
						<h3 class="box-title">Datos de Familiares <?php if ($this->uri->segment(2)=='EditarFamiliar' ){ echo 'N° '.$datos_reg[0]->IdFamiliar; } ?></h3>
						<?php if ($this->uri->segment(2)=='EditarFamiliar') {?>
							<div class="box-tools pull-right">
								<span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Creación"><?php echo $datos_reg[0]->FechaReg ?></span>
								<span data-toggle="tooltip" title="" class="badge bg-blue" data-original-title="Ultima Actualización"><?php echo $datos_reg[0]->Fecha ?></span>
								<span data-toggle="tooltip" title="" class="badge bg-navy" data-original-title="Ultimo Usuario"><?php echo $Usuario[0]->Nombre.' '.$Usuario[0]->Apellido ?></span>
							</div>
						<?php } ?>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="Nombre">Nombre(s)</label>
									<input type="text" class="form-control" name="Nombre" id="Nombre" required placeholder="Nombre" maxlength="60" size="60" value="<?php echo set_value('Nombre',@$datos_reg[0]->Nombre); ?>">
								</div>
								<div class="form-group">
									<label for="Apellidos">Apellidos</label>
									<input type="text" class="form-control" name="Apellidos" id="Apellidos" required placeholder="Apellidos" maxlength="60" size="60" value="<?php echo set_value('Apellidos',@$datos_reg[0]->Apellidos); ?>">
								</div>
								<div class="form-group">
									<label>Sexo</label>
									<div class="row">
										<div class="col-xs-6">
											<label>
												<input type="radio" name="Sexo" class="minimal"  value="H" <?php if(set_value('Sexo',@$datos_reg[0]->Sexo)=='H'){echo 'checked';}?>>
												Hombre
											</label>
										</div>
										<div class="col-xs-6">
											<label>
												<input type="radio" name="Sexo" class="minimal" value="M" <?php if(set_value('Sexo',@$datos_reg[0]->Sexo)=='M'){echo 'checked';}?>>
												Mujer
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="FechaNac">Fecha de Nacimiento</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="date" required=”required” class="form-control" name="FechaNac" id="FechaNac" value="<?php echo set_value('FechaNac',@$datos_reg[0]->FechaNac); ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="CURP">CURP</label>
									<input type="text" class="form-control" name="CURP" id="CURP" placeholder="CURP" maxlength="18" size="18" value="<?php echo set_value('CURP',@$datos_reg[0]->CURP); ?>">
								</div>
								<div class="form-group">
									<label for="Ocupacion">Ocupación</label>
									<input type="text" class="form-control" name="Ocupacion" id="Ocupacion" required placeholder="Ocupación" maxlength="60" size="60" value="<?php echo set_value('Ocupacion',@$datos_reg[0]->Ocupacion); ?>">
								</div>  
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="Telefono">Telefono</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="Telefono" id="Telefono" value="<?php echo set_value('Telefono',@$datos_reg[0]->Telefono); ?>" placeholder="(967)-000-0000">
									</div>
								</div>
								<div class="form-group">
									<label>Parentesco</label>
									<select class="form-control select2" style="width: 100%;" name="IdParentesco" id="IdParentesco" required>
										<option selected="selected" value="">--Seleccione Parentesco--</option>
										<?php foreach ($paren as $item):
											if($item->IdParentesco==set_value('IdParentesco',@$datos_reg[0]->IdParentesco)){?>
												<option value="<?php echo $item->IdParentesco;?>" selected="selected"><?php echo $item->Parentesco;?></option>
											<?php } else { ?>
												<option value="<?php echo $item->IdParentesco;?>"><?php echo $item->Parentesco;?></option>
											<?php } endforeach;?>
										</select>
									</div>
									<div class="form-group">
										<label for="Nota">Observaciones Generales</label>
										<textarea class="form-control" rows="3" name="Nota" id="Nota" placeholder="Observaciones..."><?php echo set_value('Nota',@$datos_reg[0]->Nota); ?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<a href="<?php echo base_url();?>index.php/plantilla/ver/<?php echo $persona[0]->IdPersonal ?>" class="btn btn-danger">Cancelar</a>
							<button type="submit" class="btn btn-primary pull-right">Guardar</button>
						</div>
						<?php echo form_close(); ?>
					</div>
				</section>

			</div>    
			<?php $this->load->view('layout/footer_v2'); ?>

		</div>
		<!-- jQuery 3 -->
		<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
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
		<!-- iCheck 1.0.1 -->
		<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

		<script>
			$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
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
    })
})
</script>