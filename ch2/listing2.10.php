Route::get('/', function()
{
  // Render the index.blade.php template
  return View::make('index');
});

Route::post('data', function()
{
  // Wait for 3 seconds, then respond with HTTP status 200 and "ok" as contents
  sleep(3);
  return 'ok';
});
