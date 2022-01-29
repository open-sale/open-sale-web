<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Product::getTableName(), function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on(Category::getTableName());
        });

        Schema::table(Cart::getTableName(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(User::getTableName());
        });

        Schema::table(Order::getTableName(), function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on(Product::getTableName());
            $table->foreign('cart_id')->references('id')->on(Cart::getTableName());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // table-name _ column-name _ foreign
        Schema::table(Product::getTableName(), function (Blueprint $table) {
            $table->dropForeign(Product::getTableName() . '_category_id_foreign');
        });

        Schema::table(Cart::getTableName(), function (Blueprint $table) {
            $table->dropForeign(Cart::getTableName() . '_user_id_foreign');
        });

        Schema::table(Order::getTableName(), function (Blueprint $table) {
            $table->dropForeign([
                Order::getTableName() . '_product_id_foreign',
                Order::getTableName() . '_cart_id_foreign',
            ]);
        });
    }
}
