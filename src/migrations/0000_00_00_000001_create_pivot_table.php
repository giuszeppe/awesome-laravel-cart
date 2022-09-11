<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('cart.pivot_table'), function (Blueprint $table) {
            $table->unsignedBigInteger(config('cart.table') . '_id');
            $table->unsignedBigInteger(config('cart.item_table' . '_id'));
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
        Schema::dropIfExists(config('cart.pivot_table'));
    }
};
