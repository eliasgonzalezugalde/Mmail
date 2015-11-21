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
	public function index()
	{
		$this->load->view('main/main');
	}

	public function newEmail($id)
	{
		$this->load->model('main_model', 'main_model');
		$usuario = $this->main_model->get_user($id);

		$data['query'] = $usuario;

		$this->load->view('main/new', $data);
	}

	public function sendEmail($id)
	{
		//cargar los datos de los input para ingresar el correo a la base de datos
		$subject = $this->input->post("subject");
		$address = $this->input->post("address");
		$content = $this->input->post("content");
		$sender = $this->input->post("sender");

		$this->load->model('main_model', 'main_model');
		$usuario = $this->main_model->get_user($id);
		$emails = $this->main_model->get_emails;
		$this->main_model->insert($subject, $address, $content, $sender);

		//mostrar el main
		$data['query'] = $usuario;
		$data2['emails'] = $emails;
		$this->load->view('main/main', $data, $data2);
	}

	public function showMails()
	{
		$id = $this->input->post("id");
		$this->load->model('main_model', 'main_model');
		$email = $this->main_model->get_email($id);

		//$con = $email->contenido. '';
		header('Content-Type: application/json');
		echo json_encode($email);
	}

}
