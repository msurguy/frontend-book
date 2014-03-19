Route::post('contact', function()
{
  // 1) Get all user's input
  $input = Input::all();

  // 2) Define validation rules
  $rules = [
    'name' 		 => 'required',
    'email' 	  => 'required|email',
    'message' 	=> 'required'
  ];

  // 3) Apply the validator
  $validator = Validator::make(Input::all(), $rules);

  if($validator->fails()) {
    // 4) Set the content to an array of validation error messages
    $content = [ 'errors' => $validator->messages()->all() ];
  } else {

    // 5) Send an HTML email or save the message in DB here

    $content = [ 'status' => 'ok'];
  }

  // 6) Form a JSON response and send it while having HTTP status 200
  return Response::json($content, 200);
});
