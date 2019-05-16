<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557794762017PropertyTagsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('property_tags')) {
            Schema::create('property_tags', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('property_tags');
    }
}
