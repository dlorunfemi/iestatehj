<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557830353898PropertyRequistionPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('property_requistion')) {
            Schema::create('property_requistion', function (Blueprint $table) {
                $table->unsignedInteger('requistion_id');
                $table->foreign('requistion_id', 'requistion_id_fk_53980')->references('id')->on('requistions');
                $table->unsignedInteger('property_id');
                $table->foreign('property_id', 'property_id_fk_53980')->references('id')->on('properties');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('property_requistion');
    }
}
