 Route::get('api', function()
 {
 // Retrieve user's input ('q' query parameter)
 $query = Input::get('q','');

 // If the input is empty, return empty JSON response
 if(trim(urldecode($query)) == '') return Response::json(['data' => []], 200);

// Search the data in DB and retrieve a list of items matching the search query
 $data = DB::table('cities')
 ->where('name','like','%'.$query.'%')
 ->orderBy('name','asc')
 ->take(10)
Integrating autosuggest/smart search 119
 ->get(['id', 'name', 'country']);

// Return JSON-encoded list of items as a response to the request
return Response::json(['data' => $data]);
});