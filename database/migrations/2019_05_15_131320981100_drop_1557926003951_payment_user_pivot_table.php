<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557926003951PaymentUserPivotTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('payment_user');
    }

    public function down()
    {
        Schema::create('payment_user', function (Blueprint $table) {
            $table->unsignedInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_53842')->references('id')->on('payments');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_53842')->references('id')->on('users');
        });
    }
}
