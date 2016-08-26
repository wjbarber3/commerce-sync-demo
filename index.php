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

		<div class="page page1">
			<svg class="illustration" width="303" height="261"><use xlink:href="#illustration"></use></svg>
			<p>As a small business owner, you know that sometimes there are just not enough hours in the day. The work starts before you walk in the door and wraps up long after the lights go out.</p>
			<p>From ringing up sales to managing employees, all of the small tasks add up.</p>
			<p>By the time the day is done, the last thing you want to do is stare at numbers on a spreadsheet and manually enter data into your accounting software.</p>
			<p>Luckily, managing your business just got easier.</p>
		</div><!--end page1-->

		<!-- ====================== -->
		<!-- === PAGE TWO ========= -->
		<!-- ====================== -->

		<div class="page page2 current">
			
			<!-- Call our custom receipt vue component -->
			<receipt header="Between the Covers &amp; Grinders Café" date="Sept. 23, 2016 10:52 am" :sales="sales1"></receipt>
			<receipt header="Between the Covers &amp; Grinders Café" date="Sept. 25, 2016 3:08 pm" :sales="sales2"></receipt>

			<div class="clearfix"></div>

		</div><!--end page2-->

		<template id="receipt-template">
			<div class="receipt">
				<div class="receipt-header">
					<h2>{{ header }}</h2>
				</div><!--end receipt-header-->
				<div class="receipt-body">
					<div class="receipt-labels">
						<p>Sales</p>
						<p>{{ date }}</p>
						<div class="clearfix"></div>
					</div><!--end receipt-labels-->
					<div class="receipt-sales">
						<div class="receipt-sale-row" v-for="sale in sales">
							<p>{{ sale.amount }}</p>
							<p><input placeholder="Item Description" type="text" step="0.01" min="0" v-model="sale.desc"></p>
							<p class="sale-price"><span>$</span><input placeholder="0.00" type="number" step="0.01" min="0" v-model="sale.price"></p>
						</div><!--end receipt-sale-row-->
						<a href="#" class="add-sale" v-show="sales.length < 5" @click="addSale"><span>+</span> Add sale</a>
					</div><!--end receipt-sales-->
					<div class="receipt-subtotals">
						<p>Subtotal</p>
						<p>${{ subtotal }}</p>
						<p>Tax</p>
						<p>{{ tax }}</p>
						<div class="clearfix"></div>
					</div><!--end subtotals-->
					<div class="receipt-totals">
						<p>Tip</p>
						<p>{{ tip }}</p>
						<p>Total</p>
						<p>{{ total }}</p>
						<div class="clearfix"></div>
					</div><!--end totals-->
					<div class="receipt-card">
						<p>Visa 1825</p>
						<p>{{ total }}</p>
						<div class="clearfix"></div>
					</div><!--end card-->
				</div><!--end receipt-body-->
			</div><!--end receipt-->
		</template>

		<!-- ====================== -->
		<!-- === PAGE THREE ======= -->
		<!-- ====================== -->

		<div class="page page3">
			<h2>Page 3</h2>

				<!-- <counter heading="Likes"></counter>
				<counter heading="Dislikes"></counter>

				<template id="counter-template">
					<h4>{{ heading }}</h4>
					<button @click="count += 1">{{count}}</button>
				</template> -->

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