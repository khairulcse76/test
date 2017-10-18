<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryId')->nullable();
            $table->text('subCategoryId');
            $table->text('colorId');
            $table->string('brandName');
            $table->string('productName');
            $table->string('modelNo')->unique();
            $table->string('productBrief')->nullable();
            $table->longText('productDescription');
            $table->float('productPrice');
            $table->integer('quantity');
            $table->integer('minQuantity');
            $table->tinyInteger('availability')->default(0);
            $table->integer('clickCount')->default(0);
            $table->tinyInteger('isFeatured')->default(0);
            $table->integer('reorder_level')->nullable();
            $table->string('condition')->nullable();
            $table->string('productFile')->nullable();
            $table->string('productFile1')->nullable();
            $table->string('productFile2')->nullable();
            $table->string('productFile3')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
