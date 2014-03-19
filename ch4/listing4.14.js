var contactForm     = $('#contact-form');
var spinArea        = $('#spin-area');
var formContainer   = $('#form-container');
var successContainer= $('#success-container');

...
.done(function(response) {
  if (response.errors) {
    humane.log(response.errors,{ addnCls: 'humane-flatty-error'});
  } else {
    humane.log('Message sent',{ addnCls: 'humane-flatty-success'});
    successContainer.fadeIn();
    formContainer.slideUp();
  }
})
...
