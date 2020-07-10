<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanyaTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanya_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tanya_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('tanya_id')->references('id')->on('tanya')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('tanya_tag');
    }
}
