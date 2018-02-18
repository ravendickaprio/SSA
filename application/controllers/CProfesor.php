<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProfesor extends CI_Controller {
	function __construct() {
		parent::__construct();
		/*----------  Necesario cargar libreria de Grocery CRUD  ----------*/
		
		$this->load->library('grocery_CRUD');
		$this->load->model('MProfesor');

	}
	public function Index(){
		if ($this->session->userdata('s_level')!==NULL) {
			if ($this->session->userdata('s_level')!=="3" ) {
				$this->load->view("header");
				$this->load->view("nav");
				$this->load->view("VProfesor/profesor");
				$this->load->view("footer");
				# code...
			}
			else{
				redirect("/CAlumno/","location");
			}
			# code...
		} else {
			redirect("/Welcome/","location");
			# code...
		}
		
	}

	/*============================================
	=            Vista de Abrir Curso            =
	============================================*/
	
	public function abrircurso(){
		$data["ress"]= $this->MProfesor->seleccionamateria();
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VAbrirCursoP",$data);
		$this->load->view("footer");
	}
	
	
	/*=====  End of Vista de Abrir Curso  ======*/
	/*********************************************************************************************/
	/*============================================
	=            Consulta de Materias            =
	============================================*/
	/*public function Materias(){
		$data["ress"]= $this->MProfesor->seleccionamateria();

		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("inicio",$data);
		$this->load->view("footer");
	}	*/
	
	
	/*=====  End of Consulta de Materias  ======*/

	/*=======================================
	=            Registrar Curso            =
	=======================================*/
	public function RegistraCuerso(){
		/*----------  recuperar datos del view metodod POST  ----------*/

		$curso['idProfesor']= $this->session->userdata('s_name');
		$curso['idMateria']= $this->input->post('mat');
		$curso['parcial']= $this->input->post('parsial1');
		$curso['parcial2']= $this->input->post('parsial2');
		$curso['parcial3']= $this->input->post('parsial3');
		$curso['tareas']= $this->input->post('tareas');
		$curso['practicas']= $this->input->post('practicas');
		$curso['proyecto']= $this->input->post('proyecto');
		$curso['otro']= $this->input->post('otro');
		$curso['Seccion']= $this->input->post('seccion');
		$curso['NRC']= $this->input->post('nrc');
		$curso['Preiodo']= $this->input->post('pe');
		$curso['FechaInicio']= $this->input->post('Finicio');
		$curso['FechaFin']= $this->input->post('Ffinal');
		$curso['Salon']= $this->input->post('salon');
		$curso['Horario']= $this->input->post('horario');
		$this->MProfesor->RegistrarCurso($curso);
		redirect("/CProfesor/","location");


	}
	
	
	/*=====  End of Registrar Curso  ======*/
	

	/*=========================================
	=            Prueba de Grocery            =
	=========================================*/
	
	public function Nose(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('materia'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->set_subject('Materia');
			$crud->columns('name'); //('columna1','columna2'...)
			$crud->display_as('name','Nombre de la materia'); //('columna', 'como se muestra');una por cada

			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VProfesor/Nose',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}

	}
	/*======================================================
	=            Grocery para Editar Elelemento            =
	======================================================*/
	
	public function EditarPerfilP(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('profesor'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('id',$this->session->userdata('s_id'));
			$crud->set_subject('Perfil');
			$crud->columns('name','lastname','mail','cube','ext'); //('columna1','columna2'...)
			$crud->fields('name','lastname','mail','cube','ext','pass'); //('columna1','columna2'...)
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
	
	
	/*=====  End of Grocery para Editar Elelemento  ======*/
	
	/*=======================================================
	=            View de Perfil con Grocery CRUD            =
	=======================================================*/
	
	
	public function MostrarPerfil(){
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VEditarPerfilP");
		$this->load->view("footer");
	}
	
	/*=====  End of View de Perfil con Grocery CRUD  ======*/
	
}