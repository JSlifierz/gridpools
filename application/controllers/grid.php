<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grid extends CI_Controller {

	public function id($id) {

		$this->load->model('grid_model');
		$info = $this->grid_model->getInfo($id);

		$data = array(
			'gridName' => $info['grid']['name'],
			'perBox' => $info['grid']['perBox'],
			'total' => $info['grid']['total'],
		);

		$this->load->view('grid', $data);

	}

}