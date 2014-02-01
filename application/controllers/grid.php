<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grid extends CI_Controller {

	var $UserID;
	var $gridID;

	function __construct() {
		parent::__construct();
		$this->UserID();
	}

	public function UserID() {
		$this->UserID = $this->session->userdata('UserID');
	}

	public function id($id) {

		$this->load->model('grid_model');
		$info = $this->grid_model->getInfo($id, $this->UserID);
		$this->gridID = $id;

		$data = array(
			'gridName' => $info['grid']['name'],
			'perBox' => $info['grid']['perBox'],
			'total' => $info['grid']['total'],
			'trange' => $info['grid']['trange'],
			'lrange' => $info['grid']['lrange'],
			'boxes' => $info['boxes'],
			'gridID' => $id
		);

		if (isset($info['user'])) {
			$data['bet'] = $info['user']['bet'];
			$data['picture'] = $info['user']['picture'];
			$data['name'] = $info['user']['name'];
		}

		$this->load->view('grid', $data);

	}

	public function bet() {

		$this->load->model('grid_model');
		$this->grid_model->bet();

		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');

	}

	public function potTotal($id) {

		$this->load->model('grid_model');
		$this->grid_model->updatePot($id);

	}

}