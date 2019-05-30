<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557925294062PropertyTagVacancyPivotTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('property_tag_vacancy');
    }

    public function down()
    {
        Schema::create('property_tag_vacancy', function (Blueprint $table) {
            $table->unsignedInteger('vacancy_id');
            $table->foreign('vacancy_id', 'vacancy_id_fk_53959')->references('id')->on('vacancies');
            $table->unsignedInteger('property_tag_id');
            $table->foreign('property_tag_id', 'property_tag_id_fk_53959')->references('id')->on('property_tags');
        });
    }
}
