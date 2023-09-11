<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDiachi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_diachi', function (Blueprint $table) {
          
            $table->bigIncrements('diachi_id');     
            $table->integer('customer_id');
            $table->string('shipping_name');
            $table->integer('city');
            $table->integer('province');
            $table->integer('wards');


            $table->string('shipping_address',100);
            $table->string('shipping_email',100);
            $table->string('shipping_phone',100);
            $table->integer('feeship',100);
    

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
        Schema::dropIfExists('tbl_diachi');
    }
}
