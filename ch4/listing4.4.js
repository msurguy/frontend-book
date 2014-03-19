$.ajax({
  type: "POST", // or GET or any other type
  url: "url_to_send_request_to",
  data: "data_to_send_with_request",
  dataType: "json"
})
.done(function(response) {
  // Do something useful when request succeeds
})
.fail(function () {
  // Notify the user that there was a problem communicating with the server
})
.always(function() {
  // Function that will be executed regardless of server's response
});
