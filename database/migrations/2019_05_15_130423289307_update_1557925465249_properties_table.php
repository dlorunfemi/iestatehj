<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1557925465249PropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedInteger('property_type_id');
            $table->foreign('property_type_id', 'property_type_fk_56057')->references('id')->on('property_categories');
        });
    }

    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
        });
    }
}
