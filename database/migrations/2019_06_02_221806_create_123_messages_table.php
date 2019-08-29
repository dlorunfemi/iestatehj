<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create123MessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->text('message');
            $table->integer('receiver_id')->nullable();
            $table->boolean('read')->default(false);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
