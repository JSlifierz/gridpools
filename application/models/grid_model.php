<?php

class Grid_model extends CI_Model {

	public function getInfo($id, $user) {

		if ($user == false) {
			$user = null;
		}

		$data = array();
		$q = $this->db->get_where('grids', array('GridID' => $id));

		if ($q->num_rows() > 0) {

			foreach ($q->result() as $row) {
				$data['grid']['name'] = $row->GridName;
				$data['grid']['perBox'] = $row->PerBox;
				$data['grid']['total'] = $row->Total;
				$data['grid']['gridSize'] = $row->GridSize;
				$data['grid']['trange'] = $row->TRange;
				$data['grid']['lrange'] = $row->LRange;
			}

		}

		$this->db->where('UserID', $user);
		$q2 = $this->db->get('users');

		if ($q2->num_rows() > 0) {

			foreach ($q2->result() as $row) {
				$data['user']['bet'] = $row->Bet;
				$data['user']['picture'] = $row->Picture;
				$data['user']['name'] = $row->UserName;
			}

		}

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('GridID', $id);
		$q3 = $this->db->get();

		$strletters = 'A,B,C,D,E,F,G,H,I,J';
		$letters = explode(',', $strletters);

		foreach ($letters as $row) {
			for ($i = 1; $i < 11; $i++) {
				$gridPointers[$row . $i] = null;
			}
		}

		foreach ($q3->result() as $row) {
			$spots = explode(',', $row->GridSpots);

			foreach ($spots as $taken) {
				foreach ($gridPointers as $pointer => $box) {
					if ($taken === $pointer) {
						$gridPointers[$taken]['img'] = $row->Picture;
						$gridPointers[$taken]['name'] = $row->UserName;
					}
				}
			}
		}

		$data['boxes'] = $gridPointers;

		return $data;

	}

	public function bet() {

		if (is_uploaded_file($_FILES['img']['tmp_name'])) {

			$config = array(
				'allowed_types' => 'jpg|jpeg|gif|png',
				'upload_path' => realpath(APPPATH . '../assets/tmp'),
				'file_name' => uniqid('IMG', false),
				'overwrite' => true,
			);

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('img')) {
				$image_data = $this->upload->data();

				$config = array(
					'source_image' => $image_data['full_path'],
					'maintain_ratio' => true,
					'width' => 138,
					'height' => 138
				);

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				require 'S3.php';

				$S3 = new S3('AKIAJYSUYP7GJAVALVYQ', 'C2Dawva8+0AtELfgCk6ypDS6cx/4nuNlJqhaF6Kk');

				$s3_file_name = 'images/' . $image_data['file_name'];
				$file = realpath(APPPATH . '../assets/tmp/' . $image_data['file_name']);

				if (S3::putObject($S3->inputFile($file, false), 'gridpools_photos', $s3_file_name, S3::ACL_PUBLIC_READ)) {

					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$box = $this->input->post('box');
					$gridID = $this->input->post('gridID');
					$perBox = $this->input->post('perBox');
					$id = uniqid('USR', false);
					$time = time();
					$date = date('Y-m-d H:i:s', $time);

					$user = array(
						'UserID' => $id,
						'DateCreated' => $date,
						'UserName' => $name,
						'UserEmail' => $email,
						'Picture' => $image_data['file_name'],
						'GridID' => $gridID,
						'LevelID' => 1,
						'Bet' => $perBox,
						'GridSpots' => $box
					);

					$this->db->insert('users', $user);

					$q = $this->db->get_where('grids', array('GridID' => $gridID));
					foreach ($q->result() as $row) {
						$this->db->where('GridID', $gridID);
						$this->db->update('grids', array('Total' => $row->Total + $perBox));
					}

				}

			}

		}

		else {

			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$box = $this->input->post('box');
			$gridID = $this->input->post('gridID');
			$perBox = $this->input->post('perBox');
			$id = uniqid('USR', false);
			$time = time();
			$date = date('Y-m-d H:i:s', $time);

			$user = array(
				'UserID' => $id,
				'DateCreated' => $date,
				'UserName' => $name,
				'UserEmail' => $email,
				'Picture' => 'logo.png',
				'GridID' => $gridID,
				'LevelID' => 1,
				'Bet' => $perBox,
				'GridSpots' => $box
			);

			$this->db->insert('users', $user);

			$q = $this->db->get_where('grids', array('GridID' => $gridID));
			foreach ($q->result() as $row) {
				$this->db->where('GridID', $gridID);
				$this->db->update('grids', array('Total' => $row->Total + $perBox));
			}

		}

	}

	public function updatePot($id) {

		$q = $this->db->get_where('grids', array('GridID' => $id));

		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				
				echo '$' . $row->Total;

			}
		}

	}

}


























