<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaSubdistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_subdistricts', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('district_id');
            $table->string('code')->index();
            $table->string('name')->index();
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('area_districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_subdistricts');
    }
}
