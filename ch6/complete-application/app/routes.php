<?php

// Define a route for showing the blog post and tags
Route::get('/', function()
{
  // Get the blog post from DB
  $post = Post::find(1);
  // Get all tags from DB
  $allTags = Tag::all()->lists('name');
  // Get a list of tags that belong to the post in DB
  $chosenTags = $post->tags()->lists('name');
  
  // Show the page, passing the post, all tags and the tags that belong to the post
  return View::make('index') 
    ->with('post', $post)
    ->with('allTags', $allTags)
    ->with('chosenTags', $chosenTags);
});

// Define a route for submitting the form
Route::post('/', function()
{
  // Gather all input from the user
  $input = Input::all();

  // Define validation rules
  $rules = [
    'name' => 'required',
    'body' => 'required'
  ];

  // Apply the validation rules onto the input
  $validator = Validator::make($input, $rules);

  // If validation fails, redirect the user to the homepage and show an error message
  if ($validator->fails()) {
    return Redirect::to('/')->withInput()->with('message','Name and body of the post are required');
  }

  // Validation passed, do the following:

  // Get the post from DB 
  $post = Post::find(1);

  // Update the name and the body of the post from the input
  $post->name = $input['name'];
  $post->body = $input['body'];
  $post->save();

  // If the input contains tags, attach them to the post, otherwise remove all tags from the post
  if(Input::has('tags')){

    // Declare empty array of tag IDs
    $tagIDs = [];

    // Add new tags to the DB
    foreach ($input['tags'] as $tag) {
      if($existingTag = Tag::where('name', $tag)->first()){
        // If tag exists, make sure to add it to a list of tags that should be assigned to the post
        $tagIDs[] = $existingTag->id;

      } else {
        // If tag does not exist, add it to DB
        $newTag = new Tag;
        $newTag->name = $tag;
        $newTag->save();

        // Add the ID of this new tag to the list of IDs of tags that should be assigned to the post
        $tagIDs[] = $newTag->id;
      }   
    }

    // Synchronize all tags for the post
    $post->tags()->sync($tagIDs);

  } else {
    // Detach all tags
    $post->tags()->detach();
  }

  return Redirect::to('/')->with('message','Post has been updated!');

});
