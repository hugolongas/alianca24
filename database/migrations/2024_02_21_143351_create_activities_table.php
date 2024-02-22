<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('summary')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('category_id');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('price')->nullable();           
            $table->string('buy_url')->nullable(); 
            $table->boolean('published');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
