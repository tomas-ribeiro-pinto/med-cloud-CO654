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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id');
            $table->string('name');
            $table->date('dob');
            $table->string('phone_number');
            $table->string('email');
            $table->string('gp_name');
            $table->text('allergies')->nullable();
            $table->text('medications')->nullable();
            $table->string('address_line1');
            $table->string('address_line2');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
