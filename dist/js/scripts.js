(function ($) {
	$(document).ready(function () {
		// get any checkbox filter checkboxGroup
		const checkboxGroup = $(".checkbox-group-container");
		if (!checkboxGroup || checkboxGroup.length === 0) {
			return;
		}

		// on load go through each checkbox checkboxGroup
		checkboxGroup.each(function () {
			const checkboxGroup = $(this);
			let hiddenInput = checkboxGroup.find("input.combined");
			let checkboxes = checkboxGroup.find('input[type="checkbox"]');

			checkboxes.on("change", function () {
				const checkbox = $(this);
				let hiddenInputVal = hiddenInput.val();
				let array = hiddenInputVal
					.split(",")
					.filter((item) => item && item !== "");

				const toggledOn = checkbox.prop("checked");
				const val = checkbox.val();
				if (toggledOn) {
					array.push(val);
					hiddenInput.val(array.join(","));
				} else {
					hiddenInput.val(hiddenInputVal.replace(val, ""));
				}
			});
		});

		// click to show filter checbkoxes
		$(".filter-title").on("click", function () {
			$(this).parents(".checkbox-group-container").toggleClass("active");
		});
	});
})(jQuery);

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

(function ($) {
	var count = 0;

	$(document).ready(function () {
		var timer = window.setInterval(hasItLoaded, 400);

		$("body").on("click", ".show_pdf", function () {
			var pdf = $(this).parents(".pdfemb-viewer");
			if (pdf.hasClass("active")) {
				pdf.removeClass("active");
				$(this).html("Show PDF");
			} else {
				pdf.addClass("active");
				$(this).html("Hide PDF");
			}
		});

		function hasItLoaded() {
			if ($(".pdfemb-toolbar").length === $(".pdfemb-viewer").length) {
				window.clearInterval(timer);
				$(".pdfemb-toolbar").prepend(
					"<button class='show_pdf'>Show PDF</button>"
				);
			}
			if (count > 10) {
				window.clearInterval(timer);
			}
			count++;
		}
		//
		// $(".pdfemb-viewer").append("<h3 style='position:absolute'>test</h3>");
	});
})(jQuery);

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

(function ($) {
	$(document).ready(function () {
		if ($("#workshop_entry_form").length === 0) return;

		$("#workshop_entry_form #school_select").change(function () {
			if ($(this).val() === "other") {
				$(".other-school").removeClass("hidden");
			} else {
				$(".other-school").addClass("hidden");
			}
		});
	});
})(jQuery);
