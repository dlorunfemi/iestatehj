<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557798610207TenantsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tenants')) {
            Schema::create('tenants', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('name');
                $table->string('phone');
                $table->string('email');
                $table->longText('work_place')->nullable();
                $table->string('kin_name')->nullable();
                $table->string('kin_phone')->nullable();
                $table->string('kin_address')->nullable();
                $table->string('is_active');
                $table->unsignedInteger('created_by_id');
                $table->foreign('created_by_id', 'created_by_fk_53777')->references('id')->on('users');
                $table->unsignedInteger('updated_by_id')->nullable();
                $table->foreign('updated_by_id', 'updated_by_fk_53778')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
