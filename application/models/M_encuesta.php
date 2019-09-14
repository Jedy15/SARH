<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_encuesta extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	function crear($datos){
		$this->db->insert('t1', $datos);
	}

	function update($datos){
		$this->db->where('IdPersonal', $datos['IdPersonal']);
		$this->db->update('t1', $datos);
	}

	function RFC($RFC){
		$this->db->where('RFC', $RFC);
		$query = $this->db->get('tblpersonal');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	function existe($Id){
		$this->db->where('IdPersonal', $Id);
		$query = $this->db->get('t1');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	function pais(){
		$query = $this->db->get('01_pais_de_nacimiento');
		return $query->result();
	}

	function estado(){
		$query = $this->db->get('02_entidad');
		return $query->result();
	}

	function municipio(){		
		$this->db->where('ENTIDAD_FEDERATIVA', 'CHIAPAS');
		
		$query = $this->db->get('03_municipio');
		return $query->result();
	}

	function conyugal(){
		$query = $this->db->get('06_estado_conyugal');
		return $query->result();
	}

	function localidad(){
		// $this->db->cache_on(); 
		$query = $this->db->get('04_localidad');
		return $query->result();
	}

	function vialidad(){
		$query = $this->db->get('09_tipo_vialidad');
		return $query->result();
	}

	function asentamiento(){
		$query = $this->db->get('10_tipo_asentamiento');
		return $query->result();
	}

	function actividad(){
		$query = $this->db->get('12_tipo_actividad');
		return $query->result();	
	}

	function AreaTrabajo(){
		$query = $this->db->get('14_area_trabajo');
		return $query->result();	
	}

	function TipoPersonal(){
		$query = $this->db->get('15_tipo_personal');
		return $query->result();	
	}

	function especialidad(){
		$query = $this->db->get('18_especialidad');
		return $query->result();	
	}

	function grado(){
		$query = $this->db->get('26_grado_academico');
		return $query->result();	
	}

	function t27(){
		$this->db->order_by('TITULO', 'asc');
		
		$query = $this->db->get('`27_lic_ing_y_tsu`');
		return $query->result();
	}

	function t28(){
		$this->db->order_by('TITULO', 'ASC');

		$query = $this->db->get('`28_cursos_auxiliares`');
		return $query->result();
	}

	function t29(){
		$this->db->order_by('TITULO', 'asc');

		$query = $this->db->get('`29_cursos_postecnico_enfermeria`');
		return $query->result();
	}

	function t30(){
		$this->db->order_by('TITULO', 'asc');

		$query = $this->db->get('`30_carreras_tecnicas_completas`');
		return $query->result();
	}

	function t31(){
		$this->db->order_by('TITULO', 'asc');

		$query = $this->db->get('`31_especialidades_no_medicas`');
		return $query->result();
	}

	function t32(){
		$this->db->order_by('TITULO', 'asc');

		$query = $this->db->get('`32_maestrias`');

		return $query->result();
	}

	function t33(){
		$this->db->order_by('TITULO', 'asc');

		$query = $this->db->get('`33_doctorados`');

		return $query->result();
	}

	function t34(){
		$this->db->order_by('TITULO', 'asc');

		$query = $this->db->get('`34_especialidades_medicas`');
		return $query->result();
	}

	function t35(){
		$this->db->order_by('TITULO', 'asc');

		$query = $this->db->get('`35_cursos_de_alta_especialidad`');

		return $query->result();
	}

	function t36(){
		$this->db->order_by('INSTITUCION', 'asc');
		$query = $this->db->get('`36_institucion_educativa`');
		return $query->result();
	}

	function t37_ciclo_formativo(){
		$query = $this->db->get('`37_ciclo_formativo`');
		return $query->result();
	}
	function t39_colegio(){
		$query = $this->db->get('`39_colegio`');
		return $query->result();
	}

	function t40_certificacion(){
		$query = $this->db->get('`40_nombre_de_la_certificacion`');
		return $query->result();
	}

	function t41_idioma(){
		$query = $this->db->get('`41_idioma`');
		return $query->result();
	}
	function t43_nivel_de_dominio(){
		$query = $this->db->get('`43_nivel_de_dominio`');
		return $query->result();
	}

	function t42_lengua_indigena(){
		$query = $this->db->get('`42_lengua_indigena`');
		return $query->result();
	}

	function t44_nombre_del_curso(){
		$this->db->order_by('NOMBRE');
		$query = $this->db->get('`44_Cursos`');
		return $query->result();
	}

	function T45_ciclo_formacion(){
		$query = $this->db->get('`45_ciclo_formacion`');
		return $query->result();
	}

	function municipio_where($where){
		$this->db->where('ENTIDAD_FEDERATIVA', $where);
		$this->db->order_by('MUNICIPIO', 'ASC');
		$query = $this->db->get('03_municipio');
		return $query->result();
	}

	function localidad_where($where){
		$this->db->where('MUNICIPIO', $where);
		$query = $this->db->get('04_localidad');
		return $query->result();
	}

	function conyugue($Id){
		$this->db->where('IdPersonal', $Id);
		$this->db->where('IdParentesco', 2);
		$query = $this->db->get('tfamiliar');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function eliminarfamiliar($Id){
		$this->db->where('IdFamiliar', $Id);
		$this->db->delete('tfamiliar');
	}
}