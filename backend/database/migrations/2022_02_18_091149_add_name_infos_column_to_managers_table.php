<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameInfosColumnToManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('managers', function (Blueprint $table) {
            $table->string('first_name_kana', 255)->after('owner');
            $table->string('last_name_kana', 255)->after('owner');
            $table->string('first_name', 255)->after('owner');
            $table->string('last_name', 255)->after('owner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('managers', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name_kana');
            $table->dropColumn('first_name_kana');
        });
    }
}
