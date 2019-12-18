<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intern_skill', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('intern_id');
            $table-> foreign('intern_id')->references('id')->on('interns');
           
            $table->unsignedBigInteger('skill_id');
            $table-> foreign('skill_id')->references('id')->on('skills');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intern_skill');
    }
}
