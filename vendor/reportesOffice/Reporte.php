<?php
# Update: 31 Julio 2019.
// include($_SERVER['DOCUMENT_ROOT']."/SARH/vendor/dompdf/autoload.inc.php");
// include($_SERVER['DOCUMENT_ROOT']."/SARH/vendor/autoload.php");
include($_SERVER['DOCUMENT_ROOT']."/vendor/dompdf/autoload.inc.php");
include($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte
{
  public function _construct(){}

  public static function crearPDF($plantilla = "",$datos=array())
  {
    // Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
    //require("../Framework/plugins/dompdf/dompdf_config.inc.php");

    ///$html =  file_get_contents($_SERVER['DOCUMENT_ROOT'].'\plantilla_oficio.php');
    // Cargamos el contenido HTML.
    //$pdf->load_html(utf8_decode($html));

    # Cargando plantilla del reporte
    try
    {
      ob_start();

    #application\views\Plantilla
      // require($_SERVER['DOCUMENT_ROOT'].'\SARH\application\views\Incidencia\plantilla_oficio.php');
      require($_SERVER['DOCUMENT_ROOT'].'\application\views\Incidencia\plantilla_oficio.php');


      $html = ob_get_contents();
      ob_end_clean();


    // Instanciamos un objeto de la clase DOMPDF.
      $pdf = new DOMPDF();

    // Definimos el tamaño y orientación del papel que queremos.
    $pdf->set_paper("A4", "landscape"); //portrait
    $pdf->load_html(($html));

    // Renderizamos el documento PDF.
    $pdf->render();

    // Enviamos el fichero PDF al navegador.
    $pdf->stream('Reporte.pdf');      
  }
  catch(Exception $e)
  {
    print_r($e);
  }
}

public static function crearExcel($datos = array())
{
 $nombreMeses =array();
 $nombreMeses[1] = "ENERO";
 $nombreMeses[2] = "FEBRERO";
 $nombreMeses[3] = "MARZO";
 $nombreMeses[4] = "ABRIL";
 $nombreMeses[5] = "MAYO";
 $nombreMeses[6] = "JUNIO";
 $nombreMeses[7] = "JULIO";
 $nombreMeses[8] = "AGOSTO";
 $nombreMeses[9] = "SEPTIEMBRE";
 $nombreMeses[10] = "OCTUBRE";
 $nombreMeses[11] = "NOVIEMBRE";
 $nombreMeses[12] = "DICIEMBRE";

 try
 {
  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();

        # Establecer celda inicial...
  $filaInicial = 3;

        # Agregando fila de días
  for($column=1;$column<32;$column++)
  {
   $sheet->setCellValueByColumnAndRow($column+2,$filaInicial,$column);
   $spreadsheet->getActiveSheet()->getColumnDimensionByColumn($column+2)->setAutoSize(true);
 }

      # Estilo del Formato de columna de años.
 $styleArray =
 [
  'font' =>
  [
    'bold' => true
  ],
  'alignment' => [
   'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
   'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
   'textRotation' => 90,
   'wrapText' => TRUE
 ]
];

        # autosize columna de año...
$spreadsheet->getActiveSheet()->getColumnDimensionByColumn(2)->setAutoSize(true);

        # Recorriendo datos...
        foreach($datos as $key => $value) # Año
        {
         $fila    = $filaInicial+1;
         $columna = 2;

           # Formato y creacion Etiqueta de año
         $sheet->getStyle("A".$fila)->applyFromArray($styleArray);
         $merge = "A".$fila.":"."A".($fila+(count($value))-1);
         $sheet->setCellValueByColumnAndRow(1,$fila,$key);
         $sheet->mergeCells($merge);

           foreach($value as $key2 => $value2) # Mes
           {
             # insertando nombre de meses.
             $sheet->setCellValueByColumnAndRow($columna,$fila ,$nombreMeses[$key2]);

             # Recorriendo días...
             foreach($value2 as $key3 => $value3) # Días
             $sheet->setCellValueByColumnAndRow($key3+2,$fila,$value3);

             $fila++;
           }
           $filaInicial += count($value);
         }

         $writer = new Xlsx($spreadsheet);
         $nombreArchivo = "reporte".date("Y-m-d").".xlsx";
         $writer->save($nombreArchivo);
         //echo "<meta http-equiv='refresh' content='0;".$nombreArchivo."'/>";
        //$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        //$writer->save("05featuredemo.xlsx");
       }
       catch (\Exception $e)
       {
        print_r($e);
      }
    }
  }
  ?>
