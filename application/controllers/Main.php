<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
		//if (!$this->session->userdata('login')) {
		//	header("Location: http://localhost/mmail");
		//}
	}
	public function index()
	{
		$this->load->view('main/main');
	}

	public function newEmail()
	{
		$this->load->model('main_model', 'main_model');
		//obetener usuario en session
		$usuario = $this->main_model->get_user_by_name($this->session->userdata('name'));

		$data['query'] = $usuario;

		$this->load->view('main/new', $data);
	}

	public function sendEmail()
	{
		//cargar los datos de los input para ingresar el correo a la base de datos
		$subject = $this->input->post("subject");
		$address = $this->input->post("address");
		$content = $this->input->post("content");
		$sender = $this->input->post("sender");

		$this->load->model('main_model', 'main_model');
		//$usuario = $this->main_model->get_user($id);
		$usuario = $this->main_model->get_user_by_name($this->session->userdata('name'));

		$this->main_model->insert($subject, $address, $content, $sender);
		$emails = $this->main_model->get_emails($usuario);

		//mostrar el main
		$data['query'] = $usuario;
		$data['correos'] = $emails;
		$this->load->view('main/main', $data);
	}

	public function showMails()
	{
		$id = $this->input->post("id");
		$this->load->model('main_model', 'main_model');
		$email = $this->main_model->get_email($id);

		header('Content-Type: application/json');
		echo json_encode($email);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('session/session');
	}

}
