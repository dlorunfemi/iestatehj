<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557794762007PropertyPropertyTagPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('property_property_tag')) {
            Schema::create('property_property_tag', function (Blueprint $table) {
                $table->unsignedInteger('property_id');
                $table->foreign('property_id', 'property_id_fk_53698')->references('id')->on('properties');
                $table->unsignedInteger('property_tag_id');
                $table->foreign('property_tag_id', 'property_tag_id_fk_53698')->references('id')->on('property_tags');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('property_property_tag');
    }
}
