<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvshowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvshows', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover');
            $table->string('imdb','10');
            $table->string('runtime','10');
            $table->year('year');
            $table->string('type','9');
            $table->string('rating','5');
            $table->string('status','8');
            $table->string('season','2');
            $table->string('episode','4');
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
        Schema::dropIfExists('tvshows');
    }
}
