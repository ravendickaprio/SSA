<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MProfesor extends CI_Model {
	/*=======================================
	=            Metodo Ingresar            =
	=======================================*/
	
	
	public function ingresar ($user, $pass){
		$this->db->select('p.id,p.name,p.pass,p.level,p.lastname');
		$this->db->from('profesor p');
		$this->db->where('p.id',$user);
		$this->db->where('p.pass',$pass);
		$ress=$this->db->get();
		if($ress->num_rows()==1){
			$r=$ress->row();
			$s_usuario=array(
				's_id' => $r->id,
				's_name'=> $r->name,
				's_level'=>$r->level,
				's_lastname'=>$r->lastname);
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
	/*===================================================
	=      Mostrar Tabla Materias para el registro de alumnos       =
	===================================================*/
		public function seleccionacurso(){
		/*$this->db->select('c.idClave,c.idProfesor,c.idMateria, m.name,');
		$this->db->from('cursos c ,materia m ');
		$this->db->where('c.idProfesor',$this->session->userdata('s_id'));
		//$this->db->where('c.idMateria','m.id');
		$this->db->join('materia',' c.idMateria = m.id');*/
		//$ress=$this->db->get();
		$profe=$this->session->userdata('s_id');
				$query2="Select materia.name, cursos.idClave, cursos.idProfesor, cursos.Seccion, cursos.idMateria from materia inner join cursos on materia.id=cursos.idMateria where cursos.idProfesor='".$profe."' ORDER BY cursos.idMateria";
		$ress=$this->db->query($query2);
		if($ress->num_rows()>0){
			return $ress->result();
		} else {
			return false;
		}
		return $ress;
	}
	
	/*=====  End of Mostrar Tabla Materas  ======*/

	/*========================================
	=            Metodo Registrar            =
	========================================*/
	public function registrar($profesor){
		$campos= array(
			'id'=>$profesor['id'],
			'name '=>$profesor['name'],
			'lastname'=> $profesor['name2'],
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
	/*==================================================
	=            Registrar Alumnos al curso            =
	==================================================*/
	public function RegistrarAlumnosAMateria($idAlumnos,$idCurso){
		for ($i=0;$i<count($idAlumnos);$i++) 
      	{ 
      		$campoalumno = array(
      			'idAlumno'=>$idAlumnos[$i],
      			'idCurso'=>$idCurso
      		);
      		$this->db->insert('calificaciones',$campoalumno);
      	} 
	}
	/*=====  End of Registrar Alumnos al curso  ======*/
	/*====================================================================
	=            Regresar Calificaciones de Alumnos Por curso            =
	====================================================================*/
	
	public function calificacionesporMateria ($curs){
		$this->db->select('c.idAlumno,c.Promedio,');
		$this->db->from('calificaciones c');
		$this->db->where("idCurso", $curs);

		$resn=$this->db->get();
		if($resn->num_rows()>0){
			
			return $resn->result();
		} else {
			return false;
		}
	}
	
	/*=====  End of Regresar Calificaciones de Alumnos Por curso  ======*/
	

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