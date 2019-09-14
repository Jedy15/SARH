<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($username, $password){
		$this->db->where("usuario", $username);
		$this->db->where("pass", $password);
		$resultados = $this->db->get("tblusuario");
		return $resultados->result();
	}

	public function name($username){
		$this->db->where("usuario", $username);
		$resultados = $this->db->get("tblusuario");
		if ($resultados->num_rows() > 0){
			return $resultados->result();
		}
		else{
			return false;
		}
	}

	function perfil($id){
		$this->db->select('Perfil');
		$this->db->where('IdPerfilUser', $id);
		$query = $this->db->get('tblperfiluser');
		return $query->result();
	}
}
