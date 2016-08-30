<?php ?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Commerce Sync Demo</title>
	<link rel="stylesheet" href="compiled_css/demo.style.css">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="fontawesome/font-awesome.min.css">
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
			
			<!-- Call our custom receipt vue component -->
			<receipt date="Sept. 23, 2016 10:52 am" :sales="sales1" :header="company"></receipt>
			<receipt date="Sept. 25, 2016 3:08 pm" :sales="sales2" :header="company"></receipt>

			<div class="clearfix"></div>

			<!-- <h4>Grandtotal: {{ grand }}</h4> -->

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
							<p><input placeholder="Add Description" type="text" step="0.01" min="0" v-model="sale.desc"></p>
							<a class="sale-btn remove-sale fa fa-remove" href="#" @click.prevent="removeSale($index)"></a>
							<p class="sale-price"><span>$</span><input placeholder="0.00" type="number" step="0.01" min="0" v-model="sale.price"></p>
						</div><!--end receipt-sale-row-->
						<a href="#" class="sale-btn add-sale" v-show="sales.length < 5" @click.prevent="addSale"><span class="fa fa-plus-circle"></span> Add sale</a>
					</div><!--end receipt-sales-->
					<div class="receipt-subtotals">
						<p>Subtotal</p>
						<p>${{ subtotal }}</p>
						<p>Tax</p>
						<p>${{ tax }}</p>
						<div class="clearfix"></div>
					</div><!--end subtotals-->
					<div class="receipt-totals">
						<p>Tip</p>
						<p>$<input placeholder="0.00" type="number" step="1" min="0" v-model="tip"></p>
						<p>Total</p>
						<p>${{ total }}</p>
						<div class="clearfix"></div>
					</div><!--end totals-->
					<div class="receipt-card">
						<p>Visa 1825</p>
						<p>${{ total }}</p>
						<div class="clearfix"></div>
					</div><!--end card-->
				</div><!--end receipt-body-->
			</div><!--end receipt-->
		</template>

		<!-- ====================== -->
		<!-- === PAGE THREE ======= -->
		<!-- ====================== -->

		<div class="page page3">

			<div class="summary">

				<div class="summary-heading">
					<h3>{{ company }}</h3>
					<h3>Daily Summary: Sales <?php echo date("Md"); ?><i class="fa fa-question-circle-o"></i></h3>
				</div><!--end summary-heading-->

				<div class="summary-top">
					<input class="dummy-dropdown" type="text" disabled placeholder="Customer">
					<input type="text" disabled placeholder="<?php echo date('m/d/y') ?>"><i class="fa fa-calendar"></i>
					<div class="amount">
						<p>Amount Paid</p>
						<p>$82.31</p>
					</div><!--end amount-->
					<div class="clearfix"></div>
				</div><!--end summary-top-->

				<table class="two-col">
					<tr>
						<th>Description</th>
						<th class="right">Amount</th>
					</tr>
					<tr>
						<td>Taxable Sales</td>
						<td class="right">$76.81</td>
					</tr>
					<tr>
						<td>Total Tips</td>
						<td class="right">$6.00</td>
					</tr>
					<tr>
						<td>Refunds<i class="fa fa-info circle"></i></td>
						<td class="right">$0.00</td>
					</tr>
					<tr>
						<td>Discounts<i class="fa fa-info circle"></i></td>
						<td class="right">$0.00</td>
					</tr>
				</table>

				<div class="summary-body">
					<div class="memo">
						<label for="memo">Memo</label>
						<textarea id="memo" disabled></textarea>
					</div><!--end memo-->
					<div class="summary-totals">
						<h3><span>Subtotal:</span> $76.66</h3>
						<input class="dummy-dropdown" type="text" disabled placeholder="Denver 8.0%">
						<h3>$5.65</h3>
						<div class="clearfix separator"></div>
						<h3><span>Total:</span> $82.41</h3>
					</div><!--end summary-totals-->
					<div class="clearfix"></div>
				</div><!--end summary-body-->

				<table class="three-col">
					<tr>
						<th class="lower"><i class="fa fa-caret-down"></i><span>Payment Summary: </span>3 Payments</th>
						<th></th>
						<th class="right lower"><span>Due: </span>$0.00</th>
					</tr>
					<tr>
						<td>Credit Card</td>
						<td>Undeposited Funds</td>
						<td class="right">$82.31</td>
					</tr>
					<tr>
						<td>Cash</td>
						<td>Cash Payments</td>
						<td class="right">$0.00</td>
					</tr>
					<tr>
						<td>Check</td>
						<td>Check Payments</td>
						<td class="right">$0.00</td>
					</tr>
				</table>

			</div><!--end summary-->

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