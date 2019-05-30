<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557830353889RequistionsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('requistions')) {
            Schema::create('requistions', function (Blueprint $table) {
                $table->increments('id');
                $table->decimal('amount_withdraw', 15, 2);
                $table->unsignedInteger('initiating_staff_id');
                $table->foreign('initiating_staff_id', 'initiating_staff_fk_53982')->references('id')->on('users');
                $table->string('status');
                $table->string('accountant')->nullable();
                $table->datetime('acc_conf_date')->nullable();
                $table->string('gm')->nullable();
                $table->datetime('gm_conf_date')->nullable();
                $table->string('ceo')->nullable();
                $table->datetime('ceo_conf_date')->nullable();
                $table->string('is_returned')->nullable();
                $table->unsignedInteger('return_user_id')->nullable();
                $table->foreign('return_user_id', 'return_user_fk_53991')->references('id')->on('users');
                $table->datetime('return_date')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('requistions');
    }
}
