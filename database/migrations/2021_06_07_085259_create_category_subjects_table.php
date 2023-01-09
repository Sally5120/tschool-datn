<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_subjects', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('slug_monhoc');
            $table->string('tenmonhoc');
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
        Schema::dropIfExists('category_subjects');
    }
}
