<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lider extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function personal($IdJefe){
		$this->db->select('`tblpersonal`.`IdPersonal`,`tblpersonal`.`NOMBRES`, `tblpersonal`.`APELLIDOS`, `thorario`.`NTarjeta`, `tblturno`.`Turno`, `tbldeptos`.`DEPARTAMENTO`, `tbltipotrabajador`.`TIPOTRABAJADOR`, `tblfuncion`.`Funcion`, tbltabulador.PUESTO, `testatus`.`Estatus`, tlaboral.Codigo, t_servicio.Servicio');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tblturno', '`thorario`.`IdTurno` = `tblturno`.`IdTurno`', 'left');
		$this->db->join('tbldeptos', '`thorario`.`IdDepto` = `tbldeptos`.`IdDepto`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tblfuncion', '`thorario`.`IdFuncion` = `tblfuncion`.`IdFuncion`', 'left');
		$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		$this->db->join('testatus', '`tlaboral`.`IdEstatus` = `testatus`.`IdEstatus`', 'left');
		$this->db->join('t_servicio', '`thorario`.`IdServicio` = `t_servicio`.`IdServicio`', 'left');
		$this->db->where('thorario.IdJefe', $IdJefe);
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 2);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 5);
		$this->db->order_by('NTarjeta', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function IdJefe(){
		$this->db->select('IdJefe');
		$Value = $this->session->userdata('id');
		$this->db->where('IdUsuario', $Value);
		$query=$this->db->get('tblusuario');
		return $query->result();
	}

}