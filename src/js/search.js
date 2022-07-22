(function ($) {
	$(document).ready(function () {
		// toggle
		$("#site-navigation .search").click(function () {
			$(this).toggleClass("active");
			$("#site-navigation #searchform").toggleClass("active");
		});
		// click outside
		$(document).click(function (event) {
			var $target = $(event.target);
			if (
				!$target.closest("#site-navigation").length &&
				$("#site-navigation #searchform").hasClass("active")
			) {
				$("#site-navigation #searchform").removeClass("active");
			}
		});
	});
})(jQuery);
