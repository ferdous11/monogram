<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * $table->increments('id');
        $table->string('store_id');
        $table->string('id_catalog');
        $table->integer('vendor_id')->nullable();
        $table->string('model')->nullable();
        $table->string('product_url')->nullable();
        $table->string('product_name')->nullable();
        $table->double('ship_weight')->nullable();
        $table->double('product_cost')->nullable();
        $table->string('m_category')->nullable();
        $table->string('cat')->nullable();
        $table->string('sub')->nullable();
        $table->double('price')->default(0);
        $table->double('sale_price')->default(0);
        $table->double('w_price')->default(0);
        $table->enum('active', array(0, 1))->default(1);
        $table->enum('taxable', array('Yes', 'No'))->default('Yes');
        $table->string('upc')->nullable();
        $table->string('brand')->nullable();
        $table->string('asin')->nullable();
        $table->string('su_code')->nullable();
        $table->string('acct_code')->nullable();
        $table->string('product_condition')->nullable();
        $table->string('image_url_4P')->nullable();
        $table->string('inset_url')->nullable();
        $table->integer('batch_route_id')->nullable();
     *
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_id');
            $table->string('id_catalog');
            $table->string('product_name')->nullable();
            $table->string('product_model')->nullable();
            $table->text('product_keywords')->nullable();
            $table->text('product_description')->nullable();
            $table->integer('product_category')->nullable();
			$table->integer('product_sub_category')->nullable();
            $table->double('product_price')->default(0);
            $table->string('product_url')->nullable();
            $table->string('product_thumb')->nullable();
            $table->integer('batch_route_id')->nullable();
            $table->enum('is_taxable', array(0, 1))->default(1);
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
        Schema::drop('products');
    }
}
