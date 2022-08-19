<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            //$table->unsignedBigInteger('size_id')->nullable();
            //$table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('product_condition_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->longText('description')->nullable();
            $table->string('image');
            $table->float('price');
            $table->float('discounted_price')->nullabale();
            $table->integer('quantity');
            $table->boolean('in_stock')->deault(true);
            $table->boolean('is_featured')->deault(false);
            $table->boolean('is_active')->deault(false);
            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete(null);
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
};
