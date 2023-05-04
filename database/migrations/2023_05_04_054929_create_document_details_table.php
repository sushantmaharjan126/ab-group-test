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
        Schema::create('document_details', function (Blueprint $table) {
            $table->id()->start_from(100);
            $table->unsignedBigInteger('register_id');
            $table->unsignedBigInteger('type_id');
            $table->string('document_image1')->nullable()->default(null);
            $table->string('document_image2')->nullable()->default(null);
            $table->string('document_image3')->nullable()->default(null);
            $table->text('document_description')->nullable()->default(null);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_details');
    }
};
