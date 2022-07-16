(function ($) {
	var currentSlideIndex = 0;

	$(document).ready(function () {
		if ($(".slideshow").length === 0) return;

		// nav
		function setActive(index) {
			$(".slide-controls__button").removeClass("active");
			$(".slide-controls__button[data-index='" + index + "']").addClass(
				"active"
			);
			currentSlideIndex = index;
		}
		$(".slide-controls__button").click(function () {
			setActive(Number($(this).attr("data-index")));
		});
		// scroll
		$(".slideshow").scroll(function () {
			const slideCount = $(".slide").length;
			const windowWidth = $(window).width();
			const scrollLeft = $(this).scrollLeft();
			const scrollProgress =
				scrollLeft / (windowWidth * (slideCount - 1));
			const newIndex = Math.round(scrollProgress * (slideCount - 1));
			if (newIndex !== currentSlideIndex) {
				setActive(newIndex);
			}
		});
	});
})(jQuery);
