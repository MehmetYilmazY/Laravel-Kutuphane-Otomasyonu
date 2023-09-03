<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKitapTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_kitap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User tablosundan gelen id'yi referans alacak
            $table->unsignedBigInteger('kitap_id'); // Kitaplar tablosundan gelen id'yi referans alacak
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kitap_id')->references('id')->on('satilik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_kitap');
    }
};
 
