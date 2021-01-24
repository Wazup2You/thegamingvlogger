<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tags')) {
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('game_item_tag')) {
        Schema::create('game_item_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_item_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->unique(['game_item_id', 'tag_id']);

            $table->foreign('game_item_id')
                ->references('id')
                ->on('game_items')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
