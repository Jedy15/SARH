<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_plantilla extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function Select_Nuevo_Registro(){
		$this->db->select('IdPersonal');
		$query = $this->db->get('tblpersonal');
		return $query->result();		
	}

	function DeleteHorario($id)
	{		
		$this->db->where('IdHorario',$id);		
		$query = $this->db->delete('thorario');
		return $query;
	}

	function UnidadesJuris($clave){
		$this->db->select('ID, CLUES, NOMBREUNIDAD');
		$this->db->where('CLAVE_JURISDICCION', $clave);
		$this->db->order_by('NOMBREUNIDAD', 'asc');
		$query = $this->db->get('tunidad');
		return $query->result();
	}

	function NumJurisdicciones(){
		$this->db->select('CLAVE_JURISDICCION');
		$this->db->group_by('CLAVE_JURISDICCION');
		$query = $this->db->get('tunidad');
		return $query->result();
	}

	function GrupoExp(){
		$query = $this->db->get('torgexp');
		return $query->result();
	}

	function ContarExp($id){
		$this->db->where('IdExp', $id);
		$query = $this->db->get('tblpersonal');
		return $query->num_rows();
	}

	function Id_Grupo($id){
		$this->db->where('IdExp', $id);
		$query = $this->db->get('torgexp');
		return $query->result();
	}

	function DeleteEstudio($id){
		$this->db->where('IdRegEstudio', $id);
		$this->db->delete('tblregestudio');
	}

	function operativo(){
		$this->db->select('`tblpersonal`.`IdPersonal`,`tblpersonal`.`RFC`, `tblpersonal`.`CURP`, `tblpersonal`.`NumExp`,`tblpersonal`.`NOMBRES`, `tblpersonal`.`APELLIDOS`, `thorario`.`NTarjeta`, tlaboral.PERCEPCION, `tblturno`.`Turno`, `tbldeptos`.`DEPARTAMENTO`, `tbltiporegistro`.`TIPOREGISTRO`, `tbltipotrabajador`.`TIPOTRABAJADOR`, `tblfuncion`.`Funcion`, tbltabulador.PUESTO, `tblrama`.`RAMA`,`tblrama`.`NombreRama`, `testatus`.`Estatus`, tblusuario.Nombre, tblusuario.Usuario, tblusuario.Apellido, tlaboral.Fecha, t_servicio.Servicio');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tblturno', '`thorario`.`IdTurno` = `tblturno`.`IdTurno`', 'left');
		$this->db->join('tbldeptos', '`thorario`.`IdDepto` = `tbldeptos`.`IdDepto`', 'left');
		$this->db->join('tbltiporegistro', '`thorario`.`IdRegistro` = `tbltiporegistro`.`IdTipoRegistro`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->join('tblusuario', 'tlaboral.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tblfuncion', '`thorario`.`IdFuncion` = `tblfuncion`.`IdFuncion`', 'left');
		$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		$this->db->join('testatus', '`tlaboral`.`IdEstatus` = `testatus`.`IdEstatus`', 'left');
		$this->db->join('tblrama', 'tbltabulador.IdRama = tblrama.IdRama', 'left');
		$this->db->join('t_servicio', '`thorario`.`IdServicio` = `t_servicio`.`IdServicio`', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 2);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 5);
		$this->db->order_by('NTarjeta', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function plantilla(){
		$this->db->select('`tblpersonal`.`IdPersonal`, `tblpersonal`.`SUFIJO`, `tblpersonal`.`NOMBRES`, `tblpersonal`.`APELLIDOS`, `tblpersonal`.`RFC`, `tblpersonal`.`SEXO`, `tbltabulador`.`PUESTO`, `tlaboral`.`FInicio`, `tbltipotrabajador`.`TIPOTRABAJADOR`,`tlaboral`.`IdAds`');
		$this->db->from('tlaboral');
		$this->db->join('tblpersonal', '`tlaboral`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$query = $this->db->get();
		return $query->result();
	}

	function updatepersonal($data){
		$this->db->where('IdPersonal', $data['IdPersonal']);
		unset($data['IdPersonal']);
		$this->db->update('tblpersonal', $data);
		return true;
	}

	function buscarID($ID){
		$this->db->select('tblpersonal.*, tblmunicipio.MUNICIPIO');
		$this->db->from('tblpersonal');
		$this->db->join('tblmunicipio', 'tblpersonal.IdMunicipio = tblmunicipio.IdMunicipio', 'left');
		$this->db->where('IdPersonal', $ID);
		$query = $this->db->get();
		return $query->result();
	}//fin de get_rfc

	function Tarjeta($num){  //Buscar si la tarjeta existe y si esta activo
		$where = "NTARJETA= ".$num. " AND Estatus = 1";
		$this->db->select('IdPersonal');
		$this->db->where($where);
		$query = $this->db->get('thorario');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else{
			return false;
		}
	}
	// FIN DE TARJETA

	function agregar($data){ //FUNCION PARA AGREGAR NUEVO PERSONAL
		$this ->db->set($data);//agrega los datos a la instruccion sql
		$id = $this->session->userdata("id");
		$this ->db->set('IdUsuario' , $id);
		$this ->db->set('Fecha' , date('Y-m-d'));
		$this->db->insert('tblpersonal'); 
		return $this->db->insert_id();
	}

	function RFC($RFC){
		$this->db->select('IdPersonal');
		$this->db->where('RFC', $RFC);
		$query = $this->db->get('tblpersonal');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	function actlaboral($data){
		$this ->db->set('IdUsuario' , $this->session->userdata("id"));
		$this->db->where('IdLaboral', $data['IdLaboral']);
		// unset($data['IdLaboral']);
		$this->db->update('tlaboral', $data);
		return true;
	}

	function bajalaboral($id){
		$this ->db->set('status' , 0);
		$this->db->where('IdPersonal', $id);
		$this->db->update('tlaboral');
	}

	function insertlaboral($data){
		$this->db->insert('tlaboral', $data);
		// return true;
	}

	function buscarhorario($id){
		$this->db->where('IdPersonal', $id);
		$query = $this->db->get('thorario');
		if ($query->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function insertlhorario($data){
		$this->db->insert('thorario', $data);
		// return true;
	}

	function horarioactivo(){
		$this->db->select('`tblpersonal`.`IdPersonal`, `tblpersonal`.`NOMBRES`, `tblpersonal`.`APELLIDOS`, `thorario`.`NTarjeta`, `tlaboral`.`IdAds`, `tblturno`.`Turno`, `tbldeptos`.`DEPARTAMENTO`, `tbltiporegistro`.`TIPOREGISTRO`, `tbltipotrabajador`.`TIPOTRABAJADOR`, `tblfuncion`.`Funcion`, `tbltabulador`.`PUESTO`, `tblrama`.`RAMA`');
		$this->db->from('thorario');
		$this->db->join('tblpersonal', '`thorario`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tblturno', '`thorario`.`IdTurno` = `tblturno`.`IdTurno`', 'left');
		$this->db->join('tbldeptos', '`thorario`.`IdDepto` = `tbldeptos`.`IdDepto`', 'left');
		$this->db->join('tbltiporegistro', '`thorario`.`IdRegistro` = `tbltiporegistro`.`IdTipoRegistro`', 'left');
		$this->db->join('tlaboral', '`tblpersonal`.`IdPersonal` = `tlaboral`.`IdPersonal`', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tblfuncion', '`thorario`.`IdFuncion` = `tblfuncion`.`IdFuncion`', 'left');
		$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		$this->db->join('tblrama', 'tbltabulador.IdRama = tblrama.IdRama', 'left');
		$this->db->where('tlaboral.status', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$query = $this->db->get();
		return $query->result();
	}

	function bajahorario($id){
		$this ->db->set('Estatus' , 0);
		$this->db->where('IdPersonal', $id);
		$this->db->update('thorario');
	}

	function horarioact($id){
		$this->db->select('thorario.*, tbldeptos.DEPARTAMENTO, tblturno.Turno, tblfuncion.Funcion, tbljefe.JEFE, tbltiporegistro.TIPOREGISTRO, tblusuario.Nombre, tblusuario.Apellido, tblusuario.Usuario, t_servicio.Servicio');
		$this->db->from('thorario');
		$this->db->join('tblturno', '`thorario`.`IdTurno` = `tblturno`.`IdTurno`', 'left');
		$this->db->join('tbldeptos', '`thorario`.`IdDepto` = `tbldeptos`.`IdDepto`', 'left');
		$this->db->join('tblfuncion', '`thorario`.`IdFuncion` = `tblfuncion`.`IdFuncion`', 'left');
		$this->db->join('tbljefe', '`thorario`.`IdJefe` = `tbljefe`.`IdJefe`', 'left');
		$this->db->join('tbltiporegistro', '`thorario`.`IdRegistro` = `tbltiporegistro`.`IdTipoRegistro`', 'left');
		$this->db->join('tblusuario', '`thorario`.`IdUsuario` = `tblusuario`.`IdUsuario`', 'left');
		$this->db->join('t_servicio', '`thorario`.`IdServicio` = `t_servicio`.`IdServicio`', 'left');
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`thorario`.`IdPersonal`', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function buscaridhorario($id){
		$this->db->where('IdHorario', $id);
		$query = $this->db->get('thorario');
		return $query->result();
	}

	function updatehorario($data){//Funcion para actualizar horario
		$this->db->where('IdHorario', $data['IdHorario']);
		unset($data['IdHorario']);
		$this->db->update('thorario', $data);
		return true;
	}

	function buscaridlaboral($id){
		$this->db->select('tlaboral.*, tunidad.CLAVE_JURISDICCION, t_sub_seccion.IdSeccion');
		$this->db->join('tunidad', 'tlaboral.IdAds = tunidad.ID', 'left');
		$this->db->join('t_sub_seccion', 'tlaboral.Id_subseccion = t_sub_seccion.Id_subseccion', 'left');
		$this->db->where('IdLaboral', $id);
		$query = $this->db->get('tlaboral');
		return $query->result();
	}

	function CargarIdLaboral($IdLaboral){
		$this->db->where('IdLaboral', $IdLaboral);
		$query = $this->db->get('tlaboral');
		return $query->result();
	}

	function CargarTodo(){
		$this->db->select('tblpersonal.IdPersonal, tblpersonal.NOMBRES, tblpersonal.APELLIDOS, tblpersonal.RFC, tblpersonal.NumExp, testatus.Estatus,`tbltipotrabajador`.`TIPOTRABAJADOR`, tlaboral.Codigo, tlaboral.FInicio, tunidad.NOMBREUNIDAD, tunidad.CLAVE_JURISDICCION, `tblrama`.`RAMA`, `tbltabulador`.`PUESTO`');
		$this->db->join('tlaboral', 'tblpersonal.IdPersonal = tlaboral.IdPersonal', 'left');
		$this->db->join('testatus', 'tlaboral.IdEstatus = testatus.IdEstatus', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tunidad', '`tlaboral`.`IdAds` = `tunidad`.`ID`', 'left');
		$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		$this->db->join('tblrama', 'tbltabulador.IdRama = tblrama.IdRama', 'left');
		$this->db->where('tlaboral.status', 1);
		$query = $this->db->get('tblpersonal');
		return $query->result();
	}

	function todos(){
		$this->db->select('`tblpersonal`.`IdPersonal`, `tblpersonal`.`NumExp`, `tblpersonal`.`NOMBRES`, `tblpersonal`.`APELLIDOS`, `tblpersonal`.`RFC`, `tbltabulador`.`PUESTO`, `tbltipotrabajador`.`TIPOTRABAJADOR`, `thorario`.`NTarjeta`, `testatus`.`Estatus`, tlaboral.Fecha, tblusuario.Nombre, tblusuario.Apellido, tblusuario.Usuario, `tblrama`.`RAMA`, `tblrama`.`NombreRama`');
		$this->db->from('tlaboral');
		$this->db->join('tblpersonal', '`tlaboral`.`IdPersonal` = `tblpersonal`.`IdPersonal`', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		$this->db->join('thorario', '`tlaboral`.`IdPersonal` = `thorario`.`IdPersonal`', 'left');
		$this->db->join('testatus', '`tlaboral`.`IdEstatus` = `testatus`.`IdEstatus`', 'left');
		$this->db->join('tblusuario', 'tlaboral.IdUsuario = tblusuario.IdUsuario', 'left');
		$this->db->join('tblrama', 'tbltabulador.IdRama = tblrama.IdRama', 'left');
		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`thorario`.`Estatus`', 1);
		$this->db->where('`tlaboral`.`IdAds`', 4228);
		$this->db->where('`tlaboral`.`IdEstatus` <>', 0);
		$this->db->order_by('NTarjeta', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function datospersonales($id){
		$this->db->select('`tblpersonal`.`IdPersonal`, `tblpersonal`.`SUFIJO`, `tblpersonal`.`NOMBRES`, `tblpersonal`.`APELLIDOS`');
		$this->db->where('tblpersonal.IdPersonal', $id);
		$query = $this->db->get('tblpersonal');
		return $query->result();
	}

	function Ultimo($id){
		$this->db->select_max('IdLaboral');
		$this->db->where('IdPersonal', $id);
		$query = $this->db->get('tlaboral');
		return $query->result();
	}

	function ultimo_horario($id){
		$this->db->select_max('IdHorario');
		$this->db->where('IdPersonal', $id);
		$query = $this->db->get('thorario');
		return $query->result();
	}

	function laboral_actual($id){
		$this->db->select('tlaboral.*, tbltabulador.PUESTO, tbltipotrabajador.TIPOTRABAJADOR, tunidad.NOMBREUNIDAD, testatus.Estatus, tblusuario.Nombre, tblusuario.Apellido, tblusuario.Usuario, t_programa.Programa, t_sub_seccion.Subseccion, t_seccion.Seccion');
		$this->db->from('tlaboral');
		$this->db->join('tblusuario', '`tlaboral`.`IdUsuario` = `tblusuario`.`IdUsuario`', 'left');
		$this->db->join('tbltabulador', '`tlaboral`.`Codigo` = `tbltabulador`.`CODIGO`', 'left');
		$this->db->join('tbltipotrabajador', '`tlaboral`.`IdTipoTrabajador` = `tbltipotrabajador`.`IdTipoTrabajador`', 'left');
		$this->db->join('tunidad', '`tlaboral`.`IdAds` = `tunidad`.`ID`', 'left');
		$this->db->join('testatus', '`tlaboral`.`IdEstatus` = `testatus`.`IdEstatus`', 'left');
		$this->db->join('t_programa', '`tlaboral`.`Id_Programa` = `t_programa`.`IdPrograma`', 'left');
		$this->db->join('t_sub_seccion', 'tlaboral.Id_subseccion = t_sub_seccion.Id_subseccion', 'left');

		$this->db->join('t_seccion', 't_sub_seccion.IdSeccion = t_seccion.IdSeccion', 'left');


		$this->db->where('`tlaboral`.`status`', 1);
		$this->db->where('`tlaboral`.`IdPersonal`', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function id_estudio($id){
		$this->db->select('tblregestudio.*, tblformacion.FORMACION_ACADEMICA');
		$this->db->from('tblregestudio');
		$this->db->join('tblformacion', 'tblregestudio.IdTitulo = tblformacion.CATALOG_KEY', 'left');
		$this->db->where('tblregestudio.IdRegEstudio', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function update_estudio($data){
		$this->db->where('IdRegEstudio', $data['IdRegEstudio']);
		unset($data['IdRegEstudio']);
		$this->db->update('tblregestudio', $data);
		return true;
	}

	function insert_estudio($data){
		$this->db->insert('tblregestudio', $data);
	}

	function delete_familiar($id){
		$this->db->where('IdFamiliar', $id);
		$query = $this->db->delete('tfamiliar');
		return $query;
	}

	function insert_familiar($data){
		$this->db->insert('tfamiliar', $data);
	}

	function id_familiar($id){
		$this->db->where('IdFamiliar', $id);
		$query = $this->db->get('tfamiliar');
		return $query->result();
	}
	function update_familiar($data){
		$this->db->where('IdFamiliar', $data['IdFamiliar']);
		unset($data['IdFamiliar']);
		$this->db->update('tfamiliar', $data);
		return true;
	}
}