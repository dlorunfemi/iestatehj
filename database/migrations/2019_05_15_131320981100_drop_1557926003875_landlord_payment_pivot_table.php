<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557926003875LandlordPaymentPivotTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('landlord_payment');
    }

    public function down()
    {
        Schema::create('landlord_payment', function (Blueprint $table) {
            $table->unsignedInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_53821')->references('id')->on('payments');
            $table->unsignedInteger('landlord_id');
            $table->foreign('landlord_id', 'landlord_id_fk_53821')->references('id')->on('landlords');
        });
    }
}
