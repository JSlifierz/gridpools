<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="content-language" content="en"; charset="UTF-8">
	<title><?php echo 'GridPools - ' . $gridName; ?></title>
	<meta name="keywords" content="GridPools, Ryan Ovas, James Slifierz, Superbowl, Grid, Squares, Games">
	<meta name="description" content="GridPools is sports grids done right. Make sporting events fun by setting up a grid and sharing with your friends. Challenge as many fans as possible to become the ultimate GridPin. Make Superbowl Squares, March Madness Squares, World Cup Squares, NHL Playoff Squares, NBA Playoff Squares, and much, much more.">
	<link rel="shortcut icon" type="image/x-icon" href=<?php 'http://dm2lmglugmay7.cloudfront.net/images/favicon.ico'; ?>>

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700|Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url() . 'assets/css/reset.css'; ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url() . 'assets/css/grid.css'; ?>>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<?php echo '<script src="' . base_url() . 'assets/js/grid.js"></script>'; ?>
	<?php echo '<script src="' . base_url() . 'assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>'; ?>
	<?php echo '<script src="' . base_url() . 'assets/js/jquery.localscroll-1.2.7-min.js"></script>'; ?>

</head>

<body>

	<div id="overlay"></div>
	<div id="thisID" style="display:none;"><?php echo $gridID; ?></div>

	<nav>
	<div class="margin">
		<img src="http://dm2lmglugmay7.cloudfront.net/images/mockup2_03.png" height="80px">
		<h2><?php echo $gridName; ?></h2>

		<div class="statContainer">
			<div class="stat"><h3>Total Pot</h3><p id="potTotal"><?php echo '$' . $total; ?></p></div>
			<div class="stat"><h3>Box Price</h3><p><?php echo '$' . $perBox; ?></p></div>
			<!-- <div class="stat"><h3>You've Bet</h3><p><?php 

			if (isset($bet)) {
				echo '$' . $bet;
			} 

			else {
				echo '$0';
			}

			?></p></div> -->
		</div>
	</div>
	</nav>
	
	<div class="cont margin">
		<div class="content">
		<div class="topBox">
		<div class="homeTeam">
			<img src="http://dm2lmglugmay7.cloudfront.net/images/denver.png">
		</div>
		<div class="topScore">
			<?php 

			$topN = explode(',', $trange);

			foreach ($topN as $row) {
				echo '<div class="tscores"><p>' . $row . '</p></div>';
			}

			?>
		</div>
		</div>

		<div class="visitTeam">
			<img src="http://dm2lmglugmay7.cloudfront.net/images/seattle.png">
		</div>

		<div class="leftScore">
			<?php 

			$bottomN = explode(',', $lrange);

			foreach ($bottomN as $row) {
				echo '<div class="lscores"><p>' . $row . '</p></div>';
			}

			?>
		</div>
		

		<div class="grid">

			<?php

			foreach ($boxes as $id => $row) {
				
				if ($row) {
					echo '<div id="' . $id . '" class="square taken">';
					echo '<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/' . $row['img'] . '"></div>';
					echo '<div class="info"><p>' . $row['name'] . '</p></div>';
					echo '<div class="boxID">' . $id . '</div>';
					echo '</div>';
				}

				else {
					echo '<div id="' . $id . '" class="square free">';
					echo '<div class="img"></div>';
					echo '<div class="info"></div>';
					echo '<div class="boxID">' . $id . '</div>';
					echo '</div>';
				}

			}

			?>

		</div>
		

		</div>

		<div class="updates">
			
		<div class="scoreboard">
			<table>
				<thead>
					<th><img src="http://dm2lmglugmay7.cloudfront.net/images/seattlescore.jpg"></th>
					<th><img src="http://dm2lmglugmay7.cloudfront.net/images/denverscore.jpg"></th>
				</thead>
				<tbody>
					<td class="scores" id="awayScore"><p>0</p></td>
					<td class="scores" id="homeScore"><p>0</p></td>
				</tbody>
			</table>
		</div>

		<div class="share">
			<p>To have your friends join in simply send them the URL to your grid.</p>
			<p>Some Guidelines:</p>
			<p>1. We do not have the legal capacity to collect the money from the grid's participants. Therefore, the GridPin must ensure all of the funds are collected and distributed.</p>
			<p>2. All squares must be selected before 6:25pm EST, Sunday, February 2, 2014. The numbers will appear across the left and top at the same time.</p>
			<p>3. Winners are determined by taking the last digit from each team's score and cross-referencing it on the grid. One winner is selected per quarter.</p>
			<p>4. The GridPin determines pay distribution.</p>
			<p>5. We recommend setting your browser to full-screen (F11)</p>
		</div>

		<div class="winners">
			
			<div class="winCont">
			<h2>Q1 Winner</h2>
			<p>Pending</p>
			</div>

			<div class="winCont">
			<h2>Q2 Winner</h2>
			<p>Pending</p>
			</div>

			<div class="winCont">
			<h2>Q3 Winner</h2>
			<p>Pending</p>
			</div>

			<div class="winCont">
			<h2>Superbowl Winner</h2>
			<p>Pending</p>
			</div>


		</div>

		</div>


	</div>

	<div class="friend">
		<p>*Photo not required, click outside this box to close it</p>
		<?php 

		if (isset($name)) {
			echo '<h3>Hello ' . $name . '</h3>';
			echo '<p>Press yes below to place a bet here.</p>';
			echo '<button id="yes">' . anchor('grid/exists', 'Yes') . '</button>';
			echo '<button id="no">No</button>';
		}

		else {
			$name = array(
				'name' => 'name',
				'id' => 'name',
				'placeholder' => 'Name',
				'required' => 'required'
			);

			$email = array(
				'name' => 'email',
				'id' => 'email',
				'placeholder' => 'Email',
				'required' => 'required'
			);

			$img = array(
				'name' => 'img',
				'id' => 'img',
				'accept' => 'image/*',
				'onchange' => 'viewPhoto(this)',
			);

			$box = array(
				'name' => 'box',
				'id' => 'box',
				'required' => 'required',
				'style' => 'display: none;'
			);

			$gridID = array(
				'name' => 'gridID',
				'id' => 'gridID',
				'required' => 'required',
				'style' => 'display: none;',
				'value' => $gridID
			);

			$perBox = array(
				'name' => 'perBox',
				'id' => 'perBox',
				'required' => 'required',
				'style' => 'display: none;',
				'value' => $perBox
			);

			echo form_open_multipart('grid/bet');
			echo form_input($name);
			// echo form_input($email);
			echo form_input($box);
			echo form_input($gridID);
			echo form_input($perBox);
			echo form_upload($img) . '<br>';
			echo form_submit('submit', 'Go!');
			echo form_close();
		}

		?>

		<div class="modalImg">
			<?php 

			if (isset($picture)) {
				echo '<img src="http://dm2lmglugmay7.cloudfront.net/images/' . $picture . '">';
			}

			else {
				echo '<img class="profile" src="http://dm2lmglugmay7.cloudfront.net/images/logo.png">';
			}

			?>
		</div>

		<script>

			var viewPhoto = function(input) {

		        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                $('.profile').attr('src', e.target.result);

		                var picHeight = $('.profile').height();
		                var picWidth = $('.profile').width();

		                if (picHeight < picWidth) {
		                	$('.profile').css({
			                	width: 'auto',
			                	height: '100%'
			                });
		                }

		                else {
		                	$('.profile').css({
			                	height: 'auto',
			                	width: '100%'
			                });
		                }
		            };

		            reader.readAsDataURL(input.files[0]);
		        }   
		    }

		</script>
		
	</div>

</body>
</html>











