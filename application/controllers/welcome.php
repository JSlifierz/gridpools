<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {

		$this->load->view('home');

	}

	public function charge() {

		$this->load->model('charge_model');
		$errors = $this->charge_model->charge();

		// foreach ($errors as $error) {
		// 	echo $error;
		// }

		if (strpos($errors, 'GRD') !== false) {
			$link = str_replace('GRD', '', $errors);
			redirect('grid/id/GRD' . $link);
		}

	}

	public function terms() {
		$this->load->view('terms');
	}

}