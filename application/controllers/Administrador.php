<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller
{

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->helper('html');
        $this->load->model('admin_model');

    }


    public function crearEstudio(){
        $data = new stdClass();

        $this->load->view('header');
        $this->load->view('user/administrador/crearEstudio_view');
        $this->load->view('footer');


        if ($this->user_model->crearEstudio($Nombre_estudio, $Descripcion_estudio)) {
            
            
        }

    }
            

        //$this->load->view('user/administrador/crearEstudio');


    




}