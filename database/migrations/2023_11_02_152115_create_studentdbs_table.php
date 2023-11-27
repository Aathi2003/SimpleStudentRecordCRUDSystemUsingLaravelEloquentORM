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
        Schema::create('studentdbs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->integer('age')->unsigned();
            $table->bigInteger('mobile')->unsigned()->unique();
            $table->string('email', 50)->unique();
            $table->string('address', 100);
            $table->string('image', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentdbs');
    }
};
