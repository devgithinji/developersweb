<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('gender')->nullable();
            $table->string('title')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('position')->nullable();
            $table->string('country')->nullable();
            $table->string('city_town')->nullable();
            $table->string('notification_sub')->nullable();
            $table->string('avatar_small')->nullable();
            $table->string('avatar_medium')->nullable();
            $table->string('resume')->nullable();
            $table->string('facebook_account')->nullable();
            $table->string('twitter_account')->nullable();
            $table->string('linkedin_account')->nullable();
            $table->string('website_url')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_profiles');
    }
}
