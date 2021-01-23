<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTableWithPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->timestamps();
        });


        Schema::create('game_item_tag', function (Blueprint $table) {
            // FK game_item_id
            $table->unsignedBigInteger('game_item_id');
            // FK tag_id
            $table->unsignedBigInteger('tag_id');
            // Primary
            $table->primary(['game_item_id','tag_id']);

            $table->foreign('game_item_id')->references('id')->on('game_items')
                ->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade');
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
        Schema::dropIfExists('game_item_tag');
        Schema::dropIfExists('tags');
    }
}
