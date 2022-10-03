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
