<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        //User table will have the basic details. It will only be created after a new user verifies their account and choosing to create the account
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('profile_photo_link')->nullable();

            $table->boolean('is_admin')->default(false); // for now the simplest way to know who is admin. Technically we can create user_admin table for admins but I am not sure if are going to need that.
            
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('bio')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('club_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->constrained('clubs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
          
            $table->enum('role', ['member', 'leader', 'faculty'])->default('member'); //I learned that we can use enum to only allow certain values
            $table->timestamps();

            $table->unique(['club_id', 'user_id']); // this is a way prevent duplicate membership, but I am not sure we will encounter duplicate issues but I just put it there
        });

        //We can work on the public post part later
        //posts can be club internal posts or public posts that will be made on behalf of the club.
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //On club posts the user will be author. I made nullable incase if admin wants to post things, but it may not be required.
            $table->foreignId('club_id')->nullable()->constrained('clubs')->onDelete('cascade');

            // On public posts the club will be author.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->boolean('is_global')->default(false);
            $table->string('title');
            $table->text('content');
            //we need to think about how to do a event type announcement with a date. Well this will need us to wait until we figure out how the calendar will work.
            //Because if we do a dated post we might need to create an another table for post types or maybe a different approuch.
            $table->timestamps();
        });

        //I am not sure how we approuch club requests. We can have a feature for the clubs to create the club request form and manage it. 
        //But this means we basically need a function to build a form with different types of questions etc.
        //We will need form table, form questions table and form response table.
        //Or we can have a unified form for each clubs. They will have a big text area where the club leader can change the text. And also a one big text area where the answer can go
        //in here form table and form respone table only. I will create the tables in this way for now
        Schema::create('join_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->constrained('clubs')->onDelete('cascade');
            $table->text('title')->nullable();
            $table->text('question')->nullable();
            $table->timestamps();

            // 1 join form per club
            $table->unique('club_id');
        });

        Schema::create('join_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('join_form_id')->constrained('join_forms')->onDelete('cascade');
            $table->text('answer')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('responder_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamp('responded_at')->nullable();
            $table->timestamps();

        });

        //defualt stuffs we can possibly remove them
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text("message");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('clubs');
        Schema::dropIfExists('club_memberships');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('join_form');
        Schema::dropIfExists('join_requests');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('messages');
    }
};
