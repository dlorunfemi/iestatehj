<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1557925044529TenantsTable extends Migration
{
    public function up()
    {
        Schema::table('tenants', function (Blueprint $table) {
        });
        Schema::table('tenants', function (Blueprint $table) {
            $table->unsignedInteger('property_id');
            $table->foreign('property_id', 'property_fk_56028')->references('id')->on('properties');
            $table->unsignedInteger('apartment_id');
            $table->foreign('apartment_id', 'apartment_fk_56029')->references('id')->on('vacancies');
        });
    }

    public function down()
    {
        Schema::table('tenants', function (Blueprint $table) {
        });
    }
}
