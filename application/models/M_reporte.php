<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reporte extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function PersonalTarjeta(){
		$this->db->select('`tblpersonal`.`IdPersonal`,`tblpersonal`.`RFC`, `tblpersonal`.`NOMBRES`, `tblpersonal`.`APELLIDOS`, `thorario`.`NTarjeta`,`thorario`.`HE`, `thorario`.`HS`, `thorario`.`DIAS`, `tblturno`.`Turno`, `tbldeptos`.`DEPARTAMENTO`, `tbltiporegistro`.`TIPOREGISTRO`, `tbltipotrabajador`.`TIPOTRABAJADOR`, tbljefe.JEFE, tlaboral.Codigo');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tblturno', '`thorario`.`IdTurno` = `tblturno`.`IdTurno`', 'left');
		$this->db->join('tbldeptos', '`thorario`.`IdDepto` = `tbldeptos`.`IdDepto`', 'left');
		$this->db->join('tbltiporegistro', '`thorario`.`IdRegistro` = `tbltiporegistro`.`IdTipoRegistro`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		// $this->db->join('tblusuario', 'tlaboral.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tbljefe', '`thorario`.`IdJefe` = `tbljefe`.`IdJefe`', 'left');

		// $this->db->join('tblfuncion', '`thorario`.`IdFuncion` = `tblfuncion`.`IdFuncion`', 'left');
		// $this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		// $this->db->join('testatus', '`tlaboral`.`IdEstatus` = `testatus`.`IdEstatus`', 'left');
		// $this->db->join('tblrama', 'tbltabulador.IdRama = tblrama.IdRama', 'left');
		// $this->db->join('t_servicio', '`thorario`.`IdServicio` = `t_servicio`.`IdServicio`', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 2);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 5);
		$this->db->where('tbltiporegistro.IdTipoRegistro', 3);
		$this->db->order_by('NTarjeta', 'asc');
		$query = $this->db->get();
		return $query->result();

	}

	function TotalxRama(){
		$this->db->select('count(tblpersonal.IdPersonal) Total, tblrama.*');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->join('tblturno', 'thorario.IdTurno = tblturno.IdTurno', 'left');
		$this->db->join('tbltabulador', 'tlaboral.Codigo = tbltabulador.CODIGO', 'left');
		$this->db->join('tblrama', 'tbltabulador.IdRama = tblrama.IdRama', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 2);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 5);
		$this->db->group_by('tbltabulador.IdRama');
		$query = $this->db->get();
		return $query->result();

	}

	function EnCasa(){
		$this->db->select('count(tblpersonal.IdPersonal) Total');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 2);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 3);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 5);
		// $this->db->or_where('`tlaboral`.`IdEstatus`', 4);
		$query = $this->db->get();
		return $query->result();
	}

	function TotalxSituacionLaboral(){
		$this->db->select('count(tblpersonal.IdPersonal) Total, tbltipotrabajador.TIPOTRABAJADOR Tipo');
		$this->db->from('tlaboral');
		$this->db->join('tblpersonal', '`tlaboral`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('thorario', '`tlaboral`.`IdPersonal` = `thorario`.`IdPersonal`', 'left');
		$this->db->join('tbltipotrabajador', 'tlaboral.IdTipoTrabajador = tbltipotrabajador.IdTipoTrabajador', 'left');
		$this->db->where('`tlaboral`.`IdAds`', 4228);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->group_by('tbltipotrabajador.IdTipoTrabajador');
		$this->db->order_by('tbltipotrabajador.IdTipoTrabajador');
		$query = $this->db->get();
		return $query->result();
	}

	function TotalxTurno(){
		$this->db->select('COUNT(tblpersonal.IdPersonal) data, tblturno.Turno label');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->join('tblturno', 'thorario.IdTurno = tblturno.IdTurno', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 2);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 5);
		$this->db->group_by('tblturno.Turno');
		$this->db->order_by('tblturno.IdTurno');
		$query = $this->db->get();
		return $query->result();
	}

	function VieneComisionado(){
		$this->db->select('count(tblpersonal.IdPersonal) Total');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->join('tblturno', 'thorario.IdTurno = tblturno.IdTurno', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus`', 3);
		$query = $this->db->get();
		return $query->result();
	}

	function FueraComisionado(){
		$this->db->select('count(tblpersonal.IdPersonal) Total');
		$this->db->from('tlaboral');
		$this->db->join('tblpersonal', '`tlaboral`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('thorario', '`tlaboral`.`IdPersonal` = `thorario`.`IdPersonal`', 'left');
		$this->db->where('`tlaboral`.`IdAds`', 4228);
		// $this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus`', 2);
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$query = $this->db->get();
		return $query->result();
	}

	function Total_Operativo(){
		$this->db->select('count(tblpersonal.IdPersonal) Total, tblturno.Turno, count(thorario.IdTurno)');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->join('tblturno', 'thorario.IdTurno = tblturno.IdTurno', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 2);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 5);
		$query = $this->db->get();
		return $query->result();
	}

	function Total_Nomina(){
		$this->db->select('count(tblpersonal.IdPersonal) Total');
		$this->db->from('tlaboral');
		$this->db->join('tblpersonal', '`tlaboral`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('thorario', '`tlaboral`.`IdPersonal` = `thorario`.`IdPersonal`', 'left');
		$this->db->where('`tlaboral`.`IdAds`', 4228);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$query = $this->db->get();
		return $query->result();
	}

	function Incidencias(){
		$this->db->select('tblpersonal.IdPersonal, tblpersonal.NOMBRES, tblpersonal.APELLIDOS, t_regincidencia.Folio, t_incidencia.Nombre, t_regincidencia.start, t_regincidencia.end, tblusuario.Usuario, t_controlinc.Captura, t_regincidencia.validar, thorario.NTarjeta');
		// $this->db->from('t_regincidencia');
		$this->db->join('t_controlinc', 't_regincidencia.Folio = t_controlinc.Folio', 'left');
		$this->db->join('tblpersonal', '`t_regincidencia`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('thorario', 'tblpersonal.IdPersonal = thorario.IdPersonal', 'left');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->join('tblusuario', 't_regincidencia.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->where('thorario.Estatus', 1);
		$hoy = date('W');
		// $hoy = date('Y');
		// $hoy = 51;
		// $this->db->where('Year(t_regincidencia.start)', $hoy);
		$this->db->where('weekofyear(t_regincidencia.start)', $hoy);
		$this->db->order_by('Folio', 'desc');


		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function IncidenciaGral(){
		$this->db->select('t_regincidencia.Folio, tblpersonal.Sufijo a, tblpersonal.NOMBRES b, tblpersonal.APELLIDOS c, t_controlinc.captura, thorario.NTarjeta, tblusuario.Usuario User, tblusuario.Nombre x, tblusuario.Apellido y');
		$this->db->join('t_controlinc', 't_regincidencia.Folio = t_controlinc.Folio', 'left');
		$this->db->join('tblpersonal', '`t_regincidencia`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('thorario', 'tblpersonal.IdPersonal = thorario.IdPersonal', 'left');
		$this->db->join('tblusuario', 't_regincidencia.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->where('thorario.Estatus', 1);
		$this->db->group_by('Folio');
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}

	function IncidenciaPersonal($Folio){
		$this->db->select('t_regincidencia.Id, t_regincidencia.start, t_regincidencia.end, t_regincidencia.validar, t_regincidencia.nota, t_incidencia.Nombre, t_incidencia.Sigla');
		$this->db->join('t_incidencia', 't_regincidencia.Id_Inc = t_incidencia.Id', 'left');
		$this->db->where("Folio", $Folio);
		$query = $this->db->get('t_regincidencia');
		return $query->result();
	}


}