<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557795615001IncomesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('incomes')) {
            Schema::create('incomes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('income_category_id')->nullable();
                $table->foreign('income_category_id', 'income_category_fk_53722')->references('id')->on('income_categories');
                $table->date('entry_date')->nullable();
                $table->decimal('amount', 15, 2)->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
