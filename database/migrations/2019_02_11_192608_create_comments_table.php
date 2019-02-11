<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');//ovaj id se referencira kao unsigned
            $table->integer('post_id')->unsigned();
            $table->string('author');
            $table->text('text');
            
            // $table->unsignedInteger('post_id'); moze i ovako

            $table->foreign('post_id') //ako se izbrise post da mu se brisu i komentari
            ->references('id')
            ->on('posts')
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
        Schema::dropIfExists('comments');
    }
}
