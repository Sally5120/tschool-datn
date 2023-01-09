<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_classes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('id_monhoc');
            $table->string('id_giaovien');
            $table->string('tieude');
            $table->string('slug_post');
            $table->text('tomtat');
            $table->text('noidung');
            $table->string('soluonghocvien');
            $table->string('hinhanh');
            $table->string('lichkhaigiang');
            $table->string('views');
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
        Schema::dropIfExists('post_classes');
    }
}
