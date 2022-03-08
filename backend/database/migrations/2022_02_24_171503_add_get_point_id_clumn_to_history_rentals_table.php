<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGetPointIdClumnToHistoryRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_rentals', function (Blueprint $table) {
            $table->bigInteger('get_point_id')->unsigned()->after('renter_id');
            $table->renameColumn('start_at', 'start_on');
            $table->renameColumn('finish_at', 'estimated_finish_on');
            $table->renameColumn('return_at', 'return_on');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_rentals', function (Blueprint $table) {
            $table->dropColumn('get_point_id');
            $table->renameColumn('start_on', 'start_at');
            $table->renameColumn('estimated_finish_on', 'finish_at');
            $table->renameColumn('return_on', 'return_at');
        });
    }
}
