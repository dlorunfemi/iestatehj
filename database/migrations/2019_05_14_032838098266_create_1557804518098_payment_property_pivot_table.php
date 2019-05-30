<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557804518098PaymentPropertyPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payment_property')) {
            Schema::create('payment_property', function (Blueprint $table) {
                $table->unsignedInteger('payment_id');
                $table->foreign('payment_id', 'payment_id_fk_53820')->references('id')->on('payments');
                $table->unsignedInteger('property_id');
                $table->foreign('property_id', 'property_id_fk_53820')->references('id')->on('properties');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('payment_property');
    }
}
