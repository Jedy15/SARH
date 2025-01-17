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

	function YearCardex1($IdPersonal){
		$this->db->select('min(date(start)) primero, max(date(end)) ultimo');
		$this->db->where('IdPersonal', $IdPersonal);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function YearCardex2($IdPersonal){
		$this->db->distinct('year(start)');
		$this->db->select('year(start) id,  year(start) text');
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
		$WHERE =  "t_incidencia.IdSigla = 16 AND MONTH(start)= MONTH(now()) and year(start) = year(now())";
		$this->db->select('count(t_regincidencia.Id) Total, sum(timestampdiff(minute, start, end)) / 60 Horas');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->where($WHERE);
		$this->db->where('IdPersonal', $IdPersonal);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function ContarLicenciaMedicaMes($IdPersonal, $Mes)
	{
		$WHERE =  "t_incidencia.IdSigla = 4 AND MONTH(start)=".$Mes." and year(start) = year(now())";		
		$this->db->select('SUM(TIMESTAMPDIFF(DAY, start, end)) dias');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->where($WHERE);
		$this->db->where('IdPersonal', $IdPersonal);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	public function LicenciaMedicaAnual($IdPersonal, $year)
	{
		$WHERE =  "t_incidencia.IdSigla = 4 and year(start) =".$year;		
		$this->db->select('SUM(TIMESTAMPDIFF(DAY, start, end)) dias');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
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
		$query = $this->db->update('t_regincidencia', $datos);
		return $query;
	}

	function movimientos($IdPersonal){
		$this->db->select('t_regincidencia.Folio, t_incidencia.Nombre Incidencia, t_regincidencia.start, t_regincidencia.end, 
		tblusuario.Usuario, tblusuario.Nombre NUsuario, tblusuario.Apellido AUsuario, t_controlinc.Captura, 
		YEARWEEK(t_controlinc.Captura, 1) Semana, t_regincidencia.nota, t_regincidencia.Id IdEvento, t_tipo_incidencia.Id, t_tipo_incidencia.Sigla, t_regincidencia.Id_Inc');
		$this->db->from('t_regincidencia');
		$this->db->join('t_controlinc', 't_regincidencia.Folio = t_controlinc.Folio', 'left');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->join('tblusuario', 't_regincidencia.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->join('t_tipo_incidencia', 't_incidencia.IdSigla = t_tipo_incidencia.Id', 'left');
		$this->db->where('IdPersonal', $IdPersonal);
		// $this->db->limit(10);
		// $this->db->order_by('Folio', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function DatosCardex($year,$tipo,$IdPersonal)	{
		if ($tipo==2){
			$where = "t_regincidencia.IdPersonal = ".$IdPersonal." and year(t_regincidencia.start) = ".$year." or t_regincidencia.IdPersonal = ".$IdPersonal." and year(t_regincidencia.end) = ".$year;
		} else {
			$where = "t_regincidencia.IdPersonal = ".$IdPersonal." and t_regincidencia.start between concat(".$year."-1, '-10-01') AND concat(".$year.", '-09-30') or t_regincidencia.IdPersonal = ".$IdPersonal." and t_regincidencia.end between  concat(".$year."-1, '-10-01') AND concat(".$year.", '-09-30')";
		}
		$this->db->select('Date(t_regincidencia.start) start, if(TIMESTAMPDIFF(DAY, start, end) > 0, date_sub(date(end), INTERVAL 1 DAY), date(end)) end, t_tipo_incidencia.Sigla');
		$this->db->from('t_regincidencia');
		$this->db->join('t_controlinc', 't_regincidencia.Folio = t_controlinc.Folio', 'left');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->join('tblusuario', 't_regincidencia.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->join('t_tipo_incidencia', 't_incidencia.IdSigla = t_tipo_incidencia.Id', 'left');
		$this->db->where($where);
		$this->db->order_by('start', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function TipoTrabajador($IdPersonal){
		$this->db->select('tlaboral.IdTipoTrabajador Tipo');
		$this->db->from('tblpersonal');
		$this->db->join('tlaboral', 'tblpersonal.IdPersonal = tlaboral.IdPersonal', 'left');
		$this->db->where('tlaboral.status', 1);
		$this->db->where('tblpersonal.IdPersonal', $IdPersonal);
		$query = $this->db->get();
		return $query->result();
	}

	public function DatosPersonalesCardex($IdPersonal)
	{		
		$this->db->select('tblpersonal.SUFIJO, tblpersonal.NOMBRES, tblpersonal.APELLIDOS, tblpersonal.RFC, tblpersonal.CURP, 
		thorario.NTarjeta, tlaboral.Codigo, tlaboral.FInicio, tlaboral.IdTipoTrabajador Tipo, tunidad.NOMBREUNIDAD ascripcion, 
		tbltipotrabajador.TIPOTRABAJADOR, tlaboral.Clave');
		$this->db->from('tblpersonal');
		$this->db->join('thorario', 'tblpersonal.IdPersonal = thorario.IdPersonal', 'left');
		$this->db->join('tlaboral', 'tblpersonal.IdPersonal = tlaboral.IdPersonal', 'left');
		$this->db->join('tunidad', 'tlaboral.IdAds = tunidad.ID', 'left');
		$this->db->join('tbltipotrabajador', 'tlaboral.IdTipoTrabajador = tbltipotrabajador.IdTipoTrabajador', 'left');
		$this->db->where('tblpersonal.IdPersonal', $IdPersonal);
		$this->db->where('thorario.Estatus', 1);
		$this->db->where('tlaboral.status', 1);
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