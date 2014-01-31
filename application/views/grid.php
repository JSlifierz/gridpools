<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="content-language" content="en"; charset="UTF-8">
	<title><?php echo 'GridPools - ' . $gridName; ?></title>
	<meta name="keywords" content="GridPools, Ryan Ovas, James Slifierz, Superbowl, Grid, Squares, Games">
	<meta name="description" content="GridPools is sports grids done right. Make sporting events fun by setting up a grid and sharing with your friends. Challenge as many fans as possible to become the ultimate GridPin. Make Superbowl Squares, March Madness Squares, World Cup Squares, NHL Playoff Squares, NBA Playoff Squares, and much, much more.">
	<link rel="shortcut icon" type="image/x-icon" href=<?php 'http://dm2lmglugmay7.cloudfront.net/images/favicon.ico'; ?>>

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700|Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url() . 'assets/css/grid.css'; ?>>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url() . 'assets/css/reset.css'; ?>>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<?php echo '<script src="' . base_url() . 'assets/js/grid.js"></script>'; ?>
	<?php echo '<script src="' . base_url() . 'assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>'; ?>
	<?php echo '<script src="' . base_url() . 'assets/js/jquery.localscroll-1.2.7-min.js"></script>'; ?>

</head>

<body>

	<nav>
	<div class="margin">
		<img src="http://dm2lmglugmay7.cloudfront.net/images/mockup2_03.png" height="80px">
		<h2><?php echo $gridName; ?></h2>

		<div class="statContainer">
			<div class="stat"><h3>Total Pot</h3><p><?php echo '$' . $total; ?></p></div>
			<div class="stat"><h3>Box Price</h3><p><?php echo '$' . $perBox; ?></p></div>
			<div class="stat"><h3>You've Bet</h3><p>$10</p></div>
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
			<div class="tscores"><p>5</p></div>
			<div class="tscores"><p>6</p></div>
			<div class="tscores"><p>9</p></div>
			<div class="tscores"><p>1</p></div>
			<div class="tscores"><p>7</p></div>
			<div class="tscores"><p>2</p></div>
			<div class="tscores"><p>8</p></div>
			<div class="tscores"><p>3</p></div>
			<div class="tscores"><p>4</p></div>
			<div class="tscores"><p>0</p></div>
		</div>
		</div>
		<div class="visitTeam">
			<img src="http://dm2lmglugmay7.cloudfront.net/images/seattle.png">
		</div>

		<div class="leftScore">
			<div class="lscores"><p>5</p></div>
			<div class="lscores"><p>6</p></div>
			<div class="lscores"><p>9</p></div>
			<div class="lscores"><p>1</p></div>
			<div class="lscores"><p>7</p></div>
			<div class="lscores"><p>2</p></div>
			<div class="lscores"><p>8</p></div>
			<div class="lscores"><p>3</p></div>
			<div class="lscores"><p>4</p></div>
			<div class="lscores"><p>0</p></div>
		</div>
		

		<div class="grid">
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ReidHoffman.jpg"></div>
				<div class="info"><p>Reid Hoffman</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ReidHoffman.jpg"></div>
				<div class="info"><p>Reid Hoffman</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/IanFeather.jpg"></div>
				<div class="info"><p>Ian Feather</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ReidHoffman.jpg"></div>
				<div class="info"><p>Reid Hoffman</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ChrisPoole2.jpg"></div>
				<div class="info"><p>Chris Poole</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/IanFeather.jpg"></div>
				<div class="info"><p>Ian Feather</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/DickCostolo.jpg"></div>
				<div class="info"><p>Dick Costolo</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/TonyFadell.jpg"></div>
				<div class="info"><p>Tony Fadell</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ToddSattersten.jpg"></div>
				<div class="info"><p>Todd Sattersten</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/DickCostolo.jpg"></div>
				<div class="info"><p>Dick Costolo</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ChrisPoole2.jpg"></div>
				<div class="info"><p>Chris Poole</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ChrisPoole2.jpg"></div>
				<div class="info"><p>Chris Poole</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/TonyFadell.jpg"></div>
				<div class="info"><p>Tony Fadell</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ChrisPoole2.jpg"></div>
				<div class="info"><p>Chris Poole</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/mockup_03.png"></div>
				<div class="info"><p>Todd Sattersten</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/DickCostolo.jpg"></div>
				<div class="info"><p>Dick Costolo</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ChrisPoole2138.jpg"></div>
				<div class="info"><p>Chris Poole</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/ChrisPoole2.jpg"></div>
				<div class="info"><p>Chris Poole</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"><img src="http://dm2lmglugmay7.cloudfront.net/images/DickCostolo138.jpg"></div>
				<div class="info"><p>Dick Costolo</p></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>
			<div class="square">
				<div class="img"></div>
				<div class="info"></div>
			</div>

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
					<td class="scores" id="awayScore"><p>28</p></td>
					<td class="scores" id="homeScore"><p>35</p></td>
				</tbody>
			</table>
		</div>

		<div class="share">
			<p>To have your friends join in simply send them the URL to your grid.</p>
		</div>

		<div class="winners">
			
			<div class="winCont">
			<h2>Q1 Winner</h2>
			<p>Reid Hoffman</p>
			</div>

			<div class="winCont">
			<h2>Q2 Winner</h2>
			<p>Reid Hoffman</p>
			</div>

			<div class="winCont">
			<h2>Q3 Winner</h2>
			<p>Reid Hoffman</p>
			</div>

			<div class="winCont">
			<h2>Superbowl Winner</h2>
			<p>Reid Hoffman</p>
			</div>


		</div>

		</div>


	</div>

	<div class="friend">
		<form>
		<input type="text" name="Name" placeholder="Name"></label>
		<input type="text" name="Email" placeholder="Email"></label>
		<input type="file"><br />
		<button>Go!</button>
		</form>
		<img src="http://dm2lmglugmay7.cloudfront.net/images/john.jpg">
	</div>

	<div class="confirm">
		<h3>Place a wager here?</h3>
		<button id="yes">Yes</button>
		<button id="no">No</button>
	</div>

</body>
</html>