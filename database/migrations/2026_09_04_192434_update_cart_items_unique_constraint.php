<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('cart_items', function (Blueprint $table) {

        // Foreign keys ke liye separate indexes
        $table->index('cart_id', 'cart_items_cart_id_index');
        $table->index('product_id', 'cart_items_product_id_index');

        // Purana unique constraint
        $table->dropUnique('cart_items_cart_id_product_id_unique');

        // Variant-wise unique constraint
        $table->unique(
            ['cart_id', 'product_id', 'size_id', 'color_id'],
            'cart_items_variant_unique'
        );
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
