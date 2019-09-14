<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuarios extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	function HolaMundo($bye){
		$this->db->select('Pass');
		$this->db->where('IdUsuario', $bye);
		$val = $this->db->get('tblusuario');
		return $val->result();
	}

	function get_todos(){
		$this->db->select('tblusuario.IdUsuario, tblusuario.Usuario, tblusuario.Nombre, tblusuario.Apellido, tblusuario.activo, tblusuario.FechaReg, tblusuario.fact, tblusuario.IdCreate, tblperfiluser.Perfil');
		$this->db->from('tblusuario');
		$this->db->join('tblperfiluser', '`tblusuario`.`IdPerfil` = `tblperfiluser`.`IdPerfilUser`', 'left');
		$nivel = $this->session->userdata("IdPerfil");
		$this->db->where('IdPerfil >', $nivel);
		// $this->db->order_by('IdUsuario', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function perfil(){//Consulta de Perfiles disponibles
		if ($this->session->userdata("IdPerfil")<>1){
			$nivel = $this->session->userdata("IdPerfil");
			$this->db->where('IdPerfilUser >', $nivel);
		}
		$query = $this->db->get('tblperfiluser');
		return $query->result();
	}	

	function agregar($data){
		$this ->db->set($data);
		$this->db->insert('tblusuario'); 
		return true;
	}

	function buscar_user($user){
		$where = "Usuario= '".$user."'";
		$this->db->where($where);
		$query = $this->db->get('tblusuario');
		if ($query->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function buscarperfil($id){
		$this->db->select('IdUsuario, Usuario, Nombre, Apellido, tblperfiluser.Perfil, FechaReg, IdPerfil, activo');
		$this->db->join('tblperfiluser', 'tblusuario.IdPerfil = tblperfiluser.IdPerfilUser', 'left');
		$this->db->where('IdUsuario',$id);
		$query = $this->db->get('tblusuario');
		// return $query->row();
		return $query->result();
	}

	function editar($data,$id){
		$this->db->where('IdUsuario',$id);
		$this->db->update('tblusuario',$data);
	}

}//fin de modelo