<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SRH2018 | Incidencia General</title>

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
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
  <!-- https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
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
  <!-- Site wrapper -->
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>HM</b>18</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SistemaHM</b>2018</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Tasks: style can be found in dropdown.less -->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata("nombre").' '.$this->session->userdata("ap")?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $this->session->userdata("nombre")?> - <?php echo $this->session->userdata('perfil'); ?>
                    <small>Registrado desde <?php echo $this->session->userdata('reg'); ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url(); ?>usuarios/perfil/<?php echo $this->session->userdata('id'); ?>" class="btn btn-success btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url();?>clogin/logout" class="btn btn-danger btn-flat">Cerrar Sesión</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <?php
    $this->load->view('layout/aside');
    ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Incidencias
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
              </div>
              <div class="box-body table-responsive">
                <table id="tabla1" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Folio</th>
                      <th>Nombre</th>
                      <th>N° Tarjeta</th>
                      <th>Usuario</th>
                      <th>Capturado</th>
                      <th>Semana</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($Incidencia as $item) {?>
                      <tr>
                        <td id="<?php echo $item->Folio; ?>" class="btn details-control fa fa-plus-circle text-green"></td>
                        <td>F-<?php echo $item->Folio; ?></td>
                        <td><?php echo $item->a.' '.$item->b.' '.$item->c;  ?></td>  
                        <td><?php echo $item->NTarjeta ?></td>                                                                 
                        <td><span data-toggle="tooltip"  data-original-title="<?php echo $item->x.' '.$item->y;?>"><?php echo $item->User ?></span></td>
                        <td><?php echo $item->captura ?></td>
                        <td><?php $create=strtotime($item->captura);
                        $S = date('W', $create);
                        echo $S ?></span></td>      
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <th></th>
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th>N° Tarjeta</th>
                    <th>Usuario</th>
                    <th>Capturado</th>
                    <th>Semana</th>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 0.3.2
      </div>
      <strong>Copyright &copy; 2018 <a href="https://www.facebook.com/JedySistemas">J-edy Sistemas Informáticos</a>.</strong> All rights
      reserved.
    </footer>
  </div>
  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery-3.3.1.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
  <!-- jQuery 3 -->
  <!-- <script src="<?php //echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->
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

  <script type="text/javascript">
    function format ($Folio) {
      return '<table id=t-'+$Folio+' class="table table-bordered table-striped table-hover compact">'+
      '<tr class="bg-blue">'+
      '<th>#</th>'+
      '<th>Incidencia</th>'+
      '<th>Inicio</th>'+
      '<th>Fin</th>'+
      '<th>Observaciones</th>'+
      '</tr>'+
      '</table>';
    }

    $(document).ready(function() {
      var table = $('#tabla1').DataTable({
        // "scrollY": 200,
        "scrollX": true,
        "order": [[ 1, "asc" ]],
        // stateSave: true,
        "language": {
          "info": "Mostrando del _START_ al _END_ de _TOTAL_ Registros",
          "search": "Buscar:",
          "infoFiltered": "(Filtrado de _MAX_ Registros Totales)",
          "lengthMenu": "_MENU_ Registros Mostrados",
          paginate: {
            previous: 'Anterior',
            next:     'Siguiente'
          }
        }
      }); 

      <?php if($this->session->userdata('IdPerfil')<=3) {?>
        new $.fn.dataTable.Buttons( table, {
          lengthChange: false,
          buttons: [    
          {
            extend: 'colvis',
            text:      '<i class="fa fa-columns"></i>',
            titleAttr: 'Editar Columnas',
            className: 'btn btn-warning'
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
          language: {
            buttons: {
              colvis: 'Editar Columnas'
            }
          }
        } );

        table.buttons().container()
        .appendTo( '#tabla1_wrapper .col-md-6:eq(0)' );
      <?php } ?>

      $('#tabla1 tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        var Folio = $(this).attr('id');

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            $(this).removeClass('fa fa-minus-circle text-red');            
            $(this).addClass('fa fa-plus-circle text-green');
          }
          else {
            // Open this row
            row.child(format(Folio, row.data())).show();
            tr.addClass('shown');
            $(this).removeClass('fa fa-plus-circle text-green');            
            $(this).addClass('fa fa-minus-circle text-red');
            $.post('<?php echo base_url(); ?>Reporte/CargarIncidencias', { id: Folio}, function(data) {
              var datos = JSON.parse(data);
              $.each(datos, function(index, item) {
                index++
                $('#t-'+Folio).append(
                  '<tr>'+
                  '<td>'+index+'</td>'+
                  '<td>'+item.Nombre+'</td>'+
                  '<td>'+item.start+'</td>'+
                  '<td>'+item.end+'</td>'+
                  '<td>'+item.nota+'</td>'+
                  '</tr>'
                  );
              });
            });
          }
        } );


    });
  </script>

</body>
</html>