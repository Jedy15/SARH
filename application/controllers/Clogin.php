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

				// case 5 or 6:
				// redirect('Lideres','refresh');
				// break;

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

	// function login(){
	// 	$username = $this->input->post("usuario");
	// 	$password = $this->input->post("pass");
	// 	$res = $this->m_login->name($username);
	// 	if($res<>False){
	// 		if($res[0]->{'activo'}==1){
	// 			$msg = $res[0]->{'Pass'};
	// 			$key = 'p4ssw0rd'; 
	// 			$res[0]->{'Pass'} = $this->encrypt->decode($msg, $key);
	// 			if($password == $res[0]->{'Pass'}){
	// 				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	// 				$create=strtotime($res[0]->{'FechaReg'});
	// 				$res[0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
	// 				$PerfilUser = $this->m_login->perfil($res[0]->{'IdPerfil'});
	// 				$data = array(
	// 					'id' => $res[0]->{'IdUsuario'},
	// 					'nombre'=> $res[0]->{'Nombre'},
	// 					'ap'=> $res[0]->{'Apellido'},
	// 					'reg'=> $res[0]->{'FechaReg'},
	// 					'IdPerfil' => $res[0]->{'IdPerfil'},
	// 					'perfil' => $PerfilUser[0]->{'Perfil'},
	// 					'login' => TRUE,
	// 				);
	// 				// print_r($PerfilUser);
	// 				$this->load->model("M_inicio");
	// 				$this->M_inicio->monitor(1, 9, $res[0]->{'IdUsuario'});
	// 				$this->session->set_userdata($data);
	// 				// $this->session->set_flashdata("Aviso",
	// 				// 	"Versión 0.3.2 				Fecha de lanzamiento: 22/08/2018 <br>
	// 				// 	<ul> Mejoras en Interfaz Ver Personal
	// 				// 	<li>Agregar nuevo registro de estudios dentro del menu acciones</li>
	// 				// 	<li>Agregar nuevo registro familiar dentro del menu acciones</li>
	// 				// 	<li>Pestaña Formación y Familiar Disponible</li>
	// 				// 	<li>Boton editar estudio o registro familiar disponible</li>
	// 				// 	<li>Formulario para agregar nuevo registro de estudio o familiar</li>
	// 				// 	<li>Formulario para agregar Editar registro de estudio o familiar</li>
	// 				// 	</ul>
	// 				// 	");
	// 				// Versión 0.3.1 				Fecha de lanzamiento: 03/08/2018 <br>
	// 				// 	<ul> Nueva Interfaz Ver Personal
	// 				// 	<li>Cambio en la vista ver personal</li>
	// 				// 	<li>se agrego vista horario actual</li>
	// 				// 	<li>se agrego vista Datos laborales actual</li>
	// 				// 	<li>*Modulo de Baja Laboral agregada</li>
	// 				// 	</ul>
	// 					// "Versión 0.3.0 				Fecha de lanzamiento: 18/07/2018 <br>
	// 					// <ul>Se incluye modulo de usuarios
	// 					// <li>Editar Perfil para que cada usuario pueda editar su nombre o contraseña</li>
	// 					// <li>*Lista de usuarios disponible</li>
	// 					// <li>*Editar usuario disponible</li>
	// 					// <li>*nuevo usuario disponible</li>
	// 					// </ul>
	// 					// *funciones exclusivas de administrador

	// 					// "Version 0.2.4 			Fecha de lanzamiento: 10/07/2018 <br> 
	// 					// <ul>
	// 					// <li>Cambios en plantilla de personal operativo</li>
	// 					// <li>Se agrego la vista 'Todos'</li>
	// 					// <li>Corrección de errores al editar registro laboral y horarios</li>
	// 					// <li>Habilitado opción de 'Inactivo' para un registro laboral</li>
	// 					// <li>Corrección de N° Tarjeta al ver datos personales</li>
	// 					// <li>Abrir expediente personal en nueva pestaña</li>
	// 					// </ul>");
	// 			// "Version 0.2.3 			Fecha de lanzamiento: 02/07/2018 <br> 
	// 			// <ul>
	// 			// <li>Habilitado Modificar los datos laborales del personal</li>
	// 			// pasos:
	// 			// buscar personal->clic en N° Expediente->en datos laborales->clic en # de registro
	// 			// <li>Agregar nuevo personal y nuevos datos laborales ya esta disponibla solo para Administradores</li>
	// 			// Version 0.2.2 			Fecha de lanzamiento: 26/06/2018 <br> 
	// 			// <ul>
	// 			// <li>Situación Laboral agregada a la tabla de Plantilla</li>
	// 			// </ul>
	// 			// Version 0.2.1 			Fecha de lanzamiento: 15/06/2018 <br> 
	// 			// <ul>
	// 			// <li>Cambio de Listado de personal, agregando columna numero de expediente y eliminando columna RFC</li>
	// 			// <li>Foto de Personal agregada</li>
	// 			// <li>Tabla de datos laborales agregado</li>
	// 			// <li>Tabla de datos de horario agregado</li>
	// 			// </ul>
	// 			// Version 0.2.0 <br> 
	// 			// <ul>
	// 			// <li>vista previa de formulario para agregar nuevo personal(unicamente para perfil de administrador)</li>	

	// 				redirect('Plantilla');
	// 			} else {
	// 				$this->session->set_flashdata("error","El Usuario y/o contraseña son incorrectos");
	// 				redirect(base_url());
	// 			}
	// 		}
	// 		else{
	// 			$this->session->set_flashdata("error","ACCESO DENEGADO <br> Contacte al administrador del sistema");
	// 			redirect(base_url());
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata("error","El Usuario y/o contraseña son incorrectos");
	// 		redirect(base_url());
	// 	}
	// }

	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}

	

}
