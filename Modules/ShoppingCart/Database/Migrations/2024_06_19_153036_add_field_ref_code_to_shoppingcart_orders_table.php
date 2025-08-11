<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRefCodeToShoppingcartOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shoppingcart__orders', function (Blueprint $table) {
            $table->string('ref_code')->nullable()->after('payment_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shoppingcart__orders', function (Blueprint $table) {
            $table->dropColumn('ref_code');
        });
    }
}
