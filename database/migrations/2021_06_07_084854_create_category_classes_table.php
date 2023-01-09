<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_classes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('slug_danhmuc');
            $table->string('tendanhmuc');
            $table->string('mota');
            $table->string('kichhoat');
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
        Schema::dropIfExists('category_classes');
    }
}
