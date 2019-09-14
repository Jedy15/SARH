<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_configurar extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function insertar_grupo($datos){
		$this->db->insert('torgexp', $datos);
	}
	function grupos(){
		$this->db->select('torgexp.*, tblusuario.Usuario, tblusuario.Nombre, tblusuario.Apellido');
		$this->db->from('torgexp');
		$this->db->join('tblusuario', 'torgexp.IdUsuario = tblusuario.IdUsuario', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	function selec_grupo($id){
		$this->db->select('torgexp.*, tblusuario.Usuario, tblusuario.Nombre, tblusuario.Apellido');
		$this->db->from('torgexp');
		$this->db->join('tblusuario', 'torgexp.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->where('torgexp.IdExp', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function update_grupo($datos){
		$this->db->where('IdExp', $datos['IdExp']);
		// unset($datos['IdExp']);
		$this->db->update('torgexp', $datos);
	}
	
}
