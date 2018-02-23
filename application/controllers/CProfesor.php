<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProfesor extends CI_Controller {
	function __construct() {
		parent::__construct();
		/*----------  Necesario cargar libreria de Grocery CRUD  ----------*/
		$this->load->library('grocery_CRUD');
		$this->load->model('MProfesor');
		$this->load->model('MAlumno');
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
	/*=======================================================
	=            View de Perfil con Grocery CRUD            =
	=======================================================*/
	public function SubirCalificaciones(){
		$idCurso=$this->input->post('curso');
		$this->session->set_userdata('s_curso', $idCurso);
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VSubirCal");
		$this->load->view("footer");
	}
	
	/*=====  End of View de Perfil con Grocery CRUD  ======*/

	/*=======================================================
	=            View de Perfil con Grocery CRUD            =
	=======================================================*/
	public function Vhistorial(){
		$idAlumno=$this->input->post('alumno');
		$this->session->set_userdata('s_alumno', $idAlumno);
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/Vhis");
		$this->load->view("footer");
	}
	
	/*=====  End of View de Perfil con Grocery CRUD  ======*/
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
		$curso['idProfesor']= $this->session->userdata('s_id');
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
			$crud->where('id',$this->session->userdata('s_id'));
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
	/*======================================================
	=            Grocery para Subir Calificaciones            =
	======================================================*/
	public function GrocerySubirCalificaciones(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('calificaciones'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('idCurso',$this->session->userdata('s_curso'));
			$crud->set_subject('Calificaciones');
			$crud->set_relation('idAlumno','alumno','{name} - {lastname}');//seleciona relacion y despliega en nombre real
			$crud->unset_columns('id','idCurso','Promedio'); //('columna1','columna2'...)
			$crud->unset_fields('id','idCurso','Promedio'); //('columna1','columna2'...)
			$crud->display_as('idAlumno','Nombre Alumno')->display_as('parcial','Parcial 1 ')->display_as('parcial2','% Parcial 2')->display_as('parcial3','% Parcial 3')->display_as('tareas','% Tareas')->display_as('practicas','% Practicas')->display_as('proyecto','% Proyecto')->display_as('otro','% Otro'); //('columna', 'como se muestra');una por cada
			$crud->unset_add()->unset_delete()->unset_read();
			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VProfesor/perfil2',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	/*=====  End of Grocery para Subir Calificaciones  ======*/
	/*======================================================
	=            Grocery para Ver Historial            =
	======================================================*/
	public function GroceryVerHistorial(){
		try {
			
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('calificaciones'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->where('idAlumno',$this->session->userdata('s_alumno'));
			$crud->set_subject('Calificaciones');
			$crud->set_relation('idCurso','cursos','idClave');//seleciona relacion y despliega en nombre real
			$crud->set_relation('idCurso','materia','name');//seleciona relacion y despliega en nombre real
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
	/*====================================================
	=            Mostrar todos los profesores            =
	====================================================*/
	public function MostrarProfesores(){
		try {
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('profesor'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla

			//$crud->where('id','cursos.idProfesor')->where('calificaciones.idAlumno',$this->session->userdata('s_id'))->where('cursos.idClave','calificaciones.idCurso');

			
			$crud->set_subject('Profesor');
			$crud->columns('name','lastname','mail','cube','ext'); //('columna1','columna2'...)
			$crud->fields('name','lastname','mail','cube','ext'); //('columna1','columna2'...)
			$crud->display_as('name','Nombre')->display_as('lastname','Apellido')->display_as('mail','Correo')->display_as('cube','Cubiculo')->display_as('ext','Extencion Telefonico'); //('columna', 'como se muestra');una por cada
			$crud->unset_add()->unset_delete()->unset_export()->unset_print()->unset_edit();
			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VAlumno/mostrarprofesor',$output);

		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	/*=====  End of Mostrar todos los profesores  ======*/
	
	/*===========================================================
	=            Gorcery para Editar Cursos Profesor            =
	===========================================================*/
	public function EditarCursosP(){
		try {
			$crud = new grocery_CRUD();
			//seleccionar tabla
			$crud->set_table('cursos'); //se puede si el crud pero sin ;   crud->  set table ......set subject
			//nombrar tabla
			$crud->set_subject('Curso');
			$crud->where('idProfesor',$this->session->userdata('s_id'));
			
			$crud->set_relation('idMateria','materia','name');//seleciona relacion y despliega en nombre real
			$crud->columns('idMateria','Seccion','Preiodo','NRC','parcial'); //('columna1','columna2'...)
			$crud->fields('Periodo','Preiodo','Seccion','NRC','parcial','parcial2','parcial3','tareas','practicas','proyecto'); //('columna1','columna2'...)
			$crud->display_as('idMateria','Materia')->display_as('Preiodo','Periodo')->display_as('Seccion','Seccion')->display_as('NRC','NRC')->display_as('parcial','% Parcial 1 ')->display_as('parcial2','% Parcial 2')->display_as('parcial3','% Parcial 3')->display_as('tareas','% Tareas')->display_as('practicas','% Practicas')->display_as('proyecto','% Proyecto')->display_as('otro','% Otro'); //('columna', 'como se muestra');una por cada
			$crud->unset_add()->unset_export()->unset_print();//->unset_read()->unset_delete();

			$output= $crud->render();
			//llamar a la vista
			$this->load->view('VProfesor/cursos.php',$output);
		} catch (Exception $e) {
			show_error($e->getMessage().'----'.$e->getTraceAsString());
		}
	}
	/*=====  End of Gorcery para Editar Cursos Profesor  ======*/
	/*======================================
	=            RegistraAlumno            =
	======================================*/
	
	public function RegistraAlumno(){
		$idAlumno=$this->input->post('alumnos');
		$idCurso=$this->input->post('curso');
		$this->MProfesor->RegistrarAlumnosAMateria($idAlumno,$idCurso);
		redirect("/CProfesor/","location");
	}
	/*=====  End of RegistraAlumno  ======*/
	
	
	/*===============================================
	=            Vew de Ingresar Alumnos            =
	===============================================*/
	public function IngresarAlumnos(){
		$data["ress2"]= $this->MProfesor->seleccionacurso();
		$data["ress3"]= $this->MAlumno->seleccionaalumno();
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VIngresarAlumnos",$data);
		$this->load->view("footer");
	}
	
	
	/*=====  End of Vew de Ingresar Alumnos  ======*/
	

	/*===============================================
	=            Vew de Subir Calificaciones Selecionar Materia             =
	===============================================*/
	public function SeleccionarMateria(){
		$data["ress2"]= $this->MProfesor->seleccionacurso();
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VSeleccionarMateria",$data);
		$this->load->view("footer");
	}
	
	
	/*=====  End of Vew de Subir Calificaciones Selecionar Materia   ======*/

	/*===============================================
	=            Vew de Subir Calificaciones Selecionar Materia             =
	===============================================*/
	public function SeleccionarAlumno(){
		$data["ress"]= $this->MAlumno->seleccionaalumno();
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VSeleccionarAlumno",$data);
		$this->load->view("footer");
	}
	
	
	/*=====  End of Vew de Subir Calificaciones Selecionar Materia   ======*/

	/*=======================================================
	=            View de Cursos con Grocery CRUD            =
	=======================================================*/
	public function MostrarCursosP(){
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VEditarCursosP");
		$this->load->view("footer");
	}
	/*=====  End of View de Cursos con Grocery CRUD  ======*/
	public function Estadisticas()
	{
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("VProfesor/VEstadisticas");
		$this->load->view("footer");
	}
}