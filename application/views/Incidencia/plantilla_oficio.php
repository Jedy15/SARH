<!DOCTYPE html>
<html>
<head>
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
<body>
  <?php
  #mime_content_type("jpg")
  $imagen ="image/png";
  $base64 = base64_encode($imagen);
  $src = 'data: image/jpg;base64,'.$base64;
  ?>
  <img src="logo.png"/>
<?php //echo base64_encode("https://catrachosexitosos.files.wordpress.com/2011/04/400.jpeg");?>
<h2>Incidencias...</h2>

<div style="overflow-x:auto;">
  <div>
    Nombre:
  </div>
  
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
