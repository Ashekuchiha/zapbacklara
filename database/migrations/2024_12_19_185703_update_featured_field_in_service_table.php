<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateFeaturedFieldInServiceTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            // Change the column type
            $table->boolean('featured')->default(0)->change();
        });


    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            // Revert to the previous type
            $table->string('featured', 10)->change();
        });

    }
}