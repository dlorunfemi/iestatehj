<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557925044530PropertyTenantPivotTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('property_tenant');
    }

    public function down()
    {
        Schema::create('property_tenant', function (Blueprint $table) {
            $table->unsignedInteger('tenant_id');
            $table->foreign('tenant_id', 'tenant_id_fk_53804')->references('id')->on('tenants');
            $table->unsignedInteger('property_id');
            $table->foreign('property_id', 'property_id_fk_53804')->references('id')->on('properties');
        });
    }
}
