<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SRH2018 | Reporte Incidencias</title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
 <!-- Morris chart -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
 <!-- jvectormap -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
 <!-- Date Picker -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <!-- Daterange picker -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
 <!-- bootstrap wysihtml5 - text editor -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
 <div class="wrapper">
  <?php
  $this->load->view('layout/main_header');
  $this->load->view('layout/aside');
  ?>


  <div class="content-wrapper">
   <section class="content-header">
    <h1>Incidencias Semana <?php $hoy = date('W Y'); echo $hoy?></h1>
  </section>
  <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <div class="box box-warning">
        <div class="box-header">

        </div>
        <div class="box-body table-responsive">
          <table id="example" class="table table-bordered table-striped" style="width:100%">
           <thead>
            <tr>
              <th>N° Tarjeta</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Folio</th>
              <th>Incidencia</th>
              <th>Inicio</th>
              <th>Fin</th>
              <th>Usuario</th>
              <th>Capturado</th>
              <th>Semana</th>
              <th>Estado</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
</section>
</div>

<?php $this->load->view('layout/footer_v2'); ?>

</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery-3.3.1.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
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

<script src="<?php echo base_url(); ?>assets/bower_components/moment/moment.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    listar();
  });

  var listar=function(){
    var table = $('#example').DataTable({
      ajax: {
        url: '<?php echo base_url();?>Reporte/CargarSemanaIncidencia',
        type: 'POST'
      },

      "scrollX": true,

      columns: [
      { "data":"NTarjeta",
      "render": function ( data, type, row, meta ) {
        return 't-'+data;
      }},
      { "data": "NOMBRES" },
      { "data": "APELLIDOS" },
      { "data": "Folio" },
      { "data": "Nombre" },
      { "data": "start" },
      { "data": "end" },
      { "data": "Usuario" },
      { "data": "Captura" },
      { "data": "Captura",
      "render": function ( data, type, row, meta ){
        var semana = moment(data).format("YYYY-ww");
        // var fecha = new Date(semana);
        // var semana = fecha.getWeek()+' '+fecha.getFullYear();
        return semana;
      }},
      { "data": "validar",  
      "render": function ( data, type, row, meta ) {
        if (data==0) {
          return '<span class="label label-danger">Por Validar</span>';
        } else {
          return '<span class="label label-success">Autorizado</span>';
        }
      }}          
      ],

      "order":  [ 3, 'desc' ],


      <?php if ($this->session->userdata('IdPerfil')<=3) { ?>

        dom: 'lBfrtip',
        buttons: [
        {
          extend: 'colvis',
          text:      '<i class="fa fa-columns"></i>',
          titleAttr: 'Editar Columnas',
          className: 'btn btn-warning',
          columnText: function ( dt, idx, title ) {
            return (idx+1)+': '+title;
          }
        },
        {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel-o"></i>',
          className: 'btn btn-success',
          titleAttr: 'Exportar a Excel',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend:    'pdfHtml5',
          text:      '<i class="fa fa-file-pdf-o"></i>',
          titleAttr: 'Exportar a PDF',
          className: 'btn btn-danger',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          text:      '<i class="fa fa-print"></i>',
          titleAttr: 'Imprimir',
          className: 'btn btn-info',
          exportOptions: {
            columns: ':visible'
          }
        }
        ],
      <?php } ?>


      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
      }
    });
  }



</script>

</body>
</html>