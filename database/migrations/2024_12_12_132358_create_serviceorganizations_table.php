<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateServiceorganizationsTable extends Migration
// {
//     public function up(): void
//     {
//         Schema::create('serviceorganizations', function (Blueprint $table) {
//             $table->id();
//             $table->string('organizationName');
//             $table->string('ownerName');
//             $table->string('state');
//             $table->string('city');
//             $table->json('mapSelection');
//             $table->string('address');
//             $table->text('organizationBio')->nullable();
//             $table->text('organizationDescription')->nullable();
//             $table->string('organizationWebsite')->nullable();
//             $table->string('phoneNumber');
//             $table->string('emergencyPhoneNumber')->nullable();
//             $table->integer('employeeNumbers');
//             $table->string('organizationLogo')->nullable();
//             $table->string('organizationBanner')->nullable();
//             $table->string('tradeLicense')->nullable();
//             $table->json('organizationDocuments')->nullable();
//             $table->string('featured')->default('No');
//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('serviceorganizations');
//     }
// }


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('serviceorganizations', function (Blueprint $table) {
            $table->id();
            $table->string('organizationName');
            $table->string('ownerName');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->json('mapSelection');
            $table->text('organizationBio')->nullable();
            $table->text('organizationDescription')->nullable();
            $table->string('organizationWebsite')->nullable();
            $table->string('phoneNumber');
            $table->string('emergencyPhoneNumber')->nullable();
            $table->string('employeeNumbers')->nullable();
            $table->string('organizationLogo')->nullable();
            $table->string('organizationBanner')->nullable();
            $table->string('tradeLicense')->nullable();
            $table->string('organizationDocuments')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('serviceorganizations');
    }
};
