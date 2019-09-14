<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_administrar extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function ListaPrograma(){
		$this->db->select('IdPrograma id, Programa text');
		$this->db->where('IdPrograma >', 0);
		$r = $this->db->get('t_programa');
		return $r->result();
	}

	function UpdatePrograma($datos){
		$this->db->where('IdPrograma', $datos['IdPrograma']);
		return $this->db->update('t_programa', $datos);
	}

	function InsertarPrograma($datos){
		$this ->db->set($datos);
		return $this->db->insert('t_programa');
	}

	function t_programa(){
		$this->db->where('IdPrograma >', 0);
		$r = $this->db->get('t_programa');
		return $r->result();
	}

	function InsertarSubseccion($datos){
		$this ->db->set($datos);
		return $this->db->insert('t_sub_seccion');
	}

	function UpdateSubseccion($datos){
		$this->db->where('Id_Subseccion', $datos['Id_Subseccion']);
		return $this->db->update('t_sub_seccion', $datos);
	}

	function SubSeccion(){
		$this->db->select('t_sub_seccion.*, t_seccion.Seccion');
		$this->db->join('t_seccion', 't_sub_seccion.IdSeccion = t_seccion.IdSeccion', 'inner');
		$this->db->where('Id_Subseccion >', 0);
		$r = $this->db->get('t_sub_seccion');
		return $r->result();
	}

	function ListaSubSeccion($IdSeccion=NULL){
		$this->db->select('Id_Subseccion id, Subseccion text');
		$this->db->where('Id_Subseccion >', 0);
		if ($IdSeccion) {
			$this->db->where($IdSeccion);
		}
		$r = $this->db->get('t_sub_seccion');
		if ($r->num_rows()>0) {
			return $r->result();
		} else {
			return null;
		}
	}

	function UpdateSeccion($datos){
		$this->db->where('IdSeccion', $datos['IdSeccion']);
		return $this->db->update('t_seccion', $datos);
	}

	function InsertarSeccion($datos){
		$this ->db->set($datos);
		return $this->db->insert('t_seccion');
	}

	function seccion(){
		$this->db->where('IdSeccion >', 0);
		$r = $this->db->get('t_seccion');
		return $r->result();
	}

	function ListaSeccion(){
		$this->db->select('IdSeccion id, Seccion text');
		$this->db->where('IdSeccion >', 0);
		$r = $this->db->get('t_seccion');
		return $r->result();
	}


	function insertFuncion($datos){
		$this->db->insert('tblfuncion', $datos);
	}

	function deleteFuncion($datos){
		$this->db->where('IdFuncion', $datos['IdFuncion']);
		$this->db->delete('tblfuncion', $datos);
	}

	function updateFuncion($datos){
		$this->db->where('IdFuncion', $datos['IdFuncion']);
		$this->db->update('tblfuncion', $datos);
	}

	function funciones(){
		$query = $this->db->get('tblfuncion');
		return $query->result();
	}

	function insertJefe($datos){
		$this->db->insert('tbljefe', $datos);
	}

	function deleteJefe($datos){
		$this->db->where('IdJefe', $datos['IdJefe']);
		$this->db->delete('tbljefe');
	}

	function updateJefe($datos){
		$this->db->where('IdJefe', $datos['IdJefe']);
		$this->db->update('tbljefe', $datos);
	}

	function JefesDepto(){
		$this->db->order_by('JEFE', 'desc');
		$query = $this->db->get('tbljefe');
		return $query->result();
	}

	function oraculo(){
		// if($mes){
		// 	$where = 'month(Fecha) = 'echo $mes;
		// } else {
		$where = 'month(Fecha) = month(now())';
		// }
		$this->db->select('`tmonitor`.`Id`, `tmonitor`.`Fecha`, `tmonitor`.`nota`, `tblusuario`.`Usuario`, `tblusuario`.`Nombre`, `tblusuario`.`Apellido`, `tablas`.`Tabla`, `taccion`.`accion`');
		$this->db->from('tmonitor');
		$this->db->join('tblusuario', 'tmonitor.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->join('tablas', 'tmonitor.IdTabla = tablas.IdTabla', 'left');
		$this->db->join('taccion', 'tmonitor.IdAccion = taccion.IdAccion', 'left');
		$this->db->where($where);
		// $this->db->order_by('tmonitor.Fecha', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	function update_Depto($datos){
		$this->db->where('IdDepto', $datos['IdDepto']);
		$this->db->update('tbldeptos', $datos);
	}

	function insert_Depto($datos){
		$this->db->insert('tbldeptos', $datos);
	}

	function selec_Servicio($id){
		$this->db->select('t_servicio.*, tblusuario.Usuario, tblusuario.Nombre, tblusuario.Apellido');
		$this->db->from('t_servicio');
		$this->db->join('tblusuario', 't_servicio.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->where('t_servicio.IdServicio', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function update_Servicio($datos){
		$this->db->where('IdServicio', $datos['IdServicio']);
		$this->db->update('t_servicio', $datos);
	}

	function servicios(){
		$this->db->select('t_servicio.*, tblusuario.Usuario, tblusuario.Nombre, tblusuario.Apellido');
		$this->db->from('t_servicio');
		$this->db->join('tblusuario', 't_servicio.IdUsuario = tblusuario.IdUsuario', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	function insert_Servicio($datos){
		$this->db->insert('t_servicio', $datos);
	}
}