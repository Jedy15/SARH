<?php
# Insidencias.

class IncidenciaReporte
{
  public function __construct(){}


  public function datosParaReporteDeIncidencias($periodoInicio = 1,$periodoFinal = 12, $incidencias=array())
  {
    $respuesta = new stdclass();
      # incluye el arreglo de datos.
    $respuesta->resultado = array();
      # si contiene elementos existen errores.
    $respuesta->errores    = array();

   # validando Existencia de incidencias
    if(count($incidencias) > 0)
    {
     $mesInicio = $periodoInicio;
     $mesFinal  = $periodoFinal;

         #######################################################################################
         # 2.- Procesar Incidencias.
     $resultado = array();

     try
     {
           # 2.1- Recorriendo incidencias...
       for($i = 0; $i<count($incidencias); $i++)
       {
        $fechaInicio = $incidencias[$i]->start;
        $fechaFin    = $incidencias[$i]->end;
        $fecha       = $fechaInicio;

      # 2.2- obteniendo días del rango de fechas.
        do
        {

         list($ano, $mes, $dia) = explode('-', $fecha);

       //echo $ano.": ".$mes.": ".$dia;
       //exit();
         if(checkdate($mes,$dia,$ano))
         {
           $resultado[$ano][(int)$mes][(int)$dia] = $incidencias[$i]->Sigla;
           $fecha = date('Y-m-d',mktime(0,0,0,$mes,$dia+1,$ano));
         }
         else
         {
           array_push($respuesa->errores,"Fecha Invalida: ".$incidencias[$i]->Sigla);
           break;
         }

       }while ($fecha <= $fechaFin);

          }# Fin del recorrido de insidencias...

          #######################################################################################
           # 3.- CREANDO RESULTADO FINAL.
          $tabla = array();

           # contador años
          $year = 1;
          foreach ($resultado as $key => $value)
          {
             # limitando el numero de meses a mostrar...
           if($year>1)
           {
             $limiteInicial = 1 ;
             $limiteFinal	= $mesFinal;
           }
           else
           {
             $limiteInicial = $mesInicio ;
             $limiteFinal	= 12;
             $year++;
           }

             # Mes
           for($m=$limiteInicial;$m<=$limiteFinal;$m++)
           {
               # Día
             for($d=1;$d<=31;$d++)
             {
                 # asigancion
               if(isset($resultado[$key][$m][$d]))
                 $tabla[$key][$m][$d] = $resultado[$key][$m][$d];
               else
                 $tabla[$key][$m][$d] = "";
             }
           }
         }

           # Liberando Memoría...
         $resultado = "";

           # agregando Datos estructurados a la respuesta...
         $respuesta->resultado = $tabla;
       }
       catch(Exception $e)
       {
           # Liberando Memoría...
         $resultado = "";
         $tabla	= "";
         array_push($resultado->errores,"No se pudieron procesar correctamente las incidencias. Debido al siguiente error: ".$e->getMessage());
       }
     }

      # 4.- Devolviendo arreglo de incidencias.
     return $respuesta;
   }
 }
 ?>
