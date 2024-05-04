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
        Schema::create('applicant_details', function (Blueprint $table) {
            
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("mobile");
            $table->string("email");
            $table->string("address");
            $table->string("dob");
            $table->string("gender");
            $table->string("resume_path")->nullable();;
            $table->string("photo_path")->nullable();;
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_details');
    }
};
