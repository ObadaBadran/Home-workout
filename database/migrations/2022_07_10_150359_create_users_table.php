<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender',['male','female']);
            $table->double('length');
            $table->double('weight');
           // $table->string('focus_part');
            $table->enum('role',['admin','user']);
         //   $table->integer('goal_id');
       //     $table->integer('level_id')->unsigned();
         //   $table->integer('sportprogram_id')->unsigned();
           // $table->string('email')->unique();
           // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

           // $table->ForeignId('goal_id')->constrained('goals')->cascadeOnDelete();
           // $table->ForeignId('level_id')->constrained('levels')->cascadeOnDelete();
            //$table->ForeignId('sportprogram_id')->constrained('sport_programs')->cascadeOnDelete();
            //$table->ForeignId('organic_id')->constrained('organics')->cascadeOnDelete();

            //  $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
          //  $table->foreign('sportprogram_id')->references('id')->on('sport_programs')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
