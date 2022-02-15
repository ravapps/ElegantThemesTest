<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('email')->unique();
          $table->string('phone');
          $table->longText('message');
          $table->integer('wordpress_id')->nullable();
          $table->timestamp('wordpress_createat')->nullable();

          $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
