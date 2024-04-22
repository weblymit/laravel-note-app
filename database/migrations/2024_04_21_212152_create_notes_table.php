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
    Schema::create('notes', function (Blueprint $table) {
      $table->id();
      $table->longText('note');
      // user_id is a foreign key that references the id column on the users table and it will be deleted when the user is deleted
      $table->foreignId('user_id')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('notes');
  }
};
