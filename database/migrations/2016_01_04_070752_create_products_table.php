<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('storeId');
            $table->string('idCatalog');
            $table->integer('vendorId');
            $table->string('model');
            $table->string('product_url');
            $table->string('product_name');
            $table->double('ship_weight');
            $table->double('productCost');
            $table->string('mcategory');
            $table->string('cat');
            $table->string('sub');
            $table->double('price');
            $table->double('sale_price');
            $table->double('wPrice');
            $table->enum('active', array(0, 1))->default(1);
            $table->enum('taxable', array('Yes', 'No'))->default('Yes');
            $table->string('upc');
            $table->string('brand');
            $table->string('ASIN');
            $table->string('su_code');
            $table->string('acct_code');
            $table->string('product_condition');
            $table->string('image_url_4P');
            $table->string('inset_url');
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
