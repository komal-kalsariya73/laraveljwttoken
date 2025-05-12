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
        Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('fname');
        $table->string('gender'); // 👈 Added gender field
        $table->string('phone')->nullable();
        $table->string('email')->unique();
        $table->string('password')->nullable();
        $table->string('city');
        $table->string('address');
         $table->string('image')->nullable(); // 👈 image field (to store image filename or path)



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
