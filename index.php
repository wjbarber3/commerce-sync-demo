<?php ?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Commerce Sync Demo</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link rel="stylesheet" href="compiled_css/demo.style.css">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,700" rel="stylesheet">
</head>

<body>
	
	<!-- include our svg definitions -->
	<?php include_once("svg-defs.svg"); ?>

	<h1 class="title visible">Interactive Demo</h1>
	<h1 class="title">Run your business</h1>
	<h1 class="title">Let Commerce Sync work for you</h1>
	<h1 class="title">Check your books</h1>

	<!-- ====================== -->
	<!-- === SIDEBAR ========== -->
	<!-- ====================== -->

	<div id="sidebar">
		<a href="/"><svg width="261" height="70"><use xlink:href="#logo"></use></svg></a>
		<nav>
			<ol>
				<li><a href="#"><span class="num">1</span><span class="label">Run your business</span></a></li>
				<li><a href="#"><span class="num">2</span><span class="label">Let us work for you</span></a></li>
				<li><a href="#"><span class="num">3</span><span class="label">Check your books</span></a></li>
			</ol>
		</nav>

		<div class="sidebar-text side-text1">
			<p>With Commerce Sync, you can focus on your business.</p>
			<p>Let’s ring up some sales at our Bookstore &amp; Coffee Shop to see how it works.</p>
		</div><!--end sidebar1-->
		<div class="sidebar-text side-text2">
			<p>Each night we automatically and securely transfer your sales, taxes, tips, discounts and refunds into your accounting software.</p>
		</div><!--end sidebar2-->
		<div class="sidebar-text side-text3">
			<p>When you open your accounting software, you have instant insights into your business.</p>
			<p>Spend more time engaging with your customers and growing your business.</p>
			<p><strong>Focus on what you love. We’ll focus on the books.</strong></p>
		</div><!--end sidebar3-->

		<a class="progress-btn main-btn top-margin visible" href="#">Start the demo</a>
		<a class="progress-btn main-btn" href="#">Next</a>
		<a class="progress-btn main-btn" href="#">Next</a>
		<a class="progress-btn main-btn" href="#">30-day free trial</a>

		<div class="sidebar-text side-text3">
			<p><a href="#">Check out examples</a> of how Commerce Sync can help you make smarter business decisions. </p>
		</div><!--end sidebar3-->

	</div><!--end sidebar-->

	<div id="content">

		<!-- ====================== -->
		<!-- === PAGE ONE ========= -->
		<!-- ====================== -->

		<div class="page page1 current">
			<img class="illustration" width="303" height="261" src="/img/illustration.png">
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
			<receipt cc="visa" ccnum="1405" date="<?php echo date('M. d, Y'); ?> 10:52 am" :sales="sales1" :header="company"></receipt>
			<receipt cc="discover" ccnum="1825" date="<?php echo date('M. d, Y'); ?> 3:08 pm" :sales="sales2" :header="company"></receipt>

			<div class="clearfix"></div>

			<!-- <h4>Grandtotal: {{ grand }}</h4> -->

		</div><!--end page2-->

		<script type="x/templates" id="receipt-template">
			<div class="receipt shadow1">
				<div class="receipt-header">
					<h2>{{ header }}</h2>
				</div>
				<div class="receipt-body">
					<div class="receipt-labels">
						<p>Sales</p>
						<p>{{ date }}</p>
						<div class="clearfix"></div>
					</div>
					<div class="receipt-sales">
						<div class="receipt-sale-row" v-for="sale in sales">
							<p>{{ sale.amount }}</p>
							<p><input placeholder="Add Description" type="text" step="0.01" min="0" v-model="sale.desc"></p>
							<a class="sale-btn remove-sale fa fa-remove" href="#" @click.prevent="removeSale($index)"></a>
							<p class="sale-price"><span>$</span><input placeholder="0.00" type="number" step="0.01" min="0" v-model="sale.price"></p>
						</div><!--end receipt-sale-row-->
						<a href="#" class="sale-btn add-sale" v-show="sales.length < 5" @click.prevent="addSale"><span class="fa fa-plus-circle"></span> Add sale</a>
					</div>
					<div class="receipt-subtotals">
						<p>Subtotal</p>
						<p>${{ subtotal }}</p>
						<p>Tax</p>
						<p>${{ tax }}</p>
						<div class="clearfix"></div>
					</div>
					<div class="receipt-totals">
						<p>Tip</p>
						<p>$<input placeholder="0.00" type="number" step="1" min="0" v-model="tip"></p>
						<p>Total</p>
						<p>${{ total }}</p>
						<div class="clearfix"></div>
					</div>
					<div class="receipt-card">
						<p><i class="cc fa fa-cc-{{ cc }}"></i> {{ ccnum }}</p>
						<p>${{ total }}</p>
						<div class="clearfix"></div>
					</div>
				<div class="perf">
				</div>
			</div>
		</script>

		<!-- ====================== -->
		<!-- === PAGE THREE ======= -->
		<!-- ====================== -->

		<div class="page page3">

			<div class="summary shadow1">

				<div class="summary-heading">
					<h3>{{ company }}</h3>
					<h3>Daily Summary: Sales <?php echo date("Md"); ?><i class="fa fa-question-circle-o"></i></h3>
					<div class="clearfix"></div>
				</div><!--end summary-heading-->

				<div class="summary-top">
					<input class="dummy-dropdown" type="text" disabled placeholder="Customer">
					<input type="text" disabled placeholder="<?php echo date('m/d/y') ?>"><i class="fa fa-calendar"></i>
					<div class="amount">
						<p>Amount Paid</p>
						<p>${{ grandtotal }}</p>
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
						<td class="right">${{ taxable }}</td>
					</tr>
					<tr>
						<td>Total Tips</td>
						<td class="right">${{ totaltips }}</td>
					</tr>
					<tr>
						<td>Refunds<span class="tooltip"><span class="tooltip-item"><i class="fa fa-info circle"></i></span><span class="tooltip-content clearfix"><span><strong>This</strong> is a tooltip. It should not contain more than 170 characters. Lorem ipsum dalor sit amet, en este dia, las personas tengo comida.</span></span></span></td>
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
						<h3><span>Subtotal:</span> {{ grandsubtotal }}</h3>
						<input class="dummy-dropdown" type="text" disabled placeholder="Denver 8.0%">
						<h3>${{ totaltax }}</h3>
						<div class="clearfix separator"></div>
						<h3><span>Total:</span> ${{ grandtotal }}</h3>
					</div><!--end summary-totals-->
					<div class="clearfix"></div>
				</div><!--end summary-body-->

				<table class="three-col">
					<tr>
						<th colspan="2" class="lower"><i class="fa fa-caret-down"></i><span>Payment Summary: </span>3 Payments</th>
						<th class="right lower"><span>Due: </span>$0.00</th>
					</tr>
					<tr>
						<td>Credit Card</td>
						<td>Undeposited Funds</td>
						<td class="right">{{ grandtotal }}</td>
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

			<div class="account shadow1">
				<div class="account-sidebar">
					<nav>
						<li><i class="fa fa-dashboard"></i><a href="#">Home</a></li>
						<li><i class="fa fa-users"></i><a href="#">Customers</a></li>
						<li><i class="fa fa-weixin"></i><a href="#">Vendors</a></li>
						<li><i class="fa fa-black-tie"></i><a href="#">Employees</a></li>
						<li><i class="fa fa-dollar"></i><a class="current" href="#">Transactions</a>
							<ul>
								<li><a href="#">Banking</a></li>
								<li><a href="#">Sales</a></li>
								<li><a href="#">Char of Acct.</a></li>
							</ul>
						</li>
						<li><i class="fa fa-pie-chart"></i><a href="#">Reports</a></li>
						<li><i class="fa fa-money"></i><a href="#">Sales Tax</a></li>
						<li><i class="fa fa-cogs"></i><a href="#">Apps</a></li>
					</nav>
				</div><!--end account-sidebar-->
				<div class="account-body">
					<div class="account-body-header">
						<ul>
							<li class="mobile-nav-trigger"><i class="fa fa-bars"></i></li>
							<li><i class="fa fa-search"></i></li>
							<li><i class="fa fa-plus"></i></li>
							<li><i class="fa fa-refresh"></i></li>
						</ul>
					</div><!--end account-body-header-->
					<div class="account-body-top">
						<h2>Chart of Accounts</h2>
						<a href="#">Run Report</a>
						<div class="clearfix"></div>
					</div><!--end account-body-top-->
					<div class="account-body-table">
						<table class="four-col">
							<tr>
								<th>Name</th>
								<th>Type</th>
								<th class="right">Balance</th>
								<th class="right">Action</th>
							</tr>
							<tr>
								<td>Checking</td>
								<td>Bank Account</td>
								<td class="right">$1,163.18</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Savings</td>
								<td>Bank Account</td>
								<td class="right">$2,498.56</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Accounts Receivable</td>
								<td>Accounts rec.</td>
								<td class="right">$5,890.45</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Service Charges</td>
								<td>Bank Account</td>
								<td class="right">$115.95</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Checing</td>
								<td>Bank Account</td>
								<td class="right">$1,163.18</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Savings</td>
								<td>Bank Account</td>
								<td class="right">$2,498.56</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Accounts receivable</td>
								<td>Accounts rec.</td>
								<td class="right">$5,890.45</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Service charges</td>
								<td>Bank Account</td>
								<td class="right">$115.95</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Accounts receivable</td>
								<td>Accounts rec.</td>
								<td class="right">$5,890.45</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
							<tr>
								<td>Service charges</td>
								<td>Bank Account</td>
								<td class="right">$115.95</td>
								<td class="right">View Register <i class="fa fa-caret-down"></i></td>
							</tr>
						</table>
					</div><!--end account-body-table-->
				</div><!--end account-body-->
				<div class="clearfix"></div>
			</div><!--end account-chart-->

		</div><!--end page4-->

	</div><!--end content-->

</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script src="js/vue.js"></script>
<script src="js/main.js"></script>


</html>