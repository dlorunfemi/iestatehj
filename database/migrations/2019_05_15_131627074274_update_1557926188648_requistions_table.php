<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1557926188648RequistionsTable extends Migration
{
    public function up()
    {
        Schema::table('requistions', function (Blueprint $table) {
        });
        Schema::table('requistions', function (Blueprint $table) {
            $table->unsignedInteger('property_id');
            $table->foreign('property_id', 'property_fk_56068')->references('id')->on('properties');
            $table->unsignedInteger('landlord_id');
            $table->foreign('landlord_id', 'landlord_fk_56069')->references('id')->on('landlords');
        });
    }

    public function down()
    {
        Schema::table('requistions', function (Blueprint $table) {
        });
    }
}
