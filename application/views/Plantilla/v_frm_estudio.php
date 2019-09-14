<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SARH | Registro Academimco</title>
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
  </head>
  <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  	<!-- Site wrapper -->
  	<div class="wrapper">


      <?php
      $this->load->view('layout/main_header');      
      $this->load->view('layout/aside');
      ?>

      <div class="content-wrapper">
       <section class="content-header">
        <h1>
         <?php echo $persona[0]->NOMBRES.' '.$persona[0]->APELLIDOS ?>
         <small><?php echo $title;?> Registro Academico</small>
       </h1>
     </section>
     <section class="content">
      <div class="box box-success">
       <?php echo form_open(); ?>
       <div class="box-header with-border">
        <h3 class="box-title">Datos de Estudios <?php if ($this->uri->segment(2)=='EditarEstudio' ){ echo 'N° '.$estudio[0]->IdRegEstudio; } ?></h3>
        <?php if ($this->uri->segment(2)=='EditarEstudio') {?>
         <div class="box-tools pull-right">
          <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Creación"><?php echo $estudio[0]->FechaReg ?></span>
          <span data-toggle="tooltip" title="" class="badge bg-blue" data-original-title="Ultima Actualización"><?php echo $estudio[0]->fact ?></span>
          <span data-toggle="tooltip" title="" class="badge bg-navy" data-original-title="Ultimo Usuario"><?php echo $Usuario[0]->Nombre.' '.$Usuario[0]->Apellido ?></span>
        </div>
      <?php } ?>
    </div>
    <div class="box-body">
      <div class="row">
       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="form-group">
         <label>Grado académico</label>
         <select class="form-control select2" style="width: 100%;" id="IdGrado" name="IdGrado" required="">
          <option selected="selected" value="">--Seleccione Opción--</option>
          <?php foreach ($grado as $i) {
           echo "<option value=".$i->ID.">".$i->GRADO_ACADEMICO."</option>";
         } ?>
       </select>
       <input type="hidden" id="Carrera" name="Carrera"> 

     </div>		
   </div>
   
   <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="form-group">
     <label>Nombre del titulo o diploma</label>
     <select class="form-control select2" style="width: 100%;" id="IdCarrera" name="IdCarrera" required="">
      <option selected="selected" value="">--Seleccione Primero un Grado Académico--</option>
    </select>
  </div>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="form-group">
   <label>Institución Educativa</label>
   <select class="form-control select2" style="width: 100%;" id="IdColegio" name="IdColegio" required="">
    <option selected="selected" value="">--Seleccione Primero un Grado Académico--</option>
  </select>
</div>
<div class="form-group" id="oculto1">
 <label for="OtroEscuela">Otra Institución</label>
 <input type="text" class="form-control" name="OtroEscuela" id="OtroEscuela" placeholder="Nombre de la Institución" maxlength="80" size="80" value="<?php echo set_value('OtroEscuela',@$datos_reg[0]->OtroEscuela); ?>">
</div>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="form-group" id="ocultoCedula">
    <label for="Cedula">Cedula Profesional</label>
    <input type="text" class="form-control" name="Cedula" id="Cedula" placeholder="Cedula" maxlength="28" size="28" value="<?php echo set_value('Cedula',@$estudio[0]->Cedula); ?>">
  </div>
</div>

</div>
</div>
<div class="box-footer">
  <a href="<?php echo base_url();?>plantilla/ver/<?php echo $persona[0]->IdPersonal ?>" class="btn btn-danger">Cancelar</a>
  <button type="submit" class="btn btn-primary pull-right">Guardar</button>
</div>
<?php echo form_close(); ?>
</div>
</section>
</div>

<?php  $this->load->view('layout/footer_v2');  ?>
</div>

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
  <script>
   $('#oculto1').hide();
   $('#ocultoCedula').hide();	

   $(document).ready(function() {
    <?php if ($this->uri->segment(2)=='EditarEstudio') { ?>
     var Grado = <?php echo $estudio[0]->IdGrado; ?>;
     var Carrera = <?php echo $estudio[0]->IdCarrera; ?>;
     var escuela = <?php echo $estudio[0]->IdColegio; ?>;
     $("#IdGrado").val(Grado).change();
     CrearCarreras(Grado, Carrera);
     CrearEscuela(Grado, escuela);
			// $("#IdColegio").val(escuela).change();

		<?php }?>

		$("#IdGrado").change(function() {
			var valor = $('#IdGrado option:selected').val();
			// console.log(valor);
			CrearCarreras(valor, null);
			CrearEscuela(valor, null);
      if (valor>= 2039849) {
        $('#ocultoCedula').show('slow/400/fast', function() {

        });
      }
    });

		$("#IdColegio").change(function() {
			$("#IdColegio option:selected").each(function() {
				var escuela = $('#IdColegio').val();
				if (escuela == 2009481) {
					$('#oculto1').show('slow/400/fast', function() {
						$('#OtroEscuela').attr('required', 'required');
					});
				}
			});
		});

    $('#IdCarrera').change(function() {     
      var valor =  $('#IdCarrera option:selected').text();
      $('#Carrera').val(valor);
    });


    function CrearCarreras(Grado_1, IdCarrera) {
     $.post("<?php echo base_url(); ?>/Plantilla/CargarCarreras", {Grado_1 : Grado_1}, function(data) {
      var datos = $.parseJSON(data);
      var opciones;
      for(var i in datos) {
       if (IdCarrera==datos[i].ID) {
        opciones += '<option selected="selected" value="'+datos[i].ID+'">'+datos[i].TITULO+'</option>';
      } else {
        opciones += '<option value="'+datos[i].ID+'">'+datos[i].TITULO+'</option>';
      }
    }
    if (!datos) {
     opciones = '<option selected="selected" value="0">NO APLICA</option>';
   }
   $("#IdCarrera").html(opciones);
 });
   }

   function CrearEscuela(Grado_1, IdColegio){
     $.post("<?php echo base_url(); ?>/Plantilla/CargarInstitutos", {Grado_1 : Grado_1}, function(data) {
      var datos = $.parseJSON(data);
      var opciones;
      for(var i in datos) {
       if (IdColegio==datos[i].ID) {
        opciones += '<option selected="selected" value="'+datos[i].ID+'">'+datos[i].INSTITUCION+'</option>';
      } else {
        opciones += '<option value="'+datos[i].ID+'">'+datos[i].INSTITUCION+'</option>';
      }
    }
    if (!datos) {
     opciones = '<option selected="selected" value="0">NO APLICA</option>';
   }
   $("#IdColegio").html(opciones);
 });

   }

 });
</script>
</body>
</html>