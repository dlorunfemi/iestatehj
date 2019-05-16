<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1557901083452LandlordsTable extends Migration
{
    public function up()
    {
        Schema::table('landlords', function (Blueprint $table) {
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('branch')->nullable();
        });
    }

    public function down()
    {
        Schema::table('landlords', function (Blueprint $table) {
        });
    }
}
