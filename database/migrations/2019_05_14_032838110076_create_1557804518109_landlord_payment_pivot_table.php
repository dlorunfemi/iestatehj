<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557804518109LandlordPaymentPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('landlord_payment')) {
            Schema::create('landlord_payment', function (Blueprint $table) {
                $table->unsignedInteger('payment_id');
                $table->foreign('payment_id', 'payment_id_fk_53821')->references('id')->on('payments');
                $table->unsignedInteger('landlord_id');
                $table->foreign('landlord_id', 'landlord_id_fk_53821')->references('id')->on('landlords');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('landlord_payment');
    }
}
