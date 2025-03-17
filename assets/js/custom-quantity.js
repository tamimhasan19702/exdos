/** @format */

jQuery(document).ready(function ($) {
  // Handle plus button click
  $(document).on("click", ".quantity .plus", function (e) {
    e.preventDefault();
    var $input = $(this).siblings("input.qty");
    var max = parseInt($input.attr("max")) || 9999; // Default max to 9999 if not set
    var currentVal = parseInt($input.val());
    if (currentVal < max) {
      $input.val(currentVal + 1).trigger("change");
    }
  });

  // Handle minus button click
  $(document).on("click", ".quantity .minus", function (e) {
    e.preventDefault();
    var $input = $(this).siblings("input.qty");
    var min = parseInt($input.attr("min")) || 0; // Default min to 0 if not set
    var currentVal = parseInt($input.val());
    if (currentVal > min) {
      $input.val(currentVal - 1).trigger("change");
    }
  });

  // Trigger cart update on quantity change
  $(document).on("change", "input.qty", function () {
    var $form = $(this).closest("form");
    $form.find('[name="update_cart"]').trigger("click");
  });
});
