<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SARH | Expediente</title>
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

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
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
          Registro Personal 
          <?php if ($this->session->userdata("IdPerfil")<=3) { ?>
            <div class="btn-group pull-right">
              <a href="" class="btn btn-success">Acciones</a>
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a class="btn btn-block bg-teal btn-flat" href="<?php echo base_url();?>Plantilla/EditarRegitro/<?php echo $datos_reg[0]->IdPersonal ?>">Editar Datos</a></li>
                <li class="divider"></li>
                <li><a class="btn btn-block bg-green btn-flat" href="<?php echo base_url();?>Plantilla/NuevoEstudio/<?php echo $datos_reg[0]->IdPersonal ?>">Nuevo Reg. Academico</a></li>
                <li><a class="btn btn-block bg-blue btn-flat" href="<?php echo base_url();?>Plantilla/NuevoFamiliar/<?php echo $datos_reg[0]->IdPersonal ?>">Nuevo Reg. Familiar</a></li>
                <?php if ($this->session->userdata("IdPerfil")<=2) { ?>           
                  <li><a class="btn btn-block bg-green btn-flat" href="<?php echo base_url();?>Plantilla/nuevolaboral/<?php echo $datos_reg[0]->IdPersonal ?>">Nueva Sit. Laboral</a></li>
                  <li><a class="btn btn-block bg-blue btn-flat" href="<?php echo base_url();?>Plantilla/nuevohorario/<?php echo $datos_reg[0]->IdPersonal ?>">Nuevo Horario</a></li>
                  <li class="divider"></li>
                  <li><button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#modal-danger">Baja</button></li>
                <?php } ?>
              </ul>
            </div>
          <?php } ?>
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-widget widget-user">
              <div class="widget-user-header bg-<?php if ($datos_reg[0]->SEXO=='H') { echo 'aqua';} else { echo 'purple';}?>-active">
                <div class="pull-right box-tools">
                  <?php if ($this->session->userdata('IdPerfil')<=2) { ?>
                    <button type="button" class="btn bg-<?php if ($datos_reg[0]->SEXO=='H') { echo 'aqua';} else { echo 'purple';}?>-active btn-sm"  data-toggle="tooltip" data-original-title="Agregar Foto" onclick="foto()"><i class="fa fa-camera"></i>
                    </button>
                  <?php } ?>
                  <button type="button" class="btn bg-<?php if ($datos_reg[0]->SEXO=='H') { echo 'aqua';} else { echo 'purple';}?>-active btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-<?php if ($datos_reg[0]->SEXO=='H') { echo 'aqua';} else { echo 'purple';}?>-active btn-sm"  data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <h3 class="widget-user-username"><?php echo $datos_reg[0]->NOMBRES." ".$datos_reg[0]->APELLIDOS ?></h3>
                <h5 class="widget-user-desc"><?php if (empty($horarioact[0])){ echo null; } else { echo $horarioact[0]->Funcion; } ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo $ruta; ?>" alt="User Avatar">
              </div>
              <div class="box-body">
              </div>
              <div class="box-footer">
                <ul class="list-group list-group-unbordered">

                  <li class="list-group-item">
                    <i class="fa fa-user margin-r-5"></i> 
                    <b>N° Expediente</b> <?php if ($datos_reg[0]->NumExp!=null) { ?>
                      <a><span class="pull-right badge bg-black"><?php echo $datos_reg[0]->NumExp; ?></span></a>
                    <?php } elseif ($this->session->userdata("IdPerfil")<=2){ ?>
                      <button class="btn bg-maroon btn-xs pull-right" id="asignar">Asignar</button> 
                    <?php } else { ?>
                      <a class="pull-right">No tiene</a>
                    <?php } ?>
                  </li>           
                  <li class="list-group-item">
                    <i class="fa fa-info margin-r-5"></i> 
                    <b>RFC</b> <a class="pull-right"><?php echo $datos_reg[0]->RFC ?></a>
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-book margin-r-5"></i> 
                    <b>CURP</b> <a class="pull-right"><?php echo $datos_reg[0]->CURP ?></a>
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-birthday-cake margin-r-5"></i> 
                    <b>Fecha de Nacimiento</b> <a class="pull-right"><?php echo $datos_reg[0]->FECHANAC ?></a>
                  </li>
                  <?php if ($datos_reg[0]->OBSERVACIONES!=null) { ?>
                    <li class="list-group-item">
                      <i class="fa fa-newspaper-o margin-r-5"></i> 
                      <b>Observaciones</b> <a class="pull-right"><?php echo $datos_reg[0]->OBSERVACIONES ?></a>
                    </li>
                  <?php } ?>
                  <?php if ($datos_reg[0]->Calle!=null) { ?>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Domicilio</strong>
                    <p class="text-muted">
                      <?php echo $datos_reg[0]->Calle ?>, Col. <?php echo $datos_reg[0]->Colonia ?>, CP: <?php echo $datos_reg[0]->CP ?>, <?php echo $datos_reg[0]->MUNICIPIO ?>
                    </p>
                  <?php } ?>
                  <?php if ($datos_reg[0]->Telefono!=null) { ?>
                    <strong><i class="fa fa-phone margin-r-5"></i> Contacto</strong>
                    <p class="text-muted">
                      Telefono: <?php echo $datos_reg[0]->Telefono ?> <br>
                      Correo Electronico: <?php echo $datos_reg[0]->Correo ?>
                    </p>
                  <?php } ?>
                </ul>
              </div>        
            </div>
            <!--  -->
          </div>

          <div class="col-md-4">
            <?php if ($horarioact) { ?>
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Horario Actual</h3>
                  <div class="box-tools pull-right">
                    <?php if($this->session->userdata('IdPerfil')<=3) {?>
                      <a class="btn btn-box-tool" href="<?php echo base_url(); ?>Plantilla/EditarHorario/<?php echo $horarioact[0]->IdHorario?>" data-toggle="tooltip" title="" data-original-title="Editar">
                        <i class="fa fa-circle-o"></i>
                      </a>
                    <?php } ?>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>

                  </div>
                </div><!-- /.box-header -->       
                <div class="box-body no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>N° Tarjeta <span class="pull-right badge bg-blue"><?php echo $horarioact[0]->NTarjeta; ?></span></a></li>
                    <li><a>Tipo de Registro <span class="pull-right"><?php echo $horarioact[0]->TIPOREGISTRO; ?></span></a></li>
                    <li><a>Turno <span class="pull-right"><?php echo $horarioact[0]->Turno; ?></span></a></li>
                    <li><a>Departamento <span class="pull-right"><?php echo $horarioact[0]->DEPARTAMENTO; ?></span></a></li>
                    <li><a>Servicio<span class="pull-right"><?php if($horarioact[0]->Servicio){ echo $horarioact[0]->Servicio; } else{ echo "No Asignado"; }?></span></a></li>
                    <li><a>Función <span class="pull-right"><?php echo $horarioact[0]->Funcion; ?></span></a></li>
                    <li><a>Horario <span class="pull-right"><?php echo $horarioact[0]->HE.' a '.$horarioact[0]->HS.' de '.$horarioact[0]->DIAS; ?></span></a></li>
                    <li><a>Jefe Inmediato <span class="pull-right"><?php echo $horarioact[0]->JEFE; ?></span></a></li>
                    <li><a>Valido desde <span class="pull-right"><?php echo $horarioact[0]->fi; ?></span></a></li>
                    <?php if ($horarioact[0]->nota!= null) {?>            
                      <li><a>Observaciones <span class="pull-right"><?php echo $horarioact[0]->nota; ?></span></a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('IdPerfil')==1) {?>
                      <li><a>Creado el <span class="pull-right"><?php echo $horarioact[0]->FechaReg;?></span></a></li>
                      <li><a>Ultima Actualización <span class="pull-right"><?php echo $horarioact[0]->Fecha;?></span></a></li>
                      <li><a>Por el Usuario <span data-toggle="tooltip" class="pull-right" data-original-title="<?php echo $horarioact[0]->Nombre.' '.$horarioact[0]->Apellido;?>"><?php echo $horarioact[0]->Usuario;?></span></a></li>              
                    <?php } ?>
                  </ul>
                </div><!-- /.box-body -->               
              </div>
            <?php } else { ?>
              <div class="box box-warning box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Sin Horario</h3>
                  <!-- /.box-tools -->
                  <div class="box-tools pull-right">
                    <a data-toggle="tooltip" data-original-title="Agregar Horario" class="btn btn-box-tool" href="<?php echo base_url();?>Plantilla/nuevohorario/<?php echo $datos_reg[0]->IdPersonal ?>"><i class="fa fa-clock-o"></i></a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  Esta Persona no tiene ningun registro de Horario Activo.
                </div>
                <!-- /.box-body -->
              </div>
            <?php } ?>
          </div>

          <div class="col-md-4">
            <?php if ($lact) {?>
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Situación Laboral Actual</h3>
                  <div class="box-tools pull-right">
                    <?php if($this->session->userdata('IdPerfil')<=3) {?>
                      <a class="btn btn-box-tool" href="<?php echo base_url(); ?>Plantilla/EditarLaboral/<?php echo $lact[0]->IdLaboral?>" data-toggle="tooltip" title="" data-original-title="Editar">
                        <i class="fa fa-circle-o"></i>
                      </a>
                    <?php } ?>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div><!-- /.box-header -->       
                <div class="box-body no-padding">
                  <ul class="nav nav-stacked">
                    <li><a><strong>Codigo</strong> <span class="pull-right badge bg-blue"><?php echo $lact[0]->Codigo; ?></span></a></li>
                    <li><a><strong>Descripción</strong> <span class="pull-right"><?php echo $lact[0]->PUESTO; ?></span></a></li>
                    <li><a><strong>Clave Presupuestal</strong> <span class="pull-right"><?php echo $lact[0]->Clave; ?></span></a></li>
                    <li><a><strong>Tipo de Trabajador</strong> <span class="pull-right"><?php echo $lact[0]->TIPOTRABAJADOR; ?></span></a></li>
                    <li><a><strong>Unidad de Adscripción</strong> <span class="pull-right"><?php echo $lact[0]->NOMBREUNIDAD; ?></span></a></li>     
                    <li><a><strong>Fecha de Ingreso</strong> <span class="pull-right"><?php echo $lact[0]->FInicio; ?></span></a></li>
                    <li><a><strong>Programa</strong> <span class="pull-right"><?php echo $lact[0]->Programa; ?></span></a></li>
                    <li><a><strong>Sindicato</strong> <span class="pull-right"><?php echo $lact[0]->Seccion; ?></span></a></li>
                    <li><a><strong>Subseccion</strong> <span class="pull-right"><?php echo $lact[0]->Subseccion; ?></span></a></li>


                    <?php if ($lact[0]->nota!= null) {?>            
                      <li><a><strong>Observaciones</strong> <span class="pull-right"><?php echo $lact[0]->nota; ?></span></a></li>
                    <?php } ?>
                    <li><a><strong>Estatus</strong> <span class="pull-right"><?php echo $lact[0]->Estatus; ?></span></a></li>
                    <?php if ($this->session->userdata('IdPerfil')==1) {?>
                      <li><a><strong>Creado el</strong> <span class="pull-right"><?php echo $lact[0]->FechaReg;?></span></a></li>
                      <li><a><strong>Ultima Actualización</strong> <span class="pull-right"><?php echo $lact[0]->Fecha;?></span></a></li>
                      <li><a><strong>Por el Usuario</strong> <span data-toggle="tooltip" class="pull-right" data-original-title="<?php echo $lact[0]->Nombre.' '.$lact[0]->Apellido;?>"><?php echo $lact[0]->Usuario;?></span></a></li>              
                    <?php } ?>
                  </ul>
                </div><!-- /.box-body -->               
              </div>
            <?php } else { ?>
              <div class="box box-warning box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Sin Datos Laborales</h3>
                  <!-- /.box-tools -->
                  <div class="box-tools pull-right">
                    <a data-toggle="tooltip" data-original-title="Nuevo Laboral" class="btn btn-box-tool" href="<?php echo base_url();?>Plantilla/nuevolaboral/<?php echo $datos_reg[0]->IdPersonal ?>"><i class="fa fa-file-o"></i></a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  Esta Persona no tiene ningun registro Laboral Activo.
                </div>
                <!-- /.box-body -->
              </div>
            <?php } ?>
          </div>
        </div><!--  fin  row -->

        <div class="row">
          <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>
          <div class="col-xs-12">
            <div class="box box-widget">
              <div class="box-header with-border">          
                <div class="user-block">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Horario</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Laboral</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Formación</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Familiares</a></li>
                  </ul>
                </div><!-- /.user-block -->
                <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="tab_1">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>N° Tarjeta</th>
                          <th>Horario</th>
                          <th>Departamento</th>
                          <th>Servicio</th>
                          <th>Turno</th>
                          <th>Dias Laborales</th>
                          <th>Tipo Registro</th>
                          <th>Apartir de</th>
                          <?php if($this->session->userdata("IdPerfil")<4) { ?>
                          <th>Acciones</th>
                          <?php } ?>
                        </tr>
                        <?php foreach ($horario as $l2) { ?>
                          <tr>
                            <td><span class="label label-<?php if($l2->Estatus == 1){echo 'success';}else{echo 'danger';} ?>"><?php echo $l2->NTarjeta?></span></td>
                            <td><?php $HE=strtotime($l2->HE); $HS=strtotime($l2->HS); echo date("h:i a", $HE)." a ". date("h:i a", $HS)?></td>
                            <td><?php echo $l2->DEPARTAMENTO?></td>
                            <td><?php echo $l2->Servicio?></td>
                            <td><?php echo $l2->Turno?></td>
                            <td><?php echo $l2->DIAS?></td>
                            <td><?php echo $l2->TIPOREGISTRO?></td>
                            <td><?php 
                            $create=strtotime($l2->fi);
                            $l2->fi = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y',$create);
                            echo $l2->fi;
                            ?></td>
                            <td>
                              <div class="btn-group">
                              <?php if($this->session->userdata("IdPerfil")<4) { 
                                if ($l2->Estatus==1) { ?> 
                                  <a href="<?php echo base_url(); ?>Plantilla/EditarHorario/<?php echo $l2->IdHorario?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-edit"></i></a>
                              <?php } else { ?> 
                                  <button type="button" onclick="CargarEliminacion(<?php echo $l2->IdHorario ?>);" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></button>
                              <?php } 
                              }?>
                              </div> 
                            </td>
                          </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>Codigo</th>
                          <th>Descripcion</th>
                          <th>Situacion Laboral</th>
                          <th>Adscripcion</th>
                          <th>Fecha Ingreso</th>
                          <th>Estatus</th>
                          <th>Observaciones</th>
                          <?php if($this->session->userdata("IdPerfil")<4) { ?>
                          <th>Acciones</th>
                          <?php } ?>
                        </tr>
                        <?php foreach ($laboral as $l1){ ?>
                          <tr>
                            <td><span class="label label-<?php if($l1->status==1){echo 'success';}else{echo 'danger';} ?>"><?php echo $l1->Codigo?></span></td>
                            <td><?php echo $l1->PUESTO?></td>
                            <td><?php echo $l1->TIPOTRABAJADOR?></td>
                            <td><?php echo $l1->NOMBREUNIDAD?></td>
                            <td><?php if($l1->FInicio!=null){ echo date("d-M-Y", strtotime($l1->FInicio)); }?></td>
                            <td><?php echo $l1->Estatus?></td>
                            <td><?php echo $l1->nota ?></td>
                            <?php if($this->session->userdata("IdPerfil")<4) { ?>
                            <td><?php if ($l1->status==1) {?>
                              <a href="<?php echo base_url(); ?>Plantilla/EditarLaboral/<?php echo $l1->IdLaboral?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-edit"></i></a>
                              <?php } ?>
                            </td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab_3">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>Grado</th>
                          <th>Carrera</th>              
                          <th>Cedula</th>
                          <th>Instituto</th>  
                          <?php if ($this->session->userdata('IdPerfil')==1) {?>
                          <th>Registro</th>
                          <th>Actualización</th>
                          <th>Usuario</th>
                          <?php } ?>
                          <?php if($this->session->userdata("IdPerfil")<4) { ?>
                          <th>Acciones</th>
                          <?php } ?>
                        </tr>               
                        <?php foreach ($estudios as $l3){ ?>
                          <tr>
                            <td><?php echo $l3->AGRUPACION ?></td>
                            <td><?php echo $l3->Carrera ?></td>                       
                            <td><?php if ($l3->Cedula) { echo $l3->Cedula; } else { echo "---";};  ?></td>  
                            <td><?php echo $l3->INSTITUCION ?></td>
                            <?php if ($this->session->userdata('IdPerfil')==1) {?>
                            <td><?php echo $l3->FechaReg ?></td>
                            <td><?php echo $l3->fact ?></td>
                            <td><?php echo $l3->Usuario ?></td>                       
                            <?php } ?>
                            <?php if($this->session->userdata("IdPerfil")<4) { ?>
                            <td>
                            <?php if ($this->session->userdata("IdPerfil")<=3) {?>
                              <a href="<?php echo base_url(); ?>Plantilla/EditarEstudio/<?php echo $l3->IdRegEstudio?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-edit"></i></a>
                              <?php if ($this->session->userdata('IdPerfil')<=2) {?>
                              <a href="<?php echo base_url(); ?>Plantilla/eliminarEstudio/<?php echo $l3->IdRegEstudio?>/<?php echo $datos_reg[0]->IdPersonal ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o"></i></a>
                              <?php } ?>
                             </td>
                            <?php } } ?>              
                          </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab_4">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Edad</th>
                          <th>Parentesco</th>
                          <th>Observación</th>
                          <?php if ($this->session->userdata('IdPerfil')==1) {?>
                          <th>Registro</th>
                          <th>Actualización</th>
                          <th>Usuario</th>
                          <?php } ?>
                          <?php if($this->session->userdata("IdPerfil")<4) { ?>
                          <th>Acciones</th>
                          <?php } ?>
                        </tr>
                        <?php foreach ($familiar as $l4) { ?>
                          <tr>
                            <td><?php echo $l4->Nombre ?></td>
                            <td><?php echo $l4->Apellidos ?></td>
                            <td><?php $cumpleanos = new DateTime($l4->FechaNac);
                            $hoy = new DateTime();
                            $annos = $hoy->diff($cumpleanos);
                            echo $annos->y.' años'; ?></td>
                            <td><?php echo $l4->Parentesco ?></td>
                            <td><?php echo $l4->Nota ?></td>
                            <?php if ($this->session->userdata('IdPerfil')==1) {?>
                              <td><?php echo $l4->FechaReg ?></td>
                              <td><?php echo $l4->Fecha ?></td>
                              <td><span data-toggle="tooltip" data-original-title="<?php echo $l4->user.' '.$l4->Apellido ?>"><?php echo $l4->Usuario ?></span></td>
                            <?php } ?>
                            <?php if ($this->session->userdata("IdPerfil")<4) {?>
                              <td>
                                <a href="<?php echo base_url(); ?>Plantilla/EditarFamiliar/<?php echo $l4->IdFamiliar?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-edit"></i></a>
                            <?php if ($this->session->userdata("IdPerfil")<=2) {?>
                                <a href="<?php echo base_url(); ?>Plantilla/EliminarFamiliar/<?php echo $l4->IdFamiliar?>/<?php echo $datos_reg[0]->IdPersonal ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Eliminar"><i class="fa fa-trash-o"></i></a>
                            <?php }?>
                              </td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>

                </div>  <!-- /.tab-content -->
              </div><!-- /.box-body -->     
            </div>
          </div>
        </div>

        <div class="modal modal-danger fade" id="modal-danger"> <!--  Inicio  Ventana Modal Baja -->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Baja Personal</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('Plantilla/BajaPersonal/'.$datos_reg[0]->IdPersonal); ?>
                <div class="form-group">
                  <label for="FInicio">Fecha</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" required=”required” class="form-control" name="FInicio" id="FInicio">
                  </div>
                </div>
                <div class="form-group">
                  <label for="IdEstatus">Motivo de Baja</label>
                  <select class="form-control select2" style="width: 100%;" name="IdEstatus" id="IdEstatus" required="">
                    <option selected="selected" value="">--Seleccione motivo--</option>
                    <?php foreach ($estatus as $item): 
                      if($item->IdEstatus == 0 or $item->IdEstatus == 2 or $item->IdEstatus == 5) {?>
                        <option value="<?php echo $item->IdEstatus;?>"><?php echo $item->Estatus?></option>
                      <?php }
                    endforeach;?>
                  </select> 
                </div>
                <div class="form-group">
                  <label for="nota">Observaciones Generales</label>
                  <textarea class="form-control" required="" rows="3" name="nota" id="nota" placeholder="Motivo de Baja"></textarea>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline">Baja</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div> <!--  fin  Ventana Modal -->

        <div class="modal modal-success fade" id="SubirFoto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Fotografia</h4>
              </div>
              <?php echo  form_open_multipart('Plantilla/upload/'.$datos_reg[0]->IdPersonal); ?>
              <div class="modal-body">            
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <input type="file" id="foto" name="foto" accept="image/*" required="" capture="camera">
                      <p class="help-block">Seleccione una imagen para agregarlo a su foto.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline"><i class="fa fa-upload"></i> Guardar Imagen</button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div> <!-- /.modal -->

        <div class="modal modal-primary fade" id="Expediente"> <!--  Inicio  Ventana Modal Baja -->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Asignación de Expediente</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('plantilla/AltaExp/'.$datos_reg[0]->IdPersonal); ?>
                <div class="form-group">
                  <label>Clasificación de Expediente</label>
                  <select class="form-control select2" style="width: 100%;" name="IdExp" id="IdExp" required="">
                  </select>
                </div>
                <div class="form-group">
                  <label>Numero de Expediente</label>
                  <input type="text" class="form-control" name="NumExp" id="NumExp"  required="required"  value="<?php echo set_value('NumExp',@$datos_reg[0]->NumExp); ?>">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline">Guardar</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div> <!--  fin  Ventana Modal -->

        <?php echo form_open('Incidencia/Validar', 'id="autorizar-form" autocomplete="off"');?> 
				<div class="modal modal-info fade" id="autorizar">
					<div class="modal-dialog modal-sm">						
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Se necesita autorización</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="Administrador">Usuario</label>
									<input type="text" class="form-control" placeholder="Ingrese Usuario administrador" id="Administrador" name="Administrador" value="" required>
								</div>
								<div class="form-group">
									<label for="Llave">Contraseña</label>
									<input type="password" class="form-control" id="Llave" name="Llave" placeholder="Ingrese contraseña de Administrador" required>
								</div> 
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-outline">Autorizar</button>
								<!-- <input type="submit" class="btn btn-success" value="Autorizar"> -->
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
        
        <div class="modal modal-danger fade" id="modal-eliminar"> <!--  Inicio  Ventana Modal Baja -->
          <div class="modal-dialog modal-sm">
             <?php echo form_open('Plantilla/EliminarHorario/'.$datos_reg[0]->IdPersonal); ?>
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="titulo-eliminar">Eliminar</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <p id='msg'>¿Está seguro que desea <b>Eliminar</b> este registro?</p>
                  <input type="hidden" class="form-control" required="" name="IdHorario" id="IdHorario">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline" id='BtnEliminar'>Aceptar</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
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

  <script type="text/javascript">  

    function CargarEliminacion(id) { 
      <?php if ($this->session->userdata('IdPerfil')<=2) {?>
        $('#modal-eliminar').modal('show');
      <?php } else {  ?>
        $('#autorizar').modal('show');
      <?php } ?>
      $('#IdHorario').val(id);
    }

     $("#autorizar-form").on("submit", function(e){
    		$('#autorizar').modal('hide');
    		e.preventDefault();
    		$('#autorizar').on('hidden.bs.modal',function(event) {
    			event.preventDefault();
    			/* Act on the event */
    			$.post("<?php echo base_url(); ?>Incidencia/Validar", {
    				usuario : $('#Administrador').val(),
    				pass : $('#Llave').val(),
    				IdPersonal : <?php echo $datos_reg[0]->IdPersonal ?>
          }, function(data) {
            if (data == 1) {
              $('#modal-eliminar').modal('show');
            } else {
              alert(data);
            }
            $('#autorizar-form').trigger('reset');
          });
    		});				
		  });


    $(document).ready(function() {
      $( "#asignar" ).click(function() {
        $('#Expediente').modal('toggle');

        $.post("<?php echo base_url(); ?>Plantilla/Exp", { }, function(data) {
          $("#IdExp").html(data);
        });
      });

      $("#IdExp").change(function() {
        IdExp = $('#IdExp').val();
        $.post("<?php echo base_url(); ?>Plantilla/ContarExp", {IdExp : IdExp}, function(data) {
          $('#NumExp').val(data);
        });

      });

      foto = function(){
        $('#SubirFoto').modal('toggle');
      }
    });
  </script>

</body>
</html>