<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_type', function (Blueprint $table) {
            $table->id();
            $table->string('type_name_ch')->nullable();
            $table->string('type_name_en')->nullable();
            $table->string('subtitle_ch')->nullable();
            $table->string('img')->nullable();
            $table->integer('sort');
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
        Schema::dropIfExists('products_type');
    }
}
