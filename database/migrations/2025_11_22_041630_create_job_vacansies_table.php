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
        Schema::create('job_vacansies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('location')->nullable();
            $table->enum('type',['full-time','remote','contract','part-time'])->default('full-time'); // full-time, part-time, contract, etc.
            $table->decimal('salary', 10, 2)->nullable();
            $table->foreignUuid('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreignUuid('job_category_id')->references('id')->on('jop_categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacansies');
    }
};
