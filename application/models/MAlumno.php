<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAlumno extends CI_Model {
	/*===================================================
	=            Funcion-Metodo de Ingresar            =
	===================================================*/
	
	public function ingresar ($user, $pass){

		$this->db->select('a.id,a.name,a.pass,a.lastname');
		$this->db->from('alumno a');
		$this->db->where('a.id',$user);
		$this->db->where('a.pass',$pass);
		/*----------  Obtener la Query  ----------*/
		$ress=$this->db->get();
		if($ress->num_rows()==1){
			$r=$ress->row();
			$s_usuario=array(
				's_id' => $r->id,
				's_name'=> $r->name,
				's_level'=>"3",
				's_lastname'=>$r->lastname	);
			/*----------  David Comento  ----------*/
			//$luser=$r->name;
			//$llevel=$r->level;
			//$lis=$r->id;
			//$this->session->userdata($s_usuario);
			/*----------  Crea el Session  ----------*/
			$this->session->set_userdata($s_usuario);
			return 1;
		} else {
			return 0;
		}
	}
	/*=====  End of Funcion-Metodo de Ingresar  ======*/
	/*========================================
	=            Metodo Registrar            =
	========================================*/
	
	public function registrar($alumno){
		$campos= array(
			'id'=> $alumno['id'],
			'name'=> $alumno['name'],
			'lastname'=> $alumno['name2'],
			'mail'=> $alumno['mail'],
			'phone'=> $alumno['phone'],
			'eduprogram'=> $alumno['eduprogram'],
			'pass'=> $alumno['pass']
		);
		$this->db->insert('alumno',$campos);
	}
	
	
	/*=====  End of Metodo Registrar  ======*/
	/*==========================================
	=            seleccionaalumno()            =
	==========================================*/
	public function seleccionaalumno (){
		$this->db->select('a.id,a.name,');
		$this->db->from('alumno a');
		$ress=$this->db->get();
		if($ress->num_rows()>0){
			return $ress->result();
		} else {
			return false;
		}
	}
	
	
	/*=====  End of seleccionaalumno()  ======*/
	
	public function Check($user, $password) {
		$this->db->select("id, name, pass, level")->where("id",$user)->where("pass",$password);
		$fetch = $this->db->get("profesor");
		if ($fetch->num_rows() > 0)
			return $fetch->result();
		else
			return false;
	}
	

}

/* End of file mProfesor.php */
/* Location: ./application/models/mProfesor.php */