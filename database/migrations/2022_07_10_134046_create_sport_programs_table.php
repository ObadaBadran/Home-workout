<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_programs', function (Blueprint $table) {
            $table->id();
            $table->string('begenning_date')->format('d/m/y');
            $table->string('finishing_date')->format('d/m/y');
            $table->enum('periods',['morning','afternoon','evening']);
            $table->integer('times_in_week');
         //   $table->integer('goal_id');
       //     $table->foreign('goal_id')->references('id')->on('goals')->onDelete('casecade');

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
        Schema::dropIfExists('sport_programs');
    }
}
