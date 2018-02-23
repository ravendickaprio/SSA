<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAlumno extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}
	public function Index(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')==="3" ) {
				# code...
				$this->load->view("header");
				$this->load->view("nav");
				$this->load->view("VAlumno/alumno");
				$this->load->view("footer");
			}
			else
			{
				redirect("/CProfesor/","location");
			}
			# code...
			
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
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VAlumno/VMostrarCalificaciones");
		$this->load->view("footer");
	}
	/*====================================================
	=            Mostrar Calificaciones        =
	====================================================*/
	public function MostrarCalificaciones(){
		try {
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('calificaciones'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla

			$crud->set_subject('Calificaciones');//label de la tabla

			//$crud->column('materia.name')->where('idCurso','cursos.idClave')->where('cursos.idMateria','materia.id');
	
			$crud->columns('parcial','parcial2','parcial3','tareas','practicas','proyecto','otro','promedio'); //('columna1','columna2'...)
			$crud->fields('parcial','parcial2','parcial3','tareas','practicas','proyecto','otro','promedio'); //('columna1','columna2'...)

			$crud->display_as('parcial','Parcial 1')->display_as('parcial2','Parcial 2')->display_as('parcial3','Parcial 3')->display_as('tareas','Tareas')->display_as('practicas','Practicas')->display_as('proyecto','Proyecto')->display_as('otro','Extras'); //('columna', 'como se muestra');una por cada
			$crud->unset_add()->unset_delete()->unset_export()->unset_print()->unset_edit();
			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VAlumno/mostrarcalificacion',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	/*=====  End of MostrarCalificaciones  ======*/
	
}