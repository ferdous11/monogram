<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('item_code')->nullable();
            $table->string('item_description')->nullable();
            $table->string('item_id')->nullable();
            $table->string('item_option')->nullable();
            $table->string('item_quantity')->nullable();
            $table->string('item_thumb')->nullable();
            $table->string('item_unit_price')->nullable();
            $table->string('item_url')->nullable();
            $table->enum('item_taxable', array('Yes', 'No'))->default('No');
            $table->enum('is_deleted', array(0, 1))->default(0);
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
        Schema::drop('items');
    }
}
