<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_incidencia extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function UpdateTipoIncidencia($datos){
		$this->db->where('Id', $datos['Id']);
		return $this->db->update('t_tipo_incidencia', $datos);
	}

	function TipoIncidencia(){
		$this->db->where('Id >', 0);
		$query = $this->db->get('t_tipo_incidencia');
		return $query->result();
	}

	function ListarTipoIncidencia(){
		$this->db->select('Id id, TipoIncidencia text');
		$this->db->where('Id >', 0);
		$query = $this->db->get('t_tipo_incidencia');
		return $query->result();
	}


	function InsertarTipoIncidencia($datos){
		$this ->db->set($datos);
		return $this->db->insert('t_tipo_incidencia');
	}

	function YearCardex($IdPersonal){
		$this->db->distinct('year(start)');
		$this->db->select('year(start) id, year(start) text');
		$this->db->where('IdPersonal', $IdPersonal);
		$this->db->order_by('start', 'desc');
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function ValidarFecha($fecha, $IdPersonal){
		$this->db->select('Id');
		$where = '"'.$fecha.'" between date(start) and date_sub(end, interval 1 DAY)';
		$this->db->where($where);
		$this->db->where('IdPersonal', $IdPersonal);
		$query = $this->db->get('t_regincidencia');
		return $query->num_rows();
	}

	function SelectT_regincidencia($id){
		$this->db->where('Id', $id);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function ContarIncidencia($ciclo, $IdPersonal, $tipo){
		if ($ciclo==1){
			$where = "`start` between concat(year(now())-1, '-10-01') AND concat(year(NOW()), '-09-31')";
		} else {
			$where = "year(start) = year(now())";
		}
		$this->db->select('SUM(TIMESTAMPDIFF(DAY, start, end)) dias');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'inner');
		$this->db->where('t_regincidencia.IdPersonal', $IdPersonal);
		$this->db->where('IdSigla', $tipo);
		$this->db->where($where);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function IncidenciaMesActual($IdPersonal, $tipo){
		$where = 'year(start) = year(now()) AND MONTH(start) = month(now());';
		$this->db->select('SUM(TIMESTAMPDIFF(DAY, start, end)) dias');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'inner');
		$this->db->where('IdSigla', $tipo);
		$this->db->where('IdPersonal', $IdPersonal);
		$this->db->where($where);
		$r = $this->db->get('t_regincidencia');
		return $r->result();
	}

	function ContarPermisoEconomico($ciclo, $IdPersonal){
		if ($ciclo==1){
			$where = "`start` between concat(year(now())-1, '-10-01') AND concat(year(NOW()), '-09-31')";
		} else {
			$where = "year(start) = year(now())";
		}
		$this->db->select('SUM(TIMESTAMPDIFF(DAY, start, end)) dias');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'inner');
		$this->db->where('IdSigla', 3);
		$this->db->where('IdPersonal', $IdPersonal);
		$this->db->where($where);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function EconomicoMesActual($IdPersonal){
		$where = 'year(start) = year(now()) AND MONTH(start) = month(now());';
		$this->db->select('SUM(TIMESTAMPDIFF(DAY, start, end)) dias');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'inner');
		$this->db->where('IdSigla', 3);
		$this->db->where('IdPersonal', $IdPersonal);
		$this->db->where($where);
		$r = $this->db->get('t_regincidencia');
		return $r->result();
	}

	function ContarPaseSalida($IdPersonal){
		//SELECT *, sec_to_time(timestampdiff(second, A.start, A.end)) as T
		// FROM rh2018.t_regincidencia as A
		$WHERE =  "Id_Inc = 19 AND MONTH(start)=MONTH(now())";
		$this->db->select('*, sec_to_time(timestampdiff(second, start, end)) Horas');
		// $this->db->from('t_regincidencia');
		$this->db->where($WHERE);
		$this->db->where('IdPersonal', $IdPersonal);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function Insertar_Oraculo($datos){
		$this->db->set('IdAccion',4);
		$this->db->set('IdTabla',10);		
		$this ->db->set($datos);
		return $this->db->insert('tmonitor');
	}

	function borrar($Id){
		$this->db->where('Id', $Id);
		return $this->db->delete('t_regincidencia');
		// return $query->result();
	}

	function Editar_Evento($datos){
		$this->db->where('Id', $datos['Id']);
		$this->db->update('t_regincidencia', $datos);
	}

	function movimientos($IdPersonal){
		// $this->db->select('t_controlinc.*, t_regincidencia.Id IdEvento, t_regincidencia.Id_Inc, t_regincidencia.start, t_regincidencia.end, t_regincidencia.nota, t_incidencia.Nombre, t_incidencia.Sigla, tblusuario.Usuario, tblusuario.Nombre NUsuario, tblusuario.Apellido AUsuario');
		$this->db->select('t_regincidencia.Folio, t_incidencia.Nombre Incidencia, date(t_regincidencia.start) start, date(t_regincidencia.end)  end, tblusuario.Usuario, tblusuario.Nombre NUsuario, tblusuario.Apellido AUsuario, t_controlinc.Captura, YEARWEEK(t_controlinc.Captura) Semana, t_regincidencia.nota, t_regincidencia.Id IdEvento, t_incidencia.Sigla, t_regincidencia.Id_Inc');
		$this->db->from('t_regincidencia');
		$this->db->join('t_controlinc', 't_regincidencia.Folio = t_controlinc.Folio', 'left');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->join('tblusuario', 't_regincidencia.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->where('IdPersonal', $IdPersonal);
		// $this->db->limit(10);
		// $this->db->order_by('Folio', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function folio($datos){
		// $this ->db->set($datos);
		$this->db->insert('t_controlinc', $datos);
		return $this->db->insert_id();
	}

	function insertar_evento($datos){
		$this ->db->set($datos);
		return $this->db->insert('t_regincidencia');
	}

	function Inc_Utilizada($IdPersonal, $id){
		// $this->db->select('Id_Inc');
		$this->db->where('IdPersonal', $IdPersonal);
		$this->db->where('Id_Inc', $id);
		$query = $this->db->get('t_regincidencia');
		return $query->num_rows();
	}

	function mostrar(){
		// $this->db->select('t_incidencia.*, tblusuario.Nombre NUsuario, tblusuario.Apellido, tblusuario.Usuario');
		$this->db->select('t_incidencia.Id, t_incidencia.Nombre, t_incidencia.Nota, t_incidencia.FI, t_incidencia.FF, t_incidencia.Activo, t_incidencia.Color, t_incidencia.IdSigla, tblusuario.Nombre NUsuario, tblusuario.Apellido, tblusuario.Usuario, t_tipo_incidencia.Sigla');
		$this->db->from('t_incidencia');
		$this->db->join('tblusuario', 't_incidencia.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->join('t_tipo_incidencia', 't_incidencia.IdSigla = t_tipo_incidencia.Id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	function alta($datos){
		$this ->db->set($datos);
		return $this->db->insert('t_incidencia');
	}

	function update($datos){
		$this->db->where('Id', $datos['Id']);
		return $this->db->update('t_incidencia', $datos);
	}

	function activos(){
		$this->db->where('Activo', 1);
		$query = $this->db->get('t_incidencia');
		return $query->result();
	}

	function IncidenciasActivas(){
		$this->db->select('Id id, Nombre text');
		$this->db->where('Activo', 1);
		$this->db->order_by('Nombre', 'asc');
		$query = $this->db->get('t_incidencia');
		return $query->result();
	}

	function inc_persona($id){
		$this->db->select('t_incidencia.nombre title, t_incidencia.Color color, t_regincidencia.start, IFNULL(t_regincidencia.end, t_regincidencia.start+ INTERVAL 1 DAY) end, t_regincidencia.Id_Inc IdEvento');
		$this->db->from('t_regincidencia');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->where('t_regincidencia.IdPersonal', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function Inc_Disponible(){
		$this->db->select('t_incidencia.Nombre, t_incidencia.Id, t_incidencia.Color, count(t_regincidencia.Id_Inc) as cantidad');
		$this->db->from('t_incidencia');
		$this->db->join('t_regincidencia', 't_incidencia.Id = t_regincidencia.Id_Inc', 'left');
		$this->db->group_by('Id');
		$this->db->order_by('cantidad', 'desc');
		// $where = "NOT EXISTS (SELECT NULL
		// FROM t_regincidencia
		// WHERE t_regincidencia.Id_Inc = t_incidencia.Id and t_regincidencia.IdPersonal= ".$IdPersonal.") and activo = 1";
		$this->db->where('Activo', 1);
		$query = $this->db->get();
		return $query->result();
	}
}