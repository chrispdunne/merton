(function ($) {
	$(document).ready(function () {
		// toggle
		$(".menu-toggle").click(function () {
			$(this).toggleClass("active");
			$(".mobile-menu").toggleClass("active");
		});
		// close
		$(".close-menu").click(function () {
			$(".menu-toggle").removeClass("active");
			$(".mobile-menu").removeClass("active");
		});

		// toggle mobile item - sub menu
		$(".mobile-menu .menu-item-has-children").click(function () {
			$(this).toggleClass("active");
			$(this).children(".sub-menu").toggleClass("active");
		});
	});
})(jQuery);
