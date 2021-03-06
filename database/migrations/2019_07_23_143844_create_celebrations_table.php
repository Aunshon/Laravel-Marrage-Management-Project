<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCelebrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productName');
            $table->tinyinteger('categoryId');
            $table->float('productPrice', 8, 2);
            $table->integer('productQuantity');
            $table->text('productDescription');
            $table->string('productPicture')->default('NoImage.jpg');
            $table->boolean('publicationStatus');
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
        Schema::dropIfExists('celebrations');
    }
}
