<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGetPointIdColumnToHistorySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_sales', function (Blueprint $table) {
            $table->bigInteger('get_point_id')->unsigned()->after('staff_id');
            $table->bigInteger('price')->unsigned()->after('sold_on');
            $table->dropColumn('fee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_sales', function (Blueprint $table) {
            $table->integer('fee')->unsigned()->after('postage');
            $table->dropColumn('get_point_id');
            $table->dropColumn('price');
        });
    }
}
