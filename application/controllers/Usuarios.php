<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('M_usuarios');
		$this->load->library('session');
		$this->load->helper('url');
		if (!$this->session->userdata("login")) {
			redirect(base_url());			
		}
	}//fin de constructor

	function index(){
		// $data['listado'] = $this->M_usuarios->get_todos();
		if($this->session->userdata("IdPerfil")>2){
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
		$this->load->view('Admin/User/view_list_usuarios');
	} //fin de index

	function CargarUsuarios(){
		if($this->session->userdata("IdPerfil")>2){
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
		$datos['data'] = $this->M_usuarios->get_todos();
		echo json_encode($datos);
	}

	function UploadFotoPerfil($Id){
		// $nombre_fichero =   $_SERVER['DOCUMENT_ROOT'].'/SARH/images/user/'.$Id;
		$nombre_fichero =   $_SERVER['DOCUMENT_ROOT'].'/images/user/'.$Id;

		if (!file_exists($nombre_fichero)) {
			// echo "El fichero $nombre_fichero No existe";
			mkdir($nombre_fichero, 0755, true);
		}
		// echo "continua";
		$config['upload_path']          = $nombre_fichero;
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 10240;
		$config['file_name']			= 'foto.JPG';
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata("error","Error al cargar Foto <br>".$error);
			redirect('Usuarios/perfil/'.$Id,'refresh');
		} else {
			$this->crearMiniatura($Id);
			redirect('Usuarios/perfil/'.$Id,'refresh');
		}
	}

	function crearMiniatura($Id){
		$config['image_library'] = 'gd2';
		// $config['source_image'] =  $_SERVER["DOCUMENT_ROOT"]."/SARH/images/user/".$Id."/foto.JPG";
		$config['source_image'] =  $_SERVER["DOCUMENT_ROOT"]."/images/user/".$Id."/foto.JPG";

		$config['create_thumb'] = TRUE;
        $config['thumb_marker']= $Id;//captura_thumb.png
        $config['width'] = 128;
        $config['height'] = 128;

        $this->load->library('image_lib', $config); 
        if ( ! $this->image_lib->resize())
        {
        	$error = $this->image_lib->display_errors();
        	$this->session->set_flashdata("error",$error);
        }
    }

    function nuevo(){
    	if($this->session->userdata("IdPerfil")>2){
    		$this->session->set_flashdata("error","ACCESO DENEGADO");
    		redirect('Plantilla');	
    	}
    	if($this->input->post()){
    		$datos = $this->input->post();
    		$existe =$this->M_usuarios->buscar_user($datos['Usuario']);
    		if($existe){
    			$this->session->set_flashdata("error","El Nombre de Usuario ya esta en uso, vuelve a intentarlo");
    			$data['titulo']='Nuevo';
    			$data['Perfil'] = $this->M_usuarios->perfil();
    			$this->load->view('Admin/User/v_frm_user',$data);
    		} else {
    			if ($datos['Pass']==$datos['Pass2']) {
    				if($datos['IdPerfil']==null){
    					$datos['IdPerfil']=$this->session->userdata("IdPerfil")+1;
    				}
    				$datos['IdCreate']=$this->session->userdata("IdPerfil");
    				$msg = $datos['Pass']; 
    				$datos['Pass'] = password_hash($msg, PASSWORD_BCRYPT);
    				unset($datos['Pass2']);
    				if ($this->M_usuarios->agregar($datos)==true) {
    					$this->session->set_flashdata("Aviso","Alta Exitosa de ". $datos['Nombre']. " ". $datos['Apellido']);
    					redirect('Usuarios');
    				}											
    			}
    			else{
    				$this->session->set_flashdata("error","Las Contraseñas no coinciden, vuelve a intentarlo");
    				$data['titulo']='Nuevo';
    				$data['Perfil'] = $this->M_usuarios->perfil();
    				$this->load->view('Admin/User/v_frm_user',$data);
    			}
    		}
    	} else {
    		$data['titulo']='Nuevo';
    		$data['Perfil'] = $this->M_usuarios->perfil();
    		$this->load->view('Admin/User/v_frm_user',$data);		
    	}
	}//fin nuevo

	function editar($id=NULL){
		// if($this->session->userdata("IdPerfil")<=2){
		if ($id == NULL OR !is_numeric($id) or $id==1){
			$this->session->set_flashdata("Error",'ACCESO DENEGADO');
			redirect('Clogin');
		}
			if($this->input->post()){ //cargamos el codigo para guardar los cambios
				$datos = $this->input->post();
				if ($datos['Pass']) {
					if ($datos['Pass']==$datos['Pass2']) {//verificamos que las contraseñas ingresadas sean iguales
						// if($datos['IdPerfil']==null){
						// 	$datos['IdPerfil']=$this->session->userdata("IdPerfil")+1;
						// }
						$msg = $datos['Pass']; 
						$datos['Pass'] = password_hash($msg, PASSWORD_BCRYPT);
						
					} else { //si no son iguales mandamos el aviso
						$this->session->set_flashdata("error","Las Contraseñas no coinciden, vuelve a intentarlo");
						$data['titulo']='Editar';
						$data['Perfil'] = $this->M_usuarios->perfil();
						$this->load->view('Admin/User/v_frm_user', $data);				
					}
				} else {
					unset($datos['Pass']);
				}
				unset($datos['Pass2']);
				$this->M_usuarios->editar($datos,$id);
				$this->session->set_flashdata("Aviso","Datos Actualizados de ". $datos['Nombre']);
				redirect('usuarios');

			} else { //cargamos el formulario con los datos del usuario a editar
				$data['datos_reg'] = $this->M_usuarios->buscarperfil($id);
				$data['titulo']='Editar';
				$data['Perfil'] = $this->M_usuarios->perfil();
				// $msg = $data['datos_reg'][0]->{'Pass'};
				// $key = 'p4ssw0rd'; 
				// $data['datos_reg'][0]->{'Pass'} = $this->encrypt->decode($msg, $key);
				$this->load->view('Admin/User/v_frm_user',$data);
			}
		// } else {
		// 	$this->session->set_flashdata("error","ACCESO DENEGADO");
		// 	redirect('Plantilla');	
		// }
	}//fin de editar

	function perfil($id){
		if($id<>$this->session->userdata("id")){ //verificamos si es el usuario que se a logueado
			$this->session->set_flashdata("error","Ese perfil no es tuyo <i class='fa fa-frown-o'></i>");
			redirect('Plantilla');	
		} else {
			if($this->input->post()){
				$datos = $this->input->post();
				$res = $this->M_usuarios->HolaMundo($id);	//OJO con la consulta
				$msg = $res[0]->{'Pass'};	//Guardamos la contraseña actual en la variable
				$password = $datos['Pass3'];	//Guardamos la contraseña ingresada desde el frm en la variable
				$password = password_verify($password, $msg);	//mandamos las contraseñas para ver si coinciden y guardamos el resultado en la variable
				if ($password == 1) {	//si el resultado de la verificacion de la contraseña actual es 1 continuamos
					unset($datos['Pass3']);	//quitamos el registro de la contraseña actual
					if (empty($datos['Pass'])) {	//verificamos si hay algun valor en la variable si no continuamos
						unset($datos['Pass']);	//eliminamos el registro vecio.
						unset($datos['Pass2']);	//eliminamos el registro de confirmacion
						$this->M_usuarios->editar($datos,$id);		//mandamos los datos a actualizar y lanzamos el mensaje
						$this->session->set_flashdata("Aviso","***DATOS ACTUALIZADOS***
							<li>Los cambios se veran reflejados la proxima vez que inicie sesión</li>
							");
						redirect('Plantilla');
					} else {	//si existen datos en el registro entramos a evaluarlos
						if ($datos['Pass']==$datos['Pass2']){	//comparamos si las contraseñas introducidas son iguales de ser asi continuamos
							unset($datos['Pass2']);	//Eliminamos el registro de confirmacion de contraseña
							$msg = $datos['Pass']; 	//Guardamos la nueva contraseña en la variable
							$datos['Pass'] = password_hash($msg, PASSWORD_BCRYPT);	//Encriptamos la contraseña y guardamos en el registro
							$this->M_usuarios->editar($datos,$id);	//Enviamos los datos modificados a guardar
							$this->session->set_flashdata("Aviso","***DATOS ACTUALIZADOS***
								<li>Los cambios se veran reflejados la proxima vez que inicie sesión</li>
								");
							redirect('Plantilla');	
						} else {
							$this->session->set_flashdata("error","Las Contraseñas Nuevas no coinciden, vuelve a intentarlo");
							redirect('usuarios/perfil/'.$id);
						}					
					}				
				} else {	//si falla la verificacion de la contraseña actual, Avisamos y regresamos al formulario
					$this->session->set_flashdata("error","La Contraseña Actual No es correcta <br> Los Cambios se descartaron");
					redirect('usuarios/perfil/'.$id);
				}
			} else { //cargamos el formulario con los datos del usuario a editar
				// $nombre_fichero = $_SERVER['DOCUMENT_ROOT'].'/SARH/images/user/'.$id.'/foto'.$id.'.JPG';
				$nombre_fichero = $_SERVER['DOCUMENT_ROOT'].'/images/user/'.$id.'/foto'.$id.'.JPG';



				if (file_exists($nombre_fichero)) {
					$data['ruta'] = '//'.$_SERVER["SERVER_NAME"].'/images/user/'.$id.'/foto'.$id.'.JPG';
					// $data['ruta'] = '//'.$_SERVER["SERVER_NAME"].'/SARH/images/user/'.$id.'/foto'.$id.'.JPG';

				} else {
					$data['ruta'] = "//".$_SERVER["SERVER_NAME"].'/images/user/avatar.png';
					// $data['ruta'] = "//".$_SERVER["SERVER_NAME"].'/SARH/images/user/avatar.png';

				}

				$data['titulo']='Perfil';
				$data['datos_reg'] = $this->M_usuarios->buscarperfil($id);
				$this->load->view('Admin/User/v_frm_user',$data);
			}
		}
	}// fin de perfil
}