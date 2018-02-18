<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MProfesor extends CI_Model {
	/*=======================================
	=            Metodo Ingresar            =
	=======================================*/
	
	
	public function ingresar ($user, $pass){
		$this->db->select('p.id,p.name,p.pass,p.level');
		$this->db->from('profesor p');
		$this->db->where('p.id',$user);
		$this->db->where('p.pass',$pass);
		$ress=$this->db->get();
		if($ress->num_rows()==1){
			$r=$ress->row();
			$s_usuario=array(
				's_id' => $r->id,
				's_name'=> $r->name,
				's_level'=>$r->level);
			/*----------  David Comento  ----------*/
			
			//$luser=$r->name;
			//$llevel=$r->level;
			//$lis=$r->id;
			//$this->session->userdata($s_usuario);
			$this->session->set_userdata($s_usuario);
			return 1;
		} else {
			return 0;
		}
	}
	
	/*=====  End of Metodo Ingresar  ======*/
	/*===================================================
	=            Regresar Todas las Materias            =
	===================================================*/
	
		public function seleccionamateria (){
		$this->db->select('m.id,m.name,');
		$this->db->from('materia m');
		$ress=$this->db->get();
		if($ress->num_rows()>0){
			
			return $ress->result();
		} else {
			return false;
		}
	}
	
	/*=====  End of Regresar Todas las Materias  ======*/
	


	/*========================================
	=            Metodo Registrar            =
	========================================*/
	
	
	public function registrar($profesor){
		$campos= array(
			'id'=>$profesor['id'],
			'name '=>$profesor['name'],
			'lastname'=> $alumno['name2'],
			'mail'=>$profesor['mail'],
			'cube'=>$profesor['cube'],
			'ext'=>$profesor['ext'],
			'pass'=>$profesor['pass'],
			'level'=>"2"
		);
		$this->db->insert('profesor',$campos);
	}
	
	/*=====  End of Metodo Registrar  ======*/
	/*=======================================
	=            Registrar Curso            =
	=======================================*/
	public function RegistrarCurso($curso){
		$camp= array(
			'idProfesor'=>$curso['idProfesor'],
			'idMateria'=>$curso['idMateria'],
			'parcial'=>$curso['parcial'],
			'parcial2'=>$curso['parcial2'],
			'parcial3'=>$curso['parcial3'],
			'tareas'=>$curso['tareas'],
			'practicas'=>$curso['practicas'],
			'proyecto'=>$curso['proyecto'],
			'otro'=>$curso['otro'],
			'Seccion'=>$curso['Seccion'],
			'NRC'=>$curso['NRC'],
			'Preiodo'=>$curso['Preiodo'],
			'FechaInicio'=>$curso['FechaInicio'],
			'FechaFin'=>$curso['FechaFin'],
			'Salon'=>$curso['Salon'],
			'Horario'=>$curso['Horario']
		);
		$this->db->insert('cursos',$camp);
	}
	
	
	/*=====  End of Registrar Curso  ======*/
	



	public function Check($user, $password) {
		$this->db->select("id, name, pass, level")->where("id",$user)->where("pass",$password);
		$fetch = $this->db->get("profesor");
		if ($fetch->num_rows() > 0)
			return $fetch->result();
		else
			return false;
	}
	//SELECT `profesor`.`id`, `profesor`.`name`, `profesor`.`pass`
//FROM `profesor

}

/* End of file mProfesor.php */
/* Location: ./application/models/mProfesor.php */