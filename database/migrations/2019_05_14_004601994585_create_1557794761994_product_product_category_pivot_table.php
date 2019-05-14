<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557794761994ProductProductCategoryPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('product_product_category')) {
            Schema::create('product_product_category', function (Blueprint $table) {
                $table->unsignedInteger('product_id');
                $table->foreign('product_id', 'product_id_fk_53697')->references('id')->on('products');
                $table->unsignedInteger('product_category_id');
                $table->foreign('product_category_id', 'product_category_id_fk_53697')->references('id')->on('product_categories');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('product_product_category');
    }
}
