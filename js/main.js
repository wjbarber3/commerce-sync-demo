/*
|--------------------------------------------------------------------------
| View Object
|--------------------------------------------------------------------------
| This object houses all functions related to updating views
| 
*/

Route = {
	page: '.page',
	mainLink: '#sidebar li a',
	progressButton: '.progress-btn',
	pageRoute: function(i) {
		hashes = ['/run-your-business', '/let-us-work-for-you', '/check-your-books'];
		window.history.pushState("", "page", hashes[i]);
	},
	init: function() {
		$(this.mainLink).click(this.activeNav.bind(this));
		$(this.progressButton).click(this.sidebarButton.bind(this));
	},
	activeNav: function(e) {
		$(this.mainLink).removeClass("active");
		e.preventDefault();
		var target = $(e.target),
			targetIndex = target.index(this.mainLink),
			pageToTarget = targetIndex + 2;
		target.addClass("active");
		$(".progress-btn").removeClass("visible");
		$(".progress-btn").eq(targetIndex + 1).addClass("visible");
		$(this.page).removeClass("current").fadeOut('fast').promise().done(function() {
			$('.page' + pageToTarget).fadeIn().addClass("current");
		});
		this.pageRoute(targetIndex);
	},
	sidebarButton: function(e) {
		e.preventDefault();
		var target = $(e.target);
			targetIndex = target.index(this.progressButton);
			pageToTarget = targetIndex + 2;
		if (target.text() == "30-day free trial" ) {
			window.open("http://google.com");
		} else {
			target.removeClass("visible");
			target.next().addClass("visible");
			$(this.page).removeClass("current").fadeOut('fast').promise().done(function() {
				$('.page' + pageToTarget).fadeIn().addClass("current");
			});
			$(this.mainLink).removeClass("active");
			$("#sidebar li a").eq(targetIndex).addClass("active");
			}
		this.pageRoute(targetIndex);
	}
}

/*
|--------------------------------------------------------------------------
| Route History Updates
|--------------------------------------------------------------------------
| Conditional loading based on hisotry manipulation
| 
*/

Page = {
	currentPage: '.page.current',
	path: window.location.pathname,
	navLink: '#sidebar li a',
	init: function() {
		if ( this.path === "/run-your-business") {
			$(this.currentPage).removeClass("current");
			$('.page2').addClass("current");
			$(this.navLink).removeClass("active");
			$(this.navLink).eq(0).addClass("active");
		} else if ( this.path === "/let-us-work-for-you") {
			$(this.currentPage).removeClass("current");
			$('.page3').addClass("current");
			$(this.navLink).removeClass("active");
			$(this.navLink).eq(1).addClass("active");
		} else if ( this.path === "/check-your-books") {
			$(this.currentPage).removeClass("current");
			$('.page4').addClass("current");
			$(this.navLink).removeClass("active");
			$(this.navLink).eq(2).addClass("active");
		}
	}
}

/*
|--------------------------------------------------------------------------
| Vue
|--------------------------------------------------------------------------
| Two-way binding using vue.js
| 
*/

Vue.component('receipt', {
	template: '#receipt-template',
	data: function() {
		return {
			tip: '',
			grandtotal: ''
		};
	},
	methods: {
		addSale: function() {
			this.sales.push(
				{amount: 1, desc: '', price: 0.00}
			);
		},
		removeSale: function(index) {
			this.sales.splice(index, 1)
		}
	},
	computed: {
		subtotal: function subtotal() {
			var result = 0;
			this.sales.forEach(function (sale) {
				return result += +sale.price;
			});
			var subtotal = Math.round(100 * result) / 100;
			return subtotal.toFixed(2);
		},
		tax: function tax() {
			var tax = this.subtotal * .08;
			return tax.toFixed(2);
		},
		total: function total() {
			var total = Number(this.subtotal) + Number(this.tax) + Number(this.tip);
			return total.toFixed(2);
		}
	},
	props: [ 'header', 'date', 'sales' ]
})

// Vue.component('summary', {
// 	template: '#summary-template',
// 	data: function() {
// 		return
// 	},
// 	methods: {

// 	},
// 	computed: {

// 	},
// 	props: []
// })

var vm = new Vue({
	el: '#content',
	data: {
		sales1: [
			{amount: 1, desc: "Dante's Inferno", price: 13.99},
			{amount: 1, desc: "Espresso", price: 5.25},
			{amount: 1, desc: "The Sun Also Rises", price: 11.99},
			{amount: 1, desc: "Spanish Coffee", price: 1.99}
		],
		sales2: [
			{amount: 1, desc: "Huckleberry Finn", price: 14.95},
			{amount: 1, desc: "Americano", price: 2.29},
			{amount: 1, desc: "Pride & Prejudice", price: 12.95},
			{amount: 1, desc: "Black Tea Latte", price: 4.25},
			{amount: 1, desc: "Scone", price: 3.25}
		],
		company: 'Between The Covers & Grinders Cafe'
	},
	computed: {
		grand: function() {
			// this.$root.total;
			// this.$children.total;
		}
	}
})

/*
|--------------------------------------------------------------------------
| Init our objects
|--------------------------------------------------------------------------
*/

window.onload = function() {
  Route.init();
  Page.init();
};