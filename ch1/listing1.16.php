Route::post('register', function()
{
  $rules = [
    'first_name'  =>  'required',
    'last_name'   =>  'required',
    'email'       =>  'required|email',
    'password'    =>  'required|confirmed'
  ];

  $validator = Validator::make(Input::all(), $rules);

  if ($validator->fails())
  {
      return Redirect::to('register')->withInput()->withErrors($validator);
  }

  return 'Form passed validation!';
});
