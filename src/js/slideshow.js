(function ($) {
	$(document).ready(function () {
		if ($(".slideshow").length === 0) return;

		$(".slideshow").each(function () {
			let currentSlideIndex = 0;
			const slideshow = $(this);
			const slideControls = slideshow.siblings(".slide-controls");
			// set active func
			function setActive(index) {
				slideControls
					.find(".slide-controls__button")
					.removeClass("active");
				slideControls
					.find(".slide-controls__button[data-index='" + index + "']")
					.addClass("active");
				currentSlideIndex = index;
			}

			// click btn
			slideControls.find(".slide-controls__button").click(function (e) {
				e.preventDefault();
				slideshow.scrollLeft($(this).data("index") * slideshow.width());
				setActive(Number($(this).attr("data-index")));
			});

			// scroll
			slideshow.scroll(function () {
				const slideCount = $(this).find(".slide").length;
				const width = slideshow.width();
				const scrollLeft = $(this).scrollLeft();
				const scrollProgress = scrollLeft / (width * (slideCount - 1));
				const newIndex = Math.round(scrollProgress * (slideCount - 1));
				if (newIndex !== currentSlideIndex) {
					setActive(newIndex);
				}
			});
		});
	});
})(jQuery);
