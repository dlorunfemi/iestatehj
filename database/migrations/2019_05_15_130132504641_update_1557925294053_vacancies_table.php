<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1557925294053VacanciesTable extends Migration
{
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
        });
        Schema::table('vacancies', function (Blueprint $table) {
            $table->unsignedInteger('property_id');
            $table->foreign('property_id', 'property_fk_56051')->references('id')->on('properties');
            $table->unsignedInteger('property_tag_id');
            $table->foreign('property_tag_id', 'property_tag_fk_56052')->references('id')->on('property_tags');
        });
    }

    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
        });
    }
}
