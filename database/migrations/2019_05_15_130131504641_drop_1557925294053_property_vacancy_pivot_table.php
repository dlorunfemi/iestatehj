<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557925294053PropertyVacancyPivotTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('property_vacancy');
    }

    public function down()
    {
        Schema::create('property_vacancy', function (Blueprint $table) {
            $table->unsignedInteger('vacancy_id');
            $table->foreign('vacancy_id', 'vacancy_id_fk_53957')->references('id')->on('vacancies');
            $table->unsignedInteger('property_id');
            $table->foreign('property_id', 'property_id_fk_53957')->references('id')->on('properties');
        });
    }
}
