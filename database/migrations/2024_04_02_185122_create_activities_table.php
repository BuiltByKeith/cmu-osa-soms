<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_organization_id')->constrained('student_organizations');
            $table->string('activity_name');
            $table->double('budget_allocation')->nullable();
            $table->foreignId('type_of_activity_id')->constrained('type_of_activities');
            $table->foreignId('activity_category_id')->constrained('activity_categories');
            $table->string('venue');
            $table->foreignId('reach_of_activity_id')->constrained('reach_of_activities');
            $table->dateTime('date_time_start')->nullable();
            $table->dateTime('date_time_end')->nullable();
            $table->foreignId('ay_semester_id')->constrained('ay_semesters');
            $table->foreignId('acad_year_id')->constrained('acad_years');
            $table->foreignId('activity_status_id')->constrained('activity_statuses');
            $table->dateTime('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
