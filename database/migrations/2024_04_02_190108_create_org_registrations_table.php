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
        Schema::create('org_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('acronym')->nullable();
            $table->string('accreditation_no')->nullable();
            $table->foreignId('type_of_org_id')->constrained('type_of_organizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_registrations');
    }
};
