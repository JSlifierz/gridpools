<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="content-language" content="en"; charset="UTF-8">
	<title>GridPools - Play Superbowl Grid Online</title>
	<meta name="keywords" content="GridPools, Ryan Ovas, James Slifierz, Superbowl, Grid, Squares, Games">
	<meta name="description" content="GridPools is sports grids done right. Make sporting events fun by setting up a grid and sharing with your friends. Challenge as many fans as possible to become the ultimate GridPin. Make Superbowl Squares, March Madness Squares, World Cup Squares, NHL Playoff Squares, NBA Playoff Squares, and much, much more.">
	<link rel="shortcut icon" type="image/x-icon" href=<?php 'http://dm2lmglugmay7.cloudfront.net/images/favicon.ico'; ?>>

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700|Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url() . 'assets/css/main.css'; ?>>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<?php echo '<script src="' . base_url() . 'assets/js/main.js"></script>'; ?>
	<?php echo '<script src="' . base_url() . 'assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>'; ?>
	<?php echo '<script src="' . base_url() . 'assets/js/jquery.localscroll-1.2.7-min.js"></script>'; ?>

</head>
<body>

	<div class="grid">
		<div class="cnt">
			<?php echo '<img src="http://dm2lmglugmay7.cloudfront.net/images/mockup_03.png">' ?>
			<h1>GRIDPOOLS</h1>
			<button id="create" class="yellow">Create</button>
			<button id="join" class="yellow">Join Grid</button>
			<p class="info">Ask the GridPin for the link to their grid, and start playing!</p>
			<?php

			// $search = array(
			// 	'name' => 'search',
			// 	'id' => 'search',
			// 	'placeholder' => 'Search for Grid',
			// 	'required' => 'required'
			// );

			// echo form_open('welcome/search');
			// echo form_input($search);
			// echo form_submit('submit', 'Go', 'class="go yellow"');
			// echo form_close();

			?>
			<p id="video">What is GridPools?</p>
			<a href="mailto:info@gridpools.com">Contact Us</a>
		</div>
	</div>
	
	<div class="signup margin">
		
		<h2>Start <span class="bold">one grid</span> for you and your friends for only <span class="bold">$2.99</span></h2>
		
		<?php 

		$name = array(
			'name' => 'name',
			'id' => 'name',
			'placeholder' => 'Full Name'
		);

		$grid = array(
			'name' => 'grid',
			'id' => 'grid',
			'placeholder' => 'Grid Name'
		);

		$bet = array(
			'name' => 'bet',
			'id' => 'bet',
			'placeholder' => 'Bet Per Box'
		);

		// $five = array(
		// 	'name' => 'size',
		// 	'id' => 'five',
		// 	'value' => 'five'
		// );

		// $ten = array(
		// 	'name' => 'size',
		// 	'id' => 'ten',
		// 	'value' => 'ten',
		// 	'checked' => 'checked'
		// );

		$img = array(
			'name' => 'img',
			'id' => 'img',
			'onchange' => 'viewPhoto(this)',
			'accept' => 'image/*'
		);

		$token = array(
			'name' => 'token',
			'id' => 'token',
			'style' => 'display:none;'
		);

		$email = array(
			'name' => 'email',
			'id' => 'email',
			'style' => 'display:none;'
		);

		echo form_open_multipart('welcome/charge', 'id="signupForm"');
		echo form_input($name);
		echo form_input($grid);
		echo form_input($bet) . '<br>';
		// echo form_radio($five);
		// echo form_label('5x5 Grid', 'five');
		// echo form_radio($ten);
		// echo form_label('10x10 Grid', 'ten');
		// echo form_upload($img);
		echo form_input($token);
		echo form_input($email);
		?>

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
			                	height: '300px'
			                });
		                }

		                else {
		                	$('.profile').css({
			                	height: 'auto',
			                	width: '300px'
			                });
		                }
		            };

		            reader.readAsDataURL(input.files[0]);
		        }   
		    }

		</script>

		<div id="errors"></div>

		<script src="https://checkout.stripe.com/checkout.js"></script>

		<button class="red" id="customButton">Purchase</button>

		<p>*Only 10x10 grids available currently. Will have 5x5 soon. To accomodate for a smaller party, just lower your bet per box.</p>
		<p>*We will be updating Gridpools continuously up until the Superbowl. Email us with requests!</p>
		<a href="welcome/terms" target="_blank">Terms of Use and Service</a>

		<?php

		echo form_close();

		?>

		<div class="pimg">
			<?php echo '<img src="http://dm2lmglugmay7.cloudfront.net/images/crown.png">' ?>
			<div id="imgCrop">
				<?php echo '<img class="profile" src="http://dm2lmglugmay7.cloudfront.net/images/logo.png">' ?>
			</div>
		</div>

	</div>

	<script>
		$(document).ready(function() {
			$.localScroll();
		});
	</script>
</body>
</html>
















