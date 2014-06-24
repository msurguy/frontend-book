<?php

// Show a page with the chooser
Route::get('/', function()
{
  return View::make('index');
});

Route::get('basic', function()
{
  return View::make('basic');
});

Route::post('upload', function()
{
  $file = Input::file('filedata');
   
  $destinationPath = 'uploads';
  $filename  = str_random(16);
  $extension = $file->getClientOriginalExtension(); 
  $size      = $file->getSize(); 
  $fullName  = $filename.'.'.$extension;
  $upload_success = $file->move($destinationPath, $fullName);
   
  if( $upload_success ) {
     return Response::json(['name' => $fullName, 'size' => $size], 200);
  } else {
     return Response::json('error', 400);
  }
});

Route::get('multi', function()
{
  return View::make('multi');
});

Route::get('crop', function()
{
  return View::make('crop');
});