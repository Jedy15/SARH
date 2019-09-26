<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantilla extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model(array('M_administrar','M_inicio','M_plantilla','M_encuesta'));
		$this->load->library('session');
		$this->load->helper('url');
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function BuscarNuevos(){
		$data = $this->M_plantilla->Select_Nuevo_Registro();
		echo json_encode($data);
	}

	public function EliminarHorario($IdPersonal=null)
	{	
		if ($IdPersonal==null) {
			$this->session->set_flashdata('error', 'Falta Datos');
			redirect('Plantilla');
		}
		if($this->input->post()){
			if (!is_numeric($IdPersonal)) {
				$this->session->set_flashdata('error', 'Datos invalidos');
				redirect('Plantilla');
			} else {
				$id = $this->input->post('IdHorario');
				$data = $this->M_plantilla->DeleteHorario($id);
				if ($data==1) {
					$this->session->set_flashdata('Aviso', 'Registro eliminado con Exito');			
				} else {
					$this->session->set_flashdata('error', 'Ocurrio un error al eliminar el registro <br> Intente nuevamente');
				}
				redirect('Plantilla/Ver/'.$IdPersonal,'refresh');
			}
		} else {
			$this->session->set_flashdata('error', 'Datos invalidos');
			redirect('Plantilla');
		}		
	}

	function CargarInstitutos(){
		$GRADO = $this->input->post('Grado_1');
		if($GRADO==2039842 or $GRADO==2039846 or $GRADO==2039843 or $GRADO==2039848 or $GRADO==2039847 or $GRADO==2039857){
			$datos = null;
		} else {
			$datos = $this->M_encuesta->t36();
		}
		echo json_encode($datos);
	}

	function CargarCarreras(){
		$GRADO = $this->input->post('Grado_1');
		switch ($GRADO) {
			case 2039843:
			$formacion = $this->M_encuesta->t28();
			break;

			case 2039848:
			$formacion = $this->M_encuesta->t29();
			break;

			case 2039849:
			$formacion = $this->M_encuesta->t30();
			break;

			case 2039850:
			$formacion = $this->M_encuesta->t27();
			break;

			case 2039851:
			$formacion = $this->M_encuesta->t27();
			break;

			case 2039856:
			$formacion = $this->M_encuesta->t31();
			break;

			case 2039852:
			$formacion = $this->M_encuesta->t32();
			break;

			case 2039853:
			$formacion = $this->M_encuesta->t33();
			break;

			case 2039854:
			$formacion = $this->M_encuesta->t34();
			break;

			case 2039854:
			$formacion = $this->M_encuesta->t35();
			break;

			default:
			$formacion = null;
		}
		echo json_encode($formacion);
	}

	function CargarUnidad(){
		$id = $this->input->post('id');
		$data = $this->M_plantilla->UnidadesJuris($id);
		echo json_encode($data);
	}

	function CargarJuris(){
		$data = $this->M_plantilla->NumJurisdicciones();
		echo json_encode($data);
	}

	function BajaPersonal($id){		
		$ultimo = $this->M_plantilla->Ultimo($id);
		// $ultimo = $this->M_plantilla->buscaridlaboral($ultimo[0]->{'IdLaboral'});
		$datos['status']= 0;
		$datos['IdLaboral']= $ultimo[0]->{'IdLaboral'};
		// echo "UPDATE tlaboral SET status = 0, IdUsuario = 1 WHERE IdLaboral = 625"."<br>";
		// print_r($datos);
		// echo "<br>";

		if($this->M_plantilla->actlaboral($datos)){
			$post = $this->input->post();
		// print_r($post);
			// echo "<br>";
			$ultimo = $this->M_plantilla->CargarIdLaboral($ultimo[0]->{'IdLaboral'});
			unset($ultimo[0]->{'IdLaboral'});
			unset($ultimo[0]->{'Fecha'});
			unset($ultimo[0]->{'FechaReg'});
			$ultimo[0]->{'IdUsuario'}=$this->session->userdata("id");
			$ultimo[0]->{'status'} = 1;
			$ultimo[0]->{'nota'} = $post['nota'];
			$ultimo[0]->{'FInicio'} = $post['FInicio'];
			$ultimo[0]->{'IdEstatus'} = $post['IdEstatus'];
			$this->M_plantilla->insertlaboral($ultimo[0]);

		// print_r($ultimo[0]);
			$this->session->set_flashdata("Aviso","Baja Realizada con exito");
			redirect('Plantilla/Ver/'.$id,'refresh');
		} else {
			$this->session->set_flashdata("Error","Error Al Realizar la Baja, informe al area de Informatica");
			redirect('Plantilla/ver/'.$id,'refresh');
		} 


		// $datos = $this->input->post();

		// $datos['IdPersonal']= $id;
		// // $datos['Codigo']= $ultimo[0]->{'Codigo'};
		// // $datos['Clave']= $ultimo[0]->{'Clave'};
		// // $datos['IdTipoTrabajador']= $ultimo[0]->{'IdTipoTrabajador'};
		// $datos['IdUsuario']=$this->session->userdata("id");
		// $datos['IdAds']= $ultimo[0]->{'IdAds'};
		// print_r($datos);
	}

	function index(){
		$this->load->view('Plantilla/view_list_plantilla');
	}

	function upload($Id=null){
		if ($Id==null) {
			$this->session->set_flashdata("error","Error en datos");
			redirect('Plantilla');	
		}

		if (is_numeric($Id)) {
			$nombre_fichero =   $_SERVER['DOCUMENT_ROOT'].'/docs/'.$Id;
			if (!file_exists($nombre_fichero)) {
				mkdir($nombre_fichero, 0755, true);
			}
			$config['upload_path']          = $nombre_fichero;
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 10240;
			$config['file_name']			= 'foto.JPG';
			$config['overwrite']			= TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto')){
				$this->session->set_flashdata("Error","Error al cargar Foto, informe al area de Informatica");
				redirect('Plantilla/ver/'.$Id,'refresh');
			} else {
				$exito = $this->crearMiniatura($Id);
				if ($exito) {
					$this->session->set_flashdata('Aviso', 'Foto de Expediente Actualizado');
				} else {
					$this->session->set_flashdata('error', 'Error al actualizar expediente');
				}
				redirect('Plantilla/ver/'.$Id,'refresh');
			}
		} else {
			$this->session->set_flashdata("error",'Datos No validos');			
			redirect('Plantilla');
		}	
	}

	function crearMiniatura($Id){
		$config['image_library'] = 'gd2';
		$config['source_image'] =  $_SERVER["DOCUMENT_ROOT"]."/docs/".$Id."/foto.JPG";
		$config['create_thumb'] = TRUE;
		$config['thumb_marker']= $Id;//captura_thumb.png
        $config['width'] = 128;
        $config['height'] = 128;
		
		$this->load->library('image_lib', $config); 
        if ( ! $this->image_lib->resize())
        {
        	$error = $this->image_lib->display_errors();
        	$this->session->set_flashdata("Error",$error);
        } else {
			return true;
		}
    }

    function Exp(){
    	$registro = $this->M_plantilla->GrupoExp();
    	echo '<option value="">Seleccione Opcion</option>';
    	foreach ($registro as $item) {
    		echo '<option value="'.$item->IdExp.'">'.$item->Grupo.'</option>';
    	}
    }

    function ContarExp(){
    	$ID = $this->input->post('IdExp');
    	$cantidad = $this->M_plantilla->ContarExp($ID);
    	$data = $this->M_plantilla->Id_Grupo($ID);
    	echo $data[0]->Sigla;
    	echo "/";
    	echo $cantidad+1001;
    }

    function AltaExp($id){
    	$datos = $this->input->post();
    	$datos['IdPersonal']= $id;
    	$this->M_plantilla->updatepersonal($datos);
    	$this->session->set_flashdata("Aviso","Numero de Expediente Asignado Exitosamente");
    	redirect('Plantilla/ver/'.$id);
    }

    function eliminarEstudio($id=null, $id2=null){
		if ($id==null or $id2==null) {
			$this->session->set_flashdata("error","Error en datos");
			redirect('Plantilla');
		}

		if(is_numeric($id) and is_numeric($id2)){
			$this->M_plantilla->DeleteEstudio($id);
			$this->session->set_flashdata("Aviso","Estudios Eliminados");
			redirect('Plantilla/ver/'.$id2);
		} else {
			$this->session->set_flashdata("error","Error en datos");
			redirect('Plantilla');
		}
    }

    function CargarOperativo(){
    	$datos['data'] = $this->M_plantilla->operativo();
    	echo json_encode($datos);
    }

    function CargarTodo(){
    	$datos['data'] = $this->M_plantilla->CargarTodo();
    	echo json_encode($datos);
    }

    function General(){
    	$this->load->view('Plantilla/v_lista_plantilla');
    }

    function CargarNomina(){
    	$datos['data'] = $this->M_plantilla->todos();
    	echo json_encode($datos);
    }

    function Nomina(){
    	$this->load->view('Plantilla/v_lista_nomina');
    }

    function EditarRegitro($id){
    	if($this->session->userdata("IdPerfil")<=3){
    		if($this->input->post()){
    			$datos = $this->input->post();
    			$datos['IdUsuario']= $this->session->userdata("id");
    			$datos['IdPersonal']= $id;
    			if($datos['Telefono']!=NULL){
    				$datos['Telefono'] = str_replace(
    					array("\\", "¨", "º", "-", "~",
    						"#", "@", "|", "!", "\"",
    						"·", "$", "%", "&", "/",
    						"(", ")", "?", "'", "¡",
    						"¿", "[", "^", "<code>", "]",
    						"+", "}", "{", "¨", "´",
    						">", "< ", ";", ",", ":",
    						".", " "),
    					'',
    					$datos['Telefono']
    				);
    			}
    			if ($datos['IdMunicipio'] == NULL) {
    				$datos['IdMunicipio']= '999';
    			}
    			$this->M_plantilla->updatepersonal($datos);
    			$this->session->set_flashdata("Aviso","Datos Actualizados");
    			redirect('Plantilla/ver/'.$id);
    		} else {
    			// $data['muni'] = $this->M_inicio->muni();
    			$data['datos_reg'] = $this->M_plantilla->buscarID($id);
    			$data['title'] = 'Editar';
    			$this->load->view('Plantilla/v_frm_personal', $data);
    		}
    	} else {
    		$this->session->set_flashdata("error","ACCESO DENEGADO");
    		redirect('Plantilla');	
    	}
    }

    function EditarLaboral($id){
    	if($this->session->userdata("IdPerfil")<=3){
    		$data['datos_reg'] = $this->M_plantilla->buscaridlaboral($id);
    		if($this->input->post()){
    			$datos = $this->input->post();
    			$datos['IdLaboral'] = $id;
    			$datos['IdUsuario']= $this->session->userdata("id");
    			
    			unset($datos['Jurisdicción']);
    			unset($datos['0']);
				unset($datos['IdSeccion']);
    			if($this->M_plantilla->actlaboral($datos)==true){
    				$this->session->set_flashdata("Aviso","Datos Actualizados Exitosamente");
    				redirect('Plantilla/ver/'.$data['datos_reg'][0]->{'IdPersonal'});
    			}
    		} else {
    			$data['title']='Editar';
    			$data['tra'] = $this->M_inicio->tra();
    			$data['codigo'] = $this->M_inicio->codigo();
    			// $data['unidad'] = $this->M_inicio->unidad();
    			$data['estatus'] = $this->M_inicio->estatus();
    			$data['persona'] = $this->M_plantilla->buscarID($data['datos_reg'][0]->{'IdPersonal'});
    			$data['Usuario'] = $this->M_inicio->id_usuario($data['datos_reg'][0]->{'IdUsuario'});
				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); //Arreglo de meses en para mostrar en español			
				$create=strtotime($data['datos_reg'][0]->{'FechaReg'});
				$data['datos_reg'][0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create); //formato de fecha y hora ejemplo: 31 de julio del 2018 03:20 pm
				$create=strtotime($data['datos_reg'][0]->{'Fecha'});
				$data['datos_reg'][0]->{'Fecha'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
				$this->load->view('Plantilla/v_frm_laboral', $data);
			}
		} else{
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');
		}
	}

	function EditarHorario($id){
		if($this->session->userdata("IdPerfil")<=3){
			$data['datos_reg'] = $this->M_plantilla->buscaridhorario($id);
			if($this->input->post()){
				$datos = $this->input->post();
				$HRE=strtotime($datos['HE']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HS']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HE'] = date("H:i:s", $HRE);
				$datos['HS'] = date("H:i:s", $HRS);
				$datos['IdUsuario']= $this->session->userdata("id");
				$datos['IdHorario'] = $id;
				$this->M_plantilla->updatehorario($datos);
				$this->session->set_flashdata("Aviso","Horario Actualizado Exitosamente");
				redirect('Plantilla/ver/'.$data['datos_reg'][0]->{'IdPersonal'});
			} else {
				$data['funcion'] = $this->M_inicio->funcion();
				$data['depto'] = $this->M_inicio->deptos(NULL);
				$data['jefe'] = $this->M_inicio->jefes();
				$data['turno'] = $this->M_inicio->turnos();
				$data['reg'] = $this->M_inicio->reg();
				$data['Servicio']=$this->M_administrar->servicios();
				$data['persona'] = $this->M_plantilla->buscarID($data['datos_reg'][0]->{'IdPersonal'});
				$HRE=strtotime($data['datos_reg'][0]->{'HE'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HS'});
				$data['datos_reg'][0]->{'HE'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HS'}=date("g:i a", $HRS);
				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); //Arreglo de meses en para mostrar en español			
				$create=strtotime($data['datos_reg'][0]->{'FechaReg'});
				$data['datos_reg'][0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create); //formato de fecha y hora ejemplo: 31 de julio del 2018 03:20 pm
				$create=strtotime($data['datos_reg'][0]->{'Fecha'});
				$data['datos_reg'][0]->{'Fecha'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
				$data['title'] = 'Editar';
				$data['Usuario'] = $this->M_inicio->id_usuario($data['datos_reg'][0]->{'IdUsuario'});
				$this->load->view('Plantilla/v_frm_horario', $data);
			}
		} else {
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
	}

	function nuevolaboral($id){		
		if ($id == NULL){ //si el ID es nulo
			$this->session->set_flashdata("error","Falta Información");
			redirect('Plantilla');
		}
		if($this->session->userdata("IdPerfil")<=2){
			if($this->input->post()){
				$datos = $this->input->post();
				$datos['IdUsuario']= $this->session->userdata("id");
				$datos['IdPersonal']= $id;
				$data['persona'] = $this->M_plantilla->buscarID($id);
				if (empty($datos['IdEstatus'])) {
					if ($datos['IdAds']==4228) {
						$datos['IdEstatus']= 1;
					} else {
						$datos['IdEstatus']= 3;
					}
				}
				unset($datos['Jurisdicción']);
				unset($datos['0']);
				unset($datos['IdSeccion']);
				$this->M_plantilla->bajalaboral($id);
				$this->M_plantilla->insertlaboral($datos);
				$this->M_inicio->monitor(2, 3, $datos['IdUsuario']);
				$existe = $this->M_plantilla->buscarhorario($id);
				$this->session->set_flashdata("Aviso","Nuevos Datos Laborales Agregados de ".$data['persona'][0]->{'NOMBRES'}. " ". $data['persona'][0]->{'APELLIDOS'});
				if ( $existe == true){
					redirect('Plantilla/ver/'.$id);
				}
				else{
					redirect('Plantilla/nuevohorario/'.$id);
				}
			} else {
				$data['title']='Nuevo';
				$data['tra'] = $this->M_inicio->tra();
				$data['codigo'] = $this->M_inicio->codigo();
				$data['estatus'] = $this->M_inicio->estatus();
				$ultimo = $this->M_plantilla->Ultimo($id);
				if ($ultimo[0]->{'IdLaboral'}!=null){
					$data['datos_reg'] = $this->M_plantilla->buscaridlaboral($ultimo[0]->{'IdLaboral'});
				} else {
					$data['datos_reg'] = NULL;
				}
				$data['persona'] = $this->M_plantilla->buscarID($id);
				$this->load->view('Plantilla/v_frm_laboral', $data);
			}
		}
		else{
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
	}

	function nuevohorario($id){
		if($this->session->userdata("IdPerfil")<=2){
			$data['funcion'] = $this->M_inicio->funcion();
			$data['depto'] = $this->M_inicio->deptos(NULL);
			$data['jefe'] = $this->M_inicio->jefes();
			$data['turno'] = $this->M_inicio->turnos();
			$data['reg'] = $this->M_inicio->reg();	//Tipo de Registro
			$data['persona'] = $this->M_plantilla->buscarID($id);			
			$data['Servicio']=$this->M_administrar->servicios();
			if($this->input->post()){
				$datos = $this->input->post();		 
				$NT = $this->M_plantilla->Tarjeta($datos['NTarjeta']);
				if ($NT) {
					if ($NT[0]->IdPersonal == $id) {
						$this->M_plantilla->bajahorario($id);
					} else {
						$this->session->set_flashdata("tarjeta","El numero de tarjeta: ".$datos['NTarjeta']." se encuentra en uso, favor de verificar");
						redirect('Plantilla/nuevohorario/'.$id,'refresh');
					}
				}
				if ($datos['HE'] == $datos['HS']){
					$datos['HE'] = '00:00:00';
					$datos['HS'] = '00:00:00';
				} else {
					$HRE=strtotime($datos['HE']); //codigo para convertir de hora de 12 a 24 hrs					
					$HRS=strtotime($datos['HS']); //codigo para convertir de hora de 12 a 24 hrs
					$datos['HE'] = date("H:i:s", $HRE);
					$datos['HS'] = date("H:i:s", $HRS); 					
				}
				$datos['IdPersonal']= $id;
				$datos['IdUsuario']= $this->session->userdata('id');
				$this->M_plantilla->insertlhorario($datos);
				$this->M_inicio->monitor(2, 4, $datos['IdUsuario']);
				$this->session->set_flashdata("Aviso","Nuevo Horario Agregado");
				redirect('Plantilla/ver/'.$id);
			} else {//hay datos en post
				$data['title'] = 'Nuevo';
				$ultimo = $this->M_plantilla->ultimo_horario($id);
				if ($ultimo[0]->{'IdHorario'}!=null){
					$data['datos_reg'] = $this->M_plantilla->buscaridhorario($ultimo[0]->{'IdHorario'});
					$HRE=strtotime($data['datos_reg'][0]->{'HE'}); //codigo para convertir de hora de 12 a 24 hrs					
					$HRS=strtotime($data['datos_reg'][0]->{'HS'});
					$data['datos_reg'][0]->{'HE'}=date("g:i a", $HRE);
					$data['datos_reg'][0]->{'HS'}=date("g:i a", $HRS);
				}
				$this->load->view('Plantilla/v_frm_horario', $data);
			}
		} else {//SI NO MANDAMOS MENSAJE DE ERROR
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');			
		}
	}

	function Municipios(){
		$datos = $this->M_inicio->muni();
		echo json_encode($datos);
	}

	function RegistroNuevo(){
		if($this->session->userdata("IdPerfil")<=2){
			if($this->input->post()){
				$datos = $this->input->post();
				$NT = $this->M_plantilla->RFC($datos['RFC']); //verificar si hay algun registro con el mismo RFC
				if ($NT <> false) {
					$this->session->set_flashdata("error","El RFC: ".$datos['RFC']." Ya fue registrado. <br><a href='".base_url()."Plantilla/ver/".$NT[0]->{'IdPersonal'}."' class='btn btn-primary'>Ver Expediente</a>");
					redirect('Plantilla/RegistroNuevo','refresh');
				} else {				
					$datos['Telefono'] = str_replace(
						array("\\", "¨", "º", "-", "~",
							"#", "@", "|", "!", "\"",
							"·", "$", "%", "&", "/",
							"(", ")", "?", "'", "¡",
							"¿", "[", "^", "<code>", "]",
							"+", "}", "{", "¨", "´",
							">", "< ", ";", ",", ":",
							".", " "),
						'',
						$datos['Telefono']
					);
					if ($datos['IdMunicipio'] == NULL) {
						$datos['IdMunicipio']= '999';
					}
					$id = $this->M_plantilla->agregar($datos);
					$this->M_inicio->monitor(2, 1, $this->session->userdata('id'));
					$this->session->set_flashdata("Aviso","Datos Agregados con exito");
					redirect('Plantilla/nuevolaboral/'.$id);
				}
			} else {
				$data['title'] = 'Nuevo';
				$this->load->view('Plantilla/v_frm_personal', $data);
			}
		} else {
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}
	}

	function ver($id=null){
		if ($id == NULL){ //si el ID es nulo
			$this->session->set_flashdata("error","Falta Información");
			redirect('Plantilla');
			// redirect('error');	//manda ala pagina de error
		}
		$data['datos_reg'] = $this->M_plantilla->buscarID($id);
		if (empty($data['datos_reg'])){
			$this->session->set_flashdata("error","El ID no Existe");
			redirect('Plantilla');
		}
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$data['estatus'] = $this->M_inicio->estatus();
		$data['horario'] = $this->M_inicio->horario($data['datos_reg'][0]->{'IdPersonal'});
		$data['horarioact'] = $this->M_plantilla->horarioact($data['datos_reg'][0]->{'IdPersonal'});
		$data['laboral'] = $this->M_inicio->laboral($data['datos_reg'][0]->{'IdPersonal'});
		$data['lact'] = $this->M_plantilla->laboral_actual($data['datos_reg'][0]->{'IdPersonal'});
		$data['estudios'] = $this->M_inicio->estudios($data['datos_reg'][0]->{'IdPersonal'});
		$data['familiar'] = $this->M_inicio->familiar($data['datos_reg'][0]->{'IdPersonal'});

		$create=strtotime($data['datos_reg'][0]->{'FECHANAC'});
		$data['datos_reg'][0]->{'FECHANAC'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y',$create);
		if ($data['lact']) {
			if ($data['lact'][0]->{'FInicio'} == NULL) {
				$data['lact'][0]->{'FInicio'} = 'NO REGISTRADO';
			} else {
				$create=strtotime($data['lact'][0]->{'FInicio'});
				$data['lact'][0]->{'FInicio'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y',$create);
			}
		}
		if ($data['horarioact']) {
			if($data['horarioact'][0]->{'fi'}!='0000-00-00'){
				$create=strtotime($data['horarioact'][0]->{'fi'});			
				$data['horarioact'][0]->{'fi'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y',$create);
			} else {
				$data['horarioact'][0]->{'fi'} = 'No registrado';
			}
			if ($this->session->userdata('IdPerfil')<=2) {
				$create=strtotime($data['horarioact'][0]->{'FechaReg'});			
				$data['horarioact'][0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y g:i a',$create);
				$create=strtotime($data['horarioact'][0]->{'Fecha'});			
				$data['horarioact'][0]->{'Fecha'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y g:i a',$create);
				if ($data['lact']) {
					$create=strtotime($data['lact'][0]->{'FechaReg'});			
					$data['lact'][0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y g:i a',$create);
					$create=strtotime($data['lact'][0]->{'Fecha'});			
					$data['lact'][0]->{'Fecha'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " de ".date('Y g:i a',$create);
				}				
			}
			$HRE=strtotime($data['horarioact'][0]->{'HE'}); //codigo para convertir de hora de 12 a 24 hrs					
			$HRS=strtotime($data['horarioact'][0]->{'HS'});
			$data['horarioact'][0]->{'HE'}=date("g:i a", $HRE);
			$data['horarioact'][0]->{'HS'}=date("g:i a", $HRS);
		}


		$nombre_fichero = $_SERVER["DOCUMENT_ROOT"]."/docs/".$id."/foto".$id.'.JPG';
		// $nombre_fichero = $_SERVER["DOCUMENT_ROOT"]."/SARH/docs/".$id."/foto".$id.'.JPG';


		if (file_exists($nombre_fichero)) {
			$data['ruta'] = '//'.$_SERVER["SERVER_NAME"]."/docs/".$id."/foto".$id.'.JPG';
			// $data['ruta'] = '//'.$_SERVER["SERVER_NAME"]."/SARH/docs/".$id."/foto".$id.'.JPG';

		} else {
			// $data['ruta'] = "//".$_SERVER["SERVER_NAME"]."/SARH/docs/0/foto.png";
			$data['ruta'] = "//".$_SERVER["SERVER_NAME"]."/docs/0/foto.png";

		}


		if ($this->input->post()) {			
			$ultimo = $this->M_plantilla->Ultimo($id);
			$ultimo = $this->M_plantilla->buscaridlaboral($ultimo[0]->{'IdLaboral'});
			$datos['status']= 0;
			$datos['IdLaboral']= $ultimo[0]->{'IdLaboral'};
			$datos['IdUsuario']=$this->session->userdata("id");
			if($this->M_plantilla->actlaboral($datos)){ 			
				$datos = $this->input->post();
				$datos['IdPersonal']= $id;
				$datos['Codigo']= $ultimo[0]->{'Codigo'};
				$datos['Clave']= $ultimo[0]->{'Clave'};
				$datos['IdTipoTrabajador']= $ultimo[0]->{'IdTipoTrabajador'};
				$datos['IdUsuario']=$this->session->userdata("id");
				$datos['IdAds']= $ultimo[0]->{'IdAds'};
				$this->M_plantilla->insertlaboral($datos);
				$this->session->set_flashdata("Aviso","Baja Realizada con exito");
				redirect('Plantilla/ver/'.$id,'refresh');
			} else {
				$this->session->set_flashdata("Error","Error Al Realizar la Baja, informe al area de Informatica");
				redirect('Plantilla/ver/'.$id,'refresh');
			} 
		} else {
			$this->load->view('Plantilla/v_ver_registro', $data);
		}
	}// Fin de la funcion VER

	function EditarEstudio($id){
		$data['estudio'] = $this->M_plantilla->id_estudio($id);	
		if ($this->input->post()) {
			$datos = $this->input->post();
			$datos['IdUsuario']= $this->session->userdata("id");
			$datos['IdRegEstudio'] = $id;
			$this->M_plantilla->update_estudio($datos);
			$this->session->set_flashdata("Aviso","Estudio Actualizado Exitosamente");
			redirect('Plantilla/ver/'.$data['estudio'][0]->{'IdPersonal'});			
		} else {
			$data['carreras'] = $this->M_inicio->carreras();
			$data['persona'] = $this->M_plantilla->datospersonales($data['estudio'][0]->{'IdPersonal'});
			$data['Usuario'] = $this->M_inicio->id_usuario($data['estudio'][0]->{'IdUsuario'});
			$data['title']='Editar';
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); //Arreglo de meses en para mostrar en español			
			$create=strtotime($data['estudio'][0]->{'FechaReg'});
			$data['estudio'][0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create); //formato de fecha y hora ejemplo: 31 de julio del 2018 03:20 pm
			$create=strtotime($data['estudio'][0]->{'fact'});
			$data['estudio'][0]->{'fact'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
			$data['grado']=$this->M_encuesta->grado();
			$this->load->view('Plantilla/v_frm_estudio', $data);
		}
	}

	function NuevoEstudio($id){
		if ($this->input->post()) {
			$datos = $this->input->post();
			$datos['IdUsuario']= $this->session->userdata("id");
			$datos['IdPersonal'] = $id;
			$this->M_plantilla->insert_estudio($datos);
			$this->session->set_flashdata("Aviso","Nuevos Datos Academicos agregados");
			redirect('Plantilla/ver/'.$id);			
		} else {
			$data['title']='Nuevo';
			$data['grado']=$this->M_encuesta->grado();
			$data['persona'] = $this->M_plantilla->datospersonales($id);
			$this->load->view('Plantilla/v_frm_estudio', $data);
		}
	}

	#funcion para eliminar registro familiar
	function EliminarFamiliar($id=null, $IdPersonal=null){
		#solo para perfil de administrador o superior
		if ($this->session->userdata('IdPerfil')<=2) {
			if (is_numeric($id) and is_numeric($IdPersonal)) {
				$respuesta = $this->M_plantilla->delete_familiar($id);
				if ($respuesta) {
					$this->session->set_flashdata("Aviso","Registro Familiar Eliminado.");
				} else {
					$this->session->set_flashdata("error","Error en la eliminarción <br> intentelo de nuevo.");
				}				
				redirect('Plantilla/ver/'.$IdPersonal);		
			} else {
				$this->session->set_flashdata("error","Datos Incorrectos");
				redirect('Plantilla');	
			}
				
		} else {
			$this->session->set_flashdata('error', 'Acceso Denegado');
			redirect('Plantilla','refresh');			
		}
	}

	function NuevoFamiliar($id){
		if ($this->input->post()) {
			$datos = $this->input->post();
			$datos['IdUsuario']= $this->session->userdata("id");
			$datos['IdPersonal'] = $id;
			$this->M_plantilla->insert_familiar($datos);
			$this->session->set_flashdata("Aviso","Nuevos Datos Familiares agregados");
			redirect('Plantilla/ver/'.$id);
		} else {
			$data['title']='Nuevo';
			$data['paren'] = $this->M_inicio->parentesco();
			$data['persona'] = $this->M_plantilla->datospersonales($id);
			$this->load->view('Plantilla/v_frm_familiar', $data);
		}
	}

	function EditarFamiliar($id){
		$data['datos_reg'] = $this->M_plantilla->id_familiar($id);
		if ($this->input->post()) {
			$datos = $this->input->post();
			$datos['IdUsuario']= $this->session->userdata("id");
			$datos['IdFamiliar'] = $id;
			if($this->M_plantilla->update_familiar($datos) == true ){
				$this->session->set_flashdata("Aviso","Datos Familiares Actualizados Exitosamente");
			} else {
				$this->session->set_flashdata("error","Error al Actualizar los datos Contacte al administrador");
			}
			redirect('Plantilla/ver/'.$data['datos_reg'][0]->{'IdPersonal'});
		} else {
			$data['title']='Editar';
			$data['paren'] = $this->M_inicio->parentesco();
			$data['persona'] = $this->M_plantilla->datospersonales($data['datos_reg'][0]->{'IdPersonal'});
			$data['Usuario'] = $this->M_inicio->id_usuario($data['datos_reg'][0]->{'IdUsuario'});
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); //Arreglo de meses en para mostrar en español			
			$create=strtotime($data['datos_reg'][0]->{'FechaReg'});
			$data['datos_reg'][0]->{'FechaReg'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create); //formato de fecha y hora ejemplo: 31 de julio del 2018 03:20 pm
			$create=strtotime($data['datos_reg'][0]->{'Fecha'});
			$data['datos_reg'][0]->{'Fecha'} = date('d',$create)." de ".$meses[date('n',$create)-1]. " del ".date('Y g:i a',$create);
			$this->load->view('Plantilla/v_frm_familiar', $data);
		}
	}

}