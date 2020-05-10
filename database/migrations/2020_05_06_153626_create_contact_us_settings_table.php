<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_settings', function (Blueprint $table) {
            $table->id();
            $table->string('emailone');
            $table->string('emailtwo');
            $table->string('emailthree');
            $table->string('phoneone');
            $table->string('phonetwo');
            $table->string('phonethree');
            $table->string('facebookLink');
            $table->string('twitterLink');
            $table->string('linkedInLink');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us_settings');
    }
}
