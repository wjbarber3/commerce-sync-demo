<?php ?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Commerce Sync Demo</title>
	<link rel="stylesheet" href="compiled_css/demo.style.css">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<!-- Load Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,700" rel="stylesheet">
</head>

<body>
	
	<!-- include our svg definitions -->
	<?php include_once("svg-defs.svg"); ?>

	<h1 class="title">Interactive Demo</h1>

	<!-- ====================== -->
	<!-- === SIDEBAR ========== -->
	<!-- ====================== -->

	<div id="sidebar">
		<a href="/"><svg width="261" height="70"><use xlink:href="#logo"></use></svg></a>
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

		<!-- ====================== -->
		<!-- === PAGE ONE ========= -->
		<!-- ====================== -->

		<div class="page page1 current">
			<svg class="illustration" width="303" height="261"><use xlink:href="#illustration"></use></svg>
			<p>As a small business owner, you know that sometimes there are just not enough hours in the day. The work starts before you walk in the door and wraps up long after the lights go out.</p>
			<p>From ringing up sales to managing employees, all of the small tasks add up.</p>
			<p>By the time the day is done, the last thing you want to do is stare at numbers on a spreadsheet and manually enter data into your accounting software.</p>
			<p>Luckily, managing your business just got easier.</p>
		</div><!--end page1-->

		<!-- ====================== -->
		<!-- === PAGE TWO ========= -->
		<!-- ====================== -->

		<div class="page page2">
			<div class="receipt">
				<div class="receipt-header">
					<h2>Between the Covers &amp; Grinders Café</h2>
				</div><!--end receipt-header-->
				<div class="receipt-body">
					<div class="receipt-labels">
						<p>Sales</p>
						<p>Sept. 23, 2016 10:52 am</p>
						<div class="clearfix"></div>
					</div><!--end receipt-labels-->
					<div class="receipt-sales">
						<div class="receipt-sale-row">
							<p>1</p>
							<p>Dante's Inferno</p>
							<p>$13.99</p>
						</div><!--end receipt-sale-row-->
						<div class="receipt-sale-row">
							<p>1</p>
							<p>Espresso</p>
							<p>$5.00</p>
						</div><!--end receipt-sale-row-->
						<div class="receipt-sale-row">
							<p>1</p>
							<p>The Sun Also Rises</p>
							<p>$11.99</p>
						</div><!--end receipt-sale-row-->
						<div class="receipt-sale-row">
							<p>1</p>
							<p>Spanish Coffee</p>
							<p>$1.99</p>
						</div><!--end receipt-sale-row-->
					</div><!--end receipt-sales-->
					<div class="receipt-subtotals">
						<p>Subtotal</p>
						<p>$32.97</p>
						<p>Tax</p>
						<p>$2.64</p>
						<div class="clearfix"></div>
					</div><!--end subtotals-->
					<div class="receipt-totals">
						<p>Tip</p>
						<p>$6.00</p>
						<p>Total</p>
						<p>$41.25</p>
						<div class="clearfix"></div>
					</div><!--end totals-->
					<div class="receipt-card">
						<p>Visa 1825</p>
						<p>$41.25</p>
						<div class="clearfix"></div>
					</div><!--end card-->
				</div><!--end receipt-body-->
			</div><!--end receipt-->
			<div class="receipt">
				receipt
			</div><!--end receipt-->
			<div class="clearfix"></div>
		</div><!--end page2-->

		<!-- ====================== -->
		<!-- === PAGE THREE ======= -->
		<!-- ====================== -->

		<div class="page page3">
			<h2>Page 3</h2>
		</div><!--end page3-->

		<!-- ====================== -->
		<!-- === PAGE FOUR ======== -->
		<!-- ====================== -->

		<div class="page page4">
			<h2>Page 4</h2>
		</div><!--end page4-->
	</div><!--end content-->

</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script src="js/vue.js"></script>
<script src="js/main.js"></script>


</html>