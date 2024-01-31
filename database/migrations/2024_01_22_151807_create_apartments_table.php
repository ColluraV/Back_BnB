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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->integer("rooms_number");
            $table->integer("beds_number");
            $table->integer("bath_number");
            $table->integer("dimensions");
            $table->string("address");
            $table->text("images");
            $table->boolean("visibility");
            $table->decimal("latitude", 10, 8);
            $table->decimal("longitude", 10, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
