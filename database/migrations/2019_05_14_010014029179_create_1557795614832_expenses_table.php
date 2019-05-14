<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557795614832ExpensesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('expenses')) {
            Schema::create('expenses', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('expense_category_id')->nullable();
                $table->foreign('expense_category_id', 'expense_category_fk_53714')->references('id')->on('expense_categories');
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
        Schema::dropIfExists('expenses');
    }
}
