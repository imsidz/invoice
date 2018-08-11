<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceno')->unique();
            $table->string('ponumber')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('tax')->nullable();
            $table->string('total')->nullable();
            $table->date('podate')->nullable();
            $table->boolean('canclestatus')->default(false);
            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients')
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
        Schema::dropIfExists('invoices');
    }
}
