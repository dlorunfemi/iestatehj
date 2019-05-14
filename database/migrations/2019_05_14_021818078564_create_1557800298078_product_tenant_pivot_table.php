<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557800298078ProductTenantPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('product_tenant')) {
            Schema::create('product_tenant', function (Blueprint $table) {
                $table->unsignedInteger('tenant_id');
                $table->foreign('tenant_id', 'tenant_id_fk_53804')->references('id')->on('tenants');
                $table->unsignedInteger('product_id');
                $table->foreign('product_id', 'product_id_fk_53804')->references('id')->on('products');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('product_tenant');
    }
}
