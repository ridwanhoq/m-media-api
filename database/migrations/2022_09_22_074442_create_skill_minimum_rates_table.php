<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillMinimumRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_minimum_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_id')->unique()->constrained()->onDelete('cascade');
            $table->string('skill_score')->default(1);
            $table->string('minimum_rate_per_minute')->default(1);//usd
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
        Schema::dropIfExists('skill_minimum_rates');
    }
}
