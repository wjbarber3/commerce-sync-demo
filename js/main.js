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
| Update Receipts
|--------------------------------------------------------------------------
| This object houses all functions related user input to the Receipts
| 
*/

Receipts = {

}

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

/*
|--------------------------------------------------------------------------
| Init our objects
|--------------------------------------------------------------------------
*/

window.onload = function() {
  View.init();
  // Receipts.init();
};