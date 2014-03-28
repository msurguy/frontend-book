<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->timestamps();
		});

		Schema::create('posts', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->text('body');
		    $table->timestamps();
		});

		Schema::create('post_tag', function($table)
		{
		    $table->increments('id');
		    $table->integer('tag_id')->unsigned();
		    $table->integer('post_id')->unsigned();
		    $table->timestamps();

		    // Add foreign keys
		    $table->foreign('tag_id')
		          ->references('id')->on('tags')
		          ->onDelete('cascade');
		          
		    $table->foreign('post_id')
		          ->references('id')->on('posts')
		          ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tags');
		Schema::dropIfExists('posts');
		Schema::dropIfExists('post_tag');
	}

}
