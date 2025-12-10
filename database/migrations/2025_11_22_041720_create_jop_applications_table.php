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
        Schema::create('jop_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreignUuid('job_vacansy_id')->references('id')->on('job_vacansies')->onDelete('restrict');
            $table->foreignUuid('resume_id')->references('id')->on('resumes')->onDelete('restrict');
            $table->foreignUuid('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // pending, accepted, rejected
            $table->decimal('aiGeneratedScore', 10, 2)->default(0);
            $table->longText('aiGeneratedFeedback')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jop_applications');
    }
};
