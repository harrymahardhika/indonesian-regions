<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('area_districts', static function (Blueprint $table): void {
            $table->id();
            $table->foreignId('city_id');
            $table->string('code')->unique();
            $table->string('name')->index();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('area_cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_districts');
    }
}
