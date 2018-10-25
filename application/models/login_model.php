<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
	
	function __construct() {
	     parent:: __construct();
	     $this->load->database();
	}

	function existeUsuario($nombre,$contraseña){
		$this->db->from('login');
		$this->db->where('usuario',$nombre);
		$this->db->where('contraseña',$contraseña);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
?>