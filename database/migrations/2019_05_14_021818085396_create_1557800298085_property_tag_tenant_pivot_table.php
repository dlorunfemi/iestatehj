<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557800298085PropertyTagTenantPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('property_tag_tenant')) {
            Schema::create('property_tag_tenant', function (Blueprint $table) {
                $table->unsignedInteger('tenant_id');
                $table->foreign('tenant_id', 'tenant_id_fk_53805')->references('id')->on('tenants');
                $table->unsignedInteger('property_tag_id');
                $table->foreign('property_tag_id', 'property_tag_id_fk_53805')->references('id')->on('property_tags');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('property_tag_tenant');
    }
}
