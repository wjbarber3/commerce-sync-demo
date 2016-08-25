<?php ?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Commerce Sync Demo</title>
	<link rel="stylesheet" href="compiled_css/demo.style.css">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<!-- Load Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
	
	<?php include_once("svg-defs.svg"); ?>

	<h1 class="title">Interactive Demo</h1>

	<div id="sidebar">
		<svg width="261" height="70"><use xlink:href="#logo"></use></svg>
		<nav>
			<ol>
				<li><a href="#"><span>1</span>Run your business</a></li>
				<li><a href="#"><span>2</span>Let us work for you</a></li>
				<li><a href="#"><span>3</span>Check your books</a></li>
			</ol>
		</nav>
		<a class="progress-btn main-btn visible" href="#">Start the demo</a>
		<a class="progress-btn main-btn" href="#">Next</a>
		<a class="progress-btn main-btn" href="#">Next</a>
		<a class="progress-btn main-btn" href="#">30-day free trial</a>
	</div><!--end sidebar-->

	<div id="content">
		<div class="page page1">
			<svg class="illustration" width="303" height="261"><use xlink:href="#illustration"></use></svg>
			<p>As a small business owner, you know that sometimes there are just not enough hours in the day. The work starts before you walk in the door and wraps up long after the lights go out.</p>
			<p>From ringing up sales to managing employees, all of the small tasks add up.</p>
			<p>By the time the day is done, the last thing you want to do is stare at numbers on a spreadsheet and manually enter data into your accounting software.</p>
			<p>Luckily, managing your business just got easier.</p>
		</div><!--end page1-->
		<div class="page page2">
			<h2>Page 2</h2>
		</div><!--end page2-->
		<div class="page page3">
			<h2>Page 3</h2>
		</div><!--end page3-->
		<div class="page page4">
			<h2>Page 4</h2>
		</div><!--end page4-->
	</div><!--end content-->

</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</html>