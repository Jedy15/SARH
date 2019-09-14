<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SARH | Personal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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

<?php 
$this->load->view('Lideres/header2');
?>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Personal</h3>
          </div>
          <div class="box-body table-responsive">
            <table id="example" class="table table-hove table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tarjeta</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Turno</th>
                  <th>Servicio</th>
                  <th>Funcion</th>
                  <th>Codigo</th>
                  <th>Descripción</th>
                  <th>Fecha de Ingreso</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
$this->load->view('Lideres/footer2');
?>
</div>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
<!-- page script -->
<script>
  $(document).ready(function() {
    listar();
  });



  var listar=function(){
    var table = $('#example').DataTable({
      ajax: {
        url: '<?php echo base_url();?>Lideres/CargarPersonal',
        type: 'POST'
      },
      columns: [
      { "data": "NTarjeta" },
      { "data": "NOMBRES" },
      { "data": "APELLIDOS" },
      { "data": "Turno" },
      { "data": "Servicio" },
      { "data": "Funcion" },
      { "data": "Codigo" },
      { "data": "PUESTO" },
      { 
        "data": null,
          // "defaultContent": '<div class="text-center"><button type="button" data-toggle="modal" data-target="#modal-editar" class="editar btn btn-info"><i class="fa fa-edit"></i></button></div>'
          "defaultContent": '<div class="text-center"><button type="button" data-toggle="modal" data-target="#modal-editar" class="editar btn btn-info"><i class="fa fa-edit"></i></button> <button type="button" data-toggle="modal" data-target="#modal-eliminar" class="eliminar btn btn-danger"><i class="fa fa-trash-o"></i></button></div>',
        }
        ],

        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
      });
  }
</script>


</body>
</html>