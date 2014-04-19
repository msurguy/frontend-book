<?php

// A helper function to determin if date input is valid or not
function validateDate($date, $format = 'Y-m-d H:i:s')
{
  $d = DateTime::createFromFormat($format, $date);
  return $d && $d->format($format) == $date;
}

// Show a page with a datepicker
Route::get('/', function()
{
  return View::make('index');
});

// Process submission of the form containing the date picker
Route::post('/', function()
{
  // Get user's input
  $date = Input::get('date');

  // Validate input
  if($date != '' && validateDate($date)){
    // Create a new entry in the DB using Eloquent ORM
    $newDate = new Date;
    $newDate->date = $date;
    $newDate->save();

    // Retrieve all previously submitted dates
    $dates = Date::all();

    return View::make('result', ['date' => $date, 'dates' => $dates]);
  } else {
    // Redirect to index page with an error notification when input isn't valid
    return Redirect::to('/')->with('invalid_date', true);
  }
});