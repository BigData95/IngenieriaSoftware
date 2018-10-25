<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_model');
    }

    function index()
    {
        $this->load->helper(array('form'));
        $this->load->view('login_view');
    }

    public function user_login_process()
    {
      //Valida los campos 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            if (isset($this->session->userdata['logged_in'])) {

                header('Location:' . base_url() . 'home_view.php');
            } else {
                $this->load->view('login_form');
            }
        } else {
            $data = array(
                'uuname' => $this->input->post('username'),
                'upass' => md5($this->input->post('password'))
            );
            $result = $this->login_model->login($data);
            if ($result == true) {
                $username = $this->input->post('username');

                $result = $this->login_model->read_user_information($username);

                if ($result != false) {
                    $session_data = array(

                        'username' => $result[0]->username,
                        'iduser' => $result[0]->id,
                    );                                        
                        // Pasa el arreglo a la vista
                    $this->session->set_userdata('logged_in', $session_data);
                    header('Location:' . base_url() . 'home_view.php');

                }
            } else {
                $data = array('error_message' => 'Usuario o Password No válidos.');
                $this->load->view('login_form', $data);
            }
        }
    }
    public function logout()
    {
    
        // Elimina los datos de la sesión
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'La sesión finalizó correctamente.';
        $this->load->view('login_form', $data);
    }

}
// ?> 