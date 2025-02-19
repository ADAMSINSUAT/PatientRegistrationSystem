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
        Schema::create('patientdetails', function (Blueprint $table) {
            $table->id();
            $table->string('consultation_type');
            $table->string('chief_complaint');
            $table->foreignId('patients_id')->constrained();
            $table->foreignId('physicians_id')->constrained();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patientdetails');
    }
};
