<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557827067250ProductTagVacancyPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('product_tag_vacancy')) {
            Schema::create('product_tag_vacancy', function (Blueprint $table) {
                $table->unsignedInteger('vacancy_id');
                $table->foreign('vacancy_id', 'vacancy_id_fk_53959')->references('id')->on('vacancies');
                $table->unsignedInteger('product_tag_id');
                $table->foreign('product_tag_id', 'product_tag_id_fk_53959')->references('id')->on('product_tags');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('product_tag_vacancy');
    }
}
