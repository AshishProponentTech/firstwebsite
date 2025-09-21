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
        Schema::create('course_abouts', function (Blueprint $table) {
            $table->id();

            // Foreign key linking to course_pages table
            $table->foreignId('course_page_id')->constrained('courses_pages')->onDelete('cascade');

            // Titles and headings for SEO and display
            $table->string('title');
            $table->string('heading');

            // Images and alt text for SEO
            $table->string('image_1')->nullable();
            $table->string('image_1_alt')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_2_alt')->nullable();

            // Content fields to hold rich HTML (using longText)
            $table->longText('content_top')->nullable();      // top paragraphs (rich HTML)
            $table->longText('content_bottom')->nullable();   // bottom paragraph (rich HTML)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_abouts');
    }
};
