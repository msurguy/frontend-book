<?php

Route::get('/', function()
{
  return View::make('index');
});

Route::get('api', function()
{
  // Retrieve user's input ('q' query parameter)
  $query = Input::get('q','');

  // If the input is empty, return an error response
  if(trim(urldecode($query)) == '') return Response::json(['data' => []], 200);

  // Search the data in DB and retrieve a list of items matching the search query
  $data = DB::table('cities')
            ->where('name','like','%'.$query.'%')
            ->orderBy('name','asc')
            ->take(10)
            ->get(['id', 'name', 'country']);
  
  // Return JSON-encoded list of items as a response to the request
  return Response::json(['data' => $data]);
});

// The route that shows the form submission results (for demo purposes)
Route::post('/', function()
{
  $cityID = Input::get('city');
  if (!$cityID) return Redirect::to('/');

  $city = DB::table('cities')->where('id', $cityID)->first();
  if (!$city) return Redirect::to('/');

  return View::make('index', ['city' => $city]);
});