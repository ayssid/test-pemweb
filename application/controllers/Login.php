<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index() {
		$this->load->view('login');
	}

	public function submit()
	{
		// $email = $_POST['email'];
		// $password = $_POST['password'];
		$dummyEmail = "test@test.com";
		$dummyPassword = "test";

		$email = $this->input->post('email');
		$password =  $this->input->post('password');

		if($email == $dummyEmail && $password == $dummyPassword) {
			$data_session = array(
				'email' => $email,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('/');
		} else {
			redirect('/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}
}
