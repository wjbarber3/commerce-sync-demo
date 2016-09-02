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
	pageTitle: 'h1.title',
	sideText: '.sidebar-text',
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
		$(this.pageTitle).removeClass("visible");
		e.preventDefault();
		var target = $(e.target).parent(),
			targetIndex = target.index(this.mainLink),
			pageToTarget = targetIndex + 2;
		target.addClass("active");
		$(".progress-btn").removeClass("visible");
		$(".progress-btn").eq(targetIndex + 1).addClass("visible");
		$(this.page).removeClass("current").fadeOut('fast').promise().done(function() {
			$('.page' + pageToTarget).fadeIn().addClass("current");
		});
		$(this.pageTitle).eq(targetIndex + 1).addClass("visible");
		this.pageRoute(targetIndex);
		$(this.sideText).removeClass("active");
		$('.side-text' + (targetIndex + 1) ).addClass("active");

	},
	sidebarButton: function(e) {
		e.preventDefault();
		$(this.pageTitle).removeClass("visible");
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
			$(this.pageTitle).eq(targetIndex + 1).addClass("visible");
			$(this.sideText).removeClass("active");
			$('.side-text' + (targetIndex + 1) ).addClass("active");
		}

		this.pageRoute(targetIndex);
	}
}

/*
|--------------------------------------------------------------------------
| Mobile Account Nav
|--------------------------------------------------------------------------
| Object to handle toggling the mobile nav from 'account' view
| 
*/

AccountNav = {
	navTrigger: '.mobile-nav-trigger',
	mobileNav: '.account-sidebar',
	init: function() {
		$(this.navTrigger).click(this.toggleNav.bind(this));
	},
	toggleNav: function() {
		$(this.mobileNav).toggle();
		$(this.navTrigger).find('i').toggleClass("fa-remove").toggleClass("fa-bars");
	}
}

/*
|--------------------------------------------------------------------------
| Route History Updates
|--------------------------------------------------------------------------
| Conditional loading based on history manipulation
| 
*/

Page = {
	currentPage: '.page.current',
	path: window.location.pathname,
	navLink: '#sidebar li a',
	progressButton: '.progress-btn',
	pageTitle: 'h1.title',
	hashes: ['/run-your-business', '/let-us-work-for-you', '/check-your-books'],
	sideText: '.sidebar-text',
	init: function() {
		for ( i = 0; i < this.hashes.length; i++ ) {
			if ( this.path === this.hashes[i] ) {
				$(this.currentPage).removeClass("current");
				$('.page' +  (i + 2) ).addClass("current");
				$(this.navLink).removeClass("active");
				$(this.navLink).eq(i).addClass("active");
				$(this.progressButton).removeClass("visible");
				$(this.progressButton).eq(i+1).addClass("visible");
				$(this.pageTitle).removeClass("visible");
				$(this.pageTitle).eq(i+1).addClass("visible");
				$(this.sideText).removeClass("active");
				$('.side-text' +  (i + 1) ).addClass("active");
			}
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
			tip: ''
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
		subtotal: function() {
			var result = 0;
			this.sales.forEach(function (sale) {
				return result += +sale.price;
			});
			var subtotal = Math.round(100 * result) / 100;
			return subtotal.toFixed(2);
			this.$dispatch('taxable', this.subtotal);
		},
		tax: function() {
			var tax = this.subtotal * .08;
			return tax.toFixed(2);
		},
		total: function() {
			var total = Number(this.subtotal) + Number(this.tax) + Number(this.tip);
			return total.toFixed(2);
			this.$dispatch('grandtotal', this.total);
			this.$dispatch('totaltips', this.tip);
		}
	},
	props: [ 'header', 'date', 'sales', 'cc', 'ccnum' ]
})

var vm = new Vue({
	el: '#content',
	data: {
		sales1: [
			{ amount: 1, desc: "Dante's Inferno", price: 13.99 },
			{ amount: 1, desc: "Espresso", price: 5.25 },
			{ amount: 1, desc: "The Sun Also Rises", price: 11.99 },
			{ amount: 1, desc: "Spanish Coffee", price: 1.99 }
		],
		sales2: [
			{ amount: 1, desc: "Huckleberry Finn", price: 14.95 },
			{ amount: 1, desc: "Americano", price: 2.29 },
			{ amount: 1, desc: "Pride & Prejudice", price: 12.95 },
			{ amount: 1, desc: "Black Tea Latte", price: 4.25 },
			{ amount: 1, desc: "Scone", price: 3.25 }
		],
		company: 'Between The Covers & Grinders Cafe'
	},
	computed: {
		'grandtotal': function(totals) {
			return Number(totals.$children[0].total) + Number(totals.$children[1].total);
		},
		'taxable': function(subtotals) {
			var sum = Number(subtotals.$children[0].subtotal) + Number(subtotals.$children[1].subtotal);
			return sum.toFixed(2);
		},
		'totaltips': function(tips) {
			var sum = Number(tips.$children[0].tip) + Number(tips.$children[1].tip);
			return sum.toFixed(2);
		},
		grandsubtotal: function() {
			return Number(this.taxable) + Number(this.totaltips);
		},
		totaltax: function() {
			var totaltax = this.grandsubtotal * .08;
			return totaltax.toFixed(2);
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
	AccountNav.init();
	window.onpopstate = function(event) {
        location.reload();
    };
};