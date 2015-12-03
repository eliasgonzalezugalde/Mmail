<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$newdata = array(
			'login'=> false
			);
		$this->session->set_userdata($newdata);
	}

	public function index()
	{
		$this->load->view('session/session');
	}

	public function validate()
	{
		$name = $this->input->post("username");
		$password = $this->input->post("password");

		// connect to db
		$this->load->model('session_model', 'session_model');
		$usuario = $this->session_model->authenticate($name, $password);
		$data['query'] = $usuario;

		$this->load->model('main_model', 'main_model');
		$emails = $this->main_model->get_emails($usuario);
		$data['correos'] = $emails;

		if (count($usuario) > 0) {

			$newdata = array(
				'name'  => $name,
				'login' => TRUE
				);
			$this->session->set_userdata($newdata);
			
			$this->load->view('main/main', $data);
		} else {
			$this->load->view('session/session');
		}

	}
	
	public function register() {
		$username_register = $this->input->post("username_register");
		$password_register = $this->input->post("password_register");
		$address_register = $this->input->post("address_register");

		$this->load->model('session_model', 'session_model');
		$this->session_model->insert($username_register, $password_register, $address_register);

		$this->load->model('main_model', 'main_model');
		$usuario = $this->main_model->get_user_by_name($username_register);

		$this->load->library('email'); // Note: no $config param needed
		$this->email->from('eliasgonzalezugalde@gmail.com');
		$this->email->to($address_register);
		$this->email->subject('Mmail - email verification');
		$this->email->message('The following link will redirect you to activate your account email. ' . 'http://localhost/mmail/session/activate/' . md5($usuario[0]->id) );
		$this->email->send();

		$this->load->view('session/session');
	}

	public function activate($id_encriptado) {
		$this->load->model('session_model', 'session_model');

		$this->session_model->activate($id_encriptado);

		$this->load->view('session/session');
	}
}
