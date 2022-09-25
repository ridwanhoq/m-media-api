<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillSubSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_sub_specialities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_speciality_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->unique(['title', 'skill_speciality_id'], 'title_skill_speciality_unique');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('skill_sub_specialities');
    }
}
