<?php

class Charge_model extends CI_Model {

	public function charge() {

		$errors = array();

		$name = $this->input->post('name');
		$grid = $this->input->post('grid');
		$bet = $this->input->post('bet');
		$size = $this->input->post('size');
		$token = $this->input->post('token');
		$email = $this->input->post('email');

		require_once(realpath(APPPATH . 'stripe/lib/Stripe.php'));

		Stripe::setApiKey("sk_test_XANoeJm0aw759joGzuu4KaPR");

		try {
			$data = array(
				"amount" => 299,
				"currency" => "cad",
				"card" => $token,
				"description" => "Grid Purchase for $2.99"
			);

		 	if (Stripe_Charge::create($data)) {

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

		 					$image = $image_data['file_name'];
		 					delete_files(realpath(APPPATH . '../assets/tmp'));

		 					$id = uniqid('USR', false);
		 					$time = time();
		 					$date = date('Y-m-d H:i:s', $time);
		 					$gridID = uniqid('GRD', false);

		 					if ($size === 'five') {
		 						$size = 2;
		 					}

		 					else {
		 						$size = 1;
		 					}

		 					$user = array(
		 						'UserID' => $id,
		 						'DateCreated' => $date,
		 						'UserName' => $name,
		 						'UserEmail' => $email,
		 						'Picture' => $image_data['file_name'],
		 						'GridID' => $gridID,
		 						'LevelID' => 2
		 					);

		 					$grid = array(
		 						'GridID' => $gridID,
		 						'Total' => 0,
		 						'PerBox' => $bet,
		 						'GridName' => $grid,
		 						'GridSize' => $size
		 					);	

		 					$this->db->insert('users', $user);
		 					$this->db->insert('grids', $grid);

		 					$this->load->dbforge();
		 					$this->dbforge->create_table($gridID);

		 					$session = array(
		 						'UserID' => $id
		 					);
		 					$this->session->set_userdata($session);

		 					return $gridID;

		 				}
		 		
		 			}

		 			else {
		 				$errors[] =  $this->upload->display_errors('<p class="error">');
		 				return $errors;
		 			}
		 		}

		 		else {

		 			$id = uniqid('USR', false);
		 			$time = time();
		 			$date = date('Y-m-d H:i:s', $time);
		 			$gridID = uniqid('GRD', false);

		 			if ($size === 'five') {
		 				$size = 2;
		 			}

		 			else {
		 				$size = 1;
		 			}

		 			$user = array(
		 				'UserID' => $id,
		 				'DateCreated' => $date,
		 				'UserEmail' => $email,
		 				'Picture' => 'profile.png',
		 				'GridID' => $gridID,
		 				'LevelID' => 2
		 			);

		 			$grid = array(
		 				'GridID' => $gridID,
		 				'Total' => 0,
		 				'PerBox' => $bet,
		 				'GridName' => $grid,
		 				'GridSize' => $size
		 			);	

		 			$this->db->insert('users', $user);
		 			$this->db->insert('grids', $grid);

		 			$session = array(
		 				'UserID' => $id
		 			);
		 			$this->session->set_userdata($session);

		 			return $gridID;

		 		}

		 	}
		} 

		catch(Stripe_CardError $e) {
		  	$body = $e->getJsonBody();
		  	$err  = $body['error'];
		
		  	print('Status is:' . $e->getHttpStatus() . "\n");
		  	print('Type is:' . $err['type'] . "\n");
		  	print('Code is:' . $err['code'] . "\n");
		  	// param is '' in this case
		  	print('Param is:' . $err['param'] . "\n");
		  	print('Message is:' . $err['message'] . "\n");
		}

		return $errors;

	}

}

























