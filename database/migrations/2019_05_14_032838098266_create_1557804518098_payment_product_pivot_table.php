<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557804518098PaymentProductPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payment_product')) {
            Schema::create('payment_product', function (Blueprint $table) {
                $table->unsignedInteger('payment_id');
                $table->foreign('payment_id', 'payment_id_fk_53820')->references('id')->on('payments');
                $table->unsignedInteger('product_id');
                $table->foreign('product_id', 'product_id_fk_53820')->references('id')->on('products');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('payment_product');
    }
}
