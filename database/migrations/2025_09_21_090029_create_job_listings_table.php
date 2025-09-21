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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('description');
            $table->text('responsibilities')->nullable();
            $table->string('skills')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('salary')->nullable();
            $table->string('benefits')->nullable();
            $table->string('location');
            $table->enum('work_type', ['remote', 'on-site', 'hybrid'])->default('on-site');
            $table->date('deadline')->nullable();
            $table->string('company_logo')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
