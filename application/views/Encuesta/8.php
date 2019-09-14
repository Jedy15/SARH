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
<?php if($this->session->flashdata("Aviso")):?>
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Datos Agregados!</h4>
		<?php echo $this->session->flashdata("Aviso")?>
	</div>
<?php endif; ?>

<body class="hold-transition register-page">
	<section class="content-header">
		<h1><?php echo $persona[0]->NOMBRES.' '.$persona[0]->APELLIDOS ?></h1>
	</section>
	<section class="content">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Datos Familiares</h3>
			</div>
			<div class="box-body">
				<div class="row"> 
					<?php if ($conyugue<>1): ?>
						<div class="col-xs-2">
							<div class="form-group">
								<a id="addesposo" href="#" class="btn btn-success" >Agregar Datos del Conyugue</a>
							</div>
						</div>	
					<?php endif ?>					
					<div class="col-xs-2">
						<div class="form-group">
							<a id="addhijo" href="#" class="btn btn-success" >Agregar Datos del Hijo</a>
						</div>
					</div>					
				</div><!-- fin de la fila 1 -->

				<div class="row" id="oculto" style="display: none;">
					<?php echo form_open('encuesta/addesposo/'.$persona[0]->IdPersonal); ?>
					<div class="col-xs-4">
						<div class="form-group">
							<label for="Nombre">160. Nombre(s)</label>
							<input type="text" class="form-control" name="Nombre" id="Nombre" required placeholder="Nombre" maxlength="60" size="60" value="<?php echo set_value('Nombre',@$datos_reg[0]->Nombre); ?>">
						</div>
						<div class="form-group">
							<label for="Apellidos">161. Apellidos</label>
							<input type="text" class="form-control" name="Apellidos" id="Apellidos" required placeholder="Apellidos" maxlength="60" size="60" value="<?php echo set_value('Apellidos',@$datos_reg[0]->Apellidos); ?>">
						</div>
						<div class="form-group">
							<label>162. Sexo</label>
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
							<label for="FechaNac">163. Fecha de Nacimiento</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" required=”required” class="form-control" name="FechaNac" id="FechaNac" value="<?php echo set_value('FechaNac',@$datos_reg[0]->FechaNac); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="CURP">164. CURP</label>
							<input type="text" class="form-control" name="CURP" id="CURP" placeholder="CURP" maxlength="18" size="18" value="<?php echo set_value('CURP',@$datos_reg[0]->CURP); ?>">
						</div>
						<div class="form-group">
							<label for="Ocupacion">165. Ocupación</label>
							<input type="text" class="form-control" name="Ocupacion" id="Ocupacion" required placeholder="Ocupación" maxlength="60" size="60" value="<?php echo set_value('Ocupacion',@$datos_reg[0]->Ocupacion); ?>">
						</div>  
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<label for="Telefono">166. Telefono Celular</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask name="Telefono" id="Telefono" value="<?php echo set_value('Telefono',@$datos_reg[0]->Telefono); ?>" placeholder="(967)-000-0000">
							</div>
						</div>
						
						
					</div>
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary pull-right">Guardar</button>
					</div>
					<?php echo form_close(); ?>
				</div><!-- fin de la fila 2 -->
				<div class="row" id="oculto2" style="display: none;">
					<?php echo form_open('encuesta/addson/'.$persona[0]->IdPersonal); ?>
					<div class="col-xs-4">
						<div class="form-group">
							<label for="Nombre">167. Nombre(s) del hijo(a)</label>
							<input type="text" class="form-control" name="Nombre" id="Nombre" required placeholder="Nombre" maxlength="60" size="60" value="<?php echo set_value('Nombre',@$datos_reg[0]->Nombre); ?>">
						</div>
						<div class="form-group">
							<label for="Apellidos">168. Apellidos del hijo(a)</label>
							<input type="text" class="form-control" name="Apellidos" id="Apellidos" required placeholder="Apellidos" maxlength="60" size="60" value="<?php echo set_value('Apellidos',@$datos_reg[0]->Apellidos); ?>">
						</div>
						<div class="form-group">
							<label>169. Sexo</label>
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
							<label for="FechaNac">170. Fecha de Nacimiento</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" required=”required” class="form-control" name="FechaNac" id="FechaNac" value="<?php echo set_value('FechaNac',@$datos_reg[0]->FechaNac); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="CURP">171. CURP</label>
							<input type="text" class="form-control" name="CURP" id="CURP" placeholder="CURP" maxlength="18" size="18" value="<?php echo set_value('CURP',@$datos_reg[0]->CURP); ?>">
						</div>
						<div class="form-group">
							<label for="Ocupacion">172. Ocupación</label>
							<input type="text" class="form-control" name="Ocupacion" id="Ocupacion" required placeholder="Ocupación" maxlength="60" size="60" value="<?php echo set_value('Ocupacion',@$datos_reg[0]->Ocupacion); ?>">
						</div>  
					</div>
					<div class="col-xs-4">				
					</div>
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary pull-right">Guardar</button>
					</div>
					<?php echo form_close(); ?>			
				</div><!-- fin de la fila 3 -->
			</div>
			<div class="box-footer">
				<?php echo form_open(); ?>
				<a href="<?php echo base_url(); ?>index.php/Encuesta/p2/<?php echo $persona[0]->IdPersonal ?>" class="btn btn-primary pull-right">Continuar</a>
				<?php echo form_close(); ?>
			</div>
		</div>

		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Familiares Registrados</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
					title="cerrar"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Edad</th>
								<th>Parentesco</th>
							</tr>
						</thead>
						<tbody>                  	
							<?php foreach ($Familiar as $l4) { ?>
								<tr>
									<td><?php echo $l4->Nombre ?></td>
									<td><?php echo $l4->Apellidos ?></td>
									<td><?php $cumpleanos = new DateTime($l4->FechaNac);
									$hoy = new DateTime();
									$annos = $hoy->diff($cumpleanos);
									echo $annos->y.' años'; ?></td>
									<td><?php echo $l4->Parentesco ?></td>
									<td><a href="<?php echo base_url() ?>index.php/Encuesta/eliminafamiliar/<?php echo $persona[0]->IdPersonal?>/<?php echo $l4->IdFamiliar?>" class="btn btn-sm btn-danger pull-right" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o"></i></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.box-body -->
		</div>
		
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
})
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$( "#addesposo" ).click(function() {
			element = document.getElementById("oculto");
			element.style.display='block';
		});

		$( "#addhijo" ).click(function() {
			element = document.getElementById("oculto2");
			element.style.display='block';
		});
	});
</script>
</body>
</html>