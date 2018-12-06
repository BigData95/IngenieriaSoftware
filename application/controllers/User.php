<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url','form'));
		$this->load->helper('html');
		$this->load->model('user_model');
		
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * funcion register
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// crea el objeto de datos
		$data = new stdClass();
		
		// carga form helper y libreria de validacion  
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// Reglas de validacion
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|max_length[15]|is_unique[usuario.username]', array('is_unique' => 'Este usuario ya existe. Por favor seleciona otro'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuario.email]|max_length[64]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]|max_length[30]');
		
		if ($this->form_validation->run() === false) {
			
			// No cumple con las validaciones, limpia la ventana y mandala al usuario
			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');
			
		} else {
			
			// Definimos las variables con los datos del form
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$tipoUsuario = 3;  //Default sin asignar
			
			
			if ($this->user_model->create_user($first_name, $last_name,$username, $email, $password, $tipoUsuario)) {
				
				// Creacion de usuario exitosa
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// Fallo de creacion de usuario. Nunca deberia de pasar esto.
				$data->error = 'Hubo un problema creando tu cuenta :c Por favor inténtalo de nuevo.';
				
				// manda error al usuario
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {

		// crea el objeto de datos
		$data = new stdClass();
		
		// carga form helper y libreria de validacion  
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// Reglas de validacion
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
				// No cumple con las validaciones, limpia la ventana y mandala al usuario
			$this->load->view('header');
			$this->load->view('user/login/login');
			$this->load->view('footer');
			
		} else {
			
			// Definimos las variables con los datos del form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$usuario    = $this->user_model->get_user($user_id);
				$tipoUsuario = $this->user_model->obtenTipoUsuario($username);
				
				// Establece datos de usuario para la sesion       
				$_SESSION['user_id']      = (int)$usuario->id_usuario;  //Se modifico de id
				$_SESSION['username']     = (string)$usuario->username;
				$_SESSION['logged_in']    = (bool)true;
				//$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				//$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// login ok
				$this->load->view('header');

				if($tipoUsuario == 0){
					$this->load->view('user/administrador/main_administrador', $data);
				}else if($tipoUsuario == 1){
					$this->load->view('user/analista/main_analista', $data);
				}else if($tipoUsuario == 2){
					$this->load->view('user/encuestador/main_encuestador', $data);
				}else{
					$this->load->view('user/login/login_success', $data);
				}
		
	
				
				
				$this->load->view('footer');
				
			} else {
				
				// login fallo
				$data->error = 'Usuario o contraseña incorrecta..';
				
				// manda error y regresa la vista
				$this->load->view('header');
				$this->load->view('user/login/login', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
	
		// crea el objeto de datos
		$data = new stdClass();

		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// Quitamos informacion de la sesion
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('footer');

		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('user/login/login');
			
		}
		
	}

	//Eliminar posiblemente
	public function BotoncrearEstudio(){
		$data = new stdClass();

		$this->load->view('header');
		$this->load->view('user/administrador/crearEstudio_view',$data);
		$this->load->view('footer');

	}


	public function creacionEstudios(){
	// crea el objeto de datos
		$data = new stdClass();
		

	
		
		// carga form helper y libreria de validacion  
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// Reglas de validacion
		$this->form_validation->set_rules('Nombre_estudio', 'Nombre_estudio', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('Descripcion_estudio', 'Descripcion_estudio', 'trim|required|min_length[10]|max_length[200]');


		if ($this->form_validation->run() === false) {
			$this->load->view('header');
			$this->load->view('user/administrador/crearEstudio_view', $data);
			$this->load->view('footer');	

		} else {

			$Nombre_estudio = $this->input->post('Nombre_estudio');
			$Descripcion_estudio = $this->input->post('Descripcion_estudio');

			if ($this->user_model->crearEstudio($Nombre_estudio, $Descripcion_estudio)) {
				$this->load->view('header');
				$this->load->view('user/administrador/main_administrador', $data);
				$this->load->view('footer');	

			} else {
				$data->error = 'Hubo un problema creando tu estudio :c Por favor inténtalo de nuevo.';
				$this->load->view('header');
				$this->load->view('user/administrador/main_administrado', $data);				
				//$this->load->view('user/administrador/crearEstudio_view', $data);
				$this->load->view('footer');
			}
		}

		
		


	}

	public function creacionCuestionario(){
		//$data = new stdClass();
		
		// carga form helper y libreria de validacion  
		$this->load->helper('form');
		$this->load->library('form_validation');


		
		// Reglas de validacion
		$this->form_validation->set_rules('Nombre_cuestionario', 'Nombre cuestionario', 'trim|required|min_length[5]|max_length[50]');

		$data['Nombre_estudio'] = $this->user_model->get_estudios();




		if ($this->form_validation->run() === false) {
			$this->load->view('header');
			$this->load->view('user/administrador/crearCuestionario', $data);
			$this->load->view('footer');

		} else {

			$Nombre_cuestionario = $this->input->post('Nombre_cuestionario');
			$id_estudio = 4;
			if ($this->user_model->crearCuestionario($Nombre_cuestionario,$id_estudio)) {


				$this->load->view('header');
				$this->load->view('user/administrador/main_administrador', $data);
				$this->load->view('footer');

			} else {
				$data->error = 'Hubo un problema creando tu cuestionario :c Por favor inténtalo de nuevo.';
				$this->load->view('header');
				$this->load->view('user/administrador/main_administrado', $data);				
				//$this->load->view('user/administrador/crearEstudio_view', $data);
				$this->load->view('footer');
			}
		}
	}


	public function agregaPregunta(){

		
		// carga form helper y libreria de validacion  
		$this->load->helper('form');
		$this->load->library('form_validation');


		$this->form_validation->set_rules('reactivo', 'Pregunta', 'trim|min_length[5]|max_length[50]');
		$data['Nombre_cuestionario'] = $this->user_model->get_cuestionario();


		if ($this->form_validation->run() === false) {
			$this->load->view('header');
			$this->load->view('user/administrador/agregarPreguntas', $data);
			$this->load->view('footer');

		} else {

			$reactivo = $this->input->post('reactivo');
			if ($this->user_model->crearpregunta($reactivo)) {


				$this->load->view('header');
				$this->load->view('user/administrador/agregarPreguntas', $data);
				$this->load->view('footer');

			} else {
				$data->error = 'Hubo un problema creando tu cuestionario :c Por favor inténtalo de nuevo.';
				$this->load->view('header');
				$this->load->view('user/administrador/main_administrado', $data);				
				//$this->load->view('user/administrador/crearEstudio_view', $data);
				$this->load->view('footer');
			}
		}


	}



	public function verEstudios(){

		$data = new stdClass();
		
		// carga form helper y libreria de validacion  
		$this->load->helper('form');
		$this->load->library('form_validation');

		//if(getEstudios() == true){
			$this->load->view('header');
			$this->load->view('user/administrador/main_administrador', $data);
			$this->load->view('footer');	
		//}


	}



	
}
