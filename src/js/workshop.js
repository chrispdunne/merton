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
