<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inicio extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	public function deptos($id){
		if (empty($id)) {
			$resultados = $this->db->get("tbldeptos");
			return $resultados->result();
		}
		else
		{			
			$this->db->where('IdDepto',$id);
			$resultados = $this->db->get("tbldeptos");
			return $resultados->result();
		}
	}

	public function jefes(){
		$resultados = $this->db->get("tbljefe");
		return $resultados->result();
	}

	public function turnos(){
		$resultados = $this->db->get("tblturno");
		return $resultados->result();
	}

	public function estudios($id){
		$this->db->select('`tblregestudio`.*, `26_grado_academico`.`GRADO_ACADEMICO` AGRUPACION, 36_institucion_educativa.INSTITUCION, `tblformacion`.`FORMACION_ACADEMICA`, `tblusuario`.`Usuario`, `tblusuario`.`Nombre`, `tblusuario`.`Apellido`');
		$this->db->from('tblregestudio');
		$this->db->join('tblformacion', '`tblregestudio`.`IdTitulo` = `tblformacion`.`CATALOG_KEY`', 'left');
		$this->db->join('36_institucion_educativa', 'tblregestudio.IdColegio = 36_institucion_educativa.ID', 'left');
		$this->db->join('26_grado_academico', 'tblregestudio.IdGrado = 26_grado_academico.ID', 'left');
		$this->db->join('tblusuario', '`tblregestudio`.`IdUsuario` = `tblusuario`.`IdUsuario`', 'left');
		// $this->db->join('tblgrado', '`tblformacion`.`GRADO` = `tblgrado`.`GRADO`', 'left');
		$this->db->where('tblregestudio`.`IdPersonal',$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function muni(){
		$this->db->select('IdMunicipio id, MUNICIPIO text');
		$resultados = $this->db->get("tblmunicipio");
		return $resultados->result();
	}

	public function reg(){
		$resultados = $this->db->get("tbltiporegistro");
		return $resultados->result();
	}

	public function tra(){
		$resultados = $this->db->get("tbltipotrabajador");
		return $resultados->result();
	}

	public function funcion(){
		$resultados = $this->db->get("tblfuncion");
		return $resultados->result();
	}

	public function codigo(){
		$resultados = $this->db->get("tbltabulador");
		return $resultados->result();
	}

	public function unidad(){
		$this->db->order_by('NOMBREUNIDAD');
		$resultados = $this->db->get("tunidad");
		return $resultados->result();
	}

	public function horario($id){
		if (empty($id)) {
			$resultados = $this->db->get("thorario");
			return $resultados->result();
		}
		else
		{
			$this->db->select('thorario.*, tbldeptos.DEPARTAMENTO, tblturno.Turno, tblfuncion.Funcion, tbljefe.JEFE, tbltiporegistro.TIPOREGISTRO, t_servicio.Servicio');
			$this->db->from('thorario');
			$this->db->join('tblturno', '`thorario`.`IdTurno` = `tblturno`.`IdTurno`', 'left');
			$this->db->join('tbldeptos', '`thorario`.`IdDepto` = `tbldeptos`.`IdDepto`', 'left');
			$this->db->join('tblfuncion', '`thorario`.`IdFuncion` = `tblfuncion`.`IdFuncion`', 'left');
			$this->db->join('tbljefe', '`thorario`.`IdJefe` = `tbljefe`.`IdJefe`', 'left');
			$this->db->join('tbltiporegistro', '`thorario`.`IdRegistro` = `tbltiporegistro`.`IdTipoRegistro`', 'left');
			$this->db->join('t_servicio', '`thorario`.`IdServicio` = `t_servicio`.`IdServicio`', 'left');
			$this->db->where('thorario`.`IdPersonal',$id);
			$this->db->order_by('thorario.IdHorario', 'desc');
			$resultados = $this->db->get();
			return $resultados->result();
		}
	}


	public function laboral($id){
		if (empty($id)) {
			$resultados = $this->db->get("tlaboral");
			return $resultados->result();
		}
		else
		{
			$this->db->select('tlaboral.*, `tbltabulador`.`PUESTO`, `tbltipotrabajador`.`TIPOTRABAJADOR`, `tunidad`.`NOMBREUNIDAD`, testatus.Estatus');
			$this->db->from('tlaboral');
			$this->db->join('tunidad', '`tlaboral`.`IdAds` = `tunidad`.`ID`', 'left');
			$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
			$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
			$this->db->join('testatus', 'tlaboral.IdEstatus = testatus.IdEstatus', 'left');
			$this->db->where('tlaboral`.`IdPersonal',$id);
			$this->db->order_by('IdLaboral', 'desc');
			$resultados = $this->db->get();
			return $resultados->result();
		}
	}

	function estatus(){
		$resultados=$this->db->get('testatus');
		return $resultados->result();
	}

	function id_usuario($id){
		$this->db->select('Nombre, Apellido');
		$this->db->where('IdUsuario', $id);
		$query = $this->db->get('tblusuario');
		return $query->result();
	}

	public function monitor($accion, $tabla, $usuario){
		$this ->db->set('IdAccion', $accion);//agrega los datos a la instruccion sql
		$this ->db->set('IdTabla' , $tabla);
		// if ($usuario = null){
		// 	$usuario = $this->session->userdata("id");
		// }
		$this ->db->set('IdUsuario' , $usuario);		
		$this->db->insert('tmonitor');
	}

	function carreras(){
		$this->db->order_by('FORMACION_ACADEMICA');
		$resultados = $this->db->get("tblformacion");
		return $resultados->result();
	}

	function parentesco(){
		$query = $this->db->get('TParentesco');
		return $query->result();
	}

	function familiar($id){
		$this->db->select('`tfamiliar`.*, `tparentesco`.*, `tblusuario`.`Usuario`, `tblusuario`.`Nombre` as user, `tblusuario`.`Apellido`, `tblusuario`.`Usuario`');
		$this->db->from('tfamiliar');
		$this->db->join('tparentesco', '`tfamiliar`.`IdParentesco` = `tparentesco`.`IdParentesco`', 'left');
		$this->db->join('tblusuario', '`tfamiliar`.`IdUsuario` = `tblusuario`.`IdUsuario`', 'left');
		$this->db->where('tfamiliar`.`IdPersonal',$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
}