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
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('user_id')->start_from(50);
            $table->string('full_name', 50);
            $table->string('email', 50);
            $table->string('profile_image')->nullable()->default(null);
            $table->unsignedInteger('age');
            $table->enum('gender', ['M', 'F', 'O'])->default('M');
            $table->string('username', 50);
            $table->string('password', 250);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
