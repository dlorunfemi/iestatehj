<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1557926003848PaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('apartmernt_fk_53823');
            $table->dropColumn('apartmernt_id');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedInteger('property_id');
            $table->foreign('property_id', 'property_fk_56063')->references('id')->on('properties');
            $table->unsignedInteger('landlord_id');
            $table->foreign('landlord_id', 'landlord_fk_56064')->references('id')->on('landlords');
            $table->unsignedInteger('tenant_id');
            $table->foreign('tenant_id', 'tenant_fk_56065')->references('id')->on('tenants');
            $table->unsignedInteger('apartment_id');
            $table->foreign('apartment_id', 'apartment_fk_56066')->references('id')->on('property_tags');
            $table->unsignedInteger('is_confirm_by_id');
            $table->foreign('is_confirm_by_id', 'is_confirm_by_fk_56067')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
        });
    }
}
