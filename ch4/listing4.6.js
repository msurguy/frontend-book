...
var contactForm     = $('#contact-form');
var spinArea        = $('#spin-area'); // Retrieve DOM element

contactForm.submit(function(e){
  e.preventDefault();

  spinArea.spin('large'); // Attach the spinner

  $.ajax({
    ...
  })
  ...
  .always(function() {
    spinArea.spin(false); // Remove the spinner
  });
});
