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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('event_type');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};    