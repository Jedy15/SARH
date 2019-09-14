<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Incidencia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('M_incidencia', 'M_plantilla', 'M_login'));
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		} else if ($this->session->userdata("IdPerfil")>3) {
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
	}



	//MODULO PARA CARDEX
	function ProcesarIncidencia($IdPersonal){
		$data = $this->input->post();

		$query = $this->M_incidencia->movimientos($IdPersonal);


		include($_SERVER['DOCUMENT_ROOT']."/vendor/reportesOffice/IncidenciaReporte.php");
		include($_SERVER['DOCUMENT_ROOT']."/vendor/reportesOffice/Reporte.php");
		// include($_SERVER['DOCUMENT_ROOT']."/SARH/vendor/reportesOffice/IncidenciaReporte.php");
		// include($_SERVER['DOCUMENT_ROOT']."/SARH/vendor/reportesOffice/Reporte.php");

		$incidencias = new IncidenciaReporte();

		$datosParaReporte = $incidencias->datosParaReporteDeIncidencias(10,10, $query);

		if(count($datosParaReporte->errores)==0)
		{
			try
			{
				Reporte::crearPDF("",$datosParaReporte->resultado);
				Reporte::crearExcel($datosParaReporte->resultado);
			}
			catch(Exception $e)
			{
				print_r($e);
			}

		}
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
		$this->M_incidencia->Editar_Evento($datos);
		$this->session->set_flashdata("Aviso","Actualización Exitosa");
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