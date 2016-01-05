<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id')->nullable();
            $table->string('email')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('placed_by')->nullable();
            $table->string('store_id')->nullable();
            $table->string('market')->nullable();
            $table->string('order_date')->nullable();
            $table->string('paid')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->string('discount')->nullable();
            $table->string('gift_wrap_cost')->nullable();
            $table->string('tax')->nullable();
            $table->string('adjustment')->nullable();
            $table->string('order_total')->nullable();
            $table->string('fraud_score')->nullable();
            $table->string('coupon_name')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('four_pl_unique_id')->nullable();
            $table->string('short_order')->nullable();
            $table->string('order_comments')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_code')->nullable();
            $table->string('item_id')->nullable();
            $table->string('item_qty')->nullable();
            $table->string('item_price')->nullable();
            $table->string('item_cost')->nullable();
            $table->string('item_options')->nullable();
            $table->string('trk')->nullable();
            $table->string('ship_date')->nullable();
            $table->string('shipping_carrier')->nullable();
            $table->string('drop_shipper')->nullable();
            $table->string('return_request_code')->nullable();
            $table->string('return_request_date')->nullable();
            $table->string('return_disposition_code')->nullable();
            $table->string('return_date')->nullable();
            $table->string('rma')->nullable();
            $table->string('d_s_purchase_order')->nullable();
            $table->string('wf_batch')->nullable();
            $table->string('order_status')->nullable();
            $table->string('source')->nullable();
            $table->string('cancel_code')->nullable();
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
        Schema::drop('orders');
    }
}
