<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557800298085ProductTagTenantPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('product_tag_tenant')) {
            Schema::create('product_tag_tenant', function (Blueprint $table) {
                $table->unsignedInteger('tenant_id');
                $table->foreign('tenant_id', 'tenant_id_fk_53805')->references('id')->on('tenants');
                $table->unsignedInteger('product_tag_id');
                $table->foreign('product_tag_id', 'product_tag_id_fk_53805')->references('id')->on('product_tags');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('product_tag_tenant');
    }
}
