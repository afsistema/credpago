<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('url_id');
            $table->foreign('url_id')->references('id')->on('urls');
            $table->integer('status');
            $table->longText('conteudo');
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
        Schema::dropIfExists('url_logs');
    }
}
