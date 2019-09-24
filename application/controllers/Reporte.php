<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('M_plantilla', 'm_login', 'M_reporte'));
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	function index(){
		$datos['TotalOperativo']=$this->M_reporte->Total_Operativo();
		$datos['TotalNomina']=$this->M_reporte->Total_Nomina();
		$datos['TotalFueraComisionado']=$this->M_reporte->FueraComisionado();
		$datos['TotalVieneComisionado']=$this->M_reporte->VieneComisionado();
		//$datos['TotalUsuariosActivos']=$this->M_reporte->Total_Usuarios(1);
		$datos['IncidenciaSemanal']=$this->M_reporte->Incidencias();
		$datos['IncidenciaSemanal'] = count($datos['IncidenciaSemanal']);
		$this->load->view('Reporte/v_Dashboard', $datos);
	}

	function DatosTarjeta(){
		$datos = $this->M_reporte->PersonalTarjeta();
		echo json_encode($datos);
	}

	function Tarjeta(){
		// $data['listado'] = $this->M_reporte->PersonalTarjeta();
		$this->load->view('Reporte/v_tarjeta');
		// print_r($data);
	}

	function CargarGrafica4(){
		$datos = $this->M_reporte->TotalxRama();
		echo json_encode($datos);	
	}

	function CargarGrafico3(){
		// $datos = array( $this->M_reporte->FueraComisionado(), $this->M_reporte->VieneComisionado());
		$datos[0] = $this->M_reporte->FueraComisionado();
		$datos[1] = $this->M_reporte->VieneComisionado();
		$datos[2] = $this->M_reporte->EnCasa();

		echo json_encode($datos);	
	}

	function CargarTipo(){
		$datos= $this->M_reporte->TotalxSituacionLaboral();
		echo json_encode($datos);
	}

	function CargarTurnos(){
		$datos= $this->M_reporte->TotalxTurno();
		echo json_encode($datos);
	}

	function CargarIncidencias(){
		$Folio = $this->input->post('id');
		// echo $Folio;
		$datos = $this->M_reporte->IncidenciaPersonal($Folio);
		echo json_encode($datos);
		// print_r($datos);
	}

	function CargarSemanaIncidencia(){
		$datos['data'] =$this->M_reporte->Incidencias();
		echo json_encode($datos);
	}

	function DetalleIncidencias(){
		$this->load->view('Reporte/v_incidencia_general');
	}

	function IncidenciaGral(){
		$datos['Incidencia']=$this->M_reporte->IncidenciaGral();		
		$this->load->view('Reporte/v_incidencia_general_v2', $datos);
	}
}