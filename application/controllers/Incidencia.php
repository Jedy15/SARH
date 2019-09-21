<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class Incidencia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('M_incidencia', 'M_plantilla', 'M_login'));		
		$this->load->library('pdf');		
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		} else if ($this->session->userdata("IdPerfil")>3) {
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
	}

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

	public function GenerarCardexExcel($datos = array(),$empleado = array(),$listaSiglas = array())
	{
		$mesesDelAnio =array();
		$mesesDelAnio[1] = "ENERO";
		$mesesDelAnio[2] = "FEBRERO";
		$mesesDelAnio[3] = "MARZO";
		$mesesDelAnio[4] = "ABRIL";
		$mesesDelAnio[5] = "MAYO";
		$mesesDelAnio[6] = "JUNIO";
		$mesesDelAnio[7] = "JULIO";
		$mesesDelAnio[8] = "AGOSTO";
		$mesesDelAnio[9] = "SEPTIEMBRE";
		$mesesDelAnio[10] = "OCTUBRE";
		$mesesDelAnio[11] = "NOVIEMBRE";
		$mesesDelAnio[12] = "DICIEMBRE";

		try
		{
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();

			# Configuracion de imprecion
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
			$sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
			# Margenes
			$sheet->getPageMargins()->setTop(1);
			$sheet->getPageMargins()->setRight(0.75);
			$sheet->getPageMargins()->setLeft(0.75);
			$sheet->getPageMargins()->setBottom(1);

			$spreadsheet->getActiveSheet()->setShowGridlines(false);

			# Estilos de celdas
			$styleArray2 = [
				'borders' =>
				[
					'allBorders' =>
					[
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => ['argb' => '333333'],
					]
				]
			];

			$tituloStyle = [
				'font' =>
				[
					'bold' => true
				],
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
					'wrapText' => TRUE
				]
			];

			# Estilo del Formato de columna de años.
			$styleArray =
			[
				'font' =>
				[
					'bold' => true,
					'size' => 16,
				],
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
					'textRotation' => 90,
					'wrapText' => TRUE
				],
				'borders' =>
				[
					'allBorders' =>
					[
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => ['argb' => '333333'],
					]
				]
			];

			# Agregando Imagenes al documento.
			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing->setName('Logo');
			$drawing->setDescription('A1');
			$urlImg = $_SERVER['DOCUMENT_ROOT']."/sarh/images/SSA.jpg";
			$drawing->setPath($urlImg);
			$drawing->setCoordinates('A1');
			$drawing->setHeight(70);
			$drawing->setWorksheet($sheet);

			$drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing2->setName('Logo2');
			$drawing2->setDescription('L1');
			$urlImg = $_SERVER['DOCUMENT_ROOT']."/sarh/images/logo_salud_chiapas.png";
			$drawing2->setPath($urlImg);
			$drawing2->setCoordinates('AB1');
			$drawing2->setHeight(70);
			$drawing2->setWorksheet($sheet);

			# Titulo
			$sheet->setCellValueByColumnAndRow(8,1 ,"CONTROL DE ASISTENCIA");
			$sheet->getStyle("H1")->applyFromArray($tituloStyle);
			$sheet->mergeCells("H1:Z1");

			# Subtitulo
			$sheet->setCellValueByColumnAndRow(8,2 ,"HOSPITAL DE LA MUJER, SAN CRISTOBAL DE LAS CASAS, CHIAPAS");
			$sheet->getStyle("H2")->applyFromArray($tituloStyle);
			$sheet->mergeCells("H2:Z2");

			# FOLIO
			$sheet->setCellValueByColumnAndRow(8,4 ,"TARJETA");
			$sheet->getStyle("H4")->applyFromArray($tituloStyle);
			$sheet->mergeCells("H4:K4");
			$sheet->setCellValueByColumnAndRow(12,4 , $empleado[0]->NTarjeta);
			$sheet->mergeCells("L4:T4");

			# DATOS DEL USUARIO
			$sheet->setCellValueByColumnAndRow(2,5 ,"NOMBRE:");
			$sheet->getStyle("B5")->applyFromArray($tituloStyle);
			$sheet->setCellValueByColumnAndRow(3,5 ,$empleado[0]->SUFIJO.' '.$empleado[0]->NOMBRES.' '.$empleado[0]->APELLIDOS);
			$sheet->mergeCells("C5:L5");

			# DATOS DEL USUARIO
			$sheet->setCellValueByColumnAndRow(2,6 ,"CLAVE:");
			$sheet->getStyle("B6")->applyFromArray($tituloStyle);
			$sheet->setCellValueByColumnAndRow(3,6 ,$empleado[0]->Codigo);
			$sheet->mergeCells("C6:L6");

			# DATOS DEL USUARIO
			$sheet->setCellValueByColumnAndRow(2,7 ,"R.F.C:");
			$sheet->getStyle("B7")->applyFromArray($tituloStyle);
			$sheet->setCellValueByColumnAndRow(3,7 ,$empleado[0]->RFC);
			$sheet->mergeCells("C7:L7");

			# DATOS DEL USUARIO
			$sheet->setCellValueByColumnAndRow(14,5 ,"CURP:");
			$sheet->getStyle("N5")->applyFromArray($tituloStyle);
			$sheet->setCellValueByColumnAndRow(17,5 ,$empleado[0]->CURP);
			$sheet->mergeCells("N5:P5");
			$sheet->mergeCells("Q5:W5");

			# DATOS DEL USUARIO
			$sheet->setCellValueByColumnAndRow(14,6 ,"FECHA INGRESO:");
			$sheet->getStyle("N6")->applyFromArray($tituloStyle);
			$sheet->setCellValueByColumnAndRow(19,6 ,$empleado[0]->FInicio);
			$sheet->mergeCells("N6:R6");
			$sheet->mergeCells("S6:W6");

			$siguenteFila = 0;
			$indC = 2;

			$posicionListaSiglas = 10;
			$indF = $posicionListaSiglas;

			foreach($listaSiglas as $item)
			{
				$sheet->setCellValueByColumnAndRow($indC,$indF ,$item->Sigla." : ".$item->TipoIncidencia);
				$letraX =  Coordinate::stringFromColumnIndex($indC);
				$letraY =  Coordinate::stringFromColumnIndex($indC+9);
				$sheet->mergeCells($letraX.$indF.":".$letraY.$indF);

				if($siguenteFila < 2)
				{
					$indC+=11;
					$siguenteFila++;
				}
				else
				{
					$indF++;
					$indC = 2;
					$siguenteFila = 0;
				}
			}

			$totalSiglas = round((count($listaSiglas)/3)+3);

			# Establecer celdas para la tabla de datos.
			$filaInicial     = $totalSiglas+$posicionListaSiglas;
			$filaFinal = 0;
			$columnaInicial  = 3;
			$columnaFinal = 0;

			$columnaIndice = $columnaInicial;

			# Agregando encabezado de días
			for($column=1;$column<32;$column++)
			{
				$sheet->setCellValueByColumnAndRow($columnaIndice,$filaInicial,$column);
				$spreadsheet->getActiveSheet()->getColumnDimensionByColumn($columnaIndice)->setAutoSize(true);
				$columnaIndice++;
			}

			# agregando formato a celdas de la tabla de datos
			$letra =  Coordinate::stringFromColumnIndex($columnaInicial-2);
			$letra2 =  Coordinate::stringFromColumnIndex($columnaIndice-1);
			$sheet->getStyle($letra.$filaInicial.":".($letra2).$filaInicial)->applyFromArray($styleArray2);

			# autosize columna de año y meses
			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);       # Años
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); # Meses

			# Recorriendo datos...
			$filaActual = $filaInicial;
			foreach($datos as $key => $value) # Año
			{
				$fila    = $filaActual+1;
				$columna = 2;

				#Agregando estilo a la celda de año
				$sheet->getStyle("A".$fila)->applyFromArray($styleArray);
				# Formato  Etiqueta de año
				$merge = "A".$fila.":"."A".($fila+(count($value))-1);
				$sheet->setCellValueByColumnAndRow(1,$fila,$key);
				$sheet->mergeCells($merge);

				foreach($value as $key2 => $value2) # Mes
				{
					# insertando nombre de meses.
					$sheet->setCellValueByColumnAndRow($columna,$fila ,$mesesDelAnio[$key2]);

					# Recorriendo días...
					foreach($value2 as $key3 => $value3) # Días
					{
						$sheet->setCellValueByColumnAndRow($key3+2,$fila,$value3);
						$columnaFinal = $key3+2;
					}

					$fila++;
				}
			$filaActual += count($value);
			$filaFinal = $filaActual;
			}

				# agregando formato a celdas de la tabla de datos
			$resLetra =  Coordinate::stringFromColumnIndex($columnaInicial-2);
			$resLetra2 =  Coordinate::stringFromColumnIndex($columnaFinal);
			$sheet->getStyle($resLetra.$filaInicial.":".$resLetra2.$filaFinal)->applyFromArray($styleArray2);

				# Generar Archivo.
			$writer = new Xlsx($spreadsheet);
			$nombreArchivo = "Cardex-".$empleado[0]->NTarjeta.' '.date("Y-m-d h-i-s");

				# Cabecera para el nuevo archivo Excel Xlsx
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $nombreArchivo .'.xlsx"');
			header('Cache-Control: max-age=0');

			$writer->save('php://output');
		}
		catch (\Exception $e)
		{
			// print_r($e);
		}
	}

	public function PdfCardex()
	{
		$post = $this->input->post();
		$IdPersonal = $post['IdPersonal'];
		$year = $post['YearCardex'];
		$inicio = 10;
		$fin = 10;
		$datos['usuario']=$this->M_incidencia->DatosPersonalesCardex($IdPersonal);
		$datos['listaSiglas']=$this->M_incidencia->TipoIncidencia();	
		$tipo = $datos['usuario'][0]->Tipo;
		if ($tipo==2) {	
			$inicio = 1;
			$fin = 12;
		}
		$query = $this->M_incidencia->DatosCardex($year, $tipo, $IdPersonal);
		$data=$this->datosParaReporteDeIncidencias($inicio,$fin,$query);
		$datos['datos']=$data->resultado;
		$this->load->view('Incidencia/v_plantilla_pdf', $datos);

		// Get output html
		$nombreArchivo = "Cardex-".$datos['usuario'][0]->NTarjeta.' '.date("Y-m-d h-i-s");

        $html = $this->output->get_output(); 
		$this->pdf->setPaper('letter', 'landscape');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		$this->pdf->stream($nombreArchivo);
	}

	function ImprimirCardex(){
		$post = $this->input->post();
		$IdPersonal = $post['IdPersonal'];
		$year = $post['YearCardex'];
		$inicio = 10;
		$fin = 10;
		$datos['personal']=$this->M_incidencia->DatosPersonalesCardex($IdPersonal);
		$datos['listaSiglas']=$this->M_incidencia->TipoIncidencia();	
		$tipo = $datos['personal'][0]->Tipo;
		if ($tipo==2) {	
			$inicio = 1;
			$fin = 12;
		}
		$query = $this->M_incidencia->DatosCardex($year, $tipo, $IdPersonal);
		$data=$this->datosParaReporteDeIncidencias($inicio,$fin,$query);
		$datos['datos']=$data->resultado;
		// print_r($data->resultado);
		$this->load->view('Incidencia/plantilla_oficio', $datos);
	}

	function ExcelCardex(){
		$post = $this->input->post();
		$IdPersonal = $post['IdPersonal'];
		$year = $post['YearCardex'];
		$inicio = 10;
		$fin = 10;
		$datos['usuario']=$this->M_incidencia->DatosPersonalesCardex($IdPersonal);
		$datos['listaSiglas']=$this->M_incidencia->TipoIncidencia();	
		$tipo = $datos['usuario'][0]->Tipo;
		if ($tipo==2) {	
			$inicio = 1;
			$fin = 12;
		}
		$query = $this->M_incidencia->DatosCardex($year, $tipo, $IdPersonal);
		$data=$this->datosParaReporteDeIncidencias($inicio,$fin,$query);
		$datos['datos']=$data->resultado;
		$this->GenerarCardexExcel($datos['datos'], $datos['usuario'], $datos['listaSiglas']);
		
	}

	//TIPOS DE INCIDENCIA	
	function EditarTipoIncidencia(){
		if (empty($this->input->post())) {
			$this->session->set_flashdata("error","Error");
			redirect('Incidencia/TipoIncidencia/');
		}
		$datos = $this->input->post();
		$datos['TipoIncidencia'] = $datos['TipoIncidencia2'];
		$datos['Sigla'] = $datos['Sigla2'];
		unset($datos['TipoIncidencia2']);
		unset($datos['Sigla2']);
		$status = $this->M_incidencia->UpdateTipoIncidencia($datos);
		if ($status) {
			$this->session->set_flashdata("Aviso","Registro Completo");
		} else {
			$this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
		}
		redirect('Incidencia/TipoIncidencia');
	}
	
	function NuevoTipoIncidencia(){
		if (empty($this->input->post())) {
			$this->session->set_flashdata("error","Error");
			redirect('Incidencia/TipoIncidencia/');
		}
		$datos = $this->input->post();
		$status = $this->M_incidencia->InsertarTipoIncidencia($datos);
		if ($status) {
			$this->session->set_flashdata("Aviso","Registro Completo");
		} else {
			$this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
		}
		redirect('Incidencia/TipoIncidencia');
	}

	function TipoIncidencia(){
		$this->load->view('Incidencia/v_tipo_incidencia');
	}

	function CargarTipoIncidencia(){
		$data['data'] = $this->M_incidencia->TipoIncidencia();
		echo json_encode($data);
	}

	function ListaTipoIncidencia(){
		$datos = $this->M_incidencia->ListarTipoIncidencia();
		echo json_encode($datos);
	}

	function YearCardex($IdPersonal){
		$data['results'] = $this->M_incidencia->YearCardex($IdPersonal);
		echo json_encode($data);
	}

	function VerificarFecha(){
		$datos = $this->input->post();
		// print_r($datos);
		$IdPersonal = $datos['IdPersonal'];
		$fecha = $datos['Fecha'];

		$resultado = $this->M_incidencia->ValidarFecha($fecha, $IdPersonal);
		print_r($resultado);
	}

	function index(){		
		$data['incidencias'] = $this->M_incidencia->mostrar();
		$this->load->view('Incidencia/v_lista_incidencia', $data);
	}

	function CargarTodasIncidencias(){
		$data['data'] = $this->M_incidencia->mostrar();
		echo json_encode($data);
	}

	function CargarListaIncidencias(){
		$datos = $this->M_incidencia->IncidenciasActivas();
		echo json_encode($datos);
	}

	function LicenciaMedica(){
		if ($this->input->post()) {
			$data = $this->input->post();
			$Total['mes'] = $this->M_incidencia->ContarLicenciaMedicaMes($data['IdPersonal'], $data['Mes']);
			$Total['year'] = $this->M_incidencia->LicenciaMedicaAnual($data['IdPersonal'], $data['Year']);
			echo json_encode($Total);
		} else {
			$this->session->set_flashdata('error', 'Error');
			redirect('Plantilla','refresh');			
		}
	}

	function Reposicion(){
		$id = $this->input->post('IdPersonal');
		$Laboral = $this->M_plantilla->laboral_actual($id);
		// $ciclo = 0;
		if ($Laboral[0]->{'IdTipoTrabajador'}==2) {
			$ciclo = 2;
		} else {
			$ciclo = 1;
		}
		$tipo = $this->input->post('tipo');
		$data['total'] = $this->M_incidencia->ContarIncidencia($ciclo, $id, $tipo);
		$data['mes'] = $this->M_incidencia->IncidenciaMesActual($id, $tipo);
		echo json_encode($data);
	}

	function Economico(){
		$id = $this->input->post('IdPersonal');
		$Laboral = $this->M_plantilla->laboral_actual($id);
		if ($Laboral[0]->{'IdTipoTrabajador'}<>2) {
			$ciclo = 1;
		} else {
			$ciclo = 2;
		}
		$data['total']= $this->M_incidencia->ContarPermisoEconomico($ciclo, $id);
		$data['mesActual'] = $this->M_incidencia->EconomicoMesActual($id);
		echo json_encode($data);
	}

	function ContarHrs($id){
		$data = $this->M_incidencia->ContarPaseSalida($id);
		echo json_encode($data);
	}

	function CargarIncidencias(){
		$id = $this->input->post('ID');		
		$data['evento'] = $this->M_incidencia->inc_persona($id);
		// $data['evento']->{''}
		echo json_encode($data['evento']);
	}

	function RegistroPase($IdPersonal = null){
		if (!$IdPersonal){ //si el ID es nulo
			$this->session->set_flashdata("error","Falta Información");
			redirect('Plantilla');
		// redirect('error');	//manda ala pagina de error
		} else {			
			$data['Persona'] = $this->M_plantilla->datospersonales($IdPersonal);	
			//Datos de la Persona
			// $data['evento'] = $this->M_incidencia->inc_persona($IdPersonal);
			// $data['dias'] = $this->M_incidencia->Inc_Disponible();
			$this->load->view('Incidencia/v_reg_pase', $data);
		}
	}

	function Eliminar($IdPersonal=NULL){
		if(!$IdPersonal){
			$this->session->set_flashdata("error","Falta Información");
			redirect('Plantilla');	
		}
		if (empty($this->input->post())) {
			$this->session->set_flashdata("error","Error");
			redirect('Incidencia/Control/'.$IdPersonal);
		} else {
			$datos = $this->input->post();
			$eliminado = $this->M_incidencia->SelectT_regincidencia($datos['Id2']);		
			$resultado = $this->M_incidencia->borrar($datos['Id2']);
			if($resultado){
				$datos['nota'] = 'Registro eliminado: Id: '.$eliminado[0]->{'Id'}.' Id_Inc: '.$eliminado[0]->{'Id_Inc'}.' start: '.$eliminado[0]->{'start'}.' end: '.$eliminado[0]->{'end'}.' IdPersonal: '.$eliminado[0]->{'IdPersonal'}.' IdUsuario: '.$eliminado[0]->{'IdUsuario'}.' Folio: '.$eliminado[0]->{'Folio'}.' nota: '.$eliminado[0]->{'nota'}.' FReg: '.$eliminado[0]->{'FReg'};
				unset($datos['Id2']);
				$datos['IdUsuario']= $this->session->userdata("id");
				$this->M_incidencia->Insertar_Oraculo($datos);
				$this->session->set_flashdata("Aviso","Incidencia Eliminada");
				redirect('Incidencia/Control/'.$IdPersonal);
			} else {
				$this->session->set_flashdata("Error","Ocurrio un error al eliminar, Intente Nuevamente");
				redirect('Incidencia/Control/'.$IdPersonal);
			}
		}
	}

	function Validar(){
		if (empty($this->input->post())) {
			$this->session->set_flashdata("error","Error");
			redirect('Plantilla');
		} else {
			$datos = $this->input->post();
			$res = $this->M_login->name($datos['usuario']);
			if($res<>False){
				if($res[0]->{'activo'}==1 and $res[0]->{'IdPerfil'}<=2 ){
					$msg = $res[0]->{'Pass'};
					$password = password_verify($datos['pass'], $msg);
					if($password == 1){
						echo $password;
					} else {
						echo "El Usuario y/o contraseña son incorrectos";
					}
				} else {
					echo "ACCESO DENEGADO <br> Contacte al administrador del sistema";
				}
			} else {
				echo "El Usuario y/o contraseña son incorrectos";
			}
		}
	}

	function Autorizar(){
		if (empty($this->input->post())) {
			$this->session->set_flashdata("error","Error");
			redirect('Plantilla');
		} else {
			$username = $this->input->post('usuario');
			$password = $this->input->post('pass');
			$res = $this->m_login->name($username);
			if($res<>False){
				if($res[0]->{'activo'}==1 and $res[0]->{'IdPerfil'}<=2 ){
					$msg = $res[0]->{'Pass'};
					$password = password_verify($password, $msg);
					if($password == 1){
						echo $password;
					} else {
						echo "El Usuario y/o contraseña son incorrectos";
					}
				} else {
					echo "ACCESO DENEGADO <br> Contacte al administrador del sistema";
				}
			} else {
				echo "El Usuario y/o contraseña son incorrectos";
			}
		}	
	}

	function EditarEvento($IdPersonal){
		$datos = $this->input->post();
		$datos['IdUsuario']= $this->session->userdata("id");
		if ($datos['end']) {
			$datos['end'] = strtotime('+1 day', strtotime($datos['end']));
		} else {
			$datos['end'] = strtotime('+1 day', strtotime($datos['start']));
		}
		$datos['end'] = date ( 'Y-m-j' , $datos['end']);
		$datos['nota'] = 'EDITADO: '.date("Y-m-d").' '.$datos['nota'];	
		$data = $this->M_incidencia->Editar_Evento($datos);
		if ($data == 1) {
			$this->session->set_flashdata("Aviso","Actualización Exitosa");
		} else {
			$this->session->set_flashdata('error', 'Error');
		}
		
		// $this->session->set_flashdata("Aviso","Actualización Exitosa");
		redirect('Incidencia/Control/'.$IdPersonal);
		// print_r($datos);
	}

	function Control($IdPersonal=NULL){
		if(!$IdPersonal){
			$this->session->set_flashdata("error","Datos Incorrectos");
			redirect('Plantilla');	
		}
		if (is_numeric($IdPersonal)) {
			$data['Persona'] = $this->M_plantilla->datospersonales($IdPersonal);
			$this->load->view('Incidencia/v_control_incidencia', $data);
		} else {
			$this->session->set_flashdata("error","Datos Incorrectos");
			redirect('Plantilla');	
		}
	}

	function CargarIncidenciasPersonal($IdPersonal){
		// $id = $this->input->post('id');
		// $data = $this->M_plantilla->UnidadesJuris($id);
		$datos['data'] = $this->M_incidencia->movimientos($IdPersonal);
		echo json_encode($datos);
	}

	function Captura(){
		// $datos = $this->input->post('eventos');
		$datos['IdUsuario']= $this->session->userdata("id");
		$Folio = $this->M_incidencia->folio($datos);
		echo $Folio;
		// print_r($datos);
	}

	function Comparar($IdPersonal){
		$id = $this->input->post('Id');
		$data = $this->M_incidencia->Inc_Utilizada($IdPersonal, $id);
		echo $data;
	}
	#verificar funcion
	function Agregar($IdPersonal){
		$datos['IdUsuario']= $this->session->userdata("id");
		$datos['Id_Inc'] = $this->input->post('id');
		$datos['start'] = $this->input->post('start');
		$datos['end'] = $this->input->post('end');
		$datos['IdPersonal'] = $IdPersonal;
		$datos['Folio'] = $this->input->post('Folio');
		$datos['nota'] = $this->input->post('nota');
		// $this->load->view('view_login');
		$this->M_incidencia->insertar_evento($datos);
		// redirect('Incidencia/Registro/'.$IdPersonal);
		// $datos['end'] = 1+$datos['end'];
		print_r($datos);
		// echo $r;
	}

	function Activar(){
		if ($this->input->post()) {
			$datos = $this->input->post();
			$datos['Id'] = $datos['Id3'];
			$datos['Activo'] = 1;
			$datos['IdUsuario']= $this->session->userdata("id");
			unset($datos['Id3']);
			$this->M_incidencia->update($datos);
		}
		redirect('Incidencia');
	}

	function Baja(){
		if ($this->input->post()) {
			$datos = $this->input->post();
			$datos['Activo'] = 0;
			$datos['IdUsuario']= $this->session->userdata("id");
			$this->M_incidencia->update($datos);
		}
		redirect('Incidencia');
	}

	function Editar(){
		if ($this->input->post()) {
			$datos2 = $this->input->post();
			$datos['Id'] = $datos2['Id2'];
			$datos['Nombre'] = $datos2['Nombre2'];
			$datos['IdSigla'] = $datos2['IdSigla2'];
			$datos['Color'] = $datos2['Color2'];
			if(!$datos['Color']){
				$datos['Color'] = 'rgb(60, 141, 188)';
			}
			$datos['Nota'] = $datos2['Nota2'].' EDITADO: '.date("Y-m-d g:i A");
			$datos['FI'] = $datos2['FI2'];
			$datos['FF'] = $datos2['FF2'];
			$datos['IdUsuario']= $this->session->userdata("id");
			$estado = $this->M_incidencia->update($datos);
			if ($estado) {
				$this->session->set_flashdata("Aviso","Actualización Exitosa");
			} else {
				$this->session->set_flashdata("error","Error en Actualización");
			}
		}
		redirect('Incidencia');
	}

	function Alta(){
		if ($this->input->post()) {			
			$datos = $this->input->post();
			$datos['IdUsuario']= $this->session->userdata("id");
			if(!$datos['Color']){
				$datos['Color'] = 'rgb(60, 141, 188)';
			}
			if ($this->M_incidencia->alta($datos)==1) {
				$this->session->set_flashdata("Aviso","Datos Agregados Correctamente");
			} else {
				$this->session->set_flashdata("error","Error al Guardar los Datos");
			}
		}	
		redirect('Incidencia');
	}

	function Registrar($IdPersonal=NULL){
		if(!$IdPersonal){
			$this->session->set_flashdata("error","Falta Información");
			redirect('Plantilla');	
		} else {
			$data['Persona'] = $this->M_plantilla->datospersonales($IdPersonal);
			$data['dias'] = $this->M_incidencia->Inc_Disponible();
			$this->load->view('Incidencia/v_Reg_Incidencia_v3', $data);			
		}
	}

}
