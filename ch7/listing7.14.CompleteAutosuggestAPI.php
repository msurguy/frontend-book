Route::get('api', function()
{
// Retrieve user's input ('q' query parameter)
$query = Input::get('q','');

// Search the data in DB and retrieve a list of items matching the search query
$data = DB::table('cities')
->where('name','like','%'.$query.'%')
->orderBy('name','asc')
 ->take(10)
 ->get();

 // Return JSON-encoded list of items inside of "data" object as a response to the request
return Response::json(['data' => $data]);
});