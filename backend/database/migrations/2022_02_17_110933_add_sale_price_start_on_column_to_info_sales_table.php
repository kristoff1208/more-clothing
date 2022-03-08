<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalePriceStartOnColumnToInfoSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_sales', function (Blueprint $table) {
            $table->date('start_on')->after('sale_url');
            $table->integer('sale_price')->after('sale_url')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_sales', function (Blueprint $table) {
            $table->dropColumn('sale_price');
            $table->dropColumn('start_on');
        });
    }
}
