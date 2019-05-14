<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557827067235ProductVacancyPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('product_vacancy')) {
            Schema::create('product_vacancy', function (Blueprint $table) {
                $table->unsignedInteger('vacancy_id');
                $table->foreign('vacancy_id', 'vacancy_id_fk_53957')->references('id')->on('vacancies');
                $table->unsignedInteger('product_id');
                $table->foreign('product_id', 'product_id_fk_53957')->references('id')->on('products');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('product_vacancy');
    }
}
