<?php

class Grid_model extends CI_Model {

	public function getInfo($id) {

		$data = array();
		$q = $this->db->get_where('grids', array('GridID' => $id));

		if ($q->num_rows() > 0) {

			foreach ($q->result() as $row) {
				$data['grid']['name'] = $row->GridName;
				$data['grid']['perBox'] = $row->PerBox;
				$data['grid']['total'] = $row->Total;
				$data['grid']['gridSize'] = $row->GridSize;
			}

		}

		// $q = $this->db->get_where('grids', array('GridID' => $id));

		// if ($q->num_rows() > 0) {

		// 	foreach ($q->result() as $row) {
		// 		$data['grid']['name'] = $row->GridName;
		// 		$data['grid']['perBox'] = $row->PerBox;
		// 		$data['grid']['total'] = $row->Total;
		// 		$data['grid']['gridSize'] = $row->GridSize;
		// 	}

		// }

		return $data;

	}

}