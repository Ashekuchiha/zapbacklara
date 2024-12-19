<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesprovidersTable extends Migration
{
    public function up()
    {
        Schema::create('servicesproviders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('password');
            $table->string('service');
            $table->string('specialized');
            $table->integer('experience');
            $table->json('service_organization');
            $table->string('status');
            $table->string('amount');
            $table->string('type');
            $table->string('featured');
            $table->string('certificate')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicesproviders');
    }
}
