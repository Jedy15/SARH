<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("m_login");
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		// $this->load->library('encrypt');
	}

	public function index(){
		if ($this->session->userdata("login")) {			
			switch ($this->session->userdata('IdPerfil')) {
				case 1:
				redirect('Administrar/Monitor');
				break;

				case 2:
				redirect('Reporte');
				break;

				default:
				redirect('Plantilla');
				break;
			}
		}
		else{
			$this->load->view('view_login');
		}
	}

	function login(){
		if (!$this->input->post()) {
			$this->session->set_flashdata('error', 'Error');
			redirect();
		} else {
			$username = $this->input->post("usuario");
			$password = $this->input->post("pass");
			$res = $this->m_login->name($username);
			if($res<>False){
				if($res[0]->{'activo'}==1){
					$msg = $res[0]->{'Pass'};
					// $key = 'p4ssw0rd'; 
					// $res[0]->{'Pass'} = $this->encrypt->decode($msg, $key);
					$password = password_verify($password, $msg);
					if($password == 1){
						$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
						$create=strtotime($res[0]->{'FechaReg'});
						$res[0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
						$PerfilUser = $this->m_login->perfil($res[0]->{'IdPerfil'});
						$data = array(
							'id' => $res[0]->{'IdUsuario'},
							'nombre'=> $res[0]->{'Nombre'},
							'ap'=> $res[0]->{'Apellido'},
							'reg'=> $res[0]->{'FechaReg'},
							'IdPerfil' => $res[0]->{'IdPerfil'},
							'perfil' => $PerfilUser[0]->{'Perfil'},
							'login' => TRUE,
						);
						$this->load->model("M_inicio");
						$this->M_inicio->monitor(1, 9, $res[0]->{'IdUsuario'});
						$this->session->set_userdata($data);

						switch ($res[0]->{'IdPerfil'}) {
							case 1:
							redirect('Administrar/Monitor');
							break;

							case 2:
							redirect('Reporte');
							break;

							// case 5 or 6:
							// redirect('Lideres','refresh');
							// break;

							default:
							redirect('Plantilla');
							break;
						}

					} else {
						$this->session->set_flashdata("error","El Usuario y/o contraseña son incorrectos");
						redirect(base_url());
					}
				}
				else{
					$this->session->set_flashdata("error","ACCESO DENEGADO <br> Contacte al administrador del sistema");
					redirect(base_url());
				}
			} else {
				$this->session->set_flashdata("error","El Usuario y/o contraseña son incorrectos");
				redirect(base_url());
			}
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}

	

}
