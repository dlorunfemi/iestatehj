<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557827067226VacanciesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('vacancies')) {
            Schema::create('vacancies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('is_vacant');
                $table->longText('description')->nullable();
                $table->decimal('rent', 15, 2);
                $table->unsignedInteger('created_by_id');
                $table->foreign('created_by_id', 'created_by_fk_53962')->references('id')->on('users');
                $table->unsignedInteger('updated_by_id')->nullable();
                $table->foreign('updated_by_id', 'updated_by_fk_53963')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
