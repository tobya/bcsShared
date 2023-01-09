<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medialinks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('url',400);
            $table->string('type',50);
            $table->text('data')->nullable();
            $table->string('note',400)->nullable();
            $table->string('keywords',400)->nullable();
            $table->integer('mediagroup_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medialinks');
    }
};
