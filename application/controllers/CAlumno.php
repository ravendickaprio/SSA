<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAlumno extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('MAlumno');
		$this->load->library('grocery_CRUD');
	}
	public function Index(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')==="3" ) {
				$this->load->view("header");
				$this->load->view("nav");
				$this->load->view("VAlumno/alumno");
				$this->load->view("footer");
			}
			else
			{
				redirect("/CProfesor/","location");
			}
		}
		else
		{
			redirect("/Welcome/","location");
		}
	}
	public function EditarPerfilA(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('alumno'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('id',$this->session->userdata('s_id'));
			$crud->set_subject('Perfil');
			$crud->columns('name','lastname','mail','eduprogram','phone'); //('columna1','columna2'...)
			$crud->fields('name','lastname','mail','eduprogram','phone','pass'); //('columna1','columna2'...)
			$crud->display_as('name','Nombre')->display_as('lastname','Apellido')->display_as('mail','Correo')->display_as('cube','Cubiculo')->display_as('ext','Extencion Telefonico')->display_as('pass','Contraseña'); //('columna', 'como se muestra');una por cada
			$crud->field_type('pass', 'password');
			$crud->unset_add()->unset_delete()->unset_export()->unset_print()->unset_read();
			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VProfesor/perfilp',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	public function MostrarPerfil(){
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VAlumno/VEditarPerfilA");
		$this->load->view("footer");
	}
	public function MostrarPprofesores(){
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VAlumno/VMostrarProfesores");
		$this->load->view("footer");
	}
	public function VMostrarCalificaciones(){
		$data["ress"]= $this->MAlumno->seleccionaMaterias();
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VAlumno/VMostrarCalificaciones",$data);
		$this->load->view("footer");
	}
	/*========================================
	=            Mostrar Materias            =
	========================================*/
	
	public function MostrarMaterias(){
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VAlumno/VMostrarMaterias");
		//$this->load->view("VAlumno/VMostrarMaterias"); Futuramente se desplegaran como Targetas
		$this->load->view("footer");
	}
	
	/*=====  End of Mostrar Materias  ======*/
	
	/*====================================================
	=            Mostrar Calificaciones        =
	====================================================*/
	public function MostrarCalificaciones(){
		try {
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('calificaciones'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('idAlumno',$this->session->userdata('s_id'));
			$crud->set_subject('Calificaciones');
			$crud->set_relation('idCurso','cursos','idClave');//seleciona relacion y despliega en nombre real
			$crud->set_relation('idCurso','materia','name');//seleciona relacion y despliega en nombre real
			$crud->unset_columns('id','idAlumno'); //('columna1','columna2'...)
			$crud->unset_fields('id','idAlumno'); //('columna1','columna2'...)
			$crud->display_as('idCurso','Materia')->display_as('parcial','Parcial 1 ')->display_as('parcial2','% Parcial 2')->display_as('parcial3','% Parcial 3')->display_as('tareas','% Tareas')->display_as('practicas','% Practicas')->display_as('proyecto','% Proyecto')->display_as('otro','% Otro'); //('columna', 'como se muestra');una por cada
			$crud->unset_add()->unset_delete()->unset_edit();
			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VAlumno/mostrarcalificacion',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	/*=====  End of MostrarCalificaciones  ======*/
	/*======================================================
	=            Grocery para Ver Historial            =
	======================================================*/
	public function GroceryVerHistorial(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('calificaciones'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('idAlumno',$this->session->userdata('s_id'));
			$crud->set_subject('Calificaciones');
			$crud->set_relation('idCurso','cursos','{idClave}- {idProfesor}');//seleciona relacion y despliega en nombre real
			$crud->set_relation('idCurso','materia','name');//seleciona relacion y despliega en nombre real
			$crud->set_relation('idCurso','profesor','name');//seleciona relacion y despliega en nombre real
			$crud->unset_columns('id','idAlumno'); //('columna1','columna2'...)
			$crud->unset_fields('id','idAlumno'); //('columna1','columna2'...)
			$crud->display_as('idCurso','Materia')->display_as('parcial','Parcial 1 ')->display_as('parcial2','% Parcial 2')->display_as('parcial3','% Parcial 3')->display_as('tareas','% Tareas')->display_as('practicas','% Practicas')->display_as('proyecto','% Proyecto')->display_as('otro','% Otro'); //('columna', 'como se muestra');una por cada
			$crud->unset_add()->unset_delete()->unset_export()->unset_print()->unset_edit();
			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VProfesor/perfil2',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	/*=====  End of Grocery para Ver Historial  ======*/
	/*======================================================
	=            Grocery para Ver Materias            =
	======================================================*/
	public function GroceryMaterias(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('calificaciones'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('idAlumno',$this->session->userdata('s_id'));
			$crud->set_subject('Materias');

			$crud->set_relation('idCurso','cursos','idClave');//seleciona relacion y despliega en nombre real
			$crud->set_relation('idCurso','materia','name');//seleciona relacion y despliega en nombre real
			//$crud->set_relation_n_n('Profesor', 'cursos', 'profesor', 'id', 'idClave', 'name');//seleciona relacion y despliega en nombre real
			//$crud->set_relation('idCurso','profesor','name');
			$crud->columns('idCurso','id','Promedio'); //('columna1','columna2'...)
			$crud->unset_fields('idAlumno'); //('columna1','columna2'...)
			$crud->display_as('idCurso','Materia')->display_as('parcial','Parcial 1 ')->display_as('parcial2','% Parcial 2')->display_as('parcial3','% Parcial 3')->display_as('tareas','% Tareas')->display_as('practicas','% Practicas')->display_as('proyecto','% Proyecto')->display_as('otro','% Otro'); //('columna', 'como se muestra');una por cada
			$crud->unset_add()->unset_delete()->unset_export()->unset_print()->unset_edit();
			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VProfesor/perfil2',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	/*=====  End of Grocery para Ver Materias  ======*/
	
	
}