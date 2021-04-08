<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('nickname');
            $table->bigInteger('user_id');
            $table->boolean('gender');
            $table->bigInteger('height');
            $table->bigInteger('age');
            $table->string('work',50);
            $table->text('comment');
            $table->string('interest');
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
        Schema::dropIfExists('profiles');
    }
}