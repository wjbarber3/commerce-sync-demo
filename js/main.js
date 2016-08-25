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
		$(this.progressButton).click(this.sidebarUpdate.bind(this));
	},
	showView: function(e) {
		e.preventDefault();
		target = $(e.target);
		targetIndex = target.index(this.mainLink);
		pageToTarget = targetIndex + 2;
		$(this.page).removeClass("current").fadeOut('fast').promise().done(function() {
			$('.page' + pageToTarget).fadeIn().addClass("current");
		});
	},
	activeNav: function(e) {
		$(this.mainLink).removeClass("active");
		e.preventDefault();
		$(e.target).addClass("active");
	},
	sidebarUpdate: function(e) {
		e.preventDefault();
		target = $(e.target);
		target.removeClass("visible");
		target.next().addClass("visible");
	}
}

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
| Init our objects
|--------------------------------------------------------------------------
*/

window.onload = function() {
  View.init();
  // Receipts.init();
};