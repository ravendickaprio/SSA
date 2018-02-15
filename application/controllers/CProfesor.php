<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProfesor extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');

	}
	public function Index(){
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/profesor");
		$this->load->view("footer");
	}
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
	public function EditarPerfilP(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('profesor'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('id',$this->session->userdata('s_id'));
			$crud->set_subject('Perfil');
			$crud->columns('name','mail','cube','ext'); //('columna1','columna2'...)
			$crud->fields('name','mail','cube','ext','pass'); //('columna1','columna2'...)
			$crud->display_as('name','Nombre')->display_as('mail','Correo')->display_as('cube','Cubiculo')->display_as('ext','Extencion Telefonico')->display_as('pass','Contraseña'); //('columna', 'como se muestra');una por cada
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
		$this->load->view("VProfesor/VEditarPerfilP");
		$this->load->view("footer");
	}
}