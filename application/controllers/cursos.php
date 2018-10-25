<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Codigofacilito_model');
	}
	function index(){
		$data['segmento'] = $this->uri->segment(3);
		$this->load->view('Codigofacilito/headers');
		if(!$data['segmento']){
		$data['cursos'] = $this->Codigofacilito_model->obtenerCursos();
		}
		else{
			$data['cursos'] = $this->Codigofacilito_model->obtenerCurso($data['segmento']);
		}
		$this->load->view('cursos/cursos',$data);
	}
	function nuevo(){
        $this->load->view('Codigofacilito/headers');
        $this->load->view('cursos/formulario');	 
	}
	function recibirDatos(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'videos' => $this->input->post('videos')
		);
		$this->Codigofacilito_model->crearCurso($data);
		$this->load->view('Codigofacilito/headers');
		$this->load->view('Codigofacilito/bienvenido');
	}
	function editar(){
		$data['id'] = $this->uri->segment(3);
		$data['curso'] = $this->Codigofacilito_model->obtenerCurso($data['id']);
		$this->load->view('Codigofacilito/headers');
		$this->load->view('cursos/editar',$data);
	}
	function actualizar(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'videos' => $this->input->post('videos')
		);
		$this->Codigofacilito_model->actualizarCurso($this->uri->segment(3),$data);
		$this->load->view('Codigofacilito/headers');
		$this->load->view('Codigofacilito/bienvenido');
	}

}
?>