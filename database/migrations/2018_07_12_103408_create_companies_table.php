<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyname');
            $table->string('website')->nullable();
            $table->string('gstin')->nullable();
            $table->string('pan')->nullable();
            $table->string('cin')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('neft')->nullable();
            $table->string('images')->default('nothing');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('companies');
    }
}
