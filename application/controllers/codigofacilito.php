<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofacilito extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Codigofacilito_model');
	}
	function index(){
		$this->load->library('menu',array('Inicio','Contacto','Cursos'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('Codigofacilito/headers');
		$this->load->view('Codigofacilito/bienvenido',$data);

	}
	function holaMundo(){
		$this->load->view('Codigofacilito/headers');
		$this->load->view('Codigofacilito/bienvenido');
	}

}


?>	