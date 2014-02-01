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
						 				'LevelID' => 2,
						 				'Bet' => 0
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

						 			// $session = array(
						 			// 	'UserID' => $id
						 			// );
						 			// $this->session->set_userdata($session);

						 			require_once(APPPATH . 'mandrill/Mandrill.php');

						 			try {
						 			    $mandrill = new Mandrill('RneCcFuZhM34BKS5x2UBOA');
						 			   
						 			    $message = array(
						 			    	'html' => '<p>Hey, thanks for your purchase. Here is the URL to your grid. Be sure not to lose it as it is the only way you can access your grid. Share it with your friends so they can join in on the action. Enjoy, and feel free to contact us if there are any features you think we should build next. Thanks again!</p><p><a href="http://gridpools.com/grid/id/' . $gridID . '" target="_blank">http://gridpools.com/grid/id/' . $gridID . '</a></p>',
						 			        'subject' => 'Your Grid Link',
						 			        'from_email' => 'DONOTREPLY@gridpools.com',
						 			        'from_name' => 'Gridpools',
						 			        'to' => array(
						 			            array(
						 			                'email' => $email,
						 			                'type' => 'to'
						 			            )
						 			        ),
						 			        'important' => true,
						 			        'track_opens' => true,
						 			        'track_clicks' => true,
						 			        'auto_text' => false,
						 			        'auto_html' => false,
						 			        'inline_css' => true,
						 			        'url_strip_qs' => false,
						 			        'preserve_recipients' => false,
						 			        'merge' => true,
						 			    );
						 			    $async = false;
						 			    $result = $mandrill->messages->send($message, $async);
						 			    
						 			} catch(Mandrill_Error $e) {
						 			    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
						 			    throw $e;
						 			}

						 			return $gridID;

			}

		 	// if (Stripe_Charge::create($data)) {

		 	// 	if (is_uploaded_file($_FILES['img']['tmp_name'])) {

		 	// 		$config = array(
		 	// 			'allowed_types' => 'jpg|jpeg|gif|png',
		 	// 			'upload_path' => realpath(APPPATH . '../assets/tmp'),
		 	// 			'file_name' => uniqid('IMG', false),
		 	// 			'overwrite' => true,
		 	// 		);

		 	// 		$this->load->library('upload', $config);

		 	// 		if ($this->upload->do_upload('img')) {
		 	// 			$image_data = $this->upload->data();

		 	// 			$config = array(
		 	// 				'source_image' => $image_data['full_path'],
		 	// 				'maintain_ratio' => true,
		 	// 				'width' => 138,
		 	// 				'height' => 138
		 	// 			);

		 	// 			$this->load->library('image_lib', $config);
		 	// 			$this->image_lib->resize();

		 	// 			require 'S3.php';

		 	// 			$S3 = new S3('AKIAJYSUYP7GJAVALVYQ', 'C2Dawva8+0AtELfgCk6ypDS6cx/4nuNlJqhaF6Kk');

		 	// 			$s3_file_name = 'images/' . $image_data['file_name'];
		 	// 			$file = realpath(APPPATH . '../assets/tmp/' . $image_data['file_name']);

		 	// 			if (S3::putObject($S3->inputFile($file, false), 'gridpools_photos', $s3_file_name, S3::ACL_PUBLIC_READ)) {

		 	// 				$image = $image_data['file_name'];
		 	// 				delete_files(realpath(APPPATH . '../assets/tmp'));

		 	// 				$id = uniqid('USR', false);
		 	// 				$time = time();
		 	// 				$date = date('Y-m-d H:i:s', $time);
		 	// 				$gridID = uniqid('GRD', false);

		 	// 				if ($size === 'five') {
		 	// 					$size = 2;
		 	// 				}

		 	// 				else {
		 	// 					$size = 1;
		 	// 				}

		 	// 				$user = array(
		 	// 					'UserID' => $id,
		 	// 					'DateCreated' => $date,
		 	// 					'UserName' => $name,
		 	// 					'UserEmail' => $email,
		 	// 					'Picture' => $image_data['file_name'],
		 	// 					'GridID' => $gridID,
		 	// 					'LevelID' => 2,
		 	// 					'Bet' => 0
		 	// 				);

		 	// 				$topN = range(0, 9);
		 	// 				shuffle($topN);

		 	// 				$topN = implode(',', $topN);

		 	// 				$bottomN = range(0, 9);
		 	// 				shuffle($bottomN);

		 	// 				$bottomN = implode(',', $topN);

		 	// 				$grid = array(
		 	// 					'GridID' => $gridID,
		 	// 					'Total' => 0,
		 	// 					'PerBox' => $bet,
		 	// 					'GridName' => $grid,
		 	// 					'GridSize' => $size,
		 	// 					'TRange' => $topN,
		 	// 					'LRange' => $bottomN
		 	// 				);	

		 	// 				$this->db->insert('users', $user);
		 	// 				$this->db->insert('grids', $grid);

		 	// 				$session = array(
		 	// 					'UserID' => $id
		 	// 				);
		 	// 				$this->session->set_userdata($session);

		 	// 				require_once(APPPATH . 'mandrill/Mandrill.php');

		 	// 				try {
		 	// 				    $mandrill = new Mandrill('RneCcFuZhM34BKS5x2UBOA');
		 					   
		 	// 				    $message = array(
		 	// 				    	'html' => '<p>Hey, thanks for your purchase. Here is the URL to your grid. Be sure not to lose it as it is the only way you can access your grid. Share it with your friends so they can join in on the action. Enjoy, and feel free to contact us if there are any features you think we should build next. Thanks again!</p><p><a href="http://gridpools.com/grid/id/' . $gridID . '" target="_blank">http://gridpools.com/grid/id/' . $gridID . '</a></p>',
		 	// 				        'subject' => 'Your Grid Link',
		 	// 				        'from_email' => 'DONOTREPLY@gridpools.com',
		 	// 				        'from_name' => 'Gridpools',
		 	// 				        'to' => array(
		 	// 				            array(
		 	// 				                'email' => $email,
		 	// 				                'type' => 'to'
		 	// 				            )
		 	// 				        ),
		 	// 				        'important' => true,
		 	// 				        'track_opens' => true,
		 	// 				        'track_clicks' => true,
		 	// 				        'auto_text' => false,
		 	// 				        'auto_html' => false,
		 	// 				        'inline_css' => true,
		 	// 				        'url_strip_qs' => false,
		 	// 				        'preserve_recipients' => false,
		 	// 				        'merge' => true,
		 	// 				    );
		 	// 				    $async = false;
		 	// 				    $result = $mandrill->messages->send($message, $async);

		 	// 				    if ($result) {
		 	// 				    	return true;
		 	// 				    }
		 					    
		 	// 				} catch(Mandrill_Error $e) {
		 	// 				    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		 	// 				    throw $e;
		 	// 				}

		 	// 				return $gridID;

		 	// 			}
		 		
		 	// 		}

		 	// 		else {
		 	// 			$errors[] =  $this->upload->display_errors('<p class="error">');
		 	// 			return $errors;
		 	// 		}
		 	// 	}

		 	// 	else {

		 	// 		$id = uniqid('USR', false);
		 	// 		$time = time();
		 	// 		$date = date('Y-m-d H:i:s', $time);
		 	// 		$gridID = uniqid('GRD', false);

		 	// 		if ($size === 'five') {
		 	// 			$size = 2;
		 	// 		}

		 	// 		else {
		 	// 			$size = 1;
		 	// 		}

		 	// 		$user = array(
		 	// 			'UserID' => $id,
		 	// 			'DateCreated' => $date,
		 	// 			'UserEmail' => $email,
		 	// 			'Picture' => 'profile.png',
		 	// 			'GridID' => $gridID,
		 	// 			'LevelID' => 2,
		 	// 			'Bet' => 0
		 	// 		);

		 	// 		$grid = array(
		 	// 			'GridID' => $gridID,
		 	// 			'Total' => 0,
		 	// 			'PerBox' => $bet,
		 	// 			'GridName' => $grid,
		 	// 			'GridSize' => $size
		 	// 		);	

		 	// 		$this->db->insert('users', $user);
		 	// 		$this->db->insert('grids', $grid);

		 	// 		$session = array(
		 	// 			'UserID' => $id
		 	// 		);
		 	// 		$this->session->set_userdata($session);

		 	// 		require_once(APPPATH . 'mandrill/Mandrill.php');

		 	// 		try {
		 	// 		    $mandrill = new Mandrill('RneCcFuZhM34BKS5x2UBOA');
		 			   
		 	// 		    $message = array(
		 	// 		    	'html' => '<p>Hey, thanks for your purchase. Here is the URL to your grid. Be sure not to lose it as it is the only way you can access your grid. Share it with your friends so they can join in on the action. Enjoy, and feel free to contact us if there are any features you think we should build next. Thanks again!</p><p><a href="http://gridpools.com/grid/id/' . $gridID . '" target="_blank">http://gridpools.com/grid/id/' . $gridID . '</a></p>',
		 	// 		        'subject' => 'Your Grid Link',
		 	// 		        'from_email' => 'DONOTREPLY@gridpools.com',
		 	// 		        'from_name' => 'Gridpools',
		 	// 		        'to' => array(
		 	// 		            array(
		 	// 		                'email' => $email,
		 	// 		                'type' => 'to'
		 	// 		            )
		 	// 		        ),
		 	// 		        'important' => true,
		 	// 		        'track_opens' => true,
		 	// 		        'track_clicks' => true,
		 	// 		        'auto_text' => false,
		 	// 		        'auto_html' => false,
		 	// 		        'inline_css' => true,
		 	// 		        'url_strip_qs' => false,
		 	// 		        'preserve_recipients' => false,
		 	// 		        'merge' => true,
		 	// 		    );
		 	// 		    $async = false;
		 	// 		    $result = $mandrill->messages->send($message, $async);

		 	// 		    if ($result) {
		 	// 		    	return true;
		 	// 		    }
		 			    
		 	// 		} catch(Mandrill_Error $e) {
		 	// 		    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		 	// 		    throw $e;
		 	// 		}

		 	// 		return $gridID;

		 	// 	}

		 	// }
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

























