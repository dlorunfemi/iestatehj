<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1557799597503PropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('price');
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedInteger('landlord_id');
            $table->foreign('landlord_id', 'landlord_fk_53782')->references('id')->on('landlords');
            $table->string('is_new');
            $table->string('state');
            $table->string('bank_name')->nullable();
            $table->string('is_bank');
            $table->string('is_dormant');
            $table->datetime('dormant_date')->nullable();
            $table->unsignedInteger('officer_id');
            $table->foreign('officer_id', 'officer_fk_53789')->references('id')->on('users');
            $table->unsignedInteger('created_by_id');
            $table->foreign('created_by_id', 'created_by_fk_53790')->references('id')->on('users');
            $table->unsignedInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_53791')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
        });
    }
}
