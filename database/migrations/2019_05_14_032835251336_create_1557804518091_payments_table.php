<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557804518091PaymentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('apartmernt_id')->nullable();
                $table->foreign('apartmernt_id', 'apartmernt_fk_53823')->references('id')->on('property_tags');
                $table->decimal('annual_charge', 15, 2);
                $table->decimal('service_charge', 15, 2)->nullable();
                $table->decimal('legal_fee', 15, 2)->nullable();
                $table->decimal('caution_deposit', 15, 2)->nullable();
                $table->decimal('agency_fee', 15, 2)->nullable();
                $table->decimal('management_fee', 15, 2)->nullable();
                $table->decimal('amount_paid', 15, 2)->nullable();
                $table->decimal('landlord_account', 15, 2)->nullable();
                $table->decimal('company_account', 15, 2)->nullable();
                $table->date('payment_date');
                $table->date('rent_from');
                $table->date('rent_to');
                $table->string('payment_type');
                $table->string('bank_name')->nullable();
                $table->string('cheque_no')->nullable();
                $table->longText('note')->nullable();
                $table->string('is_confirmed')->nullable();
                $table->datetime('is_confirmed_date')->nullable();
                $table->string('is_confirmed_gm')->nullable();
                $table->unsignedInteger('is_confirmed_gm_name_id')->nullable();
                $table->foreign('is_confirmed_gm_name_id', 'is_confirmed_gm_name_fk_53845')->references('id')->on('users');
                $table->datetime('is_confirmed_gm_date')->nullable();
                $table->string('is_confirmed_ceo')->nullable();
                $table->unsignedInteger('is_confirmed_ceo_name_id')->nullable();
                $table->foreign('is_confirmed_ceo_name_id', 'is_confirmed_ceo_name_fk_53848')->references('id')->on('users');
                $table->datetime('is_confirmed_ceo_date')->nullable();
                $table->string('is_cancelled')->nullable();
                $table->datetime('date_cancelled')->nullable();
                $table->unsignedInteger('cancelled_by_id')->nullable();
                $table->foreign('cancelled_by_id', 'cancelled_by_fk_53852')->references('id')->on('users');
                $table->string('is_full_payment')->nullable();
                $table->string('is_part_payment')->nullable();
                $table->unsignedInteger('created_by_id');
                $table->foreign('created_by_id', 'created_by_fk_53855')->references('id')->on('users');
                $table->unsignedInteger('updated_by_id')->nullable();
                $table->foreign('updated_by_id', 'updated_by_fk_53856')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
