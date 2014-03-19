...
.done(function(response) {
  if (response.errors) {
    humane.log(response.errors,{ addnCls: 'humane-flatty-error'});
  } else {
    humane.log('Message sent',{ addnCls: 'humane-flatty-success'});
  }
})
...
