<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557926003885PaymentTenantPivotTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('payment_tenant');
    }

    public function down()
    {
        Schema::create('payment_tenant', function (Blueprint $table) {
            $table->unsignedInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_53822')->references('id')->on('payments');
            $table->unsignedInteger('tenant_id');
            $table->foreign('tenant_id', 'tenant_id_fk_53822')->references('id')->on('tenants');
        });
    }
}
