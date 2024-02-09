<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->nullable(); // Foreign key
            $table->unsignedBigInteger('client_id')->nullable(); // Foreign key
            $table->timestamp('date_loan')->nullable();
            $table->integer('days_loan')->unsigned()->nullable()->default(12);
            $table->string('status');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
