<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557830353898ProductRequistionPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('product_requistion')) {
            Schema::create('product_requistion', function (Blueprint $table) {
                $table->unsignedInteger('requistion_id');
                $table->foreign('requistion_id', 'requistion_id_fk_53980')->references('id')->on('requistions');
                $table->unsignedInteger('product_id');
                $table->foreign('product_id', 'product_id_fk_53980')->references('id')->on('products');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('product_requistion');
    }
}
