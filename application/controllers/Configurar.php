<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configurar extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('M_configurar'));
		$this->load->library(array('session'));
		// if (!$this->session->userdata("login")) {
			// redirect(base_url());
		// }		
	}

	function index(){
		if($this->session->userdata("IdPerfil")<=2){
			$data['grupo']=$this->M_configurar->grupos();
			$this->load->view('Admin/Config/v_list_grupos',$data);
		} else {
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
	}

	function NuevoGrupo(){
		if($this->session->userdata("IdPerfil")<=2){
			$datos = $this->input->post();
			$datos['IdUsuario']= $this->session->userdata("id");
			$this->M_configurar->insertar_grupo($datos);
			// print_r($datos);
			redirect('Configurar');
			// $this->load->view('Admin/Config/v_list_grupos');
		} else {
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
	}

	function EditarGrupo($id){
		if($this->input->post()){
			$datos = $this->input->post();
			$datos['IdExp'] = $id;
			$datos['IdUsuario']= $this->session->userdata("id");
			$this->M_configurar->update_grupo($datos);
			$this->session->set_flashdata("Aviso","Datos Actualizados Exitosamente");
			redirect('Configurar');
		} else {
			$data['idgrupo']=$this->M_configurar->selec_grupo($id);
			$data['grupo']=$this->M_configurar->grupos();
			$this->load->view('Admin/Config/v_list_grupos',$data);
		// print_r($data['idgrupo']);
		}
	}
}