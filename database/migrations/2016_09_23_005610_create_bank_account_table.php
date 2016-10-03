<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_account', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id');
            $table->string('account_number')->unique();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->bigIncrements('created_by')->default(0);
            $table->bigIncrements('updated_by')->default(0);
            $table->bigIncrements('deleted_by')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_account');
    }
}