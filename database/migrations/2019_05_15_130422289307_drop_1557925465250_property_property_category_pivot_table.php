<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1557925465250PropertyPropertyCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('property_property_category');
    }

    public function down()
    {
        Schema::create('property_property_category', function (Blueprint $table) {
            $table->unsignedInteger('property_id');
            $table->foreign('property_id', 'property_id_fk_53697')->references('id')->on('properties');
            $table->unsignedInteger('property_category_id');
            $table->foreign('property_category_id', 'property_category_id_fk_53697')->references('id')->on('property_categories');
        });
    }
}
