/*
|--------------------------------------------------------------------------
| View Object
|--------------------------------------------------------------------------
| This object houses all functions related to updating views
| 
*/

View = {
	page: '.page',
	mainLink: '#sidebar li a',
	progressButton: '.progress-btn',
	init: function() {
		$(this.mainLink).click(this.showView.bind(this));
		$(this.mainLink).click(this.activeNav.bind(this));
		$(this.progressButton).click(this.sidebarButton.bind(this));
	},
	showView: function(e) {
		e.preventDefault();
		var target = $(e.target),
			targetIndex = target.index(this.mainLink),
			pageToTarget = targetIndex + 2;
		$(this.page).removeClass("current").fadeOut('fast').promise().done(function() {
			$('.page' + pageToTarget).fadeIn().addClass("current");
		});
	},
	activeNav: function(e) {
		$(this.mainLink).removeClass("active");
		e.preventDefault();
		$(e.target).addClass("active");
		var targetIndex = $(e.target).index(this.mainLink)
		$(".progress-btn").removeClass("visible");
		$(".progress-btn").eq(targetIndex + 1).addClass("visible");
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
		console.log(targetIndex);
		// pageRoute(targetIndex);
	}
}

// function pageRoute(i) {
// 	hashes = ['/step1', '/step2', '/step3'];
// 	window.history.pushState("", "page 2", hashes[i]);
// }

/*
|--------------------------------------------------------------------------
| History Updates
|--------------------------------------------------------------------------
| Manipulate the history stack so we can have 'pages'
| 
*/

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
			tip: 8.50,
			sale: [
				{ price: '' },
				{ desc: '' },
				{ amount: '' }
			]
		};
	},
	methods: {
		addSale: function() {
			this.sales.push(this.sale);
		}
	},
	computed: {
		subtotal: function() {
			let result = 0;
		  	this.sales.forEach((sale) => result += +sale.price);
		  	var subtotal = Math.round(100 * result) / 100;
		  	return subtotal.toFixed(2);
		},
		tax: function() {
			var tax = this.subtotal * .07;
			return tax.toFixed(2);
		},
		total: function() {
			var total = parseInt(this.subtotal) + parseInt(this.tax);
			return total;
		}
	},
	props: ['header', 'date', 'sales' ]
})

var vm = new Vue({
	el: '#content',
	data: {
		sales1: [
			{amount: 1, desc: 'A book title', price: 13.99},
			{amount: 3, desc: 'An espresso title', price: 5.00},
			{amount: 6, desc: 'A drink title', price: 4.25},
			{amount: 2, desc: 'A pastrt', price: 3.99}
		],
		sales2: [
			{amount: 1, desc: 'A title', price: 9},
			{amount: 2, desc: 'An title', price: 3},
			{amount: 3, desc: 'A title', price: 5},
			{amount: 4, desc: 'A ', price: 99}
		],
	}
})

/*
|--------------------------------------------------------------------------
| Init our objects
|--------------------------------------------------------------------------
*/

window.onload = function() {
  View.init();
};