<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('MProfesor');
		$this->load->model('MAlumno');

	}
	public function Index() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("inicio");
		//$this->load->view("session");
		$this->load->view("footer");
	}
	public function Session() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("session");
		$this->load->view("footer");
	}
	public function Validation() {
		//$this->load->view("header");
		/*----------  Login  ----------*/
		$lvl= $this->input->post('lvl');
		$user= $this->input->post('user');
		$pass= $this->input->post('mat');
		/**
		 * Obtener Usuario y Pass y mandar al Modelo MProfesor a la funcion ingresar
		 * luego regresar el level en ress
		 * lo otro es de vicenteS
		 * 1 Profesor
		 * 2 ALumno
		 */
		
		if($lvl==1){
			$res= $this->MProfesor->ingresar($user,$pass);
			if($res==1)
				/*----------  Redirecciona a Controlador  ----------*/
				
			{redirect("/CProfesor/","location");}
			else
			{redirect("/Welcome/Session","location");}

			/*----------  Vicente Comento  ----------*/
			/*
				$res2 = $this->MProfesor->Check($user,$pass);
				$this->form_validation->set_rules('username', 'Username', 'required|callback_user_exists');
				$this->form_validation->set_rules('password', 'Password', 'required|callback_password_match');
				if ($this->form_validation->run() !== false) {
	                $this->load->view('logueado');
	            } else {
	                $this->load->view('error');
	            }
			*/
		}
		else{
			$res= $this->MAlumno->ingresar($user,$pass);
			if($res==1)
			{redirect("/CAlumno/","location");}
			else
			{redirect("/Welcome/Session","location");}
		}
		
	}
	public function user_exists($username) {
		
	}
	public function RegisterP() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("registerP");
		$this->load->view("footer");
	}
	public function RegisterA() {
		$this->load->view("header");
		$this->load->view("nav");
		$this->load->view("registerA");
		$this->load->view("footer");
	}
	public function Cerrar(){
		session_destroy();
		unset($_SESSION);
		redirect("/Welcome/","location");
	}
	public function Registrar_Profesor(){
		$profesor['id']= $this->input->post('mat');
		$profesor['name']= $this->input->post('nombre');
		$profesor['name2']= $this->input->post('apellido');
		$profesor['ext']= $this->input->post('cel');
		$profesor['cube']= $this->input->post('cubi');
		$profesor['pass']= $this->input->post('pass');
		$profesor['mail']= $this->input->post('correo');

		$this->MProfesor->registrar($profesor);
		redirect("/Welcome/","location");
	}
	public function Registrar_Alumno(){
		$alumno['id']= $this->input->post('mat');
		$alumno['name']= $this->input->post('nombre');
		$alumno['name2']= $this->input->post('apellido');
		$alumno['mail']= $this->input->post('correo');
		$alumno['phone']= $this->input->post('cel');
		$alumno['eduprogram']= $this->input->post('PE');
		$alumno['pass']= $this->input->post('pass');

		$this->MAlumno->registrar($alumno);
		redirect("/Welcome/","location");

	}

}
