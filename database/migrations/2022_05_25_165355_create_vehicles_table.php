<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->decimal('price');
            $table->integer('year');
            $table->integer('length');
            $table->integer('height');
            $table->integer('width');
            $table->integer('km');
            $table->string('model');
            $table->integer('clean_water');
            $table->integer('waste_water');
            $table->boolean('travel_abroad');
            $table->boolean('animals');
            $table->integer('seats');
            $table->integer('beds');
            $table->mediumText('description');
            $table->string('city');
            $table->foreignId('type_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
