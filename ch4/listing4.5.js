// Wait for the HTML document to be loaded completely
$(function() {

  // Retrieve DOM element and store it
  var contactForm     = $('#contact-form');

  contactForm.submit(function(e){
    e.preventDefault();

    // Send a POST AJAX request to the URL of form's action
    $.ajax({
      type: "POST",
      url: contactForm.attr('action'),
      data: contactForm.serialize(),
      dataType: "json"
    })
    .done(function(response) {
      // Request has been completed successfully
      // We'll show notifications here
    })
    .fail(function () {
      // Sending request to the server has failed
      // We'll show a notification that something went wrong
    })
    .always(function() {
      // We'll want to stop the spinner here
    });
  });

});
