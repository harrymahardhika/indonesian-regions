<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_districts', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('city_id');
            $table->string('code')->index();
            $table->string('name')->index();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('area_cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_districts');
    }
}
