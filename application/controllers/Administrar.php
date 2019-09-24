<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrar extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('M_administrar','M_inicio'));
        $this->load->library(array('session'));
        if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		if ($this->session->userdata("IdPerfil")>3) {
			$this->session->set_flashdata("error","ACCESO DENEGADO");
			redirect('Plantilla');	
		}		
	}

    function ListaPrograma(){
        $datos = $this->M_administrar->ListaPrograma();
        echo json_encode($datos);
    }

    function EditarPrograma(){
        if ($this->input->post()) {
            $datos = $this->input->post();
            $datos['Programa'] = $datos['Programa2'];
            $datos['Nota'] = $datos['Nota2']; 
            unset($datos['Programa2']);
            unset($datos['Nota2']);
            $status = $this->M_administrar->UpdatePrograma($datos);
            if ($status) {
                $this->session->set_flashdata("Aviso","Registro Completo");
            } else {
                $this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
            }
            redirect('Administrar/Programa');
        } else {
            $this->session->set_flashdata('error', 'Error');
            redirect('Plantilla','refresh');
        }
    }

    function NuevoPrograma(){
        if ($this->input->post()) {
            $datos = $this->input->post();
            $status = $this->M_administrar->InsertarPrograma($datos);
            if ($status) {
                $this->session->set_flashdata("Aviso","Registro Completo");
            } else {
                $this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
            }
            redirect('Administrar/Programa');            
        } else {
            $this->session->set_flashdata('error', 'Error');
            redirect('Plantilla','refresh');
        }
    }

    function CargarTablaPrograma(){
        $data['data'] = $this->M_administrar->t_programa();
        echo json_encode($data);
    }    

    function Programa(){
        $this->load->view('Admin/v_programa');
    }

    function EditarSubseccion(){
        if ($this->input->post()) {
            $datos = $this->input->post();
            $datos['Subseccion'] = $datos['Subseccion2'];
            $datos['Nota'] = $datos['Nota2'];
            $datos['IdSeccion'] = $datos['IdSeccion2'];
            unset($datos['IdSeccion2']);
            unset($datos['Subseccion2']);
            unset($datos['Nota2']);
            $status = $this->M_administrar->UpdateSubseccion($datos);
            if ($status) {
                $this->session->set_flashdata("Aviso","Registro Completo");
            } else {
                $this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
            }
            redirect('Administrar/Subseccion');
        } else {
            $this->session->set_flashdata('error','Error');
            redirect('Plantilla');
        }
    }

    function NuevoSubseccion(){
        if (empty($this->input->post())) {
            $this->session->set_flashdata("error","Error");
            redirect('Plantilla');
        }
        $datos = $this->input->post();
        $status = $this->M_administrar->InsertarSubseccion($datos);
        if ($status) {
            $this->session->set_flashdata("Aviso","Registro Completo");
        } else {
            $this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
        }
        redirect('Administrar/Subseccion');
    }

    function ListaSubseccion(){
        $r=$this->input->post();
        $datos = $this->M_administrar->ListaSubSeccion($r);
        echo json_encode($datos);
    }

    function CargarTablaSubseccion(){
        $data['data'] = $this->M_administrar->SubSeccion();
        echo json_encode($data);
    }

    function Subseccion(){
        $this->load->view('Admin/v_lista_subseccion');
    }

    function EditarSeccion(){
        if (empty($this->input->post())) {
            $this->session->set_flashdata("error","Error");
            redirect('Plantilla');
        }
        $datos = $this->input->post();
        $datos['Seccion'] = $datos['Seccion2'];
        $datos['Nota'] = $datos['Nota2'];
        unset($datos['Seccion2']);
        unset($datos['Nota2']);
        $status = $this->M_administrar->UpdateSeccion($datos);
        if ($status) {
            $this->session->set_flashdata("Aviso","Registro Completo");
        } else {
            $this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
        }
        redirect('Administrar/SeccionSindical');
    }

    function NuevoSeccion(){
        if (empty($this->input->post())) {
            $this->session->set_flashdata("error","Error");
            redirect('Plantilla');
        }
        $datos = $this->input->post();
        $status = $this->M_administrar->InsertarSeccion($datos);
        if ($status) {
            $this->session->set_flashdata("Aviso","Registro Completo");
        } else {
            $this->session->set_flashdata("error","Error en el Registro Intentelo Nuevamente");
        }
        redirect('Administrar/SeccionSindical');
    }

    function ListaSeccion(){
        $datos = $this->M_administrar->ListaSeccion();
        echo json_encode($datos);
    }

    function CargarTablaSindicato(){
        $data['data'] = $this->M_administrar->seccion();
        echo json_encode($data);
    }

    function SeccionSindical(){
        $this->load->view('Admin/v_lista_seccion');
    }

    function Pdf(){
        $this->load->view('Reporte/Pdf');
    }

    function crearpdf(){
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('Reporte/Pdf',[],true);
      $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
    }

    function NuevaFuncion(){
    	$datos = $this->input->post();
    	$this->M_administrar->insertFuncion($datos);
    	$this->session->set_flashdata("Aviso","Registro Agregado Exitosamente");
    	redirect('Administrar/Funcion');
    }

    function EliminarFuncion(){
    	$datos = $this->input->post();
    	$this->M_administrar->deleteFuncion($datos);
    	$this->session->set_flashdata("Aviso","Registro Eliminado");
    	redirect('Administrar/Funcion');
    }

    function EditarFuncion(){
    	$datos = $this->input->post();
    	$this->M_administrar->updateFuncion($datos);
    	$this->session->set_flashdata("Aviso","Datos Actualizados Exitosamente");
    	redirect('Administrar/Funcion');
    }

    function CargarFunciones(){
    	$datos['data'] = $this->M_administrar->funciones();
    	echo json_encode($datos);
    }

    function Funcion(){
    	$this->load->view('Admin/v_funciones');
    }

    function NuevoJefe(){
    	$datos = $this->input->post();
    	$this->M_administrar->insertJefe($datos);
    	$this->session->set_flashdata("Aviso","Registro Agregado Exitosamente");
    	redirect('Administrar/Jefes_Deptos');
    }

    function EliminarJefe(){
    	$datos = $this->input->post();
    	$this->M_administrar->deleteJefe($datos);
    	$this->session->set_flashdata("Aviso","Registro Eliminado");
    	redirect('Administrar/Jefes_Deptos');
    }

    function EditarJefe(){
    	$datos = $this->input->post();
    	$this->M_administrar->updateJefe($datos);
    	$this->session->set_flashdata("Aviso","Datos Actualizados Exitosamente");
    	redirect('Administrar/Jefes_Deptos');
    }

    function CargarJefes(){
    	$datos['data'] = $this->M_administrar->JefesDepto();
    	echo json_encode($datos);
    }

    function Jefes_Deptos(){
    	$this->load->view('Admin/v_jefes');
    }

    function CargarMonitor(){
    	$datos['data'] = $this->M_administrar->oraculo(null);
    	echo json_encode($datos);
    }

    function Monitor(){
		// $data['lista'] = $this->M_administrar->oraculo();
    	$this->load->view('Admin/User/v_list_oraculo');
    }

    function EditarDepto($id){
    	if($this->input->post()){
    		$datos = $this->input->post();
    		$datos['IdDepto'] = $id;
			// $datos['IdUsuario']= $this->session->userdata("id");
			// print_r($datos);
    		$this->M_administrar->update_Depto($datos);
    		$this->session->set_flashdata("Aviso","Datos Actualizados Exitosamente");
    		redirect('Administrar/Depto');
    	} else {
    		$data['reg']=$this->M_inicio->deptos(null);
    		$data['Depto'] = $this->M_inicio->deptos($id);
    		$this->load->view('Admin/v_depto', $data);
    	}
    }

    function AltaDepto(){
    	$datos = $this->input->post();
		// $datos['IdUsuario']= $this->session->userdata("id");
    	$this->M_administrar->insert_Depto($datos);
		// print_r($datos);		
    	$this->session->set_flashdata("Aviso","Departamento Agregado Exitosamente");
    	redirect('Administrar/Depto');
    }


    function Depto(){
    	$data['reg']=$this->M_inicio->deptos(null);
    	$this->load->view('Admin/v_depto', $data);
    }

    function Servicio(){
    	$data['reg']=$this->M_administrar->servicios();
    	$this->load->view('Admin/v_servicio', $data);
    }

    function AltaServicio(){
    	$datos = $this->input->post();
    	$datos['IdUsuario']= $this->session->userdata("id");
    	$this->session->set_flashdata("Aviso","Servicio Agregado Exitosamente");
    	$this->M_administrar->insert_Servicio($datos);
		// print_r($datos);
    	redirect('Administrar/Servicio');
    }

    function EditarServicio($id){
    	if($this->input->post()){
    		$datos = $this->input->post();
    		$datos['IdServicio'] = $id;
    		$datos['IdUsuario']= $this->session->userdata("id");
			// print_r($datos);
    		$this->M_administrar->update_Servicio($datos);
    		$this->session->set_flashdata("Aviso","Datos Actualizados Exitosamente");
    		redirect('Administrar/Servicio');
    	} else {
    		$data['reg']=$this->M_administrar->servicios();
    		$data['Servicio'] = $this->M_administrar->selec_Servicio($id);
    		$this->load->view('Admin/v_servicio', $data);
    	}
    }

}