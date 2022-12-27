<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_lots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->index()->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('lot_id')->nullable()->index()->constrained('lots')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('category_lots');
    }
}
