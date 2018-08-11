<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_companies');
    }
}
