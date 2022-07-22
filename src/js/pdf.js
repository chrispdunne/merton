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
