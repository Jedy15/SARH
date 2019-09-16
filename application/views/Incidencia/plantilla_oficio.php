<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <style>
  table {
    border-collapse: collapse;
    /*border: 1px;*/
    border-color: #CCC;
    border-width: medium;
    border-style: solid;
    width: 100%;
  }

  th, td {
    text-align: left;
    padding: 4px;
    border-width: medium;
    border-style: solid;
    border-color: #CCC;
  }

  tr:nth-child(even) {background-color: #f2f2f2;}
  </style>

</head>
<body onload="window.print();">
  <section class="invoice">
    <div class="row">
      <div class="col-xs-3">
        <img class="rounded float-left" src="<?php echo base_url();?>images/SSA.jpg" alt="">
      </div>
      <div class="col-xs-6">
        <h3 class="text-center">Control de Incidencias <br>
        Hospital de la Mujer <br>
        San Cristóbal de las Casas, Chiapas</h3>
      </div>
      <div class="col-xs-3"><img class="pull-right" src="<?php echo base_url();?>images/logo_salud_chiapas.jpg" alt=""></div>
    </div>
    <div class="row">
      <div class="col-xs-6">
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Nombre:</b> <?php echo $personal[0]->SUFIJO.' '.$personal[0]->NOMBRES.' '.$personal[0]->APELLIDOS;?>
          </li>
          <li class="list-group-item">
            <b>R.F.C.:</b> <?php echo $personal[0]->RFC;?>
          </li>
          <li class="list-group-item">
            <b>Clave:</b> <?php echo $personal[0]->Codigo;?>
          </li>
        </ul>
      </div>
      <div class="col-xs-6">
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Fecha de Ingreso:</b> <?php echo $personal[0]->FInicio;?>
          </li>
          <li class="list-group-item">
            <b>Curp:</b> <?php echo $personal[0]->CURP;?>
          </li>
          <li class="list-group-item">
            <b>Numero de Tarjeta:</b> <?php echo $personal[0]->NTarjeta;?>
          </li>
        </ul>
      </div>
    </div>
	</section>


<div style="overflow-x:auto;">  
  <table>
      <?php
      $nombreMeses =array();
      $nombreMeses[1] = "ENE";
      $nombreMeses[2] = "FEB";
      $nombreMeses[3] = "MAR";
      $nombreMeses[4] = "ABR";
      $nombreMeses[5] = "MAY";
      $nombreMeses[6] = "JUN";
      $nombreMeses[7] = "JUL";
      $nombreMeses[8] = "AGO";
      $nombreMeses[9] = "SEP";
      $nombreMeses[10] = "OCT";
      $nombreMeses[11] = "NOV";
      $nombreMeses[12] = "DIC";

      foreach($datos as $key => $value)
      {
       ?>
         <tr>
            <td colspan="32"><center><h3><?php echo $key;?></h3></center></td>
         </tr>
         <tr>
           <th></th>
           <?php
           for($i=1;$i<32;$i++)
           {
           ?>
             <th><?php echo $i;?></th>
           <?php
           }
           ?>
         </tr>
       <?php
          foreach($value as $key2 => $value2)
          {
             ?>
             <tr>
                <td><?php echo $nombreMeses[$key2];?></td>
                <?php
               foreach($value2 as $key3 => $value3)
               {
                  ?>
                  <td><?php echo $value3;?></td>
                  <?php
               }
                ?>
            </tr>
             <?php
          }
      }
      ?>
  </table>
</div>

</body>
</html>
