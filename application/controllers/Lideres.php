<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lideres extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('M_lider'));
		$this->load->library(array('session'));
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}		
	}

	function index(){
		$this->load->view('Lideres/v_personal');
	}

	function CargarPersonal(){
		$IdJefe = $this->M_lider->IdJefe();
		// print_r($IdJefe[0]->IdJefe);
		$datos['data'] = $this->M_lider->personal($IdJefe[0]->IdJefe);
		// print_r($datos);
		echo json_encode($datos);
	}
}