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
        Schema::create('student_org_registration_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_org_id')->constrained('student_organizations');
            $table->foreignId('ay_semester_id')->constrained('ay_semesters');
            $table->foreignId('acad_year_id')->constrained('acad_years');
            $table->string('file_path');
            $table->string('file_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_org_registration_documents');
    }
};
