<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblShopping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shopping', function (Blueprint $table) {
            $table->increments('shopping_id');
            $table->string('shopping_name',100);
            $table->integer('customer_id');
            $table->string('shopping_phone',100);
            $table->string('shopping_email',100);
            $table->string('shopping_diachi',100);
            $table->text('shopping_ghichu',100);
        
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
        Schema::dropIfExists('tbl_shopping');
    }
}
