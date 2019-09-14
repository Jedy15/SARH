

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuesta extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		$this->load->model('M_encuesta');
		$this->load->model('M_inicio');
		$this->load->model('M_plantilla');
		$this->load->library('javascript');
		// $this->load->library('session');
		// $this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		// $this->load->library('encrypt');
		// if (!$this->session->userdata("login")) {
			// redirect(base_url());
		// }		
	}

	function index(){
		if($this->input->post()){
			$datos = $this->input->post();
			$data['persona'] = $this->M_encuesta->RFC($datos['RFC']);
			if($data['persona']<>False){
				$data['datos_reg']= $this->M_encuesta->existe($data['persona'][0]->{'IdPersonal'});
				if ($data['datos_reg']<>False) {
					$this->session->set_flashdata("Aviso","La Encuesta ya fue requisitada...
						<br> ¿Desea Realizarla Nuevamente?
						<br> Descartara la información que haya ingresado anteriormente.");
					// $this->jquery->toggle(modal-danger);
					$this->load->view('Bienvenida',$data);
					// print_r($data);
				} else {
					redirect('Encuesta/p1_5/'.$data['persona'][0]->{'IdPersonal'}.'/'.$datos['RFC']);
				}
				// print_r($data['persona']);
			} else {
				$this->session->set_flashdata("error","El RFC no existe o es Incorrecto, Vuelva a intentarlo");
				$this->load->view('Bienvenida');
			}
		}else{
			$this->load->view('Bienvenida');
		}
	}


	function p1($Id, $RFC){
		$data['persona'] = $this->M_encuesta->RFC($RFC);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			//EDAD
			$cumpleanos = new DateTime($datos['Fecha_Nacimiento']);
			$hoy = new DateTime();
			$annos = $hoy->diff($cumpleanos);
			$datos['Edad'] = $annos->y;
			//NACIONALIDAD
			if ($datos['Pais_Nacimiento']=='142') {
				$datos['Nacionalidad'] = '2047951';
			} else {
				$datos['Nacionalidad'] = '2047952';
			}
			//IdPersonal
			$datos['IdPersonal'] = $Id;
			//Sexo
			if ($datos['Sexo']=='H') {
				$datos['Sexo'] = '2029389';
			}
			if ($datos['Sexo']=='M') {
				$datos['Sexo'] = '2029390';
			}
			//Telefono
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
			unset($datos['NOMBRES']);
			unset($datos['APELLIDOS']);
			if ($data['datos_reg']==False) {
				$this->M_encuesta->crear($datos);
			} else {
				$this->M_encuesta->update($datos);
			}
			redirect('Encuesta/p8/'.$Id);
			// print_r($datos);
		} else {

			$data['pais']=$this->M_encuesta->pais();
			$data['estado']=$this->M_encuesta->estado();
			$data['municipio']=$this->M_encuesta->municipio();
			$data['conyugal']=$this->M_encuesta->conyugal();
			$this->load->view('Encuesta/1', $data);

		// echo json_encode($r);
		// print_r($data['datos_reg']);
		}
	}

	function p2($Id){
		$data['persona']=$this->M_plantilla->buscarID($Id);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			//IdPersonal
			$datos['IdPersonal'] = $Id;
			$this->M_encuesta->update($datos);
			redirect('Encuesta/p3/'.$Id);
		} else {
			$data['estado']=$this->M_encuesta->estado();
			// $data['municipio']=$this->M_encuesta->municipio();
			$data['vialidad']=$this->M_encuesta->vialidad();
			$data['asentamiento']=$this->M_encuesta->asentamiento();
			$this->load->view('Encuesta/2', $data);
		}
	}

	function p3($Id){
		$data['persona']=$this->M_plantilla->buscarID($Id);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			$datos['IdPersonal'] = $Id;
			unset($datos[0]);
			$this->M_encuesta->update($datos);
			redirect('Encuesta/p4/'.$Id);
			// print_r($datos);
		} else {
			$data['actividad']=$this->M_encuesta->actividad();
			$data['AreaTrabajo']=$this->M_encuesta->AreaTrabajo();
			$data['TipoPersonal']=$this->M_encuesta->TipoPersonal();
			$data['especialidad']=$this->M_encuesta->especialidad();
			$data['codigo']=$this->M_inicio->codigo();
			$data['unidad']=$this->M_inicio->unidad();
			$data['laboral'] = $this->M_plantilla->buscaridlaboral($Id);
			$this->load->view('Encuesta/3', $data);
			// print_r($data['laboral']);
		}
	}

	function p4($Id){
		$data['persona']=$this->M_plantilla->buscarID($Id);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			if (empty($datos['Lunes'])) {
				unset($datos['HELunes']);
				unset($datos['HSLunes']);
			} else {
				$HRE=strtotime($datos['HELunes']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSLunes']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HELunes'] = date("H:i:s", $HRE);
				$datos['HSLunes'] = date("H:i:s", $HRS);
			}
			if (empty($datos['Martes'])) {
				unset($datos['HEMartes']);
				unset($datos['HSMartes']);
			} else {
				$HRE=strtotime($datos['HEMartes']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSMartes']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HEMartes'] = date("H:i:s", $HRE);
				$datos['HSMartes'] = date("H:i:s", $HRS);
			}
			if (empty($datos['Miercoles'])) {
				unset($datos['HEMiercoles']);
				unset($datos['HSMiercoles']);
			} else {
				$HRE=strtotime($datos['HEMiercoles']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSMiercoles']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HEMiercoles'] = date("H:i:s", $HRE);
				$datos['HSMiercoles'] = date("H:i:s", $HRS);
			}
			if (empty($datos['Jueves'])) {
				unset($datos['HEJueves']);
				unset($datos['HSJueves']);
			} else {
				$HRE=strtotime($datos['HEJueves']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSJueves']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HEJueves'] = date("H:i:s", $HRE);
				$datos['HSJueves'] = date("H:i:s", $HRS);
			}
			if (empty($datos['Viernes'])) {
				unset($datos['HEViernes']);
				unset($datos['HSViernes']);
			} else {
				$HRE=strtotime($datos['HEViernes']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSViernes']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HEViernes'] = date("H:i:s", $HRE);
				$datos['HSViernes'] = date("H:i:s", $HRS);
			}
			if (empty($datos['Sabado'])) {
				unset($datos['HESabado']);
				unset($datos['HSSabado']);
			} else {
				$HRE=strtotime($datos['HESabado']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSSabado']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HESabado'] = date("H:i:s", $HRE);
				$datos['HSSabado'] = date("H:i:s", $HRS);
			}
			if (empty($datos['Domingo'])) {
				unset($datos['HEDomingo']);
				unset($datos['HSDomingo']);
			} else {
				$HRE=strtotime($datos['HEDomingo']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSDomingo']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HEDomingo'] = date("H:i:s", $HRE);
				$datos['HSDomingo'] = date("H:i:s", $HRS);
			}
			if (empty($datos['Festivo'])) {
				unset($datos['HEFestivo']);
				unset($datos['HSFestivo']);
			} else {
				$HRE=strtotime($datos['HEFestivo']); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($datos['HSFestivo']); //codigo para convertir de hora de 12 a 24 hrs
				$datos['HEFestivo'] = date("H:i:s", $HRE);
				$datos['HSFestivo'] = date("H:i:s", $HRS);
			}
			if(empty($datos)){
				redirect('Encuesta/p5/'.$Id);
			} else {
				$datos['IdPersonal'] = $Id;
				$this->M_encuesta->update($datos);
				redirect('Encuesta/p5/'.$Id);
			}
			
		} else {
			if (isset($data['datos_reg'][0]->{'Lunes'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HELunes'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSLunes'});
				$data['datos_reg'][0]->{'HELunes'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSLunes'}=date("g:i a", $HRS);
			}
			if (isset($data['datos_reg'][0]->{'Martes'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HEMartes'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSMartes'});
				$data['datos_reg'][0]->{'HEMartes'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSMartes'}=date("g:i a", $HRS);
			}
			if (isset($data['datos_reg'][0]->{'Miercoles'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HEMiercoles'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSMiercoles'});
				$data['datos_reg'][0]->{'HEMiercoles'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSMiercoles'}=date("g:i a", $HRS);
			}
			
			if (isset($data['datos_reg'][0]->{'Jueves'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HEJueves'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSJueves'});
				$data['datos_reg'][0]->{'HEJueves'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSJueves'}=date("g:i a", $HRS);
			}
			if (isset($data['datos_reg'][0]->{'Viernes'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HEViernes'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSViernes'});
				$data['datos_reg'][0]->{'HEViernes'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSViernes'}=date("g:i a", $HRS);
			}
			if (isset($data['datos_reg'][0]->{'Sabado'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HESabado'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSSabado'});
				$data['datos_reg'][0]->{'HESabado'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSSabado'}=date("g:i a", $HRS);
			}
			if (isset($data['datos_reg'][0]->{'Domingo'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HEDomingo'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSDomingo'});
				$data['datos_reg'][0]->{'HEDomingo'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSDomingo'}=date("g:i a", $HRS);
			}
			if (isset($data['datos_reg'][0]->{'Festivo'})) {
				$HRE=strtotime($data['datos_reg'][0]->{'HEFestivo'}); //codigo para convertir de hora de 12 a 24 hrs					
				$HRS=strtotime($data['datos_reg'][0]->{'HSFestivo'});
				$data['datos_reg'][0]->{'HEFestivo'}=date("g:i a", $HRE);
				$data['datos_reg'][0]->{'HSFestivo'}=date("g:i a", $HRS);
			}
			$this->load->view('Encuesta/4', $data);
			// print_r($data['datos_reg']);
		}
	}

	function p5($Id){
		$data['persona']=$this->M_plantilla->buscarID($Id);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			$datos['IdPersonal'] = $Id;
			if ($datos['Institucion_1']<>'2009481') {
				unset($datos['otro_instituto_1']);
			}
			if ($datos['tiene_cedula_1']==0) {
				unset($datos['cedula_1']);
			}
			
			// print_r($datos);
			$this->M_encuesta->update($datos);
			redirect('Encuesta/p6/'.$Id);
		} else {
			$data['grado']=$this->M_encuesta->grado();
			$this->load->view('Encuesta/5', $data);
		}
	}

	function grado(){
		if ($this->input->post('Grado_1')) {
			$GRADO = $this->input->post('Grado_1');
		}
		if ($this->input->post('Grado_2')) {
			$GRADO = $this->input->post('Grado_2');
		}
		if ($this->input->post('Grado_3')) {
			$GRADO = $this->input->post('Grado_3');
		}
		if ($this->input->post('Grado_4')) {
			$GRADO = $this->input->post('Grado_4');
		}
		if ($this->input->post('Grado_5')) {
			$GRADO = $this->input->post('Grado_5');
		}
		switch ($GRADO) {
			case 2039843:
			$formacion = $this->M_encuesta->t28();
			echo '<option value="">Seleccione Curso</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->CURSOS_AUXILIARES.'</option>';
			}
			break;
			case 2039848:
			$formacion = $this->M_encuesta->t29();
			echo '<option value="">Seleccione Curso</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039849:
			$formacion = $this->M_encuesta->t30();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039850:
			$formacion = $this->M_encuesta->t27();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039851:
			$formacion = $this->M_encuesta->t27();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039856:
			$formacion = $this->M_encuesta->t31();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039852:
			$formacion = $this->M_encuesta->t32();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039853:
			$formacion = $this->M_encuesta->t33();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039854:
			$formacion = $this->M_encuesta->t34();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2039854:
			$formacion = $this->M_encuesta->t35();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			default:
			echo '<option value="0">No Aplica</option>';
		}
	}

	function escuela(){
		if ($this->input->post('Grado_1')) {
			$GRADO = $this->input->post('Grado_1');
		}
		if ($this->input->post('Grado_2')) {
			$GRADO = $this->input->post('Grado_2');
		}
		if ($this->input->post('Grado_3')) {
			$GRADO = $this->input->post('Grado_3');
		}
		if ($this->input->post('Grado_4')) {
			$GRADO = $this->input->post('Grado_4');
		}
		if ($this->input->post('Grado_5')) {
			$GRADO = $this->input->post('Grado_5');
		}
		if($GRADO==2039842 or $GRADO==2039846 or $GRADO==2039843 or $GRADO==2039848 or $GRADO==2039847 or $GRADO==2039857){
			echo '<option value="0">No Aplica</option>';
		} else {
			$formacion = $this->M_encuesta->t36();
			echo '<option value="">Seleccione Instituto</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->INSTITUCION.'</option>';
			}
		}
	}

	function p6($Id){
		$data['persona']=$this->M_plantilla->buscarID($Id);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			unset($datos[0]);
			// print_r($datos);
			$datos['IdPersonal'] = $Id;
			$this->M_encuesta->update($datos);
			redirect('Encuesta/p7/'.$Id);
		} else {
			$data['colegio']=$this->M_encuesta->t39_colegio();
			$data['ciclo']=$this->M_encuesta->t37_ciclo_formativo();
			$data['certifica']=$this->M_encuesta->t40_certificacion();
			$data['Idioma']=$this->M_encuesta->t41_idioma();
			$this->load->view('Encuesta/6', $data);
		}
	}

	function carrera(){
		$ID = $this->input->post('id');
		switch ($ID) {
			case 2021012:
			$formacion = $this->M_encuesta->t34();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;
			case 2021013:
			$formacion = $this->M_encuesta->t35();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;

			case 2021014:
			$formacion = $this->M_encuesta->t27();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;

			case 2021015:
			$formacion = $this->M_encuesta->t30();
			echo '<option value="">Seleccione Titulo</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;

			case 2021016:
			echo '<option value="2045757">LICENCIATURA EN MEDICINA</option>';
			break;

			case 2021017:
			$formacion = $this->M_encuesta->t29();
			echo '<option value="">Seleccione Curso</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->TITULO.'</option>';
			}
			break;

			case 2021018:
			echo '<option value="0">NO APLICA</option>';
			break;
		}
	}

	function escuela2(){
		$ID = $this->input->post('id');
		if ($ID<>2021018) {
			$formacion = $this->M_encuesta->t36();
			echo '<option value="">Seleccione Instituto</option>';
			foreach ($formacion as $item) {
				echo '<option value="'.$item->ID.'">'.$item->INSTITUCION.'</option>';
			}
		} else {
			echo '<option value="0">NO APLICA</option>';
		}
	}

	function certifica(){
		$formacion = $this->M_encuesta->t43_nivel_de_dominio();
		echo '<option value="">Seleccione Opcion</option>';
		foreach ($formacion as $item) {
			echo '<option value="'.$item->ID.'">'.$item->NOMBRE.'</option>';
		}
	}

	function lenguaindigena(){
		$formacion = $this->M_encuesta->t42_lengua_indigena();
		echo '<option selected="selected" value="">--Seleccione Opción--</option>';
		foreach ($formacion as $item) {
			// if($i->ID==set_value('Lengua_indigena',@$datos_reg[0]->Lengua_indigena)){
				// echo '<option value="'.$item->ID.'" selected="selected">'.$item->NOMBRE.'</option>';
			// } else {
			echo '<option value="'.$item->ID.'">'.$item->NOMBRE.'</option>';
			// }
		}
	}

	function p7($Id){
		$data['persona']=$this->M_plantilla->buscarID($Id);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			// unset($datos[0]);
			// print_r($datos);
			$datos['IdPersonal'] = $Id;
			$this->M_encuesta->update($datos);
			$this->session->set_flashdata("Aviso","Encuesta Finalizada Exitosamente.
				<br> Gracias por participar");
			redirect('Encuesta');
		} else {
			// $data['estado']=$this->M_encuesta->estado();
			$data['curso']=$this->M_encuesta->t44_nombre_del_curso();
			$this->load->view('Encuesta/7', $data);
		}
	}

	function Entidad(){
		$formacion = $this->M_encuesta->estado();
		echo '<option value="">Seleccione Opción</option>';
		foreach ($formacion as $item) {
		// 	if($i->ID==set_value('Entidad_Federativa_1',@$datos_reg[0]->Entidad_Federativa_1)){
		// 		echo '<option value="'.$item->ID.'" selected="selected">'.$item->ENTIDAD_FEDERATIVA.'</option>';
		// 	} else {
			echo '<option value="'.$item->ID.'">'.$item->ENTIDAD_FEDERATIVA.'</option>';
			// }
		}
	}

	function Curso(){
		$formacion = $this->M_encuesta->t44_nombre_del_curso();
		echo '<option value="">Seleccione Opcion</option>';
		foreach ($formacion as $item) {
			echo '<option value="'.$item->ID.'">'.$item->NOMBRE.'</option>';
		}
	}

	function cargagrado(){
		$formacion = $this->M_encuesta->grado();
		echo '<option value="">Seleccione una Opción</option>';
		foreach ($formacion as $item) {
			echo '<option value="'.$item->ID.'">'.$item->GRADO_ACADEMICO.'</option>';
		}
	}

	function cargaciclo(){
		$formacion = $this->M_encuesta->T45_ciclo_formacion();
		echo '<option value="">Seleccione una Opción</option>';
		foreach ($formacion as $item) {
			echo '<option value="'.$item->ID.'">'.$item->NOMBRE.'</option>';
		}
	}

	function Municipio(){
		$Nombre = $this->input->post('linea');
		$formacion = $this->M_encuesta->municipio_where($Nombre);
		echo '<option value="" selected >Seleccione una Opción</option>';
		foreach ($formacion as $item) {
			echo '<option value="'.$item->ID.'">'.$item->MUNICIPIO.'</option>';
		}
	}

	function Localidad(){
		$Nombre = $this->input->post('linea');
		$formacion = $this->M_encuesta->localidad_where($Nombre);
		echo '<option value="">Seleccione una Opción</option>';
		foreach ($formacion as $item) {
			echo '<option value="'.$item->ID.'">'.$item->LOCALIDAD.'</option>';
		}
	}

	function localselect(){
		echo '<label>18. Localidad</label>
		<select class="form-control select2" style="width: 100%;" name="Localidad" id="Localidad" required="">
		<option value="">Seleccione primero un Municipio</option>
		</select>';
	}

	function localtext(){
		echo '<label>18. Localidad</label>
		<input type="text" class="form-control" name="Localidad" id="Localidad" placeholder="Nombre de Localidad" required="">';
	}

	function p8($Id){
		$data['persona']=$this->M_plantilla->buscarID($Id);
		$data['conyugue']=$this->M_encuesta->conyugue($Id);
		$this->load->library('table');
		$data['Familiar']=$this->M_inicio->familiar($Id);
		$this->load->view('Encuesta/8', $data);
		// print_r($data['Familia']);
	}

	function addesposo($Id){
		$datos = $this->input->post();
		$datos['IdPersonal'] = $Id;
		$datos['IdParentesco'] = 2;
		$datos['IdUsuario'] = 2;
		$datos['Nota'] = "Captura hecha desde la Encuesta DGIS";
		$this->M_plantilla->insert_familiar($datos);
		$this->session->set_flashdata("Aviso","Datos del Conyugue Agregados.");
		redirect('Encuesta/p8/'.$Id);
	}

	function addson($Id){
		$datos = $this->input->post();
		$datos['IdPersonal'] = $Id;
		$datos['IdParentesco'] = 1;
		$datos['IdUsuario'] = 2;
		$datos['Nota'] = "Captura hecha desde la Encuesta DGIS";
		$this->M_plantilla->insert_familiar($datos);
		$this->session->set_flashdata("Aviso","Datos de ".$datos['Nombre']." ".$datos['Apellidos']." Agregados Correctamente.");
		redirect('Encuesta/p8/'.$Id);
	}

	function p1_5($Id, $RFC){
		$data['persona'] = $this->M_encuesta->RFC($RFC);
		$data['datos_reg']= $this->M_encuesta->existe($Id);
		if($this->input->post()){
			$datos = $this->input->post();
			//EDAD
			$cumpleanos = new DateTime($datos['Fecha_Nacimiento']);
			$hoy = new DateTime();
			$annos = $hoy->diff($cumpleanos);
			$datos['Edad'] = $annos->y;
			//NACIONALIDAD
			if ($datos['Pais_Nacimiento']=='142') {
				$datos['Nacionalidad'] = '2047951';
			} else {
				$datos['Nacionalidad'] = '2047952';
			}
			//IdPersonal
			$datos['IdPersonal'] = $Id;
			//Sexo
			if ($datos['Sexo']=='H') {
				$datos['Sexo'] = '2029389';
			}
			if ($datos['Sexo']=='M') {
				$datos['Sexo'] = '2029390';
			}
			//FIEL
			if($datos['Tiene_Fiel']==0){
				$datos['Vigencia_Fiel'] = '0000-00-00';
			}
			//Telefono
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
			unset($datos['NOMBRES']);
			unset($datos['APELLIDOS']);
			if ($data['datos_reg']==False) {
				$this->M_encuesta->crear($datos);
			} else {
				$this->M_encuesta->update($datos);
			}
			redirect('Encuesta/p8/'.$Id);
				// print_r($datos);
		} else {
			$data['fail'] = NULL;
			$data['pais']=$this->M_encuesta->pais();
			$data['estado']=$this->M_encuesta->estado();
			// $data['municipio']=$this->M_encuesta->municipio();
			$data['conyugal']=$this->M_encuesta->conyugal();
			$this->load->view('Encuesta/1_5', $data);
							// print_r($data['persona']);

		}
	}

	function upload($Id, $RFC){
		$nombre_fichero = "//192.168.1.60/HM2018/docs/".$Id;
		if (!file_exists($nombre_fichero)) {
		    // echo "El fichero $nombre_fichero No existe";
			mkdir($nombre_fichero, 0777, true);
		}
		$config['upload_path']          = $nombre_fichero;
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 10240;
		$config['file_name']			= 'foto.JPG';
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
			$data['persona'] = $this->M_encuesta->RFC($RFC);
			$data['datos_reg']= $this->M_encuesta->existe($Id);
			$data['pais']=$this->M_encuesta->pais();
			$data['estado']=$this->M_encuesta->estado();
			$data['conyugal']=$this->M_encuesta->conyugal();			
			$data['fail']= $this->upload->display_errors();
			$this->load->view('Encuesta/1_5', $data);
		} else {
			$this->crearMiniatura($Id);
			redirect('Encuesta/p1_5/'.$Id.'/'.$RFC);
		}
	}

	function crearMiniatura($Id){
        // $config['image_library'] = 'ImageMagick';
		$config['image_library'] = 'gd2';
        //192.168.1.60/HM2018/docs/
		$config['source_image'] = '//192.168.1.60/HM2018/docs/'.$Id.'/foto.JPG';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = False;
        // $config['new_image']='//192.168.1.60/HM2018/images/Expediente/fotoscredencial/'.$Id.'.JPG';
        $config['thumb_marker']= $Id;//captura_thumb.png
        $config['width'] = 128;
        $config['height'] = 128;
        // $config['rotation_angle'] = 'vrt';
        // $config['file_name'] = $Id.'.JPG';
        $this->load->library('image_lib', $config); 
        if ( ! $this->image_lib->resize())
        {
        	echo $this->image_lib->display_errors();
        }
        // print_r($config);
    }

    function eliminafamiliar($Id, $IdFamiliar){
    	$this->M_encuesta->eliminarfamiliar($IdFamiliar);
    	redirect('Encuesta/p8/'.$Id);
    }


}