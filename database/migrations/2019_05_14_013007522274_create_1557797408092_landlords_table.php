<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557797408092LandlordsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('landlords')) {
            Schema::create('landlords', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('name');
                $table->string('phone');
                $table->string('email')->nullable();
                $table->longText('address_office');
                $table->longText('address_residence')->nullable();
                $table->string('bank_name')->nullable();
                $table->string('account_name')->nullable();
                $table->string('account_no')->nullable();
                $table->string('branch')->nullable();
                $table->string('kin_name')->nullable();
                $table->string('kin_phone')->nullable();
                $table->longText('kin_address')->nullable();
                $table->unsignedInteger('officer_id');
                $table->foreign('officer_id', 'officer_fk_53760')->references('id')->on('users');
                $table->float('account', 15, 2)->nullable();
                $table->unsignedInteger('created_by_id');
                $table->foreign('created_by_id', 'created_by_fk_53762')->references('id')->on('users');
                $table->unsignedInteger('updated_by_id')->nullable();
                $table->foreign('updated_by_id', 'updated_by_fk_53763')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('landlords');
    }
}
