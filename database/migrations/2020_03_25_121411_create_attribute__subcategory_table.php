<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_subcategory', function (Blueprint $table) {
            $table->bigInteger('attribute_id')->unsigned();
            $table->bigInteger('subcategory_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->string('description');

            $table->foreign('product_id')
             ->references('id')
             ->on('products')
             ->onDelete('cascade')
             ->onUpdate('cascade');

            $table->foreign('attribute_id')
             ->references('id')
             ->on('attributes')
             ->onDelete('cascade')
             ->onUpdate('cascade');

             $table->foreign('subcategory_id')
             ->references('id')
             ->on('subcategories')
             ->onDelete('cascade')
             ->onUpdate('cascade');

            $table->primary(['attribute_id','subcategory_id']);
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
        Schema::dropIfExists('attribute_subcategory');
    }
}
