<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {

		$this->load->view('home');

	}

	public function charge() {

		// echo $this->input->post('name');
		echo 'test';

	}

}