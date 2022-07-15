(function ($) {
	$(document).ready(function () {
		// toggle
		$("#site-navigation .search").click(function () {
			$(this).toggleClass("active");
			$("#site-navigation #searchform").toggleClass("active");
		});
	});
})(jQuery);
