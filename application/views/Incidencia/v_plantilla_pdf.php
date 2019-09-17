<!DOCTYPE html>
<html lang="es">
<head>
<style>
  table {
    border-collapse: collapse;
    border: 1px;
    border-color: #CCC;
    border-width: medium;
    border-style: solid;
    width: 95%;
  }

  .tablaSiglas th, td {
    border: 0px;
    font-size : 13px;
    border-style: none;
    width: 95%;
  }

  th, td {
    text-align: left;
    padding: 4px;
    border-width: medium;
    border-style: solid;
    border-color: #CCC;
  }
  .encabezado
  {
    background-color: white;
    list-style-type: none;
    text-align: center;
    margin: 0;
    padding: 0;
  }

  .column {
    float: left;
    width: 33.33%;
    margin:2px;
  }

  .row:after {
    content: "";
    display: table;
    clear: both;
    margin: 8px;
  }

  .right {
    float: right;
    width: 300px;
    padding: 10px;
    font-size : 16px;
  }

  .clear
  {
    clear: both;
  }
  tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>

<body>

  <!-- ENCABEZADO.. -->
  <center>
  <div class="row">
    <div class="column">
      <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents("l1.jpg")) ?>" width="50%">
    </div>

    <div class="column">
      <h3>CONTROL DE ASISTENCIA</h3>
      <p>HOSPITAL DE LA MUJER, SAN CRISTOBAL DE LAS CASAS, CHIAPAS</p>
    </div>

    <div class="column">
      <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents("l3.jpg")) ?>" width="40%">
      </div>
  </div>
  </center>

  <!-- # FOLIO -->
  <div class="right">
    <span><b>FOLIO:&nbsp;</b></span>
  </div>

  <div class="clear"></div>
    <div class="row">
   <div class="column">
     <span><b>NOMBRE:&nbsp;</b></span><span><?php echo $usuario[0]->NOMBRES; ?></span>
    </div>
    <div class="column">
     <span><b>R.F.C:&nbsp;</b></span><span><?php echo $usuario[0]->RFC; ?></span>
    </div>
  </div>

  <div class="row">
   <div class="column">
     <span><b>CLAVE:&nbsp;</b></span><span><?php echo $usuario[0]->Codigo; ?></span>
    </div>
    <div class="column">
     <span><b>CURP:&nbsp;</b></span><span><?php echo $usuario[0]->CURP; ?></span>
    </div>

    <div class="column">
     <span><b>FECHA DE INGRESO:&nbsp;</b></span><span><?php echo $usuario[0]->FInicio; ?></span>
    </div>
  </div>

  <div class="clear"></div><br/><br/><br/>

<table class="tablaSiglas">
  <?php
   $siguenteFila = 0;

   $openRow ="<tr>";
   $closeRow ="</tr>";
   $openCold ="<td>";
   $closeCold ="</td>";

   /*
   if((count($listaSiglas) % 3) == 0)
   {
      $arregloVacio = array();
      $arregloVacio[""] = "";
      array_push($listaSiglas,)
   }*/

  // foreach($listaSiglas as $siglas=>$valor)
  // {
  //   
  //   <?php
  //     if($siguenteFila == 0 )
  //       echo $openRow;

  //     echo $openCold;
  //     echo $siglas;
  //     echo $closeCold;

  //     echo $openCold;
  //     echo $valor;
  //     echo $closeCold;

  //     if($siguenteFila == 2)
  //     {
  //       echo $closeRow;
  //       $siguenteFila = 0;
  //     }
  //     else
  //       $siguenteFila++;
  // }
  ?>
</table>
  <div class="clear"></div>
  <br/><br/><br/><br/><br/><br/>
  <br/>
<div>
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
      ?>
  <table>
      <tr>
        <td></td>
        <td></td>
        <?php
        for($i=1;$i<32;$i++)
        {
        ?>
          <td><?php echo $i;?></td>
        <?php
        }
        ?>
      </tr>

      <?php
      $temp ="";
      foreach($datos as $key => $value)
      {
          foreach($value as $key2 => $value2)
          {
             ?>
             <tr>
              <?php
                if($temp != $key)
                {
                  ?>
                  <td rowspan="<?php echo count($datos[$key]);?>">
                    <center><b><?php echo $key;?></b></center>
                  </td>
                  <?php
                }
              ?>
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
             $temp = $key;
          }
      }
      ?>
  </table>
</div>

</body>
</html>