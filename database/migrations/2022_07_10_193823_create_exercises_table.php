<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('counter');
            $table->integer('duration');
            $table->longText('description');
            $table->double('calories');
            $table->integer('points')->default(0);
            $table->string('gif_url');
            $table->ForeignId('part_id')->constrained('parts')->cascadeOnDelete();
            $table->ForeignId('goal_id')->constrained('goals')->cascadeOnDelete();
            $table->ForeignId('level_id')->constrained('levels')->cascadeOnDelete();

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
        Schema::dropIfExists('exercises');
    }
}
