<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nhanvien', function (Blueprint $table) {
            $table->increments('nhanvien_id');
            $table->string('nhanvien_hoten',100);
            $table->integer('cap_id');
            $table->integer('nhanvien_gioitinh');
            $table->string('nhanvien_email',100);
            $table->string('nhanvien_matkhau',100);
            $table->string('nhanvien_sdt',100);
            $table->string('nhanvien_ngay',100);
            $table->string('nhanvien_hinhanh',100);
            $table->string('nhanvien_diachi',100);

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
        Schema::dropIfExists('tbl_nhanvien');
    }
}
