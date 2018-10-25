<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
	
	function __construct() {
	     parent:: __construct();
	     $this->load->helper('form');
	     $this->load->model('login_model');
	}

	function index(){
		$this->load->view('welcome_message');
		$this->load->model('login_model');

	}

	public function ingresar(){
		$nombre = $this->input->post("usuario");
		$contraseña = $this->input->post("contraseña");

		$resp = $this->login_model->existeUsuario($nombre, $contraseña);

		if($resp){
			echo "listo";
		} else{
			echo "error";
		}
	}

}
?>