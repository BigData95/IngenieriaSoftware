<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model
{

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function crearEstudio($Nombre_estudio, $Descripcion_estudio){


        $data = array(
            'Nombre_estudio' => $Nombre_estudio,
            'Descripcion_estudio' => $Descripcion_estudio
			
        );
        return $this->db->insert('estudio', $data);
    }



}