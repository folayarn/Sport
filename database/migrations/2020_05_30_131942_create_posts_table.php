<?php

   use Illuminate\Support\Facades\Schema;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Database\Migrations\Migration;

   class CreatePostsTable extends Migration
   {
       /**
        * Run the migrations.
        *
        * @return void
        */
       public function up()
       {
           Schema::create('posts', function (Blueprint $table) {
               $table->bigIncrements('id')->unique();
               $table->unsignedBigInteger('user_id')->index();
               $table->unsignedBigInteger('team_id')->index();
               $table->string('title');
               $table->text('body');
               $table->unsignedBigInteger('category_id')->index();
               $table->string('image');
               $table->timestamps();
               $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
               $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
               $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
           });
       }

       /**
        * Reverse the migrations.
        *
        * @return void
        */
       public function down()
       {
          Schema::dropIfExists('posts');



       }
   }
